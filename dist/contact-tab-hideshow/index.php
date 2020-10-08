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
      <li><input type="radio" name="selectRadio" id="selectRadio01" value="無料お見積もり" checked><label for="selectRadio01" data-input="input_01">無料お見積もり</label></li>
      <li><input type="radio" name="selectRadio" id="selectRadio02" value="資料ダウンロード"><label for="selectRadio02" data-input="input_02">資料ダウンロード</label></li>
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
    <table class="tableContact" cellspacing="0">
      <tr>
        <th><em class="required">【必須】</em>会社名</th>
        <td>
          <input type="text" name="company" placeholder="例) ◯△×株式会社" class="validate[required]">
        </td>
      </tr>
      <tr>
        <th><em class="required">【必須】</em>担当者名</th>
        <td>
          <input type="text" name="nameuser" placeholder="例) 山田 太郎" class="validate[required]">
        </td>
      </tr>
      <tr>
        <th><em class="required">【必須】</em>電話番号</th>
        <td>
          <input type="text" name="tel" placeholder="例) 1234567" class="validate[required]">
        </td>
      </tr>
      <tr>
        <th><em class="required">【必須】</em>メールアドレス</th>
        <td>
          <input type="url" name="email" placeholder="例) XXXX@sample.co.jp" class="validate[required]">
        </td>
      </tr>
      <tr class="input_dynamic input_01">
        <th><em class="required">【必須】</em>配布予定部数</th>
        <td id="radioarray01">
          <p class="pRadio"><input class="validate[required]" name="radio" value="まだ決まっていない" id="radio01" type="radio"> <label for="radio01">まだ決まっていない</label></p>
          <p class="pRadio"><input class="validate[required]" name="radio" value="20,000部" id="radio02" type="radio"> <label for="radio02">20,000部</label></p>
          <p class="pRadio"><input class="validate[required]" name="radio" value="10,000部" id="radio03" type="radio"> <label for="radio03">10,000部</label></p>
        </td>
      </tr>
      <tr class="input_dynamic input_01">
        <th>【任意】配布物のサイズ</th>
        <td>
          <select name="select" id="">
            <option value="">選択してください</option>
            <option value="A3">A3</option>
            <option value="A4">A4</option>
            <option value="A5">A5</option>
            <option value="B3">B3</option>
            <option value="B4">B4</option>
            <option value="B5">B5</option>
            <option value="その他">その他</option>
            <option value="未定">未定</option>
          </select>
        </td>
      </tr>
      <tr class="input_dynamic input_01">
        <th>【任意】ホームページのURL</th>
        <td>
          <input type="url" name="homepage" placeholder="例) XXXX@sample.co.jp" class="">
        </td>
      </tr>
      <tr class="input_dynamic input_02">
        <th>【任意】配布物のサイズ (2)</th>
        <td>
          <select name="select" id="">
            <option value="">(02) 選択してください</option>
            <option value="02_A3">(02) A3</option>
            <option value="02_A4">(02) A4</option>
            <option value="02_A5">(02) A5</option>
            <option value="02_B3">(02) B3</option>
            <option value="02_B4">(02) B4</option>
            <option value="02_B5">(02) B5</option>
            <option value="02_その他">(02) その他</option>
            <option value="02_未定">(02) 未定</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>【任意】お問い合わせ内容</th>
        <td>
          <textarea name="content" id="" cols="30" rows="10"></textarea>
        </td>
      </tr>
    </table>
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
  $(".input_dynamic").hide().find("input, textarea, select").prop('disabled', true);
  $(".tabForm").find("input").each(function(){
    if($(this).is(":checked")) {
      $("." + $(this).next().data('input')).show().find("input, textarea, select").prop('disabled', false);
    }
  })
  $(".tabForm").on('click', 'label', function(event) {
    $(".input_dynamic").hide().find("input, textarea, select").prop('disabled', true);
    $("." + $(this).data('input')).show().find("input, textarea, select").prop('disabled', false);
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
