<?php

/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @subpackage  Field_slides
 * @author      Luciano "WebCaos" Ubertini
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @version     3.0.0
 */


    class ReduxFramework_slides {

        /**
         * Field Constructor.
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        function __construct ( $field = array(), $value = '', $parent ) {
            $this->parent = $parent;
            $this->field = $field;
            $this->value = $value;
        }

        /**
         * Field Render Function.
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function render () {

            $defaults = array(
                'show' => array(
                    'title' => true,
                    'description' => true,
                    'url' => true,
                ),
                'content_title' => __ ( 'Slide', 'pantograph' )
            );

            $this->field = wp_parse_args ( $this->field, $defaults );

            echo '<div class="redux-slides-accordion" data-new-content-title="' . esc_attr ( sprintf ( __ ( 'New %s', 'pantograph' ), $this->field[ 'content_title' ] ) ) . '">';

            $x = 0;

            $multi = ( isset ( $this->field[ 'multi' ] ) && $this->field[ 'multi' ] ) ? ' multiple="multiple"' : "";

            if ( isset ( $this->value ) && is_array ( $this->value ) && !empty ( $this->value ) ) {

                $slides = $this->value;

                foreach ( $slides as $slide ) {

                    if ( empty ( $slide ) ) {
                        continue;
                    }

                    $defaults = array(
                        'title' => '',
                        'description' => '',
                        'sort' => '',
                        'url' => '',
                        'image' => '',
                        'thumb' => '',
                        'attachment_id' => '',
                        'height' => '',
                        'width' => '',
                        'select' => array(),
                    );
                    $slide = wp_parse_args ( $slide, $defaults );

                    if ( empty ( $slide[ 'thumb' ] ) && !empty ( $slide[ 'attachment_id' ] ) ) {
                        $img = wp_get_attachment_image_src ( $slide[ 'attachment_id' ], 'full' );
                        $slide[ 'image' ] = $img[ 0 ];
                        $slide[ 'width' ] = $img[ 1 ];
                        $slide[ 'height' ] = $img[ 2 ];
                    }

                    echo '<div class="redux-slides-accordion-group"><fieldset class="redux-field" data-id="' . esc_attr( $this->field[ 'id' ] ) . '"><h3><span class="redux-slides-header">' . esc_attr( $slide[ 'title' ] ) . '</span></h3><div>';

                    $hide = '';
                    if ( empty ( $slide[ 'image' ] ) ) {
                        $hide = ' hide';
                    }


                    echo '<div class="screenshot' . esc_attr( $hide ) . '">';
                    echo '<a class="of-uploaded-image" href="' . esc_attr( $slide[ 'image' ] ) . '">';
                    echo '<img class="redux-slides-image" id="image_image_id_' . esc_attr( $x ) . '" src="' . esc_attr( $slide[ 'thumb' ] ) . '" alt="' . esc_attr__ ( 'Slide', 'pantograph' ) . '" target="_blank" rel="external" />';
                    echo '</a>';
                    echo '</div>';

                    echo '<div class="redux_slides_add_remove">';

                    echo '<span class="button media_upload_button" id="add_' . esc_attr( $x ) . '">' . esc_html__ ( 'Upload', 'pantograph' ) . '</span>';

                    $hide = '';
                    if ( empty ( $slide[ 'image' ] ) || $slide[ 'image' ] == '' ) {
                        $hide = ' hide';
                    }

                    echo '<span class="button remove-image' . esc_attr( $hide ) . '" id="reset_' . esc_attr( $x ) . '" rel="' . esc_attr( $slide[ 'attachment_id' ] ) . '">' . __ ( 'Remove', 'pantograph' ) . '</span>';

                    echo '</div>' . "\n";

                    echo '<ul id="' . esc_attr( $this->field[ 'id' ] ) . '-ul" class="redux-slides-list">';

                    if ( $this->field[ 'show' ][ 'title' ] ) {
                        $title_type = "text";
                    } else {
                        $title_type = "hidden";
                    }

                    $placeholder = ( isset ( $this->field[ 'placeholder' ][ 'title' ] ) ) ? esc_attr ( $this->field[ 'placeholder' ][ 'title' ] ) : __ ( 'Title', 'pantograph' );
                    echo '<li><input type="' . esc_attr( $title_type ) . '" id="' . esc_attr( $this->field[ 'id' ] ) . '-title_' . esc_attr( $x ) . '" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][title]' . esc_attr( $this->field['name_suffix'] ) . '" value="' . esc_attr ( $slide[ 'title' ] ) . '" placeholder="' . esc_attr( $placeholder ) . '" class="full-text slide-title" /></li>';

                    if ( $this->field[ 'show' ][ 'description' ] ) {
                        $placeholder = ( isset ( $this->field[ 'placeholder' ][ 'description' ] ) ) ? esc_attr ( $this->field[ 'placeholder' ][ 'description' ] ) : __ ( 'Description', 'pantograph' );
                        echo '<li><textarea name="' . esc_attr ( $this->field[ 'name' ] ) . '[' . esc_attr ( $x ) . '][description]' . esc_attr ( $this->field['name_suffix'] ) . '" id="' . esc_attr ( $this->field[ 'id' ] ) . '-description_' . esc_attr ( $x ) . '" placeholder="' . esc_attr ( $placeholder ) . '" class="large-text" rows="6">' . esc_attr ( $slide[ 'description' ] ) . '</textarea></li>';
                    }

                    $placeholder = ( isset ( $this->field[ 'placeholder' ][ 'url' ] ) ) ? esc_attr ( $this->field[ 'placeholder' ][ 'url' ] ) : __ ( 'URL', 'pantograph' );
                    if ( $this->field[ 'show' ][ 'url' ] ) {
                        $url_type = "text";
                    } else {
                        $url_type = "hidden";
                    }

                    echo '<li><input type="' . esc_attr( $url_type ) . '" id="' . esc_attr( $this->field[ 'id' ] ) . '-url_' . esc_attr( $x ) . '" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '] )[url]' . esc_attr( $this->field['name_suffix'] ) .'" value="' . esc_url( $slide[ 'url' ] ) . '" class="full-text" placeholder="' . esc_attr( $placeholder ) . '" /></li>';
                    echo '<li><input type="hidden" class="slide-sort" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '] )[sort]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-sort_' . esc_attr( $x ) . '" value="' . esc_attr( $slide[ 'sort' ] ) . '" />';
                    echo '<li><input type="hidden" class="upload-id" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '] )[attachment_id]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-image_id_' . esc_attr( $x ) . '" value="' . esc_attr( $slide[ 'attachment_id' ] ) . '" />';
                    echo '<input type="hidden" class="upload-thumbnail" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '] )[thumb]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-thumb_url_' . esc_attr( $x ) . '" value="' . esc_attr( $slide[ 'thumb' ] ) . '" readonly="readonly" />';
                    echo '<input type="hidden" class="upload" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '] )[image]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-image_url_' . esc_attr( $x ) . '" value="' . esc_attr( $slide[ 'image' ] ) . '" readonly="readonly" />';
                    echo '<input type="hidden" class="upload-height" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '] )[height]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-image_height_' . esc_attr( $x ) . '" value="' . esc_attr( $slide[ 'height' ] ) . '" />';
                    echo '<input type="hidden" class="upload-width" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '] )[width]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-image_width_' . esc_attr( $x ) . '" value="' . esc_attr( $slide[ 'width' ] ) . '" /></li>';
                    echo '<li><a href="javascript:void(0);" class="button deletion redux-slides-remove">' . __ ( 'Delete', 'pantograph' ) . '</a></li>';
                    echo '</ul></div></fieldset></div>';
                    $x ++;
                }
            }

            if ( $x == 0 ) {
				echo '<div class="redux-slides-accordion-group"><fieldset class="redux-field" data-id="' . esc_attr( $this->field[ 'id' ] ) . '"><h3><span class="redux-slides-header">New ' . esc_attr( $this->field[ 'content_title' ] ) . '</span></h3><div>';

                $hide = ' hide';

                echo '<div class="screenshot' . esc_attr( $hide ) . '">';
                echo '<a class="of-uploaded-image" href="">';
                echo '<img class="redux-slides-image" id="image_image_id_' . esc_attr( $x ) . '" src="" alt="' . esc_attr__ ( 'Slide', 'pantograph' ) . '" target="_blank" rel="external" />';
                echo '</a>';
                echo '</div>';

                //Upload controls DIV
                echo '<div class="upload_button_div">';

                //If the user has WP3.5+ show upload/remove button
                echo '<span class="button media_upload_button" id="add_' . esc_attr( $x ) . '">' . esc_html__ ( 'Upload', 'pantograph' ) . '</span>';

                echo '<span class="button remove-image' . esc_attr( $hide ) . '" id="reset_' . esc_attr( $x ) . '" rel="' . esc_attr( $this->parent->args[ 'opt_name' ] ) . '[' . esc_attr( $this->field[ 'id' ] ) . '][attachment_id]">' . __ ( 'Remove', 'pantograph' ) . '</span>';

                echo '</div>' . "\n";

                echo '<ul id="' . esc_attr( $this->field[ 'id' ] ) . '-ul" class="redux-slides-list">';
                if ( $this->field[ 'show' ][ 'title' ] ) {
                    $title_type = "text";
                } else {
                    $title_type = "hidden";
                }
                $placeholder = ( isset ( $this->field[ 'placeholder' ][ 'title' ] ) ) ? esc_attr( $this->field[ 'placeholder' ][ 'title' ] ) : __ ( 'Title', 'pantograph' );
                echo '<li><input type="' . esc_attr( $title_type ) . '" id="' . esc_attr( $this->field[ 'id' ] ) . '-title_' . esc_attr( $x ) . '" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][title]' . esc_attr( $this->field['name_suffix'] ) .'" value="" placeholder="' . esc_attr( $placeholder ) . '" class="full-text slide-title" /></li>';

                if ( $this->field[ 'show' ][ 'description' ] ) {
                    $placeholder = ( isset ( $this->field[ 'placeholder' ][ 'description' ] ) ) ? esc_attr( $this->field[ 'placeholder' ][ 'description' ] ) : __ ( 'Description', 'pantograph' );
                    echo '<li><textarea name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][description]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-description_' . esc_attr( $x ) . '" placeholder="' . esc_attr( $placeholder ) . '" class="large-text" rows="6"></textarea></li>';
                }
                $placeholder = ( isset ( $this->field[ 'placeholder' ][ 'url' ] ) ) ? esc_attr ( $this->field[ 'placeholder' ][ 'url' ] ) : __ ( 'URL', 'pantograph' );
                if ( $this->field[ 'show' ][ 'url' ] ) {
                    $url_type = "text";
                } else {
                    $url_type = "hidden";
                }
                echo '<li><input type="' . esc_attr( $url_type ) . '" id="' . esc_attr( $this->field[ 'id' ] ) . '-url_' . esc_attr( $x ) . '" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][url]' . esc_attr( $this->field['name_suffix'] ) .'" value="" class="full-text" placeholder="' . esc_attr( $placeholder ) . '" /></li>';
                echo '<li><input type="hidden" class="slide-sort" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][sort]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-sort_' . esc_attr( $x ) . '" value="' . esc_attr( $x ) . '" />';
                echo '<li><input type="hidden" class="upload-id" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][attachment_id]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-image_id_' . esc_attr( $x ) . '" value="" />';
                echo '<input type="hidden" class="upload" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][image]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-image_url_' . esc_attr( $x ) . '" value="" readonly="readonly" />';
                echo '<input type="hidden" class="upload-height" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][height]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-image_height_' . esc_attr( $x ) . '" value="" />';
                echo '<input type="hidden" class="upload-width" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][width]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-image_width_' . esc_attr( $x ) . '" value="" /></li>';
                echo '<input type="hidden" class="upload-thumbnail" name="' . esc_attr( $this->field[ 'name' ] ) . '[' . esc_attr( $x ) . '][thumb]' . esc_attr( $this->field['name_suffix'] ) .'" id="' . esc_attr( $this->field[ 'id' ] ) . '-thumb_url_' . esc_attr( $x ) . '" value="" /></li>';
                echo '<li><a href="javascript:void(0);" class="button deletion redux-slides-remove">' . __ ( 'Delete', 'pantograph' ) . '</a></li>';
                echo '</ul></div></fieldset></div>';
            }
            echo '</div><a href="javascript:void(0);" class="button redux-slides-add button-primary" rel-id="' . esc_attr( $this->field[ 'id' ] ) . '-ul" rel-name="' . esc_attr( $this->field[ 'name' ] ) . '[title][]' . esc_attr( $this->field['name_suffix'] ) .'">' . sprintf ( __ ( 'Add %s', 'pantograph' ), esc_attr( $this->field[ 'content_title' ] ) ) . '</a><br/>';
        }

        /**
         * Enqueue Function.
         * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function enqueue () {


            wp_enqueue_script(
                'redux-field-media-js',
					Redux_OPTIONS_URL . 'js/media/media.min.js',
                array( 'jquery', 'redux-js' ),
                time(),
                true
            );

            wp_enqueue_style (
                'redux-field-media-css', 
               // ReduxFramework::$_url . 'inc/fields/media/field_media.css', 
							 Redux_OPTIONS_URL . 'fields/slides/field_media.css', 
                time (), 
                true
            );

            wp_enqueue_script (
                'redux-field-slides-js',  
							Redux_OPTIONS_URL . 'fields/slides/field_slides.min.js', 
                array( 'jquery', 'jquery-ui-core', 'jquery-ui-accordion', 'wp-color-picker', 'redux-field-media-js' ), 
                time (), 
                true
            );

            wp_enqueue_style (
                'redux-field-slides-css', 
						Redux_OPTIONS_URL . 'fields/slides/field_slides.css', 
                time (), 
                true
            );
        }
    }

