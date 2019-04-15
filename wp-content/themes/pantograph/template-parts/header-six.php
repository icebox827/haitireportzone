<?php
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pantograph_get_option('global_white_conainter');
	$pantograph_body_bg_img = get_post_meta(get_the_ID(), 'pantograph_body_bg_img', true);
?>
<header class="header header3 headerstylesix">
	<nav class="navbar navbar-default<?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if($pantograph_body_bg_img){ ?> navstyle-for-bg<?php } } ?>">
		<div class="container">
			<div class="search-bar">
				<form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				  <input type="text" placeholder="<?php esc_attr_e('Type search text here...', 'pantograph'); ?>" class="form-control" name="s">
				</form>
				<div class="search-close"><i class="fa fa-times"></i></div>
			</div>

			<div class="navbar-header hidden visible-xs">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only"><?php esc_html_e('Toggle navigation', 'pantograph'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<?php if(pantograph_get_option('logo_url') != '') { ?>
				<a class="navbar-brand img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>" src="<?php echo esc_url( pantograph_get_option('logo_url') ); ?>"></a> 
				<?php } else { ?>
				<a class="navbar-brand img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/logo.png'; ?>" alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>"/></a>
				<?php } ?>
			</div>				
			
			<div class="navbar-social">
				<?php if(pantograph_get_option('social_facebook') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pantograph_get_option('social_facebook') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/11.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Facebook', 'pantograph'); ?>"/></a>
					<?php } if(pantograph_get_option('social_twitter') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pantograph_get_option('social_twitter') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/12.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Twitter', 'pantograph'); ?>"/></a>
					<?php } if(pantograph_get_option('social_googleplus') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pantograph_get_option('social_googleplus') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/13.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Google +', 'pantograph'); ?>"/></a>
					<?php } if(pantograph_get_option('social_instagram') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pantograph_get_option('social_instagram') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/14.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Instagram', 'pantograph'); ?>"/></a>
					<?php } if(pantograph_get_option('social_utube') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pantograph_get_option('social_utube') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/15.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Youtube', 'pantograph'); ?>"/></a>
					<?php } if(pantograph_get_option('social_linkedin') != '') { ?>
					<a target="_blank" href="<?php echo esc_url( pantograph_get_option('social_linkedin') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/16.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Linkedin', 'pantograph'); ?>"/></a>
					<?php } ?>
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