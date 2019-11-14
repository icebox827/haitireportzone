(function($) {
    "use strict"; // Start of use strict
	
    // Search
    $(".search-trigger").on('click', function() {
        $(".search-bar").addClass("active");
    });
	$(".searchicon").on('click', function() {
        $(".search-bar").addClass("active");
    });

    $(".search-close").on('click', function() {
        $(".search-bar").removeClass("active");
    });
	
	$('.next-toggle').on("click", function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	 });

    //post slider
    $('.post-single-slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('#toggle-view li').on('click', function() {
        var text = $(this).children('div.toggle-panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            $(this).children('span').addClass("fa-angle-up").removeClass("fa-angle-down");
        } else {
            text.slideUp('200');
            $(this).children('span').addClass("fa-angle-down").removeClass("fa-angle-up");
        }
    });
	
    //new WOW().init();
	
    $(".tabs-menu a").on('click', function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-contents").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
	
    $(".nav-trigger").on('click', function() {
        $("#sidebar-wrapper").addClass("active");
        $("body").addClass("sidemenu-active");
    });
	
    $(".body-overlay").on('click', function() {
        $("nav-trigger").removeClass("active");
        $("#sidebar-wrapper").removeClass("active");
        $("body").removeClass("sidemenu-active");
    });
	
	
	 $(".body-overlay").on('click', function() {
        $("nav-trigger").removeClass("active");
        $("#sidebar-wrapper").removeClass("active");
        $("body").removeClass("sidemenu-active");
    });
	
	$(document).on('click', '.dropdown', function (e) {
	  e.stopPropagation();
	});
	
	$.fn.newsticker = function(opts) {
		// default configuration
		var config = $.extend({}, {
            height: 30,
            speed: 800,
            start: 8
        }, opts);
		// main function
		function init(obj) {
            var dNewsticker = obj;
            var dFrame = dNewsticker.find('.js-frame');
            var dItem = dFrame.find('.js-item');
            var dNext;
            var stop = false;
            
            dItem.eq(0).addClass('current');
            
            var moveUp = setInterval(function(){
                if(!stop){
                    var dCurrent = dFrame.find('.current');
                    
                    dFrame.animate({top: '-=' + config.height + 'px'}, config.speed, function(){        
                        dNext = dFrame.find('.current').next();
                        dNext.addClass('current');
                        dCurrent.removeClass('current');
                        dCurrent.clone().appendTo(dFrame);
                        dCurrent.remove();
                        dFrame.css('top', config.start + 'px');
                    }); 
                }
            },3000);
          
            dNewsticker.on('mouseover mouseout', function(e){
                var dThisWrapper = $(this);
				if(e.type == 'mouseover') {
					stop = true;
				} 
				else{// mouseout
					stop = false;
				}
            });
        }
		// initialize every element
		this.each(function() {
			init($(this));
		});
		return this;
	};
	// start
	$(function() {
		$('.js-newsticker').newsticker();
	});

	
$(".browseallicon a").click(function(){
	$(".browseallmenu").fadeToggle(200);
   $(this).toggleClass('btn-open').toggleClass('btn-close');
});
$('.browseallmenu').on('click', function(){
    $(".browseallmenu").fadeToggle(200);   
    $(".browseallicon a").toggleClass('btn-open').toggleClass('btn-close');
    open = false;
});

})(jQuery); // End of use strict