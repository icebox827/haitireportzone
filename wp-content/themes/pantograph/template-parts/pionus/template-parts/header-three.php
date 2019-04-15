<?php //Body Background Image
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pionusnews_get_option('global_white_conainter');
	$pionusnews_body_bg_img_to = pionusnews_get_option('pionusnews_body_bg_img_to');
	$pionusnews_body_bg_img = get_post_meta(get_the_ID(), 'pionusnews_body_bg_img', true);
?>
<div class="body-overlay"></div>

<div id="sidebar-wrapper" class="main-navigation">
		<div class="search-alt pull-left">
			<form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			  <input type="text" placeholder="<?php esc_attr_e('Search', 'pantograph'); ?>" name="s">
			  <button type="submit"></button>
			</form>
		</div>

		<?php
			if (has_nav_menu('pionusnews_primary_menu')) {
			wp_nav_menu( array(
				'theme_location'    => 'pionusnews_primary_menu',
				'container'     => false,
				'container_id'      => '',
				'conatiner_class'   => '',
				'menu_class'        => 'nav navbar-nav sidebarmenu', 
				'echo'          => true,
				'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'         => 10, 
				'walker'        => new pionusnews_walker_nav_menu_for_style_3
			) );
			}
		?>
</div>

<header class="header header4 headerstylethree">
		<nav class="navbar navbar-default<?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if(($pionusnews_body_bg_img) || ($pionusnews_body_bg_img_to)){ ?> navstyle-for-bg<?php } } ?>">
			<div class="container">

				<div class="nav-trigger">
					<span></span>
					<span></span>
					<span></span>
				</div>

				<div class="navbar-header">
					<?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
					<?php pionusnews_the_custom_logo(); ?>
					<?php else: ?>
					<?php if(pionusnews_get_option('logo_url') != '') { ?>
					<a class="navbar-brand img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php esc_attr_e( 'Logo', 'pantograph'); ?>" src="<?php echo esc_url( pionusnews_get_option('logo_url') ); ?>"></a> 
					<?php } else { ?>
					<a class="navbar-brand img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/logo.png'; ?>" alt="<?php esc_attr_e( 'Logo', 'pantograph'); ?>"/></a>
					<?php } ?>
					<?php endif; ?>
				</div>
				
				<div class="search-alt pull-left">
					<form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					  <input type="text" placeholder="<?php esc_attr_e('Search', 'pantograph'); ?>" name="s">
					  <button type="submit"></button>
					</form>
				</div>
				
				<div class="add_block_hdefault pull-right hidden-xs">
					<?php 
					if ( is_active_sidebar( 'header_right_add_widgets' ) ) { 
					dynamic_sidebar( 'header_right_add_widgets' ); 
					}
					?>
				</div>
				
			</div>
		</nav>
	</header>