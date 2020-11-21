<?php
include_once('../../wp/wp-load.php');
if(isset($_SESSION['logID']) && $_SESSION['logID']){
  header('Location: '.APP_URL);
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
include(APP_PATH.'libs/manage_head.php');
?>
<!-- <link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/login.min.css"> -->
</head>
<body>
<?php include(APP_PATH.'libs/manage_header.php');?>
<main id="wrap">
  <div class="page-login bgBlue">
    <div class="wcm">
      <form class="form-login" name="login-form">
        <div class="bgWhite">
          <p class="c-ttl">アカウント設定・編集</p>
          <div class="tbl">
            <div class="tbl__row">
              <p class="c-txt">メールアドレス</p>
              <input type="text" id="studio_account_email" name="studio_account_email" class="c-input">
            </div>
            <div class="tbl__row">
              <p class="c-txt">パスワード</p>
              <input type="password" id="studio_account_password" name="studio_account_password" class="c-input">
            </div>
            <button type="submit" class="c-btn c-btn--blue1">ログインする</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>
<?php include(APP_PATH.'libs/manage_footer.php');?>
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