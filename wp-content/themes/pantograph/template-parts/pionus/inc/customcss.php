<?php
function pionusnews_styles_custom() {
	$pionusnews_header_radio_buttons = get_post_meta(get_the_ID(), 'header_key', true);
	$pionusnews_header_style = pionusnews_get_option('pionusnews_header_style');
	$search_bg_color = pionusnews_get_option('search_bg_color');
	$home_container_width = pionusnews_get_option('pionus_home_container_width');
	$container_width = pionusnews_get_option('pionus_container_width');
	if($home_container_width==''){
		$pionus_home_container_width = '1200px';
	}else{
		$pionus_home_container_width = $home_container_width;
	}
	if($container_width==''){
		$pionus_container_width = '1200px';
	}else{
		$pionus_container_width = $container_width;
	}
	$custom_color = pionusnews_get_option('custom_color');
	if($custom_color==''){
		$global_color = '#F26262';
	}else{
		$global_color = pionusnews_get_option('custom_color');
	}
	$menu_bg_for_4_5_color = pionusnews_get_option('menu_bg_for_4_5');
	if($menu_bg_for_4_5_color==''){
		$menu_bg_for_4_5 = '#00456E';
	}else{
		$menu_bg_for_4_5 = pionusnews_get_option('menu_bg_for_4_5');
	}
	$menu_link_custom_color = pionusnews_get_option('menu_link_color');
	if($menu_link_custom_color==''){
		$menu_link_color = '#fff';
	}else{
		$menu_link_color = pionusnews_get_option('menu_link_color');
	}
	$footer_border_colors = pionusnews_get_option('footer_border_colors');
	$footer_link_colors = pionusnews_get_option('footer_link_colors');
	$footer_title_colors = pionusnews_get_option('footer_title_colors');
	$footer_bottom_text_colors = pionusnews_get_option('footer_bottom_text_colors');
	$footer_button_colors = pionusnews_get_option('footer_button_colors');
	$footer_search_text_color = pionusnews_get_option('footer_search_text_color');
	$footer_socialicons_colors = pionusnews_get_option('footer_socialicons_colors');
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$breaking_news_on_off = pionusnews_get_option('breaking_news_on_off');
	$pionusnews_on_breadcrumbs = pionusnews_get_option('pionusnews_on_breadcrumbs');
	$global_white_conainter = pionusnews_get_option('global_white_conainter');
	$custom_meta_hover_color = pionusnews_get_option('meta_hover_color');
	if($custom_meta_hover_color==''){
		$meta_hover_color = '#F26262';
	}else{
		$meta_hover_color = $custom_meta_hover_color;
	}
	$pionusnews_logo_top_padding_custom = pionusnews_get_option('pionusnews_logo_top_padding');
	$pionusnews_logo_bottom_padding_custom = pionusnews_get_option('pionusnews_logo_bottom_padding');
	$pionusnews_logo_left_padding_custom = pionusnews_get_option('pionusnews_logo_left_padding');
	$pionusnews_logo_right_padding_custom = pionusnews_get_option('pionusnews_logo_right_padding');
	$pionusnews_logo_max_width_custom = pionusnews_get_option('pionusnews_logo_max_width');
	if($pionusnews_logo_top_padding_custom==''){
		$pionusnews_logo_top_padding = '15px';
	}else{
		$pionusnews_logo_top_padding = $pionusnews_logo_top_padding_custom;
	} if($pionusnews_logo_bottom_padding_custom==''){
		$pionusnews_logo_bottom_padding = '15px';
	}else{
		$pionusnews_logo_bottom_padding = $pionusnews_logo_bottom_padding_custom;
	} if($pionusnews_logo_left_padding_custom==''){
		$pionusnews_logo_left_padding = '15px';
	}else{
		$pionusnews_logo_left_padding = $pionusnews_logo_left_padding_custom;
	} if($pionusnews_logo_right_padding_custom==''){
		$pionusnews_logo_right_padding = '15px';
	}else{
		$pionusnews_logo_right_padding = $pionusnews_logo_right_padding_custom;
	} if($pionusnews_logo_max_width_custom==''){
		$pionusnews_logo_max_width = '285px';
	}else{
		$pionusnews_logo_max_width = $pionusnews_logo_max_width_custom;
	}
	$pionusnews_menu_fontfamily_custom = pionusnews_get_option('pionusnews_menu_fontfamily');
	$pionusnews_menu_fontweight_custom = pionusnews_get_option('pionusnews_menu_fontweight');
	$pionusnews_menu_fontsize_custom = pionusnews_get_option('pionusnews_menu_fontsize');
	$pionusnews_menu_uppercase_custom = pionusnews_get_option('pionusnews_menu_uppercase');
	if($pionusnews_menu_fontfamily_custom==''){
		$pionusnews_menu_fontfamily = 'Roboto';
	}else{
		$pionusnews_menu_fontfamily = $pionusnews_menu_fontfamily_custom;
	} if($pionusnews_menu_fontweight_custom==''){
		$pionusnews_menu_fontweight = '500';
	}else{
		$pionusnews_menu_fontweight = $pionusnews_menu_fontweight_custom;
	} if($pionusnews_menu_fontsize_custom==''){
		$pionusnews_menu_fontsize = '13px';
	}else{
		$pionusnews_menu_fontsize = $pionusnews_menu_fontsize_custom;
	} if($pionusnews_menu_uppercase_custom==1){
		$pionusnews_menu_uppercase = 'uppercase';
	}elseif($pionusnews_menu_uppercase_custom==2){
		$pionusnews_menu_uppercase = 'lowercase';
	}elseif($pionusnews_menu_uppercase_custom==3){
		$pionusnews_menu_uppercase = 'capitalize';
	}elseif($pionusnews_menu_uppercase_custom==4){
		$pionusnews_menu_uppercase = 'none';
	}
	//h1,h2,h3,h4,h5,h6 custom styles
	$pionusnews_post_h6_size = pionusnews_get_option('pionusnews_post_h6_size');
	$pionusnews_post_h6_height = pionusnews_get_option('pionusnews_post_h6_height');
	$pionusnews_post_h6_weight = pionusnews_get_option('pionusnews_post_h6_weight');
	$pionusnews_post_h6_fontfamily = pionusnews_get_option('pionusnews_post_h6_fontfamily');
	$pionusnews_post_h5_size = pionusnews_get_option('pionusnews_post_h5_size');
	$pionusnews_post_h5_height = pionusnews_get_option('pionusnews_post_h5_height');
	$pionusnews_post_h5_weight = pionusnews_get_option('pionusnews_post_h5_weight');
	$pionusnews_post_h5_fontfamily = pionusnews_get_option('pionusnews_post_h5_fontfamily');
	$pionusnews_post_h4_size = pionusnews_get_option('pionusnews_post_h4_size');
	$pionusnews_post_h4_height = pionusnews_get_option('pionusnews_post_h4_height');
	$pionusnews_post_h4_weight = pionusnews_get_option('pionusnews_post_h4_weight');
	$pionusnews_post_h4_fontfamily = pionusnews_get_option('pionusnews_post_h4_fontfamily');
	$pionusnews_post_h3_size = pionusnews_get_option('pionusnews_post_h3_size');
	$pionusnews_post_h3_height = pionusnews_get_option('pionusnews_post_h3_height');
	$pionusnews_post_h3_weight = pionusnews_get_option('pionusnews_post_h3_weight');
	$pionusnews_post_h3_fontfamily = pionusnews_get_option('pionusnews_post_h3_fontfamily');
	$pionusnews_post_h2_size = pionusnews_get_option('pionusnews_post_h2_size');
	$pionusnews_post_h2_height = pionusnews_get_option('pionusnews_post_h2_height');
	$pionusnews_post_h2_weight = pionusnews_get_option('pionusnews_post_h2_weight');
	$pionusnews_post_h2_fontfamily = pionusnews_get_option('pionusnews_post_h2_fontfamily');
	$pionusnews_post_h1_size = pionusnews_get_option('pionusnews_post_h1_size');
	$pionusnews_post_h1_height = pionusnews_get_option('pionusnews_post_h1_height');
	$pionusnews_post_h1_weight = pionusnews_get_option('pionusnews_post_h1_weight');
	$pionusnews_post_h1_fontfamily = pionusnews_get_option('pionusnews_post_h1_fontfamily');
	
	$pionusnews_header_bottom_pd = get_post_meta(get_the_ID(), 'pionusnews_header_bottom_pd', true);
	$pionusnews_rmore_button_style = pionusnews_get_option('pionusnews_rmore_button_style');
	$pionusnews_lmore_button_style = pionusnews_get_option('pionusnews_lmore_button_style');
	
	$dropdown_bg_color = pionusnews_get_option('dropdown_bg_color');
	$dropdown_font_color = pionusnews_get_option('dropdown_font_color');
	
	$pionusnews_remove_cat_home = pionusnews_get_option('pionusnews_remove_cat_home');
	$pionusnews_remove_cat_global = pionusnews_get_option('pionusnews_remove_cat_global');
?>
<!-- Custom CSS Codes
========================================================= -->
<style id="custom-style">
.container {
	max-width: <?php echo esc_attr($pionus_container_width); ?>;
}
body.home .container {
	max-width: <?php echo esc_attr($pionus_home_container_width); ?>;
}
<?php $pionus_container_width_first_four = substr($pionus_container_width, 0, 4);
$pionus_home_container_width_first_four = substr($pionus_home_container_width, 0, 4);
if (($pionus_container_width_first_four < "1080") || ($pionus_home_container_width_first_four < "1080")){?>
.generalstyle, .beforegeneralstyle{
	height: 165px;
}
.thumbnail148, .beforethumbnail148{
	height: 115px;
}
.thumbnail, .beforethumbnail{
	height: 65px;
}
.anotherstyle5, .beforeanotherstyle5{
	height: 200px;
}
.beforethumbnail477{
	height: 345px;
}
.side-social a {
    height: 100px;
    padding: 10px 0 5px 0;
}
.side-social a i {
    margin: 0 0 7px;
}
.post-excerpt h4, .post-excerpt h4 a, .side-widget .article-home .post-excerpt h3, .side-widget .article-home .post-excerpt h3 a {
    font-size: 20px !important;
    line-height: 26px !important;
}
.wpb_column .wpb_wrapper .mini-posts .post-excerpt h5, .wpb_column .wpb_wrapper .mini-posts .post-excerpt h5 a, .post_block_23 .list-posts a, .recentposts li a, .side-widget .toggle-view li a,
.post-excerpt h5, .post-excerpt h5 a, .col-md-3 h4, .col-md-3 h4 a, .post_block_26 .col-md-3 h4.title2, .post_block_26 .col-md-3 h4.title2 a {
    font-size: 14px !important;
    line-height: 19px !important;
}
h3{
	font-size: 22px;
    line-height: 27px;
}
.vc_col-sm-12 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-12 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a, .vc_col-sm-12 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-12 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a {
    font-size: 31px !important;
    line-height: 36px !important;
}
.single-post .blog-single p, .single-post .blog-single li{
	font-size: 14px;
}
<?php } ?>
<?php
if(($pionusnews_on_breadcrumbs==1)){
?>
.page-template-blog-templates .inner-content {padding: 0;}
.page-template-blog-templates .section-head .bcrumbs {
    margin: 25px 0;
}
<?php } ?>
<?php // Page Header Padding
if(is_single()){
if(($breaking_news_on_off==1) || ($pionusnews_on_breadcrumbs==1)){
?>
.inner-content {
    padding: 0;
}
<?php } if(($breaking_news_on_off==1) && ($pionusnews_on_breadcrumbs==1)){ ?>
.breaking-news-area {
    margin-bottom: 0;
}
.section-head .bcrumbs {
	margin: 25px 0;
}
<?php } if(($breaking_news_on_off==0) && ($pionusnews_on_breadcrumbs==1)){ ?>
.section-head .bcrumbs {
	margin: 25px 0;
}
<?php } ?>
<?php } //End is_single ?>

<?php 
if(is_tag() || is_author() || is_single()){ ?>
.inner-content {
    padding: 70px 0 0 0;
}
<?php if((($breaking_news_on_off==1) || ($pionusnews_on_breadcrumbs==1)) && ($global_white_conainter==0)){
?>
.inner-content {
    padding: 0;
}
.section-head {
	margin-bottom: 25px;
}
<?php } 
	
if( ($global_white_conainter==1) && (($breaking_news_on_off==0) && ($pionusnews_on_breadcrumbs==0))){
?>
.inner-content {
    padding: 0;
}
.section-head, .row.conditional-margin {
	margin-top: 30px;
}
<?php } if((($breaking_news_on_off==1) || ($pionusnews_on_breadcrumbs==1)) && ($global_white_conainter==1)){ ?>
.inner-content {
    padding: 0;
}
.section-head {
	margin-top: 30px;
	margin-bottom: 25px;
}
<?php } } if( ($global_white_conainter==1) && ($pionusnews_on_breadcrumbs==0) && (is_single())){ ?>
.inner-content {
    padding: 0;
}
.row.conditional-margin {
	margin-top: 30px;
}
<?php }
if(is_category() || is_archive() || is_tag() || is_author() || is_search()){
$cat_id = get_query_var('cat');
$term = get_term_by('id', $cat_id, 'category');
if ( ! empty($term) && is_array($term) ) {
$color_code = get_term_meta( $term->term_id, '_category_color', true );
} else {
$color_code = '';
}
$color = "#$color_code";
$cat_data = get_option("category_$cat_id");
$cat_title = $cat_data['custom_cat_title'];
$show_hide_title = $cat_data['show_hide_title'];
$show_hide_cat_desc = $cat_data['show_hide_cat_desc'];
if(isset($cat_data['show_hide_breadcrumb'])){
	$show_hide_breadcrumb = $cat_data['show_hide_breadcrumb'];
}else{
	$show_hide_breadcrumb = '';
}
// 23jan edited this line
if(($global_white_conainter==1) && ($breaking_news_on_off==0) && ($show_hide_breadcrumb==0) && ($show_hide_title==1) && ($show_hide_cat_desc==1)){ ?>
.section-head {
    padding-top: 25px;
}

<?php
}
if(($breaking_news_on_off==1) && ($show_hide_breadcrumb==1)){ ?>
.breaking-news-area {
    margin-bottom: 0;
}
.section-head .bcrumbs {
	margin: 25px 0;
}
<?php }
if(($breaking_news_on_off==1) || ($cat_data['show_hide_title']==1) || ($breaking_news_on_off==1) || ($show_hide_breadcrumb==1) || ($show_hide_cat_desc==1)){
?>
.inner-content {
    padding: 0;
}
<?php } 
if(($cat_data['show_hide_title']==1) && ($breaking_news_on_off==0) && ($show_hide_breadcrumb==0) && ($show_hide_cat_desc==0)){
?>
.inner-content {
    padding: 0;
}
<?php if(($global_white_conainter==1)){ ?>
.section-head {padding: 25px 0;}
<?php }else{ ?>
.section-head {padding-top: 25px;}
<?php } ?>
<?php  }
if(($cat_data['show_hide_title']==0) && ($breaking_news_on_off==0) && ($show_hide_breadcrumb==1) && ($show_hide_cat_desc==0)){
?>
.inner-content {
    padding: 0;
}
<?php } 
if(($cat_data['show_hide_title']==0) && ($breaking_news_on_off==0) && ($show_hide_breadcrumb==0) && ($show_hide_cat_desc==1)){
?>
.inner-content {
    padding: 0;
}
.section-head small p{padding-top: 25px;}
.page-title-blog {
    padding: 60px 0;
}
<?php }
if(($cat_data['show_hide_title']==1) && ($show_hide_cat_desc==1) && ($breaking_news_on_off==0) && ($show_hide_breadcrumb==0)){
?>
.inner-content {
    padding: 0;
}
.section-head {padding-top: 25px;}
.one-column-style-12 .section-head {padding-top: 0;}
<?php }
if(($cat_data['show_hide_title']==1) && ($show_hide_breadcrumb==1)){
?>
.inner-content {
    padding: 0;
}
<?php }
if(($cat_data['show_hide_breadcrumb']==1) && ($show_hide_cat_desc==1)){
?>
.inner-content {
    padding: 0;
}
<?php }
if(($cat_data['show_hide_title']==0) && ($show_hide_cat_desc==1)){
?>
.page-title-blog {
    padding : 60px 0;
}
<?php }
if(($cat_data['show_hide_title']==1) && ($show_hide_cat_desc==1)){
?>
.page-title-blog {
    padding-top : 40px;
}
<?php } $container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
$global_white_conainter = pionusnews_get_option('global_white_conainter');
$breaking_news_on_off = pionusnews_get_option('breaking_news_on_off');
$pionusnews_on_breadcrumbs = pionusnews_get_option('pionusnews_on_breadcrumbs');
if(is_single()){
if((($breaking_news_on_off==0) && ($pionusnews_on_breadcrumbs==0) && ($global_white_conainter==1)) || (($breaking_news_on_off==0) && ($pionusnews_on_breadcrumbs==0) && ($container_bg_white==1))){
?>
.inner-content{
	max-width: <?php echo esc_attr($pionus_container_width); ?>; 
	margin: 0 auto; 
	width: 100%;
	background: #fff;
}
body.home .inner-content{
	max-width: <?php echo esc_attr($pionus_home_container_width); ?>; 
	margin: 0 auto; 
	width: 100%;
	background: #fff;
}
<?php
}
}
if(is_category() || is_archive()){
$cat_id = get_query_var('cat');
$cat_data = get_option("category_$cat_id");
$cat_title = $cat_data['custom_cat_title'];
$show_hide_title = $cat_data['show_hide_title'];
$show_hide_cat_desc = $cat_data['show_hide_cat_desc'];
if(isset($cat_data['show_hide_breadcrumb'])){
	$show_hide_breadcrumb = $cat_data['show_hide_breadcrumb'];
}else{
	$show_hide_breadcrumb = '';
}
if(($breaking_news_on_off==0) && ($show_hide_breadcrumb==0) && ($show_hide_title==0) && ($show_hide_cat_desc==0) && ($global_white_conainter==1)){
?>
.inner-content{
	max-width: <?php echo esc_attr($pionus_container_width); ?>; 
	margin: 0 auto; 
	width: 100%;
	background: #fff;
}
body.home .inner-content{
	max-width: <?php echo esc_attr($pionus_home_container_width); ?>; 
	margin: 0 auto; 
	width: 100%;
	background: #fff;
}
<?php
}
}
if(is_search()){
if($global_white_conainter==1){
?>
.inner-content{
	max-width: <?php echo esc_attr($pionus_container_width); ?>; 
	margin: 0 auto; 
	width: 100%;
	background: #fff;
}
body.home .inner-content{
	max-width: <?php echo esc_attr($pionus_home_container_width); ?>; 
	margin: 0 auto; 
	width: 100%;
	background: #fff;
}
.inner-content {
    padding: 70px 0 0 0;
}
@media only screen and (max-width: 767px) {
.inner-content {
    padding: 20px 0 0 0;
}
}
<?php
}
}
// Page Header Padding END

// Footer Padding Start for category and archive page

$default_posts_per_page = get_option( 'posts_per_page' );
$category = get_category($cat_id);
if ( ! empty($category) && is_array($category) ) {
$category_total_post_count = $category->category_count;
} else {
$category_total_post_count = 10;
}
if($category_total_post_count<$default_posts_per_page){
?>
footer{
	 margin-top : 35px;
}
.one-column-style-12{ margin-bottom: -70px;}
.two-column-image-title{ margin-bottom: 35px;}
.three-column-image-title-overlay{ margin-bottom: 35px;}
.three-column-masonry-style-13{ margin-bottom: 35px;}
<?php
}
} ?>

<?php
if(($container_bg_white==1) || ($global_white_conainter==1)){
//.section-head {padding-top: 25px;}
?>
.single-without-sidebar .onlytop70,
.single-full-width-image-and-title .onlytop70 {
   margin-top: 0;
}
.section-head p{ margin-bottom: 25px;}
footer {
    margin-top: 0px;
}
.one-column-style-12 .post-paper, .one-column-style-12 {
    margin-bottom: 0;
}
.two-column-image-title {
    padding-bottom: 0;
}
.three-column-image-title-overlay {
    margin-bottom: 0;
}
<?php
}
?>

<?php 
if($search_bg_color==1){ ?>
.header .search-trigger{
	background: url(<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/icon/10.png'; ?>) no-repeat center;
	background-color: <?php echo esc_attr($global_color); ?> !important;
}
@media only screen and (min-width: 768px){
.header.header2.headerstyleone .search-trigger{
    height: 55px;
	width: 55px;
}
}
@media only screen and (max-width: 767px){
.header.header2.mobilemenuarea .search-trigger{
	height: 48px !important;
    margin-top: 38px;
    margin-left: 0;
	width: 48px;
}
.header.header2.mobilemenuarea .navbar-toggle {
    margin-top: 38px;
}
}
<?php } ?>
@media only screen and (max-width: 991px) and (min-width: 768px){
.header.header2.headerstyleone .navbar-default ul.navbar-nav > li > a {
    background: <?php echo esc_attr($global_color); ?> !important;
	color: #fff !important;
}
}
a.link, a:hover,
.one-column-title-overlay article.style3 a.rmore:hover,
.footer-links li a:hover {
	color: <?php echo esc_attr($global_color); ?>;
}
.meta span a{
    color: <?php echo esc_attr($global_color); ?>;
}
.page-template-blog-templates .meta span a {
    color: <?php echo esc_attr($global_color); ?>!important;
}
.page-template-blog-templates .post-excerpt h1 a:hover {
    color: <?php echo esc_attr($global_color); ?>!important;
}
.page-template-blog-templates .post-excerpt h3 a:hover {
    color: <?php echo esc_attr($global_color); ?>!important;
}
h3 a.link, h3 a:hover{
	color: <?php echo esc_attr($global_color); ?>;
}
h4 a.link, h4 a:hover {
	color: <?php echo esc_attr($global_color); ?>!important;
}
h5 a:hover {
	color: <?php echo esc_attr($global_color); ?>!important;
}
.list-posts a:hover {
	color: <?php echo esc_attr($global_color); ?>;
}
b.prev-link:hover {
	background: <?php echo esc_attr($global_color); ?>;
}
b.next-link:hover,
.panel-pop .btn:focus, .panel-pop .btn, .panel-pop .btn-border:hover, .panel-pop .btn:hover {
	background: <?php echo esc_attr($global_color); ?>;
}
.panel-pop .btn:focus, .panel-pop .btn, .panel-pop .btn-border:hover, .panel-pop .btn:hover{
	border: 2px solid <?php echo esc_attr($global_color); ?>;
}
.hs-prev:hover, .hs-next:hover {
    background: <?php echo esc_attr($global_color); ?>;
    border: 1.5px solid <?php echo esc_attr($global_color); ?>;
}
.nav-tabs>li.active {
    color: <?php echo esc_attr($global_color); ?>;
}
.pull-right .nav-tabs>li.active>a, .pull-right .nav-tabs>li.active>a:focus, .pull-right .nav-tabs>li.active>a:hover {
    color: <?php echo esc_attr($global_color); ?>;
}
.pull-right .nav-tabs>li a:hover {
    color: <?php echo esc_attr($global_color); ?>;
}
.pull-right .nav.nav-tabs .dropdown-menu>li a:hover {
    color: <?php echo esc_attr($global_color); ?>;
}
.slider-links a.button, .tie-slider-nav li span:hover{
	background-color: <?php echo esc_attr($global_color); ?> !important;
}
.icon-tweets{
	color: <?php echo esc_attr($global_color); ?>;
}
.loadmorebtn:hover, .load_more a, .comment-form button:hover, .comment-form button:focus {
    background-color: <?php echo esc_attr($global_color); ?>;
	border: none;
}
.scrollup {
    background: url(<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/scroll-top-arrow.png'; ?>) 10px 10px no-repeat <?php echo esc_attr($global_color); ?>;
}
.header .navbar-default .navbar-nav > li > a:hover, 
.nav-dark .navbar-nav > li > a:hover, 
.dropdown-v1 > .dropdown-menu,
.megamenu > .dropdown-menu a:hover,
.tabs-menu .current a,
.first-pionusnews,
.side-newsletter button:hover,
#tweecool ul li a {
	color: <?php echo esc_attr($global_color); ?>;
}
ul li ul li.menu-item-has-children:hover > a ,
ul li ul li.menu-item-has-children > a:hover ,
.dropdown-v1 .dropdown-menu>li>a:hover,
ul.dropdown-menu .active>a {
	color: <?php echo esc_attr($global_color); ?> !important;
}

.log-reg a:last-child,
.side-widget .searchform button,
.side-newsletter button {
	background:<?php echo esc_attr($global_color); ?>!important;
}

.log-reg a:last-child,
.side-widget .searchform button,
.side-newsletter button{
	border:1px solid <?php echo esc_attr($global_color); ?>!important;
}

.side-newsletter2 button:hover {
	border: 1px solid <?php echo esc_attr($global_color); ?> !important;
}
.loadingmore{
	border-top:16px solid <?php echo esc_attr($global_color); ?>;
}
.dropdown-v1 > .dropdown-menu, 
.dropdown-v1 > .dropdown-menu .dropdown-menu,
.megamenu > .dropdown-menu,
.dropdown-v1 .dropdown-menu {
	border-top: 2px solid <?php echo esc_attr($global_color); ?>;
}
.header-top-border {
    border-top: 4px solid <?php echo esc_attr($global_color); ?>;
}
.br-title { background: <?php echo esc_attr($global_color); ?>; }
.br-title:after { border-left: 15px solid <?php echo esc_attr($global_color); ?>; }
.category-template-cat_templatesone-column-title-overlay-php .inner-content .col-md-8 h3 a:hover,
.category-template-cat_templatesone-column-title-overlay-php article.style3 .meta span a:hover,
.category-template-cat_templatesone-column-title-overlay-php .inner-content .col-md-8 .meta span a:hover{
    color: <?php echo esc_attr($global_color); ?> !important;
}
.section-head .bcrumbs li a:hover {
	color: <?php echo esc_attr($global_color); ?>;
}
.post-nav .text-right i{color: <?php echo esc_attr($global_color); ?> !important;}
.post-nav .text-left i{color: <?php echo esc_attr($global_color); ?> !important;}

<?php 
if($custom_color==''){ ?>
.single-post .blog-single blockquote p{
	color: #38a6c1 !important;
} <?php } else { ?>
.single-post .blog-single blockquote p{
	color: <?php echo esc_attr($global_color); ?> !important;
}
<?php } ?>
<?php if(($pionusnews_header_radio_buttons=='style_eight') || ($pionusnews_header_style==8)){ ?>
	@media only screen and (min-width: 992px) {
	.header.header2.headerstyleone .navbar-default .navbar-nav {
		margin: 0;
	}
	.header.header2.headerstyleone .navbar-default .navbar-nav>li>a {
		padding: 25px 18px;
		color: #070707 !important;
		font-family: poppins !important;
		font-weight: 500 !important;
		font-size: 14px !important;
		text-align: inherit !important;
		text-transform: uppercase;
	}
	.header .navbar-default .navbar-nav li a i{
		font-size: 14px !important;
	}
	.header.header2.headerstyleone .navbar-default .navbar-nav>li.active>a{
		color: #fff !important;
	}
	.header.header2.headerstyleone .navbar-default .navbar-nav>li>a>span{
		display: none;
	}
	.header.header2.headerstyleone .navbar-default .navbar-nav>li.menu-item-has-children>a:after{
		position: absolute;
		width: 100%;
		left: 0;
		margin: 0;
		text-align: center;
		bottom: 0;
		opacity: 0.21;
		display: inline-block;
		font-family: 'Font Awesome 5 Free';
		font-style: normal;
		font-weight: 900;
		line-height: 28px;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		content: '\f107';
		font-size: 13px;
	}
	}
	@media only screen and (min-width: 768px) {
	.headerstyleone.headerstyleoneseven .navbar-default{
		-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, .1);
		box-shadow: 0 1px 4px rgba(0, 0, 0, .1);
		-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, .1);
	}
	}
	.header.header2.headerstyleone .login, .header.header2.headerstyleone .search-trigger {
		height: 70px;
	}
	.header.header2.headerstyleone {
		height: auto;
	}
	@media only screen and (max-width: 991px) and (min-width: 768px){
	.header.header2.headerstyleone .navbar-toggle {
		margin-top: 28px;
	}
	.header.header2.headerstyleone .navbar-collapse {
		top: 70px;
	}
	}
	@media only screen and (max-width: 767px) and (min-width: 280px){
	.header.header2.mobilemenuarea .navbar-toggle {
		margin-top: 48px;
	}
	.header.header2.mobilemenuarea .login, .header.header2.mobilemenuarea .search-trigger {
		height: 110px;
	}
	}
	@media only screen and (max-width: 460px){
	.header.header2.mobilemenuarea .navbar-toggle {
		margin-top: 48px;
	}
	}
	@media only screen and (max-width: 843px){
	.header.header2.mobilemenuarea .navbar-brand {
		padding: 25px 0 0 0 !important;
	}
	}
<?php } //Menu Link Color Start ?>
.header7 .navbar-default .navbar-nav > li > a, .header7 .newmenu .main-navigation ul li a, .header7 .mainnavblockli li a,
.header7 .newmenu .main-navigation ul li a, .header7 .browseallicon a, .header7 .btn-open .fa-bars, .header7 .btn-open .fa-times, .header7 .main_menu_title,
.header.header2.headerstyleone .navbar-default .navbar-nav>li>a {
	color: <?php echo esc_attr($menu_link_color); ?> !important;
}
.header7 .btn-open:hover .fa-times, .header7 .btn-open:hover  .fa-bars{
	color: <?php echo esc_attr($global_color); ?> !important;
}
<?php if(pionusnews_get_option('switch_off_droparrow') == 1){ ?>
.navbar-nav>li.menu-item-has-children>a:after{
	display: none !important;
}
<?php } ?>
<?php
/******* Only For Single Page and Posts *********/
if(pionusnews_get_option('sidebar_widget_border') == 1){ 
$sidebar_background_color = pionusnews_get_option('sidebar_background_color');
 if($sidebar_background_color){ ?>

.make-border aside .side-widget, .make-border .pionusnews_tweets {
    background: <?php echo esc_attr($sidebar_background_color); ?>;
}
<?php }} ?>

<?php
$sidebar_background_color = pionusnews_get_option('sidebar_background_color');
 if($sidebar_background_color){ ?>
aside .side-widget {
    background: <?php echo esc_attr($sidebar_background_color); ?>;
	padding : 30px;
}
<?php } ?>


	<?php 
/******* Only For Home Page *********/
$widget_border = get_post_meta(get_the_ID(), 'widget_border', true);
$widget_background = get_post_meta(get_the_ID(), 'widget_background', true);
if($widget_border==1){ 
$widget_background = get_post_meta(get_the_ID(), 'widget_background', true);
 if($widget_background){ ?>

.wpb_widgetised_column .side-widget {
	padding: 20px;
    background: <?php echo esc_attr($widget_background); ?>;
	border: 1px solid #e6e6e6;
}
<?php }else{ ?>
.wpb_widgetised_column .side-widget {
padding: 20px;
background: #fff;
border: 1px solid #e6e6e6;
}
<?php }} ?>
<?php
if($widget_border==0){ 
 if($widget_background){ ?>
.wpb_widgetised_column .side-widget {
    background: <?php echo esc_attr($widget_background); ?>;
	padding : 30px;
}
<?php }} ?>

<?php

/******** Only For default sidebar *******/

$sidebar_background_color = pionusnews_get_option('sidebar_background_color');
$sidebar_title_color = pionusnews_get_option('sidebar_title_color');
$sidebar_text_color = pionusnews_get_option('sidebar_text_color');
$sidebar_link_color = pionusnews_get_option('sidebar_link_color');
$sidebar_link_hover_color = pionusnews_get_option('sidebar_link_hover_color');
 if($sidebar_title_color){ ?>
 aside .side-widget h4,  aside .sidebar-box h4.widget-title,
.default-widget h4 span.sh-text, .side-widget h4 span.sh-text,
.sidebar-box h4 span.sh-text, .pionusnews_instagram h4 span.sh-text,
.pionusnews_social_counter h4 span.sh-text{
	color: <?php echo esc_attr($sidebar_title_color); ?>;
}
<?php if((pionusnews_get_option('pionusnews_sidebar_style') != 13) && (pionusnews_get_option('pionusnews_sidebar_style') != 5)) { ?>
 aside .side-widget h4:after,  aside .sidebar-box h4:after {
    background: <?php echo esc_attr($sidebar_title_color); ?>;
}
 aside .side-widget h4:before,  aside .sidebar-box h4:before {
	border-top-color: <?php echo esc_attr($sidebar_title_color); ?>;
    border-top: 5px solid <?php echo esc_attr($sidebar_title_color); ?>;
}
<?php } ?>
<?php } ?>

<?php if($sidebar_text_color){ ?>
 aside .side-widget {
    color: <?php echo esc_attr($sidebar_text_color); ?>;
}
<?php } ?>

<?php if($sidebar_link_color){ ?>
 aside .side-widget a {
    color: <?php echo esc_attr($sidebar_link_color); ?>;
}
<?php } ?>
<?php if($sidebar_link_hover_color){ ?>
aside .side-widget a:hover {
    color: <?php echo esc_attr($sidebar_link_hover_color); ?>;
}
<?php } ?>

<?php if(pionusnews_get_option('img_top_cat_bg_style') == '1'){ ?>
.post-thumb .small-title {
    font-size: 11px;
}
.top_post_block_incat .small-title.cat {
	background: <?php echo esc_attr($global_color); ?>;
    padding: 2px 5px !important;
    text-transform: none;
	letter-spacing: 0.5px;
}
.side-widget .small-title.cat {
	background: <?php echo esc_attr($global_color); ?>;
    padding: 2px 8px !important;
    text-transform: none;
	letter-spacing: 0.5px;
}
.small-title-no-vc.cat, .small-title.cat .small-title-no-vc.cat{
	background: <?php echo esc_attr($global_color); ?>;
}
.page-template-blog-templates .meta span.small-title-no-vc.cat a{color:#fff!important;}
.page-template-blog-templates .meta span.small-title-no-vc.cat a:hover{color:#fff!important;}
.category .meta span.small-title-no-vc.cat a{color:#fff!important;}
.category .meta span.small-title-no-vc.cat a:hover, .small-title.cat a:hover{color:#fff!important;}
<?php } elseif(pionusnews_get_option('img_top_cat_bg_style') == '2'){ ?>
.small-title.cat{
    background: <?php echo esc_attr($global_color); ?>;
	padding: 10px !important;
}
.small-title.cat a:hover{
	color: #fff;
}
<?php } ?>

<?php
$post_title = get_the_title();
if(($post_title == 'Markup: HTML Tags and Formatting') || ($post_title == 'Template: Comments') || ($post_title == 'Page Markup And Formatting')){
?>
.blog-single p {
    margin: 0 0 10px;
}
.blog-single table th, .blog-single td { padding-right: 15px;}	
.blog-single dt {
    font-weight: 700;
    padding-top: 5px;
}
.blog-single h2, .blog-single h3, .blog-single h4, .blog-single h5, .blog-single h6 {
    padding: 10px 0!important;
}
.blog-single blockquote {
	max-width: 100%;
}
.blog-single blockquote {
background: url(<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/openquote1.gif'; ?>) no-repeat;
color: #a5a4a4;
font-style: italic;
padding: 0 0 0 30px!important;
}
.blog-single table {
	color:#333333;
	border: 1px solid #ddd;
	border-collapse: collapse;
}
.blog-single table th {
	padding: 8px;
	border: 1px solid #ddd;
}
.blog-single table td {
	border: 1px solid #ddd;
	padding: 8px;
}
.blog-single ul {
	margin: 0 0 0 30px;
}
.blog-single ul li {
	list-style: disc;
}

.comments table {
	color:#333333;
	border: 1px solid #ddd;
	border-collapse: collapse;
}
.comments table th {
	padding: 8px;
	border: 1px solid #ddd;
}
.comments table td {
	border: 1px solid #ddd;
	padding: 8px;
}
.comments ul li ul {
	margin: 0 0 0 30px;
}
.comments ul li ul li {
	list-style: disc;
}
.comments ol {
	margin: 0 0 0 30px;
}
.comments ol li {
	list-style: disc;
}
.blog-single dt, .blog-single kbd {
    font-weight: 700;
    padding: 10px 0;
}
<?php } ?>	

<?php
if($post_title == 'Template: Sticky'){
?>
.tags {
    margin-top: 20px;
}
<?php } ?>

<?php
$body_color = get_post_meta(get_the_ID(), 'body_color', true);
if($body_color){
?>
.title_style_5 .titleh3 b:after, 
.title_style_5 h3 b:after, 
.title_style_5 h4 b:after,
.title_style_10 .titleh3 b:after, 
.title_style_10 h3 b:after, 
.title_style_10 h4 b:after{
	background: <?php echo esc_attr($body_color); ?>;
}	
<?php } ?>
<?php if ( has_post_format( 'video' ) ) : ?>
.single-full-width-image-and-title .blog_single_content iframe:first-child {display: none;}
.single-post-generals .blog_single_content iframe:first-child {display: none;}
.single-without-sidebar .blog_single_content iframe:first-child {display: none;}
.one-column-title-overlay-transparent .blog_single_content iframe:first-child {display: none;}
.one-column-title-overlay .blog_single_content iframe:first-child {display: none;}
.single-image-and-title .blog_single_content iframe:first-child {display: none;}
<?php endif; ?>
.header7 .browseallmenu .wrap, .header7 .browseallmenu .wrap ul.wrap-nav, .header7 .main_menu_title, .header7 .newmenu{
	background: <?php echo esc_attr($menu_bg_for_4_5); ?> !important;
}
<?php if(($container_bg_white!=0) || ($global_white_conainter!=0)){ ?>
.header7 .newmenu{
	max-width: <?php echo esc_attr($pionus_container_width); ?>;
    margin: 0 auto;
}
body.home .header7 .newmenu{
	max-width: <?php echo esc_attr($pionus_home_container_width); ?>;
    margin: 0 auto;
}
.header7 .newmenu .container{
	background: <?php echo esc_attr($menu_bg_for_4_5); ?> !important;
}
.header7 .browseallicon {
    right: 40px;
}
.error404 .inner-content, .page-template-edit-profile .inner-content{
    padding: 0;
}
.error404 .error-container, .page-template-edit-profile .inner-content .container{
	padding-top: 70px;
	padding-bottom: 60px;
}
<?php } ?>
<?php if($footer_border_colors!=''){ //Footer colors ?>
.footer3 .footer-links li, .footer-content, footer .footer-links li {
	border-bottom: 1px solid rgba(<?php echo pionusnews_hex2RGB_convert($footer_border_colors, true);?>,.1) !important;
}
<?php } if($footer_link_colors!=''){ ?>
footer .footer-links li a, footer .footer-links li,
footer .default-widget .post-excerpt h5 a, footer .side-widget .post-excerpt h5 a, footer.pionus-footer6 .side-widget .post-excerpt h5 a{
	color: <?php echo esc_attr($footer_link_colors); ?>;
}
<?php } if($footer_button_colors!=''){ ?>
.footer-newsletter button{
	background-color: <?php echo esc_attr($footer_button_colors); ?>;
}
<?php } if($footer_socialicons_colors!=''){ ?>
footer a .fab, .footer-social4 li a{
	color: <?php echo esc_attr($footer_socialicons_colors); ?>;
}
<?php } if($footer_search_text_color!=''){ ?>
.footer-search fa fa-search{
	color: <?php echo esc_attr($footer_search_text_color); ?> !important;
}
footer ::-webkit-input-placeholder { /* WebKit browsers */
    color:  <?php echo esc_attr($footer_search_text_color); ?> !important;
}
footer :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:  <?php echo esc_attr($footer_search_text_color); ?> !important;
    opacity:  1;
}
footer ::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:  <?php echo esc_attr($footer_search_text_color); ?> !important;
    opacity:  1;
}
footer :-ms-input-placeholder { /* Internet Explorer 10+ */
    color:  <?php echo esc_attr($footer_search_text_color); ?> !important;
}
<?php } if($footer_title_colors!=''){ ?>
footer .footer-content h5, footer .footer-head h3,
footer .default-widget h4 span.sh-text, footer .side-widget h4 span.sh-text {
	color: <?php echo esc_attr($footer_title_colors); ?> !important;
}
<?php } if($footer_bottom_text_colors!=''){ ?>
.footer-bottom li a, .footer-bottom p{
	color: <?php echo esc_attr($footer_bottom_text_colors); ?> !important;
}
<?php } ?>

<?php if($meta_hover_color){ ?>
.meta span a:hover {
	color: <?php echo esc_attr($meta_hover_color); ?>!important;
}
.cat a:hover {
	color: <?php echo esc_attr($meta_hover_color); ?>!important;
}
.video_details span.catlist a:hover,
.video_details span.comment a:hover {
    color: <?php echo esc_attr($meta_hover_color); ?>;
}
.small-title-no-vc.cat a:hover, .small-title.cat .small-title-no-vc.cat a:hover{
	color: #fff !important;
}
<?php } ?>
@media only screen and (min-width: 768px){
header .navbar-brand{
	padding-top: <?php echo esc_attr($pionusnews_logo_top_padding); //default 5px ?> !important;
	padding-bottom: <?php echo esc_attr($pionusnews_logo_bottom_padding); //default 5px ?> !important;
	padding-left: <?php echo esc_attr($pionusnews_logo_left_padding); //default 15px ?> !important;
	padding-right: <?php echo esc_attr($pionusnews_logo_right_padding); //default 15px ?> !important;
	max-width: <?php echo esc_attr($pionusnews_logo_max_width); //default 285px ?> !important;
}
}
<?php if(pionusnews_get_option('pionusnews_new_menu_anim') == '1'){ ?>
/*Menu Animation Style 1*/
@media only screen and (min-width: 768px) {
.dropdown-v1 > .dropdown-menu, .megamenu > .dropdown-menu {
	-webkit-transition-property: visibility, opacity, backface-visibility, transform; /* Safari */
    -webkit-transition-duration: .2s; /* Safari */
    transition-property: visibility, opacity, backface-visibility, transform;
    transition-duration: .2s;
	-webkit-backface-visibility: hidden;
    backface-visibility: hidden;
	-webkit-transform: rotate3d(1, 0, 0, 90deg) perspective(100px);
    transform: rotate3d(1, 0, 0, 90deg) perspective(100px);
	-webkit-transform-origin: top center;
    transform-origin: top center;
	visibility: hidden;
	opacity: 0;
}
.dropdown-v1:hover > .dropdown-menu, .megamenu:hover .dropdown-menu{
	-webkit-transform: rotate3d(1, 0, 0, 0deg);
    transform: rotate3d(1, 0, 0, 0deg);
	-webkit-backface-visibility: visible;
    backface-visibility: visible;
	visibility: visible;
	opacity: 1;
}
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
.header.header2 .dropdown-v1 > .dropdown-menu, .header.header2 .megamenu > .dropdown-menu {
	-webkit-transition-property: none; /* Safari */
    -webkit-transition-duration: .2s; /* Safari */
    transition-property: none;
    transition-duration: .2s;
	-webkit-backface-visibility: visible;
    backface-visibility: visible;
	-webkit-transform: none;
    transform: none;
	-webkit-transform-origin: none;
    transform-origin: none;
	visibility: visible;
	opacity: 1;
}
.header.header2 .dropdown-v1:hover > .dropdown-menu, .header.header2 .megamenu:hover .dropdown-menu{
	-webkit-transform: none;
    transform: none;
	-webkit-backface-visibility: visible;
    backface-visibility: visible;
	visibility: visible;
	opacity: 1;
}
}
/*New Menu Animtion END*/
<?php } ?>
<?php if(pionusnews_get_option('pionusnews_post_border') == '1'){ ?>
.the-border-wrapper, .post-nav, .related-posts{
    padding: 30px;
    border: 1px solid rgba(51,51,51,0.1) !important;
    border-radius: 0;
}
.single-post .blog-single img.default-post-image{
	margin-bottom: 0;
}
.related-posts, .post-nav{
	margin-bottom: 30px;
}
.about-author {
    padding: 22px 25px 24px 170px;
    border-radius: 0;
    box-shadow: none;
	border: 1px solid rgba(51,51,51,0.1) !important;
}
<?php if ( have_comments() ) { ?>
.col-md-8 .comments{
    padding: 30px;
    border: 1px solid rgba(51,51,51,0.1) !important;
    border-radius: 0;
}
<?php } ?>
<?php } else { ?>
.the-border-wrapper {
    padding: 0;
    border: 0;
    border-radius: 0;
}
<?php } ?>

<?php if( in_category('no-border') ) { ?>
.the-border-wrapper {
    padding: 0;
    border: 0 !important;
    border-radius: 0;
}
.make-border .defaultsidebar .side-widget, .make-border .pionusnews_tweets {
	padding: 0;
    border: none;
	margin-bottom: 40px;
	}
<?php } ?>

<?php 
$footer_short_desc_colors = pionusnews_get_option('footer_short_desc_colors');
if($footer_short_desc_colors){
?>
p.footer_short_desc, footer .default-widget article .meta span, footer .side-widget article .meta span,
footer.pionus-footer6 .side-widget article .meta span{color: <?php echo esc_attr($footer_short_desc_colors); ?>}
<?php }  ?>
<?php if($global_white_conainter==1){ ?>
.headerstyleone .dropdown-v1:hover > .dropdown-menu {
    top: 110%;
}
.headerstyleone .megamenu.dropdown-v1:hover > .dropdown-menu {
    top: 100%;
}
.headerstyleoneseven .dropdown-v1:hover > .dropdown-menu {
    top: 110%;
}
.headerstyleoneseven .megamenu.dropdown-v1:hover > .dropdown-menu {
    top: 100%;
}
.headerstylefour .nav-dark {
    background: transparent;
}
.headerstylefive .nav-dark {
    background: transparent;
}
.page-numbers {
    margin-bottom: 30px;
}
<?php }
$pionusnews_title_style = pionusnews_get_option('pionusnews_title_style');
$pionusnews_sidebar_title_style = pionusnews_get_option('pionusnews_sidebar_style');
if($pionusnews_title_style==7){
?>
h3.margin-bottom-15 b:after {
    top: 5px;
}
.titleh3.margin-bottom-20 b:after{
	top: 5px;
}
.side-widget h4 span.sh-text{
	padding: 0 5px;
}
.side-widget h4 span.sh-text:after{
	top: 5px;
}
<?php } 
if($pionusnews_title_style==8){
?>
.titleh3.margin-bottom-20 b:after,
h3.margin-bottom-15 b:after,
h3.margin-bottom-15 b:after,
h4.margin-bottom-15 b:after,
h4 span.sh-text:after {
	border-bottom: 16px solid transparent;
}
<?php } if($pionusnews_sidebar_title_style==11){ ?>
footer .default-widget h4 span.sh-text, footer .side-widget h4 span.sh-text, footer .sidebar-box h4 span.sh-text, .pionusnews_instagram h4 span.sh-text {
    border-bottom: 2px solid <?php echo esc_attr($global_color); ?> !important;
}
<?php } if($pionusnews_sidebar_title_style==12){ ?>
.default-widget h4:after, .side-widget h4:after, .sidebar-box h4:after, .pionusnews_instagram h4:after {
    background: <?php echo esc_attr($global_color); ?> !important;
}
.default-widget h4:before, .side-widget h4:before, .sidebar-box h4:before, .pionusnews_instagram h4:before {
	border-top-color: <?php echo esc_attr($global_color); ?> !important;
    border-top: 5px solid <?php echo esc_attr($global_color); ?> !important;
}
<?php } if($pionusnews_title_style==12){ ?>
.titleh3.margin-bottom-20:after {
    background: <?php echo esc_attr($global_color); ?>;
}
.titleh3.margin-bottom-20:before {
	border-top-color: <?php echo esc_attr($global_color); ?>;
    border-top: 5px solid <?php echo esc_attr($global_color); ?>;
}
.pull-right .nav-tabs>li.active>a, .pull-right .nav-tabs>li.active>a:focus, .pull-right .nav-tabs>li.active>a:hover {
    color: <?php echo esc_attr($global_color); ?>;
}
h3.margin-bottom-15:after {
    background: <?php echo esc_attr($global_color); ?>;
}
h3.margin-bottom-15:before {
	border-top-color: <?php echo esc_attr($global_color); ?>;
    border-top: 5px solid <?php echo esc_attr($global_color); ?>;
}
h4.margin-bottom-15:after {
    background: <?php echo esc_attr($global_color); ?>;
}
h4.margin-bottom-15:before {
	border-top-color: <?php echo esc_attr($global_color); ?>;
    border-top: 5px solid <?php echo esc_attr($global_color); ?>;
}
<?php } ?>
<?php
$pionusnews_mainnavigation_border_color = pionusnews_get_option('mainnavigation_border_color');
if($pionusnews_mainnavigation_border_color){
?>
@media only screen and (min-width: 768px){
.navbar-collapse.collapse.main-navigation,
.headerstylethree .navbar-defaul .container{
	border-top: 0.1px solid <?php echo esc_attr($pionusnews_mainnavigation_border_color); ?>;
	border-bottom: 0.1px solid <?php echo esc_attr($pionusnews_mainnavigation_border_color); ?>;
}
}
<?php } ?>
<?
$pionusnews_active_menu_bg_color = pionusnews_get_option('pionusnews_active_menu_bg_color');
$pionusnews_active_menu_font_color = pionusnews_get_option('pionusnews_active_menu_font_color');

?>
@media only screen and (min-width: 768px){
.header .navbar-default ul.navbar-nav > li.dropdown.dropdown-v1 > a:hover,
.header .navbar-default ul.navbar-nav > li.dropdown.dropdown-v1 > a:focus,
.header .nav-dark .navbar-nav > li > a:hover,
.header .navbar-default ul.navbar-nav > li.active > a,
.header.header2.headerstyleone .navbar-default .navbar-nav>li.active>a {
	<?php if($pionusnews_active_menu_bg_color){ ?>
	background-color: <?php echo esc_attr($pionusnews_active_menu_bg_color); ?> !important;
	<?php } if($pionusnews_active_menu_font_color){ ?>
	color: <?php echo esc_attr($pionusnews_active_menu_font_color); ?> !important;
	<?php } ?>
}
.header .navbar-default ul.navbar-nav > li.dropdown-v1 ul.dropdown-menu li a:hover,
.header .nav-dark .navbar-nav > li ul.dropdown-menu li a:hover{
	<?php if($dropdown_font_color == ''){ ?>
	color: inherit !important;
	<?php } else { ?>
	color: none!important;
	<?php } ?>
	background-color: inherit !important;
}
}
<?php
$pionusnews_menu_left_border = pionusnews_get_option('pionusnews_menu_left_border');
if($pionusnews_menu_left_border == 1){
?>
@media only screen and (min-width: 768px){
.header .navbar-default ul.navbar-nav:not(.leftside):not(.navbar-right) > li > a,
.header .nav-dark .navbar-nav:not(.leftside):not(.navbar-right) li > a {
    border-left: 1px solid rgba(255, 255, 255, 0.1);
}
.header .navbar-default ul.navbar-nav:not(.leftside):not(.navbar-right) > li:first-child > a,
.header .nav-dark .navbar-nav:not(.leftside):not(.navbar-right) li:first-child > a,
.header .navbar-default ul.navbar-nav:not(.leftside):not(.navbar-right) .yamm-content li > a,
.header .nav-dark .navbar-nav:not(.leftside):not(.navbar-right) .yamm-content li > a{
	border-left: none;
}
<?php if($pionusnews_active_menu_bg_color){ ?>
.header .navbar-default ul.navbar-nav:not(.leftside):not(.navbar-right) > li:first-child > a,
.header .nav-dark .navbar-nav:not(.leftside):not(.navbar-right) li:first-child > a {
	border-left: 1px solid rgba(255, 255, 255, 0.1);
}
<?php } ?>
}
<?php } ?>
<?php
$pionusnews_bottom_footer_alt = pionusnews_get_option('pionusnews_bottom_footer_alt');
$pionusnews_bottom_footer_alt_color = pionusnews_get_option('pionusnews_bottom_footer_alt_color');
if($pionusnews_bottom_footer_alt == 1){
?>
.pionusnews-ft-nav-ul{
	background: <?php echo esc_attr($pionusnews_bottom_footer_alt_color); ?> !important;
}
<?php if(($container_bg_white==1) || ($global_white_conainter==1)){ ?>
@media only screen and (min-width: 768px){
.pionusnews-ft-nav-ul{
	padding: 5px 35px 5px 15px !important;
	margin-left: -25px !important;
	margin-right: -25px !important;
}
}
<?php } ?>
<?php } ?>
<?php
$pionusnews_topbar_date_bg_color = pionusnews_get_option('pionusnews_topbar_date_bg_color');
$pionusnews_topbar_date_color = pionusnews_get_option('pionusnews_topbar_date_color');
$pionusnews_topbar_sicons_color = pionusnews_get_option('pionusnews_topbar_sicons_color');
$pionusnews_topbar_topmenu_links_color = pionusnews_get_option('pionusnews_topbar_topmenu_links_color');
$header_topbar_background_color = pionusnews_get_option('header_topbar_background_color');
if($pionusnews_topbar_date_bg_color){
?>
.header-top-menubar .topbar-date, .mobile_header_top .topbar-date {
	background: <?php echo esc_attr($pionusnews_topbar_date_bg_color); ?>;
}
<?php } else { ?>
.header-top-menubar .topbar-date, .mobile_header_top .topbar-date {
	background: <?php echo esc_attr($global_color); ?>;
}
<?php } if($pionusnews_topbar_date_color){ ?>
.header-top-menubar .topbar-date, .mobile_header_top .topbar-date {
	color: <?php echo esc_attr($pionusnews_topbar_date_color); ?>;
}
<?php } else { ?>
.header-top-menubar .topbar-date, .mobile_header_top .topbar-date {
	color: #fff;
}
<?php } if($pionusnews_topbar_sicons_color){ ?>
.header-top-social, .header-top-social a {
	color: <?php echo esc_attr($pionusnews_topbar_sicons_color); ?>;
}
<?php } if($pionusnews_topbar_topmenu_links_color){ ?>
.header-top-menubar .list-inline a, a.pantograph-login{
	color: <?php echo esc_attr($pionusnews_topbar_topmenu_links_color); ?>;
}
<?php } if($header_topbar_background_color == $global_color) { ?>
.header-top-menubar .list-inline a:hover, a:hover.pantograph-login {
	color: rgba(<?php echo pionusnews_hex2RGB_convert($pionusnews_topbar_topmenu_links_color, true);?>,.8);
}
<?php } else { ?>
.header-top-menubar .list-inline a:hover, a:hover.pantograph-login {
	color: <?php echo esc_attr($global_color); ?>;
}
<?php } ?>
header .navbar-nav:not(.leftside):not(.navbar-right) > li > a,
.header.header2.headerstyleone .navbar-default .navbar-nav>li>a{
	font-weight: <?php echo esc_attr($pionusnews_menu_fontweight); //default 500 ?> !important;
	font-family: '<?php echo esc_attr($pionusnews_menu_fontfamily); //default Roboto ?>' !important;
	font-size: <?php echo esc_attr($pionusnews_menu_fontsize); //default 13px ?> !important;
	text-transform: <?php echo esc_attr($pionusnews_menu_uppercase); //default uppercase ?>;
}
.header .navbar-default .navbar-nav li a i{
	font-size: <?php echo esc_attr($pionusnews_menu_fontsize); //default 13px ?> !important;
}
.header7 .browseallicon a{
	font-family: '<?php echo esc_attr($pionusnews_menu_fontfamily); //default Roboto ?>' !important;
}
.header7 .browseallicon a span{
	font-weight: <?php echo esc_attr($pionusnews_menu_fontweight); //default 500 ?> !important;
}

/*Styling h1,h2,h3,h4,h5,h6*/
<?php if(($pionusnews_post_h1_size) || ($pionusnews_post_h1_height) || ($pionusnews_post_h1_weight) || ($pionusnews_post_h1_fontfamily)){ ?>
.single-post .blog-single h1,
.single-post .blog-single h1.h1,
.single-post .single-image-and-title h1.h1.text-white,
.single-post .one-column-title-overlay .blog-single h1,
.single-post .one-column-title-overlay-transparent article.style3 .post-excerpt h1.h1,
.single-post .single-without-sidebar article.style3.single .h1,
.single-post .single-full-width-image-and-title article.style3.single .h1,
.post-template-single-general.single-post .blog-single.has-post-thumbnail h1.h1,
.blog-single h1.no-single-imageh1,
.single-post .single-without-sidebar article.style3.single .h1,
.single-post .single-full-width-image-and-title article.style3.single .h1,
.single-post .blog-single h1 a,
.single-post .blog-single h1.h1 a,
.single-post .single-image-and-title h1.h1.text-white a,
.single-post .one-column-title-overlay .blog-single h1 a,
.single-post .one-column-title-overlay-transparent article.style3 .post-excerpt h1.h1 a,
.single-post .single-without-sidebar article.style3.single .h1 a,
.single-post .single-full-width-image-and-title article.style3.single .h1 a,
.post-template-single-general.single-post .blog-single.has-post-thumbnail h1.h1 a,
.blog-single h1.no-single-imageh1 a,
.single-post .single-without-sidebar article.style3.single .h1 a,
.single-post .single-full-width-image-and-title article.style3.single .h1 a{
	<?php if($pionusnews_post_h1_size){ ?>
	font-size: <?php echo esc_attr($pionusnews_post_h1_size); //default 26px ?> !important;
	<?php } if($pionusnews_post_h1_height){ ?>
    line-height: <?php echo esc_attr($pionusnews_post_h1_height); //default 38px ?> !important;
	<?php } if($pionusnews_post_h1_weight){ ?>
    font-weight: <?php echo esc_attr($pionusnews_post_h1_weight); //default 400 ?> !important;
	<?php } if($pionusnews_post_h1_fontfamily){ ?>
	font-family: '<?php echo esc_attr($pionusnews_post_h1_fontfamily); //default Lato ?>' !important;
	<?php } ?>
}
<?php } if(($pionusnews_post_h2_size) || ($pionusnews_post_h2_height) || ($pionusnews_post_h2_weight) || ($pionusnews_post_h2_fontfamily)){ ?>
.single-post .blog-single h2,
.archive .section-head h2,
.single-post .blog-single h2 a,
.archive .section-head h2 a{
	<?php if($pionusnews_post_h2_size){ ?>
	font-size: <?php echo esc_attr($pionusnews_post_h2_size); ?> !important;
	<?php } if($pionusnews_post_h2_height){ ?>
    line-height: <?php echo esc_attr($pionusnews_post_h2_height); ?> !important;
	<?php } if($pionusnews_post_h2_weight){ ?>
    font-weight: <?php echo esc_attr($pionusnews_post_h2_weight); ?> !important;
	<?php } if($pionusnews_post_h2_fontfamily){ ?>
	font-family: '<?php echo esc_attr($pionusnews_post_h2_fontfamily); ?>' !important;
	<?php } ?>
}
<?php } if(($pionusnews_post_h3_size) || ($pionusnews_post_h3_height) || ($pionusnews_post_h3_weight) || ($pionusnews_post_h3_fontfamily)){ ?>
.single-post .blog-single h3,
.post-excerpt h3,
.single-post .blog-single h3 a,
.post-excerpt h3 a{
	<?php if($pionusnews_post_h3_size){ ?>
	font-size: <?php echo esc_attr($pionusnews_post_h3_size); ?> !important;
	<?php } if($pionusnews_post_h3_height){ ?>
    line-height: <?php echo esc_attr($pionusnews_post_h3_height); ?> !important;
	<?php } if($pionusnews_post_h3_weight){ ?>
    font-weight: <?php echo esc_attr($pionusnews_post_h3_weight); ?> !important;
	<?php } if($pionusnews_post_h3_fontfamily){ ?>
	font-family: '<?php echo esc_attr($pionusnews_post_h3_fontfamily); ?>' !important;
	<?php } ?>
}
<?php } if(($pionusnews_post_h4_size) || ($pionusnews_post_h4_height) || ($pionusnews_post_h4_weight) || ($pionusnews_post_h4_fontfamily)){ ?>
.single-post .blog-single h4, .single-post .blog-single h4 a{
	<?php if($pionusnews_post_h4_size){ ?>
	font-size: <?php echo esc_attr($pionusnews_post_h4_size); ?> !important;
	<?php } if($pionusnews_post_h4_height){ ?>
    line-height: <?php echo esc_attr($pionusnews_post_h4_height); ?> !important;
	<?php } if($pionusnews_post_h4_weight){ ?>
    font-weight: <?php echo esc_attr($pionusnews_post_h4_weight); ?> !important;
	<?php } if($pionusnews_post_h4_fontfamily){ ?>
	font-family: '<?php echo esc_attr($pionusnews_post_h4_fontfamily); ?>' !important;
	<?php } ?>
}
<?php } if(($pionusnews_post_h5_size) || ($pionusnews_post_h5_height) || ($pionusnews_post_h5_weight) || ($pionusnews_post_h5_fontfamily)){ ?>
.single-post .blog-single h5,
.post-excerpt h5,
.single-post .blog-single h5 a,
.post-excerpt h5 a{
	<?php if($pionusnews_post_h5_size){ ?>
	font-size: <?php echo esc_attr($pionusnews_post_h5_size); ?> !important;
	<?php } if($pionusnews_post_h5_height){ ?>
    line-height: <?php echo esc_attr($pionusnews_post_h5_height); ?> !important;
	<?php } if($pionusnews_post_h5_weight){ ?>
    font-weight: <?php echo esc_attr($pionusnews_post_h5_weight); ?> !important;
	<?php } if($pionusnews_post_h5_fontfamily){ ?>
	font-family: '<?php echo esc_attr($pionusnews_post_h5_fontfamily); ?>' !important;
	<?php } ?>
}
<?php } if(($pionusnews_post_h6_size) || ($pionusnews_post_h6_height) || ($pionusnews_post_h6_weight) || ($pionusnews_post_h6_fontfamily)){ ?>
.blog-single h6, .blog-single h6 a{
	<?php if($pionusnews_post_h6_size){ ?>
	font-size: <?php echo esc_attr($pionusnews_post_h6_size); ?> !important;
	<?php } if($pionusnews_post_h6_height){ ?>
    line-height: <?php echo esc_attr($pionusnews_post_h6_height); ?> !important;
	<?php } if($pionusnews_post_h6_weight){ ?>
    font-weight: <?php echo esc_attr($pionusnews_post_h6_weight); ?> !important;
	<?php } if($pionusnews_post_h6_fontfamily){ ?>
	font-family: '<?php echo esc_attr($pionusnews_post_h6_fontfamily); ?>' !important;
	<?php } ?>
}
<?php } ?>
<?php if(pionusnews_get_option('pionusnews_meta_for_all_posts') != 1){ ?>
article .meta {
    display: none;
}
.hasmeta article .meta {
    display: block;
}
<?php } if(pionusnews_get_option('pionusnews_meta_for_all_posts') == 1){ ?>
.nometa article .meta {
    display: none;
}
<?php } if(pionusnews_get_option('pionusnews_meta_for_single_posts') != 1){ ?>
.blog-single .single-meta{
	display: none;
}
<?php } if(pionusnews_get_option('pionusnews_remove_meta_for_all_posts_partially') == 1){ ?>
article .meta span.author, article .meta span.comment, article .meta span.views{
	display: none;
}
.hasmeta article .meta span.author, .hasmeta article .meta span.comment, .hasmeta article .meta span.views{
	display: block;
}
<?php } if(pionusnews_get_option('pionusnews_fullwidth_footer') == 1){
$footer_bg_color = pionusnews_get_option('footer_bg_color'); ?>
@media only screen and (min-width: 768px){
footer.navstyle-for-bg {
    background-color: <?php echo esc_attr($footer_bg_color); ?> !important;
}
footer {
	background: <?php echo esc_attr($footer_bg_color); ?> !important;
}
footer .container, footer .container-fluid {
    padding-right: 15px !important;
    padding-left: 15px !important;
}
}
<?php } ?>
<?php if($pionusnews_header_bottom_pd){ ?>
header{
	padding-bottom: <?php echo esc_attr($pionusnews_header_bottom_pd);?>;
}
<?php } ?>
<?php if($pionusnews_rmore_button_style==2){ ?>
.small-title.rmore {
    font-size: 12px;
    letter-spacing: 0.05em;
    font-weight: bold;
    line-height: 17px;
    color: #fff !important;
    margin-bottom: 3px;
    text-transform: uppercase;
    padding: 8px 15px;
    font-family: rajdhani;
    background: <?php echo esc_attr($global_color); ?>;
	margin-top:5px;
    display: inline-block;
}
.one-column-title-overlay article.style3 a.rmore:hover,
a.small-title.rmore:hover{
	color: #fff !important;
}
.one-column-title-overlay-transparent article a.small-title.rmore,
.one-column-title-overlay article a.small-title.rmore{
	display: inline;
	color: #fff;
	font-weight: bold;
}
<?php if (($pionus_container_width_first_four < "1080") || ($pionus_home_container_width_first_four < "1080")){?>
.small-title.rmore {
    padding: 5px 12px;
}
<?php } ?>
<?php } if($pionusnews_rmore_button_style==3){ ?>
.small-title.rmore {
    font-size: 12px;
    letter-spacing: 0.05em;
    font-weight: bold;
    line-height: 17px;
    color: #fff !important;
    margin-bottom: 3px;
    text-transform: uppercase;
    padding: 8px 15px;
    font-family: rajdhani;
    background: #1b1d25;
	margin-top:5px;
    display: inline-block;
}
.one-column-title-overlay article.style3 a.rmore:hover,
a.small-title.rmore:hover{
	color: #fafafa;
}
.one-column-title-overlay-transparent article a.small-title.rmore,
.one-column-title-overlay article a.small-title.rmore{
	display: inline;
	color: #fff;
	font-weight: bold;
}
<?php if (($pionus_container_width_first_four < "1080") || ($pionus_home_container_width_first_four < "1080")){?>
.small-title.rmore {
    padding: 5px 12px;
}
<?php } ?>
<?php } if($pionusnews_rmore_button_style==4){ ?>
.small-title.rmore {
    font-size: 12px;
    letter-spacing: 0.05em;
    font-weight: bold;
    line-height: 17px;
    color: <?php echo esc_attr($global_color); ?>;
    margin-bottom: 3px;
    text-transform: uppercase;
    padding: 8px 15px;
    font-family: rajdhani;
    background: transparent;
	border: 2px solid <?php echo esc_attr($global_color); ?>;
	margin-top:5px;
    display: inline-block;
}
.one-column-title-overlay article.style3 a.rmore:hover,
a.small-title.rmore:hover{
	color: <?php echo esc_attr($global_color); ?>;
	opacity: 0.8;
}
.one-column-title-overlay-transparent article a.small-title.rmore,
.one-column-title-overlay article a.small-title.rmore{
	display: inline;
	color: <?php echo esc_attr($global_color); ?>;
	font-weight: bold;
}
<?php if (($pionus_container_width_first_four < "1080") || ($pionus_home_container_width_first_four < "1080")){?>
.small-title.rmore {
    padding: 5px 12px;
}
<?php } ?>
<?php } ?>
<?php if($pionusnews_lmore_button_style==2){ ?>
.load_more a {
	font-size: 16px;
	font-weight: 600;
	font-family: poppins;
	text-transform: none;
    line-height: 24px;
}
.load_more {
    width: 70%;
    margin-left: 15%;
}
<?php } if($pionusnews_lmore_button_style==3){ ?>
.load_more a {
    background-color: transparent;
    color: #1b1d25;
    border: 1px solid #e7e7e7;
	font-size: 16px;
	font-weight: 600;
	font-family: poppins;
	text-transform: none;
    line-height: 24px;
}
.load_more {
    width: 70%;
    margin-left: 15%;
	-webkit-transition: all 0.5s;
    transition: all 0.5s;
}
.load_more:hover{
	background: <?php echo esc_attr($global_color); ?>;
	color: #fff;
}
<?php } ?>
<?php
if($dropdown_bg_color != ''){
?>
.megamenu > .dropdown-menu,
.dropdown-menu .tabs-menu li.current,
.dropdown-v1 > .dropdown-menu,
.header7 .main_menu_item,
.dropdown-v1 > .dropdown-menu .dropdown-menu{
	background-color: <?php echo esc_attr($dropdown_bg_color); ?> !important;
}
.mobilemenuarea .megamenu > .dropdown-menu,
.mobilemenuarea .dropdown-menu .tabs-menu li.current,
.mobilemenuarea .dropdown-v1 > .dropdown-menu,
.mobilemenuarea .header7 .main_menu_item,
.mobilemenuarea .dropdown-v1 > .dropdown-menu .dropdown-menu{
	background-color: transparent !important;
}
<?php } if($dropdown_font_color != ''){ ?>
.header7 .newmenu .main-navigation ul li ul li a, .dropdown-menu .yamm-content a, .dropdown-menu .yamm-content a:hover,
.megamenu > .dropdown-menu h2,
.megamenu > .dropdown-menu .header-post p,
.dropdown-v1 .dropdown-menu>li>a{
	color: <?php echo esc_attr($dropdown_font_color); ?> !important;
}
.megamenu > .dropdown-menu .header-post .date, .ballmenu-li a{
	color: rgba(<?php echo pionusnews_hex2RGB_convert($dropdown_font_color, true);?>,.7) !important;
}
header.header .navbar .navbar-nav .dropdown-menu a:hover {
    font-size: 96% !important;
}
header.header .navbar .navbar-nav .dropdown-menu .header-post a:hover {
    font-size: 101% !important;
}
.header7 .main_menu_item{
    -webkit-box-shadow: inset 0 0.0625rem rgba(<?php echo pionusnews_hex2RGB_convert($dropdown_font_color, true);?>,.03);
    box-shadow: inset 0 0.0625rem rgba(<?php echo pionusnews_hex2RGB_convert($dropdown_font_color, true);?>,.03);
}
.header7 .main_menu_title {
    border-top: 0.0625rem solid rgba(<?php echo pionusnews_hex2RGB_convert($dropdown_font_color, true);?>,.03);
}
.megamenu > .dropdown-menu li,
.dropdown-v1 .dropdown-menu>li>a{
	border-bottom: 1px solid rgba(<?php echo pionusnews_hex2RGB_convert($dropdown_font_color, true);?>,.03) !important;
}
li.ballmenu-li a{
	border-left: 1px solid rgba(<?php echo pionusnews_hex2RGB_convert($dropdown_font_color, true);?>,.03) !important;
}
ul li.ballmenu-li:first-child a{
	border-left: none !important;
}
<?php } ?>
<?php if($pionusnews_remove_cat_home==1){ ?>
.home span.small-title-no-vc, .small-title.cat{
    display:none;
}
<?php } if($pionusnews_remove_cat_global==1){ ?>
span.small-title-no-vc, .small-title.cat{
    display:none;
}
<?php } ?>
<?php $container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
$global_white_conainter = pionusnews_get_option('global_white_conainter');
$pionusnews_boxed_shadow = pionusnews_get_option('pionusnews_boxed_shadow');
if(($container_bg_white==1) || ($global_white_conainter==1)){
if($pionusnews_boxed_shadow==1){
?>
body .container:first-child {
   -webkit-box-shadow: 0 0 3px #CACACA;
    -moz-box-shadow: 0 0 3px #cacaca;
	box-shadow: 0 0 3px #CACACA;
}
<?php } ?>
<?php } ?>
<?php $pionusnews_repeated_body_bg = pionusnews_get_option('pionusnews_repeated_body_bg');
	$pionusnews_body_bg_img_to = pionusnews_get_option('pionusnews_body_bg_img_to');
	$pionusnews_body_bg_img = get_post_meta(get_the_ID(), 'pionusnews_body_bg_img', true);
if($pionusnews_repeated_body_bg==1){
if(($container_bg_white==1) || ($global_white_conainter==1)){
	if(($pionusnews_body_bg_img) && ($pionusnews_body_bg_img_to)){ ?>
	@media only screen and (min-width: 768px){
		body .body-bg-image-div {
			display: none !important;
		}
		body {
			background: #fff url(<?php echo esc_url( $pionusnews_body_bg_img ); ?>) !important;
			background-repeat: repeat;
		}
	}
<?php } elseif((!$pionusnews_body_bg_img) && ($pionusnews_body_bg_img_to)){ ?>
	@media only screen and (min-width: 768px){
		body .body-bg-image-div {
			display: none !important;
		}
		body {
			background: #fff url(<?php echo esc_url( $pionusnews_body_bg_img_to ); ?>) !important;
			background-repeat: repeat;
		}
	}
<?php } elseif((!$pionusnews_body_bg_img_to) && ($pionusnews_body_bg_img)){ ?>
	@media only screen and (min-width: 768px){
		body .body-bg-image-div {
			display: none !important;
		}
		body {
			background: #fff url(<?php echo esc_url( $pionusnews_body_bg_img ); ?>) !important;
			background-repeat: repeat;
		}
	}
<?php } elseif((!$pionusnews_body_bg_img_to) && (!$pionusnews_body_bg_img)){ ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
$pionusnews_header_login_icon = pionusnews_get_option('pionusnews_header_login_icon');
$pionusnews_header_search_icon = pionusnews_get_option('pionusnews_header_search_icon');
?>
<?php if($pionusnews_header_login_icon != ''){ ?>
.header .login {
    background: url(<?php echo esc_url( $pionusnews_header_login_icon ); ?>) no-repeat center;
}
<?php } if($pionusnews_header_search_icon != ''){ ?>
.header .search-trigger{
	background: url(<?php echo esc_url( $pionusnews_header_search_icon ); ?>) no-repeat center;
}
<?php } ?>
<?php
$pionusnews_home_loadbutton = pionusnews_get_option('pionusnews_home_loadbutton');
?>
<?php if($pionusnews_home_loadbutton == 2){ ?>
.loadmorebtn i{
    font-size: 11px;
}
.loadmorebtn margin-top-50{
	margin-top: 25px !important;
}
.loadmorebtn{
	line-height: 28px;
	max-width: 260px;
	width: auto;
	border: none;
    color: #fff;
    background-color: #000;
}
<?php } ?>
<?php
$pionusnews_footer_content_mobile_off = pionusnews_get_option('pionusnews_footer_content_mobile_off');
?>
<?php if($pionusnews_footer_content_mobile_off == 1){ ?>
@media only screen and (max-width: 991px) {
footer .footer-content{
    display: none;
}
}
<?php } ?>
<?php
$pionusnews_img_off_in_mobile = pionusnews_get_option('pionusnews_img_off_in_mobile');
?>
<?php if($pionusnews_img_off_in_mobile == 1){ ?>
@media only screen and (max-width: 991px){
body.home, .home p{
	font-size: 12px;
	line-height: 16px;
}
body.home footer, .home footer p{
	font-size: 15px;
    line-height: 26px;
}
.home .mini-posts .onecollargestyle, 
.home .mini-posts .thumbnail477, 
.home .mini-posts .beforethumbnail477, 
.home .mini-posts .generalstyle,  
.home .mini-posts .thumbnail172,
.home .mini-posts .thumbnail118,  
.home .mini-posts .thumbnail243,  
.home .mini-posts .thumbnail335, 
.home .mini-posts .thumbnail165, 
.home .mini-posts .thumbnail400, 
.home .mini-posts .thumbnail210, 
.home .mini-posts .thumbnail185, 
.home .mini-posts .anotherstyle4, 
.home .mini-posts .anotherstyle3,
.home .mini-posts .anotherstyle5,
.home article.style2 .beforegeneralstyle
{
    display: none!important;
}
.home .mini-posts .col-md-4{
	display: none;
}
.home .mini-posts .col-md-8{
	width: 100%;;
}
.home article.style2 .col-md-6:first-child{
	display: none;
}
.home article.style2 .col-md-6{
	width: 100%;;
}
.home .wpb_widgetised_column .article-thumbnew{
	display: none;
}
.home article.style2.style-alt.style-section2 .beforethumbnail148{
	display: none;
}
.home article.style2.style-alt.style-section2 .margin-bottom-15 {
    margin-bottom: 0 !important;
}
.home .post_block_3 article.style2.style-alt .beforethumbnail148{
	display: none;
}
.home .post_block_3 article.style2.style-alt .margin-bottom-15 {
    margin-bottom: 0 !important;
}
.home .vc_col-sm-3 .side-newsletter, .vc_col-sm-4 .side-newsletter {
    padding: 5px;
}
.home .vc_col-sm-3 .side-newsletter input, .vc_col-sm-4 .side-newsletter input{
	padding: 0 10px;
	font-size: 9px;
}
.vc_col-sm-6 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-6 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a, .vc_col-sm-6 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-6 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a, .vc_col-sm-6 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-6 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a {
    font-size: 22px !important;
    line-height: 28px !important;
}
.post-excerpt h4, .post-excerpt h4 a, .side-widget .article-home .post-excerpt h3, .side-widget .article-home .post-excerpt h3 a {
    font-size: 18px !important;
    line-height: 24px !important;
}
.default-widget h4 span.sh-text, .side-widget h4 span.sh-text, .sidebar-box h4 span.sh-text, .pionusnews_instagram h4 span.sh-text, .pionusnews_social_counter h4 span.sh-text{
	font-size: 12px !important;
	line-height: 28px !important;
}
.home .widget_pionusnews_video_posts .margin-bottom-20{
	margin-bottom: 0 !important;
}
.meta span, .meta span a, .loadmorebtn, .sidebar-box .tagcloud a{
	line-height: 24px;
}
.home article:hover .play,
.home article:hover .play_md,
.home article:hover .play_thumb_48{
	opacity: 0;
}
}
@media only screen and (max-width: 991px) and (min-width: 768px){
.home .vc_col-sm-6 .home-slider-wrap article.style3.single .post-excerpt {
    left: 15%!important;
    width: 75%!important;
	top: auto !important;
}
.home ul.solid-social-icons li span.fab {
	width: 100%;
}
.home .followers, .home .followers span.followers-num, .home .followers span.followers-name {
    margin-left: 0;
    line-height: 16px;
    text-align: center;
    padding-top: 3px;
}
.home .followers span.followers-num, .home .followers span.followers-name {
	display: initial;
	font-size: 10px;
}
.home .post_block_30 .col-sm-4{
	width: 100%;
}
.home .post_block_30 .col-sm-4:nth-child(2).padding-left-none{
    padding-left: 15px !important;
}
.home .vc_col-sm-6 .post_block_30:nth-child(2), .home .post_block_30 .col-sm-4:nth-child(3){
	display: none;
}
.home .tweet-desc {
	padding-bottom: 15px;
    height: 75px;
	text-transform: lowercase;
}
.home p.tweet-time{
	padding-bottom: 5px;
	font-size: 10px !important;
}
.home .post_block_26 article .post-excerpt{
	padding: 0;
}
.home .post_block_26 .beforethumbnail172{
	display: none;
}
.home .post_block_2 .col-sm-8{
	width: 100%;
}
.home .post_block_2 .col-sm-4{
	display: none;
}
.home .style4-4-6 .col-xs-12:nth-child(3){
	display: none;
}
}
@media only screen and (max-width: 767px){
.home .vc_col-sm-6 .post_block_30{
	display: none;
}
.home .mini-posts article.style2 {
    margin-bottom: 0;
}
.home .post-excerpt h5, .home .col-md-3 h4, .home .mini-posts article.style2{
	margin-bottom: 5px;
}
.vc_col-sm-8 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-8 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a, .vc_col-sm-8 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-8 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a, .vc_col-sm-8 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-8 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a, .vc_col-sm-12 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-12 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a, .vc_col-sm-12 .post-thumb:not(.fontsizing) .post-excerpt h3.h1, .vc_col-sm-12 .post-thumb:not(.fontsizing) .post-excerpt h3.h1 a, .wpb_column .wpb_wrapper .post_block_12 .post-thumb .post-excerpt h3, .wpb_column .wpb_wrapper .post_block_12 .post-thumb .post-excerpt h3 a, .category .one-column-general article .post-excerpt:not(.custom_class_top_posts) h3, .category .one-column-general article .post-excerpt:not(.custom_class_top_posts) h3 a, .category .one-column-large-general article .post-excerpt:not(.custom_class_top_posts) h4, .category .one-column-large-general article .post-excerpt:not(.custom_class_top_posts) h4 a, .category .one-column-title-overlay article .post-excerpt:not(.custom_class_top_posts) h1, .category .one-column-title-overlay article .post-excerpt:not(.custom_class_top_posts) h1 a, .category .one-column-title-overlay-transparent article .post-excerpt:not(.custom_class_top_posts) h1, .category .one-column-title-overlay-transparent article .post-excerpt:not(.custom_class_top_posts) h1 a, .category .one-column-image-title article .post-excerpt:not(.custom_class_top_posts) h1, .category .one-column-image-title article .post-excerpt:not(.custom_class_top_posts) h1 a, .category .one-column-content-left-right .post-excerpt:not(.custom_class_top_posts) h3, .category .one-column-content-left-right .post-excerpt:not(.custom_class_top_posts) h3 a, .category .category-one-column-style-12 article .post-excerpt:not(.custom_class_top_posts) h4, .category .category-one-column-style-12 article .post-excerpt:not(.custom_class_top_posts) h4 a, .category .two-column-image-title .video_details h5.title_video, .category .two-column-image-title .video_details h5.title_video a, .category .section-head h2, .category .three-column-fullwidth article .post-excerpt:not(.custom_class_top_posts) h4, .category .three-column-fullwidth article .post-excerpt:not(.custom_class_top_posts) h4 a, .category .three-column-masonry-style-13 .post-excerpt:not(.custom_class_top_posts) h4, .category .three-column-masonry-style-13 .post-excerpt:not(.custom_class_top_posts) h4 a, .category .two-column-general .post-excerpt:not(.custom_class_top_posts) h4, .category .two-column-general .post-excerpt:not(.custom_class_top_posts) h4 a, .page-template-blog-templates .blog-classic-layout .post-excerpt:not(.custom_class_top_posts) h3, .page-template-blog-templates .blog-classic-layout .post-excerpt:not(.custom_class_top_posts) h3 a, .page-template-blog-templates .blog-one-column-standard article .post-excerpt:not(.custom_class_top_posts) h1, .page-template-blog-templates .blog-one-column-standard article .post-excerpt:not(.custom_class_top_posts) h1 a, .page-template-blog-templates .blog-one-column-transparent article .post-excerpt:not(.custom_class_top_posts) h1, .page-template-blog-templates .blog-one-column-transparent article .post-excerpt:not(.custom_class_top_posts) h1 a, .page-template-blog-templates .blog-photo-layout article .post-excerpt:not(.custom_class_top_posts) h4, .page-template-blog-templates .blog-photo-layout article .post-excerpt:not(.custom_class_top_posts) h4 a, .page-template-blog-templates .blog-photo-layout-alt article .post-excerpt:not(.custom_class_top_posts) h1, .page-template-blog-templates .blog-photo-layout-alt article .post-excerpt:not(.custom_class_top_posts) h1 a, .page-template-blog-templates .blog-simple article .post-excerpt:not(.custom_class_top_posts) h3, .page-template-blog-templates .blog-simple article .post-excerpt:not(.custom_class_top_posts) h3 a, .pionusblog .section-head h2, .page-template-blog-templates.page-template-blog-grid-layout .blog-grid-layout article .post-excerpt:not(.custom_class_top_posts) h4, .page-template-blog-templates.page-template-blog-grid-layout .blog-grid-layout article .post-excerpt:not(.custom_class_top_posts) h4 a, .page-template-blog-templates.page-template-blog-grid-layout-two .blog-grid-layout article .post-excerpt:not(.custom_class_top_posts) h4, .page-template-blog-templates.page-template-blog-grid-layout-two .blog-grid-layout article .post-excerpt:not(.custom_class_top_posts) h4 a, .page-template-blog-templates .blog-pinterest-layout article .post-excerpt:not(.custom_class_top_posts) h4, .page-template-blog-templates .blog-pinterest-layout article .post-excerpt:not(.custom_class_top_posts) h4 a, .vc_col-sm-12 .post-thumb .post-excerpt h3, .vc_col-sm-12 .post-thumb .post-excerpt h3 a, body.category .style3 .post-thumb .post-excerpt h3, body.category .style3 .post-thumb .post-excerpt h3 a, body .pionusblog .style3 .post-thumb .post-excerpt h3, body .pionusblog .style3 .post-thumb .post-excerpt h3 a, .post-thumb .post-excerpt h3, .post-thumb .post-excerpt h3 a, .col-md-8 .post-excerpt h3, .col-md-8 .post-excerpt h3 a, .vc_col-sm-8 .slick-slide .post-thumb .post-excerpt h3.h1.text-white, .vc_col-sm-8 .slick-slide .post-thumb .post-excerpt h3.h1.text-white a, body.category .top_post_block_incat .col-md-6 .post-thumb .post-excerpt h3, body.category .top_post_block_incat .col-md-6 .post-thumb .post-excerpt h3 a, body .pionusblog .top_post_block_incat .col-md-6 .post-thumb .post-excerpt h3, body .pionusblog .top_post_block_incat .col-md-6 .post-thumb .post-excerpt h3 a, .archive .section-head h2, .single-post .single-without-sidebar article.style3.single .h1, .single-post .single-full-width-image-and-title article.style3.single .h1, .single-post .blog-single h1.h1, .single-post .single-image-and-title h1.h1.text-white, .single-post .one-column-title-overlay .blog-single h1, .single-post .one-column-title-overlay-transparent article.style3 .post-excerpt h1.h1, .single-post .single-without-sidebar article.style3.single .h1, .single-post .single-full-width-image-and-title article.style3.single .h1, .post-template-single-general.single-post .blog-single.has-post-thumbnail h1.h1, .single-post .blog-single blockquote p, .category-template-cat_templatesone-column-title-overlay-php .one-column-title-overlay article.style3 .post-excerpt h1.h1, .post_block_22 .post-thumb .post-excerpt h5, .post_block_22 .post-thumb .post-excerpt h5 a, .post_block_15 .post-thumb .post-excerpt h3, .post_block_15 .post-thumb .post-excerpt h3 a, .post-excerpt h5, .post-excerpt h5 a, .col-md-3 h4, .col-md-3 h4 a, .post_block_26 .col-md-3 h4.title2, .post_block_26 .col-md-3 h4.title2 a, .post-excerpt h5, .post-excerpt h5 a, .col-md-3 h4, .col-md-3 h4 a, .post_block_26 .col-md-3 h4.title2, .post_block_26 .col-md-3 h4.title2 a, .wpb_column .wpb_wrapper .mini-posts .post-excerpt h5, .wpb_column .wpb_wrapper .mini-posts .post-excerpt h5 a, .post_block_23 .list-posts a, .recentposts li a, .side-widget .toggle-view li a{
	font-size: 18px !important;
	line-height: 24px !important;
}
.home .post_block_22 .style4-4-6 .col-md-6:nth-child(2){
	display: none;
}
}
<?php } ?>
</style>
<?php }
add_action( 'wp_head', 'pionusnews_styles_custom', 100 );
 ?>