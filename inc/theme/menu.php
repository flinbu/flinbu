<?php
    function add_nav_menus() {
        register_nav_menus(array(
            'header_menu' => 'Main Menu',
            'footer_menu' => 'Footer Menu',
            'menu_404' => 'Menú 404'
        ));
    }
    add_action('init', 'add_nav_menus');
?>
