<?php
$thisPageName = 'login';
include_once('../../wp/wp-load.php');
if(isset($_SESSION['logID']) && $_SESSION['logID']){
  header('Location: '.APP_URL.'manage/');
}else{
if(isset($_POST['studio_account_email'], $_POST['studio_account_password'])){
  $login = array();
  $studio_account_email = $_POST['studio_account_email'];
  $studio_account_password = $_POST['studio_account_password'];
  $studio_accounts = get_posts(array(
    'post_status' => 'any',
    'post_type' => 'studio_account',
    'posts_per_page' => 1,
    'meta_query' => array(
      array(
        'key' => 'studio_account_email',
        'value' => $studio_account_email,
        'compare' => '='
      )
    )
  ));
  if($studio_accounts){
    $thisstudio_account = $studio_accounts[0];
    $hashed_password = get_field('studio_account_password', $thisstudio_account->ID);
    if($studio_account_password == $hashed_password){
      $success = 1;
      $studio_accountID = $thisstudio_account->ID;
    }else{
      $success = 0;
    }
  }else{
    $success = 0;
  }

  $login['success'] = $success;
  $login['logID'] = $studio_accountID;

  echo json_encode($login);
  $_SESSION['logID'] = strval($studio_accountID);
  $_SESSION['logName'] = get_field('studio_account_name', $thisstudio_account->ID);
  $_SESSION['logEmail'] = get_field('studio_account_email', $thisstudio_account->ID);

  return;
}
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/login.min.css">
</head>
<body id="login">
<main id="wrap">
  <div class="login">
		<div class="inner">
			<form class="login__form" name="login-form">
				<p class="login__form--ttl">
					<img src="<?php echo APP_ASSETS; ?>img/login/logo.png" alt="AMIIDA">
				</p>
				<div class="login__form--field">
					<div class="item">
					  <div class="ico ico--user"></div>
            <input type="text" id="studio_account_email" name="studio_account_email" class="c-input" placeholder="メールアドレス">
					</div>
					<div class="item">
					  <div class="ico ico--key"></div>
            <input type="password" id="studio_account_password" name="studio_account_password" class="c-input" placeholder="******">
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
<script src="<?php echo APP_ASSETS; ?>js/common.min.js"></script>
<script>
  $(document).ready(function(){
    checkLogin();
  })
  function checkLogin(){
    $('form[name="login-form"]').on('submit',function(){
      $.ajax({
        method: 'POST',
        dataType: 'json',
        data: {
          studio_account_email: $('#studio_account_email').val(),
          studio_account_password: $('#studio_account_password').val(),
        },
      }).success(function(data) {
        if(data.success == 0){
          alert('Wrong email or password');
        }else{
          window.location.href = '/manage/'
        }
      })
      return false;
    })
  }
</script>
<?php }?>