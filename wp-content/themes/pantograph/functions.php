<?php
function pantograph_get_global_themedata() {
    global $pantograph_theme_data;
    return $pantograph_theme_data;
}
$pantograph_themes_data = pantograph_get_global_themedata();
$pantograph_themes_data = wp_get_theme( get_stylesheet_directory() . '/style.css' );

/* -----------------------------------------------------------------------------
 * Language Internationalization
 * -------------------------------------------------------------------------- */
add_action('after_setup_theme', 'pantograph_theme_setup');
function pantograph_theme_setup(){
	load_theme_textdomain( 'pantograph', esc_url( get_template_directory_uri() ).'/languages' );

	$locale = get_locale();
	$locale_file = PANTOGRAPH_LANGUAGE_PATH . "$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}

/* -----------------------------------------------------------------------------
 * Definations
 * -------------------------------------------------------------------------- */
if( !defined('PANTOGRAPH_ADMIN_PATH') )
	define( 'PANTOGRAPH_ADMIN_PATH', get_template_directory() . '/framework/admin/' );
if( !defined('PANTOGRAPH_INIT_PATH') )
	define( 'PANTOGRAPH_INIT_PATH', get_template_directory() . '/framework/' );
if( !defined('PANTOGRAPH_GUTENBERG_PATH') )
	define( 'PANTOGRAPH_GUTENBERG_PATH', get_template_directory() . '/gutenberg/' );
if( !defined('PANTOGRAPH_INCLUDE_PATH') )
	define( 'PANTOGRAPH_INCLUDE_PATH', get_template_directory() . '/inc/' );
if( !defined('PANTOGRAPH_LANGUAGE_PATH') )
	define( 'PANTOGRAPH_LANGUAGE_PATH', get_template_directory() . '/languages/' );
if( !defined('PANTOGRAPH_PIONUS_PATH') )
	define( 'PANTOGRAPH_PIONUS_PATH', get_template_directory() . '/template-parts/pionus/' );
/**
 * Current Theme Version
 */
if ( ! defined( 'PANTOGRAPH_THEME_VERSION' ) ) {
	define( 'PANTOGRAPH_THEME_VERSION', '2.6' );
}

// **********************************************************************// 
// ! Function to Check if Extensions Plugin is Active
// **********************************************************************// 
function pantograph_is_extensions_plugin_active() {
	if(class_exists('OCDC_Plugin')) {
		return true;
	} else {
		return false;
	}
}

function pantograph_is_preview_plugin_active() {
	if ( function_exists( 'change_top_post_template' ) ) {
		return true;
	} else {
		return false;
	}
}

// **********************************************************************// 
// ! Calling Global Variables
// **********************************************************************// 
function pantograph_globalwpf() {
	global $wp;
	return home_url( $wp->request );
}

// **********************************************************************// 
// ! Calling Admin Functions
// **********************************************************************// 
require_once( PANTOGRAPH_INCLUDE_PATH . 'admin-functions.php' );

// **********************************************************************// 
// ! Choosing Theme Style
// **********************************************************************// 
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_old'){
require_once( PANTOGRAPH_INIT_PATH . 'init.php' );
} elseif ($favorite_theme_style == 'style_new'){
require_once( PANTOGRAPH_PIONUS_PATH . 'functions.php' );
} else {
require_once( PANTOGRAPH_INIT_PATH . 'init.php' );
}