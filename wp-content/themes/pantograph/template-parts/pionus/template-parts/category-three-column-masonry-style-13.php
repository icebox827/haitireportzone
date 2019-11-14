<?php
$pagination_post_style = pionusnews_get_option('pagination_post_style');
$cat_id = get_query_var('cat');
$term = get_term_by('id', $cat_id, 'category');
if ( ! empty($term) && is_array($term) ) {
$color = get_term_meta( $term->term_id, '_category_color', true );
} else {
$color = '';
}
//then i get the data from the database
$cat_data = get_option("category_$cat_id");

$cat_top_posts = empty( $cat_data['cat_top_posts'] ) ? 0 : $cat_data['cat_top_posts'];
$category_excerpt_limit = empty( $cat_data['category_excerpt_limit'] ) ? 55 : $cat_data['category_excerpt_limit'];
$top_posts_template = empty( $cat_data['cat_top_post_template'] ) ? 1 : $cat_data['cat_top_post_template']; //Users should be able to choose the value of this variable. THIS WILL DEFINE WHICH TOP-POST TEMPLATE SHOULD BE USED
$cat_top_post_ids = empty( $cat_data['cat_top_post_ids'] ) ? '' : $cat_data['cat_top_post_ids'];
$showposts = empty( $cat_data['cat_top_post_items'] ) ? 3 : $cat_data['cat_top_post_items']; //Users should be able to choose the value of this variable. THIS WILL DEFINE HOW MANY POSTS WILL BE IN THE TOP-POSTS SECTION
$ASC_DESC = empty( $cat_data['cat_top_post_order'] ) ? 'DESC' : $cat_data['cat_top_post_order']; //Users should be able to choose the value of this variable. THIS WILL DEFINE THE TOP-POSTS ORDER (ASC/DESC)
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

$cat_title = $cat_data['custom_cat_title'];
$show_hide_title = $cat_data['show_hide_title'];
$show_hide_cat_desc = $cat_data['show_hide_cat_desc'];
if(isset($cat_data['show_cat_img'])){
	$show_cat_img = $cat_data['show_cat_img'];
}else{
	$show_cat_img = '';
}
if(isset($cat_data['show_hide_breadcrumb'])){
	$show_hide_breadcrumb = $cat_data['show_hide_breadcrumb'];
}else{
	$show_hide_breadcrumb = '';
}
?>

<div class="inner-content three-column-masonry-style-13">	
		<div class="container">
		<?php if(($show_hide_breadcrumb==1) || ($cat_data['show_hide_title']==1) || ($cat_data['show_hide_cat_desc']==1)){ ?>
			<div class="row">
				<div class="col-md-12">	
					<div class="section-head">
						<?php
						if($show_hide_breadcrumb==1){  
						pionusnews_wordpress_breadcrumbs(); }
						?>
						
						<?php if($cat_data['show_hide_title']==1){ ?>
						<h2>
						<?php
							if($cat_title == ''){
								single_cat_title();
							}else{	
							echo esc_attr($cat_title);
							}	
						?>
						</h2> 
						<?php }	?>
						
						<?php if($cat_data['show_hide_cat_desc']==1){ ?>
							<small><?php echo category_description( $cat_id ); ?></small>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php }	?>
			<?php
			if($cat_top_posts==1){				
			echo pionusnews_category_top_posts($show_posts_per_ids_1st, $show_posts_per_ids_2nd, $show_posts_per_ids_3rd, $show_posts_per_ids_4th, $show_posts_per_ids_5th, $show_posts_per_ids_rest, $show_posts_per_ids, $top_posts_template, $showposts, $ASC_DESC);
			}
			?>
			<?php 
			if ( have_posts() ) :
			?>
			<div class="row">
				<div class="masonry masonry-columns-3">
					 <section id="posts_load_pagination">
					<?php
					while (have_posts()) : the_post();  
					if($show_cat_img==1){
						$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
						if($custom_image_url){
							$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
						}else{
							$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
						}							
					}else{
						$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
					?>	
					<div <?php post_class('masonry-item'); ?> id="post-<?php the_ID(); ?>">
						<article>
						<?php if ( has_post_format( 'video' ) ) : ?>
							<div class="col-md-12 no-padding margin-bottom-10">
								<?php echo get_first_video_embed(get_the_ID()); ?>
							</div>
							<div class="post-excerpt">
								<div class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></div>
								<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
										<a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php pionusnews_theme_excerpt($category_excerpt_limit); ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						<?php else: ?>
						<?php if($get_image){ ?>
							<div class="col-md-12 no-padding margin-bottom-10">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo esc_url( $get_image ); ?>" />
								</a>
							</div>
							<div class="post-excerpt">
								<div class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></div>
								<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
										<a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php pionusnews_theme_excerpt($category_excerpt_limit); ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						<?php }else{ ?>
						<div class="post-excerpt">
							<div class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></div>
							<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
							<div class="meta">
								<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
								<span><?php the_time(get_option('date_format')); ?></span>
								<span class="comment">
									<a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
								</span>
							</div>
							<?php pionusnews_theme_excerpt($category_excerpt_limit); ?>
							<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
						</div>
						<?php } ?>
						<?php endif; ?>
						</article>
					</div>
				<?php endwhile; ?>	
				</section>
				</div>
			</div>
			<div class="row paginatedpage-margin"><div class="<?php if(pionusnews_get_option('pagination_position') == 1){ ?>col-md-12 col-sm-12<?php } else { ?>col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4<?php } ?>">
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
			?>
							
		</div>
	</div>