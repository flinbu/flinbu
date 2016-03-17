<?php
  $module_background = get_theme_option('module_main_background_image');
  $module_logo = get_theme_option('module_main_logo');
?>
<section class="module main full-size container-fluid">
  <div class="content">
    <div class="vertical">
      <div class="col-xs-12 col-md-4 col-md-offset-4">
        <h1 class="center-block col-xs-12 logo">
          <?php if ($module_logo) : $logo = wp_get_attachment_image_src($module_logo, 'full'); ?>
            <img src="<?=$logo[0];?>" alt="<?php bloginfo('name'); ?>" class="img-responsive center-block">
          <?php else :
            bloginfo('name');
          endif; ?>
        </h1>
      </div>
    </div>
  </div>
  <?php if ($module_background) : $background = wp_get_attachment_image_src($module_background, '1360x768'); ?>
    <div class="background parallax">
      <img src="<?=$background[0];?>" class="img-responsive center-block">
    </div>
  <?php endif; ?>
  <div class="clearfix"></div>
</section>
