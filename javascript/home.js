


$(document).ready(function(){
 


    $('.js--scroll-to-cards').click(function(){

        $('html,body').animate({scrollTop: $('.js-cards').offset().top},1000);
     
    
    });

    $('.js-navi').click(function(){

       var nav = $('.js-main-nav');
       nav.slideToggle(200);
    });


});










