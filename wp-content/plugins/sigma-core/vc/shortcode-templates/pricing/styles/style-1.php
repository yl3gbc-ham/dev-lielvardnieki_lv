<?php
/**
 * Pricing shortcode style1 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_pricing' ][ 'atts' ];
$price_features_lists = vc_param_group_parse_atts( $atts[ 'features_list' ] );
$package_class = ($atts['package_highlight'] == true) ? 'hot-plan' : '';
?>
<div class="sigma_pricing <?php echo esc_attr($package_class); ?>">
              <div class="sigma_pricing-price">
                <span class="sigma_pricing-currency"><?php echo esc_html($atts['currency'] . $atts['price']); ?></span>
                <span><?php echo esc_html($atts['price_value']); ?></span>
              </div>
              <div class="sigma_pricing-info">
  							<?php if($atts['title']) { ?>
                	<h5 class="sigma_pricing-title"><?php echo esc_html($atts['title']); ?></h5>
  							<?php } if($atts['subtitle']) { ?>
                  <span><?php echo esc_html($atts['subtitle']); ?></span>
                <?php } ?>
              </div>
						<?php if($price_features_lists) { ?>
	            <ul class="list-style-none">
								<?php foreach($price_features_lists as $price_features_list) { ?>
	              	<li><i class="fal fa-check"></i><?php echo esc_html($price_features_list['pricing_features_title']); ?></li>
								<?php } ?>
								<?php
						    	if($atts['show_link'] == 'yes'){
							      $link = vc_build_link( $atts['link'] );
							      $url = isset($link['url']) && !empty($link['url']) ? $link['url'] : '';
							      $title = isset($link['title']) && !empty($link['title']) ? $link['title'] : '';
							      $target = isset($link['target']) && !empty($link['target']) ? $link['target'] : '';
								?>
	              	<li><a class="sigma_btn-custom light" href="<?php echo esc_url($url); ?>"><?php echo esc_html($title); ?></a></li>
								<?php } ?>
	            </ul>
						<?php } ?>
</div>
