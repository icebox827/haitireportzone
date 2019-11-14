<?php

/* -----------------------------------------------------------------------------
 * Helper Function
 * -------------------------------------------------------------------------- */
function pionusnews_get_option( $opt_name, $default = null ) {
	global $Redux_Options;
	return $Redux_Options->get( $opt_name, $default );
}
/* -----------------------------------------------------------------------------
 * Load Custom Fields
 * -------------------------------------------------------------------------- */
require_once( PIONUSNEWS_ADMIN_PATH . 'custom-fields/field_font_upload/field_upload.php' );
require_once( PIONUSNEWS_ADMIN_PATH . 'custom-fields/field_typography.php' );
require_once( PIONUSNEWS_ADMIN_PATH . 'custom-fields/field_section_info.php' );
require_once( PIONUSNEWS_ADMIN_PATH . 'custom-fields/field_sidebar_select.php' );
require_once( PIONUSNEWS_ADMIN_PATH . 'custom-fields/field_color_scheme.php' );
require_once( PIONUSNEWS_ADMIN_PATH . 'custom-fields/field_slider.php' );
require_once( PIONUSNEWS_ADMIN_PATH . 'custom-fields/field_slides.php' );
/* -----------------------------------------------------------------------------
 * Initial Redux Framework
 * -------------------------------------------------------------------------- */


if(!class_exists('Redux_Options')) {
	require_once( PIONUSNEWS_ADMIN_PATH . 'options/defaults.php' );
}
/*
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be over ridden if needed.
 *
 */
function pionusnews_setup_framework_options() {
	$args = array();

	$args['std_show'] = true; // If true, it shows the std value

	// Set the class for the dev mode tab icon.
	// This is ilicered unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['dev_mode_icon_class'] = 'icon-large';

	// Setup custom links in the footer for share icons
	$args['share_icons']['twitter'] = array(
		'link' => 'http://twitter.com/ghost1227',
		'title' => esc_html__('Follow me on Twitter', 'pantograph'),
		'img' => Redux_OPTIONS_URL . 'img/social/Twitter.png'
	);
	$args['share_icons']['linked_in'] = array(
		'link' => 'http://www.linkedin.com/profile/view?id=52559281',
		'title' => esc_html__('Find me on LinkedIn', 'pantograph'),
		'img' => Redux_OPTIONS_URL . 'img/social/LinkedIn.png'
	);

	// Set the class for the import/export tab icon.
	// This is ilicered unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['import_icon_class'] = 'icon-large';

	// Set a custom option name. Don't forget to replace spaces with underscores!
	$args['opt_name'] = 'pionusnews_theme_options';

	// Set a custom title for the options page.
	// Default: Options
	$args['menu_title'] = esc_html__('Theme Options', 'pantograph');

	// Set a custom page title for the options page.
	// Default: Options
	$args['page_title'] = esc_html__('Theme Options', 'pantograph');

	// Set a custom page slug for options page (wp-admin/themes.php?page=***).
	// Default: redux_options
	$args['page_slug'] = 'redux_options';

	// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
	// Default: menu
	$args['page_type'] = 'menu';

	// Set the parent menu.
	// Default: themes.php
	$args['page_parent'] = 'themes.php';

	// Set the icon type. Set to "iconfont" for Font Awesome, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	$args['dev_mode_icon_type'] = 'iconfont';
	$args['import_icon_type'] = 'iconfont';
	$allowed_html_array = array(
    'p' => array(),
    'h4' => array(),
	'strong' => array(),
	'a' => array(),
	);
	$args['intro_text'] = wp_kses( __( '<h4>Theme Settings Information for PantoGraph Theme</h4>', 'pantograph'), $allowed_html_array );

	$sections = array();
	
	//section for General-logo, favicon, ratina, custom css
	$sections[] = array(
						'icon_type' => 'iconfont',
						'icon' => 'globe',
						'icon_class' => 'icon-large',
						'title' => esc_html__('General', 'pantograph'),
						'desc' => wp_kses( __('<p class="description">This is the general options.</p>', 'pantograph'), $allowed_html_array ),
						'fields' => array(
								array(
									'id' => 'pionus_home_container_width',
									'type' => 'text',
									'title' => esc_html__('HomePage Container Width', 'pantograph'),
									'sub_desc' => esc_html__('Input maximum container width of your homepage in pixel. Default container width is 1200px.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionus_container_width',
									'type' => 'text',
									'title' => esc_html__('Whole Site Container Width', 'pantograph'),
									'sub_desc' => esc_html__('Input maximum container width of your site in pixel. Default container width is 1200px.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_no_post_img',
									'type' => 'upload',
									'title' => esc_html__('Upload No Image', 'pantograph'),
									'sub_desc' => esc_html__('This image will be show when post have no custom or featured image.', 'pantograph'),
								),
								array(
									'id' => 'pionusnews_readmore_label',
									'type' => 'text',
									'title' => esc_html__('Read More Label', 'pantograph'), 
									'desc' => esc_html__('Read More button will be visible only for post excerpt, user can read continue', 'pantograph'),
									'std' => 'Read More',
								),
								array(
									'id' => 'pionusnews_single_post_style',
									'type' => 'select',
									'title' => esc_html__('Single Post Style', 'pantograph'), 
									'desc' => esc_html__('Single Post Style will be visible for all single posts', 'pantograph'),
									'options'  => array(
									'0' => 'Default Template',
									'1' => 'General Template',
									'2' => 'Large Image and Title',
									'3' => 'Full Width Image and Title',
									'4' => 'Without Sidebar',
									'5' => 'Title Overlay Template',
									'6' => 'Transparent Overlay Template',
									),
									'default'  => array('1')
								),
								array(
									'id' => 'pionusnews_category_style',
									'type' => 'select',
									'title' => esc_html__('Category Style', 'pantograph'), 
									'desc' => esc_html__('Category Style will be visible for all Category pages', 'pantograph'),
									'options'  => array(
									'1' => 'One Column General',
									'2' => 'One Column Image Title',
									'3' => 'One Column Large General',
									'4' => 'Three Column Full Width',
									'5' => 'Two Column General',
									'6' => 'Two Column Image Title',
									'7' => 'One Column Content Left Right',
									'8' => 'One Column Title Overlay',
									'9' => 'One Column Transparent Overlay',
									'10' => 'Three Column Image Overlay',
									'11' => 'Three Column Image Title Overlay',
									'12' => 'One Column Large Image',
									'13' => 'Three Column Masonry Style'
									),
									'default'  => array('1')
								),
								array(
									'id' => 'pionusnews_meta_for_all_posts',
									'type' => 'checkbox',
									'title' => esc_html__('Meta Info for All Post Excerpts', 'pantograph'),
									'sub_desc' => esc_html__('Switch On or Off Meta Info (author, date and comments count) for all Post Excerpts.', 'pantograph'),
									'switch' => true,
									'std' => '1' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_remove_meta_for_all_posts_partially',
									'type' => 'checkbox',
									'title' => esc_html__('Remove Meta Info Partially', 'pantograph'),
									'sub_desc' => esc_html__('This option will remove Meta Info for some elements and keep for some elements to make the design look good.', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_meta_for_single_posts',
									'type' => 'checkbox',
									'title' => esc_html__('Meta Info for Single Posts', 'pantograph'),
									'sub_desc' => esc_html__('Switch On or Off Meta Info (author, date, social icons and comments count) for all Single Posts.', 'pantograph'),
									'switch' => true,
									'std' => '1' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_show_author_on_single_post',
									'type' => 'checkbox',
									'title' => esc_html__('Author Info On Single Post', 'pantograph'),
									'sub_desc' => esc_html__('On/Off user for showing or hide author info on the single posts', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_remove_cat_home',
									'type' => 'checkbox',
									'title' => esc_html__('Remove Category Box from HomePage', 'pantograph'),
									'sub_desc' => esc_html__('This option will remove all the Category boxes from HomePage elements.', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_remove_cat_global',
									'type' => 'checkbox',
									'title' => esc_html__('Remove Category Box from Whole Site', 'pantograph'),
									'sub_desc' => esc_html__('This option will remove all the Category boxes from whole website.', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_title_style',
									'type' => 'radio',
									'title' => esc_html__('Website Title Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose a Title Style for your Website', 'pantograph'),
									'options' => array(
									'1' => 'Title Style One',
									'2' => 'Title Style Two',
									'3' => 'Title Style Three',
									'4' => 'Title Style Four',
									'5' => 'Title Style Five',
									'6' => 'Title Style Six',
									'7' => 'Title Style Seven',
									'8' => 'Title Style Eight',
									'9' => 'Title Style Nine',
									'10' => 'Title Style Ten',
									'11' => 'Title Style Eleven',
									'12' => 'Title Style Twelve',
									'13' => 'Title Style Thirteen'
									), 
									'std' => '12'
								),
								array(
									'id' => 'pionusnews_sidebar_style',
									'type' => 'radio',
									'title' => esc_html__('Sidebar Title Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose a Title Style for your Website Default Sidebar', 'pantograph'),
									'options' => array(
									'1' => 'Title Style One',
									'2' => 'Title Style Two',
									'3' => 'Title Style Three',
									'4' => 'Title Style Four',
									'5' => 'Title Style Five',
									'6' => 'Title Style Six',
									'7' => 'Title Style Seven',
									'8' => 'Title Style Eight',
									'9' => 'Title Style Nine',
									'10' => 'Title Style Ten',
									'11' => 'Title Style Eleven',
									'12' => 'Title Style Twelve',
									'13' => 'Title Style Thirteen'
									), 
									'std' => '12'
								),
								array(
									'id' => 'img_top_cat_bg_style',
									'type' => 'radio',
									'title' => esc_html__('Category Background Style', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Category Background Style', 'pantograph'),
									'options' => array(
									'1' => 'Default Style',
									'2' => 'Style Two'
									),
									'std' => '1'
									),
								array(
									'id' => 'custom_color',
									'type' => 'color',
									'title' => esc_html__('Website Global Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Global Color from here, It will effect on text color not for background', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'meta_hover_color',
									'type' => 'color',
									'title' => esc_html__('Global Meta Info Hover Color', 'pantograph'), 
									'sub_desc' => esc_html__('Global Meta Info Hover Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'global_body_color',
									'type' => 'color',
									'title' => esc_html__('Website Global Body Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Global Body Color will work for website body background', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'global_white_conainter',
									'type' => 'checkbox',
									'title' => esc_html__('Do You Want Box Style?', 'pantograph'),
									'sub_desc' => esc_html__('On/Off Boxed Style whole website', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_body_bg_img_to',
									'type' => 'upload',
									'title' => esc_html__('Body Background Image for Box Style', 'pantograph'),
									'sub_desc' => esc_html__('Upload Body Background Image for Box Style', 'pantograph')
								),
								array(
									'id' => 'pionusnews_repeated_body_bg',
									'type' => 'checkbox',
									'title' => esc_html__('Use Small Image as Body Background', 'pantograph'),
									'sub_desc' => esc_html__('Use this opeion if you want to use small image and make that repeated.', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_boxed_shadow',
									'type' => 'checkbox',
									'title' => esc_html__('Do You Want Boxed-Shadow?', 'pantograph'),
									'sub_desc' => esc_html__('On/Off Boxed-Shadow for Boxed Style', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_home_loadbutton',
									'type' => 'radio',
									'title' => esc_html__('Load More Button Styles for Home Page Elements', 'pantograph'), 
									'sub_desc' => esc_html__('Choose style for Load More Button Styles for Home Page Elements (not for Blog Pages).', 'pantograph'),
									'options' => array(
									'1' => 'Style One',
									'2' => 'Style Two'
									), // Must provide key => value pairs for radio options
									'std' => '1'
								),
								array(
												'id' => 'pionusnews_img_off_in_mobile',
												'type' => 'checkbox',
												'title' => esc_html__('Minimize Post Images in Home for Tablets and Mobiles', 'pantograph'),
												'sub_desc' => esc_html__('Switch On to Minimize Post Images in Home for Tablets and Mobiles', 'pantograph'),
												'switch' => true,
												'std' => '1' // 1 = checked | 0 = unchecked
											),
								array(
									'id' => 'pionusnews_font_style',
									'type' => 'radio',
									'title' => esc_html__('Website Font Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose a font Style for your Website', 'pantograph'),
									'options' => array(
									'1' => 'Font Default (Poppins + Roboto + Rajdhani + Verdana)',
									'2' => 'Lato + Poppins + Roboto + Verdana',
									'3' => 'Lato + Roboto Condensed + Roboto + Poppins',
									'4' => 'Roboto + Poppins + Rajdhani + Verdana + Lato',
									), 
									'std' => '1'
								),
							)
						);
	
	//section for Social icon url
	$sections[] = array(
					'icon_type' => 'iconfont',
					'icon' => 'star',
					'icon_class' => 'icon-large',
					'title' => esc_html__('Logo Settings', 'pantograph'),
					'desc' => wp_kses( __('<p class="description">This is options for setting up the Logo of your site.', 'pantograph'), $allowed_html_array ),
					'fields' => array(
								array(
									'id' => 'logo_url',
									'type' => 'upload',
									'title' => esc_html__('Upload Main Logo', 'pantograph'),
									'sub_desc' => esc_html__('This is the main logo', 'pantograph'),
								),
								array(
									'id' => 'pionusnews_logo_top_padding',
									'type' => 'text',
									'title' => esc_html__('Change Top Padding of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 15px . Keep it empty if you want to use the default 5px top padding.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_logo_bottom_padding',
									'type' => 'text',
									'title' => esc_html__('Change Bottom Padding of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 15px . Keep it empty if you want to use the default 5px bottom padding.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_logo_left_padding',
									'type' => 'text',
									'title' => esc_html__('Change Left Padding of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 15px . Keep it empty if you want to use the default 15px left padding.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_logo_right_padding',
									'type' => 'text',
									'title' => esc_html__('Change Right Padding of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 15px . Keep it empty if you want to use the default 5px right padding.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_logo_max_width',
									'type' => 'text',
									'title' => esc_html__('Change Maximum Width of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 215px . Keep it empty if you want to use the default 285px maximum width.', 'pantograph'),
									'std' => '',
								),
								
								array(
									'id' => 'pionusnews_favicon',
									'type' => 'upload',
									'title' => esc_html__('Upload Favicon', 'pantograph'),
									'sub_desc' => esc_html__('This is favicon. Upload 64x64 favicon image.', 'pantograph'),
								)
							)
							
				);
				
		//section for Social icon url
	$sections[] = array(
					'icon_type' => 'iconfont',
					'icon' => 'star',
					'icon_class' => 'icon-large',
					'title' => esc_html__('Header', 'pantograph'),
					'desc' => wp_kses( __('<p class="description">This is options for setting up the content of the header of your website.', 'pantograph'), $allowed_html_array ),
					'fields' => array(
								array(
									'id' => 'pionusnews_header_style',
									'type' => 'radio',
									'title' => esc_html__('Website Header Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose a Header Style for your Website', 'pantograph'),
									'options' => array(
									'default' => 'Header Style Default',
									'1' => 'Header Style One',
									'2' => 'Header Style Two',
									'3' => 'Header Style Three',
									'4' => 'Header Style Four',
									'5' => 'Header Style Five',
									'6' => 'Header Style Six',
									'7' => 'Header Style Seven',
									'8' => 'Header Style Eight'
									), // Must provide key => value pairs for radio options
									'std' => 'default'
								),
								array(
									'id' => 'header_background_color',
									'type' => 'color',
									'title' => esc_html__('Header Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Background Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#ffffff'
								),
								array(
									'id' => 'menu_bg_for_4_5',
									'type' => 'color',
									'title' => esc_html__('Header Menu Background', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Menu Background for Header Style 4, 5 or default', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#333f49'
								),
								array(
									'id' => 'mainnavigation_border_color',
									'type' => 'color',
									'title' => esc_html__('Main Navigation Border Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Navigation Border Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you do not want any border there.', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'pionusnews_menu_left_border',
									'type' => 'checkbox',
									'title' => esc_html__('Main Navigation Menu Item Divider', 'pantograph'), 
									'sub_desc' => esc_html__('Switch On Menu Item Divider', 'pantograph'),
									'switch' => true,
									'std' => '1' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'menu_link_color',
									'type' => 'color',
									'title' => esc_html__('Menu Link Text Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Menu Link Text Color from here, It will effect on menu text color of Default Header Style only', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#ffffff'
								),
								array(
									'id' => 'dropdown_bg_color',
									'type' => 'color',
									'title' => esc_html__('Menu DropDown Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose DropDown Menu Background Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'dropdown_font_color',
									'type' => 'color',
									'title' => esc_html__('Menu DropDown Font Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose DropDown Menu Font Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'pionusnews_menu_fontsize',
									'type' => 'text',
									'title' => esc_html__('Main Menu Font Size', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 13px . Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_menu_fontfamily',
									'type' => 'text',
									'title' => esc_html__('Main Menu Font Family', 'pantograph'), 
									'desc' => esc_html__('Input Font-Family name. For example: Roboto. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_menu_fontweight',
									'type' => 'text',
									'title' => esc_html__('Main Menu Font Weight', 'pantograph'), 
									'desc' => esc_html__('Input Font-Weight. For example: 400 or 500 or 600 or 700 . Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_menu_uppercase',
									'type' => 'radio',
									'title' => esc_html__('Main Menu Font Transform', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Main Menu Text Transformation Style', 'pantograph'),
									'options' => array(
									'1' => 'UpperCase',
									'2' => 'LowerCase',
									'3' => 'Capitalize',
									'4' => 'None'
									), // Must provide key => value pairs for radio options
									'std' => '1'
								),
								array(
									'id' => 'pionusnews_active_menu_bg_color',
									'type' => 'color',
									'title' => esc_html__('Menu Hover/Mouse-Over/Active Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Background Color for Hover/Mouse-Over/Active Menu Items', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you do not want any background color for active menu and mouse over menu.', 'pantograph'),
									'std' => '#f26262'
								),
								array(
									'id' => 'pionusnews_active_menu_font_color',
									'type' => 'color',
									'title' => esc_html__('Menu Hover/Mouse-Over/Active Font Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Font Color for Hover/Mouse-Over/Active Menu Items', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you do not want different Font color for active menu and mouse over menu.', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'switch_off_droparrow',
									'type' => 'checkbox',
									'title' => esc_html__('Switch Off Drop-Arrow from Main Menu', 'pantograph'),
									'sub_desc' => esc_html__('Switch Off Drop-Arrow from main menu parent items.', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'browse_all_on_off',
									'type' => 'checkbox',
									'title' => esc_html__('Browse All Section ON/OFF from Menu', 'pantograph'),
									'sub_desc' => esc_html__('On/Off Browse All Section. Works for Default Header Style only.', 'pantograph'),
									'switch' => true,
									'std' => '1' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_menusticky',
									'type' => 'checkbox',
									'title' => esc_html__('Sticky Menu', 'pantograph'),
									'sub_desc' => esc_html__('On/Off Sticky Menu. When user scrolls down the menu will be visible at the top.', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_mobile_menu_style',
									'type' => 'radio',
									'title' => esc_html__('Mobile Menu Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose a menu style for mobile view', 'pantograph'),
									'options' => array(
									'1' => 'Menu Style One',
									'2' => 'Menu Style Two'
									), // Must provide key => value pairs for radio options
									'std' => '2'
								),
								array(
									'id' => 'mobile_menu_background_img',
									'type' => 'upload',
									'title' => esc_html__('Upload Mobile Menu Background Image', 'pantograph'),
									'sub_desc' => esc_html__('This is for Mobile Menu Style Two', 'pantograph'),
								),
								array(
									'id' => 'pionusnews_new_menu_anim',
									'type' => 'radio',
									'title' => esc_html__('Menu Animation Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Main Menu Animation Style', 'pantograph'),
									'options' => array(
									'1' => 'Style One',
									'2' => 'Style Two'
									), // Must provide key => value pairs for radio options
									'std' => '1'
								),
								array(
									'id' => 'search_on_off',
									'type' => 'checkbox',
									'title' => esc_html__('Search Icon ON - OFF in Header', 'pantograph'),
									'sub_desc' => esc_html__('On/Off Search Icon in Header', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
												'id' => 'pionusnews_header_search_icon',
												'type' => 'upload',
												'title' => esc_html__('Upload Header Search Icon Image', 'pantograph'),
												'sub_desc' => esc_html__('Keep the image size within 16x16 pixel. Do not upload any image if you want to use the default search icon.', 'pantograph'),
											),
								array(
									'id' => 'search_bg_color',
									'type' => 'checkbox',
									'title' => esc_html__('Background Color ON - OFF for Search Icon', 'pantograph'),
									'sub_desc' => esc_html__('On/Off Search Icon Background Color in Header', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								)
							)
							
				);
	$sections[] = array(
					'icon_type' => 'iconfont',
					'icon' => 'glass',
					'icon_class' => 'icon-large',
					'title' => esc_html__('Header TopBar', 'pantograph'),
					'desc' => wp_kses( __('<p class="description">This is options for setting Header TopBar of your website.', 'pantograph'), $allowed_html_array ),
					'fields' => array(
								array(
									'id' => 'pionusnews_header_topbar',
									'type' => 'checkbox',
									'title' => esc_html__('Header TopBar', 'pantograph'),
									'sub_desc' => esc_html__('Switch on/off Header TopBar', 'pantograph'),
									'switch' => true,
									'std' => '1' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_header_topbar_topborder',
									'type' => 'checkbox_hide_below',
									'title' => esc_html__('Border Top for TopBar', 'pantograph'),
									'sub_desc' => esc_html__('Switch on/off top border for Header TopBar', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'header_topbar_topborder_background_color',
									'type' => 'color',
									'title' => esc_html__('Background Color of Top Border', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Background Color of Top Border', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#ffffff'
								),
								array(
									'id' => 'pionusnews_header_topbar_bottomborder',
									'type' => 'checkbox',
									'title' => esc_html__('Border Bottom for TopBar', 'pantograph'),
									'sub_desc' => esc_html__('Switch on/off bottom border for Header TopBar', 'pantograph'),
									'switch' => true,
									'std' => '1' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'header_topbar_background_color',
									'type' => 'color',
									'title' => esc_html__('Header Top Bar Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Top Bar Background Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#f26262'
								),
								array(
									'id' => 'pionusnews_topbar_date_bg_color',
									'type' => 'color',
									'title' => esc_html__('Top Bar Date Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Top Bar Date Background Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#f26262'
								),
								array(
									'id' => 'pionusnews_topbar_date_color',
									'type' => 'color',
									'title' => esc_html__('Header Top Bar Date Text Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Top Bar Date Text Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#ffffff'
								),
								array(
									'id' => 'pionusnews_topbar_sicons_color',
									'type' => 'color',
									'title' => esc_html__('Header Top Bar Social Icons Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Top Bar Social Icons Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#ffffff'
								),
								array(
									'id' => 'pionusnews_topbar_topmenu_links_color',
									'type' => 'color',
									'title' => esc_html__('Header Top Bar Menu Items Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Top Bar Menu Items Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#ffffff'
								),
								array(
									'id' => 'pionus_signup_form',
									'type' => 'checkbox',
									'title' => esc_html__('Sign In / Sign Up Link', 'pantograph'),
									'sub_desc' => esc_html__('Switch on Sign In / Sign Up Link in TopBar', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
												'id' => 'pionusnews_header_login_icon',
												'type' => 'upload',
												'title' => esc_html__('Upload Header Login Icon Image', 'pantograph'),
												'sub_desc' => esc_html__('Keep the image size within 16x16 pixel. Do not upload any image if you want to use the default login icon.', 'pantograph'),
											),
								array(
											'id' => 'topbar_menu_item1_name',
											'type' => 'text',
											'title' => esc_html__('Name Of Menu Item 1', 'pantograph'), 
											'sub_desc' => esc_html__('Name Of Menu Item 1 for show on the TopBar', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item1_link',
											'type' => 'text',
											'title' => esc_html__('Menu Item 1 URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your Menu Item 1 page', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item2_name',
											'type' => 'text',
											'title' => esc_html__('Name Of Menu Item 2', 'pantograph'), 
											'sub_desc' => esc_html__('Name Of Menu Item 2 for show on the TopBar', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item2_link',
											'type' => 'text',
											'title' => esc_html__('Menu Item 2 URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your Menu Item 2 page', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item3_name',
											'type' => 'text',
											'title' => esc_html__('Name Of Menu Item 3', 'pantograph'), 
											'sub_desc' => esc_html__('Name Of Menu Item 3 for show on the TopBar', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item3_link',
											'type' => 'text',
											'title' => esc_html__('Menu Item 3 URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your Menu Item 3 page', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item4_name',
											'type' => 'text',
											'title' => esc_html__('Name Of Menu Item 4', 'pantograph'), 
											'sub_desc' => esc_html__('Name Of Menu Item 4 for show on the TopBar', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item4_link',
											'type' => 'text',
											'title' => esc_html__('Menu Item 4 URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your Menu Item 4 page', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item5_name',
											'type' => 'text',
											'title' => esc_html__('Name Of Menu Item 5', 'pantograph'), 
											'sub_desc' => esc_html__('Name Of Menu Item 5 for show on the TopBar', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item5_link',
											'type' => 'text',
											'title' => esc_html__('Menu Item 5 URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your Menu Item 5 page', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item6_name',
											'type' => 'text',
											'title' => esc_html__('Name Of Menu Item 6', 'pantograph'), 
											'sub_desc' => esc_html__('Name Of Menu Item 6 for show on the TopBar', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item6_link',
											'type' => 'text',
											'title' => esc_html__('Menu Item 6 URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your Menu Item 6 page', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item7_name',
											'type' => 'text',
											'title' => esc_html__('Name Of Menu Item 7', 'pantograph'), 
											'sub_desc' => esc_html__('Name Of Menu Item 7 for show on the TopBar', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item7_link',
											'type' => 'text',
											'title' => esc_html__('Menu Item 7 URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your Menu Item 7 page', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item8_name',
											'type' => 'text',
											'title' => esc_html__('Name Of Menu Item 8', 'pantograph'), 
											'sub_desc' => esc_html__('Name Of Menu Item 8 for show on the TopBar', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'topbar_menu_item8_link',
											'type' => 'text',
											'title' => esc_html__('Menu Item 8 URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your Menu Item 8 page', 'pantograph'),
											'std' => '',
								)
							)
							
				);			
	

	//Sidebar
	$sections[] = array(
					'icon_type' => 'iconfont',
					'icon' => 'book',
					'icon_class' => 'icon-large',
					'title' => esc_html__('Sidebar', 'pantograph'),
					'desc' => wp_kses( __('<p class="description">This is options for setting sidebar.</p>', 'pantograph'), $allowed_html_array ),
					'fields' => array(
							
								array(
									'id' => 'pionusnews_sticky_widget',
									'type' => 'checkbox',
									'title' => esc_html__('Sticky Sidebar', 'pantograph'),
									'sub_desc' => esc_html__('On/Off Sticky Sidebar for Whole Theme', 'pantograph'),
									'switch' => true,
									'std' => '1' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'sidebar_widget_border',
									'type' => 'checkbox',
									'title' => esc_html__('Do you want sidebar widgets border?', 'pantograph'),
									'sub_desc' => esc_html__('On/Off sidebar widgets border', 'pantograph'),
									'switch' => true,
									'std' => '1' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'sidebar_background_color',
									'type' => 'color',
									'title' => esc_html__('Sidebar Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose widget Background color from here', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '',
									'required'  => array('sidebar_widget_border', "=", 1)
								),
								array(
									'id' => 'sidebar_title_color',
									'type' => 'color',
									'title' => esc_html__('Sidebar Title Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose widget title color from here', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'sidebar_title_background_color',
									'type' => 'color',
									'title' => esc_html__('Sidebar Title Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose widget title background color from here', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => '#f26262'
								),
								array(
									'id' => 'sidebar_text_color',
									'type' => 'color',
									'title' => esc_html__('Sidebar Text Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose widget text color from here', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'sidebar_link_color',
									'type' => 'color',
									'title' => esc_html__('Sidebar Link Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose widget link color from here', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'sidebar_link_hover_color',
									'type' => 'color',
									'title' => esc_html__('Sidebar Link Hover Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose widget Link Hover color from here', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
							)
				);
				
	$sections[] = array(
					'icon_type' => 'iconfont',
					'icon' => 'glass',
					'icon_class' => 'icon-large',
					'title' => esc_html__('Blog Settings', 'pantograph'),
					'desc' => wp_kses( __('<p class="description">This is options for setting blog page of your website.', 'pantograph'), $allowed_html_array ),
					'fields' => array(
								array(
									'id' => 'pagination_post_style',
									'type' => 'select',
									'title' => esc_html__('Post Pagination Style', 'pantograph'), 
									'sub_desc' => esc_html__('Choose a post paginate style for your blog and category pages', 'pantograph'),
									'options' => array(
									'1' => 'Numbered Pagination',
									'2' => 'Load More Pagination'
									),
									'std' => '1'
								),
								array(
									'id' => 'pagination_position',
									'type' => 'select',
									'title' => esc_html__('Post Pagination Alignment', 'pantograph'), 
									'sub_desc' => esc_html__('Choose pagination alignment for your blog and category pages', 'pantograph'),
									'options' => array(
									'1' => 'Left Aligned',
									'2' => 'Center Aligned'
									),
									'std' => '2'
								),
								array(
									'id' => 'pionusnews_lmore_button_style',
									'type' => 'radio',
									'title' => esc_html__('Load More Button Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose style for Load More Button in Blog Pagination', 'pantograph'),
									'options' => array(
									'1' => 'Style One',
									'2' => 'Style Two',
									'3' => 'Style Three'
									), // Must provide key => value pairs for radio options
									'std' => '1'
								),
								array(
											'id' => 'pionusnews_blog_excerpt',
											'type' => 'text',
											'title' => esc_html__('Post Excerpt Limit', 'pantograph'), 
											'sub_desc' => esc_html__('Enter Blog Post Excerpt Word Limit. By default it is 55', 'pantograph'),
											'std' => '',
								),
								array(
									'id' => 'pionusnews_rmore_button_style',
									'type' => 'radio',
									'title' => esc_html__('Read More Link Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose style for Read More link', 'pantograph'),
									'options' => array(
									'1' => 'Style One',
									'2' => 'Style Two',
									'3' => 'Style Three',
									'4' => 'Style Four'
									), // Must provide key => value pairs for radio options
									'std' => '1'
								),
								array(
									'id' => 'pionusnews_post_border',
									'type' => 'checkbox',
									'title' => esc_html__('Do you want Border on Single Posts?', 'pantograph'),
									'sub_desc' => esc_html__('On/Off single post border', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'cat_top_posts',
									'type' => 'checkbox',
									'title' => esc_html__('Top Posts', 'pantograph'),
									'sub_desc' => esc_html__('On/Off for showing top posts', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'top_posts_template',
									'type' => 'select',
									'title' => esc_html__('Top Post Template', 'pantograph'), 
									'sub_desc' => esc_html__('Choose a post Style for your blog', 'pantograph'),
									'options' => array(
									'default' => 'Top Post Style Default',
									'1' => 'Top Post Style One',
									'2' => 'Top Post Style Two',
									'3' => 'Top Post Style Three',
									'4' => 'Top Post Style Four',
									'5' => 'Top Post Style Five'
									),
									'std' => '5'
								),
								array(
											'id' => 'cat_top_post_ids',
											'type' => 'text',
											'title' => esc_html__('Top Post IDs', 'pantograph'), 
											'sub_desc' => esc_html__('Enter your chosen Top Post IDs comma separated', 'pantograph'),
											'std' => '',
								),
								array(
											'id' => 'cat_top_post_items',
											'type' => 'text',
											'title' => esc_html__('Post Limit', 'pantograph'), 
											'sub_desc' => esc_html__('How many post you want to show in top post area', 'pantograph'),
											'std' => '',
								),
								array(
									'id' => 'cat_top_post_order',
									'type' => 'select',
									'title' => esc_html__('Post Order', 'pantograph'), 
									'desc' => esc_html__('Post Order', 'pantograph'),
									'options'  => array(
									'DESC' => 'DESC',
									'ASC' => 'ASC'
									),
									'default'  => array('DESC')
								),
								array(
									'id' => 'cat_top_posts_fullwidth',
									'type' => 'checkbox',
									'title' => esc_html__('Stretch Top Posts Row', 'pantograph'),
									'sub_desc' => esc_html__('Stretch Top Posts Row to Full Width', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pionusnews_post_h1_size',
									'type' => 'text',
									'title' => esc_html__('h1 Font Size', 'pantograph'), 
									'desc' => esc_html__('Input Font size. For example: 26px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h1_height',
									'type' => 'text',
									'title' => esc_html__('h1 Line Height', 'pantograph'), 
									'desc' => esc_html__('Input line height. For example: 38px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h1_fontfamily',
									'type' => 'text',
									'title' => esc_html__('h1 Font Family', 'pantograph'), 
									'desc' => esc_html__('Input Font-Family name. For example: Roboto. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h1_weight',
									'type' => 'text',
									'title' => esc_html__('h1 Font Weight', 'pantograph'), 
									'desc' => esc_html__('Input font weight. For example: 400. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h2_size',
									'type' => 'text',
									'title' => esc_html__('h2 Font Size', 'pantograph'), 
									'desc' => esc_html__('Input Font size. For example: 26px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h2_height',
									'type' => 'text',
									'title' => esc_html__('h2 Line Height', 'pantograph'), 
									'desc' => esc_html__('Input line height. For example: 38px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h2_fontfamily',
									'type' => 'text',
									'title' => esc_html__('h2 Font Family', 'pantograph'), 
									'desc' => esc_html__('Input Font-Family name. For example: Roboto. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h2_weight',
									'type' => 'text',
									'title' => esc_html__('h2 Font Weight', 'pantograph'), 
									'desc' => esc_html__('Input font weight. For example: 400. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h3_size',
									'type' => 'text',
									'title' => esc_html__('h3 Font Size', 'pantograph'), 
									'desc' => esc_html__('Input Font size. For example: 26px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h3_height',
									'type' => 'text',
									'title' => esc_html__('h3 Line Height', 'pantograph'), 
									'desc' => esc_html__('Input line height. For example: 38px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h3_fontfamily',
									'type' => 'text',
									'title' => esc_html__('h3 Font Family', 'pantograph'), 
									'desc' => esc_html__('Input Font-Family name. For example: Roboto. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h3_weight',
									'type' => 'text',
									'title' => esc_html__('h3 Font Weight', 'pantograph'), 
									'desc' => esc_html__('Input font weight. For example: 400. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h4_size',
									'type' => 'text',
									'title' => esc_html__('h4 Font Size', 'pantograph'), 
									'desc' => esc_html__('Input Font size. For example: 26px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h4_height',
									'type' => 'text',
									'title' => esc_html__('h4 Line Height', 'pantograph'), 
									'desc' => esc_html__('Input line height. For example: 38px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h4_fontfamily',
									'type' => 'text',
									'title' => esc_html__('h4 Font Family', 'pantograph'), 
									'desc' => esc_html__('Input Font-Family name. For example: Roboto. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h4_weight',
									'type' => 'text',
									'title' => esc_html__('h4 Font Weight', 'pantograph'), 
									'desc' => esc_html__('Input font weight. For example: 400. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h5_size',
									'type' => 'text',
									'title' => esc_html__('h5 Font Size', 'pantograph'), 
									'desc' => esc_html__('Input Font size. For example: 26px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h5_height',
									'type' => 'text',
									'title' => esc_html__('h5 Line Height', 'pantograph'), 
									'desc' => esc_html__('Input line height. For example: 38px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h5_fontfamily',
									'type' => 'text',
									'title' => esc_html__('h5 Font Family', 'pantograph'), 
									'desc' => esc_html__('Input Font-Family name. For example: Roboto. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h5_weight',
									'type' => 'text',
									'title' => esc_html__('h5 Font Weight', 'pantograph'), 
									'desc' => esc_html__('Input font weight. For example: 400. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h6_size',
									'type' => 'text',
									'title' => esc_html__('h6 Font Size', 'pantograph'), 
									'desc' => esc_html__('Input Font size. For example: 26px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h6_height',
									'type' => 'text',
									'title' => esc_html__('h6 Line Height', 'pantograph'), 
									'desc' => esc_html__('Input line height. For example: 38px. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h6_fontfamily',
									'type' => 'text',
									'title' => esc_html__('h6 Font Family', 'pantograph'), 
									'desc' => esc_html__('Input Font-Family name. For example: Roboto. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pionusnews_post_h6_weight',
									'type' => 'text',
									'title' => esc_html__('h6 Font Weight', 'pantograph'), 
									'desc' => esc_html__('Input font weight. For example: 400. Keep it empty if you want to use the default.', 'pantograph'),
									'std' => '',
								)
								)
	);							
				
	//section for Social icon url
	$sections[] = array(
					'icon_type' => 'iconfont',
					'icon' => 'group',
					'icon_class' => 'icon-large',
					'title' => esc_html__('Social Media', 'pantograph'),
					'desc' => wp_kses( __('<p class="description">This is options for setting up the social media of website. Do not forget to use http:// for any social urls.</p>', 'pantograph'), $allowed_html_array ),
					'fields' => array(
								array(
											'id' => 'social_facebook',
											'type' => 'text',
											'title' => esc_html__('Facebook URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your account page', 'pantograph'),
											'std' => '',
								),
								
								array(
											'id' => 'social_twitter',
											'type' => 'text',
											'title' => esc_html__('Twitter URL', 'pantograph'),
											'sub_desc' => esc_html__('The URL to your account page', 'pantograph'),
											'std' => '',
								),
								
								array(
											'id' => 'social_linkedin',
											'type' => 'text',
											'title' => esc_html__('Linkedin URL', 'pantograph'),
											'sub_desc' => esc_html__('The URL to your account page', 'pantograph'),
											'std' => '',
								),

								array(
											'id' => 'social_googleplus',
											'type' => 'text',
											'title' => esc_html__('GooglePlus URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your account page', 'pantograph'),
											'std' => '',
								),													
								
								array(
											'id' => 'social_instagram',
											'type' => 'text',
											'title' => esc_html__('Instagram URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your account page', 'pantograph'),
											'std' => '',
								),
								
								array(
											'id' => 'social_utube',
											'type' => 'text',
											'title' => esc_html__('YouTube URL', 'pantograph'), 
											'sub_desc' => esc_html__('The URL to your account page', 'pantograph'),
											'std' => '',
								),
								array(
												'id' => 'topbar_social_on_off',
												'type' => 'checkbox',
												'title' => esc_html__('Social Icons on Top Bar', 'pantograph'),
												'sub_desc' => esc_html__('Switch On Social Icons on Top Bar.', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
											),
								array(
												'id' => 'navbar_social_on_off',
												'type' => 'checkbox',
												'title' => esc_html__('Social Icons on Navigation Bar', 'pantograph'),
												'sub_desc' => esc_html__('Switch On Social Icons on Navigation Bar. This option is NOT for Default Header, Header Style Seven and Header Style Three.', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
											),
								
								array(
												'id' => 'pionusnews_flickr_id',
												'type' => 'text',
												'title' => esc_html__('You Flickr ID', 'pantograph'), 
												'sub_desc' => 'Example Flickr ID: 120958634@N07 . After that, copy and paste this: <div class="flickr-widget" id="flickr"></div> in any Text-Widget to show the Flickr widget in your site front-end."',
												'std' => '',
								),
							)
				);
		//section for aweber
		$sections[] = array(
				'icon_type' => 'iconfont',
				'icon' => 'cog',
				'icon_class' => 'icon-large',
				'title' => esc_html__('MailChimp/Aweber Newsletter', 'pantograph'),
				'desc' => wp_kses( __('<p class="description">MailChimp and Aweber settings for footer subscriber form of Pionusnews</p>', 'pantograph'), $allowed_html_array ),
				'fields' => array(

										array(
													'id' => 'subscribe_form_heading',
													'type' => 'text',
													'title' => esc_html__('Subscribe Form Heading', 'pantograph'), 
													'sub_desc' => esc_html__('Input your Subscribe Form Heading Here', 'pantograph'),
													'std' => esc_html__('Get the best viral stories straight into your inbox!', 'pantograph')
										),
										array(
													'id' => 'subscribe_form_subheading',
													'type' => 'text',
													'title' => esc_html__('Subscribe Form Sub-Heading', 'pantograph'), 
													'sub_desc' => esc_html__('Input your Subscribe Form Sub-Heading Here', 'pantograph'),
													'std' => esc_html__('Do not worry we do not spam', 'pantograph')
										),
										array(
													'id' => 'mailchimp_apikey',
													'type' => 'text',
													'title' => esc_html__('MailChimp API Key', 'pantograph'), 
													'sub_desc' => esc_html__('The unique API Key of your MailChimp account', 'pantograph'),
													'std' => '',
										),
										array(
													'id' => 'mailchimp_listid',
													'type' => 'text',
													'title' => esc_html__('MailChimp List ID', 'pantograph'), 
													'sub_desc' => esc_html__('The unique List ID of your MailChimp account', 'pantograph'),
													'std' => '',															
										),
										array(
													'id' => '123',
													'type' => 'info',
													'desc' => esc_html__('If you want to use Aweber instead of MailChimp use the settings below and keep the above MailChimp fields empty.', 'pantograph'),
										),
										array(
													'id' => 'ft_aweber_listid',
													'type' => 'text',
													'title' => esc_html__('Aweber List ID', 'pantograph'), 
													'sub_desc' => esc_html__('The unique List ID of Aweber account', 'pantograph'),
													'std' => '',
										),
										array(
													'id' => 'aweber_redirectpage',
													'type' => 'text',
													'title' => esc_html__('Redirect Page URL', 'pantograph'), 
													'sub_desc' => esc_html__('Redirect page url after submission of Aweber form', 'pantograph'),
													'std' => '',
										),
										array(
													'id' => 'aweber_redirectpage_old',
													'type' => 'text',
													'title' => esc_html__('Redirect Page URL for already subscribed users', 'pantograph'), 
													'sub_desc' => esc_html__('Redirect page url for already subscribed users of Aweber', 'pantograph'),
													'std' => '',
										)
				)
			);
						
		//section for Footer
					$sections[] = array(
							'icon_type' => 'iconfont',
							'icon' => 'columns',
							'icon_class' => 'icon-large',
							'title' => esc_html__('Footer', 'pantograph'),
							'desc' => wp_kses( __('<p class="description">This is options for Footer.</p>', 'pantograph'), $allowed_html_array ),
							'fields' => array(
											array(
												'id' => 'pionusnews_footer_style',
												'type' => 'radio',
												'title' => esc_html__('Website Footer Styles', 'pantograph'), 
												'sub_desc' => esc_html__('Choose a Footer Style for your Website', 'pantograph'),
												'options' => array(
												'default' => 'Footer Style Default',
												'1' => 'Footer Style One',
												'2' => 'Footer Style Two',
												'3' => 'Footer Style Three',
												'4' => 'Footer Style Four',
												'5' => 'Footer Style Five',
												'6' => 'Footer Style Six'
												), // Must provide key => value pairs for radio options
												'std' => 'default'
											),
											array(
												'id' => 'pionusnews_footer_columns',
												'type' => 'radio',
												'title' => esc_html__('Number of Columns in Footer', 'pantograph'), 
												'sub_desc' => esc_html__('How Many Columns You Want in Footer?', 'pantograph'),
												'options' => array(
												'1' => 'One Column (Insert your Widgets in "1 Column Footer Widgets" area from Appearance > Widgets page)',
												'2' => 'Two Columns (Insert your Widgets in "2 Columns Footer Widgets" area from Appearance > Widgets page)',
												'3' => 'Three Columns (Insert your Widgets in "3 Columns Footer Widgets" area from Appearance > Widgets page)',
												'4' => 'Four Columns (Insert your Widgets in "4 Columns Footer Widgets" area from Appearance > Widgets page)',
												'5' => 'Six Columns (Insert your Widgets in "6 Columns Footer Widgets" area from Appearance > Widgets page)',
												), // Must provide key => value pairs for radio options
												'std' => '4'
											),
											array(
												'id' => 'pionusnews_footer_widgetized_area',
												'type' => 'checkbox',
												'title' => esc_html__('Footer Widgetized Area', 'pantograph'),
												'sub_desc' => esc_html__('Switch On Widgetized Area In Footer', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'pionusnews_fullwidth_footer',
												'type' => 'checkbox',
												'title' => esc_html__('Full Width Footer', 'pantograph'),
												'sub_desc' => esc_html__('Make the footer Full-Width in-case the site is Boxed Style.', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'pionusnews_footer_about_column',
												'type' => 'checkbox',
												'title' => esc_html__('Default About Column', 'pantograph'),
												'sub_desc' => esc_html__('Switch On Default About Column In Footer', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'footer_logo_url',
												'type' => 'upload',
												'title' => esc_html__('Upload Footer Logo', 'pantograph'),
												'sub_desc' => esc_html__('This is the footer logo in About Column', 'pantograph'),
											),
											array(
												'id' => 'pionusnews_footer_short_desc',
												'type' => 'textarea',
												'title' => esc_html__('Footer Short Description in About Column', 'pantograph'), 
												'sub_desc' => esc_html__('Enter short description to show beside the footer logo', 'pantograph'),
												'std' => '',
											),
											array(
												'id' => 'footer_short_desc_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Short Description Text Color', 'pantograph'), 
												'sub_desc' => esc_html__('Text color of Footer Short Description.', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => '#ffffff'
											),
											array(
												'id' => 'footer_bg_color',
												'type' => 'color',
												'title' => esc_html__('Footer Background Color', 'pantograph'), 
												'sub_desc' => esc_html__('Choose Footer Background Color from here', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => '#333f49'
											),
											array(
												'id' => 'search_on_off_footer',
												'type' => 'checkbox',
												'title' => esc_html__('Search Box In Footer', 'pantograph'),
												'sub_desc' => esc_html__('On/Off Search Box In Footer', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'footer_search_bg_color',
												'type' => 'color',
												'title' => esc_html__('Footer Search Box Background Color', 'pantograph'), 
												'sub_desc' => esc_html__('Choose Footer Search Box Background Color from here', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'footer_search_text_color',
												'type' => 'color',
												'title' => esc_html__('Footer Search Box Text Color', 'pantograph'), 
												'sub_desc' => esc_html__('Choose Footer Search Box Text Color from here', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'footer_button_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Buttons Color', 'pantograph'), 
												'sub_desc' => esc_html__('Choose Footer Buttons Color from here', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'footer_title_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Titles Color', 'pantograph'), 
												'sub_desc' => esc_html__('Text color of Footer column titles', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => '#ffffff'
											),
											array(
												'id' => 'footer_link_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Links Color', 'pantograph'), 
												'sub_desc' => esc_html__('Text color of Footer links', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => '#ffffff'
											),
											array(
												'id' => 'footer_socialicons_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Social Icons Color', 'pantograph'), 
												'sub_desc' => esc_html__('Choose Footer Social Icons Color from here', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'footer_border_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Links Border Bottom Color', 'pantograph'), 
												'sub_desc' => esc_html__('Border bottom is being used in links of some Footer variations. Choose the color of that border.', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => '#ffffff'
											),
											array(
												'id' => 'footer_bottom_text_colors',
												'type' => 'color',
												'title' => esc_html__('Bottom Footer Text Color', 'pantograph'), 
												'sub_desc' => esc_html__('Text color of Bottom Footer. ie: Copyright text color.', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'pionusnews_bottom_footer_alt',
												'type' => 'checkbox',
												'title' => esc_html__('Bottom Footer Alternate Design', 'pantograph'),
												'sub_desc' => esc_html__('Switch On Bottom Footer Alternate Design (Will work for Footer Style Six and Default Footer Only)', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'pionusnews_bottom_footer_alt_color',
												'type' => 'color',
												'title' => esc_html__('Background Color for Bottom Footer Alternate Design', 'pantograph'), 
												'sub_desc' => esc_html__('Choose Background Color for Bottom Footer Alternate Design', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'pionusnews_subscribe_text',
												'type' => 'textarea',
												'title' => esc_html__('Subscribe Short Description', 'pantograph'), 
												'sub_desc' => esc_html__('Enter short description to show beside the subscribe logo', 'pantograph'),
												'std' => '',
											),
											array(
												'id' => 'footer_subscribe_bg_color',
												'type' => 'color',
												'title' => esc_html__('Footer Subscribe Box Background Color', 'pantograph'), 
												'sub_desc' => esc_html__('Choose Footer Subscribe Box Background Color from here', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'pionusnews_footer_content_mobile_off',
												'type' => 'checkbox',
												'title' => esc_html__('Footer Content for Tablets and Mobiles', 'pantograph'),
												'sub_desc' => esc_html__('Switch On Footer Content for Tablets and Mobiles', 'pantograph'),
												'switch' => true,
												'std' => '1' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'copy_text',
												'type' => 'textarea',
												'title' => esc_html__('Copyright Text', 'pantograph'),
												'sub_desc' => esc_html__('Enter your Copyright text here', 'pantograph'),
												'std' => '',
											),
											
							)
						);

		//section for page
					$sections[] = array(
							'icon_type' => 'iconfont',
							'icon' => 'cogs',
							'icon_class' => 'icon-large',
							'title' => esc_html__('Other Settings', 'pantograph'),
							'desc' => wp_kses( __('<p class="description">Other Settings</p>', 'pantograph'), $allowed_html_array ),
							'fields' => array(
																						
											array(
												'id' => 'pionusnews_on_breadcrumbs',
												'type' => 'checkbox',
												'title' => esc_html__('Post Breadcrumbs', 'pantograph'),
												'sub_desc' => esc_html__('On/Off user for showing or hide breadcrumb on posts', 'pantograph'),
												'switch' => true,
												'std' => '1' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'breaking_news_on_off',
												'type' => 'checkbox',
												'title' => esc_html__('Breaking News ON - OFF in Header', 'pantograph'),
												'sub_desc' => esc_html__('On/Off Breaking News in Header', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'breaking_news_title',
												'type' => 'text',
												'title' => esc_html__('Breaking News Heading', 'pantograph'),
												'sub_desc' => esc_html__('Heading for the Breaking News', 'pantograph'),
												'std' => 'Breaking News' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'breaking_news_cat',
												'type' => 'text',
												'title' => esc_html__('Breaking News Category ID', 'pantograph'),
												'sub_desc' => esc_html__('Input your desired Category ID for Breaking News', 'pantograph'),
												'std' => '' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'pionusnews_minify_css',
												'type' => 'checkbox',
												'title' => esc_html__('On/Off Minified CSS', 'pantograph'),
												'sub_desc' => esc_html__('On/Off Minified CSS. If this option is "ON" it will help to faster the page loading time, since minified style.css will be used instead of normal style.css', 'pantograph'),
												'switch' => true,
												'std' => '1' // 1 = checked | 0 = unchecked
											)
							)
						);							

                        

	$tabs = array();

		$theme_data = wp_get_theme();
		$item_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$author_uri = $theme_data->get('AuthorURI');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');

	
	$item_info = '<div class="redux-opts-section-desc">';
	$item_info .= '<p class="redux-opts-item-data description item-uri">' . wp_kses( __('<strong>Theme URL:</strong> ', 'pantograph'), $allowed_html_array ) . '<a href="' . esc_url( $item_uri ) . '" target="_blank">' . $item_uri . '</a></p>';
	$item_info .= '<p class="redux-opts-item-data description item-author">' . wp_kses( __('<strong>Author:</strong> ', 'pantograph'), $allowed_html_array ) . ($author_uri ? '<a href="' . esc_url( $author_uri ) . '" target="_blank">' . $author . '</a>' : $author) . '</p>';
	$item_info .= '<p class="redux-opts-item-data description item-version">' . wp_kses( __('<strong>Version:</strong> ', 'pantograph'), $allowed_html_array ) . $version . '</p>';
	$item_info .= '<p class="redux-opts-item-data description item-description">' . $description . '</p>';
	$item_info .= '<p class="redux-opts-item-data description item-tags">' . wp_kses( __('<strong>Tags:</strong> ', 'pantograph'), $allowed_html_array ) . implode(', ', $tags) . '</p>';
	$item_info .= '</div>';

	global $Redux_Options;
	$Redux_Options = new Redux_Options($sections, $args, $tabs);
}
add_action('init', 'pionusnews_setup_framework_options', 0);