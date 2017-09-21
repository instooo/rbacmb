<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {	
	
    public function get_list($typeid){		
		//得到模型
		$result = M('cate a')
				  ->join('youzhan_model b on a.m_id = b.id')
				  ->where('typeid='.$typeid)
				  ->find();		
		//获取文章列表
		$list = M($result['form'])
				->where('typeid='.$typeid)
				->order('weight desc,aid desc')
				->select();
		return $list;
    }
	
	public function get_content($id,$typeid){		
		//得到模型
		$result = M('cate a')
				  ->join('youzhan_model b on a.m_id = b.id')
				  ->where('typeid='.$typeid)
				  ->find();		
		//获取文章列表
		$info = M($result['form'])
				->where('aid='.$id)				
				->find();		
		return $info;
    }
}