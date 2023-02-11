<?php
/**
 * Testimonial shortcode style 2 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_testimonials' ][ 'atts' ];

$testimonial_details         = get_post_meta( $post->ID, 'sigma_testimonial_details', true );
$sigma_testimonial_designation  = isset( $testimonial_details['sigma_testimonial_designation'] ) ? $testimonial_details['sigma_testimonial_designation'] : '';
$sigma_testimonial_rating = isset( $testimonial_details['sigma_testimonial_rating'] ) ? $testimonial_details['sigma_testimonial_rating'] : '';
?>
<div class="testimonial-box">
	<?php if(has_post_thumbnail($post->ID) && $atts['post_featured_image'] == 'yes'){ ?>
		<div class="client-img">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>
  <div class="testimonial-content">
    <?php the_excerpt(); ?>
  </div>
  <div class="testimonial-footer">
    <div class="testimonial-footer-meta">
		<h5><?php echo esc_html( $post->post_title ); ?></h5>
		<?php if ( $sigma_testimonial_designation && $atts['show_designation'] == 'yes' ) { ?>
		<span class="clinet-post">	<?php echo esc_html( $sigma_testimonial_designation ); ?></span>
		<?php } ?>
    </div>
		<?php if($sigma_testimonial_rating){ ?>
		<div class="sigma_testimonial-rating">
			<?php for($i = 0; $i < $sigma_testimonial_rating; $i++){ ?>
				<i class="far fa-star"></i>
			<?php } ?>
		</div>
		<?php } ?>
  </div>
</div>
