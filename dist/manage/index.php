<?php
include_once('../app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
$wp_studio = new WP_Query();
$param = array(
  'post_type'=>'studio',
  'order' => 'DESC',
  'posts_per_page' => '-1',
);
$wp_studio->query($param);
if($wp_studio->have_posts()){
  $i = 0;
  while($wp_studio->have_posts()){
    $wp_studio->the_post();
    $i++;
    $studio_arr[$i] = array(
      'id' => get_the_id(),
      'ttl' => get_the_title(),
    );
  }
}
include(APP_PATH.'libs/manage_head.php');
?>
</head>

<body>
  <?php include(APP_PATH.'libs/manage_header.php');?>
  <main id="wrap">
    <div class="sec-redirect">
      <div class="lst-redirect">
        <div class="item">
          <h3 class="ttl">体験レッスン申込み者 管理ボード</h3>
          <div class="select">
            <p class="lbl">店舗を選択</p>
            <select name="" id="" class="js-choose-studio">
              <option value="">スタジオを選ぶ</option>
              <?php foreach($studio_arr as $studio_key => $studio_val){
                $selected = (get_sub_field($rp_key, $studio_id)->ID) == $studio_val['id'] ? ' selected' : '';
                ?>
                <option value="<?php echo $studio_val['id'];?>"><?php echo $studio_val['ttl'];?></option>
              <?php }?>
            </select>
            <a href="javascript:void(0)" data-url="<?php echo APP_URL?>manage/studio_id/application/" class="btn js-btn">管理ボードを開く</a>
          </div>
        </div>
        <div class="item">
          <h3 class="ttl">レッスンスケジュール　登録・管理ボード</h3>
          <div class="select">
            <p class="lbl">店舗を選択</p>
            <select name="" id="" class="js-choose-studio">
              <option value="">スタジオを選ぶ</option>
              <?php foreach($studio_arr as $studio_key => $studio_val){
                $selected = (get_sub_field($rp_key, $studio_id)->ID) == $studio_val['id'] ? ' selected' : '';
                ?>
                <option value="<?php echo $studio_val['id'];?>"><?php echo $studio_val['ttl'];?></option>
              <?php }?>
            </select>
            <a href="javascript:void(0)" data-url="<?php echo APP_URL?>manage/studio_id/schedule/" class="btn js-btn">管理ボードを開く</a>
          </div>
        </div>
        <div class="item">
          <h3 class="ttl">レッスン内容　登録・管理ボード</h3>
          <div class="select">
            <a href="<?php echo APP_URL;?>manage/schedule-format/" class="btn js-btn">レッスン登録画面を開く</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include(APP_PATH.'libs/manage_footer.php'); ?>
  <script>
    $(document).ready(function() {
      changeLink();
    })

    function changeLink(){
      $('.js-choose-studio').on('change', function(){
        var el_anchor = $(this).siblings('.js-btn'),
            url = el_anchor.attr('data-url'),
            studio_id = $(this).val();
        url = (studio_id != '') ? url.replace('studio_id',studio_id) : 'javascript:void(0)';
        el_anchor.attr('href', url);
      })
    }
  </script>
</body>
</html>