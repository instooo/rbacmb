$(function(){
    if( !window.env ) window.env = {};
    try{ //相册
        var isTruncate = true;
        if( env['notTruncate'] ) isTruncate = false;
        $('.swipeboxEx').flexImages({'rowHeight':300,'container':'.list'});
    }catch(err){}
    try{ //延迟加载
        $(".imgshow").find("img.lazy").lazyload({
            effect: "fadeIn",
            threshold :350
        });
    }catch(err){}
});

$(function() {
  $('#pic_index_search').hover(function() {
	$('#pic_search_type_table').show();
  }, function() {
	$('#pic_search_type_table').hide();
  });

  $('[pic-click-type="search_type"]').click(function(e) {
	var pickType = $(this);
	if (pickType) {
	  var pickTypeName = pickType.html();
	  var pickTypeValue = pickType.attr('pic-search-type');
	  $('#pic_current_search_type').html(pickTypeName);
	  $('#pic_form_search_model').val(pickTypeValue);
	  $('#pic_search_type_table').hide();
	}
  });
  
  //实现回到顶部元素的渐显与渐隐
    $(window).scroll(function(e) {
        //若滚动条离顶部大于100元素
        if($(window).scrollTop()>100)
            $("#gotop").fadeIn(200);
        else
            $("#gotop").fadeOut(200);
    });

    $(".sea-nav .row-r .wap-touch").click(function(){
        var seah = $(".sea-nav .row-m").height();
        if (seah<50) {
            $(".sea-nav .row-m").css("height","auto");
            $(".sea-nav .row-r").addClass("on");
        }else{
            $(".sea-nav .row-m").css("height","36px");
            $(".sea-nav .row-r").removeClass("on");
        }

    });
})

	