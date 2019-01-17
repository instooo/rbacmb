<?php
return array(
	//'配置项'=>'配置值'
	/* 模板相关配置 */
	'TMPL_PARSE_STRING' => array(
			'__APP__' => __ROOT__.'/index.php/'.MODULE_NAME,					// 更改默认的__APP__ 替换规则				
			'__IMAGE__'    =>  '/Public/'. MODULE_NAME . '/images',
			'__CSS__'      =>  '/Public/'.MODULE_NAME . '/css',
			'__JS__'       =>  '/Public/'. MODULE_NAME . '/js',			
	),	
);