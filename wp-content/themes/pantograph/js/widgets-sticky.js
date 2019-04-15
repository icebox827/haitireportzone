(function($) {
 "use strict";
$(document).ready(function(){

	$(".wpb_row .vc_col-sm-4:last-of-type").addClass("stickywidget");
	$("aside.col-md-4").addClass("stickywidget");
	
	var elements = document.getElementsByClassName('stickywidget');

    for (var i = 0; i < elements.length; i++) {
     new hcSticky(elements[i], {
        stickTo: elements[i].parentNode,
        top: 10,
        bottomEnd: 10
      });
    }
});	
})(jQuery); // End of use strict