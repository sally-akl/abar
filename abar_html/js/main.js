(function ($) {
  "use strict";

  // Initiate the wowjs animation library
  new WOW().init();
  // jQuery counterUp (used in Whu Us section)
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });

  $(".choose_project").on("click",function(){
     var val = $(this).attr("data-filter");
     $(".all").css("display","none");
     $(".workClass").removeClass("active");
     $(this).addClass("active");
     if(val == "*")
     {
       $(".all").css("display","block");
     }
     else {
         $(val).css("display","block");
     }
  });
  





})(jQuery);
