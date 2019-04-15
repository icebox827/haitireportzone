<?php
/**
 * The default single post page of this theme
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_old'){
get_header();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
}

//echo pantograph_get_option('pantograph_single_post_style');
if ($favorite_theme_style == 'style_old'){
$categories = get_the_category();
if ( ! empty( $categories ) ) { 
$cat_id = $categories[0]->term_id;
$cat_data = get_option("category_$cat_id");	
$single_page_layout = $cat_data['single_page_layout'];
}
if((isset($cat_data['single_page_layout'])) && ($single_page_layout !=0) ){
if($single_page_layout == 1) {
	
	get_template_part( 'template-parts/content', 'single-general' );
	
}elseif($single_page_layout == 2) {
	
	get_template_part( 'template-parts/content', 'single-large-image-and-title' );
	
}elseif($single_page_layout == 3) {
	
	get_template_part( 'template-parts/content', 'single-full-width-image-and-title' );
	
}elseif($single_page_layout == 4) {
	
	get_template_part( 'template-parts/content', 'single-without-sidebar' );
	
}elseif($single_page_layout == 5) {
	
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay' );
	
}elseif($single_page_layout == 6) {
	
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay-transparent' );
}
else{
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay-transparent' );	
}
}else{
if(pantograph_get_option('pantograph_single_post_style') == 1) {
	
	get_template_part( 'template-parts/content', 'single-general' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 2) {
	
	get_template_part( 'template-parts/content', 'single-large-image-and-title' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 3) {
	
	get_template_part( 'template-parts/content', 'single-full-width-image-and-title' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 4) {
	
	get_template_part( 'template-parts/content', 'single-without-sidebar' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 5) {
	
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 6) {
	
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay-transparent' );
}
else{
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay-transparent' );	
}	
}
} elseif ($favorite_theme_style == 'style_new'){
$categories = get_the_category();
if ( ! empty( $categories ) ) { 
$cat_id = $categories[0]->term_id;
$cat_data = get_option("category_$cat_id");	
$single_page_layout = $cat_data['single_page_layout'];
}
if((isset($cat_data['single_page_layout'])) && ($single_page_layout !=0) ){
if($single_page_layout == 1) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-general' );
	
}elseif($single_page_layout == 2) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-large-image-and-title' );
	
}elseif($single_page_layout == 3) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-full-width-image-and-title' );
	
}elseif($single_page_layout == 4) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-without-sidebar' );
	
}elseif($single_page_layout == 5) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-one-column-title-overlay' );
	
}elseif($single_page_layout == 6) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-one-column-title-overlay-transparent' );
}
else{
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-general' );	
}
}else{
if(pionusnews_get_option('pionusnews_single_post_style') == 1) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-general' );
	
}elseif(pionusnews_get_option('pionusnews_single_post_style') == 2) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-large-image-and-title' );
	
}elseif(pionusnews_get_option('pionusnews_single_post_style') == 3) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-full-width-image-and-title' );
	
}elseif(pionusnews_get_option('pionusnews_single_post_style') == 4) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-without-sidebar' );
	
}elseif(pionusnews_get_option('pionusnews_single_post_style') == 5) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-one-column-title-overlay' );
	
}elseif(pionusnews_get_option('pionusnews_single_post_style') == 6) {
	
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-one-column-title-overlay-transparent' );
}
else{
	get_template_part( 'template-parts/pionus/template-parts/content', 'single-general' );	
}	
} 
} else {
$categories = get_the_category();
if ( ! empty( $categories ) ) { 
$cat_id = $categories[0]->term_id;
$cat_data = get_option("category_$cat_id");	
$single_page_layout = $cat_data['single_page_layout'];
}
if((isset($cat_data['single_page_layout'])) && ($single_page_layout !=0) ){
if($single_page_layout == 1) {
	
	get_template_part( 'template-parts/content', 'single-general' );
	
}elseif($single_page_layout == 2) {
	
	get_template_part( 'template-parts/content', 'single-large-image-and-title' );
	
}elseif($single_page_layout == 3) {
	
	get_template_part( 'template-parts/content', 'single-full-width-image-and-title' );
	
}elseif($single_page_layout == 4) {
	
	get_template_part( 'template-parts/content', 'single-without-sidebar' );
	
}elseif($single_page_layout == 5) {
	
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay' );
	
}elseif($single_page_layout == 6) {
	
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay-transparent' );
}
else{
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay-transparent' );	
}
}else{
if(pantograph_get_option('pantograph_single_post_style') == 1) {
	
	get_template_part( 'template-parts/content', 'single-general' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 2) {
	
	get_template_part( 'template-parts/content', 'single-large-image-and-title' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 3) {
	
	get_template_part( 'template-parts/content', 'single-full-width-image-and-title' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 4) {
	
	get_template_part( 'template-parts/content', 'single-without-sidebar' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 5) {
	
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay' );
	
}elseif(pantograph_get_option('pantograph_single_post_style') == 6) {
	
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay-transparent' );
}
else{
	get_template_part( 'template-parts/content', 'single-one-column-title-overlay-transparent' );	
}	
}
}
if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
}
?>