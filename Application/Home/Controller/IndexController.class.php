<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'index' );
		$this->assign ( 'smalltitle', '首页' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
	}
    public function index(){
		$typeid = 13;
		$list = $this->get_list($typeid);
		
		$tid = 5;
		$banner_list = $this->get_model_list('ad',$tid);
		
		$this->assign('list',$list);
		$this->assign('banner_list',$banner_list);
        $this->display();
    }
}