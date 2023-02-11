(function($) {
"use strict"
$(document).ready(function() {

  // Add Row for the team social fields.
  $(document).on('click', '.team-table-row-add', function() {
    var row_add = '';
    var current_row = $('.team-social-icon-table tr').length;
    row_add = '<tr><td class="row-index">' + current_row + '</td><td class="sigma_input-field"><input class="sigma_text team-social-icons" type="text" name="sigma_teammember_socials_icon[]" value=""></td><td class="sigma_input-field"><input class="sigma_text" type="text" name="sigma_teammember_socials_link[]" value=""></td><td><a class="team-table-row-remove sigma_link-destructive" href="#">Remove</a></td></tr>';
    $('.team-social-icon-table').append(row_add);
    $('.team-social-icon-table td.row-index').each(function(index) {
      $(this).text(index + 1);
    });
    var total_row = $('.team-social-icon-table tr').length - 1;
    $('input[name="sigma_teammember_socials_total"]').val(total_row);
    sigmacore_social_iconpicker();
  });

  // Remove Row for the team social fields.
  $(document).on('click', '.team-table-row-remove', function(event) {
    event.preventDefault();
    $(this).parents('tr').remove()
    $('.team-social-icon-table td.row-index').each(function(index) {
      $(this).text(index + 1);
    });
    var total_row = $('.team-social-icon-table tr').length - 1;
    $('input[name="sigma_teammember_socials_total"]').val(total_row);
  });
    sigmacore_social_iconpicker();
    sigmacore_ammenities_iconpicker();
    sigmacore_service_iconpicker();
    sigmacore_ministries_iconpicker();

});

  // Social Icon picker.
  function sigmacore_social_iconpicker() {
    var icons_array = [];
    $.each(
      sigmacore_object.sigmacore_get_social_icons,
      function(icon_key, icon_val) {
        var icon_key = Object.entries(icon_val);
        icons_array.push({
          title: icon_key[0][0],
          searchTerms: icon_key[0][1]
        })
      }
    );
    var options = {
      icons: icons_array,
      inputSearch: true,
    }
    $('.team-social-icons').iconpicker(options);
  }

  function sigmacore_ammenities_iconpicker() {
    var icons_array = [];
    $.each(
      sigmacore_object.sigmacore_get_ammenities_icons,
      function(icon_key, icon_val) {
        var icon_key = Object.entries(icon_val);
        icons_array.push({
          title: icon_key[0][0],
          searchTerms: icon_key[0][1]
        })
      }
    );
    var options = {
      icons: icons_array,
      inputSearch: true,
    }
    $('.ammenity-icons').iconpicker(options);
  }



    function sigmacore_service_iconpicker() {
      var icons_array = [];
      $.each(
        sigmacore_object.sigmacore_get_service_icons,
        function(icon_key, icon_val) {
          var icon_key = Object.entries(icon_val);
          icons_array.push({
            title: icon_key[0][0],
            searchTerms: icon_key[0][1]
          })
        }
      );
      var options = {
        icons: icons_array,
        inputSearch: true,
      }
      $('.service-icons').iconpicker(options);
    }

    /*
  	 * Social Icon picker.
  	 */
  	function sigmacore_ministries_iconpicker(){

  		var icons_array = [];
  		$.each(
  			sigmacore_object.sigmacore_get_service_icons,
  			function( icon_key, icon_val ) {
  				var icon_key  = Object.entries( icon_val );
  				icons_array.push( {title:icon_key[0][0], searchTerms:icon_key[0][1]} )
  			}
  		);

  		var options = {
  			icons : icons_array,
  			inputSearch: true,
  		}
  		$( '#sigma_ministries_socials_icon' ).iconpicker( options );
  	}

    /*
     * call to action widget
     */
     function media_upload(button_selector) {
      var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
      $('body').on('click', button_selector, function() {
        var button_id = $(this).attr('id');
        wp.media.editor.send.attachment = function(props, attachment) {
          if (_custom_media) {
            $('.' + button_id + '_img').attr('src', attachment.url);
            $('.' + button_id + '_url').val(attachment.url);
          } else {
            return _orig_send_attachment.apply($('#' + button_id), [props, attachment]);
          }
        }
        wp.media.editor.open($('#' + button_id));
        return false;
      });
     }
     media_upload('.js_custom_upload_media');

})(jQuery);
