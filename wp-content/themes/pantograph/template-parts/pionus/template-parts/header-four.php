<?php
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pionusnews_get_option('global_white_conainter');
	$pionusnews_body_bg_img_to = pionusnews_get_option('pionusnews_body_bg_img_to');
	$pionusnews_body_bg_img = get_post_meta(get_the_ID(), 'pionusnews_body_bg_img', true);
?>
<header class="header header4 header5 headerstylefour">
		<nav class="navbar navbar-default<?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if(($pionusnews_body_bg_img) || ($pionusnews_body_bg_img_to)){ ?> navstyle-for-bg<?php } } ?>">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only"><?php esc_html_e('Toggle navigation', 'pantograph'); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
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
				
				<div class="add_block_h4 pull-right hidden-xs">
					<?php 
					if ( is_active_sidebar( 'header_right_add_widgets' ) ) { 
					dynamic_sidebar( 'header_right_add_widgets' ); 
					}
					?>
				</div>
			</div>
		</nav>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="nav-dark<?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if(($pionusnews_body_bg_img) || ($pionusnews_body_bg_img_to)){ ?> navstyle-for-bg<?php } } ?>">
		<div class="container">
		<div class="collapse navbar-collapse navbar-ex1-collapse pull-left main-navigation megamenu-margin-four header_menu_4">
			<?php
				if (has_nav_menu('pionusnews_primary_menu')) {
				wp_nav_menu( array(
					'theme_location'    => 'pionusnews_primary_menu',
					'container'     => false,
					'container_id'      => '',
					'conatiner_class'   => '',
					'menu_class'        => 'nav navbar-nav mainnavblock', 
					'echo'          => true,
					'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'         => 10, 
					'walker'        => new pionusnews_walker_nav_menu
				) );
				}
			?>
		</div>
		
		<div class="navbar-social pull-right">
			<?php if(pionusnews_get_option('navbar_social_on_off') == 1) { ?>
			<?php if(pionusnews_get_option('social_facebook') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_facebook') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/11.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Facebook', 'pantograph'); ?>"/></a>
					<?php } if(pionusnews_get_option('social_twitter') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_twitter') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/12.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Twitter', 'pantograph'); ?>"/></a>
					<?php } if(pionusnews_get_option('social_googleplus') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_googleplus') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/13.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Google +', 'pantograph'); ?>"/></a>
					<?php } if(pionusnews_get_option('social_instagram') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_instagram') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/14.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Instagram', 'pantograph'); ?>"/></a>
					<?php } if(pionusnews_get_option('social_utube') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_utube') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/15.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Youtube', 'pantograph'); ?>"/></a>
					<?php } if(pionusnews_get_option('social_linkedin') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_linkedin') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/16.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Linkedin', 'pantograph'); ?>"/></a>
					<?php } ?>
			<?php } ?>
		</div>		
		</div>
		</div>
		
		<!-- /.navbar-collapse -->		
	</header>