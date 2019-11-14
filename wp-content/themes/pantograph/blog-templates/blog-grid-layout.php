<?php
/**
 * Template Name: Blog - Grid Layout
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
} if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/blog-templates/blog-grid-layout', 'pionus' );
} else {
$pantograph_on_breadcrumbs = pantograph_get_option('pantograph_on_breadcrumbs');
?>

<div class="inner-content three-column-fullwidth">	
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
				<?php 
					$default_posts_per_page = get_option( 'posts_per_page' );
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$original_query = $wp_query;
					$wp_query = null;
					$args=array('posts_per_page'=>$default_posts_per_page, 'paged'=>$paged);
					$wp_query = new WP_Query( $args );

					$i = 0;
					$firstcol = '';
					$secondcol = '';
					$lastcol = '';
					if ( have_posts() ) :
					while (have_posts()) : the_post();
					if(pantograph_get_option('pantograph_readmore_label') != '') {
					$readmorebtn = esc_attr( pantograph_get_option('pantograph_readmore_label') ); 
					 } else { 
					$readmorebtn = esc_html__('Read More', 'pantograph');
					 } 
					$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
					if($custom_image_url){
						$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
					}else{
						$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
						if($i == 0) {
							$firstcol .= '
							<div class="firstcol">
								<article>
								';
								if ( has_post_format( 'video' )) {
								$firstcol .= '
									<div class="col-md-12 no-padding margin-bottom-10">
									'.get_first_video_embed(get_the_ID()).'
									</div>
									';
									$firstcol .= '<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
												In
											</span>
											<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';
								}else{
								if($get_image){
								$firstcol .= '
									<div class="col-md-12 no-padding margin-bottom-10">
									<a href="'.get_the_permalink().'">
										<img src="'.esc_url($get_image).'" />
									</a>
									</div>
									';
								$firstcol .= '<div class="post-excerpt">
										<div class="small-title cat">'.get_the_category_list(', ').'</div>
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
											</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';	
								}else{
									$firstcol .= '<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
												In
											</span>
											<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';
								}	
								}	
								$firstcol .= '
								</article>
							</div>
							';
							$i++;
						} elseif ($i == 1) {
							$secondcol .= '
							<div class="secondcol">
								<article>
									';
								if ( has_post_format( 'video' )) {
								$secondcol .= '
									<div class="col-md-12 no-padding margin-bottom-10">
									'.get_first_video_embed(get_the_ID()).'
									</div>
									';
									$secondcol .= '<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
												In
											</span>
											<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';
								}else{
								if($get_image){
								$secondcol .= '
									<div class="col-md-12 no-padding margin-bottom-10">
									<a href="'.get_the_permalink().'">
										<img src="'.esc_url($get_image).'" />
									</a>
									</div>
									';
								$secondcol .= '<div class="post-excerpt">
										<div class="small-title cat">'.get_the_category_list(', ').'</div>
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
											</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';	
								}else{
									$secondcol .= '<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
												In
											</span>
											<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';
								}	
								}	
								$secondcol .= '
								</article>
							</div>
							';
							$i++;
						} elseif($i == 2) {
							$lastcol .= '
							<div class="lastcol">
								<article>
								';
								if ( has_post_format( 'video' )) {
								$lastcol .= '
									<div class="col-md-12 no-padding margin-bottom-10">
									'.get_first_video_embed(get_the_ID()).'
									</div>
									';
									$lastcol .= '<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
												In
											</span>
											<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';
								}else{
								if($get_image){
								$lastcol .= '
									<div class="col-md-12 no-padding margin-bottom-10">
									<a href="'.get_the_permalink().'">
										<img src="'.esc_url($get_image).'" />
									</a>
									</div>
									';
								$lastcol .= '<div class="post-excerpt">
										<div class="small-title cat">'.get_the_category_list(', ').'</div>
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
											</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';	
								}else{
									$lastcol .= '<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<div class="meta">
											<span>by '.get_the_author_posts_link().'</span>
											<span>'.get_the_time(get_option('date_format')).'</span>
											<span class="comment">
												<a class="meta-link" href="'.esc_url(get_comments_link() ).'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a>
												In
											</span>
											<span class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</span>
										</div>
										<p>' . pantograph_theme_excerpt(20) . '</p>
										<a href="'.get_the_permalink().'" class="small-title rmore">'.$readmorebtn.'</a>
									</div>';
								}	
								}	
								$lastcol .= '
								</article>
							</div>
							';
							$i = 0;
						}

						endwhile;
						?>
						<div class="col-md-4 col-sm-4"><?php print $firstcol; // escaped before already ?></div>
						<div class="col-md-4 col-sm-4"><?php print $secondcol; // escaped before already ?></div>
						<div class="col-md-4 col-sm-4"><?php print $lastcol; // escaped before already ?></div>
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
	</div>
<?php } if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
} ?>