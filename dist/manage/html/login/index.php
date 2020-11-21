<?php
$thisPageName = 'login';
include_once(dirname(__DIR__) . '../../../app_config.php');
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/login.min.css">
</head>
<body id="login">
<main id="wrap">
	<div class="login">
		<div class="inner">
			<form class="login__form">
				<p class="login__form--ttl">
					<img src="<?php echo APP_ASSETS; ?>img/login/logo.png" alt="AMIIDA">
				</p>
				<div class="login__form--field">
					<div class="item">
					  <div class="ico ico--user"></div>
					  <input type="text" placeholder="メールアドレス">
					</div>
					<div class="item">
					  <div class="ico ico--key"></div>
					  <input type="password" minlength="4" maxlength="8" placeholder="******">
					</div>
				</div>
				<label for="check1" class="login__form--check">
				  <input type="checkbox" id="check1">
				  <span class="txt">次回から自動でログインする</span>
				</label>
				<div class="login__form--btn">
				  <button class="c-btn" type="submit">ログインする</button>
				</div>
			</form>
		</div>
	</div>
</main>
</body>
</html>
