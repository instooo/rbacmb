<?php
//定义接口
class Content{
	//获取模型字段和类型
    function getFields(){
		$fields = array();
		$fields[]=array('title',"标题",'input');	
		$fields[]=array('weight',"权重",'input');
		$fields[]=array('imgurl',"缩略图",'input');
		$fields[]=array('content',"内容",'text');
		return $fields;
	}
	public function get_html($fields){
		$html = "";
		foreach($fields as $key=>$val){
			switch($val[2]){
				case 'input':
					$html.="<tr><td>".$val['1']."</td><td><input type='text' class='manager-input s-input' name='".$val['0']."' id='".$val['0']."' style='width:300px'></td></tr>";
					break;
				case 'text':
					$html.="<tr><td>".$val['1']."</td><td><textarea name='content' id='editor_id".$val['0']."'></textarea></td></tr>";
					$script="<script type='text/javascript'>var editor = new UE.ui.Editor({initialContent:''});editor.render('editor_id".$val[0]."');</script>";
					$html.=$script;
					break;
			}
		}
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