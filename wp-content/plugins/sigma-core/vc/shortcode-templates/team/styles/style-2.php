<?php
/**
 * Team shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_team' ][ 'atts' ];
$team_details = get_post_meta( get_the_ID(), 'sigma_team_details', true );
$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('medium') : 'medium';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-teammember sigma-teammember-wrapper sigma-team-style-2'); ?>>

	<div class="sigma-teammember-image-container">
		<?php
		if (has_post_thumbnail()) {
			the_post_thumbnail( $thumb_size );
		}
		?>
	</div>

	<div class="sigma-teammember-content-cover">
		<h5 class="sigma_post-title teammember-title">
			<a href="<?php echo esc_attr( get_post_permalink() ); ?>" class="teammember-title-link"><?php echo get_the_title(); ?></a>
		</h5>
		<?php if ( isset( $team_details[ 'sigma_teammember_designation' ] ) && $team_details[ 'sigma_teammember_designation' ] ) { ?>
			<span class="sigma-teammember-designation"><?php echo esc_html( $team_details[ 'sigma_teammember_designation' ] ); ?></span>
		<?php } ?>

    <?php if(function_exists('gautama_custom_excerpt')){ ?>
		<p> <?php echo gautama_custom_excerpt(20); ?> </p>
    <?php } ?>

		<?php if ( ( isset( $team_details[ 'sigma_teammember_socials_icon' ] ) && $team_details[ 'sigma_teammember_socials_icon' ] ) && ( isset( $team_details[ 'sigma_teammember_socials_total' ] ) && $team_details[ 'sigma_teammember_socials_total' ] ) ) { ?>
			<ul class="sigma-teammember-social-profiles">
				<?php
				for ( $i = 0; $team_details[ 'sigma_teammember_socials_total' ] > $i; $i++ ) {
					if ( isset( $team_details[ 'sigma_teammember_socials_link' ][$i] ) && isset( $team_details[ 'sigma_teammember_socials_icon' ][$i] ) ) {
						?>
						<li class="sigma-teammember-social-profile">
							<a href="<?php echo esc_url( $team_details[ 'sigma_teammember_socials_link' ][$i] ); ?>" target="_self">
								<i class="<?php echo esc_attr( $team_details[ 'sigma_teammember_socials_icon' ][$i] ); ?>"></i>
							</a>
						</li>
						<?php
					}
				}
				?>
			</ul>
		<?php } ?>
	</div>

</article>
