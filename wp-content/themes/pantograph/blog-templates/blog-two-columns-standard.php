<?php
/**
 * Template Name: Blog - Two Columns Standard
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
}
if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/blog-templates/blog-two-columns-standard', 'pionus' );
} else {
$pantograph_on_breadcrumbs = pantograph_get_option('pantograph_on_breadcrumbs');
?>	
<div class="inner-content two-column-general">
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
			<div class="col-md-8">
				<div class="row">
					<?php 
					$even = '';	
					$odd = '';
					$default_posts_per_page = get_option( 'posts_per_page' );
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$original_query = $wp_query;
					$wp_query = null;
					$args=array('posts_per_page'=>$default_posts_per_page, 'paged'=>$paged);
					$wp_query = new WP_Query( $args );

					if ( have_posts() ) :
					$i=0;
					while (have_posts()) : the_post();
						$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
						if($custom_image_url){
							$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
						}else{
							$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
						}

						if ($wp_query->current_post % 2 == 0):
						
					    $even .= '<div class="oddeven">';
						if ( has_post_format( 'video' )) {
							$even .= '
								'.get_first_video_embed(get_the_ID()).'
								';
							$even .= '<div class="post-excerpt">
									<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
									<div class="meta">
										<span>by '.get_the_author_posts_link().'</span>
										<span>by '.get_the_time('M j, Y').'</span>
										<span class="comment">
											<a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
											In
										</span>
										<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
									</div>
										<p>'.pantograph_theme_content(15).'</p>
									<a href="'.get_permalink().'" class="small-title rmore">'.esc_html__('Read More', 'pantograph').'</a>
								</div>';		
						}else{
							if($get_image){
							$even .= '
								<a href="'.get_permalink().'">
								<img src="'.esc_url($get_image).'" />
								</a>';
							$even .= '<div class="post-excerpt">
										<div class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</div>
										<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>by '.get_the_time('M j, Y').'</span>
											<span class="comment">
												<a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
											</span>
										</div>
											<p>'.pantograph_theme_content(15).'</p>
										<a href="'.get_permalink().'" class="small-title rmore">'.esc_html__('Read More', 'pantograph').'</a>
									</div>';	
							}else{
							$even .= '<div class="post-excerpt">
								<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
								<div class="meta">
									<span>by '.get_the_author_posts_link().'</span>
									<span>by '.get_the_time('M j, Y').'</span>
									<span class="comment">
										<a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
										In
									</span>
									<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
								</div>
									<p>'.pantograph_theme_content(15).'</p>
								<a href="'.get_permalink().'" class="small-title rmore">'.esc_html__('Read More', 'pantograph').'</a>
							</div>';
							}
						}
					$even .= '</div>';
					?>
					<?php else:
						$odd .= '<div class="oddeven">';
					    if ( has_post_format( 'video' )) {
							$odd .= '
								'.get_first_video_embed(get_the_ID()).'
								';
							$odd .= '<div class="post-excerpt">
									<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
									<div class="meta">
										<span>by '.get_the_author_posts_link().'</span>
										<span>by '.get_the_time('M j, Y').'</span>
										<span class="comment">
											<a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
											In
										</span>
										<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
									</div>
										<p>'.pantograph_theme_content(15).'</p>
									<a href="'.get_permalink().'" class="small-title rmore">'.esc_html__('Read More', 'pantograph').'</a>
								</div>';	
						}else{
							if($get_image){
							$odd .= '
								<a href="'.get_permalink().'">
								<img src="'.esc_url($get_image).'" />
								</a>';
							$odd .= '<div class="post-excerpt">
										<div class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</div>
										<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>by '.get_the_time('M j, Y').'</span>
											<span class="comment">
												<a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
											</span>
										</div>
											<p>'.pantograph_theme_content(15).'</p>
										<a href="'.get_permalink().'" class="small-title rmore">'.esc_html__('Read More', 'pantograph').'</a>
									</div>';	
							}else{
								$odd .= '<div class="post-excerpt">
								<h4><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>
								<div class="meta">
									<span>by '.get_the_author_posts_link().'</span>
									<span>by '.get_the_time('M j, Y').'</span>
									<span class="comment">
										<a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
										In
									</span>
									<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
								</div>
									<p>'.pantograph_theme_content(15).'</p>
								<a href="'.get_permalink().'" class="small-title rmore">'.esc_html__('Read More', 'pantograph').'</a>
							</div>';
							}
						}						
						$odd .= '</div>';
					endif; ?>
					<?php endwhile; ?>
					<div class="col-md-6 col-sm-6"><?php print $even; // escaped before already ?></div>
					<div class="col-md-6 col-sm-6"><?php print $odd; // escaped before already ?></div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<?php pantograph_custom_pagination(); ?>	
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