<?php
    $sizes = array(
        array('150x150', 150, 150, true),
        array('300x300', 300, 300, true),
        array('400x400', 400, 400, true),
        array('800x600', 800, 600, true),
        array('800x700', 800, 700, true),
        array('1024x1024', 1024, 1024, true),
        array('1360x768', 1360, 768, true)
    );
    add_image_sizes($sizes);

    add_filter('jpeg_quality', create_function('', 'return 97;'));

    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');
?>
