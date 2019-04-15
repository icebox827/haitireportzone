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

<div class="inner-content three-column-image-title-overlay">	
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
			<?php } ?>
			<div class="row">
			
				<?php 
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
					elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
					else { $paged = 1; }
					$the_query = new WP_Query( array(
					'post_type' => 'post',
					'paged' => $paged,				
					'cat' => $cat_id
					));
					$i = 0;
					$firstcol = '';
					$secondcol = '';
					$lastcol = '';
					if (have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post();
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
					
					
					if($i == 0) {
							$firstcol .= '
									<article class="style4 '.$video.'">
								';
								if ( has_post_format( 'video' )) {
								$firstcol .= '
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
								$firstcol .= '
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
									$firstcol .= '
									<div class="video_details">
									<h5 class="title_video"><a href="'.get_permalink().'">' . get_the_title() . '</a></h5>
									<span class="date">'.get_the_time('M j, Y').' In</span>
									<span class="catlist">'.get_the_category_list(', ').'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									';
								}	
								}	
								$firstcol .= '
								</article>	
							';
							$i++;
						} elseif ($i == 1) {
							$secondcol .= '
									<article class="style4 '.$video.'">
								';
								if ( has_post_format( 'video' )) {
								$secondcol .= '
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
								$secondcol .= '
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
									$secondcol .= '
									<div class="video_details">
									<h5 class="title_video"><a href="'.get_permalink().'">' . get_the_title() . '</a></h5>
									<span class="date">'.get_the_time('M j, Y').' In</span>
									<span class="catlist">'.get_the_category_list(', ').'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									';
								}	
								}	
								$secondcol .= '
								</article>	
							';
							$i++;
						} elseif($i == 2) {
							$lastcol .= '
							<article class="style4 '.$video.'">
								';
								if ( has_post_format( 'video' )) {
								$lastcol .= '
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
								$lastcol .= '
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
									$lastcol .= '
									<div class="video_details">
									<h5 class="title_video"><a href="'.get_permalink().'">' . get_the_title() . '</a></h5>
									<span class="date">'.get_the_time('M j, Y').' In</span>
									<span class="catlist">'.get_the_category_list(', ').'</span>
									<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									';
								}	
								}	
								$lastcol .= '
								</article>	
							';
							$i = 0;
						}
						
				?>				
				<?php endwhile; endif; ?>
				<div class="col-md-4 col-sm-4"><?php print $firstcol; // escaped before already ?></div>
				<div class="col-md-4 col-sm-4"><?php print $secondcol; // escaped before already ?></div>
				<div class="col-md-4 col-sm-4"><?php print $lastcol; // escaped before already ?></div>

			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">	
					<?php pantograph_custom_pagination(); ?>	
				</div>
			</div>					
		</div>
	</div>