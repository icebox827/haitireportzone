<?php
/**
 * Template Name: Blog - Pinterest Layout Alt
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
get_template_part( 'template-parts/pionus/blog-templates/blog-pinterest-layout-alt', 'pionus' );
get_template_part( 'template-parts/pionus/footer', 'pionus' );
}