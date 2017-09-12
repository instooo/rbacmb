<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer" content="webkit">
  <title>7477素材网</title>
  <link rel="stylesheet" href="/Public/Admin/style/index_base.v4.4.css">
  <link rel="stylesheet" type="text/css" href="/Public/Admin/style/index.v1.7.css">
  <script type="text/javascript" src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
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
  <div id="index-banner">

    <div class="ck-slide">
      <ul class="ck-slide-wrapper">
        <li >
          <a  rel="nofollow" style="background: url(/Public/Admin/images/bannar1.png) no-repeat center; background-size: cover;"></a>
        </li>
        <li style='display:none'>
          <a  rel="nofollow" style="background: url(/Public/Admin/images/bannar3.png) no-repeat center; background-size: cover;"></a>
        </li>
      </ul>
      <a href="javascript:" class="ctrl-slide ck-prev">上一张</a>
      <a href="javascript:" class="ctrl-slide ck-next">下一张</a>
      <div class="ck-slidebox">
        <div class="slideWrap">
          <ul class="dot-wrap">
            <li class='current'><em>1</em></li>
            <li><em>2</em></li>
          </ul>
        </div>
      </div>
      <div class="search">
        <h2></h2>
        <div class="search-m">

          <div class="btn-select-search fl" id="pic_index_search">
            <div class="current-select">
              <span id="pic_current_search_type">全部作品</span> <i></i>
            </div>
          </div>

          <form id="searchform" method="get" action="<?php echo U('media/myMedia');?>">
            <input type="hidden" id="pic_form_search_model" name="search_mode" value="all"/>
            <input type="text" class="text fl" id="searchinput" name="kw" placeholder="<?php echo ($count); ?>张高清图片免费下载" AUTOCOMPLETE="OFF">
            <input id="pic_form_search_submit" type="submit" class="but fl tran" value="搜 索"></form>
          <div pic-click-type="sug-list" class="search-sug"></div>
          <div pic-click-type="sug-list" class="search-hot"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="wrapper">
    <?php if(($role) == "3"): ?><div class="state">
      <div class="state-m">
        <dl>
          <a href="<?php echo U('media/mymedia',array('status'=>1,'test'=>'true'));?>" rel="nofollow">
            <dt> <i class="st1"></i>
              已测试作品
            </dt>
            <dd style="color:#fd6d49; ">已通过创意主管审核</dd>
            <dd>推广部已上线测试</dd>
          </a>
        </dl>
        <dl>
          <a href="<?php echo U('media/mymedia',array('status'=>1,'test'=>'false'));?>" rel="nofollow">
            <dt>
              <i class="st2"></i>
              未测试作品
            </dt>
            <dd>已通过创意主管审核</dd>
            <dd>推广部没有上线测试</dd>
          </a>
        </dl>
        <dl>
          <a href="<?php echo U('media/mymedia',array('status'=>1,'mt_status'=>1));?>" rel="nofollow">
            <dt>
              <i class="st3"></i>
              测试通过作品
            </dt>
            <dd>已上线测试的素材</dd>
            <dd>效果达到合格标准</dd>
          </a>
        </dl>
        <dl>
          <a href="<?php echo U('media/mymedia',array('status'=>1,'mt_status'=>2));?>" rel="nofollow">
            <dt>
              <i class="st4"></i>
              测试未通过作品
            </dt>
            <dd>已上线测试的素材</dd>
            <dd>测试结果未达标的素材</dd>
          </a>
        </dl>

      </div>
    </div><?php endif; ?>
    <?php if(($role) != "3"): ?><div class="state">
      <div class="state-m">
        <dl>
          <a href="<?php echo U('media/mymedia',array('status'=>1));?>" rel="nofollow">
            <dt> <i class="st1"></i>
              已审核作品
            </dt>
            <dd style="color:#fd6d49; ">已通过创意主管审核</dd>
            <dd>可以提交推广部上线测试</dd>
          </a>
        </dl>
        <?php if(($role) == "2"): ?><dl>
            <a href="<?php echo U('media/mymedia',array('status'=>0));?>" rel="nofollow">
              <dt>
                <i class="st2"></i>
                未审作品
              </dt>
              <dd>主管未审审核</dd>
              <dd>等待审核</dd>
            </a>
          </dl><?php endif; ?>
          <dl>
            <a href="<?php echo U('media/mymedia',array('status'=>2));?>" rel="nofollow">
              <dt>
                <i class="st2"></i>
                未审核作品
              </dt>
              <dd>未通过创意主管审核</dd>
              <dd>需修改或弃用</dd>
            </a>
          </dl>
        <dl>
          <a href="<?php echo U('media/mymedia',array('mt_status'=>1));?>" rel="nofollow">
            <dt>
              <i class="st3"></i>
              媒体达标作品
            </dt>
            <dd>已上线测试的素材</dd>
            <dd>效果达到合格标准</dd>
          </a>
        </dl>
        <dl>
          <a href="<?php echo U('media/mymedia',array('mt_status'=>2));?>" rel="nofollow">
            <dt>
              <i class="st4"></i>
              媒体未通过作品
            </dt>
            <dd>包括媒体拒审</dd>
            <dd>测试结果未达标的素材</dd>
          </a>
        </dl>

      </div>
    </div>

      <div class="user-use-down" style="width: 100%;border-bottom: 1px solid #d8dce0;min-height:366px;">
        <div class="user-use">
          <p class="title">素材创新人员</p>
          <div class="list-user clearfix">
		  
		  <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="use-con" style="width: 312px;">
              <div class="bg-white clearfix">
                <a href="<?php echo U('data/index',array('uid'=>$vo['id']));?>">
				<?php if($vo["info"] == null): ?><img src="/Public/Admin/images/index-page-user2.png" class="user-pic" style="width: 145px;">
				<?php else: ?>
                <img src="<?php echo ($vo["info"]); ?>" class="user-pic" style="width: 145px;"><?php endif; ?>
                </a>
                <div class="user-info" style="max-width: 130px;padding: 15px 6px 15px 10px;">
                  <p>
                    <a href="<?php echo U('media/otherMedia',array('uid'=>$vo['id']));?>">
                    <span class="user-name"><?php echo ($vo["nickname"]); ?></span></br>
                    </a>
                    <span class="user-pos">7477设计师</span>
                  </p>
                  <div class="pro">
                    <p></p>
                  </div>
                  <p class="brief"><?php echo ($vo["remark"]); ?></p>
                </div>

              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?> 
            

          </div>
        </div>
      </div><?php endif; ?>
  </div>

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
<script type="text/javascript" src="/Public/Admin/js/jquery.slide.js"></script>

<script type="text/javascript">
		$('.ck-slide').ckSlide({
		  autoPlay: true
		});
</script>
</html>