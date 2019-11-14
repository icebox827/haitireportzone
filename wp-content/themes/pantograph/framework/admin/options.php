<?php

/* -----------------------------------------------------------------------------
 * Helper Function
 * -------------------------------------------------------------------------- */
function pantograph_get_option( $opt_name, $default = null ) {
	global $Redux_Options;
	return $Redux_Options->get( $opt_name, $default );
}
/* -----------------------------------------------------------------------------
 * Load Custom Fields
 * -------------------------------------------------------------------------- */
require_once( PANTOGRAPH_ADMIN_PATH . 'custom-fields/field_font_upload/field_upload.php' );
require_once( PANTOGRAPH_ADMIN_PATH . 'custom-fields/field_typography.php' );
require_once( PANTOGRAPH_ADMIN_PATH . 'custom-fields/field_section_info.php' );
require_once( PANTOGRAPH_ADMIN_PATH . 'custom-fields/field_sidebar_select.php' );
require_once( PANTOGRAPH_ADMIN_PATH . 'custom-fields/field_color_scheme.php' );
require_once( PANTOGRAPH_ADMIN_PATH . 'custom-fields/field_slider.php' );
require_once( PANTOGRAPH_ADMIN_PATH . 'custom-fields/field_slides.php' );
/* -----------------------------------------------------------------------------
 * Initial Redux Framework
 * -------------------------------------------------------------------------- */


if(!class_exists('Redux_Options')) {
	require_once( PANTOGRAPH_ADMIN_PATH . 'options/defaults.php' );
}
/*
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be over ridden if needed.
 *
 */
function pantograph_setup_framework_options() {
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
	$args['opt_name'] = 'pantograph_theme_options';

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
	$args['intro_text'] = wp_kses( __( '<h4>Theme Settings Information for PantoGraph Theme</h4>', 'pantograph' ), $allowed_html_array );

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
									'id' => 'pantograph_no_post_img',
									'type' => 'upload',
									'title' => esc_html__('Upload No Image', 'pantograph'),
									'sub_desc' => esc_html__('This image will be show when post have no custom or featured image.', 'pantograph'),
								),
								array(
									'id' => 'pantograph_readmore_label',
									'type' => 'text',
									'title' => esc_html__('Read More Label', 'pantograph'), 
									'desc' => esc_html__('Read More button will be visible only for post excerpt, user can read continue', 'pantograph'),
									'std' => 'Read More',
								),
								array(
									'id' => 'pantograph_single_post_style',
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
									'default'  => array('6')
								),
								array(
									'id' => 'pantograph_category_style',
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
									'12' => 'One Column Style 12',
									'12' => 'Three Column Masonry Style 13'
									),
									'default'  => array('9')
								),
								array(
									'id' => 'pantograph_show_author_on_single_post',
									'type' => 'checkbox',
									'title' => esc_html__('Author Info On Single Post', 'pantograph'),
									'sub_desc' => esc_html__('On/Off user for showing or hide author info on the single posts', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pantograph_title_style',
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
									'12' => 'Title Style Twelve'
									), 
									'std' => '12'
								),
								array(
									'id' => 'pantograph_sidebar_style',
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
									'12' => 'Title Style Twelve'
									), 
									'std' => '12'
								),
								array(
									'id' => 'img_top_cat_bg_style',
									'type' => 'radio',
									'title' => esc_html__('Image Overlay Category Text Style', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Image Overlay Category Text Style', 'pantograph'),
									'options' => array(
									'1' => 'Default Style',
									'2' => 'Style One',
									'3' => 'Style Two',
									'4' => 'Style Three'
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
									'id' => 'global_body_color',
									'type' => 'color',
									'title' => esc_html__('Website Global Body Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Global Body Color will work for website body background', 'pantograph'),
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
									'id' => 'global_white_conainter',
									'type' => 'checkbox',
									'title' => esc_html__('Do You Want Box Style?', 'pantograph'),
									'sub_desc' => esc_html__('On/Off white container for whole website', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'pantograph_font_style',
									'type' => 'radio',
									'title' => esc_html__('Website Font Styles', 'pantograph'), 
									'sub_desc' => esc_html__('Choose a font Style for your Website', 'pantograph'),
									'options' => array(
									'1' => 'Font Default (Lato + Poppins + Roboto + Verdana)',
									'2' => 'Poppins + Roboto + Rajdhani + Verdana',
									'3' => 'Lato + Roboto Condensed + Roboto + Poppins',
									'4' => 'Open Sans + Roboto + Verdana',
									'5' => 'Hind Vadodara',
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
									'id' => 'pantograph_logo_top_padding',
									'type' => 'text',
									'title' => esc_html__('Change Top Padding of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 15px . Keep it empty if you want to use the default 5px top padding.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pantograph_logo_bottom_padding',
									'type' => 'text',
									'title' => esc_html__('Change Bottom Padding of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 15px . Keep it empty if you want to use the default 5px bottom padding.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pantograph_logo_left_padding',
									'type' => 'text',
									'title' => esc_html__('Change Left Padding of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 15px . Keep it empty if you want to use the default 15px left padding.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pantograph_logo_right_padding',
									'type' => 'text',
									'title' => esc_html__('Change Right Padding of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 15px . Keep it empty if you want to use the default 5px right padding.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'pantograph_logo_max_width',
									'type' => 'text',
									'title' => esc_html__('Change Maximum Width of Main Logo', 'pantograph'), 
									'desc' => esc_html__('Input in pixel. For example: 215px . Keep it empty if you want to use the default 285px maximum width.', 'pantograph'),
									'std' => '',
								),
								array(
									'id' => 'footer_logo_url',
									'type' => 'upload',
									'title' => esc_html__('Upload Footer Logo', 'pantograph'),
									'sub_desc' => esc_html__('This is the footer logo', 'pantograph'),
								),
								array(
									'id' => 'pantograph_favicon',
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
									'id' => 'pantograph_header_style',
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
									'7' => 'Header Style Seven'
									), // Must provide key => value pairs for radio options
									'std' => '1'
								),
								array(
									'id' => 'header_background_color',
									'type' => 'color',
									'title' => esc_html__('Header Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Background Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'menu_bg_for_4_5',
									'type' => 'color',
									'title' => esc_html__('Header Menu Background', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Menu Background for Header Style 4, 5 and 7', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
								),
								array(
									'id' => 'menu_link_color',
									'type' => 'color',
									'title' => esc_html__('Menu Link Text Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Menu Link Text Color from here, It will effect on text color of Header Style 7 only', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
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
									'id' => 'pantograph_on_breadcrumbs',
									'type' => 'checkbox',
									'title' => esc_html__('Post Breadcrumbs', 'pantograph'),
									'sub_desc' => esc_html__('On/Off user for showing or hide breadcrumb on posts', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'search_on_off',
									'type' => 'checkbox',
									'title' => esc_html__('Search Icon ON - OFF in Header', 'pantograph'),
									'sub_desc' => esc_html__('On/Off Search Icon in Header', 'pantograph'),
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
									'id' => 'pantograph_header_topbar',
									'type' => 'checkbox',
									'title' => esc_html__('Header TopBar', 'pantograph'),
									'sub_desc' => esc_html__('On/Off for showing Header TopBar', 'pantograph'),
									'switch' => true,
									'std' => '0' // 1 = checked | 0 = unchecked
								),
								array(
									'id' => 'header_topbar_background_color',
									'type' => 'color',
									'title' => esc_html__('Header Top Bar Background Color', 'pantograph'), 
									'sub_desc' => esc_html__('Choose Header Top Bar Background Color', 'pantograph'),
									'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
									'std' => ''
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
									'id' => 'pantograph_sticky_widget',
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
									'std' => '0' // 1 = checked | 0 = unchecked
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
									'std' => ''
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
								)
							)
				);
		//section for aweber
		$sections[] = array(
				'icon_type' => 'iconfont',
				'icon' => 'cog',
				'icon_class' => 'icon-large',
				'title' => esc_html__('MailChimp/Aweber Newsletter', 'pantograph'),
				'desc' => wp_kses( __('<p class="description">MailChimp and Aweber settings for footer subscriber form of Pantograph</p>', 'pantograph'), $allowed_html_array ),
				'fields' => array(

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
												'id' => 'pantograph_footer_style',
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
												'id' => 'footer_bg_color',
												'type' => 'color',
												'title' => esc_html__('Footer Background Color', 'pantograph'), 
												'sub_desc' => esc_html__('Choose Footer Background Color from here', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
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
												'id' => 'footer_title_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Titles Color', 'pantograph'), 
												'sub_desc' => esc_html__('Text color of Footer column titles', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'footer_link_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Links Color', 'pantograph'), 
												'sub_desc' => esc_html__('Text color of Footer links', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
											),
											array(
												'id' => 'footer_border_colors',
												'type' => 'color',
												'title' => esc_html__('Footer Links Border Bottom Color', 'pantograph'), 
												'sub_desc' => esc_html__('Border bottom is being used in links of some Footer variations. Choose the color of that border.', 'pantograph'),
												'desc' => esc_html__('Keep it empty if you like to use the default', 'pantograph'),
												'std' => ''
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
												'id' => 'pantograph_subscribe_text',
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
												'id' => 'pantograph_footer_short_desc',
												'type' => 'textarea',
												'title' => esc_html__('Footer Short Description', 'pantograph'), 
												'sub_desc' => esc_html__('Enter short description to show beside the footer logo', 'pantograph'),
												'std' => '',
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
												'id' => 'pantograph_preloader',
												'type' => 'checkbox',
												'title' => esc_html__('On/Off Page Loader GIF', 'pantograph'),
												'sub_desc' => esc_html__('On/Off Page Loader GIF', 'pantograph'),
												'switch' => true,
												'std' => '1' // 1 = checked | 0 = unchecked
											),
											array(
												'id' => 'pantograph_minify_css',
												'type' => 'checkbox',
												'title' => esc_html__('On/Off Minified CSS', 'pantograph'),
												'sub_desc' => esc_html__('On/Off Minified CSS. If this option is "ON" it will help to faster the page loading time, since minified style.css will be used instead of normal style.css', 'pantograph'),
												'switch' => true,
												'std' => '0' // 1 = checked | 0 = unchecked
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
add_action('init', 'pantograph_setup_framework_options', 0);