<?php
/**
 * 首页控制器
 * Created by qinfan qf19910623@gmail.com.
 * Date: 2016/11/2
 */
namespace Admin\Controller;
use Think\Controller;

class SystemController extends CommonController {
 	
	//上传视屏展示
	public function index() {

        $today=strtotime(date('Y-m-d 00:00:00'));

        //今日测试
        $test = M('data')->where(array('time'=>array('egt',$today)))->count();
        $this->assign('test',$test);

        //今日添加
        $add = M('material')->where(array('addtime'=>array('egt',$today)))->count();
        $this->assign('add',$add);

        //今日评论
        $discuss = M('discuss')->where(array('time'=>array('egt',$today)))->count();
        $this->assign('discuss',$discuss);

        //今日达标
        $map['time']= array('egt',$today);
        $map['status']= 1;
            $good = M('data')->where($map)->count();
        $this->assign('good',$good);
        $this->display();
    }

    /**
     * 删除某个素材相关数据
     * 包括素材、测试数据、评论数据
     * 这是很危险的操作要在message_log记录行为
     */
    public function delMedia(){
        $mid = I('mid','','intval');
        $map['mid']= $mid;
        $material = M('material')->where($map)->find();
        $data = M('data')->where($map)->find();
        if($material['status']==1&&!$data){
                @unlink('.'.$material['thumb']);
                @unlink('.'.$material['remote_url']);
                M('material')->where($map)->delete();
                M('discuss')->where($map)->delete();

                $user = $this->usrInfo();
                $data['uid'] = $user['uid'];
                $data['mid'] = $mid;
                $data['type'] = 3;
                $data['message'] = '用户'.$user['uid'].':'.$user['name'].',删除了ID：'.$mid.',名称：'.$material['title'].'的素材';
                $data['time'] = time();
                $result = M('message_log')->add($data);
                if($result){
                        $this->success('删除成功',U('media/myMedia'));
                }else{
                        $this->error('删除异常');
                }
        }else{
                $this->error('此素材已经测试或未审核不能删除');
        }
    }
}