<?php
class Redux_Options_color_scheme {

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
        $classes = 'color-schemes';
        if ( isset($this->field['class']) ) {
        	$classes .= ' '.$this->field['class'];
        }
        echo '<div id="' . esc_attr( $this->field['id'] ) . '" name="' . esc_attr( $this->args['opt_name'] ) . '[' . esc_attr( $this->field['id'] ) . ']" class="' . esc_attr( $classes ) . '" >';
        foreach($this->field['options'] as $k => $v) {
            printf( '<a class="color-scheme" href="#" style="background-color: %s; color: %s" data-scheme="'.$k.'"><span class="accent" style="background-color: %s;"></span> %s</a>', $v['background'], $v['text'], $v['accent'], $v['name'] );
        }
        echo '</div>';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? '<br/><span class="description">' . esc_attr( $this->field['desc'] ) . '</span>' : '';
    }
}
