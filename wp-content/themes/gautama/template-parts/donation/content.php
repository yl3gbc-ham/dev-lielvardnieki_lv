<?php
/**
 * Template part for displaying donation items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Poli
 */
if (!gautama_is_give_active()) {
    return;
}
$donation_style = gautama_get_option('donation-style', 'style-1');
$donation_columns = gautama_get_option('donation-columns', 'col-lg-6');
?>
<div class="<?php echo esc_attr($donation_columns) ?> col-sm-12">
    <?php get_template_part( 'template-parts/donation/styles/' . $donation_style ); ?>
</div>
