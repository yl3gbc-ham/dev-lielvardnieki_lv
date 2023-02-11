(function($) {
  "use strict"

  $(document).ready(function() {

    // Rating field
    $(document).on('click', '.sigma_input-rating .star', function() {
      var ratings = $('.sigma_input-rating .star').index(this) + 1;
      $('.sigma_input-rating .star').removeClass('rated');
      $('.star:lt( ' + ratings + ' )').addClass('rated');
      $(this).parent().next('.sigma_input-rating-val').val(ratings);
    });

    // Upload file field
    $('body').on('click', '.sigma_upload_image_button', function(e) {
      e.preventDefault();

      var button = $(this),
      custom_uploader = wp.media({
        title: 'Insert image',
        library: {
          type: 'image'
        },
        button: {
          text: 'Use this image'
        },
        multiple: false
      }).on('select', function() {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        $(button).removeClass('button').html('<img class="true_pre_image" src="' + attachment.url + '" style="max-width:100%;display:block;" />').next().val(attachment.id).next().show();
      }).open();

    });

    // Remove attached image
    $('body').on('click', '.sigma_remove_image_button', function(){
      $(this).hide().prev().val('').prev().addClass('button').html('Upload image');
      return false;
    });

    // Tabs
    $(".sigma_tab").on('click', function(e){
      e.preventDefault();

      $(".sigma_tab").removeClass('active');
      $(".sigma_tab-item").removeClass('active');

      $(this).addClass('active');
      $($(this).data('target')).addClass('active');

    });

    /*====================
    THEME VERIFCATION
    =====================*/
    if($('body').hasClass('sigma-is-not-theme-verified')){
      $(".ocdi__gl").remove();
      $(".ocdi__button-container").remove();
      $(".ocdi__demo-import-notice").remove();
    }

    // Verify Theme
    $("#verify-license").on('submit', function(e){
      e.preventDefault();
      var license = $("#license").val(),
      data;

      $(".sigma_verifier").addClass("sigma_verifying");

      $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
          action: 'sigmacore_verify_theme',
          license: license,
        },
        success: function(response){
          $(".sigma_verifier").removeClass("sigma_verifying");
          data = JSON.parse(response);
          console.log(data);
          if(data.is_connected == 1){
            location.reload(true);
          }
          $("#sigma_connection-notice").text(data.message);
        },
        error: function(xhr){
          $(".sigma_verifier").removeClass("sigma_verifying");
          $("#sigma_connection-notice").text("There was an error verifying your theme, please try again in a minute, or contact support if this issue persists.");
        }
      });

    });


    // Unverify Theme
    $(".unlink-domain").on('click', function(e){
      e.preventDefault();
      var $this = $(this),
      license = $("#license").val(),
      data;

      $(".sigma_verifier").addClass("sigma_verifying");

      $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
          action: 'sigmacore_unlink_purchase_code',
          license: license,
        },
        beforeSend:function(){
          return confirm("Are you sure you want to unlink this domain? You will have to re-link it again if necessary");
        },
        success: function(response){

          $(".sigma_verifier").removeClass("sigma_verifying");
          data = JSON.parse(response);
          if(data.type === true){
            location.reload(true);
          }
          $("#sigma_connection-notice").text(data.message);
        },
        error: function(xhr){
          $(".sigma_verifier").removeClass("sigma_verifying");
          $("#sigma_connection-notice").text("There was an error unlinking your domain, please try again in a minute, or contact support if this issue persists.");
        }
      });

    });



  });

})(jQuery);
