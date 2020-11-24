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
    <div class="c-news">
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
    <div class="sec-intro">
      <div class="container-1080">
        <div class="inside">
          <h3 class="the-title">９月限定！<br class="sp"><?php echo get_the_title(); ?>店の入会特典</h3>
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
      </div>
    </div>
    <div class="sec-btns">
      <div class="container-900">
        <a href="" class="btn"><span>WEB入会金受付はこちら</span></a>
        <a href="#anchor04" class="btn"><span>体験レッスンへのご参加はこちら</span></a>
      </div>
    </div>
    <div class="sec-charge" id="anchor01">
      <div class="container-900">
        <h3 class="the-title">プラン・料金のご説明</h3>
        <ul class="lst-price js-lst-price">
          <li class="item">
            <h4 class="item-ttl js-price-ttl">
              <span class="txt01">マンスリーオプション</span>
              <span class="txt02">※一部店舗</span>
            </h4>
            <div class="tbl js-price-tbl">
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
              <div class="row">
                <p class="th">タオル</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">1日1回、バスタオル1枚とフェイスタオル1枚がご利
                </div>用可能</p>
              </div>
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
            </div>
          </li>
          <li class="item">
            <h4 class="item-ttl js-price-ttl">
              <span class="txt01">オプション</span>
            </h4>
            <div class="tbl js-price-tbl">
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
              <div class="row">
                <p class="th">タオル</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">1日1回、バスタオル1枚とフェイスタオル1枚がご利
                </div>用可能</p>
              </div>
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
            </div>
          </li>
          <li class="item">
            <h4 class="item-ttl js-price-ttl">
              <span class="txt01">オプション（アミ―ダオリジナルウェア）</span>
              <span class="txt02">※一部店舗</span>
            </h4>
            <div class="tbl js-price-tbl">
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
              <div class="row">
                <p class="th">タオル</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">1日1回、バスタオル1枚とフェイスタオル1枚がご利
                </div>用可能</p>
              </div>
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
            </div>
          </li>
          <li class="item">
            <h4 class="item-ttl js-price-ttl">
              <span class="txt01">レンタル</span>
              <span class="txt02">※一部店舗</span>
            </h4>
            <div class="tbl js-price-tbl">
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
              <div class="row">
                <p class="th">タオル</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">1日1回、バスタオル1枚とフェイスタオル1枚がご利
                </div>用可能</p>
              </div>
              <div class="row">
                <p class="th">水素水</p>
                <div class="td">
                  <p class="td01">1,000円</p>
                  <p class="td02">水素水飲み放題。専用ボトルにてご利用可能</p>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <p class="script">※体験料以外の表示価格は全て税抜きとなります。水素水のみ消費税8％</p>
      </div>
    </div>
    <div class="sec-stuff">
      <div class="container-1080">
        <h3 class="the-title">体験レッスンに<br class="sp">必要な物追加</h3>
        <ul class="lst-stuff">
          <li class="item">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img02.jpg" alt="手ぶらでOK"></div>
            <h4 class="item-ttl">手ぶらでOK</h4>
            <p class="item-txt">必要なものは全てご用意しています。 身軽だから気軽に通いやすいのが特徴です。<br>※キャミソール(カップ付き)かTシャツのいずれかになります。 ※店舗により異なります。<br>ロレンタルウェア上下 セバスタオル<br>フェイスタオル 四水550ml×2本 四ヨガマット</p>
          </li>
          <li class="item">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img03.jpg" alt="好きな時間に 通えます"></div>
            <h4 class="item-ttl">好きな時間に 通えます</h4>
            <p class="item-txt">昼間に自由時間がある方にも、 仕事で遅くなりがちな方にも、 通いやすいのが魅力です。<br>※レッスン時間はスタジオ・曜日によって異なります。<br>詳しくはスタジオ詳細でご確認ください。</p>
          </li>
          <li class="item">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img04.jpg" alt="女性専用 スタジオ"></div>
            <h4 class="item-ttl">女性専用 スタジオ</h4>
            <p class="item-txt">女性だけのスタジオだから、 気兼ねなく、たくさん汗かいたり ポーズを取ったりできるのも、 支持されている理由のひとつです。</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="sec-feeling">
      <div class="container-900">
        <h3 class="the-title">アミーダの<br class="sp">溶岩ホットヨガで、<br>感じられている効果</h3>
        <ul class="lst-feeling">
          <li class="item">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img05.png" alt=""></div>
            <div class="name">体質・体型が変わった<br>の円グラフ</div>
          </li>
          <li class="item">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img05.png" alt=""></div>
            <div class="name">体質・体型が変わった<br>の円グラフ</div>
          </li>
          <li class="item">
            <div class="img"><img src="<?php echo APP_ASSETS;?>img/studio/img05.png" alt=""></div>
            <div class="name">体質・体型が変わった<br>の円グラフ</div>
          </li>
        </ul>
      </div>
    </div>
    <div class="sec-voice">
      <h3 class="the-title">アミーダの<br class="sp">溶岩ホットヨガを<br>選ぶお客様のお声</h3>
      <div class="slider js-voice-slider">
        <?php for($i=0;$i<10;$i++){ ?>
          <div class="item" style="background-image: url(<?php echo APP_ASSETS; ?>img/top/slide.jpg);"></div>
        <?php } ?>
      </div>
      <div class="container-1080">
        <?php include(APP_PATH.'libs/voice.php'); ?>
      </div>
      <div class="sec-btns">
        <div class="container-900">
          <a href="" class="btn"><span>WEB入会金受付はこちら</span></a>
          <a href="#anchor04" class="btn"><span>体験レッスンへのご参加はこちら</span></a>
        </div>
      </div>
    </div>
    <div class="feature wcm">
      <h3 class="the-title">アミーダ<?php echo get_the_title(); ?>店が選ばれる理由</h3>
      <div class="feature__lst">
        <?php for($i=0;$i<5;$i++){ ?>
        <div class="feature__lst--item">
          <img src="<?php echo APP_ASSETS; ?>img/studio/feature<?php echo $i+1; ?>.jpg" alt="会員様8割がホットヨガ初体験">
          <p class="ttl">会員様8割がホットヨガ初体験</p>
          <p class="txt">ほとんどの方が0からのスタート。<br>カラダが硬くても大丈夫！</p>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="sec-schedule" id="anchor03">
      <div class="container-1080">
        <h3 class="the-title">アミーダ<?php echo get_the_title(); ?>店<br>レッスンスケジュール</h3>
        <div class="schedule js-schedule"></div>
      </div>
    </div>
    <div class="sec-lesson">
      <div class="container-900">
        <div class="the-title">アミーダ<?php echo get_the_title(); ?>店<br>レッスンスケジュール</div>
        <div class="etr">
          <?php for($i=0;$i<4;$i++){?>
          <div class="etr__item">
            <div class="etr__item--img">
              <div class="img lazy" data-bg="url(<?php echo APP_ASSETS;?>img/studio/img11.jpg)"></div>
            </div>
            <div class="etr__item--info">
              <p class="ttl">レッスンタイトルが入ります</p>
              <p class="txt">レッスンの内容を説明するテキストがここに入ります。レッスンの内容を説明するテキストレッスンの内容を説明するテキストがここに入ります。</p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="sec-form" id="anchor04">
      <div class="container-750">
        <h3 class="the-title">アミーダ<?php echo get_the_title(); ?>店<br>レッスンスケジュール</h3>
        <form method="post" class="studioform" id="studioform" action="confirm/?g=<?php echo time() ?>" name="studioform">
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
                <p class="txt js-lesson-ttl">レッスンを選択するとオートコンプリート</p>
                <input type="hidden" name="single_ttl" id="single_ttl" class="input-lesson" value="">
                <input type="hidden" name="studio_slug" id="studio_slug" value="<?php echo $pslug;?>">
                <input type="hidden" name="studio_id" id="studio_id" value="<?php echo $thisStudioID;?>">
                <input type="hidden" name="instructor" id="instructor" class="input-instructor" value="">
                <input placeholder="例) 初心者レッスン" type="text" name="single_ttl" id="single_ttl" class="input-lesson validate[required]" value="" readonly>
                <span class="note">※このフィールドを自動入力するスケジュールを選択してください</span>
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
                <span class="note">※このフィールドを自動入力するスケジュールを選択してください</span>
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
              <td><input placeholder="例：abc@efg.jp（半角英数字）" type="email"  name="cemail" id="cemail" value="" class="validate[equals[email]]"></td>
            </tr>
            <tr>
              <th>アミーダを知った<br class="pc">きっかけ</th>
              <td>
                  <label for="method01">
                    <input type="radio" id="method01" name="method" value="Google広告・Yahoo広告" class="validate[required]">
                    <span>Google広告・Yahoo広告</span>
                  </label>
                  <label for="method02">
                    <input type="radio" id="method02" name="method" value="Instagram・Twitter " class="validate[required]">
                    <span>Instagram・Twitter </span>
                  </label>
                  <label for="method03">
                    <input type="radio" id="method03" name="method" value="ホットペッパービューティー " class="validate[required]">
                    <span>ホットペッパービューティー </span>
                  </label>
                  <label for="method04">
                    <input type="radio" id="method04" name="method" value="LINE" class="validate[required]">
                    <span>LINE</span>
                  </label>
                  <label for="method05">
                    <input type="radio" id="method05" name="method" value="店舗前（チラシ・ポスター・看板）" class="validate[required]">
                    <span>店舗前（チラシ・ポスター・看板）</span>
                  </label>
                  <label for="method06">
                    <input type="radio" id="method06" name="method" value="チラシ（ポスティング・新聞折込） " class="validate[required]">
                    <span>チラシ（ポスティング・新聞折込） </span>
                  </label>
                  <label for="method07">
                    <input type="radio" id="method07" name="method" value="駅広告（看板・ポスター）" class="validate[required]">
                    <span>駅広告（看板・ポスター）</span>
                  </label>
                  <label for="method08">
                    <input type="radio" id="method08" name="method" value="雑誌（フリーペーパー・タウン誌・情報誌）" class="validate[required]">
                    <span>雑誌（フリーペーパー・タウン誌・情報誌）</span>
                  </label>
                  <label for="method09">
                    <input type="radio" id="method09" name="method" value="ハガキ" class="validate[required]">
                    <span>ハガキ</span>
                  </label>
                  <label for="method10">
                    <input type="radio" id="method10" name="method" value="ラジオ" class="validate[required]">
                    <span>ラジオ</span>
                  </label>
                  <label for="method11">
                    <input type="radio" id="method11" name="method" value="紹介" class="validate[required]">
                    <span>紹介</span>
                  </label>
                  <label for="method12">
                    <input type="radio" id="method12" name="method" value="その他" class="validate[required]">
                    <span>その他</span>
                  </label>
                  <p class="row row--other">
                    <input placeholder="その他を選択された場合、こちらへご記入ください" type="text" name="other_method" id="other_method">
                  </p>
                  <p class="row">
                    <textarea name="content" id="content" placeholder="ご質問内容をご記入ください"></textarea>
                  </p>
              </td>
            </tr>
          </table>
          <p class="btn-row">
            <button id="btnConfirm" class="btn-confirm"><span>確認画面へ</span></button>
            <input type="hidden" name="actionFlag" value="confirm">
          </p>
        </form>
      </div>
    </div>
    <div class="sec-access" id="anchor02">
      <div class="container-1080">
        <h3 class="the-title">アミーダ<?php echo get_the_title(); ?>店への<br class="sp">アクセス</h3>
        <div class="access">
          <div class="map">
            <iframe width="100" height="100" frameborder="0" src="https://maps.google.com/maps?q=<?php echo $fields['access_zipcode'].$fields['access_address01']; ?>&amp;hl=ja&amp;output=embed" allowfullscreen></iframe>
          </div>
          <div class="info">
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
              <?php } ?>
              <div class="row">
                <div class="th"></div>
                <div class="td">最寄駅		1<br>最寄駅		2<br>最寄駅		3</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="faq">
      <?php include(APP_PATH.'libs/faq.php'); ?>
    </div>
    <div class="sec-ins">
      <div class="container-1080">
        <h3 class="topic-ttl">インスタグラム反映</h3>
        <ul class="lst-ins">
          <li class="item"><img src="<?php echo APP_ASSETS;?>img/studio/img10.jpg" alt=""></li>
          <li class="item"><img src="<?php echo APP_ASSETS;?>img/studio/img10.jpg" alt=""></li>
          <li class="item"><img src="<?php echo APP_ASSETS;?>img/studio/img10.jpg" alt=""></li>
          <li class="item"><img src="<?php echo APP_ASSETS;?>img/studio/img10.jpg" alt=""></li>
          <li class="item"><img src="<?php echo APP_ASSETS;?>img/studio/img10.jpg" alt=""></li>
          <li class="item"><img src="<?php echo APP_ASSETS;?>img/studio/img10.jpg" alt=""></li>
          <li class="item"><img src="<?php echo APP_ASSETS;?>img/studio/img10.jpg" alt=""></li>
          <li class="item"><img src="<?php echo APP_ASSETS;?>img/studio/img10.jpg" alt=""></li>
        </ul>
      </div>
    </div>
  </main>
<?php endwhile;endif; ?>
</div>

<div class="sec-schedule-popup js-popup" data-popup="schedule"></div>
<?php include(APP_PATH.'libs/footer.php'); ?>
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