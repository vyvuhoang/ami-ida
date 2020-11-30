<?php
  include('../wp/wp-load.php');
  $id = $_POST['id'];
  $html = '';
  // if((!empty($_POST['id']) ) ) {
  $post_news = get_post($id);
// ====== MAP =======
  $date = date('Y/m/d', strtotime(get_field('date',$post_news->ID)));
  $title =  $post_news->post_title;
  $content= $post_news->post_content;
  $html = '<div class="popup-inner">
        <div class="wcm">
        <div class="btn_close_new"></div>
          <div class="content cmsContent">
            <div class="date">'.$date.'</div>
            <p class="ttl">'.$title.'</p>
            <div class="txt">'.$content.'</div>
          </div>  
        </div>
      </div>';
  $project = [];
  $project['total'] = $html;
  $project['html'] = $html;
  echo json_encode($project);
// }
?>