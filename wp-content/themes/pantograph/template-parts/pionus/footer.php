<?php
$footer_style = $GLOBALS['footer_style'];
if( $footer_style == 'default' ) {
	get_template_part( 'template-parts/pionus/template-parts/footer', 'default' ); 
}elseif( $footer_style == 1 ) {
	get_template_part( 'template-parts/pionus/template-parts/footer', 'one' ); 
}elseif( $footer_style == 2 ) {
	get_template_part( 'template-parts/pionus/template-parts/footer', 'two' );
}elseif( $footer_style == 3 ) {
	get_template_part( 'template-parts/pionus/template-parts/footer', 'three' );  
}elseif( $footer_style == 4 ) {
	get_template_part( 'template-parts/pionus/template-parts/footer', 'four' ); 
}elseif( $footer_style == 5 ) {
	get_template_part( 'template-parts/pionus/template-parts/footer', 'five' ); 
}elseif( $footer_style == 6 ) {
	get_template_part( 'template-parts/pionus/template-parts/footer', 'six' ); 	
}else{	
if(pionusnews_get_option('pionusnews_footer_style') == 'default') { 
	get_template_part( 'template-parts/pionus/template-parts/footer', 'default' );
 }elseif(pionusnews_get_option('pionusnews_footer_style') == 1) { 
	get_template_part( 'template-parts/pionus/template-parts/footer', 'one' ); 
 }elseif(pionusnews_get_option('pionusnews_footer_style') == 2){
	 get_template_part( 'template-parts/pionus/template-parts/footer', 'two' ); 
 }elseif(pionusnews_get_option('pionusnews_footer_style') == 3){
	 get_template_part( 'template-parts/pionus/template-parts/footer', 'three' ); 
 }elseif(pionusnews_get_option('pionusnews_footer_style') == 4){
	 get_template_part( 'template-parts/pionus/template-parts/footer', 'four' ); 
 }elseif(pionusnews_get_option('pionusnews_footer_style') == 5){
	 get_template_part( 'template-parts/pionus/template-parts/footer', 'five' ); 
 }elseif(pionusnews_get_option('pionusnews_footer_style') == 6){
	 get_template_part( 'template-parts/pionus/template-parts/footer', 'six' ); 
 }else{
	get_template_part( 'template-parts/pionus/template-parts/footer', 'default' ); 
 }
}
?>
</div>
<a href="#" class="scrollup"></a>
<!--Flicker-->
<?php if(pionusnews_get_option('pionusnews_flickr_id') != '') { ?>
<?php get_template_part( 'template-parts/pionus/flicker/flickr' ); ?>
<?php } ?>
<!--Flicker End-->
<?php if ((pantograph_is_extensions_plugin_active()) && (pionusnews_get_option('mailchimp_apikey') != '') && (pionusnews_get_option('mailchimp_listid') != '')){
	get_template_part( 'template-parts/pionus/mailchimp/mailchimp-validation' );
 } ?>
<!--MailChimp End-->

	<?php
		/* Always have wp_footer() just before the closing </body>
		* tag of your theme, or you will break many plugins, which
		* generally use this hook to reference JavaScript files.
		*/

		wp_footer();	
	?>
</body>
</html>