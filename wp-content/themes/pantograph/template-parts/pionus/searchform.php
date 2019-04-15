<form method="get" role="search" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
	  <input type="text" placeholder="<?php esc_attr_e('Search..', 'pantograph'); ?>" class="form-control" name="s">
	  <button class="sea-icon" type="submit"><?php esc_html_e( 'Search', 'pantograph'); ?></button>
	</div>
</form>