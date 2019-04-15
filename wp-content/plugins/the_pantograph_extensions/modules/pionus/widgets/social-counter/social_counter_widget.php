<?php
/*************************
Start Social Followers Counter widget
*************************/

class pionusnews_social extends WP_Widget {
	function __construct() {
		parent::__construct(
			'social-counter-widget',
			__( 'Social Counter Widget', 'pionusnews-widget' ),
			array(
				'classname' => 'pionusnews_social_counter',
				'description' => esc_html__( 'Displays Social Counter Widget', 'pionusnews-widget' ),
				'customize_selective_refresh' => true,
			)
		);
	}
	
	function widget( $args, $instance ) {
		$title = isset($instance['title']) ? $instance['title'] : '';
		$facebook_page = isset($instance['facebook']) ? $instance['facebook'] : '';
		$facebook_key = isset($instance['facebook_key']) ? $instance['facebook_key'] : '';
		$facebook_secret = isset($instance['facebook_secret']) ? $instance['facebook_secret'] : '';
		$rss_id = isset($instance['rss']) ? $instance['rss'] : '';
		$twitter_id =  isset($instance['twitter']) ? $instance['twitter'] : '';
		$gpluspage = isset($instance['gpluspage']) ? $instance['gpluspage'] : '';
		$gpluspage_key = isset($instance['gpluspage_key']) ? $instance['gpluspage_key'] : '';
		$google_like = isset($instance['google_like']) ? $instance['google_like'] : '';
		$facebook_like = isset($instance['facebook_like']) ? $instance['facebook_like'] : '';
		$post_count = isset($instance['post_count']) ? $instance['post_count'] : '';
		$comments_count = isset($instance['comments_count']) ? $instance['comments_count'] : '';
		$social_title_bg = isset($instance['social_title_bg']) ? $instance['social_title_bg'] : '';
		$pinterest_username = isset($instance['pinterest_username']) ? $instance['pinterest_username'] : '';
		$instagram_user_id = isset($instance['instagram_user_id']) ? $instance['instagram_user_id'] : '';
		$youtube_channel_id = isset($instance['youtube_channel_id']) ? $instance['youtube_channel_id'] : '';
		$layout = isset($instance['layout']) ? $instance['layout'] : '';
		$current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
		$item_counter = 0;
		if ($twitter_id) $item_counter++;
		if ($rss_id) $item_counter++; 
		if ($gpluspage && $gpluspage_key) $item_counter++; 
		if ($pinterest_username) $item_counter++; 
		if ($instagram_user_id) $item_counter++; 
		if ($youtube_channel_id) $item_counter++; 
		if ($google_like) $item_counter++; 
		if ($facebook_like) $item_counter++; 
		if ($post_count) $item_counter++; 
		if ($comments_count) $item_counter++; 
		if ($facebook_page && $facebook_key && $facebook_secret) $item_counter++; 
		
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));
		
		echo $args['before_widget'];
		if ( ! empty( $title ) ) { echo'<h4 class="widget-title"><span class="sh-text">'. wp_kses_post( $title ) .'</span></h4>'; };
		do_action( 'pionusnews_before_widget', $instance );
		
		if($layout=='main'){
		if ( @fopen("https://google.com", "r") ){
		?>
		<div class="side-social">
			<?php if(!empty($facebook_page) && (!empty($facebook_key)) && (!empty($facebook_secret)) ): ?>
			<a href="<?php echo esc_url($facebook_page); ?>" target="_blank"><i class="fab fa-facebook-f"></i> <?php echo pionusnews_social_facebook_like_counts( $facebook_page, $facebook_key, $facebook_secret ); ?> <span><?php esc_html_e('Fans', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if(!empty($twitter_id)): ?>
			<a href="<?php echo esc_url('https://twitter.com/'.$twitter_id); ?>" target="_blank"><i class="fab fa-twitter"></i> <?php echo pionusnews_social_tweet_counts($twitter_id, true); ?> <span><?php esc_html_e('Followers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if(!empty($gpluspage) && (!empty($gpluspage_key)) ): ?>
			<a href="<?php echo esc_url('https://plus.google.com/'.$gpluspage) ?>" target="_blank"><i class="fab fa-google-plus-g"></i> <?php echo pionusnews_social_google_plus_counts($gpluspage, $gpluspage_key ); ?> <span><?php esc_html_e('Followers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if( $pinterest_username ): ?>
			<a href="<?php echo esc_url('https://www.pinterest.com/'.$pinterest_username); ?>" target="_blank"><i class="fab fa-pinterest"></i> <?php echo pionusnews_social_pinterest_followers_counts($pinterest_username); ?> <span><?php esc_html_e('Followers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			
			<?php if(!empty($instagram_user_id)): ?>
			<a href="<?php echo esc_url('https://www.instagram.com/'.$instagram_user_id); ?>" target="_blank"><i class="fab fa-instagram"></i> <?php echo pionusnews_social_instagram_followers_counts($instagram_user_id); ?> <span><?php esc_html_e('Followers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			
			<?php if(!empty($youtube_channel_id)): ?>
			<a href="<?php echo esc_url('https://www.youtube.com/channel/'.$youtube_channel_id); ?>" target="_blank"><i class="fab fa-youtube"></i> <?php echo pionusnews_social_youtube_subscribers_counts($youtube_channel_id); ?> <span><?php esc_html_e('Subscribers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			
			<?php if( $post_count ): ?> 
			<a href=""><i class="far fa-edit"></i> <?php echo wp_count_posts()->publish; ?> <span><?php esc_html_e('Posts', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if( $comments_count ): ?>
			<a href=""><i class="far fa-comments"></i> <?php echo wp_count_comments()->approved; ?> <span><?php esc_html_e('Comments', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if( $rss_id ): ?>
			<a href="<?php echo esc_url($rss_id); ?>" target="_blank"><i class="fas fa-rss"></i> Rss <span><?php esc_html_e('Subscribe', 'pantograph'); ?></span></a>
			<?php endif; ?>
		</div>
		<?php 
		}else{
			echo esc_html("Sorry, you must need internet connection to perform this widget.", 'pantograph');
		}
		
		}elseif($layout=='better'){
			if ( @fopen("https://google.com", "r") ){
		?>
		<ul class="better-social-icons">
		   <?php if(!empty($facebook_page) && (!empty($facebook_key)) && (!empty($facebook_secret)) ): ?>
		   <li class="social-icons-item"> <a class="facebook-social-icon" href="<?php echo esc_url($facebook_page); ?>" target="_blank"> <span class="counter-icon fab fa-facebook-f"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_facebook_like_counts( $facebook_page, $facebook_key, $facebook_secret ); ?></span> <span class="followers-name"><?php esc_html_e('Fans', 'pantograph'); ?></span> </span> </a> </li>
			<?php endif; ?>
			
		   <?php if(!empty($twitter_id)): ?>
		   <li class="social-icons-item"> <a class="twitter-social-icon" href="<?php echo esc_url('https://twitter.com/'.$twitter_id); ?>" target="_blank"> <span class="counter-icon fab fa-twitter"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_tweet_counts($twitter_id, true); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($gpluspage) && (!empty($gpluspage_key)) ): ?>
		   <li class="social-icons-item"> <a class="google-social-icon" href="<?php echo esc_url('https://plus.google.com/'.$gpluspage); ?>" target="_blank"> <span class="counter-icon fab fa-google-plus-g"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_google_plus_counts($gpluspage, $gpluspage_key ); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($youtube_channel_id)): ?>
		   <li class="social-icons-item"> <a class="youtube-social-icon" href="<?php echo esc_url('https://www.youtube.com/channel/'.$youtube_channel_id); ?>" target="_blank"> <span class="counter-icon fab fa-youtube"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_youtube_subscribers_counts($youtube_channel_id); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($instagram_user_id)): ?>
		   <li class="social-icons-item"> <a class="instagram-social-icon" href="<?php echo esc_url('https://www.instagram.com/'.$instagram_user_id); ?>" target="_blank"> <span class="counter-icon fab fa-instagram"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_instagram_followers_counts($instagram_user_id); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   <?php if( $pinterest_username ): ?>
			<li class="social-icons-item"> <a class="pinterest-social-icon" href="<?php echo esc_url('https://www.pinterest.com/'.$pinterest_username); ?>" target="_blank"> <span class="counter-icon fab fa-pinterest"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_pinterest_followers_counts($pinterest_username); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
			<?php endif; ?>
		   <?php if( $post_count ): ?> 
			<li class="social-icons-item"> <a class="posts-social-icon" href="#"> <span class="counter-icon fas fa-pencil-alt"></span> <span class="followers"> <span class="followers-num"><?php echo wp_count_posts()->publish; ?></span> <span class="followers-name"><?php esc_html_e('Posts', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
			<?php if( $comments_count ): ?>
			<li class="social-icons-item"> <a class="comments-social-icon" href="#"> <span class="counter-icon far fa-comments"></span> <span class="followers"> <span class="followers-num"><?php echo wp_count_comments()->approved; ?></span> <span class="followers-name"><?php esc_html_e('Comments', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
			<?php if( $rss_id ): ?>
			<li class="social-icons-item"> <a class="rss-social-icon" href="<?php echo esc_url($rss_id); ?>" target="_blank"> <span class="counter-icon fas fa-rss"></span> <span class="followers"> <span class="followers-num"><?php esc_html_e('RSS', 'pantograph'); ?></span> <span class="followers-name"><?php esc_html_e('Link', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		</ul>
		<?php
		}}elseif($layout=='solid'){
			if ( @fopen("https://google.com", "r") ){
		?>
		<ul class="solid-social-icons">
		   <?php if(!empty($facebook_page) && (!empty($facebook_key)) && (!empty($facebook_secret)) ): ?>
		   <li class="social-icons-item"> <a class="facebook-social-icon" href="<?php echo esc_url($facebook_page); ?>" target="_blank"> <span class="counter-icon fab fa-facebook-f"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_facebook_like_counts( $facebook_page, $facebook_key, $facebook_secret ); ?></span> <span class="followers-name"><?php esc_html_e('Fans', 'pantograph'); ?></span> </span> </a> </li>
			<?php endif; ?>
			
		   <?php if(!empty($twitter_id)): ?>
		   <li class="social-icons-item"> <a class="twitter-social-icon" href="<?php echo esc_url('https://twitter.com/'.$twitter_id); ?>" target="_blank"> <span class="counter-icon fab fa-twitter"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_tweet_counts($twitter_id, true); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($gpluspage) && (!empty($gpluspage_key)) ): ?>
		   <li class="social-icons-item"> <a class="google-social-icon" href="<?php echo esc_url('https://plus.google.com/'.$gpluspage); ?>" target="_blank"> <span class="counter-icon fab fa-google-plus-g"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_google_plus_counts($gpluspage, $gpluspage_key ); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($youtube_channel_id)): ?>
		   <li class="social-icons-item"> <a class="youtube-social-icon" href="<?php echo esc_url('https://www.youtube.com/channel/'.$youtube_channel_id); ?>" target="_blank"> <span class="counter-icon fab fa-youtube"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_youtube_subscribers_counts($youtube_channel_id); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($instagram_user_id)): ?>
		   <li class="social-icons-item"> <a class="instagram-social-icon" href="<?php echo esc_url('https://www.instagram.com/'.$instagram_user_id); ?>" target="_blank"> <span class="counter-icon fab fa-instagram"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_instagram_followers_counts($instagram_user_id); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   <?php if( $pinterest_username ): ?>
			<li class="social-icons-item"> <a class="pinterest-social-icon" href="<?php echo esc_url('https://www.pinterest.com/'.$pinterest_username); ?>" target="_blank"> <span class="counter-icon fab fa-pinterest"></span> <span class="followers"> <span class="followers-num"><?php echo pionusnews_social_pinterest_followers_counts($pinterest_username); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
			<?php endif; ?>
		   <?php if( $post_count ): ?> 
			<li class="social-icons-item"> <a class="posts-social-icon" href="#"> <span class="counter-icon fas fa-pencil-alt"></span> <span class="followers"> <span class="followers-num"><?php echo wp_count_posts()->publish; ?></span> <span class="followers-name"><?php esc_html_e('Posts', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
			<?php if( $comments_count ): ?>
			<li class="social-icons-item"> <a class="comments-social-icon" href="#"> <span class="counter-icon far fa-comments"></span> <span class="followers"> <span class="followers-num"><?php echo wp_count_comments()->approved; ?></span> <span class="followers-name"><?php esc_html_e('Comments', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
			<?php if( $rss_id ): ?>
			<li class="social-icons-item"> <a class="rss-social-icon" href="<?php echo esc_url($rss_id); ?>" target="_blank"> <span class="counter-icon fas fa-rss"></span> <span class="followers"> <span class="followers-num"><?php esc_html_e('RSS', 'pantograph'); ?></span> <span class="followers-name"><?php esc_html_e('Link', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		</ul>
		<?php
		}}else{			
		if ( @fopen("https://google.com", "r") ){
		?>
		<div class="pionusnews-social-widget layout-<?php echo esc_attr($layout); ?>">
			<ul>
				<?php if( $gpluspage && $gpluspage_key ): ?>
				<li class="google-fans item-<?php echo esc_attr($item_counter); ?>">
					<a href="<?php echo esc_url('https://plus.google.com/'.$gpluspage) ?>" target="_blank">					
						<span><?php echo pionusnews_social_google_plus_counts($gpluspage, $gpluspage_key ); ?></span>
						<small><?php _e('Followers' , 'pantograph') ?></small>
				  </a>
				</li>
				<?php endif; ?>
				<?php if( $facebook_page && $facebook_key && $facebook_secret ): ?>
					<li class="facebook-fans item-<?php echo esc_attr($item_counter); ?>">
						<a href="<?php echo esc_url($facebook_page) ?>" target="_blank">					
							<span><?php echo pionusnews_social_facebook_like_counts( $facebook_page, $facebook_key, $facebook_secret ); ?></span>
							<small><?php _e('Fans' , 'pantograph') ?></small>
						</a>
					</li>
				<?php endif; ?>
				<?php if(!empty($twitter_id)): ?>
					<li class="twitter-followers item-<?php echo esc_attr($item_counter); ?>">
						<a href="<?php echo esc_url('https://twitter.com/'.$twitter_id) ?>" target="_blank">
							<span><?php echo pionusnews_social_tweet_counts($twitter_id, true); ?></span>
							<small><?php _e('Followers' , 'pantograph') ?></small>
						</a>
					</li>
				<?php endif; ?>
			
				<?php if( $pinterest_username ): ?> 
				    <li class="pinterest-followers item-<?php echo esc_attr($item_counter); ?>">
						<a href="<?php echo esc_url('https://www.pinterest.com/'.$pinterest_username) ?>" target="_blank">
							<span><?php echo pionusnews_social_pinterest_followers_counts($pinterest_username); ?></span>
							<small><?php _e('Followers' , 'pantograph') ?></small>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if(!empty($instagram_user_id)): ?>
					<li class="instagram-followers item-<?php echo esc_attr($item_counter); ?>">
						<a href="<?php echo esc_url('https://www.instagram.com/'.$instagram_user_id); ?>" target="_blank">
							<span><?php echo pionusnews_social_instagram_followers_counts($instagram_user_id); ?></span>
							<small><?php _e('Followers' , 'pantograph'); ?></small>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if(!empty($youtube_channel_id)): ?>
					<li class="youtube-followers">
						<a href="<?php echo esc_url('https://www.instagram.com/'.$youtube_channel_id); ?>" target="_blank">
						<span><?php echo pionusnews_social_youtube_subscribers_counts($youtube_channel_id); ?> </span>
						<span><?php esc_html_e('subscribers', 'pantograph'); ?></span>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if( $rss_id ): ?>
				<li class="rss-subscribers item-<?php echo esc_attr($item_counter); ?>">
					<a href="<?php echo esc_url($rss_id) ?>" target="_blank">
						<span><?php _e('RSS' , 'pantograph') ?><?php __('Subscribers' , 'pantograph') ?></span>
						<small><?php _e('Subscribe' , 'pantograph') ?></small>
					</a>
				</li>
				<?php endif; ?>
				<?php if( $post_count ): ?>  
				  <li class="post-count item-<?php echo esc_attr($item_counter); ?>">
					<a href="#">
						<span><?php echo wp_count_posts()->publish; ?></span>
						<small><?php _e('Posts' , 'pantograph') ?></small>
					</a>
				  </li>
				<?php endif; ?>
				<?php if( $comments_count ): ?>	
					<li class="comments-count item-<?php echo esc_attr($item_counter); ?>">
						<a href="#">
							<span><?php echo wp_count_comments()->approved; ?></span>
							<small><?php _e('Comments' , 'pantograph') ?></small>
						</a>
					</li>
				<?php endif; ?>	
		  </ul>
	</div>
		<?php 
		}else{
			echo esc_html("Sorry, you must need internet connection to perform this widget.", 'pantograph'); 
		}
		} 
		if($social_title_bg){ ?>
		<div><style>
		.pionusnews_social_counter h4 {
				border-top: 3px solid <?php echo esc_attr($social_title_bg); ?>;
			}
			.pionusnews_social_counter h4 span.sh-text{
				background-color: <?php echo esc_attr($social_title_bg); ?>;
			}
		</div></style>
		<?php }
		?>
		
	<?php echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = isset($instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['facebook'] = isset($instance['facebook']) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['facebook_key'] = isset($instance['facebook_key']) ? strip_tags( $new_instance['facebook_key'] ) : '';
		$instance['facebook_secret'] = isset($instance['facebook_secret']) ? strip_tags( $new_instance['facebook_secret'] ) : '';
		$instance['rss'] = isset($instance['rss']) ? strip_tags( $new_instance['rss'] ) : '';
		$instance['twitter'] = isset($instance['twitter']) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['gpluspage'] = isset($instance['gpluspage']) ? strip_tags( $new_instance['gpluspage'] ) : '';
		$instance['gpluspage_key'] = isset($instance['gpluspage_key']) ? strip_tags( $new_instance['gpluspage_key'] ) : '';
		$instance['pinterest_username'] = isset($instance['pinterest_username']) ? strip_tags( $new_instance['pinterest_username'] ) : '';
		$instance['instagram_user_id'] = isset($instance['instagram_user_id']) ? strip_tags( $new_instance['instagram_user_id'] ) : '';
		$instance['youtube_channel_id'] = isset($instance['youtube_channel_id']) ? strip_tags( $new_instance['youtube_channel_id'] ) : '';
		$instance['google_like'] = isset($new_instance['google_like']) ? 1 : 0 ;
		$instance['facebook_like'] = isset($new_instance['facebook_like']) ? 1 : 0 ;
		$instance['post_count'] = isset($new_instance['post_count']) ? 1 : 0 ;
		$instance['comments_count'] = isset($new_instance['comments_count']) ? 1 : 0 ;
		$instance['social_title_bg'] = isset($instance['social_title_bg']) ? strip_tags( $new_instance['social_title_bg'] ) : '';
		$instance['layout'] = isset($instance['layout']) ? strip_tags( $new_instance['layout'] ) : '';
		$instance['current_time'] = isset($instance['current_time']) ? $new_instance['current_time'] : '';
	
		return $instance;
	}

	function form( $instance ) { 
	$instance = wp_parse_args( (array) $instance, array( 
    'gpluspage_key' =>	'', 
    'facebook_key' =>	'', 
    'facebook_secret' =>	'', 
    'title' => __( 'Social Media', 'pionusnews-widget' ),
    'consumer_key' => '', 
    'consumer_secret' => '', 
    'access_token' => '', 
    'access_token_secret' => '', 
    'rss' => '', 
    'facebook' => '', 
    'twitter' => '', 
    'gpluspage' => '',
    'pinterest_username' => '',
    'instagram_user_id' => '',
    'youtube_channel_id' => '',
    'google_like'=> 1,
    'facebook_like'=> 1,
    'post_count'=> 0,
    'comments_count'=> 0,
	'social_title_bg'=> '',
    'layout'=> 'main',
	'current_time'     => time(),
     ) ); 
		$title 	= isset($instance['title']) ? htmlspecialchars($instance['title']) : '';	
		$rss = isset($instance['rss']) ? htmlspecialchars($instance['rss']) : '';
		$facebook = isset($instance['facebook']) ? htmlspecialchars($instance['facebook']) : '';
		$facebook_key = isset($instance['facebook_key']) ? htmlspecialchars($instance['facebook_key']) : '';
		$facebook_secret = isset($instance['facebook_secret']) ? htmlspecialchars($instance['facebook_secret']) : '';
		$twitter = isset($instance['twitter']) ? htmlspecialchars($instance['twitter']) : '';
		$gpluspage = isset($instance['gpluspage']) ? htmlspecialchars($instance['gpluspage']) : '';
		$gpluspage_key = isset($instance['gpluspage_key']) ? htmlspecialchars($instance['gpluspage_key']) : '';
		$google_like = isset($instance['google_like']) ? htmlspecialchars($instance['google_like']) : '';
		$facebook_like = isset($instance['facebook_like']) ? htmlspecialchars($instance['facebook_like']) : '';
		$post_count = isset($instance['post_count']) ? htmlspecialchars($instance['post_count']) : '';
		$comments_count = isset($instance['comments_count']) ? htmlspecialchars($instance['comments_count']) : '';
		$social_title_bg = isset($instance['social_title_bg']) ? htmlspecialchars($instance['social_title_bg']) : '';
		$pinterest_username = isset($instance['pinterest_username']) ? htmlspecialchars($instance['pinterest_username']) : '';
		$instagram_user_id = isset($instance['instagram_user_id']) ? htmlspecialchars($instance['instagram_user_id']) : '';
		$youtube_channel_id = isset($instance['youtube_channel_id']) ? htmlspecialchars($instance['youtube_channel_id']) : '';
		$layout = isset($instance['layout']) ? htmlspecialchars($instance['layout']) : '';
		$current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title' , 'pantograph') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" type="text" />
		</p>
		
		<h3><?php _e('Facebook' , 'pantograph') ?></h3><hr />
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php _e('Facebook Page URL' , 'pantograph') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" value="<?php echo esc_attr($instance['facebook']); ?>" class="widefat" type="text" />
			<small><?php _e('Link must be like https://www.facebook.com/username/ or https://www.facebook.com/PageID/' , 'pantograph') ?></small>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook_key' )); ?>"><?php _e('Facebook App ID' , 'pantograph') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'facebook_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_key' )); ?>" value="<?php echo esc_attr($instance['facebook_key']); ?>" class="widefat" type="text" />
		   <small><?php printf( __( 'Create an app on Facebook through this link %1$s.', 'pantograph'), '<a href="'.esc_url("https://developers.facebook.com/apps").'" target="_blank">(Facebook apps)</a>' ); ?></small>
    </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook_secret' )); ?>"><?php _e('Facebook App Secret' , 'pantograph') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'facebook_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_secret' )); ?>" value="<?php echo esc_attr($instance['facebook_secret']); ?>" class="widefat" type="text" />
		  <small><?php printf( __( 'Create an app on Facebook through this link %1$s.', 'pantograph'), '<a href="'.esc_url("https://developers.facebook.com/apps").'" target="_blank">(Facebook apps)</a>' ); ?></small>
    </p>
    <h3><?php _e('Twitter' , 'pantograph') ?></h3><hr />
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php _e('Twitter Username' , 'pantograph') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" value="<?php echo esc_attr($instance['twitter']); ?>" class="widefat" type="text" />
		  <small><?php _e('Please enter the Twitter username. For example: ronaldo' , 'pantograph') ?></small>
		</p>
	<h3><?php _e('Google Plus' , 'pantograph') ?></h3><hr />
    <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'gpluspage' )); ?>"><?php _e('Google Plus Page ID' , 'pantograph') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'gpluspage' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'gpluspage' )); ?>" value="<?php echo esc_attr($instance['gpluspage']); ?>" class="widefat" type="text" />
		  <small><?php _e('Please enter the Google page name. For example: +Business' , 'pantograph') ?></small>
    </p>
    <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'gpluspage_key' )); ?>"><?php _e('Google Plus API Key' , 'pantograph') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'gpluspage_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'gpluspage_key' )); ?>" value="<?php echo esc_attr($instance['gpluspage_key']); ?>" class="widefat" type="text" />
		  <small><?php printf( __( 'Create a project on Google through this link %1$s.', 'pantograph'), '<a href="'.esc_url("https://developers.google.com/maps/documentation/javascript/get-api-key").'" target="_blank">(Google dev)</a>' ); ?></small>
    </p>	
	<h3><?php _e('Pinterest' , 'pantograph') ?></h3><hr />
	<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'pinterest_username' )); ?>"><?php _e('Pinterest Username' , 'pantograph') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'pinterest_username' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest_username' )); ?>" value="<?php echo esc_attr($instance['pinterest_username']); ?>" class="widefat" type="text" />
    </p>
	
	<h3><?php _e('RSS' , 'pantograph') ?></h3><hr />
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>"><?php _e('RSS Feed URL' , 'pantograph') ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'rss' )); ?>" value="<?php echo esc_attr($instance['rss']); ?>" class="widefat" type="text" />
	</p>
	
	<h3><?php _e('Instagram' , 'pantograph') ?></h3><hr />
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'instagram_user_id' )); ?>"><?php _e('Instagram Username' , 'pantograph') ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'instagram_user_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_user_id' )); ?>" value="<?php echo esc_attr($instance['instagram_user_id']); ?>" class="widefat" type="text" />
	</p>
	<h3><?php _e('Youtube' , 'pantograph') ?></h3><hr />
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'youtube_channel_id' )); ?>"><?php _e('Youtube Channel ID' , 'pantograph') ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'youtube_channel_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_channel_id' )); ?>" value="<?php echo esc_attr($instance['youtube_channel_id']); ?>" class="widefat" type="text" />
		<small>Get youtube Channel ID From <a href="https://www.youtube.com/account_advanced" target="_blank">Click Here</a></small>
	</p>
		
    <h3><?php _e('Others' , 'pantograph') ?></h3><hr />
		<input type="hidden" id="<?php echo esc_attr($this->get_field_id('google_like')); ?>" name="<?php echo esc_attr($this->get_field_name('google_like')); ?>" value="1" />			
		<input type="hidden" id="<?php echo esc_attr($this->get_field_id('facebook_like')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook_like')); ?>" value="1" />			
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('post_count')); ?>"><?php _e('Posts Count' , 'pantograph') ?></label>
			<input type="checkbox" <?php checked( $instance['post_count'], 1 ); ?> id="<?php echo esc_attr($this->get_field_id('post_count')); ?>" name="<?php echo esc_attr($this->get_field_name('post_count')); ?>" value="<?php echo esc_attr($instance['post_count']); ?>" />			
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('comments_count')); ?>"><?php _e('Comments Count' , 'pantograph') ?></label>
			<input type="checkbox" <?php checked( $instance['comments_count'], 1 ); ?> id="<?php echo esc_attr($this->get_field_id('comments_count')); ?>" name="<?php echo esc_attr($this->get_field_name('comments_count')); ?>" value="<?php echo esc_attr($instance['comments_count']); ?>" />			
		</p>
		<script>
		jQuery(document).ready(function($){
			$('.social_title_bg_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'social_title_bg ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'social_title_bg' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social_title_bg' )); ?>" class="widefat social_title_bg_color" value="<?php echo esc_attr($instance['social_title_bg']); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('layout')); ?>"><?php _e( 'Layout', 'pantograph');?></label> 
        <select class='widefat' id="<?php echo esc_attr($this->get_field_id('layout')); ?>" name="<?php echo esc_attr($this->get_field_name('layout')); ?>" type="text">
          <option value='main'<?php echo ($layout=='main')?'selected':''; ?>><?php _e( 'Main', 'pantograph');?></option>
          <option value='better'<?php echo ($layout=='better')?'selected':''; ?>><?php _e( 'Better', 'pantograph');?></option>
          <option value='solid'<?php echo ($layout=='solid')?'selected':''; ?>><?php _e( 'Solid Social Icon', 'pantograph');?></option>
          <option value='clear'<?php echo ($layout=='clear')?'selected':''; ?>><?php _e( 'Clear', 'pantograph');?></option>
          <option value='bordered'<?php echo ($layout=='bordered')?'selected':''; ?>><?php _e( 'Bordered', 'pantograph');?></option> 
          <option value='bordered-shadow'<?php echo ($layout=='bordered-shadow')?'selected':''; ?>><?php _e( 'Bordered with shadow', 'pantograph');?></option>
          <option value='bordered-rounded'<?php echo ($layout=='bordered-rounded')?'selected':''; ?>><?php _e( 'Rounded (bordered)', 'pantograph');?></option>
          <option value='bordered-rounded-shadow'<?php echo ($layout=='bordered-rounded-shadow')?'selected':''; ?>><?php _e( 'Rounded (bordered) with shadow', 'pantograph');?></option> 
        </select>                
    </p>
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">	
	
			<?php
	}		
}

	function pionusnews_social() {
		register_widget('pionusnews_social');
	}
	add_action('widgets_init', 'pionusnews_social');

function pionusnews_social_facebook_like_counts($facebook_page, $facebook_key, $facebook_secret ){		
		//Construct a Facebook URL
			$str = $facebook_page;
			$blah = parse_url($str);
			$facebook_page_name_only = $blah['path']; //Get the facebook page name only without https://facebook.com
		  
		  /*Using curl*/
		  $ch=curl_init();

			$apiUrl = 'https://graph.facebook.com/'.$facebook_page_name_only.'?access_token='.$facebook_key.'|'.$facebook_secret.'&fields=fan_count';
			$timeout=5;
			//set the url
			curl_setopt($ch, CURLOPT_URL, $apiUrl);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); 
			
			//execute post
			$result = curl_exec($ch);
			 
			//close connection
			curl_close($ch);
			 
			$data = json_decode($result,true);
			
			//array_key_exists()
			$returened_data = array_key_exists('fan_count', $data) ? $data['fan_count'] : '28,749';

		  //return print_r($data);
		  return $returened_data;

}

function pionusnews_social_google_plus_counts($gpluspage, $gpluspage_key) {
    if($gpluspage && $gpluspage_key) {
		/*Using curl*/
		  $ch=curl_init();
		  $gUrl = "https://www.googleapis.com/plus/v1/people/".$gpluspage."?key=".$gpluspage_key;
		  $timeout=5;
			//set the url
			curl_setopt($ch, CURLOPT_URL, $gUrl);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); 
			
			//execute post
			$result = curl_exec($ch);
			 
			//close connection
			curl_close($ch);
			 
			$fb = json_decode($result,true);
			
			//array_key_exists()
			$returened_data = array_key_exists('circledByCount', $fb) ? $fb['circledByCount'] : '115';

		  //return print_r($data);
		  return $returened_data;
	}
}

function pionusnews_social_pinterest_followers_counts($pinterest_username){		
		//Construct a Pinterest URL
		
		libxml_use_internal_errors(true);
		$metas = get_meta_tags('https://pinterest.com/'.esc_attr($pinterest_username).'');
		libxml_clear_errors();
		  if($metas === FALSE) {
			  return 'No Data';
			}else{
		  if(isset($metas['pinterestapp:followers'])){
			return $metas['pinterestapp:followers'];
		  }else{
			return 0;
		  }
			}
		 
}
function pionusnews_social_instagram_followers_counts($user_id){		
		$ch=curl_init();
		  $gUrl = "https://www.instagram.com/".$user_id;
		  $timeout=5;
			//set the url
			curl_setopt($ch, CURLOPT_URL, $gUrl);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); 
			
			//execute post
			$result = curl_exec($ch);
			 
			//close connection
			curl_close($ch);
			
			$doc = new DOMDocument();
			
			  libxml_use_internal_errors(true);
			  $doc->loadHTML($result);
			  libxml_clear_errors();
			  $xpath = new DOMXPath($doc);
			  $js = $xpath->query('//body/script[@type="text/javascript"]')->item(0)->nodeValue;
			  $start = strpos($js, '{');
			  $end = strrpos($js, ';');
			  $json = substr($js, $start, $end - $start);
			  $data = json_decode($json, true);
			  if(isset($data["entry_data"]["ProfilePage"])){
			  $the_id = $data["entry_data"]["ProfilePage"][0]["graphql"]["user"]["edge_followed_by"]["count"];
			  } else {
			  $the_id = '';
			  }
			 
			//$fb = json_decode($result,true);
			
			//array_key_exists()
			if($the_id){
			$returened_data = $the_id;
			} else {
			$returened_data = '153';
			}

		  //return print_r($data);
		  return $returened_data;
}

function pionusnews_social_youtube_subscribers_counts($channel,$use = "user") {
    // Change channelid value to match your YouTube channel ID
$url = 'https://www.youtube.com/subscribe_embed?channelid='.$channel.'';

// Fetch the Subscribe button HTML
libxml_use_internal_errors(true);
$button_html = file_get_contents( $url );
libxml_clear_errors();
if($button_html === FALSE) {
  return 'No Data' ;
}else{
// Extract the subscriber count
$found_subscribers = preg_match( '/="0">(\d+)</i', $button_html, $matches );

if ( $found_subscribers && isset( $matches[1] ) ) {
    return intval( $matches[1] );
}else{
	return 0;
}
}
}

function pionusnews_social_tweet_counts($username, $cache = false, $cachetime = 1800, $stat_name = 'followers'){
  $cachefile = 'cached-'.$stat_name.'-'.$username; # Name of the cached file 
  # Serve from the cache if it is younger than $cachetime
  if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) :
    
    libxml_use_internal_errors(true);
	$the_cached_file = file_get_contents($cachefile);
    libxml_clear_errors();
	return $the_cached_file;
	
  else :
    
    # Get Twitter data :
	libxml_use_internal_errors(true);
    $twitter_data = file_get_contents('https://mobile.twitter.com/'.$username);
	libxml_clear_errors();
    # Regex to get follower count :
    preg_match('#'.$stat_name.'">\n.*<div class="statnum">([0-9,]*)</div>#', $twitter_data, $match);
    # Some operation :
    $twitter['count'] = str_replace(',', '', $match[1]);
    $twitter['count'] = intval($twitter['count']);
        
    # Write cache :
    if($cache){ $cached = fopen($cachefile, 'w'); fwrite($cached, $twitter['count']); fclose($cached); }
    if(isset($twitter['count'])){
	return $twitter['count']; # Done !
	}else{
	return 0;	
	}
    
  endif;
  
}

function pionusnews_social_social_js() { 
  ?>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, "script", "facebook-jssdk"));</script>
  <?php
}
// Add hook for front-end <head></head>
add_action('wp_head', 'pionusnews_social_social_js');