<?php
/* -----------------------------------------------------------------------------
 * Definations
 * -------------------------------------------------------------------------- */
if( !defined('PIONUSNEWS_ADMIN_PATH') )
	define( 'PIONUSNEWS_ADMIN_PATH', get_template_directory() . '/template-parts/pionus/framework/admin/' );
if( !defined('PIONUSNEWS_INIT_PATH') )
	define( 'PIONUSNEWS_INIT_PATH', get_template_directory() . '/template-parts/pionus/framework/' );
if( !defined('PIONUSNEWS_GUTENBERG_PATH') )
	define( 'PIONUSNEWS_GUTENBERG_PATH', get_template_directory() . '/template-parts/pionus/gutenberg/' );
if( !defined('PIONUSNEWS_INCLUDE_PATH') )
	define( 'PIONUSNEWS_INCLUDE_PATH', get_template_directory() . '/template-parts/pionus/inc/' );
if( !defined('PIONUSNEWS_LANGUAGE_PATH') )
	define( 'PIONUSNEWS_LANGUAGE_PATH', get_template_directory() . '/template-parts/pionus/languages/' );

require_once( PIONUSNEWS_INIT_PATH . 'init.php' );