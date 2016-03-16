<?php
/**
 * Copyright 2015 Felipe Linares (flinbu)
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in Wordpress themning proccess.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 */

/**
 * Get option from options page (advance custom fields pro plugin required)
 * @param  {string} $option [opiton id]
 * @return {mix} return data required, array, OBJECT, string, int, etc...
 */
 function get_theme_option($option){
 	if(function_exists('get_field')){
 		return get_field($option, 'option');
 	}
 }

/**
 * Get the device type mobileDetect class required
 * @return {string} Device type
 */
function device_class(){
	$device = new Mobile_Detect();

	if( $device->isMobile() ){
		$back = 'mobile';
	}
	if( $device->isTablet() ){
		$back = 'tablet';
	}
	if( !$device->isMobile() && !$device->isTablet() ){
		$back = 'desktop';
	}
	return $back;
}

/**
 * Add son span tags in the string
 * @param  {string} $title The string to stylize
 * @return {string} The string stylized
 */
function stylize_this_title($title){
	$title = utf8_decode($title);
	$special_char = '&ÁÉÍÓÚÑáéíóúñ¡¿';
    $module_title = str_word_count($title, 1);
    $middle_title = floor(count($module_title) / 2);
    $the_module_title = '';
    for ($i=0; $i < count($module_title); $i++) {
        if($i != $middle_title){
            $the_module_title .= $module_title[$i] . ' ';
        }else{
            $the_module_title .= '<span>' . $module_title[$i] . ' ';
        }
        if($i == count($module_title)-1){
            $the_module_title .= '</span>';
        }
    }
    return utf8_encode($the_module_title);
}

/**
 * Print the current page title to the header title tag
 * @return {void} The formatted title
 */
function page_title(){
	wp_title('&raquo;&nbsp;', TRUE, 'right');
	bloginfo('name');
}

/**
 * Print some meta tags
 * @return {void} The HTML meta tags
 */
function meta_tags(){
	echo '<meta charset="'.get_bloginfo('charset').'" />';
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
	echo '<meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1">';
  echo '<meta name="format-detection" content="telephone=no">';
  echo '<meta http-equiv="x-rim-auto-match" content="none">';
  if (is_home() || is_front_page()) {
    app_launcher_tags();
  }
}

/**
 * Print meta tags for app launcher on iOS and Chrome
 * @return void
 */
function app_launcher_tags() {
  echo '<meta name="apple-mobile-web-app-capable" content="yes">';
  echo '<meta name="apple-mobile-web-app-title" content="' . get_theme_option('launcher_short_name') . '">';
  echo '<meta name="apple-mobile-web-app-status-bar-style" content="black">';

  $icon60x60 = get_theme_option('launcher_icon_60x60');
  $icon76x76 = get_theme_option('launcher_icon_76x76');
  $icon96x96 = get_theme_option('launcher_icon_96x96');
  $icon120x120 = get_theme_option('launcher_icon_120x120');
  $icon144x144 = get_theme_option('launcher_icon_144x144');
  $icon152x152 = get_theme_option('launcher_icon_152x152');
  $icon192x192 = get_theme_option('launcher_icon_192x192');

  if ($icon60x60) {
    echo '<link href="' . $icon60x60 . '" sizes="60x60" rel="apple-touch-icon" />';
  }
  if ($icon76x76) {
    echo '<link href="' . $icon76x76 . '" sizes="76x76" rel="apple-touch-icon" />';
  }
  if ($icon96x96) {
    echo '<link href="' . $icon96x96 . '" sizes="96x96" rel="apple-touch-icon" />';
  }
  if ($icon120x120) {
    echo '<link href="' . $icon120x120 . '" sizes="120x120" rel="apple-touch-icon" />';
  }
  if ($icon144x144) {
    echo '<link href="' . $icon144x144 . '" sizes="144x144" rel="apple-touch-icon" />';
  }
  if ($icon152x152) {
    echo '<link href="' . $icon152x152 . '" sizes="152x152" rel="apple-touch-icon" />';
  }
  if ($icon192x192) {
    echo '<link href="' . $icon192x192 . '" sizes="192x192" rel="apple-touch-icon" />';
  }

  $startup1536x2008 = get_theme_option('launcher_startup_1536x2008');
  $startup1496x2048 = get_theme_option('launcher_startup_1496x2048');
  $startup768x1004 = get_theme_option('launcher_startup_768x1004');
  $startup748x1024 = get_theme_option('launcher_startup_748x1024');
  $startup1242x2148 = get_theme_option('launcher_startup_1242x2148');
  $startup1182x2208 = get_theme_option('launcher_startup_1182x2208');
  $startup750x1294 = get_theme_option('launcher_startup_750x1294');
  $startup640x1096 = get_theme_option('launcher_startup_640x1096');
  $startup640x920 = get_theme_option('launcher_startup_640x920');
  $startup320x460 = get_theme_option('launcher_startup_320x460');

  if ($startup1536x2008) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup1536x2008 . '" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" />';
  }
  if ($startup1496x2048) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup1496x2048 . '" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" />';
  }
  if ($startup768x1004) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup768x1004 . '" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (orientation: portrait)" />';
  }
  if ($startup748x1024) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup748x1024 . '" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (orientation: landscape)" />';
  }
  if ($startup1242x2148) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup1242x2148 . '" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" />';
  }
  if ($startup1182x2208) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup1182x2208 . '" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" />';
  }
  if ($startup750x1294) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup750x1294 . '" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" />';
  }
  if ($startup640x1096) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup640x1096 . '" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" />';
  }
  if ($startup640x920) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup640x920 . '" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" />';
  }
  if ($startup320x460) {
    echo '<link rel="apple-touch-startup-image" href="' . $startup320x460 . '" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" />';
  }
  echo '<link rel="manifest" href="' . get_permalink(get_theme_option('api_page')) . '/chrome-manifest" />';
}

/**
 * Cut the excerpt
 * @param {string} $charlength String to cut.
 * @return {string} The shorted string
 */
function get_lim_excerpt($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if (mb_strlen($excerpt) > $charlength) {
		$subex = mb_substr($excerpt, 0, $charlength - 5);
		$exwords = explode(' ', $subex);
		$excut = -( mb_strlen($exwords[count($exwords) - 1]));
		if ($excut < 0) {
			return mb_substr($subex, 0, $excut);
		} else {
			return $subex;
		}
	} else {
		return $excerpt;
	}
}

/**
 * Pritn get_lim_excerpt return
 * @param {string} $charlength String to cut.
 * @return {void} The shorted string
 */
function lim_excerpt($chartlength) {
	echo get_lim_excerpt($chartlength);
}

/**
 * Cut the WP Object title
 * @param {strig} $charlength String to cut.
 * @return {string} The shorted string
 */
function get_lim_title($charlength) {
	$title = get_the_title();
	$charlength++;

	if (mb_strlen($title) > $charlength) {
		$subti = mb_substr($title, 0, $charlength - 5);
		$exwords = explode(' ', $subti);
		$excut = -( mb_strlen($exwords[count($exwords) - 1]));
		if ($excut < 0) {
			return mb_substr($subti, 0, $excut) . '...';
		} else {
			return $subti . '...';
		}
	} else {
		return $title;
	}
}

/**
 * Print the get_lim_title result
 * @param {string} $charlength String to cut.
 * @return {void} The shorted string
 */
function lim_title($charlength) {
	echo get_lim_title($charlength);
}

/**
 * Return the WP Object publish date
 * @param {int} $postID WP Object ID to search
 * @return {array} Array with the date info (['day'], ['month'], ['year'])
 */
function get_array_date($postID) {
	$d = get_the_time('j-F-Y', $postID);
	$e = explode('-', $d);
	$date = array('day' => $e[0], 'month' => $e[1], 'year' => $e[2]);
	return $date;
}

/**
 * Print spanish formated get_array_date result
 * @return {void} The formatted date
 */
function this_date() {
	$postID = get_the_ID();
	$date = get_array_date($postID);
	echo 'El ' . $date['day'] . ' de ' . $date['month'] . ' del ' . $date['year'];
}

/**
 * Register theme script to WP
 * @param {array} $scripts Script to register
 */
 function register_this( $scripts ){
 	foreach( $scripts as $script ){
		$deps = (isset($script['deps'])) ? $script['deps'] : FALSE;
		$version = (isset($script['version'])) ? $script['version'] : '1.0.0';
 		if( $script['type'] == 'script' ){
 			$in_footer = (isset($script['footer'])) ? $script['footer'] : FALSE;
 			wp_register_script( $script['name'] , $script['location'], $deps, $version, $in_footer );
		} elseif( $script['type'] == 'style' ){
			wp_register_style( $script['name'] , $script['location'], $deps, $version );
		}
 	}
 }

 /**
  * Enqueue script to load with WP
  * @param {array} $scripts Scripts to enqueue (['name'], ['type'])
  */
 function enqueue_this( $scripts ){
 	foreach ($scripts as $script) {
 		if( $script['type'] == 'script' ){
 			wp_enqueue_script($script['name']);
 		} elseif( $script['type'] == 'style' ){
 			wp_enqueue_style($script['name']);
 		}
 	}
 }

 /**
  * Register the theme features
  * @param {array} $features The theme features
  */
 function support_this($features){
 	foreach ($features as $feature) {
 		if(isset($feature[1])){
 			add_theme_support($feature[0], $feature[1]);
 		} else {
 			add_theme_support($feature[0]);
 		}
 	}
 }

 /**
  * Add image sizes to WP
  * @param {srray} $sizes The sizes to add ([0] => {string} name, [1] => {int} width, [2] => {int} height, [3] => {bool} cut)
  */
 function add_image_sizes($sizes){
 	foreach ($sizes as $size){
 		add_image_size($size[0], $size[1], $size[2], $size[3]);
 	}
 }

 /**
  * Register sidebars to WP
  * @param {array} $sidebars Array whith arrays sidebar data (['name'], ['slug'], ['desc'])
  */
 function register_this_sidebars($sidebars){
 	global $theme_slug;
 	foreach ($sidebars as $sidebar){
 		register_sidebar(array(
 			'name' => $sidebar['name'],
 			'id' => $theme_slug . $sidebar['slug'],
 			'description' => $sidebar['desc'],
 			'class' => $sidebar['slug'],
 			'before_widget' => '<li id="%1$s" class="widget col-xs-12 col-sm-4 col-md-12 %2$s">',
 			'after_widget' => '</li>',
 			'before_title' => '<h3 class="title">',
 			'after_title' => '</h3>'
 		));
 	}
 }

/**
 * Check if a plugin is active
 * @param  {string}  $plugin Plugin name
 * @return {bool}
 */
 function is_this_plugin_active($plugin){
 	switch ($plugin) {
 		case 'woocommerce':
 			$path = 'woocommerce/woocommerce.php';
 			break;
 	}
 	return in_array($path, apply_filters('active_plugins', get_option('active_plugins')));
 }

/**
 * Register custom post type to WP
 * @param  {array} $post_types Array with data
 */
 function register_custom_post_types($post_types, $lang = 'es'){
	switch($lang){
		case 'es':
			$t = array(
				'add_new' => 'Añadir nuevo',
				'edit' => 'Editar',
				'new' => 'Nuevo',
				'all' => 'Todos',
				'see' => 'Ver',
				'search' => 'Buscar',
				'not_found' => 'no encontrados',
				'not_found_in_trash' => 'no encontrados en la papelera'
			);
			break;
		case 'en':
			$t = array(
				'add_new' => 'Add new',
				'edit' => 'Edit',
				'new' => 'New',
				'all' => 'All',
				'see' => 'See',
				'search' => 'Search',
				'not_found' => 'not found',
				'not_found_in_trash' => 'not found in the trash'
			);
			break;
	}
 	foreach ($post_types as $type){
 		if($type['level'] == 0){
 			$show_menu = TRUE;
 		} else {
 			$show_menu = 'edit.php?post_type=' . $type['parent_post_type'];
 		}
 		$labels = array(
 			'name' => $type['general_name'],
 			'singular_name' => _x($type['singular_name'], 'post type general name'),
 			'add_new' => _x($t['add_new'] . ' ' . $type['singular_name'], $type['name']),
 			'add_new_item' => __($t['add_new'] . ' ' . $type['singular_name']),
 			'edit_item' => __($t['edit'] . ' ' . $type['singular_name']),
 			'new_item' => __($t['new']),
 			'all_items' => ($type['level'] == 0) ? __($t['all'] . ' ' . $type['gen_conector'] . ' ' . $type['general_name']) : __($type['general_name']),
 			'view_item' => __($t['see'] . ' ' . $type['singular_name']),
 			'seach_items' => __($t['search'] . ' ' . $type['singular_name']),
 			'not_found' => __($type['general_name'] . ' ' . $t['not_found']),
 			'not_found_in_trash' => __($type['general_name'] . ' ' . $t['not_found_in_trash']),
 			'parent_item_colon' => '',
 			'menu_name' => $type['general_name']
 		);
 		$args = array(
 			'labels' => $labels,
 			'public' => TRUE,
 			'publicity_querable' => TRUE,
 			'show_ui' => TRUE,
 			'show_in_menu' => $show_menu,
 			'query_var' => TRUE,
 			'rewrite' => $type['rewrite'],
 			'capability_type' => 'post',
 			'has_archive' => TRUE,
 			'hierarchical' => TRUE,
 			'menu_position' => 20,
 			'exclude_from_search' => $type['exclude_from_search'],
 			'supports' => $type['supports'],
 			'menu_icon' => $type['icon']
 		);
 		register_post_type( $type['name'], $args );
 	}
 }

/**
 * Register taxonomies on Wordpress
 * @param  {array} $taxonomies array with taxonomies to register
 * @param  {string} $lang  the language of the labels
 * @return {void}
 */
 function register_this_taxonomies($taxonomies, $lang = 'es'){
	switch($lang){
		case 'es':
			$t = array(
				'add_new' => 'Añadir nuevo',
				'add' => 'Añadir',
				'remove' => 'eliminar',
				'edit' => 'Editar',
				'new' => 'Nuevo',
				'all' => 'Todos',
				'see' => 'Ver',
				'search' => 'Buscar',
				'no_found' => 'no encontrados',
				'not_found_in_trash' => 'no encontrados en la papelera',
				'update' => 'Actualizar',
				'parent' => 'Parent',
				'name' => 'Nombre',
				'popular' => 'populares',
				'separate_items_with_commas' => 'Separe los items con comas',
				'choose_from_most_used' => 'Escoge entre los más usados'
			);
			break;
		case 'en':
			$t = array(
				'add_new' => 'Add new',
				'add' => 'Add',
				'remove' => 'remove',
				'edit' => 'Edit',
				'new' => 'New',
				'all' => 'All',
				'see' => 'See',
				'search' => 'Search',
				'no_found' => 'not found',
				'not_found_in_trash' => 'not found in the trash',
				'update' => 'Update',
				'parent' => 'Parent',
				'name' => 'name',
				'popular' => 'popular',
				'separate_items_with_commas' => 'Separate items with commas',
				'choose_from_most_used' => 'Chose from most used'
			);
			break;
	}
 	foreach($taxonomies as $tax){
 		if($tax['hierarchical']){
			$labels = array(
				'name'              => _x( $tax['general_name'], 'taxonomy general name' ),
				'singular_name'     => _x( $tax['singular_name'], 'taxonomy singular name' ),
				'search_items'      => __( $t['search'] . ' ' . $tax['general_name'] ),
				'all_items'         => __( $t['all'] . ' ' . $tax['gen_conector'] . ' ' . $tax['general_name'] ),
				'parent_item'       => __( $tax['singular_name'] . ' ' . $t['parent'] ),
				'parent_item_colon' => __( $tax['singular_name'] . ' ' . $t['parent'] . ':' ),
				'edit_item'         => __( $t['edit'] . ' ' . $tax['singular_name'] ),
				'update_item'       => __( $t['update'] . ' ' . $tax['singular_name'] ),
				'add_new_item'      => __( $t['add_new'] . ' ' . $tax['singular_name'] ),
				'new_item_name'     => __( $t['name'] . ' ' . $t['new'] . ' ' . $tax['singular_name'] ),
				'menu_name'         => __( $tax['singular_name'] ),
			);
	 		$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => ($tax['show_ui']) ? $tax['show_ui'] : true,
				'show_admin_column' => ($tax['show_admin_column']) ? $tax['show_admin_column'] : true,
				'query_var'         => ($tax['query_var']) ? $tax['query_var'] : true,
				'rewrite'           => $tax['rewrite']
			);
 		} else {
			$labels = array(
				'name'                       => _x( $tax['general_name'], 'taxonomy general name' ),
				'singular_name'              => _x( $tax['singular_name'], 'taxonomy singular name' ),
				'search_items'               => __( $t['search'] . ' ' . $tax['general_name'] ),
				'popular_items'              => __( $tax['general_name'] . ' ' . $t['popular'] ),
				'all_items'                  => __( $t['all'] . ' ' . $tax['gen_conector'] . ' ' . $tax['general_name'] ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => __( $t['edit'] . ' ' . $tax['singular_name'] ),
				'update_item'                => __( $t['update'] . ' ' . $tax['singular_name'] ),
				'add_new_item'               => __( $t['add_new'] . ' ' . $tax['singular_name'] ),
				'new_item_name'              => __( $t['name'] . ' ' . $t['new'] . ' ' . $tax['singular_name'] ),
				'separate_items_with_commas' => __( $t['separate_items_with_commas'] ),
				'add_or_remove_items'        => __( $t['add'] . ' ' . $tax['sufix'] . ' ' .$t['remove'] . ' ' . $tax['general_name'] ),
				'choose_from_most_used'      => __( $t['choose_from_most_used'] ),
				'not_found'                  => __( $tax['general_name'] . ' ' . $t['not_found'] ),
				'menu_name'                  => __( $tax['general_name'] ),
			);
			$args = array(
				'hierarchical'          => false,
				'labels'                => $labels,
				'show_ui'               => ($tax['show_ui']) ? $tax['show_ui'] : true,
				'show_admin_column'     => ($tax['show_admin_column']) ? $tax['show_admin_column'] : true,
				'update_count_callback' => '_update_post_term_count',
				'query_var'             => ($tax['query_var']) ? $tax['query_var'] : true,
				'rewrite'               => $tax['rewrite']
			);
 		}
 		register_taxonomy( $tax['name'], $tax['post_type'], $args );
 	}
 }

/**
 * Add shortcodes to Wordpress
 * @param {array} $shortcodes array with shortcode name and function to add
 * @param {string} $path path to shorcodes files
 */
function add_this_shortcodes($shortcodes, $path){
	foreach ($shortcodes as $shortcode){
		require_once $path . $shortcode['func'] . '.php';
		add_shortcode($shortcode['name'], $shortcode['func']);
	}
}

/**
 * Devuelve o imprime herramientas sociales de Facebook
 * @param $what (string)(req) La herramienta social necesitada  (Ver documentación en http://flinbu.com/themes/docs/functions/social/#get_facebook)
 * @param $params (array) Parametros para las herramientas sociales  (Ver documentación en http://flinbu.com/themes/docs/functions/social/#get_facebook)
 * @param $return (boolean) TRUE, devuelve un string - FALSE (default) Imprime el string
 * @return string, void
 */
 function get_facebook($what, $params = array(), $return = FALSE) {
 	if($what == 'scripts') {
 		$fb_app_id = get_theme_option( 'facebook_app_id' );
        $back = '<div id="fb-root"></div>
                <script>
                    window.fbAsyncInit = function() {
                      FB.init({
                        appId : \'' . $fb_app_id . '\',
                        xfbml : true,
                        cookie : true,
                        version : \'v2.5\'
                      });
                    };
                    (function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=' . $fb_app_id . '";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, \'script\', \'facebook-jssdk\'));
                </script>';
	} elseif( $what == 'comments_count' ){
		$url = $params['url'];
	  	$json = json_decode(file_get_contents('https://graph.facebook.com/?ids=' . $url));
	  	$back = isset($json->$url->comments) ? $json->$url->comments : 0;
	} else {
		$fb_class = '';
		$data = '';
		switch ($what) {
			case 'like_button' :
				$fb_class = 'like';
				break;
			case 'share_button' :
				$fb_class = 'share-button';
				break;
			case 'send_button' :
				$fb_class = 'send';
				break;
			case 'embedded_posts' :
				$fb_class = 'post';
				break;
			case 'follow_button' :
				$fb_class = 'follow';
				break;
			case 'comments' :
				$fb_class = 'comments';
				break;
			case 'activity_feed' :
				$fb_class = 'activity';
				break;
			case 'recommendations_feed' :
				$fb_class = 'recommendations';
				break;
			case 'recommendations_bar' :
				$fb_class = 'recommendations-bar';
				break;
			case 'like_box' :
				$fb_class = 'like-box';
				break;
			case 'facepile' :
				$fb_class = 'facepile';
				break;
		}
		foreach ($params as $key => $value) {
			switch($key) {
				case 'url' :
					$data .= 'data-href="'.$value.'" ';
					break;
				case 'width' :
					$data .= 'data-width="'.$value.'" ';
					break;
				case 'height' :
					$data .= 'data-height="'.$value.'" ';
					break;
				case 'layout' :
					$data .= 'data-layout="'.$value.'" ';
					break;
				case 'action' :
					$data .= 'data-action="'.$value.'" ';
					break;
				case 'show_faces' :
					$data .= 'data-show-faces="'.$value.'" ';
					break;
				case 'share_button' :
					$data .= 'data-share="'.$value.'" ';
					break;
				case 'colorscheme' :
					$data .= 'data-colorscheme="'.$value.'" ';
					break;
				case 'numberposts' :
					$data .= 'data-numposts="'.$value.'" ';
					break;
				case 'max_rows' :
					$data .= 'data-max-rows="'.$value.'" ';
					break;
				case 'domain' :
					$data .= 'data-site="'.$value.'" ';
					break;
				case 'show_header' :
					$data .= 'data-show-header="'.$value.'" ';
					break;
				case 'show_posts' :
					$data .= 'data-show-posts="'.$value.'" ';
					break;
				case 'show_border' :
					$data .= 'data-show-border="'.$value.'" ';
					break;
				case 'show_count' :
					$data .= 'data-show-count="'.$value.'" ';
					break;
				case 'photo_size' :
					$data .= 'data-size="'.$value.'" ';
					break;
				case 'mobile' :
					$data .= 'data-mobile="'.$value.'" ';
					break;
			}
		}
		$back = '<div class="fb-'.$fb_class.'" '.$data.'></div>';
	}
	if ($return) {
		return $back;
	} else {
		echo $back;
	}
 }

/**
 * Print Google Analytics scripts or send event function
 * @param  string $data    What you need? (script, event)
 * @param  array  $options Options to pass, visit http://flinbu.com/themes/docs/functions/get_google_analytics to get more info
 * @return string          The Google Analytics code
 */
function get_google_analytics($data, $options = array()) {
  $ga = '';
  if ($data == 'scripts' ) {
    $uacode = $options['uacode'];
    $ga = "<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google­analytics.com/analytics.js','ga');ga('create', '$uacode', 'auto');ga('send', 'pageview');</script>";
  } else if ($data == 'event') {
    $ga = 'ga(\'send\', \'event\', \'' . $options['category'] . '\', \'' . $options['label'] . '\', \'' . $options['flag'] . '\');';
  }
  return $ga;
}

/**
 * Print Google Analytics scripts from get_google_analytics
 * @return void
 */
function google_analytics_script() {
  $options = array(
    'uacode' => get_theme_option('g_ua_code')
  );
  echo get_google_analytics('scripts', $options);
}

/**
 * Get comments number from Facebook
 * @param  {int} $post_id WP Object ID
 * @return {int} Total comments number
 */
function get_facebook_comments_count($post_id){
    $url = get_permalink($post_id);
    $fb_connect = 'https://graph.facebook.com/v2.3/?fields=share{comment_count}&id=' . $url;
    $fb_data = file_get_contents($fb_connect);
    $fb_data = json_decode($fb_data);

    return $fb_data->share->comment_count;
}

/**
 * Print comments label
 * @param {int} $post_id WP Object ID
 * @param {string} [$device = 'desktop'] The out format
 */
function facebook_comments_number($post_id, $device = 'desktop'){
    $fb_count = get_facebook_comments_count($post_id);
    switch($device){
        case 'desktop':
            if($fb_count == 1){
                $fb_label = ' comentario';
            } else {
                $fb_label = ' comentarios';
            }
            $back = $fb_count . $fb_label;
            break;
        case 'mobile':
            $back = $fb_count;
            break;
    }
    echo $back;
}

/**
 * Print formatted whit <pre> tag the print_r resutls
 * @param {object, array, string, int, bool} $w The object to format
 */
function print_pre($w) {
	echo '<pre>';
	print_r($w);
	echo '</pre>';
}

/**
 * Limit string
 * @param {string} $str The string to limit
 * @param {int} $long Characters length
 * @param {bool} $returnIndica TRUE to print, FALSE to return
 * @return {void, string}
 */
function get_lim_this($str, $long, $return = FALSE) {
	$excerpt = $str;
	$charlenth = $long;
	$charlength++;
	if (mb_strlen($excerpt) > $charlength) {
		$subex = mb_substr($excerpt, 0, $charlength - 5);
		$exwords = explode(' ', $subex);
		$excut = -( mb_strlen($exwords[count($exwords) - 1]));
		if ($excut < 0) {
			$back = mb_substr($subex, 0, $excut);
		} else {
			$back = $subex;
		}
	} else {
		$back = $excerpt;
	}
	if ($return) {
		return $back;
	} else {
		echo $back;
	}
}

function lim_this($str, $long) {
  echo get_lim_this($str, $long);
}

/**
 * Return the WP Post parent ID
 * @param {int} $post_id WP Post ID
 * @return {int, array}
 */
function get_post_parent($post_id) {
	$postObj = get_post($post_id);
	$parent = $postObj -> post_parent;
	return $parent;
}

/**
 * Get and object with the post thumbnail
 * @param  {int} $id   [post id]
 * @param  {string} $size [image size]
 * @return {array}       [object with data]
 */
function get_thumb($id, $size) {
	$opid = get_post_thumbnail_id($id);
	return wp_get_attachment_image_src($opid, $size);
}

/**
 * To generate breadcrumb with the yoast breadcrumb plugin
 * @return {void} [print html]
 */
function breadcrumbs() {
	if (function_exists('yoast_breadcrumb')) :
		yoast_breadcrumb('<div id="breadcrumb">', '</div>');
	endif;
}

/**
 * Return month name from a month number
 * @param  {int}  $num  [month number]
 * @param  {string}  $how  [full name or short name]
 * @param  boolean $echo [print or return]
 * @return [void, string]        [the month name]
 */
function get_month_by_number($num, $how = 'full', $echo = FALSE) {
	switch($num) {
		case 01 :
			$month = 'Enero';
			$resum = 'Ene';
			break;
		case 02 :
			$month = 'Febrero';
			$resum = 'Feb';
			break;
		case 03 :
			$month = 'Marzo';
			$resum = 'Mar';
			break;
		case 04 :
			$month = 'Abril';
			$resum = 'Abr';
			break;
		case 05 :
			$month = 'Mayo';
			$resum = 'May';
			break;
		case 06 :
			$month = 'Junio';
			$resum = 'Jun';
			break;
		case 07 :
			$month = 'Julio';
			$resum = 'Jul';
			break;
		case 08 :
			$month = 'Agosto';
			$resum = 'Ago';
			break;
		case 09 :
			$month = 'Septiembre';
			$resum = 'Sep';
			break;
		case 10 :
			$month = 'Octubre';
			$resum = 'Oct';
			break;
		case 11 :
			$month = 'Noviembre';
			$resum = 'Nov';
			break;
		case 12 :
			$month = 'Diciembre';
			$resum = 'Dic';
			break;
	}
	switch($how) {
		case 'full' :
			$back = $month;
			break;
		case 'min' :
			$back = $resum;
	}
	if ($echo) {
		echo $back;
	} else {
		return $back;
	}
}

/**
 * Grab youtube id video from URL
 * @param  {string} $url [Youtube video url]
 * @return {string}      [Video ID]
 */
function the_youtube_id($url) {
	$url_string = parse_url($url, PHP_URL_QUERY);
	parse_str($url_string, $args);
	$video = ($args['v']) ? $args['v'] : $url;
	if (strpos($video, '.be/')) {
		$vid_arr = explode('/', $video);
		$vid_id = $vid_arr[3];
	} elseif (strpos($video, '/v/')) {
		$vid_arr = explode('/', $video);
		$vid_id = $vid_arr[4];
	} elseif (strpos($video, '/embed/')) {
		$vid_arr = explode('/', $video);
		$vid_id = $vid_arr[4];
	} else {
		$vid_id = explode('?', $video);
    $vid_id = $vid_id[0];
	}
	return $vid_id;
}

/**
 * Grab vimeo video id from url
 * @param  {string} $url [Vimeo video url]
 * @return {string}      [Video id]
 */
function the_vimeo_id($url){
	$url = explode('/',$url);
	return $url[3];
}

/**
 * Convert an array to XML
 * @param  array $array   The array to convert
 * @param  string $lastkey descthe close keyription
 * @return string  xml structure
 */
function arrayToXml($array, $lastkey) {
    $buffer.="<".$lastkey.">\n";
    if (!is_array($array))
    {$buffer.=$array;}
    else
    {
        foreach($array as $key=>$value)
        {
            if (is_array($value))
            {
                if ( is_numeric(key($value)))
                {
                    foreach($value as $bkey=>$bvalue)
                    {
                        $buffer.=arrayToXml($bvalue,$key);
                    }
                }
                else
                {
                    $buffer.=arrayToXml($value,$key);
                }
            }
            else
            {
                $buffer.=arrayToXml($value,$key);
            }
        }
    }
    $buffer.="</".$lastkey.">\n";
    return $buffer;
}

/**
 * Grab values from meta key
 * @param  string $key    Meta key
 * @param  string $type   Post type
 * @param  string $status Post status
 * @return mix Meta value
 */
function get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {
    global $wpdb;
    if( empty( $key ) )
        return;
    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s'
        AND p.post_status = '%s'
        AND p.post_type = '%s'
    ", $key, $status, $type ) );
    return array_unique($r);
}

/**
 * Get user role
 * @return string user role
 */
function get_user_role() {
	global $current_user;

	$user_roles = $current_user->roles;
	$user_role = array_shift($user_roles);

	return $user_role;
}

function get_share_data($post_id){
	$link = get_permalink($post_id);
	$api = 'https://free.sharedcount.com/url?url=' . $link . '&apikey=' . get_theme_option('shared_count_api_key');

	$data = file_get_contents($api);

	$data = json_decode($data);

	return $data;
}

function update_share_data($post_id){
	$networks = array('facebook', 'twitter', 'pinterest', 'gplus', 'whatsapp', 'email');
	$data = get_share_data($post_id);

	$new_total = 0;
	foreach ($networks as $network) {
		if($network == 'whatsapp' || $network == 'email' || $network == 'gplus') {
			$current = get_post_meta($post_id, 'share_' . $network, true);
			if(!$current){
				add_post_meta($post_id, 'share_' . $network, '0');
				$current = 0;
			}
		} else {
			$net = $network;
			if($network == 'gplus'){
				$net = 'GooglePlusOne';
			}
			$current = get_post_meta($post_id, 'share_' . $network, true);
			if(!$current){
				$new_data = $data->$network;
				if($network == 'facebook'){
					$new_data = $data->facebook->share_count;
				}
				add_post_meta($post_id, 'share_' . $network, $new_data);
			}

			$new_data = $data->$network;
			if($network == 'facebook'){
				$new_data = $data->facebook->share_count;
			}

			update_post_meta($post_id, 'share_' . $network, $new_data);
		}
	}

	$total = get_post_meta($post_id, 'share_total', true);

	$total_data = 0;
	foreach($networks as $network){
		$total_data += get_post_meta($post_id, 'share_' . $network, true);
	}
	if(!$total){
		add_post_meta($post_id, 'share_total', '0');
	}
	update_post_meta($post_id, 'share_total', $total_data);
}

function get_shares($post_id, $network){
	$shares = get_post_meta($post_id, 'share_' . $network, true);
	return ($shares) ? $shares : 0;
}

/**
 * clear_share_meta( $post_id )
 * Borra los meta datos con la infomación de la actividad del post en redes sociales.
 * Deshace post_social_share_data();
 * @param  {int} $post_id [ID del post]
 * @return void
 */
function clear_share_meta( $post_id ){
	delete_post_meta( $post_id, 'share_total' );
	delete_post_meta( $post_id, 'share_facebook' );
	delete_post_meta( $post_id, 'share_twitter' );
	delete_post_meta( $post_id, 'share_gplus' );
	delete_post_meta( $post_id, 'share_pinterest' );
}

/**
 * Grab post likes
 * @param  int $post_id The post id
 * @return int total likes
 */
function get_likes($post_id) {
	$likes = get_post_meta($post_id, 'likes', true);

	return ($likes) ? $likes : 0;
}

/**
 * Grab post mails
 * @param  int $post_id The post id
 * @return int total likes
 */
function get_mails($post_id) {
	$mails = get_post_meta($post_id, 'mail_share', true);

	return ($mails) ? $mails : 0;
}

/**
 * Check if the latest published post
 * @param  int $post_id (optional) The post ID to check. Defautl: Current post ID in the loop.
 * @return boolean
 */
function is_latest_post($post_id = null){
	$ID = ($post_id) ? $post_id : get_the_ID();
	$last = wp_get_recent_posts('1');
	if($ID == $last[0]['ID']){
		return true;
	} else {
		return false;
	}
}

/**
 * Print the copyright information
 * return void
 **/
function copyright(){
	$copy_text = get_theme_option('copyright_text');
	$search = array(
		'%year%',
		'%sitename%',
		'%c%'
	);
	$replace = array(
		date('Y'),
		get_bloginfo('name'),
		'&copy;'
	);
	echo str_replace($search, $replace, $copy_text);
}

/**
 * Print specific location scripts added in options panel
 * @param {string} $location The theme script location
 * return void
 **/
function theme_third_scripts($location){
	$scripts = get_theme_option($location);
    if($scripts){
        foreach ($scripts as $script) {
            $search = array(
                '%facebook_app_secret%',
                '%facebook_app_id%',
                '%google_app_id%',
                '%google_app_secret%',
                '%google_app_client_id%',
                '%home_url%'
            );
            $replace = array(
                get_theme_option('facebook_app_secret'),
                get_theme_option('facebook_app_id'),
                get_theme_option('google_app_id'),
                get_theme_option('google_app_secret'),
                get_theme_option('google_app_client_id'),
                get_bloginfo('home')
            );

            $the_script = str_replace($search, $replace, $script['script']);
            echo $the_script;
        }
    }
}

/**
 * Get the SEO information from the SEO by Yoast plugin
 * @param  {string} $type The object type to search for
 * @param  {int} $id   The object ID
 * @return {object} Object whit $seo->title and $seo->description
 */
function get_seo($type, $id){
	$seo = new stdClass;
	switch($type){
		case 'category':
			$meta = get_option('wpseo_taxonomy_meta');
			$seo->title = $meta['category'][$id]['wpseo_title'];
			$seo->description = $meta['category'][$id]['wpseo_desc'];
			break;
		case 'post':
			$seo->title = get_post_meta($id, '_yoast_wpseo_title', true);
			$seo->description = get_post_meta($id, '_yoast_wpseo_metadesc', true);
			break;
	}
	return $seo;
}

/**
 * Print or return the single ID for object
 * @param  {string} [$content_type = 'page'] The content type of the object (category, tag post or page)
 * @param  {bool} [$display = true] TRUE to print the result or FALSE to return it
 * @return {void, string} The object title
 */
function the_page_title($content_type = 'page', $display = true){
	switch ($content_type) {
		case 'page':
			if($display){
				the_title();
				die();
			} else {
				$title = get_the_title(get_the_ID());
			}
			break;
		case 'category':
			single_cat_title('', $display);
			if($display){
				die();
			}
			break;
		case 'tag':
			single_tag_title('', $display);
			if ($display) {
				die();
			}
			break;
	}
	if(!$display){
		return $title;
    } else {
        echo $title;
    }
}

/**
 * Print Bootstrap formated pagination component from WP Query
 * @param {object} [$query = ''] The loop query to paginate
 */
function bs_pagination($query = ''){
    if (is_singular()) {
        return;
    }

    if(!$query){
    	global $wp_query;
    	$query = $wp_query;
    }
    /** Stop execution if there's only 1 page */
    if ($query->max_num_pages <= 1) {
        return;
    }
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($query->max_num_pages);
    /** Add current page to the array */
    if ($paged >= 1) {
        $links[] = $paged;
    }
    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="paginator"><ul class="pagination">' . "\n";
    /** Previous Post Link */
    if (get_previous_posts_link()) {
        printf('<li>%s</li>' . "\n", get_previous_posts_link('<i class="material-icon-navigate-before"></i>'));
    }
    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="first active"' : ' class="first"';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links)) {
            echo '<li>…</li>';
        }
    }
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="last active"' : ' class="last"';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }
    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '<li><span class="btn disabled">…</span></li>' . "\n";
        }
        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }
    /** Next Post Link */
    if (get_next_posts_link()) {
        printf('<li>%s</li>' . "\n", get_next_posts_link('<i class="material-icon-navigate-next"></i>'));
    }
    echo '</ul></div>' . "\n";
}

/**
 * Get the URL slug from and WP object
 * @param  {int} $post_id The post id to search
 * @return {string} The URL slug for the WP Object
 */
function get_the_slug($post_id) {
    $post_data = get_post($post_id, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
}

/**
 * Print or retrieve the category name from an WP Object
 * @param  {int} $post_id The WP Object ID
 * @param  {bool} [$echo = false] TRUE print the category name and FALSE return it
 * @return {void, string} The category name
 */
function tip_category($post_id, $echo = false){
	$cat = get_the_category($post_id);
	if($echo){
		echo $cat[0]->name;
	} else {
		return $cat[0]->name;
	}
}

/**
 * Retrieve the font awesome class for a respective network icon
 * @param  {string} $network The network name to retrive (facebook, twitter, gplus, pinterest, tumblr, whatsapp, email)
 * @return {string} The FA class
 */
function get_network_icon($network){
	$icon = 'fa ';
	switch($network){
		case 'facebook':
			$icon .= 'fa-facebook';
			break;
		case 'twitter':
			$icon .= 'fa-twitter';
			break;
		case 'gplus':
			$icon .= 'fa-google-plus';
			break;
		case 'pinterest':
			$icon .= 'fa-pinterest-p';
			break;
		case 'tumblr':
			$icon .= 'fa-tumblr';
			break;
		case 'whatsapp':
			$icon .= 'fa-whatsapp';
			break;
		case 'email':
			$icon .= 'fa-envelope';
			break;
		case 'instagram':
			$icon .= 'fa-instagram';
			break;
	}
	return $icon;
}

/**
 * Return the latest post ID
 * @return {int} The WP Object ID
 */
function get_last_post_id(){
	$last = get_posts(array(
        'posts_per_page' => 1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
	return $last[0]->ID;
}

/**
 * Return the first post ID
 * @return {int} The WP Object ID
 */
function get_first_post_id(){
	$last = get_posts(array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'orderby' => 'menu_order',
        'order' => 'DESC'
    ));
	return $last[0]->ID;
}

/**
 * Grab the social profiles URL
 * @return {object} Object with the social URL
 */
function get_theme_social(){

    $facebook = get_theme_option('facebook');
    $twitter = get_theme_option('twitter');
    $instagram = get_theme_option('instagram');
    $google = get_theme_option('google');
    $pinterest = get_theme_option('pinterest');

    if($facebook){
        $social['facebook'] = $facebook;
    }
    if($twitter){
        $social['twitter'] = $twitter;
    }
    if($instagram){
        $social['instagram'] = $instagram;
    }
    if($google){
        $social['gplus'] = $google;
    }
    if($pinterest){
        $social['pinterest'] = $pinterest;
    }

    return $social;
}

/**
 * Retrieve avatar url from an user
 * @param  {integer} $user_id The WP user ID
 * @return {string} The avatar URL
 */
function get_user_avatar($user_id) {
    $fb_id = get_user_meta($user_id, 'fb_id', true);
    $avatar = get_field('avatar', 'user_' . $user_id);
    if ($avatar) {
      $back = wp_make_link_relative(wp_get_attachment_image_src($avatar, '300x300')[0]);
    } else {
      if ($fb_id) {
        $back = get_field('facebook_avatar', 'user_' . $user_id) . '?type=large';
      } else {
        $back = get_asset('img/user_default.png');
      }
    }
    return $back;
}

/**
 * Print asset location URL
 * @param {string} $file File path in assets folder
 */
function get_asset($file, $relative = true) {
  $url = get_template_directory_uri() . '/assets/' . $file;
  if ($relative) {
    return wp_make_link_relative($url);
  } else {
    return $url;
  }
}

/**
 * Print returned from get_asset()
 * @param {string} $file File path in assets folder
 */
function asset($file, $relative = true) {
  echo get_asset($file, $relative);
}

/**
 * Return category color class
 * @param  {integer} $post_id            WP post ID
 * @param  {string} [$prop = 'bg-color'] The property (bg-color, color, border-color)
 * @return {string} The CSS Class
 */
function get_cat_color($post_id, $prop = 'bg-color') {
    $cats_out = array();
    $excluded_cats = get_theme_option('private_cats');
    if ($excluded_cats) {
      $cats_out = $excluded_cats;
    }
    $free_cat = get_theme_option('free_cat');
    if ($free_cat) {
      $cats_out[] = $free_cat;
    }
    $post_categories = wp_get_post_categories($post_id, array('fields' => 'ids'));
    $post_cats = array();
    foreach ($post_categories as $cat) {
      if (!in_array($cat, $cats_out)) {
        $post_cats[] = get_category($cat);
      }
    }

    $category = $post_cats;
    if (is_category() && !$GLOBALS['no-event']) {
      $category = array(
        get_category_by_slug(get_query_var('category_name'))
      );
    }
    if ($category) {
        $back = 'cat-' . $category[0]->slug . '-' . $prop;
    } else {
        $back = '';
    }
    return $back;
}

/**
 * Retrieve OBJECT with all event schedule
 * @param  {integer} $post_id WP Post ID
 * @return {OBJECT} Object whit the schedule data
 */
function get_event_date($post_id) {
    $schedules = get_field('horario', $post_id);
    if ($schedules) {
        $times = array();
        for ($i = 0; $i < count($schedules); $i++) {
            $hour = $schedules[$i]['hora'];
            if ($schedules[$i]['am-pm'] == 'PM') {
                $hour += 12;
                if ($hour > 23) {
                    $hour = 0;
                }
            }
            $time = $schedules[$i]['fecha-de-evento'] . ' ' . $hour . ':' . $schedules[$i]['minutos'];
            $nice_time = array(
                'date' => $schedules[$i]['fecha-de-evento'],
                'time' => $schedules[$i]['hora'] . ':' . $schedules[$i]['minutos'] . $schedules[$i]['am-pm'],
                'unix' => strtotime($time)
            );
            $times[$i] = $nice_time;
        }

        $return = array(
            'start' => reset($times),
            'end' => end($times),
            'all' => $times
        );

        return json_decode(json_encode($return));
    } else {
        return false;
    }
}

/**
 * Retrieve OBJECT whit event location data
 * @param  {integer} $post_id WP Post ID
 * @return {OBJECT} Object whith location data
 */
function get_event_location($post_id) {
    //Get location
    $location = new stdClass();
    $lat_val = get_field('latitude', $post_id);
    $lng_val = get_field('longitude', $post_id);
    if ($lat_val && $lng_val) {
      $lugar = get_post_meta($post_id, 'lugar_title', true);
      $address = get_field('direccion', $post_id);
      $geolocation = array(
        'lat' => $lat_val,
        'lng' => $lng_val
      );
      $location->title = $lugar;
      $location->slug = sanitize_title($lugar);
      $location->address = $address;
      $location->geolocation = $geolocation;
    } else {
      $location_post = get_field('lugar', $post_id);
      $location_post = get_post($location_post);

      $location->ID = $location_post->ID;
      $location->title = $location_post->post_title;
      $location->slug = $location_post->post_name;
      $location->url = get_permalink($location_post->ID);
      $location->address = get_field('direccion', $location_post->ID);
      $location->phone_number = get_field('telefonos', $location_post->ID);
      $location->geolocation = get_field('localizacion', $location_post->ID);
    }

    return $location;
}

/**
 * Retrieve all the assistance data, total and the users
 * @param  {integer} $post_id WP Post ID
 * @return {OBJECT} Object whit assistanca data
 */
function get_assistants($post_id) {
  global $wpdb;
  $total_assistants = $wpdb->get_var("SELECT COUNT(*) FROM wp_assist_counter WHERE post_id=$post_id AND assist='yes'");
  $assistance = new stdClass();
  $assistance->total = $total_assistants;
  $users = $wpdb->get_results("SELECT user_id FROM wp_assist_counter WHERE post_id=$post_id AND assist='yes' ORDER BY rand() LIMIT 15");
  $users_obj = array();
  foreach ($users as $user) {
    $data = new stdClass();
    $data->avatar = get_user_avatar($user->user_id);
    $data->display_name = get_userdata($user->user_id)->display_name;
    $users_obj[] = $data;
  }
  $assistance->users = $users_obj;
  return $assistance;
}

function user_is_going($user_id, $post_id) {
  global $wpdb;
  $response = false;
  $going = $wpdb->get_var("SELECT assist FROM wp_assist_counter WHERE user_id=$user_id AND post_id=$post_id LIMIT 1");
  if ($going) {
    $response = $going;
  }
  return $response;
}

/**
 * Retrieva all data from an event
 * @param  {integer} $post_id WP Post ID
 * @return {OBJECT} Object with event data
 */
function get_event_data($post_id) {
    $back = new stdClass();
    $post = get_post($post_id);
    $thumbnail_id = get_post_thumbnail_id($post_id);
    $cats_out = array();
    $excluded_cats = get_theme_option('private_cats');
    if ($excluded_cats) {
      $cats_out = $excluded_cats;
    }
    $free_cat = get_theme_option('free_cat');
    if ($free_cat) {
      $cats_out[] = $free_cat;
    }

    $post_categories = wp_get_post_categories($post_id, array('fields' => 'ids'));
    $post_cats = array();
    foreach ($post_categories as $cat) {
      if (!in_array($cat, $cats_out)) {
        $post_cats[] = get_category($cat);
      }
    }

    $thumbnail = new stdClass();
    $thumbnail->full = wp_make_link_relative(wp_get_attachment_image_src($thumbnail_id, 'full')[0]);
    $thumbnail->large = wp_make_link_relative(wp_get_attachment_image_src($thumbnail_id, '1360x768')[0]);
    $thumbnail->medium = wp_make_link_relative(wp_get_attachment_image_src($thumbnail_id, '400x400')[0]);
    $thumbnail->small = wp_make_link_relative(wp_get_attachment_image_src($thumbnail_id, '150x150')[0]);

    $day_str = new stdClass();
    $day_str->large = get_the_event_date($post_id);
    $day_str->short = get_the_event_date($post_id, 'short');

    $time_str = get_the_event_time($post_id);

    $back->ID = $post->ID;
    $back->title = $post->post_title;
    $back->slug = $post->post_name;
    $back->publish_date = $post->post_date;
    $back->content = $post->post_content;
    $back->excerpt = $post->post_excerpt;
    $back->categories = $post_cats;
    $back->tags = get_event_tags($post_id);
    $back->url =  get_permalink($post_id);
    $back->thumbnail = $thumbnail;
    $back->comment_count = $post->comment_count;
    $back->assistants = get_assistants($post_id);
    $back->schedule = get_event_date($post_id);
    $back->day_str = $day_str;
    $back->time_str = $time_str;
    $back->videos = get_field('video_del_evento', $post_id);
    $back->gallery = get_field('galeria', $post_id);
    $back->file = get_field('file', $post_id);

    $website = get_field('website', $post_id);
    if ($website) {
      if (!preg_match("~^(?:f|ht)tps?://~i", $website)) {
          $website = "http://" . $website;
      }
    }
    $fanpage = get_field('fanpage', $post_id);
    if ($fanpage) {
      if (!preg_match("~^(?:f|ht)tps?://~i", $fanpage)) {
          $fanpage = "http://" . $fanpage;
      }
    }
    $back->website = $website;
    $back->fanpage = $fanpage;
    $back->location = get_event_location($post_id);
    $back->phones = get_field('telefonos', $post_id);
    $back->phone_number = get_event_phone_numbers($post_id);
    $back->phone_number_mobile = get_event_phone_numbers($post_id, 'mobile');
    $back->tickets = get_event_tickets($post_id);
    $back->author = get_event_author($post_id);

    return $back;
}

function get_event_phone_numbers($post_id, $device = 'desktop') {
  $numbers = get_field('telefonos', $post_id);
  $phone = '';
  $phone_chars = array(' ','-','(',')','+');
  $phone_replace = array('','','','','');
  for ($i = 0; $i < count($numbers); $i++) {
    if ($device == 'desktop') {
      if ($i && $i < count($numbers)) {
        $phone .= ' - ';
      }
      $phone .= $numbers[$i]['telefono'];
    } else if ($device == 'mobile') {
      if ($i && $i < count($numbers)) {
        $phone .= '<br />';
      }
      $number = str_replace($phone_chars, $phone_replace, $numbers[$i]['telefono']);
      $number_length = strlen($number);
      if ($number_length == 10) {
        $ind = substr($number, 0, 3);
        $tel = substr($number, 3, 7);
        $phone .= '<a href="tel:' . $ind . $tel . '">' . $ind . ' ' . $tel . '</a>';
      } else if ($number_length == 8) {
        $ind = substr($number, 0, 1);
        $tel = substr($number, 1, 7);
        $phone .= '<a href="tel:03' . $ind . $tel . '">03' . $ind . ' ' . $tel . '</a>';
      } else {
        $phone .= '<a href="tel:032' . $number . '">032 ' . $number . '</a>';
      }
    }
  }
  return $phone;
}

/**
 * Return authot information form a WP POST
 * @param  {integer} $post_id WP POST ID
 * @return {OCJECT}  OBJECT whit author data
 */
function get_event_author($post_id) {
    $back = new stdClass();
    $author = get_post_field('post_author', $post_id);

    $back->ID = $author;
    $back->nickname = get_the_author_meta('nickname', $author);
    $back->first_name = get_the_author_meta('first_name', $author);
    $back->last_name = get_the_author_meta('last_name', $author);
    $back->display_name = get_the_author_meta('display_name', $author);
    $back->email = get_the_author_meta('user_email', $author);
    $back->twitter = get_field('twitter', 'user_' . $author);
    $back->facebook = get_field('facebook', 'user_' . $author);
    $back->gplus = get_field('gplus', 'user_' . $author);
    $back->instagram = get_field('instagram', 'user_' . $author);
    $back->avatar = get_user_avatar($author);
    $back->status = (get_field('verified', 'user_' . $author)) ? 'verified' : 'unverified';
    $back->url = get_author_posts_url($author);

    return $back;
}

/**
 * Devuelve un error en el login dependiento de un codigo
 * @param  string $code Nombre del error
 * @return string       Mensaje para mosrar
 */
function error_message($code){
    switch($code){
        case 'invalid_username':
            $msg = 'El usuario ingresado no existe';
            break;
        case 'incorrect_password':
            $msg = 'Contraseña incorrecta. <a href="' . get_recovery_link() . '">¿Has olvidado tu contraseña?</a>';
            break;
        default:
            $msg = 'Por favor revisa los campos e inténtalo de nuevo';
            break;
    }
    return $msg;
}

/**
 * Return message for verified user status submitted in options backend
 * @param  {string} $status The status nicename (verified, unverified)
 * @return {string} The status message from backend
 */
function get_verified_status_message($status) {
    $message = '';
    switch ($status) {
        case 'verified' :
            $message = get_theme_option('verified_user_msg');
            break;
        case 'unverified' :
            $message = get_theme_option('unverified_user_msg');
            break;
    }

    return $message;
}

/**
 * Print get_verified_status_message response
 * @param  {string} $status The status nicename (verified, unverified)
 * @return {void}
 */
function verified_status_message($status) {
  echo get_verified_status_message($status);
}

/**
 * Return URL of a tag
 * @param  {integer} $term_id WP TERM ID
 * @param  string $type  The tag type (regular, profile)
 * @return {string} URL of tag layout
 */
function get_tag_url($term_id, $type = 'regular') {
    $back = '';
    switch ($type) {
        case 'regular' :
            $term = get_term($term_id, 'post_tag');
            $back = get_term_link($term);
            break;
        case 'profile' :
            $back = get_permalink($term_id);
            break;
    }
    return $back;
}

/**
 * Return array whit the tags of a WP POST
 * @param  {integer} $post_id WP POST ID
 * @return {array}  Array whit tags data
 */
function get_event_tags($post_id) {
    $tags = array();
    $post_tags = wp_get_post_tags($post_id);
    $profile_tags = get_field('etiquetas', $post_id);
    if ($post_tags) {
        foreach ($post_tags as $tag) {
            $tags[] = array(
                'name' => $tag->name,
                'url' => get_tag_url($tag->term_id)
            );
        }
    }
    if ($profile_tags) {
        foreach ($profile_tags as $tag) {
            $tags[] = array(
                'name' => get_the_title($tag),
                'url' => get_tag_url($tag, 'profile')
            );
        }
    }
    if ($post_tags || $profile_tags) {
        shuffle($tags);

        return $tags;
    } else {
        return false;
    }
}

/**
 * Retun tickets information from a event
 * @param  {integer} $post_id WP POST ID
 * @return {OBJECT}  OBJECT whit tickets data
 */
function get_event_tickets($post_id) {
    $back = new stdClass();
    $back->seller = get_field('tickets_name', $post_id);
    $fanpage = get_field('fanpage', $post_id);
    $url = get_field('tickets_url', $post_id);
    if ($url) {
      if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
          $url = "http://" . $url;
      }
    }
    $back->url = $url;
    $back->info = get_field('boleteria', $post_id);
    return $back;
}

/**
 * Print a widget from widgets library
 * @param  {string} $name Widget name with format folder-name eg.: module-comments
 * @return [type]       [description]
 */
function place_widget($name) {
    $name = explode('-', $name);
    get_template_part('templates/widgets/' . $name[0] . 's/' . $name[0], $name[1]);
}

/**
 * Return social networks information based on backend submitted info
 * @param  string $return Info from backend data (site) or all the available netsworks ('all', null or empty)
 * @return {array}  Array with networks data (name, class, icon, url (only with 'site' $return))
 */
function get_social_networks($return = 'site') {
    $nets = array(
        'facebook' => array(
            'name' => 'Facebook',
            'class' => 'facebook',
            'icon' => 'fa-facebook'
        ),
        'twitter' => array(
            'name' => 'Twitter',
            'class' => 'twitter',
            'icon' => 'fa-twitter'
        ),
        'instagram' => array(
            'name' => 'Instagram',
            'class' => 'instagram',
            'icon' => 'fa-instagram'
        ),
        'flickr' => array(
            'name' => 'Flickr',
            'class' => 'flickr',
            'icon' => 'fa-flickr'
        ),
        'google-plus' => array(
            'name' => 'Google +',
            'class' => 'google-plus',
            'icon' => 'fa-google-plus'
        ),
        'linkedin' => array(
            'name' => 'LinkedIn',
            'class' => 'linkedin',
            'icon' => 'fa-linkedin'
        ),
        'pinterest' => array(
            'name' => 'Pinterest',
            'class' => 'pinterest',
            'icon' => 'fa-pinterest-p'
        ),
        'skype' => array(
            'name' => 'Skype',
            'class' => 'skype',
            'icon' => 'fa-skype'
        ),
        'spotify' => array(
            'name' => 'Spotify',
            'class' => 'spotify',
            'icon' => 'fa-spotify'
        ),
        'soundcloud' => array(
            'name' => 'SoundCloud',
            'class' => 'soundcloud',
            'icon' => 'fa-soundcloud'
        ),
        'tumblr' => array(
            'name' => 'Tumblr',
            'class' => 'tumblr',
            'icon' => 'fa-tumblr'
        ),
        'whatsapp' => array(
            'name' => 'whatsapp',
            'class' => 'whatsapp',
            'icon' => 'fa-whatsapp'
        ),
        'vine' => array(
            'name' => 'vine',
            'class' => 'vine',
            'icon' => 'fa-vine'
        ),
        'youtube' => array(
            'name' => 'Youtube',
            'class' => 'youtube',
            'icon' => 'fa-youtube-play'
        )
    );
    if ($return == 'site') {
        $social = get_theme_option('social_networks');
        $back = array();
        foreach ($social as $net) {
            $back[] = array(
                'name' => $nets[$net['network']]['name'],
                'class' => $nets[$net['network']]['class'],
                'icon' => $nets[$net['network']]['icon'],
                'url' => $net['url']
            );
        }
        return $back;
    } else {
        return $nets;
    }
}

/**
 * Return items from a specific menu
 * @param  {string} $menu Menu registered slug
 * @return {array}  Array with items data (OBJECT)
 */
function get_menu_items($menu) {
    $locations = get_nav_menu_locations();
    if (isset($locations[$menu])) {
        $menu_id = $locations[$menu];
    }
    $menu_items = wp_get_nav_menu_items($menu_id);

    return $menu_items;
}

/**
 * Return stored location of an user, initial Cali only
 * @param  {string} $data Kind of data to retrieve (for now just city option)
 * @return {mixed}  Mixed values from request (for now string with city name)
 */
function get_current_user_location($data) {
    $back = '';
    switch ($data) {
        case 'city' :
            $back = 'Cali';
            break;
    }
    return $back;
}

/**
 * Print data from get_current_user_location function
 * @param  {string} $data Kind of data to retrieve (for now just city option)
 * @return {void}
 */
function current_user_location($data) {
    echo get_current_user_location($data);
}

/**
 * Return initial and final day of the current week based on server current time
 * @return {OBJECT} Time stamp of initial and final week days
 */
function get_current_week_range() {
    $current_time = time();
    if (date('D', $current_time) != 'Mon') {
        $start_day = strtotime('last Monday', $current_time);
    } else {
        $start_day = $current_time;
    }
    $start_date = date('Ymd', $start_day);

    if (date('D', $current_time) != 'Sun') {
        $end_day = strtotime('next Sunday');
    } else {
        $end_day = $current_time;
    }
    $end_date = date('Ymd', $end_day);
    $week = new stdClass();
    $week->start = $start_date;
    $week->end = $end_date;
    //return date('W', $current_time);
    return $week;
}

/**
 * Return login URL based on current page
 * @return {string} Login URL
 */
function get_login_url() {
  $blocked = array(
    get_permalink(get_theme_option('register_page')),
    get_permalink(get_theme_option('login_page'))
  );
  if (in_array(get_permalink(), $blocked)) {
    $redirect_to = get_home_uri();
  } else {
    $redirect_to = get_permalink();
  }
  return get_permalink(get_theme_option('login_page')) . '?redirect_to=' . urlencode($redirect_to);
}

/**
 * Print get_login_url return
 * @return {void}
 */
function login_url() {
  echo get_login_url();
}

/**
 * Return the email client info (gmail, outlook, yahoo)
 * @param  {string} $email Email
 * @return {mixed} OBJECT with Email client data @return->nicename, @return->name, @return->url or FALSE if nothing finded
 */
function get_email_house($email) {
  $domain = explode('@', $email);
  $domain = explode('.', $domain[1]);
  $domain = $domain[0];
  if ($domain == 'gmail') {
    $nicename = 'gmail';
    $name = 'GMail';
    $url = 'http://mail.google.com';
  }
  if ($domain == 'yahoo') {
    $nicename = 'yahoo';
    $name = 'Yahoo';
    $url = 'http://mail.yahoo.com';
  }
  if ($domain == 'ymail') {
    $nicename = 'yahoo';
    $name = 'Yahoo';
    $url = 'http://mail.yahoo.com';
  }
  if ($domain == 'hotmail') {
    $nicename = 'outlook';
    $name = 'Outlook';
    $url = 'http://www.live.com';
  }
  if ($domain == 'outlook') {
    $nicename = 'outlook';
    $name = 'Outlook';
    $url = 'http://www.live.com';
  }
  if ($domain == 'live') {
    $nicename = 'outlook';
    $name = 'Outlook';
    $url = 'http://www.live.com';
  }
  if (isset($nicename) && isset($name) && isset($url)) {
    $back = new stdClass();
    $back->nicename = $nicename;
    $back->name = $name;
    $back->url = $url;
  } else {
    $back = false;
  }
  return $back;
}

/**
 * Return home url based on $_SERVER['HTTP_HOST']
 * @return {string} Home url
 */
function get_home_uri() {
  $domain = $_SERVER['HTTP_HOST'];
  if ($domain == 'localhost') {
    $back = 'http://localhost/planciudad';
  }
  if ($domain == '360lab.com.co') {
    $back = 'http://360lab.com.co/planciudad';
  }
  if ($domain == 'elpais.com.co') {
    $back = 'http://planciudadpruebas.elpais.com.co';
  }
  if ($domain == 'planciudad.com') {
    $back = 'http://www.planciudad.com';
  }
  return $back;
}

/**
 * Print get_home_uri return
 * @return {void}
 */
function home_uri() {
  echo get_home_uri();
}

/**
 * Replace tags whit real values
 * @param  {tring} $string The string to manage
 * @return {string}  The $string with replaced values
 */
function replace_tags($string) {
  $tags = array(
    '%c%',
    '%year%',
    '%site_name%',
    '%site_description%'
  );
  $values = array(
    '&copy;',
    date('Y'),
    get_bloginfo('name'),
    get_bloginfo('description')
  );
  return str_replace($tags, $values, $string);
}

/**
 * Send email depending the servide and using the tpls files
 * @param  {string} $email The receiver email
 * @param  {string} $mail The action (confirm-email, recovery-email)
 * @param  {integer} $user_id WP USER ID
 * @return {mixed}   True or WP error
 */
function mail_service($email, $mail, $user_id = '') {
  $mail_from = get_theme_option('mail_from');
  $mail_email = $email;
  $mail_to_name = '';
  if ($mail == 'confirm-email') {
    $mail_html = file_get_contents(get_permalink(get_theme_option('email_page')) . '/confirm-email/' . $user_id);
    $mail_subject = get_theme_option('confirm_mail_subject');
  }
  if ($mail == 'new-publisher') {
    $mail_html = file_get_contents(get_permalink(get_theme_option('email_page')) . '/new-publisher/' . $user_id);
    $mail_subject = 'Nuevo publisher en Plan Ciudad';
  }
  if ($mail == 'password-recovery') {
    $mail_html = file_get_contents(get_permalink(get_theme_option('email_page')) . '/password-recovery/' . $user_id);
    $mail_subject = get_theme_option('recovery_mail_subject');
  }
  if ($user_id = '') {
    $user = get_user_by('email', $email);
  } else {
    $user = get_user_by('id', $user_id);
  }
  $mail_to_name = $user->data->display_name;

  //$send = wp_mail($mail_email, $mail_subject, $mail_html, $mail_headers);
  $send = new PHPMailer;
  $send->setFrom($mail_from, 'Plan Ciudad');
  $send->addAddress($mail_email, $mail_to_name);
  $send->isHTML(true);
  $send->CharSet = 'UTF-8';
  $send->Subject = $mail_subject;
  $send->Body = $mail_html;

  if (!$send->send()) {
    $back = false;
  } else {
    $back = true;
  }

  return $back;
}

/**
 * Print html to visit email house button based in get_email_house
 * @param  {string} $email Email to check
 * @return {void}
 */
function email_house_button_link($email) {
  $mail_house = get_email_house($email);
  if ($mail_house) {
    require dirname(__FILE__) . '/../../templates/widgets/buttons/button-mail-house.php';
  }
}

/**
 * Check is an user is active in system
 * @param  {integer}  $user_id WP USER ID
 * @return {boolean}
 */
function is_user_active($user_id) {
  $active = get_user_meta($user_id, 'active', true);
  $back = false;
  if ($active == 'yes') {
    $back = true;
  }
  return $back;
}

/**
 * Check is user was registered whit Facebook
 * @param  {integer}  $user_id WP USER ID
 * @return {boolean}
 */
function is_facebook_user($user_id) {
  $fb_id = get_user_meta($user_id, 'fb_id', true);
  $fb_vinculate = get_user_meta($user_id, 'fb_vinculate', true);
  $back = false;
  if ($fb_id && $fb_vinculate !== 'no') {
    $back = true;
  }
  return $back;
}

/**
 * Return password recovery page url
 * @return {string} URL
 */
function get_recovery_link() {
  return get_permalink(get_theme_option('recovery_page'));
}

/**
 * Print get_recovery_link response
 * @return {void}
 */
function recovery_link() {
  echo get_recovery_link();
}

/**
 * usin class Mobile_Detect verify if user is in a mobile device (exclude tablets) or desktop device
 * @return boolean
 */
function is_mobile() {
  $detect = new Mobile_Detect;
  $response = false;
  if ($detect->isMobile() && !$detect->isTablet()) {
    $response = true;
  }
  return $response;
}

/**
 * Verify if is the first logged of user
 * @param  [integer]  $user_id WP User ID
 * @return boolean
 */
function is_user_first_time($user_id) {
  $first_time = get_user_meta($user_id, 'first_time', true);
  $back = true;
  if ($first_time == 'no') {
    $back = false;
  }
  return $back;
}

/**
 * Using function paginator, paginates the search results
 * @param  [object] $query Wp Query object
 * @param  string $cat   Category coloring
 * @return void
 */
function search_paginator($query, $cat = '') {
  $item_per_page = $query->query['posts_per_page'];
  $total_records = $query->found_posts;
  $total_pages = $query->max_num_pages;
  $current_page = ($query->query['paged']) ? $query->query['paged'] : 1;
  $base_url = get_home_uri();
  $params = get_query_var('s');
  $time = get_query_var('time');
  if ($params) {
    $params = '/?s=' . $params;
  }
  if ($time) {
    $params .= '&time=' . $time;
  }
  paginator($item_per_page, $total_records, $total_pages, $current_page, $base_url, $params, $cat);
}

/**
 * Print query pagination
 * @param  [integer] $item_per_page Items to show per page
 * @param  [integer] $total_records Total items from query results
 * @param  [integer] $total_pages   Total pages number
 * @param  [integer] $current_page  The current page
 * @param  [string] $base_url      Base URL to use in links
 * @param  string $params        GET params to pass in links
 * @param  string $color_cat     Category to coloring
 * @return void
 */
function paginator($item_per_page, $total_records, $total_pages, $current_page, $base_url, $params = '', $color_cat = '') {
  //print_pre($query);
  $link_class = '';
  $active_class = '';
  if ($color_cat) {
    $color_cats_bg = 'cat-' . $color_cat . '-bg-color';
    $color_cats_border = 'cat-' . $color_cat . '-border-color';
    $color_cats_color = 'cat-' . $color_cat . '-color';
    $color_cats_bg_hover = 'cat-' . $color_cat . '-bg-color-hover';
    $color_cats_border_hover = 'cat-' . $color_cat . '-border-color-hover';
    $color_cats_color_hover = 'cat-' . $color_cat . '-color-hover';

    $link_class = $color_cats_bg_hover . ' ' . $color_cats_color . ' ' . $color_cats_border_hover;
    $active_class = $color_cats_bg . ' ' . $color_cats_bg_hover . ' ' . $color_cats_border;
  }
  $pagination = '';
  if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
	$current_results_min = ($current_page - 1) * $item_per_page;
	$current_result_max = $current_results_min + $item_per_page;
	if ($current_result_max > $total_records) {
		$current_result_max = $total_records;
	}
	//$pagination .= '<span class="pull-left text-sm m-t-md">Showing ' . ($current_results_min + 1) . ' to ' . $current_result_max . ' of ' . $total_records . ' results</span>';
      $pagination .= '<ul class="pagination">';

      $right_links    = $current_page + 3;
      $previous       = $current_page - 1; //previous link
      $next           = $current_page + 1; //next link
      $first_link     = true; //boolean var to decide our first link

      if($current_page > 1){
          $previous_link = ($previous==0)?1:$previous;
          $pagination .= '<li class="first"><a class="' . $link_class . '" href="' . $base_url .'/page/1' . $params . '" title="First">&laquo;</a></li>'; //first link
          $pagination .= '<li><a class="' . $link_class . '" href="' . $base_url .'/page/'.$previous_link.'' . $params . '" title="Previous">&lt;</a></li>'; //previous link
              for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                  if($i > 0){
                      $pagination .= '<li><a class="' . $link_class . '" href="' . $base_url .'/page/'.$i.'' . $params . '" title="Page'.$i.'">'.$i.'</a></li>';
                  }
              }
          $first_link = false; //set first link to false
      }

      if($first_link){ //if current active page is first link
          $pagination .= '<li class="first active"><a class="' . $link_class . ' ' . $active_class . '" href="#">'.$current_page.'</a></li>';
      }elseif($current_page == $total_pages){ //if it's the last active link
          $pagination .= '<li class="last active"><a class="' . $link_class . ' ' . $active_class . '" href="#">'.$current_page.'</a></li>';
      }else{ //regular current link
          $pagination .= '<li class="active"><a class="' . $link_class . ' ' . $active_class . '" href="#">'.$current_page.'</a></li>';
      }

      for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
          if($i<=$total_pages){
              $pagination .= '<li><a class="' . $link_class . '" href="' . $base_url .'/page/'.$i.'' . $params . '" title="Page '.$i.'">'.$i.'</a></li>';
          }
      }
      if($current_page < $total_pages){
              $next_link = $current_page + 1;
              $pagination .= '<li><a class="' . $link_class . '" href="' . $base_url .'/page/'.$next_link.'' . $params . '" title="Next">&gt;</a></li>'; //next link
              $pagination .= '<li class="last"><a class="' . $link_class . '" href="' . $base_url .'/page/'.$total_pages.'' . $params . '" title="Last">&raquo;</a></li>'; //last link
      }

      $pagination .= '</ul>';

	//$pagination .= '<span class="pull-right text-sm m-t-md">Page ' . ($current_page) . ' of ' . $total_pages . '</span>';
  }
  echo '<div class="paginator text-center">' . $pagination . '</div>'; //return pagination links
}

/**
 * Get tomorrow date
 * @param  string $format The PHP date format default: 'Ymd'
 * @return [string]         Tomorrow date formatted
 */
function get_tomorrow_date($format = 'Ymd') {
  $tomorrow = strtotime(current_time($format)) + 86400;
  return date($format, $tomorrow);
}

/**
 * Get the ACF key from a field name
 * @param  [string] $field_name The field name when register field
 * @param  [integer] $post_id  WP Post ID
 * @return [string]        Field key
 */
function acf_field_key($field_name, $post_id = false){
  if ( $post_id )
  	return get_field_reference($field_name, $post_id);
  if( !empty($GLOBALS['acf_register_field_group']) ) {
  	foreach( $GLOBALS['acf_register_field_group'] as $acf ) :
  		foreach($acf['fields'] as $field) :
  			if ( $field_name === $field['name'] )
  				return $field['key'];
  		endforeach;
  	endforeach;
  }
  return $field_name;
}

/**
 * Verify is the user is an author (publisher)
 * @param  [integer]  $user_id WP User ID
 * @return boolean
 */
function is_publisher($user_id) {
  if ($user_id) {
    $userdata = get_userdata($user_id);
    $role = $userdata->roles[0];
    if ($role == 'author' || $role == 'editor' || $role == 'administrator') {
      return true;
    }
  }
  return false;
}

/**
 * Verify if user has connected facebook profile
 * @param  [integer]  $user_id WP User ID
 * @return boolean
 */
function is_connected_to_facebook($user_id) {
  $fb_vinculate = get_user_meta($user_id, 'fb_vinculate', true);
  $fb_id = get_user_meta($user_id, 'fb_id', true);
  if ($fb_id && $fb_vinculate == 'yes') {
    return true;
  }
  return false;
}

/**
 * Retrieve formatted date of a n days after current day
 * @param  [integer] $days  The day to get, EG. For the day after 7 days from today use 7
 * @param  string $format The PHP date format. Default 'Ymd'
 * @return [string]         The formatted date
 */
function get_date_next_x_days($days, $format = 'Ymd') {
  $x_day = strtotime(current_time($format)) + (86400 * $days);
  return date($format, $x_day);
}

/**
 * Verify if an event is up to date
 * @param  integer  $event_id WP Post ID
 * @return boolean
 */
function is_up_to_date($event_id) {
  $schedule = get_event_date($event_id);
  $all = $schedule->all;
  $dates = array();
  for ($i = 0; $i < count($all); $i++) {
    $dates[] = $all[$i]->unix;
  }
  $current_time = strtotime(current_time('Ymd'));
  $back = true;
  foreach ($dates as $date) {
    if ($current_time > $date) {
      $back = false;
    } else {
      $back = true;
    }
  }
  return $back;
}

/**
 * Check if the passed post is in the passed category
 * @param  integer  $post_id WP Post ID
 * @param  integer  $cat_id  WP Term ID
 * @return boolean
 */
function is_in_category($post_id, $cat_id) {
  $the_post = get_post($post_id);
  return has_term($cat_id, 'category', $the_post);
}

/**
 * Return the formatted event date depending in the functions created
 * @param  integer $post_id WP Post ID
 * @param  string $size    The format
 * @return string          Formatted date
 */
function get_the_event_date($post_id, $size = 'large') {
  $event_date = get_event_date($post_id);
  $date_start = strtotime($event_date->start->date);
  $date_end = strtotime($event_date->end->date);
  $date = '';

  if ($date_start == $date_end) { //Single day event
    $date_1 = explode('/', $event_date->start->date);
    $month = get_month_by_number($date_1[0], 'full', false);
    if ($size == 'large') {
      $date = $date_1[1] . ' de ' . $month . ' de ' . $date_1[2];
    } else if  ($size == 'short') {
      $date = '<span class="day">' . $date_1[1] . '</span> <span class="month">' . $month . '</span>';
    }
  } else if ($date_end > $date_start) { //Multiples days evens
    $date_1 = explode('/', $event_date->start->date);
    $month_1_min = get_month_by_number($date_1[0], 'min', false);
    $month_1 = get_month_by_number($date_1[0], 'full', false);

    $date_2 = explode('/', $event_date->end->date);
    $month_2_min = get_month_by_number($date_2[0], 'min', false);
    $month_2 = get_month_by_number($date_2[0], 'full', false);

    if ($date_1[2] == $date_2[2]) { //If in the same year
      if ($month_1 == $month_2) { //If in the same month
        if ($size == 'large') {
          $date = 'Del ' . $date_1[1] . ' al ' . $date_2[1] . ' de ' . $month_2 . ' de ' . $date_2[2];
        } else if ($size == 'short') {
          $date = '<span class="day">' . $date_1[1] . '-' . $date_2[1] . '</span> <span class="month">' . $month_2_min . '</span>';
        }
      } else {
        if ($size == 'large') {
          $date = 'Del ' . $date_1[1] . ' de ' . $month_1 . ' al ' . $date_2[1] . ' de ' . $month_2 . ' de ' . $date_2[2];
        } else if ($size == 'short') {
          $date = '<span class="day">' . $date_1[1] . '</span> <span class="month">' . $month_1_min . '</span> - <span class="day">' . $date_2[1] . '</span> <span class="month">' . $month_2_min . '</span>';
        }
      }
    } else if ($date_2[2] > $date_1[2]) { //If is in diferent years
      if ($size == 'large') {
        $date = 'Del ' . $date_1[1] . ' de ' . $month_1 . ' de ' . $date_1[2] . ' al ' . $date_2[1] . ' de ' . $month_2 . ' de ' . $date_2[2];
      } else if ($size == 'short') {
        $year_1_short = substr($date_1[2], 2, 2);
        $year_2_short = substr($date_2[2], 2, 2);
        $date = '<span class="day">' . $date_1[1] . '</span> <span class="month">' . $month_1_min . ' ' . $year_1_short . '</span>  - <span class="day">' . $date_2[1] . '</span> <span class="month">' . $month_2_min . ' ' . $year_2_short . '</span>';
      }
    }
  }
  return $date;
}

/**
 * Print the response from get_the_event_date
 * @param  integer $post_id WP Post ID
 * @param  string $size    The format
 * @return void
 */
function the_event_date($post_id, $size = 'large') {
  echo get_the_event_date($post_id, $size);
}

/**
 * Return the formatted event time
 * @param  integer $post_id WP Post ID
 * @return string          The time
 */
function get_the_event_time($post_id) {
  $event_date = get_event_date($post_id);
  $date_start = strtotime($event_date->start->date);
  $date_end = strtotime($event_date->end->date);
  $times = array();

  if ($date_start == $date_end) {
    $time_start = $event_date->start->time;
    $time_end = $event_date->end->time;
    if ($time_start != $time_end) {
      $time = $time_start . ' a ' . $time_end;
    } else {
      $time = $time_start;
    }
  } else {
    $time_start = $event_date->end->time;
    $time = $time_start;
  }
  return $time;
}

/**
 * Print the response from get_the_event_time
 * @param  integer $post_id WP Post ID
 * @return void
 */
function the_event_time($post_id) {
  echo get_the_event_time($post_id);
}

function get_public_categories($exclude_free_cat = false) {
  $cats_out = array();
  $excluded_cats = get_theme_option('private_cats');
  if ($excluded_cats) {
    $cats_out = $excluded_cats;
  }

  if ($exclude_free_cat) {
    $free_cat = get_theme_option('free_cat');
    if ($free_cat) {
      $cats_out[] = $free_cat;
    }
  }

  $cats_out = implode(',', $cats_out);

  $post_categories = get_categories(array(
    'type' => 'post',
    'hide_empty' => 0,
    'exclude' => $cats_out
  ));

  return $post_categories;
}

function get_facebook_name($user_id) {
  $fb_id = get_field('fb_id', 'user_' . $user_id);
  $data = file_get_contents('https://graph.facebook.com/' . $fb_id . '?fields=name');
  return $data;
}

function get_status_data($place, $status_id) {
  $response = new stdClass();
  if ($place == 'update_profile') {
    switch ($status_id) {
      case 1 :
        $response->title = 'Datos actualizados';
        $response->type = 'success';
        $response->modal_type = 'success';
        $response->message = 'Tu perfíl ha sido actualizado exitosamente!';
        break;
      case 2 :
        $response->title = 'Oops...';
        $response->type = 'danger';
        $response->modal_type = 'error';
        $response->message = '<strong>Oops...</strong> Algo ha salido mal al intentar actualizar tu perfil, por favor inténtalo de nuevo.';
        break;
    }
  }
  return $response;
}

// Alejandra Sandoval

function get_cxense(){
	echo " <!-- Cxense script begin -->
	<script type=\"text/javascript\">
	var cX = cX || {}; cX.callQueue = cX.callQueue || [];
	cX.callQueue.push(['setSiteId', '1146318811362077926']);
	cX.callQueue.push(['sendPageViewEvent']);
	</script>
	<script type=\"text/javascript\">
	(function(d,s,e,t){e=d.createElement(s);e.type='text/java'+s;e.async='async';
	e.src='http'+('https:'===location.protocol?'s://s':'://')+'cdn.cxense.com/cx.js';
	t=d.getElementsByTagName(s)[0];t.parentNode.insertBefore(e,t);})(document,'script');
	</script>
	<!-- Cxense script end --> ";
}

function get_authorized_api_users() {
  $access_keys = get_theme_option('access_keys');
  $back = array();
  if ($access_keys) {
    foreach ($access_keys as $key) {
      $back[$key['user']['ID']] = $key['key'];
    }
  }
  return $back;
}
?>
