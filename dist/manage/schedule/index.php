<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = explode("/",$request_uri);

$studio_id = $_GET['studio_id'];

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
    );
  }
}


//ajax action
session_start();
if (isset($_POST) && !empty($_POST)) {
  foreach ($_POST as $key => $value) {
    switch ($key) {
      case 'schedule':
        update_post_meta($studio_id, $key, $value);
        update_post_meta($studio_id, '_'.$key, $field_key_rp_schedule[$key]);
        break;
      case 'is_create':
        break;
      default:
        update_field($key, $value, $studio_id);
        break;
    }
  }
  // $result = array();
  // $result['status'] = 'success';
  // echo json_encode($result);
  if(!isset($_POST['is_create']) || empty($_POST['is_create'])){
    return;
  }
}

include(APP_PATH.'libs/manage_head.php');
?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
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
              $isSelected = $studio_id == $studio_val['id'] ? ' selected' : '';
              ?>
              <option value="<?php echo APP_URL.'manage/'.$studio_val['id'].'/schedule/';?>"<?php echo $isSelected;?>><?php echo $studio_val['ttl'];?></option>
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
    <form id="form-schedule" class="js-form-schedule" method="POST">
      <div class="sec-create js-new-post">
        <input type="hidden" name="is_create" id="is_create" value="1">
        <div class="item">
          <h3 class="item-ttl">レッスンタイトル</h3>
          <div class="item-field">
            <select name="schedule_0_lesson_master" id="schedule_0_lesson_master" class="js-create-select">
              <option value="">Choose a lesson</option>
              <?php foreach($lesson_master_arr as $lesson_master_key => $lesson_master_val){?>
                <option value="<?php echo $lesson_master_val['id'];?>" data-id="<?php echo $lesson_master_val['id'];?>" data-ttl="<?php echo $lesson_master_val['ttl'];?>" data-content="<?php echo $lesson_master_val['content'];?>" data-level="<?php echo $lesson_master_val['level'];?>"><?php echo $lesson_master_val['ttl'];?></option>
              <?php }?>
            </select>
            <p class="note">∟「テキスト入力」を選択すると、テキスト入力ができる</p>
          </div>
        </div>
        <div class="item">
          <h3 class="item-ttl">レッスン内容</h3>
          <div class="item-field">
            <p class="txt textarea js-lesson-content"></p>
          </div>
        </div>
        <div class="item">
          <h3 class="item-ttl">レッスン難易度</h3>
          <div class="item-field">
            <p class="txt txt-small-field js-lesson-level"></p>
          </div>
        </div>
        <div class="item">
          <h3 class="item-ttl">レッスン内容</h3>
          <div class="item-field">
            <input type="text" id="schedule_0_date" name="schedule_0_date" class="js-datepicker restrict">
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
        <div class="item">
          <h3 class="item-ttl">担当インストラクター名</h3>
          <div class="item-field">
            <input type="text" id="schedule_0_instructor" name="schedule_0_instructor" class="schedule_0_instructor">
          </div>
        </div>
        <p class="btn-add-new js-add-new">この内容でスケジュールを登録する</p>
        <p class="txt-status js-status"><?php if (isset($_POST) && !empty($_POST)) {echo '登録が完了しました！';}?></p>
      </div>
      <div class="sec-lst-schedule">
        <h3 class="ttl">登録されているレッスン</h3>
        <?php foreach($schedule_fields as $key=> $value){?>
        <input type="hidden" id="candidate_exp_com_delete" name="candidate_exp_com_delete" value="" class="js-val-row-delete">
        <div class="js-rp">
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
                  <input type="text" id="<?php echo $key.'_'.$i.'_'.$rp_key?>" name="<?php echo $key.'_'.$i.'_'.$rp_key?>" class="js-datepicker restrict" value="<?php echo get_sub_field($rp_key, $studio_id);?>" disabled>
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
                <div class="btn-edit js-edit-row">編集(edit)</div>
                <div class="delete-rp js-delete-row">削除(delete)</div>
              </div>
            </div>
          <?php
                $i++;
              }
            }
          ?>
        </div>
        <input type="hidden" id="<?php echo $key;?>" name="<?php echo $key;?>" value="<?php echo $i;?>" class="js-number-rp">
        <p class="js-add-row">経験企業を追加する</p>
        <?php }?>
      </div>
    </form>
  </main>
  <?php include(APP_PATH.'libs/manage_footer.php');?>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  var inputs,
      data = {};

  $(document).ready(function() {
    addDatePicker();
    addSchedule();
    deleteRow();
    // addNewRowRP();
    addNewSchedule();
    yearMonthFilter();
    selectRedirect();
    // reverseListSchedule();
  })
  function addDatePicker(){
    $('body').on('focus', '.js-datepicker', function(){
      $(this).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy/mm/dd',
      })
    });
  }
  function addSchedule(){
    $('body').on('click', '.js-edit-row', function(){
      fields = $(this).closest('.js-row').find('input, textarea, select').not('.restrict');
      if($(this).is('.editing')){
        $(this).text('編集(edit)');
        $(this).removeClass('editing');
        fields.prop('disabled', true);
        $('.js-form-schedule').trigger('submit');
      }else{
        $(this).text('セーブ(save)');
        $(this).addClass('editing');
        fields.prop('disabled', false);
      }
    })

    $('.js-form-schedule').on('submit', function() {
      if($(this).is('.creating')){
        inputs = $(this).find('input, textarea, select');
        inputs.each(function(key, value) {
          var name = $(this).attr('name'),
              val = $(this).val();
          data[name] = val;
        })
      }else{
        inputs = $('.js-rp').find('input, textarea, select');
        inputs.each(function(key, value) {
          var name = $(this).attr('name'),
              val = $(this).val();
          data[name] = val;
        })
        data['schedule'] = parseInt($('input[name=schedule]').val()) - 1;
        $.ajax({
          method: 'POST',
          dataType: 'json',
          data: data
        }).success(function(data) {
          // $('.js-status').text(data.status);
        }).error(function(xhr, status, error) {
          console.log(xhr + status + error);
        })
        return false;
      }
    })
  }
  // function addNewRowRP(){
  //   $('body').on('click', '.js-add-row', function(){
  //     var size = $('.js-rp .js-row').length,
  //         name_input,
  //         id_input;
  //     $('.js-number-rp').attr('value', size + 1);
  //     $('.js-rp .js-row').eq(0).clone().appendTo('.js-rp').attr('data-row', size);

  //     // Set new name for INPUT when clone
  //     $('.js-row[data-row='+size+']').find('input, textarea, select').each(function() {
  //         name_input = $(this).attr('name');
  //         new_name_input = name_input.replace('_0_', '_' + size + '_');
  //         id_input = $(this).attr('id');
  //         new_id_input = id_input.replace('_0', '_' + size);
  //         $(this).attr('name', new_name_input);
  //         $(this).attr('id', new_id_input);
  //     });


  //     // Reset Non value when clone box
  //     $('.js-row[data-row='+size+']').find('input, textarea, select').val('');
  //     addDatePicker();
  //   })
  // }

  function deleteRow(){
    $('body').on('click', '.js-delete-row', function(){
      var size = $('.js-rp .js-row').length + 1,
          pos = $(this).closest('.js-row').attr('data-row');
      $(this).closest('.js-row').remove();
      $('.js-val-row-delete').attr('value', $('.js-val-row-delete').attr('value') + ' ' + pos);
      $('.js-number-rp').attr('value', size - 1);
      var i = 0;
      $('.js-rp .js-row').each(function(){
        var thisRow = $(this).attr('data-row');
        $(this).attr('data-row', i);
        // Set new name for INPUT when clone
        $(this).find('input, textarea, select').each(function() {
            name_input = $(this).attr('name');
            new_name_input = name_input.replace('_' + thisRow + '_', '_' + i + '_');
            id_input = $(this).attr('id');
            new_id_input = id_input.replace('_' + thisRow, '_' + i);
            $(this).attr('name', new_name_input);
            $(this).attr('id', new_id_input);
        });
        i++;
      })

      $('.js-new-post').each(function(){
        var thisRow = $(this).attr('data-row');
        $(this).attr('data-row', i);
        // Set new name for INPUT when clone
        $(this).find('input, textarea, select').each(function() {
            name_input = $(this).attr('name');
            new_name_input = name_input.replace('_' + thisRow + '_', '_' + i + '_');
            id_input = $(this).attr('id');
            new_id_input = id_input.replace('_' + thisRow, '_' + i);
            $(this).attr('name', new_name_input);
            $(this).attr('id', new_id_input);
        });
        i++;
      })

      setTimeout(function(){
        $('.js-form-schedule').trigger('submit');
      }, 200);
    })
  }

  function addNewSchedule(){
    var stars = ['★', '★★', '★★★', '★★★★', '★★★★★'];
    $('.js-create-select').on('change', function(){
      var option = $('option:selected', this),
          data_id = option.attr('data-id'),
          data_ttl = option.attr('data-ttl'),
          data_content = option.attr('data-content'),
          data_level = option.attr('data-level'),

          el_content = $('.js-lesson-content'),
          el_level = $('.js-lesson-level');
      el_content.html('').append($.parseHTML(data_content));
      el_level.text(stars[(parseInt(data_level) - 1)]);
    })

    var size = $('.js-rp .js-row').length,
        name_input,
        id_input;
    $('.js-number-rp').attr('value', size + 1);
    $('.js-new-post').attr('data-row', size);

    $('.js-new-post').find('input, textarea, select').each(function() {
        name_input = $(this).attr('name');
        new_name_input = name_input.replace('_0_', '_' + size + '_');
        id_input = $(this).attr('id');
        new_id_input = id_input.replace('_0', '_' + size);
        $(this).attr('name', new_name_input);
        $(this).attr('id', new_id_input);
    });

    $('body').on('click', '.js-add-new', function(){
      $('.js-form-schedule').addClass('creating');
      setTimeout(function(){
        $('.js-form-schedule').trigger('submit');
      }, 100);
      setTimeout(function(){
        $('.js-form-schedule').removeClass('creating');
      }, 200);
    })
  }

  function yearMonthFilter(){
    var ym = getUrlParameter('ym');
    if(ym !== undefined){
      console.log(ym);
      $('.js-rp .js-row').find('.js-datepicker').each(function(){
        var thisDate = $(this).val(),
            date = new Date(thisDate),
            day = date.getDate(),
            month = date.getMonth()+1,
            year = date.getFullYear(),
            thisYM = year+'/'+month;
        if(ym != thisYM){
          $(this).closest('.js-row').hide();
        }
      });
    }
  }

  function selectRedirect(){
    $('.js-select-redirect').on('change', function () {
      var url = $(this).val();
      if (url) {
        window.location = url;
      }
      return false;
    });
  }

  // function reverseListSchedule(){
  //   var list = $('.js-rp');
  //   var listItems = list.children('.js-row');
  //   list.append(listItems.get().reverse());
  // }

  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
    }
  };
</script>
</body>
</html>