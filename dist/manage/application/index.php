<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
if(isset($_SESSION['logID']) && $_SESSION['logID']){
  $request_uri = $_SERVER['REQUEST_URI'];
  $uri_parts = explode("/",$request_uri);

  $studio_slug = $_GET['studio_slug'];

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
    }
  }
  if($flagValidPage) {
    include(APP_PATH.'libs/manage_head.php');
?>
</head>
<body>
  <?php include(APP_PATH.'libs/manage_header.php');?>
  <main id="wrap">
    <div class="sec-filter">
      <div class="lst-filter">
        <div class="item">
          <p class="item-ttl">店舗を選択</p>
          <select name="" id="" class="js-select-redirect">
            <?php foreach($studio_arr as $studio_key => $studio_val){
              $isSelected = $studio_slug == $studio_val['slug'] ? ' selected' : '';
              ?>
              <option value="<?php echo APP_URL.'manage/'.$studio_val['id'].'/application/';?>"<?php echo $isSelected;?>><?php echo $studio_val['ttl'];?></option>
            <?php }?>
          </select>
        </div>
        <div class="item">
          <p class="item-ttl">月を選択</p>
          <select name="" id="" class="js-select-redirect">
            <option value="">時間を選択してください</option>
            <?php for($i=1;$i<=12;$i++){
                $current_url = $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'].explode('?', $_SERVER['REQUEST_URI'], 2)[0];
                $urlYM = $_GET['ym'];
                $ym = date("Y").'/'.$i;
                $isSelected = ($urlYM == $ym) ? ' selected' : '';
              ?>
              <option value="<?php echo $current_url.'?ym='.date("Y").'/'.$i?>"<?php echo $isSelected;?>><?php echo date("Y").'/'.$i?></option>
            <?php }?>
          </select>
        </div>
      </div>
    </div>
  </main>
  <?php include(APP_PATH.'libs/manage_footer.php');?>
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
  }
}else{
  header('Location: '.APP_URL.'manage/');
}
?>