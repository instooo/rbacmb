<?php
/**
 * 权限控制
 * Created by dengxiaolong qf19910623@gmail.com.
 * Date: 2017/08/23
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class SpendController extends CommonController {

    public function _initialize() {
        parent::_initialize();
    }

    //成本列表
    public function index() {
		$is_special = $this->special_member();		
		//查看当前拥有的账号
		if(!$is_special){
			$map_m['user_id'] = $this->meminfo['id'];
			$midarr_result = M('user_channel a')
							->field('a.cid,a.user_id,b.username')
							->join('mygame_user b on a.user_id = b.id')
							->where($map_m)
							->select();
			$midarr = array_column($midarr_result,'cid');	
		}	
		if($midarr){
			$cbmap['a.cps_id'] = array('in',$midarr);
		}else if(!$is_special){			
			$cbmap['a.cps_id'] = 0;			
		}
		$channel = $this->getTotalChannel();		
		$meitiid= $_REQUEST ['meiti'];
		
		if($meitiid){			
			$cbmap['a.cps_id'] = $meitiid;
		}
		
		$this->assign ( 'meitiid', $meitiid );
		$pagesize= $_REQUEST ['pagesize']?$_REQUEST ['pagesize']:10;	
		$this->assign ( 'pagesize', $pagesize );
		$this->assign ( 'channel', $channel );
		
		/*对时间的处理-start*/
        $nowtime = time();
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
        $start_time = strtotime($start.' 12:00:00'); //充值开始时间
        $end_time = strtotime($end.' 12:00:00');     //充值结束时间
        if (!$start) {
            $start = date('Y-m-d', $nowtime);
            $start_time = strtotime($start.' 12:00:00');
        }
        if (!$end) {
            $end = date('Y-m-d', $nowtime);
            $end_time = strtotime($end.' 12:00:00');
        }
		$time_str = " spend_time between ".$start_time." and ".$end_time;
		
		
		$spend	= M('spend a');		
		$count = $spend					
				->where($cbmap)	
				->where($time_str)
				->count();	
		$page = new \Think\Page($count,$pagesize);		
		$list =$spend
				->field('a.*,b.agreetment,c.nickname,b.id as ida')
				->join('mygame_cb b on a.ht_id=b.id')
				->join('mygame_user c on a.user_id=c.id')		
				->where($cbmap)
				->where($time_str)				
				->limit($page->firstRow.','.$page->listRows)
				->select();	
		//print_r($list);
		$this->assign ( 'page', $page->show () );
		$this->assign('list',$list);
		
		
		$this->assign('start', $start);
        $this->assign('end', $end);
		/*对时间的处理-end*/		
        $this->display();
    }
	
	//添加成本
	public function add() {
		if(IS_POST){			
			$ret = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 				
				$data['cps_id']  = $_POST['mt'];
				$data['gid']  = $_POST['game'];
				$data['money']  = $_POST['money'];				
				$data['des']  = $_POST['des'];				
				$data['spend_time']  = strtotime($_POST['s_time']." 12:0:0");
				$data['date']  = date('Ymd',$data['spend_time']);
				$data['addtime']  = time();
				$data['user_id']  = $this->meminfo['id'];
				$data['ht_id']  = $_POST['ht'];	
			
				//查找当前媒体金额是否充足
				$medium = M('member_extend_info_cps a','mygame_','DB_ZHU');
				$map['a.uid'] = $data['cps_id'];
				$midresult = $medium				
				->join('mygame_cps_medium b on a.from_soical=b.mark')
				->field('a.from_soical,b.*')
				->where($map)
				->find();				
				$mtmap['id'] = $data['ht_id'];
				$mtmap['s_time'] = array('elt',$data['spend_time']);
				$mtmap['e_time'] = array('egt',$data['spend_time']);
				$htresult = M('cb')->where($mtmap)->find();					
				if($htresult['have_money']<$data['money']){
					$ret['code'] = -1;
					$ret['msg'] = '媒体金额不足';
					break;
				}
				//扣钱花钱
				unset($mtmap);
				$mtmap['id'] = $data['ht_id'];
				$data['m_id']  =$midresult ['id'];
				M('cb')->where($mtmap)->setDec('have_money',$data['money']);			
				M('cb')->where($mtmap)->setInc('cost_money',$data['money']);
				$result = M('spend')->add($data);
				if(!$result){
					$ret['code'] = 0;
					$ret['msg'] = '添加失败';
					break;					
				}
				$ret['code'] = 1;
				$ret['msg'] = '修改成功';
				break;
			}while(0);
			exit(json_encode($ret));
			
		}else{
			/*对时间的处理-start*/
			$nowtime = time();
			$start = $_REQUEST['start'];
			$end = $_REQUEST['end'];
			$start_time = strtotime($start.' 00:00:00'); //充值开始时间
			$end_time = strtotime($end.' 23:59:59');     //充值结束时间
			if (!$start) {
				$start = date('Y-m-d', $nowtime);
				$start_time = strtotime($start.' 00:00:00');
			}
			if (!$end) {
				$end = date('Y-m-d', $nowtime);
				$end_time = strtotime($end.' 23:59:59');
			}
			$this->assign('start', $start);
			$this->assign('end', $end);
			/*对时间的处理-end*/
			//获得媒体
			$meiti = $this->getTotalChannel();	
			$this->assign('meiti',$meiti);
			//获得游戏列表
			$game_list = $this->get_game();
			$this->assign('game_list', $game_list);
			$this->display();	
		}		
	}

	//修改消耗
	public function delete(){
		If(IS_POST){			
			$ret = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 			
				$map['id']  = $_POST['id'];				
				//查找当前ID
				$info_result = M('spend')->where($data)->find();
				if($info_result['status']==1){
					$ret['code'] = 1;
					$ret['msg'] = '不能删除';
					break;
				}
				//给当前合同返回金币				
				$mtmap['id'] = $info_result['ht_id'];				
				M('cb')->where($mtmap)->setInc('have_money',$info_result['money']);			
				M('cb')->where($mtmap)->setDec('cost_money',$info_result['money']);				
				$st= M('spend')->where($map)->delete();
				if($st){
					$ret['code'] = 1;
					$ret['msg'] = '修改成功';
					break;
				}else{
					$ret['code'] = -1;
					$ret['msg'] = '修改失败';
					break;
				}
				
			}while(0);
			exit(json_encode($ret));			
		}else{
			$ret['code'] = -1;
			$ret['msg'] = '非法请求';
			exit(json_encode($ret));			
		}
	}
	//审核
	public function shenghe(){
		If(IS_POST){			
			$ret = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 				
				$map['id']  = $_POST['id'];				
				//查找当前ID
				$info_result = M('spend')->where($map)->find();
				if($info_result['status']==1){
					$ret['code'] = 1;
					$ret['msg'] = '不能审核';
					break;
				}
				$data['status']=1;		
				$st= M('spend')->where($map)->save($data);
				if($st){
					$ret['code'] = 1;
					$ret['msg'] = '审核通过';
					break;
				}else{
					$ret['code'] = -1;
					$ret['msg'] = '修改失败';
					break;
				}
				
			}while(0);
			exit(json_encode($ret));			
		}else{
			$ret['code'] = -1;
			$ret['msg'] = '非法请求';
			exit(json_encode($ret));			
		}
	}
	//获得媒体可选择媒体
	public function get_ht(){
		$data['spend_time']  = strtotime($_POST['spend_time']." 12:0:0");	
		$medium = M('member_extend_info_cps a','mygame_','DB_ZHU');
		$map['a.uid'] = $_POST['cpsid'];
		$midresult = $medium				
		->join('mygame_cps_medium b on a.from_soical=b.mark')
		->field('a.from_soical,b.*')
		->where($map)
		->find();
		$mtmap['m_id'] = $midresult['id'];
		$mtmap['s_time'] = array('elt',$data['spend_time']);
		$mtmap['e_time'] = array('egt',$data['spend_time']);
		$mtmap['have_money'] = array('gt',0);
		$have_money = M('cb')->where($mtmap)->select();		
		if($have_money){
			exit(json_encode( $have_money));
		}else{
			exit(json_encode(0));
		}
	}
}