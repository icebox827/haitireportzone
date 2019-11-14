<?php
// **********************************************************************// 
// ! Update Category Post Count
// **********************************************************************// 
add_action('init', 'update_category_post_count');
function update_category_post_count(){
global $wpdb;
$taxonomy_table_name = $wpdb->prefix . 'term_taxonomy';
$relationships_table_name = $wpdb->prefix . 'term_relationships';
$posts_table_name = $wpdb->prefix . 'posts';
 $wpdb->query("
	UPDATE $taxonomy_table_name SET count = (
	SELECT COUNT(*) FROM $relationships_table_name rel 
		LEFT JOIN $posts_table_name po ON (po.ID = rel.object_id) 
		WHERE 
			rel.term_taxonomy_id = $taxonomy_table_name.term_taxonomy_id 
			AND 
			$taxonomy_table_name.taxonomy NOT IN ('link_category')
			AND 
			po.post_status IN ('publish', 'future')
	)
 ");
}

function get_first_video_embed($post_id) {
  $content = apply_filters('the_content', get_post_field('post_content', $post_id));
  $iframes = get_media_embedded_in_content( $content, 'iframe' );
  $ytube_post_content = get_the_content();
  $ytube_final_post_content = '';
  if(isset($iframes[0])){
  return $video_post_iframe = $iframes[0];
  }else{
	$pattern = '@(http|https)://(www\.)?youtu[^\s]*@i';
    //This was just for test
    //$string = "abc def http://www.youtube.com/watch?v=t-ZRX8984sc ghi jkm";
    $matches = array();
    preg_match_all($pattern, $ytube_post_content, $matches);
    foreach ($matches[0] as $match) {
        $ytube_post_content = str_replace($match, '<iframe width="100%" height="450" src="' . $match . '" frameborder="0" allowfullscreen></iframe>', $ytube_post_content);
		$ytube_final_post_content = str_replace('watch?v=', 'embed', $ytube_post_content);
    }
    return $video_post_iframe = $ytube_final_post_content;
	//return $video_post_iframe = get_the_content();
  }
}

function get_video_content($post_id) {
  $content = get_the_content();
  $iframes = get_media_embedded_in_content( $content, 'iframe' );
  return $content;
}

add_filter( 'comments_open', 'my_comments_open', 10, 2 );

function my_comments_open( $open, $post_id ) {

	$post = get_post( $post_id );

	if ( ! empty($post) && is_a($post, 'WP_Post') ) {
	if ( 'page' == $post->post_type ) {
		$open = false;
	}
	}
	return $open;
}

// **********************************************************************// 
// ! Supports post thumbnails and post formats
// **********************************************************************// 
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'video' ) );
add_theme_support( 'custom-logo', array(
   'height'      => 35,
   'width'       => 200,
   'flex-width' => true,
) );
function pantograph_the_custom_logo() {
   if ( function_exists( 'the_custom_logo' ) ) {
      the_custom_logo();
   }
}

add_filter( 'get_custom_logo', 'change_logo_class' );


function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'navbar-brand', $html );

    return $html;
}
	
// **********************************************************************// 
// ! Rss feeds, Custom Background and Title Tag theme supports
// **********************************************************************// 
add_theme_support( 'automatic-feed-links' );
add_theme_support('custom-background', array(
        'default-color' => '#ffffff',
    ));
add_theme_support( 'custom-header', array(
		'default-text-color'     => '#000'
	) );
add_theme_support( 'title-tag' );
function pantograph_add_editor_styles() {
    add_editor_style( 'css/bootstrap.css' );
}
add_action( 'admin_init', 'pantograph_add_editor_styles' );

// **********************************************************************// 
// ! This theme uses wp_nav_menu() for Main Menu
// **********************************************************************// 
register_nav_menus( array(
		'pantograph_primary_menu'=> __('Main Menu', 'pantograph'),
		'pantograph_right_menu'=> __('Right Menu', 'pantograph'),
		'pantograph_left_menu'=> __('Left Menu', 'pantograph'),
		'pantograph_menu_footer'=> __('Footer Menu', 'pantograph')
) );


// **********************************************************************// 
// ! Getting Theme Fonts
// **********************************************************************//
// ! Hind Vadodara Font
function pantograph_fonts_hind_vadodara_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by Hind Vadodara, translate this to 'off'. Do not translate
* into your own language.
*/
$font = _x( 'on', 'Hind Vadodara font: on or off', 'pantograph' );

$font_families = array();
 
if ( 'off' !== $font ) {
$font_families[] = 'Hind Vadodara:300,400,500,600,700';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}

// ! Opensans Font
function pantograph_fonts_opensans_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by Open Sans, translate this to 'off'. Do not translate
* into your own language.
*/
$font = _x( 'on', 'Open Sans font: on or off', 'pantograph' );

$font_families = array();
 
if ( 'off' !== $font ) {
$font_families[] = 'Open Sans:400,400italic,600,600italic';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}

// ! Roboto Font
function pantograph_fonts_roboto_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by Roboto, translate this to 'off'. Do not translate
* into your own language.
*/
$font = _x( 'on', 'Roboto font: on or off', 'pantograph' );

$font_families = array();
 
if ( 'off' !== $font ) {
$font_families[] = 'Roboto:400,500,600,700,400italic';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}

// ! Lato Font
function pantograph_fonts_lato_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by Lato, translate this to 'off'. Do not translate
* into your own language.
*/
$font = _x( 'on', 'Lato font: on or off', 'pantograph' );

$font_families = array();
 
if ( 'off' !== $font ) {
$font_families[] = 'Lato:400,500,400italic';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}

// ! Roboto Condensed Font
function pantograph_fonts_roboto_condensed_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by Roboto Condensed, translate this to 'off'. Do not translate
* into your own language.
*/
$font = _x( 'on', 'Roboto Condensed font: on or off', 'pantograph' );

$font_families = array();
 
if ( 'off' !== $font ) {
$font_families[] = 'Roboto Condensed:400,500,600,400italic';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}

// ! Poppins Font
function pantograph_fonts_poppins_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by Poppins, translate this to 'off'. Do not translate
* into your own language.
*/
$font = _x( 'on', 'Poppins font: on or off', 'pantograph' );

$font_families = array();
 
if ( 'off' !== $font ) {
$font_families[] = 'Poppins:400,500,600,700';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}

// ! Rajdhani Font
function pantograph_fonts_rajdhani_url() {
$fonts_url = '';
 
/* Translators: If there are characters in your language that are not
* supported by Rajdhani, translate this to 'off'. Do not translate
* into your own language.
*/
$font = _x( 'on', 'Rajdhani font: on or off', 'pantograph' );

$font_families = array();
 
if ( 'off' !== $font ) {
$font_families[] = 'Rajdhani:400,500,600,700';
}
 
$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext' ),
);
 
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
 
return esc_url_raw( $fonts_url );
}


// **********************************************************************// 
// ! Custom Walker for wp_nav_menu()
// **********************************************************************//
class pantograph_walker_nav_menu extends Walker_Nav_Menu {

private $blog_sidebar_pos = "";
// add classes to ul sub-menus
public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\" >\n";
		}
  
// add main/sub classes to li's and links
public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			/**
			 * Dividers, Headers or Disabled
			 * =============================
			 * Determine whether the item is a Divider, Header, Disabled or regular
			 * menu item. To prevent errors we use the strcasecmp() function to so a
			 * comparison that is not case sensitive. The strcasecmp() function returns
			 * a 0 if the strings are equal.
			 */
			if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
			} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
			} else {
				$value = '';
				$class_names = $value;
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				if ( $args->has_children ) {
					$class_names .= ' dropdown dropdown-v1';
				}
				if ( in_array( 'current-menu-item', $classes, true ) ) {
					$class_names .= ' active';
				}
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li ' . $id . $value . $class_names . '>';
				$atts = array();

				if ( empty( $item->attr_title ) ) {
					$atts['title']  = ! empty( $item->title )   ? strip_tags( $item->title ) : '';
				} else {
					$atts['title'] = $item->attr_title;
				}

				$atts['target'] = ! empty( $item->target ) ? $item->target : '';
				$atts['rel']    = ! empty( $item->xfn )    ? $item->xfn    : '';
				// If item has_children add atts to a.
				if ( $args->has_children && 0 === $depth ) {
					$atts['href']           = '#';
					$atts['data-toggle']    = 'dropdown';
					$atts['class']          = 'dropdown-toggle';
					$atts['aria-haspopup']  = 'true';
				} else {
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
				}
				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}
				$item_output = $args->before;

				/*
				 * Glyphicons/Font-Awesome
				 * ===========
				 * Since the the menu item is NOT a Divider or Header we check the see
				 * if there is a value in the attr_title property. If the attr_title
				 * property is NOT null we apply it as the class name for the glyphicon.
				 */
				 
				 if( 'mega_menu' == $item->object ){
				$megamenu_item = get_post( $item->object_id );
				$item_output .= '<div class="yamm-content">' . apply_filters( 'the_content', $megamenu_item->post_content ) . '</div>';
				}else{
			
				if ( ! empty( $item->attr_title ) ) {
					$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
					if ( false !== $pos ) {
						$item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
					} else {
						$item_output .= '<a' . $attributes . '><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
					}
				} else {
					$item_output .= '<a' . $attributes . '>';
				}
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="fa fa-angle-down"></span></a>' : '</a>';
				$item_output .= $args->after;
			}
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				
				
			} // End if().
		}
		
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) {
				return; }
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}
} //End Walker_Nav_Menu


// **********************************************************************// 
// ! Custom Walker for wp_nav_menu() For Style 3
// **********************************************************************//
class pantograph_walker_nav_menu_for_style_3 extends Walker_Nav_Menu {

private $blog_sidebar_pos = "";
// add classes to ul sub-menus
public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\" >\n";
		}
  
// add main/sub classes to li's and links
public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			/**
			 * Dividers, Headers or Disabled
			 * =============================
			 * Determine whether the item is a Divider, Header, Disabled or regular
			 * menu item. To prevent errors we use the strcasecmp() function to so a
			 * comparison that is not case sensitive. The strcasecmp() function returns
			 * a 0 if the strings are equal.
			 */
			if ( 0 === strcasecmp( $item->attr_title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->title, 'divider' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="divider">';
			} elseif ( 0 === strcasecmp( $item->attr_title, 'dropdown-header' ) && 1 === $depth ) {
				$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
			} elseif ( 0 === strcasecmp( $item->attr_title, 'disabled' ) ) {
				$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
			} else {
				$value = '';
				$class_names = $value;
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				if ( $args->has_children ) {
					$class_names .= ' dropdown';
				}
				if ( in_array( 'current-menu-item', $classes, true ) ) {
					$class_names .= ' active';
				}
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li ' . $id . $value . $class_names . '>';
				$atts = array();

				if ( empty( $item->attr_title ) ) {
					$atts['title']  = ! empty( $item->title )   ? strip_tags( $item->title ) : '';
				} else {
					$atts['title'] = $item->attr_title;
				}

				$atts['target'] = ! empty( $item->target ) ? $item->target : '';
				$atts['rel']    = ! empty( $item->xfn )    ? $item->xfn    : '';
				// If item has_children add atts to a.
				if ( $args->has_children && 0 === $depth ) {
					$atts['href']           = '#';
					$atts['data-toggle']    = 'dropdown';
					$atts['class']          = 'dropdown-toggle';
					$atts['aria-haspopup']  = 'true';
				}elseif ( $args->has_children && 1 === $depth ) {
					$atts['href']           = '#';
					$atts['data-toggle']    = 'dropdown';
					$atts['class']          = 'next-toggle';
					$atts['aria-haspopup']  = 'true';
				} else {
					$atts['href'] = ! empty( $item->url ) ? $item->url : '';
				}
				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}
				$item_output = $args->before;

				/*
				 * Glyphicons/Font-Awesome
				 * ===========
				 * Since the the menu item is NOT a Divider or Header we check the see
				 * if there is a value in the attr_title property. If the attr_title
				 * property is NOT null we apply it as the class name for the glyphicon.
				 */
				 
				 if( 'mega_menu' == $item->object ){
				$megamenu_item = get_post( $item->object_id );
				$item_output .= '<div class="yamm-content">' . apply_filters( 'the_content', $megamenu_item->post_content ) . '</div>';
				}else{
			
				if ( ! empty( $item->attr_title ) ) {
					$pos = strpos( esc_attr( $item->attr_title ), 'glyphicon' );
					if ( false !== $pos ) {
						$item_output .= '<a' . $attributes . '><span class="glyphicon ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></span>&nbsp;';
					} else {
						$item_output .= '<a' . $attributes . '><i class="fa ' . esc_attr( $item->attr_title ) . '" aria-hidden="true"></i>&nbsp;';
					}
				} else {
					$item_output .= '<a' . $attributes . '>';
				}
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="fa fa-angle-right"></span></a>' : '</a>';
				$item_output .= $args->after;
			}
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				
				
			} // End if().
		}
		
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) {
				return; }
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}
} //End Walker_Nav_Menu For Style 3


// **********************************************************************// 
// ! Add breadcrumbs
// **********************************************************************//

// Breadcrumbs
function pantograph_wordpress_breadcrumbs() {
       
    $allowed_html_array = array(
				'ul' => array(
					'class' => array(),
					'id' => array()
				),
				'li' => array(
					'class' => array()
				),
				'span' => array(
					'class' => array()
				),
				'a' => array(
					'class' => array(),
					'href' => array(),
					'title' => array()
				));
	// Settings
    $separator          = '';
    $breadcrums_id      = 'bcrumbs';
    $breadcrums_class   = 'bcrumbs';
    $home_title         = esc_html__('Home', 'pantograph');
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
    $prefix = '';
    $output = '';
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        $output .= '<ul id="' . esc_attr($breadcrums_id) . '" class="' . esc_attr($breadcrums_class) . '">';
           
        // Home page
        $output .= '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        $output .= '<li class="separator separator-home"> ' . esc_attr($separator) . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            $output .= '<li class="item-current item-archive"><span class="bread-current bread-archive">'.esc_html__('Archives', 'pantograph').'</span></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $output .= '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_attr($post_type_object->labels->name) . '</a></li>';
                $output .= '<li class="separator"> ' . esc_attr($separator) . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            $output .= '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_attr($custom_tax_name) . '</span></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $output .= '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_attr($post_type_object->labels->name) . '</a></li>';
                $output .= '<li class="separator"> ' . esc_attr($separator) . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end($category);
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                $output .= $cat_display;
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                $output .= '<li class="item-cat item-cat-' . esc_attr($cat_id) . ' item-cat-' . esc_attr($cat_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($cat_id) . ' bread-cat-' . esc_attr($cat_nicename) . '" href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '">' . esc_attr($cat_name) . '</a></li>';
                $output .= '<li class="separator"> ' . esc_attr($separator) . ' </li>';
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
              
            } else {
                  
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            $output .= '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($ancestor) . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . esc_attr($ancestor) . '"> ' . esc_attr($separator) . ' </li>';
                }
                   
                // Display parent pages
                $output .= $parents;
                   
                // Current page
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';
                   
            } else {
                   
                // Just display current page if not parents
                $output .= '<li class="item-current item-' . esc_attr($post->ID) . '"><span class="bread-current bread-' . esc_attr($post->ID) . '"> ' . get_the_title() . '</span></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            $output .= '<li class="item-current item-tag-' . esc_attr($get_term_id) . ' item-tag-' . esc_attr($get_term_slug) . '"><span class="bread-current bread-tag-' . esc_attr($get_term_id) . ' bread-tag-' . esc_attr($get_term_slug) . '">' . esc_attr($get_term_name) . '</span></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            $output .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html__('Archives', 'pantograph').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_attr($separator) . ' </li>';
               
            // Month link
            $output .= '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' '.esc_html__('Archives', 'pantograph').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('m') . '"> ' . esc_attr($separator) . ' </li>';
               
            // Day display
            $output .= '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' '.esc_html__('Archives', 'pantograph').'</span></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            $output .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html__('Archives', 'pantograph').'</a></li>';
            $output .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_attr($separator) . ' </li>';
               
            // Month display
            $output .= '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' '.esc_html__('Archives', 'pantograph').'</span></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            $output .= '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' '.esc_html__('Archives', 'pantograph').'</span></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            $output .= '<li class="item-current item-current-' . esc_attr($userdata->user_nicename) . '"><span class="bread-current bread-current-' . esc_attr($userdata->user_nicename) . '" title="' . esc_attr($userdata->display_name) . '">' . esc_html__( 'Search results for', 'pantograph' ) . ': ' . esc_attr($userdata->display_name) . '</span></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            $output .= '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page', 'pantograph').' ' . get_query_var('paged') . '</span></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            $output .= '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">'.esc_html__( 'Search results for', 'pantograph' ).': ' . get_search_query() . '</span></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            $output .= '<li>' . esc_html__( 'Error 404', 'pantograph' ) . '</li>';
        }
       
        $output .= '</ul>';
		echo wp_kses($output, $allowed_html_array);  
    }
       
}
/// Breadcrumbs End ///

// **********************************************************************// 
// ! Get Global Variables
// **********************************************************************//
function pantograph_get_global_post() {
    global $post;
    if ( 
        ! $post instanceof \WP_Post
    ) {
        return false;
    }
    return $post;
}

function pantograph_get_global_wpquery() {
    global $wp_query;
    return $wp_query;
}

// **********************************************************************// 
// ! Custom Pagination
// **********************************************************************//

function pantograph_custom_pagination() {
	global $wp_query;

	$big = 999999999; // need an unlikely integer
		
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'show_all'     => false,
		'end_size'     => 1,
		'mid_size'     => 2,
		'prev_next'    => true,
		'prev_text'    => '<span class="fa fa-angle-double-left"></span>',
		'next_text'    => '<span class="fa fa-angle-double-right"></span>',
		'type'         => 'list',
		'add_args'     => false,
		'add_fragment' => ''
	) );
}

// **********************************************************************// 
// ! Excerpt Limit
// **********************************************************************//
function pantograph_theme_excerpt($limit) {
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
// **********************************************************************// 
// ! Content Limit
// **********************************************************************//
function pantograph_theme_content($limit) {
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

function pantograph_theme_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'pantograph_theme_excerpt_length', 999 );

function the_title_theme_excerpt($before = '', $after = '', $echo = true, $length = false) 
  {
    $title = get_the_title();

    if ( $length && is_numeric($length) ) {
        $title = substr( $title, 0, $length );
    }

    if ( strlen($title)> 0 ) {
        $title = apply_filters('the_title_theme_excerpt', $before . $title . $after, $before, $after);
        if ( $echo )
            echo esc_attr($title);
        else
            return $title;
    }
}

// **********************************************************************// 
// ! Set Content Width
// **********************************************************************// 
if (!isset($content_width)) { $content_width = 750; }

add_filter('get_avatar','add_gravatar_class');

// **********************************************************************// 
// ! Adding Class to Gravatar image
// **********************************************************************//
function add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-circle", $class);
    return $class;
}

// **********************************************************************// 
// ! Display Comments section
// **********************************************************************//
if ( ! function_exists( 'pantograph_comment' ) ) {
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own pantograph_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
	function pantograph_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	global $post;
	?>
	
	
	<li <?php comment_class('comment-item'); ?> id="comment-<?php comment_ID(); ?>">
	<div class="comment-content">
		<a href="javascript:void(0)"><?php echo get_avatar($comment, 40); ?></a>

		<div class="comment-title"><a href="javascript:void(0)"><?php comment_author(); ?></a> <span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span></div>
		<?php comment_text()?>

		<div class="comment-meta">
			<span><i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
		</div>
	</div>
	</li>
	<!-- #comment-## -->

	<?php
	}
}

//change text to leave a reply on comment form
function pantograph_comment_reform ($arg) {
$arg['title_reply'] = __('<h5>Leave a comment</h5>', 'pantograph');
return $arg;
}
add_filter('comment_form_defaults','pantograph_comment_reform');

/*******************
Comment form styling
*******************/
if ( ! function_exists( 'pantograph_modify_comment_fields' ) ) {
	function pantograph_modify_comment_fields($fields) {

    $fields['fields'] = '<div class="row"><div class="col-md-6">
                      <input type="text" id="author" name="author" placeholder="'.esc_attr__("Name", 'pantograph').'"';
	$n_value = '';
	$e_value = '';

	$fields['fields'] .= ' value="'.esc_attr($n_value).'" aria-required="true" /></div>
						  <div class="col-md-6">';
    $fields['fields'] .= '<input type="email" id="email" name="email" placeholder="'.esc_attr__("Email", 'pantograph').'" value="'.esc_attr($e_value).'" aria-required="true" />
	</div></div><!--End row-->';
	return $fields;
	}
}

add_filter('comment_form_defaults', 'pantograph_modify_comment_fields');//Name, Email and Website fields customization filter

if ( !is_user_logged_in() ) { 
if ( ! function_exists( 'pantograph_comment_field' ) ) {
	function pantograph_comment_field($arg) {
  
	$arg['comment_field'] = '
			<textarea name="comment" id="comment" rows="10" placeholder="'.esc_attr__("Your comment here...", 'pantograph').'"></textarea>
		 ';    
	return $arg;
	}
}
add_filter('comment_form_defaults', 'pantograph_comment_field');//Text area customization filter
} else {
if ( ! function_exists( 'pantograph_comment_field' ) ) {
	function pantograph_comment_field($arg) {
  
	$arg['comment_field'] = '
								<textarea name="comment" id="comment" placeholder="'.esc_attr__("Your comment here...", 'pantograph').'" rows="10" class="form-control"></textarea>
							 ';    
	return $arg;
	}
}
add_filter('comment_form_defaults', 'pantograph_comment_field');//Text area customization filter
}

if ( !is_user_logged_in() ) {
function pantograph_comment_form_submit_button($button) {
	$button =
		' <button name="submit" type="submit" id="[args:id_submit]" value="[args:label_submit]" class="btn btn-primary">'.esc_html__("Post  your comment", 'pantograph').'</button>
			
         ';// .
		//get_comment_id_fields();
	return $button;
}
add_filter('comment_form_submit_button', 'pantograph_comment_form_submit_button');//Submit button customization filter
} else {
function pantograph_comment_form_submit_button($button) {
	$button ='
			<button name="submit" type="submit" id="[args:id_submit]" value="[args:label_submit]" class="btn btn-primary">'.esc_html__("Post  your comment", 'pantograph').'</button>
         ';// .
		//get_comment_id_fields();
	return $button;
}
add_filter('comment_form_submit_button', 'pantograph_comment_form_submit_button');//Submit button customization filter
}

function pantograph_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;

return $fields;
}
add_filter( 'comment_form_fields', 'pantograph_move_comment_field_to_bottom' );//move the comment text field to the bottom

function load_featured_posts_by_ajax_callback() {
	check_ajax_referer('load_more_featured_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'posts_per_page' => '2',
		'ignore_sticky_posts' => 1,
		'meta_query'  => array(
			array(
				'key' => 'featured_posts',
				'value' => '1'
			)
		),
		'orderby' => 'comment_count',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
		if($featured_img){
			if ( !wp_is_mobile() ) {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
			} else {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
		}
		?>
			<article class="style4">
				<div class="post-thumb">
					<div class="small-title cat"><?php the_category(', '); ?></div>
					<div class="post-excerpt">
						<div class="meta">
							<span class="date"><?php the_time(get_option('date_format')); ?></span>
						</div>
						<h3 class="text-white"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
					</div>
					<div class="beforegeneralstyle">
						<div class="generalstyle bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
					</div>
				</div>
			</article>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_featured_posts_by_ajax', 'load_featured_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_featured_posts_by_ajax', 'load_featured_posts_by_ajax_callback');



function load_popular_posts_by_ajax_callback() {
	check_ajax_referer('load_more_popular_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'posts_per_page' => '2',
		'ignore_sticky_posts' => 1,
		'orderby' => 'comment_count',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
		if($featured_img){
			if ( !wp_is_mobile() ) {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
			} else {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
		}
		?>
			<article class="style2">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<a href="<?php the_permalink(); ?>">
							<div class="beforethumbnail">
								<div class="thumbnail bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
							</div>
						</a>
					</div>
					<div class="col-md-8 col-sm-8">
						<div class="post-excerpt no-padding">
							<div class="meta">
								<span><?php the_time(get_option('date_format')); ?></span>
							</div>
							<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
							<?php if(get_comments_number()>0){ ?>
							<div class="meta">
								<span class="comment">
								<a href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
								</span>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_popular_posts_by_ajax', 'load_popular_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_popular_posts_by_ajax', 'load_popular_posts_by_ajax_callback');



function load_popular_tab_posts_by_ajax_callback() {
	check_ajax_referer('load_more_popular_tab_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '2',
		'ignore_sticky_posts' => 1,
		'orderby' => 'comment_count',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
		if($featured_img){
			if ( !wp_is_mobile() ) {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
			} else {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
		}
		?>
			<article class="style2">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<a href="<?php the_permalink(); ?>">
							<div class="beforethumbnail">
								<div class="thumbnail bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
							</div>
						</a>
					</div>
					<div class="col-md-8 col-sm-8">
						<div class="post-excerpt no-padding">
							<div class="meta">
								<span><?php the_time(get_option('date_format')); ?></span>
							</div>
							<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
							<?php if(get_comments_number()>0){ ?>
							<div class="meta">
								<span class="comment">
								<a href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
								</span>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_popular_tab_posts_by_ajax', 'load_popular_tab_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_popular_tab_posts_by_ajax', 'load_popular_tab_posts_by_ajax_callback');

function load_comment_tab_posts_by_ajax_callback() {
	check_ajax_referer('load_more_comment_tab_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '2',
		'ignore_sticky_posts' => 1,
		'orderby' => 'comment_count',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
		if($featured_img){
			if ( !wp_is_mobile() ) {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
			} else {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
		}
		?>
			<article class="style2">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<a href="<?php the_permalink(); ?>">
							<div class="beforethumbnail">
								<div class="thumbnail bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
							</div>
						</a>
					</div>
					<div class="col-md-8 col-sm-8">
						<div class="post-excerpt no-padding">
							<div class="meta">
								<span><?php the_time(get_option('date_format')); ?></span>
							</div>
							<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
							<?php if(get_comments_number()>0){ ?>
							<div class="meta">
								<span class="comment">
								<a href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
								</span>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_comment_tab_posts_by_ajax', 'load_comment_tab_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_comment_tab_posts_by_ajax', 'load_comment_tab_posts_by_ajax_callback');

function load_viewed_tab_posts_by_ajax_callback() {
	check_ajax_referer('load_more_viewed_tab_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '2',
		'ignore_sticky_posts' => 1,
		'meta_key' => 'wpb_post_views_count', 
		'orderby' => 'meta_value_num', 
		'order' => 'DESC',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
		if($featured_img){
			if ( !wp_is_mobile() ) {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
			} else {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
		}
		?>
			<article class="style2">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<a href="<?php the_permalink(); ?>">
							<div class="beforethumbnail">
								<div class="thumbnail bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
							</div>
						</a>
					</div>
					<div class="col-md-8 col-sm-8">
						<div class="post-excerpt no-padding">
							<div class="meta">
								<span><?php the_time(get_option('date_format')); ?></span>
							</div>
							<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
							<?php if(get_comments_number()>0){ ?>
							<div class="meta">
								<span class="comment">
								<a href="<?php echo esc_url(get_comments_link() ); ?>"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></a>
								</span>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_viewed_tab_posts_by_ajax', 'load_viewed_tab_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_viewed_tab_posts_by_ajax', 'load_viewed_tab_posts_by_ajax_callback');

function load_video_posts_by_ajax_callback() {
	check_ajax_referer('load_more_video_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'posts_per_page' => '2',
		'tax_query' => array( array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array('post-format-video')
		) ),
		'ignore_sticky_posts' => 1,
		'orderby' => 'comment_count',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = esc_url( wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ); 
		if($featured_img){
			if ( !wp_is_mobile() ) {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
			} else {
			$comment_post_get_image = get_the_post_thumbnail_url(get_the_ID(),'full');
			}
		}else{
			$comment_post_get_image = get_template_directory_uri().'/img/noblogimg.png';
		}
		?>
			<article class="article-home margin-bottom-20">
				<a href="<?php the_permalink(); ?>">
					<div class="article-thumbnew">
						<div class="play"></div>
						<div class="beforegeneralstyle">
							<div class="generalstyle bg-img" style="background-image: url('<?php echo esc_url($comment_post_get_image); ?>'); opacity: 1;"></div>
						</div>
					</div>
				</a>
				<div class="post-excerpt">
					<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
					<div class="meta">
						<span><?php esc_html_e( 'by', 'pantograph' ); ?> <?php echo get_the_author_link(); ?></span>
						<span><?php esc_html_e( 'on', 'pantograph' ); ?> <?php the_time(get_option('date_format')); ?></span>
						<span class="comment"><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></span>
					</div>
				</div>
			</article>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_video_posts_by_ajax', 'load_video_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_video_posts_by_ajax', 'load_video_posts_by_ajax_callback');


function load_post_block_2_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_2_posts', 'security');
	$paged = $_POST['page'];
	$category = $_POST['category'];
	$itemcount = $_POST['itemcount'];
	$bgimagecls = $_POST['bgimagecls'];
	$title_character_limit = $_POST['title_character_limit'];
	$args = array(
		'posts_per_page' => $itemcount,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
		if ( !wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
		}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		echo '<article class="style2">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<a href="'.get_permalink().'">
								<div class="beforethumbnail148">
									<div class="thumbnail148 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</a>
						</div>
						<div class="col-md-8 col-sm-8">
							<div class="post-excerpt">
								<div class="small-title cat">' . get_the_category_list(', ') . '</div>
								<h3><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span>'.esc_html__('by', 'pantograph').' '.get_the_author_link().'</span>
									<span>'.esc_html__('on', 'pantograph').' '.get_the_time('M j, Y').'</span>
									<span class="comment"><i class="fa fa-comment-o"></i> '.get_comments_number().'</span>
								</div>
								<p>' . pantograph_theme_excerpt(20) . '</p>
							</div>
						</div>
					</div>
				</article>';
		endwhile ?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_2_posts_by_ajax', 'load_post_block_2_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_2_posts_by_ajax', 'load_post_block_2_posts_by_ajax_callback');

function load_post_block_3_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_3_posts', 'security');
	$paged = $_POST['page'];
	$category = $_POST['category'];
	$itemcount = $_POST['itemcount'];
	$bgimagecls = $_POST['bgimagecls'];
	$title_character_limit = $_POST['title_character_limit'];
	$wordlimit = $_POST['wordlimit'];
	$args = array(
		'posts_per_page' => 3,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
		if ( !wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
		}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		echo '
		<div class="col-md-4 col-sm-4">
			<article class="style2 style-alt">
				<div class="margin-bottom-15">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail148">
							<div class="thumbnail148 '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</a>
				</div>
				<div>
					<div class="post-excerpt no-padding">
						<div class="meta">
							<span>'.get_the_time('M j, Y').'</span>
						</div>
						<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
					</div>
				</div>
			</article>
		</div>';
		endwhile 
		?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_3_posts_by_ajax', 'load_post_block_3_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_3_posts_by_ajax', 'load_post_block_3_posts_by_ajax_callback');

function load_post_block_4_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_4_posts', 'security');
	$paged = $_POST['page'];
	$category = $_POST['category'];
	$itemcount = $_POST['itemcount'];
	$bgimagecls = $_POST['bgimagecls'];
	$title_character_limit = $_POST['title_character_limit'];
	$wordlimit = $_POST['wordlimit'];
	$args = array(
		'posts_per_page' => 2,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
		if ( !wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
		}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		echo '<article class="style2">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<a href="'.get_permalink().'">
								<div class="beforegeneralstyle">
									<div class="generalstyle '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
								</div>
							</a>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="post-excerpt">
								<div class="small-title cat">' . get_the_category_list(', ') . '</div>
								<h3><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
								<div class="meta">
									<span>by '.get_the_author_link().'</span>
									<span>on '.get_the_time('M j, Y').'</span>
									<span class="comment"><i class="fa fa-comment-o"></i> '.get_comments_number().'</span>
								</div>
								<p>' . pantograph_theme_excerpt($wordlimit) . '</p>
								<a href="'.get_permalink().'" class="small-title rmore">Read More</a>
							</div>
						</div>
					</div>
				</article>';
		endwhile 
		?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_4_posts_by_ajax', 'load_post_block_4_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_4_posts_by_ajax', 'load_post_block_4_posts_by_ajax_callback');

function load_post_block_5_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_5_posts', 'security');
	$paged = $_POST['page'];
	$category = $_POST['category'];
	$itemcount = $_POST['itemcount'];
	$bgimagecls = $_POST['bgimagecls'];
	$title_character_limit = $_POST['title_character_limit'];
	$wordlimit = $_POST['wordlimit'];
	$args = array(
		'posts_per_page' => 2,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
		if ( !wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
		}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		echo '<div class="col-md-6 col-sm-6">
					<article class="article-home">
						<a href="'.get_permalink().'">
							<div class="beforegeneralstyle">
								<div class="generalstyle '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
							</div>
						</a>
						<div class="post-excerpt">
							<div class="small-title cat">' . get_the_category_list(', ') . '</div>
							<h3><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
							<div class="meta">
								<span>by '.get_the_author_link().'</span>
								<span>on '.get_the_time('M j, Y').'</span>
								<span class="comment"><i class="fa fa-comment-o"></i> '.get_comments_number().'</span>
							</div>
							<p>' . pantograph_theme_excerpt($wordlimit) . '</p>
						</div>
					</article>
				</div>';
		endwhile 
		?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_5_posts_by_ajax', 'load_post_block_5_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_5_posts_by_ajax', 'load_post_block_5_posts_by_ajax_callback');


function load_post_block_10_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_10_posts', 'security');
	$paged = $_POST['page'];
	$category = $_POST['category'];
	$itemcount = $_POST['itemcount'];
	$bgimagecls = $_POST['bgimagecls'];
	$title_character_limit = $_POST['title_character_limit'];
	$wordlimit = $_POST['wordlimit'];
	$args = array(
		'posts_per_page' => 2,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
		if ( !wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
		}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		echo '
		<article class="style2">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<a href="'.get_permalink().'">
						<div class="beforegeneralstyle">
							<div class="generalstyle '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</a>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="post-excerpt">
						<div class="small-title cat">' . get_the_category_list(', ') . '</div>
						<h3><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h3>
						<div class="meta">
							<span>by '.get_the_author_link().'</span>
							<span>on '.get_the_time('M j, Y').'</span>
							<span class="comment"><i class="fa fa-comment-o"></i> '.get_comments_number().'</span>
						</div>
						<p>' . pantograph_theme_excerpt($wordlimit) . '</p>
						<a href="'.get_permalink().'" class="small-title rmore">Read More</a>
					</div>
				</div>
			</div>
		</article>
		';
		endwhile 
		?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_10_posts_by_ajax', 'load_post_block_10_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_10_posts_by_ajax', 'load_post_block_10_posts_by_ajax_callback');

function load_post_block_14_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_14_posts', 'security');
	$paged = $_POST['page'];
	$category = $_POST['category'];
	$itemcount = $_POST['itemcount'];
	$bgimagecls = $_POST['bgimagecls'];
	$title_character_limit = $_POST['title_character_limit'];
	$args = array(
		'posts_per_page' => 2,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
		if ( !wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
		}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		echo '
		<article class="style2 style-alt">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<a href="'.get_permalink().'">
						<div class="beforethumbnail">
							<div class="thumbnail '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
						</div>
					</a>
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="post-excerpt no-padding">
						<div class="meta">
							<span>'.get_the_time('M j, Y').'</span>
						</div>
						<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
					</div>
				</div>
			</div>
		</article>';
		endwhile 
		?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_14_posts_by_ajax', 'load_post_block_14_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_14_posts_by_ajax', 'load_post_block_14_posts_by_ajax_callback');


function load_post_block_16_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_16_posts', 'security');
	$paged = $_POST['page'];
	$category = $_POST['category'];
	$itemcount = $_POST['itemcount'];
	$bgimagecls = $_POST['bgimagecls16'];
	$title_character_limit = $_POST['title_character_limit'];
	$args = array(
		'posts_per_page' => 2,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');
		if($featured_img){
		if ( !wp_is_mobile() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
		} else {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		}
		}else{
		$featured_img_url = get_template_directory_uri().'/img/noblogimg.png';
		}
		echo '
		<div class="col-md-6 col-sm-6">
		<article class="style2 style-alt padding-top-10">
			<a href="'.get_permalink().'">
				<div class="beforethumbnail">
					<div class="thumbnail '.esc_attr($bgimagecls).'" style="background-image: url('.esc_url($featured_img_url).'); opacity: 1;"></div>
				</div>
			</a>
			<div class="post-excerpt no-padding">
				<br>
				<div class="meta">
				<span>'.get_the_time('M j, Y').'</span>
			</div>
			<h5><a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a></h5>
			</div>
		</article>
	</div>';
		endwhile 
		?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_16_posts_by_ajax', 'load_post_block_16_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_16_posts_by_ajax', 'load_post_block_16_posts_by_ajax_callback');

function load_post_block_23_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_23_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'posts_per_page' => '2',
		'ignore_sticky_posts' => 1,
		'orderby' => 'comment_count',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$title_character_limit = 20;
		echo '<a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a>';
		endwhile 
		?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_23_posts_by_ajax', 'load_post_block_23_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_23_posts_by_ajax', 'load_post_block_23_posts_by_ajax_callback');


function load_post_block_25_posts_by_ajax_callback() {
	check_ajax_referer('load_more_post_block_25_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'posts_per_page' => '2',
		'ignore_sticky_posts' => 1,
		'orderby' => 'comment_count',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		
		while ( $my_posts->have_posts() ) : $my_posts->the_post();
		$title_character_limit = 20;
		echo '<a href="'.get_permalink().'">' . mb_strimwidth( get_the_title(), 0, $title_character_limit, '...' ) . '</a>';
		endwhile 
		?>
		<?php
	endif;

	wp_die();
}

add_action('wp_ajax_load_post_block_25_posts_by_ajax', 'load_post_block_25_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_block_25_posts_by_ajax', 'load_post_block_25_posts_by_ajax_callback');

// **********************************************************************// 
// ! Convert Hex Color Code to RGB
// **********************************************************************//
function pantograph_hex2RGB_convert($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // OUTPUT: pantograph_hex2RGB_convert("#FF0", true) -> 255,255,0
}

// **********************************************************************// 
// ! Category Styling Function
// **********************************************************************//
if ( ! function_exists( 'pantograph_category_styles' ) ) {
	function pantograph_category_styles( $sep = '', $echo = TRUE ) {
			
		if ( get_post_type() == 'post' ) {

			$output = ''; // temporary

			$category_code = array(); // temporary
			
			$cats = get_the_category();

				// Show primary category first
				if ( pantograph_is_extensions_plugin_active() ) { //Check if Extensions Plugin is Active
						$the_primary_cat = get_post_meta(get_the_ID(), 'primary_category', true);
						if ( $the_primary_cat && ! is_wp_error( $the_primary_cat ) && has_category( $the_primary_cat ) ) {
							$the_primary_category = get_term( $the_primary_cat, 'category' );
							$primary_cat_color = get_term_meta( $the_primary_category->term_id, '_category_color', true );
							$category_code[]    = '<span style="background-color: #'.$primary_cat_color.';" class="small-title-no-vc cat term-' . $the_primary_category->term_id . '"><a href="' . esc_url( get_category_link( $the_primary_category ) ) . '">' . esc_attr( $the_primary_category->name ) . '</a></span>';
						} else {
							foreach ( $cats as $cat_id => $cat ) {
								$cat_color = get_term_meta( $cat->cat_ID, '_category_color', true );
								$category_code[] = '<span style="background-color: #'.$cat_color.';" class="small-title-no-vc cat term-' . $cat->cat_ID . '"><a href="' . esc_url( get_category_link( $cat ) ) . '">' . esc_attr( $cat->name ) . '</a></span>';
							}
						}
					} else {
						foreach ( $cats as $cat_id => $cat ) {
							$cat_color = get_term_meta( $cat->cat_ID, '_category_color', true );
							$category_code[] = '<span style="background-color: #'.$cat_color.';" class="small-title-no-vc cat term-' . $cat->cat_ID . '"><a href="' . esc_url( get_category_link( $cat ) ) . '">' . esc_attr( $cat->name ) . '</a></span>';
						}
					}
				
			$output .= implode( $sep, $category_code );
				
			if ( $echo ) {
				echo $output; // escaped before already
			} else {
				return $output; // escaped before already
			}
		}
	}
}