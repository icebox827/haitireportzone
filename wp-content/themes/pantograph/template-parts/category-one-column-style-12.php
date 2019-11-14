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
<div class="one-column-style-12">
		<div class="container">
		<?php if($show_hide_breadcrumb==1){  ?>
		<div class="row">
			<div class="col-md-12">
							
				<div class="section-head">
					<?php
						pantograph_wordpress_breadcrumbs();
					?>
				</div>
			</div>
		</div>
		<?php } ?>
		</div>
		<?php if(($cat_data['show_hide_title']==1) || ($cat_data['show_hide_cat_desc']==1)){ ?>
			<div class="post-little-banner">
				<?php
				if($cat_data['show_hide_title']==1){
					if($cat_title == ''){
						echo '<h3 class="page-title-blog">
						'.single_cat_title('Articles from ').'
						</h3>';
					}else{	
					echo '<h3 class="page-title-blog">
					'.esc_attr($cat_title).'
					</h3>';
					}	
				}
				?>
				
				<?php if(($cat_data['show_hide_title']==0) && ($cat_data['show_hide_cat_desc']==1)){ ?>
				<h3 class="page-title-blog"><?php echo category_description( $cat_id ); ?></h3>
				<?php }else{
					if($cat_data['show_hide_cat_desc']==1){ ?>
					<small><?php echo category_description( $cat_id ); ?></small>
				<?php }} ?>
			</div>	
		<?php }else{ ?>
		<style>
		.post-paper {
			top: 0;
		}
		</style>
		<?php } ?>
		<div class="post-paper sidebar-no modern category-one-column-style-12">
			<div class="container">
			<div class="row">
				<?php 
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
					elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
					else { $paged = 1; }
					$the_query = new WP_Query( array('post_type' => 'post', 'paged' => $paged, 'cat' => $cat_id));
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
					$get_title =  get_the_title(); 
					$first_char = substr($get_title, 0, 1);
				?>
				<?php if ( has_post_format( 'video' ) ) : ?>
				<article class="onecollg">
					<div class="post-excerpt">
						<h4 class="h2"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
						<span class="post-big-letter"><?php echo esc_attr($first_char); ?></span>
						<div class="meta">
							<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
							<span><?php the_time(get_option('date_format')); ?></span>
							<span class="comment">
							<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
							<?php esc_html_e(' In ', 'pantograph'); ?>
							</span>
							<span class="small-title cat"><?php the_category(', '); ?></span>
						</div>
						<?php echo get_first_video_embed(get_the_ID()); ?>
						<p><?php echo pantograph_theme_excerpt(35); ?></p>
						<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
					</div>
				</article>
				<?php else: ?>
				<?php if ($get_image) : ?>
				<article class="onecollg">
					<div class="post-excerpt">
						
						<h4 class="h2"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
						<span class="post-big-letter"><?php echo esc_attr($first_char); ?></span>
						<div class="small-title cat"><?php the_category(', '); ?></div>
						<div class="meta">
							<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
							<span><?php the_time(get_option('date_format')); ?></span>
							<span class="comment">
							<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
							</span>
						</div>
						<a href="<?php the_permalink(); ?>">
							<div class="beforeonecollargestyle">
								<div class="onecollargestyle bg-img" style="background-image: url(<?php echo esc_url( $get_image ); ?>); opacity: 1;">
								</div>
							</div>
						</a>
						<p><?php echo pantograph_theme_excerpt(35); ?></p>
						<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
					</div>
				</article>
				<?php else: ?>
				<article>
					<div class="post-excerpt">
						<h4 class="h2"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
						<span class="post-big-letter"><?php echo esc_attr($first_char); ?></span>
						<div class="meta">
							<span><?php esc_html_e('by', 'pantograph'); ?> <?php the_author_posts_link(); ?></span>
							<span><?php the_time(get_option('date_format')); ?></span>
							<span class="comment">
							<a class="meta-link" href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
							<?php esc_html_e(' In ', 'pantograph'); ?>
							</span>
							<span class="small-title cat"><?php the_category(', '); ?></span>
						</div>
						<p><?php echo pantograph_theme_excerpt(35); ?></p>
						<a href="<?php the_permalink(); ?>" class="small-title rmore"><?php if(pantograph_get_option('pantograph_readmore_label') != '') { ?><?php echo esc_attr( pantograph_get_option('pantograph_readmore_label') ); ?><?php } else { ?><?php esc_html_e('Read More', 'pantograph'); ?><?php } ?></a>
					</div>
				</article>
				<?php endif; ?>			
				<?php endif; ?>			
				<?php endwhile; else: ?>
					<div class="error-container">
						<h3><?php esc_html_e('OOPS! NOTHING FOUND', 'pantograph'); ?></h3>
						<p><?php esc_html_e('Sorry, You are looking for something that dose not exist.', 'pantograph'); ?></p>
					   
						<br>

						<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Take Me Home', 'pantograph'); ?></a>
					</div>
				<?php endif; ?>
				<?php pantograph_custom_pagination(); ?>
			</div>
		</div>
	    </div>
	</div>