// JavaScript Document
$(document).ready(function () {
$('#topnav li a').fadeTo('slow', 0.5, function() {
      // Animation complete.
    });
$('#topnav li').hover(
		function() {
			$(this).children('a').stop(true, true).fadeTo('slow', 0.99, function() {
      // Animation complete.
    });	
		}, 
		function() {
			$(this).children('a').stop(true, true).fadeTo('slow', 0.5, function() {
      // Animation complete.
    });
	});

});