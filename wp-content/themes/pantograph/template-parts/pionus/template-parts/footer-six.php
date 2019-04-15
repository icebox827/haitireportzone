<?php
	$container_bg_style = $GLOBALS['container_bg_white'];
	$global_white_style = $GLOBALS['global_white_conainter'];
	$pionusnews_footer_top_mg = $GLOBALS['pionusnews_footer_top_mg'];
	$body_bg_img_style = $GLOBALS['pionusnews_body_bg_img'];
	$body_bg_img_style_to = $GLOBALS['pionusnews_body_bg_img_to'];
	$pionusnews_footer_columns_meta = $GLOBALS['footer_columns_meta'];
?>
<footer class="pionus-footer-default<?php if(($container_bg_style==1) || ($global_white_style==1)){ if(($body_bg_img_style) || ($body_bg_img_style_to)){ ?> navstyle-for-bg<?php } } ?>"<?php if($pionusnews_footer_top_mg){ ?> style="margin-top:<?php echo esc_attr($pionusnews_footer_top_mg); ?> !important;"<?php } ?>>
	<div class="container">
		<?php if((pionusnews_get_option('footer_logo_url') != '') || (pionusnews_get_option('pionusnews_footer_short_desc') != '') || (pionusnews_get_option('search_on_off_footer') == 1) ) { ?>
		<div class="<?php if((pionusnews_get_option('footer_logo_url') != '') || (pionusnews_get_option('pionusnews_footer_short_desc') != '') || (pionusnews_get_option('search_on_off_footer') == 1) || is_active_sidebar( 'footer_widgets' ) ) { echo 'footer-head'; } ?>">
			<div class="row center-content">
				<?php if(pionusnews_get_option('footer_logo_url') != '') { ?>
				<div class="col-md-2 col-sm-3">
					<a class="img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" alt="<?php esc_attr_e( 'Logo', 'pantograph'); ?>" src="<?php echo esc_url( pionusnews_get_option('footer_logo_url') ); ?>"></a>
				</div>
				<?php } ?>
				
				<?php if(pionusnews_get_option('pionusnews_footer_short_desc') != '') { ?>
				<div class="col-md-6 col-sm-4">
					<p class="footer_short_desc"><?php echo esc_textarea( pionusnews_get_option('pionusnews_footer_short_desc') ); ?></p>
				</div>
				<?php } ?>
				<?php if(pionusnews_get_option('search_on_off_footer') == 1) { ?>
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

		<?php if(pionusnews_get_option('pionusnews_footer_widgetized_area') == 1) { ?>
		<div class="footer-content">
			<div class="row">
				<?php if( ($pionusnews_footer_columns_meta == 1) || ($pionusnews_footer_columns_meta == 2)
								|| ($pionusnews_footer_columns_meta == 3) || ($pionusnews_footer_columns_meta == 4)
								|| ($pionusnews_footer_columns_meta == 5) ) { 
					if($pionusnews_footer_columns_meta == 1){
						if ( is_active_sidebar( 'footer_one_column_widgets' ) ) {
							dynamic_sidebar( 'footer_one_column_widgets' );
						}
					 }elseif($pionusnews_footer_columns_meta == 2){
						if ( is_active_sidebar( 'footer_two_column_widgets' ) ) {
							dynamic_sidebar( 'footer_two_column_widgets' );
						}
					 }elseif($pionusnews_footer_columns_meta == 3){
						if ( is_active_sidebar( 'footer_three_column_widgets' ) ) {
							dynamic_sidebar( 'footer_three_column_widgets' );
						}
					 }elseif($pionusnews_footer_columns_meta == 4){
						if ( is_active_sidebar( 'footer_four_column_widgets' ) ) {
							dynamic_sidebar( 'footer_four_column_widgets' );
						}
					 }elseif($pionusnews_footer_columns_meta == 5){
						if ( is_active_sidebar( 'footer_six_column_widgets' ) ) {
							dynamic_sidebar( 'footer_six_column_widgets' );
						}
					 }
					 } else {
						if(pionusnews_get_option('pionusnews_footer_columns') == 1) {
						if ( is_active_sidebar( 'footer_one_column_widgets' ) ) {
							dynamic_sidebar( 'footer_one_column_widgets' );
						}
					 }elseif(pionusnews_get_option('pionusnews_footer_columns') == 2){
						if ( is_active_sidebar( 'footer_two_column_widgets' ) ) {
							dynamic_sidebar( 'footer_two_column_widgets' );
						}
					 }elseif(pionusnews_get_option('pionusnews_footer_columns') == 3){
						if ( is_active_sidebar( 'footer_three_column_widgets' ) ) {
							dynamic_sidebar( 'footer_three_column_widgets' );
						}
					 }elseif(pionusnews_get_option('pionusnews_footer_columns') == 4){
						if ( is_active_sidebar( 'footer_four_column_widgets' ) ) {
							dynamic_sidebar( 'footer_four_column_widgets' );
						}
					 }elseif(pionusnews_get_option('pionusnews_footer_columns') == 5){
						if ( is_active_sidebar( 'footer_six_column_widgets' ) ) {
							dynamic_sidebar( 'footer_six_column_widgets' );
						}
					 }else{
						if ( is_active_sidebar( 'footer_four_column_widgets' ) ) {
							dynamic_sidebar( 'footer_four_column_widgets' );
						}
					 }
					 }
					?>
			</div>
		</div>
		<?php } ?>
		<div class="footer-bottom">
			<div class="row">
				<?php if(pionusnews_get_option('pionusnews_bottom_footer_alt') != 1) { ?>
				<div class="col-md-6 col-sm-6">
					<p><?php if(pionusnews_get_option('copy_text') != '') { ?><?php echo esc_textarea( pionusnews_get_option('copy_text') ); ?><?php } else { ?><?php esc_html_e('Copyright &copy; 2017 yourdomian. All rights reserved.', 'pantograph'); ?><?php } ?></p>
				</div>
				<div class="col-md-6 col-sm-6 text-right">
					<ul class="list-inline">
						<?php
							if (has_nav_menu('pionusnews_menu_footer')) {
							wp_nav_menu(array(
							'theme_location' 	=>'pionusnews_menu_footer', 'depth' => 1, 'container' => false, 'items_wrap' => '%3$s'
							)); 
							}
						?>
					</ul>	
				</div>
				<?php } else { ?>
				<?php if (has_nav_menu('pionusnews_menu_footer')) { ?>
				<div class="col-md-12 col-sm-12 text-right">
					<ul class="list-inline pionusnews-ft-nav-ul">
						<?php
							if (has_nav_menu('pionusnews_menu_footer')) {
							wp_nav_menu(array(
							'theme_location' 	=>'pionusnews_menu_footer', 'depth' => 1, 'container' => false, 'items_wrap' => '%3$s'
							)); 
							}
						?>
					</ul>	
				</div>
				<?php } ?>
				<div class="col-md-12 col-sm-12">
					<p><?php if(pionusnews_get_option('copy_text') != '') { ?><?php echo esc_textarea( pionusnews_get_option('copy_text') ); ?><?php } else { ?><?php esc_html_e('Copyright &copy; 2017 yourdomian. All rights reserved.', 'pantograph'); ?><?php } ?></p>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</footer>