<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="renderer" content="webkit">
    <title>测试员达标率</title>
    <meta name="keywords" content="测试员达标率" />
    <meta name="description" content="测试员达标率" />
    <link rel="stylesheet" href="/Public/Admin/style/base.v4.5.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/uploadvectordiagram.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/photo.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/account.css" />
    <script src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
    <script src="/Public/Admin/js/laydate/laydate.js"></script>
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
<div class="wrapper">
    <div class="content_set" id="content_set">
        <div class="set_1" style="height: auto; line-height: 40px">
            测试通过数：<?php echo ($count[0]['num']); ?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            测试数：<?php echo ($count[0]['total']); ?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            达标率：
            <?php echo sprintf('%.2f', $count[0]['num']/$count[0]['total']*100); ?>%
            <div>
                <form action="<?php echo U('data/standard');?>" method="get">
                测试时间：<input name="starttime" id="start_time" value="<?php echo ($_GET['starttime']); ?>" onclick="laydate({elem: '#start_time',istime: true,format: 'YYYY-MM-DD hh:mm:ss'});">
                <span>~</span>
                <input name="endtime" id="end_time" value="<?php echo ($_GET['endtime']); ?>" onclick="laydate({elem: '#end_time',istime: true,format: 'YYYY-MM-DD hh:mm:ss'});">
                <input type="submit" value="搜索">
                </form>
            </div>
        </div>
        <div class="table_tag">
            <a href="javascript:void(0);" class="on">测试人</a>
            <a href="javascript:void(0);">上传人</a>
            <a href="javascript:void(0);">尺寸</a>
            <a href="javascript:void(0);">分类</a>
            <a href="javascript:void(0);">游戏</a>
        </div>

        <div class="con">
            <table class="node_table" style="display: table;">
                <tr>
                    <th>测试人</th>
                    <th>通过数量</th>
                    <th>测试数量</th>
                    <th>达标率</th>
                    <th>双达标</th>
                    <th>点击率达标</th>
                    <th>成本达标</th>
                    <th>转化率达标</th>
                    <th>输出率</th>
                </tr>
                <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["nickname"]); ?></td>
                        <td><?php echo ($vo["num"]); ?></td>
                        <td><?php echo ($vo["total"]); ?></td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['num']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['doublenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['clicknum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['costnum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['changenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', ($vo['doublenum']+$vo['costnum'])/$vo['total']*100); ?>%
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <table class="node_table">
                <tr>
                    <th>上传人</th>
                    <th>通过数量</th>
                    <th>测试数量</th>
                    <th>达标率</th>
                    <th>双达标</th>
                    <th>点击率达标</th>
                    <th>成本达标</th>
                    <th>转化率达标</th>
                    <th>输出率</th>
                </tr>
                <?php if(is_array($uploads)): $i = 0; $__LIST__ = $uploads;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["nickname"]); ?></td>
                        <td><?php echo ($vo["num"]); ?></td>
                        <td><?php echo ($vo["total"]); ?></td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['num']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['doublenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['clicknum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['costnum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['changenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', ($vo['doublenum']+$vo['costnum'])/$vo['total']*100); ?>%
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <table class="node_table">
                <tr>
                    <th>尺寸</th>
                    <th>通过数量</th>
                    <th>测试数量</th>
                    <th>达标率</th>
                    <th>双达标</th>
                    <th>点击率达标</th>
                    <th>成本达标</th>
                    <th>转化率达标</th>
                    <th>输出率</th>
                </tr>
                <?php if(is_array($sizes)): $i = 0; $__LIST__ = $sizes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["size"]); ?></td>
                        <td><?php echo ($vo["num"]); ?></td>
                        <td><?php echo ($vo["total"]); ?></td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['num']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['doublenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['clicknum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['costnum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['changenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', ($vo['doublenum']+$vo['costnum'])/$vo['total']*100); ?>%
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <table class="node_table">
                <tr>
                    <th>分类</th>
                    <th>通过数量</th>
                    <th>测试数量</th>
                    <th>达标率</th>
                    <th>双达标</th>
                    <th>点击率达标</th>
                    <th>成本达标</th>
                    <th>转化率达标</th>
                    <th>输出率</th>
                </tr>
                <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["name"]); ?></td>
                        <td><?php echo ($vo["num"]); ?></td>
                        <td><?php echo ($vo["total"]); ?></td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['num']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['doublenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['clicknum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['costnum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['changenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', ($vo['doublenum']+$vo['costnum'])/$vo['total']*100); ?>%
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <table class="node_table">
                <tr>
                    <th>游戏</th>
                    <th>通过数量</th>
                    <th>测试数量</th>
                    <th>达标率</th>
                    <th>双达标</th>
                    <th>点击率达标</th>
                    <th>成本达标</th>
                    <th>转化率达标</th>
                    <th>输出率</th>
                </tr>
                <?php if(is_array($game)): $i = 0; $__LIST__ = $game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["game"]); ?></td>
                        <td><?php echo ($vo["num"]); ?></td>
                        <td><?php echo ($vo["total"]); ?></td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['num']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['doublenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['clicknum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['costnum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $vo['changenum']/$vo['total']*100); ?>%
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', ($vo['doublenum']+$vo['costnum'])/$vo['total']*100); ?>%
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    $(".table_tag a").on("click",function(event) {
        $(this).addClass("on").siblings().removeClass("on");
        $(".content_set .con table").hide().eq($(this).index()).show();
    });
})
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