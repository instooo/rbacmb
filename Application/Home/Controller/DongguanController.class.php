<?php
namespace Home\Controller;
use Think\Controller;
class DongguanController extends Controller {
	//
    public function index(){
        $this->display();
    }
	//企业理念
	public function idea(){
		 $this->display();
	}
	//企业年志
	public function year(){
		 $this->display();
	}
	//企业荣誉
	public function honor(){
		 $this->display();
	}
	//合作伙伴
	public function partner(){
		 $this->display();
	}
}