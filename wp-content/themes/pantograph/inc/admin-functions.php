<?php
/* -----------------------------------------------------------------------------
 * Extra Settings in Settings > Design Settings Page
 * -------------------------------------------------------------------------- */
global $pagenow;
if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

	wp_redirect(admin_url("options-general.php?page=about-page")); // custom design page URL
	
}

add_action('admin_enqueue_scripts', 'pantograph_custom_admin_css'); // add css to admin page
function pantograph_custom_admin_css() {
	wp_enqueue_style( 'pantograph-admin_css', get_template_directory_uri() . '/css/pantograph-admin-style.css', false, '1.0.0' );
}

add_action('admin_menu', 'pantograph_about_settings_submenu_page');
function pantograph_about_settings_submenu_page() {
    add_submenu_page(
        'options-general.php',
        'About Page',
        'About Page',
        'manage_options',
        'about-page',
        'pantograph_about_submenu_page_callback' );
}

function pantograph_about_submenu_page_callback() {
?>
<div class="wrap panto-page-welcome about-wrap">
<h1 class="title"><?php echo sprintf( esc_html__( 'Welcome to PantoGraph World - Version %s', 'pantograph' ), preg_replace( '/^(\d+)(\.\d+)?(\.\d)?/', '$1$2', PANTOGRAPH_THEME_VERSION ) ) ?></h1>
<div class="about-text"><?php esc_html_e('Congratulations! You are about to use most powerful version of PantoGraph theme. From version 2.0 you will get totally a new look theme with lots of extra features and options.', 'pantograph') ?></div>
<div class="wp-badge vc-page-logo"><?php esc_html_e('Version ', 'pantograph');?><?php echo PANTOGRAPH_THEME_VERSION; ?></div>
<p><h3 class="thered"><?php esc_html_e('Please READ this carefully :', 'pantograph') ?></h3>
<p class="first-para"><?php esc_html_e('In the', 'pantograph') ?> <a class="button button-primary customized" target="_blank" href="<?php echo admin_url("options-general.php?page=design-settings");?>"><?php esc_html_e('Design Settings Page', 'pantograph') ?></a> <?php esc_html_e('you will have an option to choose whether you want to use the theme with Old Version features or New Version features. Before choosing, please know which version is suitable for you.', 'pantograph') ?></p>
<p>
<h3><?php esc_html_e('What Is In New Version?', 'pantograph') ?></h3>
<?php esc_html_e('The following sites are made by the New Version features. If you want your site like one of the following, please choose the', 'pantograph') ?> '<span class="first-para"><?php esc_html_e('New Version features', 'pantograph') ?></span>' <?php esc_html_e('from the', 'pantograph') ?> <a target="_blank" href="<?php echo admin_url("options-general.php?page=design-settings");?>"><?php esc_html_e('Design Settings Page', 'pantograph') ?></a>.
<ul class="the-sites">
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-twelve/"><?php esc_html_e('World News', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-fifteen/"><?php esc_html_e('Wide News', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/"><?php esc_html_e('Online Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-one/"><?php esc_html_e('Celebrety Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-fourteen/"><?php esc_html_e('Scandal News', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-four/"><?php esc_html_e('Business Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-six/"><?php esc_html_e('Tech Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-three/"><?php esc_html_e('Fashion Blog', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-five/"><?php esc_html_e('Travel Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-two/"><?php esc_html_e('Sports Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-seven/"><?php esc_html_e('Wall Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-eight/"><?php esc_html_e('Car News', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-nine/"><?php esc_html_e('Gaming Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-eleven/"><?php esc_html_e('Photography Blog', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/pionus-news/variation-thirteen/"><?php esc_html_e('School Kids Blog', 'pantograph') ?></a></li>
</ul>
</p>
<p>
<h3><?php esc_html_e('What Is In Old Version?', 'pantograph') ?></h3>
<?php esc_html_e('The following sites are made by the Old Version features. If you want your site like one of the following, please choose the', 'pantograph') ?> '<span class="first-para"><?php esc_html_e('Old Version features', 'pantograph') ?></span>' <?php esc_html_e('from the', 'pantograph') ?> <a target="_blank" href="<?php echo admin_url("options-general.php?page=design-settings");?>"><?php esc_html_e('Design Settings Page', 'pantograph') ?></a>.
<ul class="the-sites">
<li><a target="_blank" href="https://fluentthemes.com/wp/letter/pantograph-variation-five/"><?php esc_html_e('Fashion Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/letter/pantograph-variation-six/"><?php esc_html_e('World News', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/letter/pantograph-variation-seven/"><?php esc_html_e('Sports Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/letter/pantograph-variation-eight/"><?php esc_html_e('Beauty Blog', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/letter/"><?php esc_html_e('Local Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/letter/pantograph-variation-four/"><?php esc_html_e('Travel Magazine', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/letter/pantograph-variation-nine/"><?php esc_html_e('Health Magazine', 'pantograph') ?></a></li>
</ul>
</p>
</p>
<div class="center">
<a class="button button-primary" target="_blank" href="<?php echo admin_url("options-general.php?page=design-settings");?>"><?php esc_html_e('Go to Design Settings Page', 'pantograph') ?></a>
</div>
<div class="center mtop20 mbottom20">
<?php esc_html_e('OR', 'pantograph') ?>
</div>
<div class="center">
<a class="button button-primary" target="_blank" href="https://themeforest.net/item/pantograph-newspaper-magazine-theme/20742636/support"><?php esc_html_e('Contact Support Team', 'pantograph') ?></a>
</div>

</div>
<?php
}

add_action('admin_menu', 'pantograph_register_design_settings_submenu_page');
function pantograph_register_design_settings_submenu_page() {
    add_submenu_page(
        'options-general.php',
        'Design Settings',
        'Design Settings',
        'manage_options',
        'design-settings',
        'pantograph_design_settings_submenu_page_callback' );
}

function pantograph_design_settings_submenu_page_callback() {

    //must check that the user has the required permission 
    if (!current_user_can('manage_options'))
    {
      wp_die( esc_html__('You do not have sufficient permissions to access this page.', 'pantograph') );
    }

    // variables for the field and option names 
    $data_field_name = 'favorite_theme_style';

    // Read in existing option value from database
    $design_opt_val = get_option( $data_field_name );

    if( isset($_POST[ $data_field_name ])) {
        // Read their posted value
        $design_opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $data_field_name, $design_opt_val );

        // Put a "settings saved" message on the screen

?>
<div class="updated"><p><strong><?php esc_html_e('Settings saved.', 'pantograph' ); ?></strong></p>
<div class="center mtop50">
<p class="first-para">
<?php esc_html_e('I have chosen', 'pantograph') ?> <?php if($design_opt_val=='style_old'){echo 'Old';} else {echo 'New';} ?> <?php esc_html_e('version, Now I need the Theme Bundled Plugins.', 'pantograph') ?>
</p>
<a class="button button-primary mbottom20" target="_blank" href="<?php echo admin_url("options-general.php?page=required-plugins-settings");?>">
<?php esc_html_e('Take me to the Plugin Download Page', 'pantograph') ?>
</a>
</div>
</div>
<?php
    }
    echo '<div class="wrap panto-page-welcome about-wrap">';
    ?>
<form method="post" action="">

<p class="p_radio_options">
<input type="radio" name="<?php echo esc_attr($data_field_name); ?>" value="<?php esc_attr_e('style_old', 'pantograph'); ?>" <?php if($design_opt_val=='style_old'){echo 'checked';} ?>> <?php echo esc_html_e('Old Version Features (Before Theme Version 2.0)', 'pantograph'); ?><br>
<input type="radio" name="<?php echo esc_attr($data_field_name); ?>" value="<?php esc_attr_e('style_new', 'pantograph'); ?>" <?php if(($design_opt_val=='style_new') || (!$design_opt_val)){echo 'checked';} ?>> <?php echo esc_html_e('New Version Features (Added From Theme Version 2.0)', 'pantograph'); ?>
</p>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes', 'pantograph') ?>" />
</p>
<div class="clear"></div>
</form>

<hr />

</div>

<?php
}

add_action('admin_menu', 'pantograph_register_required_plugins_settings_submenu_page');
function pantograph_register_required_plugins_settings_submenu_page() {
    add_submenu_page(
        'options-general.php',
        'Plugins Page',
        'Plugins Page',
        'manage_options',
        'required-plugins-settings',
        'pantograph_required_plugins_settings_submenu_page_callback' );
}
function pantograph_required_plugins_settings_submenu_page_callback() {
?>
<div class="wrap panto-page-welcome about-wrap">
<div class="update-nag">
<p><h3><?php esc_html_e('Verify Purchase and Download Plugins :', 'pantograph') ?></h3>
<p class="first-para"><?php esc_html_e('You must', 'pantograph') ?> <a class="button button-primary customized" target="_blank" href="https://fluentthemes.com/verify-purchase/pantograph/"><?php esc_html_e('Verify Theme Purchase Code', 'pantograph') ?></a> <?php esc_html_e('in order to get the Download Link of The PantoGraph Extensions plugin.', 'pantograph') ?> <a class="notes" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e('Where to Find my Theme Purchase Code?', 'pantograph') ?></a>.<br>
<span class="thered notes"><?php esc_html_e('The Extensions plugin (The PantoGraph Extensions) is required to run the theme. Without this plugin you may see only shortcodes instead of actual page elements at the front-end.', 'pantograph') ?></span>
</p>
<p>
<h3><?php esc_html_e('Download and Install the required Plugins given here', 'pantograph') ?> : </h3>
<ul>
<li><a target="_blank" href="https://fluentthemes.com/wp/fluent-themes-updated-plugins/js_composer.zip"><?php esc_html_e('Download WPBakery Page Builder Plugin', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/wp/fluent-themes-updated-plugins/ft-sidebar-generator.zip"><?php esc_html_e('Download FT Sidebar Generator Plugin', 'pantograph') ?></a></li>
<li><a target="_blank" href="https://fluentthemes.com/verify-purchase/pantograph/"><?php esc_html_e('Verify Theme Purchase Code and Download The Pantograph Extensions plugin', 'pantograph') ?></a></li>
</ul>
</p>
</p>
</div>
<div class="mtop50">
<div class="center">
<p class="first-para">
<?php esc_html_e('I have Downloaded, Installed and Activated all the required plugins.', 'pantograph') ?>
</p>
<?php if ( pantograph_is_extensions_plugin_active() ) { ?>
<a class="button button-primary" target="_blank" href="<?php echo admin_url("themes.php?page=pt-one-click-demo-content");?>">
<?php esc_html_e('Take me to Demo Content Import Page', 'pantograph') ?>
</a>
<?php } else { ?>
<a class="button button-primary" target="_blank" href="<?php echo admin_url("options-general.php?page=demo-error-page");?>">
<?php esc_html_e('Take me to Demo Content Import Page', 'pantograph') ?>
</a>
<?php } ?>
</div>
<div class="center mtop20 mbottom20">
<?php esc_html_e('OR', 'pantograph') ?>
</div>
<div class="center">
<a class="button button-primary" target="_blank" href="https://themeforest.net/item/pantograph-newspaper-magazine-theme/20742636/support"><?php esc_html_e('Contact Support Team', 'pantograph') ?></a>
</div>
</div>
</div>
<?php
}

add_action('admin_menu', 'pantograph_register_demo_error_page_submenu_page');
function pantograph_register_demo_error_page_submenu_page() {
    add_submenu_page(
        'options-general.php',
        'Demo Error Page',
        'Demo Error Page',
        'manage_options',
        'demo-error-page',
        'pantograph_demo_error_page_submenu_page_callback' );
}
function pantograph_demo_error_page_submenu_page_callback() {
?>
<div class="wrap panto-page-welcome about-wrap">
<div class="update-nag">
<p><h3><?php esc_html_e('Sorry, you are not allowed to access this page', 'pantograph') ?></h3>
<p class="first-para">
<span class="thered notes"><?php esc_html_e('The Extensions plugin (The PantoGraph Extensions) is required to access to the Demo Content Import page.', 'pantograph') ?></span> <a target="_blank" href="https://fluentthemes.com/knowledgebase/documentation/blog/how-to-install-and-activate-a-plugin-in-wordpress/"><?php esc_html_e('How to Install and Activate a plugin in WordPress?', 'pantograph') ?></a>
</p>
<p>
<a class="button button-primary" target="_blank" href="<?php echo admin_url("plugins.php");?>">
<?php esc_html_e('Take me to the Plugins Page', 'pantograph') ?>
</a>
<p class="first-para">
<?php esc_html_e('Once the extensions plugin is activated, click on', 'pantograph') ?> <a target="_blank" href="<?php echo admin_url("themes.php?page=pt-one-click-demo-content");?>"><?php esc_html_e('this link', 'pantograph') ?></a> <?php esc_html_e('to get to your Demo Import page.', 'pantograph') ?>
</p>
</p>
</p>
</div>
</div>
<?php
}