<?php
$thisPageName = 'top';
include_once(dirname(__FILE__) . '/app_config.php');
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/top.min.css">
</head>
<body id="top" class='top'>
<!-- HEADER -->
<?php include(APP_PATH.'libs/header.php'); ?>
<main id="wrap">
	<div class="visual">
		<div class="bg" data-parallax='{"y": -70, "smoothness": 10}'></div>
		<div class="visual">
			<div class="visual__scroll">
				<a href="#intro" class="visual__scroll--btn"><span>scroll</span></a>
			</div>
			<div class="visual__txt">
		   	<picture>
   	      <source srcset="<?php echo APP_ASSETS; ?>img/common/visual_txt_sp.svg" media="(max-width: 767px)">
   	      <img src="<?php echo APP_ASSETS; ?>img/common/visual_txt.svg" alt="Amiida">
		   	</picture>
			</div>
		</div>
	</div>
	<div class="intro wcm">
		<div class="intro__img">
			<img src="<?php echo APP_ASSETS; ?>img/top/img_intro.png" alt="">
		</div>
		<div class="intro__info">
			<h3 class="intro__info--ttl">Title title title title title title title title title</h3>
			<p class="intro__info--txt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキ</p>
			<a href="" class="c-btn pc">View more</a>
		</div>
		<a href="" class="c-btn sp">View more</a>
	</div>
	<div class="anchor">
		<div class="wcm">
			<a href="<?php echo APP_URL; ?>amiida_life/" class="anchor__item lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/anchor01.jpg)">
				<span class="inner">
					<p class="anchor__item--ttl">アミーダのある生活</p>
					<p class="anchor__item--txt">Ami-ida life</p>
				</span>
			</a>
			<a href="#feature" class="anchor__item lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/anchor02.jpg)">
				<span class="inner">
					<p class="anchor__item--ttl">溶岩ホットヨガの特徴</p>
					<p class="anchor__item--txt">Features</p>
				</span>
			</a>
			<a href="<?php echo APP_URL; ?>studio/" class="anchor__item lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/anchor03.jpg)">
				<span class="inner">
					<p class="anchor__item--ttl">お近くのスタジオを探す</p>
					<p class="anchor__item--txt">Studio</p>
				</span>
			</a>
		</div>
	</div>
	<div class="c-news">
		<div class="wcm">
			<p class="c-news__ttl">NEWS</p>
			<div class="c-news__lst">
				<a href="" class="c-news__lst--item">
					<p class="date">2020/10/10</p>
					<p class="cat"><em>お知らせ</em></p>
					<p class="ttl"><em>【本社へのお問合せにつきまして】【本社へのお問合せにつきまして】【本社へのお問合せにつきまして】【本社へのお問合せにつきまして】</em></p>
				</a>
				<a href="" class="c-news__lst--item">
					<p class="date">2020/10/09</p>
					<p class="cat"><em>お知らせ</em></p>
					<p class="ttl"><em>【本社へのお問合せにつきまして】</em></p>
				</a>
				<a href="" class="c-news__lst--item">
					<p class="date">2020/10/08</p>
					<p class="cat"><em>お知らせ</em></p>
					<p class="ttl"><em>【本社へのお問合せにつきまして】</em></p>
				</a>
			</div>
			<div class="c-news__btn">
				<a href="" class="btn-viewmore">View more</a>
			</div>
		</div>
	</div>
	<div class="feature wcm" id="feature">
		<h3 class="the-title">体験レッスン受付中の<br class="sp">スタジオ一覧</h3>
		<div class="feature__lst">
			<?php for($i=0;$i<4;$i++){ ?>
			<div class="feature__lst--item">
				<img src="<?php echo APP_ASSETS; ?>img/top/feature<?php echo $i+1; ?>.jpg" alt="">
				<p class="ttl">ここに新しく打ち出すアミーダの特徴が入りま</p>
				<p class="txt">ここに新しく打ち出すアミーダの特徴が入ります。<br>ここに新しく打ち出すアミーダの特徴が入ります。<br>ここに新しく打ち出すアミーダの特徴が入ります。</p>
			</div>
		<?php } ?>
		</div>
	</div>
	<div class="slide">
		<h3 class="the-title wcm">アミーダの溶岩ホットヨガを選ぶお客様のお声</h3>
		<div class="slide__img js-voice-slider">
			<?php for($i=0;$i<3;$i++){ ?>
		  <div class="item" style="background-image: url(<?php echo APP_ASSETS; ?>img/top/slide.jpg);"></div>
			<?php } ?>
		</div>
		<div class="wcm">
		  <?php include(APP_PATH.'libs/voice.php'); ?>
		</div>
	</div>
	<div class="sec-btns">
    <div class="wcm">
      <a href="" class="btn"><span>WEB入会金受付はこちら</span></a>
      <a href="" class="btn"><span>体験レッスンへのご参加はこちら</span></a>
    </div>
  </div>
  <!-- <div class="teacher wcm">
  	<h3 class="the-title">アミーダ溶岩ホットヨガの特徴</h3>
  </div> -->
  <div class="studio wcm">
  	<h3 class="the-title">体験レッスン受付中の<br class="sp">スタジオ一覧</h3>
  	<p class="studio__txt">※店舗により体験内容・キャンペーン内容が異なります。<br>詳細は、 各店舗ページをご覧ください。</p>
  	<div class="studio__select">
  		<select>
  			<option value="">新着順</option>
  		</select>
  	</div>
  	<div class="lst-studio">
  		<?php for($i=0;$i<6;$i++){ ?>
  		<div class="lst-studio__item">
  			<div class="lst-studio__item--map">
  				<iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3238.605264550298!2d139.74549521541584!3d35.735925334577544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d95d35120db%3A0x434152d2c43fa62e!2s1-ch%C5%8Dme-38-2%20Komagome%2C%20Toshima%20City%2C%20Tokyo%20170-0003%2C%20Japan!5e0!3m2!1sen!2s!4v1605334591523!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  			</div>
  			<div class="lst-studio__item--info">
  				<p class="ttl">スタジオタイトル</p>
  				<p class="txt">〒170-0003<br>東京都豊島区駒込1-38-2<br>駒込TRビル4階<br>TEL：03-5981-9027<br>FAX：03-5981-9028</p>
  				<div class="btn">
  					<a href="" class="btn-detail">店舗ページへ</a>
  					<a href="" class="btn-location">地図をみる</a>
  				</div>
  			</div>
  		</div>
  		<?php } ?>
  	</div>
  </div>
	<?php include(APP_PATH.'libs/faq.php'); ?>
</main>
<?php include(APP_PATH.'libs/footer.php'); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo APP_ASSETS ?>js/page/top.min.js"></script>
</body>
</html>