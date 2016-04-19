$(document).ready(function() {

	$('#cards h1').on('click', function(e) {
		e.preventDefault();
		$(this).next().toggleClass('fourth').toggleClass('half');
	});

	$('#menu-toggle').on('click', function() {
		$('#site-top section').slideToggle();
	});

/*
=========================
SMOOTH SCROLLING
=========================
*/ 
	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 300);
	        return false;
	      }
	    }
	  });
	});

/*
=====================================
FIXED HEADER WHEN SCOLLING UP
=====================================
*/ 
// var lastScrollTop = 0;
// $(window).scroll(function(event){
//    var st = $(this).scrollTop();
//    if (st > lastScrollTop){
//        $("#site-top").stop(true, false).slideUp(300);
//        setTimeout(function() {
//        	$('#site-top section').hide();
//        }, 800);
//    } else {
//        $("#site-top").slideDown(300);
//    }
//    lastScrollTop = st;

// });

// var headerHeight = $('#site-top').outerHeight();
// $('.page-body').css('marginTop', headerHeight);
// console.log(headerHeight);

// $('#site-top').css('position', 'initial');

// var lastScrollTop = 0;
// $(window).scroll(function(event){
//    var st = $(this).scrollTop();
//    if (st > lastScrollTop){
//        $("#site-top").stop(true, false).removeClass('fadeInDown').addClass('fadeOutUp');
//        setTimeout(function() {
//        	$('#site-top section').hide();
//        }, 800);
//        // $("#site-top .site-width").stop(true, false).animate({ 'marginTop': '0'}, 100);
//    } else {
//        $("#site-top").removeClass('fadeOutUp').addClass('fadeInDown').css('position', 'fixed');
//        // $("#site-top .site-width").animate({ 'marginTop': '40px'}, 200);
//    }
//    lastScrollTop = st;

// });



/*
=====================================
ACCORDIAN
=====================================
*/ 
var accordianContainer = $('.accordian');

accordianContainer.children('dd').hide();

accordianContainer.children('dt').on('click', function() {
	$(this).next().slideToggle(200);
});


/*
=====================================
SLIDER
=====================================
*/ 
$('.owl-carousel-no-nav').owlCarousel({
    loop:true,
    responsiveClass:true,
    autoplay: 5000,
    items:1,
    nav:true,
    navText: '<>'
})

$('.owl-carousel-basic-nav').owlCarousel({
    loop:true,
    responsiveClass:true,
    autoplay: 5000,
    items:1,
    nav:true,
    navText: '<>',
    dots: true
})

$('.owl-carousel-nav-bar').owlCarousel({
    loop:true,
    responsiveClass:true,
    autoplay: 5000,
    items:1,
    nav:true,
    navText: '<>',
    dots: true
    // loop:true
})

$('.owl-carousel-no-nav-no-arrow').owlCarousel({
    loop:true,
    responsiveClass:true,
    autoplay: 5000,
    items:1
})

});

// var sticky = new Waypoint.Sticky({
//   element: $('.author-sidebar'),
//   offset: '48px'
// })