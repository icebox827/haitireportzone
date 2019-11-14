<div class="inner-content">
    <div class="container">
      <div class="row">
			<?php			
			if (have_posts()) :  while (have_posts()) : the_post(); 
				$pionusnews_global_post = pionusnews_get_global_post();
				$postid = $pionusnews_global_post->ID;
				if(function_exists('pionusnews_setPostViews')) {
				pionusnews_setPostViews(get_the_ID());
				}
				$get_image = esc_url( wp_get_attachment_url( get_post_thumbnail_id($postid) ) );
				$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true); 					
			?>
			<div class="col-md-8 col-sm-12">
				<?php if(pionusnews_get_option('pionusnews_on_breadcrumbs') == 1) { ?>
				<div class="section-head">
					<?php pionusnews_wordpress_breadcrumbs(); ?>
				</div>
				<?php } ?>
				<div class="blog-single">
				<?php if($custom_image_url){ ?>
				<img src="<?php echo esc_url($custom_image_url); ?>" />
				<?php }else{ ?>
				<?php if ( has_post_thumbnail()) : ?>
					<?php  the_post_thumbnail( 'full', array( 'class'  => 'img-responsive default-post-image' ) ); ?>
				<?php endif; 
				} ?>
				<h1 class="h1"><?php echo get_the_title(); ?></h1>
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
				<div class="clearfix"></div>
				</div>
	
		<?php comments_template( '', true ); ?>					
	  </div>
	  <?php endwhile; endif; ?>
	  
		<!--Sidebar-->
			<?php get_template_part( 'template-parts/pionus/sidebar', 'pionus' ); ?>
		<!--Sidebar end-->
    </div>
    </div>
  </div>