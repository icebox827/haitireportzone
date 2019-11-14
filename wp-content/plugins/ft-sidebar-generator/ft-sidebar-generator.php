<?php
/*
Plugin Name: FT Sidebar Generator
Plugin URI: http://fluentthemes.com/
Description: A WordPress Plugin to generate custom sidebars. Visit Appearance > Sidebars to create your custom sidebars.
Version: 1.0
Author: Fluent-Themes
Author URI: https://themeforest.net/user/fluent-themes
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Load Modules

#-----------------------------------------------------------------
# FT Sidebar Generator Functions
#-----------------------------------------------------------------

require_once 'modules/class-ft_sidebar_generator.php';