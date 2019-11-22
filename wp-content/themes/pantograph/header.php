<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php $favorite_theme_style = get_option( 'favorite_theme_style' ); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Favicon -->
	<?php if ($favorite_theme_style == 'style_old'){ ?>
	<?php if (pantograph_get_option('pantograph_favicon')) { ?>
    <link rel="shortcut icon" href="<?php echo esc_url( pantograph_get_option('pantograph_favicon') ); ?>">
	<?php }else{ ?>
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ).'/img/favicon.ico'; ?>">
	<?php } ?>
	<?php } ?>
	<style>
	<?php
	$page_body_color = '';	
	$page_body_color = get_post_meta(get_the_ID(), 'body_color', true);
	if($page_body_color){
		$body_color = get_post_meta(get_the_ID(), 'body_color', true);
	}else{
		if ($favorite_theme_style == 'style_old'){
		$body_color = pantograph_get_option('blobal_body_color');
		} else {
		$body_color = pionusnews_get_option('blobal_body_color');
		}
	}
	if ($favorite_theme_style == 'style_old'){
	$widgetborder = pantograph_get_option('sidebar_widget_border');
	} else {
	$widgetborder = pionusnews_get_option('sidebar_widget_border'); 
	}
	if($widgetborder==1){ $widgetborder='make-border';}else{$widgetborder='';}
	if ($favorite_theme_style == 'style_old'){
	$title_style = pantograph_get_option('pantograph_title_style'); 
	} else {
	$title_style = pionusnews_get_option('pantograph_title_style'); 
	}
	$title_style_class = 'title_style_'.$title_style;
	$catbgstlye = '';
	if ($favorite_theme_style == 'style_old'){
	if(pantograph_get_option('img_top_cat_bg_style') == '2'){ $catbgstlye = 'catbgstlye1'; }
	if(pantograph_get_option('img_top_cat_bg_style') == '4'){ $catbgstlye = 'catbgstlye3'; }
	}
	?>

	</style>
	<?php wp_head(); ?>
	<script data-ad-client="ca-pub-5028777213996069" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body <?php body_class(array($title_style_class, $widgetborder, $catbgstlye)); $header_color = get_post_meta(get_the_ID(), 'body_color', true);  ?> style="background: <?php echo esc_attr($body_color); ?>">
<?php //Body Background Image
$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	if ($favorite_theme_style == 'style_old'){
	$global_white_conainter = pantograph_get_option('global_white_conainter');
	} else {
	$global_white_conainter = pionusnews_get_option('global_white_conainter');
	}
	$pantograph_body_bg_img = get_post_meta(get_the_ID(), 'pantograph_body_bg_img', true);
	if(($container_bg_white==1) || ($global_white_conainter==1)){
	if($pantograph_body_bg_img){ ?>
	<div class="body-bg-image-div">
		<img class="body-bg-image-style" src="<?php echo esc_url( $pantograph_body_bg_img ); ?>">
	</div>
<?php } } ?>
<div class="wrapper">
	<?php if ($favorite_theme_style == 'style_old'){ ?>
	<?php if(pantograph_get_option('pantograph_header_topbar') == 1) { ?>
	<div class="header_top_block<?php if(pantograph_get_option('pantograph_header_topbar') == 1) { echo " header-top-border"; } ?><?php if(($container_bg_white==1) || ($global_white_conainter==1)){ if($pantograph_body_bg_img){ ?> navstyle-for-bg<?php } } ?>">
	<div class="container">
		<div class="mobile_header_top">
			<span class="topbar-date"><?php echo date_i18n( get_option( 'date_format' ), time() ); ?></span>
		</div>
		<div class="header-top">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="header-top-menubar">
						<ul class="list-inline">
							<li><span class="topbar-date"><?php echo date("l, F j, Y") ?></span></li>
							<?php if(pantograph_get_option('topbar_menu_item1_name') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('topbar_menu_item1_link') ); ?>"><?php echo esc_attr( pantograph_get_option('topbar_menu_item1_name') ); ?></a></li>
							<?php } if(pantograph_get_option('topbar_menu_item2_name') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('topbar_menu_item2_link') ); ?>"><?php echo esc_attr( pantograph_get_option('topbar_menu_item2_name') ); ?></a></li>
							<?php } if(pantograph_get_option('topbar_menu_item3_name') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('topbar_menu_item3_link') ); ?>"><?php echo esc_attr( pantograph_get_option('topbar_menu_item3_name') ); ?></a></li>
							<?php } if(pantograph_get_option('topbar_menu_item4_name') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('topbar_menu_item4_link') ); ?>"><?php echo esc_attr( pantograph_get_option('topbar_menu_item4_name') ); ?></a></li>
							<?php } if(pantograph_get_option('topbar_menu_item5_name') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('topbar_menu_item5_link') ); ?>"><?php echo esc_attr( pantograph_get_option('topbar_menu_item5_name') ); ?></a></li>
							<?php } if(pantograph_get_option('topbar_menu_item6_name') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('topbar_menu_item6_link') ); ?>"><?php echo esc_attr( pantograph_get_option('topbar_menu_item6_name') ); ?></a></li>
							<?php } if(pantograph_get_option('topbar_menu_item7_name') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('topbar_menu_item7_link') ); ?>"><?php echo esc_attr( pantograph_get_option('topbar_menu_item7_name') ); ?></a></li>
							<?php } if(pantograph_get_option('topbar_menu_item8_name') != '') { ?>
							<li><a href="<?php echo esc_url( pantograph_get_option('topbar_menu_item8_link') ); ?>"><?php echo esc_attr( pantograph_get_option('topbar_menu_item8_name') ); ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-5 text-right">
					<div class="header-top-social">
					<?php if(pantograph_get_option('social_facebook') != '') { ?>
						<a href="<?php echo esc_url( pantograph_get_option('social_facebook') ); ?>"><i class="fa fa-facebook"></i></a>
						<?php } if(pantograph_get_option('social_twitter') != '') { ?>
						<a href="<?php echo esc_url( pantograph_get_option('social_twitter') ); ?>"><i class="fa fa-twitter"></i></a>
						<?php } if(pantograph_get_option('social_googleplus') != '') { ?>
						<a href="<?php echo esc_url( pantograph_get_option('social_googleplus') ); ?>"><i class="fa fa-google-plus"></i></a>
						<?php } if(pantograph_get_option('social_utube') != '') { ?>
						<a href="<?php echo esc_url( pantograph_get_option('social_utube') ); ?>"><i class="fa fa-youtube"></i></a>
						<?php } if(pantograph_get_option('social_linkedin') != '') { ?>
						<a href="<?php echo esc_url( pantograph_get_option('social_linkedin') ); ?>"><i class="fa fa-linkedin"></i></a>
						<?php } if(pantograph_get_option('social_instagram') != '') { ?>
						<a href="<?php echo esc_url( pantograph_get_option('social_instagram') ); ?>"><i class="fa fa-instagram"></i></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php } ?>
	<?php } ?>
<?php
$GLOBALS['footer_style'] = get_post_meta(get_the_ID(), 'footer_style', true);
$GLOBALS['container_bg_white'] = get_post_meta(get_the_ID(), 'container_bg_white', true);
$GLOBALS['global_white_conainter'] = get_post_meta(get_the_ID(), 'global_white_conainter', true);
$GLOBALS['pantograph_body_bg_img'] = get_post_meta(get_the_ID(), 'pantograph_body_bg_img', true);
if(is_category()){
	$cat_id = get_query_var('cat');
	$cat_data = get_option("category_$cat_id");
	if(isset($cat_data['header_layout'])){
		$header_layout = $cat_data['header_layout'];
		if( $header_layout == 'default' ) { 
			get_template_part( 'template-parts/header', 'default' );
		}elseif( $header_layout == 1 ) { 	
			get_template_part( 'template-parts/header', 'one' );
		}elseif( $header_layout == 2 ) { 	
			get_template_part( 'template-parts/header', 'two' );
		}elseif( $header_layout == 3 ) { 	
			get_template_part( 'template-parts/header', 'three' );
		}elseif( $header_layout == 4 ) { 	
			get_template_part( 'template-parts/header', 'four' );
		}elseif( $header_layout == 5 ) { 	
			get_template_part( 'template-parts/header', 'five' );
		}elseif( $header_layout == 6 ) { 	
			get_template_part( 'template-parts/header', 'six' );
		}elseif( $header_layout == 7 ) { 	
			get_template_part( 'template-parts/header', 'seven' );	
		}else{
				get_template_part( 'template-parts/header', 'default' ); 
			 }
		
	}else{
			if ($favorite_theme_style == 'style_old'){
			if(pantograph_get_option('pantograph_header_style') == 'default') { 
				get_template_part( 'template-parts/header', 'default' );
			 }elseif(pantograph_get_option('pantograph_header_style') == 1) { 
				get_template_part( 'template-parts/header', 'one' ); 
			 }elseif(pantograph_get_option('pantograph_header_style') == 2){
				 get_template_part( 'template-parts/header', 'two' ); 
			 }elseif(pantograph_get_option('pantograph_header_style') == 3){
				 get_template_part( 'template-parts/header', 'three' ); 
			 }elseif(pantograph_get_option('pantograph_header_style') == 4){
				 get_template_part( 'template-parts/header', 'four' ); 
			 }elseif(pantograph_get_option('pantograph_header_style') == 5){
				 get_template_part( 'template-parts/header', 'five' ); 
			 }elseif(pantograph_get_option('pantograph_header_style') == 6){
				 get_template_part( 'template-parts/header', 'six' ); 
			 }elseif(pantograph_get_option('pantograph_header_style') == 7){
				 get_template_part( 'template-parts/header', 'seven' );
			 }else{
				get_template_part( 'template-parts/header', 'default' ); 
			 }
			 }
		}
}else{
if ($favorite_theme_style == 'style_old'){
$header_styles = get_post_meta(get_the_ID(), 'header_key', true); 
if( $header_styles == 'style_default' ) { 
	get_template_part( 'template-parts/header', 'default' );
}elseif( $header_styles == 'style_one' ) { 	
	get_template_part( 'template-parts/header', 'one' );
}elseif( $header_styles == 'style_two' ) { 	
	get_template_part( 'template-parts/header', 'two' );
}elseif( $header_styles == 'style_three' ) { 	
	get_template_part( 'template-parts/header', 'three' );
}elseif( $header_styles == 'style_four' ) { 	
	get_template_part( 'template-parts/header', 'four' );
}elseif( $header_styles == 'style_five' ) { 	
	get_template_part( 'template-parts/header', 'five' );
}elseif( $header_styles == 'style_six' ) { 	
	get_template_part( 'template-parts/header', 'six' );
}elseif( $header_styles == 'style_seven' ) { 	
	get_template_part( 'template-parts/header', 'seven' );	
}else{

if(pantograph_get_option('pantograph_header_style') == 'default') { 
	get_template_part( 'template-parts/header', 'default' );
 }elseif(pantograph_get_option('pantograph_header_style') == 1) { 
	get_template_part( 'template-parts/header', 'one' ); 
 }elseif(pantograph_get_option('pantograph_header_style') == 2){
	 get_template_part( 'template-parts/header', 'two' ); 
 }elseif(pantograph_get_option('pantograph_header_style') == 3){
	 get_template_part( 'template-parts/header', 'three' ); 
 }elseif(pantograph_get_option('pantograph_header_style') == 4){
	 get_template_part( 'template-parts/header', 'four' ); 
 }elseif(pantograph_get_option('pantograph_header_style') == 5){
	 get_template_part( 'template-parts/header', 'five' ); 
 }elseif(pantograph_get_option('pantograph_header_style') == 6){
	 get_template_part( 'template-parts/header', 'six' );
 }elseif(pantograph_get_option('pantograph_header_style') == 7){
	 get_template_part( 'template-parts/header', 'seven' ); 
 }else{
	get_template_part( 'template-parts/header', 'default' ); 
 } 
 }
}
}
 ?>
 <?php
if(is_category() || is_single() || is_archive()){  
if ($favorite_theme_style == 'style_old'){
 if(pantograph_get_option('breaking_news_on_off') == 1) { 
 ?>
<div class="container">
  <div class="row">
	  <div class="breaking-news-area">
		 <div class="col-xs-12 col-sm-3 col-md-2">
			<div class="br-title"><b><?php echo esc_html_e('Breaking News', 'pantograph'); ?></b> </div>
		 </div>
		 <div class="col-xs-12 col-sm-9 col-md-10">
			<div class="newsticker js-newsticker">
				<ul class="js-frame">
				<?php
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 10));
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
<?php } ?>
