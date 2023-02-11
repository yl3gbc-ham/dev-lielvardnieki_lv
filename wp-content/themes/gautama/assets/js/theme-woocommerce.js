(function($) {
  "use strict"

  /*-------------------------------------------------------------------------------
  Checkout Notices
  -------------------------------------------------------------------------------*/
  $(".sigma_notice a").on('click', function(e) {
    e.preventDefault();

    $(this).closest('.sigma_notice').next().slideToggle();
  });

  /*-------------------------------------------------------------------------------
  Add / Subtract Quantity
  -------------------------------------------------------------------------------*/
  $("body").on('click', '.qty span', function() {
    var qty = $(this).closest('.qty').find('input');
    var qtyVal = parseInt(qty.val());

    if ($(this).hasClass('qty-add')) {
      if (qty.val() >= 1) {
        $("[name='update_cart']").removeAttr('disabled');
        qty.val(qtyVal + 1);
      } else {
        $("[name='update_cart']").removeAttr('disabled');
        qty.val(1);
      }
    } else {
      $("[name='update_cart']").removeAttr('disabled');
      return qtyVal > 1 ? qty.val(qtyVal - 1) : 0;
    }

  });

  /*-------------------------------------------------------------------------------
  Login / Register Toggle
  -------------------------------------------------------------------------------*/
  $(".sigma_auth-toggle button").on('click', function() {

    var index = $(".sigma_auth-toggle button").index(this);

    $(".sigma_auth-toggle button").removeClass('active');
    $(this).addClass('active');

    $(".sigma_auth-wrapper").addClass('hidden');
    $(".sigma_auth-wrapper").eq(index).removeClass('hidden');

  });

  /*-------------------------------------------------------------------------------
  Cart: Notification on added
  -------------------------------------------------------------------------------*/
  $('body').on('added_to_cart', function() {
    var snackBar = $(".onitir-snackbar");
    if (!snackBar.hasClass('show')) {
      snackBar.addClass('show');
      setTimeout(function() {
        snackBar.removeClass('show');
      }, 3000);
    }
  });

  /*-------------------------------------------------------------------------------
  Cart Trigger
  -------------------------------------------------------------------------------*/
  $("body").on('click', '.sigma_cart-trigger .sigma_header-cart-inner', function(e) {
    e.preventDefault();
    $(this).closest('.sigma_header-cart').toggleClass('open');
  });

  /*-------------------------------------------------------------------------------
  Related Products / Posts
  -------------------------------------------------------------------------------*/
  $(".sigma_related-posts-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });

})(jQuery);
