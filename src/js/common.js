var ParallaxScroll={showLogs:!1,round:1e3,init:function(){if(this._log("init"),this._inited)return this._log("Already Inited"),void(this._inited=!0);this._requestAnimationFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(a,t){window.setTimeout(a,1e3/60)},this._onScroll(!0)},_inited:!1,_properties:["x","y","z","rotateX","rotateY","rotateZ","scaleX","scaleY","scaleZ","scale"],_requestAnimationFrame:null,_log:function(a){this.showLogs&&console.log("Parallax Scroll / "+a)},_onScroll:function(X){var Y=$(document).scrollTop(),Z=$(window).height();this._log("onScroll "+Y),$("[data-parallax]").each($.proxy(function(a,t){var i=$(t),o=[],c=!1,e=i.data("style");null==e&&(e=i.attr("style")||"",i.data("style",e));var l,s=[i.data("parallax")];for(l=2;i.data("parallax"+l);l++)s.push(i.data("parallax-"+l));var n=s.length;for(l=0;l<n;l++){var u=s[l],d=u["from-scroll"];null==d&&(d=Math.max(0,$(t).offset().top-Z)),d|=0;var r=u.distance,m=u["to-scroll"];null==r&&null==m&&(r=Z),r=Math.max(0|r,1);var h=u.easing,p=u["easing-return"];if(null!=h&&$.easing&&$.easing[h]||(h=null),null!=p&&$.easing&&$.easing[p]||(p=h),h){var v=u.duration;null==v&&(v=r),v=Math.max(0|v,1);var w=u["duration-return"];null==w&&(w=v),r=1;var g=i.data("current-time");null==g&&(g=0)}null==m&&(m=d+r),m|=0;var x=u.smoothness;null==x&&(x=30),x|=0,(X||0==x)&&(x=1),x|=0;var f=Y;f=Math.max(f,d),f=Math.min(f,m),h&&(null==i.data("sens")&&i.data("sens","back"),d<f&&("back"==i.data("sens")?(g=1,i.data("sens","go")):g++),f<m&&("go"==i.data("sens")?(g=1,i.data("sens","back")):g++),X&&(g=v),i.data("current-time",g)),this._properties.map($.proxy(function(a){var t=0,e=u[a];if(null!=e){"scale"==a||"scaleX"==a||"scaleY"==a||"scaleZ"==a?t=1:e|=0;var l=i.data("_"+a);null==l&&(l=t);var s=(f-d)/(m-d)*(e-t)+t,n=l+(s-l)/x;if(h&&0<g&&g<=v){var r=t;"back"==i.data("sens")&&(e=-(r=e),h=p,v=w),n=$.easing[h](null,g,r,e,v)}(n=Math.ceil(n*this.round)/this.round)==l&&s==e&&(n=e),o[a]||(o[a]=0),o[a]+=n,l!=o[a]&&(i.data("_"+a,o[a]),c=!0)}},this))}if(c){if(null!=o.z){var _=u.perspective;null==_&&(_=800);var y=i.parent();y.data("style")||y.data("style",y.attr("style")||""),y.attr("style","perspective:"+_+"px; -webkit-perspective:"+_+"px; "+y.data("style"))}null==o.scaleX&&(o.scaleX=1),null==o.scaleY&&(o.scaleY=1),null==o.scaleZ&&(o.scaleZ=1),null!=o.scale&&(o.scaleX*=o.scale,o.scaleY*=o.scale,o.scaleZ*=o.scale);var A="translate3d("+(o.x?o.x:0)+"px, "+(o.y?o.y:0)+"px, "+(o.z?o.z:0)+"px)"+" "+("rotateX("+(o.rotateX?o.rotateX:0)+"deg) rotateY("+(o.rotateY?o.rotateY:0)+"deg) rotateZ("+(o.rotateZ?o.rotateZ:0)+"deg)")+" "+("scaleX("+o.scaleX+") scaleY("+o.scaleY+") scaleZ("+o.scaleZ+")")+";";this._log(A),i.attr("style","transform:"+A+" -webkit-transform:"+A+" "+e)}},this)),window.requestAnimationFrame?window.requestAnimationFrame($.proxy(this._onScroll,this,!1)):this._requestAnimationFrame($.proxy(this._onScroll,this,!1))}};
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
$(document).ready(function() {
  ParallaxScroll.init();
});