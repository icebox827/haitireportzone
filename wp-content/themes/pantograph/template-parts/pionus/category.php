<?php
if(pionusnews_get_option('pionusnews_category_style') == 1) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-general' );
	
}elseif(pionusnews_get_option('pionusnews_category_style') == 2) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-image-title' );
	
}elseif(pionusnews_get_option('pionusnews_category_style') == 3) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-large-general' );
	
}elseif(pionusnews_get_option('pionusnews_category_style') == 4) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'three-column-fullwidth' );
	
}elseif(pionusnews_get_option('pionusnews_category_style') == 5) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'two-column-general' );
	
}elseif(pionusnews_get_option('pionusnews_category_style') == 6) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'two-column-image-title' );
	
}elseif(pionusnews_get_option('pionusnews_category_style') == 7) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-content-left-right' );
	
}elseif(pionusnews_get_option('pionusnews_category_style') == 8) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-title-overlay' );
	
}elseif(pionusnews_get_option('pionusnews_category_style') == 9) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-title-overlay-transparent' );

}elseif(pionusnews_get_option('pionusnews_category_style') == 10) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'three-column-image-overlay' );

}elseif(pionusnews_get_option('pionusnews_category_style') == 11) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'three-column-image-title-overlay' );

}elseif(pionusnews_get_option('pionusnews_category_style') == 12) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-style-12' );

}elseif(pionusnews_get_option('pionusnews_category_style') == 13) {
	
	get_template_part( 'template-parts/pionus/template-parts/category', 'three-column-masonry-style-13' );
	
}else{
	get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-general' );	
}