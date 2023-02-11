<?php

$slider = gautama_get_option('404_type_slider');

if( empty($slider) ){
	return;
}

echo do_shortcode( '[rev_slider alias="' . $slider . '"]' );
?>
