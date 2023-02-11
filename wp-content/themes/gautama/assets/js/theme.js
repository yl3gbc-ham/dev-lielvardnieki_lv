(function($) {
  "use strict"

  /*-------------------------------------------------------------------------------
  3d card
  -------------------------------------------------------------------------------*/
  var card = $(".sigma_card-3d");

  var cardHeight = card.innerHeight();
  var cardWidth = card.innerWidth();

  card.on('mousemove', handleMove);

  function handleMove(e){
    var xVal = e.pageX - $(this).offset().left;
    var yVal = e.pageY - $(this).offset().top;

    var yRotation = 15 * ((xVal - cardWidth / 2) / cardWidth);
    var xRotation = -15 * ((yVal - cardHeight / 2) / cardHeight);
    $(this).css({ "transform": "perspective(500px) rotateX(" + xRotation + "deg) rotateY(" + yRotation + "deg)", "transition": "0s"  })
  }

  /* Add listener for mouseout event, remove the rotation */
  card.on('mouseout', function() {
    $(this).css({ "transform": "perspective(500px) rotateX(0) rotateY(0)", "transition": ".3s" })
  })

  /* Add listener for mousedown event, to simulate click */
  card.on('mousedown', function() {
    $(this).css({ "transform": "perspective(500px) rotateX(0) rotateY(0)", "transition": ".3s" })
  })

  /* Add listener for mouseup, simulate release of mouse click */
  card.on('mouseup', function() {
    $(this).css({ "transform": "perspective(500px) rotateX(0) rotateY(0)", "transition": ".3s" })
  })

  /*-------------------------------------------------------------------------------
  Preloader
  -------------------------------------------------------------------------------*/
  // Name preloader
  var preloaderLetters = $('#letters'),
  letterItems = preloaderLetters.find('span');
  function doLetterAnim(){

    var delay = 200;
    letterItems.each(function(e, i) {
      var $this = $(this);
      setTimeout(function() {
        $this.addClass('appeared');
        if(e == letterItems.length - 1){
          $(".preloader-name").addClass('done');
        }
      }, 50 + e * delay)
    })

  }
  if(preloaderLetters.length){
    doLetterAnim();
  }

  $(window).on('load', function() {
    $('.sigma_preloader').addClass('hidden');
  });

  /*-------------------------------------------------------------------------------
  Seleect2
  -------------------------------------------------------------------------------*/
  $(".widget select, .sigma_shop-global select, .sigma-post-inner select").select2();

  /*-------------------------------------------------------------------------------
    Team Socials Trigger
    -------------------------------------------------------------------------------*/
    $("a.trigger-team-socials").on('click', function(e) {
      e.preventDefault();
      $('.sigma_sm').toggleClass('visible');
    });

  /*-------------------------------------------------------------------------------
  Vertical Megamenu
  -------------------------------------------------------------------------------*/
  $(".sigma-v-megamenu-trigger").on('click', function(e){
    e.preventDefault();
    $(this).closest('.sigma-v-megamenu').toggleClass('active');
    $(this).next('.sigma-v-megamenu-menu-wrap').slideToggle();
  });

  /*-------------------------------------------------------------------------------
  Jump To
  -------------------------------------------------------------------------------*/
  $('body').on('click', '.sigma-go-to', function(e){
    e.preventDefault();

    var jumpTo = $(this).data('to');

    $("html, body").animate({
      scrollTop: $(jumpTo).offset().top
    }, 600);
    return false;

  });

  /*-------------------------------------------------------------------------------
  Mobile Navigation and Aside panels
  -------------------------------------------------------------------------------*/
  $(".aside-inner .menu-item-has-children > a").on('click', function(e) {
    var submenu = $(this).next(".sub-menu");
    e.preventDefault();
    submenu.slideToggle(200);
  });

  $(".aside-trigger").on('click', function() {
    $(".burger-icon.aside-trigger").toggleClass('active');
    $(".desktop-aside").toggleClass("active");
  });
  $(".aside-m-trigger").on('click', function() {
    $(".burger-icon.aside-m-trigger").toggleClass('active');
    $(".mobile-aside").toggleClass("active");
  });

  /*-------------------------------------------------------------------------------
  Search Form
	-------------------------------------------------------------------------------*/
  $(".search-trigger").on('click', function(e){
    e.preventDefault();
    $(this).next().slideToggle();
  });

  /*-------------------------------------------------------------------------------
  Sticky Header
	-------------------------------------------------------------------------------*/
  var header = $(".can-sticky");
  var headerHeight = header.innerHeight();
  function doSticky() {
    if (window.pageYOffset > headerHeight + 120) {
      header.addClass("sticky");
    } else {
      header.removeClass("sticky");
    }
  }
  doSticky();

  /*-------------------------------------------------------------------------------
  Back to top
  -------------------------------------------------------------------------------*/
  function stickBackToTop(){
    if (window.pageYOffset > 400) {
      $('.sigma_to-top').addClass('active');
    }else{
      $('.sigma_to-top').removeClass('active');
    }
  }
  stickBackToTop();

  $('body').on('click', '.sigma_to-top', function() {
    $("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });

  /*-------------------------------------------------------------------------------
  Masonry
  -------------------------------------------------------------------------------*/
  $('.masonry').imagesLoaded(function() {
    var isotopeContainer = $('.masonry');
    isotopeContainer.isotope({
      itemSelector: '.masonry-item',
    });
  });


  /*-------------------------------------------------------------------------------
  Countdown
  -------------------------------------------------------------------------------*/
  $(".sigma_countdown-timer").each(function(){
    var $this = $(this);
    $this.countdown($this.data('countdown'), function(event) {
      $(this).text(
        event.strftime('%D days %H:%M:%S')
      );
    });
  });

  /*-------------------------------------------------------------------------------
  Tooltips
  -------------------------------------------------------------------------------*/

  $('.popup-sigma a').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  //On scroll events
  $(window).on('scroll', function() {

    doSticky();
    stickBackToTop();

  });
  /*----------------------------------------------------------------------------
Show/Hide Login-Register Form
 ----------------------------------------------------------------------------*/
$(".account-register-link").click(function(){
  $(".login-form-section .woocommerce-form-register.register").addClass("show-register-form");
  $(".login-form-section .woocommerce-form.woocommerce-form-login").addClass("hide-login-form");
});
$(".account-login-link").click(function(){
  $(".login-form-section .woocommerce-form-register.register").removeClass("show-register-form");
  $(".login-form-section .woocommerce-form.woocommerce-form-login").removeClass("hide-login-form");
});

})(jQuery);
