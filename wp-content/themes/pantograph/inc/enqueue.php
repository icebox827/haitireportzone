<?php
function pantograph_scripts_basic() {  
global $wp_query;
	/* ------------------------------------------------------------------------ */
	/* Enqueue Scripts */
	/* ------------------------------------------------------------------------ */
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'), '2.8.3', false );
wp_enqueue_script( 'jquery.validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), '1.17.0', true );	
/* Bootstrap */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true);
	/* Slick */
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.6.0', true);
	wp_enqueue_script('pantograph-theme', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('totop', get_template_directory_uri() . '/js/totop.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('hc-sticky', get_template_directory_uri() . '/js/hc-sticky.js', array( 'jquery' ), '2.1.0', true);
	
	if( is_404() || is_search() ){
	}else{
	global $post;
	$sticky_widget = get_post_meta(get_the_ID(), 'enable_sticky_widget', true);
	if( is_a( $post, 'WP_Post' ) && !has_shortcode( $post->post_content, 'vc_widget_sidebar') && (pantograph_get_option('pantograph_sticky_widget') == 1)){
		wp_enqueue_script('widgets-sticky', get_template_directory_uri() . '/js/widgets-sticky.js', array( 'jquery' ), '1.0.0', true);
	}
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'vc_widget_sidebar') && ($sticky_widget==1) ) {
		wp_enqueue_script('widgets-sticky', get_template_directory_uri() . '/js/widgets-sticky.js', array( 'jquery' ), '1.0.0', true);
	}
	}
	
	// enqueue our loadmore script
	wp_enqueue_script( 'pantograph-loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'pantograph-loadmore', 'pantograph_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => serialize( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
	}
add_action( 'wp_enqueue_scripts', 'pantograph_scripts_basic' ); 

function pantograph_styles_basic()  {  
	/* ------------------------------------------------------------------------ */
	/* Enqueue Stylesheets */
	/* ------------------------------------------------------------------------ */
	/* Fonts */
	if(pantograph_get_option('pantograph_font_style') == 1) { 
	wp_enqueue_style( 'pantograph-fonts-lato', pantograph_fonts_lato_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-poppins', pantograph_fonts_poppins_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-roboto', pantograph_fonts_roboto_url(), array(), null );
	}
	elseif(pantograph_get_option('pantograph_font_style') == 2)
	{
	wp_enqueue_style( 'pantograph-fonts-rajdhani', pantograph_fonts_rajdhani_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-poppins', pantograph_fonts_poppins_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-roboto', pantograph_fonts_roboto_url(), array(), null );
	}
	elseif(pantograph_get_option('pantograph_font_style') == 3)
	{
	wp_enqueue_style( 'pantograph-fonts-lato', pantograph_fonts_lato_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-roboto-condensed', pantograph_fonts_roboto_condensed_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-roboto', pantograph_fonts_roboto_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-poppins', pantograph_fonts_poppins_url(), array(), null );
	}
	elseif(pantograph_get_option('pantograph_font_style') == 4)
	{
	wp_enqueue_style( 'pantograph-fonts-opensans', pantograph_fonts_opensans_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-roboto', pantograph_fonts_roboto_url(), array(), null );
	}
	elseif(pantograph_get_option('pantograph_font_style') == 5)
	{
	wp_enqueue_style( 'pantograph-fonts-hind-vadodara', pantograph_fonts_hind_vadodara_url(), array(), null );
	}
	else{
	wp_enqueue_style( 'pantograph-fonts-lato', pantograph_fonts_lato_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-poppins', pantograph_fonts_poppins_url(), array(), null );
	wp_enqueue_style( 'pantograph-fonts-roboto', pantograph_fonts_roboto_url(), array(), null );
	}	
	
	/* Font Awesome */
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	/* Bootstrap */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'pantograph-ts', get_template_directory_uri() . '/css/ts.css');
	if(pantograph_get_option('pantograph_minify_css') == 1) {
	wp_enqueue_style( 'pantograph-main-styles', get_template_directory_uri() . '/css/main-styles.min.css');
	} else {
	wp_enqueue_style( 'pantograph-main-styles', get_template_directory_uri() . '/css/main-styles.css');
	}
	wp_enqueue_style( 'pantograph-stylesheet', get_template_directory_uri() . '/style.css'); // Main Stylesheet
	wp_enqueue_style( 'pantograph-new-style', get_template_directory_uri() . '/css/new-style.css'); // New Stylesheet
	if(pantograph_get_option('pantograph_font_style') == 1) {
	wp_enqueue_style( 'pantograph-style5', get_template_directory_uri() . '/css/style4.css');
	}
	if(pantograph_get_option('pantograph_font_style') == 2) { 
	wp_enqueue_style( 'pantograph-style-newfont', get_template_directory_uri() . '/css/style-newfont.css');
	}
	if(pantograph_get_option('pantograph_font_style') == 3) { 
	wp_enqueue_style( 'pantograph-style3', get_template_directory_uri() . '/css/style3.css');
	}
	if(pantograph_get_option('pantograph_font_style') == 4) { 
	wp_enqueue_style( 'pantograph-style1', get_template_directory_uri() . '/css/style1.css');
	}
	if(pantograph_get_option('pantograph_font_style') == 5) { 
	wp_enqueue_style( 'pantograph-style0', get_template_directory_uri() . '/css/style0.css');
	}
	/*Gutenberg Only*/
	if ( (function_exists( 'the_gutenberg_project' ) || function_exists( 'wp_common_block_scripts_and_styles' )) && !pantograph_is_preview_plugin_active() ) {
	wp_enqueue_style( 'pantograph-gutenberg-additions', get_template_directory_uri() . '/gutenberg/css/gutenberg-additions.css'); // Gutenberg CSS
	}
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pantograph_get_option('global_white_conainter');
	$pantograph_body_bg_img = get_post_meta(get_the_ID(), 'pantograph_body_bg_img', true);
	if((($container_bg_white==1) && ($pantograph_body_bg_img!='')) || (($global_white_conainter==1) && ($pantograph_body_bg_img!=''))){
	wp_enqueue_style( 'pantograph-body-bg-img', get_template_directory_uri() . '/css/body-bg-img.css');
	}
	/* Title Styles */
	if((pantograph_get_option('pantograph_title_style') == 1) || (is_page( array( 'title-style-01' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style1', get_template_directory_uri() . '/css/title/title-style1.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 2) || (is_page( array( 'title-style-02' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style2', get_template_directory_uri() . '/css/title/title-style2.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 3) || (is_page( array( 'title-style-03' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style3', get_template_directory_uri() . '/css/title/title-style3.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 4) || (is_page( array( 'title-style-04' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style4', get_template_directory_uri() . '/css/title/title-style4.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 5) || (is_page( array( 'title-style-05' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style5', get_template_directory_uri() . '/css/title/title-style5.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 6) || (is_page( array( 'title-style-06' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style6', get_template_directory_uri() . '/css/title/title-style6.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 7) || (is_page( array( 'title-style-07' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style7', get_template_directory_uri() . '/css/title/title-style7.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 8) || (is_page( array( 'title-style-08' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style8', get_template_directory_uri() . '/css/title/title-style8.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 9) || (is_page( array( 'title-style-09' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style9', get_template_directory_uri() . '/css/title/title-style9.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 10) || (is_page( array( 'title-style-10' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style10', get_template_directory_uri() . '/css/title/title-style10.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 11) || (is_page( array( 'title-style-11' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style11', get_template_directory_uri() . '/css/title/title-style11.css');
	}elseif((pantograph_get_option('pantograph_title_style') == 12) || (is_page( array( 'title-style-12' ) ))) { 
		wp_enqueue_style( 'pantograph-title-style12', get_template_directory_uri() . '/css/title/title-style12.css');
	}else{
	}
	
	$post_title = get_the_title();
	if($post_title == 'Section Headings'){
	}else{
	/* Sidebar Title Styles */
	if((pantograph_get_option('pantograph_sidebar_style') == 1) || (is_page( array( 'title-style-01' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style1', get_template_directory_uri() . '/css/title/sidebar-title-style1.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 2) || (is_page( array( 'title-style-02' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style2', get_template_directory_uri() . '/css/title/sidebar-title-style2.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 3) || (is_page( array( 'title-style-03' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style3', get_template_directory_uri() . '/css/title/sidebar-title-style3.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 4) || (is_page( array( 'title-style-04' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style4', get_template_directory_uri() . '/css/title/sidebar-title-style4.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 5) || (is_page( array( 'title-style-05' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style5', get_template_directory_uri() . '/css/title/sidebar-title-style5.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 6) || (is_page( array( 'title-style-06' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style6', get_template_directory_uri() . '/css/title/sidebar-title-style6.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 7) || (is_page( array( 'title-style-07' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style7', get_template_directory_uri() . '/css/title/sidebar-title-style7.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 8) || (is_page( array( 'title-style-08' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style8', get_template_directory_uri() . '/css/title/sidebar-title-style8.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 9) || (is_page( array( 'title-style-09' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style9', get_template_directory_uri() . '/css/title/sidebar-title-style9.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 10) || (is_page( array( 'title-style-10' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style10', get_template_directory_uri() . '/css/title/sidebar-title-style10.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 11) || (is_page( array( 'title-style-11' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style11', get_template_directory_uri() . '/css/title/sidebar-title-style11.css');
	}elseif((pantograph_get_option('pantograph_sidebar_style') == 12) || (is_page( array( 'title-style-12' ) ))) { 
		wp_enqueue_style( 'pantograph-sidebar-title-style12', get_template_directory_uri() . '/css/title/sidebar-title-style12.css');
	}else{
	}
	}
	
}  
add_action( 'wp_enqueue_scripts', 'pantograph_styles_basic', 1 );

/**
 * Add color styling from theme
 */
function wpdocs_styles_method() {
		wp_enqueue_style(
        'custom-style',
        get_template_directory_uri() . '/css/custom_script.css'
		);
		$custom_css = "";
		if(is_category()){
        $cat_id = get_query_var('cat');
		$term = get_term_by('id', $cat_id, 'category');
		$color_code = get_term_meta( $term->term_id, '_category_color', true );
		$color = "#$color_code";
		$cat_data = get_option("category_$cat_id");
		if(isset($cat_data['show_hide_breadcrumb'])){
			$show_hide_breadcrumb = $cat_data['show_hide_breadcrumb'];
		}else{
			$show_hide_breadcrumb = '';
		}
		if(isset($cat_data['show_hide_title'])){
					$show_hide_title = $cat_data['show_hide_title'];
				}else{
					$show_hide_title = '';
				}
		if($color){
        $custom_css .= "
                .category .inner-content .col-md-8 h3 a.link, .inner-content .col-md-8 h3 a:hover {
					color: {$color}!important;
				}
				.category .inner-content .col-md-8 h4 a.link, .inner-content .col-md-8 h4 a:hover {
					color: {$color}!important;
				}
				.category .inner-content .col-md-8 a.rmore:hover {
					color: {$color}!important;
				}
				.category .inner-content .col-md-8 .meta span a {
					color: {$color}!important;
				}
				.category .inner-content .col-md-8 .meta span.small-title.cat {
					color: {$color}!important;
				}
				.category .post-excerpt h1 a:hover {
					color: {$color}!important;
				}
				.category .post-excerpt h3 a:hover {
					color: {$color}!important;
				}
				.category .post-excerpt h4 a:hover {
					color: {$color}!important;
				}
				.category article h4 a:hover {
					color: {$color}!important;
				}
				.category article h5 a:hover {
					color: {$color}!important;
				}
				.category .post-excerpt span a:hover {
					color: {$color}!important;
				}
				.category .post-excerpt .small-title.cat a:hover {
					color: {$color}!important;
				}
				.category .meta span a:hover {
					color: {$color}!important;
				}
				.video_details span a:hover{
					color: {$color}!important;
				}
				";
		}}

		$custom_color = pantograph_get_option('custom_color');
		$footer_bg_color = pantograph_get_option('footer_bg_color');
		if($custom_color==''){
			$global_color = '#33CCFF';
		}else{
			$global_color = pantograph_get_option('custom_color');
		}
		
		if($custom_color){
			
			$custom_css .="
				.title_style_1 .titleh3.margin-bottom-20{
						color: $custom_color;
					}
					.title_style_1 .titleh3.margin-bottom-20:before {
						background: $custom_color;
					}

					.title_style_1 h3.margin-bottom-15{
						color: $custom_color;
					}
					.title_style_1 h3.margin-bottom-15:before {
						background: $custom_color;
					}
					.title_style_1 h4.margin-bottom-15{
						color: $custom_color;
					}
					.title_style_1 h4.margin-bottom-15:before {
						background: $custom_color;
					}
					.title_style_2 .titleh3.margin-bottom-20{
						border-bottom: 4px solid $custom_color;
					}
					.title_style_2 h3.margin-bottom-15{
						border-bottom: 4px solid $custom_color;
					}

					.title_style_2 h4.margin-bottom-15{
						border-bottom: 4px solid $custom_color;
					}
					.title_style_4 .titleh3.margin-bottom-20{
						border-top: 4px solid $custom_color;
					}
					.title_style_4 .pull-right .nav-tabs>li.active>a, .pull-right .nav-tabs>li.active>a:focus, .pull-right .nav-tabs>li.active>a:hover {
						color: #33ccff;
					}
					.title_style_4 h3.margin-bottom-15{
						border-top: 4px solid $custom_color;
					}

					.title_style_4 h4.margin-bottom-15{
						border-top: 4px solid $custom_color;

					}
					.title_style_5 h3 b, .title_style_5 h4 b {
						background-color: $custom_color; 
					}

					.title_style_5 .titleh3.margin-bottom-20 b {
						background-color: $custom_color; 
					}
					.title_style_6 h3 b, .title_style_6 h4 b {
						background-color: $custom_color; 
					}

					.title_style_6 .titleh3.margin-bottom-20{
						border-top: 3px solid $custom_color;
					}
					.title_style_6 .titleh3.margin-bottom-20 b{
						background: $custom_color;
					}

					.title_style_6 h3.margin-bottom-15{
						border-top: 3px solid $custom_color;
					}

					.title_style_6 h4.margin-bottom-15{
						border-top: 3px solid $custom_color;
					}
					.title_style_7 h3 b, .title_style_7 h4 b {
						background-color: $custom_color; 
					}
					.title_style_7 .titleh3.margin-bottom-20 b {
						background-color: $custom_color; 
					}
					.title_style_7 .titleh3.margin-bottom-20{
						border-bottom: 3px solid $custom_color;
					}

					.title_style_7 .titleh3.margin-bottom-20 b:after {
						border-bottom: 31px solid $custom_color;
					}


					.title_style_7 h3.margin-bottom-15{
						border-bottom: 3px solid $custom_color;
					}

					.title_style_7 h3.margin-bottom-15 b:after {
						border-bottom: 31px solid $custom_color;
					}

					.title_style_7 h4.margin-bottom-15{
						border-bottom: 3px solid $custom_color;
					}

					.title_style_7 h4.margin-bottom-15 b:after {
						border-bottom: 31px solid $custom_color;
					}
					.title_style_8 .titleh3.margin-bottom-20 b{
						background-color: #444; 
					}
					.title_style_9 h3 b, .title_style_9 h4 b {
						background-color: $custom_color; 
					}
					.title_style_9 .titleh3.margin-bottom-20 b{
						background-color: $custom_color; 
					}
					.title_style_9 .titleh3.margin-bottom-20:before {
						background: rgba(0,0,0,.05)!important;
					}
					.title_style_9 .titleh3.margin-bottom-20 b:before {
						border-top-color: $custom_color;
						border-top: 10px solid $custom_color;
					}
					.title_style_9 h3.margin-bottom-15:before {
						background: rgba(0,0,0,.05)!important;
					}
					.title_style_9 h3.margin-bottom-15 b:before {
						border-top-color: $custom_color;
						border-top: 10px solid $custom_color;
					}
					.title_style_9 h4.margin-bottom-15:before {
						background: rgba(0,0,0,.05)!important;
					}
					.title_style_9 h4.margin-bottom-15 b:before {
						border-top-color: $custom_color;
						border-top: 10px solid $custom_color;
					}
					.title_style_10 h3 b, .title_style_10 h4 b {
						background-color: $custom_color; 
					}
					.title_style_10 .titleh3.margin-bottom-20:after {
						background: rgba(0,0,0,.04);
					}
					.title_style_10 .titleh3.margin-bottom-20 b {
						background-color: $custom_color; 
					}
					.title_style_11 h3 b, .title_style_11 h4 b {
						border-bottom: 2px solid $custom_color; 
					}
					.title_style_11 .titleh3.margin-bottom-20 b{
						border-bottom: 2px solid $custom_color;
					}
					.title_style_12 .titleh3.margin-bottom-20:after {
						background: $custom_color;
					}
					.title_style_12 .titleh3.margin-bottom-20:before {
						border-top-color: $custom_color;
						border-top: 5px solid $custom_color;
					}
					.title_style_12 h3.margin-bottom-15:after {
						background: $custom_color;
					}
					.title_style_12 h3.margin-bottom-15:before {
						border-top-color: $custom_color;
						border-top: 5px solid $custom_color;
					}

					.title_style_12 h4.margin-bottom-15:after {
						background: $custom_color;
					}
					.title_style_12 h4.margin-bottom-15:before {
						border-top-color: $custom_color;
						border-top: 5px solid $custom_color;
					}
			";
		}
		$body_color = get_post_meta(get_the_ID(), 'body_color', true);
		$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
		$container_bg_white_themeoptions = pantograph_get_option('global_white_conainter');
		$pantograph_header_radio_buttons = get_post_meta(get_the_ID(), 'header_key', true);
		$pantograph_header_style = pantograph_get_option('pantograph_header_style');
		$global_body_color = pantograph_get_option('global_body_color');
		if($body_color){
			$body_bg_color = get_post_meta(get_the_ID(), 'body_color', true);
		}elseif($global_body_color){
			$body_bg_color = pantograph_get_option('global_body_color');
		}else{
			$body_bg_color = '#F7F7F7';
		}
		if(($container_bg_white!=1) && ($container_bg_white_themeoptions!=1)){
			if($footer_bg_color){
				$custom_css .= "
				footer {
					background: {$footer_bg_color};
				}
				";
			}
		}
		if($container_bg_white==1){
			$custom_css .= "
				body {
					background: {$body_bg_color};
				}
				.container {
					background: #fff;
				}
				.header_top_block {
					background: unset;
				}
				.bg-dark .container {
					background: unset;
				}
				.header-top-border {
					border-top: none !important;
					border-bottom: none;
				}
				.header-top-border .container { 
					border-top: 4px solid {$global_color};
					border-bottom: 1px solid #eeeeee;
				}
				.header {
					height: 98px;
					border-bottom: none;
				}
				@media only screen and (min-width: 768px){
				.header {
					background-color: unset;
				}
				}
				.header.header5 {
					height: auto;
				}
				.header5 .nav-white {
					border-top: none;
					border-bottom: none;
					background: {$body_bg_color};
				}
				.container, .container-fluid {
					padding-right: 25px;
					padding-left: 25px;
				}
				footer {
					background: {$body_bg_color};
				}
				footer.margin-top-30 {
					margin-top: 0 !important;
				}
				@media only screen and (min-width: 768px){
				.navbar.navbar-default, .header_top_block{
					background-color: {$body_bg_color};
				}
				}
				";
			if($footer_bg_color){
				$custom_css .= "
				footer .container {
					background: {$footer_bg_color};
				}
				";
			}else{
				$custom_css .= "
				footer .container {
					background: #1e2022;
				}
				";
				
			}
			if(($pantograph_header_radio_buttons=='style_four') || ($pantograph_header_radio_buttons=='style_five')){
			if($body_bg_color){
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-dark{
					height: 46px;
					background-color: {$body_bg_color};
				}
				}
				";
			}
			$menu_bg_for_4_5 = pantograph_get_option('menu_bg_for_4_5');
			if($menu_bg_for_4_5){
				$custom_css .= "
				.nav-dark .container {
					background: {$menu_bg_for_4_5};
				}
				";
			}else{
				$custom_css .= "
				.nav-dark .container {
					background: #1E2022;
				}
				";
			}
			}
			if($pantograph_header_radio_buttons=='style_two'){
			if($body_color){
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-white{
					background-color: {$body_color};
				}
				}
				.nav-white .container {
					background: #fff;
				}
				";
			}
			}
		}else{
			$global_white_conainter = pantograph_get_option('global_white_conainter');
			
			if($global_white_conainter==1){
			
			if(is_single() || is_category()){
				$custom_css .= "
				.section-head {
					margin-bottom: 0;
				}
				.comment-form {
					padding-bottom: 30px;
				}
				.page-numbers {
					margin-bottom: 50px;
				}
				";
			}
			
			$custom_css .= "
				body {
					background: {$body_bg_color};
				}
				.container {
					background: #fff;
				}
				.bg-dark .container {
					background: unset;
				}
				.header-top-border {
					border-top: none !important;
					border-bottom: none;
				}
				.header-top-border .container { 
					border-top: 4px solid {$global_color};
					border-bottom: 1px solid #eeeeee;
				}
				.header {
					height: 98px;
					background-color: unset;
					border-bottom: none;
				}
				.header.header5 {
					height: auto;
				}
				.header5 .nav-white {
					border-top: none;
					border-bottom: none;
					background: {$body_bg_color};
				}
				.container, .container-fluid {
					padding-right: 25px;
					padding-left: 25px;
				}
				footer {
					background: {$body_bg_color};
				}
				footer.margin-top-30 {
					margin-top: 0 !important;
				}
				@media only screen and (min-width: 768px){
				.navbar.navbar-default, .header_top_block{
					background-color: {$body_bg_color};
				}
				}
				";
				
				if($footer_bg_color){
				$custom_css .= "
				footer .container {
					background: {$footer_bg_color};
				}
				";
				}else{
					$custom_css .= "
					footer .container {
						background: #1e2022;
					}
					";
					
				}
				
			if(($pantograph_header_style==4) || ($pantograph_header_style==5) || ($pantograph_header_radio_buttons=='style_four') || ($pantograph_header_radio_buttons=='style_five')){
			if($body_bg_color){
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-dark{
					height: 46px;
					background-color: {$body_bg_color};
				}
				}
				";
			}
			$menu_bg_for_4_5 = pantograph_get_option('menu_bg_for_4_5');
			if($menu_bg_for_4_5){
				$custom_css .= "
				.nav-dark .container {
					background: {$menu_bg_for_4_5};
				}
				";
			}else{
				$custom_css .= "
				.nav-dark .container {
					background: #1E2022;
				}
				";
			}
			}
			
			if($pantograph_header_style==2){
			if($body_bg_color){
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-white{
					background-color: {$body_bg_color};
				}
				}
				.nav-white .container {
					background: #fff;
				}
				";
			}
			}
		}else{
			if(($pantograph_header_style==4) || ($pantograph_header_style==5)){
			$menu_bg_for_4_5 = pantograph_get_option('menu_bg_for_4_5');
			if($menu_bg_for_4_5){
				$custom_css .= "
				.nav-dark{
					height: 46px;
					background-color: {$menu_bg_for_4_5};
				}
				.nav-dark .container {
					background: {$menu_bg_for_4_5};
				}
				";
			}
			}
		}
		}
		
		$widget_background = get_post_meta(get_the_ID(), 'widget_background', true);
		if($body_color){
			if($widget_background){
			$custom_css .= "
				.title_style_5 .wpb_widgetised_column .side-widget h4 span.sh-text:after, 
				.title_style_5 .wpb_widgetised_column .sidebar-box h4 span.sh-text:after,
				.title_style_10 .wpb_widgetised_column .side-widget h4 span.sh-text:after, 
				.title_style_10 .wpb_widgetised_column .sidebar-box h4 span.sh-text:after 
				{
					background: {$widget_background};
				}
				.title_style_8 h3 span.sh-text:after,
				.title_style_8 h4 span.sh-text:after{
					    border-right: 16px solid {$widget_background};
				}
				";	
			}else{
			$custom_css .= "
				.title_style_5 .wpb_widgetised_column .side-widget h4 span.sh-text:after, 
				.title_style_5 .wpb_widgetised_column .sidebar-box h4 span.sh-text:after,
				.title_style_10 .wpb_widgetised_column .side-widget h4 span.sh-text:after, 
				.title_style_10 .wpb_widgetised_column .sidebar-box h4 span.sh-text:after 
				{
					background: {$body_color};
				}
				.title_style_5 h3 b:after, 
				.title_style_5 h4 b:after,
				.title_style_10 h3 b:after, 
				.title_style_10 h4 b:after{
					background: {$body_color};
				}
				.title_style_5 .titleh3.margin-bottom-20 b:after,
				.title_style_10 .titleh3.margin-bottom-20 b:after{
					background: {$body_color};
				}
				.title_style_8 h3 span.sh-text:after,
				.title_style_8 h4 span.sh-text:after{
					    border-right: 16px solid {$body_color};
				}
				";
			}	
		}
		$widget_title = '';
		$widget_title_background = '';
		$widget_title = get_post_meta(get_the_ID(), 'widget_title', true);
		$widget_title_background = get_post_meta(get_the_ID(), 'widget_title_background', true);
		$widget_text = get_post_meta(get_the_ID(), 'widget_text', true);
		$widget_link = get_post_meta(get_the_ID(), 'widget_link', true);
		$widget_link_hover = get_post_meta(get_the_ID(), 'widget_link_hover', true);
		if(($widget_title) || ($widget_title_background)){
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4{
					color: {$widget_title}!important;
					border: 1px solid {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4 span.sh-text:before, .wpb_widgetised_column .sidebar-box h4 span.sh-text:before{
					background: {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4:before:before{
					background: {$widget_title_background}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4{
					color: {$widget_title}!important;
					border-bottom: 4px solid  {$widget_title_background}!important;
				}
				
				.wpb_widgetised_column .sh-text a.rsswidget:hover {
					color: {$widget_title_background}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4{
					color: {$widget_title}!important;
					background-color: {$widget_title_background}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4{
					color: {$widget_title}!important;
					border-top: 4px solid {$widget_title_background}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					color: {$widget_title}!important;
					background-color: {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4 span.sh-text:after, .wpb_widgetised_column .sidebar-box h4 span.sh-text:after {
					background: {$widget_background};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
			if($widget_title){
			$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					color: {$widget_title}!important;
				}
				";
			}
			if($widget_title_background){
			$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					background-color: {$widget_title_background}!important;
				}
				.side-widget h4, .sidebar-box h4.widget-title {
					border-top: 3px solid {$widget_title_background};
				}
				";
			}
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					color: {$widget_title}!important;
					background-color: {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4 span.sh-text:after {
					border-bottom: 31px solid {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4{
					border-bottom: 3px solid {$widget_title_background}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.wpb_widgetised_column .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.wpb_widgetised_column h4 span.sh-text {
					    background-color: {$widget_title_background}!important;
						color: {$widget_title}!important;
				}
				.wpb_widgetised_column h4 span.sh-text:after {
					border-right: 16px solid {$widget_background};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					color: {$widget_title}!important;
					background-color: {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4 span.sh-text:before {
					border-top-color: {$widget_title_background}!important;
					border-top: 10px solid {$widget_title_background}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					color: {$widget_title}!important;
					background-color: {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4 span.sh-text:after, .wpb_widgetised_column .sidebar-box h4 span.sh-text:after {
					background: {$widget_background};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					 border-bottom: 2px solid {$widget_title_background}!important;
					 color: {$widget_title}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text {
					color: {$widget_title}!important;
				}
				.wpb_widgetised_column .side-widget h4:after, .wpb_widgetised_column .sidebar-box h4:after {
					background: {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4:before, .wpb_widgetised_column .sidebar-box h4:before {
					border-top-color: {$widget_title_background}!important;
					border-top: 5px solid {$widget_title_background}!important;
				}
				";
		}else{}
			
		}
		
		if($widget_text){
			$custom_css .= "
				.wpb_widgetised_column .side-widget {
					color: {$widget_text}!important;
				}
				";
		}
		
		if($widget_link){
			$custom_css .= "
				.wpb_widgetised_column .side-widget a, #toggle-view h3{
					color: {$widget_link}!important;
				}
				.wpb_widgetised_column .side-widget .side-social a{
					color: #fff!important;
				}
				";
		}
		
		if($widget_link_hover){
			$custom_css .= "
				.wpb_widgetised_column .side-widget a:hover{
					color: {$widget_link_hover}!important;
				}
				.wpb_widgetised_column .side-widget .tagcloud a{
					color: {$widget_link_hover}!important;
				}
				";
		}
		
		$sidebar_title_color = '';
		$sidebar_title_background_color = '';
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		$sidebar_title_color = pantograph_get_option('sidebar_title_color');
		$sidebar_title_background_color = pantograph_get_option('sidebar_title_background_color');
		$sidebar_text_color = pantograph_get_option('sidebar_text_color');
		$sidebar_link_color = pantograph_get_option('sidebar_link_color');
		$sidebar_link_hover_color = pantograph_get_option('sidebar_link_hover_color');
		if(($sidebar_title_color) || ($sidebar_title_background_color)){
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				aside .side-widget h4{
					color: {$sidebar_title_color}!important;
					border: 1px solid {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4 span.sh-text:before, aside .sidebar-box h4 span.sh-text:before{
					background: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4:before:before{
					background: {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				aside .side-widget h4{
					color: {$sidebar_title_color}!important;
					border-bottom: 4px solid  {$sidebar_title_background_color}!important;
				}
				
				aside .sh-text a.rsswidget:hover {
					color: {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				aside .side-widget h4{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				aside .side-widget h4{
					color: {$sidebar_title_color}!important;
					border-top: 4px solid {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4 span.sh-text:after, aside .sidebar-box h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4, aside .sidebar-box h4.widget-title {
					border-top: 3px solid {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4 span.sh-text:after {
					border-bottom: 31px solid {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4{
					border-bottom: 3px solid {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				aside .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				aside h4 span.sh-text {
					    background-color: {$sidebar_title_background_color}!important;
						color: {$sidebar_title_color}!important;
				}
				aside h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4 span.sh-text:before {
					border-top-color: {$sidebar_title_background_color}!important;
					border-top: 10px solid {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4 span.sh-text:after, aside .sidebar-box h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					 border-bottom: 2px solid {$sidebar_title_background_color}!important;
					 color: {$sidebar_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text {
					color: {$sidebar_title_color}!important;
				}
				aside .side-widget h4:after, aside .sidebar-box h4:after {
					background: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4:before, aside .sidebar-box h4:before {
					border-top-color: {$sidebar_title_background_color}!important;
					border-top: 5px solid {$sidebar_title_background_color}!important;
				}
				";
		}else{}
			
		}
		
		if($sidebar_text_color){
			$custom_css .= "
				.side-widget {
					color: {$sidebar_text_color}!important;
				}
				";
		}
		
		if($sidebar_link_color){
			$custom_css .= "
				.side-widget a, #toggle-view h3{
					color: {$sidebar_link_color}!important;
				}
				";
		}
		
		if($sidebar_link_hover_color){
			$custom_css .= "
				.side-widget a:hover{
					color: {$sidebar_link_hover_color}!important;
				}
				.side-widget .tagcloud a{
					color: {$sidebar_link_hover_color}!important;
				}
				";
		}
		
		if((pantograph_get_option('social_facebook') == '') || (pantograph_get_option('social_twitter') == '') || (pantograph_get_option('social_instagram') == '') || (pantograph_get_option('social_utube') == '') || (pantograph_get_option('social_googleplus') == '')) {
			$custom_css .= "
				.headerstyletwo .navbar-social, .headerstylefive .navbar-social {
					float: left;
					width: 12%;
					display: inline-block;
					min-height: 1px;
				}
				";
		}
		$footer_search_bg_color = pantograph_get_option('footer_search_bg_color');
		if($footer_search_bg_color) {
			$custom_css .= "
				.footer-search input {
					 background: {$footer_search_bg_color}!important;
				}
				";
		}
		
		$footer_subscribe_bg_color = pantograph_get_option('footer_subscribe_bg_color');
		if($footer_subscribe_bg_color) {
			$custom_css .= "
				.footer-newsletter input {
					 background: {$footer_subscribe_bg_color}!important;
				}
				";
		}
		
		$header_color = get_post_meta(get_the_ID(), 'header_color', true);
		$header_background_color = pantograph_get_option('header_background_color');
		if($header_color){
			$header_bg_color = get_post_meta(get_the_ID(), 'header_color', true);
		}elseif($header_background_color){
			$header_bg_color = pantograph_get_option('header_background_color');
		}else{
			$header_bg_color = '';
		}
		if(($header_bg_color)){
		if(($container_bg_white==1) || ($global_white_conainter==1)){
			$custom_css .= "
				.header .container {
					 background: {$header_bg_color}!important;
				}
				";
		}else{
			$custom_css .= "
				.header {
					 background: {$header_bg_color}!important;
				}
				";
		}
		}
		
		$header_topbar_background_color = pantograph_get_option('header_topbar_background_color');
		
		if(($header_topbar_background_color)){
		if(($container_bg_white==1) || ($global_white_conainter==1)){
			$custom_css .= "
				.header_top_block .container {
					 background: {$header_topbar_background_color}!important;
				}
				";
		}else{
			$custom_css .= "
				.header_top_block {
					 background: {$header_topbar_background_color}!important;
				}
				";
		}
		}
		
		if(($pantograph_header_radio_buttons=='style_three') || ($pantograph_header_style==3)){
			$custom_css .= "
			.yamm-content {
				 display: none;
			}
			";
		}
		
		$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
		$global_white_conainter = pantograph_get_option('global_white_conainter');
		$pantograph_body_bg_img = get_post_meta(get_the_ID(), 'pantograph_body_bg_img', true);
		if((($container_bg_white==1) && ($pantograph_body_bg_img!='')) || (($global_white_conainter==1) && ($pantograph_body_bg_img!=''))){
			$custom_css .= "
			.header5 .nav-white{
				background-color: transparent !important;
			}
			";
		}
		
		
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_styles_method' );


function pantograph_enqueue_comment_reply() {
   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
// Hook into comment_form_before
add_action( 'comment_form_before', 'pantograph_enqueue_comment_reply' );