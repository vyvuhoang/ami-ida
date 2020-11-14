<?php
// date_default_timezone_set('Asia/Ho_Chi_Minh'); // For Vietnam
date_default_timezone_set('Asia/Tokyo'); // For Japan

$dist = '';
// get protocol.
$url = $_SERVER['HTTP_HOST'].'/'.$dist;
$protocol = empty($_SERVER["HTTPS"]) ? 'http://' : 'https://';

// Define Environment
define('ENVIRONMENT', 'dev');

// Get dist folder.
$script_name = str_replace($_SERVER['QUERY_STRING'], '', $_SERVER['SCRIPT_NAME']);
$script_filename = str_replace(dirname(__FILE__), '', str_replace('private_html', 'public_html', $_SERVER['SCRIPT_FILENAME']));
$dist = trim(str_replace($script_filename, '', $script_name), "/");
if(!empty($dist)) $dist .= '/';
if (strpos($dist,".php") !== false || strpos($dist,".html") !== false || strpos($dist,".htm") !== false) $dist = "";

// get protocol.
$protocol = empty($_SERVER["HTTPS"]) ? 'http://' : 'https://';

// get host.
$app_url = $protocol.$_SERVER['HTTP_HOST'].'/'.$dist;
define('APP_URL', $app_url);
define('APP_PATH', dirname(__FILE__).'/');
define('APP_ASSETS', APP_URL.'assets/');

define('GOOGLE_MAP_API_KEY', '');
define('GOOGLE_RECAPTCHA_KEY_API', '');
define('GOOGLE_RECAPTCHA_KEY_SECRET', '');

/* email list for forms */
if(ENVIRONMENT == 'dev') {
  //contact
  $aMailtoContact = array('bacforthings@gmail.com');
  $aBccToContact = array('bacforstudy@gmail.com');
  $fromContact = "bacforthings@gmail.com";
  $fromName = "Ami-ida";
} else {
  //contact
  $aMailtoContact = array('bacforthings@gmail.com');
  $aBccToContact = array('bacforstudy@gmail.com');
  $fromContact = "bacforthings@gmail.com";
  $fromName = "Ami-ida";
}
