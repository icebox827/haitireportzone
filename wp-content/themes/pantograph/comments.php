<?php
/**
 * The template for displaying Comments.
 */

if ( post_password_required() )
	return;
$favorite_theme_style = get_option( 'favorite_theme_style' );
?>
<?php if ($favorite_theme_style == 'style_new'){ ?>
<div class="comments">
	<div id="comments">

		<?php if ( have_comments() ) : ?>

				<h5><?php comments_number(esc_html__('No Comment Yet', 'pantograph'), esc_html__('1 Comment', 'pantograph'), esc_html__('% Comments', 'pantograph') );?></h5>
					
				<ul>
					<?php wp_list_comments( array( 'callback' => 'pionusnews_comment' ) ); ?>
				</ul><!-- .commentlist -->
				<div class="clearfix"></div>
		  
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<span class="separator"></span>    
				<div class="custom-pagination text-center">
					<ul class="pagenation-list">
					  <li><?php esc_url( previous_comments_link( '<i class="fa fa-angle-left"></i>' ) ) ?></li>
					  <li><?php esc_url( next_comments_link( '<i class="fa fa-angle-right"></i>', 0 ) ) ?></li>
					</ul>
				</div>
				<?php endif; ?>

				<?php
				/* If there are no comments and comments are closed, let's leave a note.
				 * But we only want the note on posts and pages that had comments in the first place.
				 */
				if ( ! comments_open() ) : ?>
					<h2><?php esc_html_e( 'Comments are closed' , 'pantograph'); ?></h2>
				<?php endif; ?>
			 
		<?php endif; // have_comments() ?>
	</div><!--#comments-section end-->
</div>

<?php if ( comments_open() ) : ?>	
		<div class="comment-form">
			<?php comment_form(array(
			'title_reply_before' => '',
			'title_reply_after' => '',
			)); ?>
		</div><!--#respond end-->
	<?php endif; ?>
<?php } else { ?>
<div class="comments">
	<div id="comments">

		<?php if ( have_comments() ) : ?>

				<h5><?php comments_number(esc_html__('No Comment Yet', 'pantograph'), esc_html__('1 Comment', 'pantograph'), esc_html__('% Comments', 'pantograph') );?></h5>
					
				<ul>
					<?php wp_list_comments( array( 'callback' => 'pantograph_comment' ) ); ?>
				</ul><!-- .commentlist -->
				<div class="clearfix"></div>
		  
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<span class="separator"></span>    
				<div class="custom-pagination text-center">
					<ul class="pagenation-list">
					  <li><?php esc_url( previous_comments_link( '<i class="fa fa-angle-left"></i>' ) ) ?></li>
					  <li><?php esc_url( next_comments_link( '<i class="fa fa-angle-right"></i>', 0 ) ) ?></li>
					</ul>
				</div>
				<?php endif; ?>

				<?php
				/* If there are no comments and comments are closed, let's leave a note.
				 * But we only want the note on posts and pages that had comments in the first place.
				 */
				if ( ! comments_open() ) : ?>
					<h2><?php esc_html_e( 'Comments are closed' , 'pantograph' ); ?></h2>
				<?php endif; ?>
			 
		<?php endif; // have_comments() ?>
	</div><!--#comments-section end-->
</div>

<?php if ( comments_open() ) : ?>	
		<div class="comment-form">
			<?php comment_form(array(
			'title_reply_before' => '',
			'title_reply_after' => '',
			)); ?>
		</div><!--#respond end-->
	<?php endif; ?>
<?php } ?>