<?php
/**
 * Category Template: One Column Transparent Overlay
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
get_template_part( 'template-parts/pionus/template-parts/category', 'one-column-title-overlay-transparent' );
} else {
get_template_part( 'template-parts/category', 'one-column-title-overlay-transparent' );
}

if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
}
?>