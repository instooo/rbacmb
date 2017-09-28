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
	//获取分页数据
	public function get_list_page($typeid,$num=10){		
		//得到模型
		$result = M('cate a')
				  ->join('youzhan_model b on a.m_id = b.id')
				  ->where('typeid='.$typeid)
				  ->find();	

		$count =  M($result['form'])
				->where('typeid='.$typeid)
				->count();	
		$page = new \Think\Page($count, $num);
		
		//获取文章列表
		$list = M($result['form'])
				->where('typeid='.$typeid)
				->limit($page->firstRow.','.$page->listRows)
				->order('weight desc,aid desc')
				->select();
		$data['list'] = $list ;
		$data['page'] = $page->show () ;
		return $data;
    }
	
	//获取推荐数据
	public function get_top_list($typeid,$num=1){
		//得到模型
		$result = M('cate a')
				  ->join('youzhan_model b on a.m_id = b.id')
				  ->where('typeid='.$typeid)
				  ->find();	
		//获取文章列表
		$list = M($result['form'])
				->where('typeid='.$typeid)		
				->limit($num)
				->order('weight desc,aid desc')
				->select();	
		return $list;
	}
	
	//获得单页栏目内容
	public function get_cate_info($typeid){
		//得到内容
		$info = M('cate a')				 
				  ->where('typeid='.$typeid)
				  ->find();
		return $info;			
	}
	//获得单片文章内容
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
	
	//获取指定模型数据
	public function get_model_list($class,$typeid,$limit=20){			
		//获取文章列表
		$list = M($class)
				->where('typeid='.$typeid)
				->limit($limit)
				->order('weight desc,id desc')
				->select();
		return $list;
    }
}