<?php 
require_once( PANTOGRAPH_ADMIN_PATH . 'options.php' ); // Load Options Framework
require_once( PANTOGRAPH_INCLUDE_PATH . 'theme-functions.php' ); // Load Theme Functions
if ( (function_exists( 'the_gutenberg_project' ) || function_exists( 'wp_common_block_scripts_and_styles' )) && !pantograph_is_preview_plugin_active() ) {
require_once( PANTOGRAPH_GUTENBERG_PATH . 'gutenberg-functions.php' ); /*Gutenberg Only*/
}
require_once( PANTOGRAPH_INCLUDE_PATH . 'top-post-templates.php' ); // Load Theme Functions
require_once( PANTOGRAPH_INCLUDE_PATH . 'widgets.php' ); // Load Theme Functions
require_once( PANTOGRAPH_INCLUDE_PATH . 'enqueue.php' ); // Enqueue JavaScripts & CSS
require_once( PANTOGRAPH_INCLUDE_PATH . 'customcss.php' ); // Load Custom CSS

if(class_exists('WPBakeryVisualComposerAbstract')) {
	include_once( PANTOGRAPH_INCLUDE_PATH . 'vc-shortcodes.php' ); // Load Visual Composer Customizations
}

if ( is_admin() ) {
	if(class_exists('OCDC_Plugin')) {
	require_once( PANTOGRAPH_INIT_PATH . 'demo-content/demo-content.php' );
	}
	require_once( PANTOGRAPH_INIT_PATH . 'plugins.php' );
}