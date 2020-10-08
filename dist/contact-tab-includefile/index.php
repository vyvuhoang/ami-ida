<?php
session_start();
ob_start();
include_once(dirname(__DIR__) . '/app_config.php');
$thisPageName = 'contact';
include(APP_PATH.'libs/head.php');
?>
<meta http-equiv="Expires" content="86400">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/contact.min.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/form/validationEngine.jquery.css">
</head>
<body id="contact">
<!-- HEADER -->
<?php include(APP_PATH.'libs/header.php'); ?>
<div class="mainImg"><h2>CONTACT<span>お問い合わせ</span></h2></div>
<form method="post" class="form-1" id="form-1" action="confirm/?g=<?php echo time() ?>" name="form1" onSubmit="return check()" novalidate>

  <div class="tabForm container">
    <ul>
      <li><input type="radio" name="selectRadio" id="selectRadio01" value="無料お見積もり" checked><label for="selectRadio01" data-input="#input_01">無料お見積もり</label></li>
      <li><input type="radio" name="selectRadio" id="selectRadio02" value="資料ダウンロード"><label for="selectRadio02" data-input="#input_02">資料ダウンロード</label></li>
    </ul>
  </div>

  <div class="formBlock container">
    <p class="txtContact">
      ご質問等に関しては、以下のフォームよりお問い合わせ下さい。<br>
      必要項目を入力して確認ボタンを押してください。<br>
      （<em>【必須】</em>は入力必須項目です）
    </p>

    <div class="stepImg">
      <img src="<?php echo APP_ASSETS; ?>img/common/form/img_step01.svg" width="714" height="45" alt="フォームからのお問い合わせ　Step" class="pc" />
      <img src="<?php echo APP_ASSETS; ?>img/common/form/img_step01SP.svg" width="345" height="55" alt="フォームからのお問い合わせ　Step" class="sp" />
    </div>

    <p class="hid_url">Leave this empty: <input type="text" name="url"></p><!-- Anti spam part1: the contact form -->
    <div id="returnTableContact">
      <div class="inputTable" id="input_01"><?php include_once('input_01.php') ?></div>
      <div class="inputTable" id="input_02" style="display: none"><?php include_once('input_02.php') ?></div>
    </div>
    <div class="txtContact01">
      <p class="t0b10">【個人情報の取扱いについて】</p>
      <ul class="t0b20">
        <li>・本フォームからお客様が記入・登録された個人情報は、資料送付・電子メール送信・電話連絡などの目的で利用・保管し、第三者に開示・提供することはありません。</li>
      </ul>
    </div>
    <div class="taC">
      <p><label><input type="checkbox" name="check1" value="ok"><span class="fz14"> 個人情報の取扱いに同意する</span></label></p>
      <p class="t30b20">
        <button id="btnConfirm"><span>入力内容を確認する</span></button>
        <input type="hidden" name="actionFlag" value="confirm">
      </p>
    </div>
    <p class="taC t30b0 txtContact01">上記フォームで送信できない場合は、必要項目をご記入の上、<br class="hidden-xs " />
    <a id="mailContact" href="#"></a>までメールをお送りください。</p><!-- Anti spam part2: clickable email address -->
  </div>
</form>
<!-- FOOTER -->
<?php include(APP_PATH.'libs/footer.php'); ?>
<script src="<?php echo APP_ASSETS; ?>js/form/ajaxzip3.js"></script>
<script src="<?php echo APP_ASSETS; ?>js/form/jquery.cookie.js"></script>
<!-- Document: https://github.com/posabsolute/jQuery-Validation-Engine -->
<script src="<?php echo APP_ASSETS; ?>js/form/jquery.validationEngine.js"></script>
<script src="<?php echo APP_ASSETS; ?>js/form/languages/jquery.validationEngine-ja.js"></script>
<script>
  $(".inputTable").find("input, textarea, select").prop('disabled', true);
  $(".inputTable").hide();
  $(".tabForm").find("input").each(function(){
    if($(this).is(":checked")) {
      var input = $(this).next().data('input')
      $(input).find("input, textarea, select").prop('disabled', false);
      $(input).fadeIn();
    }
  })
  $(".tabForm").on('click', 'label', function(event) {
    var input = $(this).data('input');
    $(".inputTable").hide();
    $(input).fadeIn();
    $(".inputTable").find("input, textarea, select").prop('disabled', true);
    $(input).find("input, textarea, select").prop('disabled', false);
  });
  $(document).ready(function(){
    $("#form-1").validationEngine({
      promptPosition: "topLeft",
      scrollOffset: ($('.header').outerHeight() + 5),
    });
    window.onbeforeunload = function(){
      if(document.contactform.check1.checked) {
        $("html, body").scrollTop($("#contactform").offset().top);
      }
    };
  })
  function check(){
    if(!document.form1.check1.checked){
      window.alert('「個人情報の取扱いに同意する」にチェックを入れて下さい');
      return false;
    }
  }
  $(document).ready(function() {
    var address = "xxx" + "@" + "xxxxxxx.com";
    $("#mailContact").attr("href", "mailto:" + address).text(address);

    $('body').on('click','#btnSend',function(e){
      e.preventDefault();
      $(this).html('<span>送信中...</span>').prop('disabled',true).css('opacity','0.7');
      $(".form-1")[0].submit();
    })
  });
</script>
</body>
</html>
