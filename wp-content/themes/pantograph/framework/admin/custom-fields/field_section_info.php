<?php
class Redux_Options_section_info {

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
        $class = (isset($this->field['class'])) ? ' ' . $this->field['class'] : '';
        echo '</td></tr></table><div class="redux-opts-section-info-field' . esc_attr( $class ) . '">' . esc_attr( $this->field['desc'] ) . '</div><table class="form-table no-border"><tbody><tr style="display: none;"><th></th><td>';
    }
}

function Redux_Options_section_info_style(){
    ?>
    <style>
        .redux-opts-section-info-field {
            font-size: 1.2em;
            color: white;
            background-color: #333;
            padding: 5px;
            font-weight: bold;
        }

        .redux-opts-section-info-field ~ .form-table {
            margin-top: 10px;
        }
    </style>
    <?php
}
add_action( 'admin_print_scripts', 'Redux_Options_section_info_style' );
