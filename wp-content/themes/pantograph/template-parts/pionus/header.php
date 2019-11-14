<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Favicon -->
	<?php if (pionusnews_get_option('pionusnews_favicon')) { ?>
    <link rel="shortcut icon" href="<?php echo esc_url( pionusnews_get_option('pionusnews_favicon') ); ?>">
	<?php }else{ ?>
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/favicon.png'; ?>">
	<?php } ?>
	<?php
	$page_body_color = '';	
	$page_body_color = get_post_meta(get_the_ID(), 'body_color', true);
	if($page_body_color){
		$body_color = get_post_meta(get_the_ID(), 'body_color', true);
	}else{
		$body_color = pionusnews_get_option('blobal_body_color');
	}
	$widgetborder = pionusnews_get_option('sidebar_widget_border');
	if($widgetborder==1){ $widgetborder='make-border';}else{$widgetborder='';}
	$pionus_signup_form = pionusnews_get_option('pionus_signup_form'); 
	$title_style = pionusnews_get_option('pionusnews_title_style'); 
	$title_style_class = 'title_style_'.$title_style;
	$catbgstlye = '';
	if(pionusnews_get_option('img_top_cat_bg_style') == '1'){
	$catbgstlye = 'catbgstlye3';
	} elseif(pionusnews_get_option('img_top_cat_bg_style') == '2'){
	$catbgstlye = 'catbgstlye1';
	} else {
	$catbgstlye = 'catbgstlye3';
	}
	if ( pionus_has_pagination() ) {
	$pionus_has_pagination = 'has_pagination';
	} else {
	$pionus_has_pagination = '';
	}
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(array($title_style_class, $widgetborder, $catbgstlye, $pionus_has_pagination)); $header_color = get_post_meta(get_the_ID(), 'body_color', true);  ?> style="background: <?php echo esc_attr($body_color); ?>">
<?php //Body Background Image
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$global_white_conainter = pionusnews_get_option('global_white_conainter');
	$pionusnews_body_bg_img_to = pionusnews_get_option('pionusnews_body_bg_img_to');
	$pionusnews_body_bg_img = get_post_meta(get_the_ID(), 'pionusnews_body_bg_img', true);
	if(($container_bg_white==1) || ($global_white_conainter==1)){
	if(($pionusnews_body_bg_img) && ($pionusnews_body_bg_img_to)){ ?>
	<div class="body-bg-image-div">
		<img class="body-bg-image-style" src="<?php echo esc_url( $pionusnews_body_bg_img ); ?>">
	</div>
<?php } elseif((!$pionusnews_body_bg_img) && ($pionusnews_body_bg_img_to)){ ?>
	<div class="body-bg-image-div">
		<img class="body-bg-image-style" src="<?php echo esc_url( $pionusnews_body_bg_img_to ); ?>">
	</div>
<?php } elseif((!$pionusnews_body_bg_img_to) && ($pionusnews_body_bg_img)){ ?>
	<div class="body-bg-image-div">
		<img class="body-bg-image-style" src="<?php echo esc_url( $pionusnews_body_bg_img ); ?>">
	</div>
<?php } elseif((!$pionusnews_body_bg_img_to) && (!$pionusnews_body_bg_img)){ ?>
<?php } ?>
<?php } ?>
<div class="wrapper">
	<?php if(pionusnews_get_option('pionusnews_header_topbar') == 1) { ?>
	<div class="header_top_block<?php if(pionusnews_get_option('pionusnews_header_topbar') == 1) { echo " header-top-border"; } ?><?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if(($pionusnews_body_bg_img) || ($pionusnews_body_bg_img_to)){ ?> navstyle-for-bg<?php } } ?>">
	<div class="container">
		<div class="mobile_header_top">
			<span class="topbar-date"><?php echo date_i18n( get_option( 'date_format' ), time() ); ?></span>
			<!-- Start for sign in and sign up   -->
			<?php if(pionusnews_get_option('pionus_signup_form') == 1) { ?>
			<a href="#" class="pantograph-login login-pantograph"><?php esc_html_e( 'Sign in / Join', 'pantograph'); ?></a>
			<?php } ?>
			<!-- End for sign in and sign up   -->
		</div>
		<div class="header-top">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="header-top-menubar">
						<ul class="list-inline">
							<li><span class="topbar-date"><?php echo date_i18n( get_option( 'date_format' ), time() ); ?></span></li>
							<?php if(pionusnews_get_option('pionus_signup_form') == 1) { ?>
							<?php
							/* Start for sign in and sign up */
							if ( is_user_logged_in() ) {	
							?>
							<li><a class="pantograph-login" href="<?php echo ''.home_url().'/edit-profile'; ?>"><?php esc_html_e('Profile', 'pantograph'); ?></a></li>
							<li><a class="pantograph-login" href="<?php echo wp_logout_url( home_url() ); ?>"><?php esc_html_e('Sign out', 'pantograph'); ?></a></li>
							<?php }else{ ?>
							<li><a href="#" class="pantograph-login login-pantograph"><?php esc_html_e('Sign in / Join', 'pantograph'); ?></a></li>
							<?php } 
							/* End for sign in and sign up */
							}
							?>
							<?php if(pionusnews_get_option('topbar_menu_item1_name') != '') { ?>
							<li><a href="<?php echo esc_url( pionusnews_get_option('topbar_menu_item1_link') ); ?>"><?php echo esc_attr( pionusnews_get_option('topbar_menu_item1_name') ); ?></a></li>
							<?php } if(pionusnews_get_option('topbar_menu_item2_name') != '') { ?>
							<li><a href="<?php echo esc_url( pionusnews_get_option('topbar_menu_item2_link') ); ?>"><?php echo esc_attr( pionusnews_get_option('topbar_menu_item2_name') ); ?></a></li>
							<?php } if(pionusnews_get_option('topbar_menu_item3_name') != '') { ?>
							<li><a href="<?php echo esc_url( pionusnews_get_option('topbar_menu_item3_link') ); ?>"><?php echo esc_attr( pionusnews_get_option('topbar_menu_item3_name') ); ?></a></li>
							<?php } if(pionusnews_get_option('topbar_menu_item4_name') != '') { ?>
							<li><a href="<?php echo esc_url( pionusnews_get_option('topbar_menu_item4_link') ); ?>"><?php echo esc_attr( pionusnews_get_option('topbar_menu_item4_name') ); ?></a></li>
							<?php } if(pionusnews_get_option('topbar_menu_item5_name') != '') { ?>
							<li><a href="<?php echo esc_url( pionusnews_get_option('topbar_menu_item5_link') ); ?>"><?php echo esc_attr( pionusnews_get_option('topbar_menu_item5_name') ); ?></a></li>
							<?php } if(pionusnews_get_option('topbar_menu_item6_name') != '') { ?>
							<li><a href="<?php echo esc_url( pionusnews_get_option('topbar_menu_item6_link') ); ?>"><?php echo esc_attr( pionusnews_get_option('topbar_menu_item6_name') ); ?></a></li>
							<?php } if(pionusnews_get_option('topbar_menu_item7_name') != '') { ?>
							<li><a href="<?php echo esc_url( pionusnews_get_option('topbar_menu_item7_link') ); ?>"><?php echo esc_attr( pionusnews_get_option('topbar_menu_item7_name') ); ?></a></li>
							<?php } if(pionusnews_get_option('topbar_menu_item8_name') != '') { ?>
							<li><a href="<?php echo esc_url( pionusnews_get_option('topbar_menu_item8_link') ); ?>"><?php echo esc_attr( pionusnews_get_option('topbar_menu_item8_name') ); ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-5 text-right">
					<div class="header-top-social">
					<?php if(pionusnews_get_option('topbar_social_on_off') == 1) { ?>
					<?php if(pionusnews_get_option('social_facebook') != '') { ?>
						<a href="<?php echo esc_url( pionusnews_get_option('social_facebook') ); ?>"><i class="fab fa-facebook-f"></i></a>
						<?php } if(pionusnews_get_option('social_twitter') != '') { ?>
						<a href="<?php echo esc_url( pionusnews_get_option('social_twitter') ); ?>"><i class="fab fa-twitter"></i></a>
						<?php } if(pionusnews_get_option('social_googleplus') != '') { ?>
						<a href="<?php echo esc_url( pionusnews_get_option('social_googleplus') ); ?>"><i class="fab fa-google-plus-g"></i></a>
						<?php } if(pionusnews_get_option('social_utube') != '') { ?>
						<a href="<?php echo esc_url( pionusnews_get_option('social_utube') ); ?>"><i class="fab fa-youtube"></i></a>
						<?php } if(pionusnews_get_option('social_linkedin') != '') { ?>
						<a href="<?php echo esc_url( pionusnews_get_option('social_linkedin') ); ?>"><i class="fab fa-linkedin-in"></i></a>
						<?php } if(pionusnews_get_option('social_instagram') != '') { ?>
						<a href="<?php echo esc_url( pionusnews_get_option('social_instagram') ); ?>"><i class="fab fa-instagram"></i></a>
						<?php } ?>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php } ?>
<?php
$GLOBALS['footer_style'] = get_post_meta(get_the_ID(), 'footer_style', true);
$GLOBALS['footer_columns_meta'] = get_post_meta(get_the_ID(), 'footer_columns_meta', true);
$GLOBALS['container_bg_white'] = get_post_meta(get_the_ID(), 'container_bg_white', true);
$GLOBALS['global_white_conainter'] = pionusnews_get_option('global_white_conainter');
$GLOBALS['pionusnews_body_bg_img_to'] = pionusnews_get_option('pionusnews_body_bg_img_to');
$GLOBALS['pionusnews_body_bg_img'] = get_post_meta(get_the_ID(), 'pionusnews_body_bg_img', true);
$GLOBALS['pionusnews_footer_top_mg'] = get_post_meta(get_the_ID(), 'pionusnews_footer_top_mg', true);
if(is_category()){
	$cat_id = get_query_var('cat');
	$cat_data = get_option("category_$cat_id");
	if(isset($cat_data['header_layout'])){
		$header_layout = $cat_data['header_layout'];
		if( $header_layout == 'default' ) { 
			get_template_part( 'template-parts/pionus/template-parts/header', 'default' );
		}elseif( $header_layout == 1 ) { 	
			get_template_part( 'template-parts/pionus/template-parts/header', 'one' );
		}elseif( $header_layout == 2 ) { 	
			get_template_part( 'template-parts/pionus/template-parts/header', 'two' );
		}elseif( $header_layout == 3 ) { 	
			get_template_part( 'template-parts/pionus/template-parts/header', 'three' );
		}elseif( $header_layout == 4 ) { 	
			get_template_part( 'template-parts/pionus/template-parts/header', 'four' );
		}elseif( $header_layout == 5 ) { 	
			get_template_part( 'template-parts/pionus/template-parts/header', 'five' );
		}elseif( $header_layout == 6 ) { 	
			get_template_part( 'template-parts/pionus/template-parts/header', 'six' );
		}elseif( $header_layout == 7 ) { 	
			get_template_part( 'template-parts/pionus/template-parts/header', 'seven' );	
		}elseif( $header_layout == 8 ) { 	
			get_template_part( 'template-parts/pionus/template-parts/header', 'seven' );
		}else{
				get_template_part( 'template-parts/pionus/template-parts/header', 'default' ); 
			 }
		
	}else{
			if(pionusnews_get_option('pionusnews_header_style') == 'default') { 
				get_template_part( 'template-parts/pionus/template-parts/header', 'default' );
			 }elseif(pionusnews_get_option('pionusnews_header_style') == 1) { 
				get_template_part( 'template-parts/pionus/template-parts/header', 'one' ); 
			 }elseif(pionusnews_get_option('pionusnews_header_style') == 2){
				 get_template_part( 'template-parts/pionus/template-parts/header', 'two' ); 
			 }elseif(pionusnews_get_option('pionusnews_header_style') == 3){
				 get_template_part( 'template-parts/pionus/template-parts/header', 'three' ); 
			 }elseif(pionusnews_get_option('pionusnews_header_style') == 4){
				 get_template_part( 'template-parts/pionus/template-parts/header', 'four' ); 
			 }elseif(pionusnews_get_option('pionusnews_header_style') == 5){
				 get_template_part( 'template-parts/pionus/template-parts/header', 'five' ); 
			 }elseif(pionusnews_get_option('pionusnews_header_style') == 6){
				 get_template_part( 'template-parts/pionus/template-parts/header', 'six' ); 
			 }elseif(pionusnews_get_option('pionusnews_header_style') == 7){
				 get_template_part( 'template-parts/pionus/template-parts/header', 'seven' );
			 }elseif(pionusnews_get_option('pionusnews_header_style') == 8){
				 get_template_part( 'template-parts/pionus/template-parts/header', 'seven' );
			 }else{
				get_template_part( 'template-parts/pionus/template-parts/header', 'default' ); 
			 }
		}
}else{
$header_styles = get_post_meta(get_the_ID(), 'header_key', true); 
if( $header_styles == 'style_default' ) { 
	get_template_part( 'template-parts/pionus/template-parts/header', 'default' );
}elseif( $header_styles == 'style_one' ) { 	
	get_template_part( 'template-parts/pionus/template-parts/header', 'one' );
}elseif( $header_styles == 'style_two' ) { 	
	get_template_part( 'template-parts/pionus/template-parts/header', 'two' );
}elseif( $header_styles == 'style_three' ) { 	
	get_template_part( 'template-parts/pionus/template-parts/header', 'three' );
}elseif( $header_styles == 'style_four' ) { 	
	get_template_part( 'template-parts/pionus/template-parts/header', 'four' );
}elseif( $header_styles == 'style_five' ) { 	
	get_template_part( 'template-parts/pionus/template-parts/header', 'five' );
}elseif( $header_styles == 'style_six' ) { 	
	get_template_part( 'template-parts/pionus/template-parts/header', 'six' );
}elseif( $header_styles == 'style_seven' ) { 	
	get_template_part( 'template-parts/pionus/template-parts/header', 'seven' );	
}elseif( $header_styles == 'style_eight' ) { 	
	get_template_part( 'template-parts/pionus/template-parts/header', 'seven' );	
}else{
if(pionusnews_get_option('pionusnews_header_style') == 'default') { 
	get_template_part( 'template-parts/pionus/template-parts/header', 'default' );
 }elseif(pionusnews_get_option('pionusnews_header_style') == 1) { 
	get_template_part( 'template-parts/pionus/template-parts/header', 'one' ); 
 }elseif(pionusnews_get_option('pionusnews_header_style') == 2){
	 get_template_part( 'template-parts/pionus/template-parts/header', 'two' ); 
 }elseif(pionusnews_get_option('pionusnews_header_style') == 3){
	 get_template_part( 'template-parts/pionus/template-parts/header', 'three' ); 
 }elseif(pionusnews_get_option('pionusnews_header_style') == 4){
	 get_template_part( 'template-parts/pionus/template-parts/header', 'four' ); 
 }elseif(pionusnews_get_option('pionusnews_header_style') == 5){
	 get_template_part( 'template-parts/pionus/template-parts/header', 'five' ); 
 }elseif(pionusnews_get_option('pionusnews_header_style') == 6){
	 get_template_part( 'template-parts/pionus/template-parts/header', 'six' );
 }elseif(pionusnews_get_option('pionusnews_header_style') == 7){
	 get_template_part( 'template-parts/pionus/template-parts/header', 'seven' ); 
 }elseif(pionusnews_get_option('pionusnews_header_style') == 8){
	 get_template_part( 'template-parts/pionus/template-parts/header', 'seven' ); 
 }else{
	get_template_part( 'template-parts/pionus/template-parts/header', 'default' ); 
 } 
}
}
 ?>
 <?php
if(is_category() || is_single() || is_archive() || is_page_template('blog-templates/blog-one-column-standard.php')
|| is_page_template('blog-templates/blog-classic-layout.php')
|| is_page_template('blog-templates/blog-grid-layout.php')
|| is_page_template('blog-templates/blog-grid-layout-three.php')
|| is_page_template('blog-templates/blog-one-column-standard.php')
|| is_page_template('blog-templates/blog-grid-layout-two.php')
|| is_page_template('blog-templates/blog-grid-layout-four.php')
|| is_page_template('blog-templates/blog-one-column-transparent.php')
|| is_page_template('blog-templates/blog-photo-layout.php')
|| is_page_template('blog-templates/blog-photo-layout-alt.php')
|| is_page_template('blog-templates/blog-pinterest-layout.php')
|| is_page_template('blog-templates/blog-pinterest-layout-alt.php')
|| is_page_template('blog-templates/blog-small-photo.php')
|| is_page_template('blog-templates/blog-two-columns-standard.php')){ 
 if(pionusnews_get_option('breaking_news_on_off') == 1) { 
 ?>
<div class="container">
  <div class="row">
	  <div class="breaking-news-area">
		 <div class="col-xs-12 col-sm-3 col-md-2">
			<div class="br-title"><b><?php echo esc_attr( pionusnews_get_option('breaking_news_title') ); ?></b> </div>
		 </div>
		 <div class="col-xs-12 col-sm-9 col-md-10 desktoppadding">
			<div class="newsticker js-newsticker desktopmargin">
				<ul class="js-frame">
				<?php
				$catid = pionusnews_get_option('breaking_news_cat');
				if ($catid == ''){
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => -1));
				} else {
				$the_query = new WP_Query( array('post_type' => 'post', 'cat' => $catid, 'posts_per_page' => -1));
				}
				while ($the_query->have_posts()) : $the_query->the_post();
				?>
					<li class="js-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php 
				endwhile;
				wp_reset_postdata();
				?>
				</ul>
			</div> 
		 </div> 	
		</div>
	</div>
</div> 
<?php } } ?>

<?php
$pionusnews_mobile_menu_style = pionusnews_get_option('pionusnews_mobile_menu_style');
$mobile_menu_background_img = pionusnews_get_option('mobile_menu_background_img');
if(($pionusnews_mobile_menu_style==2) || (pionusnews_get_option('browse_all_on_off') == 0)){
?>
<style>
<?php if($mobile_menu_background_img){ ?>
.mobilemenu-bar {
	background-image: url(<?php echo esc_url( pionusnews_get_option('mobile_menu_background_img') ); ?>);
}
<?php }else{ ?>
.mobilemenu-bar {
	background-image: url(<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/mobile-menubg.png'; ?>);
}
<?php } ?>
</style>
<header class="header header2 mobilemenuarea">
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="search-bar">
					<form method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					  <input type="text" placeholder="<?php esc_attr_e('Type search text here...', 'pantograph'); ?>" class="form-control" name="s">
					</form>
				<div class="search-close"><i class="fa fa-times"></i></div>
			</div>
			<div class="mobilemenu-bar">
				<!--<div class="overlay overlay-02"></div>-->
				<div class="navbar-social">
					<?php if(pionusnews_get_option('social_facebook') != '') { ?>
					  <a href="<?php echo esc_url( pionusnews_get_option('social_facebook') ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/1.png'; ?>" alt="<?php esc_attr_e( 'Facebook', 'pantograph'); ?>"/></a>
					  <?php } if(pionusnews_get_option('social_twitter') != '') { ?>
					  <a href="<?php echo esc_url( pionusnews_get_option('social_twitter') ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/2.png'; ?>" alt="<?php esc_attr_e( 'Twitter', 'pantograph'); ?>"/></a>
					  <?php } if(pionusnews_get_option('social_googleplus') != '') { ?>
					  <a href="<?php echo esc_url( pionusnews_get_option('social_googleplus') ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/3.png'; ?>" alt="<?php esc_attr_e( 'Google+', 'pantograph'); ?>"/></a>
					  <?php } if(pionusnews_get_option('social_instagram') != '') { ?>
					  <a href="<?php echo esc_url( pionusnews_get_option('social_instagram') ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/4.png'; ?>" alt="<?php esc_attr_e( 'Instagram', 'pantograph'); ?>"/></a>
					  <?php } if(pionusnews_get_option('social_utube') != '') { ?>
					  <a href="<?php echo esc_url( pionusnews_get_option('social_utube') ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/5.png'; ?>" alt="<?php esc_attr_e( 'Youtube', 'pantograph'); ?>"/></a>
					<?php } if(pionusnews_get_option('social_linkedin') != '') { ?>
					  <a target="_blank" href="<?php echo esc_url( pionusnews_get_option('social_linkedin') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/social/6.png'; ?>" alt="<?php esc_attr_e( 'Linkedin', 'pantograph'); ?>"/></a>
					<?php } ?>
				</div>
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
						'walker'        => new pionusnews_walker_nav_menu_for_mobile
					) );
					}
				?>
					
				<div class="mobilemenu-close"><i class="fa fa-times"></i></div>
			</div>
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="mobilemenu-header">
				<button type="button" class="navbar-toggle mobilemenu-trigger">
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
				  <a class="navbar-brand img-responsive" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/logo-blue.png'; ?>" alt="<?php esc_attr_e( 'Logo', 'pantograph'); ?>"/></a>
				  <?php } ?>
				  <?php endif; ?>
				<div class="search-trigger pull-right"></div>
			</div>
		</div>
	</nav>
</header>
<?php } ?>
<?php if(pionusnews_get_option('pionus_signup_form') == 1) { ?>
<!-- Login popup form -->
<div class="panel-pop" id="login-pantograph">
    <h2 id="login-title"><?php esc_html_e( 'Sign in', 'pantograph'); ?><i class="fa fa-times" aria-hidden="true"></i></h2>
    <h2 id="signup-title"><?php esc_html_e( 'Sign up', 'pantograph'); ?><i class="fa fa-times" aria-hidden="true"></i></h2>
    <div class="form-style login-form-area">
        <div class="ask_form inputs">
            <form class="login-form ask_login" action="<?php echo esc_url(home_url('/'))?>" method="post">
                <div class="ask_error"></div>
                <div class="form-inputs clearfix">
                    <p class="login-text">
                        <input class="required-item" type="text" value="Username" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}" name="log">
                    </p>
                    <p class="login-password">
                        <input class="required-item" type="password" value="Password" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}" name="pwd">
                    </p>
                </div>
                <p class="form-submit login-submit"> <span class="loader_2"></span>
                    <input type="submit" value="<?php esc_html_e('Sign In', 'pantograph'); ?>" class="btn">    
                    <input type="button" value="<?php esc_html_e('Sign Up', 'pantograph'); ?>" id="show-signup" class="right-float btn">
                </p>
                <div class="rememberme">
                    <label><input type="checkbox" name="rememberme"> <?php esc_html_e('Remember Me', 'pantograph'); ?></label>
                </div>
                <input type="hidden" name="redirect_to" value="<?php echo esc_url(pantograph_globalwpf()); ?>">
                <input type="hidden" name="login_nonce" value="<?php echo wp_create_nonce("ask-login-action"); ?>">
                <input type="hidden" name="ajax_url" value="<?php echo admin_url('admin-ajax.php'); ?>">
                <input type="hidden" name="form_type" value="ask-login">
                <div class="errorlogin"></div>
            </form>
        </div>
    </div>

	<div class="form-style sign-up-form">
	    <form method="post" class="signup_form ask_form" id="register">
	        <div class="ask_error"></div>
	        <div class="form-inputs clearfix">
	            <p>
	                <label for="user_name_680" class="required"><?php esc_html_e('Username', 'pantograph'); ?><span>*</span></label>
	                <input type="text" class="required-item" name="user_name" id="user_name_680" value="" required="required">
	            </p>
	            <p>
	                <label for="email_680" class="required"><?php esc_html_e('E-Mail', 'pantograph'); ?><span>*</span></label>
	                <input type="email" class="required-item" name="email" id="email_680" value="" required="required">
	            </p>
	            <p>
	                <label for="pass1_680" class="required"><?php esc_html_e('Password', 'pantograph'); ?><span>*</span></label>
	                <input type="password" class="required-item" name="pass1" id="pass1_680" autocomplete="off" required="required">
	            </p>
	            <p>
	                <label for="pass2_680" class="required"><?php esc_html_e('Confirm Password', 'pantograph'); ?><span>*</span></label>
	                <input type="password" class="required-item" name="pass2" id="pass2_680" autocomplete="off" required="required">
	            </p>
	        </div>
	        <p></p>
	        <p class="form-submit">
    			<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?> 
	            <input type="hidden" name="redirect_to" value="<?php echo esc_url(pantograph_globalwpf()); ?>">
	            <input type="hidden" name="ajax_url" value="<?php echo admin_url('admin-ajax.php'); ?>"
	            <input type="hidden" name="form_type" value="ask-signup">
	            <input type="submit" name="register" value="<?php esc_html_e('Signup', 'pantograph'); ?>" class="btn signup-btn">
	            <input type="button" name="cancel" value="<?php esc_html_e('Cancel', 'pantograph'); ?>" id="signup-cancel" class="btn right-float">
	        </p>
	    </form>
	</div>

</div>
<?php } ?>
<!-- End Login popup form -->