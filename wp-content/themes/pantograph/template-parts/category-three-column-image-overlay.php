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

<div class="inner-content three-column-image-overlay">	
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
									<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<span class="date">'.get_the_time('M j, Y').' In</span>
										<span class="catlist">'.get_the_category_list(', ').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									';
								}else{	
								if($get_image){
								$firstcol .= '
									<div class="overlay overlay-02"></div>
									<div class="col-md-12 no-padding margin-bottom-10">
									<a href="'.get_the_permalink().'">
										<img src="'.esc_url($get_image).'" />
									</a>
									</div>
									<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<span class="date">'.get_the_time('M j, Y').' In</span>
										<span class="catlist">'.get_the_category_list(', ').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									';
								}else{
									$firstcol .= '
									<div class="post-excerpt text-center padding-left-10 padding-right-10">
										<h4 class="only_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<span class="author"> - '.get_the_author_posts_link().'</span>
									</div>
									';
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
									<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<span class="date">'.get_the_time('M j, Y').' In</span>
										<span class="catlist">'.get_the_category_list(', ').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									';
									}else{
									if($get_image){
									$secondcol .= '
										<div class="overlay overlay-02"></div>
										<div class="col-md-12 no-padding margin-bottom-10">
										<a href="'.get_the_permalink().'">
											<img src="'.esc_url($get_image).'" />
										</a>
										</div>
										<div class="post-excerpt">
											<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
											<span class="date">'.get_the_time('M j, Y').' In</span>
											<span class="catlist">'.get_the_category_list(', ').'</span>
											<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
										</div>
										';
									}else{
										$secondcol .= '
										<div class="post-excerpt text-center padding-left-10 padding-right-10">
											<h4 class="only_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
											<span class="author"> - '.get_the_author_posts_link().'</span>
										</div>
										';
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
									<div class="post-excerpt">
										<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
										<span class="date">'.get_the_time('M j, Y').' In</span>
										<span class="catlist">'.get_the_category_list(', ').'</span>
										<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
									</div>
									';
									}else{
									if($get_image){
									$lastcol .= '
										<div class="overlay overlay-02"></div>
										<div class="col-md-12 no-padding margin-bottom-10">
										<a href="'.get_the_permalink().'">
											<img src="'.esc_url($get_image).'" />
										</a>
										</div>
										<div class="post-excerpt">
											<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
											<span class="date">'.get_the_time('M j, Y').' In</span>
											<span class="catlist">'.get_the_category_list(', ').'</span>
											<span class="comment"> <a class="meta-link" href="'.get_comments_link().'"><i class="fa fa-comment-o"></i> '.get_comments_number().'</a> </span>
										</div>
										';
									}else{
										$lastcol .= '
										<div class="post-excerpt text-center padding-left-10 padding-right-10">
											<h4 class="only_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
											<span class="author"> - '.get_the_author_posts_link().'</span>
										</div>
										';
									}
									}
									$lastcol .= '
								</article>
							</div>
							';
							$i = 0;
						}
				 endwhile; endif; ?>
				
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