<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gautama
 */
$footer_skin = gautama_get_option('footer-skin', 'footer-dark');
$footer_layout = gautama_get_option('footer-layout', 'layout-1');
$footer_type = gautama_get_option('footer_type', 'static');
?>
	</div><!-- #content -->
		<!-- Page Template Before Header --->
		<?php echo get_the_page_template( 'page_template_before_footer', 'enable_page_template_before_footer' ); ?>
	<?php if($footer_type == 'static'){ ?>
	<footer class="site-footer <?php echo esc_attr($footer_skin) ?> site-footer-<?php echo esc_attr($footer_layout) ?>">
		<?php get_template_part( 'template-parts/footer/layouts/' . $footer_layout ); ?>
	</footer>
	<?php
	}else{
		$footer_template = gautama_get_option('footer_type_page_template');
		if( empty($footer_template) ){
			return;
		}
		$post = get_post($footer_template);
		?>
		<footer class="site-footer sigma-template sigma-footer-template sigma-template-<?php echo esc_attr($footer_template) ?>">
			<div class="container">
		    <div class="entry-content clearfix">
		      <?php echo do_shortcode($post->post_content); ?>
		    </div>
		  </div>
		</footer>
	<?php } ?>
	<!-- Page Template Before Header --->
	<?php echo get_the_page_template( 'page_template_after_footer', 'enable_page_template_after_footer' ); ?>
</div><!-- #page -->
<!--====== GO TO TOP START ======-->
<?php
if(gautama_get_option('back_to_top')){
	$custom_icon = gautama_get_option('back_to_top_icon', 'fas fa-arrow-up');
	$position = gautama_get_option('back_to_top_position', 'bottom-right');
	$style = gautama_get_option('back_to_top_style', 'square');
	?>
<div class="<?php echo esc_attr($style) ?> sigma_to-top <?php echo esc_attr($position) ?>">
	<i class="<?php echo esc_attr($custom_icon) ?>"></i>
</div>
<?php } ?>
<!--====== GO TO TOP ENDS ======-->
<?php wp_footer(); ?>
</body>
</html>
