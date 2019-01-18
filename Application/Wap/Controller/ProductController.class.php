<?php
namespace Wap\Controller;
use Think\Controller;
class ProductController extends CommonController {
	public function __construct() {	
		parent::__construct();		
		$webinfo = M('webconfig')->where('id=1')->find();		
		$this->assign('webinfo',$webinfo);
		$this->assign ( 'pos', 'product' );
		$this->assign ( 'smalltitle', '集团产业' );
		//查找关键字和描述
		$webinfo = M('webconfig')->where('id=1')->find();
		
		$tid = 8;
		$banner_list = $this->get_model_list('ad',$tid,1);
		$this->assign('banner_list',$banner_list);

	}
	//首页
    public function index(){
        //得到模型
        $result = M('cate a')
            ->join('youzhan_model b on a.m_id = b.id')
            ->where('typeid=33')
            ->find();
        //获取文章列表
        $map['typeid']=array('in',array(33,34,35));
        $list = M($result['form'])
            ->where($map)
            ->order('weight desc,aid desc')
            ->select();

		foreach($list as $key=>$val){
			$listnew[$key]=$val;
			$listnew[$key]['imgarr'] = explode("|",trim($val['img_duo'],"|"));
		}
		$typeid =15;
		$des = $this->get_cate_info($typeid);	
		$this->assign('des',$des);		
		$this->assign('list',$listnew);		


		//城市更新
        $typeid =38;
        $desup = $this->get_cate_info($typeid);

        $typeid =29;
        $listup = $this->get_list($typeid);
        $listnew=array();
        foreach($listup as $key=>$val){
            $listnew[$key]=$val;
            $listnew[$key]['imgarr'] = explode("|",trim($val['img_duo'],"|"));
        }
        $this->assign('listup',$listnew);
        $this->assign('desup',$desup);

        //置业投资
        $typeid =39;
        $deszy = $this->get_cate_info($typeid);

        $typeid =19;
        $listzy = $this->get_list($typeid);
        $listnew=array();
        foreach($listzy as $key=>$val){
            $listnew[$key]=$val;
            $listnew[$key]['imgarr'] = explode("|",trim($val['img_duo'],"|"));
        }
        $this->assign('listzy',$listnew);
        $this->assign('deszy',$deszy);

        $typeid =20;
        $desfw = $this->get_cate_info($typeid);

        $typeid =40;
        $listfw = $this->get_list($typeid);
        $this->assign('toplist',$listfw);

        $typeid =41;
        $list = $this->get_list($typeid);
        $this->assign('botlist',$list);

        $this->assign('desfw',$desfw);

        $this->display();
    }
	//城市更新
	public function update(){
		$this->display();
	}
	//置业投资
	public function invest(){
		$this->display();
	}
	//置业投资
	public function service(){
		$this->display();
	}
	
}