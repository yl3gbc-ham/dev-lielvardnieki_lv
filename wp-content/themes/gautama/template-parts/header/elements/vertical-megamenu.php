<?php

$display_v_megamenu = gautama_get_option('display_v_megamenu');
$v_megamenu_text = gautama_get_option('v_megamenu_text');
$v_megamenu_menu = gautama_get_option('v_megamenu_menu');

if( $display_v_megamenu && !empty($v_megamenu_text) && !empty($v_megamenu_menu) ){ ?>
<div class="sigma-v-megamenu">
  <a href="#" class="sigma-v-megamenu-trigger"> <?php echo esc_html($v_megamenu_text) ?> <i class="far fa-chevron-down"></i> </a>
  <?php wp_nav_menu(['menu' => $v_megamenu_menu, 'container_class' => 'sigma-v-megamenu-menu-wrap']); ?>
</div>
<?php } ?>
