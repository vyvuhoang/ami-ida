$(document).ready(function(){
  $('.scroll-to-concept').click(function(){
     var speed = 400; // ミリ秒
     var target = $('#concept');
     var position = target.offset().top;
     // スムーススクロール
     $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
});
$(window).scroll(function () {
  var windowHeight = $('.fader-wrapper').innerHeight();
  var scrollTop = $(this).scrollTop();
  console.log('scroll: ' + scrollTop);

  $('.slideup').each(function(i, e){
    var top = $(e).attr('data-scroll-top');
    if (scrollTop > top) {
      $(e).addClass('show');
    }
    else {
      //$(e).removeClass('show');
    }
  });
  $('.clip-to-scroll').each(function(i, e){
    var top = $(e).attr('data-scroll-top');
    if (scrollTop > top) {
      $(e).attr('class', 'clip-to-scroll show');
    }
    else {
      //$(e).attr('class', 'clip-to-scroll');
    }
  });
  if (scrollTop > 500) {
    $('.btn-fixed-skip>h4').removeClass('hidden').addClass('twincle');
    $('.btn-fixed-skip>h1').addClass('hidden').removeClass('twincle');
  }
  else {
    $('.btn-fixed-skip>h4').removeClass('twincle').addClass('hidden');
    $('.btn-fixed-skip>h1').removeClass('hidden').addClass('twincle');
  }
});

$(window).scroll(function () {
	var scrollTop = $(this).scrollTop();
//	console.log('windowH: ' + windowH + ', scrollTop: ' + scrollTop);
	if (scrollTop >= 200) {
		$('.navbar-fixed').addClass('show');
	}
	else {
		$('.navbar-fixed').removeClass('show');
	}
});

$(function(){
	$('.ic-hover-thumbnail.sm').hover(
		function(e){
			var url = $(this).css('background-image');
			console.log(url);
			$('.ic-hover-thumbnail.lg').css('background-image', url);
		},
		function(e){
			console.log('hover out!');
		}
	);
})
