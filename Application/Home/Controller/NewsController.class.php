<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'news' );
		$this->assign ( 'smalltitle', '新闻中心' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
	}
    public function index(){
        $this->display();
    }
}