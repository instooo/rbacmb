/*!
 * SuperSlide v2.1.1 
 * 轻松解决网站大部分特效展示问题
 * 详尽信息请看官网：http://www.SuperSlide2.com/
 *
 * Copyright 2011-2013, 大话主席
 *
 * 请尊重原创，保留头部版权
 * 在保留版权的前提下可应用于个人或商业用途

 * v2.1.1：修复当调用多个SuperSlide，并设置returnDefault:true 时返回defaultIndex索引错误
 banner轮播
 */
var debugTime = [];
(function($){
	$.fn.ckSlide = function(opts){
	    opts = $.extend({}, $.fn.ckSlide.opts, opts);
	    this.each(function(){
	    var slidewrap = $(this).find('.ck-slide-wrapper');
	    var slide = slidewrap.find('li');
	    var count = slide.length;
	    var that = this;
	    var index = 0;
	    var time = null;
	    $(this).data('opts', opts);
	    // next
	    $(this).find('.ck-next').on('click', function(){
	        if(opts['isAnimate'] == true){
	            return;
	        }
	        var old = index;
	        if(index >= count - 1){
	            index = 0;
	        }else{
	            index++;
	        }
	        change.call(that, index, old);
	    });
	    // prev
	    $(this).find('.ck-prev').on('click', function(){
	        if(opts['isAnimate'] == true){
	            return;
	        }

	        var old = index;
	        if(index <= 0){
	            index = count - 1;
	        }else{
	            index--;
	        }
	        change.call(that, index, old);
	    });
	    $(this).find('.ck-slidebox li').each(function(cindex){
	        $(this).on('click.slidebox', function(){
	            change.call(that, cindex, index);
	            index = cindex;
	        });
	    });
	    // focus clean auto play
	    $(this).on('mouseover', function(){
	        if(opts.autoPlay){
	            clearInterval(time);
	            for (var i = 0; i < debugTime.length; i++) {
	                if (debugTime[i] == time) {
	                    debugTime = debugTime.splice(i, debugTime.length - 1);
	                }
	            }
	            time = null;
	        }
	        $(this).find('.ctrl-slide').css({opacity:0.5});
	    });
	    //  leave
	    $(this).on('mouseleave', function(){
	        if(opts.autoPlay && time == null){
	            startAtuoPlay();
	        }
	        $(this).find('.ctrl-slide').css({opacity:0});
	    });
	    $(this).trigger('mouseleave');
	    // auto play
	    function startAtuoPlay(){
	        if(opts.autoPlay){
	            time  = setInterval(function(){
	                var old = index;
	                if(index >= count - 1){
	                    index = 0;
	                }else{
	                    index++;
	                }
	                change.call(that, index, old);
	            }, 3500);
	            debugTime.push(time);
	        }
	    }
	    // 修正box
	    var box = $(this).find('.ck-slidebox');
	    box.css({
	        'margin-left':-(box.width() / 2)
	    })
	    // dir
	    switch(opts.dir){
	        case "x":
	            opts['width'] = $(this).width();
	            slidewrap.css({
	                'width':count * opts['width']
	            });
	            slide.css({
	                'float':'left',
	                'position':'relative'
	            });
	            slidewrap.wrap('<div class="ck-slide-dir"></div>');
	            slide.show();
	            break;
	    	}
		});
	};
	function change(show, hide){
	    var opts = $(this).data('opts');
	    if(opts.dir == 'x'){
	        var x = show * opts['width'];
	        $(this).find('.ck-slide-wrapper').stop().animate({'margin-left':-x}, function(){opts['isAnimate'] = false;});
	        opts['isAnimate'] = true
	    }else{
	        $(this).find('.ck-slide-wrapper li').eq(hide).stop().animate({opacity:0}).css('z-index', 0);
	        $(this).find('.ck-slide-wrapper li').eq(show).show().css({opacity:0}).stop().animate({opacity:1}).css('z-index', 2);
	    }

	    $(this).find('.ck-slidebox li').removeClass('current');
	    $(this).find('.ck-slidebox li').eq(show).addClass('current');
	}
	$.fn.ckSlide.opts = {
	    autoPlay: false,
	    dir: null,
	    isAnimate: false
	};
})(jQuery);