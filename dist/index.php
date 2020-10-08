<?php
$thisPageName = 'top';
include_once(dirname(__FILE__) . '/app_config.php');
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/top.min.css">
</head>
<body id="top" class='top'>
<!-- HEADER -->
<?php include(APP_PATH.'libs/header.php'); ?>
<div id="wrap">
  <main>
    <!-- code here -->
  </main>
</div> <!-- #wrap -->
<!-- FOOTER -->
<?php include(APP_PATH.'libs/footer.php'); ?>
<script src="<?php echo APP_ASSETS ?>js/page/top.min.js"></script>
</body>
</html>