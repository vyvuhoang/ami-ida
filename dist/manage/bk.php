<div class="sec-lst-schedule js-lst-schedule" style="display: none">
  <h3 class="ttl">登録されているレッスン</h3>
  <ul class="lst-ttl">
    <li class="item">レッスンタイトル</li>
    <li class="item">日程</li>
    <li class="item">開始時間</li>
    <li class="item">終了時間</li>
    <li class="item">担当インストラクター</li>
    <li class="item"></li>
  </ul>
  <?php foreach($schedule_fields as $key=> $value){?>
  <input type="hidden" id="schedule_delete" name="schedule_delete" value="" class="js-val-row-delete">
  <div class="js-rp rp">
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
        <select name="<?php echo $key.'_'.$i.'_'.$rp_key?>" id="<?php echo $key.'_'.$i.'_'.$rp_key?>"
          class="restrict" disabled>
          <?php if(!get_sub_field($rp_key, $studio_id)->ID){?>
          <option value="">
            <?php echo get_sub_field('custom_lesson_title', $studio_id)?>
          </option>
          <?php }?>
          <?php foreach($lesson_master_arr as $lesson_master_key => $lesson_master_val){
                $selected = (get_sub_field($rp_key, $studio_id)->ID) == $lesson_master_val['id'] ? ' selected' : '';
                ?>
          <option value="<?php echo $lesson_master_val['id'];?>" <?php echo $selected;?> data-id="
            <?php echo $lesson_master_val['id'];?>" data-ttl="
            <?php echo $lesson_master_val['ttl'];?>" data-content="
            <?php echo $lesson_master_val['content'];?>" data-level="
            <?php echo $lesson_master_val['level'];?>">
            <?php echo $lesson_master_val['ttl'];?>
          </option>
          <?php }?>
        </select>
        <?php
                break;
              case 'date':
            ?>
        <input type="text" id="<?php echo $key.'_'.$i.'_'.$rp_key?>"
          name="<?php echo $key.'_'.$i.'_'.$rp_key?>" class="js-datepicker datepicker restrict"
          value="<?php echo get_sub_field($rp_key, $studio_id);?>" disabled>
        <?php
                break;
              default:
            ?>
        <input type="text" name="<?php echo $key.'_'.$i.'_'.$rp_key?>"
          id="<?php echo $key.'_'.$i.'_'.$rp_key?>" value="<?php echo get_sub_field($rp_key, $studio_id);?>"
          disabled>
        <?php
                break;
            ?>
        <?php }
          }?>
        <div class="btn-edit js-edit-row">修正する</div>
        <div class="btn-delete delete-rp js-delete-row">削除する</div>
      </div>
    </div>
    <?php
          $i++;
        }
      }
    ?>
  </div>
  <input type="hidden" id="<?php echo $key;?>" name="<?php echo $key;?>" value="<?php echo $i;?>"
    class="js-number-rp">
  <?php }?>
</div>