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
    // variableWidth: true,
    // adaptiveHeight: true,
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
      // window.history.pushState({path:_url+'studio/'},'',_url+'studio/?area='+area);
    },
    complete: function(){
      $('#list-studio').css({"opacity": 1});
    }
  });
};
