<?php
$thisPageName = 'amiida-life';
include(APP_PATH . 'libs/head.php');
$title_sg = get_the_title();
$desPage = mb_substr(preg_replace('/\r\n|\n|\r/','',strip_tags($post->post_content)),0,120);
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS; ?>css/page/amiidalife.min.css">
</head>
<body id="top" class='amiida-life'>
  <!-- HEADER -->
  <?php include(APP_PATH . 'libs/header.php'); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="wrap">
    <main style="padding-bottom:60px">
      <!-- code here -->
      <div style="width: 100%; background-color: #fff;">
        <div class="container" style="padding-top: 60px;">
          <?php if(have_rows('re')):
            while(have_rows('re')):the_row();
              $ttl = get_sub_field('re_ttl');
              $img = get_sub_field('re_img');
              // var_dump($img);
          ?>
          <div class="row">
            <div class="col-sm-8 col-sm-push-4 col-xs-9 col-xs-push-3">
              <div class="visible-xs" style="height: 100px;">
              </div>
              <img class="img-responsive slideup show" data-scroll-top="0" src="<?php echo $img['url'];?>">
              <?php if(!empty($ttl)){ ?>
                <p class="bold text-concept hidden-xs" style="top: 50px; left: -220px;"><?php echo $ttl; ?></p>
              <?php } ?>
            </div>
            <div class="col-sm-3 col-sm-pull-8 col-xs-5">
              <div class="visible-xs" style="height: 30px;">
              </div>
              <div class="hidden-xs" style="height: 350px;">
              </div>
              <img class="img-responsive slideup" data-scroll-top="100" src="<?php echo APP_ASSETS;?>img/amiidalife/_MI_0177.jpg">
            </div>
          </div><!-- /.row -->
          <?php endwhile;endif; ?>

          <div class="row" style="margin-top: 50px;">
            <div class="col-sm-7 col-sm-offset-1 col-xs-8">
              <div class="visible-xs" style="height: 100px;">
                <p class="bold text-concept" style="top: -10px; right: -80px;">お家で<span class="large">ゆったりと</span></p>
                <p class="bold text-concept" style="top: 35px; right: -90px;">過ごしていますか？</p>
              </div>

              <img class="img-responsive slideup" data-scroll-top="200" src="<?php echo APP_ASSETS;?>img/amiidalife/_MI_0790.jpg">
              <p class="bold text-concept hidden-xs" style="top: -50px; right: -220px;">お家で<span class="large">ゆったりと</span></p>
              <p class="bold text-concept hidden-xs" style="top: -10px; right: -260px;">過ごしていますか？</p>

              <div class="hidden-xs" style="position: absolute; top: -400px; right: -4px; width: 420px; height: 370px;">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 420 370" enable-background="new 0 0 420 370" xml:space="preserve">
                  <clipPath id="clip-path-conncept-1">
                    <rect class="clip-to-scroll" data-scroll-top="0" x="0" y="0" style="width:420px;"></rect>
                  </clipPath>
                  <line class="path" clip-path="url(#clip-path-conncept-1)" id="path-concept-1" fill="none" stroke="#920783" stroke-dasharray="5,5" data-scroll-top="3500" x1="20" y1="20" x2="400" y2="350">
                  </line>
                </svg>
                <div class="double-circle" style="top: 7px; left: 7px;">
                </div>
                <div class="double-circle" style="bottom: 7px; right: 7px;">
                </div>
              </div>
            </div>
            <div class="col-sm-2 col-sm-offset-1 col-xs-6 col-xs-offset-5">
              <div class="visible-xs" style="height: 50px;">
              </div>
              <div class="hidden-xs" style="height: 200px;">
              </div>
              <img class="img-responsive slideup" data-scroll-top="320" src="<?php echo APP_ASSETS;?>img/amiidalife/_MI_0177.jpg">
            </div>
          </div><!-- /.row -->

          <div class="row" style="margin-top: 100px;">
            <div class="col-sm-7 col-sm-push-5 col-xs-10 col-xs-push-2">
              <div class="visible-xs" style="height: 100px;">
                <p class="bold text-concept" style="top: -30px; left: -35px;">自分だけの空間<span class="large">“お家”</span>で
                </p>
                <p class="bold text-concept" style="top: 15px; left: 0px;">過ごす<span class="large">時間</span>を大事にしてほしい</p>
              </div>
              <img class="img-responsive slideup" data-scroll-top="400" src="<?php echo APP_ASSETS;?>img/amiidalife/_MI_0177.jpg">
              <p class="bold text-concept hidden-xs" style="top: 10px; left: -180px;">自分だけの空間<span class="large">“お家”</span>で</p>
              <p class="bold text-concept hidden-xs" style="top: 50px; left: -300px;">過ごす<span class="large">時間</span>を大事にしてほしい</p>

              <div class="hidden-xs" style="position: absolute; top: -450px; left: -50px; width: 420px; height: 460px;">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 420 460" enable-background="new 0 0 420 460" xml:space="preserve">
                  <clipPath id="clip-path-conncept-2">
                    <rect class="clip-to-scroll" data-scroll-top="320" x="0" y="0" style="width:420px;"></rect>
                  </clipPath>
                  <line class="path" clip-path="url(#clip-path-conncept-2)" id="path-concept-2" fill="none" stroke="#920783" stroke-dasharray="5,5" data-scroll-top="3500" x1="400" y1="20" x2="20" y2="440">
                  </line>
                </svg>
                <div class="double-circle" style="top: 7px; right: 7px;">
                </div>
                <div class="double-circle" style="bottom: 7px; left: 7px;">
                </div>
              </div>

            </div>
            <div class="col-sm-4 col-sm-pull-7 col-xs-6">
              <div class="visible-xs" style="height: 30px;">
              </div>
              <div class="hidden-xs" style="height: 230px;">
              </div>
              <img class="img-responsive slideup" data-scroll-top="630" src="<?php echo APP_ASSETS;?>img/amiidalife/_MI_0177.jpg">
            </div>
          </div><!-- /.row -->

          <div class="hidden-xs" style="height: 30px;">
          </div>

          <div class="row" style="margin-top: 50px;">
                  <div class="col-sm-6 col-sm-offset-1 col-xs-9 col-xs-offset-2">
                    <div class="visible-xs" style="height: 150px;">
                      <p class="bold text-concept" style="top: -10px; left: -20px;">私たちKitchen Kitchenは</p>
                      <p class="bold text-concept" style="top: 20px; right: 0px; width: 300px;"><span class="large">「家カフェしよう」</span></p>
                      <p class="bold text-concept" style="top: 65px; left: 10px;">をテーマに</p>
                    </div>
                    <img class="img-responsive slideup" data-scroll-top="1730" src="<?php echo APP_ASSETS;?>img/amiidalife/_MI_0177.jpg">
                    <p class="bold text-concept hidden-xs" style="top: -100px; right: -40px;">私たちKitchen Kitchenは</p>
                    <p class="bold text-concept hidden-xs" style="top: -70px; right: -180px;"><span class="large">「家カフェしよう」</span>をテーマに</p>

                    <div class="hidden-xs" style="position: absolute; top: -430px; right: 30px; width: 220px; height: 310px;">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 220 310" enable-background="new 0 0 220 310" xml:space="preserve">
                        <clipPath id="clip-path-conncept-3" >
                          <rect class="clip-to-scroll" data-scroll-top="730" x="0" y="0" style="width:220px;" ></rect>
                        </clipPath>
                        <line class="path" clip-path="url(#clip-path-conncept-3)" id="path-concept-3" fill="none" stroke="#920783" stroke-dasharray="5,5" data-scroll-top="3500" x1="20" y1="20" x2="200" y2="290"></line>
                      </svg>
                      <div class="double-circle" style="top: 7px; left: 7px;">
                      </div>
                      <div class="double-circle" style="bottom: 7px; right: 7px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3 col-sm-offset-1 col-xs-6 col-xs-offset-6">
                    <div class="visible-xs"style="height: 30px;">
                    </div>
                    <div class="hidden-xs"style="height: 130px;">
                    </div>
                    <img class="img-responsive slideup" data-scroll-top="830" src="<?php echo APP_ASSETS;?>img/amiidalife/_MI_0177.jpg">
                  </div>
                </div><!-- /.row -->

                <div class="hidden-xs"style="height: 70px;">
                </div>

                <div class="row" style="margin-top: 50px;">
                  <div class="col-sm-9">
                    <div class="visible-xs" style="height: 150px;">
                      <p class="bold text-concept" style="top: -10px; left: 50px;">お家で過ごす</p>
                      <p class="bold text-concept" style="top: 30px; left: 20px;"><span class="large">ここちいい時間</span>をつくる</p>
                      <p class="bold text-concept" style="top: 85px; left: 95px;">お手伝いができればと考え、</p>
                    </div>

                    <img class="img-responsive slideup" data-scroll-top="950" src="<?php echo APP_ASSETS;?>img/amiidalife/_MI_0177.jpg">
                    <p class="bold text-concept hidden-xs" style="top: -170px; left: 340px;">お家で過ごす</p>
                    <p class="bold text-concept hidden-xs" style="top: -140px; left: 280px;"><span class="large">ここちいい時間</span>をつくる</p>
                    <p class="bold text-concept hidden-xs" style="top: -95px; left: 400px;">お手伝いができればと考え、</p>

                    <div class="hidden-xs" style="position: absolute; top: -470px; right: 140px; width: 270px; height: 300px;">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 270 370" enable-background="new 0 0 270 370" xml:space="preserve">
                        <clipPath id="clip-path-conncept-4" >
                          <rect class="clip-to-scroll" data-scroll-top="950" x="0" y="0" style="width:270px;" ></rect>
                        </clipPath>
                        <line class="path" clip-path="url(#clip-path-conncept-4)" id="path-concept-4" fill="none" stroke="#920783" stroke-dasharray="5,5" data-scroll-top="3500" x1="250" y1="20" x2="20" y2="280"></line>
                      </svg>
                      <div class="double-circle" style="top: 7px; right: 7px;">
                      </div>
                      <div class="double-circle" style="bottom: 7px; left: 7px;">
                      </div>
                    </div>

                    <p class="bold text-concept hidden-xs" style="bottom: 5px; right: -85px;"><span class="large">たくさん</span>の</p>
                    <p class="bold text-concept hidden-xs" style="bottom: -20px; right: -210px;">キッチン・インテリア雑貨を</p>
                    <p class="bold text-concept hidden-xs" style="bottom: -50px; right: -145px;">とり揃えています。</p>

                    <div class="hidden-xs" style="position: absolute; top: -50px; right: -40px; width: 350px; height: 430px;">
                      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 350 430" enable-background="new 0 0 350 430" xml:space="preserve">
                        <clipPath id="clip-path-conncept-5">
                          <rect class="clip-to-scroll" data-scroll-top="1000" x="0" y="0" style="width:350px;" ></rect>
                        </clipPath>
                        <line class="path" clip-path="url(#clip-path-conncept-5)" id="path-concept-5" fill="none" stroke="#920783" stroke-dasharray="5,5" data-scroll-top="3500" x1="20" y1="20" x2="330" y2="410"></line>
                      </svg>
                      <div class="double-circle" style="top: 7px; left: 7px;">
                      </div>
                      <div class="double-circle" style="bottom: 7px; right: 7px;">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="hidden-xs"style="height: 200px;"></div>

    </main>
  </div> 
  <?php endwhile; endif; ?>
  <?php include(APP_PATH . 'libs/footer.php'); ?>
  <script src="<?php echo APP_ASSETS ?>js/page/amiidalife.min.js"></script>
</body>
</html>