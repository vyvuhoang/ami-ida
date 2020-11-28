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
    if(isset($_POST) && !empty($_POST['field_key'])){
      update_field($_POST['field_key'], $_POST['field_value'], $_POST['post_id']);
      return;
    }

            if($urlYM) {
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
                  // array(
                  //   'key' => 'desired_date',
                  //   'value' => date("Y/m/d"),
                  //   'compare' => '>=',
                  //   'type' => 'DATE',
                  // ),
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
            }else{
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
                )
              ));
            }
            $total_appl = $appl_query_all->found_posts;
            $condition_appl = $appl_query_condition->found_posts;


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
            $i = 0;
                while ( $appl_query_condition->have_posts() ) :
                  $i++;
                  $appl_query_condition->the_post();
                  $i;
                  foreach($appl_fields_form as $val){
                    echo get_field($val);}
                  foreach($appl_fields_edit as $val){

                      switch($val){
                        case 'via':
                          $via_arr = array('web検索', '店舗前看板', '駅前看板', 'チラシ', 'SNS', '紹介', 'その他');
                          $via_val = get_field($val);


                          break;
                        case 'thankyou_phone':
                        case 'confirm_phone':
                          $phone_arr = array('〇 完了', '× 不通');
                          $phone_val = get_field($val);

                          break;
                        case 'status':
                          $status_arr = array('入会', '検討中', '未入会', '体験キャンセル', '不通');
                          $status_val = get_field($val);

                          break;
                        case 'memo':
                  echo get_field($val);
                          break;
                        default:
                  echo get_field($val);
                  }
                  }
                  endwhile;

          endif;
  }else{
    header('Location: '.APP_URL.'manage/');
  }
}else{
  header('Location: '.APP_URL.'manage/');
}
?>