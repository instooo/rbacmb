<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends CommonController {
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
		$typeid = $typeid?$typeid:33;
		$list = $this->get_list($typeid);	
		foreach($list as $key=>$val){
			$listnew[$key]=$val;
			$listnew[$key]['imgarr'] = explode("|",trim($val['img_duo'],"|"));
		}		
		$typeid =15;
		$des = $this->get_cate_info($typeid);	
		$this->assign('des',$des);		
		$this->assign('list',$listnew);		
		$this->assign ( 'typeid', $typeid );
        $this->display();
    }
}