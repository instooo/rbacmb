$(function(){
	// 下拉框的显示与隐藏
	$('.input-box').click(function(event){
		event.stopPropagation();
		$(this).find('.drop-box').show().parents('.input-box,.input-list').siblings().children().find('.drop-box').hide();
		$(this).siblings().find('.drop-box').hide();

	});
	// 下拉框赋值给input
	$('.drop-box').on('click', 'a', function(event){
		event.stopPropagation();
		$(this).parents('.drop-box').siblings('input').val($(this).text()).attr('data-id',$(this).attr('data-id'));
		$(this).parents('.drop-box').hide();
		$(this).addClass('active').siblings().removeClass('active')
	});
	$(document.body).click(function(){
		$(".drop-box").hide();
	});	
});

function ptcyxylsu(o){
 o.value=o.value.replace(/[^\d]/g,'');
}		
