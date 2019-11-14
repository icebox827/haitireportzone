<?php
function pionusnews_scripts_basic() {  
global $wp_query;
	/* ------------------------------------------------------------------------ */
	/* Enqueue Scripts */
	/* ------------------------------------------------------------------------ */
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/template-parts/pionus/js/modernizr.min.js', array('jquery'), '2.8.3', false );
wp_enqueue_script( 'jquery.validate', get_template_directory_uri() . '/template-parts/pionus/js/jquery.validate.min.js', array('jquery'), '1.17.0', true );	
/* Bootstrap */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/template-parts/pionus/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true);
	/* Slick */
	wp_enqueue_script('slick', get_template_directory_uri() . '/template-parts/pionus/js/slick.min.js', array( 'jquery' ), '1.6.0', true);
	wp_enqueue_script('pionusnews-theme', get_template_directory_uri() . '/template-parts/pionus/js/theme.js', array( 'jquery' ), '1.0.0', true);
	if(pionusnews_get_option('pionusnews_menusticky') == 1) {
	wp_enqueue_script('pionusnews-menusticky', get_template_directory_uri() . '/template-parts/pionus/js/sticky-header.js', array( 'jquery' ), '1.0.0', true);
	}
	wp_enqueue_script('totop', get_template_directory_uri() . '/template-parts/pionus/js/totop.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('hc-sticky', get_template_directory_uri() . '/template-parts/pionus/js/hc-sticky.js', array( 'jquery' ), '2.1.0', true);
	
	if( is_404() || is_search() ){
	}else{
	global $post;
	$sticky_widget = get_post_meta(get_the_ID(), 'enable_sticky_widget', true);
	if( is_a( $post, 'WP_Post' ) && !has_shortcode( $post->post_content, 'vc_widget_sidebar') && (pionusnews_get_option('pionusnews_sticky_widget') == 1)){
		wp_enqueue_script('widgets-sticky', get_template_directory_uri() . '/template-parts/pionus/js/widgets-sticky.js', array( 'jquery' ), '1.0.0', true);
	}
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'vc_widget_sidebar') && ($sticky_widget==1) ) {
		wp_enqueue_script('widgets-sticky', get_template_directory_uri() . '/template-parts/pionus/js/widgets-sticky.js', array( 'jquery' ), '1.0.0', true);
	}
	}
	
	// enqueue our loadmore script
	wp_enqueue_script( 'pionusnews-loadmore', get_stylesheet_directory_uri() . '/template-parts/pionus/js/loadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'pionusnews-loadmore', 'pionusnews_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => serialize( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
	}
add_action( 'wp_enqueue_scripts', 'pionusnews_scripts_basic' ); 

function pionusnews_styles_basic()  {  
	/* ------------------------------------------------------------------------ */
	/* Enqueue Stylesheets */
	/* ------------------------------------------------------------------------ */
	/* Fonts */
	if(pionusnews_get_option('pionusnews_font_style') == 1) {
	wp_enqueue_style( 'pionusnews-fonts-lato', pionusnews_fonts_lato_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-rajdhani', pionusnews_fonts_rajdhani_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-poppins', pionusnews_fonts_poppins_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-roboto', pionusnews_fonts_roboto_url(), array(), null );
	}
	elseif(pionusnews_get_option('pionusnews_font_style') == 2)
	{
	wp_enqueue_style( 'pionusnews-fonts-lato', pionusnews_fonts_lato_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-poppins', pionusnews_fonts_poppins_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-roboto', pionusnews_fonts_roboto_url(), array(), null );
	}
	elseif(pionusnews_get_option('pionusnews_font_style') == 3)
	{
	wp_enqueue_style( 'pionusnews-fonts-lato', pionusnews_fonts_lato_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-roboto-condensed', pionusnews_fonts_roboto_condensed_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-roboto', pionusnews_fonts_roboto_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-poppins', pionusnews_fonts_poppins_url(), array(), null );
	}
	elseif(pionusnews_get_option('pionusnews_font_style') == 4)
	{
	wp_enqueue_style( 'pionusnews-fonts-lato', pionusnews_fonts_lato_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-rajdhani', pionusnews_fonts_rajdhani_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-poppins', pionusnews_fonts_poppins_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-roboto', pionusnews_fonts_roboto_url(), array(), null );
	}
	else{
	wp_enqueue_style( 'pionusnews-fonts-rajdhani', pionusnews_fonts_rajdhani_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-poppins', pionusnews_fonts_poppins_url(), array(), null );
	wp_enqueue_style( 'pionusnews-fonts-roboto', pionusnews_fonts_roboto_url(), array(), null );
	}	
	
	/* Font Awesome */
	wp_enqueue_style( 'font-awesome-latest', get_template_directory_uri() . '/template-parts/pionus/css/fontawesome-all.min.css');
	/* Bootstrap */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/template-parts/pionus/css/bootstrap.css');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/template-parts/pionus/css/slick.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/template-parts/pionus/css/animate.css');
	wp_enqueue_style( 'pionusnews-ts', get_template_directory_uri() . '/css/ts.css');
	if(pionusnews_get_option('pionusnews_minify_css') == 1) {
	wp_enqueue_style( 'pionusnews-main-styles', get_template_directory_uri() . '/template-parts/pionus/css/main-styles.min.css');
	} else {
	wp_enqueue_style( 'pionusnews-main-styles', get_template_directory_uri() . '/template-parts/pionus/css/main-styles.css');
	}
	wp_enqueue_style( 'pantograph-stylesheet', get_template_directory_uri() . '/style.css'); // Main Stylesheet
	if(pionusnews_get_option('pionusnews_font_style') == 1) {
	wp_enqueue_style( 'pionusnews-style-font1', get_template_directory_uri() . '/template-parts/pionus/css/style-font1.css');
	}
	if(pionusnews_get_option('pionusnews_font_style') == 2) {
	wp_enqueue_style( 'pionusnews-style-font2', get_template_directory_uri() . '/template-parts/pionus/css/style-font2.css');
	}
	if(pionusnews_get_option('pionusnews_font_style') == 3) {
	wp_enqueue_style( 'pionusnews-style-font3', get_template_directory_uri() . '/template-parts/pionus/css/style-font3.css');
	}
	if(pionusnews_get_option('pionusnews_font_style') == 4) {
	wp_enqueue_style( 'pionusnews-style-font3', get_template_directory_uri() . '/template-parts/pionus/css/style-font4.css');
	}
	/*Gutenberg Only*/
	if ( (function_exists( 'the_gutenberg_project' ) || function_exists( 'wp_common_block_scripts_and_styles' )) && !pantograph_is_preview_plugin_active() ) {
	wp_enqueue_style( 'pionusnews-gutenberg-additions', get_template_directory_uri() . '/template-parts/pionus/gutenberg/css/gutenberg-additions.css'); // Gutenberg CSS
	}
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pionusnews_get_option('global_white_conainter');
	if(pionusnews_get_option('pionusnews_menusticky') == 1){
	if($container_bg_white==1 || $global_white_conainter==1) {
	wp_enqueue_style( 'pionusnews-sticky-menu', get_template_directory_uri() . '/template-parts/pionus/css/sticky-boxed-menu.css');
	} if($container_bg_white!=1 && $global_white_conainter!=1) {
	wp_enqueue_style( 'pionusnews-sticky-menu', get_template_directory_uri() . '/template-parts/pionus/css/sticky-wide-menu.css');
	}
	}
	
	$pionusnews_body_bg_img_to = pionusnews_get_option('pionusnews_body_bg_img_to');
	$pionusnews_body_bg_img = get_post_meta(get_the_ID(), 'pionusnews_body_bg_img', true);
	if(($container_bg_white==1) || ($global_white_conainter==1)){
	if(($pionusnews_body_bg_img!='') || ($pionusnews_body_bg_img_to!='')){
	wp_enqueue_style( 'pionusnews-body-bg-img', get_template_directory_uri() . '/template-parts/pionus/css/body-bg-img.css');
	}
	}
	/* Title Styles */
	if((pionusnews_get_option('pionusnews_title_style') == 1) || (is_page( array( 'title-style-01' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style1', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style1.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 2) || (is_page( array( 'title-style-02' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style2', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style2.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 3) || (is_page( array( 'title-style-03' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style3', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style3.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 4) || (is_page( array( 'title-style-04' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style4', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style4.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 5) || (is_page( array( 'title-style-05' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style5', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style5.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 6) || (is_page( array( 'title-style-06' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style6', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style6.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 7) || (is_page( array( 'title-style-07' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style7', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style7.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 8) || (is_page( array( 'title-style-08' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style8', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style8.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 9) || (is_page( array( 'title-style-09' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style9', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style9.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 10) || (is_page( array( 'title-style-10' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style10', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style10.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 11) || (is_page( array( 'title-style-11' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style11', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style11.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 12) || (is_page( array( 'title-style-12' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style12', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style12.css');
	}elseif((pionusnews_get_option('pionusnews_title_style') == 13) || (is_page( array( 'title-style-13' ) ))) { 
		wp_enqueue_style( 'pionusnews-title-style12', get_template_directory_uri() . '/template-parts/pionus/css/title/title-style13.css');
	}else{
	}
	
	$post_title = get_the_title();
	if($post_title == 'Section Headings'){
	}else{
	/* Sidebar Title Styles */
	if((pionusnews_get_option('pionusnews_sidebar_style') == 1) || (is_page( array( 'title-style-01' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style1', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style1.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 2) || (is_page( array( 'title-style-02' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style2', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style2.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 3) || (is_page( array( 'title-style-03' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style3', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style3.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 4) || (is_page( array( 'title-style-04' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style4', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style4.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 5) || (is_page( array( 'title-style-05' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style5', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style5.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 6) || (is_page( array( 'title-style-06' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style6', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style6.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 7) || (is_page( array( 'title-style-07' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style7', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style7.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 8) || (is_page( array( 'title-style-08' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style8', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style8.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 9) || (is_page( array( 'title-style-09' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style9', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style9.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 10) || (is_page( array( 'title-style-10' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style10', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style10.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 11) || (is_page( array( 'title-style-11' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style11', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style11.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 12) || (is_page( array( 'title-style-12' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style12', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style12.css');
	}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 13) || (is_page( array( 'title-style-13' ) ))) { 
		wp_enqueue_style( 'pionusnews-sidebar-title-style12', get_template_directory_uri() . '/template-parts/pionus/css/title/sidebar-title-style13.css');
	}else{
	}
	}
	$pionusnews_mobile_menu_style = pionusnews_get_option('pionusnews_mobile_menu_style');
	if(($pionusnews_mobile_menu_style==2) || (pionusnews_get_option('browse_all_on_off') == 0)){
		wp_enqueue_style( 'pionusnews-newmenustyle', get_template_directory_uri() . '/template-parts/pionus/css/newmenustyle.css');
	}
	
}  
add_action( 'wp_enqueue_scripts', 'pionusnews_styles_basic', 1 );

/**
 * Add color styling from theme
 */
function wpdocs_styles_method() {
		wp_enqueue_style(
        'custom-style',
        get_template_directory_uri() . '/template-parts/pionus/css/custom_script.css'
		);
		$custom_css = "";
		if(is_category()){
        $cat_id = get_query_var('cat');
		$term = get_term_by('id', $cat_id, 'category');
		if ( ! empty($term) && is_array($term) ) {
		$color_code = get_term_meta( $term->term_id, '_category_color', true );
		} else {
		$color_code = '';
		}

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
				/*
				.category .inner-content .col-md-8 .meta span a {
					color: {$color}!important;
				}
				.category .inner-content .col-md-8 .meta span.small-title.cat {
					color: {$color}!important;
				}
				*/
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
					color: #fff!important;
				}
				.category .meta span a:hover {
					color: {$color}!important;
				}
				.video_details span a:hover{
					color: {$color}!important;
				}
				";
		}}

		$custom_color = pionusnews_get_option('custom_color');
		$footer_bg_color = pionusnews_get_option('footer_bg_color');
		if($custom_color==''){
			$global_color = '#F26262';
		}else{
			$global_color = pionusnews_get_option('custom_color');
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
						color: #F26262;
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
					.title_style_12 h3.margin-bottom-15:after, .pionusnews_instagram h4:after {
						background: $custom_color;
					}
					.title_style_12 h3.margin-bottom-15:before, .pionusnews_instagram h4:before {
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
		$container_bg_white_themeoptions = pionusnews_get_option('global_white_conainter');
		$pionusnews_header_radio_buttons = get_post_meta(get_the_ID(), 'header_key', true);
		$pionusnews_header_style = pionusnews_get_option('pionusnews_header_style');
		$global_body_color = pionusnews_get_option('global_body_color');
		$pionusnews_header_topbar_topborder = pionusnews_get_option('pionusnews_header_topbar_topborder');
		$pionusnews_header_topbar_bottomborder = pionusnews_get_option('pionusnews_header_topbar_bottomborder');
		$header_topbar_topborder_background_color = pionusnews_get_option('header_topbar_topborder_background_color');
		if($body_color){
			$body_bg_color = get_post_meta(get_the_ID(), 'body_color', true);
		}elseif($global_body_color){
			$body_bg_color = pionusnews_get_option('global_body_color');
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
			} if($pionusnews_header_topbar_topborder == 1){
				$custom_css .= "
				.header-top-border {
					border-top: 4px solid {$header_topbar_topborder_background_color} !important;
				}
				";
				} else{
				$custom_css .= "
				.header-top-border {
					border-top: none !important;
				}
					";
				}
				if($pionusnews_header_topbar_bottomborder != 1){
				$custom_css .= "
				.header-top-border {
					border-bottom: none !important;
				}";
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
				.header {
					height: auto;
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
					padding-right: 40px !important;
					padding-left: 40px !important;
				}
				.vc_col-sm-12 .pionusnews_instagram {
					margin-left: -40px !important;
					margin-right: -40px !important;
				}
				.inner-content.container .container {
					padding-left:0 !important; 
					padding-right:0 !important
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
			if(is_single() || is_category()){
				$custom_css .= "
				.comment-form {
					padding-bottom: 50px;
				}
				";
			}
			if($pionusnews_header_topbar_topborder == 1){
				$custom_css .= "
				.header-top-border .container {
					border-top: 4px solid {$header_topbar_topborder_background_color} !important;
				}
				";
				} else{
				$custom_css .= "
				.header-top-border .container {
					border-top: none !important;
				}
					";
				}
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
			if(($pionusnews_header_radio_buttons=='style_four') || ($pionusnews_header_radio_buttons=='style_five')){
			if($body_bg_color){
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-dark{
					height: 46px;
					background-color: {$body_bg_color};
				}
				.nav-dark.navstyle-for-bg{
					background-color: transparent;
				}
				}
				";
			}
			if ((!has_nav_menu('pionusnews_primary_menu')) && (($container_bg_white_themeoptions==1) || ($container_bg_white==1))) {
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-dark{
					height: auto;
				}
				}
				";
			}
			$menu_bg_for_4_5 = pionusnews_get_option('menu_bg_for_4_5');
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
			if($pionusnews_header_radio_buttons=='style_two'){
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
			$global_white_conainter = pionusnews_get_option('global_white_conainter');
			
			if($global_white_conainter==1){
			
			if(is_single() || is_category()){
				$custom_css .= "
				.section-head {
					margin-bottom: 0;
				}
				.comment-form {
					padding-bottom: 50px;
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
				.header {
					height: auto;
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
					padding-right: 40px !important;
					padding-left: 40px !important;
				}
				.vc_col-sm-12 .pionusnews_instagram {
					margin-left: -40px !important;
					margin-right: -40px !important;
				}
				.inner-content.container .container {
					padding-left:0 !important; 
					padding-right:0 !important
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
				if($pionusnews_header_topbar_topborder == 1){
				$custom_css .= "
				.header-top-border .container {
					border-top: 4px solid {$header_topbar_topborder_background_color} !important;
				}
				";
				} else{
				$custom_css .= "
				.header-top-border .container {
					border-top: none !important;
				}
					";
				}
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
				
			if(($pionusnews_header_style==4) || ($pionusnews_header_style==5) || ($pionusnews_header_radio_buttons=='style_four') || ($pionusnews_header_radio_buttons=='style_five')){
			if($body_bg_color){
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-dark{
					height: 46px;
					background-color: {$body_bg_color};
				}
				.nav-dark.navstyle-for-bg{
					background-color: transparent;
				}
				}
				";
			}
			if ((!has_nav_menu('pionusnews_primary_menu')) && (($global_white_conainter==1) || ($container_bg_white==1))) {
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-dark{
					height: auto;
				}
				}
				";
			}
			$menu_bg_for_4_5 = pionusnews_get_option('menu_bg_for_4_5');
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
			
			if($pionusnews_header_style==2){
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
			if(($pionusnews_header_style==4) || ($pionusnews_header_style==5)){
			$menu_bg_for_4_5 = pionusnews_get_option('menu_bg_for_4_5');
			if($menu_bg_for_4_5){
				$custom_css .= "
				.nav-dark{
					height: 46px;
					background-color: {$menu_bg_for_4_5};
				}
				.nav-dark.navstyle-for-bg{
					background-color: transparent;
				}
				.nav-dark .container {
					background: {$menu_bg_for_4_5};
				}
				";
			}
			if ((!has_nav_menu('pionusnews_primary_menu')) && (($global_white_conainter==1) || ($container_bg_white==1))) {
				$custom_css .= "
				@media only screen and (min-width: 768px){
				.nav-dark{
					height: auto;
				}
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
		if((pionusnews_get_option('pionusnews_title_style') == 1)) { 
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
		}elseif((pionusnews_get_option('pionusnews_title_style') == 2)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4{
					color: {$widget_title}!important;
					border-bottom: 4px solid  {$widget_title_background}!important;
				}
				
				.wpb_widgetised_column .sh-text a.rsswidget:hover {
					color: {$widget_title_background}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_title_style') == 3)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4{
					color: {$widget_title}!important;
					background-color: {$widget_title_background}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_title_style') == 4)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4,
				.wpb_widgetised_column .sidebar-box h4.widget-title, .wpb_widgetised_column .pionusnews_instagram h4, .pionusnews_social_counter h4{
					color: {$widget_title}!important;
					border-top: 4px solid {$widget_title_background}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_title_style') == 5)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					color: {$widget_title}!important;
					background-color: {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4 span.sh-text:after, .wpb_widgetised_column .sidebar-box h4 span.sh-text:after {
					background: {$widget_background};
				}
				";
		}elseif((pionusnews_get_option('pionusnews_title_style') == 6)) {
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
		}elseif((pionusnews_get_option('pionusnews_title_style') == 7)) { 
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
		}elseif((pionusnews_get_option('pionusnews_title_style') == 8)) { 
		$custom_css .= "
				.wpb_widgetised_column .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.wpb_widgetised_column h4 span.sh-text {
					    background-color: {$widget_title_background}!important;
						color: {$widget_title}!important;
				}
				.wpb_widgetised_column h4 span.sh-text:after,
				.wpb_widgetised_column h3.margin-bottom-15 b:after	{
					border-right: 16px solid {$widget_background};

				}
				";
		}elseif((pionusnews_get_option('pionusnews_title_style') == 9)) { 
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
		}elseif((pionusnews_get_option('pionusnews_title_style') == 10)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					color: {$widget_title}!important;
					background-color: {$widget_title_background}!important;
				}
				.wpb_widgetised_column .side-widget h4 span.sh-text:after, .wpb_widgetised_column .sidebar-box h4 span.sh-text:after {
					background: {$widget_background};
				}
				";
		}elseif((pionusnews_get_option('pionusnews_title_style') == 11)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					 border-bottom: 2px solid {$widget_title_background}!important;
					 color: {$widget_title}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_title_style') == 12)) { 
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
		}elseif((pionusnews_get_option('pionusnews_title_style') == 13)) { 
		$custom_css .= "
				.wpb_widgetised_column .side-widget h4 span.sh-text, .wpb_widgetised_column .sidebar-box h4 span.sh-text{
					color: {$widget_title} !important;
					background-color: #fff !important;
				}
				.wpb_widgetised_column .side-widget h4 span.sh-text:after, .wpb_widgetised_column .sidebar-box h4 span.sh-text:after,
				.default-widget h4 span.sh-text, .side-widget h4 span.sh-text, .sidebar-box h4 span.sh-text, .pionusnews_instagram h4 span.sh-text,
				.pionusnews_social_counter h4 span.sh-text{
					background: {$widget_title_background}!important;
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
		$sidebar_background_color = pionusnews_get_option('sidebar_background_color');
		$sidebar_title_color = pionusnews_get_option('sidebar_title_color');
		$sidebar_title_background_color = pionusnews_get_option('sidebar_title_background_color');
		$sidebar_text_color = pionusnews_get_option('sidebar_text_color');
		$sidebar_link_color = pionusnews_get_option('sidebar_link_color');
		$sidebar_link_hover_color = pionusnews_get_option('sidebar_link_hover_color');
		if(($sidebar_title_color) || ($sidebar_title_background_color)){
		if((pionusnews_get_option('pionusnews_sidebar_style') == 1)) { 
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
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 2)) { 
		$custom_css .= "
				aside .side-widget h4{
					color: {$sidebar_title_color}!important;
					border-bottom: 4px solid  {$sidebar_title_background_color}!important;
				}
				
				aside .sh-text a.rsswidget:hover {
					color: {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 3)) { 
		$custom_css .= "
				aside .side-widget h4{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 4)) { 
		$custom_css .= "
				aside .side-widget h4{
					color: {$sidebar_title_color}!important;
					border-top: 4px solid {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 5)) { 
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4 span.sh-text:after, aside .sidebar-box h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 6)) {
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4, aside .sidebar-box h4.widget-title {
					border-top: 3px solid {$sidebar_title_background_color}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 7)) { 
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
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 8)) { 
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
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 9)) { 
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
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 10)) { 
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					color: {$sidebar_title_color}!important;
					background-color: {$sidebar_title_background_color}!important;
				}
				aside .side-widget h4 span.sh-text:after, aside .sidebar-box h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 11)) { 
		$custom_css .= "
				aside .side-widget h4 span.sh-text, aside .sidebar-box h4 span.sh-text{
					 border-bottom: 2px solid {$sidebar_title_background_color}!important;
					 color: {$sidebar_title_color}!important;
				}
				";
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 12)) { 
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
		}elseif((pionusnews_get_option('pionusnews_sidebar_style') == 13)) { 
			$custom_css .= "
				aside .side-widget h4 span.sh-text, .sidebar-box h4 span.sh-text {
					color: {$sidebar_title_color}!important;
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
		
		if((pionusnews_get_option('social_facebook') == '') || (pionusnews_get_option('social_twitter') == '') || (pionusnews_get_option('social_instagram') == '') || (pionusnews_get_option('social_utube') == '') || (pionusnews_get_option('social_googleplus') == '')) {
			$custom_css .= "
				.headerstyletwo .navbar-social, .headerstylefive .navbar-social {
					float: left;
					width: 12%;
					display: inline-block;
					min-height: 1px;
				}
				";
		}
		$footer_search_bg_color = pionusnews_get_option('footer_search_bg_color');
		if($footer_search_bg_color) {
			$custom_css .= "
				.footer-search input {
					 background: {$footer_search_bg_color}!important;
				}
				";
		}
		
		$footer_subscribe_bg_color = pionusnews_get_option('footer_subscribe_bg_color');
		if($footer_subscribe_bg_color) {
			$custom_css .= "
				.footer-newsletter input {
					 background: {$footer_subscribe_bg_color}!important;
				}
				";
		}
		
		$header_color = get_post_meta(get_the_ID(), 'header_color', true);
		$header_background_color = pionusnews_get_option('header_background_color');
		if($header_color){
			$header_bg_color = get_post_meta(get_the_ID(), 'header_color', true);
		}elseif($header_background_color){
			$header_bg_color = pionusnews_get_option('header_background_color');
		}else{
			$header_bg_color = '';
		}
		if(($header_bg_color)){
		if(($container_bg_white==1) || ($global_white_conainter==1)){
			$custom_css .= "
				.header .navbar-default .container {
					 background: {$header_bg_color}!important;
				}
				";
		}else{
			$custom_css .= "
				.header .navbar-default {
					 background: {$header_bg_color}!important;
				}
				";
		}
		}
		
		$header_topbar_background_color = pionusnews_get_option('header_topbar_background_color');
		
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
		
		if(($pionusnews_header_radio_buttons=='style_three') || ($pionusnews_header_style==3)){
			$custom_css .= "
			.yamm-content {
				 display: none;
			}
			";
		}
		
		$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
		$global_white_conainter = pionusnews_get_option('global_white_conainter');
		$pionusnews_body_bg_img_to = pionusnews_get_option('pionusnews_body_bg_img_to');
		$pionusnews_body_bg_img = get_post_meta(get_the_ID(), 'pionusnews_body_bg_img', true);
		if(($container_bg_white==1) || ($global_white_conainter==1)){
		if(($pionusnews_body_bg_img!='') || ($pionusnews_body_bg_img_to!='')){
			$custom_css .= "
			.header5 .nav-white{
				background-color: transparent !important;
			}
			";
		}
		}
		$pionusnews_active_menu_bg_color = pionusnews_get_option('pionusnews_active_menu_bg_color');
		if($pionusnews_active_menu_bg_color){
		if(($pionusnews_header_style!=4) && ($pionusnews_header_style!='default')){
		if(($pionusnews_header_radio_buttons=='style_four') || ($pionusnews_header_radio_buttons=='style_default')){
			$custom_css .= "
			.header .navbar-default .navbar-nav:not(.leftside):not(.navbar-right) > li:first-child > a, .header7 .navbar-default .navbar-nav:not(.leftside):not(.navbar-right) > li:first-child > a,
			.header .nav-dark .navbar-nav:not(.leftside):not(.navbar-right) > li:first-child > a{
				padding-left: 15px !important;
			}
			.header .navbar-default .navbar-nav:not(.leftside):not(.navbar-right) > li > a > span {
				margin-right: 1px;
			}";
		}
		}
		if(($pionusnews_header_style==4) || ($pionusnews_header_style=='default')){
			$custom_css .= "
			.header .navbar-default .navbar-nav:not(.leftside):not(.navbar-right) > li:first-child > a, .header7 .navbar-default .navbar-nav:not(.leftside):not(.navbar-right) > li:first-child > a,
			.header .nav-dark .navbar-nav:not(.leftside):not(.navbar-right) > li:first-child > a{
				padding-left: 15px !important;
			}
			.header .navbar-default .navbar-nav:not(.leftside):not(.navbar-right) > li > a > span {
				margin-right: 1px;
			}
			";
		}
		}
		
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_styles_method' );


function pionusnews_enqueue_comment_reply() {
   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
// Hook into comment_form_before
add_action( 'comment_form_before', 'pionusnews_enqueue_comment_reply' );