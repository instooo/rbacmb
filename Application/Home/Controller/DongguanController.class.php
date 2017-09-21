<?php
namespace Home\Controller;
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
	}
	//
    public function index(){
        $this->display();
    }
	//企业理念
	public function idea(){
		 $typeid = 28;
		 $list = $this->get_list($typeid);		
		 $this->assign('list',$list);
		 $this->display();
	}
	//企业年志
	public function year(){
		 $typeid = 24;
		 $list = $this->get_list($typeid);		
		 $this->assign('list',$list);		 
		 $this->display();
	}
	//企业荣誉
	public function honor(){
		 $typeid = 25;
		 $list = $this->get_list($typeid);		
		 $this->assign('list',$list);
		 $this->display();
	}
	//合作伙伴
	public function partner(){
		 $typeid = 26;
		 $list = $this->get_list($typeid);		
		 $this->assign('list',$list);
		 $this->display();		
	}
}