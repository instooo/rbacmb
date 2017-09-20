<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {	
	
    public function get_list($typeid){		
		//得到模型
		$result = M('cate a')
				  ->join('youzhan_model b')
				  ->where('typeid='.$typeid)
				  ->find();
		//获取文章列表
		$list = M($result['form'])
				->where('typeid='.$typeid)
				->order('weight desc,aid desc')
				->select();
		return $list;
    }
}