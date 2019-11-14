(function($) {
 "use strict";
 
$(document).ready(function(){

	jQuery(window).load(function() {
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});

	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 500);
		return false;
	});
	})

});

})(jQuery);
