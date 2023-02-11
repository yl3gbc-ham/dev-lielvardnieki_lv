<?php
/**
 * Clients shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_list' ][ 'atts' ];
if ( ! $atts['list_items'] ) {
	return;
}
$list_items = vc_param_group_parse_atts( $atts['list_items'] );
?>
<div class="sigma-list-wrapper">
	<ul class="sigma-list">
		<?php
		if ( ! empty( $list_items ) ) {
			foreach ( $list_items as $list_item ) {
				if ( isset( $list_item['list_title'] ) && ! empty( $list_item['list_title'] ) ) {
					?>
					<li class="list-item">
            <?php
            if ( $atts[ 'add_icon' ] ) {
              if ( $atts[ 'icon_type' ] ) {
                $icon_type = 'icon_' . $atts[ 'icon_type' ];
                vc_icon_element_fonts_enqueue( $atts[ 'icon_type' ] );
                if ( isset( $atts[ $icon_type ] ) && $atts[ $icon_type ] ) {
                  ?>
                  <i class="<?php echo esc_attr( $atts[ $icon_type ] ); ?>"></i>
                  <?php
                }
              }
            }
            ?>
						<?php if ( isset( $list_item['list_link'] ) && $list_item['list_link'] ) { ?>
							<p class="sigma-list-info" >
							<?php
							$list_link = vc_build_link( $list_item['list_link'] );
							if ( $list_link['url'] ) {
								echo '<a class="list-link"';
								if ( ! empty( $list_link['url'] ) ) {
									echo ' href="' . esc_url( $list_link['url'] ) . '"';
								}
								if ( ! empty( $list_link['title'] ) ) {
									echo ' title="' . esc_attr( $list_link['title'] ) . '"';
								}
								if ( ! empty( $list_link['target'] ) ) {
									echo ' target="_self"';
								}
								if ( ! empty( $list_link['rel'] ) ) {
									echo ' rel="nofollow"';
								}
								echo ' >';
							}
							echo esc_html( $list_item['list_title'] );
							if ( $list_link['url'] ) {
								echo '</a>';
							}
							?>
							</p>
						<?php } else { ?>
							<p class="sigma-list-info ">
							<?php echo esc_html( $list_item['list_title'] ); ?>
							</p>
						<?php } ?>
					</li>
					<?php
				}
			}
		}
		?>
	</ul>
</div>
