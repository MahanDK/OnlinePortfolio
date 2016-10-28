jQuery(document).ready(function($) {
  $(window).scroll(function() {

    var scroll = $(this).scrollTop();
    var nav = $('.navbar-default');
    var navAni = 'navbar-animate';


    if(scroll > 200){                   // Scrolled down
      nav.addClass(navAni);
    }

    else{                              // Top
      nav.removeClass(navAni);
    }

  });
});

jQuery(document).ready(function($) {
  $(".nav a").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).parent().addClass("active");
});
});
