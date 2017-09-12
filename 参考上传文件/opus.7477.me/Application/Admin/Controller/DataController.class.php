<?php
/**
 * 数据统计
 * Created by DaiLinLin
 * Date: 2016/11/2
 */
namespace Admin\Controller;
use Org\Util\CSV;
use Think\Controller;
use Think\Model;

class DataController extends CommonController {

    public function downDemo(){
        $csv = new CSV();
        $csv->header = array('素材ID','消耗(￥)','曝光','eCPM(￥)','eCTC(￥)','CTR(%)','点击量','注册','结果','备注');
        $arr =array(
            array('13','30.44','53526','1.21','1.21','0.046','66','1','双达标',''),
            array('14','30.01','191016','1.43','1.21','0.010','66','5','点击率达标',''),
            array('15','30.02','191016','1.43','1.21','0.010','66','5','成本达标',''),
            array('16','30.02','191016','1.43','1.21','0.010','66','5','转化率达标',''),
            array('17','30.03','191016','1.43','1.21','0.015','66','5','不达标','有病毒')
        );
        $csv->writeCSVDown('demo.csv',$arr);
    }

    /**
     * function: 批量测试
     * author：DaiLinLin
     * time:2016/12/26 18:02
     */
    public function batchTest(){
        if(IS_POST){
            $user = $this->usrInfo();
            if(!$user){
                $this->error('非法操作');
            }

            $csv = new CSV();
            $csv ->startRow = 1;
            $csv ->trim = true;
            $csv ->keys = array('mid','expend','show_num','ecpm','ectc','click_per','click_num','reg_num','status','suggestion');
            $arr = $csv->importCSV();
            if(is_array($arr)){
                $result = $this->validate($arr,$user['uid']);
                if(!$result){
                    foreach($arr as $k => $v){
                        $arr[$k]['click_per'] = trim($v['click_per'],'%');
                        $arr[$k]['ok_status'] = 0;
                        if($v['status']=='双达标'||$v['status']=='点击率达标'||$v['status']=='成本达标'||$v['status']=='转化率达标'){
                            $arr[$k]['status'] = 1;
                            switch($v['status']){
                                case '双达标':$arr[$k]['ok_status'] = 1;break;
                                case '点击率达标':$arr[$k]['ok_status'] = 2;break;
                                case '成本达标':$arr[$k]['ok_status'] = 3;break;
                                case '转化率达标':$arr[$k]['ok_status'] = 4;break;
                            }
                        }else{
                            $arr[$k]['status'] = 2;
                        }
                        $arr[$k]['ext2'] = $v['status'];
                        $arr[$k]['pjtime']  = time();
                        $arr[$k]['uid']  =  $user['uid'];
                        $arr[$k]['suggestion'] = $v['suggestion']==''?null:$v['suggestion'];
                    }
                    $ok = M("data")->addAll($arr);
                    if($ok){
                        $this->assign('list',array('<span style="color: red;font-size: large">批量测试数据插入成功<span>'));
                    }else{
                        $this->assign('list',array('<span style="color: red;font-size: large">批量测试数据插入失败<span>'));
                    }
                }else{
                    $this->assign('list',$result);
                }
            }else{
                $this->assign('list',array($csv->getError()));
            }
            $this->display('batcherror');
        }else{
            $this->display();
        }
    }


    /**
     * 业绩考核
     */
	public function index() {

        $uid = I('get.uid','','intval');
        if(!empty($uid)){
            $where['m.uid'] = $uid;
            $this->assign('uid',$uid);
        }

        $title = I('get.title','','htmlspecialchars');
        if(!empty($title)){
            $where['m.title'] = array('like','%'.$title.'%');
        }
        $starttime = I('get.starttime','','htmlspecialchars');
        $endtime = I('get.endtime','','htmlspecialchars');
        if(!empty($starttime)&&!empty($endtime)){
            $where['m.addtime'] = array('between',array(strtotime($starttime),strtotime($endtime)));
        }
        if(!empty($starttime)&&empty($endtime)){
            $where['m.addtime'] = array('gt',strtotime($starttime));
        }if(empty($starttime)&&!empty($endtime)){
            $where['m.addtime'] = array('lt',strtotime($endtime));
        }
        $status = I('get.status','','intval');
        if(!empty($status)&&$status>0){
            $where['a.status'] = $status;
        }
        $nickname = I('get.nickname','','htmlspecialchars');
        if(!empty($title)){
            $where['u.nickname'] = array('like','%'.$nickname.'%');
        }

        $model = M('data a');
        $count = $model
            ->join('left join '.C('DB_PREFIX').'material m on m.mid=a.mid left join '.C('DB_PREFIX').'user u on u.id=m.uid')
            ->where ($where)->count ();
        $Page  = new \Think\Page($count,15);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');

        $list = $model->field('a.id,a.click_per,a.ectc,a.expend,a.show_num,a.reg_num,a.click_num,a.status,a.pjtime,a.ext2,m.mid,m.title,u.nickname')
                      ->join('left join '.C('DB_PREFIX').'material m on m.mid=a.mid left join '.C('DB_PREFIX').'user u on u.id=m.uid')
                      ->where($where)
                      ->order ('a.id desc')
                      ->limit($Page->firstRow.','.$Page->listRows)
                      ->select();

        $this->assign('list',$list);
        $this->assign('page',$Page->show());
        $this->display();
    }

    /**
     * 测试人达标率
     */
    public function standard(){

        $addtime = I('get.starttime','','htmlspecialchars');
        $endtime = I('get.endtime','','htmlspecialchars');

        $startTime = strtotime($addtime);
        $endTime = strtotime($endtime);
        if((!empty($addtime)&&empty($endTime))){
            $where = 'and pjtime>'.$startTime;
        }
        if((!empty($endTime)&&empty($addtime))){
            $where = 'and pjtime<'.$startTime;
        }
        if((!empty($endTime)&&!empty($addtime))){
            $where = 'and pjtime between '.$startTime.' and '.$endTime;
        }

        $model = new Model();

        //测试人达标率
        $sql = 'SELECT COUNT(CASE WHEN d.status =1 THEN 1 END) as num,
                COUNT(CASE WHEN d.ok_status =1 THEN 1 END) as doublenum,
                COUNT(CASE WHEN d.ok_status =2 THEN 1 END) as clicknum,
                COUNT(CASE WHEN d.ok_status =3 THEN 1 END) as costnum,
                COUNT(CASE WHEN d.ok_status =4 THEN 1 END) as changenum,
                COUNT(d.id) as total,u.nickname FROM opus_material m
                LEFT JOIN opus_data d ON m.mid=d.mid LEFT JOIN opus_user u ON d.uid=u.id WHERE u.id IS NOT NULL '.$where.' GROUP BY d.uid';
        $users = $model->query($sql);
        $this->assign('users',$users);

        //上传人达标率
        $sql = 'SELECT COUNT(CASE WHEN d.status =1 THEN 1 END) as num,
                COUNT(CASE WHEN d.ok_status =1 THEN 1 END) as doublenum,
                COUNT(CASE WHEN d.ok_status =2 THEN 1 END) as clicknum,
                COUNT(CASE WHEN d.ok_status =3 THEN 1 END) as costnum,
                COUNT(CASE WHEN d.ok_status =4 THEN 1 END) as changenum,
                COUNT(d.id) as total,u.nickname FROM opus_material m
                LEFT JOIN opus_data d ON m.mid=d.mid LEFT JOIN opus_user u ON m.uid=u.id WHERE  1=1 '.$where.' GROUP BY m.uid';
        $uploads = $model->query($sql);
        $this->assign('uploads',$uploads);

        //尺寸达标率
        $sql = 'SELECT COUNT(CASE WHEN d.status =1 THEN 1 END) as num,
                COUNT(CASE WHEN d.ok_status =1 THEN 1 END) as doublenum,
                COUNT(CASE WHEN d.ok_status =2 THEN 1 END) as clicknum,
                COUNT(CASE WHEN d.ok_status =3 THEN 1 END) as costnum,
                COUNT(CASE WHEN d.ok_status =4 THEN 1 END) as changenum,
                COUNT(d.id) as total,m.size FROM opus_material m
                LEFT JOIN opus_data d ON m.mid=d.mid WHERE 1=1 '.$where.' GROUP BY m.size';
        $sizes = $model->query($sql);
        $this->assign('sizes',$sizes);

        //分类达标率
        $sql = 'SELECT COUNT(CASE WHEN d.status =1 THEN 1 END) as num,
                COUNT(CASE WHEN d.ok_status =1 THEN 1 END) as doublenum,
                COUNT(CASE WHEN d.ok_status =2 THEN 1 END) as clicknum,
                COUNT(CASE WHEN d.ok_status =3 THEN 1 END) as costnum,
                COUNT(CASE WHEN d.ok_status =4 THEN 1 END) as changenum,
                COUNT(d.id) as total,c.name FROM opus_material m
                LEFT JOIN opus_data d ON m.mid=d.mid LEFT JOIN opus_cate c ON m.catid=c.cid WHERE 1=1 '.$where.' GROUP BY c.cid';
        $cate = $model->query($sql);
        $this->assign('cate',$cate);

        //游戏达标率
        $sql = 'SELECT COUNT(CASE WHEN d.status =1 THEN 1 END) as num,
                COUNT(CASE WHEN d.ok_status =1 THEN 1 END) as doublenum,
                COUNT(CASE WHEN d.ok_status =2 THEN 1 END) as clicknum,
                COUNT(CASE WHEN d.ok_status =3 THEN 1 END) as costnum,
                COUNT(CASE WHEN d.ok_status =4 THEN 1 END) as changenum,
                COUNT(d.id) as total,m.game FROM opus_material m
                LEFT JOIN opus_data d ON m.mid=d.mid WHERE 1=1 '.$where.' GROUP BY m.game';
        $game = $model->query($sql);
        $this->assign('game',$game);

        //总达标率
        $sql='SELECT COUNT(CASE WHEN d.status =1 THEN 1 END) as num,
                COUNT(CASE WHEN d.ok_status =1 THEN 1 END) as doublenum,
                COUNT(CASE WHEN d.ok_status =2 THEN 1 END) as clicknum,
                COUNT(CASE WHEN d.ok_status =3 THEN 1 END) as costnum,
                COUNT(CASE WHEN d.ok_status =4 THEN 1 END) as changenum,
                COUNT(d.id) as total,m.size FROM opus_material m
                LEFT JOIN opus_data d ON m.mid=d.mid WHERE 1=1 '.$where;
        $count = $model->query($sql);
        $this->assign('count',$count);

        $this->display();
    }

    public function log(){

        $count =  M('message_log')->where(array('type'=>3))->count ();
        $Page  = new \Think\Page($count,20);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $log = M('message_log')->where(array('type'=>3))->order ('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('page',$Page->show());
        $this->assign('log',$log);

        $this->display();
    }

    private function validate($data,$userid){
        $error = array();
        $mids = array();
        foreach($data as $key =>$value){
            //注册参数大于0的正整数
            $reg_num = (int)$value['reg_num'];
            if(!is_integer($reg_num)||$reg_num<0){
                $error[$key] .= ' 注册大于0的正整数,';
            }

            //消耗是money
            if(!maxFloat($value['expend'])){
                $error[$key] .= ' 消耗数据错误,最多保留小数点后两位';
            }

            //曝光量
            $show_num = (int)$value['show_num'];
            if(!is_integer($show_num)||$show_num<0){
                $error[$key] .= ' 曝光大于0的正整数,';
            }

            //点击均价
            if(!maxFloat($value['ectc'])){
                $error[$key] .= ' eCPC格式据错误,最多保留小数点后两位';
            }

            //点击率
            $click_per = trim($value['click_per'],'%');
            if(!maxFloat($click_per,3)){
                $error[$key] .= ' CTR格式据错误,最多保留小数点后三位的百分比数';
            }

            //状态参数
            $status = $value['status'];
            if(!($status=='双达标'||$status=='点击率达标'||$status=='成本达标'||$status=='转化率达标'||$status=='不达标')){
                $error[$key] .= ' 结果状态参数:'.$status.'错误。只能为双达标、点击率达标、成本达标、转化率达标、不达标';
            }

            $map['mid'] =$value['mid'];
            $map['status'] = 1;
            $info = M("material")->where ($map)->select();
            if(!$info){
                $error[$key] .= ' 本素材id='.$value['mid'].'不存在或没有审核';
            }

            $where['mid'] = $value['mid'];
            $where['uid'] = $userid;
            $info =M("data")->where ($where)->select();
            if($info){
                $error[$key] .= ' 本列id='.$value['mid'].'是已经过测试的素材,';
            }

        }
        return empty($error)?false:$error;
    }

}