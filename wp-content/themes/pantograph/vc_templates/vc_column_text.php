<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css_animation
 * @var $css
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_text
 */
$output = $txt_color = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'wpb_text_column wpb_content_element ' . $this->getCSSAnimation( $css_animation );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );


$output = '
	<div class="' . esc_attr( $css_class ) . '">
		<div class="wpb_wrapper"'; if( $txt_color != '' ) { $output .= 'style="text-color: ' . esc_attr( $txt_color ) . ' !important"'; } $output .= '>
			' . wpb_js_remove_wpautop( $content, true ) . '
		</div>
	</div>
';

echo $output; // escaped before already