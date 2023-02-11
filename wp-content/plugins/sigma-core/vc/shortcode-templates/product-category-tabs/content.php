<?php
/**
 * Product Category shortcode template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $sigma_shortcodes;
$atts = $sigma_shortcodes[ 'sigma_product_category_tabs' ][ 'atts' ];

$i = $j = 0;
$items = vc_param_group_parse_atts( $atts[ 'product_category_tabs' ] );

?>

<?php if( (isset($atts['section_title']) && !empty($atts['section_title'])) || $items ){ ?>
<div class="section-heading">
  <div class="row align-items-center">

		<?php if(isset($atts['section_title']) && !empty($atts['section_title'])){ ?>
      <div class="col-lg-6">
        <div class="section-title text-lg-left text-center">
          <?php if($atts['section_sub_title']){ ?>
  				<span class="title-tag"><?php echo esc_html($atts['section_sub_title']); ?></span>
  				<?php } ?>
          <h2><?php echo esc_html($atts['section_title']); ?></h2>
        </div>
      </div>
    <?php } ?>

    <?php if ( $items ) { ?>
    <div class="col-lg-6">
      <ul class="nav nav-pills justify-content-center justify-content-lg-end" id="products-tab-<?php echo mt_rand() ?>" role="tablist">
        <?php
        foreach( $items as $item ){
          $term = get_term_by('slug', $item['select_category'], 'product_cat');
      		$product_cat_slug = str_replace(' ', '-', $item['select_category']);

          if(!isset(get_term_link($term->term_id, 'product_cat')->errors) && isset($term->term_id)){
          ?>
          <li class="nav-item">
            <a class="nav-link <?php echo $i == 0 ? esc_attr('active') : '' ?>" id="<?php echo esc_attr($product_cat_slug) ?>-tab" data-toggle="pill" href="#<?php echo esc_attr($product_cat_slug) ?>">
              <?php echo esc_html($term->name) ?>
            </a>
          </li>
        <?php } $i++; } ?>
      </ul>
    </div>
    <?php } ?>

  </div>
</div>
<?php } ?>

<?php if ( $items ) { ?>
  <div class="tab-content mt-65" id="products-tabContent-<?php echo mt_rand() ?>">
	<?php
  foreach( $items as $item ){
    $term = get_term_by('slug', $item['select_category'], 'product_cat');
		$product_cat_slug = str_replace(' ', '-', $item['select_category']);

		if ( $item[ 'icon_type' ] ) {
			$icon_type = 'icon_' . $item[ 'icon_type' ];
			vc_icon_element_fonts_enqueue( $item[ 'icon_type' ] );
			if ( isset( $item[ $icon_type ] ) && $item[ $icon_type ] ) {
				$cat_icon = $item[ $icon_type ];
			}
		}

    if(!isset(get_term_link($term->term_id, 'product_cat')->errors) && isset($term->term_id)){

      $args = array(
        'ignore_sticky_posts' => 1,
        'post_type' => 'product',
        'posts_per_page' => 4,
        'tax_query' => array(
          array (
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $item['select_category']
          ),
        ),
      );
      $post_query = new WP_Query( $args );

    ?>

    <div class="tab-pane fade <?php echo $j == 0 ? esc_attr('show active') : '' ?>" id="<?php echo esc_attr($product_cat_slug) ?>" role="tabpanel">
      <?php
      if ( $post_query->have_posts() ) :
        $k = 0;
        ?>
        <div class="row">
        <?php
        while ( $post_query->have_posts() ) :
          $post_query->the_post();
					$first_term = function_exists('gautama_get_first_term') ? gautama_get_first_term( get_the_id(), 'product_cat' ) : '';
          ?>

          <?php if($k == 0){ ?>
					<div class="col-lg-8">
            <div class="row">
  						<div class="col-12">
                <div class="sigma_tabs-box extra-wide">
                  <div class="sigma_tabs-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_id(), 'large' ) ?>);"></div>
                  <div class="sigma_tabs-content">
    								<span class="sigma_tabs-count">
											<?php if($cat_icon){ ?>
												<i class="<?php echo esc_attr( $cat_icon ); ?>"></i>
											<?php } ?>
											<?php  echo esc_html($term->name) ?>
										</span>
    								<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
    							</div>
                  <a href="<?php echo get_the_permalink(); ?>" class="sigma_tabs-link"><i class="fal fa-arrow-right"></i></a>
  							</div>
  						</div>
          <?php } ?>
          <?php if($k == 1 || $k == 2){ ?>
						<div class="col-lg-6 col-sm-6">
              <div class="sigma_tabs-box">
                <div class="sigma_tabs-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_id(), 'large' ) ?>);"></div>
                <div class="sigma_tabs-content">
									<span class="sigma_tabs-count">
										<?php if($cat_icon){ ?>
											<i class="<?php echo esc_attr( $cat_icon ); ?>"></i>
										<?php } ?>
										<?php  echo esc_html($term->name) ?>
									</span>
  								<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
  							</div>
                <a href="<?php echo get_the_permalink(); ?>" class="sigma_tabs-link"><i class="fal fa-arrow-right"></i></a>
							</div>
						</div>
          <?php } ?>

          <?php if($k == 2){ ?>
            </div>
					</div>
          <?php } ?>

          <?php if($k == 3){ ?>
					<div class="col-lg-4">
            <div class="sigma_tabs-box extra-height">
							<div class="sigma_tabs-bg" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_id(), 'large' ) ?>);"></div>
							<div class="sigma_tabs-content">
								<span class="sigma_tabs-count">
									<?php if($cat_icon){ ?>
										<i class="<?php echo esc_attr( $cat_icon ); ?>"></i>
									<?php } ?>
									<?php  echo esc_html($term->name) ?>
								</span>
								<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							</div>
							<a href="<?php echo get_the_permalink(); ?>" class="sigma_tabs-link"><i class="fal fa-arrow-right"></i></a>
						</div>
					</div>
          <?php } ?>

        <?php
          $k++;
        endwhile;
        ?>
        </div>
        <?php
        wp_reset_postdata();
      endif;
      ?>
    </div>

  <?php } $j++; } ?>
  </div>
<?php } ?>
