// 
function getHeaderHeight() {
  var h = 0;
  if ($('body').hasClass('no_hd') || $('body').hasClass('no_fixed_hd')) {
    h = 0;
  } else {
    if ($(window).width() < 768) {
      h = 60;
    } else {
      h = 80;
    }
  }
  return h;
}

function IEdetection() {
  var ua = window.navigator.userAgent;
  var msie = ua.indexOf('MSIE ');
  if (msie > 0) {
    // IE 10 or older, return version number
    return ('IE ' + parseInt(ua.substring(
    msie + 5, ua.indexOf('.', msie)), 10));
  }
  var trident = ua.indexOf('Trident/');
  if (trident > 0) {
    // IE 11, return version number
    var rv = ua.indexOf('rv:');
    return ('IE ' + parseInt(ua.substring(
    rv + 3, ua.indexOf('.', rv)), 10));
  }
  var edge = ua.indexOf('Edge/');
  if (edge > 0) {
    //Edge (IE 12+), return version number
    return ('IE ' + parseInt(ua.substring(
    edge + 5, ua.indexOf('.', edge)), 10));
  }
  // User uses other browser
  return ('Not IE');
}
function GoogleFontLoader() {
  WebFontConfig = {
    google: { families:['Noto+Serif+JP:wght@400;500;600','Sawarabi+Mincho&display=swap&subset=japanese']},
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
}
var offset_menu = 0;
$(window).bind("load resize",function(e){
  $('a[href^="#"]').on('click', function (e) {
  var widthwin = $( window ).width();
  var headerh = getHeaderHeight();
  e.preventDefault();
  var target = this.hash,
    $target = $(target);
    if ($target.length > 0) {
      $('html, body').stop().animate({
        'scrollTop': $target.offset().top - headerh
      }, 300, 'swing', function () {});
    }
  });
});

// Add rel 'noopener' and 'noreferrer' for a with _blank target to prevent security rish
$('a')
.filter('[href^="http"], [href^="//"]')
.not('[href*="' + window.location.host + '"]')
.attr('rel', 'noopener')
.not('.trusted')
.attr('target', '_blank');

$(window).bind("load",function(e){
  var widthwin = $( window ).width();
  var headerh = getHeaderHeight();
  var str = location.hash;
  if(str != '' && $(str).length != 0) {
    var n = str.replace("_temp","");
    $('html,body').stop().animate({scrollTop:$(n).offset().top - headerh}, 300);
  }
  if ($(window).scrollTop() > offset_menu && $('body').hasClass('no_hd') === false) {
    $('.header,body').addClass('fixed');
  }
});

Pace.on("done", function() {
  if ($('.lazy').length > 0) {
    var ll = new LazyLoad({
      elements_selector: ".lazy",
      threshold: 0,
    });
  }
});