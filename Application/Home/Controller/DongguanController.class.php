<?php
namespace Home\Controller;
use Think\Controller;
class DongguanController extends Controller {
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
		 $this->display();
	}
	//企业年志
	public function year(){
		 $this->display();
	}
	//企业荣誉
	public function honor(){
		 $this->display();
	}
	//合作伙伴
	public function partner(){
		 $this->display();
	}
}