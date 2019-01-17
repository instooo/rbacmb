<?php
namespace Wap\Controller;
use Think\Controller;
class JoinController extends CommonController {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'join' );
		$this->assign ( 'smalltitle', '加入我们' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
		
		$tid = 10;
		$banner_list = $this->get_model_list('ad',$tid,1);
		$this->assign('banner_list',$banner_list);
	}
    public function index(){
       
		$typeid =22;
		$list = $this->get_list($typeid);			
		$this->assign('list',$list);
        $this->display();
    }
	public function us(){
        $typeid =23;
		$list = $this->get_list($typeid);			
		$this->assign('list',$list);
        $this->display();
    }
}