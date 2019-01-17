$('.menu .daohang').click(function() {
    console.log($(this).attr('data-type'))
    var datatype = $(this).attr('data-type');
    $(".menu ." + datatype).slideToggle();
    if ($(this).hasClass('on')) {
        $(this).removeClass('on');
    } else {
        $(this).addClass('on')
    }

})


var menuButton = document.querySelector(".menu-button");
var indexs = 1;
var swiper = new Swiper("#swiper-container1", {
    slidesPerView: "auto",
    initialSlide: 0,
    resistanceRatio: 0,
    slideToClickedSlide: true,
    allowTouchMove: false,
    on: {
        init: function() {
            var slider = this;
            indexs = slider.activeIndex;
            menuButton.addEventListener("click", function() {
                if (indexs === 0) {
                    indexs = 1;
                    slider.slideNext();
                    menuButton.classList.add("cross");
                    $('.menu').addClass('cross')
                } else {
                    indexs = 0;
                    slider.slidePrev();
                    menuButton.classList.remove("cross");
                    $('.menu').removeClass('cross')
                }
            }, true);
        },
        slideChange: function() {
            var slider = this;
            if (indexs === 0) {
                menuButton.classList.add("cross");
            } else {
                menuButton.classList.remove("cross");
            }
        }
    }
});