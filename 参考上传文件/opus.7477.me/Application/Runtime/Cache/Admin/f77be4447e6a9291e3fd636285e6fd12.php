<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer" content="webkit">
  <title>上传素材</title>
  <meta name="keywords" content="上传素材" />
  <meta name="description" content="上传素材" />
  <link rel="stylesheet" href="/Public/Admin/style/base.v4.5.css">
  <link rel="stylesheet" type="text/css" href="/Public/Admin/style/uploadvectordiagram.css">
  <link rel="stylesheet" type="text/css" href="/Public/Admin/style/photo.css">
  <script src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
</head>
<body>
  <?php if($role == 1 ): ?><div id="header">
	<div class="head">
		<div class="logo fl">
			<a href="/" title="返回摄图网首页"></a>
		</div>
		<div class="nav fl clearfix">
			<div class="nav-list fl ">
				<a href="<?php echo U('media/bestMedia');?>" class="nav-link pc-click">精品素材</a>
			</div>
			<div class="nav-list fl ">
				<a href="<?php echo U('media/myMedia',array('have'=>'true'));?>" class="nav-link pc-click">所有已审核作品</a>
			</div>
			<div class="nav-list fl ">
				<a  href="<?php echo U('media/userMedia');?>"  class="nav-link" target="_blank">我的作品</a>
			</div>
			<div class="nav-list fl ">
				<a  href="/upload/uploadmedia"  class="nav-link" target="_blank">我要上传</a>
			</div>
		</div>
		<div class="user fr">
				<div class="header">
				<?php if($_SESSION['photo'] == null): ?><img src="/Public/Admin/images/index-page-user2.png">
					<?php else: ?>
					<img src="<?php echo ($_SESSION['photo']); ?>"><?php endif; ?>
				</div>
				<div class="user">

				<a href="javascript:void(0)" data="user_name" style="max-width: 68px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo ($_SESSION['user']); ?></a>

				<div class="new-user-menu" style="overflow: hidden; display: none;" data="">
				<div class="new-user-menu-div new-border-bottom">ID号：<?php echo ($_SESSION['uid']); ?></div>

				<div class="new-user-menu-div new-myaccount new-border-bottom">
					<a href="/User/setUser/?uid=<?php echo ($_SESSION['uid']); ?>" class="btn_edit">
					  <i></i>
					  账号设置
					</a>
				</div>
				<div class="new-user-menu-div new-myupload">
					<a href="<?php echo U('media/userMedia');?>" target="_blank">
					  <i></i>
					  我的图片
					</a>
				</div>
				<div class="new-user-menu-div new-up">
					<a href="<?php echo U('upload/uploadmedia');?>" target="_blank">
					  <i></i>
					  上传图片
					</a>
				</div>
				<div class="new-user-menu-div new-logout">
					<span class="loginoutBtn">
					  <i></i>
					  退出
					</span>
				</div>
            </div>
		  </div>
		</div>

	</div>
</div>
<?php elseif($role == 2 ): ?>
<div id="header">
	<div class="head">
		<div class="logo fl">
			<a href="/" title="返回摄图网首页"></a>
		</div>
		<div class="nav fl clearfix">
			<div class="nav-list fl ">
				<a href="<?php echo U('media/bestMedia');?>" class="nav-link pc-click">精品素材</a>
			</div>
			<div class="nav-list fl ">
				<a  href="<?php echo U('media/dataMedia',array('date'=>'today'));?>"  class="nav-link" target="_blank">今日新增作品</a>
			</div>
			<div class="nav-list fl ">
				<a  href="<?php echo U('media/dataMedia',array('date'=>'yesterday'));?>"  class="nav-link" target="_blank">昨日新增作品</a>
			</div>
			<div class="nav-list fl ">
				<a  href="<?php echo U('data/index');?>"  class="nav-link" target="_blank">业绩考核</a>
			</div>
			<div class="nav-list fl ">
				<a  href="/system/index"  class="nav-link" target="_blank">系统设置</a>
			</div>
		</div>

		<div class="user fr">
				<div class="header">
					<?php if($_SESSION['photo'] == null): ?><img src="/Public/Admin/images/index-page-user2.png">
						<?php else: ?>
						<img src="<?php echo ($_SESSION['photo']); ?>"><?php endif; ?>
				</div>
				<div class="user">

				<a href="javascript:void(0)" data="user_name" style="max-width: 68px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo ($_SESSION['user']); ?></a>

				<div class="new-user-menu" style="overflow: hidden; display: none;" data="">
				<div class="new-user-menu-div new-border-bottom">ID号：<?php echo ($_SESSION['uid']); ?></div>

				<div class="new-user-menu-div new-myaccount new-border-bottom">
					<a href="/User/setUser/?uid=<?php echo ($_SESSION['uid']); ?>" class="btn_edit">
					  <i></i>
					  账号设置
					</a>
				</div>
				<div class="new-user-menu-div new-logout">
					<span class="loginoutBtn">
					  <i></i>
					  退出
					</span>
				</div>
            </div>
		  </div>
		</div>

	</div>
</div>
<?php elseif($role == 3 ): ?>
<div id="header">
	<div class="head">
		<div class="logo fl">
			<a href="/" title="返回摄图网首页"></a>
		</div>
		<div class="nav fl clearfix">
			<div class="nav-list fl ">
				<a href="<?php echo U('media/bestMedia');?>" class="nav-link pc-click">精品素材</a>
			</div>
			<div class="nav-list fl ">
				<a  href="<?php echo U('media/testMedia');?>"  class="nav-link" target="_blank">我的测试</a>
			</div>
			<div class="nav-list fl ">
				<a  href="<?php echo U('test/index');?>"  class="nav-link" target="_blank">下载测试素材</a>
			</div>
			<div class="nav-list fl ">
				<a  href="<?php echo U('data/batchTest');?>"  class="nav-link" target="_blank">批量测试</a>
			</div>
		</div>		
	</div>

	<div class="user fr">
				<div class="header">
					<?php if($_SESSION['photo'] == null): ?><img src="/Public/Admin/images/index-page-user2.png">
						<?php else: ?>
						<img src="<?php echo ($_SESSION['photo']); ?>"><?php endif; ?>
				</div>
				<div class="user">

				<a href="javascript:void(0)" data="user_name" style="max-width: 68px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo ($_SESSION['user']); ?></a>


				<div class="new-user-menu" style="overflow: hidden; display: none;" data="">
				<div class="new-user-menu-div new-border-bottom">ID号：<?php echo ($_SESSION['uid']); ?></div>

				<div class="new-user-menu-div new-myaccount new-border-bottom">
					<a href="/User/setUser/?uid=<?php echo ($_SESSION['uid']); ?>" class="btn_edit">
					  <i></i>
					  账号设置
					</a>
				</div>
				<div class="new-user-menu-div new-myupload">
					<a href="<?php echo U('media/testMedia');?>" target="_blank">
					  <i></i>
					  我的测试
					</a>
				</div>
				<div class="new-user-menu-div new-logout">
					<span class="loginoutBtn">
					  <i></i>
					  退出
					</span>
				</div>
            </div>
		  </div>
		</div>
</div><?php endif; ?>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/header.js"></script> 
  <div class="upload-nav">    
    <a href="javascript:void(0);" class="on">上传素材</a>
  </div>
  <div class="upload-main">
    <div class="upload-con">     
      <div class="upload-category clearfix">
        <span class="category-name fl">标题</span>
        <input type="text" name="title" class="category-input fl" maxlength="50" />
        <span class="category-notice fl" data-tag="title">
          可以输入
          <i>50</i>
          字，请用一句话概括出文件大意
        </span>
        <span class="notice" data-name="title">
          <i></i>
          标题格式错误
        </span>
      </div>
      <div class="upload-category clearfix">
        <span class="category-name fl">
          关键词
           <a class="btn-default auto-key" style="float: right;margin-top: 0px">自动填充</a>
        </span>
        <textarea name="keywords" class="category-textarea fl"></textarea>
        <span class="category-notice fl" data-tag="keywords">
          关键词
          <i>6</i>
          组，每组用空格分开，请包含文件的元素、内容
        </span>
        <span class="notice" data-name="keywords">
          <i></i>
          标签最少6组
        </span>
      </div>
	  <div class="upload-category clearfix">
        <span class="category-name fl">描述</span>
        <textarea name="des" class="category-textarea fl"></textarea>
        <span class="category-notice fl" data-tag="des">         
          上传素材的一句话描述
        </span>
		<span class="notice" data-name="des">
          <i></i>
          标签最少6组
        </span>		
      </div>
	  <div class="upload-category clearfix">
        <span class="category-name fl">尺寸</span>
        <input type="text" name="size1" class="category-input fl" maxlength="50" style="width:40px;" onkeyup="ptcyxylsu(this)" /><span style="display: inline-block;float: left;line-height: 50px;text-align: center;width: 30px;">*</span>
		<input type="text" name="size2"  onkeyup="ptcyxylsu(this)" class="category-input fl" maxlength="50" style="width:40px;" />
        <span class="category-notice fl" data-tag="size">
         请输入相应尺寸(格式400*400)
        </span>
        <span class="notice" data-name="size">
          <i></i>
          尺寸输入错误
        </span>
      </div>
      <div class="upload-category clearfix">
        <span class="category-name fl">分类</span>
        <div class="input-box cursor-input fl">
          <input type="text" class="input-text" name="cid" placeholder="请选择分类" onfocus="this.blur()" data-id="0" />
          <i class="triangle"></i>
          <div class="cate drop-box">
            快速选择：
            <input type="text" class="txt" id="quick_select"/>
          <?php if(is_array($cate)): $i = 0; $__LIST__ = array_slice($cate,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" data-id="<?php echo ($key); ?>"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </div>
        <span class="notice" data-name="cate">
          <i></i>
          请选择分类
        </span>
      </div>
	  <div class="upload-category clearfix">
        <span class="category-name fl">游戏</span>
        <input type="text" name="game" class="category-input fl" maxlength="50" />
        <span class="category-notice fl" data-tag="game">
          请正确填写推广素材对应的游戏 
        </span>
        <span class="notice" data-name="game">
          <i></i>
          标签最少6组
        </span>
      </div>
	  <div class="upload-category clearfix">
        <span class="category-name fl">落地页地址</span>
        <input type="text" name="cps_url" value="" class="category-input fl" maxlength="200" />
        <span class="category-notice fl" data-tag="cps_url">
          可以输入
          <i>50</i>
          字，请输入相应素材对应的落地页地址
        </span>
        <span class="notice" data-name="cps_url">
          <i></i>
          落地页地址不能为空
        </span>
      </div>
      <div class="upload-category clearfix">
        <span class="category-name fl">上传源文件</span>
        <a href="javascript:void(0);" id="picker-up" class="category-y fl">上传源文件</a>
        <span class="category-notice fl" data-tag="vectorDiagram">支持1.5M以内mp4,flv,swf文件</span>
        <span class="notice fl" data-name="vectorDiagram">
          <i></i>
          源文件上传错误
        </span>
        <div class="upload-progress"></div>
      </div>
      <div class="upload-category clearfix">
        <span class="category-name fl">上传预览图</span>
        <a href="javascript:void(0);" id="picker-down" class="category-y fl">上传预览图</a>
        <span class="category-notice fl" data-tag="preview">支持jpg、png格式，RGB模式，单张（宽、高大于1200px）</span>
        <span class="notice fl" data-name="preview">
          <i></i>
          预览图上传错误
        </span>
        <div class="wait-upload"></div>
      </div>
      <div class="upload-category clearfix">
        <span class="category-name fl">媒体</span>
        <div class="input-box cursor-input fl">
          <input type="text" class="input-text" name="chanid" placeholder="<?php echo C('MEDIA_CHANNEL_NAME');?>" onfocus="this.blur()"  data-id="<?php echo C('MEDIA_CHANNEL_ID');?>" />
          <i class="triangle"></i>
          <div class="channel drop-box">
            快速选择：
            <input type="text" class="txt" id="select_channel"/>
            <?php if(is_array($channel)): $i = 0; $__LIST__ = array_slice($channel,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="javascript:void(0);" data-id="<?php echo ($key); ?>"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </div>
        <span class="notice" data-name="channel">
          <i></i>
          请选择媒体
        </span>
      </div>
      <div class="upload-category clearfix">
        <input type="hidden" name="download_src" value="" />
        <input type="hidden" name="detail_preview_src" value="" />
        <a href="javascript:void(0);" class="sub-examine" id="sub-examine">提交审核</a>
        <span class="notice" data-name="submit">
          <i></i>
          提交审核失败
        </span>
      </div>
    </div>
  </div>
  <script>
    $(function(){
      $('#quick_select').blur(function(){
        var select = $('#quick_select').val();
        var options = $('.cate.drop-box').find("a"); // select下所有的option
        var reg = /(\|-----)*/;
        for (var i=0;i<options.length;i++){
          if (options.eq(i).text().replace(reg,'').indexOf(select)>-1){
            options.eq(i).click();
            break;
          }
        }
      });

      $('#select_channel').blur(function(){
        var select = $('#select_channel').val();
        var options = $('.channel.drop-box').find("a"); // select下所有的option
        var reg = /(\|-----)*/;
        for (var i=0;i<options.length;i++){
          if (options.eq(i).text().replace(reg,'').indexOf(select)>-1){
            options.eq(i).click();
            break;
          }
        }
      })
    });
  </script>
<script type="text/javascript" src="/Public/Admin/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/uploader.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select.js"></script>
  <div id="footer">
    <div class="foot">
      <p style="font-size: 14px; margin-bottom: 0; color: #ccc; margin-top: 5px;">7477素材网，为7477游禧科技素材系统网，内部使用，免除版权困扰</p>
      <div style="position: relative;">
        <span class="copyright">
          Copyright © 2016 深圳游禧科技有限公司旗下7477.com游戏平台 版权所有 素材网 粤ICP备14083534号
          <span class='load_time'></span>

        </span>       
      </div>
    </div>
  </div>
</body>
</html>