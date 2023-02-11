<div class="fof-page-container">

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<section class="section text-center error-404 not-found">

					<header class="page-header">

						<h1 class="page-title">
							<?php  echo !empty(gautama_get_option('fof_page_title')) ? esc_html(gautama_get_option('fof_page_title')) : esc_html__( '404', 'gautama' ); ?>
						</h1>

					</header><!-- .page-header -->
					<div class="page-content">
						<p>
							<?php  echo !empty(gautama_get_option('fof_page_description')) ? esc_html(gautama_get_option('fof_page_description')) : esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gautama' ); ?>
						</p>

						<?php get_search_form(); ?>

						<?php if ( gautama_get_option('fof_page_back_to_home') ) { ?>
							<a href="<?php echo esc_url( get_home_url(), 'gautama' ); ?>" class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-square" role="button"><?php esc_html_e( 'Back to Home', 'gautama' ); ?></a>
						<?php } ?>

					</div><!-- .page-content -->

				</section><!-- .error-404 -->

			</main><!-- #main -->

		</div>
	</div>

</div>
