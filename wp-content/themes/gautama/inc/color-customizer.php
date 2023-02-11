<?php
if ( ! function_exists( 'gautama_color_customize_classes' ) ) {
	/**
	 * Get color customizer classe
	 *
	 * @param  array $data contains the css values.
	 * @return string
	 */
	function gautama_custom_dynamic_style() {
		// Primary Color
		$primary_color = gautama_get_option('primary_color');
		if(!empty($primary_color)){
			$primary_color_dark = gautama_darken_color($primary_color, $darker = 1.2);
			$primary_color_rgba = gautama_hex_to_rgb($primary_color, $alpha = 0.2);
		}
		// Secondary Color
		$secondary_color = gautama_get_option('secondary_color');
		if(!empty($secondary_color)){
			$secondary_color_dark = gautama_darken_color($secondary_color, $darker = 1.2);
			$secondary_color_rgba = gautama_hex_to_rgb($secondary_color, $alpha = 0.2);
		}
		// Tertiary Color
		$tertiary_color = gautama_get_option('tertiary_color');
		if(!empty($secondary_color)){
			$tertiary_color_dark = gautama_darken_color($tertiary_color, $darker = 1.2);
			$tertiary_color_rgba = gautama_hex_to_rgb($tertiary_color, $alpha = 0.2);
		}
		// Typography
		$ch_title_typography    = gautama_get_option('custom_heading_title_typography');
		$ch_title_typography_ff = gautama_is_not_empty($ch_title_typography, 'font-family') ? $ch_title_typography['font-family'] : '';
		$ch_title_typography_fw = gautama_is_not_empty($ch_title_typography, 'font-weight') ? $ch_title_typography['font-weight'] : '';
		$ch_title_typography_ls = gautama_is_not_empty($ch_title_typography, 'letter-spacing') ? $ch_title_typography['letter-spacing'] : '';
		$ch_title_typography_lh = gautama_is_not_empty($ch_title_typography, 'line-height') ? $ch_title_typography['line-height'] : '';
		$ch_title_typography_fs = gautama_is_not_empty($ch_title_typography, 'font-size') ? $ch_title_typography['font-size'] : '';
		$ch_subtitle_typography 	 = gautama_get_option('custom_heading_subtitle_typography');
		$ch_subtitle_typography_ff = gautama_is_not_empty($ch_subtitle_typography, 'font-family') ? $ch_subtitle_typography['font-family'] : '';
		$ch_subtitle_typography_fw = gautama_is_not_empty($ch_subtitle_typography, 'font-weight') ? $ch_subtitle_typography['font-weight'] : '';
		$ch_subtitle_typography_ls = gautama_is_not_empty($ch_subtitle_typography, 'letter-spacing') ? $ch_subtitle_typography['letter-spacing'] : '';
		$ch_subtitle_typography_lh = gautama_is_not_empty($ch_subtitle_typography, 'line-height') ? $ch_subtitle_typography['line-height'] : '';
		$ch_subtitle_typography_fs = gautama_is_not_empty($ch_subtitle_typography, 'font-size') ? $ch_subtitle_typography['font-size'] : '';
		$body_typography		= gautama_get_option('body_typography');
		$body_typography_ff = gautama_is_not_empty($body_typography, 'font-family') ? $body_typography['font-family'] : '';
		$body_typography_fw = gautama_is_not_empty($body_typography, 'font-weight') ? $body_typography['font-weight'] : '';
		$body_typography_ls = gautama_is_not_empty($body_typography, 'letter-spacing') ? $body_typography['letter-spacing'] : '';
		$body_typography_lh = gautama_is_not_empty($body_typography, 'line-height') ? $body_typography['line-height'] : '';
		$body_typography_fs = gautama_is_not_empty($body_typography, 'font-size') ? $body_typography['font-size'] : '';
		$h1_typography		= gautama_get_option('h1_typography');
		$h1_typography_ff = gautama_is_not_empty($h1_typography, 'font-family') ? $h1_typography['font-family'] : '';
		$h1_typography_fw = gautama_is_not_empty($h1_typography, 'font-weight') ? $h1_typography['font-weight'] : '';
		$h1_typography_ls = gautama_is_not_empty($h1_typography, 'letter-spacing') ? $h1_typography['letter-spacing'] : '';
		$h1_typography_lh = gautama_is_not_empty($h1_typography, 'line-height') ? $h1_typography['line-height'] : '';
		$h1_typography_fs = gautama_is_not_empty($h1_typography, 'font-size') ? $h1_typography['font-size'] : '';
		$h2_typography		= gautama_get_option('h2_typography');
		$h2_typography_ff = gautama_is_not_empty($h2_typography, 'font-family') ? $h2_typography['font-family'] : '';
		$h2_typography_fw = gautama_is_not_empty($h2_typography, 'font-weight') ? $h2_typography['font-weight'] : '';
		$h2_typography_ls = gautama_is_not_empty($h2_typography, 'letter-spacing') ? $h2_typography['letter-spacing'] : '';
		$h2_typography_lh = gautama_is_not_empty($h2_typography, 'line-height') ? $h2_typography['line-height'] : '';
		$h2_typography_fs = gautama_is_not_empty($h2_typography, 'font-size') ? $h2_typography['font-size'] : '';
		$h3_typography		= gautama_get_option('h3_typography');
		$h3_typography_ff = gautama_is_not_empty($h3_typography, 'font-family') ? $h3_typography['font-family'] : '';
		$h3_typography_fw = gautama_is_not_empty($h3_typography, 'font-weight') ? $h3_typography['font-weight'] : '';
		$h3_typography_ls = gautama_is_not_empty($h3_typography, 'letter-spacing') ? $h3_typography['letter-spacing'] : '';
		$h3_typography_lh = gautama_is_not_empty($h3_typography, 'line-height') ? $h3_typography['line-height'] : '';
		$h3_typography_fs = gautama_is_not_empty($h3_typography, 'font-size') ? $h3_typography['font-size'] : '';
		$h4_typography		= gautama_get_option('h4_typography');
		$h4_typography_ff = gautama_is_not_empty($h4_typography, 'font-family') ? $h4_typography['font-family'] : '';
		$h4_typography_fw = gautama_is_not_empty($h4_typography, 'font-weight') ? $h4_typography['font-weight'] : '';
		$h4_typography_ls = gautama_is_not_empty($h4_typography, 'letter-spacing') ? $h4_typography['letter-spacing'] : '';
		$h4_typography_lh = gautama_is_not_empty($h4_typography, 'line-height') ? $h4_typography['line-height'] : '';
		$h4_typography_fs = gautama_is_not_empty($h4_typography, 'font-size') ? $h4_typography['font-size'] : '';
		$h5_typography		= gautama_get_option('h5_typography');
		$h5_typography_ff = gautama_is_not_empty($h5_typography, 'font-family') ? $h5_typography['font-family'] : '';
		$h5_typography_fw = gautama_is_not_empty($h5_typography, 'font-weight') ? $h5_typography['font-weight'] : '';
		$h5_typography_ls = gautama_is_not_empty($h5_typography, 'letter-spacing') ? $h5_typography['letter-spacing'] : '';
		$h5_typography_lh = gautama_is_not_empty($h5_typography, 'line-height') ? $h5_typography['line-height'] : '';
		$h5_typography_fs = gautama_is_not_empty($h5_typography, 'font-size') ? $h5_typography['font-size'] : '';
		$h6_typography		= gautama_get_option('h6_typography');
		$h6_typography_ff = gautama_is_not_empty($h6_typography, 'font-family') ? $h6_typography['font-family'] : '';
		$h6_typography_fw = gautama_is_not_empty($h6_typography, 'font-weight') ? $h6_typography['font-weight'] : '';
		$h6_typography_ls = gautama_is_not_empty($h6_typography, 'letter-spacing') ? $h6_typography['letter-spacing'] : '';
		$h6_typography_lh = gautama_is_not_empty($h6_typography, 'line-height') ? $h6_typography['line-height'] : '';
		$h6_typography_fs = gautama_is_not_empty($h6_typography, 'font-size') ? $h6_typography['font-size'] : '';
		$nav_1_typography		= gautama_get_option('nav_1_typography');
		$nav_1_typography_ff = gautama_is_not_empty($nav_1_typography, 'font-family') ? $nav_1_typography['font-family'] : '';
		$nav_1_typography_fw = gautama_is_not_empty($nav_1_typography, 'font-weight') ? $nav_1_typography['font-weight'] : '';
		$nav_1_typography_ls = gautama_is_not_empty($nav_1_typography, 'letter-spacing') ? $nav_1_typography['letter-spacing'] : '';
		$nav_1_typography_lh = gautama_is_not_empty($nav_1_typography, 'line-height') ? $nav_1_typography['line-height'] : '';
		$nav_1_typography_fs = gautama_is_not_empty($nav_1_typography, 'font-size') ? $nav_1_typography['font-size'] : '';
		$nav_2_typography		= gautama_get_option('nav_2_typography');
		$nav_2_typography_ff = gautama_is_not_empty($nav_2_typography, 'font-family') ? $nav_2_typography['font-family'] : '';
		$nav_2_typography_fw = gautama_is_not_empty($nav_2_typography, 'font-weight') ? $nav_2_typography['font-weight'] : '';
		$nav_2_typography_ls = gautama_is_not_empty($nav_2_typography, 'letter-spacing') ? $nav_2_typography['letter-spacing'] : '';
		$nav_2_typography_lh = gautama_is_not_empty($nav_2_typography, 'line-height') ? $nav_2_typography['line-height'] : '';
		$nav_2_typography_fs = gautama_is_not_empty($nav_2_typography, 'font-size') ? $nav_2_typography['font-size'] : '';
		$nav_top_typography		= gautama_get_option('nav_top_typography');
		$nav_top_typography_ff = gautama_is_not_empty($nav_top_typography, 'font-family') ? $nav_top_typography['font-family'] : '';
		$nav_top_typography_fw = gautama_is_not_empty($nav_top_typography, 'font-weight') ? $nav_top_typography['font-weight'] : '';
		$nav_top_typography_ls = gautama_is_not_empty($nav_top_typography, 'letter-spacing') ? $nav_top_typography['letter-spacing'] : '';
		$nav_top_typography_lh = gautama_is_not_empty($nav_top_typography, 'line-height') ? $nav_top_typography['line-height'] : '';
		$nav_top_typography_fs = gautama_is_not_empty($nav_top_typography, 'font-size') ? $nav_top_typography['font-size'] : '';
		$logo_text_typography		 = gautama_get_option('logo_text_typo');
		$logo_text_typography_ff = gautama_is_not_empty($logo_text_typography, 'font-family') ? $logo_text_typography['font-family'] : '';
		$logo_text_typography_fw = gautama_is_not_empty($logo_text_typography, 'font-weight') ? $logo_text_typography['font-weight'] : '';
		$logo_text_typography_ls = gautama_is_not_empty($logo_text_typography, 'letter-spacing') ? $logo_text_typography['letter-spacing'] : '';
		$logo_text_typography_lh = gautama_is_not_empty($logo_text_typography, 'line-height') ? $logo_text_typography['line-height'] : '';
		$logo_text_typography_fs = gautama_is_not_empty($logo_text_typography, 'font-size') ? $logo_text_typography['font-size'] : '';
		$logo_text_typography_clr = gautama_is_not_empty($logo_text_typography, 'color') ? $logo_text_typography['color'] : '';
		// Heading and body colors
		$body_color = gautama_get_option('body_color');
		$headings_color = gautama_get_option('headings_color');
		// Header
		$header_size = gautama_get_option( 'adjust-custom-header-width') ? gautama_get_option( 'header_content_size_custom' ) : '';
		$header_top_size = gautama_get_option( 'adjust-custom-header-top-width') ? gautama_get_option( 'header_top_content_size_custom' ) : '';
		$header_top_bg = gautama_get_option( 'header_top_bg' );
		$header_bottom_color = gautama_get_option( 'header_bottom_color' );
		$header_bottom_color_hover = gautama_get_option( 'header_bottom_color_hover' );
		$header_bottom_bg = gautama_get_option( 'header_bottom_bg' );
		$header_contact_bg = gautama_get_option( 'header_contact_bg' );
		$header_submenu_bg = gautama_get_option( 'header_submenu_bg' );
		$header_collpase_bg = gautama_get_option( 'header_collapse_bg_color' );
		$header_sticky_bg = gautama_get_option( 'header_sticky_bg' );
		$header_sticky_color = gautama_get_option( 'header_sticky_color' );
		$header_sticky_color_hover = gautama_get_option( 'header_sticky_color_hover' );
		$header_top_color = gautama_get_option( 'header_top_color' );
		$header_top_color_hover = gautama_get_option( 'header_top_color_hover' );
		$header_top_btn_color = gautama_get_option( 'header_top_btn_color' );
		$header_top_btn_bg = gautama_get_option( 'header_top_btn_bg' );
		// Footer
		$footer_top_bg = gautama_get_option( 'footer_top_bg' );
		$footer_middle_bg = gautama_get_option( 'footer_middle_bg' );
		$footer_bottom_bg = gautama_get_option( 'footer_bottom_bg' );
		// Logo size
		$header_logo_size = gautama_get_option('header_logo_size');
		$header_logo_size_sm = gautama_get_option('header_logo_size_sm');
		$header_logo_icon_bg = gautama_get_option('logo-icon-bg');
		// Content Size
		$is_custom = gautama_get_option( 'content_size', '1140' );
		$content_size = $is_custom != 'custom' ? gautama_get_option( 'content_size' ) : gautama_get_option( 'content_size_custom' );
		// Info Card
		$info_card_bg = gautama_get_option( 'info_card_bg' );
		$info_card_color = gautama_get_option( 'info_card_color' );
		// Subheader bg
		$subheader_bg_color = gautama_get_option('subheader_background_color');
		// Breadcrumb bg
		$breadcrumb_bg_color = gautama_get_option('breadcrumb_bg');
		// Back to top bg
		$back_to_top_bg = gautama_get_option('back_to_top_bg');
		$back_to_top_bg_hover = gautama_get_option('back_to_top_bg_hover');
		// Preloader bg
		$preloader_bg = gautama_get_option('preloader_bg');
		$preloader_color = gautama_get_option('preloader_color');
		ob_start();
		?>
		<?php if( !empty( $primary_color ) ){ ?>
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .entry-meta i, .sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .meta-comment i,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .post-meta-item i ,
			.sigma-team-style-1 h5.sigma-teammember-designation, .sigma-team-detail .sigma-teammember-designation,
			.sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content a:hover, .sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content .sigma-post-date i,
			.site-footer.footer-light .sigma-footer-widgets-wrapper a:hover, .input-group .icon, .site-footer.footer-light .sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content a:hover,
			.site-header.header-scheme-dark .site-header-top .social-info li a:hover, .site-header.header-scheme-dark .site-header-top-inner > a:hover,
			.site-header.header-scheme-dark .site-header-bottom-inner > ul > li > a:hover, .site-header.header-scheme-dark .site-header-top-inner > ul > li > a:hover,
			.site-header .site-header-top .social-info li a:hover, .site-header .site-header-top-inner > a:hover, .widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content a:hover,
			.site-header .site-header-bottom-inner > ul > li > a:hover, .site-header .site-header-top-inner > ul > li > a:hover, .site-header .site-header-bottom-inner > ul > li.current_page_item > a,
			.site-header .site-header-top-inner > ul > li.current_page_item > a, .site-header .site-header-bottom-inner > ul > li.current-menu-item > a,
			.site-header .site-header-top-inner > ul > li.current-menu-item > a, .sigma-footer-widgets-wrapper a:hover,
			.comment-respond p.comment-form-comment .icon, .comment-respond .sigma-comment-form-input-wrapper>p .icon,
			.custom-primary, .masonry-item .sigma-portfolio-content-cover h3.portfolio-title a:hover, .post-author-box .post-author-details>span,
			.related-posts .sigma-post .entry-title a:hover, .related-posts .sigma-blog-link, .breadcrumb,
			.breadcrumb a:hover, .site-logo-wrapper .logo-infocard, .site-logo-wrapper ul.social-info li a:hover,
			.woocommerce table.shop_table .product-name .product-name:hover, .woocommerce table.shop_table td.product-name a:hover,
			.woocommerce ul.product_list_widget li .sigma_product-widget-body del + ins, ul.product_list_widget li .sigma_product-widget-body del + ins,
			.woocommerce ul.product_list_widget li .sigma_product-widget-body a:hover, ul.product_list_widget li .sigma_product-widget-body a:hover,
			.woocommerce ul.cart_list li .cart-item-body a:hover, .woocommerce ul.product_list_widget li .cart-item-body a:hover, ul.cart_list li .cart-item-body a:hover,
			ul.product_list_widget li .cart-item-body a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li:not(.active) a:hover,
			.woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce .sigma_product-single-content .product_meta > span a:hover,
			.woocommerce #respond input#submit.added::after, .woocommerce a.button.added::after, .woocommerce button.button.added::after, .woocommerce input.button.added::after,
			.woocommerce #respond input#submit.loading::after, .woocommerce a.button.loading::after, .woocommerce button.button.loading::after,
			.woocommerce a.added_to_cart:hover, .woocommerce-LostPassword.lost_password a:hover, .woocommerce input.button.loading::after,
			.woocommerce-error a:hover, .woocommerce-info a:hover, .woocommerce-message a:hover, .woocommerce-message a:focus,
			.woocommerce a.added_to_cart:focus, .woocommerce-LostPassword.lost_password a:focus, .woocommerce-error a:focus, .woocommerce-info a:focus,
			.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,
			.woocommerce-page .woocommerce-error .button:hover, .woocommerce-page .woocommerce-info .button:hover, .woocommerce-page .woocommerce-message .button:hover,
			.woocommerce .woocommerce-error .button:focus, .woocommerce .woocommerce-info .button:focus, .woocommerce-page .woocommerce-message .button:focus,
			.woocommerce .woocommerce-message .button:focus, .woocommerce-page .woocommerce-error .button:focus, .woocommerce-page .woocommerce-info .button:focus,
			.testimonial-box .clinet-post, a, table th a, table tbody th a:visited,
			.post-navigation .nav-previous a span, .post-navigation .nav-next a span, .post-navigation a:hover,
			.sigma-subheader.style-2 .breadcrumb li a:hover, .sigma-subheader.style-3 .breadcrumb li a:hover,
			.slick-slider.shortcode_slider.arrows-style-3 .slick-arrow.slick-next:hover, .slick-slider.shortcode_slider.arrows-style-3 .slick-arrow:hover,
			.slick-slider.shortcode_slider.arrows-style-3 .slick-next.slick-arrow:hover:before, .is-style-outline .wp-block-button__link,
			.product-cat-style-3 .sigma_product-category a:hover .sigma_product-category-body h5, .sigma_post-filter.style-bordered .sigma_post-filter-item a.active h5,
			.sigma_post-filter.style-bordered .sigma_post-filter-item a.active i, .infobox-style-4 .cta-section .cta-inner .cta-features .single-feature:hover .icon,
			.sigma_header-cart-inner:hover .sigma_header-cart-content, .sigma_product.style-2 .sigma_product-body::before,
			.wpb-js-composer .vc_general.vc_tta-tabs.sigma-tour-border .vc_tta-tab.vc_active>a, .sigma_product.style-5 .sigma_product-thumb > .button:hover,
			.woocommerce div.product.sigma_product.style-5 p.price,.woocommerce div.product.sigma_product.style-5 span.price,
			.sigma-subheader.style-4 .breadcrumb li:last-child, .sigma-v-megamenu-menu-wrap > ul > li > a:hover, .sigma-subheader.style-4 .breadcrumb i,
			.site-header .header-controls.style-2 > div > a:hover, .site-header .contact-info .contact-item .contact-list span:last-child a:hover,
			.site-header .header-controls.style-2 > .panel-control:hover, .sigma-subheader.style-4 .breadcrumb-item+.breadcrumb-item::before,
			.wpb-js-composer .vc_general.vc_tta-tabs[class*="sigma-tour-"] .vc_tta-tab>a:hover, .woocommerce div.product.sigma_product.style-4 p.price,
			.woocommerce div.product.sigma_product.style-4 span.price, .sigma_product.style-3 .sigma_product-inner .sigma_product-body .sigma_product-link,
			.post-navigation .nav-previous a:hover:before, .post-navigation .nav-next a:hover:after, .sigma_product .sigma_product-controls a:hover,
			.widget.widget_rss .widget-title a::before, .widget.widget_rss ul li cite, .woocommerce div.products .sigma_product-category-inner h2 mark,
			 .sigma-service-icons li a, .sigma-post-wrapper .entry-title a:hover,
			.counter-style-1 .counter-box .icon i, .features-loop .feature-box .icon, .services-style-4 .single-service .service-link,
			.cta-section .cta-inner .cta-features .single-feature .icon,
			.counter-style-2 .counter-box.counter-box-two .icon, .sigma-post-wrapper .entry-meta-footer .entry-meta-container i,
			.sigma-list-wrapper ul li i,
			.sigma-post-wrapper .sigma-post-inner footer.entry-footer .post-read-more-link a:hover, .testimonial-box .sigma_testimonial-rating i,
			.select2-container--default .select2-selection--single .select2-selection__arrow b::before,
			.sigma_post_slider_wrapper .posts-content-wrap .post-content-box .icon, .sigma_post_slider_wrapper .posts-content-wrap .post-content-box .slider-count .current,
			.woocommerce .woocommerce-MyAccount-navigation ul li:not(.is-active) a:hover,
			#ctf .ctf-corner-logo, .widget.yith-woocompare-widget a.clear-all:hover,
			.portfolio-style-1 .sigma-portfolio-action-icons i:hover, .sigma-portfolio-style-1 .portfolio-title a:hover,
			.sigma-portfolio-style-1 .sigma-portfolio-category, .sigma-portfolio-style-1 .sigma-portfolio-action-icons i:hover, .sigma-team-style-2 .teammember-title a:hover,
			.sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .sigma-portfolio-category, .sigma-team-style-2 .sigma-teammember-designation,
			.services-style-4 .single-service i, .woocommerce .sigma_product .sigma_product-inner .sigma_product-controls .compare:hover,
			.sigma-custom-tabs ul.nav li a span.icon, .services-style-1 .sigma-service-content a, .sigma-contact-box-style2.contact-page-box a:hover,
			.sigma-contact-box-style2.contact-page-box .infobox-style-4 i, .call-to-action.cta-style-two.home-3 .custom-heading-style-1 .heading-subtitle,
			.sigma-post-style-4.has-post-thumbnail .sigma-post-inner footer.entry-footer .post-read-more-link a:hover,
			.sigma-post-style-4.has-post-thumbnail .sigma-post-wrapper .entry-title a:hover, .is-style-outline,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li a:hover,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li a:hover span,
			.comment-list .comment-body .edit-link a:hover,
			.sigma-custom-tabs ul.nav li a.active, ul.wp-block-categories li>a:hover, ul.wp-block-archives li>a:hover,
			.sigma-post-style-4.has-post-thumbnail .sigma-post-wrapper header .posted-on a:hover,
			.infobox-style-5 .sigma_icon-block.icon-block-3 .icon .icon-number,
			.infobox-style-6 .sigma_icon-block.icon-block-7 .icon i,
			.infobox-style-6 .sigma_icon-block.icon-block-7 .icon .icon-number,
			.sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner h5 a:hover,
			.counter-style-3.counter-light-layout .counter-box h4, .sigma-post-style-5 .sigma-post-wrapper .sigma_post_categories .categories-list a:before,
			.sigma-post-style-5 .sigma-post-inner .btn-link a:hover, .sigma-post-style-6 .sigma-post-wrapper .sigma_post_categories .categories-list a,
			.sigma_timeline-image i, .sigma_custom_heading_wrapper.custom-heading-style-6 .section-title .heading-subtitle,
			.testimonials-style-2 .testimonial-box .testimonial-footer .testimonial-footer-meta h5,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline, .sigma-post-style-5 .sigma-post-wrapper .sigma_post_categories .categories-list a:before,
			.sigma-post-style-5 .sigma-post-inner .btn-link a:hover, .sigma-post-style-6 .sigma-post-wrapper .sigma_post_categories .categories-list a,
			.post-details-style-2 .sigma-post-wrapper .sigma_post_categories .categories-list a, .sigma-post-wrapper .sigma-post-inner .entry-footer ul li span i,
			.post-details-style-2 .sigma-post-wrapper .entry-content ul.blog-list li:before,
			.post-pagination.style-2 .nav-links .page-numbers:not(.current):hover,
			.widget-area.sidebar.style-2 .widget.widget_sigma_recent_entries .sigma-post-content .sigma-post-date i,
			.widget-area.sidebar.style-2 .widget.widget_categories ul li a:hover + span,
			.widget-area.sidebar.style-2 .widget.widget_recent_portfolio ul li a:hover:after,
			.widget-area.sidebar.style-2 .widget.widget_recent_services ul li a:hover:after,
			.custom-footer-style .widget p.custom-primary,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-outline,
			.widget-area.sidebar.style-2 .widget.widget_recent_comments ul li a:hover,
			.widget-area.sidebar.style-2 .widget.widget_recent_rss ul li a:hover,
			.widget-area.sidebar.style-2 .widget ul li a:hover + span,
			.widget-area.sidebar.style-2 .widget.widget_rss ul li a:hover,
			.is-style-outline .wp-block-button__link, .entry-content .is-style-outline .wp-block-button__link:not(.has-color),
			.site-header .contact-info.style-5 .contact-item:hover a i,
			.site-header .contact-info.style-5 .contact-item:hover .contact-list span:last-child a,
			.sigma-event-style-2 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner h5 a:hover,
			.sigma-post-style-7 .sigma-post-wrapper .sigma_post_categories .categories-list a,
			.sigma-post.sigma-post-style-9 .sigma_post-body .sigma_post-meta .tag-list a:before,
			.sigma-post.sigma-post-style-9 .sigma_post-body .sigma_post-meta .tag-list a:hover,
			.sigma-post-style-10 .sigma-post-wrapper .sigma-post-inner .post-categories .categories-list a,
			.widget-area.sidebar.style-2 .widget.widget_recent_ministries ul li a:hover span,
			.widget-area.sidebar.style-2 .widget.widget_recent_event ul li a:hover span,
			.widget-area.sidebar.style-3 .widget.widget_recent_ministries ul li a:hover span,
			.widget-area.sidebar.style-3 .widget.widget_recent_event ul li a:hover span,
			.widget-area.sidebar.style-3 .widget.widget_sigma_recent_entries .sigma-post-content .sigma-post-date i,
			.widget-area.sidebar.style-3 .widget.widget_categories ul li a:hover + span,
			.widget-area.sidebar.style-3 .widget ul li a:hover + span,
			.widget-area.sidebar.style-3 .widget.widget_recent_comments ul li a:hover,
			.widget-area.sidebar.style-3 .widget.widget_rss ul li a:hover,
			.widget-area.sidebar.style-3 .widget.widget_recent_portfolio ul li a:hover:after,
			.widget-area.sidebar.style-3 .widget.widget_recent_services ul li a:hover:after,
      .sigma-donation-style-1 .sigma_donation .sigma_post-body .sigma_donation-amount .sigma_donation-amount-item span,
      .sigma_donation-title a:hover, .signa_donation-collection span,
      .signa_donation-collection p span,
      .give-goal-progress .income,
      [id*=give-form].give-fl-form .give-fl-has-focus label.give-fl-label,
      .give-donor__details .give-donor__total,
			.sigma_product.style-6.product span.price,
			.sigma_product.style-7 .sigma_product-body .sigma_product-body-meta .price,
			.sigma_product.style-7 .sigma_product-body .sigma_product-body-meta .price ins,
			.woocommerce .sigma-product-details.style-2 div.product .woocommerce-tabs ul.tabs li.active,
			.woocommerce .sigma-product-details.style-3 div.product .woocommerce-tabs ul.tabs li.active,
			.woocommerce .sigma-product-details.style-2 div.product .sigma_product-single-content p.price,
			.woocommerce .sigma-product-details.style-3 div.product .sigma_product-single-content p.price,
			.woocommerce.single-product .related.sigma_related-posts .title-tag,
			.featured-products-style-1 .product-block .product-descr .price,
			.woocommerce .woocommerce-MyAccount-navigation ul li:not(.is-active) a:hover,
			.register-account-link a:hover,
			.login-account-block a:hover,
			.widget-area.sidebar.style-3 .widget.widget_recent_comments ul li a:hover,
			body .vc_general.vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline,
			.sigma-event-style-1 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner h5 a:hover,
			.sigma_pricing_wrapper.pricing-style-2 .sigma_pricing-info .icon,
			.sigma_pricing_wrapper.pricing-style-2 .sigma_pricing-info .sigma_pricing-price .sigma_pricing-currency,
			.sigma_pricing_wrapper.pricing-style-2 .sigma_pricing-info .sigma_pricing-price span,
			.widget-area.sidebar .widget.widget_sigma_recent_sermons ul>li .sigma-sermons-content .sigma-sermons-date i,
			.widget-area.sidebar .widget.widget_sigma_recent_sermons ul>li .sigma-sermons-content a:hover,
			.counter-style-5 .counter-box .icon,
			.widget-area.sidebar.style-2 .widget.widget_recent_portfolio ul li a:hover span,
			.widget-area.sidebar.style-3 .widget.widget_recent_portfolio ul li a:hover span,
			.sigma-subheader.style-5 .breadcrumb li
			{
				color: <?php echo esc_attr($primary_color); ?>;
			}
			.sigma-btn-dark .vc_btn3-color-primary:after, .sigma-btn-dark .vc_btn3-color-primary:before, .sigma-btn-dark .vc_btn3-color-secondary:after,
			.sigma-btn-dark .vc_btn3-color-secondary:before, .theme-btn:after, .theme-btn:before, .sigma-btn-dark .vc_btn3-color-secondary,
			.theme-btn.btn-yellow, .sigma-btn-dark .vc_btn3-color-secondary:hover:after, .sigma-btn-dark .vc_btn3-color-secondary:hover:before,
			.theme-btn.btn-yellow:hover:after, .theme-btn.btn-yellow:hover:before, .sigma-btn-dark .vc_btn3-color-primary,
			.sigma-btn-dark .vc_btn3-color-primary:hover:after, .sigma-btn-dark .vc_btn3-color-primary:hover:before,
			.theme-btn.btn-white:after, .single-detail-page .page-service-list li i, .sigma-post-wrapper footer .sigma_post_tags .entry-meta-container>.tag-list a:hover,
			.theme-btn.btn-white:before, .rounded-frame:after, .widget-area.sidebar .widget.widget_sigma_social_share .social-icons li>a:hover,
			.sigma-portfolio-details .sigma-portfolio-content blockquote, .sigma-team-style-1 .sigma-teammember-social-profiles li.share-main:hover a,
			.sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .sigma-portfolio-category:before,
			.sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .portfolio-link:hover, .sigma-team-style-1 .sigma-teammember-social-profiles li:hover a,
			.call-to-action.cta-style-two.home-3 .custom-heading-style-1 .heading-subtitle:before, .call-to-action.cta-style-two.home-3 .cat-link,
			.call-to-action.cta-style-two.home-3 .need-cta-img:before, body .sigma-post-wrapper footer ul.social-share-icons a.icon-link:hover,
			body .vc_btn3.vc_btn3-color-white:hover, body .vc_btn3.vc_btn3-color-white.vc_btn3-style-flat:hover, .half-bg:before, .sigma-portfolio-style-1 .sigma-portfolio-action-icons i,
			body .vc_btn3.vc_btn3-color-tertiary:hover, body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat:hover, .video-link.home .popup-video, .video-link.home .popup-video::after,
			body .vc_btn3.vc_btn3-color-primary, body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat, .vc_btn3.vc_btn3-style-custom, .sigma-team-style-2 .sigma-teammember-social-profiles li a:hover,
			body .vc_general.vc_btn3, .sigma-contact-box-style1:after, footer .social-icon a:hover, footer .social-icons a:hover,
			.header-controls > div > a:hover, .header-controls > .panel-control:hover, .site-header.header-scheme-dark .contact-info .contact-item i,
			.site-header .contact-info .contact-item:hover i, .site-header .site-header-bottom-inner > ul ul.sub-menu li a:hover, .site-footer.site-footer-layout-2 .form-group button,
			.down-arrow-wrap a, .primary-bg, .slick-arrow:hover, .slick-slider.shortcode_slider .slick-arrow.slick-next, .arrow-style .slick-arrow:hover, .arrow-style .slick-arrow.slider-next,
			.slick-slider .slick-dots .slick-active button, .sigma-portfolio-detail-title:before, .sigma-teammember-link-profiles li a:hover, .sigma-teammember-detail-title:before,
			.woocommerce .yith-woocompare-widget a.button:hover, .yith-woocompare-widget a.button:hover, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order,
			.select_option_label.select_option.selected span, .woocommerce .widget_layered_nav ul.yith-wcan-label li.chosen a, .woocommerce-page .widget_layered_nav ul.yith-wcan-label li.chosen a,
			.woocommerce-mini-cart__buttons a.button.checkout:hover, .woocommerce-mini-cart__buttons a.button.checkout::before, .sigma-portfolio-style-1 .sigma-portfolio-category:before,
			.sigma_product-controls a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page .widget_layered_nav .yith-wcan-select-wrapper ul li.chosen a,
			.woocommerce .cart .button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
			.cart .button.alt, #respond input#submit, a.button, button.button, input.button, .woocommerce #respond input#submit.alt:focus, .pattern-wrap,
			.woocommerce a.button.alt:focus, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:focus, .woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .video-style-2 .video-text .video-link-two .popup-video,
			.select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[data-selected],
			.sigma_post_slider_wrapper .posts-slider-two .slick-arrow:hover, .sigma_post_slider_wrapper .posts-slider-two .slick-arrow.next-arrow,
			 .sigma-shortcode-wrapper .slick-arrow:hover,
			.sigma-post-wrapper blockquote, .preloader-name::before,
			.site-header .header-controls.style-2 > .panel-control:hover span, .sigma-v-megamenu > a, .product-cat-style-2 .sigma_product-category a button:hover,
			.product-cat-style-1 .sigma_product-category a i.icon, .product-cat-style-2 .sigma_product-category a:hover::before, .video-style-3 .video-wrap a:hover,
			.product-cat-style-5 .sigma_product-category a:hover::before, .sigma-post-style-4.has-post-thumbnail .sigma-post-inner footer.entry-footer .post-read-more-link a:hover::before,
			.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover,
			.woocommerce nav.woocommerce-pagination ul li span.current, .nav-links .page-numbers:hover, .nav-links .page-numbers.current, .sigma_header-cart .sigma_header-cart-content,
			input[type=checkbox]:checked, input[type=radio]:checked, button.sigma-search-button,
			button, html input[type=button], input[type=reset], input[type=submit], .widget h6.widget-title:before, .arrow-middle-right .owl-nav button:hover,
			.widget_calendar td#today:before, .wp-block-calendar td#today:before, .widget_tag_cloud a:hover, .arrow-on-hover .owl-nav button:hover,
			.testimonial-box .client-img .check, .testimonial-slider ul.slick-dots li.slick-active button, .call-to-action.cta-inner.vc_row:after,
			.services-style-1 .sigma-service-date, .services-style-2 .sigma-service-date i, .services-style-2.services-layout-single .single-service i,
			.portfolio-style-1 .sigma-portfolio-action-icons i, .services-style-3 .sigma-service-service-wrapper .service-title, .image-frame::after,
			 .wp-block-button__link,
			.sigma_progress_bar_wrapper .sigma-progress-bar-inner, .sigma-post-wrapper .sigma_post_categories .categories-list a, .wp-block-tag-cloud a:hover,
			.video-style-1 .video-wrap a.popup-video:hover, .video-style-2 .video-wrap a.popup-video.font:hover, .sigma_to-top, .sigma-portfolio-style-3 .sigma-portfolio-title .sigma-portfolio-category a:hover,
			.cta-section .cta-inner .cta-features .single-feature:hover .icon, .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a,
			 .sigma_post_slider_wrapper .posts-content-wrap .post-content-box .post-content-slider ul.slick-dots li.slick-active button,
			.cta-section .cta-inner .cta-text a.main-btn.btn-filled:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover,
			.sigma-product-details.style-2 .sigma_product-single-content .select_option_label.select_option span:hover, .sigma-product-details.style-2 .select_option_label.select_option.selected span,
			.sigma-custom-tabs ul.nav li a:hover span.icon, .sigma-service-icons li a:hover, .post.sticky .sigma-post-inner:after, .sigma-contact-info .wpcf7-submit,
			.sigma-custom-tabs ul.nav li a.active span.icon, .wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title>a:before,
			.infobox-style-5 .sigma_icon-block.icon-block-3 .icon i, .infobox-style-6 .sigma_icon-block.icon-block-7 .icon .icon-number:before,
			.sigma-service-style-1 .sigma_service.style-3 .sigma_service-thumb i, .sigma-service-style-1 .sigma_service.style-3 .sigma_service-body:hover .btn-link:before,
			.sigma-service-style-2 .sigma_service.style-1 .sigma_service-thumb i,
			.sigma-service-style-2 .sigma_service.style-1:hover,
			.sigma-service-style-1 .sigma_service.style-3 .sigma_service-thumb i,
			.sigma-service-style-1 .sigma_service.style-3 .sigma_service-body:hover .btn-link:before,
			.sigma-service-style-2 .sigma_service.style-1 .sigma_service-thumb i,
			.sigma-service-style-2 .sigma_service.style-1:hover,
			.sigma-team-style-5 .sigma_team-thumb .sigma_team-sm .sigma_sm li a:hover,
			.sigma-post-style-5 .sigma_post-thumb .sigma_post-date,
			.pricing-style-1 .sigma_pricing .sigma_pricing-price, .pricing-style-1 .sigma_pricing.hot-plan .list-style-none .sigma_btn-custom,
			.sigma_btn-custom, body .vc_toggle.vc_toggle_default.vc_toggle_active .vc_toggle_title .vc_toggle_icon:after,
			.sigma_timeline-nodes .sigma_timeline-content,
			.sigma_timeline-content::before,
			.sigma_custom_heading_wrapper.custom-heading-style-6  .section-title .heading-subtitle span:first-child,
			.sigma_custom_heading_wrapper.custom-heading-style-6  .section-title .heading-subtitle span:last-child,
			.sigma_custom_heading_wrapper.custom-heading-style-6 .section-title .heading-subtitle span:first-child:after,
			.sigma_custom_heading_wrapper.custom-heading-style-6 .section-title .heading-subtitle span:last-child:after,
			.sigma_post-filter .sigma_post-filter-item a.active, .sigma_post-filter .sigma_post-filter-item a:hover,
			.header-layout-6 .aside-trigger, .site-header .contact-info.style-4 .contact-item i, .header-layout-6 .site-logo-wrapper .sigma_custom-text-logo .logo-text-icon,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline:hover, .sigma-post-style-5 .sigma_post-thumb .sigma_post-date,
			.post-details-style-2 .sigma-post-wrapper footer .sigma_post_tags .entry-meta-container>.tag-list a:hover,
			.widget-area.sidebar.style-2 .widget_tag_cloud a:hover, .widget-area.sidebar.style-2 .widget .widget-title:after,
			.widget-area.sidebar.style-2 .widget .widget-title:before, .widget-area.sidebar.style-2 .widget.widget_categories ul li a + span,
			.widget-area.sidebar.style-2 .widget.widget_categories ul li a:hover,
			.widget-area.sidebar.style-2 .widget.widget_recent_portfolio ul li a:after,
			.widget-area.sidebar.style-2 .widget.widget_recent_services ul li a:after,
			.widget-area.sidebar.style-2 .widget.widget_recent_portfolio ul li a:hover,
			.widget-area.sidebar.style-2 .widget.widget_recent_services ul li a:hover,
			.sigma_btn-custom:hover, body .vc_btn3.vc_btn3-color-white:hover,
			body .vc_btn3.vc_btn3-color-white.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary:hover,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-primary,
			.vc_btn3.vc_btn3-style-custom,
			body .vc_general.vc_btn3, body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline:hover,
			body .vc_general.vc_btn3.vc_btn3-color-primary:hover,
			.video-style-4 .popup-video, .progress-bar-style-3 .sigma-progress-bar-inner span:first-child,
			.sigma-portfolio-details.portfolio-detail-style-2 .sigma-portfolio-details-container,
			.sigma_btn-custom, .sigma_btn-custom:hover, .widget-area.sidebar.style-2 .widget ul li a + span,
			.widget-area.sidebar.style-2 .widget ul li a:hover,
			.site-header.header-layout-7 .site-header-top-inner .header-cta-btn,
			.header-controls.style-3 > div,
			.sigma-portfolio-thumbnail .sigma_portfolio-details,
			.sigma-post.sigma-post-style-8 .sigma-post-body .sigma-post-body-inner .sigma_post-date,
			.sigma-post.sigma-post-style-9 .sigma_post-thumb .sigma_post-date,
			.sigma-post.sigma-post-style-9 .sigma_post-body .sigma-post-content:before,
			.sigma-ministries-style-1 .sigma_ministries.style-1 .sigma_ministries-thumb i,
			.sigma-ministries-style-1 .sigma_ministries.style-1 .sigma_ministries-body .btn-link:hover::before,
			.widget-area.sidebar.style-1 .widget.widget_sigma_ministries_cta ul li a,
			.widget-area.sidebar.style-2 .widget.widget_sigma_ministries_cta ul li a,
			.widget-area.sidebar.style-2 .widget.widget_recent_ministries ul li a span,
			.widget-area.sidebar.style-2 .widget.widget_recent_event ul li a span,
			.widget-area.sidebar.style-1 .widget.widget_sigma_event_cta ul li a,
			.widget-area.sidebar.style-2 .widget.widget_sigma_event_cta ul li a,
			.sigma-custom-image-style-2 .image-wrapper span,
			.sigma-team-style-6 .widget-about-author-body .sigma_sm li a:hover,
			.sigma-ministries-style-1 .sigma_ministries.style-1 .sigma_ministries-thumb i,
			.sigma-sermons-style-1 .sigma_post-body .sigma_sermon-icons li a:hover,
			.sigma-sermons-details .entry-footer .social-icon-share .social-share-icons li a:hover,
			.widget-area.sidebar.style-3 .widget.widget_sigma_ministries_cta ul li a,
			.widget-area.sidebar.style-3 .widget.widget_sigma_event_cta ul li a,
			.widget-area.sidebar.style-3 .widget.widget_recent_ministries ul li a span,
			.widget-area.sidebar.style-3 .widget.widget_recent_event ul li a span,
			.widget-area.sidebar.style-3 .widget.widget_categories ul li a + span,
			.widget-area.sidebar.style-3 .widget ul li a + span,
			.widget-area.sidebar.style-3 .widget.widget_categories ul li a:hover,
			.widget-area.sidebar.style-3 .widget ul li a:hover,
			.widget-area.sidebar.style-3 .widget.widget_recent_portfolio ul li a:after,
			.widget-area.sidebar.style-3 .widget.widget_recent_services ul li a:after,
			.widget-area.sidebar.style-3 .widget.widget_recent_portfolio ul li a:hover,
			.widget-area.sidebar.style-3 .widget.widget_recent_services ul li a:hover,
			.sigma-teammember.sigma-team-style-7:before,
			.infobox-style-7 .sigma_icon-block,
			.infobox-style-8 .icon-wrapper .icon,
      form[id*=give-form] #give-final-total-wrap .give-donation-total-label,
      form[id*=give-form] .give-donation-amount .give-currency-symbol.give-currency-position-before,
      .sigma-donation-style-1 .sigma_donation-progress .progress-bar,
      .sigma_donation .progress .progress-bar,
      .sigma_donation .progress .progress-bar span,
      .sigma_donation  a.sigma_donation-btn,
      .give-btn, .sigma_donation .donation-post-thumb .give-form-cat,
      .give-progress-bar>span,
      .give-donation-submit .give-submit-button-wrap,
      .widget.widget_give_forms_widget [id*=give-form].give-display-modal .give-btn,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls a:hover,
			.woocommerce .sigma_product.style-6 .sigma_product-inner .sigma_product-controls .compare:hover,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .product_type_simple.loading:hover:after,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .product_type_variable.loading:hover:after,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .product_type_external.loading:hover:after,
			.woocommerce .sigma_product.style-6 .sigma_product-inner .sigma_product-controls .compare.loading:hover:after,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .product_type_grouped.loading:hover:after,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .product_type_simple.added:hover:after,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .product_type_variable.added:hover:after,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .product_type_external.added:hover:after,
			.woocommerce .sigma_product.style-6 .sigma_product-inner .sigma_product-controls .compare.added:hover:after,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls .product_type_grouped.added:hover:after,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a:hover,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a:hover,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare:hover,
			.sigma_product-badge.featured,
			.sigma-product-details.style-2 .select_option_label.select_option.selected span,
			.sigma-product-details.style-2 .sigma_product-single-content .select_option_label.select_option span:hover,
			.sigma-product-details.style-3 .select_option_label.select_option.selected span,
			.sigma-product-details.style-3 .sigma_product-single-content .select_option_label.select_option span:hover,
			.woocommerce div.product .product-share-wrapper .product_details_meta .social-icon-share .social-share-icons li a:hover,
			.woocommerce div.product .product-share-wrapper .product_details_meta .product_meta_controls .yith-wcwl-add-to-wishlist a:hover,
			.woocommerce div.product .product-share-wrapper .product_details_meta .product_meta_controls .compare:hover,
			.woocommerce .sigma-product-details.style-3 div.product .woocommerce-tabs ul.tabs li.active a,
			.woocommerce .sigma-product-details.style-3 div.product form.cart div.quantity .qty span:hover,
			.woocommerce .woocommerce-MyAccount-navigation ul li.is-active a,
			.woocommerce form .form-row.submit-row .woocommerce-form-login__submit:hover,
			.woocommerce form .form-row.submit-row .woocommerce-form-register__submit:hover,
			.sigma-custom-image-style-3 .image-wrapper .icon-blocks,
			.custom-heading-style-7.text-left .section-title .heading-title:before,
			.custom-heading-style-7.text-right .section-title .heading-title:before,
			.infobox-style-9 .sigma_icon-block.top .icon-wrapper,
			body .vc_general.vc_btn3.vc_btn3-style-flat.vc_btn3-color-primary:hover,
			body.woocommerce .button,
			body .woocommerce .button,
			body.woocommerce .cart .button.alt,
			body .button,
			body .woocommerce button.button,
			body.woocommerce #review_form #respond .form-submit input,
			body.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
			body.woocommerce a.button:hover,
			body.woocommerce .button:hover,
			body .woocommerce .button:hover,
			body.woocommerce .cart .button.alt:hover,
			body .button:hover,
			body .woocommerce button.button:hover,
			body.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
			body.woocommerce a.button:hover,
			.woocommerce #payment #place_order:hover,
			.woocommerce-page #payment #place_order:hover,
			.sigma_preloader, .woocommerce-MyAccount-content .button,
			.woocommerce-MyAccount-content .button:hover,
			body .woocommerce a.button:hover,
			.widget-area.style-3 .widget h6.widget-title:after, .widget-area.style-3 .widget .widget-title:after,
			.widget-area.sidebar.style-1 .widget.widget_sigma_portfolio_cta ul li a,
			.widget-area.sidebar.style-2 .widget.widget_sigma_portfolio_cta ul li a,
			.widget-area.sidebar.style-3 .widget.widget_sigma_portfolio_cta ul li a,
			.widget-area.sidebar.style-2 .widget.widget_recent_portfolio ul li a span,
			.widget-area.sidebar.style-3 .widget.widget_recent_portfolio ul li a span,
			.sigma-portfolio-meta-details .sigma_portfolio-details,
			.sigma-ministries-style-2 .sigma_ministries.style-2 .sigma_ministries-body .sigma_ministries-thumb i,
			.sigma-ministries-style-2 .sigma_ministries.style-2:hover .sigma_ministries-body,
			.sigma-shortcode-wrapper .arrows-style-4 .slick-arrow:hover,
			.sigma-shortcode-wrapper .arrows-style-4 button.slick-arrow.slick-next:hover
			{
				background-color: <?php echo esc_attr($primary_color); ?>;
			}
      .give-progress-bar span {
      background: <?php echo esc_attr($primary_color); ?> !important;
      }
			.theme-btn.btn-white:hover, .product-cat-style-2 .sigma_product-category a button,
			.wpb-js-composer .vc_general.vc_tta-tabs.sigma-tour-border .vc_tta-tab.vc_active>a,
			.sigma-btn-dark .vc_btn3-color-secondary, .theme-btn.btn-yellow, .sigma-btn-dark .vc_btn3-color-primary,
			.arrow-middle-right .owl-nav button:hover, .sigma-contact-info .wpcf7-submit,
			.product-cat-style-2 .sigma_product-category a button:hover, .sigma_post-filter.style-bordered .sigma_post-filter-item a.active,
			.sigma_post-filter.style-bordered .sigma_post-filter-item a:hover, .is-style-outline .wp-block-button__link,
			.woocommerce #review_form #respond textarea:focus, .site-header .site-header-bottom-inner > ul ul.sub-menu li a:hover,
			.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover,
			.woocommerce nav.woocommerce-pagination ul li span.current, .nav-links .page-numbers:hover, .nav-links .page-numbers.current,
			input:focus, select:focus, textarea:focus, .navigation-dots span, .post.sticky .sigma-post-inner,
			.services-style-1 .sigma-service-image-container:before, .services-style-1 .sigma-service-content-cover:before,
			.portfolio-style-1 .h-one, .portfolio-style-1 .h-two, .portfolio-style-1 .h-three, .portfolio-style-1 .h-four,
			.cta-section .cta-inner .cta-text a.main-btn.btn-filled:hover, .services-style-4 .single-service:hover,
			.counter-style-4 .counter-box h4:before, .sigma-team-style-5 .sigma_team-thumb .sigma_team-sm .sigma_sm li a:hover,
			.pricing-style-1 .sigma_pricing.hot-plan .list-style-none .sigma_btn-custom, .sigma-team-style-5 .sigma_team-thumb .sigma_team-sm .sigma_sm li a:hover,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline, body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline:hover,
			.post-details-style-2 .sigma-post-wrapper footer .sigma_post_tags .entry-meta-container>.tag-list a:hover,
			.widget-area.sidebar.style-2 .widget_tag_cloud a:hover,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-outline,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline:hover,
			.is-style-outline .wp-block-button__link, .entry-content .is-style-outline .wp-block-button__link:not(.has-color),
			.sigma-sermons-details .entry-footer .social-icon-share .social-share-icons li a:hover,
			.sigma_list_wrapper.list-style-2 .sigma-list-wrapper ul li i,
      #give-recurring-form .form-row input[type=email]:focus, #give-recurring-form .form-row input[type=password]:focus, #give-recurring-form .form-row input[type=tel]:focus, #give-recurring-form .form-row input[type=text]:focus,
      #give-recurring-form .form-row input[type=url]:focus, #give-recurring-form .form-row select:focus, #give-recurring-form .form-row textarea:focus, form.give-form .form-row input[type=email]:focus,
      form.give-form .form-row input[type=password]:focus, form.give-form .form-row input[type=tel]:focus, form.give-form .form-row input[type=text]:focus, form.give-form .form-row input[type=url]:focus,
      form.give-form .form-row select:focus, form.give-form .form-row textarea:focus, form[id*=give-form] .form-row input[type=email]:focus, form[id*=give-form] .form-row input[type=password]:focus,
      form[id*=give-form] .form-row input[type=tel]:focus, form[id*=give-form] .form-row input[type=text]:focus, form[id*=give-form] .form-row input[type=url]:focus,
      form[id*=give-form] .form-row select:focus, form[id*=give-form] .form-row textarea:focus,
      form[id*=give-form] #give-final-total-wrap .give-donation-total-label,
      form[id*=give-form] .give-donation-amount .give-currency-symbol.give-currency-position-before,
			.sigma_product.style-6 .sigma_product-thumb .sigma_product-controls a:hover,
			.woocommerce .sigma_product.style-6 .sigma_product-inner .sigma_product-controls .compare:hover,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a:hover,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a:hover,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare:hover,
			.woocommerce div.product .product-share-wrapper .product_details_meta .social-icon-share .social-share-icons li a:hover,
			.sigma-product-details.style-3 .sigma_product-single-content .select_option_label.select_option span:hover,
			.woocommerce .sigma-product-details.style-3 div.product form.cart .button,
			.sigma-product-details.style-3 .select_option_label.select_option.selected span
			{
				border-color: <?php echo esc_attr($primary_color); ?>;
			}
			.sigma_timeline-nodes::before{
				border-left-color: <?php echo esc_attr($primary_color); ?>;
			}
			.sigma-portfolio-details .sigma-portfolio-details-container,
            .sigma_donation .progress .progress-bar span,
			.services-style-1 .sigma-service-image-container:before{
				border-top-color: <?php echo esc_attr($primary_color); ?>;
			}
			.sigma-action-box a, .infobox-area:before,
			.sigma_booking-form form input[type="text"],
			.sigma_booking-form form select,
			.sigma_booking-form .select2-container--default .select2-selection--single{
				border-bottom-color: <?php echo esc_attr($primary_color); ?>;
			}
			.sigma-team-detail .sigma-teammember-details .sigma-teammember-detail svg{
				fill: <?php echo esc_attr($primary_color); ?>;
			}
			.sigma-sermons-style-1 .sigma_post-body .sigma_sermon-icons li a{
				background-color: <?php echo esc_attr($primary_color); ?>3b;
			}
			@media(max-width:767px){
				.call-to-action.cta-inner .cta-text {
					background-color: <?php echo esc_attr($primary_color); ?>;
				}
			}
			.down-arrow-wrap a:focus, .down-arrow-wrap a:hover, .sigma-v-megamenu > a:hover,
			button:hover, html input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover, button:focus,
			html input[type=button]:focus, input[type=reset]:focus, input[type=submit]:focus, .sigma_to-top:hover,
			.woocommerce .cart .button.alt:hover, .woocommerce .cart .button.alt:focus, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus,
			.woocommerce button.button:focus, .woocommerce input.button:focus, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
			.woocommerce button.button:hover, .woocommerce input.button:hover, .cart .button.alt:hover, .cart .button.alt:focus,
			#respond input#submit:focus, a.button:focus, button.button:focus, input.button:focus, #respond input#submit:hover, a.button:hover,
			button.button:hover, input.button:hover, .sigma-post-wrapper .sigma_post_categories .categories-list a:hover,
			.vc_btn3.vc_btn3-style-custom:hover, .is-style-outline a.wp-block-button__link:hover, .wp-block-button__link:hover,
			body .vc_general.vc_btn3:hover, body .vc_general.vc_btn3:focus,
			.sigma_btn-custom::before, .vc_btn3.vc_btn3-style-custom:hover,
			body .vc_general.vc_btn3:hover,
			body .vc_general.vc_btn3:focus, .vc_general.vc_btn3.vc_btn3-color-primary:before,
			body .vc_general.vc_btn3.vc_btn3-color-primary.vc_btn3-style-outline:hover:before,
			.sigma_btn-custom::before,
			.sigma-teammember.sigma-team-style-7 .sigma_sm li a,
      .give-donation-submit .give-submit-button-wrap:before,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare,
			.login-form-section, .infobox-style-9 .sigma_icon-block.top .sigma_icon-block-content,
			body.woocommerce .button:hover::before,
			body .woocommerce .button:hover::before,
			body.woocommerce .cart .button.alt:hover::before,
			body .button:hover::before,
			body .woocommerce button.button:hover::before,
			body.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover::before,
			body.woocommerce a.button:hover::before
			{
				background-color: <?php echo esc_attr($primary_color_dark); ?>;
			}
			.is-style-outline a.wp-block-button__link:hover,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls a,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a,
			.woocommerce .sigma_product.style-7 .sigma_product-thumb .sigma_product-controls .compare{
				border-color: <?php echo esc_attr($primary_color_dark); ?>;
			}
			h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus,
			h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
			a:hover, a:active, a:focus, .widget ul a:hover,
			.sigma-post-style-6 .sigma-post-wrapper .sigma_post_categories .categories-list a:hover,
			.yith-woocompare-widget ul.products-list li .title:hover,
			.sigma-post-style-5 .sigma-post-wrapper .sigma_post_categories .categories-list a:hover,
			.entry-content .is-style-outline .wp-block-button__link:not(.has-color):hover
			{
				color: <?php echo esc_attr($primary_color_dark); ?>;
			}
			.vc_btn3.vc_btn3-style-custom, .down-arrow-wrap a,
			.sigma-shortcode-wrapper .slick-arrow:hover,
			.slick-arrow:hover, .arrow-style .slick-arrow:hover, .arrow-style .slick-arrow.slider-next,
			.sigma_post_slider_wrapper .posts-slider-two .slick-arrow:hover,
			.sigma_post_slider_wrapper .posts-slider-two .slick-arrow.next-arrow{
				-webkit-box-shadow: 0px 14px 24px 0px rgba(<?php echo esc_attr($primary_color_rgba['r']) ?>, <?php echo esc_attr($primary_color_rgba['g']) ?>, <?php echo esc_attr($primary_color_rgba['b']) ?>, 0.3);
		    box-shadow: 0px 14px 24px 0px rgba(<?php echo esc_attr($primary_color_rgba['r']) ?>, <?php echo esc_attr($primary_color_rgba['g']) ?>, <?php echo esc_attr($primary_color_rgba['b']) ?>, 0.3);
			}
		<?php } ?>
		<?php if( !empty( $secondary_color ) ){ ?>
			.site-header .contact-info .contact-item i,
			.sigma-custom-tabs ul.nav li a span.icon,
			ul.wp-block-latest-posts li span, ul.wp-block-categories li span, ul.wp-block-archives li span,
			.sigma-service-style-1 .sigma_service.style-3 .sigma_service-body:hover,
			.sigma-service-style-1 .sigma_service.style-3 .sigma_service-body:hover,
			.sigma-service-style-2 .sigma_service.style-1:hover .sigma_service-body .btn-link:before,
			.sigma-portfolio-style-5 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .sigma_btn-custom:before,
			.sigma-teammember.sigma-team-style-4:hover .sigma_team-body, .sigma-post-style-6 .sigma_post-thumb .sigma_post-date,
			.pricing-style-1 .sigma_pricing.hot-plan, .sigma_btn-custom.secondary,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline:hover, body .vc_general.vc_btn3.vc_btn3-color-secondary:not(.vc_btn3-style-outline),
			.sigma-post-style-6 .sigma_post-thumb .sigma_post-date,
			body .vc_btn3.vc_btn3-color-primary:hover,
			body .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-secondary,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-flat, body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline:hover,
			body .vc_general.vc_btn3.vc_btn3-color-secondary:not(.vc_btn3-style-outline),
			body .vc_general.vc_btn3.vc_btn3-color-secondary:hover,
			.vc_general.vc_btn3.vc_btn3-color-tertiary:before,
			body .vc_general.vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline:hover:before,
			body .vc_general.vc_btn3.vc_btn3-color-tertiary:hover:before,
			.sigma_btn-custom.light:before, .sigma_btn-custom.secondary,
			.site-header.header-layout-7 .sigma_header-controls,
			.sigma-event-style-2 .sigma_portfolio-item .sigma_portfolio-item-content .sigma_portfolio-item-content-inner .read-more-link:before,
			.sigma-post-style-7 .sigma_post-thumb .sigma_post-date,
			.sigma-post-style-7 .sigma-post-inner .sigma-post-footer .btn-link:before,
			.sigma-ministries-style-1 .sigma_ministries.style-1 .sigma_ministries-body .btn-link:before,
			.sigma-ministries-style-2 .sigma_ministries.style-2 .sigma_ministries-body .btn-link:before,
			.sigma-ministries-style-1 .sigma_ministries.style-1:hover .sigma_ministries-body,
			.widget-area.sidebar.style-1 .widget.widget_sigma_ministries_cta,
			.widget-area.sidebar.style-2 .widget.widget_sigma_ministries_cta,
			.widget-area.sidebar.style-1 .widget.widget_sigma_event_cta,
			.widget-area.sidebar.style-2 .widget.widget_sigma_event_cta,
			.sigma-sermons-details .sigma-sermons-thumbnail .sigma_post-single-thumb-icons ul li a:hover,
			.widget-area.sidebar.style-3 .widget.widget_sigma_ministries_cta,
			.widget-area.sidebar.style-3 .widget.widget_sigma_event_cta,
			.sigma_pricing_wrapper.pricing-style-2 .sigma_btn-custom.secondary.light:before,
			.infobox-style-7 .sigma_icon-block .sigma_icon-block-content .sigma_btn-custom:before,
      .sigma-donation-style-1 .sigma_donation .sigma_post-body .sigma_post-desc .sigma_btn-custom.light:before,
      .sigma_donation .progress, .sigma_donation a.sigma_donation-btn:hover,
      .sigma_donation a.sigma_donation-btn:focus,
      .give-btn:hover, .give-btn:focus,
			.sigma_product.style-8 .sigma_badge-sale,
			.product-of-month .product-descr .product_type_simple,
			.product-of-month .product-descr .product_type_variable,
			.product-of-month .product-descr .product_type_grouped,
			.product-of-month .product-descr .product_type_external,
			.sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover,
			.widget-area.sidebar.style-1 .widget.widget_sigma_portfolio_cta,
			.widget-area.sidebar.style-2 .widget.widget_sigma_portfolio_cta,
			.widget-area.sidebar.style-3 .widget.widget_sigma_portfolio_cta,
			.sigma-ministries-style-2 .sigma_ministries.style-2 .sigma_ministries-body .btn-link:hover::before
			{
				background-color: <?php echo esc_attr($secondary_color); ?>;
			}
			body .vc_btn3.vc_btn3-color-secondary:hover, body .vc_btn3.vc_btn3-color-secondary:focus, body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-flat:hover{
				background-color: <?php echo esc_attr($secondary_color); ?>ed;
			}
			.sigma-teammember.sigma-team-style-5:hover .sigma_team-body,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline,
			.woocommerce .sigma-product-details.style-3 div.product form.cart div.quantity .qty span,
			.woocommerce .sigma-product-details.style-3 div.product form.cart div.quantity .qty input
			{
				border-color: <?php echo esc_attr($secondary_color); ?>;
			}
			.sigma_btn-custom.secondary:hover{
				background-color: <?php echo esc_attr($secondary_color); ?>f2;
			}
			.sigma-custom-tabs ul.nav li a:hover span.icon,
			.sigma-service-style-1 .sigma_service.style-3 .sigma_service-body a.btn-link,
			.sigma-service-style-2 .sigma_service.style-1:hover .sigma_service-body .btn-link:before,
			.sigma-custom-tabs ul.nav li a.active span.icon,
			.sigma-service-style-1 .sigma_service.style-3 .sigma_service-body a.btn-link,
			.sigma-service-style-2 .sigma_service.style-1 .sigma_service-thumb i,
			.sigma-portfolio-style-4 .sigma_portfolio-item .sigma_portfolio-item-content a i,
			.counter-style-3.counter-light-layout .counter-box h5,
			.counter-style-4 .counter-box h4, .counter-style-4 .counter-box .sigma_content,
			.sigma-post-style-5 .sigma-post-wrapper .sigma_post_categories .categories-list a,
			.sigma-post-style-6 .sigma-post-inner .sigma-post-footer .btn-link,
			.btn-link, .sigma_btn-custom.light, .sigma_timeline-date span,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline,
			.sigma-post-style-5 .sigma-post-wrapper .sigma_post_categories .categories-list a,
			.sigma-post-style-6 .sigma-post-inner .sigma-post-footer .btn-link,
			.sigma-post-wrapper .sigma-post-inner .entry-footer ul li span,
			.post-details-style-2 .sigma-post-wrapper blockquote,
			.post-details-style-2 .sigma-post-wrapper blockquote p, .post-details-style-2 .sigma-post-wrapper blockquote::before,
			.post-details-style-2 .sigma-post-wrapper .entry-content ul.blog-list li,
			.post-details-style-2 .sigma-post-wrapper footer .sigma_post_tags .entry-meta-container>.tag-list a,
			.widget-area.sidebar.style-2 .widget_tag_cloud a,
			.post-pagination.style-2 .nav-links .page-numbers.current,
			.sidebar-cta .cta-content,
			body .vc_btn3.vc_btn3-color-white:hover,
			body .vc_btn3.vc_btn3-color-white.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary:hover,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-primary,
			.btn.btn-outline-light.footer-button:hover,
			.btn.btn-outline-light.footer-button:focus,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:hover,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:focus,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline,
			.sigma_btn-custom.light, .widget_archive ul li span,
			.sigma-post-style-7 .sigma-post-inner .sigma-post-footer .btn-link,
			.woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls a,
			.woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .yith-wcwl-add-to-wishlist a,
			.woocommerce .sigma_product.style-8 .sigma_product-thumb .sigma_product-controls .compare
			{
				color: <?php echo esc_attr($secondary_color); ?>;
			}
		<?php } ?>
		<?php if( !empty( $tertiary_color ) ){ ?>
			blockquote, .sigma-extend-right-bg .sigma-extend-right-col:after,
			.wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel-title>a:before,
			.wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel-title>a:before,
			.btn.btn-outline-light.footer-button:hover,
			.btn.btn-outline-light.footer-button:focus,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:hover,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:focus,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary,
			.product-cat-style-1 .sigma_product-category a:hover,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat, body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-outline:hover,
			.widget-area.sidebar.style-2 .widget.widget_search,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-outline:hover,
			body .vc_general.vc_btn3.vc_btn3-color-tertiary:hover,
			body .vc_general.vc_btn3.vc_btn3-color-tertiary:hover,
			.widget-area.sidebar.style-3 .widget.widget_categories ul li a,
			.widget-area.sidebar.style-3 .widget ul li a,
			.sigma-teammember.sigma-team-style-7
			{
				background-color: <?php echo esc_attr($tertiary_color); ?>;
			}
			.product-cat-style-1 .sigma_product-category a:hover,
			.pricing-style-1 .sigma_pricing,
			.pricing-style-1 .sigma_pricing:before,
			.sigma-post-style-5 .sigma-post-inner, .pricing-style-1 .sigma_pricing .list-style-none li i,
			.sigma_btn-custom.light, body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-outline,
			.sigma-post-style-5 .sigma-post-inner, .post-details-style-2 .sigma-post-wrapper footer ul.social-share-icons a.icon-link,
			.post-details-box.style-2 .comment-respond p.comment-form-comment textarea,
			.post-details-box.style-2 .comment-respond .sigma-comment-form-input-wrapper>p input,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-outline,
			.sigma_btn-custom.light
			{
				border-color: <?php echo esc_attr($tertiary_color); ?>;
			}
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-outline,
			body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-outline
			{
				color: <?php echo esc_attr($tertiary_color); ?>;
			}
			.pricing-style-1 .sigma_pricing .list-style-none{
				border-top-color: <?php echo esc_attr($tertiary_color); ?>;
			}
			body .vc_toggle.vc_toggle_default:not(:last-child), .sigma-post.sigma-post-style-6,
			.sigma-post.sigma-post-style-7
			{
				border-bottom-color: <?php echo esc_attr($tertiary_color); ?>;
			}
		<?php } ?>
		<?php if(!empty($header_logo_icon_bg)){ ?>
			.header-layout-6 .site-logo-wrapper .sigma_custom-text-logo .logo-text-icon{
				background-color: <?php echo esc_attr($header_logo_icon_bg); ?>;
			}
		<?php } ?>
		<?php if( !empty( $headings_color ) ){ ?>
			table th, table th a:hover, .page-links a, .page-links>span,
			.widget_tag_cloud a, .navigation .nav-links .nav-next a, .navigation .nav-links .nav-previous a, .wp-block-tag-cloud a,
			.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,
			.nav-links .page-numbers,	ul.wp-block-categories li span,
			 .infobox-dark  .features-loop .feature-box .count, .sigma-service-icons li a span,
			.sigma_post_slider_wrapper .posts-slider-two .slick-arrow, .woocommerce .woocommerce-error .button,
			.woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button, .woocommerce-page .woocommerce-error .button,
			.woocommerce-page .woocommerce-info .button, .woocommerce-page .woocommerce-message .button, .woocommerce-error,
			.woocommerce-info, .woocommerce-message, .sigma_product .sigma_badge-sale, .woocommerce a.added_to_cart,
			.woocommerce-LostPassword.lost_password a, .woocommerce-error a, .woocommerce-info a, sigma-contact-info .wpcf7-submit ,
			.woocommerce-message a, .woocommerce .woocommerce-product-rating .star-rating + .woocommerce-review-link:hover,
			.woocommerce .sigma_product-single-content .product_meta > span, .woocommerce .sigma_product-single-content .product_meta > span a,
			.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__author, .woocommerce ul.cart_list li .cart-item-body a,
			.woocommerce ul.product_list_widget li .cart-item-body a, ul.cart_list li .cart-item-body a, ul.product_list_widget li .cart-item-body a,
			.woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total, .widget_shopping_cart .total, .cart-dropdown .total,
			.woocommerce ul.product_list_widget li .sigma_product-widget-body a, ul.product_list_widget li .sigma_product-widget-body a,
			.woocommerce table.shop_table td.product-name .product-name, .woocommerce table.shop_table td.product-name a, .woocommerce a.button.show-title-form:hover,
			.woocommerce a.button.hide-title-form:hover, .widget.yith-woocompare-widget a.clear-all, .yith-woocompare-widget ul.products-list li .title,
			.woocommerce-privacy-policy-text p a, .entry-content .woocommerce-privacy-policy-text p a, .woocommerce-account .addresses .title .edit:hover,
			blockquote, blockquote p, h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, b, strong,
			.sigma-shortcode-wrapper .slick-arrow, .slick-arrow, .sigma-portfolio-detail-title, h5.sigma-teammember-designation, .sigma-teammember-detail-title,
			.sigma-teammember-link-profiles li a, .comment-list a.comment-reply-link, .related-posts .sigma-blog-link:hover, .breadcrumb a,
			.aside-collapse.mobile-aside .contact-info .contact-item .contact-list span:last-child, .aside-collapse.mobile-aside .contact-info .contact-item .contact-list span:last-child a,
			.site-header .site-header-bottom-inner > ul > li > a, .site-header .site-header-top-inner > ul > li > a, .site-header .site-header-top .social-info li a,
			.breadcrumb li, .site-header .contact-info .contact-item .contact-list span:last-child, .site-header .contact-info .contact-item .contact-list span:last-child a,
			.site-header .site-header-top-inner > a, .header-controls > div, .header-controls > div > a,
			.site-footer.footer-light .sigma-footer-widgets-wrapper .widget h6.widget-title, .wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel-title>a:before,
			.wpb-js-composer .sigma-accordion-style-1 .vc_tta.vc_general .vc_tta-panel-title>a:before,
			.arrow-on-hover .owl-nav button i, body .vc_btn3.vc_btn3-color-white:hover, body .vc_btn3.vc_btn3-color-white.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary:hover, body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-secondary:focus, body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-flat:hover, body .vc_btn3.vc_btn3-color-primary, .btn.btn-outline-light.footer-button:hover,
			.btn.btn-outline-light.footer-button:focus, body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:hover,
			body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary:focus, body .sigma-bg-color-secondary .vc_btn3.vc_btn3-color-primary.vc_btn3-style-flat:hover,
			body .vc_btn3.vc_btn3-color-tertiary, body .vc_btn3.vc_btn3-color-tertiary.vc_btn3-style-flat,
			.sigma-action-style1.sigma_custom_heading_wrapper .sigma-heading-title-wrapper .heading-title:before,
			.sigma-action-box a, .widget-area.sidebar .widget .btn-outline-light, .widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content a,
			.sigma-contact-info .wpcf7-submit:hover, .sigma-contact-info .wpcf7-submit:focus, .wp-block-latest-posts.wp-block-latest-posts__list a,
			body .sigma-post-wrapper footer ul.social-share-icons a.icon-link i:hover, .comment-list span.comment-author,
			.call-to-action.cta-style-two .custom-heading-style-1 .heading-subtitle, .sigma_product-stock-status span,
			.call-to-action.cta-inner .cta-text .custom-heading-style-1 .heading-subtitle, .product-cat-style-3 .sigma_product-category a .sigma_product-category-body i,
			.call-to-action.cta-inner .cat-link:hover, .call-to-action.cta-style-two .cat-link:hover, .video-link.home .popup-video,
			.sigma-portfolio-style-1 .portfolio-title a, .sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .portfolio-link,
			.sigma-team-style-1 .sigma-teammember-social-profiles li a, .sigma-team-style-1 .sigma-teammember-social-profiles li.share-main a,
			.sigma-btn-dark .vc_btn3-color-primary, .sigma-btn-dark .vc_btn3-color-secondary, .theme-btn, .sigma-btn-dark .vc_btn3-color-primary,
			.theme-btn.btn-white, .theme-btn.btn-white:hover, .sigma-team-detail .sigma-teammember-details .sigma-teammember-detail, .video-style-2 .video-text .video-link-two .popup-video,
			.single-detail-page .page-service-list li i, .sigma-post-wrapper .sigma-post-inner footer.entry-footer .post-read-more-link a,
			.sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner footer.entry-footer .sigma_post_author .author.vcard a:hover,
			.sigma-post-style-3 .sigma-post-wrapper .entry-meta-footer a:hover, .site-footer.footer-light .sigma-footer-widgets-wrapper .widget.widget_rss .widget-title a,
			.sigma-post-style-3 .sigma-post-wrapper header .posted-on a:hover, .sigma-custom-tabs ul.nav li a,
			.sigma-v-megamenu-menu-wrap > ul > .menu-item-has-children .sub-menu li a:hover, .wp-block-latest-posts.wp-block-latest-posts__list a:hover,
			.features-loop .feature-box.dark-box .count, .site-header .sigma_mega-menu-item ul.menu li a:hover,
			.sigma_booking-form label,
			.widget.widget_rss .widget-title a, .wp-calendar-table td, .wp-calendar-table th, .calendar_wrap caption,
			body .vc_btn3.vc_btn3-color-secondary.vc_btn3-style-outline, .post-details-style-2 .sigma-post-wrapper blockquote p,
			.post-details-style-2 .sigma-post-wrapper .entry-content ul.blog-list li,
			.sigma-post-style-7 .sigma-post-inner .sigma-post-footer .btn-link,
			.sigma-post.sigma-post-style-9 .sigma_post-body .sigma_post-meta .tag-list a,
			.sigma-post-style-10 .sigma-post-wrapper .sigma-post-inner .sigma-post-meta-footer li span,
			.sigma-teammember.sigma-team-style-7 .sigma_team-thumb .trigger-team-socials,
      #give-recurring-form h3.give-section-break, #give-recurring-form h4.give-section-break, #give-recurring-form legend, form.give-form h3.give-section-break,
      form.give-form h4.give-section-break, form.give-form legend, form[id*=give-form] h3.give-section-break, form[id*=give-form] h4.give-section-break, form[id*=give-form] legend,
			.woocommerce .sigma-product-details.style-2 .sigma_product-stock-status span,
			.woocommerce .sigma-product-details.style-2 div.product form.cart div.quantity .qty label,
			.woocommerce .sigma-product-details.style-2 div.product form.cart div.quantity .qty span,
			.woocommerce .sigma-product-details.style-2 div.product form.cart div.quantity .qty input,
			.woocommerce .sigma-product-details.style-3 div.product form.cart .variations label,
			.product-of-month .product-descr .price-block, .counter-style-5 .counter-box .counter-content-box .title
			{
				color: <?php echo esc_attr($headings_color); ?>;
			}
		<?php } ?>
		<?php if( !empty( $body_color ) ){ ?>
			body, p, .product-cat-style-3 .sigma_product-category a .sigma_product-category-body p, .widget ul a,
			.product-cat-style-4 .sigma_product-category a, .sigma-post-wrapper header .posted-on a,
			.comment-list .comment-body .edit-link a, .wp-block-latest-posts.wp-block-latest-posts__list .wp-block-latest-posts__post-date,
			.sigma-team-detail .sigma-teammember-details .sigma-teammember-detail-value{
				color: <?php echo esc_attr($body_color); ?>;
			}
			.sigma-post-style-4 .sigma-post-wrapper .sigma-post-inner footer.entry-footer .post-read-more-link a::before{
				background-color: <?php echo esc_attr($body_color); ?>;
			}
		<?php } ?>
		<?php if( !empty( $footer_top_bg ) ){ ?>
		footer .footer-top,
		.site-footer.site-footer-layout-2 .footer-top,
		.site-footer.site-footer-layout-3 .footer-top,
		.site-footer.footer-dark.site-footer.site-footer-layout-3 .footer-top,
		.site-footer.footer-dark.site-footer.site-footer-layout-2 .footer-top{
			background-color: <?php echo esc_attr( $footer_top_bg ); ?>
		}
		<?php } ?>
		<?php if( !empty( $footer_middle_bg ) ){ ?>
		.sigma-footer-widgets-wrapper{
			background-color: <?php echo esc_attr( $footer_middle_bg ); ?>
		}
		<?php } ?>
		<?php if( !empty( $footer_bottom_bg ) ){ ?>
		.sigma-copyright{
			background-color: <?php echo esc_attr( $footer_bottom_bg ); ?>
		}
		<?php } ?>
		<?php if ( ! empty( $subheader_bg_color ) ) { ?>
			<?php if(isset($subheader_bg_color['rgba']) && !empty($subheader_bg_color['rgba'])){ ?>
				.sigma-subheader:after{
					background-color: <?php echo esc_attr($subheader_bg_color['rgba']) ?>;
				}
			<?php } ?>
		<?php } ?>
		<?php if( !empty( $header_sticky_color ) ){ ?>
		.site-header.sticky .site-header-bottom .burger-icon span{
			background-color: <?php echo esc_attr( $header_sticky_color ); ?>
		}
		<?php } ?>
		<?php if( !empty( $header_sticky_color_hover ) ){ ?>
		.site-header.sticky .site-header-bottom .burger-icon:hover span{
			background-color: <?php echo esc_attr( $header_sticky_color_hover ); ?>
		}
		<?php } ?>
		<?php if( !empty( $header_top_color ) ){ ?>
		.site-header.header-layout-5 .site-header-top-inner .burger-icon span
		{
			background-color: <?php echo esc_attr( $header_top_color ); ?>;
		}
		.site-header.header-layout-7 .contact-info.style-5 .contact-item a i,
		.site-header.header-layout-7 .contact-info.style-5 .contact-item i,
		.site-header.header-layout-7 .contact-info.style-5 .contact-item .contact-list span:last-child,
		.site-header.header-layout-7 .contact-info.style-5 .contact-item .contact-list span:last-child a{
			color: <?php echo esc_attr( $header_top_color ); ?>;
		}
		<?php } ?>
		<?php if( !empty( $header_top_color_hover ) ){ ?>
		.site-header.header-layout-5 .site-header-top-inner .burger-icon:hover span
		{
			background-color: <?php echo esc_attr( $header_top_color_hover ); ?>;
		}
		.site-header.header-layout-7 .contact-info.style-5 .contact-item:hover a i,
		.site-header.header-layout-7 .contact-info.style-5 .contact-item:hover .contact-list span:last-child a{
			color: <?php echo esc_attr( $header_top_color_hover ); ?>;
		}
		<?php } ?>
		<?php if( !empty( $header_sticky_bg ) ){ ?>
		.site-header.sticky .site-header-bottom-inner,
		.site-header.sticky .site-header-bottom{
			background-color: <?php echo esc_attr( $header_sticky_bg ); ?>
		}
		<?php } ?>
		<?php if( !empty( $header_submenu_bg ) ){ ?>
		.sigma_mega-menu-wrapper,
		.site-header .site-header-bottom-inner > ul ul.sub-menu,
		.site-header .site-header-top-inner > ul ul.sub-menu{
			background-color: <?php echo esc_attr( $header_submenu_bg ); ?> !important;
		}
		<?php } ?>
		<?php if( !empty( $header_collpase_bg ) ){ ?>
		.header-layout-6 .aside-trigger,
		.header-layout-6 .sigma_header-controls,
		.header-layout-6 .aside-m-trigger{
			background-color: <?php echo esc_attr( $header_collpase_bg ); ?> !important;
		}
		<?php } ?>
		<?php if( !empty( $header_top_bg ) ){ ?>
		.site-header .site-header-top{
			background-color: <?php echo esc_attr( $header_top_bg ); ?>
		}
		<?php } ?>
		<?php if( !empty( $header_bottom_bg ) ){ ?>
		.site-header:not(.sticky) .site-header-bottom,
		.site-header:not(.sticky) .site-header-bottom-inner{
			background-color: <?php echo esc_attr( $header_bottom_bg ); ?>
		}
		<?php } ?>
		<?php if( !empty( $header_bottom_color ) ){ ?>
		.site-header-bottom-inner .burger-icon span{
			background-color: <?php echo esc_attr( $header_bottom_color ); ?>
		}
		.site-header.header-layout-6 .site-header-bottom-inner > ul > li > a, .header-controls > div > a,
		.site-header.header-layout-5 .site-header-bottom-inner > ul > li > a,
		.site-header.header-layout-4 .site-header-bottom-inner > ul > li > a,
		.site-header.header-layout-3 .site-header-bottom-inner > ul > li > a,
		.site-header.header-layout-2 .site-header-bottom-inner > ul > li > a,
		.site-header.header-layout-1 .site-header-bottom-inner > ul > li > a
		{
			color: <?php echo esc_attr( $header_bottom_color ); ?>
		}
		<?php } ?>
		<?php if(!empty($header_bottom_color_hover)) { ?>
					.site-header.header-layout-6 .site-header-bottom-inner > ul > li > a:hover, .header-controls > div > a:hover,
					.site-header.header-layout-5 .site-header-bottom-inner > ul > li > a:hover,
					.site-header.header-layout-4 .site-header-bottom-inner > ul > li > a:hover,
					.site-header.header-layout-3 .site-header-bottom-inner > ul > li > a:hover,
					.site-header.header-layout-2 .site-header-bottom-inner > ul > li > a:hover,
					.site-header.header-layout-1 .site-header-bottom-inner > ul > li > a:hover
					{
						color: <?php echo esc_attr( $header_bottom_color_hover ); ?>
					}
		<?php } ?>
		<?php if( !empty( $header_contact_bg ) ){ ?>
		.site-header .contact-info .contact-item i,
		.site-header .contact-info.style-4 .contact-item i{
			background-color: <?php echo esc_attr( $header_contact_bg ); ?>
		}
		.site-header:not(.can-sticky) .contact-info.style-2 .contact-item i{
			color: <?php echo esc_attr( $header_contact_bg ); ?>
		}
		<?php } ?>
		<?php if( !empty( $info_card_bg ) ){ ?>
		.site-logo-wrapper .logo-infocard{
			background-color: <?php echo esc_attr( $info_card_bg ); ?>
		}
		<?php } ?>
		<?php if( !empty( $info_card_color ) ){ ?>
		.site-logo-wrapper .logo-infocard p,
		.site-logo-wrapper .logo-infocard strong,
		.site-logo-wrapper .logo-infocard a,
		.site-logo-wrapper ul.social-info li a{
			color: <?php echo esc_attr( $info_card_color ); ?>
		}
		.site-logo-wrapper .logo-infocard .contact-item svg path{
			fill: <?php echo esc_attr( $info_card_color ); ?>
		}
		<?php } ?>
		<?php if( !empty( $content_size ) ){ ?>
		@media (min-width: 1200px){
			.container{
				max-width: <?php echo esc_attr( $content_size ); ?>px;
			}
		}
		<?php } ?>
		<?php if( !empty( $header_size ) ){ ?>
			@media (min-width: 1600px){
				.site-header .site-header-bottom > .container{
					max-width: <?php echo esc_attr( $header_size ); ?>px;
				}
			}
		<?php } ?>
		<?php if( !empty( $header_top_size ) ){ ?>
			@media (min-width: 1600px){
				.site-header .site-header-top > .container{
					max-width: <?php echo esc_attr( $header_top_size ); ?>px;
				}
			}
		<?php } ?>
		<?php if( !empty( $breadcrumb_bg_color ) ){ ?>
			.breadcrumb,
			.sigma-subheader.below-image + .breadcrumb-nav{
				background-color: <?php echo esc_attr( $breadcrumb_bg_color ); ?>
			}
		<?php } ?>
		<?php if( !empty( $back_to_top_bg ) ){ ?>
			.sigma_to-top{
				background-color: <?php echo esc_attr( $back_to_top_bg ); ?>
			}
		<?php } ?>
		<?php if( !empty( $back_to_top_bg_hover ) ){ ?>
			.sigma_to-top:hover{
				background-color: <?php echo esc_attr( $back_to_top_bg_hover ); ?>
			}
		<?php } ?>
		<?php if( !empty( $preloader_bg ) ){ ?>
			.sigma_preloader,
			.preloader-gear-inner > div div:nth-child(6){
				background-color: <?php echo esc_attr( $preloader_bg ); ?>
			}
		<?php } ?>
		<?php if( !empty( $preloader_color ) ){ ?>
			.sigma_preloader-default .sigma_preloader-inner i,
			.preloader-spinner-inner div, .preloader-gear-inner > div div,
			.preloader-pulse-inner div, .preloader-squares-inner div,
			.preloader-dual-inner div{
				background-color: <?php echo esc_attr( $preloader_color ); ?>
			}
			.preloader-name span{
				color: <?php echo esc_attr( $preloader_color ); ?>
			}
			.sigma_preloader-diamond svg path{
				fill: <?php echo esc_attr( $preloader_color ); ?>
			}
			.preloader-ripple-inner div{
				border-color: <?php echo esc_attr( $preloader_color ); ?>
			}
			.preloader-eclipse-inner div{
				box-shadow: 0 4px 0 0 <?php echo esc_attr( $preloader_color ); ?>
			}
		<?php } ?>
		/* Custom Title Typography */
		<?php if(!empty($ch_title_typography)){ ?>
		.sigma_custom_heading_wrapper .sigma-heading-title-wrapper .heading-title{
			<?php if( $ch_title_typography_ff ){ ?>
			font-family: <?php echo esc_attr($ch_title_typography_ff); ?>;
			<?php } ?>
			<?php if( $ch_title_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($ch_title_typography_fw); ?>;
			<?php } ?>
			<?php if( $ch_title_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($ch_title_typography_ls); ?>;
			<?php } ?>
			<?php if( $ch_title_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $ch_title_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $ch_title_typography_fs ){ ?>
			font-size: <?php echo esc_attr($ch_title_typography_fs); ?>;
			<?php } ?>
		}
		<?php if( $ch_title_typography_ff ){ ?>
			.counter-style-2 .counter-box.counter-box-two h4,
			.sigma-portfolio-detail-title, .sigma-post-wrapper header .posted-on,
			.sigma-post-wrapper blockquote, blockquote,
			.comment-list span.comment-author, .navigation .nav-links .nav-next a,
			.navigation .nav-links .nav-previous a, .wp-block-latest-posts.wp-block-latest-posts__list a,
			.woocommerce nav.woocommerce-pagination ul li a,
			.woocommerce nav.woocommerce-pagination ul li span,
			.nav-links .page-numbers, .wp-block-cover__inner-container p,
			.sigma-subheader .btg-text, .sigma-post-style-1 .sigma-post-wrapper .sigma-post-inner footer.entry-footer .sigma_post_author .author.vcard a,
			.site-header .contact-info .contact-item .contact-list span:last-child,
			.site-header .contact-info .contact-item .contact-list span:last-child a,
			.aside-collapse.mobile-aside .contact-info .contact-item .contact-list span:last-child,
			.aside-collapse.mobile-aside .contact-info .contact-item .contact-list span:last-child a,
			.sigma-footer-widgets-wrapper .widget_sigma_recent_entries .sigma-post-content a,
			.infobox-style-3 span.count, .sigma-contact-box-style1 a, .sigma-action-box .sigma-title,
			.sigma-action-box a, .widget-area.sidebar .widget.widget_sigma_recent_entries .sigma-post-content a,
			.sigma-contact-box-style2.contact-page-box a, .sigma-contact-info .wpcf7-submit,
			.video-link.home .popup-video, .sigma-portfolio-details .sigma-portfolio-details-container .sigma-portfolio-detail .sigma-portfolio-detail-title,
			.sigma-portfolio-details .sigma-portfolio-content blockquote, .sigma-portfolio-details .sigma-portfolio-content blockquote p>strong,
			.sigma-btn-dark .vc_btn3-color-primary, .sigma-btn-dark .vc_btn3-color-secondary, .theme-btn,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .entry-meta,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .entry-meta a,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .meta-comment,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .post-meta-item,
			.sigma-post-style-2 .sigma-post-wrapper .sigma-post-inner .entry-footer ul li .meta-comment span,
			.preloader-name span, .sigma_product .sigma_badge-sale, .sigma_product-badge.sigma_badge-soldout,
			.sigma_product-single-content .sigma_badge-sale, .woocommerce .sigma_product-single-content .product_meta > span,
			.woocommerce .woocommerce-product-rating .star-rating + .woocommerce-review-link,
			.sigma_product-stock-status span, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__author,
			.woocommerce ul.cart_list li .cart-item-body a, .woocommerce-account .addresses .title .edit,
			.woocommerce ul.product_list_widget li .cart-item-body a,
			ul.cart_list li .cart-item-body a, ul.product_list_widget li .cart-item-body a, .sigma_header-cart .woocommerce-mini-cart__total.total,
			.woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total, .widget_shopping_cart .total, .cart-dropdown .total,
			.woocommerce ul.product_list_widget li .sigma_product-widget-body a,
			ul.product_list_widget li .sigma_product-widget-body a, .woocommerce ul.cart_list li a,
			.woocommerce ul.product_list_widget li a, .woocommerce table.shop_table td.product-name .product-name,
			.woocommerce table.shop_table td.product-name a, .woocommerce a.button.show-title-form,
			.woocommerce a.button.hide-title-form, .yith-woocompare-widget ul.products-list li .title, .woocommerce .woocommerce-MyAccount-navigation ul li a{
				font-family: <?php echo esc_attr($ch_title_typography_ff); ?>;
			}
		<?php } ?>
		<?php } ?>
		/* Custom Subtitle Typography */
		<?php if(!empty($ch_subtitle_typography)){ ?>
		.sigma_custom_heading_wrapper .sigma-heading-subtitle-wrapper .heading-subtitle{
			<?php if( $ch_subtitle_typography_ff ){ ?>
			font-family: <?php echo esc_attr($ch_subtitle_typography_ff); ?>;
			<?php } ?>
			<?php if( $ch_subtitle_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($ch_subtitle_typography_fw); ?>;
			<?php } ?>
			<?php if( $ch_subtitle_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($ch_subtitle_typography_ls); ?>;
			<?php } ?>
			<?php if( $ch_subtitle_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $ch_subtitle_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $ch_subtitle_typography_fs ){ ?>
			font-size: <?php echo esc_attr($ch_subtitle_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* Body Typography */
		<?php if(!empty($body_typography)){ ?>
		body{
			<?php if( $body_typography_ff ){ ?>
			font-family: <?php echo esc_attr($body_typography_ff); ?>;
			<?php } ?>
			<?php if( $body_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($body_typography_fw); ?>;
			<?php } ?>
			<?php if( $body_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($body_typography_ls); ?>;
			<?php } ?>
			<?php if( $body_typography_lh ){ ?>
				line-height: <?php echo esc_attr( str_replace("px","", $body_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $body_typography_fs ){ ?>
			font-size: <?php echo esc_attr($body_typography_fs); ?>;
			<?php } ?>
		}
		<?php if( $body_typography_ff ){ ?>
		.sigma-post-wrapper header .posted-on a span,
		.sigma-post-wrapper blockquote cite,
		.sigma-post-wrapper blockquote cite strong,
		.comment-respond p.comment-form-comment textarea,
		.comment-respond .sigma-comment-form-input-wrapper>p input,
		.sigma-post-wrapper footer.entry-footer .social-icon-share h5,
		.sigma-portfolio-style-1 .sigma-portfolio-category,
		.sigma-portfolio-style-2 .sigma-portfolio-thumbnail-wrapper .sigma-portfolio-content-cover .sigma-portfolio-category,
		.sigma-portfolio-details .sigma-portfolio-content blockquote p>cite,
		.sigma-team-detail .sigma-teammember-designation,
		.sigma-post-style-3 .sigma-post-wrapper header .posted-on a,
		.sigma-post-wrapper header .posted-on a, .post-navigation .nav-previous a span,
		.sigma-post-wrapper .sigma_post_tags h5,
		.widget_tag_cloud a,
		.woocommerce .sigma_product-single-content .product_meta > span span,
		.woocommerce .sigma_product-single-content .product_meta > span a,
		.woocommerce .sigma-product-details.style-2 .woocommerce-product-rating .star-rating + .woocommerce-review-link,
		.woocommerce td.product-name .wc-item-meta .wc-item-meta-label,
		.woocommerce td.product-name .wc-item-meta dt,
		.woocommerce td.product-name dl.variation .wc-item-meta-label,
		.woocommerce td.product-name dl.variation dt,
		.woocommerce td.product-name .wc-item-meta dd,
		.woocommerce td.product-name dl.variation dd{
			font-family: <?php echo esc_attr($body_typography_ff); ?>;
		}
		<?php } ?>
		<?php } ?>
		/* h1 Typography */
		<?php if(!empty($h1_typography)){ ?>
		h1{
			<?php if( $h1_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h1_typography_ff); ?>;
			<?php } ?>
			<?php if( $h1_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h1_typography_fw); ?>;
			<?php } ?>
			<?php if( $h1_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h1_typography_ls); ?>;
			<?php } ?>
			<?php if( $h1_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $h1_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $h1_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h1_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* h2 Typography */
		<?php if(!empty($h2_typography)){ ?>
		h2{
			<?php if( $h2_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h2_typography_ff); ?>;
			<?php } ?>
			<?php if( $h2_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h2_typography_fw); ?>;
			<?php } ?>
			<?php if( $h2_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h2_typography_ls); ?>;
			<?php } ?>
			<?php if( $h2_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $h2_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $h2_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h2_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* h3 Typography */
		<?php if(!empty($h3_typography)){ ?>
		h3{
			<?php if( $h3_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h3_typography_ff); ?>;
			<?php } ?>
			<?php if( $h3_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h3_typography_fw); ?>;
			<?php } ?>
			<?php if( $h3_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h3_typography_ls); ?>;
			<?php } ?>
			<?php if( $h3_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $h3_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $h3_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h3_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* h4 Typography */
		<?php if(!empty($h4_typography)){ ?>
		h4{
			<?php if( $h4_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h4_typography_ff); ?>;
			<?php } ?>
			<?php if( $h4_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h4_typography_fw); ?>;
			<?php } ?>
			<?php if( $h4_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h4_typography_ls); ?>;
			<?php } ?>
			<?php if( $h4_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $h4_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $h4_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h4_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* h5 Typography */
		<?php if(!empty($h5_typography)){ ?>
		h5{
			<?php if( $h5_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h5_typography_ff); ?>;
			<?php } ?>
			<?php if( $h5_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h5_typography_fw); ?>;
			<?php } ?>
			<?php if( $h5_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h5_typography_ls); ?>;
			<?php } ?>
			<?php if( $h5_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $h5_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $h5_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h5_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* h6 Typography */
		<?php if(!empty($h6_typography)){ ?>
		h6{
			<?php if( $h6_typography_ff ){ ?>
			font-family: <?php echo esc_attr($h6_typography_ff); ?>;
			<?php } ?>
			<?php if( $h6_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($h6_typography_fw); ?>;
			<?php } ?>
			<?php if( $h6_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($h6_typography_ls); ?>;
			<?php } ?>
			<?php if( $h6_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $h6_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $h6_typography_fs ){ ?>
			font-size: <?php echo esc_attr($h6_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* Nav 1 Typography */
		<?php if(!empty($nav_1_typography)){ ?>
		.site-header .site-header-bottom-inner > ul > li > a{
			<?php if( $nav_1_typography_ff ){ ?>
			font-family: <?php echo esc_attr($nav_1_typography_ff); ?>;
			<?php } ?>
			<?php if( $nav_1_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($nav_1_typography_fw); ?>;
			<?php } ?>
			<?php if( $nav_1_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($nav_1_typography_ls); ?>;
			<?php } ?>
			<?php if( $nav_1_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $nav_1_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $nav_1_typography_fs ){ ?>
			font-size: <?php echo esc_attr($nav_1_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* Nav 2 Typography */
		<?php if(!empty($nav_2_typography)){ ?>
		.site-header .site-header-bottom-inner > ul ul.sub-menu li a,
		.site-header .sigma_mega-menu-item ul.menu li a{
			<?php if( $nav_2_typography_ff ){ ?>
			font-family: <?php echo esc_attr($nav_2_typography_ff); ?>;
			<?php } ?>
			<?php if( $nav_2_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($nav_2_typography_fw); ?>;
			<?php } ?>
			<?php if( $nav_2_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($nav_2_typography_ls); ?>;
			<?php } ?>
			<?php if( $nav_2_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $nav_2_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $nav_2_typography_fs ){ ?>
			font-size: <?php echo esc_attr($nav_2_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* Nav Top Typography */
		<?php if(!empty($nav_top_typography)){ ?>
		.site-header .site-header-top-inner .navbar-nav > li > a{
			<?php if( $nav_top_typography_ff ){ ?>
			font-family: <?php echo esc_attr($nav_top_typography_ff); ?>;
			<?php } ?>
			<?php if( $nav_top_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($nav_top_typography_fw); ?>;
			<?php } ?>
			<?php if( $nav_top_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($nav_top_typography_ls); ?>;
			<?php } ?>
			<?php if( $nav_top_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $nav_top_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $nav_top_typography_fs ){ ?>
			font-size: <?php echo esc_attr($nav_top_typography_fs); ?>;
			<?php } ?>
		}
		<?php } ?>
		/* Logo Text Typography */
		<?php if(!empty($logo_text_typography)){ ?>
		.site-slogan span,
		.site-slogan h5{
			<?php if( $logo_text_typography_fw ){ ?>
			font-weight: <?php echo esc_attr($logo_text_typography_fw); ?>;
			<?php } ?>
			<?php if( $logo_text_typography_ls ){ ?>
			letter-spacing: <?php echo esc_attr($logo_text_typography_ls); ?>;
			<?php } ?>
			<?php if( $logo_text_typography_lh ){ ?>
			line-height: <?php echo esc_attr( str_replace("px","", $logo_text_typography_lh) ); ?>;
			<?php } ?>
			<?php if( $logo_text_typography_fs ){ ?>
			font-size: <?php echo esc_attr($logo_text_typography_fs); ?>;
			<?php } ?>
			<?php if( $logo_text_typography_ff ){ ?>
			font-family: <?php echo esc_attr($logo_text_typography_ff); ?>;
			<?php } ?>
		}
		<?php if( $logo_text_typography_clr ){ ?>
			.site-slogan h5{
				color: <?php echo esc_attr($logo_text_typography_clr); ?>;
			}
		<?php } ?>
		<?php } ?>
		<?php if($header_top_btn_color) { ?>
			.site-header.header-layout-7 .site-header-top-inner .header-cta-btn{
				color: <?php echo esc_attr($header_top_btn_color); ?>;
			}
		<?php } ?>
		<?php if($header_top_btn_bg) { ?>
			.site-header.header-layout-7 .site-header-top-inner .header-cta-btn{
				background-color: <?php echo esc_attr($header_top_btn_bg); ?>;
			}
			.site-header.header-layout-7 .site-header-top-inner .header-cta-btn:before{
				background: #ffffff26;
			}
		<?php } ?>
		<?php
		$content = apply_filters( 'gautama/custom_css', ob_get_clean() );
		$content = str_replace(array("\r\n", "\r"), "\n", $content);
		$lines = explode("\n", $content);
		$new_lines = array();
		foreach ($lines as $i => $line) {
			if (!empty($line)) {
				$new_lines[] = trim($line);
			}
		}
		return implode($new_lines);
	}
}
