<?php
/**
 * Template for displaying search form
 *
 * @package WordPress
 * @version 1.0.0
 */
?>

<form id="<?php echo esc_attr(uniqid( 'searchform-' )) ?>" class="search-form" action="<?php print esc_url( home_url( '/' ) ); ?>" method="get">
  <input type="search" placeholder="<?php echo esc_attr__('Search...', 'gautama') ?>" id="<?php echo esc_attr(uniqid( 'search-form-' )) ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" required>
  <button type="submit"><i class="far fa-search"></i></button>
  <input type="hidden" name="post_type" value="post" />
</form>
