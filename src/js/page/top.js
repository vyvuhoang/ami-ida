///===================
var eff = ".fade";
$(document).ready(function() {
  window.sr = ScrollReveal();
  ScrollReveal().reveal(eff,{
    duration: 600,
    distance: '50px',
    origin: 'bottom',
    opacity: 0,
    easing: 'ease-in-out',
    useDelay: 'onload',
    delay:500,
    reset: true,
  });
});
slider();
faq();
function slider(){
  $('.js-voice-slider').slick({
  	infinite: true,
    speed: 10000,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: 'linear',
    slidesToShow: 2.75,
    arrows: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          centerMode: true,
          centerPadding: '40px',
        }
      },
    ]
  })
}
$(document).ready(function(){
  $('.teacher__lst').slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    arrows: false,
    dots: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          infinite: true,
          slidesToShow: 1,
          centerMode: true,
          infinite: true,
          centerPadding: '30px',
        }
      },
    ]
  });
  calcHeight('.teacher__lst--item .info .txt', 3, 3 );
  calcHeight('.media__lst--item .info .txt', 3, 3 );
  if($(window).width() < 768){
    $('.c-voice__item--mess .btn-more p').click( function(){
      $(this).parent().prev().slideDown();
      $(this).parent().fadeOut();
    });
    $('.media__lst').slick({
      infinite: true,
      slidesToShow: 1,
      centerMode: true,
      infinite: true,
      centerPadding: '30px',
      arrows: false,
      dots: true,
    });
  }
});
function faq(){
  $('.js-lst-faq .item:first-child').addClass('active').find('.js-ans').slideToggle();
  $('body').on('click', '.js-ques', function(){
    $(this).siblings('.js-ans').slideToggle()
    .parent().toggleClass('active');
  })
};
$('.studio__select select').change( function(){
  var area = $(this).val();
  getAjax(area,'');
});
function getAjax(area,key){
  $('#list-studio').css({"opacity": 0});
  $.ajax({
    method: 'POST',
    url: _url+"/libs/ajax-studio-archive.php", 
    dataType: 'json',
    data: {
      area: area,
      key: key,
    },
    success: function(data){
      console.log(data);
      $('#list-studio').html('');
      $('#list-studio').append(data.html);
    },
    complete: function(){
      $('#list-studio').css({"opacity": 1});
    }
  });
};
