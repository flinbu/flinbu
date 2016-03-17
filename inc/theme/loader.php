<?php
    function enqueue_scripts(){
        $scripts = array(
            array(
              'name' => 'sweet-alert-styles',
              'type' => 'style'
            ),
            array(
              'name' => 'flinbu-styles',
              'type' => 'style'
            ),
            array(
              'name' => 'jquery',
              'type' => 'script'
            ),
            array(
              'name' => 'bootstrap',
              'type' => 'script'
            ),
            array(
              'name' => 'scroll-reveal',
              'type' => 'script'
            ),
            array(
              'name' => 'parallax',
              'type' => 'script'
            ),
            array(
              'name' => 'sweet-alert-scripts',
              'type' => 'script'
            ),
            array(
              'name' => 'isotope',
              'type' => 'script'
            ),
            array(
              'name' => 'animate-number',
              'type' => 'script'
            ),
            array(
              'name' => 'web-font-loader',
              'type' => 'script'
            ),
            array(
              'name' => 'flinbu-scripts',
              'type' => 'script'
            )
        );
        enqueue_this($scripts);

        $data = array(
          'ajax' => admin_url('admin-ajax.php'),
          'home_url' => get_bloginfo('url'),
          'current_url' => get_permalink(get_the_ID()),
          'user_nonce' => wp_create_nonce('user_nonce'),
          't' => get_template_directory_uri(),
          'fid' => get_theme_option('facebook_app_id')
        );
        wp_localize_script('flinbu-scripts' . $sufix, 'flinbu', $data);
    }
    add_action('wp_enqueue_scripts', 'enqueue_scripts');

    function state_admin_bar() {
      return false;
    }
    add_filter('show_admin_bar', 'state_admin_bar');

    function header_third_scripts() {
        theme_third_scripts('header');
    }
    add_action('wp_head', 'header_third_scripts', 10);

    function footer_third_scripts() {
        theme_third_scripts('footer');
    }
    add_action('wp_footer', 'footer_third_scripts', 1);

    add_action('wp_head', 'meta_tags', 0);

    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page();
    }
?>
