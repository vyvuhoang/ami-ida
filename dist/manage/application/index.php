<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
$thisPageName = 'manage-application';
$page_ttl = '体験予約者管理ボード';
if(isset($_SESSION['logID']) && $_SESSION['logID']){
  $request_uri = $_SERVER['REQUEST_URI'];
  $uri_parts = explode("/",$request_uri);

  $studio_slug = $_GET['studio_slug'];
  $urlYM = isset($_GET['ym']) && !empty($_GET['ym']) ? $_GET['ym'] : '';
  $defaultYM = date("Y/m");

  $cur_url = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'].explode('?', $_SERVER['REQUEST_URI'], 2)[0];
  $studio_url = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'].'/'.explode('/', explode('?', $_SERVER['REQUEST_URI'], 2)[0])[1].'/'.explode('/', explode('?', $_SERVER['REQUEST_URI'], 2)[0])[2].'/';

  $flagValidPage = 0;
  //get studio
  $wp_studio = new WP_Query();
  $param_studio = array(
    'post_type'=>'studio',
    'order' => 'DESC',
    'posts_per_page' => '-1',
  );
  $wp_studio->query($param_studio);
  if($wp_studio->have_posts()){
    $i = 0;
    while($wp_studio->have_posts()){
      $wp_studio->the_post();
      $i++;
      $studio_arr[$i] = array(
        'id' => get_the_id(),
        'ttl' => get_the_title(),
        'slug' => $post->post_name,
      );
      if($studio_slug == $post->post_name){
        $flagValidPage = 1;
        $studio_id = get_the_id();
      }
    }
  }
  $cur_date = date('Y/m/d');
  $notExpired = 0;
  if($flagValidPage) {
    if($urlYM) {
      $csv = [];
      $csv_pname = APP_PATH.'csv/'.$studio_slug.'/'.$urlYM.'/data_entry.csv';
      if (file_exists($csv_pname)) {
        $file = fopen($csv_pname, 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
          $csv[] = $line;
          if (DateTime::createFromFormat('Y/m/d', $line[2]) !== FALSE) {
            if(strtotime($line[2]) >= strtotime($cur_date)){
              $notExpired++;
            }
          }
        }
        fclose($file);
      }
      include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage_common.min.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage_application.min.css">
</head>
<body class="manage application">
  <?php include(APP_PATH.'libs/manage_header.php'); ?>
  <main id="wrap">
    <div class="container-1140">
      <div class="sec-bg">
        <div class="container-1000">
          <div class="sec-filter">
            <div class="lst-filter">
              <div class="item item--studio">
                <p class="item-ttl">店舗を選択</p>
                <select name="" id="" class="js-select-redirect">
                  <?php foreach ($studio_arr as $studio_key => $studio_val) {
                  $isSelected = $studio_slug == $studio_val['slug'] ? ' selected' : ''; ?>
                    <option value="<?php echo APP_URL.'manage/'.$studio_val['slug'].'/application/'; ?>"<?php echo $isSelected; ?>><?php echo $studio_val['ttl']; ?></option>
                  <?php
              } ?>
                </select>
              </div>
              <div class="item item--date">
                <p class="item-ttl">月を選択</p>
                <select name="" id="" class="js-select-redirect">
                  <option value="">時間を選択してください</option>
                  <?php for ($i=1;$i<=12;$i++) {
                    $ym = date("Y").'/'.$i;
                    $isSelected = ($urlYM == $ym) ? ' selected' : ''; ?>
                    <option value="<?php echo $cur_url.'?ym='.date("Y").'/'.$i?>"<?php echo $isSelected; ?>><?php echo date("Y").'/'.$i?></option>
                  <?php
              } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="sec-num-application">
            <h3 class="ttl">体験予約状況</h3>
            <div class="boxes">
              <div class="box">
                <div class="box-bg">
                  <h4 class="box-ttl">体験レッスン申込み数 </h4>
                  <p class="box-num">
                    <span class="num"><?php echo count($csv) == 0 ? count($csv) : count($csv) - 1;?></span>
                    <span class="unit">人</span>
                  </p>
                </div>
                <span class="note">※体験レッスンの当月の申込み総数を表示</span>
              </div>
              <div class="box">
                <div class="box-bg">
                  <h4 class="box-ttl">体験レッスン予定人数 </h4>
                  <p class="box-num">
                    <span class="num"><?php echo $notExpired;?></span>
                    <span class="unit">人</span>
                  </p>
                </div>
                <span class="note">※体験レッスンの当月の予定者数を表示</span>
              </div>
            </div>
          </div>
          <div class="sec-data">
            <h3 class="ttl">体験予約者 管理ボード</h3>
            <div class="tbl-outside">
              <table class="tbl-data">
                <?php
                foreach($csv as $key => $val){
                  if($key == 0){
                ?>
                  <tr>
                    <th>No.</th>
                    <?php foreach($val as $ckey => $cval){?>
                    <th><?php echo $cval?></th>
                    <?php }?>
                  </tr>
                  <?php
                    }else{
                  ?>
                  <tr>
                    <td><?php echo $key;?></td>
                    <?php foreach($val as $ckey => $cval){?>
                    <td>
                    <?php
                      switch($ckey){
                        case 0:
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                          echo $cval;
                          break;
                        case 6:
                    ?>
                      <select name="" id="">
                        <option value="web検索">web検索</option>
                        <option value="店舗前看板">店舗前看板</option>
                        <option value="駅前看板">駅前看板</option>
                        <option value="チラシ">チラシ</option>
                        <option value="SNS">SNS</option>
                        <option value="紹介">紹介</option>
                        <option value="その他">その他</option>
                      </select>
                    <?php
                          break;
                        case 7:
                    ?>
                      <select name="" id="">
                        <option value="〇 完了">〇 完了</option>
                        <option value="× 不通">× 不通</option>
                      </select>
                    <?php
                          break;
                        case 9:
                    ?>
                      <select name="" id="">
                        <option value="〇 完了">〇 完了</option>
                        <option value="× 不通">× 不通</option>
                      </select>
                    <?php
                          break;
                        case 11:
                    ?>
                      <select name="" id="">
                        <option value="入会">入会</option>
                        <option value="検討中">検討中</option>
                        <option value="未入会">未入会</option>
                        <option value="体験キャンセル">体験キャンセル</option>
                        <option value="不通">不通</option>
                      </select>
                    <?php
                          break;
                        case 12:
                    ?>
                      <textarea name="" id="" cols="30" rows="10"></textarea>
                    <?php
                          break;
                        default:
                    ?>
                      <input type="text">
                    <?php
                          break;
                      }
                    ?>
                    </td>
                    <?php }?>
                  </tr>
                  <?php
                  }?>
                <?php  }?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="<?php echo APP_ASSETS; ?>js/common.min.js"></script>
  <script>
    $(document).ready(function() {
      selectRedirect();
    })
    function selectRedirect(){
      $('.js-select-redirect').on('change', function () {
        var url = $(this).val();
        if (url) {
          window.location = url;
        }
        return false;
      });
    }
  </script>
</body>
</html>
<?php
    }else{
      header('Location: '.$cur_url.'?ym='.$defaultYM);
    }
  }else{
    header('Location: '.APP_URL.'manage/');
  }
}else{
  header('Location: '.APP_URL.'manage/');
}
?>