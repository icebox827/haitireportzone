<?php
if(($show_on=='full_width') && ($slide_on =='yes')){
echo '<div class="full_width_scroller">';
}
?>
<?php
if($show_on=='full_width'){
if ($link != '') { ?>
<div class="ft-instagram-title <?php echo esc_attr( $linkclass ).' '.esc_attr( $layout ); ?>"><b><?php echo wp_kses_post( $link ); ?> <a href="<?php echo trailingslashit( esc_url( $url ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>" class="<?php echo esc_attr( $linkaclass ); ?>"><?php echo esc_attr( $username ); ?></a></b></div>
<?php
}
}
?>
<ul id="scroller_layout_2" class="<?php echo esc_attr( $ulclass ).' '.esc_attr( $layout ).' '.esc_attr( $show_on ); ?>"><?php
if($custom_img_on=='yes'){ ?>
<?php if ($custom_img1 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url1 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img1 ); ?>" alt=""></a></li>
<?php } if ($custom_img2 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url2 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img2 ); ?>" alt=""></a></li>
<?php } if ($custom_img3 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url3 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img3 ); ?>" alt=""></a></li>
<?php } if ($custom_img4 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url4 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img4 ); ?>" alt=""></a></li>
<?php } if ($custom_img5 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url5 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img5 ); ?>" alt=""></a></li>
<?php } if ($custom_img6 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url6 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img6 ); ?>" alt=""></a></li>
<?php } if ($custom_img7 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url7 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img7 ); ?>" alt=""></a></li>
<?php } if ($custom_img8 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url8 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img8 ); ?>" alt=""></a></li>
<?php } if ($custom_img9 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url9 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img9 ); ?>" alt=""></a></li>
<?php } if ($custom_img10 != '') { ?>
<li><a href="<?php echo esc_url( $custom_img_url10 ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $custom_img10 ); ?>" alt=""></a></li>
<?php } ?>
<?php
} else {
foreach( $media_array as $item ) {
		echo '<li><a href="' . esc_url( $item['link'] ) . '" target="' . esc_attr( $target ) . '"><img src="' . esc_url( $item[$size] ) . '"  alt="Instagram Photo"/></a></li>';
}
}
?></ul>
<style>
	<?php include('css/layout_2_css.php'); ?>
</style>
<?php
if($show_on=='quarter'){
if ($link != '') { ?>
<b class="ft-instagram-title-bottom <?php echo esc_attr( $linkclass ).' '.esc_attr( $layout ); ?>"><?php echo wp_kses_post( $link ); ?> <a href="<?php echo trailingslashit( esc_url( $url ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>" class="<?php echo esc_attr( $linkaclass ); ?>"><?php echo esc_attr( $username ); ?></a></b>
<?php
}
}
?>
<?php
if(($show_on=='full_width') && ($slide_on =='yes')){ ?>
</div>
<script>
(function($) {
	$(function() {
		$("#scroller_layout_2").simplyScroll();
	});
})(jQuery);
</script>
<?php } ?>