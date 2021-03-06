<?php
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pionusnews_get_option('global_white_conainter');
	$pionusnews_body_bg_img_to = pionusnews_get_option('pionusnews_body_bg_img_to');
	$pionusnews_body_bg_img = get_post_meta(get_the_ID(), 'pionusnews_body_bg_img', true);
?>
<header class="header header3 header5 header6 headerstyletwo">
	<nav class="navbar navbar-default<?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if(($pionusnews_body_bg_img) || ($pionusnews_body_bg_img_to)){ ?> navstyle-for-bg<?php } } ?>">
		<div class="container">
			<div class="search-bar">
					<form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					  <input type="text" placeholder="<?php esc_attr_e('Type search text here...', 'pantograph'); ?>" class="form-control" name="s">
					</form>
				<div class="search-close"><i class="fa fa-times"></i></div>
			</div>

			<div class="col-md-12">
			<div class="row">
			<div class="navbar-social mw33">
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
				<?php } else { ?>
					<a style="visibility:hidden;" target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_facebook') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/11.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Facebook', 'pantograph'); ?>"/></a>
					<a style="visibility:hidden;" target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_twitter') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/12.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Twitter', 'pantograph'); ?>"/></a>
					<a style="visibility:hidden;" target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_googleplus') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/13.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Google +', 'pantograph'); ?>"/></a>
					<a style="visibility:hidden;" target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_instagram') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/14.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Instagram', 'pantograph'); ?>"/></a>
					<a style="visibility:hidden;" target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_utube') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/15.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Youtube', 'pantograph'); ?>"/></a>
					<a style="visibility:hidden;" target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_linkedin') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/16.png'; ?>" class="img-responsive" alt="<?php esc_attr_e( 'Linkedin', 'pantograph'); ?>"/></a>
				<?php } ?>
			</div>

			<div class="navbar-brand mw33">
				  <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
					<?php pionusnews_the_custom_logo(); ?>
				  <?php else: ?>
				  <?php if(pionusnews_get_option('logo_url') != '') { ?>
				  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" alt="<?php esc_attr_e( 'Logo', 'pantograph'); ?>" src="<?php echo esc_url( pionusnews_get_option('logo_url') ); ?>"></a> 
				  <?php } else { ?>
				  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/logo.png'; ?>" alt="<?php esc_attr_e( 'Logo', 'pantograph'); ?>"/></a>
				  <?php } ?>
				  <?php endif; ?>
			</div>
			
			<?php if(pionusnews_get_option('search_on_off') == 1) { ?>
			<div class="search-trigger pull-right"></div>
			<div class="login pull-right"></div>
			<?php }else{ ?>
			<div class="add_block_hdefault pull-right hidden-xs">
				<?php 
				if ( is_active_sidebar( 'header_right_add_widgets' ) ) { 
				dynamic_sidebar( 'header_right_add_widgets' ); 
				}
				?>
			</div>
			<?php } ?>
			</div>
			</div>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'pantograph'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>				
		</div>
	</nav>
	
	
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="nav-white">
	<div class="container">
	<div class="navbar-collapse navbar-ex1-collapse collapse main-navigation megamenu-margin-one" role="navigation" aria-expanded="false" style="height:1px;">
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

	</div>
	</div>
	
	<!-- /.navbar-collapse -->			
</header>