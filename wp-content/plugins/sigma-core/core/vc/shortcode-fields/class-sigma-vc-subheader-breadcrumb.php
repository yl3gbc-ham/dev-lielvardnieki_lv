<?php
/**
 * Sigma Breadcrumb shortcode
 *
 * @package Sigma Core
 */
/**
 * Breadcrumb shortcode.
 */
class Sigma_Vc_Subheader_Breadcrumb_Shortcode_Fields {
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
		$this->title         = esc_html__( 'Subheader Breadcrumb', 'sigma-core' );
		$this->handle        = 'sigma_subheader_breadcrumb';
		$this->description   = esc_html__( 'Use this shortcode to show your page breadcrumb', 'sigma-core' );
		$this->category      = esc_html__( 'Sigma Subheader', 'sigma-core' );
		$this->wrapper_class = 'sigma-shortcode-wrapper';
		add_action( 'vc_before_init', array( $this, 'shortcode_fields' ) );
		add_shortcode( $this->handle, array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Breadcrumb Bar shortcode mapping.
	 *
	 * @return void
	 */
	function shortcode_fields() {

		$fields = array(
      array(
        'type'             => 'dropdown',
        'param_name'       => 'breadcrumb_display',
        'heading'          => esc_html__( 'Breadcrumb Width', 'sigma-core' ),
        'description'      => esc_html__( 'Set the breadcrumb Width', 'sigma-core' ),
        'value'            => array(
          esc_html__( 'Contain', 'sigma-core' )  => 'd-inline-block',
          esc_html__( 'Full Width', 'sigma-core' )  => 'd-block',
        ),
      ),
      array(
				'type'        => 'dropdown',
				'param_name'  => 'breadcrumb_alignment',
				'heading'     => esc_html__( 'Breadcrumb Alignment (Wrapper)', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'Left', 'sigma-core' )   => 'text-left',
					esc_html__( 'Right', 'sigma-core' )  => 'text-right',
					esc_html__( 'Center', 'sigma-core' ) => 'text-center',
				),
				'std'         => 'text-left',
				'description' => esc_html__( 'Select breadcrumb alignment.', 'sigma-core' ),
			),
      array(
				'type'        => 'dropdown',
				'param_name'  => 'breadcrumb_alignment_inner',
				'heading'     => esc_html__( 'Breadcrumb Alignment (Content)', 'sigma-core' ),
				'value'            => array(
					esc_html__( 'Left', 'sigma-core' )   => 'text-left',
					esc_html__( 'Right', 'sigma-core' )  => 'text-right',
					esc_html__( 'Center', 'sigma-core' ) => 'text-center',
				),
				'std'         => 'text-left',
				'description' => esc_html__( 'Select breadcrumb alignment for the inner content.', 'sigma-core' ),
        'dependency' => array(
          'element' => 'breadcrumb_display',
          'value'   => 'd-block',
        ),
			),
      array(
				'type'             => 'checkbox',
				'heading'          => esc_html__( 'Custom Seperator?', 'sigma-core' ),
				'param_name'       => 'custom_seperator',
				'description'      => esc_html__( 'Select this checkbox to show a custom seperator', 'sigma-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'value'            => array( esc_html__( 'Yes', 'sigma-core' ) => 'yes' ),
				'std' => 'yes'
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
          'element' => 'custom_seperator',
          'value'   => 'yes',
        ),
        'description' => esc_html__( 'Select icon from library.', 'sigma-core' ),
      ),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Breadcrumb Color', 'sigma-core' ),
				'param_name'  => 'breadcrumb_color',
				'description' => esc_html__( 'Select custom Breadcrumb color.', 'sigma-core' ),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Breadcrumb Link Color', 'sigma-core' ),
				'param_name'  => 'breadcrumb_link_color',
				'description' => esc_html__( 'Select custom Breadcrumb links color.', 'sigma-core' ),
			),
      array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Breadcrumb Link Color on hover', 'sigma-core' ),
				'param_name'  => 'breadcrumb_link_color_hover',
				'description' => esc_html__( 'Select custom Breadcrumb links color on hover.', 'sigma-core' ),
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
   * Get the breadcrumbs.
   *
   * @since 1.0.0
   */
  function sigmacore_get_breadcrumbs( $delimiter = '' ){

		// Set variables for later use
	  $home_link        = esc_url(home_url('/'));
	  $home_text        = esc_html__( 'Home', 'gautama' );
	  $link_before      = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item"><span itemprop="name">';
	  $link_after       = '</span></li>';
	  $link_attr        = '';
		$delimiter 				= !empty($delimiter) ? '<li>'.$delimiter.'</li>' : '';
	  $link             = $link_before . '<a' . $link_attr . ' href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>' . $link_after;
	  $before           = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="breadcrumb-item active" aria-current="page"><span itemprop="name">'; // Tag before the current crumb
	  $after            = '</span></li>';                // Tag after the current crumb
	  $page_addon       = '';                       // Adds the page number if the query is paged
	  $breadcrumb_trail = '';
	  $category_links   = '';

	  /**
	   * Set our own $wp_the_query variable. Do not use the global variable version due to
	   * reliability
	   */
	  $wp_the_query   = $GLOBALS['wp_the_query'];
	  $queried_object = $wp_the_query->get_queried_object();

	  // Handle single post requests which includes single pages, posts and attatchments
	  if ( is_singular() ) {
	    /**
	     * Set our own $post variable. Do not use the global variable version due to
	     * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
	     */
	    $post_object = sanitize_post( $queried_object );

	    // Set variables
	    $title          = apply_filters( 'the_title', $post_object->post_title, $post_object->ID );
	    $parent         = $post_object->post_parent;
	    $post_type      = $post_object->post_type;
	    $post_id        = $post_object->ID;
	    $post_link      = $before . $title . $after;
	    $parent_string  = '';
	    $post_type_link = '';

	    if ( 'post' === $post_type ) {
	      // Get the post categories
	      $categories = get_the_category( $post_id );
	      if ( $categories ) {
	          // Lets grab the first category
	          $category  = $categories[0];

	          $category_links = get_category_parents( $category, true, $delimiter );
	          $category_links = str_replace( '<a',   $link_before . '<a' . $link_attr, $category_links );
	          $category_links = str_replace( '</a>', '</a>' . $link_after,             $category_links );
	      }
	    }

	    if ( !in_array( $post_type, ['post', 'page', 'attachment'] ) ) {
	      $post_type_object = get_post_type_object( $post_type );
	      $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );
	      $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
	    }

	    // Get post parents if $parent !== 0
	    if ( 0 !== $parent ) {
	      $parent_links = [];
	      while ( $parent ) {
	        $post_parent = get_post( $parent );
	        $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );
	        $parent = $post_parent->post_parent;
	      }

	      $parent_links = array_reverse( $parent_links );
	      $parent_string = implode( $delimiter, $parent_links );
	    }

	    // Lets build the breadcrumb trail
	    if ( $parent_string ) {
	      $breadcrumb_trail = $parent_string . $delimiter . $post_link;
	    } else {
	      $breadcrumb_trail = $post_link;
	    }

	    if ( $post_type_link )
	      $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

	    if ( $category_links )
	      $breadcrumb_trail = $category_links . $breadcrumb_trail;
	  }

	  // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
	  if( is_archive() ) {
	    if ( is_category() || is_tag() || is_tax() ) {
	      // Set the variables for this section
	      $term_object        = get_term( $queried_object );
	      $taxonomy           = $term_object->taxonomy;
	      $term_id            = $term_object->term_id;
	      $term_name          = $term_object->name;
	      $term_parent        = $term_object->parent;
	      $taxonomy_object    = get_taxonomy( $taxonomy );
	      $current_term_link  = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
	      $parent_term_string = '';

	      if ( 0 !== $term_parent ) {
	        // Get all the current term ancestors
	        $parent_term_links = [];
	        while ( $term_parent ) {
	          $term = get_term( $term_parent, $taxonomy );
	          $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );
	          $term_parent = $term->parent;
	        }

	        $parent_term_links  = array_reverse( $parent_term_links );
	        $parent_term_string = implode( $delimiter, $parent_term_links );
	      }

	      if ( $parent_term_string ) {
	        $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
	      } else {
	        $breadcrumb_trail = $current_term_link;
	      }

	    } elseif ( is_author() ) {

	      $breadcrumb_trail = $before . esc_html__( 'Author archive for', 'gautama') .  $before . $queried_object->data->display_name . $after;

	    } elseif ( is_date() ) {
	      // Set default variables
	      $year     = $wp_the_query->query_vars['year'];
	      $monthnum = $wp_the_query->query_vars['monthnum'];
	      $day      = $wp_the_query->query_vars['day'];

	      // Get the month name if $monthnum has a value
	      if ( $monthnum ) {
	        $date_time  = DateTime::createFromFormat( '!m', $monthnum );
	        $month_name = $date_time->format( 'F' );
	      }

	      if ( is_year() ) {
	        $breadcrumb_trail = $before . $year . $after;
	      } elseif( is_month() ) {
	        $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );
	        $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;
	      } elseif( is_day() ) {
	        $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
	        $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );
	        $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
	      }

	    } elseif ( is_post_type_archive() ) {
	      $post_type        = $wp_the_query->query_vars['post_type'];
	      $post_type_object = get_post_type_object( $post_type );
	      $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;
	    }
	  }

	  // Handle the search page
	  if ( is_search() ) {
	    $breadcrumb_trail = $before . esc_html__( ' Search query for: ', 'gautama' ) . get_search_query() . $after;
	  }

	  // Handle 404's
	  if ( is_404() ) {
	    $breadcrumb_trail = $before . esc_html__( ' Error 404', 'gautama' ) . $after;
	  }

	  // Handle paged pages
	  if ( is_paged() ) {
	    $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
	    $page_addon   = '<li class="breadcrumb-item-page">' . sprintf( esc_html__( ' ( Page %s )', 'gautama' ), number_format_i18n( $current_page ) ) . '</li>';
	  }

	  $breadcrumb_output_link  = '';
	  $breadcrumb_output_link .= '<nav aria-label="breadcrumb"><ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';
	  if ( is_home() || is_front_page() ) {
	    // Do not show breadcrumbs on page one of home and frontpage
	    if ( is_paged() ) {
	      $breadcrumb_output_link .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"  class="breadcrumb-item"><a itemprop="item" href="' . esc_url($home_link) . '"><span itemprop="name">' . $home_text . '</span></a></li>';
	      $breadcrumb_output_link .= $page_addon;
	    }
	  } else {
	    $breadcrumb_output_link .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"  class="breadcrumb-item"><a itemprop="item" href="' . esc_url($home_link) . '"><span itemprop="name">' . $home_text . '</span></a></li>';
	    $breadcrumb_output_link .= $delimiter;
	    $breadcrumb_output_link .= $breadcrumb_trail;
	    $breadcrumb_output_link .= $page_addon;
	  }
	  $breadcrumb_output_link .= '</ol></nav><!-- .breadcrumbs -->';

    return $breadcrumb_output_link;

  }

	/**
	 * Breadcrumb shortcode callback functions.
	 */
	function shortcode_callback( $atts, $content = null, $handle = '' ) {
		$default_atts = array(
      'breadcrumb_display'  => 'd-inline-block',
      'breadcrumb_alignment'=> 'text-left',
      'breadcrumb_alignment_inner'  => 'text-left',
      'custom_seperator'    => 'yes',
      'icon_fontawesome'    => 'fas fa-adjust',
      'breadcrumb_color'  =>  '',
      'breadcrumb_link_color' =>  '',
      'breadcrumb_link_color_hover' =>  '',
			'css_animation'       => '',
			'el_id'               => '',
			'el_class'            => '',
			'css'                 => '',
			'handle'              => $handle,
		);
		$atts = shortcode_atts( $default_atts, $atts, $handle );

    global $sigma_shortcodes, $sigma_vc_inline_css;

    $inline_css = '';
		$sigma_shortcodes[ $handle ]['atts'] = $atts;
		$sigma_shortcodes_class_unique       = 'sigma-subheader-breadcrumb-' . mt_rand();
		$sigma_shortcodes_classes            = $this->handle . '_wrapper';
		$sigma_shortcodes_classes            .= ' ' . $sigma_shortcodes_class_unique;
		$sigma_shortcodes_classes            .= ' ' . $this->wrapper_class;
    $sigma_shortcodes_classes            .= ' ' . $atts['breadcrumb_display'];
    $sigma_shortcodes_classes            .= ' ' . $atts['breadcrumb_alignment_inner'];

		if ( $atts[ 'el_class' ] ) {
			$sigma_shortcodes_classes .= ' ' . $atts[ 'el_class' ];
		}

		if ( $atts['css_animation'] && 'none' !== $atts['css_animation'] ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$sigma_shortcodes_classes .= ' wpb_animate_when_almost_visible wpb_' . $atts['css_animation'] . ' ' . $atts['css_animation'];
		}

		if (  isset( $atts[ 'css' ] ) && $atts[ 'css' ] ) {
			$sigma_shortcodes_classes .= ' ' . vc_shortcode_custom_css_class( $atts[ 'css' ], ' ' );
		}

    if ( $atts[ 'breadcrumb_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .breadcrumb-item.active{ color: " . $atts[ 'breadcrumb_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . " .breadcrumb i{ color: " . $atts[ 'breadcrumb_color' ] . ";}";
      $inline_css .= "." . $sigma_shortcodes_class_unique . " .breadcrumb-item+.breadcrumb-item::before{ color: " . $atts[ 'breadcrumb_color' ] . ";}";
		}

    if ( $atts[ 'breadcrumb_link_color' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .breadcrumb-item a{ color: " . $atts[ 'breadcrumb_link_color' ] . ";}";
		}

    if ( $atts[ 'breadcrumb_link_color_hover' ] ) {
			$inline_css .= "." . $sigma_shortcodes_class_unique . " .breadcrumb-item a:hover{ color: " . $atts[ 'breadcrumb_link_color_hover' ] . ";}";
		}

    if ( $inline_css ) {
			$sigma_vc_inline_css[] = $inline_css;
			sigmacore_vc_add_inline_css(); // This is added in case the sigma_vc_inline failed to fetch the css
		}

    $delimiter = $atts['custom_seperator'] == 'yes' && !empty($atts['icon_fontawesome']) ? '<i class="'.esc_attr($atts['icon_fontawesome']).'"></i>' : '';

		ob_start();

		?>
		<div class="<?php echo esc_attr($atts['breadcrumb_alignment']) ?>">
      <div <?php echo ( $atts[ 'el_id' ] ) ? 'id=' . esc_attr( $atts[ "el_id" ] ) : ''; ?> class="<?php echo esc_attr( $sigma_shortcodes_classes ); ?>">
        <?php echo $this->sigmacore_get_breadcrumbs( $delimiter ); ?>
  		</div>
    </div>
		<?php
		return ob_get_clean();
	}
}
new Sigma_Vc_Subheader_Breadcrumb_Shortcode_Fields();
