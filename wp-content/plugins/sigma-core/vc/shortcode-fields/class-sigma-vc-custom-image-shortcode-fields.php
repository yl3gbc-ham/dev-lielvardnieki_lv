<?php
/**
 * Sigma Custom Image shortcode
 *
 * @package Sigma Core
 */

/**
 * Custom Image shortcode.
 */
class Sigma_Vc_Custom_Image_Shortcode_Fields
{
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
    function __construct()
    {
        $this->title = esc_html__('Custom Image', 'sigma-core');
        $this->handle = 'sigma_custom_image';
        $this->description = esc_html__('Use this shortcode for custom image.', 'sigma-core');
        $this->category = esc_html__('Sigma', 'sigma-core');
        $this->wrapper_class = 'sigma-shortcode-wrapper';
        add_action('vc_before_init', array($this, 'shortcode_fields'));
        add_shortcode($this->handle, array($this, 'shortcode_callback'));
    }

    /**
     * Custom Image shortcode mapping.
     *
     * @return void
     */
    function shortcode_fields()
    {
        $fields = array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style', 'sigma-core'),
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Style 1', 'sigma-core') => 'style-1',
                    esc_html__('Style 2', 'sigma-core') => 'style-2',
                    esc_html__('Style 3', 'sigma-core') => 'style-3',
                ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Large Image', 'sigma-core'),
                'param_name' => 'large_image',
                'value' => '',
            ),
            array(
      				'type'        => 'textarea_safe',
      				'heading'     => esc_html__( 'Custom Text', 'sigma-core' ),
      				'param_name'  => 'custom_text',
      				'description' => esc_html__( 'Enter the custom text', 'sigma-core' ),
              'dependency' => array(
                'element' => 'style',
                'value'   => 'style-2',
              ),
      			),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Small Image', 'sigma-core'),
                'param_name' => 'small_image',
                'value' => '',
                'dependency' => array(
        					'element' => 'style',
        					'value'   => 'style-1',
        				),
            ),
            array(
      				'type'        => 'textarea_safe',
      				'heading'     => esc_html__( 'Custom Title', 'sigma-core' ),
      				'param_name'  => 'custom_title',
      				'description' => esc_html__( 'Enter the custom title', 'sigma-core' ),
              'dependency' => array(
                'element' => 'style',
                'value'   => 'style-3',
              ),
      			),
            array(
      				'type'        => 'checkbox',
      				'heading'     => esc_html__( 'Add Icon?', 'sigma-core' ),
      				'param_name'  => 'add_icon',
      				'value'       => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
      				'description' => esc_html__( 'Mark this checkbox to add icon in list.', 'sigma-core' ),
              'dependency' => array(
                'element' => 'style',
                'value'   => 'style-3',
              ),
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
      					'element' => 'add_icon',
      					'value'   => 'yes',
      				),
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'group'            => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'group'       => esc_html__( 'Icon Settings', 'sigma-core' ),
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
      				'heading'     => esc_html__( 'Background Color', 'sigma-core' ),
      				'param_name'  => 'bg_color',
      				'description' => esc_html__( 'Select custom background color.', 'sigma-core' ),
      				'group' => esc_html__( 'Style Options', 'sigma-core' ),
      			),
            vc_map_add_css_animation(),
            array(
                'type' => 'el_id',
                'heading' => esc_html__('Element ID', 'sigma-core'),
                'param_name' => 'el_id',
                /* translators: 1: anchor tag start, 2: anchor tag end */
                'description' => sprintf(esc_html__('Enter element ID (Note: make sure it is unique and valid according to %1$sw3c specification%2$s).', 'sigma-core'), '<a href="https://www.w3schools.com/tags/att_global_id.asp" target="_self">', '</a>'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'sigma-core'),
                'param_name' => 'el_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'sigma-core'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS box', 'sigma-core'),
                'param_name' => 'css',
                'group' => esc_html__('Design Options', 'sigma-core'),
            ),
        );
        // Shortcode Params
        $params = array(
            'name' => $this->title,
            'base' => $this->handle,
            'category' => $this->category,
            'description' => $this->description,
            'class' => $this->wrapper_class,
            'params' => $fields,
        );
        vc_map($params);
    }

    /**
     * Counter shortcode callback functions.
     */
    function shortcode_callback($atts, $content, $handle = '')
    {
        $default_atts = array(
            'style'               => 'style-1',
            'large_image'         => '',
            'small_image'         => '',
            'custom_text'         => '',
            'custom_title'        => '',
            'add_icon'            => '',
            'icon_type'           => 'fontawesome',
      			'icon_fontawesome'    => 'fas fa-adjust',
      			'icon_openiconic'     => 'vc-oi vc-oi-dial',
      			'icon_typicons'       => 'typcn typcn-adjust-brightness',
      			'icon_linecons'       => 'vc_li vc_li-heart',
      			'icon_monosocial'     => 'vc-mono vc-mono-fivehundredpx',
      			'icon_material'       => 'vc-material vc-material-cake',
            'icon_flaticon'       => '',
            'title_color'         => '',
            'bg_color'            => '',
            'css_animation'       => '',
            'el_id'               => '',
            'el_class'            => '',
            'css'                 => '',
            'handle' => $handle,
        );
        $atts = shortcode_atts($default_atts, $atts, $handle);
        global $sigma_shortcodes, $sigma_vc_inline_css;
        $inline_css = '';
        $sigma_shortcodes[$handle]['atts'] = $atts;
        $sigma_shortcodes_class_unique = 'sigma-custom-image-' . mt_rand();
        $sigma_shortcodes_classes = $this->handle . '_wrapper';
        $sigma_shortcodes_classes .= ' ' . $sigma_shortcodes_class_unique;
        $sigma_shortcodes_classes .= ' ' . $this->wrapper_class;
        $sigma_shortcodes_classes .= ' sigma-custom-image-' . $atts['style'];
        if ($atts['el_class']) {
            $sigma_shortcodes_classes .= ' ' . $atts['el_class'];
        }

        //Color
        if ( $atts[ 'title_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-custom-image-style-2 .image-wrapper span { color: " . $atts[ 'title_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-custom-image-style-3 .image-wrapper .icon-blocks span { color: " . $atts[ 'title_color' ] . ";}";
        }
        if ( $atts[ 'bg_color' ] ) {
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-custom-image-style-2 .image-wrapper span { background-color: " . $atts[ 'bg_color' ] . ";}";
          $inline_css .= "." . $sigma_shortcodes_class_unique . ".sigma-custom-image-style-3 .image-wrapper .icon-blocks { background-color: " . $atts[ 'bg_color' ] . ";}";
        }


        if ($atts['css_animation'] && 'none' !== $atts['css_animation']) {
            wp_enqueue_script('vc_waypoints');
            wp_enqueue_style('vc_animate-css');
            $sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
        }

        if (isset($atts['css']) && $atts['css']) {
            $sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class($atts['css'], ' ');
        }
        if ($inline_css) {
            $sigma_vc_inline_css[] = $inline_css;
            sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
        }
        ob_start();
        ?>
        <div <?php echo ($atts['el_id']) ? 'id=' . esc_attr($atts["el_id"]) : ''; ?>
                class="<?php echo esc_attr($sigma_shortcodes_classes); ?>">
            <?php sigmacore_get_vc_shortcode_template('custom-image/content'); ?>
        </div>
        <?php
        return ob_get_clean();
    }
}

new Sigma_Vc_Custom_Image_Shortcode_Fields();
