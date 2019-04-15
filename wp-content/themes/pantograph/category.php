<?php
/**
 * The template for displaying Category pages
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_old'){
get_header();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
}

if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/category', 'pionus' );
} else {
if(pantograph_get_option('pantograph_category_style') == 1) {
	
	get_template_part( 'template-parts/category', 'one-column-general' );
	
}elseif(pantograph_get_option('pantograph_category_style') == 2) {
	
	get_template_part( 'template-parts/category', 'one-column-image-title' );
	
}elseif(pantograph_get_option('pantograph_category_style') == 3) {
	
	get_template_part( 'template-parts/category', 'one-column-large-general' );
	
}elseif(pantograph_get_option('pantograph_category_style') == 4) {
	
	get_template_part( 'template-parts/category', 'three-column-fullwidth' );
	
}elseif(pantograph_get_option('pantograph_category_style') == 5) {
	
	get_template_part( 'template-parts/category', 'two-column-general' );
	
}elseif(pantograph_get_option('pantograph_category_style') == 6) {
	
	get_template_part( 'template-parts/category', 'two-column-image-title' );
	
}elseif(pantograph_get_option('pantograph_category_style') == 7) {
	
	get_template_part( 'template-parts/category', 'one-column-content-left-right' );
	
}elseif(pantograph_get_option('pantograph_category_style') == 8) {
	
	get_template_part( 'template-parts/category', 'one-column-title-overlay' );
	
}elseif(pantograph_get_option('pantograph_category_style') == 9) {
	
	get_template_part( 'template-parts/category', 'one-column-title-overlay-transparent' );

}elseif(pantograph_get_option('pantograph_category_style') == 10) {
	
	get_template_part( 'template-parts/category', 'three-column-image-overlay' );

}elseif(pantograph_get_option('pantograph_category_style') == 11) {
	
	get_template_part( 'template-parts/category', 'three-column-image-title-overlay' );

}elseif(pantograph_get_option('pantograph_category_style') == 12) {
	
	get_template_part( 'template-parts/category', 'one-column-style-12' );

}elseif(pantograph_get_option('pantograph_category_style') == 13) {
	
	get_template_part( 'template-parts/category', 'three-column-masonry-style-13' );
	
}else{
	get_template_part( 'template-parts/category', 'one-column-content-left-right' );	
}
}
if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
} ?>