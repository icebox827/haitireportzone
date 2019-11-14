<?php
if(($show_on=='full_width') && ($slide_on =='yes')){
echo '<div class="full_width_scroller">';
}
?>
<?php
if($show_on=='full_width'){
if ($link != '') { ?>
<h4 class="ft-instagram-title <?php echo esc_attr( $linkclass ).' '.esc_attr( $layout ); ?>"><?php echo wp_kses_post( $link ); ?> <a href="<?php echo trailingslashit( esc_url( $url ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>" class="<?php echo esc_attr( $linkaclass ); ?>"><?php echo esc_attr( $username ); ?></a></h4>
<?php
}
}
?>
<ul id="scroller_layout_1" class="<?php echo esc_attr( $ulclass ).' '.esc_attr( $layout ).' '.esc_attr( $show_on ); ?>"><?php
foreach( $media_array as $item ) {
		echo '<li><a href="' . esc_url( $item['link'] ) . '" target="' . esc_attr( $target ) . '"><img src="' . esc_url( $item[$size] ) . '"  alt="Instagram Photo"/></a></li>';
}
?></ul>
<style>
	<?php include('css/layout_1_css.php'); ?>
</style>
<?php
if($show_on=='quarter'){
if ($link != '') { ?>
<h4 class="ft-instagram-title <?php echo esc_attr( $linkclass ).' '.esc_attr( $layout ); ?>"><?php echo wp_kses_post( $link ); ?> <a href="<?php echo trailingslashit( esc_url( $url ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>" class="<?php echo esc_attr( $linkaclass ); ?>"><?php echo esc_attr( $username ); ?></a></h4>
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
		$("#scroller_layout_1").simplyScroll();
	});
})(jQuery);
</script>
<?php } ?>