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
		$cate = M('cate')->select();
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

}