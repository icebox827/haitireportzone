<?php
$pionusnews_blog_excerpt = pionusnews_get_option('pionusnews_blog_excerpt');
$blog_excerpt_limit = empty( $pionusnews_blog_excerpt ) ? 55 : $pionusnews_blog_excerpt;
?>
<div class="inner-content">
	<div class="container">
		<div class="section-head">
			<?php
				if(pionusnews_get_option('pionusnews_on_breadcrumbs') == 1) {
				pionusnews_wordpress_breadcrumbs();
				}
			?>
			<h2><?php if ( is_day() ) : ?>
							<?php printf( esc_html__( 'Daily Archives: %s', 'pantograph'), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( esc_html__( 'Monthly Archives: %s', 'pantograph'), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'pantograph') ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( esc_html__( 'Yearly Archives: %s', 'pantograph'), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'pantograph') ) . '</span>' ); ?>
						<?php elseif ( is_tag() ) : ?>
							<?php printf( esc_html__( 'Tag Archives', 'pantograph')); ?>
						<?php else : ?>
							<?php printf( esc_html__( 'Blog Archives', 'pantograph')); ?>
						<?php endif; ?></h2>
		</div>
		<div class="row">
			<div class="col-md-8">
				<?php if (have_posts()) :  while (have_posts()) : the_post(); 
					$pionusnews_global_post = pionusnews_get_global_post();
					$postid = $pionusnews_global_post->ID;
					$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
					if($custom_image_url){
						$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
					}else{
						$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				?>
				<article class="style2 main_blog" id="post-<?php the_ID(); ?>">
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
									<a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php if ( has_post_format( 'video' ) ) : ?>
									<?php the_content(); ?>
									<?php else: ?>
									<?php echo pionusnews_theme_blog_excerpt($blog_excerpt_limit); ?>
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
									<a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a>
									</span>
								</div>
								<?php if ( has_post_format( 'video' ) ) : ?>
									<?php the_content(); ?>
									<?php else: ?>
									<?php echo pionusnews_theme_blog_excerpt($blog_excerpt_limit); ?>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pionusnews_get_option('pionusnews_readmore_label') != '') { ?><?php echo esc_attr( pionusnews_get_option('pionusnews_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
							</div>
						</div>
						<?php endif; ?>
						
					</div>
				</article>
				<?php endwhile; else: ?>
					<div class="error-container">
						<h3><?php esc_html_e('OOPS! NOTHING FOUND', 'pantograph'); ?></h3>
						<p><?php esc_html_e('Sorry, You are looking for something that dose not exist.', 'pantograph'); ?></p>
					   
						<br>

						<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Take Me Home', 'pantograph'); ?></a>
					</div>
				<?php endif; ?>
				<?php pionusnews_custom_pagination(); ?>
			</div>

		<?php get_template_part( 'template-parts/pionus/sidebar', 'pionus' ); ?>
		</div>
	</div>
</div>