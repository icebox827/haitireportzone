<?php
$blog_excerpt_limit = empty( pionusnews_get_option('pionusnews_blog_excerpt')) ? 55 : pionusnews_get_option('pionusnews_blog_excerpt');
$pagination_post_style = pionusnews_get_option('pagination_post_style');
$pionusnews_ppp_limit = get_post_meta(get_the_ID(), 'pionusnews_ppp_limit', true);
$pionusnews_hide_title = get_post_meta(get_the_ID(), 'pionusnews_hide_title', true);
$pionusnews_on_breadcrumbs = pionusnews_get_option('pionusnews_on_breadcrumbs');
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
<div class="pionusblog inner-content<?php if($pionusnews_hide_title==1){ ?> pzero<?php } ?> one-column-content-left-right blog-classic-layout <?php if( ($global_white_conainter==1)){ echo esc_html('container no-padding-left-right', 'pantograph');} ?>">
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
			<div class="norowhere">
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
					$i=0;
					while (have_posts()) : the_post();  
						$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
						if($custom_image_url){
							$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
						}elseif ( has_post_thumbnail() ) {
							$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
						}else{
							$get_image = get_template_directory_uri().'/template-parts/pionus/img/blank.png';
						}
					
					if ($i % 2 == 0)
						{
					?>
				
					<div <?php post_class('anotherstyle2 lefteven'); ?> id="post-<?php the_ID(); ?>">
						<div class="row">
							<div class="col-md-6 col-sm-6">
							<?php if ( has_post_format( 'video' ) ) : ?>
							<?php echo get_first_video_embed(get_the_ID()); ?>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>">
									<div class="beforethumbnail335 article-thumb">
										<div class="thumbnail335 bg-img" style="background-image: url(<?php echo esc_url( $get_image ); ?>); opacity: 1;">
										</div>
									</div>
								</a>
							<?php endif; ?>	
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="post-excerpt">
									<?php if ( has_post_format( 'video' ) ){ ?>
									<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<div class="meta">
										<span><?php echo esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
										<span><?php echo esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
										<span class="comment"><a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
										<?php esc_html_e(' In ', 'pantograph'); ?>
										</span>
										<span class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></span>
									</div>
									<?php }else{ ?>
									<?php if ( $get_image){ ?>
									<div class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></div>
									<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<div class="meta">
										<span><?php echo esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
										<span><?php echo esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
										<span class="comment"><a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a></span>
									</div>
									<?php }else{ ?>
									<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<div class="meta">
										<span><?php echo esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
										<span><?php echo esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
										<span class="comment"><a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
										<?php esc_html_e(' In ', 'pantograph'); ?>
										</span>
										<span class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></span>
									</div>
									<?php } ?>
									<?php } ?>
									<p><?php echo pionusnews_theme_blog_excerpt($blog_excerpt_limit); ?></p>
								</div>
								
								<?php 
								if(function_exists('pionusnews_social_share_left_right')) {
									echo pionusnews_social_share_left_right(); 
								} 
								?>
							</div>
						</div>
					</div>
					<?php }else{ ?>
					<div <?php post_class('anotherstyle2 rightodd'); ?> id="post-<?php the_ID(); ?>">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="post-excerpt">
									<?php if ( has_post_format( 'video' ) ){ ?>
									<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<div class="meta">
										<span><?php echo esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
										<span><?php echo esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
										<span class="comment"><a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
										<?php esc_html_e(' In ', 'pantograph'); ?>
										</span>
										<span class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></span>
									</div>
									<?php }else{ ?>
									<?php if ( $get_image){ ?>
									<div class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></div>
									<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<div class="meta">
										<span><?php echo esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
										<span><?php echo esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
										<span class="comment"><a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a></span>
									</div>
									<?php }else{ ?>
									<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<div class="meta">
										<span><?php echo esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
										<span><?php echo esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
										<span class="comment"><a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
										<?php esc_html_e(' In ', 'pantograph'); ?>
										</span>
										<span class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></span>
									</div>
									<?php } ?>
									<?php } ?>
									<p><?php echo pionusnews_theme_blog_excerpt($blog_excerpt_limit); ?></p>
								</div>
								<?php 
								if(function_exists('pionusnews_social_share_left_right')) {
									echo pionusnews_social_share_left_right(); 
								} 
								?>
							</div>
							<div class="col-md-6 col-sm-6">
								<?php if ( has_post_format( 'video' ) ) : ?>
								<?php echo get_first_video_embed(get_the_ID()); ?>
								<?php else: ?>
								<a href="<?php the_permalink(); ?>">
									<div class="beforethumbnail335 article-thumb">
										<div class="thumbnail335 bg-img" style="background-image: url(<?php echo esc_url( $get_image ); ?>); opacity: 1;">
										</div>
									</div>
								</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					
					<?php } ?>
					<?php $i++;?>
					<?php endwhile; ?>
					</section>
					<div class="row"><div class="<?php if(pionusnews_get_option('pagination_position') == 1){ ?>col-md-12 col-sm-12<?php } else { ?>col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4<?php } ?>">
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
		</div>
	</div>