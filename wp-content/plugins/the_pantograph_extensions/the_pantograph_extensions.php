<?php
/*
Plugin Name: The Pantograph Extensions
Plugin URI: http://fluentthemes.com
Description: Extensions for Pantograph Wordpress Theme. Supplied as a separate plugin so that the users do not find empty shortcodes on changing the theme.
Version: 2.6
Author: Fluent-Themes 
Author URI: https://themeforest.net/user/fluent-themes
*/

#-----------------------------------------------------------------
# Modifying new_wp_is_mobile function of WordPress
#-----------------------------------------------------------------
function new_wp_is_mobile() {
    $classes = get_body_class();		
	static $is_mobile;
    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
            if (in_array('width_less_than_768',$classes)) {
				$is_mobile = false;
			} else {
				$is_mobile = false;
			}
    } else {
        $is_mobile = false;
    }
    return $is_mobile; 
}

$active_theme = wp_get_theme(); // gets the current theme
if ( 'PantoGraph' == $active_theme->name || 'PantoGraph' == $active_theme->parent_theme ) { //Check if PantoGraph theme is active or not 
$favorite_theme_style = get_option( 'favorite_theme_style' );
if ($favorite_theme_style == 'style_new'){
// **********************************************************************// 
// ! Excerpt and Content Limit
// **********************************************************************//
function pionusnews_excerpt($category_excerpt_limit) {
      $excerpt = explode(' ', get_the_excerpt(), $category_excerpt_limit);

      if (count($excerpt) >= $category_excerpt_limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

function pionusnews_content($category_excerpt_limit) {
    $content = explode(' ', get_the_content(), $category_excerpt_limit);

    if (count($content) >= $category_excerpt_limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}

// **********************************************************************// 
// ! Content Limit
// **********************************************************************//
function the_title_excerpt($before = '', $after = '', $echo = true, $length = false) 
  {
    $title = get_the_title();

    if ( $length && is_numeric($length) ) {
        $title = substr( $title, 0, $length );
    }

    if ( strlen($title)> 0 ) {
        $title = apply_filters('the_title_excerpt', $before . $title . $after, $before, $after);
        if ( $echo )
            echo esc_attr($title);
        else
            return $title;
    }
}

#-----------------------------------------------------------------
# Theme Shortcodes
#-----------------------------------------------------------------

require_once 'modules/pionus/shortcodes.php';

#-----------------------------------------------------------------
# Header Meta Box
#-----------------------------------------------------------------

require_once 'modules/pionus/pionusnews-metabox.php';

#-----------------------------------------------------------------
# Widgets Shortcode
#-----------------------------------------------------------------

require_once 'modules/pionus/widgets/instagram/instagram-widget.php';
require_once 'modules/pionus/widgets/twitter/twitter_api.php';
require_once 'modules/pionus/widgets/twitter/twitter-widget.php';
require_once 'modules/pionus/widgets/social-counter/social_counter_widget.php';

#-----------------------------------------------------------------
# Menu Logo Image
#-----------------------------------------------------------------

require_once 'modules/pionus/pionusnews_menu_logo/pionusnews_menu_logo.php';

#-----------------------------------------------------------------
# Adding Styles in the theme for this plugin
#-----------------------------------------------------------------
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_pionusnews_plugin_styles' );

/**
 * Register style sheet.
 */
function register_pionusnews_plugin_styles() {
	wp_register_style( 'the_pantograph_extensions', plugins_url( 'the_pantograph_extensions/modules/pionus/css/the_pionusnews_extensions.css' ) );
	wp_enqueue_style( 'the_pantograph_extensions' );
	
#-----------------------------------------------------------------
# Widgets Css
#-----------------------------------------------------------------
	wp_enqueue_style( 'ft_tremendous-instagram-style', plugins_url( 'the_pantograph_extensions/modules/pionus/widgets/instagram/css/style.css' ) );
	wp_enqueue_style( 'ft_tremendous-twitter-style', plugins_url( 'the_pantograph_extensions/modules/pionus/widgets/twitter/css/style.css' ) );
	wp_enqueue_style( 'ft_tremendous-social-counter-style', plugins_url( 'the_pantograph_extensions/modules/pionus/widgets/social-counter/css/style.css' ) );
}

// Register Jquery Scripts.
add_action( 'wp_enqueue_scripts', 'register_pionusnews_plugin_jquery' );

/**
 * Register style sheet.
 */
function register_pionusnews_plugin_jquery() {
	//wp_enqueue_script('jquery');
	wp_enqueue_script( 'the_pantograph_extensions', plugins_url( 'the_pantograph_extensions/modules/pionus/js/the_pionusnews_extensions.js' ), array('jquery'), '1.0.0' );
	wp_enqueue_script( 'ft_tremendous-jquery.simplyscroll.min', plugins_url( 'the_pantograph_extensions/modules/pionus/js/jquery.simplyscroll.min.js' ), array('jquery'), '1.0', true );
}


#-----------------------------------------------------------------
# Custom Widgets
#-----------------------------------------------------------------
require_once 'modules/pionus/widgets.php';

#-----------------------------------------------------------------
# One Click Demo Import
#-----------------------------------------------------------------
class OCDC_Plugin {
	/**
	 * Constructor for this class.
	 */
	public function __construct() {
		/**
		 * Display admin error message if PHP version is older than 5.3.2.
		 * Otherwise execute the main plugin class.
		 */
		if ( version_compare( phpversion(), '5.3.2', '<' ) ) {
			add_action( 'admin_notices', array( $this, 'old_php_admin_error_notice' ) );
		}
		else {
			// Set plugin constants.
			$this->set_plugin_constants();

			// Composer autoloader.
			require_once PT_OCDC_PATH . 'one-click-demo-content/vendor/autoload.php';

			// Instantiate the main plugin class *Singleton*.
			$pt_one_click_demo_import = OCDC\OneClickDemoImport::get_instance();

			// Register WP CLI commands
			if ( defined( 'WP_CLI' ) && WP_CLI ) {
				WP_CLI::add_command( 'ocdc list', array( 'OCDC\WPCLICommands', 'list_predefined' ) );
				WP_CLI::add_command( 'ocdc import', array( 'OCDC\WPCLICommands', 'import' ) );
			}
		}
	}


	/**
	 * Display an admin error notice when PHP is older the version 5.3.2.
	 * Hook it to the 'admin_notices' action.
	 */
	public function old_php_admin_error_notice() {
		$message = sprintf( esc_html__( 'The %2$sOne Click Demo Import%3$s plugin requires %2$sPHP 5.3.2+%3$s to run properly. Please contact your hosting company and ask them to update the PHP version of your site to at least PHP 5.3.2.%4$s Your current version of PHP: %2$s%1$s%3$s', 'pantograph'), phpversion(), '<strong>', '</strong>', '<br>' );

		printf( '<div class="notice notice-error"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}


	/**
	 * Set plugin constants.
	 *
	 * Path/URL to root of this plugin, with trailing slash and plugin version.
	 */
	private function set_plugin_constants() {
		// Path/URL to root of this plugin, with trailing slash.
		if ( ! defined( 'PT_OCDC_PATH' ) ) {
			define( 'PT_OCDC_PATH', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'PT_OCDC_URL' ) ) {
			define( 'PT_OCDC_URL', plugin_dir_url( __FILE__ ) );
		}

		// Action hook to set the plugin version constant.
		add_action( 'admin_init', array( $this, 'set_plugin_version_constant' ) );
	}


	/**
	 * Set plugin version constant -> PT_OCDC_VERSION.
	 */
	public function set_plugin_version_constant() {
		if ( ! defined( 'PT_OCDC_VERSION' ) ) {
			$plugin_data = get_plugin_data( __FILE__ );
			define( 'PT_OCDC_VERSION', $plugin_data['Version'] );
		}
	}
}

// Instantiate the plugin class.
$ocdc_plugin = new OCDC_Plugin();

add_action( 'init', 'pionusnews_create_post_type' );
function pionusnews_create_post_type() {

register_post_type( 'mega_menu',
array(
'labels' => array(
'name' => __( 'Mega Menu' ),
'singular_name' => __( 'Mega Menu' ),
'add_new' => __( 'Add New' ),
'add_new_item' => __( 'Add New Mega Menu' ),
'edit_item' => __( 'Edit Mega Menu' ),
'new_item' => __( 'New Mega Menu' ),
'view_item' => __( 'View Mega Menu' ),
'not_found' => __( 'Sorry, we couldn\'t find the Mega Menu you are looking for.' )
),
'public' => true,
'publicly_queryable' => false,
'exclude_from_search' => true,
'menu_position' => 14,
'has_archive' => false,
'hierarchical' => false,
'capability_type' => 'page',
'rewrite' => array( 'slug' => 'mega_menu' ),
'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
)
);
}



/*================START For Custome Category Template =================*/
class pionusnews_Custom_Category_Templates {

	var $template;

	function __construct() {
		if( is_admin() ) {
			add_action( 'category_add_form_fields', array( $this, 'pionusnews_category_add_template_option') );
			add_action( 'category_edit_form_fields', array( $this, 'pionusnews_category_edit_template_option') );
			add_action( 'created_category', array( $this, 'pionusnews_category_save_option' ), 10, 2 );
			add_action( 'edited_category', array( $this, 'pionusnews_category_save_option' ), 10, 2 );
			add_action( 'delete_category', array( $this, 'pionusnews_category_delete_option' ) );
		} else {
			add_filter( 'category_template', array( $this, 'pionusnews_category_template' ) );
		}
	}

	function pionusnews_category_template( $template ) {
		$category_templates = get_option( 'category_templates', array() );
		$category = get_queried_object();
		$id = $category->term_id;
		if( isset( $category_templates[$id] ) ) {
			$tmpl = locate_template( $category_templates[$id] );
			if( 'default' !== $category_templates[$id] && '' !== $tmpl ) {
				$this->template = $category_templates[$id];
				add_filter( 'body_class', array( $this, 'pionusnews_category_body_class' ) );
				return $tmpl;
			}
		}

		return $template;
	}

	function pionusnews_category_body_class( $classes ) {
		$template = sanitize_html_class( str_replace( '.', '-', $this->template ) );
		$classes[] = 'category-template-' . $template;

		return $classes;
	}

	function pionusnews_category_save_option( $term_id ) {
		if( isset( $_POST['custom-category-template'] ) ) {
			$template = trim( $_POST['custom-category-template'] );
			$category_templates = get_option( 'category_templates', array() );
			if( 'default' == $template ) {
				unset( $category_templates[$term_id] );
			} else {
				$category_templates[$term_id] = $template;
			}
			update_option( 'category_templates', $category_templates );
		}
	}

	function pionusnews_category_add_template_option() {
		$category_templates = $this->pionusnews_get_category_templates();
		if( empty( $category_templates ) )
			return;

		?>
		<div class="form-field">
			<label for="custom-category-template"><?php esc_html_e( 'Choose a Template', 'custom-category-templates' ); ?></label>
			<select name="custom-category-template" id="custom-category-template" class="widefat">
				<?php $this->pionusnews_category_templates_dropdown(); ?>
			</select>
		</div>
	<?php }

	function pionusnews_category_edit_template_option() {
		$category_templates = $this->pionusnews_get_category_templates();
		if( empty( $category_templates ) )
			return;

		$id = $_REQUEST['tag_ID'];
		$templates = get_option( 'category_templates', array() );
		$template = isset( $templates[$id] ) ? $templates[$id] : null;
		?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="custom-category-template"><?php esc_html_e( 'Choose a Template', 'custom-category-templates' ); ?></label>
			</th>
			<td>
				<select name="custom-category-template" id="custom-category-template" class="widefat">
					<?php $this->pionusnews_category_templates_dropdown( $template ) ?>
				</select>
			</td>
		</tr>
	<?php }

	function pionusnews_category_delete_option( $term_id ) {
		$category_templates = get_option( 'category_templates', array() );
		if( isset( $category_templates[$term_id] ) ) {
			unset( $category_templates[$term_id] );
			update_option( 'category_templates', $category_templates );
		}
	}

	/**
	 * Generate the options for the category templates list
	 *
	 * @since 0.1
	 * @return void
	 */
	function pionusnews_category_templates_dropdown( $default = null ) {
		$templates = array_flip( $this->pionusnews_get_category_templates() );
		ksort( $templates );
		echo "\n\t<option value='0'>Select a Template</option>";
		foreach( array_keys( $templates ) as $template )
			: if ( $default == $templates[$template] )
				$selected = " selected='selected'";
			else
				$selected = '';
		echo "\n\t<option value='".$templates[$template]."' $selected>$template</option>";
		endforeach;
	}

	/**
	 * Get a list of Category Templates available in the current theme
	 *
	 * @since 0.1
	 * @return array Key is the template name, value is the filename of the template
	 */
	function pionusnews_get_category_templates( $template = null ) {
		$category_templates = array();
		$theme = wp_get_theme( $template );
		$files = (array) $theme->get_files( 'php', 1 );

		foreach ( $files as $file => $full_path ) {
			if ( ! preg_match( '|Category Template:(.*)$|mi', file_get_contents( $full_path ), $header ) )
				continue;
			$category_templates[ $file ] = _cleanup_header_comment( $header[1] );
		}

		if ( $theme->parent() )
			$category_templates += $this->pionusnews_get_category_templates( $theme->get_template() );

		return $category_templates;
	}
}
$custom_category_templates = new pionusnews_Custom_Category_Templates();
/*================ For Custome Category Template END =================*/

 
 // **********************************************************************// 
// ! Count Post View
// **********************************************************************//
function pionusnews_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function pionusnews_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function pionusnews_wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function pionusnews_wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    pionusnews_wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'pionusnews_wpb_track_post_views');

function pionusnews_wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*===================================================================================
 * Add Author Links
 * =================================================================================*/
function pionusnews_add_to_author_profile( $contactmethods ) {
	
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['user_profile_email'] = 'Add Email';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'pionusnews_add_to_author_profile', 10, 1);

function pionusnews_social_share(){
	global $post;
	$postid=$post->ID;
	$pinterest = esc_url(rtrim(get_permalink(),'/'));
	
	$url = esc_url(wp_get_attachment_url( get_post_thumbnail_id($postid) ));
	echo '<a class="fab fa-facebook-f" target="_blank" href="http://www.facebook.com/sharer.php?u='.esc_url(get_the_permalink()).'" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"></a>
		<a class="fab fa-twitter" target="_blank" href="http://twitter.com/home?status='.esc_url(get_the_permalink()).'" title="Share this post on Twitter!"></a>
		<a class="fab fa-google-plus-g" target="_blank" href="https://plus.google.com/share?url='.esc_url(rtrim(get_permalink(),'/')).'" title="Share this post on Google+!"></a>
		<a class="fab fa-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url='.esc_url($pinterest).'&media='.esc_url($url).'" title="Pin this post on Pinterest!"></a>
		<a class="fab fa-linkedin-in" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.esc_url(get_the_permalink()).'" title="Share this post on LinkedIn!" rel="nofollow"></a>
	';
}

function pionusnews_social_share_left_right(){
	global $post;
	$postid=$post->ID;
	$url = esc_url(wp_get_attachment_url( get_post_thumbnail_id($postid) ));
	echo '
	<ul class="mbm_social">
		<li><a class="social-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u='.esc_url(get_the_permalink()).'">
			<i class="fab fa-facebook-f"><small>facebook</small></i>
			
			<div class="tooltip"><span>facebook</span></div>
			</a>
		</li>
		<li><a class="social-twitter" target="_blank" href="http://twitter.com/home?status='.esc_url(get_the_permalink()).'">
			<i class="fab fa-twitter"><small>Twitter</small></i>
			<div class="tooltip"><span>Twitter</span></div>
			</a>
		</li>
		<li><a class="social-google-plus" target="_blank" href="https://plus.google.com/share?url='.esc_url(rtrim(get_permalink(),'/')).'">
			<i class="fab fa-google-plus-g"><small>google +</small></i>
			<div class="tooltip"><span>google</span></div>
			</a>
		</li>
		<li><a class="social-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.esc_url(get_the_permalink()).'">
			<i class="fab  fa-linkedin-in"><small>linkedin</small></i>
			<div class="tooltip"><span>linkedin</span></div>
			</a>
		</li>
	</ul>
	';
}
	
add_filter( 'widget_tag_cloud_args', 'pionusnews_change_tag_cloud_font_sizes');
/**
 * Change the Tag Cloud's Font Sizes.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function pionusnews_change_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '8';
    $args['largest'] = '15';

    return $args;
}


add_filter ('the_content', 'pionusnews_pagination_after_post',1);
function pionusnews_pagination_after_post($content) {
   if(is_single()) {
      $content.= '<div class="pagination">' . wp_link_pages('before=&after=&next_or_number=next&nextpagelink=Next Part&previouspagelink=Previous Part&echo=0') . '</div>';
   }
   return $content;
}

/****
============= Color Picker in Category ========== Start
****/

/**
 * Add new colorpicker field to "Add new Category" screen
 * - https://developer.wordpress.org/reference/hooks/taxonomy_add_form_fields/
 *
 * @param String $taxonomy
 *
 * @return void
 */
function colorpicker_field_add_new_category( $taxonomy ) {

  ?>

    <div class="form-field term-colorpicker-wrap">
        <label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'pantograph'); ?></label>
        <input name="_category_color" value="" class="colorpicker" id="term-colorpicker" />
        <p class="description"><?php esc_html_e( 'Choose category color', 'pantograph'); ?></p>
    </div>

  <?php

}
add_action( 'category_add_form_fields', 'colorpicker_field_add_new_category' );  // Variable Hook Name

/**
 * Add new colopicker field to "Edit Category" screen
 * - https://developer.wordpress.org/reference/hooks/taxonomy_add_form_fields/
 *
 * @param WP_Term_Object $term
 *
 * @return void
 */
function colorpicker_field_edit_category( $term ) {

    $color = get_term_meta( $term->term_id, '_category_color', true );
    $color = ( ! empty( $color ) ) ? "#{$color}" : '';

  ?>

    <tr class="form-field term-colorpicker-wrap">
        <th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'pantograph'); ?></label></th>
        <td>
            <input name="_category_color" value="<?php echo esc_attr($color); ?>" class="colorpicker" id="term-colorpicker" />
            <p class="description"><?php esc_html_e( 'Choose category color', 'pantograph'); ?></p>
        </td>
    </tr>

  <?php


}
add_action( 'category_edit_form_fields', 'colorpicker_field_edit_category' );   // Variable Hook Name

/**
 * Term Metadata - Save Created and Edited Term Metadata
 * - https://developer.wordpress.org/reference/hooks/created_taxonomy/
 * - https://developer.wordpress.org/reference/hooks/edited_taxonomy/
 *
 * @param Integer $term_id
 *
 * @return void
 */
function save_termmeta( $term_id ) {

    // Save term color if possible
    if( isset( $_POST['_category_color'] ) && ! empty( $_POST['_category_color'] ) ) {
        update_term_meta( $term_id, '_category_color', sanitize_hex_color_no_hash( $_POST['_category_color'] ) );
    } else {
        delete_term_meta( $term_id, '_category_color' );
    }

}
add_action( 'created_category', 'save_termmeta' );  // Variable Hook Name
add_action( 'edited_category',  'save_termmeta' );  // Variable Hook Name

/**
 * Enqueue colorpicker styles and scripts.
 * - https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
 *
 * @return void
 */
function category_colorpicker_enqueue( $taxonomy ) {

    if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }

    // Colorpicker Scripts
    wp_enqueue_script( 'wp-color-picker' );

    // Colorpicker Styles
    wp_enqueue_style( 'wp-color-picker' );

}
add_action( 'admin_enqueue_scripts', 'category_colorpicker_enqueue' );

/**
 * Print javascript to initialize the colorpicker
 * - https://developer.wordpress.org/reference/hooks/admin_print_scripts/
 *
 * @return void
 */
function colorpicker_init_inline() {

    if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }

  ?>

    <script>
        jQuery( document ).ready( function( $ ) {

            $( '.colorpicker' ).wpColorPicker();

        } ); // End Document Ready JQuery
    </script>

  <?php

}
add_action( 'admin_print_scripts', 'colorpicker_init_inline', 20 );



/****
============= Color Picker in Category ========== End
****/

/****
============= Post Limit in Category ========== Start
****/

function add_category_post_limit( $taxonomy ) {

  ?>

    <div class="form-field term-post-limit-wrap">
        <label for="term-post-limit"><?php esc_html_e( 'Post Limit', 'pantograph'); ?></label>
        <input name="this_cat_post_limit" value="" id="term-post-limit" class="widefat" />
        <p class="description"><?php esc_html_e( 'How many Post want to show per page for this category', 'pantograph'); ?></p>
    </div>

  <?php

}
add_action( 'category_add_form_fields', 'add_category_post_limit' );  // Variable Hook Name

function category_post_limit_field_edit_category( $term ) {

    $this_cat_post_limit = get_term_meta( $term->term_id, 'this_cat_post_limit', true );

  ?>

    <tr class="form-field term-post-limit-wrap">
        <th scope="row"><label for="term-post-limit"><?php esc_html_e( 'Post Limit', 'pantograph'); ?></label></th>
        <td>
            <input name="this_cat_post_limit" class="widefat" value="<?php echo esc_attr($this_cat_post_limit); ?>" id="term-post-limit" />
            <p class="description"><?php esc_html_e( 'How many Post want to show per page for this category', 'pantograph'); ?></p>
        </td>
    </tr>

  <?php


}
add_action( 'category_edit_form_fields', 'category_post_limit_field_edit_category' );   // Variable Hook Name


function save_category_post_limit_termmeta( $term_id ) {

    // Save term post_limit if possible
    if( isset( $_POST['this_cat_post_limit'] ) && ! empty( $_POST['this_cat_post_limit'] ) ) {
        update_term_meta( $term_id, 'this_cat_post_limit', $_POST['this_cat_post_limit'] );
    } else {
        delete_term_meta( $term_id, 'this_cat_post_limit' );
    }

}
add_action( 'created_category', 'save_category_post_limit_termmeta' );  // Variable Hook Name
add_action( 'edited_category',  'save_category_post_limit_termmeta' );  // Variable Hook Name

/****
============= Post Limit in Category ========== End
****/

//add extra fields to category edit form hook
add_action ( 'category_add_form_fields', 'add_extra_category_fields');

//add extra fields to category edit form callback function
function add_extra_category_fields() {    //check for existing featured ID
?>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="header_layout"><?php esc_html_e('Header Layout'); ?></label></th>
	<td>
		<select name="Cat_meta[header_layout]" id="Cat_meta[header_layout]" class="widefat">
		  <option value="default"><?php esc_html_e( 'Header Style Default', 'pantograph'); ?></option>
		  <option value="1"><?php esc_html_e( 'Header Style One', 'pantograph'); ?></option>
		  <option value="2"><?php esc_html_e( 'Header Style Two', 'pantograph'); ?></option>
		  <option value="3"><?php esc_html_e( 'Header Style Three', 'pantograph'); ?></option>
		  <option value="4"><?php esc_html_e( 'Header Style Four', 'pantograph'); ?></option>
		  <option value="5"><?php esc_html_e( 'Header Style Five', 'pantograph'); ?></option>
		  <option value="6"><?php esc_html_e( 'Header Style Six', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for Header Style'); ?></span>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="single_page_layout"><?php esc_html_e('Single Page Layout', 'pantograph'); ?></label></th>
	<td>
		<select name="Cat_meta[single_page_layout]" id="Cat_meta[single_page_layout]" class="widefat">
		  <option value="0"><?php esc_html_e('Default Template', 'pantograph'); ?></option>
		  <option value="1"><?php esc_html_e('General Template', 'pantograph'); ?></option>
		  <option value="2"><?php esc_html_e('Large Image and Title', 'pantograph'); ?></option>
		  <option value="3"><?php esc_html_e('Full Width Image and Title', 'pantograph'); ?></option>
		  <option value="4"><?php esc_html_e('Without Sidebar', 'pantograph'); ?></option>
		  <option value="5"><?php esc_html_e('Title Overlay', 'pantograph'); ?></option>
		  <option value="6"><?php esc_html_e('Transparent Overlay', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for single page style'); ?></span>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="custom_cat_title"><?php esc_html_e('Category Title'); ?></label></th>
<td>
<input type="text" name="Cat_meta[custom_cat_title]" id="Cat_meta[custom_cat_title]" class="widefat" value=""><br />
        <span class="description"><?php esc_html_e('Add title for this category page'); ?></span>
    </td>
</tr>
<br/>

<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="extra3"><?php esc_html_e('Show Category Title'); ?></label></th>
<td>
        
	<input type="radio" name="Cat_meta[show_hide_title]" value="1" checked="checked"> <?php esc_html_e( 'Yes', 'pantograph'); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_title]" value="0"> <?php esc_html_e( 'No', 'pantograph'); ?><br/>
    </td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="extra4"><?php esc_html_e('Show Category Description'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_hide_cat_desc]" value="1"> <?php esc_html_e( 'Yes', 'pantograph'); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_cat_desc]" value="0" checked="checked"> <?php esc_html_e( 'No', 'pantograph'); ?><br/>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Category Page Image'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_cat_img]" value="1"> <?php esc_html_e( 'Custom Image', 'pantograph'); ?><br>
    <input type="radio" name="Cat_meta[show_cat_img]" value="0" checked="checked"> <?php esc_html_e( 'Featured Image', 'pantograph'); ?><br>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="category_excerpt_limit"><?php esc_html_e('Excerpt Word Limit'); ?></label></th>
<td>
<input type="text" name="Cat_meta[category_excerpt_limit]" id="Cat_meta[category_excerpt_limit]" class="widefat" value=""><br />
        <span class="description"><?php esc_html_e('Excerpt Word Limit in this Category page.'); ?></span>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Show Category Breadcrumb'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_hide_breadcrumb]" value="1"> <?php esc_html_e( 'Yes', 'pantograph'); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_breadcrumb]" value="0" checked="checked"> <?php esc_html_e( 'No', 'pantograph'); ?><br/>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Top Posts Block'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[cat_top_posts]" value="1"> <?php esc_html_e( 'Yes', 'pantograph'); ?><br/>
    <input type="radio" name="Cat_meta[cat_top_posts]" value="0" checked="checked"> <?php esc_html_e( 'No', 'pantograph'); ?><br/>
</td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="cat_top_post_template"><?php esc_html_e('Top Post Template.'); ?></label></th>
	<td>
		<select name="Cat_meta[cat_top_post_template]" id="Cat_meta[cat_top_post_template]" class="widefat">
		  <option value="default"><?php esc_html_e( 'Top Post Style Default', 'pantograph'); ?></option>
		  <option value="1"><?php esc_html_e( 'Top Post Style One', 'pantograph'); ?></option>
		  <option value="2"><?php esc_html_e( 'Top Post Style Two', 'pantograph'); ?></option>
		  <option value="3"><?php esc_html_e( 'Top Post Style Three', 'pantograph'); ?></option>
		  <option value="4"><?php esc_html_e( 'Top Post Style Four', 'pantograph'); ?></option>
		  <option value="5"><?php esc_html_e( 'Top Post Style Five', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a template for Top Post Style'); ?></span>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="cat_top_post_ids"><?php esc_html_e('Top Post IDs'); ?></label></th>
<td>
<input type="text" name="Cat_meta[cat_top_post_ids]" id="Cat_meta[cat_top_post_ids]" class="widefat" value=""><br />
        <span class="description"><?php esc_html_e('Add post IDs comma separated'); ?></span>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="cat_top_post_items"><?php esc_html_e('Show Top Post Items'); ?></label></th>
<td>
<input type="number" name="Cat_meta[cat_top_post_items]" id="Cat_meta[cat_top_post_items]" class="widefat" value=""><br />
        <span class="description"><?php esc_html_e('Add post limit, how many post want to show'); ?></span>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="cat_top_post_order"><?php esc_html_e('Top Post Order'); ?></label></th>
	<td>
		<select name="Cat_meta[cat_top_post_order]" id="Cat_meta[cat_top_post_order]" class="widefat">
		  <option value="DESC"><?php esc_html_e( 'DESC', 'pantograph'); ?></option>
		  <option value="ASC"><?php esc_html_e( 'ASC', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a Order for Top Post'); ?></span>
    </td>
</tr>
<br/>
<br/>
<?php
}


//add extra fields to category edit form hook
add_action ( 'category_edit_form_fields', 'edit_extra_category_fields');

//add extra fields to category edit form callback function
function edit_extra_category_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
	$header_layout = $single_page_layout = $custom_cat_title = $category_excerpt_limit = $show_hide_title = $show_hide_cat_desc = $show_cat_img = $show_hide_breadcrumb = $cat_top_posts = $cat_top_post_template = $cat_top_post_ids = $cat_top_post_items = $cat_top_post_order = '';
	$header_layout = empty( $cat_meta['header_layout'] ) ? '' : $cat_meta['header_layout'];
	$single_page_layout = empty( $cat_meta['single_page_layout'] ) ? '' : $cat_meta['single_page_layout'];
	$custom_cat_title = empty( $cat_meta['custom_cat_title'] ) ? '' : $cat_meta['custom_cat_title'];
	$show_hide_title = empty( $cat_meta['show_hide_title'] ) ? '' : $cat_meta['show_hide_title'];
	$show_hide_cat_desc = empty( $cat_meta['show_hide_cat_desc'] ) ? '' : $cat_meta['show_hide_cat_desc'];
	$show_cat_img = empty( $cat_meta['show_cat_img'] ) ? '' : $cat_meta['show_cat_img'];
	$category_excerpt_limit = empty( $cat_meta['category_excerpt_limit'] ) ? '' : $cat_meta['category_excerpt_limit'];
	$show_hide_breadcrumb = empty( $cat_meta['show_hide_breadcrumb'] ) ? '' : $cat_meta['show_hide_breadcrumb'];
	$cat_top_posts = empty( $cat_meta['cat_top_posts'] ) ? '' : $cat_meta['cat_top_posts'];
	$cat_top_post_template = empty( $cat_meta['cat_top_post_template'] ) ? '' : $cat_meta['cat_top_post_template'];
	$cat_top_post_ids = empty( $cat_meta['cat_top_post_ids'] ) ? '' : $cat_meta['cat_top_post_ids'];
	$cat_top_post_items = empty( $cat_meta['cat_top_post_items'] ) ? '' : $cat_meta['cat_top_post_items'];
	$cat_top_post_order = empty( $cat_meta['cat_top_post_order'] ) ? '' : $cat_meta['cat_top_post_order'];
?>

<tr class="form-field">
<th scope="row" valign="top"><label for="header_layout"><?php esc_html_e('Header Layout'); ?></label></th>
	<td>
		<select name="Cat_meta[header_layout]" id="Cat_meta[header_layout]" class="widefat">
		  <option value="default" <?php if($header_layout=='default'){echo 'selected';} ?>><?php esc_html_e( 'Header Style Default', 'pantograph'); ?></option>
		  <option value="1" <?php if($header_layout==1){echo 'selected';} ?>><?php esc_html_e( 'Header Style One', 'pantograph'); ?></option>
		  <option value="2" <?php if($header_layout==2){echo 'selected';} ?>><?php esc_html_e( 'Header Style Two', 'pantograph'); ?></option>
		  <option value="3" <?php if($header_layout==3){echo 'selected';} ?>><?php esc_html_e( 'Header Style Three', 'pantograph'); ?></option>
		  <option value="4" <?php if($header_layout==4){echo 'selected';} ?>><?php esc_html_e( 'Header Style Four', 'pantograph'); ?></option>
		  <option value="5" <?php if($header_layout==5){echo 'selected';} ?>><?php esc_html_e( 'Header Style Five', 'pantograph'); ?></option>
		  <option value="6" <?php if($header_layout==6){echo 'selected';} ?>><?php esc_html_e( 'Header Style Six', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for  Header Style'); ?></span>
    </td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label for="single_page_layout"><?php esc_html_e('Single Page Layout'); ?></label></th>
	<td>
		<select name="Cat_meta[single_page_layout]" id="Cat_meta[single_page_layout]" class="widefat">
		  <option value="0"><?php esc_html_e('Default Template', 'pantograph'); ?></option>
		  <option value="1" <?php if($single_page_layout==1){echo 'selected';} ?>><?php esc_html_e('General Template', 'pantograph'); ?></option>
		  <option value="2" <?php if($single_page_layout==2){echo 'selected';} ?>><?php esc_html_e('Large Image and Title', 'pantograph'); ?></option>
		  <option value="3" <?php if($single_page_layout==3){echo 'selected';} ?>><?php esc_html_e('Full Width Image and Title', 'pantograph'); ?></option>
		  <option value="4" <?php if($single_page_layout==4){echo 'selected';} ?>><?php esc_html_e('Without Sidebar', 'pantograph'); ?></option>
		  <option value="5" <?php if($single_page_layout==5){echo 'selected';} ?>><?php esc_html_e('Title Overlay', 'pantograph'); ?></option>
		  <option value="6" <?php if($single_page_layout==6){echo 'selected';} ?>><?php esc_html_e('Transparent Overlay', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for single page style'); ?></span>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="custom_cat_title"><?php esc_html_e('Category Title'); ?></label></th>
<td>
<input type="text" name="Cat_meta[custom_cat_title]" id="Cat_meta[custom_cat_title]" size="3" value="<?php if($custom_cat_title){ echo esc_attr($custom_cat_title) ? esc_attr($custom_cat_title) : '';} ?>"><br />
        <span class="description"><?php esc_html_e('Add title for this category page'); ?></span>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra3"><?php esc_html_e('Show Category Title'); ?></label></th>
<td>
        
	<input type="radio" name="Cat_meta[show_hide_title]" value="1" <?php if($show_hide_title==1){echo 'checked';} ?>> <?php esc_html_e( 'Yes', 'pantograph'); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_title]" value="0" <?php if($show_hide_title==0){echo 'checked';} ?>> <?php esc_html_e( 'No', 'pantograph'); ?><br/>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Show Category Description'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_hide_cat_desc]" value="1" <?php if($show_hide_cat_desc==1){echo 'checked';} ?> > <?php esc_html_e( 'Yes', 'pantograph'); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_cat_desc]" value="0" <?php if($show_hide_cat_desc==0){echo 'checked';} ?>> <?php esc_html_e( 'No', 'pantograph'); ?><br/>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Category Page Image'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_cat_img]" value="1" <?php if($show_cat_img==1){echo 'checked';} ?> > <?php esc_html_e( 'Custom Image', 'pantograph'); ?><br>
    <input type="radio" name="Cat_meta[show_cat_img]" value="0" <?php if($show_cat_img==0){echo 'checked';} ?>> <?php esc_html_e( 'Featured Image', 'pantograph'); ?><br>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="category_excerpt_limit"><?php esc_html_e('Excerpt Word Limit'); ?></label></th>
<td>
<input type="text" name="Cat_meta[category_excerpt_limit]" id="Cat_meta[category_excerpt_limit]" size="3" value="<?php if($category_excerpt_limit){ echo esc_attr($category_excerpt_limit) ? esc_attr($category_excerpt_limit) : '';} ?>"><br />
        <span class="description"><?php esc_html_e('Excerpt word limit in this category page'); ?></span>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Show Category Breadcrumb'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_hide_breadcrumb]" value="1" <?php if($show_hide_breadcrumb==1){echo 'checked';} ?> > <?php esc_html_e( 'Yes', 'pantograph'); ?><br>
    <input type="radio" name="Cat_meta[show_hide_breadcrumb]" value="0" <?php if($show_hide_breadcrumb==0){echo 'checked';} ?>> <?php esc_html_e( 'No', 'pantograph'); ?><br>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Top Posts Block'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[cat_top_posts]" value="1" <?php if($cat_top_posts==1){echo 'checked';} ?> > <?php esc_html_e( 'Yes', 'pantograph'); ?><br>
    <input type="radio" name="Cat_meta[cat_top_posts]" value="0" <?php if($cat_top_posts==0){echo 'checked';} ?>> <?php esc_html_e( 'No', 'pantograph'); ?><br>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="cat_top_post_template"><?php esc_html_e('Top Post Template'); ?></label></th>
	<td>
		<select name="Cat_meta[cat_top_post_template]" id="Cat_meta[cat_top_post_template]" class="widefat">
		  <option value="default" <?php if($cat_top_post_template=='default'){echo 'selected';} ?>><?php esc_html_e( 'Top Post Style Default', 'pantograph'); ?></option>
		  <option value="1" <?php if($cat_top_post_template==1){echo 'selected';} ?>><?php esc_html_e( 'Top Post Style One', 'pantograph'); ?></option>
		  <option value="2" <?php if($cat_top_post_template==2){echo 'selected';} ?>><?php esc_html_e( 'Top Post Style Two', 'pantograph'); ?></option>
		  <option value="3" <?php if($cat_top_post_template==3){echo 'selected';} ?>><?php esc_html_e( 'Top Post Style Three', 'pantograph'); ?></option>
		  <option value="4" <?php if($cat_top_post_template==4){echo 'selected';} ?>><?php esc_html_e( 'Top Post Style Four', 'pantograph'); ?></option>
		  <option value="5" <?php if($cat_top_post_template==5){echo 'selected';} ?>><?php esc_html_e( 'Top Post Style Five', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for  Top Post Style'); ?></span>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="cat_top_post_ids"><?php esc_html_e('Top Post IDs'); ?></label></th>
<td>
<input type="text" name="Cat_meta[cat_top_post_ids]" id="Cat_meta[cat_top_post_ids]" size="3" value="<?php if($cat_top_post_ids){ echo esc_attr($cat_top_post_ids) ? esc_attr($cat_top_post_ids) : '';} ?>"><br />
        <span class="description"><?php esc_html_e('Add post IDs comma separated'); ?></span>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="cat_top_post_items"><?php esc_html_e('Show Top Post Items'); ?></label></th>
<td>
<input type="number" name="Cat_meta[cat_top_post_items]" id="Cat_meta[cat_top_post_items]" size="3" value="<?php if($cat_top_post_items){ echo esc_attr($cat_top_post_items) ? esc_attr($cat_top_post_items) : '';} ?>"><br />
        <span class="description"><?php esc_html_e('Add post limit, how many post want to show'); ?></span>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="cat_top_post_order"><?php esc_html_e('Top Post Order'); ?></label></th>
	<td>
		<select name="Cat_meta[cat_top_post_order]" id="Cat_meta[cat_top_post_order]" class="widefat">
		  <option value="DESC" <?php if($cat_top_post_order=='DESC'){echo 'selected';} ?>><?php esc_html_e( 'DESC', 'pantograph'); ?></option>
		  <option value="ASC" <?php if($cat_top_post_order=='ASC'){echo 'selected';} ?>><?php esc_html_e( 'ASC', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a Order for  Top Post'); ?></span>
    </td>
</tr>
<?php
}

// save extra category extra fields hook
add_action ( 'created_category', 'save_extra_category_fileds');
add_action ( 'edited_category', 'save_extra_category_fileds');

// save extra category extra fields callback function
function save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}
} else {
// **********************************************************************// 
// ! Excerpt Limit
// **********************************************************************//
if( ! function_exists('pantograph_excerpt') ){
function pantograph_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
}
// **********************************************************************// 
// ! Content Limit
// **********************************************************************//
function pantograph_content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('`\[[^\]]*\]`','',$content);
  return $content;
}

function pantograph_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'pantograph_excerpt_length', 999 );


function the_title_excerpt($before = '', $after = '', $echo = true, $length = false) 
  {
    $title = get_the_title();

    if ( $length && is_numeric($length) ) {
        $title = substr( $title, 0, $length );
    }

    if ( strlen($title)> 0 ) {
        $title = apply_filters('the_title_excerpt', $before . $title . $after, $before, $after);
        if ( $echo )
            echo esc_attr($title);
        else
            return $title;
    }
}

#-----------------------------------------------------------------
# Custom Widgets
#-----------------------------------------------------------------
require_once 'modules/theme-widgets.php';

#-----------------------------------------------------------------
# One-Click Demo Import
#-----------------------------------------------------------------
class OCDC_Plugin {
	/**
	 * Constructor for this class.
	 */
	public function __construct() {
		/**
		 * Display admin error message if PHP version is older than 5.3.2.
		 * Otherwise execute the main plugin class.
		 */
		if ( version_compare( phpversion(), '5.3.2', '<' ) ) {
			add_action( 'admin_notices', array( $this, 'old_php_admin_error_notice' ) );
		}
		else {
			// Set plugin constants.
			$this->set_plugin_constants();

			// Composer autoloader.
			require_once PT_OCDC_PATH . 'one-click-demo-content/vendor/autoload.php';

			// Instantiate the main plugin class *Singleton*.
			$pt_one_click_demo_import = OCDC\OneClickDemoImport::get_instance();

			// Register WP CLI commands
			if ( defined( 'WP_CLI' ) && WP_CLI ) {
				WP_CLI::add_command( 'ocdc list', array( 'OCDC\WPCLICommands', 'list_predefined' ) );
				WP_CLI::add_command( 'ocdc import', array( 'OCDC\WPCLICommands', 'import' ) );
			}
		}
	}


	/**
	 * Display an admin error notice when PHP is older the version 5.3.2.
	 * Hook it to the 'admin_notices' action.
	 */
	public function old_php_admin_error_notice() {
		$message = sprintf( esc_html__( 'The %2$sOne Click Demo Import%3$s plugin requires %2$sPHP 5.3.2+%3$s to run properly. Please contact your hosting company and ask them to update the PHP version of your site to at least PHP 5.3.2.%4$s Your current version of PHP: %2$s%1$s%3$s', 'pantograph' ), phpversion(), '<strong>', '</strong>', '<br>' );

		printf( '<div class="notice notice-error"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}


	/**
	 * Set plugin constants.
	 *
	 * Path/URL to root of this plugin, with trailing slash and plugin version.
	 */
	private function set_plugin_constants() {
		// Path/URL to root of this plugin, with trailing slash.
		if ( ! defined( 'PT_OCDC_PATH' ) ) {
			define( 'PT_OCDC_PATH', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'PT_OCDC_URL' ) ) {
			define( 'PT_OCDC_URL', plugin_dir_url( __FILE__ ) );
		}

		// Action hook to set the plugin version constant.
		add_action( 'admin_init', array( $this, 'set_plugin_version_constant' ) );
	}


	/**
	 * Set plugin version constant -> PT_OCDC_VERSION.
	 */
	public function set_plugin_version_constant() {
		if ( ! defined( 'PT_OCDC_VERSION' ) ) {
			$plugin_data = get_plugin_data( __FILE__ );
			define( 'PT_OCDC_VERSION', $plugin_data['Version'] );
		}
	}
}

// Instantiate the plugin class.
$ocdc_plugin = new OCDC_Plugin();
//Load Modules

#-----------------------------------------------------------------
# Theme Shortcodes
#-----------------------------------------------------------------

require_once 'modules/shortcodes.php';

#-----------------------------------------------------------------
# Header Meta Box
#-----------------------------------------------------------------

require_once 'modules/pantograph-metabox.php';


require_once 'modules/widgets.php';

#-----------------------------------------------------------------
# Menu Logo Image
#-----------------------------------------------------------------

require_once 'modules/pantograph_menu_logo/pantograph_menu_logo.php';

#-----------------------------------------------------------------
# Adding Styles in the theme for this plugin
#-----------------------------------------------------------------
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_pantograph_plugin_styles' );

/**
 * Register style sheet.
 */
function register_pantograph_plugin_styles() {
	wp_register_style( 'the_pantograph_extensions', plugins_url( 'the_pantograph_extensions/modules/css/the_pantograph_extensions.css' ) );
	wp_enqueue_style( 'the_pantograph_extensions' );
}

// Register Jquery Scripts.
add_action( 'wp_enqueue_scripts', 'register_pantograph_plugin_jquery' );

/**
 * Register style sheet.
 */
function register_pantograph_plugin_jquery() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'the_pantograph_extensions', plugins_url( 'the_pantograph_extensions/modules/js/the_pantograph_extensions.js' ) );
}

add_action( 'init', 'pantograph_create_post_type' );
function pantograph_create_post_type() {

register_post_type( 'mega_menu',
array(
'labels' => array(
'name' => __( 'Mega Menu' ),
'singular_name' => __( 'Mega Menu' ),
'add_new' => __( 'Add New' ),
'add_new_item' => __( 'Add New Mega Menu' ),
'edit_item' => __( 'Edit Mega Menu' ),
'new_item' => __( 'New Mega Menu' ),
'view_item' => __( 'View Mega Menu' ),
'not_found' => __( 'Sorry, we couldn\'t find the Mega Menu you are looking for.' )
),
'public' => true,
'publicly_queryable' => false,
'exclude_from_search' => true,
'menu_position' => 14,
'has_archive' => false,
'hierarchical' => false,
'capability_type' => 'page',
'rewrite' => array( 'slug' => 'mega_menu' ),
'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
)
);
}



/*================START For Custome Category Template =================*/
class pantograph_Custom_Category_Templates {

	var $template;

	function __construct() {
		if( is_admin() ) {
			add_action( 'category_add_form_fields', array( $this, 'pantograph_category_add_template_option') );
			add_action( 'category_edit_form_fields', array( $this, 'pantograph_category_edit_template_option') );
			add_action( 'created_category', array( $this, 'pantograph_category_save_option' ), 10, 2 );
			add_action( 'edited_category', array( $this, 'pantograph_category_save_option' ), 10, 2 );
			add_action( 'delete_category', array( $this, 'pantograph_category_delete_option' ) );
		} else {
			add_filter( 'category_template', array( $this, 'pantograph_category_template' ) );
		}
	}

	function pantograph_category_template( $template ) {
		$category_templates = get_option( 'category_templates', array() );
		$category = get_queried_object();
		$id = $category->term_id;
		if( isset( $category_templates[$id] ) ) {
			$tmpl = locate_template( $category_templates[$id] );
			if( 'default' !== $category_templates[$id] && '' !== $tmpl ) {
				$this->template = $category_templates[$id];
				add_filter( 'body_class', array( $this, 'pantograph_category_body_class' ) );
				return $tmpl;
			}
		}

		return $template;
	}

	function pantograph_category_body_class( $classes ) {
		$template = sanitize_html_class( str_replace( '.', '-', $this->template ) );
		$classes[] = 'category-template-' . $template;

		return $classes;
	}

	function pantograph_category_save_option( $term_id ) {
		if( isset( $_POST['custom-category-template'] ) ) {
			$template = trim( $_POST['custom-category-template'] );
			$category_templates = get_option( 'category_templates', array() );
			if( 'default' == $template ) {
				unset( $category_templates[$term_id] );
			} else {
				$category_templates[$term_id] = $template;
			}
			update_option( 'category_templates', $category_templates );
		}
	}

	function pantograph_category_add_template_option() {
		$category_templates = $this->pantograph_get_category_templates();
		if( empty( $category_templates ) )
			return;

		?>
		<div class="form-field">
			<label for="custom-category-template"><?php esc_html_e( 'Choose a Template', 'custom-category-templates' ); ?></label>
			<select name="custom-category-template" id="custom-category-template" class="widefat">
				<?php $this->pantograph_category_templates_dropdown(); ?>
			</select>
		</div>
	<?php }

	function pantograph_category_edit_template_option() {
		$category_templates = $this->pantograph_get_category_templates();
		if( empty( $category_templates ) )
			return;

		$id = $_REQUEST['tag_ID'];
		$templates = get_option( 'category_templates', array() );
		$template = isset( $templates[$id] ) ? $templates[$id] : null;
		?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="custom-category-template"><?php esc_html_e( 'Choose a Template', 'custom-category-templates' ); ?></label>
			</th>
			<td>
				<select name="custom-category-template" id="custom-category-template" class="widefat">
					<?php $this->pantograph_category_templates_dropdown( $template ) ?>
				</select>
			</td>
		</tr>
	<?php }

	function pantograph_category_delete_option( $term_id ) {
		$category_templates = get_option( 'category_templates', array() );
		if( isset( $category_templates[$term_id] ) ) {
			unset( $category_templates[$term_id] );
			update_option( 'category_templates', $category_templates );
		}
	}

	/**
	 * Generate the options for the category templates list
	 *
	 * @since 0.1
	 * @return void
	 */
	function pantograph_category_templates_dropdown( $default = null ) {
		$templates = array_flip( $this->pantograph_get_category_templates() );
		ksort( $templates );
		echo "\n\t<option value='0'>Select a Template</option>";
		foreach( array_keys( $templates ) as $template )
			: if ( $default == $templates[$template] )
				$selected = " selected='selected'";
			else
				$selected = '';
		echo "\n\t<option value='".$templates[$template]."' $selected>$template</option>";
		endforeach;
	}

	/**
	 * Get a list of Category Templates available in the current theme
	 *
	 * @since 0.1
	 * @return array Key is the template name, value is the filename of the template
	 */
	function pantograph_get_category_templates( $template = null ) {
		$category_templates = array();
		$theme = wp_get_theme( $template );
		$files = (array) $theme->get_files( 'php', 1 );

		foreach ( $files as $file => $full_path ) {
			if ( ! preg_match( '|Category Template:(.*)$|mi', file_get_contents( $full_path ), $header ) )
				continue;
			$category_templates[ $file ] = _cleanup_header_comment( $header[1] );
		}

		if ( $theme->parent() )
			$category_templates += $this->pantograph_get_category_templates( $theme->get_template() );

		return $category_templates;
	}
}
$custom_category_templates = new pantograph_Custom_Category_Templates();
/*================ For Custome Category Template END =================*/

 
 // **********************************************************************// 
// ! Count Post View
// **********************************************************************//
function pantograph_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function pantograph_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function pantograph_wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function pantograph_wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    pantograph_wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'pantograph_wpb_track_post_views');

function pantograph_wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*===================================================================================
 * Add Author Links
 * =================================================================================*/
function pantograph_add_to_author_profile( $contactmethods ) {
	
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['user_profile_email'] = 'Add Email';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'pantograph_add_to_author_profile', 10, 1);

function pantograph_social_share(){
	global $post;
	$postid=$post->ID;
	$pinterest = esc_url(rtrim(get_permalink(),'/'));
	
	$url = esc_url(wp_get_attachment_url( get_post_thumbnail_id($postid) ));
	echo '<a class="fa fa-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u='.esc_url(get_the_permalink()).'" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"></a>
		<a class="fa fa-twitter" target="_blank" href="http://twitter.com/home?status='.esc_url(get_the_permalink()).'" title="Share this post on Twitter!"></a>
		<a class="fa fa-google-plus" target="_blank" href="https://plus.google.com/share?url='.esc_url(rtrim(get_permalink(),'/')).'" title="Share this post on Google+!"></a>
		<a class="fa fa-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url='.esc_url($pinterest).'&media='.esc_url($url).'" title="Pin this post on Pinterest!"></a>
		<a class="fa fa-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.esc_url(get_the_permalink()).'" title="Share this post on LinkedIn!" rel="nofollow"></a>
	';
}

function pantograph_social_share_left_right(){
	global $post;
	$postid=$post->ID;
	$url = esc_url(wp_get_attachment_url( get_post_thumbnail_id($postid) ));
	echo '
	<ul class="mbm_social">
		<li><a class="social-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u='.esc_url(get_the_permalink()).'">
			<i class="fa fa-facebook"><small>facebook</small></i>
			
			<div class="tooltip"><span>facebook</span></div>
			</a>
		</li>
		<li><a class="social-twitter" target="_blank" href="http://twitter.com/home?status='.esc_url(get_the_permalink()).'">
			<i class="fa fa-twitter"><small>Twitter</small></i>
			<div class="tooltip"><span>Twitter</span></div>
			</a>
		</li>
		<li><a class="social-google-plus" target="_blank" href="https://plus.google.com/share?url='.esc_url(rtrim(get_permalink(),'/')).'">
			<i class="fa fa-google-plus"><small>google +</small></i>
			<div class="tooltip"><span>google</span></div>
			</a>
		</li>
		<li><a class="social-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.esc_url(get_the_permalink()).'">
			<i class="fa  fa-linkedin"><small>linkedin</small></i>
			<div class="tooltip"><span>linkedin</span></div>
			</a>
		</li>
	</ul>
	';
}
	
add_filter( 'widget_tag_cloud_args', 'pantograph_change_tag_cloud_font_sizes');
/**
 * Change the Tag Cloud's Font Sizes.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function pantograph_change_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '8';
    $args['largest'] = '15';

    return $args;
}


add_filter ('the_content', 'pantograph_pagination_after_post',1);
function pantograph_pagination_after_post($content) {
   if(is_single()) {
      $content.= '<div class="pagination">' . wp_link_pages('before=&after=&next_or_number=next&nextpagelink=Next Part&previouspagelink=Previous Part&echo=0') . '</div>';
   }
   return $content;
}

/****
============= Color Picker in Category ========== Start
****/

/**
 * Add new colorpicker field to "Add new Category" screen
 * - https://developer.wordpress.org/reference/hooks/taxonomy_add_form_fields/
 *
 * @param String $taxonomy
 *
 * @return void
 */
function colorpicker_field_add_new_category( $taxonomy ) {

  ?>

    <div class="form-field term-colorpicker-wrap">
        <label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'pantograph' ); ?></label>
        <input name="_category_color" value="" class="colorpicker" id="term-colorpicker" />
        <p class="description"><?php esc_html_e( 'Choose category color is used in the theme.', 'pantograph' ); ?></p>
    </div>

  <?php

}
add_action( 'category_add_form_fields', 'colorpicker_field_add_new_category' );  // Variable Hook Name

/**
 * Add new colopicker field to "Edit Category" screen
 * - https://developer.wordpress.org/reference/hooks/taxonomy_add_form_fields/
 *
 * @param WP_Term_Object $term
 *
 * @return void
 */
function colorpicker_field_edit_category( $term ) {

    $color = get_term_meta( $term->term_id, '_category_color', true );
    $color = ( ! empty( $color ) ) ? "#{$color}" : '';

  ?>

    <tr class="form-field term-colorpicker-wrap">
        <th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Category Color', 'pantograph' ); ?></label></th>
        <td>
            <input name="_category_color" value="<?php echo esc_attr($color); ?>" class="colorpicker" id="term-colorpicker" />
            <p class="description"><?php esc_html_e( 'Choose category color is used in the theme.', 'pantograph' ); ?></p>
        </td>
    </tr>

  <?php


}
add_action( 'category_edit_form_fields', 'colorpicker_field_edit_category' );   // Variable Hook Name

/**
 * Term Metadata - Save Created and Edited Term Metadata
 * - https://developer.wordpress.org/reference/hooks/created_taxonomy/
 * - https://developer.wordpress.org/reference/hooks/edited_taxonomy/
 *
 * @param Integer $term_id
 *
 * @return void
 */
function save_termmeta( $term_id ) {

    // Save term color if possible
    if( isset( $_POST['_category_color'] ) && ! empty( $_POST['_category_color'] ) ) {
        update_term_meta( $term_id, '_category_color', sanitize_hex_color_no_hash( $_POST['_category_color'] ) );
    } else {
        delete_term_meta( $term_id, '_category_color' );
    }

}
add_action( 'created_category', 'save_termmeta' );  // Variable Hook Name
add_action( 'edited_category',  'save_termmeta' );  // Variable Hook Name

/**
 * Enqueue colorpicker styles and scripts.
 * - https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
 *
 * @return void
 */
function category_colorpicker_enqueue( $taxonomy ) {

    if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }

    // Colorpicker Scripts
    wp_enqueue_script( 'wp-color-picker' );

    // Colorpicker Styles
    wp_enqueue_style( 'wp-color-picker' );

}
add_action( 'admin_enqueue_scripts', 'category_colorpicker_enqueue' );

/**
 * Print javascript to initialize the colorpicker
 * - https://developer.wordpress.org/reference/hooks/admin_print_scripts/
 *
 * @return void
 */
function colorpicker_init_inline() {

    if( null !== ( $screen = get_current_screen() ) && 'edit-category' !== $screen->id ) {
        return;
    }

  ?>

    <script>
        jQuery( document ).ready( function( $ ) {

            $( '.colorpicker' ).wpColorPicker();

        } ); // End Document Ready JQuery
    </script>

  <?php

}
add_action( 'admin_print_scripts', 'colorpicker_init_inline', 20 );



/****
============= Color Picker in Category ========== End
****/



//add extra fields to category edit form hook
add_action ( 'category_add_form_fields', 'add_extra_category_fields');

//add extra fields to category edit form callback function
function add_extra_category_fields() {    //check for existing featured ID
?>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="header_layout"><?php esc_html_e('Header Layout'); ?></label></th>
	<td>
		<select name="Cat_meta[header_layout]" id="Cat_meta[header_layout]" class="widefat">
		  <option value="default"><?php esc_html_e( 'Header Style Default', 'pantograph' ); ?></option>
		  <option value="1"><?php esc_html_e( 'Header Style One', 'pantograph' ); ?></option>
		  <option value="2"><?php esc_html_e( 'Header Style Two', 'pantograph' ); ?></option>
		  <option value="3"><?php esc_html_e( 'Header Style Three', 'pantograph' ); ?></option>
		  <option value="4"><?php esc_html_e( 'Header Style Four', 'pantograph' ); ?></option>
		  <option value="5"><?php esc_html_e( 'Header Style Five', 'pantograph' ); ?></option>
		  <option value="6"><?php esc_html_e( 'Header Style Six', 'pantograph' ); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for Header Style'); ?></span>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="single_page_layout"><?php esc_html_e('Single Page Layout', 'pantograph'); ?></label></th>
	<td>
		<select name="Cat_meta[single_page_layout]" id="Cat_meta[single_page_layout]" class="widefat">
		  <option value="0"><?php esc_html_e('Default Template', 'pantograph'); ?></option>
		  <option value="1"><?php esc_html_e('General Template', 'pantograph'); ?></option>
		  <option value="2"><?php esc_html_e('Large Image and Title', 'pantograph'); ?></option>
		  <option value="3"><?php esc_html_e('Full Width Image and Title', 'pantograph'); ?></option>
		  <option value="4"><?php esc_html_e('Without Sidebar', 'pantograph'); ?></option>
		  <option value="5"><?php esc_html_e('Title Overlay', 'pantograph'); ?></option>
		  <option value="6"><?php esc_html_e('Transparent Overlay', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for single page style'); ?></span>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="custom_cat_title"><?php esc_html_e('Category Title'); ?></label></th>
<td>
<input type="text" name="Cat_meta[custom_cat_title]" id="Cat_meta[custom_cat_title]" class="widefat" value=""><br />
        <span class="description"><?php esc_html_e('Add title for this category page'); ?></span>
    </td>
</tr>
<br/>

<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="extra3"><?php esc_html_e('Show Category Title'); ?></label></th>
<td>
        
	<input type="radio" name="Cat_meta[show_hide_title]" value="1"> <?php esc_html_e( 'Yes', 'pantograph' ); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_title]" value="0" checked="checked"> <?php esc_html_e( 'No', 'pantograph' ); ?><br/>
    </td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label style="margin-top: 15px" for="extra4"><?php esc_html_e('Show Category Description'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_hide_cat_desc]" value="1"> <?php esc_html_e( 'Yes', 'pantograph' ); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_cat_desc]" value="0" checked="checked"> <?php esc_html_e( 'No', 'pantograph' ); ?><br/>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Category Page Image'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_cat_img]" value="1"> <?php esc_html_e( 'Custom Image', 'pantograph' ); ?><br>
    <input type="radio" name="Cat_meta[show_cat_img]" value="0" checked="checked"> <?php esc_html_e( 'Featured Image', 'pantograph' ); ?><br>
    </td>
</tr>
<br/>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Show Category Breadcrumb'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_hide_breadcrumb]" value="1"> <?php esc_html_e( 'Yes', 'pantograph' ); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_breadcrumb]" value="0" checked="checked"> <?php esc_html_e( 'No', 'pantograph' ); ?><br/>
    </td>
</tr>
<br/>
<br/>
<?php
}


//add extra fields to category edit form hook
add_action ( 'category_edit_form_fields', 'edit_extra_category_fields');

//add extra fields to category edit form callback function
function edit_extra_category_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
	$header_layout = $single_page_layout = $custom_cat_title = $show_hide_title = $show_hide_cat_desc = $show_cat_img = $show_hide_breadcrumb = '';
	$header_layout = empty( $cat_meta['header_layout'] ) ? '' : $cat_meta['header_layout'];
	$single_page_layout = empty( $cat_meta['single_page_layout'] ) ? '' : $cat_meta['single_page_layout'];
	$custom_cat_title = empty( $cat_meta['custom_cat_title'] ) ? '' : $cat_meta['custom_cat_title'];
	$show_hide_title = empty( $cat_meta['show_hide_title'] ) ? '' : $cat_meta['show_hide_title'];
	$show_hide_cat_desc = empty( $cat_meta['show_hide_cat_desc'] ) ? '' : $cat_meta['show_hide_cat_desc'];
	$show_cat_img = empty( $cat_meta['show_cat_img'] ) ? '' : $cat_meta['show_cat_img'];
	$show_hide_breadcrumb = empty( $cat_meta['show_hide_breadcrumb'] ) ? '' : $cat_meta['show_hide_breadcrumb'];
?>

<tr class="form-field">
<th scope="row" valign="top"><label for="header_layout"><?php esc_html_e('Header Layout'); ?></label></th>
	<td>
		<select name="Cat_meta[header_layout]" id="Cat_meta[header_layout]" class="widefat">
		  <option value="default" <?php if($header_layout=='default'){echo 'selected';} ?>><?php esc_html_e( 'Header Style Default', 'pantograph' ); ?></option>
		  <option value="1" <?php if($header_layout==1){echo 'selected';} ?>><?php esc_html_e( 'Header Style One', 'pantograph' ); ?></option>
		  <option value="2" <?php if($header_layout==2){echo 'selected';} ?>><?php esc_html_e( 'Header Style Two', 'pantograph' ); ?></option>
		  <option value="3" <?php if($header_layout==3){echo 'selected';} ?>><?php esc_html_e( 'Header Style Three', 'pantograph' ); ?></option>
		  <option value="4" <?php if($header_layout==4){echo 'selected';} ?>><?php esc_html_e( 'Header Style Four', 'pantograph' ); ?></option>
		  <option value="5" <?php if($header_layout==5){echo 'selected';} ?>><?php esc_html_e( 'Header Style Five', 'pantograph' ); ?></option>
		  <option value="6" <?php if($header_layout==6){echo 'selected';} ?>><?php esc_html_e( 'Header Style Six', 'pantograph' ); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for  Header Style'); ?></span>
    </td>
</tr>

<tr class="form-field">
<th scope="row" valign="top"><label for="single_page_layout"><?php esc_html_e('Single Page Layout'); ?></label></th>
	<td>
		<select name="Cat_meta[single_page_layout]" id="Cat_meta[single_page_layout]" class="widefat">
		  <option value="0"><?php esc_html_e('Default Template', 'pantograph'); ?></option>
		  <option value="1" <?php if($single_page_layout==1){echo 'selected';} ?>><?php esc_html_e('General Template', 'pantograph'); ?></option>
		  <option value="2" <?php if($single_page_layout==2){echo 'selected';} ?>><?php esc_html_e('Large Image and Title', 'pantograph'); ?></option>
		  <option value="3" <?php if($single_page_layout==3){echo 'selected';} ?>><?php esc_html_e('Full Width Image and Title', 'pantograph'); ?></option>
		  <option value="4" <?php if($single_page_layout==4){echo 'selected';} ?>><?php esc_html_e('Without Sidebar', 'pantograph'); ?></option>
		  <option value="5" <?php if($single_page_layout==5){echo 'selected';} ?>><?php esc_html_e('Title Overlay', 'pantograph'); ?></option>
		  <option value="6" <?php if($single_page_layout==6){echo 'selected';} ?>><?php esc_html_e('Transparent Overlay', 'pantograph'); ?></option>
		</select>
        <span class="description"><?php esc_html_e('Choose a layout for single page style'); ?></span>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="custom_cat_title"><?php esc_html_e('Category Title'); ?></label></th>
<td>
<input type="text" name="Cat_meta[custom_cat_title]" id="Cat_meta[custom_cat_title]" size="3" value="<?php if($custom_cat_title){ echo esc_attr($custom_cat_title) ? esc_attr($custom_cat_title) : '';} ?>"><br />
        <span class="description"><?php esc_html_e('Add title for this category page'); ?></span>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra3"><?php esc_html_e('Show Category Title'); ?></label></th>
<td>
        
	<input type="radio" name="Cat_meta[show_hide_title]" value="1" <?php if($show_hide_title==1){echo 'checked';} ?>> <?php esc_html_e( 'Yes', 'pantograph' ); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_title]" value="0" <?php if($show_hide_title==0){echo 'checked';} ?>> <?php esc_html_e( 'No', 'pantograph' ); ?><br/>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Show Category Description'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_hide_cat_desc]" value="1" <?php if($show_hide_cat_desc==1){echo 'checked';} ?> > <?php esc_html_e( 'Yes', 'pantograph' ); ?><br/>
    <input type="radio" name="Cat_meta[show_hide_cat_desc]" value="0" <?php if($show_hide_cat_desc==0){echo 'checked';} ?>> <?php esc_html_e( 'No', 'pantograph' ); ?><br/>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Category Page Image'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_cat_img]" value="1" <?php if($show_cat_img==1){echo 'checked';} ?> > <?php esc_html_e( 'Custom Image', 'pantograph' ); ?><br>
    <input type="radio" name="Cat_meta[show_cat_img]" value="0" <?php if($show_cat_img==0){echo 'checked';} ?>> <?php esc_html_e( 'Featured Image', 'pantograph' ); ?><br>
    </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra4"><?php esc_html_e('Show Category Breadcrumb'); ?></label></th>
<td>
	<input type="radio" name="Cat_meta[show_hide_breadcrumb]" value="1" <?php if($show_hide_breadcrumb==1){echo 'checked';} ?> > <?php esc_html_e( 'Yes', 'pantograph' ); ?><br>
    <input type="radio" name="Cat_meta[show_hide_breadcrumb]" value="0" <?php if($show_hide_breadcrumb==0){echo 'checked';} ?>> <?php esc_html_e( 'No', 'pantograph' ); ?><br>
    </td>
</tr>
<?php
}

// save extra category extra fields hook
add_action ( 'created_category', 'save_extra_category_fileds');
add_action ( 'edited_category', 'save_extra_category_fileds');

// save extra category extra fields callback function
function save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}
}
}//Check if PantoGraph theme is active or not