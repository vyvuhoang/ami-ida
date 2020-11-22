<header class="mheader">
  <div class="container-1140">
    <div class="ttl"><?php echo $page_ttl?></div>
    <div class="right">
      <?php if($thisPageName == 'manage-application'){?>
        <a href="<?php echo $studio_url;?>schedule/" class="btn-schedule">レッスンスケジュール登録</a>
      <?php }?>
      <?php //if($thisPageName == 'manage-application' || $thisPageName == 'manage-top'){?>
        <!-- <div class="btn-setting">アカウント設定</div> -->
      <?php //}?>
    </div>
  </div>
</header>