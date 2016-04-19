$(document).ready(function() {

	// var postHero = $('.post-hero');
	// $('<div></div>', {
	// 	class: 'not-slim',
	// 	html: postHero.html()
	// }).appendTo('.post-content');

	var inview = new Waypoint.Inview({
	  element: $('#post-thumbnail')[0],
	  enter: function(direction) {
	  	if (direction === 'up') {
	  		$('.post-hero:last-of-type').removeClass('fadeInDown').addClass('fadeOutUp');	
	  	}
	  },
	  entered: function(direction) {
	    
	  },
	  exit: function(direction) {

	  },
	  exited: function(direction) {
	  	$('.not-slim').addClass('slim').children('.post-hero').removeClass('fadeOutUp').addClass('fadeInDown');
	  }
	})

});