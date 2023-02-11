<?php
/*----------------------------------------
Sigma Call to action Widget
----------------------------------------*/
class Sigma_Cta_Widget extends WP_Widget {
	public function __construct(){
		parent::__construct('Sigma_Cta_Widget',esc_html__('Sigma Call to action Widget','sigma-core'),array(
		'description' => esc_html__('Sigma Call to action Widget','sigma-core'),
		));
	}
	public function widget($args,$instance){
    $cta_btn_link = $instance['cta_btn_link'];
    $cta_btn_title = $instance['cta_btn_title'];
    $cta_btn_subtitle = $instance['cta_btn_subtitle'];
    $img = $instance['image_uri'];

		print $args['before_widget'];
    ?>
		<div class="sidebar-cta">
		<a href="<?php echo esc_url($cta_btn_link); ?>" class="andro_btn-custom">
		  <img src="<?php echo esc_url($instance['image_uri']); ?>" alt="call to action image"/>
			<?php if($cta_btn_title || $cta_btn_subtitle) { ?>
			<div class="cta-content">
				<h5><span><?php echo esc_html($cta_btn_subtitle); ?></span></h5>
				<h3><?php echo esc_html($cta_btn_title); ?></h3>
			</div>
		<?php } ?>
			</a>
		</div>
    <?php
		print $args['after_widget'];
	}

	public function form($instance){
    $cta_btn_link = isset($instance['cta_btn_link']) ? $instance['cta_btn_link'] : '';
    $cta_btn_title = isset($instance['cta_btn_title']) ? $instance['cta_btn_title'] : '';
    $cta_btn_subtitle = isset($instance['cta_btn_subtitle']) ? $instance['cta_btn_subtitle'] : '';
    $img = isset($instance['image_uri']) ? $instance['image_uri'] : '';
    ?>
    <p>
      <label for="cta_btn_link"><?php echo esc_html__("Link:", "sigma-core") ?></label>
      <input type="text" id="<?php print $this->get_field_id('cta_btn_link'); ?>" class="widefat" name="<?php print $this->get_field_name('cta_btn_link'); ?>" value="<?php print $cta_btn_link; ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'image_uri' ); ?>"><?php echo esc_html__('Image', 'sigma-core') ?></label>
      <input type="text" class="widefat <?php echo esc_attr($this->id) ?>_url" name="<?php echo $this->get_field_name( 'image_uri' ); ?>" value="<?php echo $img ?>" style="margin-top:5px;" />
      <img class="<?php echo $this->id ?>_img" src="<?php echo esc_url($img) ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
      <input type="button" id="<?php echo esc_attr($this->id) ?>" class="button button-primary js_custom_upload_media" value="<?php echo esc_attr__('Upload Image', 'sigma-core') ?>" style="margin-top:5px;" />
    </p>
		<p>
			<label for="cta_btn_subtitle"><?php echo esc_html__("Subtitle", "sigma-core") ?></label>
			<input type="text" id="<?php print $this->get_field_id('cta_btn_subtitle'); ?>" class="widefat" name="<?php print $this->get_field_name('cta_btn_subtitle'); ?>" value="<?php print $cta_btn_subtitle; ?>">
		</p>
		<p>
			<label for="cta_btn_title"><?php echo esc_html__("Title", "sigma-core") ?></label>
			<input type="text" id="<?php print $this->get_field_id('cta_btn_title'); ?>" class="widefat" name="<?php print $this->get_field_name('cta_btn_title'); ?>" value="<?php print $cta_btn_title; ?>">
		</p>

    <?php
	}
}
