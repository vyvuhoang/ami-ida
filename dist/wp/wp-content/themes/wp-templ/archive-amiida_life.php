<?php
$thisPageName = 'amiida-life';
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/amiida_life.min.css">
</head>
<body id="amiida-life" class="amiida-life">
<?php include(APP_PATH.'libs/header.php'); ?>
<main id="wrap">
  <div class="banner">
    <div class="banner-txt wcm">
      <img src="<?php echo APP_ASSETS; ?>img/amiidalife/visual_txt.svg" alt="AMIIDALIFE" width="293">
    </div>
  </div>
  <div class="breadcrumb wcm" id="breadcrumb">
    <li><a href="<?php echo APP_URL; ?>">
      <img src="<?php echo APP_ASSETS; ?>img/common/icon/ico_home.svg" alt="HOME" width="24">
    </a></li>
    <li><p>アミーダライフ </p></li>
  </div>
  <div class="amiidalife wcm">
    <!-- <h2 class="the-title pc">体験レッスン受付中のスタジオ一覧</h2> -->
    <div class="amiidalife-lst">
      <?php for($i=0;$i<5;$i++){ ?>
      <div class="item">
        <div class="item__img">
          <a href="" class="item__info--ttl sp">
            <p class="ttl1">ここに、アミーダの<br>あるライフスタイルを</p>
            <p class="ttl2">引き立てるようなキャッチが入ります。</p>
          </a>
          <div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/amiidalife/img1.jpg)"></div>
        </div>
        <div class="item__info">
          <div class="item__info--space"></div>
          <a href="" class="item__info--ttl pc">
            <p class="ttl1">ここに、アミーダの<br>あるライフスタイルを</p>
            <p class="ttl2">引き立てるようなキャッチが入ります。</p>
          </a>
          <div class="item__info--space"></div>
          <div class="item__info--img">
            <div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/amiidalife/img2.jpg)"></div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</main>
<?php include(APP_PATH.'libs/footer.php'); ?>
<script src="<?php echo APP_ASSETS ?>js/page/amiidalife.min.js"></script>
</body>
</html>