<?php
/**
 * File responsible for post metafield functionality.
 *
 * @package Sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Open tag that will go before every metafield input
 *
 * @since 1.0.0
 */
function sigmacore_before_metafield(){
  echo "<div class='sigma_input-field'>";
}
add_action('sigmacore/before_metafield', 'sigmacore_before_metafield', 10);

/**
 * Closing tag that will go after every metafield input
 *
 * @since 1.0.0
 */
function sigmacore_after_metafield(){
  echo "</div>";
}
add_action('sigmacore/after_metafield', 'sigmacore_after_metafield', 10);

/**
 * The arguments necessary to create the input metafield.
 *
 * @param array $args
 * @var mixed $args[value] - The return value of the metafield - Required
 * @var string $args[name] - The name of the metafield - Required
 * @var string $args[type] - The type of the metafield (Checkbox, Select, textarea, text) - Required
 * @var string $args[title] - The Title of the metafield
 * @var string $args[description] - The description of the metafield
 * @var string $args[options] - An array of key value pair holding the options for the select type.
 *
 * @since 1.0.0
 */
function sigmacore_custom_metafield( $args = [] ){

  if( !isset($args['name']) || empty($args['name']) ){
    return esc_html__('Set a name for the input field', 'sigma-core');
  }
  if( !isset($args['type']) || empty($args['type']) ){
    return esc_html__('Set a type for the input field', 'sigma-core');
  }
  if( !isset($args['value']) ){
    return esc_html__('Set a value for the input field', 'sigma-core');
  }

	/**
	 * @hooked sigmacore_before_metafield	- 10
	 */
	do_action('sigmacore/before_metafield');

  if(isset($args['title']) && !empty($args['title'])){ ?>
  <h4 class="sigma_input-title"><?php echo esc_html( $args['title'] ); ?></h4>
  <?php } ?>

  <?php if(isset($args['description']) && !empty($args['description'])){ ?>
  <p class="sigma_input-description"><?php echo esc_html( $args['description'] ); ?></p>
  <?php } ?>

  <?php
  switch ($args['type']) {
    case 'checkbox':
      sigmacore_custom_metafield_checkbox($args);
      break;
    case 'text':
      sigmacore_custom_metafield_text($args);
      break;
		case 'textarea':
      sigmacore_custom_metafield_textarea($args);
      break;
    case 'select':
      sigmacore_custom_metafield_select($args);
      break;
    case 'file':
      sigmacore_custom_metafield_file($args);
      break;
		case 'rating':
      sigmacore_custom_metafield_rating($args);
      break;
    default:
      return esc_html__('Invalid type', 'sigma-core');
      break;
  }

	/**
	 * @hooked sigmacore_after_metafield	- 10
	 */
	do_action('sigmacore/after_metafield');

}

/**
 * The HTML for the checkbox input type
 *
 * @param string $args - @see sigmacore_custom_metafield() method
 *
 * @since 1.0.0
 */
function sigmacore_custom_metafield_checkbox( $args ){

  if( $args['type'] != 'checkbox' ){
    return;
  }
  ?>
  <input class="sigma_switch" type="checkbox" id="<?php echo esc_attr($args['name']) ?>" name="<?php echo esc_attr($args['name']) ?>" value="true" <?php checked( $args['value'], true ); ?>>
  <?php
}

/**
 * The HTML for the text input type
 *
 * @param string $args - @see sigmacore_custom_metafield() method
 *
 * @since 1.0.0
 */
function sigmacore_custom_metafield_text( $args ){

  if( $args['type'] != 'text' ){
    return;
  }
  ?>
  <input class="sigma_text" type="text" id="<?php echo esc_attr($args['name']) ?>" name="<?php echo esc_attr($args['name']) ?>" value="<?php echo esc_attr($args['value']) ?>">
  <?php
}

/**
 * The HTML for the textarea input type
 *
 * @param string $args - @see sigmacore_custom_metafield() method
 *
 * @since 1.0.0
 */
function sigmacore_custom_metafield_textarea( $args ){

  if( $args['type'] != 'textarea' ){
    return;
  }
  ?>
	<textarea class="sigma_text" id="<?php echo esc_attr($args['name']) ?>" name="<?php echo esc_attr($args['name']) ?>"><?php echo esc_html($args['value']) ?></textarea>
  <?php
}

/**
 * The HTML for the file input type
 *
 * @param string $args - @see sigmacore_custom_metafield() method
 *
 * @since 1.0.0
 */
function sigmacore_custom_metafield_file( $args ){

  if( $args['type'] != 'file' ){
    return;
  }

  $image_size = apply_filters('sigmacore_custom_metafield_file_img_size', 'full');
	$display = 'none';
	$class = 'button';

	if( $image_attributes = wp_get_attachment_image_src( $args['value'], $image_size ) ) {
    $display = 'inline-block';
		$class = '';
  }
  ?>

	<a href="#" class="sigma_upload_image_button <?php echo esc_attr($class) ?>">
		<?php if($class == ''){
			echo '<img src="' . esc_url($image_attributes[0]) . '" style="display:block;" />';
		}else{
			echo esc_html__('Upload Image', 'sigma-core');
		}
		?>
	</a>

  <input type="hidden" name="<?php echo esc_attr($args['name']) ?>" id="<?php echo esc_attr($args['name']) ?>" value="<?php echo esc_attr($args['value']) ?>" />
  <a href="#" class="sigma_remove_image_button components-button is-link is-destructive" style="display: <?php echo esc_attr($display) ?>"> <?php echo esc_html__('Remove Image', 'sigma-core') ?> </a>
  <?php
}

/**
 * The HTML for the select input type
 *
 * @param string $args - @see sigmacore_custom_metafield() method
 *
 * @since 1.0.0
 */
function sigmacore_custom_metafield_select( $args ){

  if( $args['type'] != 'select' ){
    return;
  }
  ?>

  <?php if(isset($args['options']) && !empty($args['options']) && is_array($args['options'])){ ?>
    <div class="sigma_select-wrapper">
      <select class="sigma_select" name="<?php echo esc_attr($args['name']) ?>">
        <?php foreach($args['options'] as $key => $value){ ?>
          <option value="<?php echo esc_attr($key) ?>" <?php selected( $args['value'], $key ) ?>><?php echo esc_html($value) ?></option>
        <?php } ?>
      </select>
    </div>
  <?php } ?>

  <?php

}

/**
 * The HTML for the rating input type
 *
 * @param string $args - @see sigmacore_custom_metafield() method
 *
 * @since 1.0.0
 */
function sigmacore_custom_metafield_rating( $args ){

  if( $args['type'] != 'rating' ){
    return;
  }

	?>

	<div class="sigma_input-rating">
		<?php
		for ( $i = 1; 5 >= $i; $i++ ) {
			echo $args['value'] >= $i ? '<span class="star rated">&nbsp;</span>' : '<span class="star">&nbsp;</span>';
		}
		?>
	</div>
	<input type="hidden" class="sigma_input-rating-val" id="<?php echo esc_attr($args['name']) ?>" name="<?php echo esc_attr($args['name']) ?>" value="<?php echo esc_attr($args['value']) ?>" />

	<?php

}

?>
