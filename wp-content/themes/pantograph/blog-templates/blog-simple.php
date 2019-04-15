<?php
/**
 * Template Name: Blog - Simple
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
} if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/blog-templates/blog-simple', 'pionus' );
} else { 
$pantograph_on_breadcrumbs = pantograph_get_option('pantograph_on_breadcrumbs');
?>	
<div class="inner-content one-column-general">
	<div class="container">
		<div class="row">
			<div class="col-md-12">	
				<div class="section-head">
					<?php
					if($pantograph_on_breadcrumbs==1){  
					pantograph_wordpress_breadcrumbs(); }
					?>
					<h2><?php echo get_the_title(); ?></h2> 
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 catcolor">
				<?php 
					$default_posts_per_page = get_option( 'posts_per_page' );
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$original_query = $wp_query;
					$wp_query = null;
					$args=array('posts_per_page'=>$default_posts_per_page, 'paged'=>$paged);
					$wp_query = new WP_Query( $args );

					if ( have_posts() ) :
					while (have_posts()) : the_post();
					$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
					if($custom_image_url){
						$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
					}else{
						$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				?>
				<article <?php post_class('style2 main_blog'); ?> id="post-<?php the_ID(); ?>">
					<div class="row">
					<?php if ( has_post_format( 'video' ) ) : ?>
					<div class="col-md-6 col-sm-6">
						<?php echo get_first_video_embed(get_the_ID()); ?>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="post-excerpt">
							<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							<div class="meta">
								<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
								<span><?php esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
								<span class="comment">
								<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
								<?php esc_html_e(' In ', 'pantograph'); ?>
								</span>
								<span class="small-title cat"><?php the_category(', '); ?></span>
							</div>
							<p><?php echo pantograph_theme_excerpt(35); ?></p>
							<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
						</div>
					</div>
					<?php else: ?>
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
									<?php the_excerpt(); ?>
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
									<?php esc_html_e(' In ', 'pantograph'); ?>
									</span>
									<span class="small-title cat"><?php the_category(', '); ?></span>
								</div>
									<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						</div>
						<?php endif; ?>
						<?php endif; ?>
						
					</div>
				</article>
				<?php
				endwhile;
				pantograph_custom_pagination();
				endif; 
				$wp_query = null;
				$wp_query = $original_query;    
				wp_reset_postdata();   
				?>
			</div>

		<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php } if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
} ?>