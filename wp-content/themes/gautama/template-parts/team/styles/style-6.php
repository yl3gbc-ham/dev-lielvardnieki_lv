<?php
/**
 * Template part for displaying team
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
$team_details = get_post_meta( get_the_ID(), 'sigma_team_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma-teammember sigma-teammember-wrapper sigma-team-style-6'); ?>>
  <?php
  if (has_post_thumbnail()) {
    the_post_thumbnail('gautama-team' );
  }
  ?>
  <div class="widget-about-author-body">
    <h5><?php the_title(); ?></h5>
    	<?php if ( isset( $team_details[ 'sigma_teammember_designation' ] ) && $team_details[ 'sigma_teammember_designation' ] ) { ?>
        <p><?php echo esc_html( $team_details[ 'sigma_teammember_designation' ] ); ?></p>
      <?php } ?>
      <?php
			if ( ( isset( $team_details[ 'sigma_teammember_socials_icon' ] ) && $team_details[ 'sigma_teammember_socials_icon' ] ) && ( isset( $team_details[ 'sigma_teammember_socials_total' ] ) && $team_details[ 'sigma_teammember_socials_total' ] ) ) {
				?>
          <ul class="sigma_sm">
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
