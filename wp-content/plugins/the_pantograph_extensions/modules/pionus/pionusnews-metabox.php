<?php

/**
 * Adds a box to the main column on the Post/Page add/edit screens.
 */
function pionusnews_add_meta_box() {
		global $post;
        add_meta_box('pionusnews-header-style', esc_html__( 'Header Style', 'pantograph'), 'pionusnews_meta_box_callback', array('page', 'post'), 'normal', 'high'); 
		add_meta_box( 'pionusnews-header-color', esc_html__('Header Background Color', 'pantograph'), 'pionusnews_header_color_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-header-bottom-pd', esc_html__('Header Bottom Padding', 'pantograph'), 'pionusnews_header_bottom_pd_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-footer-style', esc_html__('Footer Style', 'pantograph'), 'pionusnews_footer_style_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-footer-columns-meta', esc_html__('Footer Columns', 'pantograph'), 'pionusnews_footer_columns_meta_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-footer-top-mg', esc_html__('Footer Top Margin', 'pantograph'), 'pionusnews_footer_top_mg_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-body-color', esc_html__('Body Background Color', 'pantograph'), 'pionusnews_body_color_callback', array('page', 'post'), 'side', 'high');
		add_meta_box( 'pionusnews-container-bg-white-color', esc_html__('Do You Want Box Style Page?', 'pantograph'), 'pionusnews_container_bg_white_callback', array('page', 'post'), 'normal', 'high');
		add_meta_box( 'pionusnews-body-bg-img', esc_html__('Body Background Image URL', 'pantograph'), 'pionusnews_body_bg_img_callback', array('page', 'post'), 'side', 'high');
		add_meta_box( 'pionusnews-widget-border', esc_html__('Widgets Border', 'pantograph'), 'pionusnews_widget_border_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-widget-background', esc_html__('Widgets Background', 'pantograph'), 'pionusnews_widget_background_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-widget-title', esc_html__('Widgets Title Color', 'pantograph'), 'pionusnews_widget_title_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-widget-title-background', esc_html__('Widgets Title Background Color', 'pantograph'), 'pionusnews_widget_title_background_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-widget-text', esc_html__('Widgets Text Color', 'pantograph'), 'pionusnews_widget_text_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-widget-link', esc_html__('Widgets Link Color', 'pantograph'), 'pionusnews_widget_link_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-widget-link-hover', esc_html__('Widgets Link Hover Color', 'pantograph'), 'pionusnews_widget_link_hover_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-featured-posts', esc_html__('Featured Post', 'pantograph'), 'pionusnews_featured_posts_callback', array('post'), 'side', 'high');
		add_meta_box( 'pionusnews-category-position', esc_html__('Category Position', 'pantograph'), 'pionusnews_category_Position_callback', array('post'), 'normal', 'high');
		add_meta_box( 'pionusnews-header-add-block', esc_html__('Header Right Advertisement', 'pantograph'), 'pionusnews_header_add_block_callback', array('page'), 'normal', 'high');
		add_meta_box( 'pionusnews-primary-category', esc_html__('Primary Category', 'pantograph'), 'pionusnews_primary_category_callback', array('post'), 'side', 'low');
		add_meta_box( 'pionusnews-custom-image', esc_html__('Custom Image Or Video Thumbnail URL', 'pantograph'), 'pionusnews_custom_image_url_callback', array('page', 'post'), 'side', 'low');		
		add_meta_box( 'pionusnews-sticky-widget', esc_html__('Do You Want Sticky Sidebar?', 'pantograph'), 'pionusnews_enable_sticky_widget_callback', array('page'), 'side', 'low');
		if( is_object($post) ){
		if ( ('blog-templates/blog-one-column-standard.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-classic-layout.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-grid-layout.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-grid-layout-four.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-grid-layout-three.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-grid-layout-two.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-one-column-transparent.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-photo-layout.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-photo-layout-alt.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-pinterest-layout.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-pinterest-layout-alt.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-simple.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-small-photo.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
			|| ('blog-templates/blog-two-columns-standard.php' == get_post_meta( $post->ID, '_wp_page_template', true ))
		) {
        add_meta_box( 'pionusnews-ppp-limit', esc_html__('How Many Posts Per Page?', 'pantograph'), 'pionusnews_ppp_limit_callback', array('page'), 'side', 'low');
		add_meta_box( 'pionusnews-hide-title', esc_html__('Hide Page Title?', 'pantograph'), 'pionusnews_hide_title_callback', array('page'), 'side', 'low');
		}
		}
}

add_action( 'add_meta_boxes', 'pionusnews_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function pionusnews_meta_box_callback( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'pionusnews_meta_box', 'pionusnews_meta_box_nonce' );

        /*
         * Use get_post_meta() to retrieve an existing value
         * from the database and use the value for the form.
         */
        $value = get_post_meta( $post->ID, 'header_key', true ); //header_key is a meta_key. Change it to whatever you want

        ?>  
		<p><?php esc_attr_e('By default Header Styles is set from "Appearance > Theme-Options > Header > Website Header Styles". If you need different for this page, choose it from here.', 'pantograph'); ?></p>
        <input type="radio" name="pionusnews_header_radio_buttons" value="style_default" <?php checked( $value, 'style_default' ); ?> ><?php _e( "Style Default", 'pantograph'); ?><br>
        <input type="radio" name="pionusnews_header_radio_buttons" value="style_one" <?php checked( $value, 'style_one' ); ?> ><?php _e( "Style One", 'pantograph'); ?><br>
        <input type="radio" name="pionusnews_header_radio_buttons" value="style_two" <?php checked( $value, 'style_two' ); ?> ><?php _e( "Style Two", 'pantograph'); ?><br>
		<input type="radio" name="pionusnews_header_radio_buttons" value="style_three" <?php checked( $value, 'style_three' ); ?> ><?php _e( "Style Three", 'pantograph'); ?><br>
        <input type="radio" name="pionusnews_header_radio_buttons" value="style_four" <?php checked( $value, 'style_four' ); ?> ><?php _e( "Style Four", 'pantograph'); ?><br>
        <input type="radio" name="pionusnews_header_radio_buttons" value="style_five" <?php checked( $value, 'style_five' ); ?> ><?php _e( "Style Five", 'pantograph'); ?><br>
        <input type="radio" name="pionusnews_header_radio_buttons" value="style_six" <?php checked( $value, 'style_six' ); ?> ><?php _e( "Style Six", 'pantograph'); ?><br>
        <input type="radio" name="pionusnews_header_radio_buttons" value="style_seven" <?php checked( $value, 'style_seven' ); ?> ><?php _e( "Style Seven", 'pantograph'); ?><br>
		<input type="radio" name="pionusnews_header_radio_buttons" value="style_eight" <?php checked( $value, 'style_eight' ); ?> ><?php _e( "Style Eight", 'pantograph'); ?><br>
        <?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function pionusnews_save_meta_box_data( $post_id ) {

        /*
         * We need to verify this came from our screen and with proper authorization,
         * because the save_post action can be triggered at other times.
         */

        // Check if our nonce is set.
        if ( !isset( $_POST['pionusnews_meta_box_nonce'] ) ) {
                return;
        }

        // Verify that the nonce is valid.
        if ( !wp_verify_nonce( $_POST['pionusnews_meta_box_nonce'], 'pionusnews_meta_box' ) ) {
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
        $new_meta_value = ( isset( $_POST['pionusnews_header_radio_buttons'] ) ? sanitize_html_class( $_POST['pionusnews_header_radio_buttons'] ) : '' );

        // Update the meta field in the database.
        update_post_meta( $post_id, 'header_key', $new_meta_value );

}

add_action( 'save_post', 'pionusnews_save_meta_box_data' );

if ( ! function_exists( 'pionusnews_footer_style_callback' ) ){
	function pionusnews_footer_style_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$footer_style = (isset($custom["footer_style"][0])) ? $custom["footer_style"][0] : '';
		wp_nonce_field( 'pionusnews_footer_style_callback', 'pionusnews_footer_style_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('By default Footer Styles is set from "Appearance > Theme-Options > Footer > Website Footer Styles". If you need different for this page, choose it from here.', 'pantograph'); ?></p>
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

if ( ! function_exists( 'pionusnews_save_footer_style_meta_box' ) ){
	function pionusnews_save_footer_style_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['footer_style'] ) || !wp_verify_nonce( $_POST['pionusnews_footer_style_meta_box_nonce'], 'pionusnews_footer_style_callback' ) ) {
			return;
		}
		$footer_style = (isset($_POST["footer_style"]) && $_POST["footer_style"]!='') ? $_POST["footer_style"] : '';
		update_post_meta($post_id, "footer_style", $footer_style);
	}
}

add_action( 'save_post', 'pionusnews_save_footer_style_meta_box' );


if ( ! function_exists( 'pionusnews_footer_columns_meta_callback' ) ){
	function pionusnews_footer_columns_meta_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$footer_columns_meta = (isset($custom["footer_columns_meta"][0])) ? $custom["footer_columns_meta"][0] : '';
		wp_nonce_field( 'pionusnews_footer_columns_meta_callback', 'pionusnews_footer_columns_meta_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('By default Footer Columns is set from "Appearance > Theme-Options > Footer > Number of Columns in Footer". If you need different for this page, choose it from here.', 'pantograph'); ?></p>
			<input type="radio" name="footer_columns_meta" value="1" <?php if($footer_columns_meta==1) { echo 'checked'; } ?> class="widefat"/> 1 Column <br/>
			<input type="radio" name="footer_columns_meta" value="2" <?php if($footer_columns_meta==2) { echo 'checked'; } ?> class="widefat"/> 2 Columns <br/>
			<input type="radio" name="footer_columns_meta" value="3" <?php if($footer_columns_meta==3) { echo 'checked'; } ?> class="widefat"/> 3 Columns <br/>
			<input type="radio" name="footer_columns_meta" value="4" <?php if($footer_columns_meta==4) { echo 'checked'; } ?> class="widefat"/> 4 Columns <br/>
			<input type="radio" name="footer_columns_meta" value="5" <?php if($footer_columns_meta==5) { echo 'checked'; } ?> class="widefat"/> 5 Columns <br/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_footer_columns_meta_meta_box' ) ){
	function pionusnews_save_footer_columns_meta_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['footer_columns_meta'] ) || !wp_verify_nonce( $_POST['pionusnews_footer_columns_meta_nonce'], 'pionusnews_footer_columns_meta_callback' ) ) {
			return;
		}
		$footer_columns_meta = (isset($_POST["footer_columns_meta"]) && $_POST["footer_columns_meta"]!='') ? $_POST["footer_columns_meta"] : '';
		update_post_meta($post_id, "footer_columns_meta", $footer_columns_meta);
	}
}

add_action( 'save_post', 'pionusnews_save_footer_columns_meta_meta_box' );

/**
 * Enqueue media and WP-Color Picker in Post/Page add/edit screens.
 */

add_action( 'admin_enqueue_scripts', 'pionusnews_backend_scripts');

if ( ! function_exists( 'pionusnews_backend_scripts' ) ){
	function pionusnews_backend_scripts($hook) {
		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');
	}
}

if ( ! function_exists( 'pionusnews_body_color_callback' ) ){
	function pionusnews_body_color_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$body_color = (isset($custom["body_color"][0])) ? $custom["body_color"][0] : '';
		wp_nonce_field( 'pionusnews_body_color_callback', 'pionusnews_body_color_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Choosse a color for body background.', 'pantograph'); ?></p>
			<input class="color_field" name="body_color" value="<?php esc_attr_e($body_color); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_body_color_meta_box' ) ){
	function pionusnews_save_body_color_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['body_color'] ) || !wp_verify_nonce( $_POST['pionusnews_body_color_meta_box_nonce'], 'pionusnews_body_color_callback' ) ) {
			return;
		}
		$body_color = (isset($_POST["body_color"]) && $_POST["body_color"]!='') ? $_POST["body_color"] : '';
		update_post_meta($post_id, "body_color", $body_color);
	}
}

add_action( 'save_post', 'pionusnews_save_body_color_meta_box' );

if ( ! function_exists( 'pionusnews_header_color_callback' ) ){
	function pionusnews_header_color_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$header_color = (isset($custom["header_color"][0])) ? $custom["header_color"][0] : '';
		wp_nonce_field( 'pionusnews_header_color_callback', 'pionusnews_header_color_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.header_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Choosse a color for header background.', 'pantograph'); ?></p>
			<input class="header_color_field" name="header_color" value="<?php esc_attr_e($header_color); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_header_color_meta_box' ) ){
	function pionusnews_save_header_color_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['header_color'] ) || !wp_verify_nonce( $_POST['pionusnews_header_color_meta_box_nonce'], 'pionusnews_header_color_callback' ) ) {
			return;
		}
		$header_color = (isset($_POST["header_color"]) && $_POST["header_color"]!='') ? $_POST["header_color"] : '';
		update_post_meta($post_id, "header_color", $header_color);
	}
}

add_action( 'save_post', 'pionusnews_save_header_color_meta_box' );

if ( ! function_exists( 'pionusnews_widget_background_callback' ) ){
	function pionusnews_widget_background_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_background = (isset($custom["widget_background"][0])) ? $custom["widget_background"][0] : '';
		wp_nonce_field( 'pionusnews_widget_background_callback', 'pionusnews_widget_background_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_background_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph'); ?></p>
			<input class="widget_background_color_field" name="widget_background" value="<?php esc_attr_e($widget_background); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_widget_background_meta_box' ) ){
	function pionusnews_save_widget_background_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_background'] ) || !wp_verify_nonce( $_POST['pionusnews_widget_background_meta_box_nonce'], 'pionusnews_widget_background_callback' ) ) {
			return;
		}
		$widget_background = (isset($_POST["widget_background"]) && $_POST["widget_background"]!='') ? $_POST["widget_background"] : '';
		update_post_meta($post_id, "widget_background", $widget_background);
	}
}

add_action( 'save_post', 'pionusnews_save_widget_background_meta_box' );

if ( ! function_exists( 'pionusnews_widget_title_background_callback' ) ){
	function pionusnews_widget_title_background_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_title_background = (isset($custom["widget_title_background"][0])) ? $custom["widget_title_background"][0] : '';
		wp_nonce_field( 'pionusnews_widget_title_background_callback', 'pionusnews_widget_title_background_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_title_background_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph'); ?></p>
			<input class="widget_title_background_color_field" name="widget_title_background" value="<?php esc_attr_e($widget_title_background); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_widget_title_background_meta_box' ) ){
	function pionusnews_save_widget_title_background_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_title_background'] ) || !wp_verify_nonce( $_POST['pionusnews_widget_title_background_meta_box_nonce'], 'pionusnews_widget_title_background_callback' ) ) {
			return;
		}
		$widget_title_background = (isset($_POST["widget_title_background"]) && $_POST["widget_title_background"]!='') ? $_POST["widget_title_background"] : '';
		update_post_meta($post_id, "widget_title_background", $widget_title_background);
	}
}

add_action( 'save_post', 'pionusnews_save_widget_title_background_meta_box' );

if ( ! function_exists( 'pionusnews_widget_title_callback' ) ){
	function pionusnews_widget_title_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_title = (isset($custom["widget_title"][0])) ? $custom["widget_title"][0] : '';
		wp_nonce_field( 'pionusnews_widget_title_callback', 'pionusnews_widget_title_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_title_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph'); ?></p>
			<input class="widget_title_color_field" name="widget_title" value="<?php esc_attr_e($widget_title); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_widget_title_meta_box' ) ){
	function pionusnews_save_widget_title_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_title'] ) || !wp_verify_nonce( $_POST['pionusnews_widget_title_meta_box_nonce'], 'pionusnews_widget_title_callback' ) ) {
			return;
		}
		$widget_title = (isset($_POST["widget_title"]) && $_POST["widget_title"]!='') ? $_POST["widget_title"] : '';
		update_post_meta($post_id, "widget_title", $widget_title);
	}
}

add_action( 'save_post', 'pionusnews_save_widget_title_meta_box' );

if ( ! function_exists( 'pionusnews_custom_image_url_callback' ) ){
	function pionusnews_custom_image_url_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$custom_image_url = (isset($custom["custom_image_url"][0])) ? $custom["custom_image_url"][0] : '';
		wp_nonce_field( 'pionusnews_custom_image_url_callback', 'pionusnews_custom_image_url_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Use this feature instead of Featured Image and Video', 'pantograph'); ?></p>
			<input type="text" name="custom_image_url" value="<?php esc_attr_e($custom_image_url); ?>" class="widefat"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_ppp_limit_callback' ) ){
	function pionusnews_ppp_limit_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$pionusnews_ppp_limit = (isset($custom["pionusnews_ppp_limit"][0])) ? $custom["pionusnews_ppp_limit"][0] : '';
		wp_nonce_field( 'pionusnews_ppp_limit_callback', 'pionusnews_ppp_limit_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Input a Numeric Value (example: 5) to limit maximum posts per page for this template.', 'pantograph'); ?></p>
			<input type="text" name="pionusnews_ppp_limit" value="<?php esc_attr_e($pionusnews_ppp_limit); ?>" class="widefat"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_body_bg_img_callback' ) ){
	function pionusnews_body_bg_img_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$pionusnews_body_bg_img = (isset($custom["pionusnews_body_bg_img"][0])) ? $custom["pionusnews_body_bg_img"][0] : '';
		wp_nonce_field( 'pionusnews_body_bg_img_callback', 'pionusnews_body_bg_img_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Usable only for Boxed Style Pages or Posts', 'pantograph'); ?></p>
			<input type="text" name="pionusnews_body_bg_img" value="<?php esc_attr_e($pionusnews_body_bg_img); ?>" class="widefat"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_header_bottom_pd_callback' ) ){
	function pionusnews_header_bottom_pd_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$pionusnews_header_bottom_pd = (isset($custom["pionusnews_header_bottom_pd"][0])) ? $custom["pionusnews_header_bottom_pd"][0] : '';
		wp_nonce_field( 'pionusnews_header_bottom_pd_callback', 'pionusnews_header_bottom_pd_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Bottom Padding Below Header. Example: 60px;', 'pantograph'); ?></p>
			<input type="text" name="pionusnews_header_bottom_pd" value="<?php esc_attr_e($pionusnews_header_bottom_pd); ?>" class="widefat"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_footer_top_mg_callback' ) ){
	function pionusnews_footer_top_mg_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$pionusnews_footer_top_mg = (isset($custom["pionusnews_footer_top_mg"][0])) ? $custom["pionusnews_footer_top_mg"][0] : '';
		wp_nonce_field( 'pionusnews_footer_top_mg_callback', 'pionusnews_footer_top_mg_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Top Margin Above Footer. Example: 60px;', 'pantograph'); ?></p>
			<input type="text" name="pionusnews_footer_top_mg" value="<?php esc_attr_e($pionusnews_footer_top_mg); ?>" class="widefat"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_widget_text_callback' ) ){
	function pionusnews_widget_text_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_text = (isset($custom["widget_text"][0])) ? $custom["widget_text"][0] : '';
		wp_nonce_field( 'pionusnews_widget_text_callback', 'pionusnews_widget_text_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_text_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph'); ?></p>
			<input class="widget_text_color_field" name="widget_text" value="<?php esc_attr_e($widget_text); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_widget_text_meta_box' ) ){
	function pionusnews_save_widget_text_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_text'] ) || !wp_verify_nonce( $_POST['pionusnews_widget_text_meta_box_nonce'], 'pionusnews_widget_text_callback' ) ) {
			return;
		}
		$widget_text = (isset($_POST["widget_text"]) && $_POST["widget_text"]!='') ? $_POST["widget_text"] : '';
		update_post_meta($post_id, "widget_text", $widget_text);
	}
}

add_action( 'save_post', 'pionusnews_save_widget_text_meta_box' );


if ( ! function_exists( 'pionusnews_widget_link_callback' ) ){
	function pionusnews_widget_link_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_link = (isset($custom["widget_link"][0])) ? $custom["widget_link"][0] : '';
		wp_nonce_field( 'pionusnews_widget_link_callback', 'pionusnews_widget_link_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_link_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph'); ?></p>
			<input class="widget_link_color_field" name="widget_link" value="<?php esc_attr_e($widget_link); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_widget_link_meta_box' ) ){
	function pionusnews_save_widget_link_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_link'] ) || !wp_verify_nonce( $_POST['pionusnews_widget_link_meta_box_nonce'], 'pionusnews_widget_link_callback' ) ) {
			return;
		}
		$widget_link = (isset($_POST["widget_link"]) && $_POST["widget_link"]!='') ? $_POST["widget_link"] : '';
		update_post_meta($post_id, "widget_link", $widget_link);
	}
}

add_action( 'save_post', 'pionusnews_save_widget_link_meta_box' );

if ( ! function_exists( 'pionusnews_widget_link_hover_callback' ) ){
	function pionusnews_widget_link_hover_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_link_hover = (isset($custom["widget_link_hover"][0])) ? $custom["widget_link_hover"][0] : '';
		wp_nonce_field( 'pionusnews_widget_link_hover_callback', 'pionusnews_widget_link_hover_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.widget_link_hover_color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph'); ?></p>
			<input class="widget_link_hover_color_field" name="widget_link_hover" value="<?php esc_attr_e($widget_link_hover); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_widget_link_hover_meta_box' ) ){
	function pionusnews_save_widget_link_hover_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_link_hover'] ) || !wp_verify_nonce( $_POST['pionusnews_widget_link_hover_meta_box_nonce'], 'pionusnews_widget_link_hover_callback' ) ) {
			return;
		}
		$widget_link_hover = (isset($_POST["widget_link_hover"]) && $_POST["widget_link_hover"]!='') ? $_POST["widget_link_hover"] : '';
		update_post_meta($post_id, "widget_link_hover", $widget_link_hover);
	}
}

add_action( 'save_post', 'pionusnews_save_widget_link_hover_meta_box' );

if ( ! function_exists( 'pionusnews_save_custom_image_url_meta_box' ) ){
	function pionusnews_save_custom_image_url_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['custom_image_url'] ) || !wp_verify_nonce( $_POST['pionusnews_custom_image_url_meta_box_nonce'], 'pionusnews_custom_image_url_callback' ) ) {
			return;
		}
		$custom_image_url = (isset($_POST["custom_image_url"]) && $_POST["custom_image_url"]!='') ? $_POST["custom_image_url"] : '';
		update_post_meta($post_id, "custom_image_url", $custom_image_url);
	}
}

add_action( 'save_post', 'pionusnews_save_custom_image_url_meta_box' );

if ( ! function_exists( 'pionusnews_save_ppp_limit_callback_meta_box' ) ){
	function pionusnews_save_ppp_limit_callback_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['pionusnews_ppp_limit'] ) || !wp_verify_nonce( $_POST['pionusnews_ppp_limit_meta_box_nonce'], 'pionusnews_ppp_limit_callback' ) ) {
			return;
		}
		$pionusnews_ppp_limit = (isset($_POST["pionusnews_ppp_limit"]) && $_POST["pionusnews_ppp_limit"]!='') ? $_POST["pionusnews_ppp_limit"] : '';
		update_post_meta($post_id, "pionusnews_ppp_limit", $pionusnews_ppp_limit);
	}
}

add_action( 'save_post', 'pionusnews_save_ppp_limit_callback_meta_box' );

if ( ! function_exists( 'pionusnews_save_body_bg_img_meta_box' ) ){
	function pionusnews_save_body_bg_img_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['pionusnews_body_bg_img'] ) || !wp_verify_nonce( $_POST['pionusnews_body_bg_img_meta_box_nonce'], 'pionusnews_body_bg_img_callback' ) ) {
			return;
		}
		$pionusnews_body_bg_img = (isset($_POST["pionusnews_body_bg_img"]) && $_POST["pionusnews_body_bg_img"]!='') ? $_POST["pionusnews_body_bg_img"] : '';
		update_post_meta($post_id, "pionusnews_body_bg_img", $pionusnews_body_bg_img);
	}
}

add_action( 'save_post', 'pionusnews_save_body_bg_img_meta_box' );

if ( ! function_exists( 'pionusnews_header_bottom_pd_meta_box' ) ){
	function pionusnews_header_bottom_pd_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['pionusnews_header_bottom_pd'] ) || !wp_verify_nonce( $_POST['pionusnews_header_bottom_pd_meta_box_nonce'], 'pionusnews_header_bottom_pd_callback' ) ) {
			return;
		}
		$pionusnews_header_bottom_pd = (isset($_POST["pionusnews_header_bottom_pd"]) && $_POST["pionusnews_header_bottom_pd"]!='') ? $_POST["pionusnews_header_bottom_pd"] : '';
		update_post_meta($post_id, "pionusnews_header_bottom_pd", $pionusnews_header_bottom_pd);
	}
}

add_action( 'save_post', 'pionusnews_header_bottom_pd_meta_box' );

if ( ! function_exists( 'pionusnews_footer_top_mg_meta_box' ) ){
	function pionusnews_footer_top_mg_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['pionusnews_footer_top_mg'] ) || !wp_verify_nonce( $_POST['pionusnews_footer_top_mg_meta_box_nonce'], 'pionusnews_footer_top_mg_callback' ) ) {
			return;
		}
		$pionusnews_footer_top_mg = (isset($_POST["pionusnews_footer_top_mg"]) && $_POST["pionusnews_footer_top_mg"]!='') ? $_POST["pionusnews_footer_top_mg"] : '';
		update_post_meta($post_id, "pionusnews_footer_top_mg", $pionusnews_footer_top_mg);
	}
}

add_action( 'save_post', 'pionusnews_footer_top_mg_meta_box' );

if ( ! function_exists( 'pionusnews_featured_posts_callback' ) ){
	function pionusnews_featured_posts_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$featured_posts = (isset($custom["featured_posts"][0])) ? $custom["featured_posts"][0] : '';
		wp_nonce_field( 'pionusnews_featured_posts_callback', 'pionusnews_featured_posts_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Use this feature to make a feature post', 'pantograph'); ?></p>
			<input type="radio" name="featured_posts" value="1" <?php if($featured_posts==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="featured_posts" value="0" <?php if($featured_posts==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_featured_posts_meta_box' ) ){
	function pionusnews_save_featured_posts_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['featured_posts'] ) || !wp_verify_nonce( $_POST['pionusnews_featured_posts_meta_box_nonce'], 'pionusnews_featured_posts_callback' ) ) {
			return;
		}
		$featured_posts = (isset($_POST["featured_posts"]) && $_POST["featured_posts"]!='') ? $_POST["featured_posts"] : '';
		update_post_meta($post_id, "featured_posts", $featured_posts);
	}
}

add_action( 'save_post', 'pionusnews_save_featured_posts_meta_box' );

if ( ! function_exists( 'pionusnews_category_Position_callback' ) ){
	function pionusnews_category_Position_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$category_Position = (isset($custom["category_Position"][0])) ? $custom["category_Position"][0] : '';
		wp_nonce_field( 'pionusnews_category_Position_callback', 'pionusnews_category_Position_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Use this feature to show category list Top Or Bottom', 'pantograph'); ?></p>
			<input type="radio" name="category_Position" value="1" <?php if($category_Position==1) { echo 'checked'; } ?> class="widefat"/> Top 
			<input type="radio" name="category_Position" value="0" <?php if($category_Position==0) { echo 'checked'; } ?> class="widefat"/> Bottom
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_category_Position_meta_box' ) ){
	function pionusnews_save_category_Position_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['category_Position'] ) || !wp_verify_nonce( $_POST['pionusnews_category_Position_meta_box_nonce'], 'pionusnews_category_Position_callback' ) ) {
			return;
		}
		$category_Position = (isset($_POST["category_Position"]) && $_POST["category_Position"]!='') ? $_POST["category_Position"] : '';
		update_post_meta($post_id, "category_Position", $category_Position);
	}
}

add_action( 'save_post', 'pionusnews_save_category_Position_meta_box' );

if ( ! function_exists( 'pionusnews_container_bg_white_callback' ) ){
	function pionusnews_container_bg_white_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$container_bg_white = (isset($custom["container_bg_white"][0])) ? $custom["container_bg_white"][0] : '';
		wp_nonce_field( 'pionusnews_container_bg_white_callback', 'pionusnews_container_bg_white_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Use this feature to make white background container', 'pantograph'); ?></p>
			<input type="radio" name="container_bg_white" value="1" <?php if($container_bg_white==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="container_bg_white" value="0" <?php if($container_bg_white==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_container_bg_white_meta_box' ) ){
	function pionusnews_save_container_bg_white_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['container_bg_white'] ) || !wp_verify_nonce( $_POST['pionusnews_container_bg_white_meta_box_nonce'], 'pionusnews_container_bg_white_callback' ) ) {
			return;
		}
		$container_bg_white = (isset($_POST["container_bg_white"]) && $_POST["container_bg_white"]!='') ? $_POST["container_bg_white"] : '';
		update_post_meta($post_id, "container_bg_white", $container_bg_white);
	}
}

add_action( 'save_post', 'pionusnews_save_container_bg_white_meta_box' );



if ( ! function_exists( 'pionusnews_enable_sticky_widget_callback' ) ){
	function pionusnews_enable_sticky_widget_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$enable_sticky_widget = (isset($custom["enable_sticky_widget"][0])) ? $custom["enable_sticky_widget"][0] : '';
		wp_nonce_field( 'pionusnews_enable_sticky_widget_callback', 'pionusnews_enable_sticky_widget_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Works if this page is using Widgetised Sidebar VC element.', 'pantograph'); ?></p>
			<input type="radio" name="enable_sticky_widget" value="1" <?php if($enable_sticky_widget==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="enable_sticky_widget" value="0" <?php if($enable_sticky_widget==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_enable_sticky_widget_meta_box' ) ){
	function pionusnews_save_enable_sticky_widget_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['enable_sticky_widget'] ) || !wp_verify_nonce( $_POST['pionusnews_enable_sticky_widget_meta_box_nonce'], 'pionusnews_enable_sticky_widget_callback' ) ) {
			return;
		}
		$enable_sticky_widget = (isset($_POST["enable_sticky_widget"]) && $_POST["enable_sticky_widget"]!='') ? $_POST["enable_sticky_widget"] : '';
		update_post_meta($post_id, "enable_sticky_widget", $enable_sticky_widget);
	}
}

add_action( 'save_post', 'pionusnews_save_enable_sticky_widget_meta_box' );

if ( ! function_exists( 'pionusnews_hide_title_callback' ) ){
	function pionusnews_hide_title_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$pionusnews_hide_title = (isset($custom["pionusnews_hide_title"][0])) ? $custom["pionusnews_hide_title"][0] : '';
		wp_nonce_field( 'pionusnews_hide_title_callback', 'pionusnews_hide_title_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Hide the top section where Page Title appears.', 'pantograph'); ?></p>
			<input type="radio" name="pionusnews_hide_title" value="1" <?php if($pionusnews_hide_title==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="pionusnews_hide_title" value="0" <?php if($pionusnews_hide_title==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_hide_title_meta_box' ) ){
	function pionusnews_save_hide_title_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['pionusnews_hide_title'] ) || !wp_verify_nonce( $_POST['pionusnews_hide_title_meta_box_nonce'], 'pionusnews_hide_title_callback' ) ) {
			return;
		}
		$pionusnews_hide_title = (isset($_POST["pionusnews_hide_title"]) && $_POST["pionusnews_hide_title"]!='') ? $_POST["pionusnews_hide_title"] : '';
		update_post_meta($post_id, "pionusnews_hide_title", $pionusnews_hide_title);
	}
}

add_action( 'save_post', 'pionusnews_save_hide_title_meta_box' );

if ( ! function_exists( 'pionusnews_widget_border_callback' ) ){
	function pionusnews_widget_border_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$widget_border = (isset($custom["widget_border"][0])) ? $custom["widget_border"][0] : '';
		wp_nonce_field( 'pionusnews_widget_border_callback', 'pionusnews_widget_border_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work while widget is available for this page', 'pantograph'); ?></p>
			<input type="radio" name="widget_border" value="1" <?php if($widget_border==1) { echo 'checked'; } ?> class="widefat"/> Yes 
			<input type="radio" name="widget_border" value="0" <?php if($widget_border==0) { echo 'checked'; } ?> class="widefat"/> No
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_widget_border_meta_box' ) ){
	function pionusnews_save_widget_border_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['widget_border'] ) || !wp_verify_nonce( $_POST['pionusnews_widget_border_meta_box_nonce'], 'pionusnews_widget_border_callback' ) ) {
			return;
		}
		$widget_border = (isset($_POST["widget_border"]) && $_POST["widget_border"]!='') ? $_POST["widget_border"] : '';
		update_post_meta($post_id, "widget_border", $widget_border);
	}
}

add_action( 'save_post', 'pionusnews_save_widget_border_meta_box' );

if ( ! function_exists( 'pionusnews_header_add_block_callback' ) ){
	function pionusnews_header_add_block_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$header_add_block = (isset($custom["header_add_block"][0])) ? $custom["header_add_block"][0] : '';
		wp_nonce_field( 'pionusnews_header_add_block_callback', 'pionusnews_header_add_block_meta_box_nonce' );
		?>
		<div class="pagebox">
			<p><?php esc_attr_e('Note: This feature will work only for header right sidebar advertisement', 'pantograph'); ?></p>
			<textarea style="overflow:auto;resize:none" rows="5" cols="20" name="header_add_block" class="widefat"><?php esc_attr_e($header_add_block); ?></textarea>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pionusnews_save_header_add_block_meta_box' ) ){
	function pionusnews_save_header_add_block_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['header_add_block'] ) || !wp_verify_nonce( $_POST['pionusnews_header_add_block_meta_box_nonce'], 'pionusnews_header_add_block_callback' ) ) {
			return;
		}
		$header_add_block = (isset($_POST["header_add_block"]) && $_POST["header_add_block"]!='') ? $_POST["header_add_block"] : '';
		update_post_meta($post_id, "header_add_block", $header_add_block);
	}
}

add_action( 'save_post', 'pionusnews_save_header_add_block_meta_box' );

if ( ! function_exists( 'pionusnews_primary_category_callback' ) ){
	function pionusnews_primary_category_callback( $post ){
		$custom = get_post_custom( $post->ID );
		$primary_category = (isset($custom["primary_category"][0])) ? $custom["primary_category"][0] : '';
		wp_nonce_field( 'pionusnews_primary_category_callback', 'pionusnews_primary_category_meta_box_nonce' );
		?>
		<div class="pagebox">
		<p><?php esc_html_e('Note: If you select a category from here, the post will show only this category and ignore other categories.', 'pantograph'); ?></p>
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

if ( ! function_exists( 'pionusnews_save_primary_category_meta_box' ) ){
	function pionusnews_save_primary_category_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['primary_category'] ) || !wp_verify_nonce( $_POST['pionusnews_primary_category_meta_box_nonce'], 'pionusnews_primary_category_callback' ) ) {
			return;
		}
		$primary_category = (isset($_POST["primary_category"]) && $_POST["primary_category"]!='') ? $_POST["primary_category"] : '';
		update_post_meta($post_id, "primary_category", $primary_category);
	}
}

add_action( 'save_post', 'pionusnews_save_primary_category_meta_box' );