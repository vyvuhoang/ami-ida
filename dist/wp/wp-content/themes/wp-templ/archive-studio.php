<?php
if(!empty($_GET['area'])) {$_area = $_GET['area'];}
else{$_area="";}
$thisPageName = 'studio';
include(APP_PATH.'libs/head.php');
?>
<link rel="stylesheet" href="<?php echo APP_ASSETS ?>css/page/studio.min.css">
</head>
<body id="studio" class="studio">
<!-- HEADER -->
<?php include(APP_PATH.'libs/header.php'); ?>
<main id="wrap">
	<div class="banner">
	  <div class="banner-txt wcm">
	    <img src="<?php echo APP_ASSETS; ?>img/studio/banner_txt.svg" alt="AMIIDALIFE" width="178">
	  </div>
	</div>
	<div class="breadcrumb wcm" id="breadcrumb">
	  <li><a href="<?php echo APP_URL; ?>">
	    <img src="<?php echo APP_ASSETS; ?>img/common/icon/ico_home.svg" alt="HOME" width="24">
	  </a></li>
	  <li><p>店舗ページ</p></li>
	</div>
	<div class="std">
			<div class="c-search">
				<!-- <h1 class="the-title">体験レッスン受付中の<br class="sp">スタジオ一覧</h1> -->
				<div class="wcm">
					<div class="c-search__bar">
						<div class="btn-clear"></div>
						<input type="text" placeholder="店舗名を入力して検索" id="search_key">
						<div class="c-search__bar--btn js-search"><span>検索する</span></div>
					</div>
					<?php $studioarea = array(
					    'post_type'                => 'studio',
					    'orderby'                  => 'id',
					    'order'                    => 'DESC',
					    'hide_empty'               => 1,
					    'taxonomy'                 => 'studioarea' ,
					    'pad_counts'              => false,
					);
					$categories = get_categories( $studioarea );?>
					<div class="c-search__filter">
						<p class="c-search__filter--ttl">エリア</p>
						<select class="c-search__filter--select js-select">
							<option value="">All</option>
							<?php foreach($categories as $cat){ ?>
							<option value="<?php echo $cat->name; ?>" <?php if($cat->name == '東北'){echo "selected";} ?>><?php echo $cat->name; ?></option>
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
		    'tax_query' => array(
		      array(
		        'taxonomy' => 'studioarea',
		        'field' => 'slug',
		        'terms' => '東北',
		        )
		      ),
		  ));
		  if ($studio->have_posts()) :?>
			<div class="lst-studio wcm" id="list-studio">
				<?php while ($studio->have_posts()) : $studio->the_post();
		       $fields = get_fields();
		    ?>
				<div class="lst-studio__item">
					<div class="lst-studio__item--map">
						<iframe width="100" height="100" frameborder="0" src="https://maps.google.com/maps?q=<?php echo $fields['access_zipcode'].$fields['access_address01']; ?>&amp;hl=ja&amp;output=embed" allowfullscreen></iframe>
					</div>
					<div class="lst-studio__item--info">
						<p class="ttl"><?php echo get_the_title(); ?></p>
						<p class="txt">
							<?php echo $fields['access_zipcode'].'<br>'.$fields['access_address01']; ?>
							<?php  if(!empty($fields['access_address02'])){ echo '<br>'.$fields['access_address02'];} ?>
						</p>
						<?php if(!empty($fields['access_tel'])){ ?>
						<a href="tel:<?php echo $fields['access_tel']; ?>" class="txt">TEL：<?php echo $fields['access_tel']; ?></a>
						<?php } if(!empty($fields['access_fax'])){ ?>
						<p class="txt">FAX：<?php echo $fields['access_fax']; ?></p>
						<?php } ?>
						<div class="btn">
							<a href="<?php the_permalink(); ?>" class="btn-detail">店舗ページへ</a>
							<a target="_blank" href="https://maps.google.com/maps?q=<?php echo $fields['access_zipcode'].$fields['access_address01']; ?>&amp;hl=ja" class="btn-location">地図をみる</a>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
	</div>
<?php endif;; ?>
</main>
<?php include(APP_PATH.'libs/footer.php'); ?>
<script>
	var _url = "<?php echo APP_URL; ?>";
	var _area = "<?php echo $_area; ?>";
	$(document).ready(function() {
	  if(_area != ''){
	  	getAjax(_area,'');
	  	$('.js-select option[value="' + _area +'"]').prop("selected", true);
	  }
	})
	function callAjax(){
		var key = $('#search_key').val();
		var area = $('.js-select').val();
		getAjax(area,key);
	}
	$('.js-select').change( function(){
		callAjax();
	});
	$('.js-search').click( function(){
		callAjax();
	});
	$('#search_key').change( function(){
		callAjax();
	});
	$('#search_key').keypress( function(event){
		if ( event.which == 13 ) {callAjax();}
	});
	function getAjax(area,key){
		$('#list-studio').css({"opacity": 0});
	  $.ajax({
	    method: 'POST',
	    url: _url+"/libs/ajax-studio-archive.php", 
	    dataType: 'json',
	    data: {
	    	area: area,
	    	key: key,
	    },
	    success: function(data){
	      console.log(data);
	      $('#list-studio').html('');
	      $('#list-studio').append(data.html);
	      window.history.pushState({path:_url+'studio/'},'',_url+'studio/?area='+area);
	    },
	    complete: function(){
	    	$('#list-studio').css({"opacity": 1});
	    }
	  });
	};
</script>	
</body>
</html>