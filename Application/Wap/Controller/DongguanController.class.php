<?php
namespace Wap\Controller;
use Think\Controller;
class DongguanController extends CommonController {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'dongguan' );
		$this->assign ( 'smalltitle', '走进东关' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
		
		$tid = 14;
		$banner_list = $this->get_model_list('ad',$tid,1);
		$this->assign('banner_list',$banner_list);
		
	}
	//
    public function index(){
		
		$typeid =36;
		$dgjt = $this->get_cate_info($typeid);		
		$typeid =37;
		$jtzdr = $this->get_cate_info($typeid);	
		
		$this->assign('dgjt',$dgjt);
		$this->assign('jtzdr',$jtzdr);

        //企业理念
        $typeid = 28;
        $list = $this->get_list($typeid);
        $this->assign('list',$list);

        //企业年志
        $typeid = 24;
        $list = $this->get_list($typeid);
        $this->assign('countnz',count($list));
        $this->assign('listnz',$list);

        //企业荣誉
        $typeid = 25;
        $list = $this->get_list($typeid);
        $this->assign('country',count($list));
        $this->assign('listry',$list);

        //合作伙伴
        $typeid = 26;
        $list = $this->get_list($typeid);
        $this->assign('listp',$list);
        $this->display();
    }
}