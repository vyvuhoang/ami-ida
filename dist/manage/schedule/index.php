<?php
include_once('../../app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
$thisPageName = 'manage-schedule';

$page_ttl = 'レッスンスケジュール登録画面';
$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = explode("/",$request_uri);

$studio_slug = $_GET['studio_slug'];

$cur_url = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'].explode('?', $_SERVER['REQUEST_URI'], 2)[0];
$studio_url = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'].'/'.explode('/', explode('?', $_SERVER['REQUEST_URI'], 2)[0])[1].'/'.explode('/', explode('?', $_SERVER['REQUEST_URI'], 2)[0])[2].'/';

$schedule_fields_wp_id = 91;
$field_key_rp_schedule = array();
foreach(acf_get_fields($schedule_fields_wp_id) as $val){
  if($val['name'] == 'schedule'){
    $field_key_rp_schedule[$val['name']] = $val['key'];
    foreach($val['sub_fields'] as $subval){
      $field_key_rp_schedule[$subval['name']] = $subval['key'];
    }
  }
}

$schedule_fields = [
  'schedule' => 'Schedule title'
];
$rp_schedule = [
  'lesson_master' => 'lesson master',
  'date' => 'schedule date',
  'time_start' => 'lesson time start',
  'time_end' => 'lesson time end',
  'instructor' => 'instructor',//radio
];

//get lesson master data
$lesson_master_arr = array();
$wp_lesson_master = new WP_Query();
$param_lesson_master = array(
  'post_type'=>'lesson_master',
  'order' => 'DESC',
  'posts_per_page' => '-1',
  // 'meta_query' => array(
  //   array(
  //     'key' => 'lesson_studio',
  //     'value' => $studio_id,
  //     'compare' => '='
  //   )
  // )
);
$wp_lesson_master->query($param_lesson_master);
if($wp_lesson_master->have_posts()){
  $i = 0;
  while($wp_lesson_master->have_posts()){
    $wp_lesson_master->the_post();
    $i++;
    $lesson_master_arr[$i] = array(
      'id' => get_the_id(),
      'ttl' => get_the_title(),
      'content' => get_field('lesson_content'),
      'level' => get_field('lesson_level'),
    );
  }
}

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

//ajax action
if(isset($_SESSION['logID']) && $_SESSION['logID']){
  if($flagValidPage) {
    if (isset($_POST) && !empty($_POST)) {
      if(isset($_POST['is_create']) && $_POST['is_create'] == 1){
        $_POST['schedule_delete'] = '';
      }
      foreach ($_POST as $key => $value) {
        switch ($key) {
          case 'schedule':
            update_post_meta($studio_id, $key, $value);
            update_post_meta($studio_id, '_'.$key, $field_key_rp_schedule[$key]);
            break;
          case 'is_create':
            break;
          case 'schedule_delete':
            if ($value != '') {
              delete_row('schedule', $value+1, $studio_id);
            }
            break;
          default:
            update_field($key, $value, $studio_id);
            break;
        }
      }
      if(!isset($_POST['is_create']) || empty($_POST['is_create'])){
        return;
      }else{
        header("Location: ".$cur_url, TRUE, 301);
      }
    }

include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage_common.min.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage-schedule.min.css">
</head>
<body class="manage manage-schedule">
  <?php include(APP_PATH.'libs/manage_header.php');?>
  <main id="wrap">
    <div class="container-1140">
      <div class="sec-main-post">
        <div class="sec-sub-bg">
          <div class="container-1000">
            <div class="sec-filter">
              <div class="lst-filter">
                <div class="item item--studio">
                  <p class="item-ttl">店舗を選択</p>
                  <select name="" id="" class="js-select-redirect">
                    <?php foreach ($studio_arr as $studio_key => $studio_val) {
                    $isSelected = $studio_slug == $studio_val['slug'] ? ' selected' : ''; ?>
                      <option value="<?php echo APP_URL.'manage/'.$studio_val['slug'].'/schedule/'; ?>"<?php echo $isSelected; ?>><?php echo $studio_val['ttl']; ?></option>
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
          </div>
        </div>
        <form id="form-schedule" class="js-form-schedule" method="POST">
          <div class="sec-sub-bg01">
            <div class="container-1000">
              <div class="sec-create js-new-post">
                <input type="hidden" name="is_create" id="is_create" value="1">
                <div class="item">
                  <h3 class="item-ttl">レッスンタイトル</h3>
                  <div class="item-field">
                    <select name="schedule_0_lesson_master" id="schedule_0_lesson_master" class="js-create-select">
                      <option value="">レッスンを選択してください</option>
                      <?php foreach($lesson_master_arr as $lesson_master_key => $lesson_master_val){?>
                        <option value="<?php echo $lesson_master_val['id'];?>" data-id="<?php echo $lesson_master_val['id'];?>" data-ttl="<?php echo $lesson_master_val['ttl'];?>" data-content="<?php echo $lesson_master_val['content'];?>" data-level="<?php echo $lesson_master_val['level'];?>"><?php echo $lesson_master_val['ttl'];?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <div class="item">
                  <h3 class="item-ttl item-ttl--nopad">レッスン内容<span class="note">※自動反映</span></h3>
                  <div class="item-field">
                    <p class="txt textarea js-lesson-content"></p>
                  </div>
                </div>
                <div class="item">
                  <h3 class="item-ttl item-ttl--nopad">レッスン難易度<span class="note">※自動反映</span></h3>
                  <div class="item-field">
                    <p class="txt txt-small-field js-lesson-level"></p>
                  </div>
                </div>
                <div class="item">
                  <h3 class="item-ttl">レッスン内容</h3>
                  <div class="item-field">
                    <input type="text" id="schedule_0_date" name="schedule_0_date" class="js-datepicker ip-datepicker restrict" placeholder="日付を選択してください" readonly>
                  </div>
                </div>
                <div class="item">
                  <h3 class="item-ttl">日程</h3>
                  <div class="item-field">
                    <div class="half">
                      <input type="text" name="schedule_0_time_start" id="schedule_0_time_start">
                    </div>
                    <div class="half">
                      <input type="text" name="schedule_0_time_end" id="schedule_0_time_end">
                    </div>
                  </div>
                </div>
                <div class="item item--last">
                  <h3 class="item-ttl item-ttl--nopad">担当インストラクター名</h3>
                  <div class="item-field">
                    <input type="text" id="schedule_0_instructor" name="schedule_0_instructor" class="schedule_0_instructor">
                  </div>
                </div>
                <p class="btn-add-new js-add-new">この内容でスケジュールを登録する</p>
                <p class="txt-status js-status"><?php if (isset($_POST) && !empty($_POST)) {echo '登録が完了しました！';}?></p>
              </div>
            </div>
          </div>

          <div class="sec-lst-schedule js-lst-schedule">
            <h3 class="ttl">登録されているレッスン</h3>
            <ul class="lst-ttl">
              <li class="item">レッスンタイトル</li>
              <li class="item">日程</li>
              <li class="item">開始時間</li>
              <li class="item">終了時間</li>
              <li class="item">担当インストラクター</li>
              <li class="item"></li>
            </ul>
            <?php foreach($schedule_fields as $key=> $value){?>
            <input type="hidden" id="schedule_delete" name="schedule_delete" value="" class="js-val-row-delete">
            <div class="js-rp rp">
              <?php $i = 0;
                if (have_rows($key, $studio_id)) {
                  while (have_rows($key, $studio_id)) {
                    the_row();
              ?>
                <div class="row js-row" data-row="<?php echo $i; ?>">
                  <div class="inside">
                    <?php foreach($rp_schedule as $rp_key=>$rp_value){
                      switch($rp_key){
                        case 'lesson_master':
                      ?>
                      <select name="<?php echo $key.'_'.$i.'_'.$rp_key?>" id="<?php echo $key.'_'.$i.'_'.$rp_key?>" class="restrict" disabled>
                        <option value="">Choose a lesson</option>
                        <?php foreach($lesson_master_arr as $lesson_master_key => $lesson_master_val){
                          $selected = (get_sub_field($rp_key, $studio_id)->ID) == $lesson_master_val['id'] ? ' selected' : '';
                          ?>
                          <option value="<?php echo $lesson_master_val['id'];?>"<?php echo $selected;?> data-id="<?php echo $lesson_master_val['id'];?>" data-ttl="<?php echo $lesson_master_val['ttl'];?>" data-content="<?php echo $lesson_master_val['content'];?>" data-level="<?php echo $lesson_master_val['level'];?>"><?php echo $lesson_master_val['ttl'];?></option>
                        <?php }?>
                      </select>
                      <?php
                          break;
                        case 'date':
                      ?>
                      <input type="text" id="<?php echo $key.'_'.$i.'_'.$rp_key?>" name="<?php echo $key.'_'.$i.'_'.$rp_key?>" class="js-datepicker datepicker restrict" value="<?php echo get_sub_field($rp_key, $studio_id);?>" disabled>
                      <?php
                          break;
                        default:
                      ?>
                        <input type="text" name="<?php echo $key.'_'.$i.'_'.$rp_key?>" id="<?php echo $key.'_'.$i.'_'.$rp_key?>" value="<?php echo get_sub_field($rp_key, $studio_id);?>" disabled>
                      <?php
                          break;
                      ?>
                      <?php }
                    }?>
                    <div class="btn-edit js-edit-row">修正する</div>
                    <div class="btn-delete delete-rp js-delete-row">削除する</div>
                  </div>
                </div>
              <?php
                    $i++;
                  }
                }
              ?>
            </div>
            <input type="hidden" id="<?php echo $key;?>" name="<?php echo $key;?>" value="<?php echo $i;?>" class="js-number-rp">
            <?php }?>
          </div>
        </form>
      </div>
    </div>
  </main>
  <script src="<?php echo APP_ASSETS; ?>js/common.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo APP_ASSETS; ?>js/page/manage-schedule.min.js"></script>
</body>
</html>
<?php
    }else {
      header('Location: '.APP_URL.'manage/');
    }
  }else{
    header('Location: '.APP_URL.'manage/');
  }
?>