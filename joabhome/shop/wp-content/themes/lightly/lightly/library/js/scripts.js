/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp-head()
this file will be called automatically in the footer so as not to 
slow the page load.

*/

// Modernizr.load loading the right scripts only if you need them
Modernizr.load([
	{
    // Let's see if we need to load selectivizr
    test : Modernizr.borderradius,
    // Modernizr.load loads selectivizr and Respond.js for IE6-8
    nope : ['libs/selectivizr-min.js']
	}
]);


// as the page loads, call these scripts
jQuery(document).ready( function($) {
	if ( $(window).width() > 768 ){
		$('#search-header').css('marginTop', ( ( ($('#logo').height() + 60 )/2) - ($('#search-header').height()/2) ) + 'px' );
		$('#sidebar-top').css('marginTop', ( ( ($('#logo').height() + 60 )/2) - ($('#sidebar-top').height()/2) ) + 'px' );
	}
	$(".widget_video").fwCarousel();
	$('.tabs').fwTabs();
	$('.post_content').fitVids();
	
	$('.menu ul li').mouseenter(function(){
		if ( $('ul:first', this).css('display') == 'block' )
		$('ul:first',this).css('visibility', 'visible').css('opacity', '0').stop(true, false).animate({ 'opacity': 1 }, 300);
	}).mouseleave( function(){
		$('ul:first',this).css('visibility', 'visible').css('opacity', '1').stop(true, false).animate({ 'opacity': 0 }, 300);
	});
	$('.menu ul li ul li').each( function(){
		if ( $(this).has('.sub-menu').length > 0 ) $( this ).addClass('has-child');
	});
	$(window).resize( function(){
		if ( $(window).width() > 768 ){
			$('#search-header').css('marginTop', ( ( ($('#logo').height() + 60 )/2) - ($('#search-header').height()/2) ) + 'px' );
			$('#sidebar-top').css('marginTop', ( ( ($('#logo').height() + 60 )/2) - ($('#sidebar-top').height()/2) ) + 'px' );
		}else{
			$('#search-header').css('marginTop', '0' );
			$('#sidebar-top').css('marginTop', '0' );
		}
	});
}); /* end of as page load scripts */


// HTML5 Fallbacks for older browsers
(function($) {
	// check placeholder browser support
	if (!Modernizr.input.placeholder) {
		// set placeholder values
		$(this).find('[placeholder]').each(function() {
			$(this).val( $(this).attr('placeholder') );
			if ($(this).val() == $(this).attr('placeholder')) {
				$(this).addClass('placeholder');
			}
		});
 
		// focus and blur of placeholders
		$('[placeholder]').focus(function() {
			if ($(this).val() == $(this).attr('placeholder')) {
				$(this).val('');
				$(this).removeClass('placeholder');
			}
		}).blur(function() {
			if ($(this).val() == '' || $(this).val() == $(this).attr('placeholder')) {
				$(this).val($(this).attr('placeholder'));
				$(this).addClass('placeholder');
			}
		});
 
		// remove placeholders on submit
		$('[placeholder]').closest('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				if ($(this).val() == $(this).attr('placeholder')) {
					$(this).val('');
				}
			});
		});
	}
})(jQuery);


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){
		return;
	}
	
    var doc = w.document;

    if( !doc.querySelector ){ return; }

    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;

    if( !meta ){ return; }

    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true;
    }

    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false;
    }
	
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
				
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){
				disableZoom();
			}        	
        }
		else if( !enabled ){
			restoreZoom();
        }
    }
	
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );

})( this );


( function($) {

$.fn.fwTabs = function(options){

	var settings = $.extend({}, $.fn.fwTabs.defaults, options);
	var active = 0;
	
	var tabs = $(this);
		
	$('.nav-tab li', tabs ).click( function(){
		idx = $(this).index();
		if ( idx == $('.nav-tab li.tab-active', tabs ).index() ) return false;
		startTab(tabs, idx);
		return false;
	});
	//resizeTab($(this));
	//$(window).resize( function(){ resizeTab(tabs); } );
	
	function startTab(tabs, idx){
		$('.active', tabs).fadeOut().removeClass('active').addClass('hide');
		$('.tab-content', tabs).eq(idx).removeClass('hide').addClass('active').fadeIn();
		$('li.tab-active', tabs).removeClass('tab-active');
		$('.nav-tab li', tabs).eq(idx).addClass('tab-active');
	}
	
	function resizeTab(tabs){
		$('.nav-tab li', tabs).css({'padding-left':'0px', 'padding-right':'0px'});
		total = tabs.width();
		firstTab = $('.nav-tab li', tabs).eq(0).width();
		secondTab = $('.nav-tab li', tabs).eq(1).width()-1;
		thirdTab = $('.nav-tab li', tabs).eq(2).width()-1;
		totalTab = firstTab + secondTab + thirdTab;
		thePad = ( total - totalTab ) / 6;
		//alert(totalTab + ' - ' + total + ' - ' + thePad)
		
		if ( total >= totalTab ){
			//$('.nav-tab li', tabs).css({'padding-left' : + thePad + 'px', 'padding-right': + thePad + 'px'});
		}
	}

}

$.fn.fwCarousel = function(options) {

	defaults = {
		autoPlay: false,
		delay: 5000,
		onScreen: 1,
		fixedHeight: true
	};

	$.extend( defaults, options );
	var settings = defaults; 

	var active = 1;
	var carousel = $(this);
	var numberItem = $('.item', carousel).length;
	
	if ( numberItem <= settings.onScreen ){
		$('.slider-prev, .slider-next', carousel).hide();
	}

	$('.slider-prev', carousel).click( function(){
		if ( active > 1 ) carouselSlide( active - 1 ) ;
		return false;
	});

	$('.slider-next', carousel).click( function(){
		if ( active < ( numberItem - ( settings.onScreen - 1 ) ) ) carouselSlide( active + 1 ) ;
		else carouselSlide( 1 ) ;
		//alert(active + ' - ' + numberItem );
		return false;
	});
	
	$('.nav-index', carousel).click( function(){
		var ths = $(this);
		//clearInterval(timer);
		//timer = '';
		step = $('.custom-loop nav .nav-index', carousel ).index(ths) + 1 ;
		if ( active != step ){
			carouselSlide(step);
		}
		return false;
	});

	$(window).resize( function(){
		carouselSlide(active);
	});
	
	var timer = 0;
	if ( settings.autoPlay ){
		timer = setInterval( function() { 
								if ( active < ( numberItem - ( settings.onScreen - 1 ) ) ) 
									carouselSlide(active + 1); 
								else
									carouselSlide(1);
							}, settings.delay );
	}

	function carouselSlide( idx ){
		padding = $('.item', carousel).eq(active).css('paddingRight');
		if ( typeof padding == 'undefined' ) padding = '0px';
		padding = padding.replace('px','') * 2;
		margin = ($('.item', carousel).eq(active - 1).width() + padding + 1) * (idx - 1);
		$('.loop-items', carousel).animate({ marginLeft: '-' + margin + 'px'} );

		active = idx;
		$('.active-index', carousel ).removeClass('active-index');
		$('.nav-index', carousel ).eq(active - 1).addClass('active-index');
	}
}

})( jQuery );