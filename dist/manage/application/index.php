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
  if($flagValidPage) {
    if($urlYM) {
      if(isset($_POST) && !empty($_POST['field_key'])){
        update_field($_POST['field_key'], $_POST['field_value'], $_POST['post_id']);
        return;
      }
      include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/lib/simplebar.css">
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
          <?php
            $appl_query_all = new WP_Query( array(
              'post_type' => 'application',
              'posts_per_page' => '-1',
              'post_status' => 'publish',
              'meta_query' => array(
                'relation' => 'AND',
                array(
                  'key' => 'app_studio',
                  'value' => $studio_id,
                  'compare' => '=',
                ),
                array(
                  'key' => 'desired_date',
                  'value' => date("Y/m/d", strtotime($urlYM.'/1')),
                  'compare' => '>=',
                  'type' => 'DATE',
                ),
                array(
                  'key' => 'desired_date',
                  'value' => date("Y/m/t", strtotime($urlYM.'/1')),
                  'compare' => '<=',
                  'type' => 'DATE',
                )
              )
            ));
            $appl_query_condition = new WP_Query( array(
              'post_type' => 'application',
              'posts_per_page' => '-1',
              'post_status' => 'publish',
              'meta_query' => array(
                'relation' => 'AND',
                array(
                  'key' => 'app_studio',
                  'value' => $studio_id,
                  'compare' => '=',
                ),
                array(
                  'key' => 'desired_date',
                  'value' => date("Y/m/d"),
                  'compare' => '>=',
                  'type' => 'DATE',
                ),
                array(
                  'key' => 'desired_date',
                  'value' => date("Y/m/d", strtotime($urlYM.'/1')),
                  'compare' => '>=',
                  'type' => 'DATE',
                ),
                array(
                  'key' => 'desired_date',
                  'value' => date("Y/m/t", strtotime($urlYM.'/1')),
                  'compare' => '<=',
                  'type' => 'DATE',
                )
              )
            ));
            $total_appl = $appl_query_all->found_posts;
            $condition_appl = $appl_query_condition->found_posts;
          ?>
          <div class="sec-num-application">
            <h3 class="ttl">体験予約状況</h3>
            <div class="boxes">
              <div class="box">
                <div class="box-bg">
                  <h4 class="box-ttl">体験レッスン申込み数 </h4>
                  <p class="box-num">
                    <span class="num"><?php echo $total_appl;?></span>
                    <span class="unit">人</span>
                  </p>
                </div>
                <span class="note">※今月の体験申込み総数</span>
              </div>
              <div class="box">
                <div class="box-bg">
                  <h4 class="box-ttl">体験レッスン予定人数 </h4>
                  <p class="box-num">
                    <span class="num"><?php echo $condition_appl;?></span>
                    <span class="unit">人</span>
                  </p>
                </div>
                <span class="note">※今月の来店予定者数</span>
              </div>
            </div>
          </div>
          <?php
            $appl_fields_form = array(
              'appl_date',
              'cus_name',
              'desired_date',
              'desired_time',
              'lesson_name',
              'instructor',
            );
            $appl_fields_edit = array(
              'via',
              'thankyou_phone',
              'in_charge1',
              'confirm_phone',
              'in_charge2',
              'status',
              'memo'
            );
            if ( $appl_query_condition->have_posts() ) :
            $i = 0;?>
          <div class="sec-data">
            <h3 class="ttl">体験予約者 管理ボード</h3>
            <div class="tbl-outside js-tbl-outside">
              <div class="tbl-data">
                <div class="row">
                  <div class="th">NO</div>
                  <div class="th">申込み日時</div>
                  <div class="th">お名前</div>
                  <div class="th">体験予約日</div>
                  <div class="th">開始時間</div>
                  <div class="th">レッスン名</div>
                  <div class="th">インストラクター</div>
                  <div class="th">経由</div>
                  <div class="th">予約確認電話</div>
                  <div class="th">- 担当</div>
                  <div class="th">2日前確認電話</div>
                  <div class="th">- 担当</div>
                  <div class="th">ステータス</div>
                  <div class="th">備考・メモ</div>
                </div>
                <?php while ( $appl_query_condition->have_posts() ) :
                  $i++;
                  $appl_query_condition->the_post();
                ?>
                <div class="row js-row" data-post-id="<?php echo get_the_ID();?>">
                  <div class="td"><p class="txt"><?php echo $i;?></p></div>
                  <?php foreach($appl_fields_form as $val){?>
                    <div class="td"><p class="txt"><?php echo get_field($val);?></p></div>
                  <?php }?>
                  <?php foreach($appl_fields_edit as $val){ ?>
                    <div class="td td--edit">
                  <?php
                      switch($val){
                        case 'via':
                          $via_arr = array('web検索', '店舗前看板', '駅前看板', 'チラシ', 'SNS', '紹介', 'その他');
                          $via_val = get_field($val);
                  ?>
                      <select name="<?php echo $val;?>" id="<?php echo $val;?>">
                        <option value="">選択する</option>
                        <?php foreach($via_arr as $vval){
                          $selected = $via_val == $vval ? ' selected' : '';
                        ?>
                          <option value="<?php echo $vval;?>"<?php echo $selected;?>><?php echo $vval;?></option>
                        <?php }?>
                      </select>
                  <?php
                          break;
                        case 'thankyou_phone':
                        case 'confirm_phone':
                          $phone_arr = array('〇 完了', '× 不通');
                          $phone_val = get_field($val);
                  ?>
                    <select name="<?php echo $val;?>" id="<?php echo $val;?>">
                      <option value="">※未入力</option>
                      <?php foreach($phone_arr as $pval){
                        $selected = $phone_val == $pval ? ' selected' : '';
                      ?>
                        <option value="<?php echo $pval;?>"<?php echo $selected;?>><?php echo $pval;?></option>
                      <?php }?>
                    </select>
                  <?php
                          break;
                        case 'status':
                          $status_arr = array('入会', '検討中', '未入会', '体験キャンセル', '不通');
                          $status_val = get_field($val);
                  ?>
                    <select name="<?php echo $val;?>" id="<?php echo $val;?>">
                      <option value="">選択する</option>
                      <?php foreach($status_arr as $sval){
                        $selected = $status_val == $sval ? ' selected' : '';
                      ?>
                        <option value="<?php echo $sval;?>"<?php echo $selected;?>><?php echo $sval;?></option>
                      <?php }?>
                    </select>
                  <?php
                          break;
                        case 'memo':
                  ?>
                    <textarea name="<?php echo $val;?>" id="<?php echo $val;?>"><?php echo get_field($val);?></textarea>
                  <?php
                          break;
                        default:
                  ?>
                    <input type="text" id="<?php echo $val;?>" name="<?php echo $val;?>" value="<?php echo get_field($val);?>">
                  <?php }?>
                  </div>
                <?php }?>
                </div>
                <?php endwhile;?>
              </div>
            </div>
          </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </main>
  <script src="<?php echo APP_ASSETS; ?>js/common.min.js"></script>
  <script src="<?php echo APP_ASSETS; ?>js/lib/simplebar.min.js"></script>
  <script src="<?php echo APP_ASSETS; ?>js/page/manage-application.min.js"></script>
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