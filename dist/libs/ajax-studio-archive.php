<?php
  include('../wp/wp-load.php');
// if( !empty($_POST['key']) ) {$_id = $_GET['c'];}else{$_id="";}
//   $key = $_POST['key'];  
//   $area = $_POST['area'];  
  $html = '';
  if( (!empty($_POST['key']) ) && (!empty($_POST['area']) ) ){
    $key = $_POST['key'];  
    $area = $_POST['area'];  
    $studio = new WP_Query(array(        
      'post_type'       => 'studio',
      'showposts'       => -1,
      'post_status'     => 'publish',
      'orderby'         =>'date',
      's' => $key,
      'tax_query' => array(
        array(
          'taxonomy' => 'studioarea',
          'field' => 'slug',
          'terms' => $area,
          )
        )
    ));
  } else if( (!empty($_POST['key']) ) && (empty($_POST['area']) ) ){
    $key = $_POST['key'];  
    $studio = new WP_Query(array(        
      'post_type'       => 'studio',
      'showposts'       => -1,
      'post_status'     => 'publish',
      'orderby'         =>'date',
      's'               => $key,
    ));
  } else if( (empty($_POST['key']) ) && (!empty($_POST['area']) ) ){
    $area = $_POST['area'];  
    $studio = new WP_Query(array(        
      'post_type'       => 'studio',
      'showposts'       => -1,
      'post_status'     => 'publish',
      'orderby'         =>'date',
      'tax_query' => array(
        array(
          'taxonomy' => 'studioarea',
          'field' => 'slug',
          'terms' => $area,
          )
        )
    ));
  } else{
    $studio = new WP_Query(array(        
      'post_type'       => 'studio',
      'showposts'       => -1,
      'post_status'     => 'publish',
      'orderby'         =>'date',
    ));
  }

  
  if ($studio->have_posts()) {
  while ($studio->have_posts()) : $studio->the_post();
  $post = get_post($id);
  $ttl=$post->post_title; 
  $fields = get_fields();
  $link = get_the_permalink();
  $address01 = strip_tags($fields['access_address01']);
  $address01 = preg_replace( "/\r|\n/", "", $address01);
  $zipcode = strip_tags($fields['access_zipcode']);
  $zipcode = preg_replace( "/\r|\n/", "", $zipcode);
  if($fields['access_address02'] !=''){
    $address02 = strip_tags($fields['access_address02']);
    $address02 = '<br>'.preg_replace( "/\r|\n/", "", $address02);
  } else{
    $address02 ='';
  }
// ====== MAP =======
  if($fields['access_tel'] != ''){
    $tel = $fields['access_tel'];
  }else{$tel = "";}
// ====== MAP =======
  if($fields['access_fax'] != ''){
    $fax = $fields['access_fax'];
  }else{$fax = "";}
  $html .= '
    <div class="lst-studio__item">
      <div class="lst-studio__item--map">
        <iframe class="lazy" width="600" height="450" frameborder="0" data-src="https://maps.google.com/maps?q='.$zipcode.$address01.'&amp;hl=ja&amp;output=embed" allowfullscreen></iframe>
      </div>
      <div class="lst-studio__item--info">
        <p class="ttl">'.$ttl.'</p>
        <p class="txt">'.$zipcode.'<br>'.$address01.$address02.'</p>
        <a href="tel:'.$tel.'" class="txt">TEL：'.$tel.'</a>
        <p class="txt">FAX：'.$fax.'</p>
        <div class="btn">
          <a href="'.$link.'" class="btn-detail">店舗ページへ</a>
          <a href="'.$zipcode.$address01.'" class="btn-location">地図をみる</a>
        </div>
      </div>
    </div>';
  endwhile;
} else{
  $html = '
  <div class="lst-studio__notfound">
    <div class="lst-studio__notfound--ttl">No Result Found</div>
    <p class="lst-studio__notfound--txt">We can\'t find any item matching your search</p>
  </div>
  ';
}
  $project = [];
  $project['total'] = $html;
  $project['html'] = $html;
  // echo "<p>none</p>";
  echo json_encode($project);
?>