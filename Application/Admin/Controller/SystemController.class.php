<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\ArrayTree;

class SystemController extends CommonController {

    /**
     * 用户渠道管理
     * */
    public function userChannel() {
        $map = array();
        if ($_REQUEST['s_username']) {
            $this->assign('s_username', $_REQUEST['s_username']);
            $map['username'] = array('like', '%'.trim(htmlspecialchars($_REQUEST['s_username'])).'%');
        }
        $count = M('user')
            ->where($map)
            ->count();
        $page = new \Think\Page($count, 20);
        $list = M('user')
            ->field('id,username')
            ->where($map)
            ->order('create_time desc')
            ->limit($page->firstRow.','.$page->listRows)
            ->select();		
		$channel = M('user_channel uc')
            ->field('uc.user_id,uc.cid')           
            ->where(array('uc.user_id'=>array('in',array_column($list,'id'))))
            ->select();		
        foreach ($list as $k=>$v) {
            $temp = array();
            foreach ($channel as $vv) {
                if ($vv['user_id'] == $v['id']) {					
                    $str .= $vv['cid'].'-';
                    $temp[] = $vv;
                }
            }
            $list[$k]['channel_id'] = rtrim($str,'-');
            $list[$k]['clist'] = $temp;
            unset($str);
        }
		$memmap['subsign'] = 0;
		//获取一级渠道列表
		$clist1 = M('member_cps a','','DB_ZHU')
				->field('a.uid,a.username')
				->join('mygame_member_extend_info_cps b on b.uid = a.uid')
				->where($memmap)->select();		
        $this->assign('clist1', $clist1);
        $this->assign('list', $list);
        $this->assign('pagebar', $page->show());
        $this->display();
    }

    /**
     * 编辑用户渠道
     * */
    public function doEditUserChannel() {		
        $ret = array('code'=>-1,'msg'=>'');
        do{
            if (!IS_POST) {
                $ret['code'] = -2;
                $ret['msg'] = '非法提交';
                break;
            }
            $user_id = trim(htmlspecialchars($_REQUEST['user_id']));
            $channel = $_REQUEST['channel'];
            if (!is_numeric($user_id)) {
                $ret['code'] = -3;
                $ret['msg'] = '非法参数';
                break;
            }
            if (count($channel) == 0) {
                $ret['code'] = -4;
                $ret['msg'] = '渠道为空';
                break;
            }
            $uinfo = M('user')->where('id='.$user_id)->find();
            if (!$uinfo) {
                $ret['code'] = -5;
                $ret['msg'] = '账户不存在';
                break;
            }
			$channel_arr = array();
			foreach($_POST['channel'] as $key=>$val){
				$channel_arr[$key]['uid'] = $val;
				$channel_arr[$key]['uname'] = $_POST['channel_name'][$key];
			}
            //清除原有渠道权限
            M('user_channel','mygame_','DB_CONFIG_ZHU')->where('user_id='.$user_id)->delete();
            //重新添加渠道权限
            $cdata = array();
            foreach ($channel_arr as $val) {
                $temp = array();
                $temp['user_id'] = $user_id;
                $temp['cid'] = $val['uid'];
				$temp['cps_name'] = $val['uname'];
                $cdata[] = $temp;
            }
            $rs = M('user_channel','mygame_','DB_CONFIG_ZHU')->addAll($cdata);
            if (!$rs) {
                $ret['code'] = -6;
                $ret['msg'] = '添加失败';
                break;
            }
            $ret['code'] = 1;
            $ret['msg'] = '添加成功';
            break;
        }while(0);
        exit(json_encode($ret));
    }
}