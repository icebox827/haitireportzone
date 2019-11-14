<?php

/**
 * Adds a box to the main column on the Post/Page add/edit screens.
 */
function pantograph_add_meta_box() {

        add_meta_box('pantograph-header-style', esc_html__( 'Header Style', 'pantograph' ), 'pantograph_meta_box_callback', array('page', 'post'), 'side', 'high'); 
		add_meta_box( 'pantograph-header-color', esc_html__('Header Background Color', 'pantograph' ), 'pantograph_header_color_callback', array('page'), 'side', 'high');
		add_meta_box( 'pantograph-footer-style', esc_html__('Footer Style', 'pantograph' ), 'pantograph_footer_style_callback', array('page'), 'side', 'high');
		add_meta_box( 'pantograph-body-color', esc_html__('Body Background Color', 'pantograph' ), 'pantograph_body_color_callback', array('page', 'post'), 'side', 'high');
		add_meta_box( 'pantograph-container-bg-white-color', esc_html__('Do You Want Box Style?', 'pantograph' ), 'pantograph_container_bg_white_callback', array('page', 'post'), 'side', 'high');
		add_meta_box( 'pantograph-sticky-widget', esc_html__('Do You Want Sticky Sidebar?', 'pantograph' ), 'pantograph_enable_sticky_widget_callback', array('page'), 'side', 'low');
		add_meta_box( 'pantograph-body-bg-img', esc_html__('Body Background Image URL', 'pantograph' ), 'pantograph_body_bg_img_callback', array('page', 'post'), 'side', 'high');
		add_meta_box( 'pantograph-widget-border', esc_html__('Widgets Border', 'pantograph' ), 'pantograph_widget_border_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pantograph-widget-background', esc_html__('Widgets Background', 'pantograph' ), 'pantograph_widget_background_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pantograph-widget-title', esc_html__('Widgets Title Color', 'pantograph' ), 'pantograph_widget_title_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pantograph-widget-title-background', esc_html__('Widgets Title Background Color', 'pantograph' ), 'pantograph_widget_title_background_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pantograph-widget-text', esc_html__('Widgets Text Color', 'pantograph' ), 'pantograph_widget_text_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pantograph-widget-link', esc_html__('Widgets Link Color', 'pantograph' ), 'pantograph_widget_link_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pantograph-widget-link-hover', esc_html__('Widgets Link Hover Color', 'pantograph' ), 'pantograph_widget_link_hover_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pantograph-custom-image', esc_html__('Custom Image Or Video Thumbnail URL', 'pantograph' ), 'pantograph_custom_image_url_callback', array('page', 'post'), 'side', 'low');
		add_meta_box( 'pantograph-featured-posts', esc_html__('Featured Post', 'pantograph' ), 'pantograph_featured_posts_callback', array('post'), 'side', 'high');
		add_meta_box( 'pantograph-category-position', esc_html__('Category Position', 'pantograph' ), 'pantograph_category_Position_callback', array('post'), 'side', 'high');
		add_meta_box( 'pantograph-header-add-block', esc_html__('Header Right Advertisement', 'pantograph' ), 'pantograph_header_add_block_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pantograph-primary-category', esc_html__('Primary Category', 'pantograph' ), 'pantograph_primary_category_callback', array('post'), 'normal', 'high');
}

add_action( 'add_meta_boxes', 'pantograph_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function pantograph_meta_box_callback( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'pantograph_meta_box', 'pantograph_meta_box_nonce' );

        /*
         * Use get_post_meta() to retrieve an existing value
         * from the database and use the value for the form.
         */
        $value = get_post_meta( $post->ID, 'header_key', true ); //header_key is a meta_key. Change it to whatever you want

        ?>  
        <input type="radio" name="pantograph_header_radio_buttons" value="style_default" <?php checked( $value, 'style_default' ); ?> ><?php _e( "Style Default", 'pantograph' ); ?><br>
        <input type="radio" name="pantograph_header_radio_buttons" value="style_one" <?php checked( $value, 'style_one' ); ?> ><?php _e( "Style One", 'pantograph' ); ?><br>
        <input type="radio" name="pantograph_header_radio_buttons" value="style_two" <?php checked( $value, 'style_two' ); ?> ><?php _e( "Style Two", 'pantograph' ); ?><br>
		<input type="radio" name="pantograph_header_radio_buttons" value="style_three" <?php checked( $value, 'style_three' ); ?> ><?php _e( "Style Three", 'pantograph' ); ?><br>
        <input type="radio" name="pantograph_header_radio_buttons" value="style_four" <?php checked( $value, 'style_four' ); ?> ><?php _e( "Style Four", 'pantograph' ); ?><br>
        <input type="radio" name="pantograph_header_radio_buttons" value="style_five" <?php checked( $value, 'style_five' ); ?> ><?php _e( "Style Five", 'pantograph' ); ?><br>
        <input type="radio" name="pantograph_header_radio_buttons" value="style_six" <?php checked( $value, 'style_six' ); ?> ><?php _e( "Style Six", 'pantograph' ); ?><br>
        <input type="radio" name="pantograph_header_radio_buttons" value="style_seven" <?php checked( $value, 'style_seven' ); ?> ><?php _e( "Style Seven", 'pantograph' ); ?><br>
        <?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function pantograph_save_meta_box_data( $post_id ) {

        /*
         * We need to verify this came from our screen and with proper authorization,
         * because the save_post action can be triggered at other times.
         */

        // Check if our nonce is set.
        if ( !isset( $_POST['pantograph_meta_box_nonce'] ) ) {
                return;
        }

        // Verify that the nonce is valid.
        if ( !wp_verify_nonce( $_POST['pantograph_meta_box_nonce'], 'pantograph_meta_box' ) ) {
                return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
        }

        // Check the user's permissions.
        if ( !current_user_can( 'edit_post', $post_id ) ) {
                return;
        }


        // Sanitize user input.
        $new_meta_value = ( isset( $_POST['pantograph_header_radio_buttons'] ) ? sanitize_html_class( $_POST['pantograph_header_radio_buttons'] ) : '' );

        // Update the meta field in the database.
        update_post_meta( $post_id, 'header_key', $new_meta_value );

}

add_action( 'save_post', 'pantograph_save_meta_box_data' );

if ( ! function_exists( 'pantograph_footer_style_callback' ) ){
	function pantograph_footer_style_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$footer_style = (isset($custom["footer_style"][0])) ? $custom["footer_style"][0] : '';
		wp_nonce_field( 'pantograph_footer_style_callback', 'pantograph_footer_style_meta_box_nonce' );
		?>
		<div class="pagebox">
			<input type="radio" name="footer_style" value="default" <?php if($footer_style=='default') { echo 'checked'; } ?> class="widefat"/> Style Default <br/>
			<input type="radio" name="footer_style" value="1" <?php if($footer_style==1) { echo 'checked'; } ?> class="widefat"/> Style 1 <br/>
			<input type="radio" name="footer_style" value="2" <?php if($footer_style==2) { echo 'checked'; } ?> class="widefat"/> Style 2 <br/>
			<input type="radio" name="footer_style" value="3" <?php if($footer_style==3) { echo 'checked'; } ?> class="widefat"/> Style 3 <br/>
			<input type="radio" name="footer_style" value="4" <?php if($footer_style==4) { echo 'checked'; } ?> class="widefat"/> Style 4 <br/>
			<input type="radio" name="footer_style" value="5" <?php if($footer_style==5) { echo 'checked'; } ?> class="widefat"/> Style 5 <br/>
			<input type="radio" name="footer_style" value="6" <?php if($footer_style==6) { echo 'checked'; } ?> class="widefat"/> Style 6 <br/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_footer_style_meta_box' ) ){
	function pantograph_save_footer_style_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['footer_style'] ) || !wp_verify_nonce( $_POST['pantograph_footer_style_meta_box_nonce'], 'pantograph_footer_style_callback' ) ) {
			return;
		}
		$footer_style = (isset($_POST["footer_style"]) && $_POST["footer_style"]!='') ? $_POST["footer_style"] : '';
		update_post_meta($post_id, "footer_style", $footer_style);
	}
}

add_action( 'save_post', 'pantograph_save_footer_style_meta_box' );

/**
 * Enqueue media and WP-Color Picker in Post/Page add/edit screens.
 */

add_action( 'admin_enqueue_scripts', 'pantograph_backend_scripts');

if ( ! function_exists( 'pantograph_backend_scripts' ) ){
	function pantograph_backend_scripts($hook) {
		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');
	}
}

if ( ! function_exists( 'pantograph_body_color_callback' ) ){
	function pantograph_body_color_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$body_color = (isset($custom["body_color"][0])) ? $custom["body_color"][0] : '';
		wp_nonce_field( 'pantograph_body_color_callback', 'pantograph_body_color_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Choosse a color for body background.', 'pantograph' ); ?></p>
			<input class="color_field" name="body_color" value="<?php esc_attr_e($body_color); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_body_color_meta_box' ) ){
	function pantograph_save_body_color_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['body_color'] ) || !wp_verify_nonce( $_POST['pantograph_body_color_meta_box_nonce'], 'pantograph_body_color_callback' ) ) {
			return;
		}
		$body_color = (isset($_POST["body_color"]) && $_POST["body_color"]!='') ? $_POST["body_color"] : '';
		update_post_meta($post_id, "body_color", $body_color);
	}
}

add_action( 'save_post', 'pantograph_save_body_color_meta_box' );

if ( ! function_exists( 'pantograph_header_color_callback' ) ){
	function pantograph_header_color_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$header_color = (isset($custom["header_color"][0])) ? $custom["header_color"][0] : '';
		wp_nonce_field( 'pantograph_header_color_callback', 'pantograph_header_color_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.header_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Choosse a color for header background.', 'pantograph' ); ?></p>
			<input class="header_color_field" name="header_color" value="<?php esc_attr_e($header_color); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_header_color_meta_box' ) ){
	function pantograph_save_header_color_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['header_color'] ) || !wp_verify_nonce( $_POST['pantograph_header_color_meta_box_nonce'], 'pantograph_header_color_callback' ) ) {
			return;
		}
		$header_color = (isset($_POST["header_color"]) && $_POST["header_color"]!='') ? $_POST["header_color"] : '';
		update_post_meta($post_id, "header_color", $header_color);
	}
}

add_action( 'save_post', 'pantograph_save_header_color_meta_box' );

if ( ! function_exists( 'pantograph_widget_background_callback' ) ){
	function pantograph_widget_background_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_background = (isset($custom["widget_background"][0])) ? $custom["widget_background"][0] : '';
		wp_nonce_field( 'pantograph_widget_background_callback', 'pantograph_widget_background_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_background_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph' ); ?></p>
			<input class="widget_background_color_field" name="widget_background" value="<?php esc_attr_e($widget_background); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_widget_background_meta_box' ) ){
	function pantograph_save_widget_background_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_background'] ) || !wp_verify_nonce( $_POST['pantograph_widget_background_meta_box_nonce'], 'pantograph_widget_background_callback' ) ) {
			return;
		}
		$widget_background = (isset($_POST["widget_background"]) && $_POST["widget_background"]!='') ? $_POST["widget_background"] : '';
		update_post_meta($post_id, "widget_background", $widget_background);
	}
}

add_action( 'save_post', 'pantograph_save_widget_background_meta_box' );

if ( ! function_exists( 'pantograph_widget_title_background_callback' ) ){
	function pantograph_widget_title_background_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_title_background = (isset($custom["widget_title_background"][0])) ? $custom["widget_title_background"][0] : '';
		wp_nonce_field( 'pantograph_widget_title_background_callback', 'pantograph_widget_title_background_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_title_background_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph' ); ?></p>
			<input class="widget_title_background_color_field" name="widget_title_background" value="<?php esc_attr_e($widget_title_background); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_widget_title_background_meta_box' ) ){
	function pantograph_save_widget_title_background_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_title_background'] ) || !wp_verify_nonce( $_POST['pantograph_widget_title_background_meta_box_nonce'], 'pantograph_widget_title_background_callback' ) ) {
			return;
		}
		$widget_title_background = (isset($_POST["widget_title_background"]) && $_POST["widget_title_background"]!='') ? $_POST["widget_title_background"] : '';
		update_post_meta($post_id, "widget_title_background", $widget_title_background);
	}
}

add_action( 'save_post', 'pantograph_save_widget_title_background_meta_box' );

if ( ! function_exists( 'pantograph_widget_title_callback' ) ){
	function pantograph_widget_title_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_title = (isset($custom["widget_title"][0])) ? $custom["widget_title"][0] : '';
		wp_nonce_field( 'pantograph_widget_title_callback', 'pantograph_widget_title_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_title_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph' ); ?></p>
			<input class="widget_title_color_field" name="widget_title" value="<?php esc_attr_e($widget_title); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_widget_title_meta_box' ) ){
	function pantograph_save_widget_title_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_title'] ) || !wp_verify_nonce( $_POST['pantograph_widget_title_meta_box_nonce'], 'pantograph_widget_title_callback' ) ) {
			return;
		}
		$widget_title = (isset($_POST["widget_title"]) && $_POST["widget_title"]!='') ? $_POST["widget_title"] : '';
		update_post_meta($post_id, "widget_title", $widget_title);
	}
}

add_action( 'save_post', 'pantograph_save_widget_title_meta_box' );

if ( ! function_exists( 'pantograph_custom_image_url_callback' ) ){
	function pantograph_custom_image_url_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$custom_image_url = (isset($custom["custom_image_url"][0])) ? $custom["custom_image_url"][0] : '';
		wp_nonce_field( 'pantograph_custom_image_url_callback', 'pantograph_custom_image_url_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Use this feature instead of Featured Image and Video', 'pantograph' ); ?></p>
			<input type="text" name="custom_image_url" value="<?php esc_attr_e($custom_image_url); ?>" class="widefat"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_body_bg_img_callback' ) ){
	function pantograph_body_bg_img_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$pantograph_body_bg_img = (isset($custom["pantograph_body_bg_img"][0])) ? $custom["pantograph_body_bg_img"][0] : '';
		wp_nonce_field( 'pantograph_body_bg_img_callback', 'pantograph_body_bg_img_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Usable only for Boxed Style Pages or Posts', 'pantograph' ); ?></p>
			<input type="text" name="pantograph_body_bg_img" value="<?php esc_attr_e($pantograph_body_bg_img); ?>" class="widefat"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_widget_text_callback' ) ){
	function pantograph_widget_text_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_text = (isset($custom["widget_text"][0])) ? $custom["widget_text"][0] : '';
		wp_nonce_field( 'pantograph_widget_text_callback', 'pantograph_widget_text_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_text_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph' ); ?></p>
			<input class="widget_text_color_field" name="widget_text" value="<?php esc_attr_e($widget_text); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_widget_text_meta_box' ) ){
	function pantograph_save_widget_text_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_text'] ) || !wp_verify_nonce( $_POST['pantograph_widget_text_meta_box_nonce'], 'pantograph_widget_text_callback' ) ) {
			return;
		}
		$widget_text = (isset($_POST["widget_text"]) && $_POST["widget_text"]!='') ? $_POST["widget_text"] : '';
		update_post_meta($post_id, "widget_text", $widget_text);
	}
}

add_action( 'save_post', 'pantograph_save_widget_text_meta_box' );


if ( ! function_exists( 'pantograph_widget_link_callback' ) ){
	function pantograph_widget_link_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_link = (isset($custom["widget_link"][0])) ? $custom["widget_link"][0] : '';
		wp_nonce_field( 'pantograph_widget_link_callback', 'pantograph_widget_link_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_link_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph' ); ?></p>
			<input class="widget_link_color_field" name="widget_link" value="<?php esc_attr_e($widget_link); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_widget_link_meta_box' ) ){
	function pantograph_save_widget_link_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_link'] ) || !wp_verify_nonce( $_POST['pantograph_widget_link_meta_box_nonce'], 'pantograph_widget_link_callback' ) ) {
			return;
		}
		$widget_link = (isset($_POST["widget_link"]) && $_POST["widget_link"]!='') ? $_POST["widget_link"] : '';
		update_post_meta($post_id, "widget_link", $widget_link);
	}
}

add_action( 'save_post', 'pantograph_save_widget_link_meta_box' );

if ( ! function_exists( 'pantograph_widget_link_hover_callback' ) ){
	function pantograph_widget_link_hover_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_link_hover = (isset($custom["widget_link_hover"][0])) ? $custom["widget_link_hover"][0] : '';
		wp_nonce_field( 'pantograph_widget_link_hover_callback', 'pantograph_widget_link_hover_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_link_hover_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph' ); ?></p>
			<input class="widget_link_hover_color_field" name="widget_link_hover" value="<?php esc_attr_e($widget_link_hover); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_widget_link_hover_meta_box' ) ){
	function pantograph_save_widget_link_hover_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_link_hover'] ) || !wp_verify_nonce( $_POST['pantograph_widget_link_hover_meta_box_nonce'], 'pantograph_widget_link_hover_callback' ) ) {
			return;
		}
		$widget_link_hover = (isset($_POST["widget_link_hover"]) && $_POST["widget_link_hover"]!='') ? $_POST["widget_link_hover"] : '';
		update_post_meta($post_id, "widget_link_hover", $widget_link_hover);
	}
}

add_action( 'save_post', 'pantograph_save_widget_link_hover_meta_box' );

if ( ! function_exists( 'pantograph_save_custom_image_url_meta_box' ) ){
	function pantograph_save_custom_image_url_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['custom_image_url'] ) || !wp_verify_nonce( $_POST['pantograph_custom_image_url_meta_box_nonce'], 'pantograph_custom_image_url_callback' ) ) {
			return;
		}
		$custom_image_url = (isset($_POST["custom_image_url"]) && $_POST["custom_image_url"]!='') ? $_POST["custom_image_url"] : '';
		update_post_meta($post_id, "custom_image_url", $custom_image_url);
	}
}

add_action( 'save_post', 'pantograph_save_custom_image_url_meta_box' );

if ( ! function_exists( 'pantograph_save_body_bg_img_meta_box' ) ){
	function pantograph_save_body_bg_img_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['pantograph_body_bg_img'] ) || !wp_verify_nonce( $_POST['pantograph_body_bg_img_meta_box_nonce'], 'pantograph_body_bg_img_callback' ) ) {
			return;
		}
		$pantograph_body_bg_img = (isset($_POST["pantograph_body_bg_img"]) && $_POST["pantograph_body_bg_img"]!='') ? $_POST["pantograph_body_bg_img"] : '';
		update_post_meta($post_id, "pantograph_body_bg_img", $pantograph_body_bg_img);
	}
}

add_action( 'save_post', 'pantograph_save_body_bg_img_meta_box' );

if ( ! function_exists( 'pantograph_featured_posts_callback' ) ){
	function pantograph_featured_posts_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$featured_posts = (isset($custom["featured_posts"][0])) ? $custom["featured_posts"][0] : '';
		wp_nonce_field( 'pantograph_featured_posts_callback', 'pantograph_featured_posts_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Use this feature to make a feature post', 'pantograph' ); ?></p>
			<input type="radio" name="featured_posts" value="1" <?php if($featured_posts==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="featured_posts" value="0" <?php if($featured_posts==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_featured_posts_meta_box' ) ){
	function pantograph_save_featured_posts_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['featured_posts'] ) || !wp_verify_nonce( $_POST['pantograph_featured_posts_meta_box_nonce'], 'pantograph_featured_posts_callback' ) ) {
			return;
		}
		$featured_posts = (isset($_POST["featured_posts"]) && $_POST["featured_posts"]!='') ? $_POST["featured_posts"] : '';
		update_post_meta($post_id, "featured_posts", $featured_posts);
	}
}

add_action( 'save_post', 'pantograph_save_featured_posts_meta_box' );

if ( ! function_exists( 'pantograph_category_Position_callback' ) ){
	function pantograph_category_Position_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$category_Position = (isset($custom["category_Position"][0])) ? $custom["category_Position"][0] : '';
		wp_nonce_field( 'pantograph_category_Position_callback', 'pantograph_category_Position_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Use this feature to show category list Top Or Bottom', 'pantograph' ); ?></p>
			<input type="radio" name="category_Position" value="1" <?php if($category_Position==1) { echo 'checked'; } ?> class="widefat"/> Top 
			<input type="radio" name="category_Position" value="0" <?php if($category_Position==0) { echo 'checked'; } ?> class="widefat"/> Bottom
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_category_Position_meta_box' ) ){
	function pantograph_save_category_Position_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['category_Position'] ) || !wp_verify_nonce( $_POST['pantograph_category_Position_meta_box_nonce'], 'pantograph_category_Position_callback' ) ) {
			return;
		}
		$category_Position = (isset($_POST["category_Position"]) && $_POST["category_Position"]!='') ? $_POST["category_Position"] : '';
		update_post_meta($post_id, "category_Position", $category_Position);
	}
}

add_action( 'save_post', 'pantograph_save_category_Position_meta_box' );

if ( ! function_exists( 'pantograph_container_bg_white_callback' ) ){
	function pantograph_container_bg_white_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$container_bg_white = (isset($custom["container_bg_white"][0])) ? $custom["container_bg_white"][0] : '';
		wp_nonce_field( 'pantograph_container_bg_white_callback', 'pantograph_container_bg_white_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Use this feature to make white background container', 'pantograph' ); ?></p>
			<input type="radio" name="container_bg_white" value="1" <?php if($container_bg_white==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="container_bg_white" value="0" <?php if($container_bg_white==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_container_bg_white_meta_box' ) ){
	function pantograph_save_container_bg_white_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['container_bg_white'] ) || !wp_verify_nonce( $_POST['pantograph_container_bg_white_meta_box_nonce'], 'pantograph_container_bg_white_callback' ) ) {
			return;
		}
		$container_bg_white = (isset($_POST["container_bg_white"]) && $_POST["container_bg_white"]!='') ? $_POST["container_bg_white"] : '';
		update_post_meta($post_id, "container_bg_white", $container_bg_white);
	}
}

add_action( 'save_post', 'pantograph_save_container_bg_white_meta_box' );



if ( ! function_exists( 'pantograph_enable_sticky_widget_callback' ) ){
	function pantograph_enable_sticky_widget_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$enable_sticky_widget = (isset($custom["enable_sticky_widget"][0])) ? $custom["enable_sticky_widget"][0] : '';
		wp_nonce_field( 'pantograph_enable_sticky_widget_callback', 'pantograph_enable_sticky_widget_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Works if this page is using Widgetised Sidebar VC element.', 'pantograph' ); ?></p>
			<input type="radio" name="enable_sticky_widget" value="1" <?php if($enable_sticky_widget==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="enable_sticky_widget" value="0" <?php if($enable_sticky_widget==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_enable_sticky_widget_meta_box' ) ){
	function pantograph_save_enable_sticky_widget_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['enable_sticky_widget'] ) || !wp_verify_nonce( $_POST['pantograph_enable_sticky_widget_meta_box_nonce'], 'pantograph_enable_sticky_widget_callback' ) ) {
			return;
		}
		$enable_sticky_widget = (isset($_POST["enable_sticky_widget"]) && $_POST["enable_sticky_widget"]!='') ? $_POST["enable_sticky_widget"] : '';
		update_post_meta($post_id, "enable_sticky_widget", $enable_sticky_widget);
	}
}

add_action( 'save_post', 'pantograph_save_enable_sticky_widget_meta_box' );

if ( ! function_exists( 'pantograph_widget_border_callback' ) ){
	function pantograph_widget_border_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_border = (isset($custom["widget_border"][0])) ? $custom["widget_border"][0] : '';
		wp_nonce_field( 'pantograph_widget_border_callback', 'pantograph_widget_border_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph' ); ?></p>
			<input type="radio" name="widget_border" value="1" <?php if($widget_border==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="widget_border" value="0" <?php if($widget_border==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_widget_border_meta_box' ) ){
	function pantograph_save_widget_border_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_border'] ) || !wp_verify_nonce( $_POST['pantograph_widget_border_meta_box_nonce'], 'pantograph_widget_border_callback' ) ) {
			return;
		}
		$widget_border = (isset($_POST["widget_border"]) && $_POST["widget_border"]!='') ? $_POST["widget_border"] : '';
		update_post_meta($post_id, "widget_border", $widget_border);
	}
}

add_action( 'save_post', 'pantograph_save_widget_border_meta_box' );

if ( ! function_exists( 'pantograph_header_add_block_callback' ) ){
	function pantograph_header_add_block_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$header_add_block = (isset($custom["header_add_block"][0])) ? $custom["header_add_block"][0] : '';
		wp_nonce_field( 'pantograph_header_add_block_callback', 'pantograph_header_add_block_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work only for header right sidebar advertisement', 'pantograph' ); ?></p>
			<textarea style="overflow:auto;resize:none" rows="5" cols="20" name="header_add_block" class="widefat"><?php esc_attr_e($header_add_block); ?></textarea>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_header_add_block_meta_box' ) ){
	function pantograph_save_header_add_block_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['header_add_block'] ) || !wp_verify_nonce( $_POST['pantograph_header_add_block_meta_box_nonce'], 'pantograph_header_add_block_callback' ) ) {
			return;
		}
		$header_add_block = (isset($_POST["header_add_block"]) && $_POST["header_add_block"]!='') ? $_POST["header_add_block"] : '';
		update_post_meta($post_id, "header_add_block", $header_add_block);
	}
}

add_action( 'save_post', 'pantograph_save_header_add_block_meta_box' );

if ( ! function_exists( 'pantograph_primary_category_callback' ) ){
	function pantograph_primary_category_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$primary_category = (isset($custom["primary_category"][0])) ? $custom["primary_category"][0] : '';
		wp_nonce_field( 'pantograph_primary_category_callback', 'pantograph_primary_category_meta_box_nonce' );
		?>
		<div class="pagebox">
		<p><?php esc_html_e('Note: If you select a category from here, the post will show only this category and ignore other categories.', 'pantograph' ); ?></p>
		<select name="primary_category" class="widefat">
		  <option value="">Select Category</option>
		  <?php 
		  $post_categories=get_categories();
		  foreach($post_categories as $category) { 
		  ?>
		  <option value="<?php echo $category->cat_ID; ?>" <?php if($primary_category==$category->cat_ID){ echo 'selected'; } ?>><?php echo $category->name; ?></option>
		  <?php } ?>
		 </select>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pantograph_save_primary_category_meta_box' ) ){
	function pantograph_save_primary_category_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['primary_category'] ) || !wp_verify_nonce( $_POST['pantograph_primary_category_meta_box_nonce'], 'pantograph_primary_category_callback' ) ) {
			return;
		}
		$primary_category = (isset($_POST["primary_category"]) && $_POST["primary_category"]!='') ? $_POST["primary_category"] : '';
		update_post_meta($post_id, "primary_category", $primary_category);
	}
}

add_action( 'save_post', 'pantograph_save_primary_category_meta_box' );