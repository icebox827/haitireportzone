<?php
/*-----------------------------------------------------------------------------------*/
/* Creating Shortcodes in order to use in the Visual Composer Page builder plugin */
/*-----------------------------------------------------------------------------------*/
/******************
Post Categories List
******************/
function pantograph_post_categories(){
   $pantograph_categories = array();
   $post_categories=get_categories(array(
    'hide_empty' => false
	) );
	if (is_array($post_categories) || is_object($post_categories))
	{
     foreach($post_categories as $category) { 
        $pantograph_categories[$category->name] = $category->name;
        //$pantograph_categories[$category->name] = $category->cat_ID;
	} 
   }
   return $pantograph_categories;  
}

/******************
Post Categories List By ID
******************/
function pantograph_post_categories_ID(){
   $pantograph_categories = array();
   $post_categories=get_categories(array(
    'hide_empty' => false
	) );
    if (is_array($post_categories) || is_object($post_categories))
	{
	 foreach($post_categories as $category) { 
        $pantograph_categories[$category->name] = $category->cat_ID;
        //$pantograph_categories[$category->name] = $category->cat_ID;
	} 
   }
   return $pantograph_categories;  
}

/******************
Default category name
******************/

function pantograph_default_category(){
   $categories = get_the_category();
	$default_category = array();
	if ( ! empty( $categories ) ) {
		$default_category = $categories[0]->name;   
	}
	return $default_category;
}

/*****************
Home Slider Post List
*****************/
function pantograph_home_slider_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'post_style' => 1,
        'itemcount' => 3,
        'orderby' => 'title',
        'order' => 'DESC',
		'slider_height' => '',
		'bgimg_coming' => 'no',
		'r_d_overlay' => 'no',
		'blockcolor' => '#33CCFF',
		'left_margin' => '0px',
		'right_margin' => '0px',
), $atts) );

		if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
		$random_number = mt_rand(100,10000);

$list = '<div class="home-slider-wrap class'.$left_margin.$right_margin.'">
		<div class="home-slider home-slider'.$random_number.'">';
		$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
while ($the_query->have_posts()) : $the_query->the_post();
$idd = get_the_ID();
$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
if($featured_img){
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
}else{
	$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
}
$primary_category = '';
$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
if($primary_category){
	$primary_category_name = get_cat_name( $primary_category );
	$category_link = get_category_link( $primary_category );
	$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
}else{
	$primary_category_link = get_the_category_list(', ');
}
		
$list .='<div>
			<article class="style3 single ';if($post_style!=2){ $list .='text-center '; } $list .='no-margin">
					<div class="overlay overlay-02"';if($r_d_overlay!='no'){ $list .=' style="background:transparent;"'; } $list .='></div>
					<div class="post-thumb">
						<div class="';if($post_style!=2){ $list .='container'; } $list .='">
						';if($post_style==2){ $list .='<div class="small-title cat">' . $primary_category_link . '</div>'; } $list .='
						<div class="post-excerpt">
							';if($post_style!=2){ $list .='<div class="small-title cat">' . $primary_category_link . '</div>'; }
							if($post_style==2){ $list .='
							<div class="meta">
								<span>'.get_the_time('M j, Y').'</span>
							</div>'; } $list .='
							<h3 class="h1 text-white"><a style="color:inherit; text-decoration:none; font-size:inherit;" href="'.get_permalink().'">' . get_the_title() . '</a></h3>
							<div class="meta">
								<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>';
								if($post_style!=2){ $list .='
								<span>on '.get_the_time('M j, Y').'</span>';
								} if($post_style==2){ $list .='
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).'</span>';
								} $list .='
							</div>';
							if($post_style!=2){ $list .='
							<div class="meta">
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).'</span>
							</div>';
							} $list .='

						</div>
						</div>
						';
							if($bgimg_coming=='no'){ $list .='
						<div class="beforethumbnail460"';if($slider_height){ $list .=' style="height:'.$slider_height.'"'; } $list .='>
							<div class="thumbnail460" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1; ';if($slider_height){ $list .=' height:'.$slider_height.';'; } $list .='"></div>
						</div>';
							} else { $list .='
							<img src="'.$featured_img_url.'" class="bg-img img-responsive" alt="">
							';
							} $list .='
					</div>
			</article>
		</div>';
		endwhile;
$list .='</div>

		<div class="hs-prev hs-prev'.$random_number.'"><i class="fa fa-angle-left"></i></div>
		<div class="hs-next hs-next'.$random_number.'"><i class="fa fa-angle-right"></i></div>

		</div>';
		if($post_style==2){
$list .='<div><style>
			.home-slider article.style3.single .post-excerpt {
				position: absolute;
				bottom: 0;
				left: unset;
				padding: 20px;
				z-index: 11;
				top: unset;
				transform: none;
			}
			.slick-slide .post-excerpt h3.h1.text-white {
				font-size: 22px;
				line-height: 30px;
				margin-top: 5px !important;
				margin-bottom: 15px;
			}
			.home-slider .style3.single .cat {
				position: absolute;
			}
			.home-slider .small-title.cat {
				padding: 10px 20px !important;
			}
			.home-slider .thumbnail460:after {
				background: -moz-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.60));
				background: -webkit-gradient(linear,left top,left bottom,color-stop(0,rgba(0,0,0,0)),color-stop(100%,rgba(0,0,0,.60)));
				background: -webkit-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.60));
				background: -o-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.60));
				background: -ms-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.60));
				background: linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,.60));
				top: auto;
				height: 50%;
					-webkit-transition: all .35s ease;
				-moz-transition: all .35s ease;
				-o-transition: all .35s ease;
				transition: all .35s ease;
				content: "";
				position: absolute;
				top: auto;
				left: 0;
				right: 0;
				bottom: 0;
			}
		</style></div>'; }
		$list .='';
		if($blockcolor){
		$list .='
		<div><style>
			.home-slider h3.h1.text-white a:hover {
				color :'.$blockcolor.'!important;
			}
			.home-slider .cat a:hover {
				color :'.$blockcolor.'!important;
			}

		</style></div>';
		} $list .='<script>
						jQuery(function($) {
							$(".home-slider'.$random_number.'").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: $(".hs-prev'.$random_number.'"),
        nextArrow: $(".hs-next'.$random_number.'")
    });
							});
						 </script>';
		if((!empty($left_margin)) || (!empty($right_margin))){
		$list .='
		<div><style>
			@media only screen and (min-width: 768px){
			.home-slider-wrap.class'.$left_margin.$right_margin.' {
				margin-right : '.$right_margin.' !important;
				margin-left : '.$left_margin.' !important;
			}
			}
		</style></div>';
		}
wp_reset_postdata();
return $list;
}
add_shortcode('pantograph_home_slider', 'pantograph_home_slider_shortcode');

/*****************
Shortcode For Category Post List 
*****************/

function pantograph_category_post_list_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
), $atts) );
$q = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category,
)
); 

$list = '<div class="row">';
while($q->have_posts()) : $q->the_post();
$idd = get_the_ID();
$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
if($featured_img){
	if ( new_wp_is_mobile() ) {
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
	} else {
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
	}
}else{
	$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
}
$list .= '

<div class="col-md-3">
	<div class="header-post">
		<a href="'.get_permalink().'">
			<div class="beforethumbnail148">
				<div class="thumbnail148 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
			</div>
		</a>
		<div class="date">'.get_the_time('M j, Y').'</div>
		<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
		<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
	</div>
</div>
'; 
endwhile;


$list.= '</div>';

wp_reset_postdata();
return $list;
}
add_shortcode('pantograph_category_post_list', 'pantograph_category_post_list_shortcode');


/*****************
Shortcode For Category Tab Post List 
*****************/

function pantograph_category_tab_post_list_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'heading1' => '',
        'heading2' => '',
        'heading3' => '',
        'heading4' => '',
        'heading5' => '',
        'heading6' => '',
        'heading7' => '',
        'heading8' => '',
        'category1' => pantograph_default_category(),
        'category2' => pantograph_default_category(),
        'category3' => pantograph_default_category(),
        'category4' => pantograph_default_category(),
        'category5' => pantograph_default_category(),
        'category6' => pantograph_default_category(),
        'category7' => pantograph_default_category(),
        'category8' => pantograph_default_category()
), $atts) );
$q1 = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category1,
)
);

$q2 = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category2,
)
); 
$q3 = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category3,
)
); 
$q4 = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category4,
)
);  

$q5 = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category5,
)
);

$q6 = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category6,
)
); 
$q7 = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category7,
)
); 
$q8 = new WP_Query(
array(
		'post_type' => $type,
        'posts_per_page' => 4,
        'category_name' => $category8,
)
);

$list = '<div class="row">';


$list .= '
<div class="col-md-3 tabsitem no-padding">
	<ul class="tabs-menu">';
	if($heading1){
	$list .= '<li class="current"><a href="#tab-1">'.esc_attr( $heading1 ).'</a></li>';
	}
	
	if($heading2){
	$list .= '<li><a href="#tab-2">'.esc_attr( $heading2 ).'</a></li>';
	}
	
	if($heading3){
	$list .= '<li><a href="#tab-3">'.esc_attr( $heading3 ).'</a></li>';
	}
	
	if($heading4){
	$list .= '<li><a href="#tab-4">'.esc_attr( $heading4 ).'</a></li>';
	}
	
	if($heading5){
	$list .= '<li><a href="#tab-5">'.esc_attr( $heading5 ).'</a></li>';
	}
	
	if($heading6){
	$list .= '<li><a href="#tab-6">'.esc_attr( $heading6 ).'</a></li>';
	}
	
	if($heading7){
	$list .= '<li><a href="#tab-7">'.esc_attr( $heading7 ).'</a></li>';
	}
	
	if($heading8){
	$list .= '<li><a href="#tab-8">'.esc_attr( $heading8 ).'</a></li>';
	}
	
	$list .= '
	</ul>										
</div>

<div class="col-md-9 tabsitemcontent">
	<div class="tab">
		<div id="tab-1" class="tab-contents">';
		while($q1->have_posts()) : $q1->the_post();
			$idd = get_the_ID();
			$featured_img1 = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img1){
				$featured_img_url1 = get_the_post_thumbnail_url(get_the_ID(),'medium');
			}else{
				$featured_img_url1 = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '

			<div class="col-md-3">
				<div class="header-post">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail118">
							<div class="thumbnail118 bg-img" style="background-image: url('.esc_url($featured_img_url1).'); opacity: 1;"></div>
						</div>
					</a>
					<div class="date">'.get_the_time('M j, Y').'</div>
					<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
					<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
				</div>
			</div>
			'; 
		endwhile;

		
		$list .= '			
		</div>
		
		<div id="tab-2" class="tab-contents">';
		while($q2->have_posts()) : $q2->the_post();
			$idd = get_the_ID();
			$featured_img2 = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img2){
				$featured_img_url2 = get_the_post_thumbnail_url(get_the_ID(),'medium');
			}else{
				$featured_img_url2 = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '

			<div class="col-md-3">
				<div class="header-post">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail118">
							<div class="thumbnail118 bg-img" style="background-image: url('.esc_url($featured_img_url2).'); opacity: 1;"></div>
						</div>
					</a>
					<div class="date">'.get_the_time('M j, Y').'</div>
					<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
					<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
				</div>
			</div>
			'; 
		endwhile;	
		$list .= '		
		</div>

		<div id="tab-3" class="tab-contents">';
		while($q3->have_posts()) : $q3->the_post();
			$idd = get_the_ID();
			$featured_img3 = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img3){
				$featured_img_url3 = get_the_post_thumbnail_url(get_the_ID(),'medium');
			}else{
				$featured_img_url3 = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '

			<div class="col-md-3">
				<div class="header-post">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail118">
							<div class="thumbnail118 bg-img" style="background-image: url('.esc_url($featured_img_url3).'); opacity: 1;"></div>
						</div>
					</a>
					<div class="date">'.get_the_time('M j, Y').'</div>
					<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
					<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
				</div>
			</div>
			'; 
		endwhile;	
		$list .= '		
		</div>	

		<div id="tab-4" class="tab-contents">';
			while($q4->have_posts()) : $q4->the_post();
			$idd = get_the_ID();
			$featured_img4 = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img4){
				$featured_img_url4 = get_the_post_thumbnail_url(get_the_ID(),'medium');
			}else{
				$featured_img_url4 = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '

			<div class="col-md-3">
				<div class="header-post">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail118">
							<div class="thumbnail118 bg-img" style="background-image: url('.esc_url($featured_img_url4).'); opacity: 1;"></div>
						</div>
					</a>
					<div class="date">'.get_the_time('M j, Y').'</div>
					<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
					<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
				</div>
			</div>
			'; 
		endwhile;
		$list .= '			
		</div>
		<div id="tab-5" class="tab-contents">';
		while($q5->have_posts()) : $q5->the_post();
			$idd = get_the_ID();
			$featured_img5 = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img5){
				$featured_img_url5 = get_the_post_thumbnail_url(get_the_ID(),'medium');
			}else{
				$featured_img_url5 = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '

			<div class="col-md-3">
				<div class="header-post">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail118">
							<div class="thumbnail118 bg-img" style="background-image: url('.esc_url($featured_img_url5).'); opacity: 1;"></div>
						</div>
					</a>
					<div class="date">'.get_the_time('M j, Y').'</div>
					<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
					<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
				</div>
			</div>
			'; 
		endwhile;

		
		$list .= '			
		</div>
		
		<div id="tab-6" class="tab-contents">';
		while($q6->have_posts()) : $q6->the_post();
			$idd = get_the_ID();
			$featured_img6 = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img6){
				$featured_img_url6 = get_the_post_thumbnail_url(get_the_ID(),'medium');
			}else{
				$featured_img_url6 = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '

			<div class="col-md-3">
				<div class="header-post">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail118">
							<div class="thumbnail118 bg-img" style="background-image: url('.esc_url($featured_img_url6).'); opacity: 1;"></div>
						</div>
					</a>
					<div class="date">'.get_the_time('M j, Y').'</div>
					<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
					<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
				</div>
			</div>
			'; 
		endwhile;	
		$list .= '		
		</div>

		<div id="tab-7" class="tab-contents">';
		while($q7->have_posts()) : $q7->the_post();
			$idd = get_the_ID();
			$featured_img7 = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img7){
				$featured_img_url7 = get_the_post_thumbnail_url(get_the_ID(),'medium');
			}else{
				$featured_img_url7 = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '

			<div class="col-md-3">
				<div class="header-post">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail118">
							<div class="thumbnail118 bg-img" style="background-image: url('.esc_url($featured_img_url7).'); opacity: 1;"></div>
						</div>
					</a>
					<div class="date">'.get_the_time('M j, Y').'</div>
					<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
					<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
				</div>
			</div>'; 
		endwhile;	
		$list .= '		
		</div>	

		<div id="tab-8" class="tab-contents">';
			while($q8->have_posts()) : $q8->the_post();
			$idd = get_the_ID();
			$featured_img8 = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img8){
				$featured_img_url8 = get_the_post_thumbnail_url(get_the_ID(),'medium');
			}else{
				$featured_img_url8 = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '
			<div class="col-md-3">
				<div class="header-post">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail118">
							<div class="thumbnail118 bg-img" style="background-image: url('.esc_url($featured_img_url8).'); opacity: 1;"></div>
						</div>
					</a>
					<div class="date">'.get_the_time('M j, Y').'</div>
					<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
					<p class="hidden-xs">' . pantograph_excerpt(20) . '</p>
				</div>
			</div>
			'; 
		endwhile;
		$list .= '			
		</div>		
	</div>
</div>';

$list.= '</div>';

wp_reset_postdata();
return $list;
}
add_shortcode('pantograph_category_tab_post_list', 'pantograph_category_tab_post_list_shortcode');


/*****************
Post Block 1 Post List 
*****************/

function pantograph_post_block_1_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
        'taboption' => 'no',
        'toptabcategory' => '',
        'dropdowntabcategory' => '',
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'loadercolor' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blocksubtabbackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			if($blockcolor==''){ $loadercolor='#33CCFF';}else{$loadercolor=$blockcolor;}
			
			if($large_post_title_limit==''){ $large_post_title_limit=100;}else{$large_post_title_limit=$large_post_title_limit;}
			if($large_post_excerpt_limit==''){ $large_post_excerpt_limit=15;}else{$large_post_excerpt_limit=$large_post_excerpt_limit;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
			if($blockhovercolor){
			include('css/colors/p1/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p1/dependent-blockcolor.php');
				}
			}
			
			if($blockcolor){
				include('css/colors/p1/blockcolor.php');
			}
			}

			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p1/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p1/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p1/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p1/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p1/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p1/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p1/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p1/blockdatecolor.php');
			}
			if($blocksubtabbackground){
				include('css/colors/p1/blocksubtabbackground.php');
			}
			}
			
			
			$list = '';
			$list .= '<div class="post_block_1 post_block_1'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<div class="titleh3 margin-bottom-20"><b>'.$heading.'</b>';
				if($taboption=='yes'){
			$list .='<div class="pull-right">
				<ul class="nav nav-tabs">';
				$alltopitems = explode(',', $toptabcategory);
				$i = 0;
				if (is_array($alltopitems) || is_object($alltopitems))
				{
				foreach ($alltopitems as $topitem) {
					$topcatname = get_cat_name( $topitem );
					if ($i == 0) {
						$list .='<li class="active"><a href="#'.$current_time.$topitem.'" data-toggle="tab">'.$topcatname.'</a></li>';	
					}else{
						$list .='<li><a href="#'.$current_time.$topitem.'" data-toggle="tab">'.$topcatname.'</a></li>';		
					}
					$i++;
				}
				}
		$list .='<li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle">All <i class="caret"></i></a>
					<ul class="dropdown-menu">';
					$alldropdownitems = explode(',', $dropdowntabcategory);
					if (is_array($alldropdownitems) || is_object($alldropdownitems))
					{
					foreach ($alldropdownitems as $dropdownitem) {
						$dropdowncatname = get_cat_name( $dropdownitem );
						$list .='<li><a href="#'.$current_time.$dropdownitem.'mdiffer" data-toggle="tab">'.$dropdowncatname.'</a></li>';		
					}	
					}
			$list .='</ul>
				</li>
			</ul>
		</div>';
			}
			$list .='</div>';
			}			
			if($taboption=='yes'){
			$list .='<div class="tab-content">';
			$alltopitems = explode(',', $toptabcategory);
			$i = 0;
			if (is_array($alltopitems) || is_object($alltopitems))
			{
			foreach ($alltopitems as $topitem) {
				$topcatname = get_cat_name( $topitem );
				if ($i == 0) {
					$list .='<div class="tab-pane active" id="'.$current_time.$topitem.'">';
					/* Start Tab Conent */
					if($nextprevbtn=='yes'){
					$list .= '<div class="fixedheight-to-loader-home_section_1">';
					}else{
					$list .= '<div class="noloader">';
					}
	   $list .= '<div class="loader'.$current_time.'" style="display:none;"></div>
					<div id="mynewcontent'.$current_time.$topitem.'">
					<div class="row">
					<div class="col-md-6">';
					global $wp_query, $paged;			
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
					elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
					else { $paged = 1; }
					
						
					if($large_post_id==''){
						$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
					}else{
						$args = array('p' => $large_post_id, 'post_type' => 'any');
					}
					$post_array_new = array();	
					$wp_query1 = new WP_Query( $args );
					/*Pagination Fix*/
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $wp_query1;
					/*Pagination Fix end*/
					if ($wp_query1->have_posts()) :  while ($wp_query1->have_posts()) : $wp_query1->the_post();
					$idd = get_the_ID();
					$idd = array($idd);	
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<article class="article-home sectiononestyle1 style-alt">
								<div class="col-md-12 no-padding">
								'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
								</div>
								<div class="post-excerpt">
									<div class="small-title cat">' . $primary_category_link . '</div>
									<h4><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h4>
									<div class="meta">
										<span>by '.get_the_author_posts_link().'</span>
										<span>on '.get_the_time('M j, Y').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									<p>' . pantograph_excerpt($wordlimit) . '</p>
								</div>
							</article>';
					endwhile; endif;
							
					$list .= '</div>
						
						<div class="col-md-6">
							<div class="mini-posts">
						';
					$arr1 = array($post_array_new);
					$ar = array_merge($arr1);
					$showpost_item = $itemcount - 1;		
					if (empty($idd)) {			
					$args = array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
					}else{
					$args = array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
					}
					$wp_query2 = new WP_Query( $args );
					while ($wp_query2->have_posts()) : $wp_query2->the_post();
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
					if ( new_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
					}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '
								<article class="style2 style-alt">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="col-md-12 no-padding">
											'.$videoicon.'
												<a href="'.get_permalink().'">
													<div class="beforethumbnail">
														<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-md-8 col-sm-8">
											<div class="post-excerpt no-padding">
												<div class="meta">
													<span>'.get_the_time('M j, Y').'</span>
												</div>
												<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>';
												if(get_comments_number()>0){
										$list.= '<div class="meta">
													<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
												</div>';
												}
									$list.= '</div>
										</div>
									</div>
								</article>
							
					'; 
					endwhile;
					wp_reset_postdata();

					$list.= '</div>
					</div>
					</div>
					';
					if($nextprevbtn=='yes'){
					$list .='<div class="row">';
					$list .='<div id="mynewpagination'.$current_time.$topitem.'" class="vcelement_pagination">';
					$prev_link = get_previous_posts_link();
					$next_link = get_next_posts_link();
					
					if($prev_link){ 
					$list .='<b class="next-link">'.get_previous_posts_link('Prev').'</b>';
					}else{ 
					$list .='<b class="next-link disabled">Prev</b>';
					} 
					if($next_link){
					$list .='<b class="prev-link">'.get_next_posts_link('Next').'</b>';
					}else{ 	
					$list .='<b class="prev-link disabled"> Next</b>';
					} 				
					$list .='</div>';
					$list .='</div>';
					
					$list .='<script>
						jQuery(function($) {
							$("#mynewcontent'.$current_time.$topitem.'").on("click", "#mynewpagination'.$current_time.$topitem.' a", function(e){
								e.preventDefault();
								$(".loader'.$current_time.'").show();
								var link = $(this).attr("href");
								$("#mynewcontent'.$current_time.$topitem.'").fadeOut("slow", function(){
									$(this).load(link + " #mynewcontent'.$current_time.$topitem.'", function() {
										$(this).fadeIn("slow");
										$(".loader'.$current_time.'").hide();
									});
								});
							});
							});
						 </script>
						 <div><style>';
					 $list .='.loader'.$current_time.' {
								border: 16px solid #f3f3f3;
								border-radius: 50%;
								border-top: 16px solid '.$loadercolor.';
								width: 120px;
								height: 120px;
								margin: 0 auto;
								-webkit-animation: spin 2s linear infinite;
								animation: spin 2s linear infinite;
								position: absolute;
								z-index: 999;
								left: 42%;
								top: 27%;
							}';
						$list .='</style></div>';				
						}
						// Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;

					
					$list .='</div>';
					$list .='</div>';
					/* End Tab Conent */
					$list .='</div>';
				}else{
					$list .='<div class="tab-pane" id="'.$current_time.$topitem.'">';
					/* Start Tab Conent */
					if($nextprevbtn=='yes'){
					$list .= '<div class="fixedheight-to-loader-home_section_1">';
					}else{
					$list .= '<div class="noloader">';
					}
	   $list .= '<div class="loader'.$current_time.'" style="display:none;"></div>
					<div id="mynewcontent'.$current_time.$topitem.'">
					<div class="row">
					<div class="col-md-6">';
					global $wp_query, $paged;			
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
					elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
					else { $paged = 1; }
					
						
					if($large_post_id==''){
						$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
					}else{
						$args = array('p' => $large_post_id, 'post_type' => 'any');
					}
					$post_array_new = array();	
					$wp_query3 = new WP_Query( $args );
					/*Pagination Fix*/
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $wp_query3;
					/*Pagination Fix end*/
					if ($wp_query3->have_posts()) :  while ($wp_query3->have_posts()) : $wp_query3->the_post();
					$post_array_new[] = get_the_ID();	
					$idd = get_the_ID();
					$idd = array($idd);	
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<article class="article-home sectiononestyle1 style-alt">
								<div class="col-md-12 no-padding">
								'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
								</div>
								<div class="post-excerpt">
									<div class="small-title cat">' . $primary_category_link . '</div>
									<h4><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h4>
									<div class="meta">
										<span>by '.get_the_author_posts_link().'</span>
										<span>on '.get_the_time('M j, Y').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									<p>' . pantograph_excerpt($wordlimit) . '</p>
								</div>
							</article>';
					endwhile; endif;
							
					$list .= '</div>
						
						<div class="col-md-6">
							<div class="mini-posts">
						';
					$arr1 = array($post_array_new);
					$ar = array_merge($arr1);
					$showpost_item = $itemcount - 1;		
					if (empty($idd)) {			
					$args = array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
					}else{
					$args = array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
					}
					$wp_query4 = new WP_Query( $args );
					while ($wp_query4->have_posts()) : $wp_query4->the_post();
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:	
						$videoicon = '';
					endif;
					$list .= '
								<article class="style2 style-alt">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="col-md-12 no-padding">
											'.$videoicon.'
												<a href="'.get_permalink().'">
													<div class="beforethumbnail">
														<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-md-8 col-sm-8">
											<div class="post-excerpt no-padding">
												<div class="meta">
													<span>'.get_the_time('M j, Y').'</span>
												</div>
												<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>';
												if(get_comments_number()>0){
										$list.= '<div class="meta">
													<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
												</div>';
												}
									$list.= '</div>
										</div>
									</div>
								</article>
							
					'; 
					endwhile;
					wp_reset_postdata();

					$list.= '</div>
					</div>
					</div>
					';
					if($nextprevbtn=='yes'){
					$list .='<div class="row">';
					$list .='<div id="mynewpagination'.$current_time.$topitem.'" class="vcelement_pagination">';
					$prev_link = get_previous_posts_link();
					$next_link = get_next_posts_link();
					
					if($prev_link){ 
					$list .='<b class="next-link">'.get_previous_posts_link('Prev').'</b>';
					}else{ 
					$list .='<b class="next-link disabled">Prev</b>';
					} 
					if($next_link){
					$list .='<b class="prev-link">'.get_next_posts_link('Next').'</b>';
					}else{ 	
					$list .='<b class="prev-link disabled"> Next</b>';
					} 				
					$list .='</div>';
					$list .='</div>';
					
					$list .='<script>
						jQuery(function($) {
							$("#mynewcontent'.$current_time.$topitem.'").on("click", "#mynewpagination'.$current_time.$topitem.' a", function(e){
								e.preventDefault();
								$(".loader'.$current_time.'").show();
								var link = $(this).attr("href");
								$("#mynewcontent'.$current_time.$topitem.'").fadeOut("slow", function(){
									$(this).load(link + " #mynewcontent'.$current_time.$topitem.'", function() {
										$(this).fadeIn("slow");
										$(".loader'.$current_time.'").hide();
									});
								});
							});
							});
						 </script>';
					$list .='<div><style>';
					$list .='.loader'.$current_time.' {
								border: 16px solid #f3f3f3;
								border-radius: 50%;
								border-top: 16px solid '.$loadercolor.';
								width: 120px;
								height: 120px;
								margin: 0 auto;
								-webkit-animation: spin 2s linear infinite;
								animation: spin 2s linear infinite;
								position: absolute;
								z-index: 999;
								left: 42%;
								top: 27%;
							}';
					$list .='</style></div>';				
						}
					// Reset main query object
					$wp_query = NULL;
					$wp_query = $temp_query;
					$list .='</div>';
					$list .='</div>';
					/* End Tab Conent */
					$list .='</div>';
				}
				$i++;
			}
			}
			
			$alldropdownitems = explode(',', $dropdowntabcategory);
			if (is_array($alldropdownitems) || is_object($alldropdownitems))
			{
			foreach ($alldropdownitems as $dropdownitem) {
				$dropdowncatname = get_cat_name( $dropdownitem );
				$list .='<div class="tab-pane" id="'.$current_time.$dropdownitem.'mdiffer">';
				
				/* Start Tab Conent */
					if($nextprevbtn=='yes'){
					$list .= '<div class="fixedheight-to-loader-home_section_1">';
					}else{
					$list .= '<div class="noloader">';
					}
	   $list .= '<div class="loader'.$current_time.'" style="display:none;"></div>
				<div id="mynewcontent'.$current_time.$dropdownitem.'mdiffer">
					<div class="row">
						<div class="col-md-6">';
					global $wp_query, $paged;			
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
					elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
					else { $paged = 1; }
					
						
					if($large_post_id==''){
						$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 1, 'category_name' => $dropdowncatname, 'orderby' => $orderby, 'order' => $order);
					}else{
						$args = array('p' => $large_post_id, 'paged' => $paged, 'post_type' => 'any');
					}
					$post_array_new = array();	
					$wp_query5 = new WP_Query( $args );
					/*Pagination Fix*/
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $wp_query5;
					/*Pagination Fix end*/
					if ($wp_query5->have_posts()) :  while ($wp_query5->have_posts()) : $wp_query5->the_post();
					$idd = get_the_ID();
					$post_array_new[] = get_the_ID();	
					$idd = get_the_ID();
					$idd = array($idd);	
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<article class="article-home sectiononestyle1 style-alt">
								<div class="col-md-12 no-padding">
								'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
								</div>
								<div class="post-excerpt">
									<div class="small-title cat">' . $primary_category_link . '</div>
									<h4><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h4>
									<div class="meta">
										<span>by '.get_the_author_posts_link().'</span>
										<span>on '.get_the_time('M j, Y').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									<p>' . pantograph_excerpt($wordlimit) . '</p>
								</div>
							</article>';
					endwhile; endif;
							
					$list .= '</div>
						
						<div class="col-md-6">
							<div class="mini-posts">
						';
					$arr1 = array($post_array_new);
					$ar = array_merge($arr1);
					$showpost_item = $itemcount - 1;
					if (empty($idd)) {						
					$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => $showpost_item, 'category_name' => $dropdowncatname, 'orderby' => $orderby, 'order' => $order);
					}else{
					$args = array('post_type' => 'post', 'paged' => $paged, 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $dropdowncatname, 'orderby' => $orderby, 'order' => $order);
					}
					$wp_query6 = new WP_Query( $args );
					if ($wp_query6->have_posts()) :  while ($wp_query6->have_posts()) : $wp_query6->the_post();
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '
								<article class="style2 style-alt">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="col-md-12 no-padding">
											'.$videoicon.'
												<a href="'.get_permalink().'">
													<div class="beforethumbnail">
														<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-md-8 col-sm-8">
											<div class="post-excerpt no-padding">
												<div class="meta">
													<span>'.get_the_time('M j, Y').'</span>
												</div>
												<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h5>';
												if(get_comments_number()>0){
										$list.= '<div class="meta">
													<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
												</div>';
												}
									$list.= '</div>
										</div>
									</div>
								</article>
							
					'; 
					endwhile; endif;
					wp_reset_postdata();
					$list .='</div>';
					$list.= '</div>
					</div>
					';
					if($nextprevbtn=='yes'){
					$list .='<div class="row">';
					$list .='<div id="mynewpagination'.$current_time.$dropdownitem.'mdiffer" class="vcelement_pagination">';
					$prev_link = get_previous_posts_link();
					$next_link = get_next_posts_link();
					
					if($prev_link){ 
					$list .='<b class="next-link">'.get_previous_posts_link('Prev').'</b>';
					}else{ 
					$list .='<b class="next-link disabled">Prev</b>';
					} 
					if($next_link){
					$list .='<b class="prev-link">'.get_next_posts_link('Next').'</b>';
					}else{ 	
					$list .='<b class="prev-link disabled"> Next</b>';
					} 				
					$list .='</div>';
					$list .='</div>';
					
					$list .='<script>
					jQuery(function($) {
					$("#mynewcontent'.$current_time.$dropdownitem.'mdiffer").on("click", "#mynewpagination'.$current_time.$dropdownitem.'mdiffer a", function(e){
						e.preventDefault();
						$(".loader'.$current_time.'").show();
						var link = $(this).attr("href");
						$("#mynewcontent'.$current_time.$dropdownitem.'mdiffer").fadeOut("slow", function(){
							$(this).load(link + " #mynewcontent'.$current_time.$dropdownitem.'mdiffer", function() {
								$(this).fadeIn("slow");
								$(".loader'.$current_time.'").hide();
							});
						});
					});
					});
				 </script>';
			$list .='<div><style>';
			$list .='.loader'.$current_time.' {
						border: 16px solid #f3f3f3;
						border-radius: 50%;
						border-top: 16px solid '.$loadercolor.';
						width: 120px;
						height: 120px;
						margin: 0 auto;
						-webkit-animation: spin 2s linear infinite;
						animation: spin 2s linear infinite;
						position: absolute;
						z-index: 999;
						left: 42%;
						top: 27%;
					}';
			$list .='</style></div>';		
			}
			// Reset main query object
			$wp_query = NULL;
			$wp_query = $temp_query;
			
			$list .='</div>';
			$list .='</div>';
			/* End Tab Conent */
			$list .='</div>';		
			}
			}

			}else{	
			if($nextprevbtn=='yes'){
					$list .= '<div class="fixedheight-to-loader-home_section_1">';
					}else{
					$list .= '<div class="noloader">';
					}
	   $list .= '<div class="loader'.$current_time.'" style="display:none;"></div>
				<div id="mynewcontent'.$current_time.'">
				<div class="row">
				<div class="col-md-6">';
			global $wp_query, $paged;			
			if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
			elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
			else { $paged = 1; }	
			if($large_post_id==''){
				$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
			}else{
				$args = array('p' => $large_post_id, 'post_type' => 'any');
			}
			$post_array_new = array();	
			$wp_query7 = new WP_Query( $args );
			/*Pagination Fix*/
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $wp_query7;
					/*Pagination Fix end*/
			if ($wp_query7->have_posts()) :  while ($wp_query7->have_posts()) : $wp_query7->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();	
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="article-home sectiononestyle1 style-alt">
						<div class="col-md-12 no-padding">
						'.$videoicon.'
						<a href="'.get_permalink().'">
							<div class="beforegeneralstyle">
								<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</a>
						</div>
						<div class="post-excerpt">
							<div class="small-title cat">' . $primary_category_link . '</div>
							<h4><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h4>
							<div class="meta">
								<span>by '.get_the_author_posts_link().'</span>
								<span>on '.get_the_time('M j, Y').'</span>
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
							</div>
							<p>' . pantograph_excerpt($large_post_excerpt_limit) . '</p>
						</div>
					</article>';
			endwhile; endif;
					
			$list .= '</div>
				
				<div class="col-md-6">
					<div class="mini-posts">
				';
			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);
			$showpost_item = $itemcount - 1;
			if (empty($idd)) {	
				$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
			}else{
				$args = array('post_type' => 'post', 'paged' => $paged, 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
			}
			$wp_query8 = new WP_Query( $args );
			if ($wp_query8->have_posts()) :  while ($wp_query8->have_posts()) : $wp_query8->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '
						<article class="style2 style-alt">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<div class="col-md-12 no-padding">
									'.$videoicon.'
										<a href="'.get_permalink().'">
											<div class="beforethumbnail">
												<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-8 col-sm-8">
									<div class="post-excerpt no-padding">
										<div class="meta">
											<span>'.get_the_time('M j, Y').'</span>
										</div>
										<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>';
										if(get_comments_number()>0){
								$list.= '<div class="meta">
											<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
										</div>';
										}
							$list.= '</div>
								</div>
							</div>
						</article>
					
			'; 
			endwhile; endif;
			wp_reset_postdata();

			$list.= '</div>
			</div>
			';
			$list .='</div>';
			if($nextprevbtn=='yes'){
			$list .='<div class="row">';
			$list .='<div id="mynewpagination'.$current_time.'" class="vcelement_pagination">';
			$prev_link = get_previous_posts_link();
			$next_link = get_next_posts_link();
			
			if($prev_link){ 
			$list .='<b class="next-link">'.get_previous_posts_link('Prev').'</b>';
			}else{ 
			$list .='<b class="next-link disabled">Prev</b>';
			} 
			if($next_link){
			$list .='<b class="prev-link">'.get_next_posts_link('Next').'</b>';
			}else{ 	
			$list .='<b class="prev-link disabled"> Next</b>';
			} 				
			$list .='</div>';
			$list .='</div>';
			
			$list .='<script>
				jQuery(function($) {
					$("#mynewcontent'.$current_time.'").on("click", "#mynewpagination'.$current_time.' a", function(e){
						e.preventDefault();
						$(".loader'.$current_time.'").show();
						var link = $(this).attr("href");
						$("#mynewcontent'.$current_time.'").fadeOut("slow", function(){
							$(this).load(link + " #mynewcontent'.$current_time.'", function() {
								$(this).fadeIn("slow");
								$(".loader'.$current_time.'").hide();
							});
						});
					});
					});
				 </script>';
			$list .='<div><style>';
			$list .='.loader'.$current_time.' {
						border: 16px solid #f3f3f3;
						border-radius: 50%;
						border-top: 16px solid '.$loadercolor.';
						width: 120px;
						height: 120px;
						margin: 0 auto;
						-webkit-animation: spin 2s linear infinite;
						animation: spin 2s linear infinite;
						position: absolute;
						z-index: 999;
						left: 42%;
						top: 27%;
					}';
			$list .='</style></div>';		
			}
			// Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;

			$list .='</div>';	
			}
			
			$list .='</div>';
			
			$list .='</div>';
			return $list;
			}
add_shortcode('pantograph_post_block_1_post', 'pantograph_post_block_1_shortcode');


/*****************
Post Block 2 Post List 
*****************/

function pantograph_post_block_2_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=1;}else{$itemcount=$itemcount;}
			if($large_post_title_limit==''){ $large_post_title_limit=100;}else{$large_post_title_limit=$large_post_title_limit;}
			if($large_post_excerpt_limit==''){ $large_post_excerpt_limit=15;}else{$large_post_excerpt_limit=$large_post_excerpt_limit;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			$showloadmore='';
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
				if($blockhovercolor){
				include('css/colors/p2/blockhovercolor.php');
				}else{
					
					if($blockcolor){
					include('css/colors/p2/dependent-blockcolor.php');
					}
				}
				
				if($blockcategorybackground){
				include('css/colors/p2/blockcategorybackground.php');
				}
				
				if($blockcolor){
				include('css/colors/p2/blockcolor.php');
				}
				}
				if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

				if($blockheadingcolor){
				include('css/colors/p2/blockheadingcolor.php');
				} 
				if($blockheadingbackgroundcolor){
				include('css/colors/p2/blockheadingbackgroundcolor.php');	
				}
				if($blockbordercolor){
				include('css/colors/p2/blockbordercolor.php');
				}
				if($blockbackgroundcolor){
				include('css/colors/p2/blockbackgroundcolor.php');
				}
				if($blockposttitlecolor){
				include('css/colors/p2/blockposttitlecolor.php');
				}
				
				if($blocktextcolor){
				include('css/colors/p2/blocktextcolor.php');
				}
				if($blockdatecolor){
				include('css/colors/p2/blockdatecolor.php');
				}
				}
			$list = '';
			$list .= '<div class="post_block_2 post_block_2'.$current_time.' '.$blockborder.'">';
			$list .= '<div class="post_block_2_posts'.$current_time.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			if($large_post_id==''){
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();	
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();	
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style3 style-alt">
							<div class="post-thumb">
							'.$videoicon.'
								<div class="small-title cat">' . $primary_category_link . '</div>
								<div class="post-excerpt">
									<div class="meta">
										<span class="date">'.get_the_time('M j, Y').'</span>
									</div>
									<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
									<div class="meta">
										<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
										<span>on '.get_the_time('M j, Y').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
								</div>
								<div class="overlay overlay-02"></div>
								<div class="beforeonecollargestyle">
									<div class="onecollargestyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</div>
					</article>';
			endwhile;
					

			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);
			$showpost_item = $itemcount - 1;
			if($showpost_item>0){	
			if (empty($idd)) {				
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			$totalpostcount = $the_query->found_posts;
			$showloadmore = $totalpostcount - $showpost_item;
			while ($the_query->have_posts()) : $the_query->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style2">
					<div class="row">
						<div class="col-md-4 col-sm-4">
						'.$videoicon.'
							<a href="'.get_permalink().'">
								<div class="beforethumbnail148">
									<div class="thumbnail148 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</a>
						</div>
						<div class="col-md-8 col-sm-8">
							<div class="post-excerpt">
								<div class="small-title cat">' . $primary_category_link . '</div>
								<h3><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span>by '.get_the_author_posts_link().'</span>
									<span>on '.get_the_time('M j, Y').'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								</div>
								<p>' . pantograph_excerpt($wordlimit) . '</p>
							</div>
						</div>
					</div>
				</article>'; 
				endwhile;
				}
				$list .= '</div>';
				if($nextprevbtn=='yes'){
					if($showloadmore >= 1){
					$list .= '<div class="post_block_2_posts_loadmore'.$current_time.' loadmorebtn">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
					$list .='<script type="text/javascript">
					var ajaxurl = "'.admin_url('admin-ajax.php').'";
					var page = 2;
					var category = "'.$category.'";
					var itemcount = "'.$itemcount.'";
					var bgimagecls = "'.$bgimagecls.'";
					var title_character_limit = "'.$title_character_limit.'";
					jQuery(function($) {
						$("body").on("click", ".post_block_2_posts_loadmore'.$current_time.'", function() {
							var data = {
								"action": "load_post_block_2_posts_by_ajax",
								"page": page,
								"category": category,
								"itemcount": itemcount,
								"bgimagecls": bgimagecls,
								"title_character_limit": title_character_limit,
								"security": "'.wp_create_nonce('load_more_post_block_2_posts').'"
							};

							$.post(ajaxurl, data, function(response) {
								if(response != "") {
								$(".post_block_2_posts'.$current_time.'").append(response);
								page++;
								} else {
								$(".post_block_2_posts_loadmore'.$current_time.'").hide();
								}
							});
						});
					});
				</script>';
				}}
				
				$list .= '</div>';
							wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_2_post', 'pantograph_post_block_2_shortcode');

/*****************
Post Block 3 Post List 
*****************/

function pantograph_post_block_3_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=5;}else{$itemcount=$itemcount;}
			if($large_post_title_limit==''){ $large_post_title_limit=100;}else{$large_post_title_limit=$large_post_title_limit;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			$showloadmore = '';
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p3/blockhovercolor.php');
			}else{
				
				if($blockcolor){
				include('css/colors/p3/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
				include('css/colors/p3/blockcategorybackground.php');
				}
			
			if($blockcolor){
				include('css/colors/p3/blockcolor.php');
			}
				}
				
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p3/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p3/blockheadingbackgroundcolor.php');		
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p3/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p3/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p3/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p3/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p3/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p3/blockdatecolor.php');
			}
			}
			
			$list = '';
			$list .= '<div class="post_block_3 post_block_3'.$current_time.' '.$blockborder.'">';
			if($heading){
			$list .= '<h4 class="margin-bottom-15"><b>'.$heading.'</b></h4>';
			}
			if($large_post_id==''){
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();	
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();	
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style3 style-alt">
						<div class="post-thumb">
							'.$videoicon.'
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).'</span>
								</div>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforeonecollargestyle">
								<div class="onecollargestyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
			endwhile;
			
			$showpost_item = $itemcount - 1;
			if($showpost_item>0){			
			$list .='<div class="row">
						<div>';
			$list .='<div class="post_block_3_posts'.$current_time.'">';				
			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);
			
			if (empty($idd)) {				
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			$totalpostcount = $the_query->found_posts;
			$showloadmore = $totalpostcount - $showpost_item;
			while ($the_query->have_posts()) : $the_query->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<div class="col-md-4 col-sm-4">
							
							<article class="style2 style-alt">
								<div class="col-md-12 no-padding">
									'.$videoicon.'
									<div class="margin-bottom-15">
										<a href="'.get_permalink().'">
											<div class="beforethumbnail148">
												<div class="thumbnail148 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
											</div>
										</a>
									</div>
								</div>
								<div>
									<div class="post-excerpt no-padding">
										<div class="meta">
											<span>'.get_the_time('M j, Y').'</span>
										</div>
										<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
									</div>
								</div>
							</article>
						</div>'; 
				endwhile;
				$list .='</div>';
				$list .='</div>';
				$list .='</div>';
				}
				if($nextprevbtn=='yes'){
				if($showloadmore >= 1){
				$list .= '<div class="post_block_3_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
				$list .='
				<script type="text/javascript">
				var ajaxurl = "'.admin_url('admin-ajax.php').'";
				var page = 2;
				var category = "'.$category.'";
				var itemcount = "'.$itemcount.'";
				var bgimagecls = "'.$bgimagecls.'";
				var wordlimit = "'.$wordlimit.'";
				var title_character_limit = "'.$title_character_limit.'";
				jQuery(function($) {
					$("body").on("click", ".post_block_3_posts_loadmore'.$current_time.'", function() {
						var data = {
							"action": "load_post_block_3_posts_by_ajax",
							"page": page,
							"category": category,
							"itemcount": itemcount,
							"bgimagecls": bgimagecls,
							"title_character_limit": title_character_limit,
							"wordlimit": wordlimit,
							"security": "'.wp_create_nonce('load_more_post_block_3_posts').'"
						};

						$.post(ajaxurl, data, function(response) {
							if(response != "") {
							$(".post_block_3_posts'.$current_time.'").append(response);
							page++;
							} else {
							$(".post_block_3_posts_loadmore'.$current_time.'").hide();
							}
						});
					});
				});

				</script>';
				
				}
			}
			
			$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_3_post', 'pantograph_post_block_3_shortcode');


/*****************
Post Block 4 Post List 
*****************/

function pantograph_post_block_4_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockcategorybackground' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=5;}else{$itemcount=$itemcount;}
			if($large_post_title_limit==''){ $large_post_title_limit=100;}else{$large_post_title_limit=$large_post_title_limit;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			$showloadmore = '';
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){

			if($blockhovercolor){
			include('css/colors/p4/blockhovercolor.php');
			}else{
				
				if($blockcolor){
				include('css/colors/p4/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
				include('css/colors/p4/blockcategorybackground.php');
				}
				
			if($blockcolor){
				include('css/colors/p4/blockcolor.php');
			}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p4/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p4/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p4/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p4/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p4/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p4/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p4/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p4/blockdatecolor.php');
			}
			}
			
			$list = '';
			$list .= '<div class="post_block_4 post_block_4'.$current_time.' '.$blockborder.'">';
			$list .= '<div class="post_block_4_posts'.$current_time.'">';
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			if($large_post_id==''){
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();	
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();
			$idd = get_the_ID();
					$idd = array($idd);				
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style3 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
									<span>on '.get_the_time('M j, Y').'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								</div>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforeonecollargestyle">
								<div class="onecollargestyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
			endwhile;
					
			$showpost_item = $itemcount - 1;
			if($showpost_item>0){
			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);
			
			if (empty($idd)) {				
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			$totalpostcount = $the_query->found_posts;
			$showloadmore = $totalpostcount - $showpost_item;
			while ($the_query->have_posts()) : $the_query->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style2">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="col-md-12 no-padding">
							'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="post-excerpt">
								<div class="small-title cat">' . $primary_category_link . '</div>
								<h3><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span>by '.get_the_author_posts_link().'</span>
									<span>on '.get_the_time('M j, Y').'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								</div>
								<p>' . pantograph_excerpt($wordlimit) . '</p>
								<a href="'.get_permalink().'" class="small-title rmore">Read More</a>
							</div>
						</div>
					</div>
				</article>'; 
				endwhile;
			}
			$list .= '</div>';
			if($nextprevbtn=='yes'){
				if($showloadmore >= 1){
				$list .= '<div class="post_block_4_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
				$list .='
				<script type="text/javascript">
				var ajaxurl = "'.admin_url('admin-ajax.php').'";
				var page = 2;
				var category = "'.$category.'";
				var itemcount = "'.$itemcount.'";
				var bgimagecls = "'.$bgimagecls.'";
				var wordlimit = "'.$wordlimit.'";
				var title_character_limit = "'.$title_character_limit.'";
				jQuery(function($) {
					$("body").on("click", ".post_block_4_posts_loadmore'.$current_time.'", function() {
						var data = {
							"action": "load_post_block_4_posts_by_ajax",
							"page": page,
							"category": category,
							"itemcount": itemcount,
							"bgimagecls": bgimagecls,
							"title_character_limit": title_character_limit,
							"wordlimit": wordlimit,
							"security": "'.wp_create_nonce('load_more_post_block_4_posts').'"
						};

						$.post(ajaxurl, data, function(response) {
							if(response != "") {
							$(".post_block_4_posts'.$current_time.'").append(response);
							page++;
							} else {
							$(".post_block_4_posts_loadmore'.$current_time.'").hide();
							}
						});
					});
				});

				</script>
				';
			}}
		
			$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_4_post', 'pantograph_post_block_4_shortcode');


/*****************
Post Block 5 Post List 
*****************/

function pantograph_post_block_5_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=5;}else{$itemcount=$itemcount;}
			if($large_post_title_limit==''){ $large_post_title_limit=100;}else{$large_post_title_limit=$large_post_title_limit;}
			if($large_post_excerpt_limit==''){ $large_post_excerpt_limit=15;}else{$large_post_excerpt_limit=$large_post_excerpt_limit;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
				if($blockhovercolor){
				include('css/colors/p5/blockhovercolor.php');
				}else{
					if($blockcolor){
					include('css/colors/p5/dependent-blockcolor.php');
					}
				}
				
				if($blockcolor){
				include('css/colors/p5/blockcolor.php');
				}
				}
				if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p5/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p5/blockheadingbackgroundcolor.php');	
			}
			if($blockbordercolor){
			include('css/colors/p5/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p5/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p5/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p5/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p5/blockdatecolor.php');
			}
			}
			
			$list = '';
			$list .= '<div class="post_block_5 post_block_5'.$current_time.' '.$blockborder.'">';
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			if($large_post_id==''){
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();	
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();	
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			if($itemcount < "2"){
			$list .= '<div class="nothing">';
			}
			$list .= '<div class="col-md-12 col-sm-12 no-padding">
						<article class="article-home">
						<div class="col-md-12 no-padding">
						'.$videoicon.'
							<a href="'.get_permalink().'">
								<div class="beforeonecollargestyle">
									<div class="onecollargestyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</a>
						</div>
						<div class="post-excerpt">
							<div class="small-title cat">' . $primary_category_link . '</div>
							<h4 class="title2"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h4>
							<div class="meta">
								<span>by '.get_the_author_posts_link().'</span>
								<span>on '.get_the_time('M j, Y').'</span>
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
							</div>
							<p>' . pantograph_excerpt($large_post_excerpt_limit) . '</p>
						</div>
					  </article>
					  </div>';
			if($itemcount < "2"){
			$list .= '</div>';
			}
			endwhile;
			
			$showpost_item = $itemcount - 1;
			if($showpost_item>0){
			$list .='<div class="row">';		
			$list .= '<div class="post_block_5_posts'.$current_time.'">';
			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);
			if (empty($idd)) {				
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			while ($the_query->have_posts()) : $the_query->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<div class="col-md-6 col-sm-6">
						<article class="article-home">
							<div class="col-md-12 no-padding">
							'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
							</div>
							<div class="post-excerpt">
								<div class="small-title cat">' . $primary_category_link . '</div>
								<h3><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span>by '.get_the_author_posts_link().'</span>
									<span>on '.get_the_time('M j, Y').'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								</div>
								<p>' . pantograph_excerpt($wordlimit) . '</p>
							</div>
						</article>
					</div>'; 
				endwhile;
				$list .='</div>';
				$list .='</div>';
				}
				if($nextprevbtn=='yes'){
				$list .= '<div class="post_block_5_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
				$list .='
				<script type="text/javascript">
				var ajaxurl = "'.admin_url('admin-ajax.php').'";
				var page = 2;
				var category = "'.$category.'";
				var itemcount = "'.$itemcount.'";
				var bgimagecls = "'.$bgimagecls.'";
				var wordlimit = "'.$wordlimit.'";
				var character_limit = "'.$title_character_limit.'";
				jQuery(function($) {
					$("body").on("click", ".post_block_5_posts_loadmore'.$current_time.'", function() {
						var data = {
							"action": "load_post_block_5_posts_by_ajax",
							"page": page,
							"category": category,
							"itemcount": itemcount,
							"bgimagecls": bgimagecls,
							"title_character_limit": character_limit,
							"wordlimit": wordlimit,
							"security": "'.wp_create_nonce('load_more_post_block_5_posts').'"
						};

						$.post(ajaxurl, data, function(response) {
							if(response != "") {
							$(".post_block_5_posts'.$current_time.'").append(response);
							page++;
							} else {
							$(".post_block_5_posts_loadmore'.$current_time.'").hide();
							}
						});
					});
				});

				</script>
				';
				}
			
			$list .='</div>';
			$list .='<style>.nothing:after{display: table;
								content: " ";
								clear:both;}
			</style>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_5_post', 'pantograph_post_block_5_shortcode');


/*****************
Post Block 6 Post List 
*****************/

function pantograph_post_block_6_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'taboption' => 'no',
        'toptabcategory' => '',
        'dropdowntabcategory' => '',
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'title_character_limit' => 100,
		'wordlimit' => 15,
        'itemcount' => 3,
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
        'bgimagecls' => '',
        'blocksubtabbackground' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no',
        'loadercolor' => ''
		
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($blockcolor==''){ $loadercolor='#33CCFF';}else{$loadercolor=$blockcolor;}
			if($itemcount==''){ $itemcount=3;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			//Colors CSS files
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
						if($blockhovercolor){
							include('css/colors/p6/blockhovercolor.php');
						}else{
							if($blockcolor){					
							include('css/colors/p6/dependent-blockcolor.php');
							}
						}						
						if($blockcolor){
							include('css/colors/p6/blockcolor.php');
						}
					}
			if($blockheadingcolor){
						include('css/colors/p6/blockheadingcolor.php');
					} 
					if($blockheadingbackgroundcolor){
						include('css/colors/p6/blockheadingbackgroundcolor.php');		
					}else{
						if($blockbackgroundcolor){
							include('css/colors/p6/dependent-blockbackgroundcolor.php');
						}
					}
					if($blockbordercolor){
						include('css/colors/p6/blockbordercolor.php');
					}
					if($blockbackgroundcolor){
						include('css/colors/p6/blockbackgroundcolor.php');
					}
					if($blockposttitlecolor){
						include('css/colors/p6/blockposttitlecolor.php');
					}
					
					if($blocktextcolor){
						include('css/colors/p6/blocktextcolor.php');
					}
					if($blockdatecolor){
						include('css/colors/p6/blockdatecolor.php');
					}
					if($blocksubtabbackground){
						include('css/colors/p6/blocksubtabbackground.php');
					}
					
			//Colors CSS files end
				
			$list ='<div><style>
						.loader'.$current_time.' {
							border: 16px solid #f3f3f3;
							border-radius: 50%;
							border-top: 16px solid '.$loadercolor.';
							width: 120px;
							height: 120px;
							margin: 0 auto;
							-webkit-animation: spin 2s linear infinite;
							animation: spin 2s linear infinite;
							position: absolute;
							z-index: 999;
							left: 42%;
							top: 17%;
						}
					 </style></div>';
			$list .='<div class="post_block_6 post_block_6'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<div class="titleh3 margin-bottom-20"><b>'.$heading.'</b>';
			if(($taboption=='yes') && ($toptabcategory!='') && ($dropdowntabcategory!='')){
			$list .='<div class="pull-right">
				<ul class="nav nav-tabs">';
				$alltopitems = explode(',', $toptabcategory);
				$i = 0;
				if (is_array($alltopitems) || is_object($alltopitems))
				{
				foreach ($alltopitems as $topitem) {
					$topcatname = get_cat_name( $topitem );
					if ($i == 0) {
						$list .='<li class="active"><a href="#'.$current_time.$topitem.'" data-toggle="tab">'.$topcatname.'</a></li>';	
					}else{
						$list .='<li><a href="#'.$current_time.$topitem.'" data-toggle="tab">'.$topcatname.'</a></li>';		
					}
					$i++;
				}
				}
		$list .='<li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle">All <i class="caret"></i></a>
					<ul class="dropdown-menu">';
					$alldropdownitems = explode(',', $dropdowntabcategory);
					if (is_array($alldropdownitems) || is_object($alldropdownitems))
					{
					foreach ($alldropdownitems as $dropdownitem) {
						$dropdowncatname = get_cat_name( $dropdownitem );
						$list .='<li><a href="#'.$current_time.$dropdownitem.'mdiffer6" data-toggle="tab">'.$dropdowncatname.'</a></li>';		
					}	
					}
			$list .='</ul>
				</li>
			</ul>
		</div>';
			}
	$list .='</div>';
	}
	if($nextprevbtn=='yes'){
			$list .= '<div class="fixedheight-to-loader-home_section_2">';
			}else{
			$list .= '<div class="noloader loadarticle">';
			}
	   $list .= '<div class="loader'.$current_time.'" style="display:none;"></div>		
		';
			if(($taboption=='yes') && ($toptabcategory!='') && ($dropdowntabcategory!='')){
			$list .='<div class="tab-content">';
			$alltopitems = explode(',', $toptabcategory);
			$i = 0;
			if (is_array($alltopitems) || is_object($alltopitems))
			{
			foreach ($alltopitems as $topitem) {
				$topcatname = get_cat_name( $topitem );
				if ($i == 0) {
					$list .='<div class="tab-pane active" id="'.$current_time.$topitem.'">';
					$list .='<div>
							<style>
								.tab-pane.active #mynewcontent'.$current_time.$topitem.' #mynewcontent'.$current_time.$topitem.':last-child {
									display:none !Important;
								}
								.tab-pane.active #mynewcontent'.$current_time.$topitem.' #mynewcontent'.$current_time.$topitem.':first-child {
									display:block !Important;
								}
							 </style>
							 </div>';
						/* Start Tab Conent */
							$list .='<div id="mynewcontent'.$current_time.$topitem.'"><div class="row">';
							global $wp_query, $paged;			
							if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
							elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
							else { $paged = 1; }
							$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 3, 'category_name' => $topcatname, 'orderby' => $orderby, 'order' => $order);
							$wp_query1 = new WP_Query( $args );
							/*Pagination Fix*/
							$temp_query = $wp_query;
							$wp_query   = NULL;
							$wp_query   = $wp_query1;
							/*Pagination Fix end*/
							if ($wp_query1->have_posts()) :  while ($wp_query1->have_posts()) : $wp_query1->the_post();
							$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
							if($featured_img){
								if ( new_wp_is_mobile() ) {
								$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
								} else {
								$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
								}
							}else{
								$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
							}
							if ( has_post_format( 'video' ) ) : 
								$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
							else:
								$videoicon = '';
							endif;
							$list .= '
							<div class="col-md-4 col-sm-4">
								<article class="style2 style-alt style-section2">
									<div class="col-md-12 no-padding">
									'.$videoicon.'
										<div class="margin-bottom-15">
											<a href="'.get_permalink().'">
												<div class="beforethumbnail148">
													<div class="thumbnail148 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
												</div>
											</a>
										</div>
									</div>
									<div>
										<div class="post-excerpt no-padding">
											<div class="meta">
												<span>'.get_the_time('M j, Y').'</span>
											</div>
											<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
										</div>
									</div>
								</article>
							</div>
							';
						 endwhile; endif;
						 wp_reset_postdata();
						$list .='</div>';
						if($nextprevbtn=='yes'){
						$list .='<div class="row">';
						$list .='<div id="mynewpagination'.$current_time.$topitem.'" class="vcelement_pagination">';
						$prev_link = get_previous_posts_link();
						$next_link = get_next_posts_link();
						
						if($prev_link){ 
						$list .='<b class="next-link">'.get_previous_posts_link('Prev').'</b>';
						}else{ 
						$list .='<b class="next-link disabled">Prev</b>';
						} 
						if($next_link){
						$list .='<b class="prev-link">'.get_next_posts_link('Next').'</b>';
						}else{ 	
						$list .='<b class="prev-link disabled"> Next</b>';
						} 				
						$list .='</div>';
						$list .='</div>';
						$list .='<script>
							jQuery(function($) {
								$("#mynewcontent'.$current_time.$topitem.'").on("click", "#mynewpagination'.$current_time.$topitem.' a", function(e){
									e.preventDefault();
									$(".loader'.$current_time.'").show();
									var link = $(this).attr("href");
									$("#mynewcontent'.$current_time.$topitem.'").fadeOut("slow", function(){
										$(this).load(link + " #mynewcontent'.$current_time.$topitem.'", function() {
											$(this).fadeIn("slow");
											$(".loader'.$current_time.'").hide();
										});
									});
								});
								});
							 </script>
							';
						}
						// Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;
					$list .='</div>';

					/* End Tab Conent */
					$list .='</div>';
					
				}else{
					$list .='<div class="tab-pane" id="'.$current_time.$topitem.'">';
					$list .='<div>
							<style>
								.tab-pane.active #mynewcontent'.$current_time.$topitem.' #mynewcontent'.$current_time.$topitem.':last-child {
									display:none !Important;
								}
								.tab-pane.active #mynewcontent'.$current_time.$topitem.' #mynewcontent'.$current_time.$topitem.':first-child {
									display:block !Important;
								}
							 </style>
							 </div>';
					/* Start Tab Conent */
					$list .='<div id="mynewcontent'.$current_time.$topitem.'"><div class="row">';
					global $wp_query, $paged;			
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
					elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
					else { $paged = 1; }
					$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 3, 'category_name' => $topcatname, 'orderby' => $orderby, 'order' => $order);
					$wp_query2 = new WP_Query( $args );
					/*Pagination Fix*/
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $wp_query2;
					/*Pagination Fix end*/
					if ($wp_query2->have_posts()) :  while ($wp_query2->have_posts()) : $wp_query2->the_post();
					
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '
					<div class="col-md-4 col-sm-4">
						<article class="style2 style-alt style-section2">
							<div class="col-md-12 no-padding">
							'.$videoicon.'
								<div class="margin-bottom-15">
									<a href="'.get_permalink().'">
										<div class="beforethumbnail148">
											<div class="thumbnail148 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
										</div>
									</a>
								</div>
							</div>
							<div>
								<div class="post-excerpt no-padding">
									<div class="meta">
										<span>'.get_the_time('M j, Y').'</span>
									</div>
									<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
								</div>
							</div>
						</article>
					</div>
					';
				 endwhile; endif;
				 wp_reset_postdata();
				$list .='</div>';
				if($nextprevbtn=='yes'){
				$list .='<div class="row">';
				$list .='<div id="mynewpagination'.$current_time.$topitem.'" class="vcelement_pagination">';
				$prev_link = get_previous_posts_link();
				$next_link = get_next_posts_link();
				
				if($prev_link){ 
				$list .='<b class="next-link">'.get_previous_posts_link('Prev').'</b>';
				}else{ 
				$list .='<b class="next-link disabled">Prev</b>';
				} 
				if($next_link){
				$list .='<b class="prev-link">'.get_next_posts_link('Next').'</b>';
				}else{ 	
				$list .='<b class="prev-link disabled"> Next</b>';
				} 				
				$list .='</div>';
				$list .='</div>';
				$list .='<script>
							jQuery(function($) {
								$("#mynewcontent'.$current_time.$topitem.'").on("click", "#mynewpagination'.$current_time.$topitem.' a", function(e){
									e.preventDefault();
									$(".loader'.$current_time.'").show();
									var link = $(this).attr("href");
									$("#mynewcontent'.$current_time.$topitem.'").fadeOut("slow", function(){
										$(this).load(link + " #mynewcontent'.$current_time.$topitem.'", function() {
											$(this).fadeIn("slow");
											$(".loader'.$current_time.'").hide();
										});
									});
								});
								});
							 </script>
							';
				}
				// Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;
				$list .='</div>';
					/* End Tab Conent */
					$list .='</div>';	
				}
				$i++;
			}
			}
			
			$alldropdownitems = explode(',', $dropdowntabcategory);
			if (is_array($alldropdownitems) || is_object($alldropdownitems))
			{
			foreach ($alldropdownitems as $dropdownitem) {
				$dropdowncatname = get_cat_name( $dropdownitem );
				$list .='<div class="tab-pane" id="'.$current_time.$dropdownitem.'mdiffer6">';
				$list .='<div>
							<style>
								.tab-pane.active #mynewcontent'.$current_time.$topitem.' #mynewcontent'.$current_time.$topitem.':last-child {
									display:none !Important;
								}
								.tab-pane.active #mynewcontent'.$current_time.$topitem.' #mynewcontent'.$current_time.$topitem.':first-child {
									display:block !Important;
								}
							 </style>
							 </div>';
				
				/* Start Tab Conent */
				$list .='<div id="mynewcontent'.$current_time.$dropdownitem.'mdiffer6"><div class="row">';
				global $wp_query, $paged;			
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
				else { $paged = 1; }
				$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 3, 'category_name' => $dropdowncatname, 'orderby' => $orderby, 'order' => $order);
				$wp_query3 = new WP_Query( $args );
				/*Pagination Fix*/
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $wp_query3;
					/*Pagination Fix end*/
				if ($wp_query3->have_posts()) :  while ($wp_query3->have_posts()) : $wp_query3->the_post();
				
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '
					<div class="col-md-4 col-sm-4">
						<article class="style2 style-alt style-section2">
							<div class="col-md-12 no-padding">
							'.$videoicon.'
								<div class="margin-bottom-15">
									<a href="'.get_permalink().'">
										<div class="beforethumbnail148">
											<div class="thumbnail148 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
										</div>
									</a>
								</div>
							</div>
							<div>
								<div class="post-excerpt no-padding">
									<div class="meta">
										<span>'.get_the_time('M j, Y').'</span>
									</div>
									<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
								</div>
							</div>
						</article>
					</div>
					';
				 endwhile; endif;
				 wp_reset_postdata();
				$list .='</div>';
				if($nextprevbtn=='yes'){
				$list .='<div class="row">';
				$list .='<div id="mynewpagination'.$current_time.$dropdownitem.'mdiffer6" class="vcelement_pagination">';
				$prev_link = get_previous_posts_link();
				$next_link = get_next_posts_link();
				
				if($prev_link){ 
				$list .='<b class="next-link">'.get_previous_posts_link('Prev').'</b>';
				}else{ 
				$list .='<b class="next-link disabled">Prev</b>';
				} 
				if($next_link){
				$list .='<b class="prev-link">'.get_next_posts_link('Next').'</b>';
				}else{ 	
				$list .='<b class="prev-link disabled"> Next</b>';
				} 				
				$list .='</div>';
				$list .='</div>';
				$list .='<script>
					jQuery(function($) {
						$("#mynewcontent'.$current_time.$dropdownitem.'mdiffer6").on("click", "#mynewpagination'.$current_time.$dropdownitem.'mdiffer6 a", function(e){
							e.preventDefault();
							$(".loader'.$current_time.'").show();
							var link = $(this).attr("href");
							$("#mynewcontent'.$current_time.$dropdownitem.'mdiffer6").fadeOut("slow", function(){
								$(this).load(link + " #mynewcontent'.$current_time.$dropdownitem.'mdiffer6", function() {
									$(this).fadeIn("slow");
									$(".loader'.$current_time.'").hide();
								});
							});
						});
						});
					 </script>
						';
				}
				// Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;
				$list .='</div>';

				/* End Tab Conent */
				$list .='</div>';				
			}
			}
			$list .='</div>';
			}else{
				$list .='<div id="mynewcontent'.$current_time.'"><div class="row">';
				global $wp_query, $paged;			
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
				else { $paged = 1; }
				$args = array('post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 3, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order);
				$wp_query4 = new WP_Query( $args );
				/*Pagination Fix*/
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $wp_query4;
					/*Pagination Fix end*/
				if ($wp_query4->have_posts()) :  while ($wp_query4->have_posts()) : $wp_query4->the_post(); 
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '
					<div class="col-md-4 col-sm-4">
						<article class="style2 style-alt style-section2">
							<div class="col-md-12 no-padding">
								'.$videoicon.'
								<div class="margin-bottom-15">
									<a href="'.get_permalink().'">
										<div class="beforethumbnail148">
											<div class="thumbnail148 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
										</div>
									</a>
								</div>
							</div>
							<div>
								<div class="post-excerpt no-padding">
									<div class="meta">
										<span>'.get_the_time('M j, Y').'</span>
									</div>
									<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
								</div>
							</div>
						</article>
					</div>
					';
				 endwhile; endif;
				 wp_reset_postdata();
				$list .='</div>';
				if($nextprevbtn=='yes'){
				$list .='<div class="row">';
				$list .='<div id="mynewpagination'.$current_time.'" class="vcelement_pagination">';
				$prev_link = get_previous_posts_link();
				$next_link = get_next_posts_link();
				
				if($prev_link){ 
				$list .='<b class="next-link">'.get_previous_posts_link('Prev').'</b>';
				}else{ 
				$list .='<b class="next-link disabled">Prev</b>';
				} 
				if($next_link){
				$list .='<b class="prev-link">'.get_next_posts_link('Next').'</b>';
				}else{ 	
				$list .='<b class="prev-link disabled"> Next</b>';
				} 				
				$list .='</div>';
				$list .='</div>';
				
				$list .='<script>
					jQuery(function($) {
						$("#mynewcontent'.$current_time.'").on("click", "#mynewpagination'.$current_time.' a", function(e){
							e.preventDefault();
							$(".loader'.$current_time.'").show();
							var link = $(this).attr("href");
							$("#mynewcontent'.$current_time.'").fadeOut("slow", function(){
								$(this).load(link + " #mynewcontent'.$current_time.'", function() {
									$(this).fadeIn("slow");
									$(".loader'.$current_time.'").hide();
								});
							});
						});
						});
					 </script>
					 ';				
					}
					// Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;

					$list .='</div>';
				}
			$list.= '</div>';
			$list.= '</div>';
			return $list;
			}
add_shortcode('pantograph_post_block_6_post', 'pantograph_post_block_6_shortcode');

/*****************
Post Block 7 Post List 
*****************/

function pantograph_post_block_7_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'title_character_limit' => 100,
        'itemcount' => 3,
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=3;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
			if($blockhovercolor){
			include('css/colors/p7/blockhovercolor.php');
			}else{
				if($blockcolor){
					include('css/colors/p7/dependent-blockcolor.php');
				}
			}
			if($blockcolor){
				include('css/colors/p7/blockcolor.php');
			}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
				include('css/colors/p7/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
				include('css/colors/p7/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p7/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
				include('css/colors/p7/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p7/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p7/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p7/blocktextcolor.php');
			}
			if($blockdatecolor){
				include('css/colors/p7/blockdatecolor.php');
			}
			}	
			
			$list ='';
			$list .='<div class="post_block_7 post_block_7'.$current_time.' '.$blockborder.'">';
			if($heading){			
			$list .= '<h4 class="margin-bottom-15"><b>'.$heading.'</b></h4>';
			}
			$list .= '<div class="row">';
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';

			else:
				$videoicon = '';
			endif;

	
			$list .= '<div class="col-md-6 col-sm-6">
						<article class="article-home style-alt">
							<div class="col-md-12 no-padding">
							'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
							</div>
							<div class="post-excerpt">
								<div class="small-title cat">' . $primary_category_link . '</div>
								<h4><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h4>
								<div class="meta">
									<span>by '.get_the_author_posts_link().'</span>
									<span>on '.get_the_time('M j, Y').'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								</div>
							</div>
						</article>
					</div>'; 
			endwhile;


			$list.= '</div>';
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_7_post', 'pantograph_post_block_7_shortcode');


/*****************
Post Block 8 Post List 
*****************/

function pantograph_post_block_8_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'title_character_limit' => 100,
        'itemcount' => 3,
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=3;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
				$list .='<style>';
			if($blockhovercolor){
				include('css/colors/p8/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p8/dependent-blockcolor.php');
				}
			}
			
			if($blockcolor){
				include('css/colors/p8/blockcolor.php');
				}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p8/blockheadingcolor.php');
			}  
			if($blockheadingbackgroundcolor){
			include('css/colors/p8/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p8/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/p8/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p8/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p8/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p8/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p8/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_8 post_block_8'.$current_time.' '.$blockborder.'">';
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			$list .= '<div class="row style5">';
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
	
			$list .= '<div class="col-sm-4">
						<article class="style4">
								<div class="post-thumb">
								'.$videoicon.'
									<div class="post-excerpt">
										<div class="meta">
											<span class="date">'.get_the_time('M j, Y').'</span>
										</div>
									<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
									</div>
									<div class="overlay overlay-02"></div>
									<div class="beforethumbnail243">
										<div class="thumbnail243 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</div>
						</article>
					</div>';
			endwhile;
			wp_reset_postdata();


			$list.= '</div>';
			
			$list.= '</div>';
			return $list;
			}
add_shortcode('pantograph_post_block_8_post', 'pantograph_post_block_8_shortcode');


/*****************
Post Block 9 Post List 
*****************/

function pantograph_post_block_9_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'title_character_limit' => 100,
        'itemcount' => 2,
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
				if($blockhovercolor){
				include('css/colors/p9/blockhovercolor.php');
				}else{
					if($blockcolor){
					include('css/colors/p9/dependent-blockcolor.php');
					}
				}
				if($blockcolor){
				include('css/colors/p9/blockcolor.php');
				}
				}
				if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
				if($blockheadingcolor){
				include('css/colors/p9/blockheadingcolor.php');
				} 
				if($blockheadingbackgroundcolor){
				include('css/colors/p9/blockheadingbackgroundcolor.php');	
				}else{
					if($blockbackgroundcolor){
					include('css/colors/p9/dependent-blockbackgroundcolor.php');	
					}
				}
				if($blockbordercolor){
				include('css/colors/p9/blockbordercolor.php');
				}
				if($blockbackgroundcolor){
				include('css/colors/p9/blockbackgroundcolor.php');
				}
				if($blockposttitlecolor){
				include('css/colors/p9/blockposttitlecolor.php');
				}
				
				if($blocktextcolor){
				include('css/colors/p9/blocktextcolor.php');
				}
				if($blockdatecolor){
				include('css/colors/p9/blockdatecolor.php');
				}
				}
				
			$list ='';
			$list .='<div class="post_block_9 post_block_9'.$current_time.' '.$blockborder.'">';	
			$list .= '<div class="info-content">';
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
						$list .= '<div class="row">';
									
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<div class="col-md-6 col-sm-6">
							<article class="style3 style5 single text-center no-margin">
								<div class="overlay overlay-02"></div>
								<div class="post-thumb">
								'.$videoicon.'
									<div class="container">
										<div class="post-excerpt">
											<div class="small-title cat">' . $primary_category_link . '</div>
											<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
											<div class="meta">
												<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
												<span>on Sep 22,2016</span>
											</div>
											<div class="meta">
												<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
												<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
											</div>
										</div>
									</div>
									<div class="beforegeneralstyle">
										<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</div>
							</article>
						</div>';
			endwhile;
			wp_reset_postdata();

			$list.= '</div></div>';
			
			$list.= '</div>';
			return $list;
			}
add_shortcode('pantograph_post_block_9_post', 'pantograph_post_block_9_shortcode');


/*****************
Post Block 10 Post List 
*****************/

function pantograph_post_block_10_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'title_character_limit' => 100,
		'wordlimit' => 15,
        'itemcount' => 2,
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
			if($blockhovercolor){
			include('css/colors/p10/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p10/dependent-blockcolor.php');
				}
			}
				if($blockcolor){
				include('css/colors/p10/blockcolor.php');
				}
				}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p10/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p10/blockheadingbackgroundcolor.php');
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p10/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p10/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p10/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p10/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p10/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p10/blockdatecolor.php');
			}
			}	
			$list ='';
			$list .='<div class="post_block_10 post_block_10'.$current_time.' '.$blockborder.'">';
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			$list .= '<div class="row">
						<div class="col-md-12">
						<div class="post_block_10_posts'.$current_time.'">';
									
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			$totalpostcount = $the_query->found_posts;
			$showloadmore = $totalpostcount - $itemcount;
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style2">
						<div class="row">
							<div class="col-md-6 col-sm-6">
							'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="post-excerpt">
									<div class="small-title cat">' . $primary_category_link . '</div>
									<h3><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
									<div class="meta">
										<span>by '.get_the_author_posts_link().'</span>
										<span>on '.get_the_time('M j, Y').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									<p>' . pantograph_excerpt($wordlimit) . '</p>
									<a href="'.get_permalink().'" class="small-title rmore">Read More</a>
								</div>
							</div>
						</div>
					</article>'; 
			endwhile;

			$list.= '</div>';
			if($nextprevbtn=='yes'){
				if($showloadmore >= 1){
				$list .= '<div class="post_block_10_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
				$list .='
				<script type="text/javascript">
				var ajaxurl = "'.admin_url('admin-ajax.php').'";
				var page = 2;
				var category = "'.$category.'";
				var itemcount = "'.$itemcount.'";
				var bgimagecls = "'.$bgimagecls.'";
				var wordlimit = "'.$wordlimit.'";
				var character_limit = "'.$title_character_limit.'";
				jQuery(function($) {
					$("body").on("click", ".post_block_10_posts_loadmore'.$current_time.'", function() {
						var data = {
							"action": "load_post_block_10_posts_by_ajax",
							"page": page,
							"category": category,
							"itemcount": itemcount,
							"bgimagecls": bgimagecls,
							"title_character_limit": character_limit,
							"wordlimit": wordlimit,
							"security": "'.wp_create_nonce('load_more_post_block_10_posts').'"
						};

						$.post(ajaxurl, data, function(response) {
							if(response != "") {
							$(".post_block_10_posts'.$current_time.'").append(response);
							page++;
							} else {
							$(".post_block_10_posts_loadmore'.$current_time.'").hide();
							}
						});
					});
				});

				</script>
				';
					}	
					}	
			
			$list.= '</div></div>';
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_10_post', 'pantograph_post_block_10_shortcode');


/*****************
Post Block 11 Post List 
*****************/

function pantograph_post_block_11_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'title_character_limit' => 100,
		'wordlimit' => 15,
        'itemcount' => 2,
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
			if($blockhovercolor){
			include('css/colors/p11/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p11/dependent-blockcolor.php');
				}
			}
			
			if($blockcolor){
			include('css/colors/p11/blockcolor.php');
			}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
				include('css/colors/p11/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p11/blockheadingbackgroundcolor.php');
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p11/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/p11/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p11/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p11/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p11/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p11/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_11 post_block_11'.$current_time.' '.$blockborder.'">';
			if($heading){	
			$list .='<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}			
			$list .= '<div class="row">';
									
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';

			else:
				$videoicon = '';
			endif;
			$list .= '<div class="col-md-3">
							<article class="article-home">
							<div class="col-md-12 no-padding">
							'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforethumbnail148">
										<div class="thumbnail148 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
								</div>
								<div class="post-excerpt">
									<div class="small-title cat">' . $primary_category_link . '</div>
									<h4 class="title2"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h4>
									<div class="meta">
										<span>by '.get_the_author_posts_link().'</span>
										<span>on '.get_the_time('M j, Y').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									<p>' . pantograph_excerpt($wordlimit) . '</p>
								</div>
							</article>
						</div>'; 
			endwhile;


			$list.= '</div>';
			
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_11_post', 'pantograph_post_block_11_shortcode');



/*****************
Post Block 12 Post List 
*****************/

function pantograph_post_block_12_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($blockcolor==''){ $loadercolor='#33CCFF';}else{$loadercolor=$blockcolor;}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p12/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p12/dependent-blockcolor.php');
				}
			}
			if($blockcategorybackground){
				include('css/colors/p12/blockcategorybackground.php');
				}
			if($blockcolor){
			include('css/colors/p12/blockcolor.php');
			}
			}
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p12/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p12/blockheadingbackgroundcolor.php');
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p12/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p12/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p12/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p12/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p12/blocktextcolor.php');
			}
			
			if($blockdatecolor){
			include('css/colors/p12/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_12 post_block_12'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b>';
			$list .='</h3>';
			}		
		$list .='<div id="mynewcontent'.$current_time.'"><div class="row">';
		$i=1;
		$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post(); 
		if($i==1) {
			$class='padding-left-15';
		}
		elseif($i== 2) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 3) {
			$class='padding-right-15';
		}elseif($i==4) {
			$class='padding-left-15';
		}
		elseif($i== 5) {
			$class='padding-left-none padding-right-none';
		}elseif($i== 6) {
			$class='padding-right-15';
		}elseif($i==7) {
			$class='padding-left-15';
		}
		elseif($i== 8) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 9) {
			$class='padding-right-15';
			
		}elseif($i==10) {
			$class='padding-left-15';
		}
		elseif($i== 11) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 12) {
			$class='padding-right-15';	
		}else {
			
		}
		$i++;
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-4 '.$class.'">
					<article class="style3 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforeanotherstyle3">
								<div class="anotherstyle3 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>	
				  </div>'; 
			endwhile; endif;
			$list .='</div>';
			
			$list .='</div>';
			
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_12_post', 'pantograph_post_block_12_shortcode');


/*****************
Post Block 13 Post List 
*****************/

function pantograph_post_block_13_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p13/blockhovercolor.php');
			}else{
			if($blockcolor){
			include('css/colors/p13/dependent-blockcolor.php');
			}
			}
			
			if($blockcategorybackground){
			include('css/colors/p13/blockcategorybackground.php');
			}
			
			if($blockcolor){
			include('css/colors/p13/blockcolor.php');
			}
			}
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p13/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p13/blockheadingbackgroundcolor.php');
			}else{
			if($blockbackgroundcolor){
			include('css/colors/p13/dependent-blockbackgroundcolor.php');
			}
			}
			if($blockbordercolor){
			include('css/colors/p13/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p13/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p13/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p13/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p13/blockdatecolor.php');
			}
			}
					
			$list ='';
			$list .='<div class="post_block_13 post_block_13'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b>';
			$list .='</h3>';
			}
				$list .='<div id="mynewcontent'.$current_time.'"><div class="row">';
				$i=1;
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post(); 
				if($i == 1) {
					$class='padding-left-15';
				}elseif($i == 2) {
					$class='padding-left-none padding-right-none';
				}elseif($i == 3) {
					$class='padding-right-none';
				}elseif($i == 4) {
					$class='';
				}elseif($i == 5) {
					$class='padding-left-15';
				}elseif($i == 6) {
					$class='padding-left-none padding-right-none';
				}elseif($i == 7) {
					$class='padding-right-none';
				}elseif($i == 8) {
					$class='';
				}elseif($i == 9) {
					$class='padding-left-15';
				}elseif($i == 10) {
					$class='padding-left-none padding-right-none';
				}elseif($i == 11) {
					$class='padding-right-none';
				}elseif($i == 12) {
					$class='';
				}else {}
				$i++;
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					$primary_category_link = get_the_category_list(', ');
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<div class="col-md-3 '.$class.'">
							<article class="style3 style-alt">
								<div class="post-thumb">
								'.$videoicon.'
									<div class="small-title cat">' . $primary_category_link . '</div>
									<div class="post-excerpt">
										<div class="meta">
											<span class="date">'.get_the_time('M j, Y').'</span>
										</div>
										<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
									</div>
									<div class="overlay overlay-02"></div>
									<div class="beforeanotherstyle3">
										<div class="anotherstyle3 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</div>
							</article>	
						  </div>'; 
				 endwhile; endif;
				$list .='</div>';
					
				$list.= '</div>';
				
				$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_13_post', 'pantograph_post_block_13_shortcode');


/*****************
Post Block 14 Post List 
*****************/

function pantograph_post_block_14_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			$body_color = get_post_meta(get_the_ID(), 'body_color', true);
			if($itemcount==''){ $itemcount=1;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($large_post_excerpt_limit==''){ $large_post_excerpt_limit=15;}else{$large_post_excerpt_limit=$large_post_excerpt_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
			if($blockhovercolor){
			include('css/colors/p14/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p14/dependent-blockcolor.php');
				}
			}
			
			if($blockcolor){
			include('css/colors/p14/blockcolor.php');
			}
			}	
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p14/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p14/blockheadingbackgroundcolor.php');
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p14/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/p14/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p14/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p14/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p14/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p14/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_14 post_block_14'.$current_time.' '.$blockborder.'">';
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			if($large_post_id==''){
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();	
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();
			$idd = get_the_ID();
					$idd = array($idd);				
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}	
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="article-home style-alt margin-bottom-10">
						<div class="col-md-12 no-padding">
						'.$videoicon.'
							<a href="'.get_permalink().'">
								<div class="beforegeneralstyle">
									<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</a>
						</div>
						<div class="post-excerpt">
							<div class="small-title cat">' . $primary_category_link . '</div>
							<h4><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h4>
							<div class="meta">
								<span>by '.get_the_author_posts_link().'</span>
								<span>on '.get_the_time('M j, Y').'</span>
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
							</div>
							<p>' . pantograph_excerpt($large_post_excerpt_limit) . '</p>
						</div>
					</article>';
			endwhile;
			
			$showpost_item = $itemcount - 1;
			if($showpost_item>0){			
			$list .= '<div class="mini-posts">';
			$list .= '<div class="post_block_14_posts'.$current_time.'">';
			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);	
			if (empty($idd)) {				
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			$totalpostcount = $the_query->found_posts;
			$showloadmore = $totalpostcount - $showpost_item;
			while ($the_query->have_posts()) : $the_query->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
			if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style2 style-alt">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="col-md-12 no-padding">
							'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforethumbnail">
										<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-8 col-sm-8">
							<div class="post-excerpt no-padding">
								<div class="meta">
									<span>'.get_the_time('M j, Y').'</span>
								</div>
								<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
						</div>
					</div>
				</article>';
			endwhile;
			$list.= '</div>';
			if($nextprevbtn=='yes'){
				if($showloadmore >= 1){
			$list .= '<div class="post_block_14_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
			$list .='
				<script type="text/javascript">
				var ajaxurl = "'.admin_url('admin-ajax.php').'";
				var page = 2;
				var category = "'.$category.'";
				var itemcount = "'.$itemcount.'";
				var bgimagecls = "'.$bgimagecls.'";
				var character_limit = "'.$title_character_limit.'";
				jQuery(function($) {
					$("body").on("click", ".post_block_14_posts_loadmore'.$current_time.'", function() {
						var data = {
							"action": "load_post_block_14_posts_by_ajax",
							"page": page,
							"category": category,
							"itemcount": itemcount,
							"bgimagecls": bgimagecls,
							"title_character_limit": character_limit,
							"security": "'.wp_create_nonce('load_more_post_block_14_posts').'"
						};

						$.post(ajaxurl, data, function(response) {
							if(response != "") {
							$(".post_block_14_posts'.$current_time.'").append(response);
							page++;
							} else {
							$(".post_block_14_posts_loadmore'.$current_time.'").hide();
							}
						});
					});
				});

				</script>
					';
					}
					}
				
			$list.= '</div>';
			}
			
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_14_post', 'pantograph_post_block_14_shortcode');

/*****************
Post Block 15 Post List 
*****************/

function pantograph_post_block_15_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
        'blockcolor' => '',
        'itemcount' => 3,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($large_post_excerpt_limit==''){ $large_post_excerpt_limit=15;}else{$large_post_excerpt_limit=$large_post_excerpt_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p15/blockhovercolor.php');
			}else{
				
				if($blockcolor){
				include('css/colors/p15/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
			include('css/colors/p15/blockcategorybackground.php');
			}
			
			if($blockcolor){
			include('css/colors/p15/blockcolor.php');
			}
			}
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p15/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p15/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p15/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p15/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p15/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p15/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p15/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p15/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_15 post_block_15'.$current_time.' '.$blockborder.'">';
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			if($large_post_id==''){
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();	
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();	
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforegeneralstyle">
								<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>						
					';
			endwhile;
			
			$showpost_item = $itemcount - 1;
			if($showpost_item>0){			
			$list .= '<div class="mini-posts">';
			$list .= '<div class="post_block_15_posts'.$current_time.'">';
			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);
			
			if (empty($idd)) {	
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			$totalpostcount = $the_query->found_posts;
			$showloadmore = $totalpostcount - $showpost_item;
			while ($the_query->have_posts()) : $the_query->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style2 style-alt">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="col-md-12 no-padding">
							'.$videoicon.'
								<a href="'.get_permalink().'">
									<div class="beforethumbnail">
										<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-md-8 col-sm-8">
							<div class="post-excerpt no-padding">
								<div class="meta">
									<span>'.get_the_time('M j, Y').'</span>
								</div>
								<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
						</div>
					</div>
				</article>';	
			endwhile;
			$list.= '</div>';
			if($nextprevbtn=='yes'){
				
			if($showloadmore >= 1){
			$list .= '<div class="post_block_15_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
			$list .='
					<script type="text/javascript">
					var ajaxurl = "'.admin_url('admin-ajax.php').'";
					var page = 2;
					var category = "'.$category.'";
					var itemcount = "'.$itemcount.'";
					var bgimagecls = "'.$bgimagecls.'";
					var title_character_limit = "'.$title_character_limit.'";
					jQuery(function($) {
						$("body").on("click", ".post_block_15_posts_loadmore'.$current_time.'", function() {
							var data = {
								"action": "load_post_block_14_posts_by_ajax",
								"page": page,
								"category": category,
								"itemcount": itemcount,
								"bgimagecls": bgimagecls,
								"title_character_limit": title_character_limit,
								"security": "'.wp_create_nonce('load_more_post_block_14_posts').'"
							};

							$.post(ajaxurl, data, function(response) {
								if(response != "") {
								$(".post_block_15_posts'.$current_time.'").append(response);
								page++;
								} else {
								$(".post_block_15_posts_loadmore'.$current_time.'").hide();
								}
							});
						});
					});

					</script>
					';
					}
					}
				
			$list.= '</div>';
			}
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_15_post', 'pantograph_post_block_15_shortcode');


/*****************
Post Block 16 Post List 
*****************/

function pantograph_post_block_16_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($large_post_excerpt_limit==''){ $large_post_excerpt_limit=15;}else{$large_post_excerpt_limit=$large_post_excerpt_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
			if($blockhovercolor){
			include('css/colors/p16/blockhovercolor.php');
			}else{
				
				if($blockcolor){
				include('css/colors/p16/dependent-blockcolor.php');
				}
			}
			
			if($blockcolor){
			include('css/colors/p16/blockcolor.php');
			}
			}

			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p16/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p16/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p16/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p16/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p16/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p16/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p16/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p16/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_16 post_block_16'.$current_time.' '.$blockborder.'">';
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			if($large_post_id==''){
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();	
			while ($the_query->have_posts()) : $the_query->the_post();
			$post_array_new[] = get_the_ID();
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
			else:
				$videoicon = '';
			endif;			
			$list .= '<article class="article-home style-alt margin-bottom-10">
				<div class="col-md-12 no-padding">
				'.$videoicon.'
					<a href="'.get_permalink().'">
						<div class="beforegeneralstyle">
							<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</a>
					</div>
					<div class="post-excerpt">
						<div class="small-title cat">' . $primary_category_link . '</div>
						<h4><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h4>
						<div class="meta">
							<span>by '.get_the_author_posts_link().'</span>
							<span>on '.get_the_time('M j, Y').'</span>
							<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
						</div>
						<p>' . pantograph_excerpt($large_post_excerpt_limit) . '</p>
					</div>
					
				</article>';
			endwhile;
			
			$showpost_item = $itemcount - 1;
			if($showpost_item>0){				
			$list .= '<div class="mini-posts">';
			$list .= '<div class="row">';
			$list .= '<div class="post_block_16_posts'.$current_time.'">';
			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);

			if (empty($idd)) {				
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			$totalpostcount = $the_query->found_posts;
			$showloadmore = $totalpostcount - $showpost_item;
			while ($the_query->have_posts()) : $the_query->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .='<div class="col-md-6 col-sm-6">
				<article class="style2 style-alt">
				<div class="col-md-12">
				'.$videoicon.'
					<a href="'.get_permalink().'">
						<div class="beforethumbnail">
							<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</a>
					</div>
					<div class="post-excerpt no-padding">
						<br>
						<div class="meta">
						<span>'.get_the_time('M j, Y').'</span>
					</div>
					<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
					</div>
				</article>
			</div>';
			endwhile;
			$list.= '</div>';
			$list.= '</div>';
			if($nextprevbtn=='yes'){
			if($showloadmore >= 1){
			$list .= '<div class="post_block_16_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
			$list .='
			<script type="text/javascript">
			var ajaxurl = "'.admin_url('admin-ajax.php').'";
			var page = 2;
			var category = "'.$category.'";
			var itemcount = "'.$itemcount.'";
			var bgimagecls16 = "'.$bgimagecls.'";
			var character_limit = "'.$title_character_limit.'";
			jQuery(function($) {
			$("body").on("click", ".post_block_16_posts_loadmore'.$current_time.'", function() {
				var data = {
					"action": "load_post_block_16_posts_by_ajax",
					"page": page,
					"category": category,
					"itemcount": itemcount,
					"bgimagecls16": bgimagecls16,
					"title_character_limit": character_limit,
					"security": "'.wp_create_nonce('load_more_post_block_16_posts').'"
				};

				$.post(ajaxurl, data, function(response) {
					if(response != "") {
					$(".post_block_16_posts'.$current_time.'").append(response);
					page++;
					} else {
					$(".post_block_16_posts_loadmore'.$current_time.'").hide();
					}
				});
			});
			});

			</script>
			';
			}
			}
			
			$list.= '</div>';
			}
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_16_post', 'pantograph_post_block_16_shortcode');


/*****************
Post Block 17 Post List 
*****************/

function pantograph_post_block_17_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
				include('css/colors/p17/blockhovercolor.php');
				}else{
					
					if($blockcolor){
					include('css/colors/p17/dependent-blockcolor.php');
					}
				}
				
				if($blockcategorybackground){
				include('css/colors/p17/blockcategorybackground.php');
				}
				
				if($blockcolor){
				include('css/colors/p17/blockcolor.php');
				}
			}
		
		if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p17/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p17/blockheadingbackgroundcolor.php');		
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p17/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p17/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p17/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p17/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p17/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p17/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_17 post_block_17'.$current_time.' '.$blockborder.'">';
			$list .= '<div class="info-content section5">';
			if($heading){		
			$list .= '<h4 class="margin-bottom-15"><b>'.$heading.'</b></h4>';
			}
			$list .= '<div class="row">';
			if($large_post_id==''){
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();
			while ($the_query->have_posts()) : $the_query->the_post();
			$post_array_new[] = get_the_ID();	
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<div class="col-md-8 col-sm-8">
						<article class="style3 style-alt">
							<div class="post-thumb">
							'.$videoicon.'
							<div class="overlay overlay-02"></div>
								<div class="small-title cat">' . $primary_category_link . '</div>
								<div class="post-excerpt">
									<div class="meta">
										<span class="date">'.get_the_time('M j, Y').'</span>
									</div>
									<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
									<div class="meta">
										<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
										<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
									</div>
								</div>
								<div class="beforethumbnail477">
									<div class="beforethumbnail477 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</div>
						</article>
					</div>';
			endwhile;
			
		$showpost_item = $itemcount - 1;
		if($showpost_item>0){	
		$list .='<div class="col-md-4 col-sm-4">';			
		$arr1 = array($post_array_new);
		$ar = array_merge($arr1);
				
		if (empty($idd)) {			
					$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}else{
					$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}
		while ($the_query->have_posts()) : $the_query->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<article class="style4 style-alt margin-bottom-10">
					<div class="post-thumb">
					'.$videoicon.'
					<div class="overlay overlay-02"></div>
						<div class="small-title cat">' . $primary_category_link . '</div>
						<div class="post-excerpt">
							<div class="meta">
								<span class="date">'.get_the_time('M j, Y').'</span>
							</div>
							<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
						</div>
						<div class="beforegeneralstyle">
							<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</div>
				</article>'; 
			endwhile;
		$list .='</div>';
		}
		$list .='</div>
			</div>';
		
		$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_17_post', 'pantograph_post_block_17_shortcode');


/*****************
Post Block 18 Post List 
*****************/

function pantograph_post_block_18_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p18/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p18/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
			include('css/colors/p18/blockcategorybackground.php');
			}
		
			if($blockcolor){
			include('css/colors/p18/blockcolor.php');
			}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p18/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p18/blockheadingbackgroundcolor.php');		
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p18/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p18/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p18/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p18/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p18/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p18/blockdatecolor.php');
			}
			}
			
			
			$list ='';
			$list .='<div class="post_block_18 post_block_18'.$current_time.' '.$blockborder.'">';
			$list .= '<div class="info-content section5">';		
			if($heading){
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			$list .='<div class="row">';
					if($large_post_id==''){
					$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}else{
						$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
					}
					$post_array_new = array();	
					while ($the_query->have_posts()) : $the_query->the_post();
					$idd = get_the_ID();
					$post_array_new[] = get_the_ID();
					$idd = get_the_ID();
					$idd = array($idd);	
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<div class="col-md-8 col-sm-8">
								<article class="style3 style-alt">
									<div class="post-thumb">
									'.$videoicon.'
										<div class="small-title cat"> ' .$primary_category_link. '</div>
										<div class="post-excerpt">
											<div class="meta">
												<span class="date">'.get_the_time('M j, Y').'</span>
											</div>
											<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
											<div class="meta">
												<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
												<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
												<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
											</div>
										</div>
										<div class="overlay overlay-02"></div>
										<div class="beforethumbnail335">
											<div class="thumbnail335 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
										</div>
									</div>
								</article>
							</div>';
					endwhile;
				$list .='<div class="col-md-4 col-sm-4">';			
				$arr1 = array($post_array_new);
				$ar = array_merge($arr1);
				$showpost_item = $itemcount - 1;
				if (empty($idd)) {					
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				}else{
				$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				}
				while ($the_query->have_posts()) : $the_query->the_post();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					$primary_category_link = get_the_category_list(', ');
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<article class="style4 style-alt">
							<div class="post-thumb">
							'.$videoicon.'
								<div class="small-title cat">' . $primary_category_link . '</div>
								<div class="post-excerpt">
									<div class="meta">
										<span class="date">'.get_the_time('M j, Y').'</span>
									</div>
									<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>							
								</div>
								<div class="overlay overlay-02"></div>
								<div class="beforethumbnail165">
									<div class="thumbnail165 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</div>
						</article>'; 
					endwhile;
			$list .='</div>
					</div>
				</div>';
				
				$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_18_post', 'pantograph_post_block_18_shortcode');


/*****************
Post Block 19 Post List 
*****************/

function pantograph_post_block_19_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p19/blockhovercolor.php');
			}else{
				
				if($blockcolor){
				include('css/colors/p19/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
				include('css/colors/p19/blockcategorybackground.php');
				}
			
			if($blockcolor){
			include('css/colors/p19/blockcolor.php');
			}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p19/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p19/blockheadingbackgroundcolor.php');
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p19/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p19/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p19/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p19/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p19/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p19/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_19 post_block_19'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			if($large_post_id==''){
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();	
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();	
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<article class="style3 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
								</div>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforeonecollargestyle">
								<div class="onecollargestyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
			endwhile;
			
		$showpost_item = $itemcount - 1;
		if($showpost_item>0){
		$list .='<div class="row">';			
		$arr1 = array($post_array_new);
		$ar = array_merge($arr1);
		
		if (empty($idd)) {			
		$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		}else{
		$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		}
		while ($the_query->have_posts()) : $the_query->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-6 col-sm-6">
						<article class="style4 style-alt">
							<div class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;"></div>
							<div class="post-thumb wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
							'.$videoicon.'
								<div class="small-title cat wow fadeIn" style="visibility: visible; animation-name: fadeIn;">' . $primary_category_link . '</div>
								<div class="post-excerpt wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
									<div class="meta wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
										<span class="date">'.get_the_time('M j, Y').'</span>
									</div>
									<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>	
								</div>
								<div class="overlay overlay-02"></div>
								<div class="beforegeneralstyle">
									<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</div>
						</article>				
					</div>'; 
			endwhile;
			$list .='</div>';
			}
			$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_19_post', 'pantograph_post_block_19_shortcode');


/*****************
Post Block 20 Post List 
*****************/

function pantograph_post_block_20_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
				include('css/colors/p20/blockhovercolor.php');
				}else{
					if($blockcolor){
					include('css/colors/p20/dependent-blockcolor.php');
					}
				}
				if($blockcategorybackground){
					include('css/colors/p20/blockcategorybackground.php');
					}
				
				if($blockcolor){
				include('css/colors/p20/blockcolor.php');
				}
			}	
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p20/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p20/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p20/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/p20/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p20/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p20/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p20/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p20/blockdatecolor.php');
			}
			}	
			
		$list ='';
		$list .='<div class="post_block_20 post_block_20'.$current_time.' '.$blockborder.'">';
		if($heading){		
		$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
		}
		$list .= '<div class="row">';
		if($large_post_id==''){
			$the_query1 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		}else{
			$the_query1 = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
		}
		$post_array_new1 = array();	
		while ($the_query1->have_posts()) : $the_query1->the_post();
		$post_array_new1[] = get_the_ID();	
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
		$list .= '
	<div class="col-md-6 padding-right-none large-post">
		<div class="style3 article-home">
				<div class="post-thumb">
				'.$videoicon.'
					<div class="small-title cat">' . $primary_category_link . '</div>
					<div class="post-excerpt">
						<div class="meta">
							<span class="date">'.get_the_time('M j, Y').'</span>
						</div>
						<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
						<div class="meta">
							<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
							<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
							<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
						</div>
					</div>
					<div class="overlay overlay-02"></div>
					<div class="beforethumbnail400">
						<div class="thumbnail400 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
					</div>
				</div>
		</div>
	</div>
	';
	endwhile;			
	$queryarry2 = array_merge((array)$post_array_new1);
	$post_array_new2 = array();	
	$the_query2 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry2, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
	while ($the_query2->have_posts()) : $the_query2->the_post();
	$post_array_new2[] = get_the_ID();
	$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
	if($featured_img){
		if ( new_wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
		}
	}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
	}
	$primary_category = '';
	$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
	if($primary_category){
		$primary_category_name = get_cat_name( $primary_category );
		$category_link = get_category_link( $primary_category );
		$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
	}else{
		$primary_category_link = get_the_category_list(', ');
	}
	if ( has_post_format( 'video' ) ) : 
		$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
	else:
		$videoicon = '';
	endif;
	$list .= '<div class="col-md-6 padding-left-5">
				<div class="style3 article-home">
					<div class="post-thumb">
					'.$videoicon.'
						<div class="small-title cat">' . $primary_category_link . '</div>
						<div class="post-excerpt">
							<div class="meta">
								<span class="date">'.get_the_time('M j, Y').'</span>
							</div>
							<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
							<div class="meta">
								<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
							</div>
						</div>
						<div class="overlay overlay-02"></div>
						<div class="beforethumbnail210">
							<div class="thumbnail210 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</div>
				</div>'; 
		endwhile;
		
		$list .= '<div class="row">';	
		$queryarry3 = array_merge((array)$post_array_new1,(array)$post_array_new2);
		$post_array_new3 = array();		
		$the_query3 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry3, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		while ($the_query3->have_posts()) : $the_query3->the_post();
		$post_array_new3[] = get_the_ID();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
			} else {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-6 col-sm-6 padding-right-none">
					<div class="style3 article-home">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
								</div>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforethumbnail185">
								<div class="thumbnail185 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</div>				
				</div>'; 
		endwhile;
		$queryarry4 = array_merge((array)$post_array_new1,(array)$post_array_new2,(array)$post_array_new3);	
		$the_query4 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry4, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		while ($the_query4->have_posts()) : $the_query4->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
			} else {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-6 col-sm-6 padding-left-5">
					<div class="style3 article-home">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
								</div>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforethumbnail185">
								<div class="thumbnail185 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</div>			
				</div>
			</div>
			'; 
		endwhile;
		$list .='</div>
				</div>';
			
		$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_20_post', 'pantograph_post_block_20_shortcode');

/*****************
Post Block 21 Post List 
*****************/

function pantograph_post_block_21_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
				if($blockhovercolor){
				include('css/colors/p21/blockhovercolor.php');
				}else{
					
					if($blockcolor){
					include('css/colors/p21/dependent-blockcolor.php');
					}
				}
					
				if($blockcategorybackground){
				include('css/colors/p21/blockcategorybackground.php');
				}
				if($blockcolor){
				include('css/colors/p21/blockcolor.php');
				}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p21/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p21/blockheadingbackgroundcolor.php');
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p21/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p21/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p21/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p21/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p21/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p21/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_21 post_block_21'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			$list .= '<div class="row">';
			if($large_post_id==''){
				$the_query1 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query1 = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new1 = array();	
			while ($the_query1->have_posts()) : $the_query1->the_post();
			$post_array_new1[] = get_the_ID();	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '
			<div class="col-md-6 padding-right-none">
				<article class="style4 style-alt margin-bottom-10">
						<div class="post-thumb">
						'.$videoicon.'	
						<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle3">
								<div class="anotherstyle3 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>
			</div>
			
		';
		endwhile;			
		$queryarry2 = array_merge((array)$post_array_new1);
		$post_array_new2 = array();	
		$the_query2 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry2, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		while ($the_query2->have_posts()) : $the_query2->the_post();
		$post_array_new2[] = get_the_ID();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
			} else {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-6 padding-left-5">
				<div class="style4">
						<div class="post-thumb">
						'.$videoicon.'	
						<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</div>
			'; 
			endwhile;
			
		$list .= '<div class="row">';	
		$queryarry3 = array_merge((array)$post_array_new1,(array)$post_array_new2);
		$post_array_new3 = array();		
		$the_query3 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry3, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		while ($the_query3->have_posts()) : $the_query3->the_post();
		$post_array_new3[] = get_the_ID();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
			} else {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '
				<div class="col-md-6 col-sm-6 padding-right-none">
					<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
						<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>				
				</div>
				'; 
			endwhile;
		$queryarry4 = array_merge((array)$post_array_new1,(array)$post_array_new2,(array)$post_array_new3);	
		$the_query4 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry4, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		while ($the_query4->have_posts()) : $the_query4->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '
				<div class="col-md-6 col-sm-6 padding-left-5">
					<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>
				</div>
				'; 
			endwhile;
	$list .='</div></div></div>';
	
	$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_21_post', 'pantograph_post_block_21_shortcode');



/*****************
Post Block 22 Post List 
*****************/

function pantograph_post_block_22_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p22/blockhovercolor.php');
			}else{
				
				if($blockcolor){
				include('css/colors/p22/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
			include('css/colors/p22/blockcategorybackground.php');
			}
			
			if($blockcolor){
			include('css/colors/p22/blockcolor.php');
			}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p22/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p22/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p22/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/p22/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p22/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p22/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p22/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p22/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_22 post_block_22'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			$list .= '<div class="row style4-4-6">';
			if($large_post_id==''){
				$the_query1 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query1 = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new1 = array();	
			while ($the_query1->have_posts()) : $the_query1->the_post();
			$post_array_new1[] = get_the_ID();	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '
			<div class="col-md-6 padding-right-none">
				<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
						<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
							</div>
							<div class="beforeanotherstyle3">
								<div class="anotherstyle3 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>
			</div>
			
		';
		endwhile;			
		$queryarry2 = array_merge((array)$post_array_new1);
		$post_array_new2 = array();	
		$the_query2 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry2, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		while ($the_query2->have_posts()) : $the_query2->the_post();
		$post_array_new2[] = get_the_ID();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-6 padding-left-5">
					<div class="col-md-6 col-sm-6 padding-left-none padding-right-none">
					<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
					endwhile;
					
					$queryarry3 = array_merge((array)$post_array_new1,(array)$post_array_new2);
					$post_array_new3 = array();		
					$the_query3 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry3, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					while ($the_query3->have_posts()) : $the_query3->the_post();
					$post_array_new3[] = get_the_ID();
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .='<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
				endwhile;
			
					
				$list .='</div>
				<div class="col-md-6 col-sm-6 padding-left-5 padding-right-none">';
				
				$queryarry4 = array_merge((array)$post_array_new1,(array)$post_array_new2,(array)$post_array_new3);	
				$post_array_new4 = array();	
				$the_query4 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry4, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				while ($the_query4->have_posts()) : $the_query4->the_post();
				$post_array_new4[] = get_the_ID();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					$primary_category_link = get_the_category_list(', ');
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>'; 
				endwhile;
					
					
				$queryarry5 = array_merge((array)$post_array_new1,(array)$post_array_new2,(array)$post_array_new3,(array)$post_array_new4);	
				$the_query5 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry5, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				while ($the_query5->have_posts()) : $the_query5->the_post();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');

				if($featured_img){
					if ( new_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}

				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					$primary_category_link = get_the_category_list(', ');
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>'; 
			endwhile;
			$list .= '</div>'; 
			
			
			$list .='</div></div>';
			
			$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_22_post', 'pantograph_post_block_22_shortcode');



/*****************
Post Block 23 Post List 
*****************/

function pantograph_post_block_23_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
        'large_post_id' => '',
		'large_post_title_limit' => 100,
		'title_character_limit' => 100,
		'itemcount' => 5,
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
        'current_time' => time(),
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if($blockcolor){
			include('css/colors/p23/blockcolor.php');
			}
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockhovercolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p23/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p23/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p23/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/p23/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p23/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p23/blockposttitlecolor.php');
			}
			if($blockhovercolor){
				
			}elseif($blockcolor){
				include('css/colors/p23/dependent-blockcolor.php');
				}else{}
			
			if($blocktextcolor){
			include('css/colors/p23/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p23/blockdatecolor.php');
			}
			}
			
			
			$list ='';
			$list .='<div class="post_block_23 post_block_23'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			if($large_post_id==''){
				$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
				$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
			}
			$post_array_new = array();
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();	
			$idd = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(', ');
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';

			else:
				$videoicon = '';
			endif;
			$list .= '<article class="article-home style-alt margin-bottom-5">
						<div class="col-md-12 no-padding">
							'.$videoicon.'
							<a href="'.get_permalink().'">
								<div class="beforegeneralstyle">
									<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</a>
						</div>
						<div class="post-excerpt">
							<div class="small-title cat">' . $primary_category_link . '</div>
							<h4><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h4>
							<div class="meta">
								<span>by '.get_the_author_posts_link().'</span>
								<span>on '.get_the_time('M j, Y').'</span>
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
							</div>
						</div>
					</article>';
			endwhile;
			
			$showpost_item = $itemcount - 1;
			if($showpost_item>0){
			$list .= '<div class="list-posts">';
			$list .='<div class="post_block_23_posts'.$current_time.'">';
			$arr1 = array($post_array_new);
			$ar = array_merge($arr1);
			
			if (empty($idd)) {			
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			while ($the_query->have_posts()) : $the_query->the_post();
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$list .= '<a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a>'; 
			endwhile;
			$list.= '</div>';
			
			if($nextprevbtn=='yes'){
			$list .= '<div class="post_block_23_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
			$list .='
			<script type="text/javascript">
			var ajaxurl = "'.admin_url('admin-ajax.php').'";
			var page = 2;
			var cat = "'.$category.'";
			var item = "'.$itemcount.'";
			var bgimage = "'.$bgimagecls.'";
			var character_limit = "'.$title_character_limit.'";
			jQuery(function($) {
				$("body").on("click", ".post_block_23_posts_loadmore'.$current_time.'", function() {
					var data = {
						"action": "load_post_block_23_posts_by_ajax",
						"page": page,
						"cat": cat,
						"item": item,
						"bgimagecls": bgimage,
						"title_character_limit": character_limit,
						"security": "'.wp_create_nonce('load_more_post_block_23_posts').'"
					};

					$.post(ajaxurl, data, function(response) {
						if(response != "") {
						$(".post_block_23_posts'.$current_time.'").append(response);
						page++;
						} else {
						$(".post_block_23_posts_loadmore'.$current_time.'").hide();
						}
					});
				});
			});

			</script>
			';
			}
			
			$list.= '</div>';
			}
			
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_23_post', 'pantograph_post_block_23_shortcode');


/*****************
Post Block 24 Post List 
*****************/

function pantograph_post_block_24_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
        'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
		'title_character_limit' => 100,
		'current_time' => time(),
		'imageanimate' => 'no',
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no',
		'postid' => ''
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}	
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p24/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p24/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
			include('css/colors/p24/blockcategorybackground.php');
			}
			
			if($blockcolor){
			include('css/colors/p24/blockcolor.php');
			}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p24/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p24/blockheadingbackgroundcolor.php');		
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p24/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p24/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p24/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p24/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p24/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p24/blockdatecolor.php');
			}
			}	
			
			$list ='';
			$list .='<div class="post_block_24 post_block_24'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h4 class="margin-bottom-15"><b>'.$heading.'</b></h4>';
			}
						if($large_post_id==''){
							$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
						}else{
							$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
						}
						while ($the_query->have_posts()) : $the_query->the_post();
						$postid = get_the_ID();
						$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
						if($featured_img){
							if ( new_wp_is_mobile() ) {
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
							} else {
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
							}
						}else{
							$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
						}
						$primary_category = '';
						$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
						if($primary_category){
							$primary_category_name = get_cat_name( $primary_category );
							$category_link = get_category_link( $primary_category );
							$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
						}else{
							$primary_category_link = get_the_category_list(', ');
						}
						if ( has_post_format( 'video' ) ) : 
							$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
						else:
							$videoicon = '';
						endif;
						$list .= '<div class="col-md-6 no-padding">
									<article class="style3 article-home">
										<div class="post-thumb">
										'.$videoicon.'	
										<div class="overlay overlay-02"></div>
											<div class="small-title cat">' . $primary_category_link . '</div>
											<div class="post-excerpt">
												<div class="meta">
													<span class="date">'.get_the_time('M j, Y').'</span>
												</div>
												<h3 class="h1 text-white"><a href="'.get_permalink().'">'.mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ).'</a></h3>
												<div class="meta">
													<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
													<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
													<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
												</div>
											</div>
											<div class="overlay overlay-02"></div>
											<div class="beforeonecollargestyle">
												<div class="onecollargestyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
											</div>
										</div>
									</article>
								</div>					
								';
						endwhile;
								
					$list .= '<div class="col-md-3 col-sm-6 no-left-right-padding-in-small">';
					
					$showpost_item = 2;		
					$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => array($postid), 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					while ($the_query->have_posts()) : $the_query->the_post();
					$post_array_new[] = get_the_ID();
					$idd[] = get_the_ID();
					$idd = array($idd);	
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<article class="style4" style="padding-bottom:10px !important;">
								<div class="post-thumb">
								'.$videoicon.'	
								<div class="overlay overlay-02"></div>
									<div class="small-title cat">' . $primary_category_link . '</div>
									<div class="post-excerpt">
										<div class="meta">
											<span class="date">'.get_the_time('M j, Y').'</span>
										</div>
										<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
									</div>
									<div class="overlay overlay-02"></div>
									<div class="beforethumbnail172">
										<div class="thumbnail172 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</div>
							</article>';	
					endwhile;
					$list.= '</div>';
					
					$list .= '<div class="col-md-3 col-sm-6 no-padding">';
					$arr1 = array($postid);
					$arr2 = array($post_array_new);
					$ar = array_merge($arr1,$arr2);
					$showpost_item = 2;
					if (empty($idd)) {	
					$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}else{
					$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}
					while ($the_query->have_posts()) : $the_query->the_post();
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<article class="style4" style="padding-bottom:10px !important;">
								<div class="post-thumb">
								'.$videoicon.'	
								<div class="overlay overlay-02"></div>
									<div class="small-title cat">' . $primary_category_link . '</div>
									<div class="post-excerpt">
										<div class="meta">
											<span class="date">'.get_the_time('M j, Y').'</span>
										</div>
										<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
									</div>
									<div class="overlay overlay-02"></div>
									<div class="beforethumbnail172">
										<div class="thumbnail172 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</div>
							</article>';	
					endwhile;
					$list.= '</div>';
					
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_24_post', 'pantograph_post_block_24_shortcode');


/*****************
Post Block 25 Post List 
*****************/

function pantograph_post_block_25_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
        'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
		'title_character_limit' => 100,
		'itemcount' => 5,
		'imageanimate' => 'no',
		'nextprevbtn' => 'no',
        'current_time' => time(),
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no',
		'postid' => ''
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p25/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p25/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
			include('css/colors/p25/blockcategorybackground.php');
			}
			
			if($blockcolor){
			include('css/colors/p25/blockcolor.php');
			}
			}
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p25/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p25/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p25/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p25/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p25/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p25/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p25/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p25/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_25 post_block_25'.$current_time.' '.$blockborder.'">';
				if($heading){		
				$list .= '<h4 class="margin-bottom-15"><b>'.$heading.'</b></h4>';
				}
				if($large_post_id==''){
					$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				}else{
					$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
				}
				while ($the_query->have_posts()) : $the_query->the_post();
				$postid = get_the_ID();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_wp_is_mobile() ) {
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
							} else {
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
							}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					$primary_category_link = get_the_category_list(', ');
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<article class="style4">
							<div class="post-thumb">
							'.$videoicon.'	
								<div class="small-title cat">' . $primary_category_link . '</div>
								<div class="post-excerpt">
									<div class="meta">
										<span class="date">'.get_the_time('M j, Y').'</span>
									</div>
									<h3 class="text-white"><a href="'.get_permalink().'">'.mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ).'</a></h3>
								</div>
								<div class="overlay overlay-02"></div>
								<div class="beforegeneralstyle">
									<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</div>
						</article>';
				endwhile;
						

			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => array($postid), 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			while ($the_query->have_posts()) : $the_query->the_post();
			$post_array_new[] = get_the_ID();
			$idd[] = get_the_ID();
					$idd = array($idd);	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<div class="mini-posts2">
							<article>
								<div class="row">
									<div class="col-md-4 col-sm-4">
										<div class="col-md-12 no-padding">
										'.$videoicon.'
											<a href="'.get_permalink().'">
												<div class="beforethumbnail">
													<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
												</div>
											</a>
										</div>
									</div>
									<div class="col-md-8 col-sm-8">
										<div class="post-excerpt no-padding">
											<div class="meta">
												<span>'.get_the_time('M j, Y').'</span>
											</div>
											<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
										</div>
									</div>
								</div>
							</article>
						</div>';	
			endwhile;
			
			$list .= '<div class="list-posts">';
			$list .= '<div class="post_block_25_posts'.$current_time.'">';
			$arr1 = array($postid);
			$arr2 = array($post_array_new);
			$ar = array_merge($arr1,$arr2);
			$showpost_item = $itemcount - 2;
			if (empty($idd)) {				
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}else{
			$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
			}
			$totalpostcount = $the_query->found_posts;
			$showloadmore = $totalpostcount - $showpost_item;
			while ($the_query->have_posts()) : $the_query->the_post();
			$list .= '<a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a>';	
			endwhile;
			$list.= '</div>';
			if($nextprevbtn=='yes'){
				if($showloadmore >= 1){
			$list .= '<div class="post_block_25_posts_loadmore'.$current_time.' loadmorebtn margin-top-50">'.esc_html('Load More', 'pantograph').' <i class="fa fa-angle-down" aria-hidden="true"></i></div>';
			$list .='
			<script type="text/javascript">
			var ajaxurl = "'.admin_url('admin-ajax.php').'";
			var page = 2;
			var category = "'.$category.'";
			var itemcount = "'.$itemcount.'";
			var title_character_limit = "'.$title_character_limit.'";
			jQuery(function($) {
				$("body").on("click", ".post_block_25_posts_loadmore'.$current_time.'", function() {
					var data = {
						"action": "load_post_block_25_posts_by_ajax",
						"page": page,
						"category": category,
						"itemcount": itemcount,
						"title_character_limit": title_character_limit,
						"security": "'.wp_create_nonce('load_more_post_block_25_posts').'"
					};

					$.post(ajaxurl, data, function(response) {
						if(response != "") {
						$(".post_block_25_posts'.$current_time.'").append(response);
						page++;
						} else {
						$(".post_block_25_posts_loadmore'.$current_time.'").hide();
						}
					});
				});
			});

			</script>
			';
			}
			}
			
			$list.= '</div>';
			
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_25_post', 'pantograph_post_block_25_shortcode');

/*****************
Post Block 26 Post List 
*****************/

function pantograph_post_block_26_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'itemcount' => 5,
        'large_post_id' => '',
		'large_post_title_limit' => 100,
		'large_post_excerpt_limit' => 15,
		'title_character_limit' => 100,
		'wordlimit' => 15,
		'current_time' => time(),
		'imageanimate' => 'no',
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no',
		'postid' => ''
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=100;}else{$large_post_title_limit=$large_post_title_limit;}
			if($large_post_excerpt_limit==''){ $large_post_excerpt_limit=15;}else{$large_post_excerpt_limit=$large_post_excerpt_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor))){
				if($blockhovercolor){
				include('css/colors/p26/blockhovercolor.php');
				}else{
					
					if($blockcolor){
					include('css/colors/p26/dependent-blockcolor.php');
					}
				}
				
				if($blockcolor){
					include('css/colors/p26/blockcolor.php');
				}
			}
		if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p26/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p26/blockheadingbackgroundcolor.php');
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p26/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/p26/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p26/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p26/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p26/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p26/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_26 post_block_26'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h4 class="margin-bottom-15"><b>'.$heading.'</b></h4>';
			}
			$list .= '<div class="row">';
						if($large_post_id==''){
							$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
						}else{
							$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
						}			
						while ($the_query->have_posts()) : $the_query->the_post();
						$postid = $the_query->post->ID;
						$idd1 = get_the_ID();
						$idd1 = array($idd1);	
						$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
						if($featured_img){
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						}else{
							$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
						}
						$primary_category = '';
						$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
						if($primary_category){
							$primary_category_name = get_cat_name( $primary_category );
							$category_link = get_category_link( $primary_category );
							$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
						}else{
							$primary_category_link = get_the_category_list(', ');
						}
						if ( has_post_format( 'video' ) ) : 
							$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';

						else:
							$videoicon = '';
						endif;
						$list .= '<div class="col-md-5 sixstyle3part1">
									<article class="article-home">
										<div class="col-md-12 no-padding">
										'.$videoicon.'
											<a href="'.get_permalink().'">
												<div class="beforegeneralstyle">
													<div class="generalstyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
												</div>
											</a>
										</div>
										<div class="post-excerpt">
											<div class="small-title cat">' . $primary_category_link . '</div>
											<h4 class="title2"><a href="'.get_permalink().'">'. mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) .'</a></h4>
											<div class="meta">
												<span>by '.get_the_author_posts_link().'</span>
												<span>on '.get_the_time('M j, Y').'</span>
												<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
											</div>
											<p>' . pantograph_excerpt($large_post_excerpt_limit) . '</p>
										</div>
									</article>
								</div>
								';
						endwhile;
						
					$the_query1 = new WP_Query( array('post_type' => 'post', 'post__not_in' => array($postid), 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					while ($the_query1->have_posts()) : $the_query1->the_post();
					$post_array_new[] = $the_query1->post->ID;
					$idd2 = get_the_ID();
					$idd2 = array($idd2);
					$idd = array_merge($idd1,$idd2);
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';

					else:
						$videoicon = '';
					endif;
					$list .= '<div class="col-md-3 sixstyle3part2">
								<article class="article-home">
									<div class="col-md-12 no-padding">
										'.$videoicon.'
										<a href="'.get_permalink().'">
											<div class="beforethumbnail172">
												<div class="thumbnail172 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
											</div>
										</a>
									</div>
									<div class="post-excerpt">
										<div class="small-title cat">' . $primary_category_link . '</div>
										<h4 class="title2"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>on '.get_the_time('M j, Y').'</span>
											<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
										</div>
										<p>' . pantograph_excerpt($wordlimit) . '</p>
									</div>
								</article>
							</div>';	
					endwhile;
				$list .= '<div class="col-md-4">
					<div class="mini-posts">';
					$arr1 = array($postid);
					$arr2 = array($post_array_new);
					$ar = array_merge($arr1,$arr2);
					$showpost_item = $itemcount - 2;
					if (empty($idd)) {	
					$the_query2 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}else{
					$the_query2 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}
					while ($the_query2->have_posts()) : $the_query2->the_post();
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_thumb_48" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:36px;height:36px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<article class="style2 sixstyle3part3">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<div class="col-md-12 no-padding">
									'.$videoicon.'
										<a href="'.get_permalink().'">
											<div class="beforethumbnail">
												<div class="thumbnail '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-8 col-sm-8">
									<div class="post-excerpt no-padding">
										<div class="meta">
											<span>'.get_the_time('M j, Y').'</span>
										</div>
										<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
									</div>
								</div>
							</div>
						</article>			
						';	
					endwhile;
					
					
				$list .='				
					</div>
				</div>
			</div>';
				
		$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_26_post', 'pantograph_post_block_26_shortcode');

/*****************
Post Block 27 Post List 
*****************/

function pantograph_post_block_27_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'itemcount' => 5,
        'large_post_id' => '',
		'large_post_title_limit' => 100,
		'title_character_limit' => 100,
		'current_time' => time(),
		'imageanimate' => 'no',
        'blockcolor' => '',
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=100;}else{$large_post_title_limit=$large_post_title_limit;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p27/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p27/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
			include('css/colors/p27/blockcategorybackground.php');
			}
			
			if($blockcolor){
				include('css/colors/p27/blockcolor.php');
			}
			}
		if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p27/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p27/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p27/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p27/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p27/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p27/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p27/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p27/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_27 post_block_27'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h4 class="margin-bottom-15"><b>'.$heading.'</b></h4>';
			}
			
			$list .= '<div class="bg-dark">
						<div class="container">
							<div class="space60"></div>
							<div class="row">';
						if($large_post_id==''){
							$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
						}else{
							$the_query = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
						}
						while ($the_query->have_posts()) : $the_query->the_post();
						$postid = get_the_ID();
						$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
						if($featured_img){
							if ( new_wp_is_mobile() ) {
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
							} else {
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
							}
						}else{
							$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
						}
						$primary_category = '';
						$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
						if($primary_category){
							$primary_category_name = get_cat_name( $primary_category );
							$category_link = get_category_link( $primary_category );
							$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
						}else{
							$primary_category_link = get_the_category_list(', ');
						}
						if ( has_post_format( 'video' ) ) : 
							$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
						else:
							$videoicon = '';
						endif;
						$list .= '<div class="col-md-6">
									<article class="style3 article-home">
										<div class="post-thumb">
										'.$videoicon.'
											<div class="small-title cat">' . $primary_category_link . '</div>
											<div class="post-excerpt">
												<div class="meta">
													<span class="date">'.get_the_date(__('F j, Y')).'</span>
												</div>
												<h3 class="h1 text-white"><a href="'.get_permalink().'">'.mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ).'</a></h3>
												<div class="meta">
													<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
													<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
													<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
												</div>
											</div>
											<div class="beforeonecollargestyle">
												<div class="onecollargestyle '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
											</div>
										</div>
									</article>
								</div>					
								';
						endwhile;
								
					$list .= '<div class="col-md-3 col-sm-6">';
					
					$showpost_item = 2;		
					$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => array($postid), 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					while ($the_query->have_posts()) : $the_query->the_post();
					$post_array_new[] = get_the_ID();
					$idd[] = get_the_ID();
					$idd = array($idd);	
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<article class="style4">
								<div class="post-thumb">
								'.$videoicon.'	
									<div class="small-title cat">' . $primary_category_link . '</div>
									<div class="post-excerpt">
										<div class="meta">
											<span class="date">'.get_the_date(__('F j, Y')).'</span>
										</div>
										<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
									</div>
									<div class="beforethumbnail172">
										<div class="thumbnail172 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</div>
							</article>';	
					endwhile;
					$list.= '</div>';
					
					$list .= '<div class="col-md-3 col-sm-6">';
					$arr1 = array($postid);
					$arr2 = array($post_array_new);
					$ar = array_merge($arr1,$arr2);
					$showpost_item = 2;	
					if (empty($idd)) {	
					$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}else{
					$the_query = new WP_Query( array('post_type' => 'post', 'post__not_in' => $idd, 'posts_per_page' => $showpost_item, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					}
					while ($the_query->have_posts()) : $the_query->the_post();
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .= '<article class="style4">
								<div class="post-thumb">
								'.$videoicon.'	
									<div class="small-title cat">' . $primary_category_link . '</div>
									<div class="post-excerpt">
										<div class="meta">
											<span class="date">'.get_the_date(__('F j, Y')).'</span>
										</div>
										<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
									</div>
									<div class="beforethumbnail172">
										<div class="thumbnail172 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
									</div>
								</div>
							</article>';	
					endwhile;
					$list.= '</div>';

			$list.= '</div>
				<div class="space50"></div>
			</div>
		</div>
		';
		
		$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_27_post', 'pantograph_post_block_27_shortcode');


/*****************
Add Block 28 For Show Add
*****************/

function pantograph_post_block_28_shortcode($atts, $content = null){
extract( shortcode_atts( array(
        'heading' => 'Heading'
), $atts) );
			$list ='';
			$list .='<div class="post_block_28_for_add">';
			$list .= wpb_js_remove_wpautop( $content, true );
			$list .= '</div>';
			return $list;
			}
add_shortcode('pantograph_post_block_28_post', 'pantograph_post_block_28_shortcode');


/*****************
Post Block 29 Post List 
*****************/

function pantograph_post_block_29_shortcode($atts){
extract( shortcode_atts( array(
		'category' => pantograph_default_category(),
        'itemcount' => 10,
        'blockcolor' => '',
		'blockstyle' => 1,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Breaking News',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blockhovercolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($blockborder=='yes'){ $blockborder='pantograph-bknews-border';}else{$blockborder='';}
			
			if($blockposttitlecolor==''){ $blockposttitlecolor='#696969';}else{$blockposttitlecolor=$blockposttitlecolor;}
			if($blockhovercolor==''){ $blockhovercolor='#33CCFF';}else{$blockhovercolor=$blockhovercolor;}
			if($itemcount==''){ $itemcount=10;}else{$itemcount=$itemcount;}
			
			if($blockcolor){
				include('css/colors/p29/blockcolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p29/blockbackgroundcolor.php');
			}
			if($blockhovercolor){
			include('css/colors/p29/blockhovercolor.php');
			}
			if($blockstyle == 2){
			include('css/colors/p29/blockstyle2.php');
			}
			if($blockstyle == 3){
			include('css/colors/p29/blockstyle3.php');
			}
						
			$list ='';
			$list .='<div class="post_block_29 '.$blockborder.'">
						  <div class="breaking-news-area">
							 <div class="the-breaking-news">
								<div class="br-title">';
									if($heading){
										$list .= '<span>'.$heading.'</span>';
									}
						$list .='</div>
							 </div>
							 <div class="col-xs-12 col-sm-9 col-md-9">
								<div class="newsticker js-newsticker">
									<ul class="js-frame">';
									$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
									while ($the_query->have_posts()) : $the_query->the_post();
									$list .='<li class="js-item"><a href="'.get_the_permalink().'" style="color:'.$blockposttitlecolor.' !important;">'.get_the_title().'</a></li>';
									endwhile;
									wp_reset_postdata();
									$list .='
									</ul>
								</div> 
							 </div> 	
							</div>
					</div>';
			return $list;
			}
add_shortcode('pantograph_post_block_29_post', 'pantograph_post_block_29_shortcode');

/*****************
Post Block 30 Post List 
*****************/

function pantograph_post_block_30_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'wordlimit' => 15,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'video' => 'no',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($blockcolor==''){ $loadercolor='#33CCFF';}else{$loadercolor=$blockcolor;}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($video=='yes'){ $video='<div class="play"></div>';}else{$video='';}
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($wordlimit==''){ $wordlimit=15;}else{$wordlimit=$wordlimit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p30/blockhovercolor.php');
			}else{
				if($blockcolor){
				include('css/colors/p30/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
			include('css/colors/p30/blockcategorybackground.php');
			}
			
			if($blockcolor){
			include('css/colors/p30/blockcolor.php');
			}
			}
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p30/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p30/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p30/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/p30/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p30/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p30/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p30/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p30/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_30 post_block_30'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b>';
			$list .='</h3>';
			}		
			$list .='<div id="mynewcontent'.$current_time.'"><div class="row">';
			$i=1;
		$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));			
		if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post(); 
		if($i==1) {
			$class='padding-left-15 padding-right-none';
		}
		elseif($i== 2) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 3) {
			$class='padding-right-15 padding-left-none border-right-none';
		}elseif($i==4) {
			$class='padding-left-15 padding-right-none';
		}
		elseif($i== 5) {
			$class='padding-left-none padding-right-none';
		}elseif($i== 6) {
			$class='padding-right-15 padding-left-none border-right-none';
		}elseif($i==7) {
			$class='padding-left-15 padding-right-none';
		}
		elseif($i== 8) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 9) {
			$class='padding-right-15 padding-left-none border-right-none';
			
		}elseif($i==10) {
			$class='padding-left-15 padding-right-none';
		}
		elseif($i== 11) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 12) {
			$class='padding-right-15 padding-left-none border-right-none';	
		}else {
			
		}
		$i++;
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-4 col-sm-4 col-xs-12 '.$class.'">
					<article class="style3 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							'.$video.'
							<div class="beforeanotherstyle5">
								<div class="anotherstyle5 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>	
				  </div>'; 
			endwhile; endif;
			$list .='</div>';
			
			$list .='</div>';
			
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_30_post', 'pantograph_post_block_30_shortcode');

/*****************
Post Block 31 Post List 
*****************/

function pantograph_post_block_31_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
			if($blockhovercolor){
			include('css/colors/p31/blockhovercolor.php');
			}else{
				
				if($blockcolor){
				include('css/colors/p31/dependent-blockcolor.php');
				}
			}
			
			if($blockcategorybackground){
			include('css/colors/p31/blockcategorybackground.php');
			}
			
			if($blockcolor){
			include('css/colors/p31/blockcolor.php');
			}
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){

			if($blockheadingcolor){
			include('css/colors/p31/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p31/blockheadingbackgroundcolor.php');		
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p31/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p31/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p31/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p31/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p31/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p31/blockdatecolor.php');
			}
			}
			
			$list ='';
			$list .='<div class="post_block_31 post_block_31'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			$list .= '<div class="row style4-4-6">';
		$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		$post_array_new1 = array();	
		while ($the_query->have_posts()) : $the_query->the_post();
		$post_array_new1[] = get_the_ID();	
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-3 col-sm-4 col-xs-12 padding-right-none">
					<div class="col-md-12 col-sm-12 padding-left-none padding-right-none">
					<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
					endwhile;
					
					$queryarry2 = array_merge((array)$post_array_new1);
					$post_array_new2 = array();	
					$the_query2 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry2, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
					while ($the_query2->have_posts()) : $the_query2->the_post();
					$post_array_new2[] = get_the_ID();
					
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						$primary_category_link = get_the_category_list(', ');
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .='<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
				endwhile;
			
					
				$list .='</div></div>
				<div class="col-md-6 col-sm-4 col-xs-12 padding-right-none padding-left-2">';
				
				if($large_post_id==''){
				$the_query1 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				}else{
					$the_query1 = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
				}
				$queryarry3 = array_merge((array)$post_array_new1,(array)$post_array_new2);
				$post_array_new3 = array();		
				$the_query3 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry3, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				while ($the_query3->have_posts()) : $the_query3->the_post();
				$post_array_new3[] = get_the_ID();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					$primary_category_link = get_the_category_list(', ');
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '
				<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
						<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
							</div>
							<div class="beforeanotherstyle3">
								<div class="anotherstyle3 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>
				';
				endwhile;
				$list .= '</div>'; 
				$list .='<div class="col-md-3 col-sm-4 col-xs-12 padding-left-2">
							<div class="col-md-12 col-sm-12 padding-left-none padding-right-none">';
				$queryarry4 = array_merge((array)$post_array_new1,(array)$post_array_new2,(array)$post_array_new3);	
				$post_array_new4 = array();	
				$the_query4 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry4, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				while ($the_query4->have_posts()) : $the_query4->the_post();
				$post_array_new4[] = get_the_ID();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					$primary_category_link = get_the_category_list(', ');
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>'; 
				endwhile;
				
				
					
				$queryarry5 = array_merge((array)$post_array_new1,(array)$post_array_new2,(array)$post_array_new3,(array)$post_array_new4);	
				$the_query5 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry5, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
				while ($the_query5->have_posts()) : $the_query5->the_post();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					$primary_category_link = get_the_category_list(', ');
				}
				$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>'; 
			endwhile;
			$list .='</div></div>';
			$list .= '</div>'; 
			
			$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_31_post', 'pantograph_post_block_31_shortcode');


/*****************
Post Block 32 Post List 
*****************/

function pantograph_post_block_32_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'current_time' => time(),
		'imageanimate' => 'no',
		'large_post_id' => '',
		'large_post_title_limit' => 100,
        'blockcolor' => '',
        'itemcount' => 5,
        'title_character_limit' => 100,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading',
		'bgimagecls' => '',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blocktextcolor' => '',
		'blockhovercolor' => '',
		'blockdatecolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockcategorybackground' => '',
		'blockborder' => 'no'
), $atts) );
			if($imageanimate=='yes'){ $bgimagecls='bg-img';}else{$bgimagecls='';}
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($title_character_limit==''){ $title_character_limit=100;}else{$title_character_limit=$title_character_limit;}
			if($large_post_title_limit==''){ $large_post_title_limit=15;}else{$large_post_title_limit=$large_post_title_limit;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			include('css/colors/p32/common.php');
		if((!empty($blockcolor)) || (!empty($blockhovercolor)) || (!empty($blockcategorybackground))){
		if($blockhovercolor){
			include('css/colors/p32/blockhovercolor.php');
			}else{
				
			if($blockcolor){	
				include('css/colors/p32/dependent-blockcolor.php');
			}
			}
			if($blockcategorybackground){
			include('css/colors/p32/blockcategorybackground.php');
			}
			if($blockcolor){
			include('css/colors/p32/blockcolor.php');
			}
		}	
		if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor)) || (!empty($blockdatecolor))){
			if($blockheadingcolor){
			include('css/colors/p32/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/p32/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/p32/dependent-blockbackgroundcolor.php');	
				}
			}
			if($blockbordercolor){
			include('css/colors/p32/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/p32/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/p32/blockposttitlecolor.php');
			}
			
			if($blocktextcolor){
			include('css/colors/p32/blocktextcolor.php');
			}
			if($blockdatecolor){
			include('css/colors/p32/blockdatecolor.php');
			}
			}	
			
			$list ='';
			$list .='<div class="post_block_32 post_block_32'.$current_time.' '.$blockborder.'">';
		if($heading){		
		$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
		}
		$list .= '<div class="row">';
		
			if($large_post_id==''){
			$the_query1 = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		}else{
			$the_query1 = new WP_Query( array('p' => $large_post_id, 'post_type' => 'any'));
		}
		$post_array_new1 = array();	
		while ($the_query1->have_posts()) : $the_query1->the_post();
		$post_array_new1[] = get_the_ID();	
	$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
	if($featured_img){
		if ( new_wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
	}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
	}
	$primary_category = '';
	$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
	if($primary_category){
		$primary_category_name = get_cat_name( $primary_category );
		$category_link = get_category_link( $primary_category );
		$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
	}else{
		$primary_category_link = get_the_category_list(', ');
	}
	if ( has_post_format( 'video' ) ) : 
		$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:72px;height:72px;" /></a></div>';
	else:
		$videoicon = '';
	endif;
	$list .= '<div class="col-md-12">
				<div class="style3 article-home">
					<div class="post-thumb">
					'.$videoicon.'	
						<div class="small-title cat" style="padding: 10px;">' . $primary_category_link . '</div>
						<div class="post-excerpt" style="padding: 10px;">
							<div class="meta">
								<span class="date">'.get_the_time('M j, Y').'</span>
							</div>
							<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $large_post_title_limit, '...' ) . '</a></h3>
							<div class="meta">
								<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								<span class="views"><i class="fa fa-eye"></i> '.pantograph_getPostViews(get_the_ID()).' </span>
							</div>
						</div>
						<div class="overlay overlay-02"></div>
						<div class="beforethumbnail210">
							<div class="thumbnail210 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</div>
				</div>'; 
		endwhile;
		
		$list .= '<div class="row">';	
		$queryarry3 = array_merge((array)$post_array_new1);
		$post_array_new3 = array();		
		$the_query3 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry3, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		while ($the_query3->have_posts()) : $the_query3->the_post();
		$post_array_new3[] = get_the_ID();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
			} else {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-6 col-sm-6 padding-right-none">
					<div class="style3 article-home">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="post-excerpt" style="padding: 10px;">
								<h3 class="text-white" style="font-size: 14px;"><a style="line-height: 18px;" href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforethumbnail185">
								<div class="thumbnail185 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</div>				
				</div>'; 
		endwhile;
		$queryarry4 = array_merge($post_array_new1,$post_array_new3);	
		$the_query4 = new WP_Query( array('post_type' => 'post', 'post__not_in' => $queryarry4, 'posts_per_page' => 1, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		while ($the_query4->have_posts()) : $the_query4->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_wp_is_mobile() ) {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
			} else {
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			$primary_category_link = get_the_category_list(', ');
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-6 col-sm-6 padding-left-5">
					<div class="style3 article-home">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="post-excerpt" style="padding: 10px;">
								<h3 class="text-white" style="font-size: 14px;"><a style="line-height: 18px;" href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforethumbnail185">
								<div class="thumbnail185 '.$bgimagecls.'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</div>			
				</div>
			</div>
			'; 
		endwhile;
		$list .='</div>
				</div>';
		
			
		$list .='</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_post_block_32_post', 'pantograph_post_block_32_shortcode');

/*****************
Related Post List For Post Category
*****************/

function pantograph_related_post_for_post_category_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
        'category' => pantograph_default_category(),
		'title_character_limit' => 100,
        'itemcount' => 5,
        'orderby' => 'title',
        'order' => 'DESC',
        'heading' => 'Heading'
), $atts) );
$list ='';	
$list .='<div class="related_post_sec_for_post_category">';
if($heading){
$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
}
$list .= '<div class="mini-posts">';
$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
$post_array_new = array();	
while ($the_query->have_posts()) : $the_query->the_post();
$idd = get_the_ID();
$post_array_new[] = get_the_ID();	
$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
if($featured_img){
	if ( new_wp_is_mobile() ) {
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
	} else {
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
	}
}else{
	$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
}
$list .= '<article class="style2 style-alt">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail">
							<div class="thumbnail bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</a>
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="post-excerpt no-padding">
						<div class="meta">
							<span>'.get_the_time('M j, Y').'</span>
						</div>
						<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
					</div>
				</div>
			</div>
		</article>';
endwhile;

$list.= '</div>';
$list.= '</div>';
wp_reset_postdata();
return $list;
}
add_shortcode('pantograph_related_post_for_post_category', 'pantograph_related_post_for_post_category_shortcode');

/******************
UL Style
******************/
function pantograph_ul_style_shortcode( $atts, $content = null ) {
    $output = $image_one = '';
	extract( shortcode_atts( array(
    'list_style_title' => '',
    'ul_style' => '',
    'features' => '',
    ), $atts));
	
	$output = '';
	if(!empty($list_style_title)){
		 $output .= '<h4>'.$list_style_title.'</h4>';
	}
    if(!empty($features)){
      $output .= '<ul class="list-style-'.$ul_style.'">';
      $features = !empty($features) ? explode("\n", trim($features)) : array(); 
      foreach($features as $feature) {
        $output .= '<li>'.htmlspecialchars_decode($feature).'</li>';
      }
      $output .= '</ul>';
    }
    return $output;
}
add_shortcode('pantograph_shortcodes_of_ul', 'pantograph_ul_style_shortcode');



/*****************
Recent Comment List 
*****************/

function pantograph_recent_comment_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
		'itemcount' => 5,
        'current_time' => time(),
        'blockcolor' => '',
        'heading' => 'Heading',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blockhovercolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if($blockcolor){
			include('css/colors/recent-comment/blockcolor.php');
			}
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockhovercolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor))){

			if($blockheadingcolor){
			include('css/colors/recent-comment/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/recent-comment/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/recent-comment/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/recent-comment/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/recent-comment/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/recent-comment/blockposttitlecolor.php');
			}
			if($blockhovercolor){
			include('css/colors/recent-comment/blockhovercolor.php');
			}elseif($blockcolor){
				include('css/colors/recent-comment/dependent-blockcolor.php');
				}else{}
			}
			
			$list ='';
			$list .='<div class="recent_comment recent_comment'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}
			
			$args = array(
				'status' => 'approve',
				'number' => $itemcount
			);
			$comments = get_comments($args);
			$list .= '<ul id="recentcomments">';
			if (is_array($comments) || is_object($comments))
			{
			foreach($comments as $comment) :
			$list .= '<li class="recentcomments"><span class="comment-author-link"><a href="'.$comment->comment_author_url.'">'.$comment->comment_author.'</a></span> on <a href="'.get_comment_link( $comment->comment_ID ).'">'.$comment->comment_content.'</a></li>';
			endforeach;
			}
			$list .= '</ul>';
			
			$list.= '</div>';
			
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_recent_comment_post', 'pantograph_recent_comment_shortcode');


/*****************
Recent Post List 
*****************/

function pantograph_recent_post_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
		'itemcount' => 5,
        'current_time' => time(),
        'blockcolor' => '',
        'heading' => 'Heading',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blockhovercolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if($blockcolor){
			include('css/colors/recent-post/blockcolor.php');
			}
			
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockhovercolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor))){
			if($blockheadingcolor){
			include('css/colors/recent-post/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/recent-post/blockheadingbackgroundcolor.php');	
			}else{
				if($blockbackgroundcolor){
				include('css/colors/recent-post/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/recent-post/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/recent-post/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/recent-post/blockposttitlecolor.php');
			}
			if($blockhovercolor){
			include('css/colors/recent-post/blockhovercolor.php');
			}elseif($blockcolor){
				include('css/colors/recent-post/dependent-blockcolor.php');
				}else{}
			}
			
			$list ='';
			$list .='<div class="recent_post recent_post'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}

			$list .= '<ul class="recentposts">';
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount));
			while ($the_query->have_posts()) : $the_query->the_post();
			$list .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
			endwhile;		
			$list .= '</ul>';
			
			$list.= '</div>';
		
			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_recent_post', 'pantograph_recent_post_shortcode');

/*****************
Popular Post List 
*****************/

function pantograph_popular_post_shortcode($atts){
extract( shortcode_atts( array(
		'type' => 'post',
		'itemcount' => 5,
        'current_time' => time(),
        'blockcolor' => '',
        'heading' => 'Heading',
		'blockbordercolor' => '',
		'blockbackgroundcolor' => '',
		'blockposttitlecolor' => '',
		'blockhovercolor' => '',
		'blockheadingcolor' => '',
		'blockheadingbackgroundcolor' => '',
		'blockborder' => 'no'
), $atts) );
			if($blockborder=='yes'){ $blockborder='pantograph-make-border';}else{$blockborder='';}
			
			if($itemcount==''){ $itemcount=2;}else{$itemcount=$itemcount;}
			if($current_time==''){ $current_time = time();}else{$current_time=$current_time;}
			
			if($blockcolor){
			include('css/colors/popular-posts/blockcolor.php');
			}
			if((!empty($blockheadingcolor)) || (!empty($blockheadingbackgroundcolor)) || (!empty($blockbordercolor)) || (!empty($blockbackgroundcolor)) || (!empty($blockposttitlecolor)) || (!empty($blockhovercolor)) || (!empty($blockcolor)) || (!empty($blocktextcolor))){
			$list .='<style>';
			if($blockheadingcolor){
			include('css/colors/popular-posts/blockheadingcolor.php');
			} 
			if($blockheadingbackgroundcolor){
			include('css/colors/popular-posts/blockheadingbackgroundcolor.php');
			}else{
				if($blockbackgroundcolor){
				include('css/colors/popular-posts/dependent-blockbackgroundcolor.php');
				}
			}
			if($blockbordercolor){
			include('css/colors/popular-posts/blockbordercolor.php');
			}
			if($blockbackgroundcolor){
			include('css/colors/popular-posts/blockbackgroundcolor.php');
			}
			if($blockposttitlecolor){
			include('css/colors/popular-posts/blockposttitlecolor.php');
			}
			if($blockhovercolor){
			include('css/colors/popular-posts/blockhovercolor.php');
			}elseif($blockcolor){
				include('css/colors/popular-posts/dependent-blockcolor.php');
				}else{}
			}
				
			$list ='';
			$list .='<div class="popular_post popular_post'.$current_time.' '.$blockborder.'">';
			if($heading){		
			$list .= '<h3 class="margin-bottom-15"><b>'.$heading.'</b></h3>';
			}

			$list .= '<ul class="popularposts">';
			$the_query = new WP_Query( array('posts_per_page' => $itemcount, 'ignore_sticky_posts' => 1, 'orderby' => 'comment_count'));
			while ($the_query->have_posts()) : $the_query->the_post();
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				$primary_category_link = get_the_category_list(' ');
			}	
			$list .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
			$list .= '<div class="td-module-meta-info">
					   <span class="popular-post-author-link">'.$primary_category_link.' <span>-</span> </span> 
					   <span class="popular-post-author-name">'.get_the_author_posts_link().' <span>-</span> </span> 
					   <span class="td-post-date">
					   <time class="entry-date updated td-module-date">'.get_the_time('M j, Y').'</time>
					   </span> 
					   <div class="td-module-comments"><a href="'.get_comments_link().'">'.get_comments_number().'</a></div>
					</div>';
			endwhile;		
			$list .= '</ul>';
			
			$list.= '</div>';

			$list.= '</div>';
			wp_reset_postdata();
			return $list;
			}
add_shortcode('pantograph_popular_post', 'pantograph_popular_post_shortcode');


if(class_exists('WPBakeryVisualComposerAbstract')) {
	include_once('vc_shortcodes.php');
}