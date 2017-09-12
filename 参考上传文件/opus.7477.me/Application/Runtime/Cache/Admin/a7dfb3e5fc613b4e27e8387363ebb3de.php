<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="renderer" content="webkit">
    <title>权限管理</title>
    <meta name="keywords" content="权限管理" />
    <meta name="description" content="权限管理" />
    <link rel="stylesheet" href="/Public/Admin/style/base.v4.5.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/uploadvectordiagram.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/photo.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/style/account.css" />
    <script src="/Public/Admin/js/jQuery.1.8.2.min.js"></script>
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


<div class="wrapper">
    <div class="content_set">
        <div class="set_1">
            <span>角色管理</span>
        </div>
        <div class="con">
            <a class="btn_sub role_add" href="javascript:void(0);" style="margin-top: 20px;">增加角色</a>
            <table class="node_table" width="100%">
                <col width="10%"><col width="20%"><col width="10%"><col width="20%"><col width="40%">
                <tr><th>ID</th><th>角色名</th><th>启用</th><th>添加时间</th><th>操作</th></tr>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-id="<?php echo ($vo["id"]); ?>">
                        <td class="id" data="<?php echo ($vo["id"]); ?>"><?php echo ($vo["id"]); ?></td>
                        <td class="name" data="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></td>
                        <td class="status" data="<?php echo ($vo["status"]); ?>"><?php switch($vo["status"]): case "1": ?>是<?php break; case "0": ?>否<?php break; endswitch;?></td>
                        <td class="create_time" data="<?php echo ($vo["create_time"]); ?>"><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td>
                        <td>
                            <?php if($vo['name'] != '超级管理员'): ?><a class="btn_edit" href="javascript:void(0);">编辑</a>
                                &nbsp;|&nbsp;
                                <a class="btn_pri" href="javascript:void(0);">分配权限</a>
                                &nbsp;|&nbsp;
                                <a class="btn_dele" href="javascript:void(0);">删除</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div><?php echo ($page); ?></div>
        </div>
    </div>
</div>

<div id="add_alert_tmp" style="display: none">
    <div class="form_content" style="padding: 20px;">
        <table width="100%">
            <tr><td>角色名称</td><td><input type="text" class="add_input_name" /></td></tr>
            <tr><td>是否启用</td><td><select class="add_input_status"><option value="1">是</option><option value="0">否</option></select></td></tr>
            <tr><td></td><td><a class="subBtn">提交</a></td></tr>
        </table>
    </div>
</div>

<script>
    $(function () {
        //增加角色
        $('.role_add').click(function () {
            var _form_id = 'add_form_' + Math.ceil(Math.random()*1000);
            var _html = '<div id="'+_form_id+'" class="add_node_div">' + $('#add_alert_tmp').html() + '</div>';
            layer.open({
                type: 1,
                title: '添加节点',
                skin: 'layui-layer', //加上边框
                area: ['420px', '200px'], //宽高
                content: _html
            });
            $('#'+_form_id+' .subBtn').click(function () {
                doRoleAdd(this);
            });
        });
        //删除角色
        $('.btn_dele').click(function () {
            var id = $(this).parents('tr').attr('data-id');
            if (id == '') return false;
            layer.confirm('确定要删除该角色？', {
                btn: ['确定','取消']
            }, function(){
                doDeleRole(id);
            });
        });

        //编辑角色
        $('.btn_edit').click(function () {
            editRole(this);
        });
        
        //分配权限
        $('.btn_pri').click(function () {
            var roleid = $(this).parents('tr').attr('data-id');
            if (roleid == '') return false;
            $.ajax({
                type:'post',
                dataType:'json',
                data:{roleid:roleid},
                url:'/Permission/addAccess',
                error:function () {
                    layer.msg('未知错误', {icon:5,time:1000});
                },
                success:function (data) {
                    if (data.code == 1) {
                        layer.open({
                            type: 1,
                            title: '权限分配',
                            shadeClose: true,
                            maxmin: true, //开启最大化最小化按钮
                            area: ['80%', '80%'],
                            content: data.html
                        });
                    }else {
                        layer.msg(data.msg, {icon:5,time:1000});
                    }
                }
            });
        });

    });
    //增加角色
    function doRoleAdd(_this) {
        var form_content = $(_this).parents('.form_content');
        var name = form_content.find('.add_input_name').val();
        var status = form_content.find('.add_input_status').val();
        if (name == '' || status == '') {
            layer.msg('数据不能为空', {icon:5,time:1000});
            return false;
        }
        $.ajax({
            type:'post',
            dataType:'json',
            data:{name:name,status:status},
            url:'/Permission/roleAdd',
            error:function () {
                layer.msg('未知错误', {icon:5,time:1000});
            },
            success:function (data) {
                if (data.code == 1) {
                    layer.msg('添加成功', {icon:6,time:1000}, function () {location.reload()});
                }else {
                    layer.msg(data.msg, {icon:5,time:1000});
                }
            }
        });
    }

    //删除角色
    function doDeleRole(id) {
        $.ajax({
            type:'post',
            dataType:'json',
            data:{id:id},
            url:'/Permission/roleDelete',
            error:function () {
                layer.msg('未知错误', {icon:5,time:1000});
            },
            success:function (data) {
                if (data.code == 1) {
                    layer.msg('删除成功', {icon:6,time:1000}, function () {location.reload()});
                }else {
                    layer.msg(data.msg, {icon:5,time:1000});
                }
            }
        });
    }

    //编辑角色
    function editRole(_this) {
        if ($(_this).hasClass('do_edit_btn')) {
            doEditRole(_this);
        }else {
            $(_this).addClass('do_edit_btn').html('提交');
            var _tr = $(_this).parents('tr');
            var id = _tr.attr('data-id');
            if (id == '') return false;

            var name = _tr.find('.name').attr('data');
            var status = _tr.find('.status').attr('data');

            _tr.find('.name').html('<input type="text" class="input_name" value="'+name+'" />');
            _tr.find('.status').html('<select class="input_status"><option value="1">是</option><option value="0">否</option></select>');
            _tr.find('.input_status option[value="'+status+'"]').attr('selected', true);
        }
    }
    function doEditRole(_this) {
        var _tr = $(_this).parents('tr');
        var id = _tr.attr('data-id');
        if (id == '') return false;
        var name = _tr.find('.input_name').val();
        var status = _tr.find('.input_status').val();
        if (name == '' || status == '') {
            layer.msg('数据不能为空', {icon:5,time:1000});
            return false;
        }
        $.ajax({
            type:'post',
            dataType:'json',
            data:{id:id,name:name,status:status},
            url:'/Permission/roleEdit',
            error:function () {
                layer.msg('未知错误', {icon:5,time:1000});
            },
            success:function (data) {
                if (data.code == 1) {
                    layer.msg('修改成功', {icon:6,time:1000}, function () {
                        $(_this).removeClass('do_edit_btn').html('编辑');
                        _tr.find('.name').html(name).attr('data', name);
                        _tr.find('.status').html((status==1)?'是':'否').attr('data', status);
                    });
                }else {
                    layer.msg(data.msg, {icon:5,time:1000});
                }
            }
        });
    }
</script>
<script type="text/javascript" src="/Public/Admin/js/account.js"></script>
<script type="text/javascript" src="/Public/Admin/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/Public/Admin/js/uploader.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select.js"></script>
<script type="text/javascript" src="/Public/Admin/js/base.js"></script>
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