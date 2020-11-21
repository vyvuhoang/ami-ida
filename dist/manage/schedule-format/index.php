<?php
include_once('../../app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
if(isset($_SESSION['logID']) && $_SESSION['logID']){
include(APP_PATH.'libs/manage_head.php');
?>
<body>
<?php include(APP_PATH.'libs/manage_header.php');?>
  <main id="wrap">
    <div class="container">
      <div class="form">
        <?php
          // add new or Update
          if(isset( $_POST['postTitle']) ){
            if ( isset( $_GET['post'] ) ){
              if ( $_GET['action'] == 'edit' ){
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
        ?>
        <?php
          if ( isset( $_GET['post'] ) ) {

            if ( $_GET['action'] == 'edit' ){
              $current_post = get_post($_GET['post']);
              $title = $current_post->post_title;
              $content = get_field('lesson_content',$current_post->ID);
              $level = get_field('lesson_level',$current_post->ID);
        ?>
            <form action="" id="primaryPostForm" method="POST">

              <p>
                <label for="postTitle">レッスンタイトル</label>
                <input type="text" name="postTitle" id="postTitle" value="<?php echo $title; ?>" class="required" />
              </p>

              <p>
                <label for="postContent">レッスン内容</label>
                <textarea name="postContent" id="postContent" rows="8" cols="30"><?php echo strip_tags($content); ?></textarea>
              </p>

              <p>
                <label for="postLevel">レッスン難易度</label>
                <select name="postLevel" id="postLevel">
                  <?php for($i=1;$i<=5;$i++){
                    echo '<option value="'.$i.'" '.(($level==$i)?'selected':'').'>★'.$i.'</option>';
                  } ?>
                </select>
              </p>

              <p>
                <input type="hidden" name="submitted" id="submitted" value="true" />
                <button type="submit">Update Post</button>
              </p>

            </form>
        <?php
            }
          }else{
        ?>
            <form action="" id="primaryPostForm" method="POST">

              <p>
                <label for="postTitle">レッスンタイトル</label>
                <input type="text" name="postTitle" id="postTitle" value="" class="required" />
              </p>

              <p>
                <label for="postContent">レッスン内容</label>
                <textarea name="postContent" id="postContent" rows="8" cols="30"></textarea>
              </p>

              <p>
                <label for="postLevel">レッスン難易度</label>
                <select name="postLevel" id="postLevel">
                  <option value="1">★1</option>
                  <option value="2">★2</option>
                  <option value="3">★3</option>
                  <option value="4">★4</option>
                  <option value="5">★5</option>
                </select>
              </p>

              <p>
                <input type="hidden" name="submitted" id="submitted" value="true" />
                <button type="submit">Add Post</button>
              </p>

            </form>
        <?php
          }
         ?>
      </div>

      <div class="list">
        <?php
        $query = new WP_Query( array(
            'post_type' => 'lesson_master',
            'posts_per_page' => '-1',
            'post_status' => 'publish'
        ) );
        ?>
        <table>

            <tr>
                <th>レッスンタイトル</th>
                <th>レッスン内容</th>
                <th>Actions</th>
            </tr>
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
        </table>
      </div>
    </div>
  </main>
  <?php include(APP_PATH.'libs/manage_footer.php');?>
</body>
</html>
<?php }else{
    header('Location: '.APP_URL.'manage/');
  }
?>