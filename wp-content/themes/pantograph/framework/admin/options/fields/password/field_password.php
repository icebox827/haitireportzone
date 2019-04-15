<?php
class Redux_Options_password {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.1
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
     * @since Redux_Options 1.0.1
    */
    function render() {
        $class = (isset($this->field['class'])) ? $this->field['class'] : 'regular-text';
        echo '<input type="password" id="' . esc_attr( $this->field['id'] ) . '" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . ']" value="' . esc_attr($this->value) . '" class="' . esc_attr( $class ) . '" />';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . esc_attr( $this->field['desc'] ) . '</span>' : '';
    }
}
