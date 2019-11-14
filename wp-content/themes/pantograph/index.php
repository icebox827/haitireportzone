<?php
/**
 * Main index page
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_old'){
get_header();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
}
?>
<?php if ($favorite_theme_style == 'style_new'){
$global_white_conainter = pionusnews_get_option('global_white_conainter');
$pagination_post_style = pionusnews_get_option('pagination_post_style');
$pagination_post_limit = pionusnews_get_option('pagination_post_limit');
$default_post_item = get_option( 'posts_per_page' );
$post_limit_item = empty($pagination_post_limit) ? $default_post_item : $pagination_post_limit; ?>
<div class="inner-content one-column-general<?php if($global_white_conainter==1){ ?> zero-padding<?php } ?>">
	<div class="container">
	<?php if($global_white_conainter==1){ ?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-head empty-50"></div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-md-8">
				<?php 	
						if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
						elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
						else { $paged = 1; }
						$the_query = new WP_Query( array('order'=> 'DESC', 'paged' => $paged, 'orderby' => 'post_date' ));
				if ($the_query->have_posts()) : ?>
				<section id="posts_load_pagination">
				<?php while ($the_query->have_posts()) : $the_query->the_post();
					$pionusnews_global_post = pionusnews_get_global_post();
					$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
					if($custom_image_url){
						$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
					}else{
						$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
					} 
				?>
				<article <?php post_class('style2 main_blog'); ?> id="post-<?php the_ID(); ?>">
					<div class="row">
					<?php if ( $get_image) : ?>
						<div class="col-md-6 col-sm-6">
							<a href="<?php the_permalink(); ?>">
								<div class="beforegeneralstyle">
									<div class="generalstyle bg-img" style="background-image: url(<?php echo esc_url( $get_image ); ?>); opacity: 1;">
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="post-excerpt">
								<div class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></div>
								<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
									<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php if ( has_post_format( 'video' ) ) : ?>
									<?php the_content(); ?>
									<?php else: ?>
									<?php the_excerpt(); ?>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						</div>
						<?php else: ?>
						<div class="col-md-12 col-sm-12">
							<div class="post-excerpt">
								<div class="small-title cat"><?php echo pionusnews_all_category_styles(); ?></div>
								<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
									<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php if ( has_post_format( 'video' ) ) : ?>
									<?php the_content(); ?>
									<?php else: ?>
									<?php the_excerpt(); ?>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						</div>
						<?php endif; ?>
						
					</div>
				</article>
				<?php endwhile; ?>
				<?php wp_link_pages(); ?>
				</section>
				<?php 
				if($pagination_post_style==1){
				pionusnews_custom_pagination();
				}else{
				pionusnews_custom_loadmore(); 
				}
				?>
				<?php endif; ?>
			</div>
		<?php get_template_part( 'template-parts/pionus/sidebar', 'pionus' ); ?>
		</div>
	</div>
</div>
<?php } else { ?>
<div class="inner-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php 	
						if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
						elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
						else { $paged = 1; }
						$the_query = new WP_Query( array('order'=> 'DESC', 'paged' => $paged, 'orderby' => 'post_date' ));
				?>

				<?php if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post(); 
					$pantograph_global_post = pantograph_get_global_post();
					$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
					if($custom_image_url){
						$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
					}else{
						$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
					} 
				?>
				<article <?php post_class('style2 main_blog'); ?> id="post-<?php the_ID(); ?>">
					<div class="row">
					<?php if ( $get_image) : ?>
						<div class="col-md-6 col-sm-6">
							<a href="<?php the_permalink(); ?>">
								<div class="beforegeneralstyle">
									<div class="generalstyle bg-img" style="background-image: url(<?php echo esc_url( $get_image ); ?>); opacity: 1;">
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="post-excerpt">
								<div class="small-title cat"><?php the_category(', '); ?></div>
								<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
									<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php if ( has_post_format( 'video' ) ) : ?>
									<?php the_content(); ?>
									<?php else: ?>
									<?php the_excerpt(); ?>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						</div>
						<?php else: ?>
						<div class="col-md-12 col-sm-12">
							<div class="post-excerpt">
								<div class="small-title cat"><?php the_category(', '); ?></div>
								<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<div class="meta">
									<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
									<span><?php esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
									<span class="comment">
									<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php if ( has_post_format( 'video' ) ) : ?>
									<?php the_content(); ?>
									<?php else: ?>
									<?php the_excerpt(); ?>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						</div>
						<?php endif; ?>
						
					</div>
				</article>
				<?php endwhile; endif; ?>
				<?php pantograph_custom_pagination(); ?>
				<?php wp_link_pages(); ?>
			</div>
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php } ?>
<?php 
if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
}
?>