/**
 * Created by DaiLinLin on 2016/12/21.
 * 星级评论插件
 */
window.onload = function(){
    var star = $('.star').find('a');
    var temp = 0;

    for(var i = 0, len = star.length; i < len; i++){
        star[i].index = i;

        star[i].onmouseover = function(){
            clear();
            for(var j = 0; j < this.index + 1; j++){
                star[j].style.backgroundPosition = '0 0';
            }
        }

        star[i].onmouseout = function(){
            for(var j = 0; j < this.index + 1; j++){
                star[j].style.backgroundPosition = '0 -20px';
            }
            current(temp);
        }

        star[i].onclick = function(){
            temp = this.index + 1;
            $('.starhit').val(temp);
            current(temp);
        }
    }
    //清除所有
    function clear(){
        for(var i = 0, len = star.length; i < len; i++){
            star[i].style.backgroundPosition = '0 -20px';
        }
    }
    //显示当前第几颗星
    function current(temp){
        for(var i = 0; i < temp; i++){
            star[i].style.backgroundPosition = '0 0';
        }
    }
};
