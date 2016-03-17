<?php
  /**
   * Template Name: Home
   */
   get_header();
   get_template_part('templates/modules/module', 'main');
   $modules = get_field('modules');
   foreach ($modules as $module) {
     $module_name = get_field('dev_name', $module['module']);
     get_template_part('templates/modules/module', $module_name);
   }
   get_footer();
?>
