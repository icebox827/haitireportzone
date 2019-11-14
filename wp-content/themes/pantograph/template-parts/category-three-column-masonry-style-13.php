<?php
$cat_id = get_query_var('cat');
$term = get_term_by('id', $cat_id, 'category');
$color = get_term_meta( $term->term_id, '_category_color', true );

//then i get the data from the database
$cat_data = get_option("category_$cat_id");

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
						pantograph_wordpress_breadcrumbs(); }
						?>
						
						<?php if($cat_data['show_hide_title']==1){ ?>
						<h2>
						<?php
							if($cat_title == ''){
								single_cat_title('Articles from ');
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
			
			<div class="row">
				<div class="masonry masonry-columns-3">
				<?php 
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
					elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
					else { $paged = 1; }
					$the_query = new WP_Query( array(
					'post_type' => 'post',
					'paged' => $paged,					
					'cat' => $cat_id
					));
					if (have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post();
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
					<div class="masonry-item">
						<article>
						<?php if ( has_post_format( 'video' ) ) : ?>
							<div class="col-md-12 no-padding margin-bottom-10">
								<?php echo get_first_video_embed(get_the_ID()); ?>
							</div>
							<div class="post-excerpt">
								<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
										<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
									<?php esc_html_e(' In ', 'pantograph'); ?>
									</span>
									<span class="small-title cat"><?php the_category(', '); ?></span>
								</div>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						<?php else: ?>
						<?php if($get_image){ ?>
							<div class="col-md-12 no-padding margin-bottom-10">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo esc_url( $get_image ); ?>" />
								</a>
							</div>
							<div class="post-excerpt">
								<div class="small-title cat"><?php the_category(', '); ?></div>
								<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
										<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						<?php }else{ ?>
						<div class="post-excerpt">
							<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
							<div class="meta">
								<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
								<span><?php the_time(get_option('date_format')); ?></span>
								<span class="comment">
									<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
								<?php esc_html_e(' In ', 'pantograph'); ?>
								</span>
								<span class="small-title cat"><?php the_category(', '); ?></span>
							</div>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
						</div>
						<?php } ?>
						<?php endif; ?>
						</article>
					</div>
				
				<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">		
					<?php pantograph_custom_pagination(); ?>	
				</div>
			</div>					
		</div>
	</div>