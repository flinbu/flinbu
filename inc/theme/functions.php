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
    //app_launcher_tags();
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
	$scripts = get_theme_option($location . '_scripts');
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
 * Execute custom function for use after open body tag
 * @return void
 */
function open_body() {
  get_facebook('scripts');
  theme_third_scripts('open_body');
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
 * Return user device
 * @return void
 */
function get_device() {
  return (is_mobile()) ? 'mobile' : 'desktop';
}
?>
