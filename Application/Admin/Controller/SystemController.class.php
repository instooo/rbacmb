<?php
/**
 * 权限控制
 * Created by dengxiaolong qf19910623@gmail.com.
 * Date: 2017/08/23
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class SystemController extends CommonController {

    public function _initialize() {
        parent::_initialize();
    }	
	
    //站点列表
    public function web_list() {
		
		$count = M('webconfig')->count();	
		$page = new \Think\Page($count, 10);		
		$list = M('webconfig')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign ( 'page', $page->show () );
		$this->assign('list',$list);
		$this->display('system/web/web_list');
    }	

	//站点添加
	public function web_add(){	
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 			
				$webconfig = M('webconfig');		
				$sitename = trim ( $_REQUEST ['sitename'] );
				$domain = trim ( $_REQUEST ['domain'] );
				$keywords = trim ( $_REQUEST ['keywords'] );
				$descriptions = trim ( $_REQUEST ['descriptions'] );
				$beian = trim ( $_REQUEST ['beian'] );
				if ( $sitename==''||$domain =='') {
					$ret['code']=-2;
					$ret['msg']='站点名称或域名不能为空';
					break;	
				} 	
				
				$data['sitename']  = $sitename;
				$data['domain']      = $domain;
				$data['keywords']   = $keywords;
				$data['descriptions'] = $descriptions;
				$data['beian'] = $beian;					
				$st = $webconfig->data($data)->add();					
				if(!$st){
					$ret['code'] = 0;
					$ret['msg'] = '添加失败';
					break;					
				}			
				$ret['code'] = 1;
				$ret['msg'] = '添加成功';
				break;
			}while(0);
			exit(json_encode($ret));
		} 
		
		$this->display('system/web/web_add');
	}

	//站点修改
	public function web_upd(){		
		$webconfig = M('webconfig');
		$id =  $_REQUEST ['id'];
		$where['id'] =$id;
		$info = $webconfig->where($where)->find();
		$this->assign('info',$info);
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 	
				$sitename = trim ( $_REQUEST ['sitename'] );
				$domain = trim ( $_REQUEST ['domain'] );
				$keywords = trim ( $_REQUEST ['keywords'] );
				$descriptions = trim ( $_REQUEST ['descriptions'] );
				$beian = trim ( $_REQUEST ['beian'] );
				$id  = I('post.id','','intval');			
				if ( $sitename==''||$domain =='') {
					$ret['code']=-2;
					$ret['msg']='站点名称或域名不能为空';
					break;	
				}
				$data['sitename']  = $sitename;
				$data['domain']      = $domain;
				$data['keywords']   = $keywords;
				$data['descriptions'] = $descriptions;
				$data['beian'] = $beian;					
				$map['id'] = $id;
				$st = $webconfig->where($map)->save($data);				
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
		$this->display('system/web/web_upd');
	}
	
	//站点查看
	public function web_info(){
		$webconfig = M('webconfig');
		$id =  $_REQUEST ['id'];
		$where['id'] =$id;
		$info = $webconfig->where($where)->find();
		$this->assign('info',$info);
		$this->display('system/web/web_info');
	}

	 //模型列表
    public function model_list() {
		
		$count = M('model')->count();	
		$page = new \Think\Page($count, 10);		
		$list = M('model')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign ( 'page', $page->show () );
		$this->assign('list',$list);
		$this->display('system/model/model_list');
    }	

	//模型添加
	public function model_add(){	
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 		
				$model = M('model');
				$name = trim ( $_REQUEST ['name'] );
				$form = trim ( $_REQUEST ['form'] );
				$status = trim ( $_REQUEST ['status'] );
				$class = trim ( $_REQUEST ['class'] );
				$id  = I('post.id','','intval');			
				if ( $name==''||$form =='') {
					$ret['code']=-2;
					$ret['msg']='模型名称或表单名不能为空';
					break;	
				}
				$data['name']  = $name;
				$data['form']      = $form;
				$data['status']   = $status;
				$data['class']   = $class;	
				$st = $model->data($data)->add();					
				if(!$st){
					$ret['code'] = 0;
					$ret['msg'] = '添加失败';
					break;					
				}			
				$ret['code'] = 1;
				$ret['msg'] = '添加成功';
				break;
			}while(0);
			exit(json_encode($ret));
		} 
		
		$this->display('system/model/model_add');
	}

	//模型修改
	public function model_upd(){		
		$model = M('model');
		$id =  $_REQUEST ['id'];
		$where['id'] =$id;
		$info = $model->where($where)->find();
		$this->assign('info',$info);
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 	
				$name = trim ( $_REQUEST ['name'] );
				$form = trim ( $_REQUEST ['form'] );
				$status = trim ( $_REQUEST ['status'] );
				$class = trim ( $_REQUEST ['class'] );				
				$id  = I('post.id','','intval');			
				if ( $name==''||$form =='') {
					$ret['code']=-2;
					$ret['msg']='模型名称或表单名不能为空';
					break;	
				}
				$data['name']  = $name;
				$data['form']      = $form;
				$data['status']   = $status;
				$data['class']   = $class;	
				$map['id'] = $id;
				$st = $model->where($map)->save($data);				
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
		$this->display('system/model/model_upd');
	}
	
	//模型删除
	public function model_del(){
		$return = array("state"=>-1,"msg"=>'',"data"=>"");
		do{ 	
			$model = M('model');
			$id =  $_REQUEST ['id'];
			$where['id'] =$id;
			$st = $model->where($where)->delete();	
			if($st){
				$ret['code'] = 0;
				$ret['msg'] = '删除成功';
				break;
			}else{
				$ret['code'] = -1;
				$ret['msg'] = '删除失败';
				break;
			}				
		}while(0);
		exit(json_encode($ret));
	}

}