$(function(){
	var user_show = '';
        var user_hide = '';
        $(".user .user").on("mouseenter", function(){
            clearTimeout(user_hide);
            user_show = setTimeout(function(){
              $(".new-user-menu").attr("data", "show");
              var show = $(".new-user-menu").attr("data");
              if (show == 'show') {
                  $(".new-user-menu").show();
              }
            }, 500);
        }).on("mouseleave", function(){
            clearTimeout(user_show);
            user_hide = setTimeout(function(){
                $(".new-user-menu").attr("data", '');
                var hide = $(".new-user-menu").attr("data");
                if (hide == '') {
                    $(".new-user-menu").hide();
                }
            }, 500);
        });
		
		//退出登录
		 $('.loginoutBtn').click(function () {
            $.ajax({
                type:'post',
                dataType:'json',
                data:{},
                url:'/Public/loginout',
                error:function () {
                    layer.msg('未知错误', {icon:5,time:1000});
                },
                success:function (data) {
                    if (data.code == 1) {
                        layer.msg('退出成功', {icon:6,time:1000}, function () {
                        location.reload();
                        });
                    }else {
                        layer.msg(data.msg, {icon:5,time:1000});
                    }
                }
            });
        });


});