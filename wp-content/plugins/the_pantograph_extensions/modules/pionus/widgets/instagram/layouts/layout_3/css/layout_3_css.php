<?php 
if($padding_on=='no'){
	$padding = 0; 
	$smallmargin = 0;
	$thumbnailmargin = 0;
	$originalmargin = 0;
	$largemargin = 0;
	}else{
	$padding = '0 8px 0'; 
	$smallmargin = '1px';
	$thumbnailmargin = '4px';
	$originalmargin = '1px';
	$largemargin = '5px';
	}
if($padding_on=='no'){
	
}	
if($size=='small'){
echo '.pionusnews_instagram ul.instagram-photo-size-small.layout_3.full_width li{
	padding: '.esc_attr($padding).';
	width: '.esc_attr($img_width).';
	float: left;
	border: none;
}
.pionusnews_instagram ul.instagram-photo-size-small.layout_3.quarter li{
    padding: '.esc_attr($padding).';
	margin-bottom: '.esc_attr($smallmargin).';
	width: 25%;
    float: left;
	border: none;
	height: 73px;
}
';
}
if($size=='thumbnail'){ 
echo '
.pionusnews_instagram ul.instagram-photo-size-thumbnail.layout_3.full_width li{
	padding: '.esc_attr($padding).';
	width: '.esc_attr($img_width).';
	float: left;
	border: none;
}
.pionusnews_instagram ul.instagram-photo-size-thumbnail.layout_3.quarter li{
    padding: '.esc_attr($padding).';
	margin-bottom: '.esc_attr($thumbnailmargin).';
	width: 33.33333333%;
    float: left;
	border: none;
	height: 95px;
}
.pionusnews_instagram ul.instagram-photo-size-thumbnail.layout_3.quarter li a img:hover,
.pionusnews_instagram ul.instagram-photo-size-thumbnail.layout_3.quarter li a:hover img{
	height: 99px;
}
';
}
if($size=='original'){ 
echo '
.pionusnews_instagram ul.instagram-photo-size-original.layout_3.full_width li{
	padding: '.esc_attr($padding).';
	width: '.esc_attr($img_width).';
	float: left;
	border: none;    
	height: 148px;
}
.pionusnews_instagram ul.instagram-photo-size-original.layout_3.quarter li{
    padding: '.esc_attr($padding).';
	margin-bottom: '.esc_attr($originalmargin).';
	width: 50%;
    float: left;
	border: none;    
	height: 148px;
}
';
}
if($size=='large'){
echo '.pionusnews_instagram ul.instagram-photo-size-large.layout_3.full_width li{
	padding: '.esc_attr($padding).';
	width: '.esc_attr($img_width).';
	float: left;
	border: none;
}
.pionusnews_instagram ul.instagram-photo-size-large.layout_3.quarter li{
    padding: '.esc_attr($padding).';
	margin-bottom: '.esc_attr($largemargin).';
	width: 100%;
    float: left;
	border: none;
	height: 295px;
}
';
} 