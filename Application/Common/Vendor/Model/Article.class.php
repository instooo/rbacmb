<?php

include "lib/ContentInterface.php";
include "lib/Content.class.php";
// 没有声明命名空间
class Article extends Content implements ContentInterface 
{
    //获取模型字段和类型
    function getFields(){
		$common_fields = parent::getFields();
		$html = $this->get_html($common_fields);
		return $html;
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