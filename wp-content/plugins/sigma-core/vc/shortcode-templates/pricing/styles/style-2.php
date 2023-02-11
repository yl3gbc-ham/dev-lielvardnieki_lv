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
if($atts['pricing_bg_image'] && $atts['add_bg_img'] == 'true') {
  $pricing_image_data = wp_get_attachment_image_src( $atts[ 'pricing_bg_image' ], 'full' );
  $pricing_image_url  = ( isset( $pricing_image_data[0] ) && $pricing_image_data[0] ) ? $pricing_image_data[0] : '';
}
?>
<div class="sigma_pricing text-center" <?php if(!empty($pricing_image_url)) { ?> style="background-image: url(<?php echo esc_url($pricing_image_url); ?>); " <?php } ?>>
  <div class="sigma_pricing-info">
    <?php if ( $atts[ 'add_icon' ] ) {
      if ( $atts[ 'icon_as' ] === 'image' ) {
        ?>
        <div class="icon">
        <?php
        if ( $atts[ 'icon_image' ] ) {
          $image_data = wp_get_attachment_image_src( $atts[ 'icon_image' ], 'thumbnail' );
          $image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
          if ( $image_url ) {
            ?>
            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Icon', 'sigma-core' ) ?>">
            <?php
          }
        }
        ?>
        </div>
      <?php } else {
        if ( $atts[ 'icon_type' ] ) {
          $icon_type = 'icon_' . $atts[ 'icon_type' ];
          vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
          if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
            ?>
            <div class="icon"><i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i></div>
            <?php
          }
        }
      }
    } ?>
    <?php if(isset($atts['title']) && !empty($atts['title'])) { ?>
      <h5 class="sigma_pricing-title"><?php echo esc_html($atts['title']); ?></h5>
    <?php } ?>
    <div class="sigma_pricing-price">
      <?php if(isset($atts['currency']) && !empty($atts['currency'])) { ?>
        <span class="sigma_pricing-currency"><?php echo esc_html($atts['currency']); ?></span>
      <?php } if(isset($atts['price']) && !empty($atts['price'])) { ?>
        <span><?php echo esc_html($atts['price']); ?></span>
      <?php } ?>
    </div>
  </div>
  <?php if(!empty($price_features_lists)) { ?>
    <ul class="list-style-none">
      <?php foreach($price_features_lists as $price_features_list) { ?>
        <li><i class="fa fa-check"></i><?php echo esc_html($price_features_list['pricing_features_title']); ?></li>
      <?php } ?>
      <?php
        if($atts['show_link'] == 'yes'){
        $link = vc_build_link( $atts['link'] );
        $url = isset($link['url']) && !empty($link['url']) ? $link['url'] : '';
        $title = isset($link['title']) && !empty($link['title']) ? $link['title'] : '';
        $target = isset($link['target']) && !empty($link['target']) ? $link['target'] : '';
      ?>
        <li><a class="sigma_btn-custom secondary light" href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></li>
      <?php } ?>
    </ul>
  <?php } ?>
</div>
