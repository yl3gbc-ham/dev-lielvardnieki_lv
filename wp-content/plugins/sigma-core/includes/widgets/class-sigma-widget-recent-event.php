<?php
/**
 * Widget API: Sigma_Widget_Recent_Event class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Recent Event widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Sigma_Widget_Recent_Event extends WP_Widget {
	/**
	 * Sets up a new Recent event widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_recent_event',
			'description'                 => __( 'Your site&#8217;s most recent event.', 'sigma-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'recent-event', __( 'Sigma Recent Event', 'sigma-core' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_event';
	}
	/**
	 * Outputs the content for the current Recent event widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent event widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		/**
		 * Filters the arguments for the Recent event widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent event.
		 * @param array $instance Array of settings for the current widget.
		 */
		$r = new WP_Query(
			apply_filters(
				'widget_event_args',
				array(
					'post_type'           => 'event',
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);
		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
		<ul>
			<?php foreach ( $r->posts as $recent_event ) : ?>
				<?php
				$post_title   = get_the_title( $recent_event->ID );
				$title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)', 'sigma-core' );
				$aria_current = '';
				if ( get_queried_object_id() === $recent_event->ID ) {
					$aria_current = ' aria-current="page"';
				}
				?>
				<li>
					<div class="sigma-event-content">
						<a href="<?php the_permalink( $recent_event->ID ); ?>"<?php echo $aria_current; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $title ); ?>
              <span> <i class="far fa-plus"></i></span>
            </a>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	/**
	 * Handles updating the settings for the current Recent event widget instance.
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
		$instance['number']     = (int) $new_instance['number'];
		return $instance;
	}
	/**
	 * Outputs the settings form for the Recent event widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? $instance['title'] : '';
		$number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'sigma-core' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of event to show:', 'sigma-core' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>
		<?php
	}
}
