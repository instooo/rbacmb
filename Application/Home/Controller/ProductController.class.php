<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'product' );
		$this->assign ( 'smalltitle', '集团产业' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
	}
    public function index(){
		$typeid = $_GET['id'];
		$this->assign ( 'typeid', $typeid );
        $this->display();
    }
}