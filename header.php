<!DOCTYPE html>
<html>
  <head>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class($GLOBALS['device']); ?>>
    <?php open_body(); ?>
    <main class="container-fluid">
      <div class="row">
        <?php
          if (is_home() || is_front_page()) {
            get_template_part('templates/header/header', 'home');
          } else {
            get_template_part('templates/header/header', 'common');
          }
        ?>
