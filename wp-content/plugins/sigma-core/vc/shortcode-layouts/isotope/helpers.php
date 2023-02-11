<?php
/**
 * Isotope layout helper functions
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sigmacore_isotope_categories_markup( $atts = [], $list_items = [], $taxonomy = '' ){

	if(empty($list_items) || empty($taxonomy) || empty($atts)){
		return false;
	}

	$i = 0;

	foreach($list_items as $list_item):

		$term = get_term_by('slug', $list_item['isotope_cat_slug'], $taxonomy);
		$post_link_id = str_replace(' ', '-', $list_item['isotope_cat_slug']);

		if(isset($term->term_id)):
			?>
			<div class="<?php echo esc_attr($atts['isotope_num_columns_cats']) ?> col-md-6 col-sm-4">
				<div class="sigma_post-filter-item">
					<a class="<?php echo $i == 0 ? esc_attr('sigma_filter-first-item active') : '' ?>" href="#" data-filter=".<?php echo esc_attr($post_link_id) ?>" data-tax="<?php echo esc_attr('category') ?>" data-cat="<?php echo esc_attr($post_link_id) ?>">
						<?php
						if(isset($list_item['show_icon']) && !empty($list_item['show_icon'])) {
						if($list_item['show_icon'] == 'yes') {
						if ( isset($list_item[ 'isotope_icon_type' ]) && $list_item[ 'isotope_icon_type' ] ) {
							$icon_type = 'isotope_icon_' . $list_item[ 'isotope_icon_type' ];
							vc_icon_element_fonts_enqueue( $list_item[ 'isotope_icon_type' ] );
							if ( isset( $list_item[ $icon_type ] ) && $list_item[ $icon_type ] ) {
								?>
								<i class="<?php echo esc_attr( $list_item[ $icon_type ] ); ?>"></i>
								<?php
							}
						} }
						}
						?>
						<h5><?php echo esc_html($term->name); ?></h5>
					</a>
				</div>
			</div>
			<?php
			$i++;
		endif;

	endforeach;

}

?>
