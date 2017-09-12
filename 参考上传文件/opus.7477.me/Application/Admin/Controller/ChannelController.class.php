<?php
/**
 * 分类管理
 * Created by dengxiaolong  2057844718@qq.com.
 * Date: 2016/11/4
 */
namespace Admin\Controller;
use Think\Controller;

class ChannelController extends CommonController {
    
    //分类列表
    public function cateList() {
		$cate=D('channel')->getTreeList();
		$this->assign('treeList',$cate);
        $this->display();
    }
	
	//添加分类
    public function add() {
	    if(IS_POST){
			$data['name'] = I('post.title','','htmlspecialchars');
			$data['des'] = I('post.des','','htmlspecialchars');
			$data['pid'] = I('post.pid','','intval');
			$data['addtime'] = time();	
			$result = M('channel')->add($data);
			if($result){
				$arr['status']=true;
				$arr['content']="保存成功";
			}else{
				$arr['status']=false;
				$arr['content']="保存失败";
			}
			echo json_encode($arr);
		}else{
			$cate=D('channel')->getOptions();
			$this->assign('cate',$cate);
			$this->display();
		}
    }

	//删除分类
	public function del(){
		if(IS_AJAX){
			$data['cid'] = I('post.id');
			$map['pid'] = $data['cid'];
			if(M('channel')->where($map)->find()){
				echo json_encode(array('status'=>4,'error'=>'','msg'=>'对不起,请删除子分类!'));exit();
			}
			if(M('channel')->where($data)->delete()){
				echo json_encode(array('status'=>1,'error'=>'','msg'=>'分类删除成功!'));
			}else{
				echo json_encode(array('status'=>5,'error'=>M('channel')->getDbError(),'msg'=>'分类删除失败!'));
			}
		}else{
			$this->error('非法访问!');
		}
	}

	//编辑分类
	public function edit(){
		if(IS_POST){
			$data['name'] = I('post.title','','htmlspecialchars');
			$data['des'] = I('post.des','','htmlspecialchars');
			$data['pid'] = I('post.pid','','intval');
			$data['cid'] = I('post.cid','','intval');

			$map['cid'] = $data['cid'];			
			unset($data['cid']);
			if( M('channel')->where($map)->setField($data)){
				$this->success('编辑商品分类成功!',U('Cate/cateList'));
			}else{
				$this->error('编辑商品分类失败');
			}
		}else{
			//获取所有栏目
			$cate=D('channel')->getOptions();
			//获得当前栏目信息
			$cateinfo = M('channel')->find(I('get.cid'));
			$this->assign('cate',$cate);
			$this->assign('model',$cateinfo);
			$this->assign('catepidinfop',$cate[$cateinfo['pid']]);
			$this->display();
		}
	}

}