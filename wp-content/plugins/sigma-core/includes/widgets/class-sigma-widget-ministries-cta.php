<?php
/**
 * Widget API: WP_Widget_Ministries_CTA class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Ministries CTA.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Sigma_Widget_Ministries_Cta extends WP_Widget {
	/**
	 * Sets up a new Ministries Cta details widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_sigma_ministries_cta',
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'sigma-ministries-cta', esc_html__( 'Sigma Ministries Call To Action', 'sigma-core' ), $widget_ops );
		$this->alt_option_name = 'widget_sigma_ministries_cta';
	}
	/**
	 * Outputs the content for the current Ministries cta details instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Ministries CTA Details widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Ministries CTA', 'sigma-core' );
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		if(is_singular('ministries')) {
		 ?>

		<?php
			$ministries_cta_details = get_post_meta( get_the_ID(), 'sigma_ministries_details', true );
			$sigma_ministries_cta_title_1 = isset($ministries_cta_details  ['sigma_ministries_cta_title_1']) && !empty($ministries_cta_details ['sigma_ministries_cta_title_1']) ? $ministries_cta_details ['sigma_ministries_cta_title_1'] : '';
			$sigma_ministries_cta_link_1 = isset($ministries_cta_details  ['sigma_ministries_cta_link_1']) && !empty($ministries_cta_details ['sigma_ministries_cta_link_1']) ? $ministries_cta_details ['sigma_ministries_cta_link_1'] : '';
			$sigma_ministries_cta_title_2 = isset($ministries_cta_details  ['sigma_ministries_cta_title_2']) && !empty($ministries_cta_details ['sigma_ministries_cta_title_2']) ? $ministries_cta_details ['sigma_ministries_cta_title_2'] : '';
			$sigma_ministries_cta_link_2 = isset($ministries_cta_details  ['sigma_ministries_cta_link_2']) && !empty($ministries_cta_details ['sigma_ministries_cta_link_2']) ? $ministries_cta_details ['sigma_ministries_cta_link_2'] : '';
		?>
    <?php if(isset($sigma_ministries_cta_title_1) && !empty($sigma_ministries_cta_title_1) || isset($sigma_ministries_cta_title_2) && !empty($sigma_ministries_cta_title_2) ) { ?>
			<?php echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			 ?>
      <ul>
        <?php if(isset($sigma_ministries_cta_title_1) && !empty($sigma_ministries_cta_title_1)) { ?>
          <li><a href="<?php echo esc_url($sigma_ministries_cta_link_1); ?>" class="sigma_btn-custom"> <?php echo esc_html($sigma_ministries_cta_title_1); ?></a></li>
        <?php } ?>
        <?php if(isset($sigma_ministries_cta_title_2) && !empty($sigma_ministries_cta_title_2)) { ?>
          <li><a href="<?php echo esc_url($sigma_ministries_cta_link_2); ?>" class="sigma_btn-custom"><?php echo esc_html($sigma_ministries_cta_title_2); ?> </a></li>
        <?php } ?>
      </ul>
    <?php echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	 	} ?>
		<?php
		}
	}
	/**
	 * Handles updating the settings for the current Ministries Cta Details widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance               = $old_instance;
		$instance['title']      = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}
	/**
	 * Outputs the settings form for the Ministries CTA Details widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'sigma-core' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		<?php
	}
}
