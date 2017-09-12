<?php
/**
 * 登录控制器
 * Created by dengxiaolong 2057844718@qq.com.
 * Date: 2016/11/3
 */
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;

class CommonController extends Controller {

    protected $role;
	//自动执行方法
	public function _initialize(){
		 //rbac 自带的游客验证
        Rbac::checkLogin();
        //如果是Index模块另外判断
        if(strtoupper(CONTROLLER_NAME)=="INDEX"){
            if(!isset($_SESSION['uid'])){
                redirect(PHP_FILE.C('USER_AUTH_GATEWAY'));
            }
        }
        //验证权限
        if(!Rbac::AccessDecision()){
            if(IS_AJAX){
                $this->ajaxReturn(array("code"=>-1,"msg"=>'没有权限',"data"=>""));
            }else
                $this->error("没有权限");
        }
		$this->check_login();
	}
	//判断是否登录,如果登录，则返回相应的角色ID
	private function check_login(){
		//赋值相应角色ID
        $role = $_SESSION['role_id'];
        $role =($role==20)?2:$role;      //超级管理员给予角色2系统管理员
        $this->role = $role;
		$this->assign("role",$role);
	}

    protected function usrInfo(){
        $userInfo['uid']  = $_SESSION['uid'];
        $userInfo['name'] = $_SESSION['user'];
        $userInfo['role'] = $this->role;
        return $userInfo;
    }

}