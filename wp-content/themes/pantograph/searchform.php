<?php $favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/searchform', 'pionus' );
} else { ?>
<form method="get" role="search" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
	  <input type="text" placeholder="<?php esc_attr_e('Search..', 'pantograph'); ?>" class="form-control" name="s">
	  <button class="sea-icon" type="submit"><?php esc_html_e( 'Search', 'pantograph' ); ?></button>
	</div>
</form>
<?php } ?>