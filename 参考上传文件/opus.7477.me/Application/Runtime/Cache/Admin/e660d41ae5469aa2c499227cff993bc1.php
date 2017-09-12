<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="renderer" content="webkit">
  <title>详细信息</title>
  <meta name="keywords" content="详细信息" />
  <meta name="description" content="详细信息" />

  <link rel="stylesheet" href="/Public/Admin/style/base.v4.4.css">
  <link rel="stylesheet" type="text/css" href="/Public/Admin/style/article.css">
    <script src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
    <script src="/Public/Admin/js/html5media.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/laydate/laydate.js"></script>
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
  <input type="hidden" value="<?php echo ($info["mid"]); ?>" id="mid">
<div id="wrapper">
  <div class="photo-wrap">
    <div class="photo">
      <div class="photo-m clearfix">
        <div class="photo-view">
          <p><?php echo ($info["title"]); ?>
              <?php if(($role) == "2"): ?><a href="<?php echo U('system/delMedia',array('mid'=>$info['mid']));?>" class="btn-default" style="float: right">删除</a><?php endif; ?>
          </p>
          <div>
            <span class="publicityt">
              <i></i>
              <?php echo (date("Y-m-d H:i:s",$info["addtime"])); ?>发布<b></b>
            </span>
              <?php if(isset($info["expend"])): echo ($info["expend"]); ?>消耗(￥)<b>|</b>
                  <?php echo ($info["show_num"]); ?>曝光<b>|</b>
                  <?php echo ($info["ectc"]); ?>点击均价<b>|</b>
                  <?php echo ($info["click_per"]); ?>%点击率<b>|</b>
                  <?php echo ($info["click_num"]); ?>点击<b>|</b>
                  <?php echo ($info["reg_num"]); ?>注册<b>|</b><?php endif; ?>
            <span class="download">
              <i></i>
              <?php echo ($info["down_num"]); ?>下载
            </span>
          </div>
        </div>

        <div class="photo-img" style="height: 480px">
          <a href="<?php echo ($info["cps_url"]); ?>" target="_blank">
            <!--<img id="photo" style="cursor:default;" src="<?php echo ($info["thumb"]); ?>" alt="<?php echo ($info["title"]); ?>" title="<?php echo ($info["title"]); ?>">-->
              <?php if(($info["houzui"]) == "flv"): ?><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="640" height="480">
                      <param name="movie" value="/Public/Admin/js/flvplayer.swf" />
                      <param name="quality" value="high" />
                      <param name="allowFullScreen" value="true" />
                      <embed src="/Public/Admin/js/flvplayer.swf" allowfullscreen="true" flashvars="vcastr_file=http://opus.7477sc.me<?php echo ($info["remote_url"]); ?>&IsAutoPlay=1" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="640" height="480"></embed>
                  </object><?php endif; ?>
              <?php if(($info["houzui"]) == "mp4"): ?><video src="<?php echo ($info["remote_url"]); ?>"  autoplay ></video><?php endif; ?>
              <?php if(($info["houzui"]) == "swf"): ?><object align="middle" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="<?php echo ($width); ?>" height="<?php echo ($height); ?>">
                      <param value="always" name="allowScriptAccess">
                      <param value="<?php echo ($info["remote_url"]); ?>" name="movie">
                      <param value="high" name="quality">
                      <param value="transparent" name="bgcolor">
                      <param name="wmode" value="transparent">
                      <param value="noborder" name="scale">
                      <embed align="middle"  pluginspage="http://www.macromedia.com/go/getflashplayer"
                             type="application/x-shockwave-flash" allowscriptaccess="always" scale="noborder"
                             quality="high" src="<?php echo ($info["remote_url"]); ?>"  allowfullscreen="true" allownetworking="all" wmode="transparent" width="<?php echo ($width); ?>" height="<?php echo ($height); ?>">
                      </embed>
                      <param name="allowFullScreen" value="true">
                  </object><?php endif; ?>

          </a>
          <style>.photo-img{ position: relative; text-align: center; }</style>

        </div>       
				
		<div class="photo-info">
          <div class="infor-what">

            <div class="uploader">
              <a class="head">
				  <?php if($userinfo['info'] == null): ?><img src="/Public/Admin/images/login_no.png" alt="头像" />
					  <?php else: ?>
					  <img src="<?php echo ($userinfo['info']); ?>" alt="头像" /><?php endif; ?>
              </a>
              <div class="reward">
                <div><?php echo ($userinfo['nickname']); ?></div>
              </div>

			<?php if($info["is_good"] == 1 ): ?><div class="reward" style="float: right">
					<a style="background: red">重点素材</a>
				</div><?php endif; ?>
			<?php if($role == 2): ?><div class="reward" style="float: right">
					<a href="/upload/editopusinfo/mid/<?php echo ($info["mid"]); ?>">编辑素材</a>
				</div><?php endif; ?>
            </div>
			<!--角色为创新人员的-->
			  <?php if($role == 1 ): if($info["status"] == 0 ): ?><div class="freedownload">
				  <a href="javascript:void(0)" >未审核</a>
				</div>				
				<?php elseif($info["status"] == 1 ): ?>
					<div class="freedownload">
					  <a href="<?php echo U('media/downLoad',array('mid'=>$info['mid']));?>">下载（审核通过）</a>
					</div>
					<div class="freedownload">						
						<?php switch($info["cs_status"]): case "1": ?><a href="javascript:void(0)" >测试通过</a><?php break;?>
							<?php case "2": ?><a href="javascript:void(0)" style="background:#ff4302">测试未通过</a><?php break;?>
							<?php default: ?><a href="javascript:void(0)" style="background:#009900">未测试</a><?php endswitch;?>						
					</div>	
				<?php elseif($info["status"] == 2 ): ?>
				<div class="freedownload">
				  <a href="javascript:void(0)" style="background:#ff4302">审核未通过</a>
				</div><?php endif; ?>
				<div class="but-coll-zan">
				<?php switch($info["status"]): case "0": ?><a class="zan-but" id="add-star" href="/upload/editopusinfo/mid/<?php echo ($info["mid"]); ?>" style="width: 290px;text-align:center;">					
					<span class="star-status">编辑</span>              
					</a><?php break;?>					
					<?php default: ?>
					 <a class="zan-but" id="detail_tc" style="width: 290px;text-align:center; background:#e1e1e1">
					<span class="star-status">查看详情</span>              
					</a><?php endswitch;?>		
				 
				</div>    
							
			<?php elseif($role == 2 ): ?>
				<?php if($info["status"] == 0 ): ?><div class="freedownload">
				  <a href="javascript:void(0)" id="detail_tc">审核</a>
				</div>
				<?php elseif($info["status"] == 1 ): ?>
				<div class="freedownload">
				  <a href="javascript:void(0)" >审核通过</a>
				</div>
				<div class="freedownload">						
					<?php switch($info["cs_status"]): case "1": ?><a href="javascript:void(0)" >测试通过</a><?php break;?>
						<?php case "2": ?><a href="javascript:void(0)" style="background:#ff4302">测试未通过</a><?php break;?>
						<?php default: ?><a href="javascript:void(0)" style="background:#009900">未测试</a><?php endswitch;?>						
				</div>	
				<?php elseif($info["status"] == 2 ): ?>
				<div class="freedownload">
				  <a href="javascript:void(0)" style="background:#ff4302">审核未通过</a>
				</div><?php endif; ?>
				<div class="but-coll-zan">
				<?php switch($info["status"]): case "0": break;?>					
					<?php default: ?>	
					<a class="zan-but" id="detail_tc"  style="width: 290px;text-align:center;">					
					<span class="star-status">查看详情</span>              
					</a><?php endswitch;?>			 
				</div>    
			<?php elseif($role == 3 ): ?>
				<?php if($info["status"] == 1 ): ?><div class="freedownload">
					<?php switch($info["cs_status"]): case "1": ?><a href="javascript:void(0)" >测试通过</a><?php break;?>
						<?php case "2": ?><a href="javascript:void(0)" style="background:#ff4302">测试未通过</a><?php break;?>
						<?php default: ?><a href="javascript:void(0)" id="detail_tc_a" style="background:#009900">反馈结果</a><?php endswitch;?>					
					</div><?php endif; ?>
				<div class="but-coll-zan">
				<?php switch($info["status"]): case "0": break;?>
					<?php default: ?>
					<a class="zan-but" id="add-star" style="width: 290px;text-align:center;">
					<span class="star-status" id="detail_tc">查看详情</span>
					</a><?php endswitch;?>
				</div><?php endif; ?>	   
	   </div>		 
		  
          <div class="infor-what">
			<div class="infor">
              <p>
                编号
                <span><?php echo ($info["mid"]); ?></span>
              </p>
				<p>
					别名
					<span style="color: green"><?php echo ($info["alias"]); ?></span>
				</p>
              <p>
                分类
                <span class="c-blue">
                  <a class="photo-cate"><?php echo ($cate['name']); ?></a>
                </span>
              </p>
				<p>
					媒体
                <span class="c-blue">
                  <a class="photo-cate"><?php echo ($channel['name']); ?></a>
                </span>
				</p>
              <p>
                尺寸
                <span><?php echo ($info["size1"]); ?> × <?php echo ($info["size2"]); ?></span>
				<span>大小： <?php echo ($filesize); ?></span>
              </p>
              <p>
                游戏
                <span><?php echo ($info["game"]); ?></span>
              </p>
			  <p>
                地址
                <span><a href="<?php echo ($info["cps_url"]); ?>" class="c-blue"  target="_blank">落地页地址</a></span>
              </p>				  
              <div style="color:#999;padding-top: 5px;" class="geshi">
                格式
                <span style="padding-left: 20px;"><?php echo ($info["houzui"]); ?></span>

              </div>
				<?php if($info["status"] == 1 ): if($info["cs_status"] == 2 ): ?><div style="color:#999;padding-top: 5px;" class="geshi">
							理由
							<span style="padding-left: 20px;color: green"><?php echo ($info["suggestion"]); ?></span>
						</div><?php endif; endif; ?>
            </div>
          </div>

        </div>

		

        
      </div>
    </div>
  </div>

</div>
<?php if($role == 1): ?><div class="zzao"></div>
<style>
.zzao{ width:100%; height:100%; background-color:#000;position: fixed;top:0; left:0;z-index:50; display:none; opacity:0.6;}
.report-info{width:auto;height: auto;border: #e1e1e1 1px solid;background-color:#fff!important;padding: 15px 10px 10px 10px;    margin-bottom: 20px;  line-height:40px;}
.report-connew{position: fixed;top: 50%;left: 50%; margin-top: -300px; margin-left: -350px;width: 700px;height: auto;    background-color: #fff;position: relative;border-radius: 5px;border: 2px solid #eee;}
.report-connew table{border-collapse: collapse;width: 100%; border: 1px solid #E8E8E8; text-align:center;}
.report-connew table th{height: 35px;line-height: 35px; padding: 6px 5px;background: #e1e1e1;font-size: 14px;border: 1px solid #f5f5f5;
    }
.report-connew table tr{display: table-row; vertical-align: inherit;border-color: inherit;}
.report-connew table td{border: 1px solid #ececec;line-height: 22px;padding: 10px 5px;vertical-align: middle;word-wrap: break-word;    word-break: break-all;border-bottom: 1px dashed #ddd;font: 14px/1.6 Arial,"Microsoft YaHei";}
.report-connew .result{font-size:20px;  padding:0 0 30px 0; border-bottom:1px solid #e1e1e1;border-top:1px solid #e1e1e1; margin-top:15px;}
.report-connew .result p{font-size:14px;}
.report-connew .grade{font-size:20px; color:#ed7500}
.report-connew .grade span,.report-connewtable .result span{padding-left:15px;}
.report-connew .report_pj{font-size:16px; line-height:22px;}
.report-connew .report_pj span{color:#ed7500;}
</style>
<div class="report-box">
  <div class="report-connew">
    <p class="title-con">素材详情</p>
    <span class="close-but"></span>	
    <div class="reason">
		<div class="report-info">
			<?php switch($info["cs_status"]): case "0": break;?>
			<?php case "": break;?>					
			<?php default: ?>
			  <table>
				<tbody>
					<tr><th>日期</th><th>点击率</th><th>点击次数</th><th>展现量</th></tr>					
					<tr><td><?php echo (date("Y-m-d",$info["pjtime"])); ?></td><td><?php echo ($info["click_per"]); ?></td><td><?php echo ($info["click_num"]); ?>次</td><td><?php echo ($info["show_num"]); ?>点击</td></tr>					
				</tbody>
			  </table>
			  <div class="result">
				测评结果:<span><?php echo ($info["suggestion"]); ?></span>
			  </div><?php endswitch;?>	
			  <p class="grade">
				评级: <span>
				<?php $__FOR_START_2312__=0;$__FOR_END_2312__=$info["star"];for($i=$__FOR_START_2312__;$i < $__FOR_END_2312__;$i+=1){ ?>★<?php } ?>
				</span><span>(<?php echo ($info["star"]); ?>星)</span>
			  </p>
			  <?php if(is_array($pingjia_info)): $i = 0; $__LIST__ = $pingjia_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p>
				<?php echo ($key); ?>.<span ><?php echo ($vo["des"]); ?></span>
			  </p><?php endforeach; endif; else: echo "" ;endif; ?>	
		 </div>
		 <div class="report-info">			
			  <p class="report_pj">
				具体评价:
				<span  style=""><?php echo ($info["pingjia"]); ?></span>
			  </p>			  
		 </div>      
    </div>	
    <div class="report-sub">
      <a id="close-btn" href="javascript:void(0);">关闭</a>
    </div>
  </div>
</div>

<script type="text/javascript">
// 举报框的js
$(function(){   
    $("#detail_tc").click(function(){
		$(".zzao").show();  
        $(".report-box").fadeIn(300);        
    });    
    $(".report-box .close-but,#close-btn").click(function(){
		$(".zzao").hide();  
        $(".report-box").fadeOut(300);
    });
})
</script>
<?php elseif($role == 2 ): ?>			
	<?php if($info["status"] != 0): ?><div class="zzao"></div>
<style>
.zzao{ width:100%; height:100%; background-color:#000;position: fixed;top:0; left:0;z-index:50; display:none; opacity:0.6;}
.report-info{width:auto;height: auto;border: #e1e1e1 1px solid;background-color:#fff!important;padding: 15px 10px 10px 10px;    margin-bottom: 20px;  line-height:40px;}
.report-connew{position: fixed;top: 50%;left: 50%; margin-top: -300px; margin-left: -350px;width: 700px;height: auto;    background-color: #fff;position: relative;border-radius: 5px;border: 2px solid #eee;}
.report-connew table{border-collapse: collapse;width: 100%; border: 1px solid #E8E8E8; text-align:center;}
.report-connew table th{height: 35px;line-height: 35px; padding: 6px 5px;background: #e1e1e1;font-size: 14px;border: 1px solid #f5f5f5;
    }
.report-connew table tr{display: table-row; vertical-align: inherit;border-color: inherit;}
.report-connew table td{border: 1px solid #ececec;line-height: 22px;padding: 10px 5px;vertical-align: middle;word-wrap: break-word;    word-break: break-all;border-bottom: 1px dashed #ddd;font: 14px/1.6 Arial,"Microsoft YaHei";}
.report-connew .result{font-size:20px;  padding:0 0 30px 0; border-bottom:1px solid #e1e1e1;border-top:1px solid #e1e1e1; margin-top:15px;}
.report-connew .result p{font-size:14px;}
.report-connew .grade{font-size:20px; color:#ed7500}
.report-connew .grade span,.report-connewtable .result span{padding-left:15px;}
.report-connew .report_pj{font-size:16px; line-height:22px;}
.report-connew .report_pj span{color:#ed7500;}
</style>
<div class="report-box">
  <div class="report-connew">
    <p class="title-con">素材详情</p>
    <span class="close-but"></span>	
    <div class="reason">
		<div class="report-info">
			<?php switch($info["cs_status"]): case "0": break;?>
			<?php case "": break;?>					
			<?php default: ?>
			  <table>
				<tbody>
					<tr><th>日期</th><th>点击率</th><th>点击次数</th><th>展现量</th></tr>					
					<tr><td><?php echo (date("Y-m-d",$info["pjtime"])); ?></td><td><?php echo ($info["click_per"]); ?></td><td><?php echo ($info["click_num"]); ?>次</td><td><?php echo ($info["show_num"]); ?>点击</td></tr>					
				</tbody>
			  </table>
			  <div class="result">
				测评结果:<span><?php echo ($info["suggestion"]); ?></span>
			  </div><?php endswitch;?>	
			  <p class="grade">
				评级: <span>
				<?php $__FOR_START_30881__=0;$__FOR_END_30881__=$info["star"];for($i=$__FOR_START_30881__;$i < $__FOR_END_30881__;$i+=1){ ?>★<?php } ?>
				</span><span>(<?php echo ($info["star"]); ?>星)</span>
			  </p>
			  <?php if(is_array($pingjia_info)): $i = 0; $__LIST__ = $pingjia_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p>
				<?php echo ($key); ?>.<span ><?php echo ($vo["des"]); ?></span>
			  </p><?php endforeach; endif; else: echo "" ;endif; ?>	
		 </div>
		 <div class="report-info">			
			  <p class="report_pj">
				具体评价:
				<span  style=""><?php echo ($info["pingjia"]); ?></span>
			  </p>			  
		 </div>      
    </div>	
    <div class="report-sub">
      <a id="close-btn" href="javascript:void(0);">关闭</a>
    </div>
  </div>
</div>

<script type="text/javascript">
// 举报框的js
$(function(){   
    $("#detail_tc").click(function(){
		$(".zzao").show();  
        $(".report-box").fadeIn(300);        
    });    
    $(".report-box .close-but,#close-btn").click(function(){
		$(".zzao").hide();  
        $(".report-box").fadeOut(300);
    });
})
</script>
	<?php else: ?>
		<div class="zzao"></div>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/tanchuang.css">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/style/star.css">
	<script src="/Public/Admin/js/star.js"></script>
  <script src="/Public/Admin/js/winpop.js"></script>
<style>
.zzao{ width:100%; height:100%; background-color:#000;position: fixed;top:0; left:0;z-index:50; display:none; opacity:0.6;}
.report-info{width:auto;height: auto;border: #e1e1e1 1px solid;background-color:#fff!important;padding: 15px 10px 10px 10px;    margin-bottom: 20px;  line-height:40px;}
.report-connew{position: fixed;top: 50%;left: 50%; margin-top: -300px; margin-left: -350px;width: 700px;height: auto;    background-color: #fff;position: relative;border-radius: 5px;border: 2px solid #eee;}
.report-box table{border-collapse: collapse;width: 100%; border: 1px solid #E8E8E8; text-align:center;}
.report-box table th{height: 35px;line-height: 35px; padding: 6px 5px;background: #e1e1e1;font-size: 14px;border: 1px solid #f5f5f5;
    }
.report-box table tr{display: table-row; vertical-align: inherit;border-color: inherit;}
.report-box table td{border: 1px solid #ececec;line-height: 22px;padding: 10px 5px;vertical-align: middle;word-wrap: break-word; word-break: break-all;border-bottom: 1px dashed #ddd;font: 14px/1.6 Arial,"Microsoft YaHei";}
.report-box .report_if{margin:0; height: 35px; padding:0 0  10px 10px;}
.report-box .report_if span{color:#269edc;font-size:18px;margin-left:10px;}
.report-box .report_pj p{font-size:16px; line-height:22px;}
.report-box .report_pj textarea{font-size:16px; width:100%; height:80px; resize: none;}
</style>

<div class="report-box">
  <div class="report-connew">
    <p class="title-con">评价素材</p>
    <span class="close-but"></span>	
    <div class="reason">
		   <div class="report-info">
			   <div class="report-star" style="width: 250px">
				   <span>星级评价：</span>
				   <div class="star">
					   <a href="javascript:;"></a>
					   <a href="javascript:;"></a>
					   <a href="javascript:;"></a>
					   <a href="javascript:;"></a>
					   <a href="javascript:;"></a>
				   </div>
				   <input type="hidden" class="starhit" value="0">
			   </div>
		   </div>
		 <div class="report_if">

			<em>是否通过</em>
			<input type="radio" value="1" name="state"><span>通过</span>
			<input type="radio" value="2" name="state"><span>不通过</span>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <em>重点素材</em>
			 <input type="radio" value="1" name="good"><span>是</span>
			 <input type="radio" value="0" name="good"><span>否</span>
		 </div>
		 <div class="report-info report_pj">			
			  <p>
				具体评价:
				<textarea name="pingjia"></textarea>
			  </p>			  
		 </div>      
    </div>	
    <div class="report-sub">
      <a id="submit-btn" href="javascript:void(0);">审核</a>
    </div>
  </div>
</div>
<script type="text/javascript">
// 举报框的js
$(function(){   
    $("#detail_tc").click(function(){
		$(".zzao").show();  
        $(".report-box").fadeIn(300);        
    });    
    $(".report-box .close-but,#close-btn").click(function(){
		$(".zzao").hide();  
        $(".report-box").fadeOut(300);
    });
	$("#submit-btn").click(function(){
		var mid=$("#mid").val();
		var star = $('.starhit').val();
		var state = $.trim($("input[name='state']:radio:checked").val());
		var good = $.trim($("input[name='good']:radio:checked").val());
		var pingjia = $.trim($("textarea[name='pingjia']").val());		
	    if (state==''|| good=='') {
				layer.alert ("请认真填写完成");
                return;
        }
		if (star ==0){
			layer.alert ("请选择星级"); return false;
		}

		$.ajax({
			type : 'post',
			dataType:'json',
			url  : '<?php echo U("evaluate/star");?>',
			data : '&star=' + star + '&state=' + state +'&good=' + good+ '&pingjia=' + pingjia+ '&mid=' + mid,
			success: function(res){
				if (res.status == false) {
				   wintq('修改失败',3,1000,0,'');
				} else {
				   layer.msg('修改成功', {icon:6,time:1000}, function () {
					   location.reload();
					});
				}
			}
		});
	})
})
</script><?php endif; ?>
<?php else: ?>
	<?php if($info["cs_status"] != 0): ?><div class="zzao"></div>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/tanchuang.css">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/style/star.css">
	<script src="/Public/Admin/js/star.js"></script>
  <script src="/Public/Admin/js/winpop.js"></script>
<style>
.zzao{ width:100%; height:100%; background-color:#000;position: fixed;top:0; left:0;z-index:50; display:none; opacity:0.6;}
.report-info{width:auto;height: auto;border: #e1e1e1 1px solid;background-color:#fff!important;padding: 15px 10px 10px 10px;    margin-bottom: 20px;  line-height:40px;}
.report-connew{position: fixed;top: 50%;left: 50%; margin-top: -300px; margin-left: -350px;width: 700px;height: auto;    background-color: #fff;position: relative;border-radius: 5px;border: 2px solid #eee;}
.report-box table{border-collapse: collapse;width: 100%; border: 1px solid #E8E8E8; text-align:center;}
.report-box table th{height: 35px;line-height: 35px; padding: 6px 5px;background: #e1e1e1;font-size: 14px;border: 1px solid #f5f5f5;
    }
.report-box table tr{display: table-row; vertical-align: inherit;border-color: inherit;}
.report-box table td{border: 1px solid #ececec;line-height: 22px;padding: 10px 5px;vertical-align: middle;word-wrap: break-word; word-break: break-all;border-bottom: 1px dashed #ddd;font: 14px/1.6 Arial,"Microsoft YaHei";}
.report-box .report_if{margin:0; height: 35px; padding:0 0  10px 10px;}
.report-box .report_if span{color:#269edc;font-size:18px;margin-left:10px;}
.report-box .report_pj p{font-size:16px; line-height:22px;}
.report-box .report_pj textarea{font-size:16px; width:100%; height:80px; resize: none;}
</style>

<div class="report-box">
  <div class="report-connew">
    <p class="title-con">评价素材</p>
    <span class="close-but"></span>	
    <div class="reason">
		   <div class="report-info">
			   <div class="report-star" style="width: 250px">
				   <span>星级评价：</span>
				   <div class="star">
					   <a href="javascript:;"></a>
					   <a href="javascript:;"></a>
					   <a href="javascript:;"></a>
					   <a href="javascript:;"></a>
					   <a href="javascript:;"></a>
				   </div>
				   <input type="hidden" class="starhit" value="0">
			   </div>
		   </div>
		 <div class="report_if">

			<em>是否通过</em>
			<input type="radio" value="1" name="state"><span>通过</span>
			<input type="radio" value="2" name="state"><span>不通过</span>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <em>重点素材</em>
			 <input type="radio" value="1" name="good"><span>是</span>
			 <input type="radio" value="0" name="good"><span>否</span>
		 </div>
		 <div class="report-info report_pj">			
			  <p>
				具体评价:
				<textarea name="pingjia"></textarea>
			  </p>			  
		 </div>      
    </div>	
    <div class="report-sub">
      <a id="submit-btn" href="javascript:void(0);">审核</a>
    </div>
  </div>
</div>
<script type="text/javascript">
// 举报框的js
$(function(){   
    $("#detail_tc").click(function(){
		$(".zzao").show();  
        $(".report-box").fadeIn(300);        
    });    
    $(".report-box .close-but,#close-btn").click(function(){
		$(".zzao").hide();  
        $(".report-box").fadeOut(300);
    });
	$("#submit-btn").click(function(){
		var mid=$("#mid").val();
		var star = $('.starhit').val();
		var state = $.trim($("input[name='state']:radio:checked").val());
		var good = $.trim($("input[name='good']:radio:checked").val());
		var pingjia = $.trim($("textarea[name='pingjia']").val());		
	    if (state==''|| good=='') {
				layer.alert ("请认真填写完成");
                return;
        }
		if (star ==0){
			layer.alert ("请选择星级"); return false;
		}

		$.ajax({
			type : 'post',
			dataType:'json',
			url  : '<?php echo U("evaluate/star");?>',
			data : '&star=' + star + '&state=' + state +'&good=' + good+ '&pingjia=' + pingjia+ '&mid=' + mid,
			success: function(res){
				if (res.status == false) {
				   wintq('修改失败',3,1000,0,'');
				} else {
				   layer.msg('修改成功', {icon:6,time:1000}, function () {
					   location.reload();
					});
				}
			}
		});
	})
})
</script>
	<?php else: ?>
		<div class="zzao"></div>
<style>
.zzao{ width:100%; height:100%; background-color:#000;position: fixed;top:0; left:0;z-index:50; display:none; opacity:0.6;}
.report-info{width:auto;height: auto;border: #e1e1e1 1px solid;background-color:#fff!important;padding: 15px 10px 10px 10px;    margin-bottom: 20px;  line-height:40px;}
.report-connew{position: fixed;top: 50%;left: 50%; margin-top: -300px; margin-left: -350px;width: 700px;height: auto;    background-color: #fff;position: relative;border-radius: 5px;border: 2px solid #eee;}
.report-connew table{border-collapse: collapse;width: 100%; border: 1px solid #E8E8E8; text-align:center;}
.report-connew table th{height: 35px;line-height: 35px; padding: 6px 5px;background: #e1e1e1;font-size: 14px;border: 1px solid #f5f5f5;
    }
.report-connew table tr{display: table-row; vertical-align: inherit;border-color: inherit;}
.report-connew table td{border: 1px solid #ececec;line-height: 22px;padding: 10px 5px;vertical-align: middle;word-wrap: break-word;    word-break: break-all;border-bottom: 1px dashed #ddd;font: 14px/1.6 Arial,"Microsoft YaHei";}
.report-connew .result{font-size:20px;  padding:0 0 30px 0; border-bottom:1px solid #e1e1e1;border-top:1px solid #e1e1e1; margin-top:15px;}
.report-connew .result p{font-size:14px;}
.report-connew .grade{font-size:20px; color:#ed7500}
.report-connew .grade span,.report-connewtable .result span{padding-left:15px;}
.report-connew .report_pj{font-size:16px; line-height:22px;}
.report-connew .report_pj span{color:#ed7500;}
</style>
<div class="report-box">
  <div class="report-connew">
    <p class="title-con">素材详情</p>
    <span class="close-but"></span>	
    <div class="reason">
		<div class="report-info">
			<?php switch($info["cs_status"]): case "0": break;?>
			<?php case "": break;?>					
			<?php default: ?>
			  <table>
				<tbody>
					<tr><th>日期</th><th>点击率</th><th>点击次数</th><th>展现量</th></tr>					
					<tr><td><?php echo (date("Y-m-d",$info["pjtime"])); ?></td><td><?php echo ($info["click_per"]); ?></td><td><?php echo ($info["click_num"]); ?>次</td><td><?php echo ($info["show_num"]); ?>点击</td></tr>					
				</tbody>
			  </table>
			  <div class="result">
				测评结果:<span><?php echo ($info["suggestion"]); ?></span>
			  </div><?php endswitch;?>	
			  <p class="grade">
				评级: <span>
				<?php $__FOR_START_6854__=0;$__FOR_END_6854__=$info["star"];for($i=$__FOR_START_6854__;$i < $__FOR_END_6854__;$i+=1){ ?>★<?php } ?>
				</span><span>(<?php echo ($info["star"]); ?>星)</span>
			  </p>
			  <?php if(is_array($pingjia_info)): $i = 0; $__LIST__ = $pingjia_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p>
				<?php echo ($key); ?>.<span ><?php echo ($vo["des"]); ?></span>
			  </p><?php endforeach; endif; else: echo "" ;endif; ?>	
		 </div>
		 <div class="report-info">			
			  <p class="report_pj">
				具体评价:
				<span  style=""><?php echo ($info["pingjia"]); ?></span>
			  </p>			  
		 </div>      
    </div>	
    <div class="report-sub">
      <a id="close-btn" href="javascript:void(0);">关闭</a>
    </div>
  </div>
</div>

<script type="text/javascript">
// 举报框的js
$(function(){   
    $("#detail_tc").click(function(){
		$(".zzao").show();  
        $(".report-box").fadeIn(300);        
    });    
    $(".report-box .close-but,#close-btn").click(function(){
		$(".zzao").hide();  
        $(".report-box").fadeOut(300);
    });
})
</script>
		<div class="zzao"></div>
<style>
.zzao{ width:100%; height:100%; background-color:#000;position: fixed;top:0; left:0;z-index:50; display:none; opacity:0.6;}
.report-info{width:auto;height: auto;border: #e1e1e1 1px solid;background-color:#fff!important;padding: 15px 10px 10px 10px;    margin-bottom: 20px;  line-height:40px;}
.report-connew{position: fixed;top: 50%;left: 50%; margin-top: -300px; margin-left: -350px;width: 700px;height: auto;    background-color: #fff;position: relative;border-radius: 5px;border: 2px solid #eee;}
.report-info table{border-collapse: collapse;width: 100%; border: 1px solid #E8E8E8; text-align:center;}
.report-info table th{height: 35px;line-height: 35px; padding: 6px 5px;background: #e1e1e1;font-size: 14px;border: 1px solid #f5f5f5;
    }
.report-info table tr{display: table-row; vertical-align: inherit;border-color: inherit;}
.report-info table td{border: 1px solid #ececec;line-height: 22px;padding: 10px 5px;vertical-align: middle;word-wrap: break-word; word-break: break-all;border-bottom: 1px dashed #ddd;font: 14px/1.6 Arial,"Microsoft YaHei";}
.report-info .lilist p{font-size:16px; line-height:22px;}
.report-info .lilist p input{font-size:16px; line-height:22px; height:30px; border: #d8dce1 1px solid; border-radius:2px;width:160px;padding: 0 15px; color: #666; margin:10px 0 0 10px;}
.report_pj p{font-size:16px; line-height:22px;}
.report_pj textarea{font-size:16px; width:100%; height:80px; resize: none;}
</style>
<div class="report-box-a">
  <div class="report-connew">
    <p class="title-con">评价素材</p>
    <span class="close-but"></span>	
    <div class="reason">
		   <div class="report-info" style="border:none;border-bottom:1px solid #e1e1e1; ">			 
			   <div class="lilist">				
				<p>
					注册数:<span><input type="text" name="regnum" value="" /></span>
					&nbsp;&nbsp;&nbsp;&nbsp;
					消&nbsp;&nbsp;耗&nbsp;数:
					<span><input type="text" name="expend" value="" /></span>
				</p>
			  </div>
			  <div class="lilist">
				<p>
					曝光量:<span><input type="text" name="show" value="" /></span>
					&nbsp;&nbsp;&nbsp;&nbsp;
					点击均价:<span><input type="text" name="ectc" value="" /></span>
				</p>
			  </div>
			  <div class="lilist">
				<p>
					点击率:<span><input type="text" name="clickper" value="" /></span>
					&nbsp;&nbsp;&nbsp;&nbsp;
					点&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;击:
					<span><input  name="click" type="text" value="" id="click"/></span>
				</p>
			  </div>
			   <div class="lilist">
				   <p>
					   eCPM:<span><input type="text" name="ecpm" value="" /></span>
					   &nbsp;&nbsp;&nbsp;&nbsp;
				   </p>
			   </div>
			</div>
		<div class="report_if">
			<p style="margin-left: 10px"> <span style="margin-right: 40px">测试结果</span>
			<input value="1" name="status" type="radio" id="testOk"><span style="margin-right: 40px">测试通过</span>
			<input value="2" name="status" type="radio"><span style="margin-right: 40px">测试未通过</span>
			<input value="2" name="status" type="radio" id="pass"><span>媒体拒审</span>
			</p>
		</div>
		<div class="report_if" id="okstatus" style="display: none">
			<p style="margin-left: 10px"> <span style="margin-right: 40px">达标率</span>
				<input value="1" id="defOk" name="okstatus" type="radio"><span style="margin-right: 40px">双达标</span>
				<input value="2" name="okstatus" type="radio"><span style="margin-right: 40px">点击率达标</span>
				<input value="3" name="okstatus" type="radio"><span style="margin-right: 40px">成本达标</span>
				<input value="4" name="okstatus" type="radio"><span>转化率达标</span>
			</p>
		</div>
		 <div class="report-info report_pj" style="border:none;">			
			  <p style="">
				具体评价(拒审原因):
				<textarea name="suggestion"></textarea>
			  </p>			  
		 </div>      
    </div>	
    <div class="report-sub">
      <a id="cp-submit" href="javascript:void(0);">提交</a>
    </div>
  </div>
</div>
<script type="text/javascript">
// 举报框的js
$(function(){

	$("input[name='status']").click(function(){
		if($('#testOk').attr('checked')){
			$('#okstatus').show();
			$('#defOk').attr('checked',true);
		}else {
			$('#okstatus').hide();
			$('#defOk').attr('checked',false);
		}
	});

	$('#pass').click(function(){
		$.trim($("input[name='regnum']").val(0));
		$.trim($("input[name='expend']").val(0));
		$.trim($("input[name='show']").val(0));
		$.trim($("input[name='click']").val(0));
		$.trim($("input[name='ectc']").val('0.00'));
		$.trim($("input[name='ecpm']").val('0.00'));
		$.trim($("input[name='clickper']").val('0.00'));
	});


	$("#detail_tc_a").click(function(){
		$(".zzao").show();  
        $(".report-box-a").fadeIn(300);        
    }); 	
    $(".report-box-a .close-but").click(function(){
		$(".zzao").hide();  
        $(".report-box-a").fadeOut(300);
    });
	$("#cp-submit").click(function(){
		var mid=$("#mid").val();
		var regnum = $.trim($("input[name='regnum']").val());
		var expend = $.trim($("input[name='expend']").val());
		var show = $.trim($("input[name='show']").val());
		var ectc = $.trim($("input[name='ectc']").val());
		var clickper = $.trim($("input[name='clickper']").val());
		var click = $.trim($("input[name='click']").val());
		var suggestion = $.trim($("textarea[name='suggestion']").val());
		var status = $("input[name='status']:checked").val();
		var okstatus = $("input[name='okstatus']:checked").val();
		var ecpm = $.trim($("input[name='ecpm']").val());
	    if (regnum==''||expend==''||show==''||ectc==''||clickper==''||click==''||ecpm=='') {
				layer.alert ("请认真填写完成您的信息");
                return false;
        }
		$.ajax({
			type : 'post',
			dataType:'json',
			url  : '<?php echo U("evaluate/data");?>',
			data :  {
				'mid': mid,
				'regnum': regnum,
				'expend': expend,
				'show':show,
				'ectc':ectc,
				'clickper':clickper,
				'click':click,
				'suggestion':suggestion,
				'status':status,
				'ecpm':ecpm,
				'okstatus':okstatus
			},
			success: function(res){
				if (res.status == false) {
					layer.alert(res.msg);
				} else {
				   location.reload();
				}
			}
		});
	})
})
</script><?php endif; endif; ?>
<!--举报-->
<div class="mask"></div>


<style>
  #comments{max-width:1120px;background-color:#fff; border:#eeeff2 1px solid;margin:25px auto 20px;padding:30px 40px;}
  .message{ max-width:1120px; margin-bottom:20px}
  .people{max-height:63px; max-width:63px; border-radius:50px; margin-right:20px}
  .message .people{ width:63px; margin-left:1%}
  .people img{ max-height:63px; max-width:63px; border-radius:50px}
  .input_t{ max-width:1029px; width:90%}
  .input_t textarea{ display:inline-block; width:100%;max-width:1025px;padding:10px 1%; min-height:40px; outline:none;
      border:#eeeff2 1px solid; border-radius:3px}
  .all{ height:35px; line-height:35px; border-bottom:#eeeff2 1px solid;}
  .discuss{ padding:30px 0 20px 0; border-bottom:#eeeff2 1px solid}
  .discuss .right{ width: 1037px; max-width:1037px}
  .discuss_infor .one,.discuss_infor .two{margin-bottom:5px; line-height:25px}
  .discuss_infor div span{ display:inline-block; height:25px;line-height:25px}
  .time_ly{ color:#999}
  .num{ color:#666; padding-right:5px}
  .name{ color:#999; padding-right:10px}
  .discuss_infor .one i{ display:inline-block; width:15px; height:15px;
      background:url(/Public/Admin/images/bg/discuss.png) no-repeat  center ; padding-left:10px}
  .word{ background-color:#f7f8fa;max-width:1017px; padding:0 10px}
  .word dl{ border-top:#ccc 1px dashed; width:99%;max-width:1017px; padding:10px 0}
  .word dl:first-child{ border-top:none}
  .word dd{ width:94%;}
  .people_small{max-height:38px; max-width:38px;border-radius:50px; margin-right:1%}
  .people_small img{ width:38px; height:38px;max-width:38px;border-radius:50px;}
  .input_text{ padding-bottom:10px;margin:0 auto}
  .input_text input{ height:32px; line-height:32px; width:98%; border:#d8dce0 1px solid; padding:0 1%}
  .upload {height:37px; padding-bottom:10px}
  .upload .fabu,.upload_up .fabu{ display:inline-block;width:137px; height:37px; line-height:37px; text-align:center;
      background-color:#269edc; color:#fff; font-size:16px; border-radius:3px}
  .upload_up .fabu{ margin-left:10px}
  .login_no{ max-width:1025px; width:99.5%; border:#eeeff2 1px solid; border-radius:3px;padding:10px 1%; min-height:40px;}
  .login_no a{ color:#269edc}
  .pagelist{ margin-top: 20px;}
</style>
<div id="comments">
  <div class="message clearfix">
    <div class="people fl">
      <a>
          <?php if($userinfo['info'] == null): ?><img src="/Public/Admin/images/login_no.png"/>
              <?php else: ?>
              <img src="<?php echo ($userinfo['info']); ?>"/><?php endif; ?>
      </a>
    </div>
    <div class="input_t fl">
      <!-- 未登录前 -->
      <div class="login_no" style="display: none;">
        登录后才可以评论，请
        <a id="comment_login_in">点击这里</a>
        进行登录
      </div>
      <!-- 登陆后 -->
      <textarea class="storey" placeholder="添加评论或留下您宝贵的意见" style="resize: none;"></textarea>
    </div>
    <div class="upload_up clear fr" style="display: none;">
      <span class="overflow">
        已超出
        <span id="overflow-num" style="color:#ff5200"></span>
        个字符
      </span>
      <span class="suitable">
        还可以输入
        <span id="suitable-num" style="color: #ff5200;">199</span>
        个字符
        <a class="fabu" id="submit_comment" data-floor="0">发表</a>
      </span>
    </div>
  </div>
  <p class="all">全部评论（0）</p>
  <div class="clearfix" id="comment_list">
    <div id="comment_null" style="width:100%;text-align:center;font-size:20px;margin-top: 20px;height:60px;line-height:60px; display: none;">快来抢沙发咯~</div>
      <?php if(is_array($discuss)): foreach($discuss as $key=>$floor): ?><dl class="discuss clearfix">
              <dt class="people fl">
                  <a>
                      <?php if($floor["info"] == null): ?><img src="/public/admin/images/index-page-user2.png" width="63" height="63">
                          <?php else: ?>
                          <img src="<?php echo ($floor["info"]); ?>"  width="63" height="63"><?php endif; ?>
                  </a>
              </dt>
              <dd class="right fr">
                  <div class="discuss_infor">
                      <div class="one">
                          <span class="num"><?php echo ($key+1); ?>F</span>
                          <span class="time_ly"><?php echo (date("Y-m-d H:i:s",$floor["time"])); ?></span>
                          <i data-cid="<?php echo ($key+1); ?>"></i>
                      </div>
                      <div class="two">
                          <span class="name"><?php echo ($floor["uid"]); ?>：</span>
                         <?php echo ($floor["content"]); ?>
                      </div>
                      <!-- 追加回复模板 -->
                      <div class="word" data-cid="<?php echo ($key+1); ?>" data-type="addpaddingtop" style="padding-top: 10px;">
                          <?php if(is_array($floor["child"])): foreach($floor["child"] as $cy=>$item): ?><dl class="clearfix">
                                  <dt class="people_small fl">
                                      <a>
                                          <?php if($item["info"] == null): ?><img src="/public/admin/images/index-page-user2.png" width="40" height="40">
                                              <?php else: ?>
                                              <img src="<?php echo ($item["info"]); ?>"  width="40" height="40"><?php endif; ?>
                                      </a>
                                  </dt>
                                  <dd class="fl">
                                      <div>
                                          <span class="name"><?php echo ($item["uid"]); ?>：</span>
                                          <?php echo ($item["content"]); ?>
                                      </div>
                                      <div>
                                          <span class="time_ly"><?php echo (date("Y-m-d H:i:s",$floor["time"])); ?></span>
                                      </div>
                                  </dd>
                              </dl><?php endforeach; endif; ?>
          <div class="input_text" data-cid="<?php echo ($key+1); ?>" data-type="input" style="display: none;">
              <form onsubmit="return false">
                  <input  class="revert" type="text" data-cid="<?php echo ($key+1); ?>" placeholder="我也来说一句（字数不要超过100哦~）"></form>
          </div>
          <div class="upload clearfix" data-cid="<?php echo ($key+1); ?>" data-type="submit" style="display: none;">
              <a class="fabu fr sen_back" data-cid="<?php echo ($key+1); ?>" data-pid="<?php echo ($floor["id"]); ?>"  data-type="fabu">发表</a>
          </div>
        </div>
        </div>
        </dd>
        </dl><?php endforeach; endif; ?>

</div>
</div>
<script>
$(function(){
  // 点击回复评论，绑定事件
  $(document).on('click', '.discuss_infor i', function(){
    // 判断用户是否登录
    var cid = $(this).attr('data-cid');
      console.log(cid);
    // 将其他的评论框隐藏
    $("div[data-cid!="+cid+"][data-type='addpaddingtop']").css('paddingTop','0px').hide();
    $("div[data-cid!="+cid+"][data-type='input']").hide();
    $("div[data-cid!="+cid+"][data-type='submit']").hide();
    $("div[data-cid!="+cid+"][data-type='input'] input").val('');
    // 显示想要评论的评论框
    $("div[data-cid="+cid+"][data-type='addpaddingtop']").css('paddingTop','10px').show();
    $("div[data-cid="+cid+"][data-type='input']").show().find('input').focus();
  });
  // 处理输入的内容是文字还是字母的函数
  function getLength(str){
      return String(str).replace(/[^\x00-\xff]/g,'aa').length;
  }
  // 新楼层文本框输入内容
  $(".input_t textarea").keyup(function(event){
    // Math函数向上取值
    var cnum = Math.ceil( getLength($(this).val()) / 2 );
    console.log(cnum);
    if (cnum <= 0) {
        $("div.upload_up").hide();
    } else if ( cnum <= 200 ) {
        $("div.upload_up").show();
        $("div.upload_up .suitable").show();
        $("div.upload_up .overflow").hide();
        $("#suitable-num").text(200 - cnum);
    } else {
        $("div.upload_up").show();
        $("div.upload_up .suitable").hide();
        $("div.upload_up .overflow").show();
        $("#overflow-num").text(cnum - 200);
    }
    var event = event || window.event;
    if (event.ctrlKey && event.keyCode == 13) {
        $("#submit_comment").trigger('click');
    }
  });
  // 楼中楼文本框输入内容
  $(document).on('keyup', 'input[type="text"]', function(event){
    var cid = $(this).attr('data-cid');
    var text = $(this).val();
    var length = Math.ceil(getLength(text) / 2);
    if (!text || length > 100) {
        $("div[data-cid="+cid+"][data-type='submit']").hide();
    } else {
        $("div[data-cid="+cid+"][data-type='submit']").show();
    }
    var event = event || window.event;
    if (event.ctrlKey && event.keyCode == 13) {
        $("a[data-cid="+cid+"][data-type='fabu']").trigger('click');
    }
  });

  $("#submit_comment").on('click',function(){
    var mid = $("#mid").val();
    var content = $('.storey').val();
    $.ajax({
      type : 'post',
      dataType:'json',
      url  : '<?php echo U("evaluate/discuss");?>',
      data :  {
        'mid': mid,
        'content': content,
      },
      success: function(res){
        if (res.status==true){
            location.reload();
        }else {
          layer.alert(res.msg);
        }

      }
    });
  });

  $(".sen_back").on('click',function(){
    var mid = $("#mid").val();
    var pid = $(this).attr('data-pid');
    var content = $(this).parents('.word').find(".revert").val();
      $.ajax({
          type : 'post',
          dataType:'json',
          url  : '<?php echo U("evaluate/discuss");?>',
          data :  {
              'mid': mid,
              'pid':pid,
              'content': content,
          },
          success: function(res){
              if (res.status==true){
                  location.reload();
              }else {
                  layer.alert(res.msg);
              }

          }
      });
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