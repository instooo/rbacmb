<?php
//定义接口
interface ContentInterface{
	//获取模型字段和类型
    function getFields();
	//添加内容
    function add();
	//编辑内容
    function edit();
	//删除内容
    function del();
	//获取列表
	function c_list();
}