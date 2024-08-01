// OWL SLIDER CUSTOM JS
(function ($) {
 jQuery(window).on('load', function() {
    /* Preloader */
    setTimeout(function(){
          jQuery('body').addClass('loaded');
        }, 1500);
});
    // remove box on click 
    $("a").keypress(function() {
     this.blur();
     this.hideFocus = false;
     this.style.outline = null;
      });
      $("a").mousedown(function() {
           this.blur();
           this.hideFocus = true;
           this.style.outline = 'none';
      });

      // remove # on URL
        $(".search-icon").click(function(e){
            e.preventDefault();
            console.log();
         });
        
    $(document).ready(function() {

      jQuery(function(){
      jQuery(".video-player").mb_YTPlayer();
    });

    jQuery('#video-play').click(function(event) {
      event.preventDefault();
      if (jQuery(this).hasClass('fa-play')) {
      jQuery('.video-player').playYTP();
      } else {
      jQuery('.video-player').pauseYTP();
      }
      jQuery(this).toggleClass('fa-play fa-pause');
      return false;
    });

    jQuery('#video-volume').click(function(event) {
      event.preventDefault();
      if (jQuery(this).hasClass('fa-volume-off')) {
      jQuery('.video-player').YTPUnmute();
      } else {
      jQuery('.video-player').YTPMute();
      }
      jQuery(this).toggleClass('fa-volume-off fa-volume-up');
      return false;
    });
    });

  //Sticky Header
       jQuery(window).bind('scroll', function () {
          if (jQuery(window).scrollTop() > 100)
          {
                jQuery('.header-sticky').addClass('stickymenu');
                jQuery('.header-sidebar').css('display','none');
          } else {
                jQuery('.header-sticky').removeClass('stickymenu');
                jQuery('.header-sidebar').css('display','');
          }
       });

  // scroll
  $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-up').fadeIn();
        } else {
            $('.scroll-up').fadeOut();
        }
    });

    $('a[href="#totop"]').click(function () {
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });


})(jQuery);
