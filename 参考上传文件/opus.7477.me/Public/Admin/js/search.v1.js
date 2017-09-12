//搜索页js
$(function(){
	// 搜索页头部搜索框悬挂
	$(window).scroll(function() {
        var scrollTop = $(document).scrollTop();
		if(scrollTop>350) {
			$(".sea-search").addClass("search-fixed");
		}
		else {
			$(".sea-search").removeClass("search-fixed");
		}
    });
    // wap下点击显示更多tags

    /*
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
    */

});
