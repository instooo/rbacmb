<?php
/**
 * 权限控制
 * Created by dengxiaolong qf19910623@gmail.com.
 * Date: 2017/08/23
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class CostController extends CommonController {

    public function _initialize() {
        parent::_initialize();
    }

    //成本列表
    public function index() {
		$is_special = $this->special_member();		
		//查看当前拥有的账号
		if(!$is_special){
			$map_m['user_id'] = $this->meminfo['id'];
			$midarr_result = M('user_meidium a')
							->field('a.m_id,a.user_id,b.username')
							->join('mygame_user b on a.user_id = b.id')
							->where($map_m)
							->select();
			$midarr = array_column($midarr_result,'m_id');	
		}	
		if($midarr){
			$cbmap['m_id'] = array('in',$midarr);
		}else if(!$is_special){			
			$cbmap['m_id'] = 0;			
		}
		
		
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
		$time_str = " s_time between ".$start_time." and ".$end_time." or e_time between ".$start_time." and ".$end_time;        
		
		$this->assign('start', $start);
        $this->assign('end', $end);
		/*对时间的处理-end*/
		//获得媒体
		$this->get_channel();		
		$meitiid= $_REQUEST ['meiti'];
		$pagesize= $_REQUEST ['pagesize']?$_REQUEST ['pagesize']:10;	
		$this->assign ( 'pagesize', $pagesize );
		$this->assign ( 'meitiid', $meitiid );
		if($meitiid){			
			$cbmap['m_id'] = $meitiid;
		}
		$cb	= M('cb');		
		$count = $cb					
				->where($cbmap)	
				->where($time_str)
				->count();	
		$page = new \Think\Page($count,$pagesize);		
		$list =$cb
				->where($cbmap)	
				->where($time_str)
				->limit($page->firstRow.','.$page->listRows)
				->select();		
		$this->assign ( 'page', $page->show () );
		$this->assign('list',$list);	
        $this->display();
    }
	
	//添加成本
	public function add() {
		if(IS_POST){			
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 
				$data['m_id']  = $_POST['m_id'];
				$data['type']  = $_POST['type'];
				$data['hz_type']  = $_POST['hz_type'];
				$data['agreetment']  = $_POST['agreetment'];
				$data['des']  = $_POST['des'];
				$data['s_time']  = strtotime($_POST['s_time']." 0:0:0");
				$data['e_time']  = strtotime($_POST['e_time']." 23:59:59");
				$data['total_money']  = (int)$_POST['total_money'];					
				if($data['total_money']==0){
					$ret['code'] = -1;
					$ret['msg'] = '金额不能为0';
					break;
				}
				if(!$data['agreetment'] ||!$data['des']){
					$ret['code'] = -1;
					$ret['msg'] = '填写具体参数';
					break;
				}
				$data['add_time']  = time();
				$data['cost_money']  = 0;
				$data['have_money']  = (int)$_POST['total_money'];
				$data['status']  = 0;//未付款
				$data['fk_time']  = 0;
				$data['fp_pic']  = 0;				
				$file = $_FILES;	
				//添加关联栏目需要的图片
				if($file){
					$upload = new \Think\Upload();// 实例化上传类
					$upload->maxSize   =     3145728;
					$upload->exts      =     array('jpg','png','bmp','gif');
					// 设置附件上传类型		
					$upload->rootPath  =     C("UPLOAD_PATH"); // 设置附件上传根目录
					$upload->savePath  =     ''; // 设置附件上传（子）目录	
					$info   =   $upload->upload();					
					if($info['ht_pic']){							
						$path = $info['ht_pic']['savepath'];
						$name = $info['ht_pic']['savename'];
						$data['ht_pic']='/'.$upload->rootPath.'/'.$path.$name;		
					}									
				}else { 
					$data['ht_pic']='';
				}	
				$result = M('cb')->add($data);
				if($result){
					$ret['code'] = 1;
					$ret['msg'] = '添加成功';
				}else{
					$ret['code'] = -1;
					$ret['msg'] = '添加失败';
				}
				
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
			$this->get_channel();	
			//获得合作方式
			$fz = M('hz_type')->select();
			$this->assign('fz',$fz);
			$this->display();	
		}		
	}

	//付款
	public function fukuan() {
		if(IS_POST){			
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 
				$data['id']  = $_POST['id'];
				$data['fk_time']  = time();
				$data['status']  = 1;				
				$result = M('cb')->where(array('id'=>$_POST['id']))->save($data);
				if($result){
					$ret['code'] = 1;
					$ret['msg'] = '付款成功';
				}else{
					$ret['code'] = -1;
					$ret['msg'] = '付款失败';
				}				
			}while(0);
			exit(json_encode($ret));
			
		}else{
			$id = $_REQUEST['id'];
			if(!$id){
				$this->error("参数非法");
			}
			$this->assign('id', $id);			
			$this->display();	
		}		
	}

	//附件
	public function files_pic() {
		if(IS_POST){			
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 				
				$data['id']  = $_POST['id'];
				$file = $_FILES;	
				//添加关联栏目需要的图片
				if($file){
					$upload = new \Think\Upload();// 实例化上传类
					$upload->maxSize   =     3145728;
					$upload->exts      =     array('jpg','png','bmp','gif');
					// 设置附件上传类型		
					$upload->rootPath  =     C("UPLOAD_PATH"); // 设置附件上传根目录
					$upload->savePath  =     ''; // 设置附件上传（子）目录	
					$info   =   $upload->upload();
					if($info!==false){
						foreach($info as $key=>$val){
							$path = $val['savepath'];
							$name = $val['savename'];
							$pic_str.='/'.$upload->rootPath.$path.$name."|";	
						}
					}
					if($_POST['type'] == 'ht'){
						$data['ht_pic'] = rtrim($pic_str,"|");
					}else{
						$data['fp_pic'] = rtrim($pic_str,"|");
					}					
					$result = M('cb')->where(array('id'=>$_POST['id']))->save($data);
					if($result){
						$ret['code'] = 1;
						$ret['msg'] = '付款成功';
					}else{
						$ret['code'] = -1;
						$ret['msg'] = '付款失败';
					}
							
				}else { 
					$ret['code'] = -1;
					$ret['msg'] = '请提供发票图片';
				}
			}while(0);
			exit(json_encode($ret));
			
		}else{
			/*对时间的处理-start*/			
			$id = $_REQUEST['id'];
			if(!$id){
				$this->error("参数非法");
			}
			$this->assign('id', $id);	
			$this->display();	
		}		
	}

	//修改
	public function edit() {
		if(IS_POST){			
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 
				$data['id']  = $_POST['id'];				
				$data['m_id']  = $_POST['m_id'];
				$data['type']  = $_POST['type'];
				$data['hz_type']  = $_POST['hz_type'];
				$data['agreetment']  = $_POST['agreetment'];
				$data['des']  = $_POST['des'];
				$data['s_time']  = $_POST['s_time'];
				$data['e_time']  = $_POST['e_time'];
				$data['total_money']  = (int)$_POST['total_money'];				
				$result = M('cb')->where(array('id'=>$_POST['id']))->save($data);
				if($result){
					$ret['code'] = 1;
					$ret['msg'] = '修改成功';
				}else{
					$ret['code'] = -1;
					$ret['msg'] = '修改失败';
				}							
				
			}while(0);
			exit(json_encode($ret));
			
		}else{
			$id =  $_REQUEST ['id'];
			$where['id'] =$id;
			$info = M('cb')->where($where)->find();
			$this->assign('info',$info);
			//获得媒体
			$this->get_channel();	
			//获得合作方式
			$fz = M('hz_type')->select();
			$this->assign('fz',$fz);			
			$this->assign('id', $id);
			$this->display();	
		}		
	}

	//查看
	public function getdetail(){
		$id =  $_REQUEST ['id'];
		$where['id'] =$id;
		$info = M('cb')->where($where)->find();
		$info['ht_pic_list'] = explode("|",$info['ht_pic']);
		$info['fp_pic_list'] = explode("|",$info['fp_pic']);		
		$this->assign('info',$info);
		//获得媒体
		$this->get_channel();	
		//获得合作方式
		$fz = M('hz_type')->select();
		$this->assign('fz',$fz);			
		$this->assign('id', $id);
		$this->display();	
	}
}