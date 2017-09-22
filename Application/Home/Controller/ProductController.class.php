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
	//首页
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
	//城市更新
	public function update(){
		$typeid =38;
		$des = $this->get_cate_info($typeid);
		
		$typeid =29;
		$list = $this->get_list($typeid);	
		foreach($list as $key=>$val){
			$listnew[$key]=$val;
			$listnew[$key]['imgarr'] = explode("|",trim($val['img_duo'],"|"));
		}		
		$this->assign('list',$listnew);		
		$this->assign('des',$des);	
		$this->display();
	}
	//置业投资
	public function invest(){
		$typeid =39;
		$des = $this->get_cate_info($typeid);
		
		$typeid =19;
		$list = $this->get_list($typeid);	
		foreach($list as $key=>$val){
			$listnew[$key]=$val;
			$listnew[$key]['imgarr'] = explode("|",trim($val['img_duo'],"|"));
		}		
		$this->assign('list',$listnew);		
		$this->assign('des',$des);	
		$this->display();
	}
	//置业投资
	public function service(){
		$typeid =20;
		$des = $this->get_cate_info($typeid);
		
		$typeid =40;
		$list = $this->get_list($typeid);			
		$this->assign('toplist',$list);

		$typeid =41;
		$list = $this->get_list($typeid);			
		$this->assign('botlist',$list);
		
		$this->assign('des',$des);	
		$this->display();
	}
	
}