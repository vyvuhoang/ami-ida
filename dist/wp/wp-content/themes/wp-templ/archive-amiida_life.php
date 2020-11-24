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
    <div class="amiidalife-lst">
      <?php for($i=0;$i<4;$i++){ ?>
      <div class="item inview fadeInBottom">
        <div class="item__img">
          <div class="item--ttl sp">
            <a href="" class="ttl1"><em>仕事に子育て</em>など、、<br>追われるように過ぎていく<br>あっという間の毎日</a>
          </div>
          <div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/amiidalife/img<?php echo $i+1; ?>.jpg)"></div>
        </div>
        <div class="item__info">
          <div class="item--ttl pc">
            <a href="" class="ttl1"><em>仕事に子育て</em>など、、<br>追われるように過ぎていく<br>あっという間の毎日</a>
          </div>
          <div class="item__info--space"></div>
          <div class="item__info--img">
            <div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/amiidalife/img<?php echo ($i+1).'_'.($i+1); ?>.jpg)"></div>
          </div>
        </div>
        <div class="line">
          <div class="space"> </div>
          <div class="inner">
            <div class="circle1"></div><div class="circle2"></div>
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