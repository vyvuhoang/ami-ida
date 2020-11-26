<?php
$thisPageName = 'single-studio';
$thisStudioID = get_the_ID();
$pslug = $post->post_name;
if(!empty($_POST['actionFlag'])) {
  include_once('single-studio-confirm.php');
  exit();
} elseif(!empty(get_query_var('actionFlag'))) {
  if(get_query_var('actionFlag') == 'complete') {
    include_once('single-studio-complete.php');
    exit();
  } else header('location: '.get_the_permalink());
}

include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/lib/simplebar.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/style.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/form/validationEngine.jquery.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/single-studio.min.css">
</head>
<body id="single-studio" class="single-studio">
<?php include(APP_PATH.'libs/header.php'); ?>
<div id="wrap">
  <?php if (have_posts()) :
    while (have_posts()) : the_post();
    $fields = get_fields();
  ?>
  <main>
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
    <div class="breadcrumb wcm" id="breadcrumb">
      <li><a href="<?php echo APP_URL; ?>">
        <img src="<?php echo APP_ASSETS; ?>img/common/icon/ico_home.svg" alt="HOME" width="24">
      </a></li>
      <li><a href="<?php echo APP_URL; ?>studio/">店舗ページ</a></li>
      <li><p><?php echo get_the_title(); ?></p></li>
    </div>
    <div class="c-news inview fadeInBottom">
      <div class="wcm">
        <p class="c-news__ttl">NEWS</p>
        <div class="c-news__lst">
          <a href="" class="c-news__lst--item">
            <p class="date">2020/10/10</p>
            <p class="cat"><em>お知らせ</em></p>
            <p class="ttl"><em>【本社へのお問合せにつきまして】【本社へのお問合せにつきまして】【本社へのお問合せにつきまして】【本社へのお問合せにつきまして】</em></p>
          </a>
          <a href="" class="c-news__lst--item">
            <p class="date">2020/10/09</p>
            <p class="cat"><em>お知らせ</em></p>
            <p class="ttl"><em>【本社へのお問合せにつきまして】</em></p>
          </a>
          <a href="" class="c-news__lst--item">
            <p class="date">2020/10/08</p>
            <p class="cat"><em>お知らせ</em></p>
            <p class="ttl"><em>【本社へのお問合せにつきまして】</em></p>
          </a>
        </div>
      </div>
    </div>
    <div class="sec-intro inview fadeInBottom">
      <div class="container-1080">
        <h3 class="the-title">12月限定！<br><?php echo get_the_title(); ?>店の入会特典!</h3>
        <div class="gr">
          <div class="inside">
            <ul class="lst-intro">
              <li class="item">
                <div class="txt">
                  <p class="txt01">入会特典<br>月額会費</p>
                  <p class="txt02">半額</p>
                </div>
              </li>
              <li class="item">
                <div class="txt">
                  <p class="txt01">入会特典<br>入会金</p>
                  <p class="price">
                    <span class="number">0</span>
                    <span class="unit">円</span>
                  </p>
                </div>
              </li>
              <li class="item">
                <div class="txt">
                  <p class="txt01">入会特典<br>水素飲み放題</p>
                  <p class="price">
                    <span class="number">0</span>
                    <span class="unit">円</span>
                  </p>
                </div>
              </li>
            </ul>
          </div>
          <div class="bg">
            <img class="lazy img" data-src="<?php echo APP_ASSETS; ?>img/studio/img_yoga.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="sec-btns inview fadeInBottom">
      <div class="container-900">
        <a href="" class="btn"><span>WEB入会金受付はこちら</span></a>
        <a href="#anchor04" class="btn"><span>体験レッスンへのご参加はこちら</span></a>
      </div>
    </div>
    <div class="sec-charge" id="anchor01">
      <div class="container-900">
        <h3 class="the-title inview fadeInBottom">プラン・料金のご説明</h3>
        <ul class="lst-price js-lst-price inview fadeInBottom">
          <li class="item">
            <h4 class="item-ttl js-price-ttl">
              <span class="txt01">料金プラン</span>
            </h4>
            <div class="tbl js-price-tbl">
              <div class="row">
                <p class="th">月額会費</p>
                <div class="td">
                  <p class="td01">19,800円 </p>
                  <p class="td02">※通い放題&溶岩浴利用も可能</p>
                </div>
              </div>
            </div>
          </li>
          <li class="item">
            <h4 class="item-ttl js-price-ttl">
              <span class="txt01">オプションサービス</span>
            </h4>
            <div class="tbl js-price-tbl">
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円/月</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
              <div class="row">
                <p class="th">タオル</p>
                <div class="td">
                  <p class="td01">1,000円/月</p>
                  <p class="td02"> 1日1回、バスタオル1枚とフェイスタオル1枚がご利用可能
                </div>用可能</p>
              </div>
              <div class="row">
                <p class="th">マットお預かり</p>
                <div class="td">
                  <p class="td01">1,000円/月</p>
                  <p class="td02">ヨガマットお預かり</p>
                </div>
              </div>
            </div>
          </li>
          <li class="item">
            <h4 class="item-ttl js-price-ttl">
              <span class="txt01">購入できるもの(※一部店舗)</span>
            </h4>
            <div class="tbl js-price-tbl">
              <div class="row">
                <p class="th">溶岩ヨガ専用マット</p>
                <div class="td">
                  <p class="td01">12,000円</p>
                  <p class="td02">(サイズ 174cm×61cm×5cm)</p>
                </div>
              </div>
              <div class="row">
                <p class="th">ラグ</p>
                <div class="td">
                  <p class="td01">3,900円</p>
                </div>
              </div>
              <div class="row">
                <p class="th">マットトラップ</p>
                <div class="td">
                  <p class="td01">900円</p>
                </div>
              </div>
              <div class="row">
                <p class="th">アミーダセット</p>
                <div class="td">
                  <p class="td01">13,500円</p>
                </div>
              </div>
              <div class="row">
                <p class="th">水素水ボトル</p>
                <div class="td">
                  <p class="td01">800円</p>
                </div>
              </div>
            </div>
          </li>
          <li class="item">
            <h4 class="item-ttl js-price-ttl">
              <span class="txt01">レンタルできるもの</span>
              <span class="txt02">(※一部店舗)</span>
            </h4>
            <div class="tbl js-price-tbl">
              <div class="row">
                <p class="th">ウェアー(上)</p>
                <div class="td">
                  <p class="td01">6,800円/月</p>
                </div>
              </div>
              <div class="row">
                <p class="th">ウェアー(下)</p>
                <div class="td">
                  <p class="td01">6,800円/月</p>
                </div>
              </div>
              <div class="row">
                <p class="th">ウェアー上下セット</p>
                <div class="td">
                  <p class="td01">13,600円/月・750円/日</p>
                </div>
              </div>
              <div class="row">
                <p class="th">アミーダセット <br>+ウェアー上下セット</p>
                <div class="td">
                  <p class="td01">28,100円</p>
                </div>
              </div>
              <div class="row">
                <p class="th">タオルセット <br>(フェイスタオル・バスタオル)</p>
                <div class="td">
                  <p class="td01">350円</p>
                </div>
              </div>
              <div class="row">
                <p class="th">ヨガマット</p>
                <div class="td">
                  <p class="td01">300円</p>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <p class="script">※体験料以外の表示価格は全て税抜きとなります。水素水のみ消費税8％</p>
      </div>
    </div>

<!--     <div class="sec-feeling">
      <div class="container-900">
        <h3 class="the-title inview fadeInBottom">アミーダの<br class="sp">溶岩ホットヨガで、<br>感じられている効果</h3>
        <ul class="lst-feeling">
          <li class="item inview fadeInBottom">
            <div class="img"><img src="<?php //echo APP_ASSETS;?>img/studio/img05.png" alt=""></div>
            <div class="name">体質・体型が変わった<br>の円グラフ</div>
          </li>
          <li class="item inview fadeInBottom">
            <div class="img"><img src="<?php //echo APP_ASSETS;?>img/studio/img05.png" alt=""></div>
            <div class="name">体質・体型が変わった<br>の円グラフ</div>
          </li>
          <li class="item inview fadeInBottom">
            <div class="img"><img src="<?php //echo APP_ASSETS;?>img/studio/img05.png" alt=""></div>
            <div class="name">体質・体型が変わった<br>の円グラフ</div>
          </li>
        </ul>
      </div>
    </div> -->
    <div class="sec-voice">
      <div class="slider js-voice-slider">
        <?php for($i=0;$i<7;$i++){ ?>
          <div class="item inview fadeInBottom" style="background-image: url(<?php echo APP_ASSETS; ?>img/top/slide<?php echo $i+1; ?>.jpg);"></div>
        <?php } ?>
      </div>
      <h3 class="the-title">アミーダの<br class="sp">溶岩ホットヨガを<br>選ぶお客様のお声</h3>
      <div class="container-1080">
        <?php include(APP_PATH.'libs/voice.php'); ?>
      </div>
      <div class="sec-btns inview fadeInBottom">
        <div class="container-900">
          <a href="" class="btn"><span>WEB入会金受付はこちら</span></a>
          <a href="#anchor04" class="btn"><span>体験レッスンへのご参加はこちら</span></a>
        </div>
      </div>
    </div>
    <div class="feature wcm">
      <h3 class="the-title inview fadeInBottom">アミーダ<?php echo get_the_title(); ?>店が選ばれる理由</h3>
      <div class="feature__lst">
        <?php $feature = array("未経験・初心者でも<br>安心の少人数制レッスン","天然溶岩石の<br>スタジオ","通いやすい<br>女性専用スタジオ<br>※有明店を除く","レベルの高い<br>インストラクター","清潔感のある<br>キレイな施設・スタジオ");
        for($i=0;$i<count($feature);$i++){ ?>
          <div class="feature__lst--item lazy" data-bg="url(<?php echo APP_ASSETS; ?>img/studio/feature<?php echo $i+1; ?>.jpg)">
          <p class="ttl"><?php echo $feature[$i]; ?></p>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="sec-schedule" id="anchor03">
      <div class="container-1080">
        <h3 class="the-title inview fadeInBottom">アミーダ<?php echo get_the_title(); ?>店<br>レッスンスケジュール</h3>
        <div class="schedule js-schedule inview fadeInBottom"></div>
      </div>
    </div>
    <div class="sec-lesson">
      <div class="container-900">
        <div class="the-title inview fadeInBottom">アミーダ<?php echo get_the_title(); ?>店<br>レッスン内容</div>
        <div class="etr">
          <?php $lesson_master_arr = array();
            $wp_lesson_master = new WP_Query();
            $param_lesson_master = array(
              'post_type'=>'lesson_master',
              'order' => 'DESC',
              'posts_per_page' => '-1',
            );
            $wp_lesson_master->query($param_lesson_master);
            if($wp_lesson_master->have_posts()){
              while($wp_lesson_master->have_posts()){
                $wp_lesson_master->the_post();
          ?>
          <div class="etr__item inview fadeInBottom">
            <div class="etr__item--img">
              <div class="img lazy" data-bg="url(<?php echo APP_ASSETS;?>img/studio/img11.jpg)"></div>
            </div>
            <div class="etr__item--info">
              <p class="ttl"><?php echo get_the_title();?></p>
              <p class="txt"><?php echo get_field('lesson_content');?></p>
            </div>
          </div>
          <?php }} ?>
        </div>
      </div>
    </div>
    <div class="sec-form" id="anchor04">
      <div class="container-750">
        <h3 class="the-title inview fadeInBottom">アミーダ<?php echo get_the_title(); ?>店<br>体験レッスン申込みフォーム</h3>
        <form method="post" class="studioform inview fadeInBottom" id="studioform" action="confirm/?g=<?php echo time() ?>" name="studioform">
          <div class="stepImg">
            <picture>
              <source media="(max-width: 767px)" srcset="<?php echo APP_ASSETS; ?>img/common/form/img_step01SP.svg">
              <img src="<?php echo APP_ASSETS; ?>img/common/form/img_step01.svg" alt="フォームからのお問い合わせ　Step">
            </picture>
          </div>
          <p class="hid_url">Leave this empty: <input type="text" name="url"></p><!-- Anti spam part1: the contact form -->
          <table class="tableContact">
            <tr>
              <th>体験内容</th>
              <td>
                <input type="hidden" name="single_ttl" id="single_ttl" class="input-lesson" value="">
                <input type="hidden" name="studio_slug" id="studio_slug" value="<?php echo $pslug;?>">
                <input type="hidden" name="studio_id" id="studio_id" value="<?php echo $thisStudioID;?>">
                <input type="hidden" name="instructor" id="instructor" class="input-instructor" value="">
                <input placeholder="例) 初心者レッスン" type="text" name="single_ttl" id="single_ttl" class="input-lesson validate[required]" value="" readonly>
                <span class="note">※レッスンスケジュールから、体験するレッスンを選択してください</span>
              </td>
            </tr>
            <tr>
              <th>体験希望日</th>
              <td>
                <p class="half">
                  <input placeholder="例) 2020/10/10" type="text" name="hopedate" id="hopedate" class="validate[required] input-date" value="" readonly>
                </p>
                <p class="half">
                  <input placeholder="例) 10:00 - 10:45" type="text" name="hopetime" id="hopetime" class="validate[required] input-time" value="" readonly>
                </p>
                <span class="note">※レッスンスケジュールから、体験するレッスンを選択してください</span>
              </td>
            </tr>
            <tr>
              <th>お名前</th>
              <td><input placeholder="例)田中 花子" type="text" name="nameuser" id="nameuser" class="validate[required]"></td>
            </tr>
            <tr>
              <th>お名前（ふりがな）</th>
              <td><input placeholder="例：たなか はなこ" type="text" name="nameuser_furigana" id="nameuser_furigana" class="validate[required,custom[furigana]]"></td>
            </tr>
            <tr>
              <th class="norequire">年齢</th>
              <td>
                <p class="half fullsp">
                  <select name="age" id="age">
                    <option value="">選択してください</option>
                    <?php for($i=10;$i<=120;$i++){?>
                      <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php }?>
                  </select>
                </p>
              </td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td><input placeholder="例) 03-1234-5678" type="tel" name="tel" id="tel" class="validate[required,custom[phone]]"></td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td><input placeholder="例：abc@efg.jp（半角英数字）" type="email" name="email" id="email" class="validate[required,custom[email]]"></td>
            </tr>
            <tr>
              <th>メールアドレス(確認)</th>
              <td>
                <input placeholder="例：abc@efg.jp（半角英数字）" type="email"  name="cemail" id="cemail" value="" class="validate[equals[email]]">
                <p class="row">
                  <textarea name="content" id="content" placeholder="ご質問内容をご記入ください"></textarea>
                </p>
              </td>
            </tr>
          </table>
          <p class="btn-row">
            <button id="btnConfirm" class="btn-confirm"><span>体験申込み 確認画面へ</span></button>
            <input type="hidden" name="actionFlag" value="confirm">
          </p>
        </form>
      </div>
    </div>
    <div class="sec-stuff">
      <div class="container-1080">
        <h3 class="the-title inview fadeInBottom">体験レッスンに<br class="sp">必要な物追加</h3>
        <ul class="lst-stuff">
          <li class="item inview fadeInBottom">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img02.jpg" alt="手ぶらでOK"></div>
            <h4 class="item-ttl">手ぶらでOK</h4>
            <p class="item-txt">必要なものは全てご用意しています。 身軽だから気軽に通いやすいのが特徴です。<br>※キャミソール(カップ付き)かTシャツのいずれかになります。 ※店舗により異なります。<br>ロレンタルウェア上下 セバスタオル<br>フェイスタオル 四水550ml×2本 四ヨガマット</p>
          </li>
          <li class="item inview fadeInBottom">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img03.jpg" alt="好きな時間に 通えます"></div>
            <h4 class="item-ttl">好きな時間に 通えます</h4>
            <p class="item-txt">昼間に自由時間がある方にも、 仕事で遅くなりがちな方にも、 通いやすいのが魅力です。<br>※レッスン時間はスタジオ・曜日によって異なります。<br>詳しくはスタジオ詳細でご確認ください。</p>
          </li>
          <li class="item inview fadeInBottom">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img04.jpg" alt="女性専用 スタジオ"></div>
            <h4 class="item-ttl">女性専用 スタジオ</h4>
            <p class="item-txt">女性だけのスタジオだから、 気兼ねなく、たくさん汗かいたり ポーズを取ったりできるのも、 支持されている理由のひとつです。</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="sec-access" id="anchor02">
      <div class="container-1080">
        <h3 class="the-title inview fadeInBottom">アミーダ<?php echo get_the_title(); ?>店への<br class="sp">アクセス</h3>
        <div class="access">
          <div class="map inview fadeInBottom">
            <iframe width="100" height="100" frameborder="0" src="https://maps.google.com/maps?q=<?php echo $fields['access_zipcode'].$fields['access_address01']; ?>&amp;hl=ja&amp;output=embed" allowfullscreen></iframe>
          </div>
          <div class="info inview fadeInBottom">
            <div class="inside">
              <div class="row">
                <div class="th">所在地</div>
                <div class="td"><?php echo $fields['access_zipcode'].'<br>'.$fields['access_address01']; ?><?php  if(!empty($fields['access_address02'])){ echo '<br>'.$fields['access_address02'];} ?></div>
              </div>
              <?php if(!empty($fields['access_tel'])){ ?>
              <div class="row">
                <div class="th">TEL</div>
                <div class="td"><?php echo $fields['access_tel']; ?></div>
              </div>
              <?php } if(!empty($fields['access_fax'])){ ?>
              <div class="row">
                <div class="th">FAX</div>
                <div class="td"><?php echo $fields['access_fax']; ?></div>
              </div>
              <?php }  if(!empty($fields['access_station'])){ ?>
              <div class="row">
                <div class="th">最寄駅/アクセス</div>
                <div class="td"><?php echo $fields['access_station']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="faq">
      <?php include(APP_PATH.'libs/faq.php'); ?>
    </div>
    <?php if(!empty($fields['access_instagram'])){ ?>
    <div class="sns wcm">
      <h3 class="the-title">SNS</h3>
      <div class="grBtn">
        <a target="_blank" href="https://www.instagram.com/<?php echo $fields['access_instagram']; ?>/?hl=ja" class="grBtn__item ins"><p>Instagram</p></a>
        <a target="_blank" href="https://twitter.com/yoga_amiida" class="grBtn__item twitter"><p>Twitter</p></a>
      </div>
    </div>
    <?php } ?>
  </main>
<?php endwhile;endif; ?>
</div>
<div class="sec-schedule-popup js-popup" data-popup="schedule"></div>
<?php include(APP_PATH.'libs/footer.php'); ?>
<script src="<?php echo APP_ASSETS; ?>js/lib/simplebar.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo APP_ASSETS; ?>js/form/jquery.validationEngine.js"></script>
<script src="<?php echo APP_ASSETS; ?>js/form/languages/jquery.validationEngine-ja.js"></script>
<script>
  var _date = '<?php echo date("Y/m/d");?>',
      _post_id = '<?php echo $thisStudioID?>';
</script>
<script src="<?php echo APP_ASSETS ?>js/page/single-studio.min.js"></script>
<script>
  $(document).ready(function () {
    $("#studioform").validationEngine({
      promptPosition: "topLeft",
      scrollOffset: ($('.header').outerHeight() + 5),
    });
  })
</script>
</body>
</html>