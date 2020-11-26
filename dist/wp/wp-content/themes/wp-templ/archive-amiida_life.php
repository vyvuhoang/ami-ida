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
      <?php $ttl= array("<em>仕事に子育て</em>など、、<br>追われるように過ぎていく<br>あっという間の毎日","ふと、イライラしている自分に気付く。<br>ワタシ、<em>心にゆとり</em>がなくなって<br>しまっている、、？","最近通い始めたアミーダは、<br>溶岩石で<em>身体を温める</em>ヨガ。<br>忙しい日々の中でも、<br>なぜか<em>通い続ける</em>ことができている","アミーダの溶岩ヨガで習った、<br><em>“呼吸”</em>が、心のバランスを<br>整えることを知った。<br>ストレスを感じづらくなったのは<br>呼吸のおかげかもしれない。","アミーダの溶岩石には、<br>保温と発汗作用の効果がある。<br>「<em>深い呼吸</em>」が身体だけでなく、<br>毎日の心まで健康にしてくれた。");
      for($i=0;$i<count($ttl);$i++){ ?>
      <div class="item inview fadeInBottom">
        <div class="item__img">
          <div class="item--ttl sp">
            <a href="" class="ttl1"><?php echo $ttl[$i]; ?></a>
          </div>
          <div class="img lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/amiidalife/img<?php echo $i+1; ?>.jpg)"></div>
        </div>
        <div class="item__info">
          <div class="item--ttl pc">
            <a href="" class="ttl1"><?php echo $ttl[$i]; ?></a>
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