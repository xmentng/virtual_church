if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
	var msViewportStyle = document.createElement('style')
	msViewportStyle.appendChild(
		document.createTextNode(
			'@-ms-viewport{width:auto!important}'
		)
	)
	document.querySelector('head').appendChild(msViewportStyle)
}



$( document ).ready(function() {
	$('#getting-started').countdown('2015/12/25', function(event) {
	var $this = $(this).html(event.strftime(''
		// + '<span>%m</span> Months, '
		+ '<span>%d</span> Days, '
		+ '<span>%H</span> hrs, '
		+ '<span>%M</span> mins, '
		+ '<span>%S</span> sec '));
	});



	$(function() {
		$( ".datepicker, .calendar" ).datepicker();
	});
	    $( ".donation" ).slideUp();
		$( ".map" ).slideUp();
		$( "#search-form" ).slideUp();
	$( ".map-close" ).click(function(e) {
		e.preventDefault();
		$( ".donation" ).slideUp();
	});
	$( ".donation" ).slideUp();
		$( ".donation" ).slideUp();
		$( "#search-form" ).slideUp();
	$( ".search-opener" ).click(function(e) {
		e.preventDefault();
		$( ".donation" ).slideUp();
		$( ".donation" ).slideUp();
		$( "#search-form" ).slideDown();
	});
	$( ".donation-opener" ).click(function(e) {
		e.preventDefault();
		$( "#search-form" ).slideUp();
		$( ".donation" ).slideUp();
		$( ".donation" ).slideDown();
	});
	$( ".map-opener" ).click(function(e) {
		e.preventDefault();
		$( ".donation" ).slideUp();
		$( "#search-form" ).slideUp();
		$( ".map" ).slideDown();
	});
	$(".page-info, .header-holder, #main").click(function(e) {
		//e.preventDefault();
		$( ".donation" ).slideUp();
		$( ".donation" ).slideUp();
		$( "#search-form" ).slideUp();
	});
});

// parallax
$(document).ready(function(){
   $('.parallax').scrolly({bgParallax: true});
   $('.parallax-main').scrolly({bgParallax: false});
   $('audio,video').mediaelementplayer();
    });


// back to top smooth scrolling
$(function() {
  $('.btn-top').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

$('.fancybox-buttons')
.attr('rel', 'media-gallery')
.fancybox({
	helpers : {
		media : {}
	}
});
