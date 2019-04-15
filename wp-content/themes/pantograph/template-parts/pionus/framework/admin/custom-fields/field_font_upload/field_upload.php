<?php
/* -----------------------------------------------------------------------------
 * Additional accepted file types
 * -------------------------------------------------------------------------- */
class Redux_Options_font_upload {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent = '') {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
		$this->url = $parent->url;
    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since Redux_Options 1.0.0
    */
    function render() {
        $class = (isset($this->field['class'])) ? $this->field['class'] : 'regular-text';        
        echo '<input type="hidden" id="' . esc_attr( $this->field['id'] ) . '" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . ']" value="' . esc_attr( $this->value ) . '" class="' . esc_attr( $class ) . '" />';
        echo '<input type="text" class="redux-opts-font-url" id="redux-opts-font-url-' . esc_attr( $this->field['id'] ) . '" value="' . esc_attr( $this->value ) . '" />';
        if($this->value == '') {$remove = ' style="display:none;"'; $upload = ''; } else {$remove = ''; $upload = ' style="display:none;"'; } 
        echo ' <a data-update="Select File" data-choose="Choose a File" href="javascript:void(0);"class="redux-opts-font-upload button-secondary"' . esc_attr( $upload ) . ' rel-id="' . esc_attr( $this->field['id'] ) . '">' . esc_html__('Upload', 'pantograph') . '</a>';
        echo ' <a href="javascript:void(0);" class="redux-opts-font-upload-remove"' . esc_attr( $remove ) . ' rel-id="' . esc_attr( $this->field['id'] ) . '">' . esc_html__('Remove Upload', 'pantograph') . '</a>';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? '<br/><span class="description">' . esc_attr( $this->field['desc'] ) . '</span>' : '';
    }

    /**
     * Enqueue Function.
     *
     * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
     *
     * @since Redux_Options 1.0.0
    */
    function enqueue() {
            $wp_version = floatval(get_bloginfo('version'));

        if ( $wp_version < "3.5" ) {
            wp_enqueue_script(
                'redux-opts-field-font-upload-js', 
                get_template_directory_uri() . 'template-parts/pionus/framework/admin/field_font_upload/field_upload_3_4.js', 
                array('jquery', 'thickbox', 'media-upload'),
                time(),
                true
            );
            wp_enqueue_style('thickbox');// thanks to https://github.com/rzepak
        } else {
            wp_enqueue_script(
                'redux-opts-field-font-upload-js', 
                get_template_directory_uri() . 'template-parts/pionus/framework/admin/field_font_upload/field_upload.js', 
                array('jquery'),
                time(),
                true
            );
            wp_enqueue_media();
        }
        wp_localize_script('redux-opts-field-font-upload-js', 'redux_upload', array('url' => get_template_directory_uri() . 'template-parts/pionus/framework/admin/blank.png'));
    }
}
