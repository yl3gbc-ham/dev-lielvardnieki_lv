<?php

$page_template = gautama_get_option('404_type_page_template');

if( empty($page_template) ){
	return;
}

$post = get_post($page_template);

?>
<div class="sigma-template sigma-404-template sigma-template-<?php echo esc_attr($subheader_template) ?>">
  <div class="container">
    <div class="entry-content clearfix">
      <?php echo do_shortcode($post->post_content); ?>
    </div>
  </div>
</div>
