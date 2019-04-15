<?php
// **********************************************************************// 
// ! Register Sidebars
// **********************************************************************//
if ( ! function_exists( 'pionusnews_widgets_init' ) ) {
	function pionusnews_widgets_init() {
		register_sidebar( array(
		'name' => esc_html__( 'Sidebars Widgets', 'pantograph'),
		'id' => 'sidebar_widgets',
		'before_widget' => '<div id="%1$s" class="side-widget %2$s">',
		'after_widget' => '</div><div class="clearfix"></div>',
		'before_title' => '<h4><span class="sh-text">',
		'after_title' => '</span></h4>',
		) );
		register_sidebar( array(
		'name' => esc_html__( 'Header Advertisement Widget', 'pantograph'),
		'id' => 'header_right_add_widgets',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
		) );
		register_sidebar( array(
		'name' => esc_html__( '1 Column Footer Widgets', 'pantograph'),
		'id' => 'footer_one_column_widgets',
		'before_widget' => '<div id="%1$s" class="col-md-12 footer-links default-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="sh-text">',
		'after_title' => '</span></h4>',
		) );
		register_sidebar( array(
		'name' => esc_html__( '2 Column Footer Widgets', 'pantograph'),
		'id' => 'footer_two_column_widgets',
		'before_widget' => '<div id="%1$s" class="col-md-6 col-sm-6 footer-links default-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="sh-text">',
		'after_title' => '</span></h4>',
		) );
		register_sidebar( array(
		'name' => esc_html__( '3 Columns Footer Widgets', 'pantograph'),
		'id' => 'footer_three_column_widgets',
		'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-4 footer-links default-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="sh-text">',
		'after_title' => '</span></h4>',
		) );
		register_sidebar( array(
		'name' => esc_html__( '4 Columns Footer Widgets', 'pantograph'),
		'id' => 'footer_four_column_widgets',
		'before_widget' => '<div id="%1$s" class="col-md-3 footer-links default-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="sh-text">',
		'after_title' => '</span></h4>',
		) );
		register_sidebar( array(
		'name' => esc_html__( '6 Columns Footer Widgets', 'pantograph'),
		'id' => 'footer_six_column_widgets',
		'before_widget' => '<div id="%1$s" class="col-md-2 footer-links default-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span class="sh-text">',
		'after_title' => '</span></h4>',
		) );
	}
}
add_action( 'widgets_init', 'pionusnews_widgets_init' );