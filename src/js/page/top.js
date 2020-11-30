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
popup();
function popup(){
  $('.popup__nav--next').click( function(){
    var current = $('.popup__cont .popup__cont--item.active').index();
    if(current<2){
      current = current+1;
      $('.popup__cont .popup__cont--item:eq('+current+')').addClass('active').siblings().removeClass('active');
    }else{
      current = 0;
      $('.popup__cont .popup__cont--item:eq(0)').addClass('active').siblings().removeClass('active');
    }
    $('.popup__cap').text((current+1)+' / 3');
  });
  $('.popup__nav--prev').click( function(){
    var current = $('.popup__cont .popup__cont--item.active').index();
    if(current>0){
      current = current-1;
      $('.popup__cont .popup__cont--item:eq('+current+')').addClass('active').siblings().removeClass('active');
    }else{
      current = 2;
      $('.popup__cont .popup__cont--item:eq(2)').addClass('active').siblings().removeClass('active');
    }
    $('.popup__cap').text((current+1)+' / 3');
  });
  // $(".js-popup").on("click", function(e){
  //   if (e.target !== this)
  //     return;
  //   $('.btn_close').trigger('click');
  // });
}
$('body').on('click', '.btn_close', function(){
  $('body').removeClass('menu-open');
  rescroll = $('body').css('top').replace(/-|px/g, '');
  $('body,html').scrollTop(rescroll);
  $('.popup').fadeOut();
  // $('.popup__cont .popup__cont--item:eq(0)').addClass('active').siblings().removeClass('active');

});
$('.c-news .c-news__lst--item').click( function(){
  var _id = $(this).attr('data-id');
  $.ajax({
    method: 'POST',
    url: _url+"/libs/ajax-news.php",  
    dataType: 'json',
    data: {
      id: _id,
    },
    success: function(data){
      $('.popup-new').html('');
      $('.popup-new').append(data.html).fadeIn();
      $('body').addClass('menu-open');
      $('body').css('top', -st);
      $('.btn_close_new').click( function(){
        $('.popup-new').fadeOut();
        $('body').removeClass('menu-open');
        if ($('body').hasClass('menu-open') === false) {
            rescroll = $('body').css('top').replace(/-|px/g, '');
            $('body,html').scrollTop(rescroll);
        } else {
            $('body').css('top', -st);
        }
      });
    },
  });
});