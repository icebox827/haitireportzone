<?php
$footer_style = $GLOBALS['footer_style'];
if(is_page( 'footer-style-01' )){
	get_template_part( 'template-parts/footer', 'default' );
}elseif(is_page( 'footer-style-02' )){
	get_template_part( 'template-parts/footer', 'one' );
}elseif(is_page( 'footer-style-03' )){
	get_template_part( 'template-parts/footer', 'two' );
}elseif(is_page( 'footer-style-04' )){
	get_template_part( 'template-parts/footer', 'three' );
}elseif(is_page( 'footer-style-05' )){
	get_template_part( 'template-parts/footer', 'four' );
}elseif(is_page( 'footer-style-06' )){
	get_template_part( 'template-parts/footer', 'five' );
}elseif(is_page( 'footer-style-07' )){
	get_template_part( 'template-parts/footer', 'six' );	
}else{
if( $footer_style == 'default' ) {
	get_template_part( 'template-parts/footer', 'default' ); 
}elseif( $footer_style == 1 ) {
	get_template_part( 'template-parts/footer', 'one' ); 
}elseif( $footer_style == 2 ) {
	get_template_part( 'template-parts/footer', 'two' );
}elseif( $footer_style == 3 ) {
	get_template_part( 'template-parts/footer', 'three' );  
}elseif( $footer_style == 4 ) {
	get_template_part( 'template-parts/footer', 'four' ); 
}elseif( $footer_style == 5 ) {
	get_template_part( 'template-parts/footer', 'five' ); 
}elseif( $footer_style == 6 ) {
	get_template_part( 'template-parts/footer', 'six' ); 	
}else{	
if(pantograph_get_option('pantograph_footer_style') == 'default') { 
	get_template_part( 'template-parts/footer', 'default' );
 }elseif(pantograph_get_option('pantograph_footer_style') == 1) { 
	get_template_part( 'template-parts/footer', 'one' ); 
 }elseif(pantograph_get_option('pantograph_footer_style') == 2){
	 get_template_part( 'template-parts/footer', 'two' ); 
 }elseif(pantograph_get_option('pantograph_footer_style') == 3){
	 get_template_part( 'template-parts/footer', 'three' ); 
 }elseif(pantograph_get_option('pantograph_footer_style') == 4){
	 get_template_part( 'template-parts/footer', 'four' ); 
 }elseif(pantograph_get_option('pantograph_footer_style') == 5){
	 get_template_part( 'template-parts/footer', 'five' ); 
 }elseif(pantograph_get_option('pantograph_footer_style') == 6){
	 get_template_part( 'template-parts/footer', 'six' ); 
 }else{
	get_template_part( 'template-parts/footer', 'default' ); 
 }
} 
 } 
?>
</div>
<a href="#" class="scrollup"></a>
<!--Flicker-->
<?php if(pantograph_get_option('pantograph_footer_flickr') == '1') { ?>
<?php if(pantograph_get_option('pantograph_flickr_id') != '') { ?>
<?php get_template_part( 'flicker/flickr' ); ?>
<?php } } ?>
<!--Flicker End-->
<?php 
$theme_directory = get_template_directory();
$subscribe_file  = '/subscribe/sub_check.jpg';	
if ( file_exists( $theme_directory . $subscribe_file ) ) {
$subscribefile = get_template_directory_uri(). '/subscribe/subscribe.php';
} else {
$subscribefile = '#';
}
?>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			// jQuery Validation
			$("#footer_signup").validate({
				// if valid, post data via AJAX
				submitHandler: function() {
					var subscribefile="<?php echo esc_url( $subscribefile ); ?>";
					$.post(subscribefile, { email: $("#email").val() }, function(data) {
						$('#footer_response').html(data);
					});
				},
				// all fields are required
				rules: {
					email: {
						required: false,
						email: false
					}
				}
			});
		});
</script>

	<?php
		/* Always have wp_footer() just before the closing </body>
		* tag of your theme, or you will break many plugins, which
		* generally use this hook to reference JavaScript files.
		*/

		wp_footer();	
	?>
</body>
</html>