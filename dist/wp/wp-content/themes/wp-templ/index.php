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
	<div class="intro wcm" id="intro">
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
	<div class="slide">
		<h3 class="the-title wcm">アミーダの溶岩ホットヨガを選ぶお客様のお声</h3>
		<div class="slide__img js-voice-slider">
			<?php for($i=0;$i<10;$i++){ ?>
		  <div class="item" style="background-image: url(<?php echo APP_ASSETS; ?>img/top/slide.jpg);"></div>
			<?php } ?>
		</div>
		<?php //include(APP_PATH.'libs/voice.php'); ?>
	  <div class="c-voice">
	  	<div class="wcm">
	  		<?php include(APP_PATH.'libs/voice.php'); ?>
		  	<!-- <div class="c-voice__item">
		  		<div class="c-voice__item--avatar female">
		  			<img src="<?php echo APP_ASSETS; ?>img/top/female.svg" alt="Male" width="73">
		  		</div>
		  		<div class="c-voice__item--mess">
		  			<p class="ttl">アミーダで実現できた”身体”と”心”の美。</p>
		  			<div class="hide">
		  				<p class="txt">業の多い会社で仕事に追われる生活をしていました。 入会した目的はダイエット、初月で4キロ減りました。それよりも効果を感じたのは、ストレスが減ったことです。子供にも優しくなれて、周りからも「穏やかになったね！」と言われるようになりました。アミーダで教えてもらったヨーガの考え方を、普段の生活でも意識するようにしています。 ジムや一般的なヨガに通った経験もありますが、私には溶岩ヨガがピッタリ！と感じました。続けやすい環境が整っているのも嬉しいです。</p>
		  				<p class="name">20代女性｜会社員</p>
		  			</div>
		  			<div class="btn-more sp"><p>More...</p></div>
		  		</div>
		  	</div>
		  	<div class="c-voice__item">
		  		<div class="c-voice__item--avatar male">
		  			<img src="<?php echo APP_ASSETS; ?>img/top/male.svg" alt="Male" width="73">
		  		</div>
		  		<div class="c-voice__item--mess">
		  			<p class="ttl">アミーダは、なくてはならない生活の一部。</p>
		  			<div class="hide">
		  				<p class="txt">友達に誘われて通いはじめましたが、ここまでハマるとは思っていませんでした。毎日の生活で溜まっていくストレスや前日飲みすぎたお酒が、大量の汗と共に流れて心身ともにスッキリ！今では生活の一部でなくてはならない存在になってます。ヨガインストラクターの皆さんは、いつも笑顔でとても暖かい方ばかり。仲の良いアミ友（共にアミーダのレッスンを受講している仲間）が増えていくので続けることが楽しいです。これからも無理なく身体を動かして、アミ活を続けていきたいと思います！</p>
		  				<p class="name">50代女性 / 主婦 / 常滑店</p>
		  			</div>
		  			<div class="btn-more sp"><p>More...</p></div>
		  		</div>
		  	</div>
		  	<div class="c-voice__item">
		  		<div class="c-voice__item--avatar female">
		  			<img src="<?php echo APP_ASSETS; ?>img/top/female.svg" alt="Male" width="73">
		  		</div>
		  		<div class="c-voice__item--mess">
		  			<p class="ttl">生活のスタートはすべてアミーダから。</p>
		  			<div class="hide">
		  				<p class="txt">アミーダのレッスンに来ると心と身体がスッキリします。余計なことを考えなくなり、悩みもなくなりました。何か新しいことをするときは、まずアミーダに来てから行動するようになりました。ヨガレッスンの後は心身ともに身軽になるので、時間の使い方がとても有意義になります。アミーダのヨガレッスンに参加した日は、一日幸せな気分で過ごすことができます。アミーダに通うことで、自然と心と身体のメンテナンスが出来る様になりました。この時間が、私の生活で唯一自分に集中できて身体の良い状態を保てる場所です。</p>
		  				<p class="name">40代女性 / 主婦 / 津田沼店</p>
		  			</div>
		  			<div class="btn-more sp"><p>More...</p></div>
		  		</div>
		  	</div> -->
		  	<a href="<?php echo APP_URL; ?>studio" class="c-btn">お近くのスタジオを探す</a>
		  </div>
		</div>
	</div>
	<div class="teacher wcm">
		<h3 class="the-title">アミーダ溶岩ホットヨガの特徴</h3>
		<div class="teacher__lst">
			<?php for($i=0;$i<9;$i++){ ?>			
			<div class="teacher__lst--item">
				<a href="">
				<div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/teacher.jpg)">
					<p class="cat">所属店舗</p>
				</div>
				<div class="info">
					<p class="ttl">インストラクターの名前</p>
					<p class="txt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテ</p>
				</div>
			</a>
		</div>
		<?php } ?>
		</div>
	</div>
	<div class="media">
		<div class="wcm">
			<h3 class="the-title">アミーダメディア</h3>
			<div class="media__lst">
				<?php for($i=0;$i<6;$i++){ ?>			
				<div class="media__lst--item">
					<a href="">
						<div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/top/teacher.jpg)">
						</div>
						<div class="info">
							<p class="ttl">インストラクターの名前</p>
							<p class="txt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテ</p>
						</div>
					</a>
				</div>
			<?php } ?>
			</div>
			<a href="<?php echo APP_URL; ?>media/" class="c-btn">もっとみる</a>
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
</main>
<?php include(APP_PATH.'libs/footer.php'); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo APP_ASSETS ?>js/page/top.min.js"></script>
<script>
	var _url = "<?php echo APP_URL; ?>";
</script>
</body>
</html>