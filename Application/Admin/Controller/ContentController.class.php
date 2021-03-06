<?php
/**
 * 权限控制
 * Created by dengxiaolong 710190573@qq.com.
 * Date: 2017/09/08
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class ContentController extends CommonController {

    public function _initialize() {
        parent::_initialize();
    }
	 //栏目列表
    public function cate_list() {
		$cate = M('cate a')->join('youzhan_model b on a.m_id=b.id')->select();
		$list = $this->unlimitedForLevel($cate);			
		$this->assign('list',$list);
		$this->display('content/cate/cate_list');
    }	

	//栏目添加
	public function cate_add(){	
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{
				$cate = M('cate');
				$typename = trim ( $_REQUEST ['typename'] );
				$pid = trim ( $_REQUEST ['pid'] );
				$m_id = trim ( $_REQUEST ['m_id'] );
				$description = trim ( $_REQUEST ['description'] );
				$content = trim ( $_REQUEST ['content'] );	
				$id  = I('post.id','','intval');			
				if ( $typename==''||$m_id =='') {
					$ret['code']=-2;
					$ret['msg']='栏目名称或模型不能为空';
					break;	
				}
				$data['typename']  = $typename;
				$data['pid']      = $pid;
				$data['m_id']   = $m_id;
				$data['description']   = $description;
				$data['content']   = $content;	
				$st = $cate->data($data)->add();					
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
		$cate = M('cate')->select();
		$catelist = $this->unlimitedForLevel($cate);

		$model = M('model')->select();
		$this->assign('model',$model);
		$this->assign('catelist',$catelist);
		$this->display('content/cate/cate_add');
	}

	//栏目修改
	public function cate_upd(){		
		$cate = M('cate');
		$id =  $_REQUEST ['id'];
		$where['typeid'] =$id;
		$info = $cate->where($where)->find();
		$this->assign('info',$info);
		if ($_POST) {
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
            do{ 	
				$cate = M('cate');
				$typename = trim ( $_REQUEST ['typename'] );
				$pid = trim ( $_REQUEST ['pid'] );
				$m_id = trim ( $_REQUEST ['m_id'] );
				$description = trim ( $_REQUEST ['description'] );
				$content = trim ( $_REQUEST ['content'] );	
				$id  = I('post.id','','intval');			
				if ( $typename==''||$m_id =='') {
					$ret['code']=-2;
					$ret['msg']='栏目名称或模型不能为空';
					break;	
				}
				$data['typename']  = $typename;
				$data['pid']      = $pid;
				$data['m_id']   = $m_id;
				$data['description']   = $description;
				$data['content']   = $content;
				$map['typeid']=$id;
				$st = $cate->where($map)->save($data);				
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
		$cate = M('cate')->select();
		$catelist = $this->unlimitedForLevel($cate);
		$this->assign('catelist',$catelist);
		
		$model = M('model')->select();
		$this->assign('model',$model);	
		$this->display('content/cate/cate_upd');
	}
	
	//栏目删除
	public function cate_del(){
		$return = array("state"=>-1,"msg"=>'',"data"=>"");
		do{ 	
			$cate = M('cate');
			//$acticle = M('acticle');
			$id =  $_REQUEST ['id'];
			$where['typeid'] =$id;
			//查找是否有子栏目
			$map['pid']=$id;
			$result = $cate->where($map)->find();			
			if($result){
				$ret['code'] = -1;
				$ret['msg'] = '拥有子栏目,不可删除';
				break;
			}
			//查找是否有文章
			//$rearticle = $acticle->where($where)->find();
			//if($rearticle){
			//	$ret['code'] = -1;
			//	$ret['msg'] = '栏目下有文章,不可删除';
			//	break;
			//}	
			$st = $cate->where($where)->delete();			
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
	
	//内容首页
	public function content_select(){
		if ($_POST) {
			$id = $_REQUEST['id'];
			$id = $id?$id:0;
			session('cate_id',$id);
		}else{
			//查找对应模型
			$map['a.m_id']=array('neq',0);
			$list = M('cate a')->join('youzhan_model b on a.m_id=b.id')->where($map)->select();			
			$this->assign('list',$list);
			
			$this->display('content/content/content_select');		
		}
		
	}
	
	//内容列表页
	public function content_list(){
		$typeid = session('cate_id');	
		$typeid = $typeid?$typeid:0;	
		//查找对应栏目的模型
		$cateinfo = M('cate')->where('typeid='.$typeid)->find();		
		$mid = $cateinfo['m_id']?$cateinfo['m_id']:1;		
		//找到相应模型并获得类
		$result = M('model')->where("id=".$mid)->find();
		$classname =ucfirst(strtolower($result['class']));
		import('Common/Vendor/Model/'.$classname);		
        $class    = new $classname();		
		$fileds =$class->getFields();
		//查找对应的栏目id		
		$content = M($classname);
		$contentmap['typeid']= $typeid;
		$count = $content	
				->where($contentmap)					
				->count();	
		$page = new \Think\Page($count, 5);
		
		$list = $content
				->where($contentmap)
				->limit($page->firstRow.','.$page->listRows)
				->order('weight desc,aid desc')
				->select();		
		$this->assign('list',$list);
		$this->assign ( 'page', $page->show () );
		$this->assign('fileds',$fileds);
		$this->assign('mid',$mid);
		$this->assign('typeid',$typeid);		
		$this->assign('cateinfo',$cateinfo);
		$this->display('content/content/content_list');		
	}
	
	//内容添加
	public function content_add(){
		//模型默认为文章模型
		$mid=$_REQUEST ['mid'];
		$typeid=$_REQUEST ['typeid'];
		$mid=$mid?$mid:1;
		//查找模型对应的表格和对应的类名
		$result = M('model')->where("id=".$mid)->find();
		$classname =ucfirst(strtolower($result['class']));
		import('Common/Vendor/Model/'.$classname);		
        $class    = new $classname();
		if ($_POST) {
			$ret = array("code"=>-1,"msg"=>'',"data"=>"");
            do{ 
				$datanew = $_POST;
				if(get_magic_quotes_gpc()){
					foreach($datanew as $key=>$val){
						$data[$key] = stripslashes($val);
					}
				}
				
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
				//对栏目进行过滤
				if(!$data['typeid'] || $data['typeid']==-1){
					$ret['code'] = -1;
					$ret['msg'] = '请选择栏目';
					break;			
				}
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
			$this->display('content/content/content_add');
		} 
		
	}

	//内容删除
	public function content_upd(){
		$aid =  $_REQUEST ['aid'];
		$mid =  $_REQUEST ['mid'];
		if($mid){
			$result = M('model')->where("id=".$mid)->find();
		}else{
			$ret['code'] = -1;
			$ret['msg'] = '无模型，数据错误';
			break;
		}
		$classname =ucfirst(strtolower($result['class']));
		import('Common/Vendor/Model/'.$classname);		
		$class    = new $classname();
		if($_POST){
			$return = array("state"=>-1,"msg"=>'',"data"=>"");
			do{	
				$datanew = $_POST;
				//if(get_magic_quotes_gpc()){
					foreach($datanew as $key=>$val){
						$data[$key] = stripslashes($val);
					}
				//}
				//检查数据
				$checkresult = $class->checkData($data);				
				if($checkresult['code']!=1){
					$ret = $checkresult;
					break;
				}
				//整理数据
				$data = $class->filter($data);				
				$content = M($classname);			
				//对栏目进行过滤
				if(!$data['typeid'] || $data['typeid']==-1){
					$ret['code'] = -1;
					$ret['msg'] = '请选择栏目';
					break;			
				}
				if(!$data['aid']){
					$ret['code'] = -1;
					$ret['msg'] = '更新数据出错';
					break;	
				}
				$map['aid'] = $data['aid'];
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
			$cate  = M('cate')->select();
			$cate = $this->unlimitedForLevel($cate);
			$content = M($classname);			
			$where['aid'] =$aid;
			$detail_info = $content->where($where)->find();			
			$html = $class->edit_html($detail_info);			
			$this->assign('html',$html);
			$this->assign('mid',$mid);				
			$this->assign('cate',$cate);
			$this->assign('detail_info',$detail_info);				
			$this->display('content/content/content_upd');			
		}		
	}
	
	//内容删除
	public function content_del(){
		$return = array("state"=>-1,"msg"=>'',"data"=>"");
		do{ 	
		
			$id =  $_REQUEST ['id'];
			$mid =  $_REQUEST ['mid'];
			if($mid){
				$result = M('model')->where("id=".$mid)->find();
			}else{
				$ret['code'] = -1;
				$ret['msg'] = '无模型，数据错误';
				break;
			}
			$classname =ucfirst(strtolower($result['class']));			
			$content = M($classname);			
			$where['aid'] =$id;
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