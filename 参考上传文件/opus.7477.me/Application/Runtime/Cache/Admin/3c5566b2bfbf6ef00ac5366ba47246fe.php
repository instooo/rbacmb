<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer" content="webkit">
  <title>7477素材网</title>
  <link rel="stylesheet" href="/Public/Admin/style/login.css">
  <link rel="stylesheet" href="/Public/Admin/style/index_base.v4.4.css">
  <link rel="stylesheet" type="text/css" href="/Public/Admin/style/index.v1.7.css">
  <script type="text/javascript" src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
  <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
  <style type="text/css">
  body{width: 100%; min-height: 979px; background: url(/Public/Admin/images/bg/seller_login_bg.jpg) center center no-repeat;}
  #alert-action-logup .mail-logup{ margin: 0 auto; display: block; width: 295px; margin-top: 25px;}
  </style>
  </head>
<body>
	<div id="alert-action-logup">
	  <div class="alert-action">
		<div class="alert-action-main">
		  <div class="zname"> <i class="logo"></i>
			<span>素材</span>
		  </div>
		  <div class="main clearfix">
			<div class="mail-logup">
			  <div class="logup-form">
				<input class="name" type="text" name="name" id="username" placeholder="账号登录">
				<input class="passwd" type="password" name="passwd" id="password" placeholder="登录密码">
				<button class="login-submit">登录</button>
			  </div>
		  </div>
		</div>
	  </div>
	</div>
	</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.slide.js"></script>
<script type="text/javascript">
	$('.ck-slide').ckSlide({
	  autoPlay: true
	});
	$(function(){
		
		//登录
		$('.login-submit').click(function () {
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                type:'post',
                dataType:'json',
                data:{username:username,password:password},
                url:"<?php echo U('Public/checkLogin');?>",
                error:function () {
                    alert("未知错误");
                },
                success:function (data) {
                    if (data.code == 1) {
                        layer.msg('登录成功', {icon:6,time:1000}, function(){
							location.href = '/';
                        });
                    }else if (data.code == -6) {
                        layer.msg('用户名不存在', {icon:5,time:1000});
                    }else if (data.code == -8) {
                        layer.msg('密码错误', {icon:5,time:1000});
                    }else {
                        layer.msg(data.msg, {icon:5,time:1000});
                    }
                }
            });
        });
		
		

	});

</script>
</html>