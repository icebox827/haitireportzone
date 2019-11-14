  <div class="inner-content single-post-generals">
    <div class="container">
	  <?php if(pantograph_get_option('pantograph_on_breadcrumbs') == 1) { ?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-head">
					<?php pantograph_wordpress_breadcrumbs(); ?>
				</div>
			</div>
		</div>
		<?php } ?>
      <div class="row">
				<?php			
				if (have_posts()) :  while (have_posts()) : the_post(); 
					$pantograph_global_post = pantograph_get_global_post();
					$postid = $pantograph_global_post->ID;
					if(function_exists('pantograph_setPostViews')) {
					pantograph_setPostViews(get_the_ID());
					}
					$get_image = '';
					$category_Position = get_post_meta(get_the_ID(), 'category_Position', true);
					$get_image = esc_url( wp_get_attachment_url( get_post_thumbnail_id($postid) ) );
					$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true);			
				?>
			<div class="col-md-8 col-sm-12">
				<div <?php post_class( 'blog-single' ); ?> id="post-<?php the_ID(); ?>">
				<?php if ( has_post_format( 'video' ) ) : ?>
				<?php echo get_first_video_embed(get_the_ID()); ?>
				<?php else: ?>
				<?php if($custom_image_url){ ?>
				<img src="<?php echo esc_url($custom_image_url); ?>" />
				<?php }else{ ?>
				<?php if ( has_post_thumbnail()) : ?>
					<?php  the_post_thumbnail( 'full', array( 'class'  => 'img-responsive default-post-image' ) ); ?>
				<?php endif; 
				} ?>
				<?php endif; ?>
				<?php 
				if($category_Position==1){
				if ( has_category() ) { ?>
					<div class="single-meta single-meta2 margin-bottom-50">
						<span><i class="fa fa-tags"></i> &nbsp;</span>
						<?php pantograph_category_styles(); ?>
					</div>
				<?php } } ?>
				<h1 class="h1<?php if ( !has_post_thumbnail()) : ?> class1_for_noimage<?php endif;?> <?php if ( has_post_format( 'video' ) ) : ?>singlevideoh1 <?php endif; ?>"><?php echo get_the_title(); ?></h1>
				<div class="single-meta">
					<div class="meta pull-left">
						<span class="author"><?php echo get_avatar( get_the_author_meta('email'), '25' ); ?>
						<?php esc_html_e('By', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
						<span class="date"><?php esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
						<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><span class="comment"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></span></a>
						<?php if(function_exists('pantograph_getPostViews')) { ?>
						<span class="views"><i class="fa fa-eye"></i> <?php  echo pantograph_getPostViews(get_the_ID()); ?></span>
						<?php } ?>
					</div>

					<?php if(function_exists('pantograph_social_share')) { ?>
					<div class="pull-right">
						<div class="social">
							<?php echo pantograph_social_share(); ?>
						</div>
					</div>
					<?php } ?>

					<div class="clearfix"></div>
				</div>
	
				<div class="blog_single_content">
				<?php the_content(); ?>
				</div>
				
				<?php if ( has_tag() ) { ?>
				<div class="tags">
					<?php the_tags( '<span><i class="fa fa-tags"></i></span> ', '' ); ?>
				</div>
				<?php } ?>
				
				<?php 
				if($category_Position!=1){
				if ( has_category() ) { ?>
					<div class="single-meta single-meta2">
						<span><i class="fa fa-tags"></i> &nbsp;</span>
						<?php pantograph_category_styles(); ?>
					</div>
				<?php } } ?>
				

				<div class="clearfix"></div>
			</div>
			<!--BEGIN .author-bio-->
			<?php 
			$authorinfo = get_the_author_meta('description');						
			if((pantograph_get_option('pantograph_show_author_on_single_post') == 1) && ($authorinfo!='')) { ?>
				<div class="about-author">
					<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>

					<h5><?php the_author_link(); ?></h5>
					<p><?php the_author_meta('description'); ?></p>

					<div class="social">
						<?php 
							$facebook_profile = get_the_author_meta( 'facebook_profile' );
							if ( $facebook_profile && $facebook_profile != '' ) {
							echo '<a href="' . esc_url($facebook_profile) . '" target="_blank"><i class="fa fa-facebook"></i></a>';
							}

							$twitter_profile = get_the_author_meta( 'twitter_profile' );
							if ( $twitter_profile && $twitter_profile != '' ) {
							echo '<a href="' . esc_url($twitter_profile) . '" target="_blank"><i class="fa fa-twitter"></i></a>';
							}

							$google_profile = get_the_author_meta( 'google_profile' );
							if ( $google_profile && $google_profile != '' ) {
							echo '<a href="' . esc_url($google_profile) . '" target="_blank"><i class="fa fa-google-plus"></i></a>';
							}


							$user_profile_email = get_the_author_meta( 'user_profile_email' );
							if ( $user_profile_email && $user_profile_email != '' ) {
							echo '<a href="mailto:' . esc_url($user_profile_email) . '"><i class="fa fa-envelope-o"></i></a>';
							}

							$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
							if ( $linkedin_profile && $linkedin_profile != '' ) {
							echo '<a href="' . esc_url($linkedin_profile) . '" target="_blank"><i class="fa fa-linkedin"></i></a>';
							}
						?>
					</div>
				</div>
			<?php }else{ ?>
			<div class="margin-bottom-20"></div>
			<?php } ?>
			<?php
				$prevPost = get_previous_post(true);
				$nextPost = get_next_post(true);
				if((!empty($prevPost)) || (!empty($nextPost))){
				?>
			<div class="post-nav <?php if(pantograph_get_option('pantograph_show_author_on_single_post') != 1) { echo 'margintop20'; } ?>">
				<div class="row">

				<?php $prevPost = get_previous_post(true);
					if($prevPost) {
						$args = array(
							'posts_per_page' => 1,
							'include' => $prevPost->ID
						);
						$prevPost = get_posts($args);
						foreach ($prevPost as $post) {
							setup_postdata($post);
				?>
				
				<div class="col-md-6 col-sm-6 col-xs-6 text-right">
					<a href="<?php the_permalink(); ?>"><i class="fa fa-angle-left"></i>
					<span class="small-title"><?php esc_html_e( 'Previous Post', 'pantograph' ); ?></span>
					<h3 class="hidden-xs"><?php echo get_the_title(); ?></h3></a>
				</div>
				<?php
							wp_reset_postdata();
						} //end foreach
					} // end if
					 
					$nextPost = get_next_post(true);
					if($nextPost) {
						$args = array(
							'posts_per_page' => 1,
							'include' => $nextPost->ID
						);
						$nextPost = get_posts($args);
						foreach ($nextPost as $post) {
							setup_postdata($post);
				?>
				
				<div class="col-md-6 col-sm-6 col-xs-6 text-left">
					<a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i>
					<span class="small-title"><?php esc_html_e( 'Next Post', 'pantograph' ); ?></span>
					<h3 class="hidden-xs"><?php echo get_the_title(); ?></h3></a>
				</div>
				<?php
							wp_reset_postdata();
						} //end foreach
					} // end if
				?>
				
				</div>
			</div>
			<?php } ?>
		
			<?php
				global $post;
				$categories = get_the_category($post->ID);
				if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> 3, // Number of related posts that will be shown.
				'ignore_sticky_posts'=>1
				);
				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) {
				echo '<div class="related-posts"><h5>'.esc_html__( 'Related Posts', 'pantograph' ).'</h5><div class="row">';
				while( $my_query->have_posts() ) {
				$my_query->the_post();
				$get_related_image = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
				?>
				<div class="col-md-4 relatednoimg">
					<div class="space10"></div>
					<div class="meta"><span><?php the_time(get_option('date_format')); ?></span></div>
					<h3 class="h5"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
				</div>
				<?php
				}
				echo '</div></div>';
				}
				}
				wp_reset_postdata(); 
			?>

		<?php 
		if ( comments_open() ) :
			comments_template( '', true );
		endif; 
		?>					
	  </div>
	  <?php endwhile; endif; ?>
	  
		<!--Sidebar-->
			<?php get_sidebar(); ?>
		<!--Sidebar end-->
    </div>
    </div>
  </div>