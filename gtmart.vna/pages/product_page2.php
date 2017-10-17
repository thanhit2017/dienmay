<?php 
	$id_menu=$_GET['id_menu'];
	$list_table_sp_lq=list_table_sp_lq('menu',$id_menu,'limit 6');
	$row=mysql_fetch_array($list_table_sp_lq);
?>

<div class="main-listSp">
	<div class="item-list">
		<h1 id="h1">
			<?php echo $row[1] ?>

		</h1>
		
		<div class="listSp-items">
		<?php 
			$list_table_sp_lq1=list_table_sp_lq('product',$id_menu,'limit 6');
		
			while($row1=mysql_fetch_array($list_table_sp_lq1)){
		?>
			<div class="col4">
			
					<div class="itemSp">
						<div class="Sp_title">
							<a href="pageDetailpro.php">
								<?php echo $row1[1]; ?>
							</a>
						</div>
						<a href="index.php?page=10&id_product=<?php echo $row[0]?>" class="img">
							<img src="images/<?php echo $row1[4]?>">
						</a>
						<p>Giá: <?php echo number_format($row1[3],0,',','.').VND;?></p>
						<p>
							Đặt hàng: 
							<a href="index.php?page=12&id_product=<?php echo $row1[0]?>"><i class="fa fa-shopping-cart"></i></a>
						</p>
					</div>
				</div>
		<?php 
			}
		?>

			<div style="clear: both;"></div>
		</div>

	</div>

</div>