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
<div class="inner-content two-column-image-title">
	<div class="container">
	<?php if(($show_hide_breadcrumb==1) || ($cat_data['show_hide_title']==1) || ($cat_data['show_hide_cat_desc']==1)){ ?>
		<div class="row">
			<div class="col-md-12">	
				<div class="section-head">
					<?php
						if($show_hide_breadcrumb==1){ 
						pantograph_wordpress_breadcrumbs(); }
					?>
					<?php if($cat_data['show_hide_title']==1){ 
						if($cat_title == ''){
							echo '<h2>
							'.single_cat_title('Articles from ').'
							</h2>';
						}else{	
						echo '<h2>
						'.esc_attr($cat_title).'
						</h2>';
						}
					}	
					?>
					
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
					$the_query = new WP_Query( array('post_type' => 'post', 'paged' => $paged, 'cat' => $cat_id));
					if (have_posts()) :  
					while ($the_query->have_posts()) : $the_query->the_post();
						$get_image='';
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
					if ($the_query->current_post % 2 == 0):
						
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
				<?php else: ?>
					<div class="error-container">
						<h3><?php esc_html_e('OOPS! NOTHING FOUND', 'pantograph'); ?></h3>
						<p><?php esc_html_e('Sorry, You are looking for something that dose not exist.', 'pantograph'); ?></p>
					   
						<br>

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