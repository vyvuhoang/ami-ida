<?php
$thisPageName = 'amiida-life';
include_once(dirname(__FILE__) . '../../app_config.php');
include(APP_PATH . 'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_URL ?>amiida_life/style.css">
</head>

<body id="top" class='amiida-life'>
  <!-- HEADER -->
  <?php include(APP_PATH . 'libs/header.php'); ?>
  <script type="text/javascript">
    window._wpemojiSettings = {
      "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/",
      "ext": ".png",
      "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/",
      "svgExt": ".svg",
      "source": {
        "concatemoji": "http:\/\/www.kitchen-kitchen.jp\/wordpress\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.9.16"
      }
    };
    ! function(a, b, c) {
      function d(a, b) {
        var c = String.fromCharCode;
        l.clearRect(0, 0, k.width, k.height), l.fillText(c.apply(this, a), 0, 0);
        var d = k.toDataURL();
        l.clearRect(0, 0, k.width, k.height), l.fillText(c.apply(this, b), 0, 0);
        var e = k.toDataURL();
        return d === e
      }

      function e(a) {
        var b;
        if (!l || !l.fillText) return !1;
        switch (l.textBaseline = "top", l.font = "600 32px Arial", a) {
          case "flag":
            return !(b = d([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819])) && (b = d([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]), !b);
          case "emoji":
            return b = d([55358, 56760, 9792, 65039], [55358, 56760, 8203, 9792, 65039]), !b
        }
        return !1
      }

      function f(a) {
        var c = b.createElement("script");
        c.src = a, c.defer = c.type = "text/javascript", b.getElementsByTagName("head")[0].appendChild(c)
      }
      var g, h, i, j, k = b.createElement("canvas"),
        l = k.getContext && k.getContext("2d");
      for (j = Array("flag", "emoji"), c.supports = {
          everything: !0,
          everythingExceptFlag: !0
        }, i = 0; i < j.length; i++) c.supports[j[i]] = e(j[i]), c.supports.everything = c.supports.everything && c.supports[j[i]], "flag" !== j[i] && (c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && c.supports[j[i]]);
      c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && !c.supports.flag, c.DOMReady = !1, c.readyCallback = function() {
        c.DOMReady = !0
      }, c.supports.everything || (h = function() {
        c.readyCallback()
      }, b.addEventListener ? (b.addEventListener("DOMContentLoaded", h, !1), a.addEventListener("load", h, !1)) : (a.attachEvent("onload", h), b.attachEvent("onreadystatechange", function() {
        "complete" === b.readyState && c.readyCallback()
      })), g = c.source || {}, g.concatemoji ? f(g.concatemoji) : g.wpemoji && g.twemoji && (f(g.twemoji), f(g.wpemoji)))
    }(window, document, window._wpemojiSettings);
  </script>
  <div id="wrap">
    <main style="padding-bottom:60px">
      <!-- code here -->
      <div style="width: 100%; background-color: #fff;">
        <div class="container" style="padding-top: 60px;">
          <div class="row">
            <div class="col-sm-8 col-sm-push-4 col-xs-9 col-xs-push-3">
              <div class="visible-xs" style="height: 100px;">
                <p class="bold text-concept" style="top: -30px; left: -50px;">めまぐるしく<span class="large">過ぎていく</span></p>
                <p class="bold text-concept" style="top: 18px; left: 110px;"><span class="large">日々</span>のなか。</p>
              </div>
              <img class="img-responsive slideup show" data-scroll-top="0" src="<?php echo APP_URL;?>amiida_life/images/_MI_0048.jpg">
              <p class="bold text-concept hidden-xs" style="top: 50px; left: -220px;">めまぐるしく<span class="large">過ぎていく</span></p>
              <p class="bold text-concept hidden-xs" style="top: 90px; left: -35px;"><span class="large">日々</span>のなか。
              </p>
            </div>
            <div class="col-sm-3 col-sm-pull-8 col-xs-5">
              <div class="visible-xs" style="height: 30px;">
              </div>
              <div class="hidden-xs" style="height: 350px;">
              </div>
              <img class="img-responsive slideup" data-scroll-top="100" src="<?php echo APP_URL;?>amiida_life/images/_MI_0177.jpg">
            </div>
          </div><!-- /.row -->

          <div class="row" style="margin-top: 50px;">
            <div class="col-sm-7 col-sm-offset-1 col-xs-8">
              <div class="visible-xs" style="height: 100px;">
                <p class="bold text-concept" style="top: -10px; right: -80px;">お家で<span class="large">ゆったりと</span></p>
                <p class="bold text-concept" style="top: 35px; right: -90px;">過ごしていますか？</p>
              </div>

              <img class="img-responsive slideup" data-scroll-top="200" src="<?php echo APP_URL;?>amiida_life/images/魅力6_MI_0790.jpg">
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
              <img class="img-responsive slideup" data-scroll-top="320" src="<?php echo APP_URL;?>amiida_life/images/_MI_0177.jpg">
            </div>
          </div><!-- /.row -->

          <div class="row" style="margin-top: 100px;">
            <div class="col-sm-7 col-sm-push-5 col-xs-10 col-xs-push-2">
              <div class="visible-xs" style="height: 100px;">
                <p class="bold text-concept" style="top: -30px; left: -35px;">自分だけの空間<span class="large">“お家”</span>で
                </p>
                <p class="bold text-concept" style="top: 15px; left: 0px;">過ごす<span class="large">時間</span>を大事にしてほしい</p>
              </div>
              <img class="img-responsive slideup" data-scroll-top="400" src="<?php echo APP_URL;?>amiida_life/images/_MI_0177.jpg">
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
              <img class="img-responsive slideup" data-scroll-top="630" src="<?php echo APP_URL;?>amiida_life/images/_MI_0177.jpg">
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
                    <img class="img-responsive slideup" data-scroll-top="1730" src="<?php echo APP_URL;?>amiida_life/images/_MI_0177.jpg">
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
                    <img class="img-responsive slideup" data-scroll-top="830" src="<?php echo APP_URL;?>amiida_life/images/_MI_0177.jpg">
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

                    <img class="img-responsive slideup" data-scroll-top="950" src="<?php echo APP_URL;?>amiida_life/images/_MI_0177.jpg">
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
  </div> <!-- #wrap -->
  <!-- FOOTER -->
  <?php include(APP_PATH . 'libs/footer.php'); ?>
  <script src="<?php echo APP_URL ?>amiida_life/assets/js/page/top.min.js"></script>
  <script src="<?php echo APP_URL ?>amiida_life/js/script.js"></script>
</body>

</html>