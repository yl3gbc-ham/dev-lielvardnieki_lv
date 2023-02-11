<?php
/**
 * Sigma post-slider shortcode
 *
 * @package Sigma Core
 */
/**
 * Post Slider shortcode.
 */
class Sigma_Vc_Post_Slider_Shortcode_Fields {
	/**
	 * Shortcode title.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $title;
	/**
	 * Shortcode handle.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $handle;
	/**
	 * Shortcode description.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $description;
	/**
	 * Shortcode category.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $category;
	/**
	 * Shortcode wrraper class.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	protected $wrapper_class;
	/**
	 * Shortcode map and callback
	 */
	function __construct() {
		$this->title         = esc_html__( 'Post Slider', 'sigma-core' );
		$this->handle        = 'sigma_post_slider';
		$this->description   = esc_html__( 'Use this shortcode to show post slider.', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}
	/**
	 * Post Slider shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {

		$fields = array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Slider Style', 'sigma-core' ),
				'param_name'  => 'style',
				'description' => esc_html__( 'Select style.', 'sigma-core' ),
				'value'       => array(
					esc_html__( 'Style 1', 'sigma-core' ) => 'style-1',
					esc_html__( 'Style 2', 'sigma-core' ) => 'style-2',
				),
			),
			array(
			  "type" => "posttypes",
			  "class" => "",
			  "heading" => esc_html__( "Select Post Types", "sigma-core" ),
			  "param_name" => "post_types",
			  "value" => esc_html__( "", "sigma-core" ),
			  "description" => esc_html__( "Check the post types that you want to display in the slider", "sigma-core" )
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Count', 'sigma-core' ),
				'param_name'  => 'post_per_page',
				'description' => esc_html__( 'Enter number of posts to display.', 'sigma-core' ),
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'post_order',
				'heading'          => esc_html__( 'Order', 'sigma-core' ),
				'description'      => esc_html__( 'Select display order.', 'sigma-core' ),
				'std'              => 'DESC',
				'value'            => array(
					esc_html__( 'Ascending', 'sigma-core' )  => 'ASC',
					esc_html__( 'Descending', 'sigma-core' ) => 'DESC',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'dropdown',
				'param_name'       => 'post_orderby',
				'heading'          => esc_html__( 'Orderby ', 'sigma-core' ),
				'description'      => esc_html__( 'Select order by parameter.', 'sigma-core' ),
				'std'              => 'date',
				'value'            => array(
					esc_html__( 'ID', 'sigma-core' )            => 'ID',
					esc_html__( 'Title', 'sigma-core' )         => 'title',
					esc_html__( 'Date', 'sigma-core' )          => 'date',
					esc_html__( 'Modified Date', 'sigma-core' ) => 'modified',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'sigma-core' ),
				'value' => array(
					esc_html__( 'Font Awesome 5', 'sigma-core' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'sigma-core' )    => 'openiconic',
					esc_html__( 'Typicons', 'sigma-core' )       => 'typicons',
					esc_html__( 'Entypo', 'sigma-core' )         => 'entypo',
					esc_html__( 'Linecons', 'sigma-core' )       => 'linecons',
					esc_html__( 'Mono Social', 'sigma-core' )    => 'monosocial',
					esc_html__( 'Material', 'sigma-core' )       => 'material',
					esc_html__( 'Flaticon', 'sigma-core' )       => 'flaticon',
				),
				'admin_label' => true,
				'param_name'  => 'icon_type',
				'dependency' => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
				'description' => esc_html__( 'Select icon library.', 'sigma-core' ),
			),
			array(
				'type'             => 'iconpicker',
				'heading'          => esc_html__( 'Icon', 'sigma-core' ),
				'param_name'       => 'icon_flaticon',
				'settings'   => array(
					'iconsPerPage' => 500,
					'type' => 'flaticon',
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'flaticon',
				),
				'description'      => esc_html__( 'Select icon from library.', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column vc_column-with-padding',
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_fontawesome',
				'value'      => 'fas fa-adjust',
				'settings'   => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 500,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_openiconic',
				'value'      => 'vc-oi vc-oi-dial',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'openiconic',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_typicons',
				'value'      => 'typcn typcn-adjust-brightness',
				'settings' => array(
					'emptyIcon'    => false,
					'type'         => 'typicons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_entypo',
				'value'      => 'entypo-icon entypo-icon-note',
				'settings'   => array(
					'emptyIcon' => false,
					'type'         => 'entypo',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'entypo',
				),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_linecons',
				'value'      => 'vc_li vc_li-heart',
				'settings' => array(
					'emptyIcon'    => false,
					'type'         => 'linecons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_monosocial',
				'value'      => 'vc-mono vc-mono-fivehundredpx',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'monosocial',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'monosocial',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__( 'Icon', 'sigma-core' ),
				'param_name' => 'icon_material',
				'value'      => 'vc-material vc-material-cake',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'material',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
			),
			// Color options
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Title Color', 'sigma-core' ),
				'param_name'  => 'title_color',
				'description' => esc_html__( 'Select custom title color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon Color', 'sigma-core' ),
				'param_name'  => 'icon_color',
				'description' => esc_html__( 'Select custom icon color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Description Color', 'sigma-core' ),
				'param_name'  => 'description_color',
				'description' => esc_html__( 'Select custom description color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Slider Dots Background Color', 'sigma-core' ),
				'param_name'  => 'slider_dots_bg_color',
				'description' => esc_html__( 'Select custom slider dots background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
				'dependency'  => array(
					'element' => 'style',
					'value'   => 'style-1',
				),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Block Background Color', 'sigma-core' ),
				'param_name'  => 'block_bg_color',
				'description' => esc_html__( 'Select custom block background color.', 'sigma-core' ),
				'group' => esc_html__( 'Style Options', 'sigma-core' ),
			),
			vc_map_add_css_animation(),
			array(
				'type'        => 'el_id',
				'heading'     => esc_html__( 'Element ID', 'sigma-core' ),
				'param_name'  => 'el_id',
				/* translators: 1: anchor tag start, 2: anchor tag end */
				'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core' ), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_self">', '</a>' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'sigma-core' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sigma-core' ),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'CSS box', 'sigma-core' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'sigma-core' ),
			),
		);
		// Shortcode Params
		$params = array(
			'name'        => $this->title,
			'base'        => $this->handle,
			'category'    => $this->category,
			'description' => $this->description,
			'class'       => $this->wrapper_class,
			'params'      => $fields,
		);
		vc_map( $params );
	}
	/**
	 * Post Slider shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
			'style'                       => 'style-1',
			'post_types'									=> '',
			'post_per_page'               => '',
			'post_order'                  => '',
			'post_orderby'                => '',
			'icon_type'           				=> 'fontawesome',
			'icon_fontawesome'    				=> 'fas fa-adjust',
			'icon_openiconic'     				=> 'vc-oi vc-oi-dial',
			'icon_typicons'       				=> 'typcn typcn-adjust-brightness',
			'icon_linecons'       				=> 'vc_li vc_li-heart',
			'icon_monosocial'     				=> 'vc-mono vc-mono-fivehundredpx',
			'icon_material'       				=> 'vc-material vc-material-cake',
			'icon_flaticon'       				=> '',
			'title_color'       					=> '',
			'icon_color'       						=> '',
			'description_color'       		=> '',
			'slider_dots_bg_color'       	=> '',
			'block_bg_color'       				=> '',
			'css_animation'               => '',
			'el_id'                       => '',
			'el_class'                    => '',
			'css'                         => '',
			'handle'                      => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );
		global $sigma_shortcodes, $sigma_vc_inline_css;

		$post_types = !empty($atts['post_types']) ? explode(",", $atts['post_types']) : 'post';

		$args = array(
			'post_type'           => $post_types,
			'posts_per_page'      => $atts['post_per_page'],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $atts['post_order'],
			'orderby'             => $atts['post_orderby'],
		);

		$the_query = new WP_Query( $args );
		if ( ! $the_query->have_posts() ) {
			return;
		}

		$sigma_shortcodes[ $handle ]['atts']      = $atts;
		$sigma_shortcodes[ $handle ]['the_query'] = $the_query;
		$sigma_shortcodes_class_unique            = 'sigma-post-slider-' . mt_rand();
		$sigma_shortcodes_classes                 = $this->handle . '_wrapper';
		$sigma_shortcodes_classes                 .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes                 .= ' ' . $this->wrapper_class;
		if ( $atts['el_class'] ) {
			$sigma_shortcodes_classes .= ' ' . $atts['el_class'];
		}
		$sigma_shortcodes_classes .= ' post-slider-' . $atts['style'];

		//Color
		if ( $atts[ 'title_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_post_slider_wrapper .posts-content-wrap .post-content-box h3 a { color: " . $atts[ 'title_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_post_slider_wrapper .posts-slider-two .single-posts-box .post-desc h3 a{ color: " . $atts[ 'title_color' ] . ";}";
		}
		if ( $atts[ 'icon_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_post_slider_wrapper .posts-content-wrap .post-content-box .icon{ color: " . $atts[ 'icon_color' ] . ";}";
		}
		if ( $atts[ 'description_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_post_slider_wrapper .posts-content-wrap .post-content-box p{ color: " . $atts[ 'description_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_post_slider_wrapper .posts-slider-two .single-posts-box .post-desc p { color: " . $atts[ 'description_color' ] . ";}";
		}
		if ( $atts[ 'slider_dots_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_post_slider_wrapper .posts-content-wrap .post-content-box .post-content-slider ul.slick-dots li.slick-active button{ background-color: " . $atts[ 'slider_dots_bg_color' ] . ";}";
		}
		if ( $atts[ 'block_bg_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_post_slider_wrapper .posts-content-wrap .post-content-box { background-color: " . $atts[ 'block_bg_color' ] . ";}";
			$inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma_post_slider_wrapper .posts-slider-two .single-posts-box .post-desc { background-color: " . $atts[ 'block_bg_color' ] . ";}";
		}

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}
		if ( isset( $atts['css'] ) && $atts['css'] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts['css'], ' ' );
		}

		if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}

		ob_start();
		?>
		<div <?php echo ( $atts['el_id'] ) ? 'id=' . esc_attr( $atts["el_id"] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
			<?php sigmacore_get_vc_shortcode_template( 'post-slider/content' ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Post_Slider_Shortcode_Fields();
