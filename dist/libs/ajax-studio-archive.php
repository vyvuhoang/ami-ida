<?php
  include('../wp/wp-load.php');
  $key = $_POST['key'];  
  $area = $_POST['area'];  
  $html = '';
  $studio = new WP_Query(array(        
    'post_type'       => 'studio',
    'showposts'       => -1,
    'post_status'     => 'publish',
    'orderby'         =>'date',
    's' => $key,
    'tax_query' => array(
      array(
        'taxonomy' => 'studiocat',
        'field' => 'slug',
        'terms' => $area,
        )
      )
  ));
  if ($studio->have_posts()) :
  while ($studio->have_posts()) : $studio->the_post();
  $post = get_post($id);
  $ttl=$post->post_title; 
  $fields = get_fields();
  $address = strip_tags($fields['access_add']); 
// ====== MAP =======
  if($fields['access_tel'] != ''){
    $tel = '';
  }else{$tel = "";}
// ====== MAP =======
  if($fields['access_fax'] != ''){
    $fax = '';
  }else{$fax = "";}
  $html .= '
    <div class="lst-studio__item">
      <div class="lst-studio__item--map">
        <iframe class="lazy" width="600" height="450" frameborder="0" data-src="https://maps.google.com/maps?q='.$address.'&amp;hl=ja&amp;output=embed" allowfullscreen></iframe>
      </div>
      <div class="lst-studio__item--info">
        <p class="ttl">'.$ttl.'</p>
        <p class="txt">'.$address.'</p>
        <a href="tel:'.$tel.'" class="txt">TEL：'.$tel.'</a>
        <p class="txt">FAX：'.$fax.'</p>
        <div class="btn">
          <a href="'.APP_URL.'/studio/" class="btn-detail">店舗ページへ</a>
          <a href="'.$address.'" class="btn-location">地図をみる</a>
        </div>
      </div>
    </div';
  endwhile;
  $project = [];
  $project['total'] = $html;
  $project['html'] = $html;
  // echo $project['html'];
  echo json_encode($project);
?>