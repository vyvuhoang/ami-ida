<header class="mheader">
  <div class="container-1140">
    <div class="ttl"><a href="<?php echo APP_URL;?>manage/"><?php echo $page_ttl?></a></div>
    <div class="right">
      <?php if($thisPageName == 'manage-schedule'){?>
        <a href="<?php echo $studio_url;?>application/" class="btn-application">体験予約ダッシュボード</a>
        <a href="<?php echo APP_URL;?>manage/schedule-format/" class="btn-schedule-format">レッスン登録</a>
      <?php }?>
      <?php if($thisPageName == 'manage-application'){?>
        <a href="<?php echo $studio_url;?>schedule/" class="btn-schedule">レッスンスケジュール登録</a>
      <?php }?>
      <?php if($thisPageName == 'manage-application' || $thisPageName == 'manage-top' || $thisPageName == 'manage-account-setting'){?>
        <a href="<?php echo APP_URL;?>manage/account-setting/" class="btn-setting">アカウント設定</a>
      <?php }?>
    </div>
  </div>
</header>