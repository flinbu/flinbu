<?php
  /**
   * Template Name: Home
   */
   if (have_posts()) {
     while (have_posts()) {
       get_header();
       get_template_part('templates/modules/module', 'main');
       $modules = get_field('modules');
       foreach ($modules as $module) {
         get_template_part('templates/modules/module', $module['module']);
       }
       get_footer();
     }
   }
?>
