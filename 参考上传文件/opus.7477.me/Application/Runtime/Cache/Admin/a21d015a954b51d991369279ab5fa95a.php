<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="renderer" content="webkit">
    <title>我的测试</title>
    <meta name="keywords" content="我的测试"/>
    <meta name="description" content="我的测试"/>
    <link rel="stylesheet" href="/Public/Admin/style/base.v4.5.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/search.v4.css">
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
<!-- header end -->
<div id="wrapper">
    <form id="form" method="get" action="<?php echo U('media/testMedia');?>">
        <div class="sea-search">
            <div class="sea-m">
                <a href="/">
                    <div class="sea-logo fl"></div>
                </a>
                <div class="btn-select-search fl" id="pic_index_search">
                    <div class="current-select">
            <span id="pic_current_search_type">
               <?php echo W('Common/searchType');?>
            </span>
                        <i></i>
                    </div>
                    <div class="select-list" id="pic_search_type_table">
                        <div id="pic_search_type_list">
                            <a pic-click-type="search_type" pic-search-type="all" href="javascript:void(0);">全部作品</a>
                            <a pic-click-type="search_type" pic-search-type="photo" href="javascript:void(0);">swf素材</a>
                            <a pic-click-type="search_type" pic-search-type="vector"
                               href="javascript:void(0);">flv动画</a>
                            <a pic-click-type="search_type" pic-search-type="video" href="javascript:void(0);">MP4视频</a>
                        </div>
                    </div>
                </div>

                <div class="sea-search-m fl search-m">


                    <input type="hidden" id="pic_form_search_model" name="search_mode"
                           value="<?php echo ($_GET['search_mode']); ?>"/>
                    <input type="text" class="text fl" name="kw" id="searchinput" placeholder="输入关键字搜索图片"
                           value="<?php echo ($_GET['kw']); ?>" AUTOCOMPLETE="OFF">
                    <input type="submit" class="but fl tran" id="searchbtn" value="搜 索">

                    <div pic-click-type="sug-list" class="search-sug"></div>
                </div>
                <a href="javascript:void(0);" class="pageup fr checkall">全选</a>
                <a href="javascript:void(0);" class="pageup fr downloads">批量下载</a>
            </div>
        </div>

        <div class="sea-nav">
            <div class="sea-nav-m">

                <div class="row clearfix">
                    <div class="fl row-l">分类：</div>
                    <div class="fl row-m clearfix" style="height: auto">
                        <?php echo W('Common/cate');?>
                        <input type="hidden" name="cid" value="<?php echo ($_GET['cid']); ?>" id="cid">
                    </div>
                    <div class="fr row-r on">
            <span class="wap-touch nav-link">
              <i></i>
            </span>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="fl clear-l">媒体：</div>
                    <div class="fl row-m clearfix" style="height: auto">
                        <?php echo W('Common/channel');?>
                        <input type="hidden" name="chanid" value="<?php echo ($_GET['chanid']); ?>" id="chanid">
                    </div>
                    <div class="fr row-r on">
                    <span class="wap-touch nav-link">
                      <i></i>
                    </span>
                    </div>
                </div>
                <div class="filter clearfix">
                    <div class="row-list fl">
                        <div class="row-list-t">
                            排序
                            <i></i>
                        </div>
                        <div class="row-list-m new-filter-order">
                            <?php echo W('Common/orderList');?>
                            <input type="hidden" name="order" value="<?php echo ($_GET['order']); ?>">
                        </div>
                    </div>
                    <div class="row-list fl">
                        <div class="row-list-t">
                            图片大小
                            <i></i>
                        </div>
                        <div class="row-list-m">
                            <div class="input-m clearfix">
                                <p>大于：</p>
                                <form class="new-filter-size">
                                    <input type="text" class="txt fl" onkeyup="this.value=this.value.replace(/\D/g,'')"
                                           name="width" onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                           value="<?php echo ($_GET['width']); ?>" placeholder="宽度">
                                    <span class="fl">x</span>
                                    <input type="text" class="txt fl" onkeyup="this.value=this.value.replace(/\D/g,'')"
                                           name="height" onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                           value="<?php echo ($_GET['height']); ?>" placeholder="高度">
                                    <span class="fl">px</span>
                                    <input type="button" class="but fr" id="size" value="确定"></form>
                            </div>
                        </div>
                    </div>
                    <div class="row-list fl">
                        <span class="filter-span  fl dispper" style=" padding-left: 15px;">游戏：</span>
                        <input type="text" class="txt fl" value="<?php echo ($_GET['game']); ?>" name="game"
                               style="padding: 0 10px;height: 26px;line-height: 26px;border: 1px #e4e4e6 solid;-webkit-border-radius: 1px;border-radius: 1px; margin-right: 10px;text-align: center;">
                        <input id="game" type="button"
                               style="width: 48px;height: 30px;color: #fff;background: #269edc;border: none;cursor: pointer;"
                               value="确定">
                    </div>
                    <div class="row-list fl">
                        <span class="filter-span  fl dispper" style=" padding-left: 15px;">作品时间：</span>
                        <input type="text" class="txt fl" value="<?php echo ($_GET['addtime']); ?>" style="padding: 0 10px;height: 28px;line-height: 28px;border: 1px #e4e4e6 solid;-webkit-border-radius: 1px;border-radius: 1px; margin-right: 10px;text-align: center;" id="starttime" name="addtime">
                        <input type="text" class="txt fl" value="<?php echo ($_GET['endtime']); ?>" style="padding: 0 10px;height: 28px;line-height: 28px;border: 1px #e4e4e6 solid;-webkit-border-radius: 1px;border-radius: 1px; margin-right: 10px;text-align: center;" id="endtime" name="endtime">

                        <input id="addtime" type="button"
                               style="width: 48px;height: 30px;color: #fff;background: #269edc;border: none;cursor: pointer;"
                               value="确定">
                    </div>
                </div>
    </form>
</div>
</div>

<!-- 图片流 start -->
<?php if(empty($listinfo)): ?><style>

    .result-box {
        background-color: #fff;
        height: 125px;
        margin: 40px auto 20px;
        padding: 70px 0 45px;
        width: 93%;
    }
    .result-box p {
        color: #666;
        text-align: center;
    }
    .result-box .sorry-word {
        font-size: 18px;
        line-height: 30px;
        height: 30px;
    }
    .result-box .brief-word {
        line-height: 20px;
        margin-top: 10px;
    }
    .result-box .sub-but-idea {
        height: 40px;
        line-height: 40px;
        width: 175px;
        background-color: #269edc;
        border-radius: 2px;
        color: #fff;
        text-align: center;
        font-size: 16px;
        margin: 20px auto 0;
    }
    .result-box .sorry-word a, .result-box .brief-word a {
        color: #269edc;
    }
    .result-box .brief-word span {
        color: #ff5200;
    }

</style>

<div class="result-box">
    <p class="sorry-word">抱歉，没有找到 "<a href=""><?php echo ($_GET['kw']); ?></a>"  相关的图片</p>
    <p class="brief-word">
        您可以<span>简化</span>、<span>缩短关键词</span> 或 <span>减少筛条件</span>。
        <span class="guess">可以尝试这些词搜索：</span>

        <a href=""><?php echo ($_GET['kw']); ?></a><a href=""> </a><a href=""> </a><a href=""> </a><a href=""> </a><a href=""> </a>                </p>
    <a href="javascript:history.go(-1);"><div class="sub-but-idea">返回上一页</div></a>
</div><?php endif; ?>
<div class="imgshow clearfix">
    <div class="swipeboxEx">
        <form id="go-down" action="<?php echo U('media/downLoad');?>" method="get">
            <?php if(is_array($listinfo)): $i = 0; $__LIST__ = $listinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list" data-w="400" data-h="300">
                    <a href="/media/detail/mid/<?php echo ($vo["mid"]); ?>" target="_blank">
                        <img class="lazy" src="/Public/Admin/images/blank.png" data-original="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>" title=""/>
                        <p><?php echo ($vo["title"]); ?></p>
                    </a>
                    <div class="collect-icon">
                        <a class="collect-best" title="勾选">
                            <input type="checkbox" name="mids[]" value="<?php echo ($vo["mid"]); ?>">
                        </a>
                    </div>
                    <div class="downimg" event-statistics="true" event-name="download">
                        <a href="/media/detail/mid/<?php echo ($vo["mid"]); ?>" rel="nofollow">评论</a>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
    </div>
</div>

<div class="pagelist" style="margin: 20px 0;">
    <div class=pager-linkPage>
        <?php echo ($page); ?>
    </div>
</div>
</div>

<script type="text/javascript" src="/Public/Admin/js/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.flex-images.min.1.0.4.js"></script>
<script type="text/javascript" src="/Public/Admin/js/search.v1.js"></script>
<script type="text/javascript" src="/Public/Admin/js/base.js"></script>
<script src="/Public/Admin/js/laydate/laydate.js"></script>
<script>
    ;
    !function () {
        laydate({
            elem: '#starttime',
            istime: true,
            format: 'YYYY-MM-DD hh:mm:ss',
            max: laydate.now().substr(0, 10),
            zIndex: 999
        })
    }();
    ;!function(){
        laydate({
            elem: '#endtime',
            istime: true,
            format: 'YYYY-MM-DD hh:mm:ss',
            max: laydate.now().substr(0,10),
            zIndex: 999
        })
    }();

    $(function () {
        var layoutnav = function () {
            var navw = $('.sea-nav .row-m').width();
            $('.sea-nav .nav-m a').remove();
            var roww = 0;
            $('.sea-nav .row-m a').each(function () {
                var w = $(this).width();
                roww += w + 40;
                if (roww > navw) {
                    $(this).addClass('h');
                    $('.sea-nav .nav-m').append($(this).clone());
                }
            })
        }
        layoutnav();
        $(window).on('resize', layoutnav);
    });

    //查询
    $(".row-m a").click(function () {
        var cid = $(this).attr("data-cid");
        $(this).siblings("input[type='hidden']").attr('value', cid);
        $("#form").submit();
        return false;
    });
    $("#size").click(function () {
        $("#form").submit();
        return false;
    });
    $('#addtime').click(function () {
        $("#form").submit();
        return false;
    });
    $('#game').click(function () {
        $("#form").submit();
        return false;
    });
    $('.new-filter-order a').click(function () {
        var order = $(this).attr("data-order");
        $(this).siblings("input[type='hidden']").attr('value', order);
        $("#form").submit();
        return false;
    });
    $('.downloads').click(function () {
        $('#go-down').submit();
    });

    $('.checkall').click(function(){
        if ($('.checkall').hasClass('on')){
            $('.checkall').removeClass('on');
            $("input[name='mids[]']").attr('checked',false);
        }else {
            $('.checkall').addClass('on');
            $("input[name='mids[]']").attr('checked',true);
        }
    });
</script>

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