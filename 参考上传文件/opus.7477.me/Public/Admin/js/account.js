/**
 * Create: Andrew Chan 2016-05-04
 */
$(function(){

    $("input[data-save='accept-order']").on('click', function(){
        var qq        = $("input[name='accept-qq']").val();
        var iconClass = $('.accept-qq-order p').attr('class');
        var check     = 0;
        if (iconClass == 'cuttent-icon') {
            check     = 1;
        }
        if (qq.length == 0) {
            $(".warning[data-info='accept-order']").html('<i></i>请填写接收消息QQ').show();
            return false;
        }
        if (!(/^[0-9]{5,11}$/.test(qq))) {
            $(".warning[data-info='accept-order']").html('<i></i>QQ号码不合法').show();
            return false;
        }
    });

    // 匹配密码
    $("input[name='newPassword']").on('blur', function(){
        checkPassword();
    });

    // 匹配密码
    function checkPassword(){
        var msg = '';
        var pwd = $("input[name='newPassword']").val();
        if (pwd.length < 8 || /^\d+$/.test(pwd) || /^[^\d]+$/.test(pwd)) {
            msg = '<i></i>密码必须包含数字和字母，不能少于8位';
            $("div.warning[data-info='password']").css('width', '300px').html(msg).show();
            return false;
        }
        return true;
    }

    $("input").on('focus', function(){
        $("div.warning").hide().css('width', '200px');
    });

    // 修改密码
    $("input[data-save='password']").on('click', function(){
        var text        = '';
        var oldPassword = $("input[name='oldPassword']").val();
        var newPassword = $("input[name='newPassword']").val();
        var rePassword  = $("input[name='rePassword']").val();
        if (newPassword !== rePassword) {
            text = '<i></i>两次密码不一致';
            $("div.warning[data-info='password']").html(text).show();
            return;
        }
        if (!checkPassword()) return;
    });

    // 上传个人用户信息
    $("input[data-save='personal']").on('click', function(){
        var profession = $.trim($('input[name="profession"]').val());
        var qq         = $.trim($('input[name="qq"]').val());
        var useWay     = $.trim($('input[name="use-way"]').val());
        if (profession.length == 0) {
            $(".warning[data-info='userType']").html('<i></i>职业不能为空').show();
            return false;
        }
        if (qq.length == 0) {
            $(".warning[data-info='userType']").html('<i></i>请填写常用QQ号').show();
            return false;
        }
        if (!(/^[0-9]{5,11}$/.test(qq))) {
            $(".warning[data-info='userType']").html('<i></i>QQ号码不合法').show();
            return false;
        }
        if (useWay.length == 0) {
            $(".warning[data-info='userType']").html('<i></i>图片用途不能为空').show();
            return false;
        }
    });

    // 上传企业用户信息
    $("input[data-save='enterprise']").on('click', function(){
        var name       = $.trim($('input[name="e-name"]').val());
        var job        = $.trim($('input[name="e-job"]').val());
        var tel        = $.trim($('input[name="e-tel"]').val());
        var email      = $.trim($('input[name="e-email"]').val());
        var enterprise = $.trim($('input[name="e-enterpriseName"]').val());
        var address    = $.trim($('input[name="e-address"]').val());
        if (!name) {
            $(".warning[data-info='userType']").html('<i></i>姓名不能为空').show();
            return false;
        }
        if (!job) {
            $(".warning[data-info='userType']").html('<i></i>职业不能为空').show();
            return false;
        }
        if (!tel.match(/^\d{5,}$/)) {
            $(".warning[data-info='userType']").html('<i></i>联系电话不正确').show();
            return false;
        }
        if (!email.match(/^[a-zA-Z0-9][\w-\.]*@\w+\.\w+(\.\w+)*$/)) {
            $(".warning[data-info='userType']").html('<i></i>邮箱地址不正确').show();
            return false;
        }
        if (!enterprise) {
            $(".warning[data-info='userType']").html('<i></i>企业名称不能为空').show();
            return false;
        }
        if (!address) {
            $(".warning[data-info='userType']").html('<i></i>企业地址不能为空').show();
            return false;
        }

    });

    $(".content_set").on("click", ".edit", function(){
        var duoshow = $(this).parents(".con-tr").find(".duo").css("display");
        if (duoshow == "none") {
            // 自己打开
            $(this).siblings(".name").hide()
                .parents(".con-tr").find(".duo").show();
            // 其他关闭
            $(this).parents(".con-tr").siblings().find(".duo").hide();
            // 其他名字显示
            $(this).parents(".con-tr").siblings().find(".name").show();
            // 下拉显示
            $(this).html("收起 <i class='current1'></i>");
            $(this).parents(".con-tr").siblings().find(".edit").html("编辑 <i class='current'></i>");
            $(this).parents(".con-tr").siblings().find(".edit[data-info='look']").html("查看 <i class='current'></i>");
        } else {
            $(this).siblings(".name").show().parents(".con-tr").find(".duo").hide();
            $(this).parents(".con-tr").find(".edit").html("编辑 <i class='current'></i>");
            $(this).parents(".con-tr").find(".edit[data-info='look']").html("查看 <i class='current'></i>");
        }
    });


    $(".controls .radio-ico:first").find("p").addClass("cuttent-icon");

    $(".big-con .change:eq(1)").hide();

    $(".controls .radio-ico").click(function(){
        $(this).children("p").addClass("cuttent-icon").parent().siblings().find("p").removeClass("cuttent-icon");
        var index=$(this).index();
        $(".big-con .change").eq(index).show().siblings().hide();
    });
})