<?php
/**
 * The plugin page view - the "settings" page of the plugin.
 *
 * @package ocdc
 */

namespace OCDC;

?>

<div class="ocdc  wrap  about-wrap">

	<?php ob_start(); ?>
		<h3 class="ocdc__title  dashicons-before"><?php esc_html_e( 'One Click Demo Content Import', 'pantograph' ); ?></h3>
	<?php
	$plugin_title = ob_get_clean();

	// Display the plugin title (can be replaced with custom title text through the filter below).
	echo wp_kses_post( apply_filters( 'pt-ocdc/plugin_page_title', $plugin_title ) );

	// Display warrning if PHP safe mode is enabled, since we wont be able to change the max_execution_time.
	if ( ini_get( 'safe_mode' ) ) {
		printf(
			esc_html__( '%sWarning: your server is using %sPHP safe mode%s. This means that you might experience server timeout errors.%s', 'pantograph' ),
			'<div class="notice  notice-warning  is-dismissible"><p>',
			'<strong>',
			'</strong>',
			'</p></div>'
		);
	}

	// Start output buffer for displaying the plugin intro text.
	ob_start();
	?>

	<div class="ocdc__intro-text">
		<p class="about-description">
			<?php esc_html_e( 'Importing demo data (post, pages, images, theme settings, widgets ...) is the easiest way to setup your theme.', 'pantograph' ); ?>
			<?php esc_html_e( 'It will allow you to quickly edit everything instead of creating content from scratch.', 'pantograph' ); ?>
		</p>

		<hr>
		
		<p class="about-description thered">
			<?php esc_html_e( 'Do not Import demo data before installing and activating all the required plugins.', 'pantograph' ); ?>
			<a class="button button-primary mtop20 mbottom20" target="_blank" href="<?php echo admin_url("options-general.php?page=required-plugins-settings");?>">
				Take me to the Plugin Download Page</a>
		</p>

		<p><?php esc_html_e( 'When you import the data, the following things might happen:', 'pantograph' ); ?></p>

		<ul>
			<li><?php esc_html_e( 'No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.', 'pantograph' ); ?></li>
			<li><?php esc_html_e( 'Posts, pages, images, widgets, menus and other theme settings will get imported.', 'pantograph' ); ?></li>
			<li><?php esc_html_e( 'Please click on the Import button only once and wait, it can take a couple of minutes.', 'pantograph' ); ?></li>
		</ul>

		<hr>
	</div>

	<?php
	$plugin_intro_text = ob_get_clean();

	// Display the plugin intro text (can be replaced with custom text through the filter below).
	echo wp_kses_post( apply_filters( 'pt-ocdc/plugin_intro_text', $plugin_intro_text ) );
	?>


	<?php if ( empty( $this->import_files ) ) : ?>

		<div class="notice  notice-info  is-dismissible">
			<p><?php esc_html_e( 'There are no predefined import files available in this theme. Please upload the import files manually!', 'pantograph' ); ?></p>
		</div>

		<div class="ocdc__file-upload-container">
			<h2><?php esc_html_e( 'Manual demo files upload', 'pantograph' ); ?></h2>

			<div class="ocdc__file-upload">
				<h3><label for="content-file-upload"><?php esc_html_e( 'Choose a XML file for content import:', 'pantograph' ); ?></label></h3>
				<input id="ocdc__content-file-upload" type="file" name="content-file-upload">
			</div>

			<div class="ocdc__file-upload">
				<h3><label for="widget-file-upload"><?php esc_html_e( 'Choose a WIE or JSON file for widget import:', 'pantograph' ); ?></label></h3>
				<input id="ocdc__widget-file-upload" type="file" name="widget-file-upload">
			</div>

			<div class="ocdc__file-upload">
				<h3><label for="customizer-file-upload"><?php esc_html_e( 'Choose a DAT file for customizer import:', 'pantograph' ); ?></label></h3>
				<input id="ocdc__customizer-file-upload" type="file" name="customizer-file-upload">
			</div>

			<?php if ( class_exists( 'ReduxFramework' ) ) : ?>
			<div class="ocdc__file-upload">
				<h3><label for="redux-file-upload"><?php esc_html_e( 'Choose a JSON file for Redux import:', 'pantograph' ); ?></label></h3>
				<input id="ocdc__redux-file-upload" type="file" name="redux-file-upload">
				<div>
					<label for="redux-option-name" class="ocdc__redux-option-name-label"><?php esc_html_e( 'Enter the Redux option name:', 'pantograph' ); ?></label>
					<input id="ocdc__redux-option-name" type="text" name="redux-option-name">
				</div>
			</div>
			<?php endif; ?>
		</div>

		<p class="ocdc__button-container">
			<button class="ocdc__button  button  button-hero  button-primary  js-ocdc-import-data"><?php esc_html_e( 'Import Demo Data', 'pantograph' ); ?></button>
		</p>

	<?php elseif ( 1 === count( $this->import_files ) ) : ?>

		<div class="ocdc__demo-import-notice  js-ocdc-demo-import-notice"><?php
			if ( is_array( $this->import_files ) && ! empty( $this->import_files[0]['import_notice'] ) ) {
				echo wp_kses_post( $this->import_files[0]['import_notice'] );
			}
		?></div>

		<p class="ocdc__button-container">
			<button class="ocdc__button  button  button-hero  button-primary  js-ocdc-import-data"><?php esc_html_e( 'Import Demo Data', 'pantograph' ); ?></button>
		</p>

	<?php else : ?>

		<!-- OCDC grid layout -->
		<div class="ocdc__gl  js-ocdc-gl">
		<?php
			// Prepare navigation data.
			$categories = Helpers::get_all_demo_import_categories( $this->import_files );
		?>
			<?php if ( ! empty( $categories ) ) : ?>
				<div class="ocdc__gl-header  js-ocdc-gl-header">
					<nav class="ocdc__gl-navigation">
						<ul>
							<li class="active"><a href="#all" class="ocdc__gl-navigation-link  js-ocdc-nav-link"><?php esc_html_e( 'All', 'pantograph' ); ?></a></li>
							<?php foreach ( $categories as $key => $name ) : ?>
								<li><a href="#<?php echo esc_attr( $key ); ?>" class="ocdc__gl-navigation-link  js-ocdc-nav-link"><?php echo esc_html( $name ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</nav>
					<div clas="ocdc__gl-search">
						<input type="search" class="ocdc__gl-search-input  js-ocdc-gl-search" name="ocdc-gl-search" value="" placeholder="<?php esc_html_e( 'Search demos...', 'pantograph' ); ?>">
					</div>
				</div>
			<?php endif; ?>
			<div class="ocdc__gl-item-container  wp-clearfix  js-ocdc-gl-item-container">
				<?php foreach ( $this->import_files as $index => $import_file ) : ?>
					<?php
						// Prepare import item display data.
						$img_src = isset( $import_file['import_preview_image_url'] ) ? $import_file['import_preview_image_url'] : '';
						// Default to the theme screenshot, if a custom preview image is not defined.
						if ( empty( $img_src ) ) {
							$theme = wp_get_theme();
							$img_src = $theme->get_screenshot();
						}

					?>
					<div class="ocdc__gl-item js-ocdc-gl-item" data-categories="<?php echo esc_attr( Helpers::get_demo_import_item_categories( $import_file ) ); ?>" data-name="<?php echo esc_attr( strtolower( $import_file['import_file_name'] ) ); ?>">
						<div class="ocdc__gl-item-image-container">
							<?php if ( ! empty( $img_src ) ) : ?>
								<img class="ocdc__gl-item-image" src="<?php echo esc_url( $img_src ) ?>">
							<?php else : ?>
								<div class="ocdc__gl-item-image  ocdc__gl-item-image--no-image"><?php esc_html_e( 'No preview image.', 'pantograph' ); ?></div>
							<?php endif; ?>
						</div>
						<div class="ocdc__gl-item-footer<?php echo ! empty( $import_file['preview_url'] ) ? '  ocdc__gl-item-footer--with-preview' : ''; ?>">
							<h4 class="ocdc__gl-item-title" title="<?php echo esc_attr( $import_file['import_file_name'] ); ?>"><?php echo esc_html( $import_file['import_file_name'] ); ?></h4>
							<button class="ocdc__gl-item-button  button  button-primary  js-ocdc-gl-import-data" value="<?php echo esc_attr( $index ); ?>"><?php esc_html_e( 'Import', 'pantograph' ); ?></button>
							<?php if ( ! empty( $import_file['preview_url'] ) ) : ?>
								<a class="ocdc__gl-item-button  button" href="<?php echo esc_url( $import_file['preview_url'] ); ?>" target="_blank"><?php esc_html_e( 'Preview', 'pantograph' ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div id="js-ocdc-modal-content"></div>

	<?php endif; ?>

	<p class="ocdc__ajax-loader  js-ocdc-ajax-loader">
		<span class="spinner"></span> <?php esc_html_e( 'Importing, please wait!', 'pantograph' ); ?>
	</p>

	<div class="ocdc__response  js-ocdc-ajax-response"></div>
</div>
