<!--:: Nội Dung chi tiết::-->
<div class="mainGaneral">
	<h1 id="h1">Nội Dung chi tiết</h1>
	<?php 
		$ten_kd_news=str_replace( '.html', '', $mang[3] );
		$detail_ten_kd_news=detail_ten_kd_news($ten_kd_news);
	?>
	<p>
		<span><?php echo $detail_ten_kd_news[6]?></span>
	<div style="clear: both;"></div>
	</p> 
	
	<h2 id="h2"><?php echo $detail_ten_kd_news[1]?></h2>
	<div class="introContent">
		<?php echo $detail_ten_kd_news[5]?>
	</div>
</div>
<!--:: Nội Dung chi tiết ::-->
