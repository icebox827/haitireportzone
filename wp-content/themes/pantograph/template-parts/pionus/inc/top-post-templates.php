<?php
// **********************************************************************// 
// ! Top Posts Templates for Category and Blog pages
// **********************************************************************//
if ( ! function_exists( 'pionusnews_category_top_posts' ) ) {
	function pionusnews_category_top_posts( $show_posts_per_ids_1st, $show_posts_per_ids_2nd, $show_posts_per_ids_3rd,
	$show_posts_per_ids_4th, $show_posts_per_ids_5th, $show_posts_per_ids_rest, $show_posts_per_ids,
	$top_posts_template = 1, $showposts = 3, $ASC_DESC = '', $echo = TRUE ) {
/**
 * @show_posts_per_ids is to define which posts will be visible in the top posts section. User will have the option to input their desired post ids
 * @top_posts_template is to define which template/design will be there. Default is 1, which will show post_block_30. Later we will make 'post_block_17' as the default template.
 * Other templates are 'post_block_22', 'post_block_12', 'post_block_31', and 'post_block_17'
 * @showposts is to define how many posts will be there in the top posts section. User will have the option to input their desired number
 * @ASC_DESC is to define post order. ASC or DESC
 * @show_posts_per_ids is to define which posts will be visible in the top posts section.
 * @show_posts_per_ids is to define which posts will be visible in the top posts section.
 */			
		do_action_ref_array('pionusnews_testinghook', array(&$top_posts_template)); //This is to create a hook to alter the top post template as required
		
		$cat_id = get_query_var('cat');
		$term = get_term_by('id', $cat_id, 'category');
		$cat_data = get_option("category_$cat_id");
		
		if ($top_posts_template == 1){ //UNCOMMENT THIS LINE WHEN MORE TEMPLATES ARE ADDED
		if(($show_posts_per_ids != '') || ($show_posts_per_ids != NULL)){
		$heading = 'Heading';
		$list ='';
			$list .='<div class="post_block_17 top_post_block_incat custom_class'.$top_posts_template.'">';
			$list .= '<div class="info-content section5">';
			$list .= '<div class="row">';
			$the_query = new WP_Query( array('post__in' => $show_posts_per_ids_1st, 'posts_per_page' => 1, 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
			$post_array_new = array();
			while ($the_query->have_posts()) : $the_query->the_post();
			$idd = get_the_ID();
			$post_array_new[] = get_the_ID();	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				//$primary_category_link = pionusnews_category_styles();
				$cats = get_the_category();
				if ( $cats[0] ) {
				$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
				} else {
				$primary_category_link ='';
				}
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '<div class="col-md-8 col-sm-8">
						<article class="style3 style-alt">
							<div class="post-thumb">
							'.$videoicon.'
							<div class="overlay overlay-02"></div>
								<div class="small-title cat">' . $primary_category_link . '</div>
								<div class="post-excerpt custom_class_top_posts">
									<div class="meta">
										<span class="date">'.get_the_time('M j, Y').'</span>
									</div>
									<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h3>
									<div class="meta">
										<span class="author">'.get_avatar( get_the_author_meta('email'), '25' ).' by '.get_the_author_posts_link().'</span>
										<span class="comment"> <a class="meta-link" href="'.get_the_permalink().'"><i class="far fa-comment"></i> '.get_comments_number().'</a> </span>
										<span class="views"><i class="fa fa-eye"></i> '.pionusnews_getPostViews(get_the_ID()).' </span>
									</div>
								</div>
								<div class="beforethumbnail477">
									<div class="beforethumbnail477 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</div>
						</article>
					</div>';
			endwhile;

		$showpost_item = $showposts - 1;
		if($showpost_item>0){	
		$list .='<div class="col-md-4 col-sm-4">';			
		$arr1 = $post_array_new;
		$ar = array_merge($arr1);
		if($show_posts_per_ids){		
		$the_query = new WP_Query( array('post__in' => $show_posts_per_ids_rest, 'posts_per_page' => $showpost_item, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
		}else{
		$the_query = new WP_Query( array('post__in' => $show_posts_per_ids_rest, 'posts_per_page' => $showpost_item, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
		}
		while ($the_query->have_posts()) : $the_query->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_theme_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
				}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			//$primary_category_link = pionusnews_category_styles();
			$cats = get_the_category();
			if ( $cats[0] ) {
			$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
			} else {
			$primary_category_link ='';
			}
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<article class="style4 style-alt margin-bottom-10">
					<div class="post-thumb">
					'.$videoicon.'
					<div class="overlay overlay-02"></div>
						<div class="small-title cat">' . $primary_category_link . '</div>
						<div class="post-excerpt custom_class_top_posts">
							<div class="meta">
								<span class="date">'.get_the_time('M j, Y').'</span>
							</div>
							<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 250, '...' ) . '</a></h5>
						</div>
						<div class="beforegeneralstyle">
							<div class="generalstyle bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</div>
				</article>'; 
			endwhile;
		$list .='</div>';
		}
		$list .='</div>
			</div>';
		$list .='</div>';
		
		wp_reset_postdata();
			
			
		if ( $echo ) {
				echo $list; // escaped before already
		} else {
			return $list; // escaped before already
		}
		
		} // END if($show_posts_per_ids != '')
		} // END if ($top_posts_template == 1) UNCOMMENT THIS WHEN MORE TEMPLATES ARE ADDED
		
		if ($top_posts_template == 2){ 
		if(($show_posts_per_ids != '') || ($show_posts_per_ids != NULL)){
		$list ='';
		$list .='<div class="post_block_12  top_post_block_incat custom_class'.$top_posts_template.'">';	
		$list .='<div id="mynewcontent"><div class="row">';
		$i=1;
		$the_query = new WP_Query( array('post__in' => $show_posts_per_ids, 'posts_per_page' => $showposts, 'ignore_sticky_posts' => 1,'post_status' => 'publish', 'orderby' => 'post_date', 'order' => $ASC_DESC));
		if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post(); 
		if($i==1) {
			$class='padding-left-15';
		}
		elseif($i== 2) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 3) {
			$class='padding-right-15';
		}elseif($i==4) {
			$class='padding-left-15';
		}
		elseif($i== 5) {
			$class='padding-left-none padding-right-none';
		}elseif($i== 6) {
			$class='padding-right-15';
		}elseif($i==7) {
			$class='padding-left-15';
		}
		elseif($i== 8) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 9) {
			$class='padding-right-15';
			
		}elseif($i==10) {
			$class='padding-left-15';
		}
		elseif($i== 11) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 12) {
			$class='padding-right-15';	
		}else {
			
		}
		$i++;
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			//$primary_category_link = pionusnews_category_styles();
			$cats = get_the_category();
			if ( $cats[0] ) {
			$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
			} else {
			$primary_category_link ='';
			}
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-4 '.$class.'">
					<article class="style3 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforeanotherstyle3">
								<div class="anotherstyle3 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>	
				  </div>'; 
			endwhile; endif;
			$list .='</div>';
			
			$list .='</div>';
			
			$list.= '</div>';
		wp_reset_postdata();
			
			
		if ( $echo ) {
				echo $list; // escaped before already
		} else {
			return $list; // escaped before already
		}
		
		} // END if($show_posts_per_ids != '')
		} // END if == 2
		
		if ($top_posts_template == 3){ 
		if(($show_posts_per_ids != '') || ($show_posts_per_ids != NULL)){
		$list ='';
			$list .='<div class="post_block_22  top_post_block_incat custom_class'.$top_posts_template.'">';
			$list .= '<div class="row style4-4-6">';
			$the_query1 = new WP_Query( array('post__in' => $show_posts_per_ids_1st, 'posts_per_page' => 1, 'ignore_sticky_posts' => 1, 'post_status' => 'publish', 'orderby' => 'post_date', 'order' => $ASC_DESC));
			$post_array_new1 = array();	
			while ($the_query1->have_posts()) : $the_query1->the_post();
			$post_array_new1[] = get_the_ID();	
			$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
			if($featured_img){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			}else{
				$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
			}
			$primary_category = '';
			$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
			if($primary_category){
				$primary_category_name = get_cat_name( $primary_category );
				$category_link = get_category_link( $primary_category );
				$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
			}else{
				//$primary_category_link = pionusnews_category_styles();
				$cats = get_the_category();
				if ( $cats[0] ) {
				$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
				} else {
				$primary_category_link ='';
				}
			}
			if ( has_post_format( 'video' ) ) : 
				$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:72px;height:72px;" /></a></div>';
			else:
				$videoicon = '';
			endif;
			$list .= '
			<div class="col-md-6 padding-right-none">
				<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
						<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h3>
							</div>
							<div class="beforeanotherstyle3">
								<div class="anotherstyle3 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>
			</div>
			
		';
		endwhile;			
		$queryarry2 = array_merge($post_array_new1);
		$post_array_new2 = array();	
		if($show_posts_per_ids){		
		$the_query2 = new WP_Query( array('post__in' => $show_posts_per_ids_2nd, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
		}else{
		$the_query2 = new WP_Query( array('post__in' => $show_posts_per_ids_2nd, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
		}
		while ($the_query2->have_posts()) : $the_query2->the_post();
		$post_array_new2[] = get_the_ID();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
						if ( new_theme_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			//$primary_category_link = pionusnews_category_styles();
			$cats = get_the_category();
			if ( $cats[0] ) {
			$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
			} else {
			$primary_category_link ='';
			}
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-6 padding-left-5">
					<div class="col-md-6 col-sm-6 padding-left-none padding-right-none">
					<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
					endwhile;
					
					$queryarry3 = array_merge($post_array_new1,$post_array_new2);
					$post_array_new3 = array();		
					if($show_posts_per_ids){		
					$the_query3 = new WP_Query( array('post__in' => $show_posts_per_ids_3rd, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
					}else{
					$the_query3 = new WP_Query( array('post__in' => $show_posts_per_ids_3rd, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
					}
					while ($the_query3->have_posts()) : $the_query3->the_post();
					$post_array_new3[] = get_the_ID();
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_theme_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						//$primary_category_link = pionusnews_category_styles();
						$cats = get_the_category();
						if ( $cats[0] ) {
						$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
						} else {
						$primary_category_link ='';
						}
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .='<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
				endwhile;
			
					
				$list .='</div>
				<div class="col-md-6 col-sm-6 padding-left-5 padding-right-none">';
				
				$queryarry4 = array_merge($post_array_new1,$post_array_new2,$post_array_new3);	
				$post_array_new4 = array();	
				if($show_posts_per_ids){		
				$the_query4 = new WP_Query( array('post__in' => $show_posts_per_ids_4th, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}else{
				$the_query4 = new WP_Query( array('post__in' => $show_posts_per_ids_4th, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}
				while ($the_query4->have_posts()) : $the_query4->the_post();
				$post_array_new4[] = get_the_ID();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_theme_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					//$primary_category_link = pionusnews_category_styles();
					$cats = get_the_category();
					if ( $cats[0] ) {
					$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
					} else {
					$primary_category_link ='';
					}
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>'; 
				endwhile;
					
					
				$queryarry5 = array_merge($post_array_new1,$post_array_new2,$post_array_new3,$post_array_new4);	
				if($show_posts_per_ids){		
				$the_query5 = new WP_Query( array('post__in' => $show_posts_per_ids_5th, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}else{
				$the_query5 = new WP_Query( array('post__in' => $show_posts_per_ids_5th, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}
				while ($the_query5->have_posts()) : $the_query5->the_post();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');

				if($featured_img){
					if ( new_theme_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}

				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					//$primary_category_link = pionusnews_category_styles();
					$cats = get_the_category();
					if ( $cats[0] ) {
					$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
					} else {
					$primary_category_link ='';
					}
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>'; 
			endwhile;
			$list .= '</div>'; 
			
			
			$list .='</div></div>';
			
			$list .='</div>';
		wp_reset_postdata();
			
			
		if ( $echo ) {
				echo $list; // escaped before already
		} else {
			return $list; // escaped before already
		}
		
		} // END if($show_posts_per_ids != '')
		} // END if == 3
	
		if ($top_posts_template == 4){ 
		if(($show_posts_per_ids != '') || ($show_posts_per_ids != NULL)){
		$list ='';
		$list .='<div class="post_block_31  top_post_block_incat custom_class'.$top_posts_template.'">';
		$list .= '<div class="row style4-4-6">';
		$the_query = new WP_Query( array('post__in' => $show_posts_per_ids_1st, 'posts_per_page' => 1, 'ignore_sticky_posts' => 1, 'post_status' => 'publish', 'orderby' => 'post_date', 'order' => $ASC_DESC));
		$post_array_new1 = array();	
		while ($the_query->have_posts()) : $the_query->the_post();
		$post_array_new1[] = get_the_ID();	
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			if ( new_theme_wp_is_mobile() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
				} else {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				}
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
		$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
		if($primary_category){
			$primary_category_name = get_cat_name( $primary_category );
			$category_link = get_category_link( $primary_category );
			$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
		}else{
			//$primary_category_link = pionusnews_category_styles();
			$cats = get_the_category();
			if ( $cats[0] ) {
			$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
			} else {
			$primary_category_link ='';
			}
		}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;
		$list .= '<div class="col-md-3 col-sm-4 col-xs-12 padding-right-none">
					<div class="col-md-12 col-sm-12 padding-left-none padding-right-none">
					<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
					endwhile;
					
					$queryarry2 = array_merge($post_array_new1);
					$post_array_new2 = array();	
					if($show_posts_per_ids){		
					$the_query2 = new WP_Query( array('post__in' => $show_posts_per_ids_2nd, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
					}else{
					$the_query2 = new WP_Query( array('post__in' => $show_posts_per_ids_2nd, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
					}
					while ($the_query2->have_posts()) : $the_query2->the_post();
					$post_array_new2[] = get_the_ID();
					
					$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
					if($featured_img){
						if ( new_theme_wp_is_mobile() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
						} else {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}
					}else{
						$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
					}
					
					$primary_category = '';
					$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
					if($primary_category){
						$primary_category_name = get_cat_name( $primary_category );
						$category_link = get_category_link( $primary_category );
						$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
					}else{
						//$primary_category_link = pionusnews_category_styles();
						$cats = get_the_category();
						if ( $cats[0] ) {
						$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
						} else {
						$primary_category_link ='';
						}
					}
					if ( has_post_format( 'video' ) ) : 
						$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
					else:
						$videoicon = '';
					endif;
					$list .='<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>';
				endwhile;
			
					
				$list .='</div></div>
				<div class="col-md-6 col-sm-4 col-xs-12 padding-right-none padding-left-2">';
				$queryarry3 = array_merge($post_array_new1,$post_array_new2);
				$post_array_new3 = array();		
				if($show_posts_per_ids){		
				$the_query3 = new WP_Query( array('post__in' => $show_posts_per_ids_3rd, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}else{
				$the_query3 = new WP_Query( array('post__in' => $show_posts_per_ids_3rd, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}
				while ($the_query3->have_posts()) : $the_query3->the_post();
				$post_array_new3[] = get_the_ID();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_theme_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					//$primary_category_link = pionusnews_category_styles();
					$cats = get_the_category();
					if ( $cats[0] ) {
					$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
					} else {
					$primary_category_link ='';
					}
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:72px;height:72px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '
				<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
						<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="h1 text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h3>
							</div>
							<div class="beforeanotherstyle3">
								<div class="anotherstyle3 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>
				';
				endwhile;
				$list .= '</div>'; 
				$list .='<div class="col-md-3 col-sm-4 col-xs-12 padding-left-2">
							<div class="col-md-12 col-sm-12 padding-left-none padding-right-none">';
				$queryarry4 = array_merge($post_array_new1,$post_array_new2,$post_array_new3);	
				$post_array_new4 = array();	
				if($show_posts_per_ids){		
				$the_query4 = new WP_Query( array('post__in' => $show_posts_per_ids_4th, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}else{
				$the_query4 = new WP_Query( array('post__in' => $show_posts_per_ids_4th, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}
				while ($the_query4->have_posts()) : $the_query4->the_post();
				$post_array_new4[] = get_the_ID();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_theme_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					//$primary_category_link = pionusnews_category_styles();
					$cats = get_the_category();
					if ( $cats[0] ) {
					$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
					} else {
					$primary_category_link ='';
					}
				}
				if ( has_post_format( 'video' ) ) : 
					$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
				else:
					$videoicon = '';
				endif;
				$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>'; 
				endwhile;
				
				
					
				$queryarry5 = array_merge($post_array_new1,$post_array_new2,$post_array_new3,$post_array_new4);	
				if($show_posts_per_ids){		
				$the_query5 = new WP_Query( array('post__in' => $show_posts_per_ids_5th, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}else{
				$the_query5 = new WP_Query( array('post__in' => $show_posts_per_ids_5th, 'posts_per_page' => 1, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => $ASC_DESC));
				}
				while ($the_query5->have_posts()) : $the_query5->the_post();
				$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
				if($featured_img){
					if ( new_theme_wp_is_mobile() ) {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
					} else {
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					}
				}else{
					$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
				}
				$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					//$primary_category_link = pionusnews_category_styles();
					$cats = get_the_category();
					if ( $cats[0] ) {
					$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
					} else {
					$primary_category_link ='';
					}
				}
				$list .= '<article class="style4 style-alt">
						<div class="post-thumb">
							<div class="overlay overlay-02"></div>
							<div class="small-title cat">' . $primary_category_link . '</div>
							<div class="post-excerpt custom_class_top_posts">
								<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h5 class="text-white"><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, 200, '...' ) . '</a></h5>
							</div>
							<div class="beforeanotherstyle4">
								<div class="anotherstyle4 bg-img" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>'; 
			endwhile;
			$list .='</div></div>';
			$list .= '</div>'; 
			
			$list .='</div>';
		wp_reset_postdata();
			
			
		if ( $echo ) {
				echo $list; // escaped before already
		} else {
			return $list; // escaped before already
		}
		
		} // END if($show_posts_per_ids != '')
		} // END if == 4
	
		if (($top_posts_template == 5) || ($top_posts_template == 'default')){ //UNCOMMENT THIS LINE WHEN MORE TEMPLATES ARE ADDED
		if(($show_posts_per_ids != '') || ($show_posts_per_ids != NULL)){
		$list ='';
			$list .='<div class="post_block_30 top_post_block_incat custom_class'.$top_posts_template.'">'; //ADD the same class "top_post_block_incat custom_class'.$top_posts_template.'" in every post-block template here.
			$list .='<div id="mynewcontent"><div class="row">';
			$i=1;
		$the_query = new WP_Query( array('orderby' => 'post_date', 'order' => $ASC_DESC,'post__in' => $show_posts_per_ids, 'posts_per_page' => $showposts, 'ignore_sticky_posts' => 1, 'post_status' => 'publish'));		
		if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post();
		if($i==1 || $i==4) {
			$class='padding-left-15 padding-right-none';
		}
		elseif($i== 2 || $i==5) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 3 || $i==6) {
			$class='padding-right-15 padding-left-none border-right-none';
		} else {
			$class = '';
		}
		$i++;
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
		}else{
			$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		$primary_category = '';
				$primary_category = get_post_meta(get_the_ID(), 'primary_category', true);
				if($primary_category){
					$primary_category_name = get_cat_name( $primary_category );
					$category_link = get_category_link( $primary_category );
					$primary_category_link ='<a href="'.esc_url( $category_link ).'" title="'.esc_html($primary_category_name).'">'.esc_html($primary_category_name).'</a>';
				}else{
					//$primary_category_link = pionusnews_category_styles();
					$cats = get_the_category();
					if ( $cats[0] ) {
					$primary_category_link ='<a' . ' href="' . get_category_link( $cats[0]->term_id ) . '">' . $cats[0]->cat_name . '</a>';
					} else {
					$primary_category_link ='';
					}
				}
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/template-parts/pionus/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph' ) . '" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;

		$list .= '<div class="col-md-4 col-sm-4 col-xs-12 '.$class.'">
					<article class="style3 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . $primary_category_link . '</div>'; //Apply separated category function properly (comma separated should not be used)
						$list .= '<div class="post-excerpt custom_class_top_posts">'; //MUST add custom_class_top_posts here, otherwise it will create CSS conflict
						$list .= '<div class="meta">
									<span class="date">'.get_the_time('M j, Y').'</span>
								</div>
								<h3 class="text-white"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
							</div>
							<div class="overlay overlay-02"></div>
							<div class="beforeanotherstyle5">
								<div class="anotherstyle5" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</div>
					</article>	
				  </div>'; 
			endwhile; endif;
			$list .='</div>';
			
			$list .='</div>';
			
			$list.= '</div>';
			wp_reset_postdata();
			
			
		if ( $echo ) {
				echo $list; // escaped before already
		} else {
			return $list; // escaped before already
		}
		
		} // END if($show_posts_per_ids != '')
		} // END if ($top_posts_template == 5) UNCOMMENT THIS WHEN MORE TEMPLATES ARE ADDED
	}
}