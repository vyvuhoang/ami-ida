<?php
include_once('../../app_config.php');
include_once(APP_PATH.'wp/wp-load.php');
$thisPageName = 'manage-news';
wp_head();
wp_enqueue_media();
$settings = array(
  'media_buttons' => true,
  'dfw' => true,
  'textarea_name' => 'vceditor',
  "drag_drop_upload" => true
);
$editor_id = "vceditor";
$settings = array(
  'wpautop' => false
);
var_dump(stripslashes($_POST['vceditor']));
?>
<form action="" method="POST">
<?php wp_editor( wpautop(''), $editor_id, $settings );?>
<button type="submit">submit</button>
</form>

<?php
wp_footer();
?>