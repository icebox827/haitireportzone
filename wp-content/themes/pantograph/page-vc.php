<?php
/**
 * Template Name: Page With VC
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
  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
        <!-- post content -->
        <div class="post-content">

					<?php the_content(); ?>

        </div>
		<?php endwhile; endif; ?>
		<div><style>
			.post-content{
				display: none;
			}
			.post-content:first-child{
				display: block;
			}
		</style></div>
						
      </div>

    </div>
    </div>
<?php 
if ($favorite_theme_style == 'style_old'){
get_footer();
} elseif ($favorite_theme_style == 'style_new'){
get_template_part( 'template-parts/pionus/footer', 'pionus' );
} else {
get_footer();
}
?>