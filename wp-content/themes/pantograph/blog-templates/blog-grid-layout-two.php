<?php
/**
 * Template Name: Blog - Grid Layout Two
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
get_template_part( 'template-parts/pionus/blog-templates/blog-grid-layout-two', 'pionus' );
get_template_part( 'template-parts/pionus/footer', 'pionus' );
}