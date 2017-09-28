<?php
/**
 * 权限控制
 * Created by dengxiaolong 710190573@qq.com.
 * Date: 2017/09/08
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class AdController extends CommonController {

    public function _initialize() {
        parent::_initialize();
    }
	
	//内容列表页
	public function type(){
		$classname =ucfirst(strtolower('adtype'));
		import('Common/Vendor/Sysmodel/'.$classname);		
        $class    = new $classname();		
		$fileds =$class->getFields();
		//查找对应的栏目id		
		$content = M($classname);
		$contentmap=array();
		$count = $content	
				->where($contentmap)					
				->count();	
		$page = new \Think\Page($count, 5);
		
		$list = $content
				->where($contentmap)
				->limit($page->firstRow.','.$page->listRows)
				->order('weight desc,id desc')
				->select();		
		$this->assign('list',$list);
		$this->assign ( 'page', $page->show () );
		$this->assign('fileds',$fileds);
		$this->display('ad/type/type_list');		
	}
	
	//内容添加
	public function type_add(){

		//查找模型对应的表格和对应的类名
		$classname =ucfirst(strtolower('adtype'));
		import('Common/Vendor/Sysmodel/'.$classname);		
        $class    = new $classname();
		if ($_POST) {
			$ret = array("code"=>-1,"msg"=>'',"data"=>"");
            do{ 
				$data = $_POST;
				//检查数据
				$checkresult = $class->checkData($data);				
				if($checkresult['code']!=1){
					$ret = $checkresult;
					break;
				}
				//整理数据
				$data = $class->filter($data);				
				$content = M($classname);
				$data['addtime']=time();				
				$st = $content->data($data)->add();					
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
		}else{
			//这些案例所有都有对应栏目，所以是公用的
			$cate  = M('cate')->select();
			$cate = $this->unlimitedForLevel($cate);		
			$html = $class->get_html();
			$this->assign('html',$html);
			$this->assign('mid',$mid);
			$this->assign('typeid',$typeid);				
			$this->assign('cate',$cate);	
			$this->display('ad/type/type_add');
		} 
		
	}

	//内容删除
	public function type_edit(){
		$id =  $_REQUEST ['id'];
		$classname =ucfirst(strtolower('adtype'));
		import('Common/Vendor/Sysmodel/'.$classname);		
		$class    = new $classname();
		if($_POST){
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
			do{	
				$data = $_POST;
				//检查数据
				$checkresult = $class->checkData($data);				
				if($checkresult['code']!=1){
					$ret = $checkresult;
					break;
				}
				//整理数据
				$data = $class->filter($data);				
				$content = M($classname);
				if(!$data['id']){
					$ret['code'] = -1;
					$ret['msg'] = '更新数据出错';
					break;	
				}
				$map['id'] = $data['id'];
				$st = $content->where($map)->save($data);					
				if($st===false){
					$ret['code'] = 0;
					$ret['msg'] = '添加失败';
					break;					
				}			
				$ret['code'] = 1;
				$ret['msg'] = '添加成功';
				break;
			}while(0);
			exit(json_encode($ret));		
		}else{
			//这些案例所有都有对应栏目，所以是公用的
			$content = M($classname);			
			$where['id'] =$id;
			$detail_info = $content->where($where)->find();			
			$html = $class->edit_html($detail_info);			
			$this->assign('html',$html);
			$this->assign('detail_info',$detail_info);				
			$this->display('ad/type/type_edit');			
		}		
	}
	
	//内容删除
	public function type_delete(){
		$return = array("state"=>-1,"msg"=>'',"data"=>"");
		do{ 	
		
			$id =  $_REQUEST ['id'];			
			$classname =ucfirst(strtolower('adtype'));			
			$content = M($classname);			
			$where['id'] =$id;
			$st = $content->where($where)->delete();			
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
	
	//内容列表页
	public function ad_index(){
		$classname =ucfirst(strtolower('ad'));
		import('Common/Vendor/Sysmodel/'.$classname);		
        $class    = new $classname();		
		$fileds =$class->getFields();
		//查找对应的栏目id		
		$content = M($classname);
		$contentmap=array();
		$count = $content	
				->where($contentmap)					
				->count();	
		$page = new \Think\Page($count, 20);
		
		$list = $content
				->where($contentmap)
				->limit($page->firstRow.','.$page->listRows)
				->order('weight desc,id desc')
				->select();	
		//显示栏目类型
		$lanmu = M('adtype')->select();
		foreach($lanmu as $key=>$val){
			$lanmulist[$val['id']] = $val;			
		}
		foreach($list as $key=>$val){
			$listnew[$key] = $val;
			$listnew[$key]['typename'] = $lanmulist[$val['typeid']]['title'];
		}
		
		$this->assign('list',$listnew);
		$this->assign ( 'page', $page->show () );
		$this->assign('fileds',$fileds);
		$this->display('ad/ad/ad_list');		
	}
	
	//内容添加
	public function ad_add(){

		//查找模型对应的表格和对应的类名
		$classname =ucfirst(strtolower('ad'));
		import('Common/Vendor/Sysmodel/'.$classname);		
        $class    = new $classname();
		if ($_POST) {
			$ret = array("code"=>-1,"msg"=>'',"data"=>"");
            do{ 
				$data = $_POST;
				//检查数据
				$checkresult = $class->checkData($data);				
				if($checkresult['code']!=1){
					$ret = $checkresult;
					break;
				}
				//整理数据
				$data = $class->filter($data);				
				$content = M($classname);
				$data['addtime']=time();				
				$st = $content->data($data)->add();					
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
		}else{
			//这些案例所有都有对应栏目，所以是公用的					
			$html = $class->get_html();			
			$this->assign('html',$html);
			
			$cate  = M('adtype')->select();	
			$this->assign('cate',$cate);	
			$this->display('ad/ad/ad_add');
		} 
		
	}

	//内容删除
	public function ad_edit(){
		$id =  $_REQUEST ['id'];
		$classname =ucfirst(strtolower('ad'));
		import('Common/Vendor/Sysmodel/'.$classname);		
		$class    = new $classname();
		if($_POST){
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
			do{	
				$data = $_POST;
				//检查数据
				$checkresult = $class->checkData($data);				
				if($checkresult['code']!=1){
					$ret = $checkresult;
					break;
				}
				//整理数据
				$data = $class->filter($data);				
				$content = M($classname);
				if(!$data['id']){
					$ret['code'] = -1;
					$ret['msg'] = '更新数据出错';
					break;	
				}
				$map['id'] = $data['id'];
				
				$st = $content->where($map)->save($data);					
				if($st===false){
					$ret['code'] = 0;
					$ret['msg'] = '添加失败';
					break;					
				}			
				$ret['code'] = 1;
				$ret['msg'] = '添加成功';
				break;
			}while(0);
			exit(json_encode($ret));		
		}else{
			//这些案例所有都有对应栏目，所以是公用的
			$content = M($classname);			
			$where['id'] =$id;
			$detail_info = $content->where($where)->find();			
			$html = $class->edit_html($detail_info);			
			$this->assign('html',$html);
			$this->assign('detail_info',$detail_info);				
			$cate  = M('adtype')->select();	
			$this->assign('cate',$cate);	
			$this->display('ad/ad/ad_edit');			
		}		
	}
	
	//内容删除
	public function ad_delete(){
		$return = array("state"=>-1,"msg"=>'',"data"=>"");
		do{ 	
		
			$id =  $_REQUEST ['id'];			
			$classname =ucfirst(strtolower('ad'));			
			$content = M($classname);			
			$where['id'] =$id;
			$st = $content->where($where)->delete();			
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