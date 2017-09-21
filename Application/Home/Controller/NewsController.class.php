<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends CommonController {
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
		$typeid = 13;
		$list = $this->get_list($typeid);
		$this->assign('list',$list);			
        $this->display();
    }
	public function content(){
		$typeid = 13;
		$list = $this->get_list($typeid);
		$this->assign('list',$list);		
     
		//查找具体内容		
		$id = $_GET['id'];		
		$info = $this->get_content($id,$typeid);			
		$this->assign('info',$info);	
		$this->display();		
	}
}