<?php
/**
 * 权限控制
 * Created by dengxiaolong qf19910623@gmail.com.
 * Date: 2017/08/23
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class ReportController extends CommonController {

    public function _initialize() {
        parent::_initialize();
    }

    //CPS用户收入汇总
    public function spend_all() {		
		//接受参数
		/*对时间的处理-start*/
        $nowtime = time()-3600*24;
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
		
        $start_date = date('Ymd',strtotime($start.' 12:00:00')); //充值开始时间
        $end_date = date('Ymd',strtotime($end.' 12:00:00'));     //充值结束时间
        if (!$start) {
            $start = date('Y-m-d', $nowtime);
            $start_date = date('Ymd', $nowtime);
        }
        if (!$end) {
            $end = date('Y-m-d', $nowtime);
			$end_date = date('Ymd', $nowtime);          
        }
		$this->assign('start', $start);
        $this->assign('end', $end);
		$time_str = " and (date between ".$start_date." and ".$end_date. ")";	
		
		
		//接受参数-end
		//获取选择的游戏
		$gameid = $_REQUEST['gameid'];		
		$gameid = trim($gameid,',');
		$this->assign('gameid',$gameid);
		//获取选择的媒体
		$cpsid = trim($_REQUEST['cpsid'],',');
		$cpsid = trim($cpsid,',');
		$this->assign('cpsid',$cpsid);
		
		//查看媒体权限
		$map_m['user_id'] = $this->meminfo['id'];
		$midarr_result = M('user_channel a')
						->field('a.cid,a.user_id,b.username,a.cps_name')
						->join('mygame_user b on a.user_id = b.id')
						->where($map_m)
						->select();
		$this->assign('midarr_result',$midarr_result);
		
		$midarr = array_column($midarr_result,'cid');
		if($cpsid){
			$where = " total_channels in (".$cpsid.")" ;
		}elseif($midarr){
			$str =implode(',',$midarr);
			$where = " total_channels in (".$str.")" ;
		}else{			
			$where =" total_channels =-1";
		}
		$cpsarr =array();
		foreach($midarr_result as $key=>$val){
			$cpsarr[$val['cid']]=$val;
		}
		
		if($gameid){
			$gamewhere =" and gid in (".$gameid.")" ;
		}
		
		//统计数据
		$model = M('','','DB_TONGJI');
		$sql = "select `gid`,`total_channels`,sum(`total_money`) as total_money from tongji_spend_bygid where ".$where.$gamewhere.$time_str." group by total_channels,gid";
		$result = $model->query($sql);
		
		//查找所有游戏
		if($gameid){
			$gidarr = explode(',',$gameid);				
		}else{
			$gidarr = array_unique(array_column($result,'gid'));		
		}		
		$game = M('game','mygame_','DB_ZHU');
		$gamelist_all = $game->field('gid,gamename,short')->select();		
		$this->assign('gamelist_all',$gamelist_all);
		$this->assign('game_list',$gamelist_all);	
		
		//处理数据
		$meiti_arr =array();	
		$game_money=array();
		$gidlist=array();		
		foreach($result as $key=>$val){
			$gidlist[] = $val['gid'];
			//计算每款游戏多少钱	
			$game_money[$val['gid']]+=$val['total_money'];
			//计算总共多少钱
			$total_money +=$val['total_money'];
			if(in_array($val['gid'],$gidarr)){
				$meiti_arr[$cpsarr[$val['total_channels']]['cps_name']][$val['gid']] = $val['total_money'];
			}else{
				$meiti_arr[$cpsarr[$val['total_channels']]['cps_name']][$val] =0;	
			}
			$meiti_arr[$cpsarr[$val['total_channels']]['cps_name']]['money'] +=$val['total_money'];;	
		}
		/*对时间的处理-end*/
		$last_gamelist = array();		
		foreach($gamelist_all as $key=>$val){			
			if(in_array($val['gid'],array_unique($gidlist))){
				$last_gamelist[]=$val;
			}
		}		
		//由多少列
		$count = count($last_gamelist);
		$this->assign('count',$count);
		$this->assign('gamelist',$last_gamelist);
		$this->assign('meiti_arr',$meiti_arr);
		$this->assign('game_money',$game_money);
		$this->assign('total_money',$total_money);
        $this->display();
    }

	//cps月度当月cps汇总
    public function spend_now() {		
		//接受参数
		/*对时间的处理-start*/
        $nowtime = time()-3600*24;
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
		
        $start_date = date('Ymd',strtotime($start.' 12:00:00')); //充值开始时间
        $end_date = date('Ymd',strtotime($end.' 12:00:00'));     //充值结束时间
        if (!$start) {
            $start = date('Y-m-d', $nowtime);
            $start_date = date('Ymd', $nowtime);
        }
        if (!$end) {
            $end = date('Y-m-d', $nowtime);
			$end_date = date('Ymd', $nowtime);          
        }
		$this->assign('start', $start);
        $this->assign('end', $end);
		
		$reg_start = $_REQUEST['reg_start_input'];
        $reg_end = $_REQUEST['reg_end_input'];
		
		$reg_start_date = date('Ymd',strtotime($reg_start.' 12:00:00')); //充值开始时间
        $reg_end_date = date('Ymd',strtotime($reg_end.' 12:00:00'));     //充值结束时间
        if (!$reg_start) {
            $reg_start = date('Y-m-d', $nowtime);
            $reg_start_date = date('Ymd', $nowtime);
        }
        if (!$reg_end) {
            $reg_end = date('Y-m-d', $nowtime);
			$reg_end_date = date('Ymd', $nowtime);          
        }
		$this->assign('reg_start', $reg_start);
        $this->assign('reg_end', $reg_end);
		//条件
		$time_str = " and (date between ".$start_date." and ".$end_date. ") and (redate between ".$reg_start_date." and ".$reg_end_date.")";		
		/*对时间的处理-end*/		
		
		//接受参数-end
		//获取选择的游戏
		$gameid = $_REQUEST['gameid'];		
		$gameid = trim($gameid,',');
		$this->assign('gameid',$gameid);
		//获取选择的媒体
		$cpsid = trim($_REQUEST['cpsid'],',');
		$cpsid = trim($cpsid,',');
		$this->assign('cpsid',$cpsid);
		
		//查看媒体权限
		$map_m['user_id'] = $this->meminfo['id'];
		$midarr_result = M('user_channel a')
						->field('a.cid,a.user_id,b.username,a.cps_name')
						->join('mygame_user b on a.user_id = b.id')
						->where($map_m)
						->select();
		$this->assign('midarr_result',$midarr_result);
		
		$midarr = array_column($midarr_result,'cid');
		if($cpsid){
			$where = " total_channels in (".$cpsid.")" ;
		}elseif($midarr){
			$str =implode(',',$midarr);
			$where = " total_channels in (".$str.")" ;
		}else{			
			$where =" total_channels =-1";
		}
		$cpsarr =array();
		foreach($midarr_result as $key=>$val){
			$cpsarr[$val['cid']]=$val;
		}
		
		if($gameid){
			$gamewhere =" and gid in (".$gameid.")" ;
		}
		
		//统计数据
		$model = M('','','DB_TONGJI');
		$sql = "select `gid`,`total_channels`,sum(`money`) as total_money from tongji_spend_data where ".$where.$gamewhere.$time_str." group by total_channels,gid";
		
		$result = $model->query($sql);
		
		//查找所有游戏
		if($gameid){
			$gidarr = explode(',',$gameid);				
		}else{
			$gidarr = array_unique(array_column($result,'gid'));		
		}		
		$game = M('game','mygame_','DB_ZHU');
		//$gamemap['gid']= array('in',$gidarr);
		//$gamelist = $game->field('gid,gamename,short')->where($gamemap)->select();		
			

		$gamelist_all = $game->field('gid,gamename,short')->select();
		$this->assign('game_list',$gamelist_all);				
		$this->assign('gamelist_all',$gamelist_all);
		
		//处理数据
		$meiti_arr =array();	
		$game_money=array();
		$gidlist=array();		
		foreach($result as $key=>$val){
			$gidlist[] = $val['gid'];
			//计算每款游戏多少钱	
			$game_money[$val['gid']]+=$val['total_money'];
			//计算总共多少钱
			$total_money +=$val['total_money'];
			if(in_array($val['gid'],$gidarr)){
				$meiti_arr[$cpsarr[$val['total_channels']]['cps_name']][$val['gid']] = $val['total_money'];
			}else{
				$meiti_arr[$cpsarr[$val['total_channels']]['cps_name']][$val] =0;	
			}
			$meiti_arr[$cpsarr[$val['total_channels']]['cps_name']]['money'] +=$val['total_money'];;	
		}
		
		$last_gamelist = array();		
		foreach($gamelist_all as $key=>$val){			
			if(in_array($val['gid'],array_unique($gidlist))){
				$last_gamelist[]=$val;
			}
		}		
		//由多少列
		$count = count($last_gamelist);
		$this->assign('count',$count);
		$this->assign('gamelist',$last_gamelist);
		$this->assign('meiti_arr',$meiti_arr);
		$this->assign('game_money',$game_money);
		$this->assign('total_money',$total_money);
        $this->display();
    }

	//媒体成本汇总
    public function cb_data() {		
		//接受参数
		/*对时间的处理-start*/
        $nowtime = time()-3600*24;
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
		
        $start_date = date('Ymd',strtotime($start.' 12:00:00')); //充值开始时间
        $end_date = date('Ymd',strtotime($end.' 12:00:00'));     //充值结束时间
        if (!$start) {
            $start = date('Y-m-d', $nowtime);
            $start_date = date('Ymd', $nowtime);
        }
        if (!$end) {
            $end = date('Y-m-d', $nowtime);
			$end_date = date('Ymd', $nowtime);          
        }
		$this->assign('start', $start);
        $this->assign('end', $end);	
		
		//条件
		$time_str = " and (date between ".$start_date." and ".$end_date.")";		
		/*对时间的处理-end*/		
		
		//接受参数-end
		//获取选择的游戏
		$gameid = $_REQUEST['gameid'];		
		$gameid = trim($gameid,',');
		$this->assign('gameid',$gameid);
		//获取选择的媒体
		$cpsid = trim($_REQUEST['cpsid'],',');
		$cpsid = trim($cpsid,',');
		$this->assign('cpsid',$cpsid);
		
		//查看媒体权限
		$map_m['user_id'] = $this->meminfo['id'];
		$midarr_result = M('user_channel a')
						->field('a.cid,a.user_id,b.username,a.cps_name')
						->join('mygame_user b on a.user_id = b.id')
						->where($map_m)
						->select();
		$this->assign('midarr_result',$midarr_result);
		
		$midarr = array_column($midarr_result,'cid');
		if($cpsid){
			$where = " cps_id in (".$cpsid.")" ;
			$wheretj = " total_channels in (".$cpsid.")" ;
		}elseif($midarr){
			$str =implode(',',$midarr);
			$where = " cps_id in (".$str.")" ;
			$wheretj = " total_channels in (".$str.")" ;
		}else{			
			$where =" cps_id =-1";
			$wheretj =" total_channels =-1";
		}
		$cpsarr =array();
		foreach($midarr_result as $key=>$val){
			$cpsarr[$val['cid']]=$val;
		}
		
		if($gameid){
			$gamewhere =" and gid in (".$gameid.")" ;
		}
		
		$game = M('game','mygame_','DB_ZHU');
		$gamelist = $game->field('gid,gamename,short')->select();
		$this->assign('game_list',$gamelist);
		$gamearr = array();
		foreach($gamelist as $key=>$val){
			$gamearr[$val['gid']]=$val;
		}		
		//统计数据
		$model = M('');
		$sql = "select `m_id`,`date`,`cps_id`,`gid`,sum(`money`) as total_money from mygame_spend where ".$where.$gamewhere.$time_str." group by cps_id,gid,date";		
		$result = $model->query($sql);
		//查询这段时间的注册量
		$model = M('','','DB_TONGJI');
		$sql = "select `date`,`gid`,`total_channels`,sum(`register_num`) as register_num from tongji_day_member where ".$wheretj.$gamewhere.$time_str." group by total_channels,gid,date";		
		$register = $model->query($sql);
		
		//对数据进行重组
		$tmp_arr = array();
		foreach($register as $k=>$v){
			$tmp_arr[$v['date']]['game'][$v['gid']]['gid'] =$v['gid'];
			$tmp_arr[$v['date']]['game'][$v['gid']]['gamename'] =$gamearr[$v["gid"]]['gamename'];
			$tmp_arr[$v['date']]['game'][$v['gid']]['register'] +=$v['register_num'];
			$tmp_arr['cps'][] =$cpsarr[$v['total_channels']]['cps_name'];			
			$tmp_arr[$v['date']]['data'][$cpsarr[$v['total_channels']]['cps_name']][$v['gid']]['register']+=$v['register_num'];		
		}	
		$register_tmp =$tmp_arr;		
		foreach($result as $key=>$val){
			$tmp_arr[$val['date']]['game'][$val['gid']]['cbmoney'] +=$val['total_money'];
			$tmp_arr[$val['date']]['game'][$val['gid']]['gid'] =$val['gid'];
			$tmp_arr[$val['date']]['game'][$val['gid']]['gamename'] =$gamearr[$val["gid"]]['gamename'];
			$tmp_arr['cps'][] =$cpsarr[$val['cps_id']]['cps_name'];
			//避免被覆盖
			$tmp_arr[$val['date']]['data'][$cpsarr[$val['cps_id']]['cps_name']][$val['gid']]['m_id'] =$val['mid'];
			$tmp_arr[$val['date']]['data'][$cpsarr[$val['cps_id']]['cps_name']][$val['gid']]['date'] =$val['date'];
			$tmp_arr[$val['date']]['data'][$cpsarr[$val['cps_id']]['cps_name']][$val['gid']]['cps_id'] =$val['cps_id'];
			$tmp_arr[$val['date']]['data'][$cpsarr[$val['cps_id']]['cps_name']][$val['gid']]['gid'] =$val['gid'];
			$tmp_arr[$val['date']]['data'][$cpsarr[$val['cps_id']]['cps_name']][$val['gid']]['total_money'] =$val['total_money'];
		}
		foreach($tmp_arr as $key=>$val){
			if($key!='cps'){
				$data[$key]=$val;				
				$data[$key]['count']=count($val['game']);
			}else{
				$data[$key]=array_unique($val);
			}	
			$totalcount += count($val['game']);
		}
		
		$this->assign('data',$data);		
		$this->assign('totalcount',$totalcount);		
		
		//由多少列		
		$this->assign('gamelist',$gamelist);
		$this->assign('meiti_arr',$meiti_arr);
		$this->assign('game_money',$game_money);
		$this->assign('total_money',$total_money);
        $this->display();
    }

}