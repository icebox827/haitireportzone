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
<div class="pionusblog inner-content<?php if($pionusnews_hide_title==1){ ?> pzero<?php } ?> one-column-title-overlay blog-one-column-standard <?php if( ($global_white_conainter==1)){ echo esc_html('container no-padding-left-right', 'pantograph');} ?>">
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
			?>
			<div class="row">
				<div class="col-md-8">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$original_query = $wp_query;
					$wp_query = null;
					$args=array('posts_per_page'=>$pionusnews_ppp_limit, 'paged'=>$paged, 'post__not_in' => $exclude_postid);
					$wp_query = new WP_Query( $args );
					if ( have_posts() ) :
					?>
					<section id="posts_load_pagination">
					<?php
					while (have_posts()) : the_post();
					
					$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
					if($custom_image_url){
						$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
					}else{
						$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
					?>
				
				<?php if ( has_post_format( 'video' ) ) : ?>
				<article <?php post_class('style2'); ?> id="post-<?php the_ID(); ?>">
					<div class="post-excerpt">
						<h1><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
						<?php echo get_first_video_embed(get_the_ID()); ?>
						<div class="meta">
							<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
							<span><?php the_time(get_option('date_format')); ?></span>
							<span class="comment">
							<a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
							<?php esc_html_e(' In ', 'pantograph'); ?>
							</span>
							<span class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></span>
						</div>
						<p><?php echo pionusnews_theme_blog_excerpt($blog_excerpt_limit); ?></p>
						<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
					</div>
				</article>
				<?php else: ?>
				<?php if ($get_image) : ?>
				<article <?php post_class('style3'); ?> id="post-<?php the_ID(); ?>">
					<div class="post-thumb">
						<div class="small-title cat"><?php echo pionusnews_category_styles(); ?></div>
						<div class="post-excerpt">
							<div class="meta">
								<span class="date"><?php the_time(get_option('date_format')); ?></span>
							</div>
							<h1 class="h1 text-white"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
							<div class="meta">
								<span class="author"><?php echo get_avatar( get_the_author_meta('email'), '25' ); ?> <?php the_author_posts_link(); ?></span>
								<span class="comment"><a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a></span>
								<?php if(function_exists('pionusnews_getPostViews')) { ?>
								<span class="views"><i class="fa fa-eye"></i> <?php  echo pionusnews_getPostViews(get_the_ID()); ?></span>
								<?php } ?>
							</div>
						</div>
						<div class="overlay overlay-02"></div>
						<div class="beforeonecollargestyle">
							<div class="onecollargestyle bg-img" style="background-image: url(<?php echo esc_url( $get_image ); ?>); opacity: 1;">
						</div>
						</div>
					</div>
					<p><?php echo pionusnews_theme_blog_excerpt($blog_excerpt_limit); ?></p>
					<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>				
					</article>
					<?php else: ?>
						<article <?php post_class('style2'); ?> id="post-<?php the_ID(); ?>">
							<div class="post-excerpt">
								<h1><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
									<a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
									<?php esc_html_e(' In ', 'pantograph'); ?>
									</span>
									<span class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></span>
								</div>
								<p><?php echo pionusnews_theme_blog_excerpt($blog_excerpt_limit); ?></p>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						</article>
					<?php endif; ?>
					<?php endif; ?>
						<?php endwhile; ?>
					</section>
					<div class="row"><div class="<?php if(pionusnews_get_option('pagination_position') == 1){ ?>col-md-12 col-sm-12<?php } else { ?><?php if($pagination_post_style==1){ ?>col-md-6 col-md-offset-4 col-sm-8 col-sm-offset-4<?php } else { ?>col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4<?php } ?><?php } ?>">
					<?php 
					if($pagination_post_style==1){
					pionusnews_custom_pagination();
					}else{
					pionusnews_custom_loadmore(); 
					}
					?>
					</div></div>
					<?php	
						endif; 
						$wp_query = null;
						$wp_query = $original_query;    
						wp_reset_postdata();   
					?>
				
				</div>
				<?php get_template_part( 'template-parts/pionus/sidebar', 'pionus' ); ?>
			</div>
		</div>
	</div>