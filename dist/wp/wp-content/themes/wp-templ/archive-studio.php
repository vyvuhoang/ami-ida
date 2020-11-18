<?php
$thisPageName = 'studio';
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/studio.min.css">
</head>
<body id="studio" class="studio">
<!-- HEADER -->
<?php include(APP_PATH.'libs/header.php'); ?>
<main id="wrap">
	<div class="c-search">
		<h1 class="the-title">体験レッスン受付中の<br class="sp">スタジオ一覧</h1>
		<div class="wcm">
			<div class="c-search__bar">
				<input type="text" placeholder="Search..">
				<div class="c-search__bar--btn"><span>Search</span></div>
			</div>
			<div class="c-search__filter">
				<p class="c-search__filter--ttl">エリア</p>
				<select class="c-search__filter--select">
					<option value="">新着順</option>
				</select>
			</div>
		</div>
	</div>
	<div class="lst-studio wcm">
		<?php for($i=0;$i<6;$i++){ ?>
		<div class="lst-studio__item">
			<div class="lst-studio__item--map">
				<iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3238.605264550298!2d139.74549521541584!3d35.735925334577544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d95d35120db%3A0x434152d2c43fa62e!2s1-ch%C5%8Dme-38-2%20Komagome%2C%20Toshima%20City%2C%20Tokyo%20170-0003%2C%20Japan!5e0!3m2!1sen!2s!4v1605334591523!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
			<div class="lst-studio__item--info">
				<p class="ttl">スタジオタイトル</p>
				<p class="txt">〒170-0003<br>東京都豊島区駒込1-38-2<br>駒込TRビル4階<br>TEL：03-5981-9027<br>FAX：03-5981-9028</p>
				<div class="btn">
					<a href="<?php echo APP_URL; ?>studio/single/" class="btn-detail">店舗ページへ</a>
					<a href="" class="btn-location">地図をみる</a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</main>
<?php include(APP_PATH.'libs/footer.php'); ?>
</body>
</html>