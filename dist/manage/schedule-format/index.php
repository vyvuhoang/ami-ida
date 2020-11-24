<?php
include_once('../../app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
$page_ttl = 'レッスン登録フォーム';
$thisPageName = 'manage-schedule-format';

if(isset($_SESSION['logID']) && $_SESSION['logID']){
  // add new or Update
  if(isset( $_POST['postTitle']) ){
    if(isset($_GET['post'])){
      if($_GET['action'] == 'edit'){
        wp_update_post(array(
          'ID' => $_GET['post'] ,
          'post_title' => $_POST['postTitle'],
          'post_status' => 'publish',
        ));
        update_field('lesson_content', $_POST['postContent'], $_GET['post'] );
        update_field('lesson_level', $_POST['postLevel'], $_GET['post'] );
      }
    }else{
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
      header("Location: ".APP_URL."manage/schedule-format/", TRUE, 301);
    }
  }
  //delete
  if ( isset( $_GET['post'] ) ){
    if ( $_GET['action'] == 'delete' ){
      wp_delete_post($_GET['post']);
      header("Location: ".APP_URL."manage/schedule-format/", TRUE, 301);
    }
  }
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage_common.min.css">
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/manage-schedule-format.min.css">
</head>
<body class="manage schedule-format">
<?php include(APP_PATH.'libs/manage_header.php');?>
  <main id="wrap">
    <div class="container-1140">
      <div class="sec-main-post">
        <div class="sec-bg">
          <div class="container-1000">
            <div class="div-form">
              <?php
                if ( isset( $_GET['post'] ) ) {
                  if ( $_GET['action'] == 'edit' ){
                    $current_post = get_post($_GET['post']);
                    $title = $current_post->post_title;
                    $content = get_field('lesson_content',$current_post->ID);
                    $level = get_field('lesson_level',$current_post->ID);
              ?>
                  <form action="" id="primaryPostForm" method="POST">
                    <div class="sec-field">
                      <div class="item">
                        <label for="postTitle">レッスンタイトル</label>
                        <input type="text" name="postTitle" id="postTitle" value="<?php echo $title; ?>" class="required" />
                      </div>
                      <div class="item">
                        <label for="postContent">レッスン内容</label>
                        <textarea name="postContent" id="postContent" rows="8" cols="30"><?php echo strip_tags($content); ?></textarea>
                      </div>
                      <div class="item">
                        <label for="postLevel">レッスン強度</label>
                        <select name="postLevel" id="postLevel">
                          <?php for($i=1;$i<=5;$i++){
                            echo '<option value="'.$i.'" '.(($level==$i)?'selected':'').'>★'.$i.'</option>';
                          } ?>
                        </select>
                      </div>
                    </div>
                    <div class="sec-btn-submit">
                      <a href="<?php echo APP_URL ?>manage/schedule-format/" class="btn-new">新しくレッスンを追加</a>
                      <input type="hidden" name="submitted" id="submitted" value="true" />
                      <button type="submit">投稿を更新</button>
                    </div>
                  </form>
              <?php
                  }
                }else{
              ?>
                  <form action="" id="primaryPostForm" method="POST">
                    <div class="sec-field">
                      <div class="item">
                        <label for="postTitle">レッスンタイトル</label>
                        <input type="text" name="postTitle" id="postTitle" value="" class="required" />
                      </div>
                      <div class="item">
                        <label for="postContent">レッスン内容</label>
                        <textarea name="postContent" id="postContent" rows="8" cols="30"></textarea>
                      </div>
                      <div class="item">
                        <label for="postLevel">レッスン強度</label>
                        <select name="postLevel" id="postLevel">
                          <option value="1">★ 1</option>
                          <option value="2">★ 2</option>
                          <option value="3">★ 3</option>
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
              <?php
                }
                ?>
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
            <li class="item">
              <div class="item-ttl"><?php echo get_the_title(); ?></div>
              <div class="item-content"><?php echo get_field('lesson_content'); ?></div>
              <div class="item-btns">
                <a href="<?php echo APP_URL ?>manage/schedule-format/?post=<?php echo get_the_ID() ?>&action=edit" class="btn-edit">修正する</a>
                <a href="<?php echo APP_URL ?>manage/schedule-format/?post=<?php echo get_the_ID() ?>&action=delete" class="btn-delete">削除する</a>
              </div>
            </li>
          <?php endwhile; endif; ?>
        </ul>
        <!-- <table>
          <?php
          if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
          <tr>
            <td><?php echo get_the_title(); ?></td>
            <td><?php echo get_field('lesson_content'); ?></td>
            <td>
              <a href="<?php echo APP_URL ?>manage/schedule-format/?post=<?php echo get_the_ID() ?>&action=edit">Edit</a>
              <a href="<?php echo APP_URL ?>manage/schedule-format/?post=<?php echo get_the_ID() ?>&action=delete">Delete</a>
            </td>
          </tr>
          <?php endwhile; endif; ?>
        </table> -->
      </div>
    </div>
  </main>
  <script src="<?php echo APP_ASSETS; ?>js/common.min.js"></script>
</body>
</html>
<?php }else{
    header('Location: '.APP_URL.'manage/');
  }
?>