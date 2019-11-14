<?php
class Redux_Options_multi_text {

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
        $class = (isset($this->field['class'])) ? $this->field['class'] : 'regular-text';
        echo '<ul id="' . esc_attr( $this->field['id'] . '-ul">';

        if(isset($this->value) && is_array($this->value)) {
            foreach($this->value as $k => $value) {
                if($value != '') {
                    echo '<li><input type="text" id="' . esc_attr( $this->field['id'] ) . '-' . esc_attr( $k ) . '" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][]" value="' . esc_attr($value) . '" class="' . esc_attr( $class ) . '" /> <a href="javascript:void(0);" class="redux-opts-multi-text-remove">' . esc_html__('Remove', 'pantograph') . '</a></li>';
                }
            }
        } else {
            echo '<li><input type="text" id="' . esc_attr( $this->field['id'] ) . '" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][]" value="" class="' . esc_attr( $class ) . '" /> <a href="javascript:void(0);" class="redux-opts-multi-text-remove">' . esc_html__('Remove', 'pantograph') . '</a></li>';
        }

        echo '<li style="display:none;"><input type="text" id="' . esc_attr( $this->field['id'] ) . '" name="" value="" class="' . esc_attr( $class ) . '" /> <a href="javascript:void(0);" class="redux-opts-multi-text-remove">' . esc_html__('Remove', 'pantograph') . '</a></li>';
        echo '</ul>';
        echo '<a href="javascript:void(0);" class="redux-opts-multi-text-add" rel-id="' . esc_attr( $this->field['id'] ) . '-ul" rel-name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][]">' . esc_html__('Add More', 'pantograph') . '</a><br/>';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . esc_attr( $this->field['desc'] ) . '</span>' : '';
    }
    
    /**
     * Enqueue Function.
     *
     * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
     *
     * @since Redux_Options 1.0.0
    */
    function enqueue() {
        wp_enqueue_script(
            'redux-opts-field-multi-text-js', 
            Redux_OPTIONS_URL . 'fields/multi_text/field_multi_text.js', 
            array('jquery'),
            time(),
            true
        );
    }    
}
