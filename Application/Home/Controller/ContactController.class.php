<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends Controller {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'contact' );
		$this->assign ( 'smalltitle', '联系我们' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
	}
    public function index(){
        $this->display();
    }
}