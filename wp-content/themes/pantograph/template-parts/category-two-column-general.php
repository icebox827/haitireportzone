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
<div class="inner-content two-column-general">
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
							single_cat_title( esc_html__( 'Currently browsing ', 'pantograph' ) );
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
			<div class="col-md-8">
				<div class="row">
					<?php 
					$even = '';	
					$odd = '';
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
					elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
					else { $paged = 1; }
					$the_query = new WP_Query( array(
						'post_type' => 'post', // if the post type is post 
						'paged' => $paged,
						'cat' => $cat_id
					));
					if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post(); 
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
						
						if ($the_query->current_post % 2 == 0):
						
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
					
					<?php else: ?>
						<div class="error-container">
							<h3><?php esc_html_e('OOPS! NOTHING FOUND', 'pantograph'); ?></h3>
							<p><?php esc_html_e('Sorry, You are looking for something that dose not exist.', 'pantograph'); ?></p>
						   
							<br/>

							<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Take Me Home', 'pantograph'); ?></a>
						</div>
					<?php endif; ?>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<?php pantograph_custom_pagination(); ?>	
						</div>
					</div>					
			</div>

		<?php get_sidebar(); ?>
		</div>
	</div>
</div>