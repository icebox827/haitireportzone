<?php
/**
 * Template Name: Blog - Small Photo
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
} if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/blog-templates/blog-small-photo', 'pionus' );
} else {
$pantograph_on_breadcrumbs = pantograph_get_option('pantograph_on_breadcrumbs');
?>	
<div class="inner-content two-column-image-title blog-small-photo">
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
					$get_image='';
					$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);
					if($custom_image_url){
						$get_image = get_post_meta(get_the_ID(), 'custom_image_url', true);
					}else{
						$get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
					}							
					$video = '';
					if ( has_post_format( 'video' )) {
						$video = 'video_article';
					}else{
						if($get_image){
						$video = 'img_article';
						}else{
						$video = 'not_video_article';	
						}
					}
					if ($wp_query->current_post % 2 == 0):
						
					    $even .= '<article class="style4 '.$video.'">';
						
						if ( has_post_format( 'video' )) {
							$even .= '
								'.get_first_video_embed(get_the_ID()).'
								<div class="video_details">
								<h5 class="title_video"><a href="'.get_permalink().'">' . get_the_title() . '</a></h5>
								<span class="date">'.get_the_time('M j, Y').' In</span>
								<span class="catlist">'.get_the_category_list(', ').'</span>
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								</div>
								';
						}else{
							if($get_image){
							$even .= '
								<div class="post-thumb">
								<div class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</div>
								<div class="post-excerpt">
									<div class="meta">
										<span class="date">'.get_the_time('M j, Y').'</span>
									</div>
									<h3 class="text-white"><a href="'.get_permalink().'">' . get_the_title() . '</a></h3>
								</div>
								<div class="overlay overlay-02"></div>
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle bg-img" style="background-image: url('.esc_url($get_image).'); opacity: 1;">
										</div>
									</div>
								</a>
							</div>
									';
						  }else{
							$even .= '
							<div class="video_details">
							<h5 class="title_video"><a href="'.get_permalink().'">' . get_the_title() . '</a></h5>
							<span class="date">'.get_the_time('M j, Y').' In</span>
							<span class="catlist">'.get_the_category_list(', ').'</span>
							<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
							</div>
							';
						}
						}
						$even .= '</article>';
					 else:
						$odd .= '<article class="style4 '.$video.'">';
						
						if ( has_post_format( 'video' )) {
							$odd .= '
								'.get_first_video_embed(get_the_ID()).'
								<div class="video_details">
								<h5 class="title_video"><a href="'.get_permalink().'">' . get_the_title() . '</a></h5>
								<span class="date">'.get_the_time('M j, Y').' In</span>
								<span class="catlist">'.get_the_category_list(', ').'</span>
								<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
								</div>
								';
						}else{
							if($get_image){
							$odd .= '
								<div class="post-thumb">
								<div class="small-title cat">' . get_the_category_list(', ', 'pantograph') . '</div>
								<div class="post-excerpt">
									<div class="meta">
										<span class="date">'.get_the_time('M j, Y').'</span>
									</div>
									<h3 class="text-white"><a href="'.get_permalink().'">' . get_the_title() . '</a></h3>
								</div>
								<div class="overlay overlay-02"></div>
								<a href="'.get_permalink().'">
									<div class="beforegeneralstyle">
										<div class="generalstyle bg-img" style="background-image: url('.esc_url($get_image).'); opacity: 1;">
										</div>
									</div>
								</a>
							</div>
									';
						 }else{
							$odd .= '
							<div class="video_details">
							<h5 class="title_video"><a href="'.get_permalink().'">' . get_the_title() . '</a></h5>
							<span class="date">'.get_the_time('M j, Y').' In</span>
							<span class="catlist">'.get_the_category_list(', ').'</span>
							<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
							</div>
							';
						}
						}
						$odd .= '</article>';
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