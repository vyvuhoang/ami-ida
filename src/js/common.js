/* headerMod */
$(window).on('scroll load', function(){
  if($(window).scrollTop() > 60) $("body").addClass('fixHeader');
  else $("body").removeClass('fixHeader');
});

// ==============MENU SP==============
$('.hamburger').on('click',function(){
  $(this).toggleClass('open');
  // $('.body').toggleClass('open');
  $('body').toggleClass('menu-open');
  if ($('body').hasClass('menu-open') === false) {
      rescroll = $('body').css('top').replace(/-|px/g, '');
      $('body,html').scrollTop(rescroll);
      $('.header__menu').fadeOut();
  } else {
      $('body').css('top', -st);
      $('.header__menu').fadeIn();
  }
});
var st, rescroll;
function scroll1() {
  st = $(this).scrollTop();
};
$(window).on('scroll load', function(){
  scroll1();
});