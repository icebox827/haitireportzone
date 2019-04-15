<?php

function pionusnews_instagram_widget_function() {
	register_widget( 'pionusnews_instagram_widget' );
}
add_action( 'widgets_init', 'pionusnews_instagram_widget_function' );

Class pionusnews_instagram_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'instagram-feed',
			__( 'Instagram Photos', 'pionusnews-widget' ),
			array(
				'classname' => 'pionusnews_instagram',
				'description' => esc_html__( 'Displays your latest Instagram photos', 'pionusnews-widget' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	function widget( $args, $instance ) {
		$title = isset($instance['title']) ? $instance['title'] : '';
		$username = isset($instance['username']) ? $instance['username'] : '';
		$number = isset($instance['number']) ? $instance['number'] : 9;
		$show_in_row = isset($instance['show_in_row']) ? $instance['show_in_row'] : 6;
		$size = isset($instance['size']) ? $instance['size'] : 'large';
		$target = isset($instance['target']) ? $instance['target'] : '_blank';
		$link = isset($instance['link']) ? $instance['link'] : '';
		$layout = isset($instance['layout']) ? $instance['layout'] : 'layout_1';
		$show_on = isset($instance['show_on']) ? $instance['show_on'] : 'quarter';
		$slide_on = isset($instance['slide_on']) ? $instance['slide_on'] : 'no';
		$custom_img_on = isset($instance['custom_img_on']) ? $instance['custom_img_on'] : 'no';
		$padding_on = isset($instance['padding_on']) ? $instance['padding_on'] : 'no';
		$margintop = isset($instance['margintop']) ? $instance['margintop'] : '';
		$marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '';
		$custom_img1 = isset($instance['custom_img1']) ? $instance['custom_img1'] : '';
		$custom_img2 = isset($instance['custom_img2']) ? $instance['custom_img2'] : '';
		$custom_img3 = isset($instance['custom_img3']) ? $instance['custom_img3'] : '';
		$custom_img4 = isset($instance['custom_img4']) ? $instance['custom_img4'] : '';
		$custom_img5 = isset($instance['custom_img5']) ? $instance['custom_img5'] : '';
		$custom_img6 = isset($instance['custom_img6']) ? $instance['custom_img6'] : '';
		$custom_img7 = isset($instance['custom_img7']) ? $instance['custom_img7'] : '';
		$custom_img8 = isset($instance['custom_img8']) ? $instance['custom_img8'] : '';
		$custom_img9 = isset($instance['custom_img9']) ? $instance['custom_img9'] : '';
		$custom_img10 = isset($instance['custom_img10']) ? $instance['custom_img10'] : '';
		$custom_img_url1 = isset($instance['custom_img_url1']) ? $instance['custom_img_url1'] : '';
		$custom_img_url2 = isset($instance['custom_img_url2']) ? $instance['custom_img_url2'] : '';
		$custom_img_url3 = isset($instance['custom_img_url3']) ? $instance['custom_img_url3'] : '';
		$custom_img_url4 = isset($instance['custom_img_url4']) ? $instance['custom_img_url4'] : '';
		$custom_img_url5 = isset($instance['custom_img_url5']) ? $instance['custom_img_url5'] : '';
		$custom_img_url6 = isset($instance['custom_img_url6']) ? $instance['custom_img_url6'] : '';
		$custom_img_url7 = isset($instance['custom_img_url7']) ? $instance['custom_img_url7'] : '';
		$custom_img_url8 = isset($instance['custom_img_url8']) ? $instance['custom_img_url8'] : '';
		$custom_img_url9 = isset($instance['custom_img_url9']) ? $instance['custom_img_url9'] : '';
		$custom_img_url10 = isset($instance['custom_img_url10']) ? $instance['custom_img_url10'] : '';
		$linkclass = apply_filters( 'pionusnews_link_class', 'follow_link' );
		
		$linkaclass = apply_filters( 'pionusnews_linka_class', '' );

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url = '//instagram.com/explore/tags/' . str_replace( '#', '', $username );
				break;

			default:
				$url = '//instagram.com/' . str_replace( '@', '', $username );
				break;
		}
		if(($margintop) || ($marginbottom)){
		echo "<style>
		.pionusnews_instagram{";
			if($margintop){
			echo "margin-top:$margintop !important;";
			}
			if($marginbottom){
			echo "margin-bottom:$marginbottom !important;";
			}
		echo "
		}
		</style>";
		}
		echo $args['before_widget'];
		
		if($show_on=="quarter"){
		if ( ! empty( $title ) ) { echo '<h4><span class="sh-text">'. wp_kses_post( $title ) .'</span></h4>'; };
		}
		do_action( 'pionusnews_before_widget', $instance );
		if ( '' !== $username ) {

			$media_array = $this->pionusnews_scrape_instagram( $username );

			if ( is_wp_error( $media_array ) ) {

				echo wp_kses_post( $media_array->get_error_message() );

			} else {

				// filter for images only?
				if ( $images_only = apply_filters( 'pionusnews_images_only', false ) ) {
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
				}
				if($slide_on=='yes'){
					$limit = $number;
				}else{
					$limit = $show_in_row;
				}
				// slice list down to required limit.
				$media_array = array_slice( $media_array, 0, $limit );

				// filters for custom classes.
				$ulclass = apply_filters( 'pionusnews_list_class', 'instagram-photos instagram-photo-size-' . $size );
				$liclass = apply_filters( 'pionusnews_item_class', '' );
				$aclass = apply_filters( 'pionusnews_a_class', '' );
				$imgclass = apply_filters( 'pionusnews_img_class', '' );
				if($slide_on=='yes'){
					$img_width_px = 1170/$show_in_row;
					$img_width = $img_width_px.'px';
					include('css/slidercss.php');
				}else{
					$img_width_percent = 100/$show_in_row;
					$img_width = $img_width_percent.'%';
				}
				if($layout=='layout_1'){ 
					include('layouts/layout_1/layout_1.php');
				}
				if($layout=='layout_2'){ 
					include('layouts/layout_2/layout_2.php');
				}
				if($layout=='layout_3'){ 
					include('layouts/layout_3/layout_3.php');
				}
				if($layout=='layout_4'){ 
					include('layouts/layout_4/layout_4.php');
				}
			}
		}
		do_action( 'pionusnews_after_widget', $instance );

		echo $args['after_widget'];
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'title' => __( 'Instagram', 'pionusnews-widget' ),
			'username' => '',
			'size' => 'large',
			'link' => '',
			'number' => 9,
			'show_in_row' => 6,
			'target' => '_self',
			'layout' => 'layout_1',
			'show_on' => 'quarter',
			'slide_on' => 'no',
			'custom_img_on' => 'no',
			'padding_on' => 'no',
			'margintop' => '',
			'marginbottom' => '',
			'custom_img1' => '',
			'custom_img2' => '',
			'custom_img3' => '',
			'custom_img4' => '',
			'custom_img5' => '',
			'custom_img6' => '',
			'custom_img7' => '',
			'custom_img8' => '',
			'custom_img9' => '',
			'custom_img10' => '',
			'custom_img_url1' => '',
			'custom_img_url2' => '',
			'custom_img_url3' => '',
			'custom_img_url4' => '',
			'custom_img_url5' => '',
			'custom_img_url6' => '',
			'custom_img_url7' => '',
			'custom_img_url8' => '',
			'custom_img_url9' => '',
			'custom_img_url10' => '',
		) );
		$title = $instance['title'];
		$username = $instance['username'];
		$number = absint( $instance['number'] );
		$show_in_row = absint( $instance['show_in_row'] );
		$size = $instance['size'];
		$target = $instance['target'];
		$link = $instance['link'];
		$layout = $instance['layout'];
		$show_on = $instance['show_on'];
		$slide_on = $instance['slide_on'];
		$custom_img_on = $instance['custom_img_on'];
		$padding_on = $instance['padding_on'];
		$margintop = $instance['margintop'];
		$marginbottom = $instance['marginbottom'];
		$custom_img1 = $instance['custom_img1'];
		$custom_img2 = $instance['custom_img2'];
		$custom_img3 = $instance['custom_img3'];
		$custom_img4 = $instance['custom_img4'];
		$custom_img5 = $instance['custom_img5'];
		$custom_img6 = $instance['custom_img6'];
		$custom_img7 = $instance['custom_img7'];
		$custom_img8 = $instance['custom_img8'];
		$custom_img9 = $instance['custom_img9'];
		$custom_img10 = $instance['custom_img10'];
		$custom_img_url1 = $instance['custom_img_url1'];
		$custom_img_url2 = $instance['custom_img_url2'];
		$custom_img_url3 = $instance['custom_img_url3'];
		$custom_img_url4 = $instance['custom_img_url4'];
		$custom_img_url5 = $instance['custom_img_url5'];
		$custom_img_url6 = $instance['custom_img_url6'];
		$custom_img_url7 = $instance['custom_img_url7'];
		$custom_img_url8 = $instance['custom_img_url8'];
		$custom_img_url9 = $instance['custom_img_url9'];
		$custom_img_url10 = $instance['custom_img_url10'];
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( '@username or #tag', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Total Number of photos', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'show_in_row' ) ); ?>"><?php esc_html_e( 'Number of photos In a Row', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_in_row' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_in_row' ) ); ?>" type="text" value="<?php echo esc_attr( $show_in_row ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" /></label></p>
		<?php /* ?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Photo Layout', 'pionusnews-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" class="widefat">
				<option value="layout_1" <?php selected( 'layout_1', $layout ); ?>><?php esc_html_e( 'Layout 1', 'pionusnews-widget' ); ?></option>
				<option value="layout_2" <?php selected( 'layout_2', $layout ); ?>><?php esc_html_e( 'Layout 2', 'pionusnews-widget' ); ?></option>
				<option value="layout_3" <?php selected( 'layout_3', $layout ); ?>><?php esc_html_e( 'Layout 3', 'pionusnews-widget' ); ?></option>
				<option value="layout_4" <?php selected( 'layout_4', $layout ); ?>><?php esc_html_e( 'Layout 4', 'pionusnews-widget' ); ?></option>
			</select>
		</p>
		<?php */ ?>
		<input name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" type="hidden" value="<?php echo esc_attr( $layout ); ?>" />
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'padding_on' ) ); ?>"><?php esc_html_e( 'Padding Between Image', 'pionusnews-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'padding_on' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'padding_on' ) ); ?>" class="widefat">
				<option value="no" <?php selected( 'no', $padding_on ); ?>><?php esc_html_e( 'No', 'pionusnews-widget' ); ?></option>
				<option value="yes" <?php selected( 'yes', $padding_on ); ?>><?php esc_html_e( 'Yes', 'pionusnews-widget' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'show_on' ) ); ?>"><?php esc_html_e( 'Width', 'pionusnews-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'show_on' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_on' ) ); ?>" class="widefat">
				<option value="quarter" <?php selected( 'quarter', $show_on ); ?>><?php esc_html_e( 'Quarter Width', 'pionusnews-widget' ); ?></option>
				<option value="full_width" <?php selected( 'full_width', $show_on ); ?>><?php esc_html_e( 'Full Width', 'pionusnews-widget' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size (Only For Quarter Width)', 'pionusnews-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
				<option value="small" <?php selected( 'small', $size ); ?>><?php esc_html_e( 'Small', 'pionusnews-widget' ); ?></option>
				<option value="thumbnail" <?php selected( 'thumbnail', $size ); ?>><?php esc_html_e( 'Thumbnail', 'pionusnews-widget' ); ?></option>
				<option value="original" <?php selected( 'original', $size ); ?>><?php esc_html_e( 'Medium', 'pionusnews-widget' ); ?></option>
				<option value="large" <?php selected( 'large', $size ); ?>><?php esc_html_e( 'Large', 'pionusnews-widget' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'slide_on' ) ); ?>"><?php esc_html_e( 'Slide Show', 'pionusnews-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'slide_on' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slide_on' ) ); ?>" class="widefat">
				<option value="no" <?php selected( 'no', $slide_on ); ?>><?php esc_html_e( 'No', 'pionusnews-widget' ); ?></option>
				<option value="yes" <?php selected( 'yes', $slide_on ); ?>><?php esc_html_e( 'Yes', 'pionusnews-widget' ); ?></option>
			</select>
			<small>Slideshow only work for Full Width template</small>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'margintop' ) ); ?>"><?php esc_html_e( 'Margin Top', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'margintop' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'margintop' ) ); ?>" type="text" value="<?php echo esc_attr( $margintop ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'marginbottom' ) ); ?>"><?php esc_html_e( 'Margin Bottom', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'marginbottom' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'marginbottom' ) ); ?>" type="text" value="<?php echo esc_attr( $marginbottom ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_on' ) ); ?>"><?php esc_html_e( 'Custom Image', 'pionusnews-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'custom_img_on' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_on' ) ); ?>" class="widefat">
				<option value="no" <?php selected( 'no', $custom_img_on ); ?>><?php esc_html_e( 'No', 'pionusnews-widget' ); ?></option>
				<option value="yes" <?php selected( 'yes', $custom_img_on ); ?>><?php esc_html_e( 'Yes', 'pionusnews-widget' ); ?></option>
			</select>
			<small>You can use custom images instead of Instagram images</small>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img1' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 1', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img1' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img1 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url1' ) ); ?>"><?php esc_html_e( 'Post URL for Image 1', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url1' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url1 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img2' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 2', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img2' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img2 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url2' ) ); ?>"><?php esc_html_e( 'Post URL for Image 2', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url2' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url2 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img3' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 3', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img3' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img3 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url3' ) ); ?>"><?php esc_html_e( 'Post URL for Image 3', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url3' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url3 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img4' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 4', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img4' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img4 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url4' ) ); ?>"><?php esc_html_e( 'Post URL for Image 4', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url4' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url4 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img5' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 5', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img5' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img5 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url5' ) ); ?>"><?php esc_html_e( 'Post URL for Image 5', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url5' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url5' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url5 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img6' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 6', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img6' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img6 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url6' ) ); ?>"><?php esc_html_e( 'Post URL for Image 6', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url6' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url6' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url6 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img7' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 7', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img7' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img7 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url7' ) ); ?>"><?php esc_html_e( 'Post URL for Image 7', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url7' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url7' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url7 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img8' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 8', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img8' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img8 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url8' ) ); ?>"><?php esc_html_e( 'Post URL for Image 8', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url8' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url8' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url8 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img9' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 9', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img9' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img9' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img9 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url9' ) ); ?>"><?php esc_html_e( 'Post URL for Image 9', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url9' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url9' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url9 ); ?>" /></label></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img10' ) ); ?>"><?php esc_html_e( 'URL of Custom Image 10', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img10' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img10' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img10 ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'custom_img_url10' ) ); ?>"><?php esc_html_e( 'Post URL for Image 10', 'pionusnews-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'custom_img_url10' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'custom_img_url10' ) ); ?>" type="text" value="<?php echo esc_attr( $custom_img_url10 ); ?>" /></label></p>
		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
		$instance['number'] = ! absint( $new_instance['number'] ) ? 9 : $new_instance['number'];
		$instance['show_in_row'] = ! absint( $new_instance['show_in_row'] ) ? 6 : $new_instance['show_in_row'];
		$instance['size'] = ( ( 'thumbnail' === $new_instance['size'] || 'large' === $new_instance['size'] || 'small' === $new_instance['size'] || 'original' === $new_instance['size'] ) ? $new_instance['size'] : 'large' );
		$instance['target'] = ( ( '_self' === $new_instance['target'] || '_blank' === $new_instance['target'] ) ? $new_instance['target'] : '_self' );
		$instance['link'] = strip_tags( $new_instance['link'] );
		$instance['layout'] = ( ( 'layout_1' === $new_instance['layout'] || 'layout_2' === $new_instance['layout'] || 'layout_3' === $new_instance['layout'] || 'layout_4' === $new_instance['layout'] ) ? $new_instance['layout'] : 'layout_1' );
		$instance['show_on'] = ( ( 'quarter' === $new_instance['show_on'] || 'full_width' === $new_instance['show_on'] ) ? $new_instance['show_on'] : 'quarter' );
		$instance['slide_on'] = ( ( 'no' === $new_instance['slide_on'] || 'yes' === $new_instance['slide_on'] ) ? $new_instance['slide_on'] : 'no' );
		$instance['custom_img_on'] = ( ( 'no' === $new_instance['custom_img_on'] || 'yes' === $new_instance['custom_img_on'] ) ? $new_instance['custom_img_on'] : 'no' );
		$instance['custom_img1'] = strip_tags( $new_instance['custom_img1'] );
		$instance['custom_img2'] = strip_tags( $new_instance['custom_img2'] );
		$instance['custom_img3'] = strip_tags( $new_instance['custom_img3'] );
		$instance['custom_img4'] = strip_tags( $new_instance['custom_img4'] );
		$instance['custom_img5'] = strip_tags( $new_instance['custom_img5'] );
		$instance['custom_img6'] = strip_tags( $new_instance['custom_img6'] );
		$instance['custom_img7'] = strip_tags( $new_instance['custom_img7'] );
		$instance['custom_img8'] = strip_tags( $new_instance['custom_img8'] );
		$instance['custom_img9'] = strip_tags( $new_instance['custom_img9'] );
		$instance['custom_img10'] = strip_tags( $new_instance['custom_img10'] );
		$instance['custom_img_url1'] = strip_tags( $new_instance['custom_img_url1'] );
		$instance['custom_img_url2'] = strip_tags( $new_instance['custom_img_url2'] );
		$instance['custom_img_url3'] = strip_tags( $new_instance['custom_img_url3'] );
		$instance['custom_img_url4'] = strip_tags( $new_instance['custom_img_url4'] );
		$instance['custom_img_url5'] = strip_tags( $new_instance['custom_img_url5'] );
		$instance['custom_img_url6'] = strip_tags( $new_instance['custom_img_url6'] );
		$instance['custom_img_url7'] = strip_tags( $new_instance['custom_img_url7'] );
		$instance['custom_img_url8'] = strip_tags( $new_instance['custom_img_url8'] );
		$instance['custom_img_url9'] = strip_tags( $new_instance['custom_img_url9'] );
		$instance['custom_img_url10'] = strip_tags( $new_instance['custom_img_url10'] );
		$instance['padding_on'] = ( ( 'no' === $new_instance['padding_on'] || 'yes' === $new_instance['padding_on'] ) ? $new_instance['padding_on'] : 'no' );
		$instance['margintop'] = strip_tags( $new_instance['margintop'] );
		$instance['marginbottom'] = strip_tags( $new_instance['marginbottom'] );
		return $instance;
	}

	// based on https://gist.github.com/cosmocatalano/4544576.
	function pionusnews_scrape_instagram( $username ) {

		$username = trim( strtolower( $username ) );

		if ( false === ( $instagram = get_transient( 'instagram-a9-' . sanitize_title_with_dashes( $username ) ) ) ) {

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
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'pionusnews-widget' ) );
			}

			if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'pionusnews-widget' ) );
			}

			$shards = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], true );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'pionusnews-widget' ) );
			}

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
			} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'pionusnews-widget' ) );
			}

			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'pionusnews-widget' ) );
			}

			$instagram = array();

			foreach ( $images as $image ) {
				// Note: keep hashtag support different until these JSON changes stabalise
				// these are mostly the same again now
				switch ( substr( $username, 0, 1 ) ) {
					case '#':
						if ( true === $image['node']['is_video'] ) {
							$type = 'video';
						} else {
							$type = 'image';
						}

						$caption = __( 'Instagram Image', 'pionusnews-widget' );
						if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
							$caption = $image['node']['edge_media_to_caption']['edges'][0]['node']['text'];
						}

						$instagram[] = array(
							'description'   => $caption,
							'link'		  	=> trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
							'time'		  	=> $image['node']['taken_at_timestamp'],
							'comments'	  	=> $image['node']['edge_media_to_comment']['count'],
							'likes'		 	=> $image['node']['edge_liked_by']['count'],
							'thumbnail'	 	=> preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
							'small'			=> preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
							'large'			=> preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
							'original'		=> preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
							'type'		  	=> $type,
						);
						break;
					default:
						if ( true === $image['is_video'] ) {
							$type = 'video';
						} else {
							$type = 'image';
						}

						$caption = __( 'Instagram Image', 'pionusnews-widget' );
						if ( ! empty( $image['caption'] ) ) {
							$caption = $image['caption'];
						}

						$instagram[] = array(
							'description'   => $caption,
							'link'		  	=> trailingslashit( '//instagram.com/p/' . $image['code'] ),
							'time'		  	=> $image['date'],
							'comments'	  	=> $image['comments']['count'],
							'likes'		 	=> $image['likes']['count'],
							'thumbnail'	 	=> preg_replace( '/^https?\:/i', '', $image['thumbnail_resources'][0]['src'] ),
							'small'			=> preg_replace( '/^https?\:/i', '', $image['thumbnail_resources'][2]['src'] ),
							'large'			=> preg_replace( '/^https?\:/i', '', $image['thumbnail_resources'][4]['src'] ),
							'original'		=> preg_replace( '/^https?\:/i', '', $image['display_src'] ),
							'type'		  	=> $type,
						);

						break;
				}
			} // End foreach().

			// do not set an empty transient - should help catch private or empty accounts.
			if ( ! empty( $instagram ) ) {
				$instagram = base64_encode( serialize( $instagram ) );
				set_transient( 'instagram-a9-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {

			return unserialize( base64_decode( $instagram ) );

		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'pionusnews-widget' ) );

		}
	}
	
}