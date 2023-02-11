<?php
/**
 * Team shortcode style 4 template file.
 *
 * @package sigma Core
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post, $sigma_shortcodes;
$atts        = $sigma_shortcodes[ 'sigma_team' ][ 'atts' ];
$team_details = get_post_meta( get_the_ID(), 'sigma_team_details', true );
$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-team') : 'gautama-team';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-teammember sigma-teammember-wrapper sigma-team-style-4'); ?>>
          <?php if (has_post_thumbnail()) { ?>
            <div class="sigma_team-thumb">
              <?php the_post_thumbnail($thumb_size ); ?>
            </div>
          <?php } ?>
          <div class="sigma_team-body">
            <div class="sigma_team-info">
              <h5><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h5>
              <?php if ( isset( $team_details[ 'sigma_teammember_designation' ] ) && $team_details[ 'sigma_teammember_designation' ] ) { ?>
                <p><?php echo esc_html($team_details[ 'sigma_teammember_designation' ]); ?></p>
              <?php } ?>
              <?php if ( ( isset( $team_details[ 'sigma_teammember_socials_icon' ] ) && $team_details[ 'sigma_teammember_socials_icon' ] ) && ( isset( $team_details[ 'sigma_teammember_socials_total' ] ) && $team_details[ 'sigma_teammember_socials_total' ] ) ) { ?>
              <div class="sigma_team-sm">
                <ul class="sigma_sm">
                  <?php
          				for ( $i = 0; $team_details[ 'sigma_teammember_socials_total' ] > $i; $i++ ) {
          					if ( isset( $team_details[ 'sigma_teammember_socials_link' ][$i] ) && isset( $team_details[ 'sigma_teammember_socials_icon' ][$i] ) ) {
          						?>
                      <li> <a href="<?php echo esc_url( $team_details[ 'sigma_teammember_socials_link' ][$i] ); ?>" tabindex="0"> <i class="<?php echo esc_attr( $team_details[ 'sigma_teammember_socials_icon' ][$i] ); ?>"></i> </a> </li>
                    <?php } } ?>
                </ul>
              </div>
            <?php } ?>
            </div>
          </div>
</article>
