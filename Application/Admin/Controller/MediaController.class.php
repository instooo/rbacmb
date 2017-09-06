<?php
/**
 * 权限控制
 * Created by dengxiaolong qf19910623@gmail.com.
 * Date: 2017/08/23
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class MediaController extends CommonController {

    public function _initialize() {
        parent::_initialize();
    }	
	
    //推广媒体管理
    public function medium_info() {		
		$is_special = $this->special_member();		
		//查看当前拥有的账号
		if(!$is_special){
			$map_m['user_id'] = $this->meminfo['id'];
			$midarr_result = M('user_meidium a')
							->field('a.m_id,a.user_id,b.username')
							->join('youzhan_user b on a.user_id = b.id')
							->where($map_m)
							->select();
			$midarr = array_column($midarr_result,'m_id');	
		}
		$medium = M('cps_medium','youzhan_','DB_ZHU');	
		$name = $_REQUEST ['name'];		
		$status = $_REQUEST ['status'];	
		
		$this->assign ( 'name', $name );		
		$this->assign ( 'status', $status );		
	
		$time = time();		
		if ($name) {				
			$name_str = " and name='" . $name . "'";
		}		
		if ($status != '') {				
			$status_str = " and status = " . $status;
		}		
			
		$pid_str = " and pid !=0 ";
		
		if($midarr){
			$mediummap['id'] = array('in',$midarr);
		}else if(!$is_special){			
			$mediummap['id'] = 0;			
		}
		$count = $medium	
				->where($mediummap)
				->where("'addtime'<$time".$name_str.$status_str.$pid_str)				
				->count();	
		$page = new \Think\Page($count, 10);
		$list =$medium
				->where($mediummap)
				->where("'addtime'<$time".$name_str.$status_str.$pid_str)
				->limit($page->firstRow.','.$page->listRows)
				->select();		
		$this->assign ( 'page', $page->show () );
		$this->assign('list',$list);
		$this->display();
    }	

	//推广媒体添加
	public function medium_add(){		
		$medium = M('cps_medium','youzhan_','DB_ZHU');
		//给表单提供以及媒体
		$where['pid'] = 0;
		$where['status'] =0;
		$medium_info = $medium->where($where)->select();
		$this->assign('medium_info',$medium_info);
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 			
				$name = trim ( $_REQUEST ['name'] );
				$parent_id = trim ( $_REQUEST ['parent_id'] );
				$mark = trim ( $_REQUEST ['mark'] );
				$status = trim ( $_REQUEST ['status'] );
				
				if ( $name==''||$mark =='') {
					$ret['code']=-2;
					$ret['msg']='媒体名或标示不能为空';
					break;	
				} 
				//媒体名称和媒体标识不能重复
				$map['name']= $name;
				$result = $medium->where($map)->find();			
				if($result){
					$ret['code']=-2;
					$ret['msg']='媒体名不能重复';
					break;	
				}
				unset($map);				
				$map['mark']= $mark;
				$result = $medium->where($map)->find();			
				if($result){
					$ret['code']=-2;
					$ret['msg']='标示不能重复';
					break;	
				}				
				$data['name']  = $name;
				$data['pid']      = $parent_id;
				$data['mark']   = $mark;
				$data['status'] = $status;
				$data['addtime'] = time();
				$data['ext01'] ='';					
				$st = $medium->data($data)->add();					
				if(!$st){
					$ret['code'] = 0;
					$ret['msg'] = '添加失败';
					break;					
				}
				//添加对应拥有权限表
				$mdata['user_id'] = $this->meminfo['id'];
				$mdata['m_id'] = $st;
				$st = M('user_meidium')->data($mdata)->add();
				$ret['code'] = 1;
				$ret['msg'] = '添加成功';
				break;
			}while(0);
			exit(json_encode($ret));
		} 
		
		$this->display();
	}

	//媒体修改
	public function medium_upd(){		
		$medium = M('cps_medium','youzhan_','DB_ZHU');
		$id =  $_REQUEST ['id'];
		$where['id'] =$id;
		$info1 = $medium->where($where)->find();
		$medium_info =$medium->where('status=0 and pid=0')->select();
		$this->assign('info1',$info1);
		$this->assign('medium_info',$medium_info);
		
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 	
				$name = trim ( $_REQUEST ['name'] );
				$parent_id = trim ( $_REQUEST ['parent_id'] );
				$mark = trim ( $_REQUEST ['mark'] );
				$status = trim ( $_REQUEST ['status'] );
				$ids  = I('post.ids','','intval');			
				if ($name=='' || $mark =='' ) {
					$ret['code'] = 0;
					$ret['msg'] = '您提交的数据有误';
					break;
				} 
				
				//媒体名称和媒体标识不能重复
				$map['id']= array('neq',$ids);
				$map['name']= $name;
				$result = $medium->where($map)->find();			
				if($result){
					$ret['code']=-2;
					$ret['msg']='媒体名不能重复';
					break;	
				}
				unset($map);	
				$map['id']= array('neq',$ids);		
				$map['mark']= $mark;
				$result = $medium->where($map)->find();			
				if($result){
					$ret['code']=-2;
					$ret['msg']='标示不能重复';
					break;	
				}
				
				$data['name']  = $name;
				$data['pid']      = $parent_id;
				$data['mark']   = $mark;
				$data['status'] = $status;
				$data['addtime'] = time();			
				$map['id'] = $ids;
				$st = $medium->where($map)->save($data);				
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
		}
		$this->display();
	}
	
	//转移媒体
	public function medium_upzy(){
		$medium = M('cps_medium','youzhan_','DB_ZHU');
		$id =  $_REQUEST ['id'];
		$where['id'] =$id;
		$info1 = $medium				
				->where($where)
				->find();
		$this->assign('info1',$info1);
		//当前媒体所属用户
		unset($where);
		$where['m_id'] = $id;
		$user_meidium = M('user_meidium');
		$user_meidium_info = $user_meidium				
				->where($where)
				->find();
		$this->assign('user_meidium_info',$user_meidium_info);
		//用户列表
		$member_list = M('user')->where("status=1")->select();

		$this->assign('member_list',$member_list);
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 	
				//删除拥有用户,赋值新用户
				$data['user_id'] = trim ( $_REQUEST ['user_id'] );	
				$map['m_id'] = I('post.ids','','intval');
				M('user_meidium')->where($map)->delete();
				//添加上
				$data['m_id'] = I('post.ids','','intval');
				$st =M('user_meidium')->add($data);				
				if($st){
					$ret['code'] = 1;
					$ret['msg'] = '转移成功';
					break;
				}else{
					$ret['code'] = -1;
					$ret['msg'] = '转移失败';
					break;
				}				
			}while(0);
			exit(json_encode($ret));
		}
		$this->display();
	}
	//推广媒体删除
	public function medium_del(){
		$ret = array('code'=>-1,'msg'=>'');
		do{
			$is_special = $this->special_member();			
			//if(!$is_special){
				$ret['code'] = -1;
				$ret['msg'] = '暂未开放删除媒体接口';
				break;
			//}
			if (!IS_POST) {
                $ret['code'] = -1;
                $ret['msg'] = '非法请求';
                break;
            }
			$id	=	I("post.id",false,'intval');
			$where['id']=$id;
			$medium = M('cps_medium','youzhan_','DB_ZHU');
			//查找是否父级
			$result = $medium->where($where)->find();			
			if($result['pid']==0){
				$wheremap['pid']=$id;
				$result_pid = $medium->where($wheremap)->find();
				if($result_pid){
					$ret['state']	=	-1;
					$ret['msg']		=	'存在子栏目';
					break;
				}
			}
			
			$result = $medium->where($where)->delete();			
			if($result){
				$ret['state']	=	0;
				$ret['msg']		=	'删除成功';
				break;
			}else{
				$ret['state']	=	-1;
				$ret['msg']		=	'系统繁忙删除失败';
				break;
			}
		}while(0);
		exit(json_encode($ret));
	}
}