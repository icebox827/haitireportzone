<?php
// **********************************************************************// 
// ! One Click Demo Content Import
// **********************************************************************// 
function ocdc_import_files() {
  return array(
    array(
      'import_file_name'             => 'Local News Demo',
      'categories'                   => array( 'Local', 'PantoGraph' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/lettermain/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/lettermain/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/lettermain/customizer.dat',
      'import_preview_image_url'     => 'http://fluentthemes.com/wp/pionusnews-view-demo/img/panto-old/v1.png',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Local News Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="http://fluentthemes.com/wp/pionusnews-view-demo/theme-options/letter/theme-options-main.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'http://fluentthemes.com/wp/letter/',
    ),
	array(
      'import_file_name'             => 'Tourism Blog Demo',
      'categories'                   => array( 'Tourism', 'PantoGraph' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter4/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter4/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter4/customizer.dat',
      'import_preview_image_url'     => 'http://fluentthemes.com/wp/pionusnews-view-demo/img/panto-old/v4.png',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Tourism Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="http://fluentthemes.com/wp/pionusnews-view-demo/theme-options/letter/theme-options-04.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'http://fluentthemes.com/wp/letter/pantograph-variation-four/',
    ),
	array(
      'import_file_name'             => 'Light Magazine Demo',
      'categories'                   => array( 'Light', 'PantoGraph' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter5/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter5/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter5/customizer.dat',
      'import_preview_image_url'     => 'http://fluentthemes.com/wp/pionusnews-view-demo/img/panto-old/v5.png',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Light Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="http://fluentthemes.com/wp/pionusnews-view-demo/theme-options/letter/theme-options-05.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'http://fluentthemes.com/wp/letter/pantograph-variation-five/',
    ),
	array(
      'import_file_name'             => 'News Magazine Demo',
      'categories'                   => array( 'News', 'PantoGraph' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter6/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter6/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter6/customizer.dat',
      'import_preview_image_url'     => 'http://fluentthemes.com/wp/pionusnews-view-demo/img/panto-old/v6.png',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the News Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="http://fluentthemes.com/wp/pionusnews-view-demo/theme-options/letter/theme-options-06.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'http://fluentthemes.com/wp/letter/pantograph-variation-six/',
    ),
	array(
      'import_file_name'             => 'Sports News Demo',
      'categories'                   => array( 'Sports', 'PantoGraph' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter7/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter7/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter7/customizer.dat',
      'import_preview_image_url'     => 'http://fluentthemes.com/wp/pionusnews-view-demo/img/panto-old/v7.png',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Sports News Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="http://fluentthemes.com/wp/pionusnews-view-demo/theme-options/letter/theme-options-07.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'http://fluentthemes.com/wp/letter/pantograph-variation-seven/',
    ),
	array(
      'import_file_name'             => 'Health Blog Demo',
      'categories'                   => array( 'Health', 'PantoGraph' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter8/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter8/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter8/customizer.dat',
      'import_preview_image_url'     => 'http://fluentthemes.com/wp/pionusnews-view-demo/img/panto-old/v8.png',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Health Blog Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="http://fluentthemes.com/wp/pionusnews-view-demo/theme-options/letter/theme-options-08.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'http://fluentthemes.com/wp/letter/pantograph-variation-eight/',
    ),
	array(
      'import_file_name'             => 'Treatment Blog Demo',
      'categories'                   => array( 'Treatment', 'PantoGraph' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter9/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter9/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/demo-content/letter9/customizer.dat',
      'import_preview_image_url'     => 'http://fluentthemes.com/wp/pionusnews-view-demo/img/panto-old/v9.png',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Treatment Blog Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="http://fluentthemes.com/wp/pionusnews-view-demo/theme-options/letter/theme-options-09.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'http://fluentthemes.com/wp/letter/pantograph-variation-nine/',
    ),
  );
}
add_filter( 'pt-ocdc/import_files', 'ocdc_import_files' );

function ocdc_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'pantograph_primary_menu' => $main_menu->term_id,
            'pantograph_menu_footer' => $footer_menu->term_id
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Homepage - 02' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdc/after_import', 'ocdc_after_import_setup' );