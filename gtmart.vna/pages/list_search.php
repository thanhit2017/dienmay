<?php 
		$page=$mang[3];
		$page = str_replace('.html','',$page);
		$mang1 = explode('-', $page);
		
	$lsp=$mang1[0];
	$made=$mang1[1];
	$brand=$mang1[2];
	$price=$mang1[3];
	$list_product_menu=list_search($lsp,$made,$brand,$price);
?>
<div class="main-listSp">

	<div class="item-list">
		<h1 id="h1">
			Search
			
		</h1>
		<div class="listSp-items">
		<?php
			$num = mysql_num_rows($list_product_menu);
			if($num == 0){
				echo "<center>không có sản phẩm</center>";
			}
			while($row=mysql_fetch_array($list_product_menu)){
		?>
			<div class="col4">
				<div class="itemSp">
					<div class="Sp_title">
						<a href="10-<?php echo $row[0]?>-<?php echo $row[2];?>.html">
							<?php echo $row[1]?>
						</a>
					</div>
					<a href="10-<?php echo $row[0]?>-<?php echo $row[2];?>.html" class="img">
						<img src="images/	<?php echo $row[4]?>">
					</a>
					<p>	<?php echo $row[3]?></p>
					<p>
						Đặt hàng: 
						<a href="#"><i class="fa fa-shopping-cart cart1"></i></a>
					</p>
				</div>
			</div>
		<?php 
			}
		?>		
			
			<div class="pagina" style="text-align: center;">
			
		</div>

			<div style="clear: both;"></div>
		</div>
	</div>
   

</div>
<!--:: END SẢN PHẨM ::-->