
<div class="footer_head">
	<ul>
		<li><a href="index.php">Trang chủ</a></li>
		<?php 
		$list_menu_footer=list_menu_footer();
		while($row=mysql_fetch_array($list_menu_footer)){
		?>
		<li><a href="<?php echo $row[2];?>/"><?php echo $row[1];?></a></li>

		<?php 
		}
		?>
	</ul>
	<div class="footHead_right">
		<p>
			<span>Lượt truy cập</span>
			<strong><?php 
				$get_sl=get_sl();
				echo $get_sl[0];
			?></strong>
		<div style="clear: both;"></div>
		</p>

		
	</div>
	<div style="clear: both;"></div>
</div>
<div class="footer_content">
	<h3>Siêu thị mua bán hàng online hàng đầu tại Hà Nội - gtmart.vn</h3>
	<p>Bản quyền © 2011 Công ty TNHH Thương Mại và Dịch Vụ Gia Thịnh</p>
	<p>VPGD: Số 44, ngõ 30 Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội</p>
	<p>Điện thoại: 04.3623 0588    Fax: 04 3623 1376. Hotline: 0904.99.55.86 (Mrs Hà)</p>
</div>