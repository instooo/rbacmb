<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="renderer" content="webkit">
    <title>业绩考核</title>
    <meta name="keywords" content="业绩考核" />
    <meta name="description" content="业绩考核" />
    <link rel="stylesheet" href="/Public/Admin/style/base.v4.5.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/uploadvectordiagram.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/photo.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/account.css" />
    <script src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
    <script src="/Public/Admin/js/laydate/laydate.js"></script>
    <style type="text/css">
    .btn-default{display: block; margin-left: 40px;}
    .set_1{float: left; clear: both; color: #666; font-size: 12px; width: 100%;}
    .set_1 input,.set_1 select{position: relative; border: 1px solid #dbdbdb; border-radius: 2px; height: 28px; line-height: 28px; margin-right: 10px; font-size: 12px; padding: 0 10px;}
    .set_1 select{outline: none; color: #666;}
    .set_1 span{margin-right: 10px;}
    .set_1 input[type="submit"]{background: #0099e5; color: #fff; cursor: pointer; border-radius: 5px; height: 28px; line-height: 28px; text-align: center;}
    .content_set .con{clear: both; margin-top: 20px;}
    .node_table tr a:hover{color: #0099e5;}
    </style>
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
    <div class="content_set">
        <a class="btn-default" href="<?php echo U('data/standard');?>">达标率</a>
        <div class="set_1">
           <form action="<?php echo U('data/index');?>" method="get">
               <?php if($uid != null): ?><input type="hidden" name="uid" value="<?php echo ($uid); ?>"><?php endif; ?>
               素材名称：<input name="title" value="<?php echo ($_GET['title']); ?>">
               上传时间：<input name="starttime" id="start_time" value="<?php echo ($_GET['starttime']); ?>" onclick="laydate({elem: '#start_time',format: 'YYYY-MM-DD hh:mm:ss'});">
               <span>~</span>
               <input name="endtime" id="end_time" value="<?php echo ($_GET['endtime']); ?>" onclick="laydate({elem: '#end_time',format: 'YYYY-MM-DD hh:mm:ss'});">
               状态：<select id="status" name="status">
                        <option value="0">选择状态</option>
                        <option value="1">通过</option>
                        <option value="2">未通过</option>
                  </select>
               <input type="submit" value="搜索">
           </form>
        </div>
        <div class="con">
            <table class="node_table" width="100%">
                <tr>
                    <th>素材名称</th>
                    <th>消耗(￥)</th>
                    <th>曝光</th>
                    <th>eCTC(￥)</th>
                    <th>CTR</th>
                    <th>点击</th>
                    <th>注册</th>
                    <th>转化率</th>
                    <th>转化成本(￥)</th>
                    <th>评价时间</th>
                    <th>状态</th>
                    <th>素材上传人</th>
                </tr>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td>
                            <a href="<?php echo U('media/detail',array('mid'=>$vo['mid']));?>" target="_blank">
                                <?php echo ($vo["title"]); ?>
                            </a>
                        </td>
                        <td><?php echo ($vo["expend"]); ?></td>
                        <td><?php echo ($vo["show_num"]); ?></td>
                        <td><?php echo ($vo["ectc"]); ?></td>
                        <td><?php echo ($vo["click_per"]); ?>%</td>
                        <td><?php echo ($vo["click_num"]); ?></td>
                        <td><?php echo ($vo["reg_num"]); ?></td>
                        <td><?php echo sprintf('%.3f', $vo['reg_num']/$vo['click_num']*100); ?>%</td>
                        <td><?php echo sprintf('%.2f', $vo['expend']/$vo['reg_num']); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$vo["pjtime"])); ?></td>
                        <td>
                            <?php switch($vo["status"]): case "1": ?><span style="color:#0099e5">达标【<?php echo ($vo["ext2"]); ?>】</span><?php break;?>
                                <?php case "2": ?><span style="color: red">不达标</span><?php break; endswitch;?>
                        </td>
                        <td><?php echo ($vo["nickname"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div class="pagelist" style="margin: 20px 0;">
                <div class=pager-linkPage>
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   $(function(){
       var select ="<?php echo ($_GET['status']); ?>";
       $("#status option[value='"+select+"']").attr("selected",true);
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