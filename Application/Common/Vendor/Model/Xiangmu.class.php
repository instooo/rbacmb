<?php

include "lib/ContentInterface.php";
include "lib/Content.class.php";
// 没有声明命名空间
class Xiangmu extends Content implements ContentInterface 
{	
	protected $_validate = array(
		array('title','require','项目名称不能为空'), //默认情况下用正则进行验证	
		array('zdmianji','require','不能为空'), //默认情况下用正则进行验证	
		array('jzmianji','require','不能为空'), //默认情况下用正则进行验证	
		array('rongji','require','不能为空'), //默认情况下用正则进行验证	
		array('count','require','不能为空'), //默认情况下用正则进行验证		
		array('img_duo','require','至少一张'), //默认情况下用正则进行验证
		array('content','require','不能为空'), //默认情况下用正则进行验证		
	);
    //获取模型字段和类型
    function getFields(){
		$common_fields = parent::getFields();
		$fields[]=array('zdmianji',"占地面积（m2）",'input','',1);
		$fields[]=array('jzmianji',"建筑面积（m2）",'input','',1);
		$fields[]=array('rongji',"容积率",'input','',1);
		$fields[]=array('count',"总户数",'input','',1);		
		$fields[]=array('kftime',"开发时间",'date','',0);		
		$fields[]=array('img_duo',"项目图片",'mu_file',10);	
		$fields[]=array('content',"项目介绍",'editor','',0);	
		$common_fields = array_merge($common_fields,$fields);
		return $common_fields;		
	}
	//获取html
	 function get_html(){
		$common_fields =$this->getFields();		
		$html = parent::get_html($common_fields);
		return $html;
	}
	
	//编辑html	
	function edit_html($info){		
		$common_fields =$this->getFields();		
		$html = parent::edit_html($common_fields,$info);	
		return $html;
	}
	
	public function checkData($data){
		$_validate =$this->_validate;
		$common_fields =$this->getFields();			
		$result = parent::checkData($data,$_validate,$common_fields);			
		return $result;
	}
}
?>