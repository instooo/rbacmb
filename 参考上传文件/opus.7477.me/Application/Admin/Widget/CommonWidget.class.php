<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/5
 * Time: 19:10
 */
namespace Admin\Widget;
use Admin\Model\CateModel;
use Admin\Model\ChannelModel;
use Think\Controller;

class CommonWidget extends Controller
{
    /**
     * 所有分类一级分类
     */
    public function cate()
    {
        $list = M('cate')->field('cid,name,pid')->select();

        $cate = new CateModel();
        $list = $cate->getTree($list);

        $cid = I('get.cid',0,'intval');
        $class =  $cid==0?'on':'';
        $string = '<a class="'.$class.'" data-cid="0">全部</a>';
        foreach($list as $item){
            $class =  $cid==$item['cid']?'on':'';
            $color = 0==$item['pid']?'color: #009900':'';
            $string .='<a class="'.$class.'" style="'.$color.'" data-cid="'.$item['cid'].'">'.$item['name'].'</a>';
        }
        echo $string;
    }

    /**
     * 所有媒体
     */
    public function channel()
    {
        $list = M('channel')->field('cid,name,pid')->select();

        $cate = new ChannelModel();
        $list = $cate->getTree($list);

        $cid = I('get.chanid',0,'intval');
        $class =  $cid==0?'on':'';
        $string = '<a class="'.$class.'" data-cid="0">全部</a>';
        foreach($list as $item){
            $class =  $cid==$item['cid']?'on':'';
            $color = 0==$item['pid']?'color: #009900':'';
            $string .='<a class="'.$class.'" style="'.$color.'" data-cid="'.$item['cid'].'">'.$item['name'].'</a>';
        }
        echo $string;
    }

    public function orderList(){
        $string = '';
        $order = I('get.order','','htmlspecialchars');
        $click = $order=='click'?'on':'';
        $id = $order=='id'?'on':'';
        $reg = $order=='reg'?'on':'';
        $time = $order=='time'?'on':'';

        $string .='<a class="alink '.$id.'" data-order="id">综合</a>';
        $string .='<a class="alink '.$click.'"  data-order="click">点击率</a>';
        $string .='<a class="alink '.$reg.'"  data-order="reg">注册</a>';
        $string .='<a class="alink '.$time.'"  data-order="time">时间</a>';
        echo $string;
    }

    public function searchType(){
        $model = I('get.search_mode','','htmlspecialchars');
        switch($model){
            case 'photo':$string = 'swf素材';break;
            case 'vector':$string = 'flv动画';break;
            case 'video': $string='MP4视频';break;
            default: $string='全部作品';
        }
        echo $string;
    }

    public function title(){
        $status = I('get.status','','intval');
        $test = I('get.test','','htmlspecialchars');
        $mt_status = I('get.mt_status','','intval');
        $string = '素材列表';
        if($status==1){
            $string = '已审核作品';
        }
        if($status==2){
            $string = '未审核作品';
        }
        if($mt_status==1){
            $string = '媒体达标作品';
        }
        if($mt_status==2){
            $string = '媒体未通过作品';
        }
        if($status==1&&$test=='true'){
            $string = '已测试作品';
        }
        if($status==1&&$test=='false'){
            $string = '未测试作品';
        }
        if($status==1&&$mt_status==1){
            $string = '测试通过作品';
        }
        if($status==1&&$mt_status==2){
            $string = '测试未通过作品';
        }
        echo $string;
    }

}