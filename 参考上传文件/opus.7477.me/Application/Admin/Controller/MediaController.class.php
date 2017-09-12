<?php
/**
 * 作品控制器
 * Created by qinfan qf19910623@gmail.com.
 * Date: 2016/11/2
 */
namespace Admin\Controller;
use Org\Net\Http;
use Org\Util\FileUtil;
use Org\Util\PHPZip;
use Think\Controller;
use Think\Exception;

class MediaController extends CommonController {

	/**
	 * 素材列表
	 */
	public function myMedia() {
		$getWhere = array();
		$status = I('get.status');
		if(!empty($status)){
			$where['a.status'] = $status;
			$getWhere['status'] = $status;
		}
		if($status==0){
			$where['a.status'] = $status;
			$getWhere['status'] = $status;
		}
		if($where['a.status']=='')
			unset($where['a.status']);

		$mt_status = I('get.mt_status','','intval');
		if(!empty($mt_status)){
			$where['b.status'] = $mt_status;
			$getWhere['mt_status'] = $mt_status;
		}
		//素材提供者
		if($this->role==1){
			$user = $this->usrInfo();
			$where['a.uid'] = $user['uid'];
			$have = I('get.have','','htmlspecialchars');
			if(!empty($have)&&$have=='true'){
				unset($where['a.uid']);
				$where['a.status'] = 1;
				$getWhere['have'] = 'true';
			}
		}

		//素材测试者
		if($this->role==3){
			$where['b.status'] = $where['b.status']?$where['b.status']:array('exp','is null');
			$where['a.status'] = $where['a.status']?$where['a.status']:1;
			$test = I('get.test','','htmlspecialchars');
			if(!empty($test)){
				if($test=='true'){
					$where['b.status'] = array('in','1,2');
				}else{
					$where['b.status'] = array('exp','is null');
				}
				$getWhere['test'] = $test;
			}
		}

		$this->assign('where',$getWhere);
		$this->mediaList($where);
    }

	/**
	 * 查看素材
	 */
	public function detail() {
		$map['a.mid'] = I('get.mid','','intval');
		$material=M("material a");
		$info = $material
			  ->field("a.*,b.click_per,b.ectc,b.expend,b.show_num,b.reg_num,b.click_num,b.status as cs_status,b.suggestion,b.pjtime")
			  ->join('LEFT join opus_data b ON b.mid=a.mid')
			  ->where ($map)
			  ->find ();
		$star_info=json_decode($info['star_info'],true);
		unset($map);		
		foreach($star_info as $key=>$val){
			$map['typedes'] = $key;
			$map['value'] = $val;		
			$pingjia_info[] = M("pingjia")->where($map)->find();
			unset($map);
		}			
		$sizetmp=explode('*',$info['size']);
		$houzui=explode('.',$info['remote_url']);
		$info['size1']=$sizetmp[0];
		$info['size2']=$sizetmp[1];	
		$info['houzui']=$houzui[1];			
		$this->assign('info',$info);

		$userinfo = M('user')->field('id,nickname,info')->where(array('id'=>$info['uid']))->find();
		$this->assign('userinfo',$userinfo);

		$cate = M('cate')->field('cid,name')->where(array('cid'=>$info['catid']))->find();
		$this->assign('cate',$cate);
		$channel = M('channel')->field('cid,name')->where(array('cid'=>$info['chanid']))->find();
		$this->assign('channel',$channel);

		$this->assign('pingjia_info',$pingjia_info);

		$scal = 1;
		if((int)$sizetmp[0]>852&&(int)$sizetmp[1]<480){
			$scal =852/$sizetmp[0];
		}
		if((int)$sizetmp[0]<852&&(int)$sizetmp[1]>480){
			$scal = 480/$sizetmp[1];
		}
		$width = $sizetmp[0]*$scal;
		$height = $sizetmp[1]*$scal;

		$this->assign('width',$width);
		$this->assign('height',$height);
		$filesize = round(filesize('./'.$info['remote_url'])/(1024*1024),3).'M';
		$this->assign('filesize',$filesize);


		//素材用户评论
		$mid = I('get.mid','','intval');
		$discuss = $this->discussList($mid);
		$this->assign('discuss',$discuss);
        $this->display();
    }

	/**
	 * 精品素材
	 * 谁都可以看没有角色限制
	 */
	public function bestMedia(){
		$where['a.status'] = 1;
		$where['b.status'] = 1;
		$this->mediaList($where);
	}

	/**
	 * 素材上传者查看他人的审核通过的作品
	 */
	public function otherMedia(){
		$uid = I('get.uid','','intval');
		if(!$uid||empty($uid)){
			$this->error("请勿非法操作！");
		}
		$where['a.uid'] = $uid;
		$where['a.status'] = 1;

		$getWhere['uid'] = $uid;
		$this->assign('where',$getWhere);
		
		$user = M('user')->where(array('id'=>$uid))->find();
		$this->assign('other',$user['nickname']);
		$this->mediaList($where);
	}

	/**
	 * 我的作品
	 * 只有上传作品的本人才可以查看
	*/
	public function userMedia() {
		$user = $this->usrInfo();
		if(!$user){
			$this->error("请勿非法操作！");
		}
		$where['a.uid'] = $user['uid'];
		$this->mediaList($where);
	}

	/**
	 * 我的测试
	 * 查看测试的作品
	 */
	public function testMedia(){
		$user = $this->usrInfo();
		if(!$user){
			$this->error("请勿非法操作！");
		}
		$where['b.uid'] = $user['uid'];
		$this->mediaList($where);
	}

	/**
	 * 昨日，今日新增作品
	 * 角色为2的才能看得到
	 * @throws Exception
	 */
	public function dataMedia(){
		$date = I('get.date','','htmlspecialchars');
		switch($date){
			case 'today':
				$begin=mktime(0,0,0,date('m'),date('d'),date('Y'));
				$end=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
				$message = '今日新增作品';
				break;
			case 'yesterday':
				$begin=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				$end=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
				$message = '昨日新增作品';
				break;
			default: $this->error('非法访问');
		}
		$where['addtime'] = array('between',array($begin,$end));
		$this->assign('message',$message);
		$this->mediaList($where);
	}


	public function downLoad(){
		$down = new Http();
		//批量打包下载
		$mids = I('get.mids');
		if(!empty($mids)&&$mids){
			$map['mid'] = array('in',$mids);
			$model = M('material')->where($map)->select();
			$zip=new PHPZip();
			$zipname='uploads/7477opus';

			//存在删除
			$file = new FileUtil();
			if (file_exists($zipname)) {
				$file->unlinkDir($zipname);
			}

			if (!file_exists($zipname)) {
				mkdir($zipname);
				foreach($model as $val) {
					$filename='.'.$val['remote_url'];
					$houzui=explode('.',$val['remote_url']);
					$downname=$val['alias'];
					$downfile = iconv("utf-8","gb2312",$zipname.'/'.$downname.'.'.$houzui[1]);
					copy($filename,$downfile);
				}
				$zip->ZipAndDownload($zipname,'7477opus'.date('YmdHi',time()));
				$file->unlinkDir($zipname);
			}
			exit();
		}
		//单个文件下载
		$mid = I('get.mid','','intval');
		$model = M('material')->where(array('mid'=>$mid))->find();
		$filename=trim($model['remote_url'],'/');
		$houzui=explode('.',$model['remote_url']);
		$showname = $model['alias'].'.'.$houzui[1];

		$data['down_num'] = $model['down_num']+1;
		M('material')->where(array('mid'=>$mid))->save($data);
		$down->download($filename,$showname);
	}

	private function mediaList(array $otherWhere){
		$where = $this->seachModel();
		$order = $this->orderModel();
		if(is_array($otherWhere)){
			$where = array_merge($where,$otherWhere);
		}
		if(is_array($otherWhere)&&!is_array($where)){
			$where = $otherWhere;
		}
		$material=M("material a");
		$count = $material
			->join('left join opus_data b ON b.mid=a.mid')
			->where ($where)->count ();
		$Page  = new \Think\Page($count,20);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$listinfo = $material
			->field('a.*,b.status as cs_status')
			->join('left join opus_data b ON b.mid=a.mid')
			->where ($where)
			->order ($order)
			->limit($Page->firstRow.','.$Page->listRows)
			->select ();
		$this->assign('page',$Page->show());
		$this->assign('listinfo',$listinfo);
		$this->display();
	}

	//列出评论
	private function discussList($mid){
		$map['mid'] = $mid;
		$cates = M("discuss d")
			->field('d.*,u.info')
			->join('left join '.C('DB_PREFIX').'user u on u.id=d.uid')
			->where ($map)
			->select();
		$tree = array();
		$floor = 0;
		foreach($cates as $key => $cate) {
			if($cate['pid'] == 0){
				$tree[$floor] = $cate;
				$i = 0;
				foreach ($cates as $child){
					if($child['pid'] == $cate['id']){
						$tree[$floor]['child'][$i] =$child;
						$i++;
					}
				}
				$floor++;
			}
		}
		return $tree;
	}

	private function seachModel(){
		/*搜索框start*/
		$keywords = I('get.kw','','htmlspecialchars');
		if(!empty($keywords)){
			$where['keywords'] = array('like','%'.$keywords.'%');
		}
		$search_mode = I('get.search_mode','','htmlspecialchars');
		if(!empty($search_mode)){
			$flag = true;
			switch($search_mode){
				case 'photo':$mode = '.swf';break;
				case 'vector':$mode = '.flv';break;
				case 'video': $mode='.mp4';break;
				default: $flag = false;
			}
			if($flag){
				$where['remote_url'] = array('like','%'.$mode);
			}
		}
		/*搜索框end*/

		/*条件筛选start*/
		$catid = I('get.cid','','intval');
		if(!empty($catid)){
			$where['catid'] = $catid;
			if($catid==0){
				unset($where['catid']);
			}
		}
		$chanid = I('get.chanid','','intval');
		if(!empty($chanid)){
			$where['chanid'] = $chanid;
			if($chanid==0){
				unset($where['chanid']);
			}
		}
		$game = I('get.game','','htmlspecialchars');
		if(!empty($game)){
			$where['game'] = array('like','%'.$game.'%');
		}

		$width = I('get.width','','intval');
		$height = I('get.height','','intval');
		if(!empty($width)||!empty($height)){
			$where['size'] = array('like','%'.$width.'*'.$height.'%');
		}
		$addtime = I('get.addtime','','htmlspecialchars');
		$endtime = I('get.endtime','','htmlspecialchars');

		$addtime = str_replace('+',' ',$addtime);
		$endtime = str_replace('+',' ',$endtime);

		$startTime = strtotime($addtime);
		$endTime = strtotime($endtime);
		if((!empty($addtime)&&empty($endTime))){
			$where['addtime'] = array('gt',$startTime);
		}
		if((!empty($endTime)&&empty($addtime))){
			$where['addtime'] = array('lt',$endTime);
		}
		if((!empty($endTime)&&!empty($addtime))){
			$where['addtime'] = array('between',array($startTime,$endTime));
		}
		/*条件筛选end*/
		return $where;
	}

	private function orderModel(){
		/*排序条件start*/
		$orders = I('get.order','','htmlspecialchars');
		$order = '';
		if(!empty($orders)){
			switch($orders){
				case 'click':$order = 'b.click_per desc';break;
				case 'reg':$order = 'b.reg_num desc';break;
				case 'time': $order='addtime desc';break;
				default: unset($order);
			}
		}

		/*排序条件end*/
		return $order;
	}


	
}