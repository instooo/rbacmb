<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
class CommonController extends Controller {
    public $meminfo;
    /**
     * 后台控制器初始化
     */
    public function __construct() {
        parent::__construct();

        //rbac 自带的游客验证
        Rbac::checkLogin();
        //如果是Index模块另外判断
        if(strtoupper(CONTROLLER_NAME)=="INDEX"){
            if(!isset($_SESSION['userid'])){
                redirect(PHP_FILE.C('USER_AUTH_GATEWAY'));
            }
        }
        //验证权限
        if(!Rbac::AccessDecision()){
            if(IS_AJAX){
                $this->ajaxReturn(array("state"=>-1,"msg"=>'没有权限',"data"=>""));
            }else
                $this->error("没有权限");
        }

        //账户信息
        $where = array();
        $where['User.id'] = $_SESSION['userid'];
        $this->meminfo = D('UserView')->where($where)->find();
        $this->assign("meminfo",$this->meminfo);

        if($_SESSION[C('ADMIN_AUTH_KEY')])
            $datalist   =   D('Node')->getNodeList();
        else
            $datalist   =   D('Node')->getNodeListByUid($_SESSION[C('USER_AUTH_KEY')]);
        $tree       =   D('Node')->getChildNode(0,$datalist);
        $this->assign("tree",$tree);

    }
    public function _initialize(){

    }

 	
	/**
	*特殊字符处理函数
	*/
	public function isEscape($val, $isboor = false) {
    if (! get_magic_quotes_gpc ()) {
        $val = addslashes ( $val );
    }
    if ($isboor) {
        $val = strtr ( $val, array (
                "%" => "\%",
                "_" => "\_" 
        ) );
    }
    return $val;
}

    /**
     * 获取当前用户可以查看的游戏
     */
    public function getUserGames() {
        $usergames = M('user_games')->where(array('user_id'=>$_SESSION['userid']))->find();
        $map = array();
        if ($usergames['games']) {
            $games = explode(',', $usergames['games']);
            $map['gid'] = array('in', $games);
        }
        $gamelist = M('game')->field('gid,game')->where($map)->order('gid desc')->select();
        return $gamelist;
    }

	/**
     * 获取一级渠道列表
     * */
    public function getTotalChannel() {			
		if ($this->meminfo['id']) {
			$return_data=S("return_data".$this->meminfo['id']);
			if(false){
				return $return_data;
			}else{				
				$map['uc.user_id']=$this->meminfo['id'];
				$clist = M('user_channel uc')
					->field('*')
					->where($map)
					->select();				
				return $clist;			
			}
		}else return null;
    }
	
	
	public function special_member(){
		//特殊账号，可以看到所有媒体
		$special_member = array('admin');
		$is_special = in_array($this->meminfo['username'],$special_member);
		return $is_special ;
	}
	//获得渠道
	public function get_channel(){
		$is_special = $this->special_member();		
		//查看当前拥有的账号
		if(!$is_special){
			$map_m['user_id'] = $this->meminfo['id'];
			$midarr_result = M('user_meidium a')
							->field('a.m_id,a.user_id,b.username')
							->join('mygame_user b on a.user_id = b.id')
							->where($map_m)
							->select();
			$midarr = array_column($midarr_result,'m_id');	
		}	
		$mediummap['pid'] = array('neq',0);
		if($midarr){
			$mediummap['id'] = array('in',$midarr);
		}else if(!$is_special){			
			$mediummap['id'] = 0;			
		}
		$medium = M('cps_medium','mygame_','DB_ZHU');	
		$meiti =$medium
				->where($mediummap)					
				->select();	
		$this->assign('meiti',$meiti);
	}

	//获得渠道
	public function get_game(){
		
		$game = M('game','mygame_','DB_ZHU');	
		$result = $game
		->field('gid,gamename,short')
		->select();
		return $result;
	}

}
                                