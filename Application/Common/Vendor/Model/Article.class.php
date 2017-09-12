<?php

include "lib/ContentInterface.php";
include "lib/Content.class.php";
// 没有声明命名空间
class Article extends Content implements ContentInterface 
{	
	protected $_validate = array(
		array('content','require','不能为空'), //默认情况下用正则进行验证	
	);
    //获取模型字段和类型
    function getFields(){
		$common_fields = parent::getFields();		
		$fields[]=array('imgurl_many',"多个缩略图",'file_many','file','jpg,gif,bmp,png');
		$fields[]=array('updatetime',"发布时间",'date');
		$fields[]=array('content',"内容",'editor');			
		$common_fields = array_merge($common_fields,$fields);
		return $common_fields;		
	}
	//获取html
	 function get_html(){
		$common_fields =$this->getFields();		
		$html = parent::get_html($common_fields);
		return $html;
	}
	
	public function checkData($data){
		$_validate =$this->_validate;
		$common_fields =$this->getFields();			
		$result = parent::checkData($data,$_validate,$common_fields);			
		return $result;
	}
	
	//添加内容
    function add(){
		
	}
	//编辑内容
    function edit(){
		
	}
	//删除内容
    function del(){
		
	}
	//获取列表
	function c_list(){
		
	}
}
?>