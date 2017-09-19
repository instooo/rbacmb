// JavaScript Document
function Obj(){
	this.newStep = 2;
}
Obj.prototype = {
	constructor : Obj,
	addNew: function(ele,pos){
		var that = this;
		$(ele).click(function(event) {
			/* Act on the event */
			var str = '';
			for(var i=0; i<that.newStep; i++){
	            str +='<li>'+
	                    '<div class="time">'+
	                        '<div class="day">20</div>'+
	                        '<p>JUL</p>'+
	                        '<p>2017</p>'+
	                    '</div>'+
	                    '<div class="content">'+
	                        '<div class="title"><a href="news-content.html">东关·拾悦城封顶</a></div>'+
	                        '<div class="author">发布者：东关集团</div>'+
	                        '<p><a href="news-content.html">2017年7月20日，由深圳市东关投资集团有限公司开发的城市西部力作——拾悦城，如期封顶。</a></p>'+
	                    '</div>'+
	                '</li>';
            }
            $(pos).append(str);
		});
	},
	invest: function(){
		$(".invest .left li").click(function(event) {
			/* Act on the event */
			var i = $(this).index()+1;
			$(this).addClass('active').siblings().removeClass('active');
			$(".swiper-container").hide();
			$(".swiper-container").css("opacity","1");
			$(".swiper-container"+i+"").show();
		});
	}
}

