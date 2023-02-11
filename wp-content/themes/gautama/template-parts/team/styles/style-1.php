<?php
/**
 * Template part for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */

$team_details = get_post_meta( get_the_ID(), 'sigma_team_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-teammember sigma-teammember-wrapper sigma-team-style-1'); ?>>
	<div class="sigma-teammember-thumbnail-wrapper">
		<div class="sigma-teammember-image-container">
			<?php
			if (has_post_thumbnail()) {
				the_post_thumbnail( gautama_get_thumb_size('gautama-team'), array( 'class'	=>	'sigma-teammember-image' ) );
			}
			?>
			<?php
			if ( ( isset( $team_details[ 'sigma_teammember_socials_icon' ] ) && $team_details[ 'sigma_teammember_socials_icon' ] ) && ( isset( $team_details[ 'sigma_teammember_socials_total' ] ) && $team_details[ 'sigma_teammember_socials_total' ] ) ) {
				?>
				<div class="sigma-teammember-social-profiles-container">
					<ul class="sigma-teammember-social-profiles">
						<li class="sigma-teammember-social-profile share-main">
							<a href="#">
								<i class="fas fa-plus"></i>
							</a>
						</li>
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
				</div>
				<?php } ?>
		</div>
	</div>
	<div class="sigma-teammember-content-cover">
		<div class="sigma-teammember-title">
			<h5 class="sigma_post-title teammember-title">
				<a href="<?php echo esc_attr( get_post_permalink() ); ?>" class="teammember-title-link"><?php echo get_the_title(); ?></a>
			</h5>
		</div>
		<?php if ( isset( $team_details[ 'sigma_teammember_designation' ] ) && $team_details[ 'sigma_teammember_designation' ] ) { ?>
			<div class="sigma-teammember-designation-container">
				<h5 class="sigma-teammember-designation"><?php echo esc_html( $team_details[ 'sigma_teammember_designation' ] ); ?></h5>
			</div>
		<?php } ?>
	</div>
</article>
