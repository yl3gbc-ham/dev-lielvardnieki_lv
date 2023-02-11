<?php
/**
* Donations shortcode template file.
*
* @package sigma Core
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post;
$form = new Give_Donate_Form(get_the_ID());
$donate_id = $form->ID;
$gautama_earn = intval($form->get_earnings());
$gautama_goal = $form->get_goal() ? intval( $form->get_goal() ) : 0 ;
$progress = !empty( $gautama_goal ) ? round(($gautama_earn / $gautama_goal) * 100, 2) : 0;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sigma_donation sigma-donation-style-1 sigma-donation-wrapper'); ?>>
    <div class="sigma_donation sigma_post">
        <div class="donation-post-thumb">
            <?php if(function_exists('gautama_get_thumb_size')) { ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( gautama_get_thumb_size('blog') ) ?>
                </a>
            <?php } ?>
        </div>
        <div class="sigma_donation-progress">
            <div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr($progress); ?>%" aria-valuenow="<?php echo esc_attr($progress); ?>" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
        <div class="sigma_post-body">
            <div class="sigma_donation-amount">
                <div class="sigma_donation-amount-item">
                    <p><?php esc_html_e('Raised:', 'gautama'); ?></p>
                    <span><?php echo give_currency_filter($gautama_earn, $donate_id); ?></span>
                </div>
                <div class="sigma_donation-amount-item">
                    <p><?php esc_html_e('Goal:', 'gautama'); ?></p>
                    <span><?php echo give_currency_filter($gautama_goal, $donate_id); ?></span>
                </div>
            </div>
            <div class="sigma_post-desc text-center">
                <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>
                <p>
                    <?php
                        $give_form_content = get_post_meta(get_the_ID(), '_give_form_content', true);
                        echo gautama_custom_excerpt(20, $give_form_content);
                    ?>
                </p>
                <a class="sigma_btn-custom light" href="<?php the_permalink(); ?>"><?php esc_html_e('Donate Now', 'gautama'); ?></a>
            </div>
        </div>
    </div>
</article>
