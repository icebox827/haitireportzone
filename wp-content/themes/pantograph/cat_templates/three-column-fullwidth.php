<?php
/**
 * Category Template: Three Column Full Width
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
get_template_part( 'template-parts/pionus/template-parts/category', 'three-column-fullwidth' );
} else {
get_template_part( 'template-parts/category', 'three-column-fullwidth' );
}

if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
}
?>