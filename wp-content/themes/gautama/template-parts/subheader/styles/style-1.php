<?php

/**
 * subheader style 2.
 *
 * @package Gautama
 */

global $post;


// Get the page title and caption
$page_title = gautama_subheader_get_title();
$page_caption = gautama_subheader_get_caption();
$page_background_image = gautama_subheader_get_background_image();

$breacrumb_position = gautama_get_option('breadcrumb_position', 'after-title');

$delimiter = gautama_get_option('breadcrumb_custom_separator') && !empty(gautama_get_option('breadcrumb_custom_icon')) ? '<i class="'.esc_attr(gautama_get_option('breadcrumb_custom_icon')).'"></i>' : '';

?>

<div class="sigma-subheader <?php echo esc_attr(gautama_subheader_classes()) ?>" <?php if($page_background_image){ echo 'style="background-image:url('.esc_url($page_background_image).')"'; } ?>>

	<div class="sigma-subheader-layer container">

		<?php if ( gautama_get_option('display_breadcrumb') && $breacrumb_position == 'before-title' ) { ?>
			<div class="breadcrumb-nav">
			<?php echo gautama_subheader_get_breadcrumbs( $delimiter ); ?>
			</div>
		<?php } ?>

    <?php if($page_caption){ ?>
      <p class="subheader-caption"> <?php echo esc_html($page_caption) ?> </p>
    <?php } ?>

		<?php if($page_title){ ?>
			<h1 class="page-title"> <?php echo esc_html($page_title) ?> </h1>
		<?php } ?>

		<?php if ( gautama_get_option('display_breadcrumb') && $breacrumb_position == 'after-title' ) { ?>
			<div class="breadcrumb-nav">
			<?php echo gautama_subheader_get_breadcrumbs( $delimiter ); ?>
			</div>
		<?php } ?>

	</div>

</div>

<?php if ( gautama_get_option('display_breadcrumb') && $breacrumb_position == 'below-image' ) { ?>
	<div class="breadcrumb-nav">
		<div class="container">
			<?php echo gautama_subheader_get_breadcrumbs( $delimiter ); ?>
		</div>
	</div>
<?php } ?>
