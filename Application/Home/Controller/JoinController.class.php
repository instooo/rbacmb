<?php
namespace Home\Controller;
use Think\Controller;
class JoinController extends Controller {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'join' );
		$this->assign ( 'smalltitle', '加入我们' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
	}
    public function index(){
        $this->display();
    }
	public function us(){
        $this->display();
    }
}