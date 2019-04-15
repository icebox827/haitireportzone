<div class="inner-content one-column-title-overlay">
	<div class="container">
		<?php if(pionusnews_get_option('pionusnews_on_breadcrumbs') == 1) { ?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-head">
					<?php pionusnews_wordpress_breadcrumbs(); ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row conditional-margin">
			<div class="col-md-8 col-sm-12">
				<?php 
					if (have_posts()) :  while (have_posts()) : the_post(); 
					$pionusnews_global_post = pionusnews_get_global_post();
					$postid = $pionusnews_global_post->ID;
					if(function_exists('pionusnews_setPostViews')) {
					pionusnews_setPostViews(get_the_ID());
					}
					$get_image = '';
					$category_Position = get_post_meta(get_the_ID(), 'category_Position', true);
						if ( has_post_thumbnail()) {
							$get_image = esc_url( wp_get_attachment_url( get_post_thumbnail_id($postid) ) );
						}
				?>
					<div class="blog-single<?php if ( !has_post_thumbnail()) : ?> the-border-wrapper<?php endif;?>">
					<?php if ( !has_post_format( 'video' ) ) : ?>
					<?php if((!empty($get_image))){ ?>
						<article class="style3"<?php if(pionusnews_get_option('pionusnews_post_border') == '1'){ ?> style="margin-bottom:0;"<?php } ?>>
							<div class="post-thumb"<?php if(pionusnews_get_option('pionusnews_post_border') == '1'){ ?> style="margin-bottom:0;"<?php } ?>>
								<?php 
								if($category_Position==1){
								if ( has_category() ) { ?>
								<div class="small-title cat"><?php echo pionusnews_category_styles(); ?></div>
								<?php } } ?>
								<div class="post-excerpt"<?php if(pionusnews_get_option('pionusnews_post_border') == '1'){ ?> style="padding:15px 30px; border-left:1px solid #eee;"<?php } ?>>
									<div class="meta">
										<span class="date"><?php the_time(get_option('date_format')); ?></span>
									</div>
									<h1 class="<?php if (!has_post_thumbnail()) : ?> no-single-imageh1 <?php else: ?> h1 <?php endif; ?>"><?php echo get_the_title(); ?></h1>
									<div class="meta">
										<span class="author"><?php echo get_avatar( get_the_author_meta('email'), '25' ); ?>
										<?php esc_html_e('By', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
										<span class="comment"><a class="meta-link" href="<?php the_permalink(); ?>"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></a></span>
										<?php if(function_exists('pionusnews_getPostViews')) { ?>
										<span class="views"><i class="fa fa-eye"></i> <?php  echo pionusnews_getPostViews(get_the_ID()); ?></span>
										<?php } ?>
									</div>
								</div>
								<div class="overlay overlay-02"></div>
								<div class="beforeonecollargestyle"<?php if(pionusnews_get_option('pionusnews_post_border') == '1'){ ?> style="margin-bottom:0 !important;"<?php } ?>>
									<div class="onecollargestyle bg-img" style="background-image: url(<?php echo esc_url( $get_image ); ?>); opacity: 1;">
									</div>
								</div>
							</div>
						</article>
						<?php }else{ ?>
						<h1 class="<?php if (!has_post_thumbnail()) : ?> no-single-imageh1 <?php else: ?> h1 <?php endif; ?>"><?php echo get_the_title(); ?></h1>
						<div class="single-meta <?php if ( !has_post_thumbnail()) : ?> class2_for_noimage<?php endif;?>">
							<div class="meta pull-left">
								<span class="author"><?php echo get_avatar( get_the_author_meta('email'), '25' ); ?>
								<?php esc_html_e('By', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
								<span class="date"><?php esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
								<a class="meta-link" href="<?php the_permalink(); ?>"><span class="comment"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></span></a>
								<?php if(function_exists('pionusnews_getPostViews')) { ?>
								<span class="views"><i class="fa fa-eye"></i> <?php  echo pionusnews_getPostViews(get_the_ID()); ?></span>
								<?php } ?>
							</div>

							<?php if(function_exists('pionusnews_social_share')) { ?>
							<div class="pull-right">
								<div class="social">
									<?php echo pionusnews_social_share(); ?>
								</div>
							</div>	
							<?php } ?>

							<div class="clearfix"></div>
						</div>
						<?php } ?>
						<?php else: ?>
						<?php if ( has_post_format( 'video' ) ) : ?>
						<?php echo get_first_video_embed(get_the_ID()); ?>
						<h1 class="h1"><?php echo get_the_title(); ?></h1>
						<div class="single-meta <?php if ( !has_post_thumbnail()) : ?> class2_for_noimage<?php endif;?>">
							<div class="meta pull-left">
								<span class="author"><?php echo get_avatar( get_the_author_meta('email'), '25' ); ?>
								<?php esc_html_e('By', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
								<span class="date"><?php esc_html_e('on', 'pantograph'); ?> <?php the_time(get_option('date_format')); ?></span>
								<a class="meta-link" href="<?php the_permalink(); ?>"><span class="comment"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></span></a>
								<?php if(function_exists('pionusnews_getPostViews')) { ?>
								<span class="views"><i class="fa fa-eye"></i> <?php  echo pionusnews_getPostViews(get_the_ID()); ?></span>
								<?php } ?>
							</div>

							<?php if(function_exists('pionusnews_social_share')) { ?>
							<div class="pull-right">
								<div class="social">
									<?php echo pionusnews_social_share(); ?>
								</div>
							</div>	
							<?php } ?>

							<div class="clearfix"></div>
						</div>
						<?php endif; ?>
						<?php endif; ?>
						<div <?php if ( has_post_thumbnail()) : ?>class="the-border-wrapper"<?php if(pionusnews_get_option('pionusnews_post_border') == '1'){ ?> style="border-top:none !important;"<?php } ?><?php endif;?>><!--Border Wrapper Start-->
						<div class="blog_single_content">
						<?php the_content(); ?>
						<?php
						 wp_link_pages( array(
							'before'      => '<div class="page-links pantopio"><span class="page-links-title">' . esc_html__( 'Pages:', 'pantograph' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span class="linkstyle pantopio">',
							'link_after' => '</span>',
							'pagelink'    => '%',
							'separator'   => '',
						) );
						?>
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
								<?php echo pionusnews_all_category_styles(); ?>
							</div>
						<?php } } ?>

						<div class="clearfix"></div>
						</div><!--Border Wrapper END-->

					</div>
					<?php endwhile; endif; ?>
					<?php 
						$authorinfo = get_the_author_meta('description');						
						if((pionusnews_get_option('pionusnews_show_author_on_single_post') == 1) && ($authorinfo!='')) { ?>
							<div class="about-author">
								<?php echo get_avatar( get_the_author_meta('email'), '120' ); ?>

								<h5><?php the_author_link(); ?></h5>
								<p><?php the_author_meta('description'); ?></p>

								<div class="social">
									<?php 
										$facebook_profile = get_the_author_meta( 'facebook_profile' );
										if ( $facebook_profile && $facebook_profile != '' ) {
										echo '<a href="' . esc_url($facebook_profile) . '" target="_blank"><i class="fab fa-facebook-f"></i></a>';
										}

										$twitter_profile = get_the_author_meta( 'twitter_profile' );
										if ( $twitter_profile && $twitter_profile != '' ) {
										echo '<a href="' . esc_url($twitter_profile) . '" target="_blank"><i class="fab fa-twitter"></i></a>';
										}

										$google_profile = get_the_author_meta( 'google_profile' );
										if ( $google_profile && $google_profile != '' ) {
										echo '<a href="' . esc_url($google_profile) . '" target="_blank"><i class="fab fa-google-plus-g"></i></a>';
										}


										$user_profile_email = get_the_author_meta( 'user_profile_email' );
										if ( $user_profile_email && $user_profile_email != '' ) {
										echo '<a href="mailto:' . esc_url($user_profile_email) . '"><i class="far fa-envelope"></i></a>';
										}

										$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
										if ( $linkedin_profile && $linkedin_profile != '' ) {
										echo '<a href="' . esc_url($linkedin_profile) . '" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
										}
									?>
								</div>
							</div>
						<?php }else{ ?>
						<div class="margin-bottom-20"></div>
						<?php } ?>

					
						<?php
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
						<?php
						if(!empty($nextPost)){
						?>
						<div class="post-nav post-nav2 <?php if(pionusnews_get_option('pionusnews_show_author_on_single_post') != 1) { echo 'margintop20'; } ?>">
							<div class="row">
								<div class="col-md-12 text-left">
									<a href="<?php the_permalink(); ?>"><i class="fas fa-angle-right"></i></a>
									<span class="small-title"><?php esc_html_e( 'Next Post', 'pantograph'); ?></span>
									<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

									<div class="meta">
										<span><?php the_time(get_option('date_format')); ?></span>
										<a class="meta-link" href="<?php the_permalink(); ?>"><span class="comment"><i class="far fa-comment"></i> <?php echo get_comments_number(); ?></span></a>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php
									wp_reset_postdata();
								} //end foreach
							} // end if
						?>
							
						

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
						echo '<div class="related-posts"><h5>'.esc_html__( 'Related Posts', 'pantograph').'</h5><div class="row">';
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
					if ( comments_open() || have_comments() ) :
						comments_template( '', true );
					endif; 
					?>

				</div>

		<?php get_template_part( 'template-parts/pionus/sidebar', 'pionus' ); ?>
		</div>
	</div>
</div>