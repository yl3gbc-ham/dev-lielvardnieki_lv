<?php
/**
 * Template part for displaying sermons items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
 $thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-blog') : 'gautama-blog';
 $sermons_details = get_post_meta( get_the_ID(), 'sigma_sermons_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-sermons sigma-sermons-style-1 sigma-sermons-wrapper'); ?>>
  <?php if(has_post_thumbnail()) { ?>
    <div class="sigma_post-thumb">
      <a href="<?php echo esc_url(get_the_permalink()); ?>">
        <?php the_post_thumbnail($thumb_size); ?>
      </a>
    </div>
  <?php } ?>
    <div class="sigma_post-body">
      <div class="sigma_post-desc">
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <ul class="sigma_sermon-meta">
          <li>
            <?php echo get_avatar(get_the_author_meta('email'), ''); ?>
            <?php esc_html_e('Message from', 'gautama'); ?>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="fw-600"><?php echo esc_html( get_the_author() ); ?></a>
          </li>
        </ul>
      </div>
      <ul class="sigma_sermon-icons">
        <?php if ( isset( $sermons_details[ 'sigma_sermons_audio_link' ] ) && $sermons_details[ 'sigma_sermons_audio_link' ] ) { ?>
          <li><a href="<?php echo esc_url($sermons_details[ 'sigma_sermons_audio_link' ]); ?>"><i class="far fa-music"></i></a></li>
        <?php } if ( isset( $sermons_details[ 'sigma_sermons_video_link' ] ) && $sermons_details[ 'sigma_sermons_video_link' ] ) { ?>
          <li> <a href="<?php echo esc_url($sermons_details[ 'sigma_sermons_video_link' ]); ?>" class="vertical-center"> <i class="fab fa-youtube"></i> </a> </li>
        <?php } if ( isset( $sermons_details[ 'sigma_sermons_doc_link' ] ) && $sermons_details[ 'sigma_sermons_doc_link' ] ) { ?>
          <li> <a href="<?php echo esc_url($sermons_details[ 'sigma_sermons_doc_link' ]); ?>" class="vertical-center"> <i class="fal fa-file-pdf"></i> </a> </li>
        <?php } if ( isset( $sermons_details[ 'sigma_sermons_share_link' ] ) && $sermons_details[ 'sigma_sermons_share_link' ] ) { ?>
          <li> <a href="<?php echo esc_url($sermons_details[ 'sigma_sermons_share_link' ]); ?>" class="vertical-center"> <i class="fal fa-share-alt"></i> </a> </li>
        <?php } ?>
      </ul>
    </div>
</article>
