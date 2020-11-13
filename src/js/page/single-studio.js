$(function(){
  slider();
  faq();
  price();
})

function slider(){
  $('.js-voice-slider').slick({
    speed: 10000,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: 'linear',
    slidesToShow: 2.75,
    arrows: false,
    responsive: [
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1.5,
        }
      },
    ]
  })
}

function faq(){
  $('.js-lst-faq .item:first-child').addClass('active').find('.js-ans').slideToggle();
  $('body').on('click', '.js-ques', function(){
    $(this).siblings('.js-ans').slideToggle()
    .parent().toggleClass('active');
  })
}

function price(){
  $('.js-lst-price .item:first-child').addClass('active').find('.js-price-tbl').slideToggle();
  $('body').on('click', '.js-price-ttl', function(){
    $(this).siblings('.js-price-tbl').slideToggle()
    .parent().toggleClass('active');
  })
}