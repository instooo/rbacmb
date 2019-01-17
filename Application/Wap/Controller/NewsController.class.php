<?php
namespace Wap\Controller;
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
		
		$tid = 7;
		$banner_list = $this->get_model_list('ad',$tid,1);
		$this->assign('banner_list',$banner_list);
	}
    public function index(){
		$typeid = 13;
		$data = $this->get_list_page($typeid,4);
		$topdata = $this->get_top_list($typeid,1);
		$this->assign('list',$data['list']);
		$this->assign('page',$data['page']);	
		$this->assign('topdata',$topdata);			
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