<?php
class Redux_Options_select_hide_below {

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
        $next_to_hide = (isset($this->field['next_to_hide'])) ? $this->field['next_to_hide'] : '1';
        
        echo '<select id="' . esc_attr( $this->field['id'] ) . '" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . ']" class="' . esc_attr( $class ) . ' redux-opts-select-hide-below" data-amount="' . esc_attr( $next_to_hide ) . '">';
        foreach($this->field['options'] as $k => $v) {
            echo '<option value="' . esc_attr( $k ) . '" ' . selected($this->value, $k, false) . ' data-allow="' . esc_attr( $v['allow'] ) . '" >' . esc_attr( $v['name'] ) . '</option>';
        }
        echo '</select>';
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
            'redux-opts-select-hide-below-js', 
            Redux_OPTIONS_URL . 'fields/select_hide_below/field_select_hide_below.js', 
            array('jquery'),
            time(),
            true
        );
    }
}
