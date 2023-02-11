$('.header-slider').slick({
  autoplay: true,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});



$(document).on('mouseover', 'div.product-item', function (e) {
  $('.product-item').removeClass('product-item-active')
  $(this).addClass('product-item-active')
});

$(document).ready(function () {
  let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
  $(window).scroll(function (event) {
    var pos_body = $('html,body').scrollTop();
    // console.log(pos_body);
    if (pos_body > 100) {
      $('#header_top').css('position', 'fixed');
      $('#header_top').css('z-index', '99');
      if (!isMobile) {
        $('#header_bottom').hide();
      }

    }
    else {
      $('.menu').removeClass('co-dinh-menu');
      if (!isMobile) {
        $('#header_bottom').show();
      }

    }
    if (pos_body > 500) {
      $('.back-top').fadeIn(500);
    } else {
      $('.back-top').fadeOut(500);
    }
  });
  $('.back-top').click(function (event) {
    $('html,body').animate({ scrollTop: 0 }, 1400);
  });

  $('body #header_mobile .header-mobile .mb-button').click(function () {
    $('body #header_mobile nav').toggleClass('nav-show')
    $('body #header_mobile .header-mobile .mb-button .fa-bars').toggleClass('icon-show')
    $('body #header_mobile .header-mobile .mb-button .fa-times').toggleClass('icon-show')
  })
});

$("#cate_slider").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
});




$('.previews').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.sider-full',
  dots: true,
  centerMode: true,
  focusOnSelect: true,
  vertical: false,
  initialSlide: 0,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        initialSlide: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2,
        autoplay: true
      }
    }
  ]
});

$(document).ready(function(){

  $('.sider-full').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.previews'
  });

  new WOW().init();
})




