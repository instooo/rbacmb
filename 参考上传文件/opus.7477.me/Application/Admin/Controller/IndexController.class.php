<?php
/**
 * 首页控制器
 * Created by qinfan qf19910623@gmail.com.
 * Date: 2016/11/2
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class IndexController extends CommonController {
   

    public function index() {
        $count = M('material')->count();
        $this->assign('count',$count);
		$user=M('user u')
             ->field('u.id,u.nickname,u.remark,u.info')
             ->join('left join '.C('DB_PREFIX').'role_user r on u.id=r.user_id')
             ->where(array('r.role_id'=>1))
             ->select();
		$this->assign('user',$user);
        $this->display();
    }

    public function main() {
        $this->display();
    }

}