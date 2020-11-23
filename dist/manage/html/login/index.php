<?php
$thisPageName = 'login';
include_once(dirname(__DIR__) . '../../../app_config.php');
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/login.min.css">
</head>
<body id="login">
<?php //include(APP_PATH.'libs/header.php'); ?>
<main id="wrap">
	<div class="login">
		<div class="login__logo">
			<img src="<?php echo APP_ASSETS; ?>img/login/logo.png" alt="Amiida">
		</div>
		<div class="inner">
			<form class="login__form">
				<p class="login__form--ttl">LOGIN</p>
				<div class="login__form--field">
					<div class="item">
					  <div class="ico ico--user"></div>
					  <input type="text" placeholder="メールアドレス"readonly>
					</div>
					<div class="item">
					  <div class="ico ico--key"></div>
					  <input type="password" minlength="4" maxlength="8" placeholder="******" readonly>
					</div>
				</div>
				<label for="check1" class="login__form--check">
				  <input type="checkbox" id="check1">
				  <span class="txt">次回から自動でログインする</span>
				</label>
				<div class="login__form--btn">
				  <button class="btn-purple" type="submit">ログインする</button>
				</div>
			</form>
		</div>
	</div>
</main>
<?php //include(APP_PATH.'libs/footer.php'); ?>
</body>
</html>
