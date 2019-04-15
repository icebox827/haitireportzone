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
	
	// Mobile Menu
    $(".mobilemenu-trigger").on('click', function() {
        $(".mobilemenu-bar").addClass("active");
        $("body").addClass("noScroll");
    });
	$(".searchicon").on('click', function() {
        $(".mobilemenu-bar").addClass("active");
    });

    $(".mobilemenu-close").on('click', function() {
        $(".mobilemenu-bar").removeClass("active");
        $("body").removeClass("noScroll");
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
   $(".browseallicon a i").toggleClass('fa-bars').toggleClass('fa-times');
});
$('.browseallmenu').on('click', function(){
    $(".browseallmenu").fadeToggle(200);   
    $(".browseallicon a i").toggleClass('fa-bars').toggleClass('fa-times');
    open = false;
});

if($(".vc_col-sm-12").has(".col-md-4").length){
	$(".vc_col-sm-12 .col-md-4 .post-thumb").addClass("fontsizing");
} if($(".vc_col-sm-12").has(".col-md-3").length){
	$(".vc_col-sm-12 .col-md-3 .post-thumb").addClass("fontsizing");
} if($(".vc_col-sm-8").has(".col-md-6").length){
	$(".vc_col-sm-8 .col-md-6 .post-thumb").addClass("fontsizing");
} if($(".vc_col-sm-8").has(".col-md-3").length){
	$(".vc_col-sm-8 .col-md-3 .post-thumb").addClass("fontsizing");
} if($(".vc_col-sm-8").has(".col-md-4").length){
	$(".vc_col-sm-8 .col-md-4 .post-thumb").addClass("fontsizing");
} if($(".vc_col-sm-6").has(".col-md-6").length){
	$(".vc_col-sm-6 .col-md-6 .post-thumb").addClass("fontsizing");
} if($(".vc_col-sm-6").has(".col-md-4").length){
	$(".vc_col-sm-6 .col-md-4 .post-thumb").addClass("fontsizing");
} if($(".vc_col-sm-6").has(".col-md-3").length){
	$(".vc_col-sm-6 .col-md-3 .post-thumb").addClass("fontsizing");
}

// Load More Post On Cat, Blog and Index page
jQuery('.load_more a').live('click', function(e){
  e.preventDefault();
  var link = jQuery(this).attr('href');
  jQuery('.load_more');
  jQuery('.load_more a i').addClass('fa-spin');
  jQuery('body').addClass('not-first-page');
  $.get(link, function(data) {
	  var post = $("#posts_load_pagination .post ", data);
	  $('#posts_load_pagination').append(post);
  });
  jQuery('.load_more').load(link+' .load_more a');
});
// End Load More Posts

//Add class to vc full width row
$('div').each(function() {
    var myEm = $(this).attr('data-vc-full-width-init');
    //alert(myEm);
    $('div[data-vc-full-width-init = '+myEm+']').addClass('titlebg-transparent');
});

//Add class to body tag if is mobile
$('body').each(function() {
    var $window = $(window),
        $html = $('body');

    function resize() {
        if ($window.width() < 768) {
            return $html.addClass('width_less_than_768');
        }

        $html.removeClass('width_less_than_768');
    }

    $window
        .resize(resize)
        .trigger('resize');
})
/** Start for sign in and signup***/
jQuery(".login-form").submit(function() {
        var thisform = jQuery(this);
        jQuery('.required-error',thisform).remove();
        jQuery('input[type="submit"]',thisform).hide();
        jQuery('.loader_2',thisform).show().css({"display":"block"});
        var fields = jQuery('.inputs',thisform);
        jQuery('.required-item',thisform).each(function () {
            var required = jQuery(this);
            if (required.val() == '') {
                required.after('<span class=required-error>'+ask_error_text+'</span>');
                return false;
            }
        });
        var data = {
            action:         'pantograph_ask_ajax_login_process',
            security:       jQuery('input[name=\"login_nonce\"]',thisform).val(),
            log:            jQuery('input[name=\"log\"]',thisform).val(),
            pwd:            jQuery('input[name=\"pwd\"]',thisform).val(),
            redirect_to:    jQuery('input[name=\"redirect_to\"]',thisform).val()
        };
        jQuery.post(jQuery('input[name=\"ajax_url\"]',thisform).val(),data,function(response) {
            var result = jQuery.parseJSON(response);
            if (result.success == 1) {
                window.location = result.redirect;
            }else if (result.error) {
                jQuery(".ask_error",thisform).hide(10).slideDown(300).html('<strong>'+result.error+'</strong>').delay(3000).slideUp(300);
            }else {
                return true;
            }
            jQuery('.loader_2',thisform).hide().css({"display":"none"});
            jQuery('input[type="submit"]',thisform).show();
        });
        return false;
    });



    jQuery(".login-pantograph").click(function () {
        jQuery(".panel-pop").animate({"top":"-100%"},10).hide();
        jQuery("#login-pantograph").show().animate({"top":"32px"},500);
        jQuery("html,body").animate({scrollTop:0},500);
        jQuery("body").prepend("<div class='wrap-pop'></div>");
        wrap_pop();
        return false;
    });
    
    /* Signup */
    jQuery(".signup,.login-links-r a").click(function () {
        jQuery(".panel-pop").animate({"top":"-100%"},10).hide();
        jQuery("#signup").show().animate({"top":"32px"},500);
        jQuery("html,body").animate({scrollTop:0},500);
        jQuery("body").prepend("<div class='wrap-pop'></div>");
        wrap_pop();
        return false;
    });

    jQuery(".signup_form").submit(function() {
        var thisform = jQuery(this);
        jQuery('.required-item',thisform).each(function () {
            var required = jQuery(this);
            if (required.val() == '') {
                required.after('<span class=required-error>All fields are required</span>');
                $(".required-error").fadeOut(2000);
                return false;
            }
        }); 

        var data = {
            action:           'pantograph_ajax_ask_signup',
            security:         jQuery('input[name=\"signonsecurity\"]',thisform).val(),
            user_name:        jQuery('input[name=\"user_name\"]',thisform).val(),
            email:            jQuery('input[name=\"email\"]',thisform).val(),
            pass1:            jQuery('input[name=\"pass1\"]',thisform).val(),
            pass2:            jQuery('input[name=\"pass2\"]',thisform).val(),
            redirect_to:      jQuery('input[name=\"redirect_to\"]',thisform).val()
        };

        jQuery.post(jQuery('input[name=\"ajax_url\"]',thisform).val(),data,function(data) {
            var data = $.parseJSON(data);
            jQuery('.ask_error').text(data.message);
            if (data.loggedin == true) {
                window.location = jQuery('input[name=\"redirect_to\"]',thisform).val();
            }
        }); 

        return false;
    });


   

    jQuery(".panel-pop h2 i").click(function () {
        jQuery(this).parent().parent().animate({"top":"-100%"},500).fadeOut(function () {
            jQuery(this).animate({"top":"-100%"},500);
        });
        jQuery(".wrap-pop").remove();
    });


    function wrap_pop() {
        jQuery(".wrap-pop").click(function () {
            jQuery(".panel-pop").animate({"top":"-100%"},500).fadeOut(function () {
                jQuery(this).animate({"top":"-100%"},500);
            });
            jQuery(this).remove();
        });
    }


    $("#show-signup").on('click', function(){
        $(".sign-up-form").show();
        $("#signup-title").show(); 
        $("#login-title").hide();
        $(".login-form-area").hide();
    });    

    $("#signup-cancel").on('click', function(){
        $(".sign-up-form").hide();
        $("#signup-title").hide(); 
        $("#login-title").show();        
        $(".login-form-area").show();
    });
/** End for sign in and signup***/	
})(jQuery); // End of use strict