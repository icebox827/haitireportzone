jQuery(document).ready(function($){initTopButton();function initTopButton(){var $=jQuery;$("#back-top").hide();$(function(){$(window).scroll(function(){if($(this).scrollTop()>0){$('#back-top').fadeIn();}else{$('#back-top').fadeOut();}});$('#back-top a').click(function(){$('body,html').animate({scrollTop:0},300);return false;});});};var headerView=function(){var scroll=$(window).scrollTop();if(scroll<=0){$("body").removeClass("compact");}
else{$("body").addClass("compact");}}
headerView();$(window).scroll(function(){headerView();});});


