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





// Owl Carousel
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    items: 1,
    autoWidth: true,
    nav: false,
    dotsEach: 1,
    autoplay: true,
    autoplayTimeout: 6000,
    lazyload: true,
    URLhashListener: true,
    startPosition: 'URLHash'
  });
});





// Picture thumbnail to theatre
$(document).ready(function() {
  $('.image-stack a').click(function(e) {
    $.smoothScroll({ speed: 800, scrollTarget: $('#theatre') });
  });
});
function scrollToTheatre() {
  $.smoothScroll({ speed: 400, scrollTarget: $('#theatre') });
}
