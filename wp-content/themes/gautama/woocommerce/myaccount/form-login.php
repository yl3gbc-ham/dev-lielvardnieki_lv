<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
$form_title = gautama_get_option('form-title');
$form_desc = gautama_get_option('form-description');
do_action('woocommerce_before_customer_login_form'); ?>
<div class="row no-gutters overflow-auto" id="customer_login">
    <?php
    $form_bg_img = (gautama_get_option('my_account_page_image')) ? gautama_get_option('my_account_page_image')['url'] : '';
    if ($form_bg_img) {
        ?>
        <div class="col-lg-6">
            <div class="form-login-banner" <?php if(!empty($form_bg_img)) { ?> style="background-image: url(<?php echo esc_url($form_bg_img); ?>)" <?php } ?>>
								<div class="my-account-page-content">
									<?php if(!empty($form_title)) { ?>
										<h3><?php echo esc_html($form_title); ?></h3>
									<?php } if(!empty($form_desc)) { ?>
										<p><?php echo esc_html($form_desc); ?></p>
									<?php } ?>
								</div>
            </div>
        </div>
    <?php } ?>
    <div class="col-lg-6">
        <div class="login-form-section">
            <form class="woocommerce-form woocommerce-form-login login" method="post">
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
                           id="username" autocomplete="username" placeholder="<?php echo esc_attr__('Username', 'gautama'); ?>"
                           value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" placeholder="<?php echo esc_attr__('Password', 'gautama'); ?>"
                           id="password" autocomplete="current-password"/>
                </p>
                <?php do_action('woocommerce_login_form'); ?>
                <p class="form-row login-form-footer">
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme"
                               type="checkbox" id="rememberme" value="forever"/>
                        <span><?php esc_html_e('Remember me', 'gautama'); ?></span>
                    </label>
                    <span class="woocommerce-LostPassword lost_password">
                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Reset Password?', 'gautama'); ?></a>
                    </span>
                </p>
                <p class="form-row submit-row">
                    <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                    <button type="submit" class="woocommerce-button button sigma_btn-custom woocommerce-form-login__submit" name="login"
                            value="<?php esc_attr_e('Log in', 'gautama'); ?>"><?php esc_html_e('Log in', 'gautama'); ?></button>
                </p>
                <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
                    <p class="register-account-link"><?php esc_html_e("Don't have an Account", "gautama"); ?><a href="javascript:void(0)"
                          class="account-register-link"><?php esc_html_e('Create One', 'gautama'); ?></a></p>
                <?php endif; ?>
                <?php do_action('woocommerce_login_form_end'); ?>
            </form>
            <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
                <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >
                    <?php do_action('woocommerce_register_form_start'); ?>
                    <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                   name="username" placeholder="<?php echo esc_attr__('Username', 'gautama'); ?>"
                                   id="reg_username" autocomplete="username"
                                   value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                        </p>
                    <?php endif; ?>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email"
                               id="reg_email" autocomplete="email" placeholder="<?php echo esc_attr__('Email Address', 'gautama'); ?>"
                               value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                    </p>
                    <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
                                   name="password" placeholder="<?php echo esc_attr__('Password', 'gautama'); ?>"
                                   id="reg_password" autocomplete="new-password"/>
                        </p>
                    <?php else : ?>
                        <p><?php esc_html_e('A password will be sent to your email address.', 'gautama'); ?></p>
                    <?php endif; ?>
                    <?php do_action('woocommerce_register_form'); ?>
                    <p class="woocommerce-FormRow form-row submit-row">
                        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                        <button type="submit"
                                class="woocommerce-Button woocommerce-button button sigma_btn-custom woocommerce-form-register__submit"
                                name="register"
                                value="<?php esc_attr_e('Register', 'gautama'); ?>"><?php esc_html_e('Register', 'gautama'); ?></button>
                    </p>
                    <p class="login-account-block">
                        <?php esc_html_e('Have an account?', 'gautama'); ?><a href="javascript:void(0)"
                                                                           class="account-login-link"><?php esc_html_e('Sign In', 'gautama'); ?></a>
                    </p>
                    <?php do_action('woocommerce_register_form_end'); ?>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php do_action('woocommerce_after_customer_login_form'); ?>
