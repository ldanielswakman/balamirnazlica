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
  $(".owl-carousel").each(function() {
    
    $autoplay = ($(this).attr('data-autoplay') == 'true') ? true : false;

    $(this).owlCarousel({
      items: 1,
      // autoWidth: true,
      nav: true,
      dots: false,
      video: true,
      autoplay: $autoplay,
      autoplayTimeout: 6000,
      lazyLoad: true,
      URLhashListener: true,
      startPosition: 'URLHash',
      navText: ['', '']
    });
  });
  $(".owl-carousel").on('changed.owl.carousel', function(event) {
      stopVideos();
  })
});




// Picture thumbnail to theatre
$(document).ready(function() {
  $('.category-index__item').click(function(e) {
    $('.theatre--overlay').addClass('isActive');
    scrollToTheatre();
  });
});

function scrollToTheatre() {
  $.smoothScroll({
    speed: 800,
    scrollTarget: $('#theatre'),
    afterScroll: function() {

      // if video, start playing
      $hash = window.location.hash.replace('#', '');
      $activeSlide = $('.theatre__slide[data-hash="' + $hash + '"]');

      if ($activeSlide.find('figure').hasClass('figure--video')) {
        playVideo( $activeSlide.find('figure') );
      }
    }
  });
}

function playVideo($figure) {

  console.log('play video...');
  $figure.find('.owl-video-play-icon').click();

  // disable autoplay when video is playing
  console.log('disabling carousel autoplay');
  $figure.closest('.owl-carousel').owlCarousel({ autoplay: false });
}

function stopVideos() {
  $('#theatre').find('figure').removeClass('video--isActive');
  $('#theatre').find('iframe').attr('src', '');

  // restart disabled autoplay when video stops
  // $('.owl-carousel[data-autoplay="true"]').reinit({ autoplay: true });
}




// Close Theatre
function closeTheatre() {
  $('.theatre--overlay').removeClass('isActive');
  stopVideos();
}




// Close Banner
function closeBanner() {
  $('.banner').addClass('isHidden');
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




// Update URL hash
function updateHash(href) {
  if(history.pushState) {
    history.pushState(null, null, href);
  }
  else {
    location.hash = href;
  }
}










// ----------- *** ----------- //

// Contact form: contact form interactions
$(document).ready(function() {

  // Async form submit
  $('form.contact-form').on('submit', function(e) {
    e.preventDefault();
    postContactForm( $(this) );
  });

});

// Contact form: post form
function postContactForm(form_obj) {
  // Defining variables
  $active_form = form_obj;
  url = $active_form.attr('action');
  form_data = $active_form.serialize();
  $errors_container = form_obj.find('.contact-form__errors');

  // Remove previous states & errors
  $errors_container.html('');
  $active_form.find('input, textarea').removeClass('field--error');
  $active_form.addClass('isProgress');

  console.log(form_data);

  $.post(url, form_data, function(data) {
    
    console.log(data);

    $active_form.removeClass('isProgress');
    if(data.success === true) {
      
      $active_form.addClass('isSuccess');

    } else {

      $html = '';
      $.each(data.errors, function(i, j) {
        $active_form.find('[name="'+i+'"]').addClass('field--error');
        $html += '- ' + data.errors[i] + '<br>';
      });
      if(data.code === 500) {
        $html += 'Something went wrong — please try again later.';
      }
      $errors_container.html($html);

    }
  });
}