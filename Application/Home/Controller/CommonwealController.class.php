<?php
namespace Home\Controller;
use Think\Controller;
class CommonwealController extends CommonController {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'commonweal' );
		$this->assign ( 'smalltitle', '加入我们' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
	}
    public function index(){
		
		$typeid =21;
		$des = $this->get_cate_info($typeid);		
		
		$typeid =42;
		$list = $this->get_list($typeid);	
		
		$this->assign('list',$list);		
		$this->assign('des',$des);	
		
        $this->display();
    }
}