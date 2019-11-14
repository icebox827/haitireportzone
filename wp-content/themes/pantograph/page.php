<?php
/**
 * The default page template of this theme
 */
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_old'){
get_header();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/header', 'pionus' );
} else {
get_header();
}
?>
<?php if ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/page', 'pionus' );
} else { ?>
  <div class="inner-content">
    <div class="container">
      <div class="row">
			<?php			
			if (have_posts()) :  while (have_posts()) : the_post(); 
				$pantograph_global_post = pantograph_get_global_post();
				$postid = $pantograph_global_post->ID;
				if(function_exists('pantograph_setPostViews')) {
				pantograph_setPostViews(get_the_ID());
				}
				$get_image = esc_url( wp_get_attachment_url( get_post_thumbnail_id($postid) ) );
				$custom_image_url = get_post_meta(get_the_ID(), 'custom_image_url', true); 					
			?>
			<div class="col-md-8 col-sm-12">
				<?php if(pantograph_get_option('pantograph_on_breadcrumbs') == 1) { ?>
				<div class="section-head">
					<?php pantograph_wordpress_breadcrumbs(); ?>
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
				<div class="clearfix"></div>
				</div>
	
		<?php comments_template( '', true ); ?>					
	  </div>
	  <?php endwhile; endif; ?>
	  
		<!--Sidebar-->
			<?php get_sidebar(); ?>
		<!--Sidebar end-->
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