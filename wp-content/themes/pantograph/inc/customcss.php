<?php
function pantograph_styles_custom() {
	$custom_color = pantograph_get_option('custom_color');
	if($custom_color==''){
		$global_color = '#33CCFF';
	}else{
		$global_color = pantograph_get_option('custom_color');
	}
	$menu_bg_for_4_5_color = pantograph_get_option('menu_bg_for_4_5');
	if($menu_bg_for_4_5_color==''){
		$menu_bg_for_4_5 = '#00456E';
	}else{
		$menu_bg_for_4_5 = pantograph_get_option('menu_bg_for_4_5');
	}
	$menu_link_custom_color = pantograph_get_option('menu_link_color');
	if($menu_link_custom_color==''){
		$menu_link_color = '#fff';
	}else{
		$menu_link_color = pantograph_get_option('menu_link_color');
	}
	$footer_border_colors = pantograph_get_option('footer_border_colors');
	$footer_link_colors = pantograph_get_option('footer_link_colors');
	$footer_title_colors = pantograph_get_option('footer_title_colors');
	$footer_bottom_text_colors = pantograph_get_option('footer_bottom_text_colors');
	$container_bg_white = get_post_meta(get_the_ID(), 'container_bg_white', true);
	$breaking_news_on_off = pantograph_get_option('breaking_news_on_off');
	$pantograph_on_breadcrumbs = pantograph_get_option('pantograph_on_breadcrumbs');
	$global_white_conainter = pantograph_get_option('global_white_conainter');
	$custom_meta_hover_color = pantograph_get_option('meta_hover_color');
	if($custom_meta_hover_color==''){
		$meta_hover_color = '#33CCFF';
	}else{
		$meta_hover_color = $custom_meta_hover_color;
	}
	$pantograph_logo_top_padding_custom = pantograph_get_option('pantograph_logo_top_padding');
	$pantograph_logo_bottom_padding_custom = pantograph_get_option('pantograph_logo_bottom_padding');
	$pantograph_logo_left_padding_custom = pantograph_get_option('pantograph_logo_left_padding');
	$pantograph_logo_right_padding_custom = pantograph_get_option('pantograph_logo_right_padding');
	$pantograph_logo_max_width_custom = pantograph_get_option('pantograph_logo_max_width');
	if($pantograph_logo_top_padding_custom==''){
		$pantograph_logo_top_padding = '25px';
	}else{
		$pantograph_logo_top_padding = $pantograph_logo_top_padding_custom;
	} if($pantograph_logo_bottom_padding_custom==''){
		$pantograph_logo_bottom_padding = '25px';
	}else{
		$pantograph_logo_bottom_padding = $pantograph_logo_bottom_padding_custom;
	} if($pantograph_logo_left_padding_custom==''){
		$pantograph_logo_left_padding = '15px';
	}else{
		$pantograph_logo_left_padding = $pantograph_logo_left_padding_custom;
	} if($pantograph_logo_right_padding_custom==''){
		$pantograph_logo_right_padding = '15px';
	}else{
		$pantograph_logo_right_padding = $pantograph_logo_right_padding_custom;
	} if($pantograph_logo_max_width_custom==''){
		$pantograph_logo_max_width = '285px';
	}else{
		$pantograph_logo_max_width = $pantograph_logo_max_width_custom;
	}
?>
<!-- Custom CSS Codes
========================================================= -->
<style id="custom-style">
<?php 
if(($pantograph_on_breadcrumbs==1)){
?>
.page-template-blog-templates .inner-content {padding: 0;}
.page-template-blog-templates .section-head .bcrumbs {
    margin: 25px 0;
}
<?php } ?>
<?php // Page Header Padding
if(is_single()){
if(($breaking_news_on_off==1) || ($pantograph_on_breadcrumbs==1)){
?>
.inner-content {
    padding: 0;
}
<?php } if(($breaking_news_on_off==1) && ($pantograph_on_breadcrumbs==1)){ ?>
.breaking-news-area {
    margin-bottom: 0;
}
.section-head .bcrumbs {
	margin: 25px 0;
}
<?php } } ?>


<?php 
if(is_tag() || is_author()){ ?>
.inner-content {
    padding: 30px 0 0 0;
}
<?php if((($breaking_news_on_off==1) || ($pantograph_on_breadcrumbs==1)) && ($global_white_conainter==0)){
?>
.inner-content {
    padding: 0;
}
.section-head {
	margin-bottom: 25px;
}
<?php } 
	
if( ($global_white_conainter==1) && (($breaking_news_on_off==0) && ($pantograph_on_breadcrumbs==0))){
?>
.inner-content {
    padding: 0;
}
.section-head {
	margin-top: 30px;
}
<?php } if((($breaking_news_on_off==1) || ($pantograph_on_breadcrumbs==1)) && ($global_white_conainter==1)){ ?>
.inner-content {
    padding: 0;
}
.section-head {
	margin-top: 30px;
	margin-bottom: 25px;
}
<?php } } ?>	
<?php 
if(is_category() || is_archive() || is_tag() || is_author()){
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
if(($breaking_news_on_off==1) && ($show_hide_breadcrumb==1) || ($pantograph_on_breadcrumbs==1)){ ?>
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
.section-head {padding-top: 25px;}
<?php } 
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
$global_white_conainter = pantograph_get_option('global_white_conainter');
$breaking_news_on_off = pantograph_get_option('breaking_news_on_off');
$pantograph_on_breadcrumbs = pantograph_get_option('pantograph_on_breadcrumbs');
if(is_single()){
if((($breaking_news_on_off==0) && ($pantograph_on_breadcrumbs==0) && ($global_white_conainter==1)) || (($breaking_news_on_off==0) && ($pantograph_on_breadcrumbs==0) && ($container_bg_white==1))){
?>
.inner-content{
	max-width:1200px; 
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
	max-width:1200px; 
	margin: 0 auto; 
	width: 100%;
	background: #fff;
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
	 margin-top : 15px;
}
.one-column-style-12{ margin-bottom: -70px;}
.two-column-image-title{ margin-bottom: 35px;}
.three-column-image-title-overlay{ margin-bottom: 35px;}
.three-column-masonry-style-13{ margin-bottom: 35px;}
<?php
}
} ?>

<?php
if(($container_bg_white==1) || ($global_white_conainter==1)){ ?>
.section-head {
    padding: 0;
}
.single-without-sidebar .onlytop70,
.single-full-width-image-and-title .onlytop70 {
   margin-top: 0;
}
.section-head p{ margin-bottom: 25px;}
footer {
    margin-top: 0px;
}
.one-column-style-12 {
    margin-bottom: -130px;
}
.two-column-image-title {
    padding-bottom: 0;
}
.three-column-image-title-overlay {
    margin-bottom: 0;
}
<?php
}
if ( !comments_open() ) : ?>
.related-posts {
    padding-bottom: 0;
}
<?php endif ?>

<?php //Global Color Star ?>
a.link, a:hover {
	color: <?php echo esc_attr($global_color); ?>;
}
.meta span a {
    color: <?php echo esc_attr($global_color); ?>;
}
.small-title.cat {
    color: <?php echo esc_attr($global_color); ?>;
}
.post-excerpt .small-title.cat {
	color: <?php echo esc_attr($global_color); ?>;
}
.post-excerpt .small-title.cat a {
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
h3 a.link, h3 a:hover {
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
b.next-link:hover {
	background: <?php echo esc_attr($global_color); ?>;
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
.slider-links a.button{
	background-color: <?php echo esc_attr($global_color); ?>;
}
.icon-tweets{
	color: <?php echo esc_attr($global_color); ?>;
}
.loadmorebtn:hover {
    background-color: <?php echo esc_attr($global_color); ?>;
}
.scrollup {
    background: url(<?php echo esc_url( get_template_directory_uri() ).'/img/scroll-top-arrow.png'; ?>) 10px 10px no-repeat <?php echo esc_attr($global_color); ?>;
}
.header .navbar-default .navbar-nav > li > a:hover, 
.nav-dark .navbar-nav > li > a:hover, 
.dropdown-v1 > .dropdown-menu,
.megamenu > .dropdown-menu a:hover,
.tabs-menu .current a,
.first-pantograph,
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
	background:<?php echo esc_attr($global_color); ?>;
}

.log-reg a:last-child,
.side-widget .searchform button,
.side-newsletter button,
.side-newsletter button:hover {
	border:1px solid <?php echo esc_attr($global_color); ?>;
}

.side-newsletter2 button:hover {
	border: 1px solid <?php echo esc_attr($global_color); ?> !important;
}

.dropdown-v1 > .dropdown-menu, 
.dropdown-v1 > .dropdown-menu .dropdown-menu,
.megamenu > .dropdown-menu,
.dropdown-v1 .dropdown-menu {
	border-top:1px solid <?php echo esc_attr($global_color); ?>;
}
.header-top-menubar .topbar-date {
    background: <?php echo esc_attr($global_color); ?>;
}
.header-top-menubar .list-inline a:hover{
	color: <?php echo esc_attr($global_color); ?>;
}
.header-top-border {
    border-top: 4px solid <?php echo esc_attr($global_color); ?>;
}
.mobile_header_top .topbar-date {
    background: <?php echo esc_attr($global_color); ?>;
}
.br-title { background: <?php echo esc_attr($global_color); ?>; }
.br-title:after { border-left: 15px solid <?php echo esc_attr($global_color); ?>; }
.category-template-cat_templatesone-column-title-overlay-php .inner-content .col-md-8 h3 a:hover,
.category-template-cat_templatesone-column-title-overlay-php article.style3 .meta span a:hover,
.category-template-cat_templatesone-column-title-overlay-php .inner-content .col-md-8 .meta span a:hover{
    color: <?php echo esc_attr($global_color); ?> !important;
}
<?php 
if($custom_color==''){ ?>
.single-post .blog-single blockquote p{
	color: #38a6c1 !important;
} <?php } else { ?>
.single-post .blog-single blockquote p{
	color: <?php echo esc_attr($global_color); ?> !important;
}
<?php } //Menu Link Color Start ?>
.header7 .navbar-default .navbar-nav > li > a, .header7 .newmenu .main-navigation ul li a, .header7 .mainnavblockli li a,
.header7 .newmenu .main-navigation ul li a, .header7 .browseallicon a, .header7 .btn-open:before, .header7 .btn-close:before, .header7 .main_menu_title {
	color: <?php echo esc_attr($menu_link_color); ?> !important;
}
<?php
/******* Only For Single Page and Posts *********/
if(pantograph_get_option('sidebar_widget_border') == 1){ 
$sidebar_background_color = pantograph_get_option('sidebar_background_color');
 if($sidebar_background_color){ ?>

.make-border aside .side-widget {
    background: <?php echo esc_attr($sidebar_background_color); ?>;
}
<?php }} ?>

<?php
$sidebar_background_color = pantograph_get_option('sidebar_background_color');
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

$sidebar_background_color = pantograph_get_option('sidebar_background_color');
$sidebar_title_color = pantograph_get_option('sidebar_title_color');
$sidebar_text_color = pantograph_get_option('sidebar_text_color');
$sidebar_link_color = pantograph_get_option('sidebar_link_color');
$sidebar_link_hover_color = pantograph_get_option('sidebar_link_hover_color');
 if($sidebar_title_color){ ?>
 aside .side-widget h4,  aside .sidebar-box h4.widget-title{
	color: <?php echo esc_attr($sidebar_title_color); ?>;
}
 aside .side-widget h4:after,  aside .sidebar-box h4:after {
    background: <?php echo esc_attr($sidebar_title_color); ?>;
}
 aside .side-widget h4:before,  aside .sidebar-box h4:before {
	border-top-color: <?php echo esc_attr($sidebar_title_color); ?>;
    border-top: 5px solid <?php echo esc_attr($sidebar_title_color); ?>;
}
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


<?php if(pantograph_get_option('img_top_cat_bg_style') == '2'){ ?>
.small-title.cat{
    background: <?php echo esc_attr($global_color); ?>;
	padding: 10px !important;
}
.small-title.cat a:hover{
	color: #333;
}
.post-excerpt .small-title.cat{
	background: transparent;
	padding: 0 !important;
}
<?php } elseif(pantograph_get_option('img_top_cat_bg_style') == '3'){ ?>
.small-title.cat{
	background: -moz-linear-gradient(bottom,rgba(0,0,0,0) 0,rgba(0,0,0,.40));
    background: -webkit-gradient(linear,left bottom,left top,color-stop(0,rgba(0,0,0,0)),color-stop(100%,rgba(0,0,0,.40)));
    background: -webkit-linear-gradient(bottom,rgba(0,0,0,0) 0,rgba(0,0,0,.40));
    background: -o-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.40));
    background: -ms-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.40));
    background: linear-gradient(to top,rgba(0,0,0,0) 0,rgba(0,0,0,.40));
}
.post-excerpt .small-title.cat{
	background: transparent;
}
<?php } elseif(pantograph_get_option('img_top_cat_bg_style') == '4'){ ?>
.post-thumb .small-title {
    font-size: 11px;
}
.small-title.cat {
	background: <?php echo esc_attr($global_color); ?>;
    padding: 2px 5px !important;
    text-transform: none;
	letter-spacing: 0.5px;
}
.post-excerpt .small-title.cat{
	background: transparent;
	padding: 0 !important;
}
.home-slider .small-title.cat{
	padding: 2px 7px !important;
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
background: url(<?php echo esc_url( get_template_directory_uri() ).'/img/openquote1.gif'; ?>) no-repeat;
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
	max-width: 1200px;
    margin: 0 auto;
}
.header7 .newmenu .container{
	background: <?php echo esc_attr($menu_bg_for_4_5); ?> !important;
}
<?php } ?>
<?php if($footer_border_colors!=''){ //Footer colors ?>
.footer3 .footer-links li, .footer-content{
	border-bottom: 1px solid rgba(<?php echo pantograph_hex2RGB_convert($footer_border_colors, true);?>,.1) !important;
}
<?php } if($footer_link_colors!=''){ ?>
.footer-links li a{
	color: <?php echo esc_attr($footer_link_colors); ?>;
}
<?php } if($footer_title_colors!=''){ ?>
footer .footer-content h5 {
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
<?php } ?>
@media only screen and (min-width: 768px){
header .navbar-brand{
	padding-top: <?php echo esc_attr($pantograph_logo_top_padding); //default 5px ?> !important;
	padding-bottom: <?php echo esc_attr($pantograph_logo_bottom_padding); //default 5px ?> !important;
	padding-left: <?php echo esc_attr($pantograph_logo_left_padding); //default 15px ?> !important;
	padding-right: <?php echo esc_attr($pantograph_logo_right_padding); //default 15px ?> !important;
	max-width: <?php echo esc_attr($pantograph_logo_max_width); //default 285px ?> !important;
}
}
</style>
<?php }
add_action( 'wp_head', 'pantograph_styles_custom', 100 );
 ?>