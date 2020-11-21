<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php
// set viewport by user agent.
require_once 'ua.class.php';
$ua = new UserAgent();
if($ua->set() === 'tablet') echo '<meta content="width=1024" name="viewport">';
else echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">';

$current_url = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '').'://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
include(APP_PATH.'libs/argument.php');
?>
<script src="<?php echo APP_ASSETS ?>js/ipad.min.js"></script>
<script>
if(isIpad()) document.querySelectorAll('meta[name="viewport"]')[0].setAttribute("content", "width=1024, shrink-to-fit=no");
</script>

<title><?php echo $titlepage?></title>
<meta name="description" content="<?php echo $desPage; ?>">
<meta name="keywords" content="<?php echo $keyPage; ?>">


<!-- Favicons, uncomment out when you get the project's favicon -->
<!-- <link rel="icon" href="<?php echo APP_ASSETS; ?>img/common/icon/favicon.ico" type="image/vnd.microsoft.icon"> -->

<?php
// include_once(APP_PATH.'wp/wp-load.php');
if(defined('ABSPATH')) wp_head();
echo 'user log id:'.$_SESSION['logID'];
?>