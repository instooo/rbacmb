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
            <span>节点管理</span>
        </div>
        <div class="con">

            <table class="node_table" width="100%">
                <tr><th>节点名称</th><th>访问链接</th><th>排序</th><th>是否显示</th><th>操作</th></tr>
                <tr class="cnode_0" data-id="0" data-level="0">
                    <td>
                        <img class="fold_tag unfold" src="/Public/Admin/images/icon/menu_minus.gif" style="margin-left: 25px">
                        <a class="title">素材管理系统</a>
                    </td>
                    <td>/</td><td>0</td><td>是</td><td><a class="btn_add" href="javascript:void(0);">添加子节点</a></td>
                </tr>
                <?php if(is_array($node_tree)): $i = 0; $__LIST__ = $node_tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="cnode_0 cnode_<?php echo ($vo["id"]); ?>" data-id="<?php echo ($vo["id"]); ?>" data-level="<?php echo ($vo["level"]); ?>">
                        <td>
                            <img class="fold_tag unfold" src="/Public/Admin/images/icon/menu_minus.gif" style="margin-left: 50px">
                            <a class="title" data="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a>
                        </td>
                        <td class="name" data="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></td>
                        <td class="sort" data="<?php echo ($vo["sort"]); ?>"><?php echo ($vo["sort"]); ?></td>
                        <td class="ismenu" data="<?php echo ($vo["ismenu"]); ?>"><?php if($vo['ismenu'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
                        <td>
                            <a class="btn_edit" href="javascript:void(0);">编辑</a>
                            &nbsp;|&nbsp;
                            <a class="btn_add" href="javascript:void(0);">添加子节点</a>
                            &nbsp;|&nbsp;
                            <a class="btn_dele" href="javascript:void(0);">删除</a>
                        </td>
                    </tr>
                    <?php if(is_array($vo['child'])): if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><tr class="cnode_0 cnode_<?php echo ($vo["id"]); ?> cnode_<?php echo ($v1["id"]); ?>" data-id="<?php echo ($v1["id"]); ?>" data-level="<?php echo ($v1["level"]); ?>">
                                <td>
                                    <img class="fold_tag unfold" src="/Public/Admin/images/icon/menu_minus.gif" style="margin-left: 75px">
                                    <a class="title" data="<?php echo ($v1["title"]); ?>"><?php echo ($v1["title"]); ?></a>
                                </td>
                                <td class="name" data="<?php echo ($v1["name"]); ?>"><?php echo ($v1["name"]); ?></td>
                                <td class="sort" data="<?php echo ($v1["sort"]); ?>"><?php echo ($v1["sort"]); ?></td>
                                <td class="ismenu" data="<?php echo ($v1["ismenu"]); ?>"><?php if($v1['ismenu'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
                                <td>
                                    <a class="btn_edit" href="javascript:void(0);">编辑</a>
                                    &nbsp;|&nbsp;
                                    <a class="btn_add" href="javascript:void(0);">添加子节点</a>
                                    &nbsp;|&nbsp;
                                    <a class="btn_dele" href="javascript:void(0);">删除</a>
                                </td>
                            </tr>
                            <?php if(is_array($v1['child'])): if(is_array($v1["child"])): $i = 0; $__LIST__ = $v1["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><tr class="cnode_0 cnode_<?php echo ($vo["id"]); ?> cnode_<?php echo ($v1["id"]); ?>" data-id="<?php echo ($v2["id"]); ?>" data-level="<?php echo ($v2["level"]); ?>">
                                        <td>
                                            <img class="fold_tag unfold" src="/Public/Admin/images/icon/menu_minus.gif" style="margin-left: 100px">
                                            <a class="title" data="<?php echo ($v2["title"]); ?>"><?php echo ($v2["title"]); ?></a>
                                        </td>
                                        <td class="name" data="<?php echo ($v2["name"]); ?>"><?php echo ($v2["name"]); ?></td>
                                        <td class="sort" data="<?php echo ($v2["sort"]); ?>"><?php echo ($v2["sort"]); ?></td>
                                        <td class="ismenu" data="<?php echo ($v2["ismenu"]); ?>"><?php if($v2['ismenu'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
                                        <td>
                                            <a class="btn_edit" href="javascript:void(0);">编辑</a>
                                            &nbsp;|&nbsp;
                                            <a class="btn_add" href="javascript:void(0);">添加子节点</a>
                                            &nbsp;|&nbsp;
                                            <a class="btn_dele" href="javascript:void(0);">删除</a>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
            </table>

        </div>
    </div>
</div>

<div id="add_alert_tmp" style="display: none">
    <div class="form_content" style="padding: 20px;">
        <input type="hidden" class="add_input_id" value="" />
        <table width="100%">
            <tr><td>节点名称</td><td><input type="text" class="add_input_title" /></td></tr>
            <tr><td>访问链接</td><td><input type="text" class="add_input_name" /></td></tr>
            <tr><td>排序</td><td><input type="text" class="add_input_sort" value="0" /></td></tr>
            <tr><td>是否显示</td><td><select class="add_input_ismenu"><option value="0">否</option><option value="1">是</option></select></td></tr>
            <tr><td></td><td><a class="subBtn">提交</a></td></tr>
        </table>
    </div>
</div>

<script>
    $(function () {
        $('.node_table tr').hover(function () {
            $(this).css('background-color', '#f5faff');
        },function () {
            $(this).css('background-color', '#FFFFFF');
        });
        //节点展开收起
        $('.node_table .fold_tag').click(function () {
            var _this_tr = $(this).parents('tr');
            var data_id = _this_tr.attr('data-id');
            if ($(this).hasClass('unfold')) {
                $(this).removeClass('unfold').addClass('fold').attr('src', '/Public/Admin/images/icon/menu_plus.gif');
                _this_tr.siblings('.cnode_'+data_id).hide();
            }else {
                $(this).removeClass('fold').addClass('unfold').attr('src', '/Public/Admin/images/icon/menu_minus.gif');
                _this_tr.siblings('.cnode_'+data_id).show();
            }
        });
        //编辑节点输入框
        $('.node_table .btn_edit').click(function () {
            editNode(this);
        });
        //添加子节点
        $('.node_table .btn_add').click(function () {
            var _this_tr = $(this).parents('tr');
            $('#add_alert_tmp .add_input_id').attr('value', _this_tr.attr('data-id'));
            var _form_id = 'add_form_' + Math.ceil(Math.random()*1000);
            var _html = '<div id="'+_form_id+'" class="add_node_div">' + $('#add_alert_tmp').html() + '</div>';
            layer.open({
                type: 1,
                title: '添加节点',
                skin: 'layui-layer', //加上边框
                area: ['420px', '300px'], //宽高
                content: _html
            });
            $('#'+_form_id+' .subBtn').click(function () {
                doAddNode(this);
            });
        });
        //删除节点
        $('.node_table .btn_dele').click(function () {
            var _this = this;
            layer.confirm('确定要删除该节点？', {
                btn: ['确定','取消']
            }, function(){
                doDeleNode(_this);
            });
        });
    });


    //编辑节点方法
    function editNode(_this) {
        if ($(_this).hasClass('do_edit_btn')) {
            doEditNode(_this);
        }else {
            var _this_tr = $(_this).parents('tr');
            var id = _this_tr.attr('data-id');
            var title = _this_tr.find('.title').attr('data');
            var name = _this_tr.find('.name').attr('data');
            var sort = _this_tr.find('.sort').attr('data');
            var ismenu = _this_tr.find('.ismenu').attr('data');

            _this_tr.find('.title').html('<input type="text" class="input_title" value="'+title+'" />');
            _this_tr.find('.name').html('<input type="text" class="input_name" value="'+name+'" />');
            _this_tr.find('.sort').html('<input type="text" class="input_sort" value="'+sort+'" />');
            _this_tr.find('.ismenu').html('<select class="input_ismenu"><option value="1">是</option><option value="0">否</option></select>');

            _this_tr.find('.input_ismenu option[value="'+ismenu+'"]').attr('selected', true);
            $(_this).addClass('do_edit_btn').html('提交');
        }
    }
    function doEditNode(_this) {
        var _this_tr = $(_this).parents('tr');
        var id = _this_tr.attr('data-id');
        if (id == '') return false;
        var title = _this_tr.find('.input_title').val();
        var name = _this_tr.find('.input_name').val();
        var sort = _this_tr.find('.input_sort').val();
        var ismenu = _this_tr.find('.input_ismenu').val();
        if (title == '' || name == '' || sort == '') {
            layer.msg('数据不能为空', {icon:5,time:1000});
            return false;
        }
        $.ajax({
            type:'post',
            dataType:'json',
            data:{id:id,title:title,name:name,sort:sort,ismenu:ismenu},
            url:'/Permission/updateNode',
            error:function () {
                layer.msg('未知错误', {icon:5,time:1000});
            },
            success:function (data) {
                if (data.code == 1) {
                    layer.msg('修改成功', {icon:6,time:1000}, function () {
                        $(_this).removeClass('do_edit_btn').html('编辑');
                        _this_tr.find('.title').html(title).attr('data', title);
                        _this_tr.find('.name').html(name).attr('data', name);
                        _this_tr.find('.sort').html(sort).attr('data', sort);
                        _this_tr.find('.ismenu').html((ismenu==1)?'是':'否').attr('data', ismenu);
                    });
                }else {
                    layer.msg(data.msg, {icon:5,time:1000});
                }
            }
        });
    }
    
    //增加节点
    function doAddNode(_this) {
        var form_content = $(_this).parents('.form_content');
        var pid = form_content.find('.add_input_id').val();
        if (pid == '') return false;
        var title = form_content.find('.add_input_title').val();
        var name = form_content.find('.add_input_name').val();
        var sort = form_content.find('.add_input_sort').val();
        var ismenu = form_content.find('.add_input_ismenu').val();
        if (title == '' || name == '' || sort == '' || ismenu == '') {
            layer.msg('数据不能为空', {icon:5,time:1000});
            return false;
        }
        $.ajax({
            type:'post',
            dataType:'json',
            data:{pid:pid,title:title,name:name,sort:sort,ismenu:ismenu},
            url:'/Permission/addNode',
            error:function () {
                layer.msg('未知错误', {icon:5,time:1000});
            },
            success:function (data) {
                if (data.code == 1) {
                    layer.msg('修改成功', {icon:6,time:1000}, function () {location.reload();});
                }else {
                    layer.msg(data.msg, {icon:5,time:1000});
                }
            }
        });
    }

    //删除节点
    function doDeleNode(_this) {
        var _this_tr = $(_this).parents('tr');
        var id = _this_tr.attr('data-id');
        if (id == '') return false;
        $.ajax({
            type:'post',
            dataType:'json',
            data:{id:id},
            url:'/Permission/deleteNode',
            error:function () {
                layer.msg('未知错误', {icon:5,time:1000});
            },
            success:function (data) {
                if (data.code == 1) {
                    layer.msg('删除成功', {icon:6,time:1000}, function () {_this_tr.remove();});
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