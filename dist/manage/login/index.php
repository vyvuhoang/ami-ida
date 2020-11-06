<?php
$thisPageName = 'managelogin';
include_once(dirname(__FILE__) . '/app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
session_start();
if(isset($_SESSION['logID']) && $_SESSION['logID']){
  header('Location: '.APP_URL);
  exit;
}else{
if(isset($_POST['studio_account_email'], $_POST['studio_account_password'])){
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
    $thisStudioAccount = $studio_accounts[0];
    $hashed_password = get_field('studio_account_password', $thisStudioAccount->ID);
    if(password_verify($studio_account_password,$hashed_password)){
      $success = 1;
      $studioAccountID = $thisStudioAccount->ID;
    }else{
      $success = 0;
    }
  }else{
    $success = 0;
  }

  $login = array();
  $login['success'] = $success;
  $login['studioAccountID'] = $studioAccountID;

  echo json_encode($login);
  $_SESSION['studioAccountID'] = strval($studioAccountID);
  $_SESSION['studioEmail'] = get_field('studio_account_email', $thisStudioAccount->ID);
  return;
}
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/top.min.css">
</head>
<body id="top" class='top'>
<?php include(APP_PATH.'libs/header.php'); ?>
<div id="wrap">
  <main>
    <div class="page-login c-pagelogin bgBlue">
      <div class="wcm">
        <form class="form-login" name="login-form">
          <div class="bgWhite">
            <p class="c-ttl">会員ログイン</p>
            <div class="tbl">
              <div class="tbl__row">
                <p class="c-txt">メールアドレス</p>
                <input type="email" id="studio_account_email" name="studio_account_email" class="c-input">
              </div>
              <div class="tbl__row">
                <p class="c-txt">パスワード</p>
                <input type="password" id="studio_account_password" name="studio_account_password" class="c-input">
              </div>
              <div class="tbl__row">
                <label class="c-checkbox">
                    <input type="checkbox">
                    <span class="txt-checkbox c-txt">次回から自動でログインする</span>
                </label>
                <p class="tbl__row--note">パスワードを忘れた方はこちら</p>
              </div>
              <button type="submit" class="c-btn c-btn--blue1">ログインする</button>
              <div class="re">
                <p class="re__ttl">会員登録がまだの方</p>
                <p class="re__txt">1分でカンタン!会員登録(無料)すれば、仕事探しや転職活動が、さらに便利に!</p>
                <a href="<?php echo APP_URL.'user/register/'?>" class="c-btn c-btn--blue2">無料会員登録はこちら</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>
<?php include(APP_PATH.'libs/footer.php'); ?>
<script src="<?php echo APP_ASSETS ?>js/page/top.min.js"></script>
</body>
</html>
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
          window.location.href = '/user/'+data.logID+'/'
        }
      })
      return false;
    })
  }
</script>
<?php }?>