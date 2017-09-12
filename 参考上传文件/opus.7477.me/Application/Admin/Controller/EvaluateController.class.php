<?php
/**
 * 首页控制器
 * Created by dengxiaolong 2057844718@qq.com.
 * Date: 2016/11/10
 */
namespace Admin\Controller;
use Think\Controller;

class EvaluateController extends CommonController {

	//对素材进行星级评价，满分九星
	public function star(){
		$user = $this->usrInfo();
		if(!$user){
			$this->error('非法操作');
		}
		if(IS_POST){//判断是否是post提交和来源网址是否正常			
			//组合数组
			$data['mid']=I('post.mid','','intval');
			
			$data['star']=I('post.star',0,'intval');;
			$data['star_info']=null;
			$data['status']=I('post.state','','intval');
			$data['is_good']=I('post.good','','intval');
			$data['pingjia']=I('post.pingjia','','htmlspecialchars');
			$data['audit_uid'] = $user['uid'];
			$material= M('material');
			$map['mid']=$data['mid'];
			$result = $material->where($map)->find();
			if($result['status']==0){
				$tongzhi = $material->where($map)->save($data);
				if($tongzhi){
					$arr['status']=true;
					$arr['content']="成功";
				}else{
					$arr['status']=false;
					$arr['content']="评价失败";
				}
			}else{
				$arr['status']=false;
				$arr['content']="已经审核过了";
			}			
			echo json_encode($arr);
		}
	}

	//对素材的数据的填充
	public function data(){
		if(IS_POST){
			//对传过来的数据进行过滤
			$this->checkData();
			//组合数组
			$data['mid'] =I('post.mid','','intval');
			$data['click_per'] =I('post.clickper','','htmlspecialchars');
			$data['ectc'] =I('post.ectc');
			$data['ecpm'] =I('post.ecpm');
			$data['expend'] =I('post.expend');
			$data['show_num'] =I('post.show','','intval');
			$data['reg_num'] =I('post.regnum','','intval');
			$data['status'] =I('post.status',2,'intval');
			$data['ok_status'] =I('post.okstatus',0,'intval');
			switch($data['ok_status']){
				case 1:$data['ext2'] = '双达标';break;
				case 2:$data['ext2'] = '点击率达标';break;
				case 3:$data['ext2'] = '成本达标';break;
				case 4:$data['ext2'] = '转化率达标';break;
			}
			$data['click_num'] = I('post.click','','intval');
			$data['suggestion'] =I('post.suggestion','','htmlspecialchars');
			$data['pjtime'] =time();
			//$data['time'] = time();
			$user = $this->usrInfo();
			$data['uid']  =  $user['uid'];

			$model= M('Data');
			$result = $model->add($data);

			if($result){
				$arr['status']=true;
				$arr['msg']="保存成功";
			}else{
				$arr['status']=false;
				$arr['msg']='保存失败';
			}
			echo json_encode($arr);
		}
	}

	//严格验证数据
	private function checkData(){
		//注册参数大于0的正整数
		$data['reg_num'] =I('post.regnum','','intval');
		if(!is_integer($data['reg_num'])||$data['reg_num']<0){
			echo json_encode(array('status'=>false,'code'=>1,'msg'=>'注册数，请输入大于0的整数'));exit();
		}

		//消耗是money
		$data['expend'] =I('post.expend','','number_float');
		if(!maxFloat($data['expend'])){
			echo json_encode(array('status'=>false,'code'=>2,'msg'=>'消耗数，请输入大于0的2位小数'));exit();
		}

		//曝光量
		$data['show_num'] =I('post.show','','intval');
		if(!is_integer($data['show_num'])||$data['show_num']<0){
			echo json_encode(array('status'=>false,'code'=>3,'msg'=>'曝光量，请输入大于0的整数'));exit();
		}

		//点击均价
		$data['ectc'] =I('post.ectc');
		if(!maxFloat($data['ectc'])){
			echo json_encode(array('status'=>false,'code'=>4,'msg'=>'点击均价，请输入大于0的2位小数'));exit();
		}

		//eCPM
		$data['ecpm'] =I('post.ecpm');
		if(!maxFloat($data['ecpm'])){
			echo json_encode(array('status'=>false,'code'=>9,'msg'=>'eCPM(￥)，请输入大于0的2位小数'));exit();
		}

		//点击率
		$data['click_per'] =I('post.clickper','','htmlspecialchars');
		if(!maxFloat($data['click_per'],3)){
			echo json_encode(array('status'=>false,'code'=>5,'msg'=>'点击率，请输入大于0的3位小数默认是%'));exit();
		}

		//点击量
		$data['click_num'] =I('post.click',0,'intval');
		if(!is_integer($data['click_num'])||$data['click_num']<0){
			echo json_encode(array('status'=>false,'code'=>6,'msg'=>'点击量,请输入正整数！'.$data['click_num']));exit();
		}

		//此素材是否存在
		$data['mid'] =I('post.mid','','intval');
		$material=M("material");
		$map['mid'] = $data['mid'];
		$info = $material->where ($map)->find ();
		if(!$info){
			echo json_encode(array('status'=>false,'code'=>7,'msg'=>'此素材不存在，非法操作！'));exit();
		}

		//此素材是否已经测试
		$map['mid'] = $data['mid'];
		$info =M("data")->where ($map)->find ();
		if($info){
			echo json_encode(array('status'=>false,'code'=>8,'msg'=>'此素材已经测试，非法操作！'));exit();
		}
	}

	/**
	 * 用户评论素材
	 */
	public function discuss(){
		$auth = $this->usrInfo();
		if(!$auth){
			$this->error("请勿非法操作！");
		}
		$this->checkDiscuss();
		$data['mid'] =I('post.mid','','intval');
		$data['content'] = I('post.content','','htmlspecialchars');
		$data['pid'] =I('post.pid',0,'intval');
		$data['time'] = time();
		$user = $this->usrInfo();
		$data['uid'] = $user['uid'];

		$result = M('discuss')->add($data);
		if($result){
			$arr['status']=true;
			$arr['msg']="保存成功";
		}else{
			$arr['status']=false;
			$arr['msg']='保存失败';
		}
		echo json_encode($arr);
	}


	private function checkDiscuss(){

		$data['content'] = I('post.content','','htmlspecialchars');
		if(!isset($data['content'])){
			echo json_encode(array('status'=>false,'code'=>-2,'msg'=>'回复内容不能为空！'));exit();
		}

		//防止非法回复人
		$data['pid'] =I('post.pid','','intval');
		if(!empty($data['pid'])){
			$info = M("discuss")->where (array('id'=>$data['pid']))->find ();
			if(!$info){
				echo json_encode(array('status'=>false,'code'=>-3,'msg'=>'回复人不存在！'));exit();
			}
		}

		//防止非法评论没有的对象
		$data['mid'] =I('post.mid','','intval');
		$map['mid'] = $data['mid'];
		$info = M("material")->where ($map)->find ();
		if(!$info){
			echo json_encode(array('status'=>false,'code'=>-4,'msg'=>'此素材不存在，非法操作！'));exit();
		}
	}

}