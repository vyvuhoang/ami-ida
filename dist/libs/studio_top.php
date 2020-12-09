  <?php $studioarea = array(
      'post_type'                => 'studio',
      'orderby'                  => 'id',
      'order'                    => 'DESC',
      'hide_empty'               => 1,
      'taxonomy'                 => 'studioarea' ,
      'pad_counts'              => false,
  );
  $categories = get_categories( $studioarea );?>
  <?php $studio = new WP_Query(array(
    'post_type'       => 'studio',
    'showposts'       => -1,
    'post_status'     => 'publish',
    'orderby'         =>'date',
  ));
  if ($studio->have_posts()) :?>
  <div class="studio wcm">
  	<h3 class="the-title inview fadeInBottom">体験レッスン受付中の<br class="sp">スタジオ一覧</h3>
  	<p class="studio__txt inview fadeInBottom">※店舗により体験内容・キャンペーン内容が異なります。<br>詳細は、 各店舗ページをご覧ください。</p>
  	<div class="studio__select inview fadeInBottom">
  		<select>
  			<option value="">All</option>
  			<?php foreach($categories as $cat){ ?>
  			<option value="<?php echo $cat->name; ?>" <?php //if($cat->name == '東京'){echo "selected";} ?>><?php echo $cat->name; ?></option>
  			<?php } ?>
  		</select>
  	</div>
  	<div class="lst-studio inview fadeInBottom" id="list-studio">
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
  					<?php  if(!empty($fields['access_tel'])){ echo '<br>'.$fields['access_address02'];} ?>
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
  	<a href="<?php echo APP_URL; ?>studio/" class="c-btn inview fadeInBottom">もっとみる</a>
  </div>
	<?php endif; ?>