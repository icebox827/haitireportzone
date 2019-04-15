<?php
/*-----------------------------------------------------------------------------------*/
/* Start Using pionusnews Shortcodes in the Visual Composer */
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'pionusnews_vc_shortcodes' );
function pionusnews_vc_shortcodes() {

/******************
Category For Mega Menu
******************/
vc_map( array(
      "name" => esc_html__("Category For Mega Menu", 'pantograph'),
      "base" => "pionusnews_category_post_list",
      "icon" => plugins_url( 'images/catmega.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Category For Mega Menu', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
	)
)
);

/******************
Tab Mega Menu With Category Posts
******************/
vc_map( array(
      "name" => esc_html__("Tab Mega Menu", 'pantograph'),
      "base" => "pionusnews_category_tab_post_list",
      "icon" => plugins_url( 'images/tabmenu.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Category For Tab Mega Menu', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tab-1 Heading", 'pantograph'),
            "param_name" => "heading1",
            "value" => '',
            "std" => 'Tab 1',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Tab-1 Category Name", 'pantograph'),
            "param_name" => "category1",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tab-2 Heading", 'pantograph'),
            "param_name" => "heading2",
            "value" => '',
			"std" => 'Tab 2',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Tab-2 Category Name", 'pantograph'),
            "param_name" => "category2",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph') 
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tab-3 Heading", 'pantograph'),
            "param_name" => "heading3",
            "value" => '',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Tab-3 Category Name", 'pantograph'),
            "param_name" => "category3",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tab-4 Heading", 'pantograph'),
            "param_name" => "heading4",
            "value" => '',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Tab-4 Category Name", 'pantograph'),
            "param_name" => "category4",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tab-5 Heading", 'pantograph'),
            "param_name" => "heading5",
            "value" => '',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Tab-5 Category Name", 'pantograph'),
            "param_name" => "category5",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tab-6 Heading", 'pantograph'),
            "param_name" => "heading6",
            "value" => '',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Tab-6 Category Name", 'pantograph'),
            "param_name" => "category6",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph') 
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tab-7 Heading", 'pantograph'),
            "param_name" => "heading7",
            "value" => '',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Tab-7 Category Name", 'pantograph'),
            "param_name" => "category7",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Tab-8 Heading", 'pantograph'),
            "param_name" => "heading8",
            "value" => '',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Tab-8 Category Name", 'pantograph'),
            "param_name" => "category8",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')
         )
	)
)
);

/*****************
Home Slider Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Home Slider", 'pantograph'),
      "base" => "pionusnews_home_slider",
      "icon" => plugins_url( 'images/slider.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Home Slider', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Style", 'pantograph'),
            "param_name" => "post_style",
            "value"       => array(
				"Style One"   => 1,
				"Style Two"   => 2
			  ),
			"std"         => 1,
            "description" => esc_html__("", 'pantograph')           
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Blue color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want the Image height to control the Slider height?", 'pantograph'),
            "param_name" => "bgimg_coming",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"No" => "no"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Remove the Dark Overlay from the Slider images", 'pantograph'),
            "param_name" => "r_d_overlay",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"No" => "no"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want the Slider to play automatically?", 'pantograph'),
            "param_name" => "slider_autoplay",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"No" => "no"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Height of the Slider", 'pantograph'),
            "param_name" => "slider_height",
            "value" => '',
            "description" => esc_html__("Keep it empty if you want to use Default Height for the slider. Input slider height here. For example: 400px", 'pantograph'),
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Left Margin of Slider", 'pantograph'),
            "param_name" => "left_margin",
            "value" => '0px',
            "description" => esc_html__("By default there is no left margin. Input margin in pixel. For example: 15px OR -12px etc", 'pantograph'),
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Right Margin of Slider", 'pantograph'),
            "param_name" => "right_margin",
            "value" => '0px',
            "description" => esc_html__("By default there is no right margin. Input margin in pixel. For example: 15px OR -12px etc", 'pantograph'),
         )
	)
)
);

/*****************
Post Block 1 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 1", 'pantograph'),
      "base" => "pionusnews_post_block_1_post",
      "icon" => plugins_url( 'images/block_1.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 1', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Next - Prev button?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Tab options?", 'pantograph'),
            "param_name" => "taboption",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Choose Category For Top Tab", 'pantograph'),
            "param_name" => "toptabcategory",
            "value" => pionusnews_post_categories_ID(),
			'dependency' => array(
				 'element' => 'taboption',
				 'value' =>'yes',
			 ),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Choose Category For Tab Dropdown", 'pantograph'),
            "param_name" => "dropdowntabcategory",
            "value" => pionusnews_post_categories_ID(),
			'dependency' => array(
				 'element' => 'taboption',
				 'value' =>'yes',
			 ),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Choose Background For Tab Dropdown", "pantograph" ),
            "param_name" => "blocksubtabbackground",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'taboption',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Background For Tab Dropdown", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Excerpt Limit In Word (Optional)", 'pantograph'),
            "param_name" => "large_post_excerpt_limit",
            "value" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 2 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 2", 'pantograph'),
      "base" => "pionusnews_post_block_2_post",
      "icon" => plugins_url( 'images/block_2.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 2', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Excerpt Limit In Word (Optional)", 'pantograph'),
            "param_name" => "large_post_excerpt_limit",
            "value" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);



/*****************
Post Block 3 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 3", 'pantograph'),
      "base" => "pionusnews_post_block_3_post",
      "icon" => plugins_url( 'images/block_3.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 3', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 4 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 4", 'pantograph'),
      "base" => "pionusnews_post_block_4_post",
      "icon" => plugins_url( 'images/block_4.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 4', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 5 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 5", 'pantograph'),
      "base" => "pionusnews_post_block_5_post",
      "icon" => plugins_url( 'images/block_5.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 5', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Excerpt Limit In Word (Optional)", 'pantograph'),
            "param_name" => "large_post_excerpt_limit",
            "value" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 6 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 6", 'pantograph'),
      "base" => "pionusnews_post_block_6_post",
      "icon" => plugins_url( 'images/block_6.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 6', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background Color", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background Color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Tab options?", 'pantograph'),
            "param_name" => "taboption",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Choose Category For Top Tabs", 'pantograph'),
            "param_name" => "toptabcategory",
            "value" => pionusnews_post_categories_ID(),
			'dependency' => array(
				 'element' => 'taboption',
				 'value' =>'yes',
			 ),
            "description" => __( "You must choose at least 1 category from here to make the tab options work", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Choose Category For Tab Dropdown", 'pantograph'),
            "param_name" => "dropdowntabcategory",
            "value" => pionusnews_post_categories_ID(),
			'dependency' => array(
				 'element' => 'taboption',
				 'value' =>'yes',
			 ),
            "description" => __( "You must choose at least 1 category from here to make the tab options work", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Choose Background For Tab Dropdown", "pantograph" ),
            "param_name" => "blocksubtabbackground",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'taboption',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Background For Tab Dropdown", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Excerpt Limit In Word (Optional)", 'pantograph'),
            "param_name" => "large_post_excerpt_limit",
            "value" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 7 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 7", 'pantograph'),
      "base" => "pionusnews_post_block_7_post",
      "icon" => plugins_url( 'images/block_3.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 7', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 2,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 8 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 8", 'pantograph'),
      "base" => "pionusnews_post_block_8_post",
      "icon" => plugins_url( 'images/block_8.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 8', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 2,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 9 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 9", 'pantograph'),
      "base" => "pionusnews_post_block_9_post",
      "icon" => plugins_url( 'images/block_9.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 9', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 10 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 10", 'pantograph'),
      "base" => "pionusnews_post_block_10_post",
      "icon" => plugins_url( 'images/block_10.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 10', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 11 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 11", 'pantograph'),
      "base" => "pionusnews_post_block_11_post",
      "icon" => plugins_url( 'images/block_11.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 11', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 12 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 12", 'pantograph'),
      "base" => "pionusnews_post_block_12_post",
      "icon" => plugins_url( 'images/block_12.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 12', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 13 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 13", 'pantograph'),
      "base" => "pionusnews_post_block_13_post",
      "icon" => plugins_url( 'images/block_13.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 13', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 14 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 14", 'pantograph'),
      "base" => "pionusnews_post_block_14_post",
      "icon" => plugins_url( 'images/block_14.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 14', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background Color", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background Color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 15 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 15", 'pantograph'),
      "base" => "pionusnews_post_block_15_post",
      "icon" => plugins_url( 'images/block_15.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 15', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 16 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 16", 'pantograph'),
      "base" => "pionusnews_post_block_16_post",
      "icon" => plugins_url( 'images/block_16.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 16', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Excerpt Limit In Word (Optional)", 'pantograph'),
            "param_name" => "large_post_excerpt_limit",
            "value" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 17 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 17", 'pantograph'),
      "base" => "pionusnews_post_block_17_post",
      "icon" => plugins_url( 'images/block_17.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 17', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 18 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 18", 'pantograph'),
      "base" => "pionusnews_post_block_18_post",
      "icon" => plugins_url( 'images/block_18.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 18', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 19 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 19", 'pantograph'),
      "base" => "pionusnews_post_block_19_post",
      "icon" => plugins_url( 'images/block_19.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 19', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 20 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 20", 'pantograph'),
      "base" => "pionusnews_post_block_20_post",
      "icon" => plugins_url( 'images/block_20.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 20', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 21 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 21", 'pantograph'),
      "base" => "pionusnews_post_block_21_post",
      "icon" => plugins_url( 'images/block_21.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 21', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 22 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 22", 'pantograph'),
      "base" => "pionusnews_post_block_22_post",
      "icon" => plugins_url( 'images/block_22.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 22', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 23 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 23", 'pantograph'),
      "base" => "pionusnews_post_block_23_post",
      "icon" => plugins_url( 'images/block_23.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 23', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 24 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 24", 'pantograph'),
      "base" => "pionusnews_post_block_24_post",
      "icon" => plugins_url( 'images/block_24.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 24', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 25 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 25", 'pantograph'),
      "base" => "pionusnews_post_block_25_post",
      "icon" => plugins_url( 'images/block_25.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 25', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want load more?", 'pantograph'),
            "param_name" => "nextprevbtn",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 26 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 26", 'pantograph'),
      "base" => "pionusnews_post_block_26_post",
      "icon" => plugins_url( 'images/block_26.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 26', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Category Background Color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Excerpt Limit In Word (Optional)", 'pantograph'),
            "param_name" => "large_post_excerpt_limit",
            "value" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 27 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 27", 'pantograph'),
      "base" => "pionusnews_post_block_27_post",
      "icon" => plugins_url( 'images/block_27.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 27', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/****************
List Style For UL Post Block 28
****************/
vc_map( array(
      "name" => esc_html__("Ad Block", 'pantograph'),
      "base" => "pionusnews_post_block_28_post",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'description' => esc_html__('Display Ads for google adsense or others', 'pantograph'),
      "params" => array(
		 array(
            "type" => "textarea_html",            
            "class" => "",
            "heading" => esc_html__("Your Ad code or image", 'pantograph'),
            "param_name" => "content",
            "description" => esc_html__('Paste Ad code for google adsense or insert image', 'pantograph')
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "pantograph" ),
            "param_name" => "bg_color",
            "value" => '', //Default Red color
            "description" => __( "Choose Background Color", "pantograph" )
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Dotted Backround?", 'pantograph'),
            "param_name" => "dotted_bg",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Top Padding", 'pantograph'),
            "param_name" => "p_top",
            "value" => '',
            "std" => '',
            "description" => esc_html__('Example: 30px', 'pantograph')
         ),
		 array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Bottom Padding", 'pantograph'),
            "param_name" => "p_bottom",
            "value" => '',
            "std" => '',
            "description" => esc_html__('Example: 30px', 'pantograph')
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Put Background Image", 'pantograph'),
            "param_name" => "bg_img",
            "value" => '',
            "description" => esc_html__('Put an image url to use that as background image of this Ad Section with Parallax effect. Background Color option will not work, if you use background image.', 'pantograph')
         )
      )
   )
);

/*****************
Post Block 29 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Breaking News", 'pantograph'),
      "base" => "pionusnews_post_block_29_post",
      "icon" => plugins_url( 'images/vc.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Breaking News Post Block', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Breaking News',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Style", 'pantograph'),
            "param_name" => "blockstyle",
            "value"       => array(
				"Style One"   => 1,
				"Style Two"   => 2,
				"Style Three"   => 3
			  ),
			"std"         => 1,
            "description" => esc_html__("", 'pantograph')           
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Number of Posts", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		  array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "News Headlines color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose News Headlines color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "News Headlines Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose News Headlines Hover color", "pantograph" )
         )
	)
)
);

/*****************
Post Block 30 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 30", 'pantograph'),
      "base" => "pionusnews_post_block_30_post",
      "icon" => plugins_url( 'images/block_30.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 30', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Video?", 'pantograph'),
            "param_name" => "video",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Excerpt Limit In Word", 'pantograph'),
            "param_name" => "wordlimit",
            "value" => 15,
            "std" => 15,
            "description" => 'Please enter Number for limit your post excerpt (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 31 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 31", 'pantograph'),
      "base" => "pionusnews_post_block_31_post",
      "icon" => plugins_url( 'images/block_31.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 31', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);


/*****************
Post Block 32 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 32", 'pantograph'),
      "base" => "pionusnews_post_block_32_post",
      "icon" => plugins_url( 'images/block_32.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 32', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Post Block 33 Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Post Block 33", 'pantograph'),
      "base" => "pionusnews_post_block_33_post",
      "icon" => plugins_url( 'images/block_33.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Post Block 33', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 5,
            "description" => ''
         ),
		  array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post ID (Optional)", 'pantograph'),
            "param_name" => "large_post_id",
            "value" => '',
            "description" => 'Please enter an id for the large post (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Large Post Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "large_post_title_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Another Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Text color", "pantograph" ),
            "param_name" => "blocktextcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Category Background", "pantograph" ),
            "param_name" => "blockcategorybackground",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Category Background", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Date & Meta color", "pantograph" ),
            "param_name" => "blockdatecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Text color", "pantograph" )
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Current Time (Do not Change It)", 'pantograph'),
            "param_name" => "current_time",
            "value" => time(),
			"std" => time(),
            "description" => 'Do not Change It'
         )
	)
)
);

/*****************
Related Post List For Post Category
*****************/

vc_map( array(
      "name" => esc_html__("Related Post List", 'pantograph'),
      "base" => "pionusnews_related_post_for_post_category",
      "icon" => plugins_url( 'images/related_post.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Related Post List', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Category", 'pantograph'),
            "param_name" => "category",
            "value" => pionusnews_post_categories(),
			"std"   => pionusnews_default_category(),
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Image Animate?", 'pantograph'),
            "param_name" => "imageanimate",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Posts Title Limit In Character (Optional)", 'pantograph'),
            "param_name" => "title_character_limit",
            "value" => 100,
			"std" => 100,
            "description" => 'Please enter Number for limit your post title (Optional)'
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order By", 'pantograph'),
            "param_name" => "orderby",
            "value"       => array(
				"Post ID"   => "ID",
				"Title"   => "title",
				"Post Name"   => "name",
				"Post Date"   => "date",
				"Post Comment"   => "comment_count"
			  ),
			"std"         => "title",
            "description" => ""
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Order", 'pantograph'),
            "param_name" => "order",
            "value"       => array(
				"ASC"   => "ASC",
				"DESC"   => "DESC"
			  ),
			"std"         => "DESC",
            "description" => ""
         )
	)
)
);


/****************
List Style For UL
****************/
vc_map( array(
      "name" => esc_html__("List Style For UL", 'pantograph'),
      "base" => "pionusnews_shortcodes_of_ul",
      "icon" => plugins_url( 'images/list_style.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'description' => esc_html__('Displays List Style For UL', 'pantograph'),
      "params" => array(
         array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("List Style Title", 'pantograph'),
            "param_name" => "list_style_title",
            "value" => '',
            "description" => esc_html__('List Style Title', 'pantograph')
         ),
		 array(
            "type" => "dropdown",            
            "class" => "",
            "heading" => esc_html__("Select Style", 'pantograph'),
            "param_name" => "ul_style",
            "value"       => array(
				"Check"   => 'check',
				"Star"   => 'star',
				"Arrows"   => 'arrows',
				"Heart"   => 'heart'
			  ),
			"std"         => 1,
            "description" => __("", 'pantograph')           
         ),
		 array(
            "type" => "textarea",            
            "class" => "",
            "heading" => esc_html__("Features", 'pantograph'),
            "param_name" => "features",
            "description" => esc_html__('Start each feature on new line','pionusnews')
         )
      )
   )
);

/*****************
Recent Comment List 
*****************/

vc_map( array(
      "name" => esc_html__("Recent Comment", 'pantograph'),
      "base" => "pionusnews_recent_comment_post",
      "icon" => plugins_url( 'images/block_32.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Recent Comment', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Comment Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Comment Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         )
	)
)
);

/*****************
Recent Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Recent Post", 'pantograph'),
      "base" => "pionusnews_recent_post",
      "icon" => plugins_url( 'images/block_32.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Recent Post', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Post Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         )
	)
)
);

/*****************
Popular Post List 
*****************/

vc_map( array(
      "name" => esc_html__("Popular Post", 'pantograph'),
      "base" => "pionusnews_popular_post",
      "icon" => plugins_url( 'images/block_32.png', __FILE__ ),
      "class" => "",
      "category" => esc_html__('by Fluent-Themes Shortcodes', 'pantograph'),
      'admin_enqueue_js' => '',
      'admin_enqueue_css' => '',
      'description' => esc_html__('Popular Post', 'pantograph'),
      "params" => array(         
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Heading", 'pantograph'),
            "param_name" => "heading",
            "value" => '',
            "std" => 'Heading',
            "description" => ''
         ),
		array(
            "type" => "checkbox",            
            "class" => "",
            "heading" => esc_html__("Do you want Border?", 'pantograph'),
            "param_name" => "blockborder",
			"std"		=> "no",
            "value" => array(
				//Label => Value
				"Yes" => "yes"
			),
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Border Color", "pantograph" ),
            "param_name" => "blockbordercolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Border color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Background Color", "pantograph" ),
            "param_name" => "blockbackgroundcolor",
            "value" => '', //Default Red color
			'dependency' => array(
				 'element' => 'blockborder',
				 'value' =>'yes',
			 ),
            "description" => __( "Choose Block Background color", "pantograph" )
         ),
		 array(
            "type" => "textfield",            
            "class" => "",
            "heading" => esc_html__("Post Item", 'pantograph'),
            "param_name" => "itemcount",
            "value" => '',
            "std" => 3,
            "description" => ''
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block color", "pantograph" ),
            "param_name" => "blockcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Color", "pantograph" ),
            "param_name" => "blockheadingcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Block Heading Background Color", "pantograph" ),
            "param_name" => "blockheadingbackgroundcolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Heading Background Color", "pantograph" )
         ),
		  array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Post Title color", "pantograph" ),
            "param_name" => "blockposttitlecolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Post Title color", "pantograph" )
         ),
		 array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Post Link Hover color", "pantograph" ),
            "param_name" => "blockhovercolor",
            "value" => '', //Default Red color
            "description" => __( "Choose Block Link Hover color", "pantograph" )
         )
	)
)
);
}