var calendar = $('.js-calendar'),
    schedule = $('.js-schedule');
$(document).ready(function () {
  slider();
  faq();
  price();
  ajaxSchedule();
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

function deleteEmptyRow(){
  var num_lesson = $('.js-calendar .col:first-child').find('.lesson').length,
      num_col = $('.js-calendar .col').length;
  for(i=1;i<=num_lesson;i++){
    j = 0;
    $('.js-calendar .col').each(function(){
      if($(this).find('.lesson:nth-child('+i+')').html() == ''){
        j++;
      }
    })
    if(j==num_col){
      $('.js-calendar .col .lesson:nth-child('+i+')').remove();
    }
  }
}

function getAjax(_post_id, _date_start){
  $.ajax({
    method: 'GET',
    url: location.origin+'/libs/ajax-studio-schedule.php',
    dataType: 'json',
    data: {
      post_id: _post_id,
      date_start: _date_start,
    },
  }).success(function(data) {
    schedule.html(data.html);
  }).error(function (xhr, ajaxOptions, thrownError) {
    console.log(xhr.status);
    console.log(thrownError);
  }).done(function(){
    $('.js-calendar .lesson').matchHeight({byRow: false});
    deleteEmptyRow();
  })
}
function get7DaysBefore(_d){
  var days = 7; // Days you want to subtract
  var date = new Date(_d);
  var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
  var day = last.getDate();
  var month = last.getMonth()+1;
  var year = last.getFullYear();
  return year+'/'+month+'/'+day;
}

function get7DaysAfter(_d){
  var days = 7; // Days you want to subtract
  var date = new Date(_d);
  var last = new Date(date.getTime() + (days * 24 * 60 * 60 * 1000));
  var day = last.getDate();
  var month = last.getMonth()+1;
  var year = last.getFullYear();
  return year+'/'+month+'/'+day;
}

function ajaxSchedule(){
  getAjax(_post_id, _date);
  $('body').on('click', '.js-prev', function(){
    _date = get7DaysBefore(_date);
    getAjax(_post_id, _date);
  })
  $('body').on('click', '.js-next', function(){
    _date = get7DaysAfter(_date);
    getAjax(_post_id, _date);
  })
}