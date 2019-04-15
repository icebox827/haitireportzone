<?php
	$container_bg_style = $GLOBALS['container_bg_white'];
	$global_white_style = $GLOBALS['global_white_conainter'];
	$body_bg_img_style = $GLOBALS['pantograph_body_bg_img'];
?>
<footer class="<?php if(($container_bg_style==1) || ($global_white_style==1)){ if($body_bg_img_style){ ?> navstyle-for-bg<?php } } ?>">
	<div class="container">
		<div class="<?php if((pantograph_get_option('footer_logo_url') != '') || (pantograph_get_option('pantograph_footer_short_desc') != '') || (pantograph_get_option('search_on_off_footer') == 1) || is_active_sidebar( 'footer_widgets' ) ) { echo 'footer-head'; } ?>">
		<?php if((pantograph_get_option('footer_logo_url') != '') || (pantograph_get_option('pantograph_footer_short_desc') != '') || (pantograph_get_option('search_on_off_footer') == 1) ) { ?>
			<div class="row center-content">
				<?php if(pantograph_get_option('footer_logo_url') != '') { ?>
				<div class="col-md-2 col-sm-3">
					<a class="img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>" src="<?php echo esc_url( pantograph_get_option('footer_logo_url') ); ?>"></a> 
				<?php } else { ?>
				<div class="col-md-2 col-sm-3">
					<a class="img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() ).'/img/logo-lite.png'; ?>" alt="<?php esc_attr_e( 'Logo', 'pantograph' ); ?>"/></a>
				</div>
				<?php } ?>
				
				<?php if(pantograph_get_option('pantograph_footer_short_desc') != '') { ?>
				<div class="col-md-6 col-sm-4">
						<p><?php echo esc_textarea( pantograph_get_option('pantograph_footer_short_desc') ); ?></p>
				</div>
				<?php } ?>
				<?php if(pantograph_get_option('search_on_off_footer') == 1) { ?>
				<div class="col-md-4 col-sm-5">
					<form class="footer-search" method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="form-group">
						  <input type="text" placeholder="<?php esc_attr_e('Search', 'pantograph'); ?>" name="s">
						  <button type="submit"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer_widgets' ) ) { ?>
		<div class="footer-content">
			<div class="row">
				<?php dynamic_sidebar( 'footer_widgets' ); ?>
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