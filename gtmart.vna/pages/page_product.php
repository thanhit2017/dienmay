<!--:: SẢN PHẨM ::-->
<div class="main-listSp">
<?php
	
	$sotin1trang=2;
	
	if($mang[3] == "" || $mang[3]==1){
		$from = 0;
	}else{
		$from = $mang[3]*($sotin1trang-1);
	}
	$ten_kd = $mang[2];
	$tim_id =detail_menu_name($ten_kd);
	$id_menu = $tim_id[0];
	
	if($id_menu==0){
		$list_title_product = list_title_product();
		while($row = mysql_fetch_array($list_title_product)){
?>                                    

		<div class="item-list">
			<h1 id="h1">
				<?php echo $row[1]; ?>
				<a href="" style="color:white">Xem thêm</a>
			</h1>
		
			<div class="listSp-items">
		<?php 

		$list=list_product_menu($row[0],$from,$sotin1trang);
		include ("list_product.php");
		?>	
				
			</div>
		</div>

	<!--:: END SẢN PHẨM ::-->
<?php
		}
	}else{
?>
	<!--:: SẢN PHẨM ::-->
	
		<div class="item-list">
			<h1 id="h1">
				<?php
					$detail_menu = detail_menu($id_menu);
					echo $detail_menu[1]; 
				?>
				
			</h1>
			<div class="listSp-items">
				<?php 

				$list=list_product_menu($detail_menu[0],$from,$sotin1trang);
				include ("list_product.php");
				?>
				
			</div>
		</div>

	<!--:: END SẢN PHẨM ::-->
<?php
	}
?>

</div>