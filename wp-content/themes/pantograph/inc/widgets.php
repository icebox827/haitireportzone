<?php
// **********************************************************************// 
// ! Register Sidebars
// **********************************************************************//
if ( ! function_exists( 'pantograph_widgets_init' ) ) {
	function pantograph_widgets_init() {
		register_sidebar( array(
		'name' => esc_html__( 'Sidebars Widgets', 'pantograph' ),
		'id' => 'sidebar_widgets',
		'before_widget' => '<div class="side-widget">',
		'after_widget' => '</div><div class="clearfix"></div>',
		'before_title' => '<h4><span class="sh-text">',
		'after_title' => '</span></h4>',
		) );
		register_sidebar( array(
		'name' => esc_html__( 'Header Right Advertisement', 'pantograph' ),
		'id' => 'header_right_add_widgets',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
		) );
		register_sidebar( array(
		'name' => esc_html__( 'Footer Widgets', 'pantograph' ),
		'id' => 'footer_widgets',
		'before_widget' => '<div class="col-md-2 col-sm-2 footer-links">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="text-white">',
		'after_title' => '</h5>',
		) );
		
		/******* Only For Demo ********/
		register_sidebar( array(
		'name' => esc_html__( 'Footer Style 2', 'pantograph' ),
		'id' => 'footer_widgets_style2',
		'before_widget' => '<div class="col-md-2 col-sm-2 footer-links">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="text-white">',
		'after_title' => '</h5>',
		) );
		register_sidebar( array(
		'name' => esc_html__( 'Footer Style 3', 'pantograph' ),
		'id' => 'footer_widgets_style3',
		'before_widget' => '<div class="col-md-2 col-sm-2 footer-links">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="text-white">',
		'after_title' => '</h5>',
		) );
		
		register_sidebar( array(
		'name' => esc_html__( 'Footer Style 4', 'pantograph' ),
		'id' => 'footer_widgets_style4',
		'before_widget' => '<div class="col-md-2 col-sm-2 footer-links">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="text-white">',
		'after_title' => '</h5>',
		) );
		
		register_sidebar( array(
		'name' => esc_html__( 'Footer Style 5', 'pantograph' ),
		'id' => 'footer_widgets_style5',
		'before_widget' => '<div class="col-md-2 col-sm-2 footer-links">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="text-white">',
		'after_title' => '</h5>',
		) );
		
		register_sidebar( array(
		'name' => esc_html__( 'Footer Style 6', 'pantograph' ),
		'id' => 'footer_widgets_style6',
		'before_widget' => '<div class="col-md-2 col-sm-2 footer-links">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="text-white">',
		'after_title' => '</h5>',
		) );
		
		/******* Only For Demo ********/
		
		register_sidebar( array(
		'name' => esc_html__( 'Another Footer Widgets', 'pantograph' ),
		'id' => 'footer_style_six_widgets',
		'before_widget' => '<div class="col-md-3 col-sm-3 footer-links">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="text-white">',
		'after_title' => '</h5>',
		) );
		
		register_sidebar( array(
		'name' => esc_html__( 'Footer Social Links', 'pantograph' ),
		'id' => 'footer_social_links',
		'before_widget' => '<div class="col-md-2 col-sm-2 footer-social">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="text-white">',
		'after_title' => '</h5>',
		) );
	}
}
add_action( 'widgets_init', 'pantograph_widgets_init' );