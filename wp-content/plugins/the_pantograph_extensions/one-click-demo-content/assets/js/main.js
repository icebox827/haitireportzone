jQuery( function ( $ ) {
	'use strict';

	/**
	 * ---------------------------------------
	 * ------------- Events ------------------
	 * ---------------------------------------
	 */

	/**
	 * No or Single predefined demo import button click.
	 */
	$( '.js-ocdc-import-data' ).on( 'click', function () {

		// Reset response div content.
		$( '.js-ocdc-ajax-response' ).empty();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdc_import_demo_data' );
		data.append( 'security', ocdc.ajax_nonce );
		data.append( 'selected', $( '#ocdc__demo-import-files' ).val() );
		if ( $('#ocdc__content-file-upload').length ) {
			data.append( 'content_file', $('#ocdc__content-file-upload')[0].files[0] );
		}
		if ( $('#ocdc__widget-file-upload').length ) {
			data.append( 'widget_file', $('#ocdc__widget-file-upload')[0].files[0] );
		}
		if ( $('#ocdc__customizer-file-upload').length ) {
			data.append( 'customizer_file', $('#ocdc__customizer-file-upload')[0].files[0] );
		}
		if ( $('#ocdc__redux-file-upload').length ) {
			data.append( 'redux_file', $('#ocdc__redux-file-upload')[0].files[0] );
			data.append( 'opt_name', $('#ocdc__redux-option-name').val() );
		}

		// AJAX call to import everything (content, widgets, before/after setup)
		ajaxCall( data );

	});


	/**
	 * Grid Layout import button click.
	 */
	$( '.js-ocdc-gl-import-data' ).on( 'click', function () {
		var selectedImportID = $( this ).val();
		var $itemContainer   = $( this ).closest( '.js-ocdc-gl-item' );

		// If the import confirmation is enabled, then do that, else import straight away.
		if ( ocdc.import_popup ) {
			displayConfirmationPopup( selectedImportID, $itemContainer );
		}
		else {
			gridLayoutImport( selectedImportID, $itemContainer );
		}
	});


	/**
	 * Grid Layout categories navigation.
	 */
	(function () {
		// Cache selector to all items
		var $items = $( '.js-ocdc-gl-item-container' ).find( '.js-ocdc-gl-item' ),
			fadeoutClass = 'ocdc-is-fadeout',
			fadeinClass = 'ocdc-is-fadein',
			animationDuration = 200;

		// Hide all items.
		var fadeOut = function () {
			var dfd = jQuery.Deferred();

			$items
				.addClass( fadeoutClass );

			setTimeout( function() {
				$items
					.removeClass( fadeoutClass )
					.hide();

				dfd.resolve();
			}, animationDuration );

			return dfd.promise();
		};

		var fadeIn = function ( category, dfd ) {
			var filter = category ? '[data-categories*="' + category + '"]' : 'div';

			if ( 'all' === category ) {
				filter = 'div';
			}

			$items
				.filter( filter )
				.show()
				.addClass( 'ocdc-is-fadein' );

			setTimeout( function() {
				$items
					.removeClass( fadeinClass );

				dfd.resolve();
			}, animationDuration );
		};

		var animate = function ( category ) {
			var dfd = jQuery.Deferred();

			var promise = fadeOut();

			promise.done( function () {
				fadeIn( category, dfd );
			} );

			return dfd;
		};

		$( '.js-ocdc-nav-link' ).on( 'click', function( event ) {
			event.preventDefault();

			// Remove 'active' class from the previous nav list items.
			$( this ).parent().siblings().removeClass( 'active' );

			// Add the 'active' class to this nav list item.
			$( this ).parent().addClass( 'active' );

			var category = this.hash.slice(1);

			// show/hide the right items, based on category selected
			var $container = $( '.js-ocdc-gl-item-container' );
			$container.css( 'min-width', $container.outerHeight() );

			var promise = animate( category );

			promise.done( function () {
				$container.removeAttr( 'style' );
			} );
		} );
	}());


	/**
	 * Grid Layout search functionality.
	 */
	$( '.js-ocdc-gl-search' ).on( 'keyup', function( event ) {
		if ( 0 < $(this).val().length ) {
			// Hide all items.
			$( '.js-ocdc-gl-item-container' ).find( '.js-ocdc-gl-item' ).hide();

			// Show just the ones that have a match on the import name.
			$( '.js-ocdc-gl-item-container' ).find( '.js-ocdc-gl-item[data-name*="' + $(this).val().toLowerCase() + '"]' ).show();
		}
		else {
			$( '.js-ocdc-gl-item-container' ).find( '.js-ocdc-gl-item' ).show();
		}
	} );

	/**
	 * ---------------------------------------
	 * --------Helper functions --------------
	 * ---------------------------------------
	 */

	/**
	 * Prepare grid layout import data and execute the AJAX call.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function gridLayoutImport( selectedImportID, $itemContainer ) {
		// Reset response div content.
		$( '.js-ocdc-ajax-response' ).empty();

		// Hide all other import items.
		$itemContainer.siblings( '.js-ocdc-gl-item' ).fadeOut( 500 );

		$itemContainer.animate({
			opacity: 0
		}, 500, 'swing', function () {
			$itemContainer.animate({
				opacity: 1
			}, 500 )
		});

		// Hide the header with category navigation and search box.
		$itemContainer.closest( '.js-ocdc-gl' ).find( '.js-ocdc-gl-header' ).fadeOut( 500 );

		// Append a title for the selected demo import.
		$itemContainer.parent().prepend( '<h3>' + ocdc.texts.selected_import_title + '</h3>' );

		// Remove the import button of the selected item.
		$itemContainer.find( '.js-ocdc-gl-import-data' ).remove();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdc_import_demo_data' );
		data.append( 'security', ocdc.ajax_nonce );
		data.append( 'selected', selectedImportID );

		// AJAX call to import everything (content, widgets, before/after setup)
		ajaxCall( data );
	}

	/**
	 * Display the confirmation popup.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function displayConfirmationPopup( selectedImportID, $itemContainer ) {
		var $dialogContiner         = $( '#js-ocdc-modal-content' );
		var currentFilePreviewImage = ocdc.import_files[ selectedImportID ]['import_preview_image_url'] || ocdc.theme_screenshot;
		var previewImageContent     = '';
		var importNotice            = ocdc.import_files[ selectedImportID ]['import_notice'] || '';
		var importNoticeContent     = '';
		var dialogOptions           = $.extend(
			{
				'dialogClass': 'wp-dialog',
				'resizable':   false,
				'height':      'auto',
				'modal':       true
			},
			ocdc.dialog_options,
			{
				'buttons':
				[
					{
						text: ocdc.texts.dialog_no,
						click: function() {
							$(this).dialog('close');
						}
					},
					{
						text: ocdc.texts.dialog_yes,
						class: 'button  button-primary',
						click: function() {
							$(this).dialog('close');
							gridLayoutImport( selectedImportID, $itemContainer );
						}
					}
				]
			});

		if ( '' === currentFilePreviewImage ) {
			previewImageContent = '<p>' + ocdc.texts.missing_preview_image + '</p>';
		}
		else {
			previewImageContent = '<div class="ocdc__modal-image-container"><img src="' + currentFilePreviewImage + '" alt="' + ocdc.import_files[ selectedImportID ]['import_file_name'] + '"></div>'
		}

		// Prepare notice output.
		if( '' !== importNotice ) {
			importNoticeContent = '<div class="ocdc__modal-notice  ocdc__demo-import-notice">' + importNotice + '</div>';
		}

		// Populate the dialog content.
		$dialogContiner.prop( 'title', ocdc.texts.dialog_title );
		$dialogContiner.html(
			'<p class="ocdc__modal-item-title">' + ocdc.import_files[ selectedImportID ]['import_file_name'] + '</p>' +
			previewImageContent +
			importNoticeContent
		);

		// Display the confirmation popup.
		$dialogContiner.dialog( dialogOptions );
	}

	/**
	 * The main AJAX call, which executes the import process.
	 *
	 * @param FormData data The data to be passed to the AJAX call.
	 */
	function ajaxCall( data ) {
		$.ajax({
			method:      'POST',
			url:         ocdc.ajax_url,
			data:        data,
			contentType: false,
			processData: false,
			beforeSend:  function() {
				$( '.js-ocdc-ajax-loader' ).show();
			}
		})
		.done( function( response ) {
			if ( 'undefined' !== typeof response.status && 'newAJAX' === response.status ) {
				ajaxCall( data );
			}
			else if ( 'undefined' !== typeof response.status && 'customizerAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdc_import_customizer_data' );
				newData.append( 'security', ocdc.ajax_nonce );

				// Set the wp_customize=on only if the plugin filter is set to true.
				if ( true === ocdc.wp_customize_on ) {
					newData.append( 'wp_customize', 'on' );
				}

				ajaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.status && 'afterAllImportAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdc_after_import_data' );
				newData.append( 'security', ocdc.ajax_nonce );
				ajaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.message ) {
				$( '.js-ocdc-ajax-response' ).append( '<p>' + response.message + '</p>' );
				$( '.js-ocdc-ajax-loader' ).hide();

				// Trigger custom event, when OCDC import is complete.
				$( document ).trigger( 'ocdcImportComplete' );
			}
			else {
				$( '.js-ocdc-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>' + response + '</p></div>' );
				$( '.js-ocdc-ajax-loader' ).hide();
			}
		})
		.fail( function( error ) {
			$( '.js-ocdc-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>Error: ' + error.statusText + ' (' + error.status + ')' + '</p></div>' );
			$( '.js-ocdc-ajax-loader' ).hide();
		});
	}
} );
