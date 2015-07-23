/* Template: AvaLanche | Author: eriktailor | Version: 1.0  */
/*----------------------------------------------------------*/

/*----------------------------------------------------------*/
/*	# Table of Contents */
/*----------------------------------------------------------*/
/* 
	1.  Navigation
	2.  Welcome Text
	3.  Team & Process
	4.	Portfolio Effects
	5.	Testimonials

/*

/*--------------------- Start Document ---------------------*/

(function($) {
"use strict";

	$(document).ready(function(){
	

/*----------------------------------------------------------*/
/* # Navigation */
/*----------------------------------------------------------*/	

	/* Sticky Navigation */
	$("#navigation").waypoint('sticky');
	
	/* Smooth Scrolling */	
	$(function(){
		$('#menu a').smoothScroll({
			speed: 800,
			offset: -69
		});
	});	
	
	/* Mobile Menu */
	$(function() {
	
		var mobileMenu 	= $('.mobile-menu'),
			menu 		= $('#menu ul'),
			menuHeight	= menu.height();

		$(mobileMenu).on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
			menu.slideToggle();
		});
		$(window).resize(function(){
        	var w = $(window).width();
        	if(w > 760 && menu.is(':hidden')) {
        		menu.removeAttr('style');
        	}
    	});
		
	});
	
	// Back to Top
	$(function(){
		$(window).scroll(function () {
			if ($(this).scrollTop() > 600) {
				$('#back-top').removeClass('downscaled');
			} else {
				$('#back-top').addClass('downscaled');
			}
		});	
		
		$('#back-top').click(function(){
				$('body,html').animate({ scrollTop: 0 }, 800);
				return false;
		});
	});	


/*----------------------------------------------------------*/
/* # Welcome Content */
/*----------------------------------------------------------*/		
	
	/* Header Title Load Effect */
	$('.header-title').addClass('animated fadeInUpBig');
	
	// Parallax
	var w = $(window).width();
		if(w > 960){
		$('.bg-slides').parallax("50%", -0.1);
		$('.process').parallax("50%", -0.1);
	}
	
	/* Header Content Parallax */	
	$(function () {	
		
		$(window).bind('scroll',function(e){
			parallaxScroll();
		});
					
					
		function parallaxScroll(){
			var scrolledY = $(window).scrollTop();
			$('.header-content').css('top','+'+((scrolledY*0.4))+'px');
		};
		
	});

/*----------------------------------------------------------*/
/* # Our Team  */
/*----------------------------------------------------------*/

	/* Member Details */
	
		// Appear and Toggle member information window
		$(".team-member a[data-toggle]").on("click", function(e) {
		  e.preventDefault();
		  var memberProfile = $(this).data("toggle");
		  $(".memberProfile").hide();
		  $(memberProfile).slideDown('slow');
		});
		
		// Add active class to the clicked member
		$(".team-member").bind("click", function(){
			$(".team-member").removeClass('team-member-active');		
			$(this).addClass('team-member-active');
		});
		
		// Close member information window
		$(".member-photo .close").click(function(){
		$(".team-member").removeClass('team-member-active');
		  $(".memberProfile").hide('slow');		  
		});
		
		// Reorder member details
		$(".memberProfile").appendTo(".about .container");
		var memberReorder = (function(a,b){
			$(".memberProfile:eq("+a+")").attr('id',''+b+'Member');
			$(".team-member:eq("+a+") > a").attr('data-toggle','#'+b+'Member');			
		}); memberReorder(0,'first'); memberReorder(1,'second'); memberReorder(2,'third'); memberReorder(3,'fourth');
		
		// Disable socials if empty
		$('.member-photo .social-networks a').each(function() {
			var href = $(this).attr("href");
			if(href == '') {
				$(this).remove();
			}
		});

		

	

	
/*----------------------------------------------------------*/
/* # Our Process  */
/*----------------------------------------------------------*/

	/* Process Details */
	
		// Appear and Toggle member information window
		$(".process-part a[data-toggle]").on("click", function(e) {
		  e.preventDefault();
		  var processDetail = $(this).data("toggle");
		  $(".processInfo").hide();
		  $(processDetail).slideDown('slow');
		});
		
		// Add active class to the clicked member
		$(".process-part").bind("click", function(){
			$(".process-part").removeClass('process-part-active');		
			$(this).addClass('process-part-active');
		});
		
		// Close member information window
		$(".processInfo .close").click(function(){
			$(".process-part-active").removeClass('process-part-active');
			$(".processInfo").hide('slow');		  
		});	

		// Reorder process details
		$(".processInfo").appendTo(".process .container");
		var processReorder = (function(a,b){
			$(".processInfo:eq("+a+")").attr('id',''+b+'Process');
			$(".process-part:eq("+a+") > a").attr('data-toggle','#'+b+'Process');			
		}); processReorder(0,'first'); processReorder(1,'second'); processReorder(2,'third'); processReorder(3,'fourth');		
		
	
/*----------------------------------------------------------*/
/* # Portfolio Effects & Filtering */
/*----------------------------------------------------------*/		

	/* Portfolio Items Load Animation */
	$('.portfolio-sec').waypoint(function(){
	
		var $items = $('#portfolio-wrapper');
		
		$items.each(function(i){
			$(this).css('animation-delay', (i*0.4)+"s");
		});
		
		$items.addClass('animated fadeInUp');
		
	}, {offset: 300});
	
	
	/* Portfolio Filtering */

	
	

/*----------------------------------------------------------*/
/* # Services */
/*----------------------------------------------------------*/		

	/* Services Load Effect */
	$('.services').waypoint(function(){
	
		var $items=$('.service-item');
		
		$items.each(function(i){
			$(this).css('animation-delay', (i*0.3)+"s");
		});
		
		$items.addClass('animated fadeInUp');
		
	}, {offset: 400});

/*----------------------------------------------------------*/
/* # Portfolio Details Page */
/*----------------------------------------------------------*/			
	
	/* Tablet Slider */	
	$('.tablet-frame').addClass('animated fadeInDown');	

	
	/* Related Items Load Effect*/
	var pItem = $(".portfolio-item");
	
	$('#related-projects').waypoint(function() {
		
		pItem.eq(0).css("animation-delay","0s");
		pItem.eq(1).css("animation-delay","0.3s");	
		pItem.eq(2).css("animation-delay","0.6s");

		pItem.css("animation-duration","0.6s");
		
		pItem.addClass('animated fadeInUp');
		
	}, { offset: 400});	
	

	/* Image Hover Highlight Effect */
	var projectImage = $('.project-image');

	projectImage.hover(function(){
		$(this).addClass('highlight');
		$('#overlay').fadeIn(500);
	});	
	
	projectImage.mouseleave( function(){
		$('#overlay').fadeOut(10, function(){
			projectImage.removeClass('highlight');
		});
	});

	/* Replace Gallery to Tablet Slider */
	var galleryCustom = $('.gallery');
	galleryCustom.addClass('cycle-slideshow').attr('id','tablet-slider').wrap('<div class="tablet-frame"></div>');
	galleryCustom.find('img').removeAttr('width').removeAttr('height');
	galleryCustom.find('br').remove();
	galleryCustom.find('dt').unwrap().addClass('slide');
	$('#tablet-slider').cycle({slides: '>dt'});
	
/*----------------------------------------------------------*/
/* # Fixes */
/*----------------------------------------------------------*/
	$('.ava-list p').remove();
	

$(window).load(function(){
	var portfolio = (function() {
		var $container = $('#portfolio-wrapper'),
				$select = $('#filters select');

		$container.isotope({
		  resizable: false, // disable normal resizing
		  // set columnWidth to a percentage of container width
		  masonry: { columnWidth: $container.width() / 12 }
		});

		// update columnWidth on window resize
		$(window).smartresize(function(){
		  $container.isotope({
			// update columnWidth to a percentage of container width
			masonry: { columnWidth: $container.width() / 12 }
		  });
		});
		
		
		$container.isotope({
			itemSelector : '.portfolio-item'
		});
	  
		$select.change(function() {
			var filters = $(this).val();
	
			$container.isotope({
				filter: filters
			});
		});
	  
		// Portfolio Filtering
		var $optionSets = $('#filters .option-set'),
			$optionLinks = $optionSets.find('a');

		$optionLinks.click(function(){
				var $this = $(this);
				// don't proceed if already selected
				if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');
	  
			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
				key = $optionSet.attr('data-option-key'),
				value = $this.attr('data-option-value');
			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[ key ] = value;
			if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
			  // changes in layout modes need extra logic
			  changeLayoutMode( $this, options )
			} else {
			  // otherwise, apply new options
			  $container.isotope( options );
			}
			return false;
		});

	});
	
	portfolio();
});	



/*---------------------- End Document ----------------------*/
});
})(jQuery);


