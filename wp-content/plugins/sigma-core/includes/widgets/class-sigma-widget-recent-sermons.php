<?php
/**
 * Widget API: WP_Widget_Recent_Sermons class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Recent Sermons widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Sigma_Widget_Recent_Sermons extends WP_Widget {
	/**
	 * Sets up a new Recent Sermons widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_sigma_recent_sermons',
			'description'                 => esc_html__( 'Your site&#8217;s most recent Sermons.', 'sigma-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'sigma-recent-sermons', esc_html__( 'Sigma Recent Sermons', 'sigma-core' ), $widget_ops );
		$this->alt_option_name = 'widget_sigma_recent_sermons';
	}
	/**
	 * Outputs the content for the current Recent Sermons widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Sermons widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Sermons', 'sigma-core' );
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date  = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_image = isset( $instance['show_image'] ) ? $instance['show_image'] : false;
		/**
		 * Filters the arguments for the Recent Sermons widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent sermons.
		 * @param array $instance Array of settings for the current widget.
		 */
		$r = new WP_Query(
			apply_filters(
				'sigma_widget_sermons_args',
				array(
          'post_type'           => 'sermons',
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
			<?php foreach ( $r->posts as $recent_sermons ) : ?>
				<?php
				$sermons_title   = get_the_title( $recent_sermons->ID );
				$title        = ( ! empty( $sermons_title ) ) ? $sermons_title : esc_html__( '(no title)', 'sigma-core' );
				$aria_current = '';
				if ( get_queried_object_id() === $recent_sermons->ID ) {
					$aria_current = ' aria-current="page"';
				}
				?>
				<li>
					<?php if ( $show_image && has_post_thumbnail( $recent_sermons->ID ) ) : ?>
              	<a href="<?php the_permalink( $recent_sermons->ID ); ?>" class="sigma-sermons-image">
    							<?php echo get_the_post_thumbnail( $recent_sermons->ID, 'thumbnail' ); ?>
                </a>
					<?php endif; ?>
					<div class="sigma-sermons-content">
            <?php if ( $show_date ) : ?>
							<span class="sigma-sermons-date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date( '', $recent_sermons->ID ); ?></span>
						<?php endif; ?>
						<a href="<?php the_permalink( $recent_sermons->ID ); ?>"<?php echo $aria_current; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $title ); ?></a>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	/**
	 * Handles updating the settings for the current Recent Sermons widget instance.
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
		$instance['show_date']  = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_image'] = isset( $new_instance['show_image'] ) ? (bool) $new_instance['show_image'] : false;
		return $instance;
	}
	/**
	 * Outputs the settings form for the Recent Sermons widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date  = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_image = isset( $instance['show_image'] ) ? (bool) $instance['show_image'] : false;
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'sigma-core' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of sermons to show:', 'sigma-core' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display sermons date?', 'sigma-core' ); ?></label></p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_image ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_image' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php esc_html_e( 'Display sermons image?', 'sigma-core' ); ?></label></p>
		<?php
	}
}
