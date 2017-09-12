<?php
/**
 * 首页控制器
 * Created by dengxiaolong 2057844718@qq.com.
 * Date: 2016/11/10
 */
namespace Admin\Controller;
use Org\Util\ChinesePinyin;
use Think\Controller;

class UploadController extends CommonController {
 	
	//上传视屏展示
	public function uploadMedia() {
		//获得栏目列表
		$cate=D('cate')->getOptions();	
		$this->assign('cate',$cate);
		$cate=D('channel')->getOptions();
		$this->assign('channel',$cate);
        $this->display();
    }
	
	//文件上传处理
	public function uploadFile_do() {
		// 设置不同类型附件上传大小1.5M/swf为100k
		$type =explode('.',$_FILES['sourceFile']['name']);
		$sizae = ($type[1]=='swf')?(1.5*1024*1024):(1.5*1024*1024);

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     $sizae;
		$upload->exts      =     array('mp4','flv','swf');// 设置附件上传类型		
		$upload->rootPath  =     C("UPLOAD_PATH"); // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录\		
		$info   =   $upload->upload();
		if(!$info) {// 上传错误提示错误信息
			$data['status']=false;
			$data['content']=$upload->getError();
		}else{			
			//上传成功后返回文件保存地址
			$data['status']=true;			
			$data['content']= "/".C("UPLOAD_PATH").$info['sourceFile']['savepath'].$info['sourceFile']['savename'];
			$data['info'] = $this->getWorld($info['sourceFile']['name']);
		}
		echo json_encode($data);
    }
    
	//文件上传处理
	public function uploadImage_do() {		
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     2*1024*1024;// 设置附件上传大小
		$upload->exts      =     array('png','gif','jpg','jpeg');// 设置附件上传类型		
		$upload->rootPath  =     C("UPLOAD_PATH"); // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录\		
		$info   =   $upload->upload();
		if(!$info) {// 上传错误提示错误信息
			$data['status']=false;
			$data['content']=$upload->getError();
		}else{		
			//上传成功后返回文件保存地址
			$data['status']=true;			
			$data['content']= "/".C("UPLOAD_PATH").$info['previewFile']['savepath'].$info['previewFile']['savename'];		
		}
		echo json_encode($data);
    }
	
	//删除上传文件
	public function deleteFile(){
		//获取文件名
		if(IS_AJAX){//判断是否是AJAX提交和来源网址是否正常

			$ywjName=I('post.ywjName','','htmlspecialchars');
			$yltName=I('post.yltName','','htmlspecialchars');
			if(unlink('.'.$yltName)||unlink('.'.$ywjName)){
				$result = array('status'=>true,'content'=>'删除成功');
			}else{
				$result = array('status'=>false,'content'=>'删除失败');
			}
			echo json_encode($result);
		}
		
	}	
	
	//添加素材
	public function saveOpusInfo(){
		$user = $this->usrInfo();
		if(!$user){
			$this->error("请勿非法操作！");
		}
		if(IS_POST){//判断是否是post提交和来源网址是否正常
			//对传过来的数据进行过滤
			$this->check_post();
			//组合数组
			$data['title']=I('post.title','','htmlspecialchars');
			$data['keywords']=I('post.keywords','','htmlspecialchars');
			$data['des']=I('post.des','','htmlspecialchars');
			$data['size']=I('post.size','','htmlspecialchars');
			$data['catid']=I('post.cid','','intval');
			$data['chanid']=I('post.chanid','','intval');
			$data['game']=I('post.game','','htmlspecialchars');
			$data['cps_url']=I('post.cps_url','','htmlspecialchars');
			$data['remote_url']=I('post.down','','htmlspecialchars');
			$data['thumb']=I('post.pre','','htmlspecialchars');
			$data['uid']=$user['uid'];
			$data['status']=0;//默认为未审核状态
			$data['addtime']=time();
			$material= M('material');

			$mid = $material ->max('mid'); //获取下一个插入的mid
			$data['alias'] = $this->alias($data['title'],$data['game'],$data['size'],$data['cps_url'],$mid+1,$data['chanid']);
			$result = $material->add($data);
			if($result){
				$arr['status']=true;
				$arr['content']="保存成功";
			}else{
				$arr['status']=false;
				$arr['content']=8;//保存失败
			}
			echo json_encode($arr);
		}
	}
	
	//编辑素材
	public function editOpusInfo(){
		$user = $this->usrInfo();
		if(!$user){
			$this->error("请勿非法操作！");
		}
		$material= M('material');
		if(IS_POST){//判断是否是post提交和来源网址是否正常
			//对传过来的数据进行过滤
			$this->check_post();
			//组合数组
			$data['title']=I('post.title','','htmlspecialchars');
			$data['keywords']=I('post.keywords','','htmlspecialchars');
			$data['des']=I('post.des','','htmlspecialchars');
			$data['size']=I('post.size','','htmlspecialchars');
			$data['catid']=I('post.cid','','intval');
			$data['chanid']=I('post.chanid','','intval');
			$data['game']=I('post.game','','htmlspecialchars');
			$data['cps_url']=I('post.cps_url','','htmlspecialchars');
			if(I('post.down','','htmlspecialchars')){
				$data['remote_url']=I('post.down','','htmlspecialchars');	
			}
			if(I('post.pre','','htmlspecialchars')){
				$data['thumb']=I('post.pre','','htmlspecialchars');
			}
			$data['uid']=$user['uid'];
			//$data['status']=0;//默认为未审核状态
			$map['mid'] = I('post.mid','','intval');
			$data['alias'] = $this->alias($data['title'],$data['game'],$data['size'],$data['cps_url'],$map['mid'],$data['chanid']);
			$result = $material->where($map)->save($data);
			if($result){
				$arr['status']=true;
				$arr['content']="保存成功";
			}else{
				$arr['status']=false;
				$arr['content']="保存失败";
			}
			echo json_encode($arr);
		}else{			
			$map['mid'] = I('get.mid','','intval');
			$material=M("material");
			$info = $material->where ($map)->find ();
			$sizetmp=explode('*',$info['size']);
			$info['size1']=$sizetmp[0];
			$info['size2']=$sizetmp[1];	
			
			//获得栏目列表			
			$cate=D('cate')->getOptions();	
			$this->assign('cate',$cate);
			$this->assign('cateinfo',$cate[$info['catid']]);
			$channel=D('channel')->getOptions();
			$this->assign('channel',$channel);
			$this->assign('channelinfo',$channel[$info['chanid']]);
			$this->assign('info',$info);
			$this->display();
		}
	}

	//自动填充关键词keyword
	public function keyword(){
		$data['title']=I('post.title','','htmlspecialchars');
		$data['size']=I('post.size','','htmlspecialchars');
		$data['catid']=I('post.cid','','intval');
		$data['game']=I('post.game','','htmlspecialchars');
		$data['cps_url']=I('post.cps_url','','htmlspecialchars');

		$keyword = $data['title'];

		$keyword .=' '.$data['game'];

		$Pinyin = new ChinesePinyin();
		$keyword .=' '.$Pinyin->TransformUcwords($data['game']);

		$keyword .=' '.date('Ymd',time());

		$cps_url = trim($data['cps_url'],'/');
		$cps_url= strrchr($cps_url,'-');
		$keyword .=' '.trim($cps_url,'-');

		$keyword .=' '. str_replace('*','X',$data['size']);

		$cate = M('Cate')->where(array('cid'=>$data['catid']))->find();
		$keyword .=' '. $cate['name'];

		echo $keyword;
	}

	private function getWorld($world){
		$array = explode('_',$world);
		$size = explode('X',$array[1]);
		$name = explode('-',$array[3]);
		$result['name'] = $name[0];
		$result['size1'] = $size[0];
		$result['size2'] = $size[1];
		$result['game'] = $array[0];
		return $result;
	}
	
	//对传过来的数据进行过滤
	private function check_post(){
		//标题格式不正确
		$data['title']=I('post.title','','htmlspecialchars');
		if(strlen($data['title'])>50){
			echo json_encode(array('status'=>false,'content'=>1));exit;
		}

		//标签最少6组不重复
		$data['keywords']=I('post.keywords','','htmlspecialchars');
		$keyword =preg_split('/[\n\r\t\s]+/i', $data['keywords']);
		if(count($keyword)<6||count(array_unique($keyword))!=count($keyword)){
			echo json_encode(array('status'=>false,'content'=>3));exit;
		}

		//描述不大于250
		$data['des']=I('post.des','','htmlspecialchars');
		if(strlen($data['des'])>250){
			echo json_encode(array('status'=>false,'content'=>7));exit;
		}

		//请选择分类
		$data['catid']=I('post.cid','','intval');
		if($data['catid']==0){
			echo json_encode(array('status'=>false,'content'=>4));exit;
		}

		//源文件上传失败
		$data['remote_url']=I('post.down','','htmlspecialchars');
		if(!isset($data['remote_url'])){
			echo json_encode(array('status'=>false,'content'=>5));exit;
		}

		//预览图上传失败
		$data['thumb']=I('post.pre','','htmlspecialchars');
		if(!isset($data['thumb'])){
			echo json_encode(array('status'=>false,'content'=>6));exit;
		}

		//url地址不正确
		$data['cps_url']=I('post.cps_url','','htmlspecialchars');
		$pattern = '/(http|https){1}(:\/\/)?([\da-z-\.]+)\.([a-z]{2,6})([\/\w \.-?&%-=]*)*\/?/';
		if(!preg_match($pattern,$data['cps_url'])){
			echo json_encode(array('status'=>false,'content'=>2));exit;
		}

	}

	//获取下载命名
	private function alias($title,$game,$size,$cps,$id,$channel){
		$Pinyin = new ChinesePinyin();
		if (preg_match("/[\x7f-\xff]/", $game)) {
			$key = $Pinyin->TransformUcwords($game);
		}else{
			$key = $game;
		}

		$key = strtolower($key);

		$date = date('md',time());

		$cps_url = trim($cps,'/');
		$cps_url= strrchr($cps_url,'-');
		$gid = trim($cps_url,'-');

		if($channel==C('MEDIA_CHANNEL_ID')){
			$sizeCode = C('MEDIA_SIZE');
			$size = $sizeCode[$size];
		}else{
			$size = str_replace('*','X',$size);
		}

		$alias = $key.'_'.$size.'_'.$date.'_'.$id.'-'.$title.'-'.$gid;
		return $alias;
	}

	//保存成功页面
	public function saveSuccess(){
		$this->display();
	}
	
	
	
}