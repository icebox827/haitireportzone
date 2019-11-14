<?php
// **********************************************************************// 
// ! One Click Demo Content Import
// **********************************************************************// 
function ocdc_import_files() {
  return array(
    array(
      'import_file_name'             => 'Local Magazine Demo',
      'categories'                   => array( 'Local', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demomain/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demomain/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demomain/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/celebraty-news1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Local Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-main.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/',
    ),
	array(
      'import_file_name'             => 'Fashion Magazine Demo',
      'categories'                   => array( 'Fashion', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo1/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo1/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo1/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/fashion-magazine1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Fashion Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-01.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-one/',
    ),
    array(
      'import_file_name'             => 'Sports Magazine Demo',
      'categories'                   => array( 'Sports', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo2/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo2/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo2/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/sports-news1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Sports Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-02.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-two/',
    ),
	array(
      'import_file_name'             => 'Travel Blog Demo',
      'categories'                   => array( 'Travel', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo3/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo3/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo3/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/travel-blog1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Travel Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-03.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-three/',
    ),
	array(
      'import_file_name'             => 'Business Magazine Demo',
      'categories'                   => array( 'Business', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo4/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo4/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo4/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/business-news1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Business Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-04.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-four/',
    ),
	array(
      'import_file_name'             => 'Travel Magazine Demo',
      'categories'                   => array( 'Travel', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo5/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo5/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo5/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/travel-blog2.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Travel Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-05.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-five/',
    ),
	array(
      'import_file_name'             => 'Tech News Demo',
      'categories'                   => array( 'Tech', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo6/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo6/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo6/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/tech-news1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Tech News Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-06.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-six/',
    ),
	array(
      'import_file_name'             => 'Celebrety Blog Demo',
      'categories'                   => array( 'Celebrety', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo7/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo7/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo7/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/celebrety-blog.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Celebrety Blog Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-07.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-seven/',
    ),
	array(
      'import_file_name'             => 'Car News Demo',
      'categories'                   => array( 'Car', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo8/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo8/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo8/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/car-news.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Car News Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-08.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-eight/',
    ),
	array(
      'import_file_name'             => 'Gaming Pro Demo',
      'categories'                   => array( 'Sports', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo9/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo9/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo9/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/gaming-news.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Gaming Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-09.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-nine/',
    ),
	array(
      'import_file_name'             => 'Simple Blog Demo',
      'categories'                   => array( 'Blog', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo10/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo10/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo10/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/simple-blog2.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Simple Blog Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-10.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-ten/',
    ),
	array(
      'import_file_name'             => 'PhotoGraphy Dark Demo',
      'categories'                   => array( 'PhotoGraphy', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo11/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo11/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo11/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/photography-news.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the PhotoGraphy Blog Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-11.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-eleven/',
    ),
	array(
      'import_file_name'             => 'World News Demo',
      'categories'                   => array( 'World News', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo12/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo12/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo12/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/world-news1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the World News Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-12.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-twelve/',
    ),
	array(
      'import_file_name'             => 'School Kids Demo',
      'categories'                   => array( 'Kids', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo13/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo13/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo13/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/school-kids.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the School Kids Blog Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-13.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-thirteen/',
    ),
	array(
      'import_file_name'             => 'Scandal News Demo',
      'categories'                   => array( 'Scandal', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo14/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo14/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo14/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/scandal-news1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Scandal News Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-14.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-fourteen/',
    ),
	array(
      'import_file_name'             => 'Wide News Demo',
      'categories'                   => array( 'Wide', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo15/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo15/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo15/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/wide-news1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Wide News Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-15.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-fifteen/',
    ),
	array(
      'import_file_name'             => 'Dark Magazine Demo',
      'categories'                   => array( 'Dark', 'Pionus' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo1/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo1/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'template-parts/pionus/framework/demo-content/demo1/customizer.dat',
      'import_preview_image_url'     => 'https://fluentthemes.com/wp/pionusnews-view-demo/img/fashion-magazine2.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to import theme-options data separately. Get the Dark Magazine Demo Theme-Options Data <a style="font-weight:bold;" target="_blank" href="https://fluentthemes.com/wp/pionusnews-view-demo/theme-options/theme-options-01.html">from here</a>. Then Copay and Save the data in your PC and you will be able to use that saved data later to import theme-options separately.', 'pantograph'),
      'preview_url'                  => 'https://fluentthemes.com/wp/pionus-news/variation-one/homepage-black-02/',
    ),
  );
}
add_filter( 'pt-ocdc/import_files', 'ocdc_import_files' );

function ocdc_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$right_menu = get_term_by( 'name', 'Right Menu', 'nav_menu' );
	$left_menu = get_term_by( 'name', 'Left Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'pionusnews_primary_menu' => $main_menu->term_id,
			'pionusnews_right_menu' => $right_menu->term_id,
			'pionusnews_left_menu' => $left_menu->term_id,
            'pionusnews_menu_footer' => $footer_menu->term_id
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