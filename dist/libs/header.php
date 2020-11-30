<!-- Google Tag Manager -->
<!-- End Google Tag Manager -->
<?php //var_dump($pagename); ?>
<header class="header">
	<div class="inner">
		<div class="header__logo">
			<a href="<?php echo APP_URL; ?>"></a>
		</div>
		<?php if($pagename == 'single-studio') { ?>
		<div class="header__studio pc">
			<div class="inner">
				<a href="#anchor01" class="header__studio--item">プラン・料金</a>
				<a href="#anchor02" class="header__studio--item">アクセス</a>
				<a href="#anchor03" class="header__studio--item">レッスンカレンダー </a>
				<a href="#anchor04" class="header__studio--item">体験レッスン申込み</a>
			</div>
		</div>
		<?php } ?>
		<div class="header__btn">
			<div class="header__btn--item">
				<a href="<?php echo APP_URL; ?>studio/" class="btn-studio">店舗情報</a>
			</div>
			<div class="header__btn--item">
				<a href="<?php echo APP_URL; ?>recruit/" class="btn-recruit">採用情報</a>
			</div>
			<div class="header__btn--item">
				<div class="hamburger"><span></span></div>
			</div>
		</div>
	</div>
	<div class="header__menu">
		<div class="header__menu--nav">
			<div class="wcm">
				<div class="header-link">
					<div class="item">
						<a href="<?php echo APP_URL; ?>">HOME</a>
					</div>
					<div class="item">
						<a href="<?php echo APP_URL; ?>company/">COMPANY</a>
					</div>
					<div class="item">
						<a href="<?php echo APP_URL; ?>amiida_life/">AMI-IDA LIFE</a>
					</div>
					<div class="item">
						<a href="<?php echo APP_URL; ?>media/">MEDIA</a>
					</div>
					<?php if($pagename == 'single-studio') { ?>
					<div class="item">
						<!-- <p class="ttl">STUDIO</p> -->
						<div class="header__studio sp">
							<div class="inner">
								<div class="header__studio--item"><a href="#anchor01">プラン・料金</a></div>
								<div class="header__studio--item"><a href="#anchor02">アクセス</a></div>
								<div class="header__studio--item"><a href="#anchor03">レッスン<br>カレンダー </a></div>
								<div class="header__studio--item"><a href="#anchor04">体験レッスン<br>申込み</a></div>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
				<div class="header-social">
					<a href="" class="facebook">
						<img src="<?php echo APP_ASSETS; ?>img/common/header/ico_fb.svg" alt="Facebook">
					</a>
					<a href="" class="ins">
						<img src="<?php echo APP_ASSETS; ?>img/common/header/ico_ins.svg" alt="Instagram">
					</a>
				</div>
				<a href="mailto:support@ami-ida.com" class="btn-email">
					<span>CONTACT</span>
				</a>
			</div>
		</div>
	</div>
</header>