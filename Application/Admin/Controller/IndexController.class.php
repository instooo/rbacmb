<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends CommonController {
    public function index(){
        $userid = $_SESSION['userid'];
        $userinfo = M('user')->where(array('id'=>$userid))->find();
        Vendor('IP.IP');
        $ipArr = \IP::find($userinfo['last_login_ip']);
        $userinfo['location'] = $ipArr[1].$ipArr[2];
        $this->assign('userinfo', $userinfo);
		$this->display();
    }
	public function top(){
		$this->display();
    }
	public function left(){
		$this->display();
    }
	public function right(){	
		$this->display();
    }	
}