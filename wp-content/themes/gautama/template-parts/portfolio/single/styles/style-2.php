<?php
/**
 * Template part for displaying portfolio details.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$portfolio_details = get_post_meta( get_the_ID(), 'sigma_portfolio_details', true );
$portfolio_client_name = gautama_is_not_empty($portfolio_details, 'sigma_portfolio_client_name') ? $portfolio_details['sigma_portfolio_client_name'] : '';
$portfolio_year = gautama_is_not_empty($portfolio_details, 'sigma_portfolio_year') ? $portfolio_details['sigma_portfolio_year'] : '';
$portfolio_terms = get_the_terms( get_the_ID(), 'portfolio-category' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sigma-portfolio-details portfolio-detail-style-2' ); ?>>
		<div class="sigma-portfolio-thumbnail">
			<?php if(has_post_thumbnail()){ ?>
				<div class="sigma_post-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php } ?>
			<div class="sigma-portfolio-details-container">
			<div class="sigma-portfolio-details">
				<?php if ( $portfolio_client_name) { ?>
					<div class="sigma-portfolio-detail sigma-portfolio-client-name">
						<div class="sigma-portfolio-detail-title"><?php echo esc_html__( 'Client Name', 'gautama' ); ?></div>
						<div class="sigma-portfolio-detail-value"><?php echo esc_html( $portfolio_details['sigma_portfolio_client_name'] ); ?></div>
					</div>
				<?php } ?>
				<?php if ( $portfolio_terms ) { ?>
						<?php
						$terms_data = array();
						foreach ( $portfolio_terms as $get_term ) {
							$terms_data[ $get_term->slug ] = $get_term->name;
						}
						?>
					<div class="sigma-portfolio-detail sigma-portfolio-category">
						<div class="sigma-portfolio-detail-title"><?php echo esc_html__( 'Categories', 'gautama' ); ?></div>
						<div class="sigma-portfolio-detail-value"><?php echo esc_html( implode( ',', $terms_data ) ); ?></div>
					</div>
					<?php } ?>
          <?php if ( $portfolio_year ) { ?>
            <div class="sigma-portfolio-detail sigma-portfolio-year">
              <div class="sigma-portfolio-detail-title"><?php echo esc_html__( 'Date', 'gautama' ); ?></div>
              <div class="sigma-portfolio-detail-value"><?php echo esc_html( $portfolio_details['sigma_portfolio_year'] ); ?></div>
            </div>
          <?php } ?>
			</div>
		</div>
		</div>
	<div class="sigma-portfolio-content">
		<?php the_content(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
