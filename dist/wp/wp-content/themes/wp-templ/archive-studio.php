<?php
$thisPageName = 'studio';
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/studio.min.css">
</head>
<body id="studio" class="studio">
<!-- HEADER -->
<?php include(APP_PATH.'libs/header.php'); ?>
<main id="wrap">
	<div class="c-search">
		<h1 class="the-title">体験レッスン受付中の<br class="sp">スタジオ一覧</h1>
		<div class="wcm">
			<div class="c-search__bar">
				<input type="text" placeholder="Search.." id="search_key">
				<div class="c-search__bar--btn js-search"><span>Search</span></div>
			</div>
			<?php $newscat = array(
			    'post_type'                => 'studio',
			    'orderby'                  => 'id',
			    'order'                    => 'DESC',
			    'hide_empty'               => 1,
			    'taxonomy'                 => 'studiocat' ,
			    'pad_counts'              => false,
			);
			$categories = get_categories( $newscat );?>
			<div class="c-search__filter">
				<p class="c-search__filter--ttl">エリア</p>
				<select class="c-search__filter--select js-select">
					<option value="">Choose</option>
					<?php foreach($categories as $cat){ ?>
					<option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<?php $studio = new WP_Query(array(        
    'post_type'       => 'studio',
    'showposts'       => -1,
    'post_status'     => 'publish',
    'orderby'         =>'date',
  ));
  if ($studio->have_posts()) :?>
	<div class="lst-studio wcm">
		<?php while ($studio->have_posts()) : $studio->the_post();
       $fields = get_fields();
    ?>
		<div class="lst-studio__item">
			<div class="lst-studio__item--map">
				<iframe class="lazy" width="600" height="450" frameborder="0" data-src="https://maps.google.com/maps?q=<?php echo strip_tags($fields['access_add']); ?>&amp;hl=ja&amp;output=embed" allowfullscreen></iframe>
			</div>
			<div class="lst-studio__item--info">
				<p class="ttl"><?php echo get_the_title(); ?></p>
				<p class="txt"><?php echo $fields['access_add']; ?></p>
				<?php if(!empty($fields['access_tel'])){ ?>
				<a href="tel:<?php echo $fields['access_tel']; ?>" class="txt">TEL：<?php echo $fields['access_tel']; ?></a>
				<?php } if(!empty($fields['access_fax'])){ ?>
				<p class="txt">FAX：<?php echo $fields['access_fax']; ?></p>
				<?php } ?>
				<div class="btn">
					<a href="<?php the_permalink(); ?>" class="btn-detail">店舗ページへ</a>
					<a target="_blank" href="https://maps.google.com/maps?q=<?php echo strip_tags($fields['access_add']); ?>&amp;hl=ja" class="btn-location">地図をみる</a>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
<?php endif;; ?>
</main>
<?php include(APP_PATH.'libs/footer.php'); ?>
<script>
	var _url = "<?php echo APP_URL; ?>";
	$('.js-select').change( function(){
		var area = $(this).val();
		var key = $('#search_key').val();
		console.log(key);
		console.log(area);
		getAjax(area,key);
	});
	$('.js-search').click( function(){
		var key = $(this).val();
		var area = $('.js-select').val();
		console.log(key);
		console.log(area);
		getAjax(area,key);
	});
	function getAjax(area,key){
	  $.ajax({
	    method: 'POST',
	    url: url+"libs/ajax-studio-archive.php", 
	    dataType: 'json',
	    data: {
	    	area: area,
	    	key: key,
	    },
	    success: function(data){
	      console.log(data);
	    },
	  });
	};
</script>	
</body>
</html>