<?php
/**
 * Template part for displaying event details.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$sermons_details = get_post_meta( get_the_ID(), 'sigma_sermons_details', true );
$sigma_sermons_audio_link = gautama_is_not_empty($sermons_details, 'sigma_sermons_audio_link') ? $sermons_details['sigma_sermons_audio_link'] : '';
$sigma_sermons_video_link = gautama_is_not_empty($sermons_details, 'sigma_sermons_video_link') ? $sermons_details['sigma_sermons_video_link'] : '';
$sigma_sermons_doc_link = gautama_is_not_empty($sermons_details, 'sigma_sermons_doc_link') ? $sermons_details['sigma_sermons_doc_link'] : '';
$sigma_sermons_share_link = gautama_is_not_empty($sermons_details, 'sigma_sermons_share_link') ? $sermons_details['sigma_sermons_share_link'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sigma-sermons-details' ); ?>>
		<div class="sigma-sermons-thumbnail">
			<?php if(has_post_thumbnail()){ ?>
				<div class="sigma_post-thumbnail">
					<?php the_post_thumbnail('full'); ?>
				</div>
			<?php } ?>
      <?php if($sigma_sermons_audio_link || $sigma_sermons_video_link || $sigma_sermons_doc_link || $sigma_sermons_share_link) { ?>
        <div class="sigma_post-single-thumb-icons">
          <ul>
            <?php if($sigma_sermons_audio_link) { ?>
              <li><a href="<?php echo esc_url($sigma_sermons_audio_link); ?>"><i class="far fa-music"></i></a></li>
            <?php } if($sigma_sermons_video_link) { ?>
              <li><a href="<?php echo esc_url($sigma_sermons_video_link); ?>"><i class="fab fa-youtube"></i></a></li>
            <?php } if($sigma_sermons_doc_link) { ?>
              <li><a href="<?php echo esc_url($sigma_sermons_doc_link); ?>"><i class="far fa-file-pdf"></i></a></li>
            <?php } if($sigma_sermons_share_link) { ?>
              <li><a href="<?php echo esc_url($sigma_sermons_share_link); ?>"><i class="far fa-share"></i></a></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>
		</div>
	<div class="sigma-sermons-content">
		<?php the_content(); ?>
	</div>
  <footer class="entry-footer">
	<?php
	if( function_exists('sigmacore_posts_share') ){
		sigmacore_posts_share();
	}
	?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
