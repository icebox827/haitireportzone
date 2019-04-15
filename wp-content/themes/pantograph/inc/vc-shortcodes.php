<?php
// VC_row customization

vc_add_param("vc_row", array(
   "type" => "textfield",
   "class" => "",
   "heading" => esc_html__("Want to have top padding?",'pantograph'),
   "param_name" => "top_padding",
   "value" => "",
   "description" => esc_html__("Input top padding in pixel (i.e 50px).", "pantograph"),
));

vc_add_param("vc_row", array(
   "type" => "textfield",
   "class" => "",
   "heading" => esc_html__("Want to have bottom padding?",'pantograph'),
   "param_name" => "bottom_padding",
   "value" => "",
   "description" => esc_html__("Input bottom padding in pixel (i.e 50px).", "pantograph"),
));

vc_add_param("vc_row", array(
   "type" => "textfield",
   "class" => "",
   "heading" => esc_html__("Want to have left padding?",'pantograph'),
   "param_name" => "zleft_padding",
   "value" => "",
   "description" => esc_html__("Input left padding in pixel (i.e 50px).", "pantograph"),
));

vc_add_param("vc_row", array(
   "type" => "textfield",
   "class" => "",
   "heading" => esc_html__("Want to have right padding?",'pantograph'),
   "param_name" => "zright_padding",
   "value" => "",
   "description" => esc_html__("Input right padding in pixel (i.e 50px).", "pantograph"),
));