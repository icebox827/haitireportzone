<?php
/**
 * 404 page
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_old'){
get_header();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
}
?>
<div class="inner-content">
	<div class="container">
		<div class="error-container">
			<h1><?php esc_html_e('404', 'pantograph'); ?></h1>
			<span class="error-title"><?php esc_html_e('OOPS! PAGE NOT FOUND', 'pantograph'); ?></span>
			<p><?php esc_html_e('Sorry, but we cannot seem to find the page you are looking for.', 'pantograph'); ?></p>
		   
			<br>

			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Take Me Home', 'pantograph'); ?></a>
		</div>
	</div>
</div>
  
<?php 
if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
}
?>