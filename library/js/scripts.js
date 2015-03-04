/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/
/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();
/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();
// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;
/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function








/* Put all your regular jQuery in here. */

jQuery(document).ready(function($) {

 
  /*
   * Fire the gravatar function, you can remove this if you don't need it
  */
  loadGravatars();


  $('.preheader-nav').find('li:first-child').addClass('themebutton login');
  $('.preheader-nav').find('li:first-child a').addClass('modal-login');
  $('.preheader-nav').find('li:first-child a').append( ' <span class="yellow"><i class="fa fa-chevron-circle-right"></i></span>' );

  // $('.preheader-nav').find('li').eq(0).addClass('themebutton login');
  // $('.preheader-nav').find('li').eq(0).find('a').addClass('modal-login').append(' <span class="yellow"><i class="fa fa-chevron-circle-right"></i></span>');



  // modal boxes - magnificpop init ************
  $('.modal-image').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  // $('.modal-video').magnificPopup({
  //   disableOn: 700,
  //   type: 'iframe',
  //   mainClass: 'mfp-fade',
  //   removalDelay: 160,
  //   preloader: false,
  //   fixedContentPos: false
  // });

  $('.modal-video').magnificPopup({
    disableOn: 0,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/',
          // index: 'youtu.be/',
          id: function(url) { 
            // var id = url.replace("http://youtu.be/", "");
            var id = url.replace("https://www.youtube.com/watch?v=", "");
            return id;
          },
          src: 'http://www.youtube.com/embed/%id%?rel=0'
        }
      }
    }
  });

  $('.modal-login').magnificPopup({
    type: 'inline',
    preloader: false
  });

//  https://www.youtube.com/watch?v=coSyGQI28eM?rel=0


  // Team Full Bio button on About Us page
  $('.about-team').on('click', '.fullBioBttn', function (event) {
    var $this = $(this),
        $bttnText = $this.find('span'),
        $bttnIcon = $this.find('.fa'),
        $bio = $this.prevAll('.teamBio'),
        $fullBio = $this.prev('.bioAll'),
        text = $bttnText.text();

    event.preventDefault();
    $bio.toggleClass('open');
    $fullBio.slideToggle(250);
    $bttnIcon.toggleClass('fa-chevron-circle-right fa-chevron-circle-up');
    $bttnText.text( text === 'Full Bio' ? 'Show Less' : 'Full Bio');
  });



$(function() {
  $('a[href*=#]:not([href=#])').not('.modal-login').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 78
        }, 1500);
        return false;
      }
    }
  });
});


$(window).scroll(function() {
    if ($(this).scrollTop() > 800) {
        $('.toTop').fadeIn();
    } else {
        $('.toTop').fadeOut();
    }
});


function initCycle() {
  var width = $(document).width(); // Getting the width and checking my layout
  if ( width < 480 ) {
    $('.logobox').cycle({
      fx: 'carousel',
      carouselFluid: true,
      speed: 500,
      manualSpeed: 400,
      slides: '> span',
      timeout: 3000,
      next: '.next-slide',
      prev: '.prev-slide',
      carouselVisible: 1,
      swipe: true,
      log: false
    });
  } else if ( width > 480 && width < 768 ) {  
    $('.logobox').cycle({
      fx: 'carousel',
      carouselFluid: true,
      speed: 500,
      manualSpeed: 400,
      slides: '> span',
      timeout: 3000,
      next: '.next-slide',
      prev: '.prev-slide',
      carouselVisible: 2,
      swipe: true,
      log: false
    });
  } else if ( width > 768 && width < 980 ) {  
    $('.logobox').cycle({
      fx: 'carousel',
      carouselFluid: true,
      speed: 500,
      manualSpeed: 400,
      slides: '> span',
      timeout: 3000,
      next: '.next-slide',
      prev: '.prev-slide',
      carouselVisible: 2,
      swipe: true,
      log: false
    });
  } else {
    $('.logobox').cycle({
      fx: 'carousel',
      carouselFluid: true,
      speed: 500,
      manualSpeed: 400,
      slides: '> span',
      timeout: 3000,
      next: '.next-slide',
      prev: '.prev-slide',
      carouselVisible: 5,
      swipe: true,
      log: false
    });
  }
}
initCycle();

function reinit_cycle() {
  var width = $(window).width(); // Checking size again after window resize
  if ( width < 480 ) {
    $('.logobox').cycle('destroy');
    reinitCycle(1);
  } else if ( width > 480 && width < 768 ) {
    $('.logobox').cycle('destroy');
    reinitCycle(2);
  } else if ( width > 768 && width < 980 ) {
    $('.logobox').cycle('destroy');
    reinitCycle(2);
  }
   else {
    $('.logobox').cycle('destroy');
    reinitCycle(5);
  }
}
function reinitCycle(visibleSlides) {
  $('.logobox').cycle({
    fx: 'carousel',
    carouselFluid: true,
    speed: 1000,
    manualSpeed: 400,
    slides: '> span',
    timeout: 10000,
    next: '.next-slide',
    prev: '.prev-slide',
    carouselVisible: visibleSlides,
    swipe: true,
    log: false
  });
}
var reinitTimer;
$(window).resize(function() {
  clearTimeout(reinitTimer);
  reinitTimer = setTimeout(reinit_cycle, 200); // Timeout limits the number of calculations   
});






}); /* end of as page load scripts */


