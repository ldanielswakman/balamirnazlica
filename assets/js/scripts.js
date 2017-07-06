$(document).ready(function() {

  // adding isLoaded body class
  setTimeout(function() { $('body').addClass('isLoaded'); }, 500);

  // initiating smooth scroll
  $('a[href^="#"]').smoothScroll({
    speed: 800,
    afterScroll: function() {
      updateHash($(this).attr('href'));
    }
  });
  
});




// Sticky Kit
$(document).ready(function() {
  $('.js-stick-in-parent').stick_in_parent();
  $('.js-stick-in-body').stick_in_parent({ parent: 'body' });
});



// Owl Carousel
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    items: 1,
    autoWidth: true,
    nav: true,
    dotsEach: 1,
    autoplay: true,
    autoplayTimeout: 6000,
    lazyload: true,
    URLhashListener: true,
    startPosition: 'URLHash',
    navText: ['', '']
  });
});







// Picture thumbnail to theatre
function scrollToTheatre() {
  $.smoothScroll({ speed: 400, scrollTarget: $('#theatre') });
}






// Scroll Actions
$(document).ready(function() {
  lastScrollY = 0;
  ticking = false;
  $selector = $('.js-prlx');
  speedDivider = 2;
});
$(document).on('scroll', function() { doScroll(); });

function doScroll() {
  lastScrollY = window.pageYOffset;
  factor = 0.5;
  requestTick();
};
function requestTick() {
  if (!ticking) {
    window.requestAnimationFrame(updatePosition);
    ticking = true;
  }
};
function updatePosition() {
  scrollMiddle = lastScrollY + $(window).height()/2;

  $selector.each(function() {
    thisMiddle = $(this).offset().top + $(this).outerHeight()/2;
    thisFactor = ($(this).attr('data-prlx-factor')) ? $(this).attr('data-prlx-factor') : factor;
    diff = (scrollMiddle - thisMiddle) * thisFactor;

    translateY3d($(this), diff);
  });
  // style="position: relative; transition: all 0.01s ease"

  ticking = false;
};

function translateY3d($obj, value) {
  var translate = 'translate3d(0px,' + value + 'px, 0px)';
  $obj.css('-webkit-transform', translate);
  $obj.css('-moz-transform', translate);
  $obj.css('-ms-transform', translate);
  $obj.css('-o-transform', translate);
  $obj.css('transform', translate);
};
