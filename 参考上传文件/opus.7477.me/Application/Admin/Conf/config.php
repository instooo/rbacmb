<?php
$rbac = include('rbac.php');
$param = include('param.php');
$rbac = array_merge($rbac, $param);
//'配置项'=>'配置值'
$config = array(
	/* 模板相关配置 */
	'TMPL_PARSE_STRING' => array(
			'__APP__' => '/index.php/'.MODULE_NAME,					// 更改默认的__APP__ 替换规则				
			'__IMAGE__'    =>  '/Public/'. MODULE_NAME . '/images',
			'__CSS__'      =>  '/Public/'.MODULE_NAME . '/style',
			'__JS__'       =>  '/Public/'. MODULE_NAME . '/js',
			'__UPLOAD__'       =>  '/Public/'. MODULE_NAME . '/webuploader',			
	),	
	"UPLOAD_PATH"=>"uploads/",	
	'USER_AUTH_KEY'      =>'authId',	       // 用户认证SESSION标记
	/* 语言设置 */
	'LANG_SWITCH_ON'=>true,
	'DEFAULT_LANG'=>'zh-cn',
	'LANG_AUTO_DETECT'=>false,
	'LANG_LIST'=>'en-us,zh-cn,zh-tw',
	/***CronSign***/
	'TIMESIGN'=>'9120b3e216ff71f1e9c3cbb588c3ca80',

);


return array_merge($config, $rbac);