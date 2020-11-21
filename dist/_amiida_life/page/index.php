<?php
$thisPageName = 'page';
include_once(dirname(__DIR__) . '/app_config.php');
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/page.min.css">
</head>
<body id="page" class='page'>
<!-- HEADER -->
<?php include(APP_PATH.'libs/header.php'); ?>
<div id="wrap">
  <main>
    <!-- code here -->
  </main>
</div><!-- #wrap -->
<!-- FOOTER -->
<?php include(APP_PATH.'libs/footer.php'); ?>
</body>
</html>
