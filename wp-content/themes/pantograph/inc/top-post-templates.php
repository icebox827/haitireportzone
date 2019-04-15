<?php
// **********************************************************************// 
// ! Top Posts Templates for Category and Blog pages
// **********************************************************************//
if ( ! function_exists( 'pantograph_category_top_posts' ) ) {
	function pantograph_category_top_posts( $show_posts_per_ids = NULL, $top_posts_template = 1, $showposts = 3, $ASC_DESC = '', $echo = TRUE ) {
/**
 * @show_posts_per_ids is to define which posts will be visible in the top posts section. User will have the option to input their desired post ids
 * @top_posts_template is to define which template/design will be there. Default is 1, which will show post_block_30.
 * Other templates are 'post_block_22', 'post_block_12', 'post_block_31', and 'post_block_17'
 * @showposts is to define how many posts will be there in the top posts section. User will have the option to input their desired number
 * @ASC_DESC is to define post order. ASC or DESC
 * @show_posts_per_ids is to define which posts will be visible in the top posts section.
 * @show_posts_per_ids is to define which posts will be visible in the top posts section.
 */			
		$cat_id = get_query_var('cat');
		$term = get_term_by('id', $cat_id, 'category');
		$color = get_term_meta( $term->term_id, '_category_color', true );

		//then i get the data from the database
		$cat_data = get_option("category_$cat_id");
		
		//if ($top_posts_template == 1){
		if(($show_posts_per_ids != '') || ($show_posts_per_ids != NULL)){
		$list ='';
			$list .='<div class="post_block_30 top_post_block_incat" style="margin-bottom: 48px;">';
			$list .='<div id="mynewcontent"><div class="row">';
			$i=1;
		//$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => $itemcount, 'category_name' => $category, 'orderby' => $orderby, 'order' => $order));
		$the_query = new WP_Query( array('cat' => $cat_id, 'orderby' => 'post_date', 'order' => $ASC_DESC,'post__in' => $show_posts_per_ids, 'posts_per_page' => $showposts,'post_status' => 'publish'));		
		if ($the_query->have_posts()) :  while ($the_query->have_posts()) : $the_query->the_post();
		if($i==1) {
			$class='padding-left-15 padding-right-none';
		}
		elseif($i== 2) {
			$class='padding-left-none padding-right-none';
		}
		elseif($i== 3) {
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
		if ( has_post_format( 'video' ) ) : 
			$videoicon = '<div class="play_md" style="background:none;"><a href="'.get_permalink().'"><img src="'.get_template_directory_uri().'/img/video.png" alt="' . esc_attr__ ( 'Video', 'pantograph') . '" style="width:48px;height:48px;" /></a></div>';
		else:
			$videoicon = '';
		endif;

		$list .= '<div class="col-md-4 col-sm-4 col-xs-12 '.$class.'">
					<article class="style3 style-alt">
						<div class="post-thumb">
						'.$videoicon.'	
							<div class="small-title cat">' . get_the_category_list(', ') . '</div>
							<div class="post-excerpt">
								<div class="meta">
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
		
		} // END if($show_posts_per_ids != 9999999)
		//} // END if ($top_posts_template == 1)
	}
}