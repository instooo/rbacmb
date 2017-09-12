<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer" content="webkit">
  <title>账号设置</title>
  <meta name="keywords" content="账号设置" />
  <meta name="description" content="账号设置" />
  <link rel="stylesheet" href="/Public/Admin/style/base.v4.5.css">
  <link rel="stylesheet" type="text/css" href="/Public/Admin/style/account.css" />
  <script type="text/javascript" src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
  <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
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
  <!--中间内容开始-->
  <div class="wrapper">
   <form action="/User/userEdit" method="post" enctype="multipart/form-data">
    <div class="content_set">
      <div class="set_1">
        <span>账号设置</span>
      </div>
      <div class="con">
        <div class="con-tr" id="upload-user-info">
          <div class="lin-60">
            <span class="data">个人信息</span>
            <span class="name">修改个人信息</span>
            <span class="edit">
              编辑
              <i class="current"></i>
            </span>
          </div>
          <div class="duo">
            <div class="faceCen-main">
              
              <label class="control-label">账号：</label>
              <div class="controls Per-infor">
                <input type="text" name="id" value="<?php echo ($list["id"]); ?>" readonly style="cursor: not-allowed;" />
              </div>
			   <label class="control-label">密码：</label>
              <div class="controls Per-infor">
                <input type="text" name="password" value="" id="password" />
              </div>
			  
              <label class="control-label">昵称：</label>
              <div class="controls Per-infor">
                <input type="text" name="nickname" value="<?php echo ($list["nickname"]); ?>" id="nickname" />
              </div>
			  
              <label class="control-label">格言：</label>
              <div class="controls Per-infor" style="line-height: 0;">
                <textarea name="remark" id="remark"><?php echo ($list["remark"]); ?></textarea>
              </div>
			  
              <label class="control-label">修改头像：</label>
			  
			  <div style="width:100px;height:100px;margin-left:115px;margin-bottom:10px;">
			       <?php if($list["info"] == null): ?><img src="/public/admin/images/index-page-user2.png" style="width:100px;height:100px;">
				   <?php else: ?>
				   <img src="<?php echo ($list["info"]); ?>" style="width:100px;height:100px;"><?php endif; ?>
			  </div>
			  
              
              <label class="control-label">&nbsp;</label>
             
				<div class="controls Per-infor" style="position:relative; float:left; height:32px; width:110px; margin:0 20px 0 0;">
					<input type="button" name="file" value="上传" class="submit-infor" style="position:absolute; left:0; z-index:1;" />
					<input type="file" name="file" value="上传" style="position:absolute; left:0; z-index:10; filter:alpha(opacity=0);-moz-opacity:0;-khtml-opacity: 0; opacity:0; width:90px;" />
				</div>
               
			  
				<div class="controls Per-infor" style="height:32px; float:left; margin:0 20px 0 0;">
				   <input type="submit" value="保存" class="submit-infor" id="submit-detail-info" />
				</div>

            </div>
          </div>
        </div>
        
      </div>
    </div>
	</form>
  </div>
  <script type="text/javascript" src="/Public/Admin/js/account.js"></script>
  <script type="text/javascript">
    $(function(){
        // 显示与否的选择
        $(".Per-infor span").click(function(){
            if ($(this).hasClass("active")) {
                $(this).removeClass("active").attr('data-status', 0);
            } else {
                $(this).addClass("active").attr('data-status', 1);
            }
        });
        // 擅长内容的选取
        $(".be-good-at span").click(function(){
            if ($(this).hasClass("curr")) {
                $(this).removeClass("curr").attr('data-status', 0);
            } else {
                $(this).addClass("curr").attr('data-status', 1);
            }
        });
		
    })
  </script>



</body>
</html>