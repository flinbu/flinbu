<?php
  add_action('wp_enqueue_scripts', 'custom_scripts');
  function custom_scripts() {
    global $theme_location;
    $css = $theme_location . '/assets/css';
    $js = $theme_location . '/assets/js';
    $plugins = $theme_location . '/assets/js/plugins';
    $svg = $theme_location . '/assets/svg';

    $scripts = array(
      //Custom JS and CSS
      array(
        'name' => 'flinbu-styles',
        'type' => 'style',
        'location' => $css . '/flinbu.css'
      ),
      array(
        'name' => 'flinbu-scripts',
        'type' => 'script',
        'location' => $js . '/flinbu.js',
        'deps' => array('jquery', 'bootstrap', 'scroll-reveal', 'parallax', 'sweet-alert-scripts', 'animate-number', 'isotope', 'web-font-loader'),
        'footer' => true
      ),
      //Bootstrap
      array(
        'name' => 'bootstrap',
        'type' => 'script',
        'location' => $plugins . '/bootstrap/bootstrap.min.js',
        'deps' => array('jquery'),
        'footer' => true
      ),
      //Scroll Reveal
      array(
        'name' => 'scroll-reveal',
        'type' => 'script',
        'location' => $plugins . '/scrollreveal/scrollreveal.min.js',
        'deps' => array('jquery'),
        'footer' => true
      ),
      //Parallax
      array(
        'name' => 'parallax',
        'type' => 'script',
        'location' => $plugins . '/parallax/parallax.min.js',
        'deps' => array('jquery'),
        'footer' => true
      ),
      //Sweet Alerts
      array(
        'name' => 'sweet-alert-scripts',
        'type' => 'script',
        'location' => $plugins . '/sweetalert/sweetalert.min.js',
        'deps' => array('jquery'),
        'footer' => true
      ),
      array(
        'name' => 'sweet-alert-styles',
        'type' => 'style',
        'location' => $plugins . '/sweetalert/sweetalert.min.css'
      ),
      //Isotope
      array(
        'name' => 'isotope',
        'type' => 'script',
        'location' => $plugins . '/isotope/jquery.isotope.min.js',
        'deps' => array('jquery'),
        'footer' => true
      ),
      //Animate Number
      array(
        'name' => 'animate-number',
        'type' => 'script',
        'location' => $plugins . '/animatenumber/jquery.animateNumber.min.js',
        'deps' => array('jquery'),
        'footer' => true
      ),
      //Web Font Loader
      array(
          'name' => 'web-font-loader',
          'type' => 'script',
          'location' => 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js',
          'footer' => true
      ),
    );

    register_this($scripts);
  }
?>
