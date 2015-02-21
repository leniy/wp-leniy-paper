<?php
if ( ! function_exists( 'leniypaper_setup' ) ) :
function leniypaper_setup() {
	load_theme_textdomain( 'leniypaper', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	//add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(		'primary' => __( 'Primary Menu', 'leniypaper' ),	) );
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif;
add_action( 'after_setup_theme', 'leniypaper_setup' );

function leniypaper_scripts() {
	wp_enqueue_style( 'leniypaper-style', get_stylesheet_uri() );
	wp_enqueue_script( 'leniypaper-navigation', get_template_directory_uri() . '/responsive-nav.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'leniypaper_scripts' );

function copyrightDate() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
		SELECT 
			YEAR(min(post_date_gmt)) AS firstdate, 
			YEAR(max(post_date_gmt)) AS lastdate 
		FROM 
			$wpdb->posts
		WHERE post_status = 'publish'
	");
	if($copyright_dates) {
		$date = date('Y-m-d');
		$date = explode('-', $date);
		$copyright = "Copyright &copy; " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $date[0]) {
			$copyright .= '-' . $date[0];
		}
		echo $copyright;
	}
}
add_filter('wp_footer', 'copyrightDate');