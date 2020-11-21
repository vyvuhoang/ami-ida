<?php
session_start();
ob_start();
if(empty($_POST['actionFlag'])) header('location: '.APP_URL);

include(APP_PATH.'libs/head.php');
require(APP_PATH."libs/form/jphpmailer.php");

$gtime = time();

//always keep this
$actionFlag       = (!empty($_POST['actionFlag'])) ? htmlspecialchars($_POST['actionFlag']) : '';
$reg_url          = (!empty($_POST['url'])) ? htmlspecialchars($_POST['url']) : '';
//end always keep this

//お問い合わせフォーム内容
$reg_studio_slug = (!empty($_POST['studio_slug'])) ? htmlspecialchars($_POST['studio_slug']) : '';
$reg_single_ttl = (!empty($_POST['single_ttl'])) ? htmlspecialchars($_POST['single_ttl']) : '';
$reg_instructor = (!empty($_POST['instructor'])) ? htmlspecialchars($_POST['instructor']) : '';
$reg_hopedate = (!empty($_POST['hopedate'])) ? htmlspecialchars($_POST['hopedate']) : '';
$reg_hopetime = (!empty($_POST['hopetime'])) ? htmlspecialchars($_POST['hopetime']) : '';
$reg_name         = (!empty($_POST['nameuser'])) ? htmlspecialchars($_POST['nameuser']) : '';
$reg_nameuser_furigana         = (!empty($_POST['nameuser_furigana'])) ? htmlspecialchars($_POST['nameuser_furigana']) : '';
$reg_age = (!empty($_POST['age'])) ? htmlspecialchars($_POST['age']) : '';
$reg_tel          = (!empty($_POST['tel'])) ? htmlspecialchars($_POST['tel']) : '';
$reg_email        = (!empty($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
$reg_method        = (!empty($_POST['method'])) ? htmlspecialchars($_POST['method']) : '';
$reg_other_method        = (!empty($_POST['other_method'])) ? htmlspecialchars($_POST['other_method']) : '';
$reg_content = (!empty($_POST['content'])) ? $_POST['content'] : '';
$br_reg_content   = nl2br($reg_content);

$_SESSION['statusFlag'] = 1;

if($actionFlag == "confirm") {
	$_SESSION['ses_from_step2'] = true;
	if(!isset($_SESSION['ses_gtime_step2'])) $_SESSION['ses_gtime_step2'] = $gtime;
?>
<meta http-equiv="Expires" content="86400">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/_style.min.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/single-studio.min.css">
<!-- Anti spam part1: the contact form start -->

<?php if(GOOGLE_RECAPTCHA_KEY_API != '' && GOOGLE_RECAPTCHA_KEY_SECRET != '') { ?>
<script src="https://www.google.com/recaptcha/api.js?hl=ja" async defer></script>
<script>
	function onSubmit(token) {
		document.getElementById("formSend").submit();
	}
</script>
<style>
	.grecaptcha-badge {
		display: none
	}
</style>
<?php } ?>

</head>

<body id="single-studio" class="single-studio step2">
	<?php include(APP_PATH.'libs/header.php'); ?>
	<div id="wrap">
		<main>
      <div class="sec-form">
        <div class="container-750">
          <h3 class="the-title">アミーダ〇〇店<br class="sp">レッスンスケジュール</h3>
          <form method="post" class="studioform" id="studioform" action="?g=<?php echo $gtime ?>" name="studioform">
            <div class="stepImg">
              <picture>
                <source media="(max-width: 767px)" srcset="<?php echo APP_ASSETS; ?>img/common/form/img_step02SP.svg">
                <img src="<?php echo APP_ASSETS; ?>img/common/form/img_step02.svg" alt="フォームからのお問い合わせ　Step">
              </picture>
            </div>
            <p class="hid_url">Leave this empty: <input type="text" name="url"></p><!-- Anti spam part1: the contact form -->
            <table class="tableContact tableContact--step2">
              <tr>
                <th>体験内容</th>
                <td>
                  <p class="txt"><?php echo $reg_single_ttl;?></p>
                </td>
              </tr>
              <tr>
                <th>体験希望日</th>
                <td>
                  <p class="txt"><?php echo $reg_hopedate.' '.$reg_hopetime;?></p>
                </td>
              </tr>
              <tr>
                <th>お名前</th>
                <td>
                  <p class="txt"><?php echo $reg_name;?></p>
                </td>
              </tr>
              <tr>
                <th>お名前（ふりがな）</th>
                <td>
                  <p class="txt"><?php echo $reg_nameuser_furigana;?></p>
                </td>
              </tr>
              <?php if($reg_age){?>
                <tr>
                  <th class="norequire">年齢</th>
                  <td>
                    <p class="txt"><?php echo $reg_age;?></p>
                  </td>
                </tr>
              <?php }?>
              <tr>
                <th>電話番号</th>
                <td>
                  <p class="txt"><?php echo $reg_tel;?></p>
                </td>
              </tr>
              <tr>
                <th>メールアドレス</th>
                <td>
                  <p class="txt"><?php echo $reg_email;?></p>
                </td>
              </tr>
              <tr>
                <th>アミーダを知った<br class="pc">きっかけ</th>
                <td>
                    <p class="txt"><?php echo $reg_method.' '.$reg_other_method;?></p>
                    <?php if($reg_content){?>
                      <p class="txt"><?php echo $br_reg_content;?></p>
                    <?php }?>
                </td>
              </tr>
            </table>

            <input type="hidden" name="studio_slug" value="<?php echo $reg_studio_slug ?>">
            <input type="hidden" name="single_ttl" value="<?php echo $reg_single_ttl ?>">
            <input type="hidden" name="instructor" value="<?php echo $reg_instructor ?>">
            <input type="hidden" name="hopedate" value="<?php echo $reg_hopedate ?>">
            <input type="hidden" name="hopetime" value="<?php echo $reg_hopetime ?>">
            <input type="hidden" name="nameuser" value="<?php echo $reg_name ?>">
            <input type="hidden" name="nameuser_furigana" value="<?php echo $reg_nameuser_furigana ?>">
            <input type="hidden" name="age" value="<?php echo $reg_age ?>">
            <input type="hidden" name="tel" value="<?php echo $reg_tel ?>">
            <input type="hidden" name="email" value="<?php echo $reg_email ?>">
            <input type="hidden" name="method" value="<?php echo $reg_method ?>">
            <input type="hidden" name="other_method" value="<?php echo $reg_other_method ?>">
						<input type="hidden" name="content" value="<?php echo $reg_content ?>">
						<!-- always keep this -->
						<input type="hidden" name="url" value="<?php echo $reg_url ?>">
						<!-- end always keep this -->

            <p class="btn-row">
              <button id="btnConfirm" class="btn-confirm"><span>この内容で送信する</span></button>
              <input type="hidden" name="actionFlag" value="send">
            </p>
          </form>
        </div>
      </div>
		</main>
	</div>
	<?php include(APP_PATH.'libs/footer.php'); ?>
</body>
</html>
<?php } elseif($actionFlag == "send") {
  include_once('single-studio-complete.php');
} ?>