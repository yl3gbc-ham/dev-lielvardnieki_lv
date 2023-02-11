<?php
/**
 * Product Categories shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_product_categories' ][ 'atts' ];
if ( !$atts['list_items'] ) {
	return;
}

$classes 		 = sigmacore_get_grid_layout_classes($atts);

$list_items = vc_param_group_parse_atts( $atts['list_items'] );
  ?>
<div class="row">
	<?php
	foreach ( $list_items  as $list_item ):

		$cat_bg = isset($list_item['prod_cat_bg']) && !empty($list_item['prod_cat_bg']) ?  wp_get_attachment_image_src($list_item['prod_cat_bg'], 'full') : '';

		$term = get_term_by('slug', $list_item['prod_cat_slug'], 'product_cat');

		if(isset($term->term_id)): ?>

			<div class="<?php echo esc_attr($classes) ?>">
				<?php if(!isset(get_term_link($term->term_id, 'product_cat')->errors)){ ?>
				<div class="sigma_product-category">
					<a href="<?php echo get_term_link($term->term_id, 'product_cat') ?>">
						<?php if(isset($cat_bg[0])){ ?>
							<img src="<?php echo esc_url($cat_bg[0]) ?>" alt="<?php echo esc_attr($term->name) ?>">
						<?php } ?>
						<?php
						if ( $list_item[ 'icon_type' ] ) {
							$icon_type = 'icon_' . $list_item[ 'icon_type' ];
							vc_icon_element_fonts_enqueue( $list_item[ 'icon_type' ] );
							if ( isset( $atts[ $icon_type ] ) && $list_item[ $icon_type ] ) {
								?>
									<i class="icon <?php echo esc_attr( $list_item[ $icon_type ] ); ?>"></i>
                  <i class="icon-hidden <?php echo esc_attr( $list_item[ $icon_type ] ); ?>"></i>
								<?php
							}
						}
						 ?>
						<h5><?php echo esc_html($term->name) ?></h5>
            <span><?php echo esc_html($term->count) . ' ' . _n( 'Product', 'Products', $term->count, 'sigma-core' ) ?></span>
					</a>
				</div>
				<?php } ?>
			</div>

		<?php
		endif;
	endforeach;
	?>
</div>
