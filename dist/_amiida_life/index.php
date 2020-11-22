<?php
$thisPageName = 'studio';
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/amiida_life.min.css">
</head>
<body id="amiidalife" class="amiidalife">
<!-- HEADER -->
<?php include(APP_PATH.'libs/header.php'); ?>
<div id="wrap">
  <div class="visual">
    <div class="bg" data-parallax='{"y": -70, "smoothness": 10}'></div>
    <div class="visual">
      <div class="visual__scroll">
        <a href="#breadcrumb" class="visual__scroll--btn"><span>scroll</span></a>
      </div>
      <div class="visual__txt">
        <picture>
          <source srcset="<?php echo APP_ASSETS; ?>img/common/visual_txt_sp.svg" media="(max-width: 767px)">
          <img src="<?php echo APP_ASSETS; ?>img/common/visual_txt.svg" alt="Amiida">
        </picture>
      </div>
    </div>
  </div>
</div> 
<?php include(APP_PATH.'libs/footer.php'); ?>
</body>
</html>