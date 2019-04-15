<?php
class Redux_Options_color_gradient {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since Redux_Options 1.0.0
    */
    function render() {
        $class = (isset($this->field['class'])) ? $this->field['class'] : '';

        if(get_bloginfo('version') >= '3.5') {
            echo '<span style="vertical-align: middle;">' . esc_html__('From:', 'pantograph') . '</span><input type="text" id="' . esc_attr( $this->field['id'] ) . '-from" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][from]" value="' . esc_attr( $this->value['from'] ) . '" class="' . esc_attr( $class ) . ' popup-colorpicker" style="width:70px;" data-default-color="' . esc_attr($this->value['from']) . '"/>';
            echo '<span style="vertical-align: middle;">' . esc_html__('To:', 'pantograph') . '</span><input type="text" id="' . esc_attr( $this->field['id'] ) . '-to" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][to]" value="' . esc_attr( $this->value['to'] ) . '" class="' . esc_attr( $class ) . ' popup-colorpicker" style="width:70px;" data-default-color="' . esc_attr($this->value['to']) . '"/>';
            echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.esc_attr( $this->field['desc'] ).'</span>':'';
        } else {
            echo '<div class="farb-popup-wrapper" id="' . esc_attr( $this->field['id'] ) . '">';
            echo esc_html__('From:', 'pantograph') . ' <input type="text" id="' . esc_attr( $this->field['id'] ) . '-from" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][from]" value="' . esc_attr( $this->value['from'] ) . '" class="' . esc_attr( $class ) . ' popup-colorpicker" style="width:70px;"/>';
            echo '<div class="farb-popup"><div class="farb-popup-inside"><div id="' . esc_attr( $this->field['id'] ) . '-frompicker" class="color-picker"></div></div></div>';
            echo esc_html__(' To:', 'pantograph') . ' <input type="text" id="' . esc_attr( $this->field['id'] ) . '-to" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][to]" value="' . esc_attr( $this->value['to'] ) . '" class="' . esc_attr( $class ) . ' popup-colorpicker" style="width:70px;"/>';
            echo '<div class="farb-popup"><div class="farb-popup-inside"><div id="' . esc_attr( $this->field['id'] ) . '-topicker" class="color-picker"></div></div></div>';
            echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . esc_attr( $this->field['desc'] ) . '</span>' : '';
            echo '</div>';
        }
    }

    /**
     * Enqueue Function.
     *
     * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
     *
     * @since Redux_Options 1.0.0
    */
    function enqueue() {
        if(get_bloginfo('version') >= '3.5') {
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script(
                'redux-opts-field-color-js',
                Redux_OPTIONS_URL . 'fields/color/field_color.js',
                array('wp-color-picker'),
                time(),
                true
            );
        } else {
            wp_enqueue_script(
                'redux-opts-field-color-js', 
                Redux_OPTIONS_URL . 'fields/color/field_color_farb.js', 
                array('jquery', 'farbtastic'),
                time(),
                true
            );
        }
    }
}
