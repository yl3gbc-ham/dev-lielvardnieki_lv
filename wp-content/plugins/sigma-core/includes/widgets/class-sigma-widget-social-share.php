<?php
class sigma_social_share extends WP_Widget {
    public function __construct() {
        parent::__construct('sigma_social_share', esc_html__('Sigma Social Share', 'sigma-core'), array(
            'description' => esc_html__('Add Social Share Widget', 'sigma-core'),
        ));
    }
    public function form($instance) {
        isset($instance['title']) ? $title = $instance['title'] : null;
        empty($instance['title']) ? $title = 'My Social Profile' : null;
        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['behance']) ? $behance = $instance['behance'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        isset($instance['pinterest']) ? $pinterest = $instance['pinterest'] : null;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text"
             <?php if(isset($facebook) && !empty($facebook)) { ?>
               value="<?php echo esc_attr($facebook); ?>"
             <?php } ?>>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text"
            <?php if(isset($twitter) && !empty($twitter)) { ?>
              value="<?php echo esc_attr($twitter); ?>"
            <?php } ?>>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('behance'); ?>"><?php _e('Behance:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('behance'); ?>" name="<?php echo $this->get_field_name('behance'); ?>" type="text"
            <?php if(isset($behance) && !empty($behance)) { ?>
              value="<?php echo esc_attr($behance); ?>"
            <?php } ?>>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text"
            <?php if(isset($linkedin) && !empty($linkedin)) { ?>
              value="<?php echo esc_attr($linkedin); ?>"
            <?php } ?>>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text"
            <?php if(isset($pinterest) && !empty($pinterest)) { ?>
              value="<?php echo esc_attr($pinterest); ?>"
            <?php } ?>>
        </p>
        <?php
    }
  public function widget($args, $instance) {
    $title = apply_filters('widget_title', $instance['title']);
    $facebook = $instance['facebook'];
    $twitter = $instance['twitter'];
    $behance = $instance['behance'];
    $linkedin = $instance['linkedin'];
    $pinterest = $instance['pinterest'];
    // social profile link
    $facebook_profile = '<li><a class="facebook" href="' . esc_url($facebook) . '"><i class="fab fa-facebook-f"></i></a></li>';
    $twitter_profile = '<li><a class="twitter" href="' . esc_url($twitter) . '"><i class="fab fa-twitter"></i></a></li>';
    $behance_profile = '<li><a class="behance" href="' . esc_url($behance) . '"><i class="fab fa-behance"></i></a></li>';
    $linkedin_profile = '<li><a class="linkedin" href="' . esc_url($linkedin) . '"><i class="fab fa-linkedin-in"></i></a></li>';
    $pinterest_profile = '<li><a class="linkedin" href="' . esc_url($pinterest) . '"><i class="fab fa-pinterest"></i></a></li>';
    echo $args['before_widget'];
    if (!empty($title)) {
    echo $args['before_title'] . $title . $args['after_title'];
    }
    echo '<ul class="social-icons footer-social">';
    echo (!empty($facebook) ) ? $facebook_profile : null;
    echo (!empty($twitter) ) ? $twitter_profile : null;
    echo (!empty($behance) ) ? $behance_profile : null;
    echo (!empty($linkedin) ) ? $linkedin_profile : null;
    echo (!empty($pinterest) ) ? $pinterest_profile : null;
    echo '</ul>';
    echo $args['after_widget'];
  }
}
