<?php
	$container_bg_style = $GLOBALS['container_bg_white'];
	$global_white_style = $GLOBALS['global_white_conainter'];
	$body_bg_img_style = $GLOBALS['pantograph_body_bg_img'];
?>
<footer class="<?php if(($container_bg_style==1) || ($global_white_style==1)){ if($body_bg_img_style){ ?> navstyle-for-bg<?php } } ?>">
	<div class="container">
	<?php if((pantograph_get_option('footer_logo_url') != '') || (pantograph_get_option('pantograph_footer_short_desc') != '') || (pantograph_get_option('search_on_off_footer') == 1) ) { ?>	
		<div class="footer-head">
			<div class="row center-content">
				<div class="col-md-2 col-sm-3">
					  <?php if(pantograph_get_option('footer_logo_url') != '') { ?>
					  <a class="img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>" src="<?php echo esc_url( pantograph_get_option('footer_logo_url') ); ?>"></a> 
					  <?php } else { ?>
					  <a class="img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ).'/img/logo-lite.png'; ?>" alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>"/></a>
					  <?php } ?>
				</div>
				<div class="col-md-6 col-sm-4">
					<?php if(pantograph_get_option('pantograph_footer_short_desc') != '') { ?>
						<p><?php echo esc_textarea( pantograph_get_option('pantograph_footer_short_desc') ); ?></p>
					<?php } ?>
				</div>
				<div class="col-md-4 col-sm-5">
					<?php if(pantograph_get_option('search_on_off_footer') == 1) { ?>
					<form class="footer-search" method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="form-group">
						  <input type="text" placeholder="<?php esc_attr_e('Search', 'pantograph'); ?>" name="s">
						  <button type="submit"><i class="fa fa-search"></i></button>
						</div>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if ( is_active_sidebar( 'footer_widgets' ) ) { ?>
		<div class="footer-content">
			<div class="row">
				<?php 
					dynamic_sidebar( 'footer_widgets_style5' ); 
					//dynamic_sidebar( 'footer_widgets' ); 
				?>
				<div class="col-md-2 col-sm-2">
					<?php if((pantograph_get_option('social_facebook') != '') || (pantograph_get_option('social_twitter') != '') || (pantograph_get_option('social_googleplus') != '') || (pantograph_get_option('social_instagram') != '') || (pantograph_get_option('social_utube') != '')) { ?>
					<h5 class="text-white"><?php esc_html_e( 'Follow Us', 'pantograph' ); ?></h5>
					<ul class="footer-social">
						<?php if(pantograph_get_option('social_facebook') != '') { ?>
							  <li><a href="<?php echo esc_url( pantograph_get_option('social_facebook') ); ?>" target="_blank"><span><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/1.png'; ?>" alt="<?php esc_attr_e( 'Facebook', 'pantograph' ); ?>"/></span> <?php esc_html_e( 'Facebook', 'pantograph' ); ?></a></li>
							  <?php } if(pantograph_get_option('social_twitter') != '') { ?>
							  <li><a href="<?php echo esc_url( pantograph_get_option('social_twitter') ); ?>" target="_blank"><span><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/2.png'; ?>" alt="<?php esc_attr_e( 'Twitter', 'pantograph' ); ?>"/></span> <?php esc_html_e( 'Twitter', 'pantograph' ); ?></a></li>
							  <?php } if(pantograph_get_option('social_googleplus') != '') { ?>
							  <li><a href="<?php echo esc_url( pantograph_get_option('social_googleplus') ); ?>" target="_blank"><span><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/3.png'; ?>" alt="<?php esc_attr_e( 'Google+', 'pantograph' ); ?>"/></span> <?php esc_html_e( 'Google+', 'pantograph' ); ?></a></li>
							  <?php } if(pantograph_get_option('social_instagram') != '') { ?>
							  <li><a href="<?php echo esc_url( pantograph_get_option('social_instagram') ); ?>" target="_blank"><span><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/4.png'; ?>" alt="<?php esc_attr_e( 'Instagram', 'pantograph' ); ?>"/></span> <?php esc_html_e( 'Instagram', 'pantograph' ); ?></a></li>
							  <?php } if(pantograph_get_option('social_utube') != '') { ?>
							  <li><a href="<?php echo esc_url( pantograph_get_option('social_utube') ); ?>" target="_blank"><span><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/5.png'; ?>" alt="<?php esc_attr_e( 'Youtube', 'pantograph' ); ?>"/></span> <?php esc_html_e( 'Youtube', 'pantograph' ); ?></a></li>
								<?php } if(pantograph_get_option('social_linkedin') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('social_linkedin') ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ).'/img/social/6.png'; ?>" alt="<?php esc_attr_e( 'Linkedin', 'pantograph' ); ?>"/> &nbsp;<?php esc_html_e( 'Linkedin', 'pantograph' ); ?></a></li>
							<?php } ?>
					</ul>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="footer-bottom">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<p><?php if(pantograph_get_option('copy_text') != '') { ?><?php echo esc_textarea( pantograph_get_option('copy_text') ); ?><?php } else { ?><?php esc_html_e('Copyright &copy; 2017 yourdomian. All rights reserved.', 'pantograph'); ?><?php } ?></p>
				</div>
				<div class="col-md-6 col-sm-6 text-right">
					<ul class="list-inline">
						<?php
							if (has_nav_menu('pantograph_menu_footer')) {
							wp_nav_menu(array(
							'theme_location' 	=>'pantograph_menu_footer', 'depth' => 1, 'container' => false, 'items_wrap' => '%3$s'
							)); 
							}
						?>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</footer>