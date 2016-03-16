<?php
	//Theme features
	$features = array(
		array('post-formats', array('video', 'gallery')),
		array('post-thumbnails'),
		array('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets')),
		array('title-tag')
	);
	support_this($features);

	function jptweak_remove_share() {
	    remove_filter( 'the_content', 'sharing_display',19 );
	    remove_filter( 'the_excerpt', 'sharing_display',19 );
	    if ( class_exists( 'Jetpack_Likes' ) ) {
	        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	    }
	}
	 
	add_action( 'loop_start', 'jptweak_remove_share' );
?>
