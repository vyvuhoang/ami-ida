<?php
$pagename = str_replace(array('/', '.php'), '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$pagename = $pagename ? $pagename : 'default';
$pagename = (isset($thisPageName)) ? $thisPageName : $pagename;
switch ($pagename) {
  case '':
    if(empty($titlepage)) $titlepage = 'About us title';
    if(empty($desPage)) $desPage = '';
    if(empty($keyPage)) $keyPage = '';
    if(empty($txtH1)) $txtH1 = 'H1 content for about us';
  break;
  default:
    if(empty($titlepage)) $titlepage = '天然溶岩石のホットヨガ専門 | アミーダ【公式】';
    if(empty($desPage)) $desPage = '溶岩ホットヨガの専門店【アミーダ】です。天然溶岩石で身体を温めるので、ホットヨガのデメリットや効果がなかった方におすすめです。溶岩浴が体験できます！初心者でも、体が硬くてもOK！今ならお得な体験キャンペーン実施中！是非、お待ちしています！';
    if(empty($keyPage)) $keyPage = 'ホットヨガ,溶岩ヨガ,溶岩石,体験,レッスン,アミーダ,AMI-IDA';
    if(empty($txtH1)) $txtH1 = 'H1 Default';
}