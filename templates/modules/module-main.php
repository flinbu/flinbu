<?php
  $module_background = get_theme_option('module_main_background_image');
  $module_logo = get_theme_option('module_main_logo');
?>
<section class="module main full-size container-fluid <?=$GLOBALS['device'];?>">
  <div class="content main">
    <div class="vertical">
      <div class="col-xs-12 col-md-4 col-md-offset-4">
        <h1 class="center-block col-xs-12 logo">
          <?php if ($module_logo) : $logo = wp_get_attachment_image_src($module_logo, 'full'); ?>
            <img src="<?=$logo[0];?>" alt="<?php bloginfo('name'); ?>" class="img-responsive center-block" data-sr="wait 1s, opacity 0, enter top, move 100px, reset">
          <?php else :
            bloginfo('name');
          endif; ?>
        </h1>
        <?php place_widget('social-icons'); ?>
      </div>
    </div>
  </div>
  <img src="<?php asset('img/mouse_icon.svg'); ?>" class="img-responsive center-block mouse-icon" data-sr="wait 2s, opacity 0, enter bottom, move 50px, reset">
  <?php if ($module_background) : $background = wp_get_attachment_image_src($module_background, '1360x768'); ?>
    <div class="background parallax <?=$GLOBALS['device'];?>" style="background-image: url(<?=$background[0];?>);" data-speed="2"></div>
  <?php endif; ?>
  <div class="clearfix"></div>
</section>
<div class="clearfix"></div>
