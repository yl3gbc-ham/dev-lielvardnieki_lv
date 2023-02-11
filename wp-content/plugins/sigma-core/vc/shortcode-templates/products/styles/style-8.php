<?php

/**
 * Products shortcode style 7 template file.
 *
 * @package sigma Core
 */
if (!defined('ABSPATH')) {
    exit;
}

global $post, $sigma_shortcodes;

$atts = $sigma_shortcodes['sigma_products']['atts'];

$product = wc_get_product($post->ID);
$id = $product->get_id();

$thumb_size = function_exists('gautama_get_thumb_size') ? gautama_get_thumb_size('gautama-product') : 'gautama-product';

?>

<div <?php wc_product_class($atts['style'] . ' sigma_product ', $product); ?>>

    <div class="sigma_product-inner">
        <?php
        if ($atts['show_sale_discount'] == 'yes') {
            woocommerce_show_product_loop_sale_flash();
        }
        if (function_exists('gautama_product_badges') && $atts['show_featured_badge'] == 'yes') {
            gautama_product_badges();
        }
        ?>
        <div class="sigma_product-thumb">
            <a href="<?php echo esc_url(get_the_permalink($id)) ?>">
                <?php echo $product->get_image($thumb_size) ?>
            </a>
            <?php
            echo '<div class="sigma_product-controls">';
            do_action('gautama/product/controls');
            echo '</div>';
            ?>
            <?php if($atts['show_atc'] == 'yes'){ ?>
                <div class="cart-hover">
                    <?php woocommerce_template_loop_add_to_cart(); ?>
                </div>
            <?php } ?>
        </div>
        <div class="sigma_product-body">
                <h5 class="sigma_product-title">
                    <a href="<?php echo esc_url(get_the_permalink($id)) ?>"> <?php echo esc_html($product->get_name()); ?> </a>
                </h5>
            <?php
            if ($atts['show_excerpt'] == 'yes' && function_exists('gautama_custom_excerpt')) {
                $excerpt_length = !empty($atts['excerpt_length']) ? $atts['excerpt_length'] : 10;
                ?>
                <p><?php echo esc_html(gautama_custom_excerpt($excerpt_length, $product->get_short_description())) ?></p>
            <?php } ?>
                <div class="sigma_product-body-meta">
                    <?php
                    if ($atts['show_rating'] == 'yes') {
                        woocommerce_template_loop_rating();
                    }
                    ?>
                    <?php if ($atts['show_price'] == 'yes') {
                        woocommerce_template_loop_price();
                    } ?>
                </div>
        </div>

    </div>

</div>
