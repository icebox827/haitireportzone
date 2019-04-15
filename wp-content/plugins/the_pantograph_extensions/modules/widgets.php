<?php
/*************************
Start Instagram widget
*************************/

function pantograph_wpiw_widget() {
	register_widget( 'pantograph_instagram_widget' );
}
add_action( 'widgets_init', 'pantograph_wpiw_widget' );

Class pantograph_instagram_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'pantograph-instagram-feed',
			__( 'Pantograph Instagram', 'pantograph' ),
			array(
				'classname' => 'pantograph-instagram-feed side-widget',
				'description' => esc_html__( 'Displays your latest Instagram photos', 'pantograph' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	function widget( $args, $instance ) {

		$title = isset($instance['title']) ? $instance['title'] : '';
		$username = isset($instance['username']) ? $instance['username'] : '';
		$limit = isset($instance['number']) ? $instance['number'] : 9;
		$size = isset($instance['size']) ? $instance['size'] : 'large';
		$target = isset($instance['size']) ? $instance['size'] : '_self';
		$link = isset($instance['link']) ? $instance['link'] : '';
		$instagram_widget_title_color = isset($instance['instagram_widget_title_color']) ? $instance['instagram_widget_title_color'] : '';
		$instagram_widget_title_background_color = isset($instance['instagram_widget_title_background_color']) ? $instance['instagram_widget_title_background_color'] : '';
		$margintop = isset($instance['margintop']) ? $instance['margintop'] : '';
		$marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '';
		$current_time = isset($instance['current_time']) ? $instance['current_time'] : '';

		echo $args['before_widget'];
		do_action( 'wpiw_before_widget', $instance );

		if ( '' !== $username ) {

			$media_array = $this->pantograph_scrape_instagram( $username );

			if ( is_wp_error( $media_array ) ) {

				echo wp_kses_post( $media_array->get_error_message() );

			} else {

				// filter for images only?
				if ( $pantograph_images_only = apply_filters( 'wpiw_images_only', false ) ) {
					$media_array = array_filter( $media_array, array( $this, 'pantograph_images_only' ) );
				}

				// slice list down to required limit.
				$media_array = array_slice( $media_array, 0, $limit );

				// filters for custom classes.
				//$ulclass = apply_filters( 'wpiw_list_class', 'instagram-pics instagram-size-' . $size );
				$ulclass = apply_filters( 'wpiw_list_class', 'insta' );
				$liclass = apply_filters( 'wpiw_item_class', '' );
				$aclass = apply_filters( 'wpiw_a_class', '' );
				$imgclass = apply_filters( 'wpiw_img_class', '' );

				?>
				<div class="instagram<?php echo esc_attr($current_time); ?>" style="<?php if($margintop != ''){ echo 'margin-top:'.esc_attr($margintop).';'; } if($marginbottom != ''){ echo 'margin-bottom:'.esc_attr($marginbottom).';'; } ?>">
				<?php if($title){ ?>
			     <h4><span class="sh-text"><?php echo esc_attr($title); ?></span></h4>
			    <?php } ?>
				<ul class="<?php echo esc_attr( $ulclass ); ?>"><?php
				foreach( $media_array as $item ) {
						echo '<li class="' . esc_attr( $liclass ) . '"><a href="' . esc_url( $item['link'] ) . '" target="' . esc_attr( $target ) . '"  class="' . esc_attr( $aclass ) . '"><img src="' . esc_url( $item[$size] ) . '"  alt="' . esc_attr( $item['description'] ) . '" title="' . esc_attr( $item['description'] ) . '"  class="' . esc_attr( $imgclass ) . '"/></a></li>';
				}
				?></ul>
				</div>
				<style>
				<?php 
				$sidebar_background_color = pantograph_get_option('sidebar_background_color');
				if(($instagram_widget_title_color) || ($instagram_widget_title_background_color)){
				$custom_css="";
				if((pantograph_get_option('pantograph_title_style') == 1)) { 
				$custom_css .= "
						.instagram$current_time h4{
							color: {$instagram_widget_title_color}!important;
							border: 1px solid {$instagram_widget_title_background_color}!important;
						}
						.instagram$current_time h4 span.sh-text:before{
							background: {$instagram_widget_title_background_color}!important;
						}
						.instagram$current_time h4:before:before{
							background: {$instagram_widget_title_background_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
				$custom_css .= "
						.instagram$current_time h4{
							color: {$instagram_widget_title_color}!important;
							border-bottom: 4px solid  {$instagram_widget_title_background_color}!important;
						}
						
						.sh-text a.rsswidget:hover {
							color: {$instagram_widget_title_background_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
				$custom_css .= "
						.instagram$current_time h4{
							color: {$instagram_widget_title_color}!important;
							background-color: {$instagram_widget_title_background_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
				$custom_css .= "
						.instagram$current_time h4{
							color: {$instagram_widget_title_color}!important;
							border-top: 4px solid {$instagram_widget_title_background_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
				$custom_css .= "
						.instagram$current_time h4 span.sh-text{
							color: {$instagram_widget_title_color}!important;
							background-color: {$instagram_widget_title_background_color}!important;
						}
						.instagram$current_time h4 span.sh-text:after {
							background: {$sidebar_background_color};
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
				$custom_css .= "
						.instagram$current_time h4 span.sh-text{
							color: {$instagram_widget_title_color}!important;
							background-color: {$instagram_widget_title_background_color}!important;
						}
						.instagram$current_time h4 {
							border-top: 3px solid {$instagram_widget_title_background_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
				$custom_css .= "
						.instagram$current_time h4 span.sh-text{
							color: {$instagram_widget_title_color}!important;
							background-color: {$instagram_widget_title_background_color}!important;
						}
						.instagram$current_time h4 span.sh-text:after {
							border-bottom: 31px solid {$instagram_widget_title_background_color}!important;
						}
						.instagram$current_time h4{
							border-bottom: 3px solid {$instagram_widget_title_background_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
				$custom_css .= "
						.instagram$current_time .titleh3.margin-bottom-20{
								background: transparent!important;
						}
						.instagram$current_time h4 span.sh-text {
								background-color: {$instagram_widget_title_background_color}!important;
								color: {$instagram_widget_title_color}!important;
						}
						.instagram$current_time h4 span.sh-text:after {
							border-right: 16px solid {$sidebar_background_color};

						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
				$custom_css .= "
						.instagram$current_time h4 span.sh-text{
							color: {$instagram_widget_title_color}!important;
							background-color: {$instagram_widget_title_background_color}!important;
						}
						.instagram$current_time h4 span.sh-text:before {
							border-top-color: {$instagram_widget_title_background_color}!important;
							border-top: 10px solid {$instagram_widget_title_background_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
				$custom_css .= "
						.instagram$current_time h4 span.sh-text{
							color: {$instagram_widget_title_color}!important;
							background-color: {$instagram_widget_title_background_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
				$custom_css .= "
						.instagram$current_time h4 span.sh-text{
							 border-bottom: 2px solid {$instagram_widget_title_background_color}!important;
							 color: {$instagram_widget_title_color}!important;
						}
						";
				}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
					$custom_css .= "
						.instagram$current_time h4 span.sh-text {
							color: {$instagram_widget_title_color}!important;
						}
						.instagram$current_time h4:after {
							background: {$instagram_widget_title_background_color}!important;
						}
						.instagram$current_time h4:before {
							border-top-color: {$instagram_widget_title_background_color}!important;
							border-top: 5px solid {$instagram_widget_title_background_color}!important;
						}
						";
				}else{}
				
				print $custom_css;		
				}
				
				?>
				</style>
				<?php
			}
		}

		$linkclass = apply_filters( 'wpiw_link_class', 'clear' );
		$linkaclass = apply_filters( 'wpiw_linka_class', '' );

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url = '//instagram.com/explore/tags/' . str_replace( '#', '', $username );
				break;

			default:
				$url = '//instagram.com/' . str_replace( '@', '', $username );
				break;
		}

		if ( '' !== $link ) {
			?><p class="instalink <?php echo esc_attr( $linkclass ); ?>"><a href="<?php echo trailingslashit( esc_url( $url ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>" class="<?php echo esc_attr( $linkaclass ); ?>"><?php echo wp_kses_post( $link ); ?></a></p><?php
		}

		do_action( 'wpiw_after_widget', $instance );

		echo $args['after_widget'];
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' =>'', 'username' => '', 'size' => 'large', 'link' => '', 'number' => 9, 'target' => '_self', 'instagram_widget_title_color' => '', 'instagram_widget_title_background_color' => '', 'margintop' => '', 'marginbottom' => '', 'current_time' => '' ) );
		$title = isset($instance['title']) ? $instance['title'] : '';
		$username = isset($instance['username']) ? $instance['username'] : '';
		$number = isset($instance['number']) ? absint( $instance['number'] ) : '';
		$size = isset($instance['size']) ? $instance['size'] : '';
		$target = isset($instance['target']) ? $instance['target'] : '';
		$link = isset($instance['link']) ? $instance['link'] : '';
		$instagram_widget_title_color = isset($instance['instagram_widget_title_color']) ? $instance['instagram_widget_title_color'] : '';
		$instagram_widget_title_background_color = isset($instance['instagram_widget_title_background_color']) ? $instance['instagram_widget_title_background_color'] : '';
		$margintop = isset($instance['margintop']) ? $instance['margintop'] : '';
		$marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '';
		$current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'pantograph' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( '@username or #tag', 'pantograph' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'pantograph' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'pantograph' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
				<option value="small" <?php selected( 'small', $size ) ?>><?php esc_html_e( 'Small', 'pantograph' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open links in', 'pantograph' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
				<option value="_self" <?php selected( '_self', $target ) ?>><?php esc_html_e( 'Current window (_self)', 'pantograph' ); ?></option>
				<option value="_blank" <?php selected( '_blank', $target ) ?>><?php esc_html_e( 'New window (_blank)', 'pantograph' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'pantograph' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" /></label></p>
		<script>
		jQuery(document).ready(function($){
			$('.instagram_widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<p>
		  <label for="<?php echo esc_attr($this->get_field_id( 'instagram_widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
		  <input type="text" id="<?php echo esc_attr($this->get_field_id( 'instagram_widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_widget_title_color' )); ?>" class="widefat instagram_widget_title_color" value="<?php echo esc_attr($instance['instagram_widget_title_color']); ?>">
		</p>
		
		<script>
			jQuery(document).ready(function($){
				$('.instagram_widget_title_background_color').each(function(){
					$(this).wpColorPicker();
				});
			});
			</script>
		<p>
		  <label for="<?php echo esc_attr($this->get_field_id( 'instagram_widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
		  <input type="text" id="<?php echo esc_attr($this->get_field_id( 'instagram_widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_widget_title_background_color' )); ?>" class="widefat instagram_widget_title_background_color" value="<?php echo esc_attr($instance['instagram_widget_title_background_color']); ?>">
		</p>	 
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'margintop' ) ); ?>"><?php esc_html_e( 'Margin Top', 'pantograph' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'margintop' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'margintop' ) ); ?>" type="text" value="<?php echo esc_attr( $margintop ); ?>" /></label><?php esc_html_e( 'Example: 10px', 'pantograph' ); ?></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'marginbottom' ) ); ?>"><?php esc_html_e( 'Margin Bottom', 'pantograph' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'marginbottom' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'marginbottom' ) ); ?>" type="text" value="<?php echo esc_attr( $marginbottom ); ?>" /></label><?php esc_html_e( 'Example: 10px', 'pantograph' ); ?></p>
		<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">	
	
		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = isset($instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['username'] = isset($instance['username']) ? strip_tags( $new_instance['username'] ) : '';
		$instance['number'] = ! absint( $new_instance['number'] ) ? 9 : $new_instance['number'];
		$instance['size'] = isset($instance['size']) ? strip_tags( $new_instance['size'] ) : '';
		$instance['target'] = isset($instance['target']) ? strip_tags( $new_instance['target'] ) : '';
		$instance['link'] = isset($instance['link']) ? strip_tags( $new_instance['link'] ) : '';
		$instance['instagram_widget_title_color'] = isset($instance['instagram_widget_title_color']) ? strip_tags( $new_instance['instagram_widget_title_color'] ) : '';
		$instance['instagram_widget_title_background_color'] = isset($instance['instagram_widget_title_background_color']) ? strip_tags( $new_instance['instagram_widget_title_background_color'] ) : '';
		$instance['margintop'] = isset($instance['margintop']) ? strip_tags( $new_instance['margintop'] ) : '';
		$instance['marginbottom'] = isset($instance['marginbottom']) ? strip_tags( $new_instance['marginbottom'] ) : '';
		return $instance;
	}

	// based on https://gist.github.com/cosmocatalano/4544576.
	function pantograph_scrape_instagram( $username ) {

		$username = trim( strtolower( $username ) );

		if ( false === ( $instagram = get_transient( 'instagram-a7-' . sanitize_title_with_dashes( $username ) ) ) ) {

			switch ( substr( $username, 0, 1 ) ) {
				case '#':
					$url = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
					break;

				default:
					$url = 'https://instagram.com/' . str_replace( '@', '', $username );
					break;
			}

			$remote = wp_remote_get( $url );

			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'pantograph' ) );
			}

			if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'pantograph' ) );
			}

			$shards = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], true );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'pantograph' ) );
			}

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
			} else if ( isset( $insta_array['entry_data']['TagPage'][0]['tag']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['TagPage'][0]['tag']['media']['nodes'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'pantograph' ) );
			}

			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'pantograph' ) );
			}

			$instagram = array();

			foreach ( $images as $image ) {

				$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['thumbnail_src'] );
				$image['display_src'] = preg_replace( '/^https?\:/i', '', $image['display_src'] );

				// handle both types of CDN url.
				if ( ( strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
					$image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
					$image['small'] = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
				} else {
					$urlparts = wp_parse_url( $image['thumbnail_src'] );
					$pathparts = explode( '/', $urlparts['path'] );
					array_splice( $pathparts, 3, 0, array( 's160x160' ) );
					$image['thumbnail'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
					$pathparts[3] = 's320x320';
					$image['small'] = '//' . $urlparts['host'] . implode( '/', $pathparts );
				}

				$image['large'] = $image['thumbnail_src'];

				if ( true === $image['is_video'] ) {
					$type = 'video';
				} else {
					$type = 'image';
				}

				$caption = __( 'Instagram Image', 'pantograph' );
				if ( ! empty( $image['caption'] ) ) {
					$caption = $image['caption'];
				}

				$instagram[] = array(
					'description'   => $caption,
					'link'		  	=> trailingslashit( '//instagram.com/p/' . $image['code'] ),
					'time'		  	=> $image['date'],
					'comments'	  	=> $image['comments']['count'],
					'likes'		 	=> $image['likes']['count'],
					'thumbnail'	 	=> $image['thumbnail'],
					'small'			=> $image['small'],
					'large'			=> $image['large'],
					'original'		=> $image['display_src'],
					'type'		  	=> $type,
				);
			} // End foreach().

			// do not set an empty transient - should help catch private or empty accounts.
			if ( ! empty( $instagram ) ) {
				$instagram = base64_encode( serialize( $instagram ) );
				set_transient( 'instagram-a7-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'pantograph_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {

			return unserialize( base64_decode( $instagram ) );

		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'pantograph' ) );

		}
	}

	function pantograph_images_only( $media_item ) {

		if ( 'image' === $media_item['type'] ) {
			return true;
		}

		return false;
	}
}

/*************************
Start Social Followers Counter widget
*************************/

class pantograph_social extends WP_Widget {

	public function __construct() {
    global $control_ops;
    
    require_once('inc/TwitterAPIExchange.php'); 
		$widget_ops = array('classname' => 'pantograph_social', 'description' => __(' Add Twitter, Facebook, G+ and Feeds in Sidebar Widget By pantograph.com'), 'version' =>'1.0.0',);
		parent::__construct('pantograph_social', __('Pantograph Social Counter Widget'), $widget_ops, $control_ops);	
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
		$consumer_key = isset($instance['consumer_key']) ? $instance['consumer_key'] : '';
		$consumer_secret = isset($instance['consumer_secret']) ? $instance['consumer_secret'] : '';
		$access_token = isset($instance['access_token']) ? $instance['access_token'] : '';
		$access_token_secret = isset($instance['access_token_secret']) ? $instance['access_token_secret'] : '';
		$pinterest_username = isset($instance['pinterest_username']) ? $instance['pinterest_username'] : '';
		$instagram_api_key = isset($instance['instagram_api_key']) ? $instance['instagram_api_key'] : '';
		$instagram_user_id = isset($instance['instagram_user_id']) ? $instance['instagram_user_id'] : '';
		$youtube_channel_id = isset($instance['youtube_channel_id']) ? $instance['youtube_channel_id'] : '';
		$youtube_api_key = isset($instance['youtube_api_key']) ? $instance['youtube_api_key'] : '';
		$layout = isset($instance['layout']) ? $instance['layout'] : '';
		$socail_widget_title_color = isset($instance['socail_widget_title_color']) ? $instance['socail_widget_title_color'] : '';
		$socail_widget_title_background_color = isset($instance['socail_widget_title_background_color']) ? $instance['socail_widget_title_background_color'] : '';
        $current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
		$item_counter = 0;
		if ($twitter_id && $consumer_key && $consumer_secret && $access_token && $access_token_secret) $item_counter++;
		if ($rss_id) $item_counter++; 
		if ($gpluspage && $gpluspage_key) $item_counter++; 
		if ($pinterest_username) $item_counter++; 
		if ($instagram_api_key && $instagram_user_id) $item_counter++; 
		if ($youtube_channel_id && $youtube_api_key) $item_counter++; 
		if ($google_like) $item_counter++; 
		if ($facebook_like) $item_counter++; 
		if ($post_count) $item_counter++; 
		if ($comments_count) $item_counter++; 
		if ($facebook_page && $facebook_key && $facebook_secret) $item_counter++; 
		
    global $wp;
    $current_url = home_url(add_query_arg(array(),$wp->request));
		?>
		<style>
		<?php 
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		if(($socail_widget_title_color) || ($socail_widget_title_background_color)){
		$custom_css="";
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.socail$current_time h4{
					color: {$socail_widget_title_color}!important;
					border: 1px solid {$socail_widget_title_background_color}!important;
				}
				.socail$current_time h4 span.sh-text:before{
					background: {$socail_widget_title_background_color}!important;
				}
				.socail$current_time h4:before:before{
					background: {$socail_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.socail$current_time h4{
					color: {$socail_widget_title_color}!important;
					border-bottom: 4px solid  {$socail_widget_title_background_color}!important;
				}
				
				.sh-text a.rsswidget:hover {
					color: {$socail_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.socail$current_time h4{
					color: {$socail_widget_title_color}!important;
					background-color: {$socail_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.socail$current_time h4{
					color: {$socail_widget_title_color}!important;
					border-top: 4px solid {$socail_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.socail$current_time h4 span.sh-text{
					color: {$socail_widget_title_color}!important;
					background-color: {$socail_widget_title_background_color}!important;
				}
				.socail$current_time h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				.socail$current_time h4 span.sh-text{
					color: {$socail_widget_title_color}!important;
					background-color: {$socail_widget_title_background_color}!important;
				}
				.socail$current_time h4 {
					border-top: 3px solid {$socail_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.socail$current_time h4 span.sh-text{
					color: {$socail_widget_title_color}!important;
					background-color: {$socail_widget_title_background_color}!important;
				}
				.socail$current_time h4 span.sh-text:after {
					border-bottom: 31px solid {$socail_widget_title_background_color}!important;
				}
				.socail$current_time h4{
					border-bottom: 3px solid {$socail_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.socail$current_time .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.socail$current_time h4 span.sh-text {
					    background-color: {$socail_widget_title_background_color}!important;
						color: {$socail_widget_title_color}!important;
				}
				.socail$current_time h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.socail$current_time h4 span.sh-text{
					color: {$socail_widget_title_color}!important;
					background-color: {$socail_widget_title_background_color}!important;
				}
				.socail$current_time h4 span.sh-text:before {
					border-top-color: {$socail_widget_title_background_color}!important;
					border-top: 10px solid {$socail_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.socail$current_time h4 span.sh-text{
					color: {$socail_widget_title_color}!important;
					background-color: {$socail_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.socail$current_time h4 span.sh-text{
					 border-bottom: 2px solid {$socail_widget_title_background_color}!important;
					 color: {$socail_widget_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				.socail$current_time h4 span.sh-text {
					color: {$socail_widget_title_color}!important;
				}
				.socail$current_time h4:after {
					background: {$socail_widget_title_background_color}!important;
				}
				.socail$current_time h4:before {
					border-top-color: {$socail_widget_title_background_color}!important;
					border-top: 5px solid {$socail_widget_title_background_color}!important;
				}
				";
		}else{}
		
		print $custom_css;		
		}
		
		?>
		</style>
		<div class="side-widget socail<?php echo esc_attr($current_time); ?>">
		<?php if($title){ ?>
		<h4><span class="sh-text"><?php echo esc_attr($title); ?></span></h4>
		<?php } ?>
		<?php
		if($layout=='main'){
		if ( @fopen("http://google.com", "r") ){
		?>
		<div class="side-social">
			<?php if(!empty($facebook_page) && (!empty($facebook_key)) && (!empty($facebook_secret)) ): ?>
			<a href="<?php echo esc_url($facebook_page); ?>" target="_blank"><i class="fa fa-facebook"></i> <?php echo pantograph_social_facebook_like_counts( $facebook_page, $facebook_key, $facebook_secret ); ?> <span><?php esc_html_e('fans', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if(!empty($twitter_id) && (!empty($consumer_key)) && (!empty($consumer_secret)) && (!empty($access_token)) && (!empty($access_token_secret)) ): ?>
			<a href="<?php echo esc_url('https://twitter.com/'.$twitter_id); ?>" target="_blank"><i class="fa fa-twitter"></i> <?php echo pantograph_social_tweet_counts( $twitter_id, $consumer_key, $consumer_secret, $access_token, $access_token_secret ); ?> <span><?php esc_html_e('followers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if(!empty($gpluspage) && (!empty($gpluspage_key)) ): ?>
			<a href="<?php echo esc_url('https://plus.google.com/'.$gpluspage) ?>" target="_blank"><i class="fa fa-google-plus"></i> <?php echo pantograph_social_google_plus_counts($gpluspage, $gpluspage_key ); ?> <span><?php esc_html_e('followers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if( $pinterest_username ): ?>
			<a href="<?php echo esc_url('https://www.pinterest.com/'.$pinterest_username); ?>" target="_blank"><i class="fa fa-pinterest"></i> <?php echo pantograph_social_pinterest_followers_counts($pinterest_username); ?> <span><?php esc_html_e('followers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			
			<?php if(!empty($instagram_api_key) && (!empty($instagram_user_id)) ): ?>
			<a href="<?php echo esc_url('https://www.instagram.com/'.$instagram_user_id); ?>" target="_blank"><i class="fa fa-instagram"></i> <?php echo pantograph_social_instagram_followers_counts($instagram_api_key, $instagram_user_id); ?> <span><?php esc_html_e('followers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			
			<?php if(!empty($youtube_channel_id) && (!empty($youtube_api_key)) ): ?>
			<a href="<?php echo esc_url('https://www.youtube.com/channel/'.$youtube_channel_id); ?>" target="_blank"><i class="fa fa-youtube"></i> <?php echo pantograph_social_youtube_subscribers_counts($youtube_channel_id, $youtube_api_key); ?> <span><?php esc_html_e('subscribers', 'pantograph'); ?></span></a>
			<?php endif; ?>
			
			<?php if( $post_count ): ?> 
			<a href=""><i class="fa fa-pencil-square-o"></i> <?php echo wp_count_posts()->publish; ?> <span><?php esc_html_e('posts', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if( $comments_count ): ?>
			<a href=""><i class="fa fa-comments"></i> <?php echo wp_count_comments()->approved; ?> <span><?php esc_html_e('comments', 'pantograph'); ?></span></a>
			<?php endif; ?>
			<?php if( $rss_id ): ?>
			<a href="<?php echo esc_url($rss_id); ?>" target="_blank"><i class="fa fa-rss"></i> Rss <span><?php esc_html_e('Subscribe', 'pantograph'); ?></span></a>
			<?php endif; ?>
		</div>
		<?php 
		}else{
			echo esc_html("Sorry, you must need internet connection to perform this widget.", 'pantograph');
		}
		
		}elseif($layout=='solid'){
			if ( @fopen("http://google.com", "r") ){
		?>
		<ul class="solid-social-icons">
		   <?php if(!empty($facebook_page) && (!empty($facebook_key)) && (!empty($facebook_secret)) ): ?>
		   <li class="social-icons-item"> <a class="facebook-social-icon" href="<?php echo esc_url($facebook_page); ?>" target="_blank"> <span class="counter-icon fa fa-facebook"></span> <span class="followers"> <span class="followers-num"><?php echo pantograph_social_facebook_like_counts( $facebook_page, $facebook_key, $facebook_secret ); ?></span> <span class="followers-name"><?php esc_html_e('Fans', 'pantograph'); ?></span> </span> </a> </li>
			<?php endif; ?>
			
		   <?php if(!empty($twitter_id) && (!empty($consumer_key)) && (!empty($consumer_secret)) && (!empty($access_token)) && (!empty($access_token_secret)) ): ?>
		   <li class="social-icons-item"> <a class="twitter-social-icon" href="" target="_blank"> <span class="counter-icon fa fa-twitter"></span> <span class="followers"> <span class="followers-num"><?php echo pantograph_social_tweet_counts( $twitter_id, $consumer_key, $consumer_secret, $access_token, $access_token_secret ); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($gpluspage) && (!empty($gpluspage_key)) ): ?>
		   <li class="social-icons-item"> <a class="google-social-icon" href="<?php echo esc_url('https://plus.google.com/'.$gpluspage); ?>" target="_blank"> <span class="counter-icon fa fa-google-plus"></span> <span class="followers"> <span class="followers-num"><?php echo pantograph_social_google_plus_counts($gpluspage, $gpluspage_key ); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($youtube_channel_id) && (!empty($youtube_api_key)) ): ?>
		   <li class="social-icons-item"> <a class="youtube-social-icon" href="<?php echo esc_url('https://www.youtube.com/channel/'.$youtube_channel_id); ?>" target="_blank"> <span class="counter-icon fa fa-youtube"></span> <span class="followers"> <span class="followers-num"><?php echo pantograph_social_youtube_subscribers_counts($youtube_channel_id, $youtube_api_key); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   
		   <?php if(!empty($instagram_api_key) && (!empty($instagram_user_id)) ): ?>
		   <li class="social-icons-item"> <a class="instagram-social-icon" href="" target="_blank"> <span class="counter-icon fa fa-instagram"></span> <span class="followers"> <span class="followers-num"><?php echo pantograph_social_instagram_followers_counts($instagram_api_key, $instagram_user_id); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		   <?php if( $pinterest_username ): ?>
			<li class="social-icons-item"> <a class="pinterest-social-icon" href="<?php echo esc_url('https://www.pinterest.com/'.$pinterest_username); ?>" target="_blank"> <span class="counter-icon fa fa-pinterest"></span> <span class="followers"> <span class="followers-num"><?php echo pantograph_social_pinterest_followers_counts($pinterest_username); ?></span> <span class="followers-name"><?php esc_html_e('Followers', 'pantograph'); ?></span> </span> </a> </li>
			<?php endif; ?>
		   <?php if( $post_count ): ?> 
			<li class="social-icons-item"> <a class="posts-social-icon" href="#"> <span class="counter-icon fa fa-pencil"></span> <span class="followers"> <span class="followers-num"><?php echo wp_count_posts()->publish; ?></span> <span class="followers-name"><?php esc_html_e('Posts', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
			<?php if( $comments_count ): ?>
			<li class="social-icons-item"> <a class="comments-social-icon" href="#"> <span class="counter-icon fa fa-comments"></span> <span class="followers"> <span class="followers-num"><?php echo wp_count_comments()->approved; ?></span> <span class="followers-name"><?php esc_html_e('Comments', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
			<?php if( $rss_id ): ?>
			<li class="social-icons-item"> <a class="rss-social-icon" href="<?php echo esc_url($rss_id); ?>" target="_blank"> <span class="counter-icon fa fa-rss"></span> <span class="followers"> <span class="followers-num"><?php esc_html_e('RSS', 'pantograph'); ?></span> <span class="followers-name"><?php esc_html_e('Link', 'pantograph'); ?></span> </span> </a> </li>
		   <?php endif; ?>
		</ul>
		<?php
		}}else{			
		if ( @fopen("http://google.com", "r") ){
		?>
		<div class="pantograph-social-widget layout-<?php echo esc_attr($layout); ?>">
			<ul>
				<?php if( $gpluspage && $gpluspage_key ): ?>
				<li class="google-fans item-<?php echo esc_attr($item_counter); ?>">
					<a href="<?php echo esc_url('https://plus.google.com/'.$gpluspage) ?>" target="_blank">					
						<span><?php echo pantograph_social_google_plus_counts($gpluspage, $gpluspage_key ); ?></span>
						<small><?php _e('Followers' , 'pantograph-social' ) ?></small>
				  </a>
				</li>
				<?php endif; ?>
				<?php if( $facebook_page && $facebook_key && $facebook_secret ): ?>
					<li class="facebook-fans item-<?php echo esc_attr($item_counter); ?>">
						<a href="<?php echo esc_url($facebook_page) ?>" target="_blank">					
							<span><?php echo pantograph_social_facebook_like_counts( $facebook_page, $facebook_key, $facebook_secret ); ?></span>
							<small><?php _e('Fans' , 'pantograph-social' ) ?></small>
						</a>
					</li>
				<?php endif; ?>
				<?php if( $twitter_id && $consumer_key && $consumer_secret && $access_token && $access_token_secret ): ?>
					<li class="twitter-followers item-<?php echo esc_attr($item_counter); ?>">
						<a href="<?php echo esc_url('https://twitter.com/'.$twitter_id) ?>" target="_blank">
							<span><?php echo pantograph_social_tweet_counts( $twitter_id, $consumer_key, $consumer_secret, $access_token, $access_token_secret ); ?></span>
							<small><?php _e('Followers' , 'pantograph-social' ) ?></small>
						</a>
					</li>
				<?php endif; ?>
			
				<?php if( $pinterest_username ): ?> 
				    <li class="pinterest-followers item-<?php echo esc_attr($item_counter); ?>">
						<a href="<?php echo esc_url('https://www.pinterest.com/'.$pinterest_username) ?>" target="_blank">
							<span><?php echo pantograph_social_pinterest_followers_counts($pinterest_username); ?></span>
							<small><?php _e('Followers' , 'pantograph-social' ) ?></small>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if($instagram_api_key && $instagram_user_id ): ?>
					<li class="instagram-followers item-<?php echo esc_attr($item_counter); ?>">
						<a href="<?php echo esc_url('https://www.instagram.com/'.$instagram_user_id); ?>" target="_blank">
							<span><?php echo pantograph_social_instagram_followers_counts($instagram_api_key, $instagram_user_id); ?></span>
							<small><?php _e('Followers' , 'pantograph-social' ); ?></small>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if($youtube_channel_id && $youtube_api_key ): ?>
					<li class="youtube-followers">
						<a href="<?php echo esc_url('https://www.instagram.com/'.$youtube_channel_id); ?>" target="_blank">
						<span><?php echo pantograph_social_youtube_subscribers_counts($youtube_channel_id, $youtube_api_key); ?> </span>
						<span><?php esc_html_e('subscribers', 'pantograph'); ?></span>
						</a>
					</li>
				<?php endif; ?>
				
				<?php if( $rss_id ): ?>
				<li class="rss-subscribers item-<?php echo esc_attr($item_counter); ?>">
					<a href="<?php echo esc_url($rss_id) ?>" target="_blank">
						<span><?php _e('RSS' , 'pantograph-social' ) ?><?php __('Subscribers' , 'pantograph-social' ) ?></span>
						<small><?php _e('Subscribe' , 'pantograph-social' ) ?></small>
					</a>
				</li>
				<?php endif; ?>
				
				<?php if( $google_like ): ?> 
				  <li class="google-likes item-<?php echo esc_attr($item_counter); ?>">
					 <div class="g-plusone" data-size="tall"></div> 
				  </li>
				<?php endif; ?>
				
				<?php if( $facebook_like ): ?>	  
				  <li class="facebook-likes item-<?php echo esc_attr($item_counter); ?>">
					<div class="fb-like" data-href="'.$current_url.'" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
				  </li>
				<?php endif; ?>
				<?php if( $post_count ): ?>  
				  <li class="post-count item-<?php echo esc_attr($item_counter); ?>">
					<a href="#">
						<span><?php echo wp_count_posts()->publish; ?></span>
						<small><?php _e('Posts' , 'pantograph-social' ) ?></small>
					</a>
				  </li>
				<?php endif; ?>
				<?php if( $comments_count ): ?>	
					<li class="comments-count item-<?php echo esc_attr($item_counter); ?>">
						<a href="#">
							<span><?php echo wp_count_comments()->approved; ?></span>
							<small><?php _e('Comments' , 'pantograph-social' ) ?></small>
						</a>
					</li>
				<?php endif; ?>	
		  </ul>
	</div>
	</div>
	
		
		<?php 
		}else{
			echo esc_html("Sorry, you must need internet connection to perform this widget.", 'pantograph'); 
		}
		} 

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
		$instance['consumer_key'] = isset($instance['consumer_key']) ? strip_tags( $new_instance['consumer_key'] ) : '';
		$instance['consumer_secret'] = isset($instance['consumer_secret']) ? strip_tags( $new_instance['consumer_secret'] ) : '';
		$instance['access_token'] = isset($instance['access_token']) ? strip_tags( $new_instance['access_token'] ) : '';
		$instance['access_token_secret'] = isset($instance['access_token_secret']) ? strip_tags( $new_instance['access_token_secret'] ) : '';
		$instance['pinterest_username'] = isset($instance['pinterest_username']) ? strip_tags( $new_instance['pinterest_username'] ) : '';
		$instance['instagram_api_key'] = isset($instance['instagram_api_key']) ? strip_tags( $new_instance['instagram_api_key'] ) : '';
		$instance['instagram_user_id'] = isset($instance['instagram_user_id']) ? strip_tags( $new_instance['instagram_user_id'] ) : '';
		$instance['youtube_channel_id'] = isset($instance['youtube_channel_id']) ? strip_tags( $new_instance['youtube_channel_id'] ) : '';
		$instance['youtube_api_key'] = isset($instance['youtube_api_key']) ? strip_tags( $new_instance['youtube_api_key'] ) : '';
		$instance['google_like'] = isset($new_instance['google_like']) ? 1 : 0 ;
		$instance['facebook_like'] = isset($new_instance['facebook_like']) ? 1 : 0 ;
		$instance['post_count'] = isset($new_instance['post_count']) ? 1 : 0 ;
		$instance['comments_count'] = isset($new_instance['comments_count']) ? 1 : 0 ;
		$instance['layout'] = isset($instance['layout']) ? strip_tags( $new_instance['layout'] ) : '';
		$instance['socail_widget_title_color'] = isset($instance['socail_widget_title_color']) ? strip_tags( $new_instance['socail_widget_title_color'] ) : '';
		$instance['socail_widget_title_background_color'] = isset($instance['socail_widget_title_background_color']) ? strip_tags( $new_instance['socail_widget_title_background_color'] ) : '';
		$instance['current_time'] = isset($instance['current_time']) ? $new_instance['current_time'] : '';
	
		return $instance;
	}

	function form( $instance ) { 
	$instance = wp_parse_args( (array) $instance, array( 
    'gpluspage_key' =>	'', 
    'facebook_key' =>	'', 
    'facebook_secret' =>	'', 
    'title' =>	'',
    'consumer_key' => '', 
    'consumer_secret' => '', 
    'access_token' => '', 
    'access_token_secret' => '', 
    'rss' => '', 
    'facebook' => '', 
    'twitter' => '', 
    'gpluspage' => '',
    'pinterest_username' => '',
    'instagram_api_key' => '',
    'instagram_user_id' => '',
    'youtube_channel_id' => '',
    'youtube_api_key' => '',
    'google_like'=> 1,
    'facebook_like'=> 1,
    'post_count'=> 0,
    'comments_count'=> 0,
    'layout'=> 'main',
	'socail_widget_title_color'     => '#33CCFF',
	'socail_widget_title_background_color'     => '#33CCFF',
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
		$consumer_key = isset($instance['consumer_key']) ? htmlspecialchars($instance['consumer_key']) : '';
		$consumer_secret = isset($instance['consumer_secret']) ? htmlspecialchars($instance['consumer_secret']) : '';
		$access_token = isset($instance['access_token']) ? htmlspecialchars($instance['access_token']) : '';
		$access_token_secret = isset($instance['access_token_secret']) ? htmlspecialchars($instance['access_token_secret']) : '';
		$pinterest_username = isset($instance['pinterest_username']) ? htmlspecialchars($instance['pinterest_username']) : '';
		$instagram_api_key = isset($instance['instagram_api_key']) ? htmlspecialchars($instance['instagram_api_key']) : '';
		$instagram_user_id = isset($instance['instagram_user_id']) ? htmlspecialchars($instance['instagram_user_id']) : '';
		$youtube_channel_id = isset($instance['youtube_channel_id']) ? htmlspecialchars($instance['youtube_channel_id']) : '';
		$youtube_api_key = isset($instance['youtube_api_key']) ? htmlspecialchars($instance['youtube_api_key']) : '';
		$layout = isset($instance['layout']) ? htmlspecialchars($instance['layout']) : '';
		$socail_widget_title_color = isset($instance['socail_widget_title_color']) ? htmlspecialchars($instance['socail_widget_title_color']) : '';
		$socail_widget_title_background_color = isset($instance['socail_widget_title_background_color']) ? htmlspecialchars($instance['socail_widget_title_background_color']) : '';
		$current_time = isset($instance['current_time']) ? $instance['current_time'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" type="text" />
		</p>
		
		<h3><?php _e('Facebook' , 'pantograph-social' ) ?></h3><hr />
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php _e('Facebook Page URL' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" value="<?php echo esc_attr($instance['facebook']); ?>" class="widefat" type="text" />
			<small><?php _e('Link must be like https://www.facebook.com/username/ or https://www.facebook.com/PageID/' , 'pantograph-social' ) ?></small>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook_key' )); ?>"><?php _e('Facebook App ID' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'facebook_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_key' )); ?>" value="<?php echo esc_attr($instance['facebook_key']); ?>" class="widefat" type="text" />
		   <small><?php printf( __( 'Create an app on Facebook through this link %1$s.', 'pantograph-social' ), '<a href="'.esc_url("https://developers.facebook.com/apps").'" target="_blank">(Facebook apps)</a>' ); ?></small>
    </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook_secret' )); ?>"><?php _e('Facebook App Secret' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'facebook_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_secret' )); ?>" value="<?php echo esc_attr($instance['facebook_secret']); ?>" class="widefat" type="text" />
		  <small><?php printf( __( 'Create an app on Facebook through this link %1$s.', 'pantograph-social' ), '<a href="'.esc_url("https://developers.facebook.com/apps").'" target="_blank">(Facebook apps)</a>' ); ?></small>
    </p>
    <h3><?php _e('Twitter' , 'pantograph-social' ) ?></h3><hr />
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php _e('Twitter Username' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" value="<?php echo esc_attr($instance['twitter']); ?>" class="widefat" type="text" />
		  <small><?php _e('Please enter the Twitter username. For example: pantograph' , 'pantograph-social' ) ?></small>
    </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'consumer_key' )); ?>"><?php _e('Twitter Consumer Key' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'consumer_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'consumer_key' )); ?>" value="<?php echo esc_attr($instance['consumer_key']); ?>" class="widefat" type="text" />
		  <small><?php printf( __( 'Create an app on Twitter through this link %1$s.', 'pantograph-social' ), '<a href="'.esc_url("https://dev.twitter.com/apps").'" target="_blank">(Twitter apps)</a>' ); ?></small>
    </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'consumer_secret' )); ?>"><?php _e('Twitter Consumer Secret' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'consumer_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'consumer_secret' )); ?>" value="<?php echo esc_attr($instance['consumer_secret']); ?>" class="widefat" type="text" />
		  <small><?php printf( __( 'Create an app on Twitter through this link %1$s.', 'pantograph-social' ), '<a href="'.esc_url("https://dev.twitter.com/apps").'" target="_blank">(Twitter apps)</a>' ); ?></small>
    </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'access_token' )); ?>"><?php _e('Twitter Access Token' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'access_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'access_token' )); ?>" value="<?php echo esc_attr($instance['access_token']); ?>" class="widefat" type="text" />
		  <small><?php printf( __( 'Create an app on Twitter through this link %1$s.', 'pantograph-social' ), '<a href="'.esc_url("https://dev.twitter.com/apps").'" target="_blank">(Twitter apps)</a>' ); ?></small>
    </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'access_token_secret' )); ?>"><?php _e('Twitter Access Token Secret' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'access_token_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'access_token_secret' )); ?>" value="<?php echo esc_attr($instance['access_token_secret']); ?>" class="widefat" type="text" />
		  <small><?php printf( __( 'Create an app on Twitter through this link %1$s.', 'pantograph-social' ), '<a href="'.esc_url("https://dev.twitter.com/apps").'" target="_blank">(Twitter apps)</a>' ); ?></small>
    </p>
    <h3><?php _e('Google Plus' , 'pantograph-social' ) ?></h3><hr />
    <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'gpluspage' )); ?>"><?php _e('Google Plus Page ID' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'gpluspage' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'gpluspage' )); ?>" value="<?php echo esc_attr($instance['gpluspage']); ?>" class="widefat" type="text" />
		  <small><?php _e('Please enter the Google page name. For example: +Pantograph' , 'pantograph-social' ) ?></small>
    </p>
    <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'gpluspage_key' )); ?>"><?php _e('Google Plus API Key' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'gpluspage_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'gpluspage_key' )); ?>" value="<?php echo esc_attr($instance['gpluspage_key']); ?>" class="widefat" type="text" />
		  <small><?php printf( __( 'Create a project on Google through this link %1$s.', 'pantograph-social' ), '<a href="'.esc_url("https://developers.google.com/maps/documentation/javascript/get-api-key").'" target="_blank">(Google dev)</a>' ); ?></small>
    </p>
	<h3><?php _e('Pinterest' , 'pantograph-social' ) ?></h3><hr />
	<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'pinterest_username' )); ?>"><?php _e('Pinterest Username' , 'pantograph-social' ) ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'pinterest_username' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest_username' )); ?>" value="<?php echo esc_attr($instance['pinterest_username']); ?>" class="widefat" type="text" />
    </p>
	
	<h3><?php _e('RSS' , 'pantograph-social' ) ?></h3><hr />
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>"><?php _e('RSS Feed URL' , 'pantograph-social' ) ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'rss' )); ?>" value="<?php echo esc_attr($instance['rss']); ?>" class="widefat" type="text" />
	</p>
	
	<h3><?php _e('Instagram' , 'pantograph-social' ) ?></h3><hr />
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'instagram_user_id' )); ?>"><?php _e('Instagram Username' , 'pantograph-social' ) ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'instagram_user_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_user_id' )); ?>" value="<?php echo esc_attr($instance['instagram_user_id']); ?>" class="widefat" type="text" />
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'instagram_api_key' )); ?>"><?php _e('Instagram API key' , 'pantograph-social' ) ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'instagram_api_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_api_key' )); ?>" value="<?php echo esc_attr($instance['instagram_api_key']); ?>" class="widefat" type="text" />
	</p>
	
	<h3><?php _e('Youtube' , 'pantograph-social' ) ?></h3><hr />
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'youtube_channel_id' )); ?>"><?php _e('Youtube Channel ID' , 'pantograph-social' ) ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'youtube_channel_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_channel_id' )); ?>" value="<?php echo esc_attr($instance['youtube_channel_id']); ?>" class="widefat" type="text" />
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'youtube_api_key' )); ?>"><?php _e('Youtube API key' , 'pantograph-social' ) ?></label>
		<input id="<?php echo esc_attr($this->get_field_id( 'youtube_api_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_api_key' )); ?>" value="<?php echo esc_attr($instance['youtube_api_key']); ?>" class="widefat" type="text" />
	</p>
		
    <h3><?php _e('Others' , 'pantograph-social' ) ?></h3><hr />
		<input type="hidden" id="<?php echo esc_attr($this->get_field_id('google_like')); ?>" name="<?php echo esc_attr($this->get_field_name('google_like')); ?>" value="1" />			
		<input type="hidden" id="<?php echo esc_attr($this->get_field_id('facebook_like')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook_like')); ?>" value="1" />			
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('post_count')); ?>"><?php _e('Posts Count' , 'pantograph-social' ) ?></label>
			<input type="checkbox" <?php checked( $instance['post_count'], 1 ); ?> id="<?php echo esc_attr($this->get_field_id('post_count')); ?>" name="<?php echo esc_attr($this->get_field_name('post_count')); ?>" value="<?php echo esc_attr($instance['post_count']); ?>" />			
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('comments_count')); ?>"><?php _e('Comments Count' , 'pantograph-social' ) ?></label>
			<input type="checkbox" <?php checked( $instance['comments_count'], 1 ); ?> id="<?php echo esc_attr($this->get_field_id('comments_count')); ?>" name="<?php echo esc_attr($this->get_field_name('comments_count')); ?>" value="<?php echo esc_attr($instance['comments_count']); ?>" />			
		</p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('layout')); ?>"><?php _e( 'Layout', 'pantograph-social' );?></label> 
        <select class='widefat' id="<?php echo esc_attr($this->get_field_id('layout')); ?>" name="<?php echo esc_attr($this->get_field_name('layout')); ?>" type="text">
          <option value='main'<?php echo ($layout=='main')?'selected':''; ?>><?php _e( 'Main', 'pantograph-social' );?></option>
          <option value='solid'<?php echo ($layout=='solid')?'selected':''; ?>><?php _e( 'Solid Social Icon', 'pantograph-social' );?></option>
          <option value='clear'<?php echo ($layout=='clear')?'selected':''; ?>><?php _e( 'Clear', 'pantograph-social' );?></option>
          <option value='bordered'<?php echo ($layout=='bordered')?'selected':''; ?>><?php _e( 'Bordered', 'pantograph-social' );?></option> 
          <option value='bordered-shadow'<?php echo ($layout=='bordered-shadow')?'selected':''; ?>><?php _e( 'Bordered with shadow', 'pantograph-social' );?></option>
          <option value='bordered-rounded'<?php echo ($layout=='bordered-rounded')?'selected':''; ?>><?php _e( 'Rounded (bordered)', 'pantograph-social' );?></option>
          <option value='bordered-rounded-shadow'<?php echo ($layout=='bordered-rounded-shadow')?'selected':''; ?>><?php _e( 'Rounded (bordered) with shadow', 'pantograph-social' );?></option> 
        </select>                
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.socail_widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'socail_widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'socail_widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'socail_widget_title_color' )); ?>" class="widefat socail_widget_title_color" value="<?php echo esc_attr($instance['socail_widget_title_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.socail_widget_title_background_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'socail_widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'socail_widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'socail_widget_title_background_color' )); ?>" class="widefat socail_widget_title_background_color" value="<?php echo esc_attr($instance['socail_widget_title_background_color']); ?>">
    </p>

	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">	
	
			<?php
	}		
}
function pantograph_social() {
		register_widget('pantograph_social');
	}	
add_action('widgets_init', 'pantograph_social');

function pantograph_social_facebook_like_counts($facebook_page, $facebook_key, $facebook_secret ){		
		//Construct a Facebook URL
			$str = $facebook_page;
			$blah = parse_url($str);
			$facebook_page_name_only = $blah['path']; //Get the facebook page name only without https://facebook.com

		  /*Using curl*/
		  $ch=curl_init();
			
			$url = 'http://www.texashillcountry.com';

			$apiUrl = 'https://graph.facebook.com'.$facebook_page_name_only.'?access_token='.$facebook_key.'|'.$facebook_secret.'&fields=fan_count';
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

		  //return print_r($data);
		  return $data['fan_count'];

}

function pantograph_social_google_plus_counts($gpluspage, $gpluspage_key) {
    if($gpluspage && $gpluspage_key) { 
  		$gUrl = "https://www.googleapis.com/plus/v1/people/".$gpluspage."?key=".$gpluspage_key;            
      $count = 0; 
      $response = file_get_contents($gUrl);           
      $fb = json_decode($response);
      if ( isset( $fb->circledByCount)) {              
          $count = intval($fb->circledByCount);                    
      }                   
      return $count ;   
    }
}
	
function pantograph_social_tweet_counts($twitter_id, $consumer_key, $consumer_secret, $access_token, $access_token_secret ){
		$social_counter_settings = array(      
            'twitter_user' => $twitter_id,
            'consumer_key' => $consumer_key,
            'consumer_secret' => $consumer_secret,
            'oauth_access_token' => $access_token,
            'oauth_access_token_secret' => $access_token_secret,
        );
		$count = 0;
		$settings = $social_counter_settings;
		$apiUrl = "https://api.twitter.com/1.1/users/show.json";
        $requestMethod = 'GET';
        $getField = '?screen_name=' .  $settings['twitter_user']; 
        $twitter = new TwitterAPIExchange($settings);
        $response = $twitter->setGetfield($getField)->buildOauth($apiUrl, $requestMethod)->performRequest(); 
        $followers = json_decode($response);
        $count = $followers->followers_count;
		if($count){
			return $count ;
		}else{
			return 0;
		}
}

function pantograph_social_pinterest_followers_counts($pinterest_username){		
		//Construct a Pinterest URL
		 $metas = get_meta_tags('http://pinterest.com/'.esc_attr($pinterest_username).'/');
		  if($metas['pinterestapp:followers']){
			return $metas['pinterestapp:followers'];
		  }else{
			return 0;
		  }

}
function pantograph_social_instagram_followers_counts($api_key, $user_id){		
		//Construct a Instagram URL
		if($api_key && $user_id) { 
		 $data = @file_get_contents("https://api.instagram.com/v1/users/$user_id/?client_id=$api_key");
		 $data = json_decode($data, true);
		  if($data['data']['counts']['followed_by']){
			return $data['data']['counts']['followed_by'];
		  }else{
			return 0;
		  }
		}

}
function pantograph_social_youtube_subscribers_counts($channel_id, $api_key){		
		//Construct a Youtube URL
		if($channel_id && $api_key) { 
		$api_response = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channel_id.'&fields=items/statistics/subscriberCount&key='.$api_key);
		$api_response_decoded = json_decode($api_response, true);
		  if($api_response_decoded['items'][0]['statistics']['subscriberCount']){
			return $api_response_decoded['items'][0]['statistics']['subscriberCount'];
		  }else{
			return 0;
		  }
		}

}

function pantograph_social_social_js() { 
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
add_action('wp_head', 'pantograph_social_social_js');

class Pantograph_Twitter_Tweets_Widget extends WP_Widget {

function __construct() {
    parent::__construct(
        'twitter-tweets-widget',
        __( 'Pantograph Twitter Tweets', 'pantograph_twitter_tweets_widget' ),
        array(
            'description' => __( 'Displays latest tweets from Twitter.', 'pantograph_twitter_tweets_widget' )
        )
    );
}

public function form( $instance ) {
 
    if ( empty( $instance ) ) {
		$title = '';
        $twitter_username = '';
        $update_count = '';
        $oauth_access_token = '';
        $oauth_access_token_secret = '';
        $consumer_key = '';
        $consumer_secret = '';
        $twitterposts_widget_title_color = '';
        $twitterposts_widget_title_background_color = '';
        $current_time = time();
    } else {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $twitter_username = isset($instance['twitter_username']) ? $instance['twitter_username'] : '';
        $update_count = isset( $instance['update_count'] ) ? $instance['update_count'] : 5;
        $oauth_access_token = isset($instance['oauth_access_token']) ? $instance['oauth_access_token'] : '';
        $oauth_access_token_secret = isset($instance['oauth_access_token_secret']) ? $instance['oauth_access_token_secret'] : '';
        $consumer_key = isset($instance['consumer_key']) ? $instance['consumer_key'] : '';
        $consumer_secret = isset($instance['consumer_secret']) ? $instance['consumer_secret'] : '';
        $twitterposts_widget_title_color = isset($instance['twitterposts_widget_title_color']) ? $instance['twitterposts_widget_title_color'] : '';
        $twitterposts_widget_title_background_color = isset($instance['twitterposts_widget_title_background_color']) ? $instance['twitterposts_widget_title_background_color'] : '';
        $current_time = time();
    }
     
    ?>
	
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">
            <?php echo __( 'Title', 'pantograph_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>">
            <?php echo __( 'Twitter Username (without @)', 'pantograph_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" type="text" value="<?php echo esc_attr( $twitter_username ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'update_count' ); ?>">
            <?php echo __( 'Number of Tweets to Display', 'pantograph_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'update_count' ); ?>" name="<?php echo $this->get_field_name( 'update_count' ); ?>" type="number" value="<?php echo esc_attr( $update_count ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'oauth_access_token' ); ?>">
            <?php echo __( 'OAuth Access Token', 'pantograph_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'oauth_access_token' ); ?>" name="<?php echo $this->get_field_name( 'oauth_access_token' ); ?>" type="text" value="<?php echo esc_attr( $oauth_access_token ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'oauth_access_token_secret' ); ?>">
            <?php echo __( 'OAuth Access Token Secret', 'pantograph_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'oauth_access_token_secret' ); ?>" name="<?php echo $this->get_field_name( 'oauth_access_token_secret' ); ?>" type="text" value="<?php echo esc_attr( $oauth_access_token_secret ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'consumer_key' ); ?>">
            <?php echo __( 'Consumer Key', 'pantograph_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'consumer_key' ); ?>" type="text" value="<?php echo esc_attr( $consumer_key ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'consumer_secret' ); ?>">
            <?php echo __( 'Consumer Secret', 'pantograph_twitter_tweets_widget' ) . ':'; ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'consumer_secret' ); ?>" type="text" value="<?php echo esc_attr( $consumer_secret ); ?>" />
    </p>
	<script>
		jQuery(document).ready(function($){
			$('.twitterposts_widget_title_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'twitterposts_widget_title_color ' )); ?>"><?php esc_html_e('Title Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'twitterposts_widget_title_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitterposts_widget_title_color' )); ?>" class="widefat twitterposts_widget_title_color" value="<?php echo esc_attr($instance['twitterposts_widget_title_color']); ?>">
    </p>
	
	<script>
		jQuery(document).ready(function($){
			$('.twitterposts_widget_title_background_color').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
	<p>
      <label for="<?php echo esc_attr($this->get_field_id( 'twitterposts_widget_title_background_color ' )); ?>"><?php esc_html_e('Title Background Color', 'pantograph'); ?></label><br/>
      <input type="text" id="<?php echo esc_attr($this->get_field_id( 'twitterposts_widget_title_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitterposts_widget_title_background_color' )); ?>" class="widefat twitterposts_widget_title_background_color" value="<?php echo esc_attr($instance['twitterposts_widget_title_background_color']); ?>">
    </p>
	<input type="hidden" id="<?php echo esc_attr($this->get_field_id( 'current_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'current_time' )); ?>" class="widefat" value="<?php echo time(); ?>">	
		
    <?php
     
}

public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = isset($new_instance['title']) ? strip_tags( $new_instance['title'] ) : ''; 
    $instance['twitter_username'] = isset($new_instance['twitter_username']) ? strip_tags( $new_instance['twitter_username'] ) : ''; 
    $instance['update_count'] = isset($new_instance['update_count']) ? strip_tags( $new_instance['update_count'] ) : ''; 
    $instance['oauth_access_token'] = isset($new_instance['oauth_access_token']) ? strip_tags( $new_instance['oauth_access_token'] ) : ''; 
    $instance['oauth_access_token_secret'] = isset($new_instance['oauth_access_token_secret']) ? strip_tags( $new_instance['oauth_access_token_secret'] ) : ''; 
    $instance['consumer_key'] = isset($new_instance['consumer_key']) ? strip_tags( $new_instance['consumer_key'] ) : ''; 
    $instance['consumer_secret'] = isset($new_instance['consumer_secret']) ? strip_tags( $new_instance['consumer_secret'] ) : ''; 
    $instance['twitterposts_widget_title_color'] = isset($new_instance['twitterposts_widget_title_color']) ? strip_tags( $new_instance['twitterposts_widget_title_color'] ) : ''; 
    $instance['twitterposts_widget_title_background_color'] = isset($new_instance['twitterposts_widget_title_background_color']) ? strip_tags( $new_instance['twitterposts_widget_title_background_color'] ) : ''; 
    $instance['current_time'] = isset($new_instance['current_time']) ? $new_instance['current_time'] : '';
 
    return $instance;
}

public function pantograph_twitter_timeline( $username, $limit, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret) {
 
    /** Set access tokens here - see: https://dev.twitter.com/apps/ */
    $settings = array(
        'oauth_access_token'        => $oauth_access_token,
        'oauth_access_token_secret' => $oauth_access_token_secret,
        'consumer_key'              => $consumer_key,
        'consumer_secret'           => $consumer_secret
    );
 
    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = '?screen_name=' . $username . '&count=' . $limit;
    $request_method = 'GET';
     
    $twitter_instance = new TwitterAPIExchange( $settings );
     
    $query = $twitter_instance
        ->setGetfield( $getfield )
        ->buildOauth( $url, $request_method )
        ->performRequest();
     
    $timeline = json_decode($query);
 
    return $timeline;
}

public function pantograph_tweet_time( $time ) {
    // Get current timestamp.
    $now = strtotime( 'now' );
 
    // Get timestamp when tweet created.
    $created = strtotime( $time );
	$postdate = date('d-M-Y', $created);
    return $postdate;
}

public function widget( $args, $instance ) {
    $title                  = isset($instance['title']) ? $instance['title'] : '';
    $username                  = isset($instance['twitter_username']) ? $instance['twitter_username'] : '';
    $limit                     = isset($instance['update_count']) ? $instance['update_count'] : '';
    $oauth_access_token        = isset($instance['oauth_access_token']) ? $instance['oauth_access_token'] : '';
    $oauth_access_token_secret = isset($instance['oauth_access_token_secret']) ? $instance['oauth_access_token_secret'] : '';
    $consumer_key              = isset($instance['consumer_key']) ? $instance['consumer_key'] : '';
    $consumer_secret           = isset($instance['consumer_secret']) ? $instance['consumer_secret'] : '';
    $twitterposts_widget_title_color           = isset($instance['twitterposts_widget_title_color']) ? $instance['twitterposts_widget_title_color'] : '';
    $twitterposts_widget_title_background_color           = isset($instance['twitterposts_widget_title_background_color']) ? $instance['twitterposts_widget_title_background_color'] : '';
    $current_time           = isset($instance['current_time']) ? $instance['current_time'] : '';

?>
<style>
		<?php 
		$sidebar_background_color = pantograph_get_option('sidebar_background_color');
		if(($twitterposts_widget_title_color) || ($twitterposts_widget_title_background_color)){
		$custom_css="";
		if((pantograph_get_option('pantograph_title_style') == 1)) { 
		$custom_css .= "
				.twitterposts$current_time h4{
					color: {$twitterposts_widget_title_color}!important;
					border: 1px solid {$twitterposts_widget_title_background_color}!important;
				}
				.twitterposts$current_time h4 span.sh-text:before{
					background: {$twitterposts_widget_title_background_color}!important;
				}
				.twitterposts$current_time h4:before:before{
					background: {$twitterposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 2)) { 
		$custom_css .= "
				.twitterposts$current_time h4{
					color: {$twitterposts_widget_title_color}!important;
					border-bottom: 4px solid  {$twitterposts_widget_title_background_color}!important;
				}
				
				.sh-text a.rsswidget:hover {
					color: {$twitterposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 3)) { 
		$custom_css .= "
				.twitterposts$current_time h4{
					color: {$twitterposts_widget_title_color}!important;
					background-color: {$twitterposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 4)) { 
		$custom_css .= "
				.twitterposts$current_time h4{
					color: {$twitterposts_widget_title_color}!important;
					border-top: 4px solid {$twitterposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 5)) { 
		$custom_css .= "
				.twitterposts$current_time h4 span.sh-text{
					color: {$twitterposts_widget_title_color}!important;
					background-color: {$twitterposts_widget_title_background_color}!important;
				}
				.twitterposts$current_time h4 span.sh-text:after {
					background: {$sidebar_background_color};
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 6)) {
		$custom_css .= "
				.twitterposts$current_time h4 span.sh-text{
					color: {$twitterposts_widget_title_color}!important;
					background-color: {$twitterposts_widget_title_background_color}!important;
				}
				.twitterposts$current_time h4, .sidebar-box h4.widget-title {
					border-top: 3px solid {$twitterposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 7)) { 
		$custom_css .= "
				.twitterposts$current_time h4 span.sh-text{
					color: {$twitterposts_widget_title_color}!important;
					background-color: {$twitterposts_widget_title_background_color}!important;
				}
				.twitterposts$current_time h4 span.sh-text:after {
					border-bottom: 31px solid {$twitterposts_widget_title_background_color}!important;
				}
				.twitterposts$current_time h4{
					border-bottom: 3px solid {$twitterposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 8)) { 
		$custom_css .= "
				.twitterposts$current_time .titleh3.margin-bottom-20{
					    background: transparent!important;
				}
				.twitterposts$current_time h4 span.sh-text {
					    background-color: {$twitterposts_widget_title_background_color}!important;
						color: {$twitterposts_widget_title_color}!important;
				}
				.twitterposts$current_time h4 span.sh-text:after {
					border-right: 16px solid {$sidebar_background_color};

				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 9)) { 
		$custom_css .= "
				.twitterposts$current_time h4 span.sh-text{
					color: {$twitterposts_widget_title_color}!important;
					background-color: {$twitterposts_widget_title_background_color}!important;
				}
				.twitterposts$current_time h4 span.sh-text:before {
					border-top-color: {$twitterposts_widget_title_background_color}!important;
					border-top: 10px solid {$twitterposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 10)) { 
		$custom_css .= "
				.twitterposts$current_time h4 span.sh-text{
					color: {$twitterposts_widget_title_color}!important;
					background-color: {$twitterposts_widget_title_background_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 11)) { 
		$custom_css .= "
				.twitterposts$current_time h4 span.sh-text{
					 border-bottom: 2px solid {$twitterposts_widget_title_background_color}!important;
					 color: {$twitterposts_widget_title_color}!important;
				}
				";
		}elseif((pantograph_get_option('pantograph_title_style') == 12)) { 
			$custom_css .= "
				.twitterposts$current_time h4 span.sh-text {
					color: {$twitterposts_widget_title_color}!important;
				}
				.twitterposts$current_time h4:after {
					background: {$twitterposts_widget_title_background_color}!important;
				}
				.twitterposts$current_time h4:before {
					border-top-color: {$twitterposts_widget_title_background_color}!important;
					border-top: 5px solid {$twitterposts_widget_title_background_color}!important;
				}
				";
		}else{}
		
		print $custom_css;		
		}
		
		?>
		</style>
<?php
echo '<div class="side-widget twitterposts'.esc_attr($current_time).'">';
 if($title){
		echo '<h4><span class="sh-text">'.esc_attr($title).'</span></h4>';
 }
  $output ='';
 if ( @fopen("http://google.com", "r") ){
	 
	if((!empty($username)) && (!empty($limit)) && (!empty($oauth_access_token)) && (!empty($oauth_access_token_secret)) && (!empty($consumer_key)) && (!empty($consumer_secret))){
    // Get the tweets.
    $timelines = $this->pantograph_twitter_timeline( $username, $limit, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret );
 
    if ( $timelines ) {
 
        // Add links to URL and username mention in tweets.
        $patterns = array( '@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '/@([A-Za-z0-9_]{1,15})/' );
        $replace = array( '<a href="$1">$1</a>', '<a href="http://twitter.com/$1">@$1</a>' );
		$twitterlink = esc_url('https://twitter.com/'.$username);
		$output .='
	  <div class="carousel slide" data-ride="carousel" id="quote-carousel">
		<a href="'.$twitterlink.'" target="_blank">
		<span class="icon-tweets"><i class="fa fa-twitter"></i></span>
		</a>
		<ol class="carousel-indicators">';
		$datanumber = 0;
		foreach ( $timelines as $timeline ) {
		if($datanumber==0){ $class= "active";}else{ $class= "";}
		$output .='
		  <li data-target="#quote-carousel" data-slide-to="'.$datanumber.'" class="'.$class.'"></li>';
		$datanumber++;
		}
	 $output .='</ol>
		<div class="carousel-inner">';
		  $number = 0;
		  foreach ( $timelines as $timeline ) {
          $result = preg_replace( $patterns, $replace, $timeline->text );
		  if($number==0){ $class= "active";}else{ $class= "";}
		  $output .='
		  <div class="item '.$class.'">
			  <div class="row">
				<div class="col-sm-12">
				<div class="tweet-desc">'.$result.'</div>
				  <p class="tweet-time">'.$this->pantograph_tweet_time( $timeline->created_at ).'</p>
				</div>
			  </div>
		  </div>
		  ';
		  $number++;
		  }
		$output .='                  
	</div>
</div>';
echo $output;
    } else {
        _e( 'Error fetching feeds. Please verify the Twitter settings in the widget.', 'pantograph_twitter_tweets_widget' );
    }

	}else{
	echo esc_html("Sorry, you must need valid Twitter info.", 'pantograph');
}

 }else{
	echo esc_html("Sorry, you must need internet connection to perform this widget.", 'pantograph');
}
echo '</div>';
}
 }

function register_pantograph_twitter_widget() {
    register_widget( 'Pantograph_Twitter_Tweets_Widget' );
}
 
add_action( 'widgets_init', 'register_pantograph_twitter_widget' );