<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
$thisPageName = 'manage-account-setting';
$page_ttl = 'アカウント設定・編集';
if(isset($_SESSION['logID']) && $_SESSION['logID']){
  if(isset($_POST['studio_account_email'], $_POST['studio_account_password'])){
    $success = 0;
    $change_info = array();
    $studio_account_email = $_POST['studio_account_email'];
    $studio_account_password = $_POST['studio_account_password'];

    update_field('studio_account_email', $studio_account_email, $_SESSION['logID']);
    update_field('studio_account_password', $studio_account_password, $_SESSION['logID']);

    $success = 1;
    $change_info['success'] = $success;
    echo json_encode($change_info);
    return;
  }
  include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage_common.min.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage-account-setting.min.css">
</head>
<body class="manage application">
  <?php include(APP_PATH.'libs/manage_header.php'); ?>
  <main id="wrap">
    <div class="container-1140">
      <div class="sec-bg">
        <div class="container-1000">
          <form class="login__form" name="change-account-form" method="POST">
            <div class="login__form--field">
              <div class="item">
                <div class="ico ico--user"></div>
                <input type="text" id="studio_account_email" name="studio_account_email" class="c-input" placeholder="メールアドレス" required>
              </div>
              <div class="item">
                <div class="ico ico--key"></div>
                <input type="password" id="studio_account_password" name="studio_account_password" class="c-input" placeholder="******" required>
              </div>
              <div class="item">
                <div class="ico ico--key"></div>
                <input type="password" id="studio_retype_password" name="studio_retype_password" class="c-input" placeholder="******" required>
              </div>
            </div>
            <div class="login__form--btn">
              <button class="btn-submit" type="submit">ログインする</button>
              <div class="notify js-notify"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <script src="<?php echo APP_ASSETS; ?>js/common.min.js"></script>
  <script>
    $(document).ready(function(){
      checkChangeAccount();
    })

    function checkChangeAccount(){
      var password = $('#studio_account_password'),
          confirm_password = $("#studio_retype_password");

      confirm_password.keyup(function(){
        validatePassword(password, $(this));
      });
      password.on('change', function(){
        validatePassword($(this), confirm_password);
      });

      $('form[name=change-account-form]').on('submit', function(){
        $samePW = validatePassword(password, confirm_password);
        if($samePW){
          $.ajax({
          method: 'POST',
          dataType: 'json',data: {
            studio_account_email: $('#studio_account_email').val(),
            studio_account_password: $('#studio_account_password').val(),
          },
          }).success(function(data) {
            if(data.success == 1){
              $('.js-notify').text('アカウント情報の変更に成功');
            }
          })
        }
        return false;
      })
    }

    function validatePassword(password, confirm_password){
      if(password.val() != confirm_password.val()) {
        confirm_password[0].setCustomValidity("パスワードが一致しません");
        return false;
      } else {
        confirm_password[0].setCustomValidity("");
        return true;
      }
    }
  </script>
</body>
</html>
<?php
}else{
  header('Location: '.APP_URL.'manage/');
}
?>