<?php
$page_ttl = 'レッスン登録フォーム';
$thisPageName = 'manage-schedule-format';
include_once('../../app_config.php');
include_once(APP_PATH.'wp/wp-load.php');

if(isset($_SESSION['logID']) && $_SESSION['logID']){
  wp_head();
  wp_enqueue_media();
  if (isset($_POST) && !empty($_POST)) {
    if(isset($_POST['form_action']) && $_POST['form_action'] == 'create'){
      $new_post = wp_insert_post(
        array(
          'post_type' => 'lesson_master',
        )
      );
      wp_update_post(array(
        'ID' => $new_post,
        'post_title' => $_POST['postTitle'],
        'post_status' => 'publish',
      ));
      update_field('lesson_content', $_POST['postContent'], $new_post);
      update_field('lesson_level', $_POST['postLevel'], $new_post);
      update_field('lesson_image', $_POST['postImage'], $new_post);
      header("Location: ".APP_URL."manage/schedule-format/", TRUE, 301);
    }else if(isset($_POST['delete']) && !empty($_POST['delete'])){
      wp_delete_post($_POST['delete']);
      return;
    }else{
      wp_update_post(array(
        'ID' => $_POST['post_id'] ,
        'post_title' => $_POST['postTitleEdit'],
        'post_status' => 'publish',
      ));
      update_field('lesson_content', $_POST['postContentEdit'], $_POST['post_id'] );
      update_field('lesson_image', $_POST['postImageEdit'], $_POST['post_id']);
      return;
    }
  }
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage_common.min.css">
</head>
<body class="manage schedule-format">
<?php include(APP_PATH.'libs/manage_header.php');?>
  <main id="wrap">
    <div class="container-1140">
      <div class="sec-main-post">
        <div class="sec-bg">
          <div class="container-1000">
            <div class="div-form">
              <form action="" id="primaryPostForm" method="POST">
                <div class="sec-field">
                  <input type="hidden" name="form_action" id="form_action" value="create">
                  <div class="item">
                    <label for="postTitle">レッスンタイトル</label>
                    <input type="text" name="postTitle" id="postTitle" value="" class="required" />
                  </div>
                  <div class="item">
                    <label for="postContent">レッスン内容</label>
                    <textarea name="postContent" id="postContent"></textarea>
                  </div>
                  <div class="item-image">
                    <label for="postContent">レッスン画像</label>
                    <div class="content">
                      <input type="hidden" class="postImage" id="postImage" name="postImage" value="">
                      <button class="set_custom_logo button button-add-image" style="vertical-align: middle;"></button>
                      <div class="img js-img"></div>
                    </div>
                  </div>
                  <div class="item">
                    <label for="postLevel">レッスン強度</label>
                    <select name="postLevel" id="postLevel">
                      <option value="1">★ 1</option>
                      <option value="1">★ 1.5</option>
                      <option value="2">★ 2</option>
                      <option value="2">★ 2.5</option>
                      <option value="3">★ 3</option>
                      <option value="3">★ 3.5</option>
                      <option value="4">★ 4</option>
                      <option value="5">★ 5</option>
                    </select>
                  </div>
                </div>
                <div class="sec-btn-submit">
                  <input type="hidden" name="submitted" id="submitted" value="true" />
                  <button type="submit">登録する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="sec-lst">
        <h3 class="ttl">登録されているレッスン</h3>
        <ul class="lst-ttl">
          <li class="item">レッスンタイトル</li>
          <li class="item">レッスン内容</li>
          <li class="item"></li>
        </ul>
        <?php
        $query = new WP_Query( array(
          'post_type' => 'lesson_master',
          'posts_per_page' => '-1',
          'post_status' => 'publish'
        ) );
        ?>
        <ul class="lst-post">
          <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
            <li class="item js-row">
              <input type="hidden" name="post_id" id="post_id" value="<?php echo get_the_ID();?>">
              <div class="item-ttl"><input type="text" name="postTitleEdit" id="postTitleEdit" value="<?php echo get_the_title(); ?>" disabled></div>
              <div class="item-content"><textarea name="postContentEdit" id="postContentEdit" disabled><?php echo strip_tags(get_field('lesson_content')); ?></textarea></div>
              <div class="item-image">
                <input type="hidden" class="postImage" id="postImageEdit" name="postImageEdit" value="<?php echo get_field('lesson_image')['id'];?>">
                <button class="set_custom_logo button button-add-image" style="vertical-align: middle;" disabled></button>
                <div class="img js-img"><?php if(get_field('lesson_image')){?><img src="<?php echo get_field('lesson_image')['url'];?>" alt=""><?php }?></div>
              </div>
              <div class="item-btns">
                <div class="btn-edit js-edit-row">修正する</div>
                <div class="btn-delete js-delete-row">削除する</div>
              </div>
            </li>
          <?php endwhile; endif; ?>
        </ul>
      </div>
    </div>
  </main>
  <?php wp_footer();?>
  <link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage-schedule-format.min.css">
  <script src="<?php echo APP_ASSETS; ?>js/page/manage-schedule-format.min.js"></script>
</body>
</html>
<?php }else{
    header('Location: '.APP_URL.'manage/');
  }
?>