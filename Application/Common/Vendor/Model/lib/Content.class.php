<?php
//定义接口
class Content{
	//获取模型字段和类型
    function getFields(){
		$fields = array();
		$fields[]=array('title',"标题",'input','varchar',60);
		$fields[]=array('description',"简介",'text');	
		$fields[]=array('weight',"权重",'input','int',0);
		$fields[]=array('imgurl',"缩略图",'file','file','jpg,gif,bmp,png');
		$fields[]=array('imgurl_many',"多个缩略图",'file_many','file','jpg,gif,bmp,png');
		$fields[]=array('updatetime',"发布时间",'date');
		return $fields;
	}
	public function get_html($fields){
		$html = "";
		foreach($fields as $key=>$val){
			switch($val[2]){
				case 'input':
					$html.="<tr><td>".$val['1']."</td><td><input type='text' class='manager-input s-input' name='".$val['0']."' id='".$val['0']."' style='width:300px'></td></tr>";
					break;
				case 'editor':
					$html.="<tr><td>".$val['1']."</td><td><textarea name='content' id='editor_id".$val['0']."'></textarea></td></tr>";
					$script="<script type='text/javascript'>var editor = new UE.ui.Editor({initialContent:''});editor.render('editor_id".$val[0]."');</script>";
					$html.=$script;
					break;
				case 'text':
					$html.="<tr><td>".$val['1']."</td><td><textarea type='text' class='manager-input s-input' name='".$val['0']."' id='".$val['0']."' style='width:400px; height:100px'></textarea></td></tr>";
					break;
				case 'file':
					$html.="<tr><td>".$val['1']."</td><td><input type='file' class='manager-input s-input' name='".$val['0']."' id='".$val['0']."' style='width:300px'><span>文章缩略图片</span></td></tr>";
					break;
				case 'file_many':
					$html.="<tr><td>".$val['1']."</td><td><input type='file' class='manager-input s-input' name='".$val['0']."[]' id='".$val['0']."' style='width:300px'multiple/><span>可多个图片</span></td></tr>";
					break;
				case 'date':
					$html.="<tr><td>".$val['1']."</td><td><input type='text' class='manager-input s-input' name='".$val['0']."' id='".$val['0']."' style='width:300px' readonly/></td></tr>";
					
					$script = '<script type="text/javascript">
							laydate.render({
							  elem: '.$val["0"].',
							  type: "datetime"	
							});
								</script>';
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