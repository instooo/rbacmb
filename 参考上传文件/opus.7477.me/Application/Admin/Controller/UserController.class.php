<?php
/**
 * 个人信息设置
 * Created by zhouwei  William@7477.com   
 * Date: 2016/12/8
 */
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

class UserController extends CommonController {
   
	public function setUser() {
		$uid=$_GET['uid'];
		$model	=M('user');
        $list = $model->where('id='.$uid)->field('id,info,nickname,remark')->find();
		$this->assign('list',$list);
        $this->display('Public/set_user');
    }
	
	
	//编辑个人信息
    public function userEdit() {
	
			if (!IS_POST) {
               $this->error('非法请求');
            }
			
			$id = I('post.id', '', 'htmlspecialchars');
            $password = I('post.password', '', 'htmlspecialchars');
            $nickname = I('post.nickname', '', 'htmlspecialchars');
			$remark = I('post.remark', '', 'htmlspecialchars');
			
			if (!is_numeric($id)) {
               $this->error('参数错误');
            }
			
			if ($password && !preg_match('/^[a-zA-Z0-9]{6,20}$/',$password)) {
				$this->error('密码应该为6到20位字母和数字');
            }
		   
		    $data = array();
			$file=$this->upload();
			
			if($file['status']==1){
				$data['info'] = $file['msg'];
				$_SESSION['photo'] = $data['info'];
			}
	
			
			
            if ($password) $data['password'] = md5($password);
            if ($nickname) $data['nickname'] = $nickname;
			if ($remark) $data['remark'] = $remark;
			
			
			$res = M('user')->where('id='.$id)->save($data);
			
			if($res){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
			
	}
		
		
	
	//图片上传
	public function upload(){
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	$upload->autoSub   =     false;
    $upload->rootPath  =     C("UPLOAD_PATH"); // 设置附件上传根目录
    $upload->savePath  =     'photo/'; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    if(!$info){
            //$this->error($upload->getError());  //获取失败信息
			$result = array('status'=>0,'msg'=>$upload->getError());
        }else{
			$filename='/'.C("UPLOAD_PATH").$info['file']['savepath'].$info['file']['savename'];
			$result =  array('status'=>1,'msg'=>$filename);
		}
		
		return $result;
	}

  

}