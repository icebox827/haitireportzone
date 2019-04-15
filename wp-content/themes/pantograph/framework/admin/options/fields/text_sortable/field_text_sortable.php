<?php
class Redux_Options_text_sortable {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 2.0.1
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
     * @since Redux_Options 2.0.1
    */
    function render() {
        $class = (isset($this->field['class'])) ? $this->field['class'] : '';
        $options = $this->field['options'];

        echo '<ul class="text_sortable ' . $class . '">';
            if (isset($this->value) && is_array($this->value)) {
                foreach ($this->value as $k => $nicename) {
                    $value_display = isset($this->value[$k]) ? $this->value[$k] : '';
                    echo '<li>';
                    echo '<label for="' . esc_attr( $this->field['id'] ) . '[' . esc_attr( $k ) . ']"><strong>' . esc_attr( $options[$k] ) . ':</strong></label>';
                    echo '<input type="text" id="' . esc_attr( $this->field['id'] ) . '[' . esc_attr( $k ) . ']" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][' . esc_attr( $k ) . ']" value="' . esc_attr($value_display) . '" placeholder="' . esc_attr( $nicename ) . '" />';
                    echo '<span class="compact drag"><i class="icon-move icon-large"></i></span>';
                    echo '</li>';
                }
            } else {
                foreach ($options as $k => $nicename) {
                    $value_display = isset($this->value[$k]) ? $this->value[$k] : '';
                    echo '<li>';
                    echo '<label for="' . esc_attr( $this->field['id'] ) . '[' . esc_attr( $k ) . ']"><strong>' . esc_attr( $nicename ) . ':</strong></label>';
                    echo '<input type="text" id="' . esc_attr( $this->field['id'] ) . '[' . esc_attr( $k ) . ']" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . '][' . esc_attr( $k ) . ']" value="' . esc_attr($value_display) . '" placeholder="' . esc_attr( $nicename ) . '" />';
                    echo '<span class="drag"><i class="icon-move icon-large"></i></span>';
                    echo '</li>';
                }
            }
        echo '</ul>';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . esc_attr( $this->field['desc'] ) . '</span>' : '';
    }

    function enqueue() {
        wp_enqueue_script(
            'redux-opts-field-social-links-js',
            Redux_OPTIONS_URL . 'fields/text_sortable/field_text_sortable.js',
            array('jquery'),
            time(),
            true
        );
    }
}
