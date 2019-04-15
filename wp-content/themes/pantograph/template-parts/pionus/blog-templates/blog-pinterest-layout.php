<?php
$blog_excerpt_limit = empty( pionusnews_get_option('pionusnews_blog_excerpt')) ? 55 : pionusnews_get_option('pionusnews_blog_excerpt');
$pagination_post_style = pionusnews_get_option('pagination_post_style');
$pionusnews_ppp_limit = get_post_meta(get_the_ID(), 'pionusnews_ppp_limit', true);
$pionusnews_on_breadcrumbs = pionusnews_get_option('pionusnews_on_breadcrumbs');
$pionusnews_hide_title = get_post_meta(get_the_ID(), 'pionusnews_hide_title', true);
$global_white_conainter = pionusnews_get_option('global_white_conainter');
$cat_top_posts = empty( pionusnews_get_option('cat_top_posts') ) ? 0 : pionusnews_get_option('cat_top_posts');
$top_posts_template = empty( pionusnews_get_option('top_posts_template') ) ? 1 : pionusnews_get_option('top_posts_template'); 
$cat_top_posts_fullwidth = empty( pionusnews_get_option('cat_top_posts_fullwidth') ) ? 0 : pionusnews_get_option('cat_top_posts_fullwidth');
$cat_top_post_ids = empty( pionusnews_get_option('cat_top_post_ids') ) ? '' : pionusnews_get_option('cat_top_post_ids');
$showposts = empty( pionusnews_get_option('cat_top_post_items') ) ? 3 : pionusnews_get_option('cat_top_post_items'); //Users should be able to choose the value of this variable. THIS WILL DEFINE HOW MANY POSTS WILL BE IN THE TOP-POSTS SECTION
$ASC_DESC = empty( pionusnews_get_option('cat_top_post_order') ) ? 'DESC' : pionusnews_get_option('cat_top_post_order'); //Users should be able to choose the value of this variable. THIS WILL DEFINE THE TOP-POSTS ORDER (ASC/DESC)
$show_posts_per_ids = array(); //by default the value must be 'array()'.
$exclude_postid = empty( $cat_top_post_ids ) ? array() : explode(',', $cat_top_post_ids); //Users should be able to choose the value of this variable, by default the value must be 'array(9999999)'. THIS WILL DIFINE WHICH POST IDS ARE TOP POSTS
$show_posts_per_ids = $exclude_postid; //Look at the line 2 and line 3 of this file
$show_posts_per_ids_1st = array(empty( $show_posts_per_ids[0] ) ? 1 : $show_posts_per_ids[0]);
$show_posts_per_ids_2nd = array(empty( $show_posts_per_ids[1] ) ? 1 : $show_posts_per_ids[1]);
$show_posts_per_ids_3rd = array(empty( $show_posts_per_ids[2] ) ? 1 : $show_posts_per_ids[2]);
$show_posts_per_ids_4th = array(empty( $show_posts_per_ids[3] ) ? 1 : $show_posts_per_ids[3]);
$show_posts_per_ids_5th = array(empty( $show_posts_per_ids[4] ) ? 1 : $show_posts_per_ids[4]);
$show_posts_per_ids_rest = array();
if (!empty($show_posts_per_ids[1]) && !empty($show_posts_per_ids[2])) {
$show_posts_per_ids_rest = array($show_posts_per_ids[1], $show_posts_per_ids[2]);
}
?>	
<div class="pionusblog inner-content<?php if($pionusnews_hide_title==1){ ?> pzero<?php } ?> three-column-image-overlay blog-pinterest-layout <?php if( ($global_white_conainter==1)){ echo esc_html('container no-padding-left-right', 'pantograph');} ?>">	
		<?php
			if(($cat_top_posts==1) && ($cat_top_posts_fullwidth==1)){			
			echo pionusnews_category_top_posts($show_posts_per_ids_1st, $show_posts_per_ids_2nd, $show_posts_per_ids_3rd, $show_posts_per_ids_4th, $show_posts_per_ids_5th, $show_posts_per_ids_rest, $show_posts_per_ids, $top_posts_template, $showposts, $ASC_DESC);
			}
			?>
		<div class="container">
			<?php if($pionusnews_hide_title==0){ ?>
			<div class="row">
				<div class="col-md-12">	
					<div class="section-head">
						<?php
						if($pionusnews_on_breadcrumbs==1){  
						pionusnews_wordpress_breadcrumbs(); }
						?>
						<h2><?php echo get_the_title(); ?></h2> 
					</div>
				</div>
			</div>
			<?php } ?>
			<?php
			if(($cat_top_posts==1) && ($cat_top_posts_fullwidth==0)){				
			echo pionusnews_category_top_posts($show_posts_per_ids_1st, $show_posts_per_ids_2nd, $show_posts_per_ids_3rd, $show_posts_per_ids_4th, $show_posts_per_ids_5th, $show_posts_per_ids_rest, $show_posts_per_ids, $top_posts_template, $showposts, $ASC_DESC);
			}
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$original_query = $wp_query;
			$wp_query = null;
			$args=array('posts_per_page'=>$pionusnews_ppp_limit, 'paged'=>$paged, 'post__not_in' => $exclude_postid);
			$wp_query = new WP_Query( $args );
			$postcontent = '';
			if ( have_posts() ) :
			?>
			<div class="row">
			<div class="masonry masonry-columns-3">
			<section id="posts_load_pagination">
			<?php
			while (have_posts()) : the_post();
			$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
			if($custom_image_url){
				$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
			}else{
				$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
			$postcontent .= '
			<article class="postcontent post masonry-item-new">
				';
				if ( has_post_format( 'video' )) {
					$postcontent .= '
					<div class="col-md-12 no-padding margin-bottom-minus-10">
					'.get_first_video_embed(get_the_ID()).'
					</div>
					<div class="post-excerpt">
						<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
						<span class="date">'.get_the_time('M j, Y').' In</span>
						<span class="catlist">'.pionusnews_category_styles().'</span>
						<span class="comment"> <a class="meta-link" href="'.get_the_permalink().'"><i class="far fa-comment"></i> '.get_comments_number().'</a> </span>
					</div>
					';
				}else{	
				if($get_image){
				$postcontent .= '
					<div class="overlay overlay-02"></div>
					<div class="col-md-12 no-padding margin-bottom-0">
					<a href="'.get_the_permalink().'">
						<img src="'.esc_url($get_image).'" />
					</a>
					</div>
					<div class="post-excerpt">
						<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
						<span class="date">'.get_the_time('M j, Y').' In</span>
						<span class="catlist">'.pionusnews_category_styles().'</span>
						<span class="comment"> <a class="meta-link" href="'.get_the_permalink().'"><i class="far fa-comment"></i> '.get_comments_number().'</a> </span>
					</div>
					';
				}else{
					$postcontent .= '
					<div class="post-excerpt text-center padding-left-10 padding-right-10">
						<h4 class="only_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
						<span class="author"> - '.get_the_author_posts_link().'</span>
					</div>
					';
				}
				}
				$postcontent .= '
			</article>
			';
			endwhile;
			print $postcontent; // escaped before already
			?>
			</section>
			</div>		
			</div>
			<div class="row"><div class="<?php if(pionusnews_get_option('pagination_position') == 1){ ?>col-md-12 col-sm-12<?php } else { ?>col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4<?php } ?>">
					<?php 
					if($pagination_post_style==1){
					pionusnews_custom_pagination();
					}else{
					pionusnews_custom_loadmore(); 
					}
					?>
				</div>
			</div>	
			<?php 
			endif; 
			$wp_query = null;
			$wp_query = $original_query;    
			wp_reset_postdata();   
			?>			
		</div>
	</div>