<?php
$thisPageName = 'information';
include_once('../app_config.php');
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/information.min.css">
</head>
<body class="information">
  <?php include(APP_PATH.'libs/header.php');?>
  <main id="wrap">
    <div class="banner">
      <div class="banner-txt wcm">
        <img src="<?php echo APP_ASSETS; ?>img/information/banner_txt.svg" alt="information" width="330">
      </div>
    </div>
    <div class="wcm">
      <div class="the-title">感染拡大予防ガイドラインに沿った <br class="pc">安全衛生管理について</div>
      <p class="c-txt">お客様がより安全にスタジオにお通いいただけるよう、感染拡大予防ガイドラインに沿って、以下のソーシャルディスタンスを含む、安全衛生管理を強化したオペレーションに変更いたします。</p>
      <div class="etr">
        <div class="etr__ttl"><em>“コロナ対策”受付にて</em></div>
        <div class="inner">
          <?php  $ttl = array("フロントには飛沫防止シート、またはパーテーションを設置","フロント、店内でのマスク着用","入店いただく際の<br class='sp'>手指消毒","健康チェックシートを利用<br class='pc'>しての体調管理確認","ロッカーキーの直接<br>の受け渡しを廃止","会員証の直接の受け渡しを廃止");
          for($i=0;$i<count($ttl);$i++){ ?>
          <div class="etr__item">
            <div class="etr__item--img">
              <img src="<?php echo APP_ASSETS; ?>img/information/step1_<?php echo $i+1; ?>.svg" alt="">
            </div>
            <div class="etr__item--info">
              <p class="num"><?php echo $i+1; ?></p>
              <p class="ttl"><?php echo $ttl[$i]; ?></p>
            </div>
          </div>
          <?php } ?>  
        </div>
        <div class="etr__ttl"><em>“コロナ対策”スタジオにて</em></div>
        <div class="inner inner02">
          <?php  $ttl2 = array("身体に触れてのアジャストは<br class='pc'>おこなっておりません","一定の室温を保ちながら、自動換気システムを通常作動しております","毎レッスン後にスタジオ・更衣室・お手洗い消毒の徹底","スタジオ内の私語はご遠慮ください","インストラクターは、<br>対面にならないようにレッスンを<br class='pc'>おこなっております","インストラクターはマスクもしくはマウスシールドを着用");
          for($i=0;$i<count($ttl2);$i++){ ?>
          <div class="etr__item">
            <div class="etr__item--img">
              <img src="<?php echo APP_ASSETS; ?>img/information/step2_<?php echo $i+1; ?>.svg" alt="">
            </div>
            <div class="etr__item--info">
              <p class="num"><?php echo $i+1; ?></p>
              <p class="ttl"><?php echo $ttl2[$i]; ?></p>
            </div>
          </div>
          <?php } ?>  
        </div>
        <div class="etr__ttl"><em>“コロナ対策”会員の皆さまにお願い</em></div>
        <div class="inner inner03">
          <?php  $ttl3 = array("ご来店や店内ではマスクの<br>着用をお願いします","風邪症状や発熱がある場合はご来店をお控えいただきますようお願いします","ご自分が使った、触った箇所の消毒清掃を積極的にお願いしております","ロッカ内での私語はマスク着用のもとお願いします");
          for($i=0;$i<count($ttl3);$i++){ ?>
          <div class="etr__item">
            <div class="etr__item--img">
              <img src="<?php echo APP_ASSETS; ?>img/information/step3_<?php echo $i+1; ?>.svg" alt="">
            </div>
            <div class="etr__item--info">
              <p class="num"><?php echo $i+1; ?></p>
              <p class="ttl"><?php echo $ttl3[$i]; ?></p>
            </div>
          </div>
          <?php } ?>  
        </div>
      </div>
    </div>
  </main>
  <?php include(APP_PATH.'libs/footer.php');?>
</body>
</html>