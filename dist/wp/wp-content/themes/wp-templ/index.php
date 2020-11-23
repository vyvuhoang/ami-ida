<?php
$thisPageName = 'top';
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
		<video muted="" autoplay="" playsinline="" loop><source src="<?php echo APP_ASSETS; ?>img/top/mainvisual.mp4"></video>
	  <div class="visual">
	    <div class="visual__scroll">
	      <a href="#breadcrumb" class="visual__scroll--btn"><span>scroll</span></a>
	    </div>
	    <div class="visual__txt">
	      <picture>
	        <source srcset="<?php echo APP_ASSETS; ?>img/common/visual_txt_sp.svg" media="(max-width: 767px)">
	        <img src="<?php echo APP_ASSETS; ?>img/common/visual_txt.svg" alt="Amiida">
	      </picture>
	    </div>
	  </div>
	</div>
	<div class="intro wcm" id="intro">
		<div class="intro__img">
			<img src="<?php echo APP_ASSETS; ?>img/top/img_intro.png" alt="">
		</div>
		<div class="intro__info">
			<h3 class="intro__info--ttl">アミーダは、全スタジオが天然溶岩石でつくられた「溶岩石ホットヨガスタジオ」です。<br>あなたの生活に真の美しさを。身体も心も綺麗で溢れる生活を、アミーダで始める。</h3>
		</div>
	</div>
	<div class="anchor">
		<div class="wcm">
			<a href="<?php echo APP_URL; ?>amiida_life/" class="anchor__item">
				<span class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/anchor01.jpg)"></span>
				<span class="inner">
					<p class="anchor__item--ttl">アミーダのある生活</p>
					<p class="anchor__item--txt">Ami-ida life</p>
				</span>
			</a>
			<a href="#feature" class="anchor__item">
				<span class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/anchor02.jpg)"></span>
				<span class="inner">
					<p class="anchor__item--ttl">溶岩ホットヨガの特徴</p>
					<p class="anchor__item--txt">Features</p>
				</span>
			</a>
			<a href="<?php echo APP_URL; ?>studio/" class="anchor__item">
				<span class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/anchor03.jpg)"></span>
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
		</div>
	</div>
	<div class="c-banner">
		<div class="wcm">
			<div class="img">
				<div class="js-popup pc"></div>
				<picture>
				  <source srcset="<?php echo APP_ASSETS; ?>img/top/bn_measures-sp.jpg" media="(max-width: 767px)">
				  <img src="<?php echo APP_ASSETS; ?>img/top/bn_measures.jpg" alt="">
				</picture>
				<a target="_blank" href="<?php echo APP_URL; ?>assets/img/top/measure.pdf" class="sp"></a>
			</div>
		</div>
	</div>
	<div class="feature1" id="feature">
		<div class="wcm">
			<h3 class="the-title">アミーダ溶岩ホット<br class="sp">ヨガの特徴</h3>
			<div class="feature1__lst">
				<div class="feature1__lst--item">
					<div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/feature1.jpg)"></div>
					<div class="info">
						<div class="inner">
							<p class="ttl">天然溶岩石を使用</p>
							<p class="txt">溶岩石の遠赤外線で身体の芯から自然に温めるので、呼吸もしやすく身体への負担も少ないです。<br>天然の溶岩石で温めるスタジオはミネラルとマイナスイオン、サラサラした大量の汗が噴き出します。</p>
						</div>
					</div>
				</div>
				<div class="feature1__lst--item">
					<div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/feature2.jpg)"></div>
					<div class="info">
						<div class="inner">
							<p class="ttl">未経験でも安心のプログラム</p>
							<p class="txt">良質で経験豊富なインストラクターが、個人のレベルや、一人一人のお悩みに適した「パーソナル型サポート」を実施。綺麗で通いやすい好立地なスタジオもご好評いただいております。</p>
						</div>
					</div>
				</div>
				<div class="feature1__lst--item">
					<div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/feature1.jpg)"></div>
					<div class="info">
						<div class="inner">
							<p class="ttl">”美”と”健康”への高い効果</p>
							<p class="txt">身体を内側から温め、基礎体温が上がるのが溶岩石ヨガの特徴です。美容・美肌やダイエットなどの効果だけでなく、生理痛、便秘、冷え性、肩こりなどの根本的な改善にも効果があります。</p>
						</div>
					</div>
				</div>
				<div class="feature1__lst--item">
					<div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/feature4.jpg)"></div>
					<div class="info">
						<div class="inner">
							<p class="ttl">心の健康とリラックス効果</p>
							<p class="txt">よくいただくお客様のお声として、「イライラしなくなった」「心が穏やかになった」「よく眠れるようになった」と言うお声があります。家庭や職場とは違う、もう一つの私の居場所として、生活の一部としてご利用いただいています。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sec-check">
		<div class="the-title wcm">アミーダはこんな方の<br class="sp">ライフスタイルを<br class="pc">整えるための、<br class="sp">溶岩ホットヨガスタジオです。</div>
		<div class="sec-check__bg">
			<div class="sec-check__bg--lst">
				<div class="wcm">
					<ul>
						<li>体型を維持したい！でも激しい運動をするのはつらい・・</li>
						<li>体質を改善したい！肌の調子や体調をすぐにこわしてしまう・・</li>
						<li>家事や育児で疲れた・・ストレスでイライラしてしまう日々・・</li>
						<li>仕事で不規則な食生活や生活リズムになりがち・・</li>
						<li>運動が得意ではないから、継続できたことがない・・</li>
						<li>肩こりや腰痛が酷く、在宅ワークなども増えてつらい・・</li>
						<li>ホットヨガの経験はあるけど、効果が感じられず長続きしなかった・・</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
  <div class="c-voice">
  	<div class="wcm">
			<h3 class="the-title wcm">アミーダの溶岩ホットヨガを選ぶお客様のお声</h3>
  		<?php include(APP_PATH.'libs/voice.php'); ?>
	  	<a href="<?php echo APP_URL; ?>studio" class="c-btn">お近くのスタジオを探す</a>
	  </div>
	</div>
  <?php $studioarea = array(
      'post_type'                => 'studio',
      'orderby'                  => 'id',
      'order'                    => 'DESC',
      'hide_empty'               => 1,
      'taxonomy'                 => 'studioarea' ,
      'pad_counts'              => false,
  );
  $categories = get_categories( $studioarea );?>
  <?php $studio = new WP_Query(array(        
    'post_type'       => 'studio',
    'showposts'       => 6,
    'post_status'     => 'publish',
    'orderby'         =>'date',
  ));
  if ($studio->have_posts()) :?>
  <div class="studio wcm">
  	<h3 class="the-title">体験レッスン受付中の<br class="sp">スタジオ一覧</h3>
  	<p class="studio__txt">※店舗により体験内容・キャンペーン内容が異なります。<br>詳細は、 各店舗ページをご覧ください。</p>
  	<div class="studio__select">
  		<select>
  			<option value="">All</option>
  			<?php foreach($categories as $cat){ ?>
  			<option value="<?php echo $cat->name; ?>" <?php if($cat->name == '東京'){echo "selected";} ?>><?php echo $cat->name; ?></option>
  			<?php } ?>
  		</select>
  	</div>
  	<div class="lst-studio" id="list-studio">
			<?php while ($studio->have_posts()) : $studio->the_post();
	       $fields = get_fields();
	    ?>
  		<div class="lst-studio__item">
  			<div class="lst-studio__item--map">
  				<iframe width="100" height="100" frameborder="0" src="https://maps.google.com/maps?q=<?php echo $fields['access_zipcode'].$fields['access_address01']; ?>&amp;hl=ja&amp;output=embed" allowfullscreen></iframe>
  			</div>
  			<div class="lst-studio__item--info">
  				<p class="ttl"><?php echo get_the_title(); ?></p>
  				<p class="txt">
  					<?php echo $fields['access_zipcode'].'<br>'.$fields['access_address01']; ?>
  					<?php  if(!empty($fields['access_tel'])){ echo '<br>'.$fields['access_address02'];} ?>
  				</p>
  				<?php if(!empty($fields['access_tel'])){ ?>
  				<a href="tel:<?php echo $fields['access_tel']; ?>" class="txt">TEL：<?php echo $fields['access_tel']; ?></a>
  				<?php } if(!empty($fields['access_fax'])){ ?>
  				<p class="txt">FAX：<?php echo $fields['access_fax']; ?></p>
  				<?php } ?>
  				<div class="btn">
  					<a href="<?php the_permalink(); ?>" class="btn-detail">店舗ページへ</a>
  					<a target="_blank" href="https://maps.google.com/maps?q=<?php echo $fields['access_zipcode'].$fields['access_address01']; ?>&amp;hl=ja" class="btn-location">地図をみる</a>
  				</div>
  			</div>
  		</div>
  		<?php endwhile; ?>
  	</div>
  	<a href="<?php echo APP_URL; ?>studio/" class="c-btn">もっとみる</a>
  </div>
	<?php endif; ?>
	<?php include(APP_PATH.'libs/slider.php'); ?>
	<div class="faq">
		<?php include(APP_PATH.'libs/faq.php'); ?>
	</div>
	<div class="sns wcm">
		<h3 class="the-title">SNS</h3>
		<div class="grBtn">
			<a href="" class="grBtn__item ins"><p>Instagram</p></a>
			<a href="" class="grBtn__item twitter"><p>Twitter</p></a>
		</div>
	</div>
	<div class="popup">
		<div class="popup-inner">
			<div class="wcm">
				<div class="btn_close"></div>
				<div class="popup__cont">
					<div class="popup__cont--item item1 active">
						<img src="<?php echo APP_ASSETS; ?>img/top/banner01.jpg" alt="">
					</div>
					<div class="popup__cont--item item1">
						<img src="<?php echo APP_ASSETS; ?>img/top/banner02.jpg" alt="">
					</div>
					<div class="popup__cont--item item1">
						<img src="<?php echo APP_ASSETS; ?>img/top/banner03.jpg" alt="">
					</div>
				</div>
				<div class="popup__nav">
					<div class="popup__nav--next"></div>
					<div class="popup__nav--prev"></div>
				</div>
				<div class="popup__cap">1 / 3</div>
			</div>
		</div>
	</div>
</main>
<?php include(APP_PATH.'libs/footer.php'); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo APP_ASSETS ?>js/page/top.min.js"></script>
<script>
	var _url = "<?php echo APP_URL; ?>";
	$('body').on('click', '.js-popup', function(){
		$('.popup').fadeIn();
		$('body').css('top', -st);
		$('body').addClass('menu-open');
	});

  $(".popup").on("click", function(e){
    if (e.target !== this)
      return;
    $('.btn_close').trigger('click');
  });
</script>
</body>
</html>