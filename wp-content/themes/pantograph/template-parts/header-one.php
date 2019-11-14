<?php
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pantograph_get_option('global_white_conainter');
	$pantograph_body_bg_img = get_post_meta(get_the_ID(), 'pantograph_body_bg_img', true);
?>
<header class="header header2">
	<nav class="navbar navbar-default<?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if($pantograph_body_bg_img){ ?> navstyle-for-bg<?php } } ?>">
		<div class="container">
			<div class="search-bar">
					<form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					  <input type="text" placeholder="<?php esc_attr_e('Type search text here...', 'pantograph'); ?>" class="form-control" name="s">
					</form>
				<div class="search-close"><i class="fa fa-times"></i></div>
			</div>
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only"><?php esc_html_e('Toggle navigation', 'pantograph'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				  <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
					<?php pantograph_the_custom_logo(); ?>
				  <?php else: ?>
				  <?php if(pantograph_get_option('logo_url') != '') { ?>
				  <a class="navbar-brand img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>" src="<?php echo esc_url( pantograph_get_option('logo_url') ); ?>"></a> 
				  <?php } else { ?>
				  <a class="navbar-brand img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/logo.png'; ?>" alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>"/></a>
				  <?php } ?>
				  <?php endif; ?>
			</div>
			
			<?php if(pantograph_get_option('search_on_off') == 1) { ?>
			<div class="search-trigger pull-right"></div>

			<div class="login pull-right"></div>
			<?php } ?>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse main-navigation">
				<?php
					if (has_nav_menu('pantograph_primary_menu')) {
					wp_nav_menu( array(
						'theme_location'    => 'pantograph_primary_menu',
						'container'     => false,
						'container_id'      => '',
						'conatiner_class'   => '',
						'menu_class'        => 'nav navbar-nav mainnavblock', 
						'echo'          => true,
						'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'         => 10, 
						'walker'        => new pantograph_walker_nav_menu
					) );
					}
				?>
			</div>
			<!-- /.navbar-collapse -->
		</div>
	</nav>
</header>