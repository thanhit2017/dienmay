<?php 

$url = $_SERVER['REQUEST_URI'];
$mang = explode('/', $url);
?>	
<?php 
		
	while($row=mysql_fetch_array($list)){
	$menu = detail_menu_id($row[5]);
?>
<div class="col4">
	<div class="itemSp">
		<div class="Sp_title">
			<a href="<?php echo $menu[2]; ?>/<?php echo $row[2];?>.html">
				<?php echo $row[1]?>
			</a>
		</div>
		<a href="<?php echo $menu[2]; ?>/<?php echo $row[2];?>.html" class="img">
			<img src="images/<?php echo $row[4]?>">
		</a>
		  <p>Giá: <?php echo number_format($row[3],0,',','.').' VND';?></p>
		<p>
			Đặt hàng: 
			<a href="Add-Gio-Hang/<?php echo $row[0]?>.html"><i class="fa fa-shopping-cart"></i></a>
		</p>
	</div>
</div>
<?php 
	}
?>

<div style="clear: both;"></div>

<?php 
if($page!=0){
	$loai=$mang[2];
	$sosp1loaitin=number_product($loai);
	$id_loaisp=$sosp1loaitin[0];
	$detail_product=search_tenkd_product($id_loaisp); 

	$tongsotin=mysql_num_rows($detail_product);
	$tongsotrang=ceil($tongsotin/$sotin1trang);
?>
	  
<div class="pagina" style="text-align: center;">
	<ul class="pagination" style="padding:0; ">
		<?php
		 if($mang[3]!="" && $mang[3]!=1){
		?>
		<li>
			<a href="<?php echo $loai;?>/<?php echo ($mang[3]-1) ?>/">
				<i class="fa fa-angle-double-left"></i>
			</a>
		</li>
		<?php 
		}
		?>
	<?php 
	for($i=1;$i<=$tongsotrang;$i++){
	?>
		<li><a href="<?php echo $loai;?>/<?php echo $i;?>/"><?php echo $i;?></a></li>
		<?php 
		}
		if($mang[3] != $tongsotrang){
		?>
		<li>
			<a href="<?php echo $loai;?>/<?php echo ($mang[3]+1) ?>/">
				<i class="fa fa-angle-double-right"></i>
			</a>
		</li>
		<?php 
			}
		?>
	</ul>

<div style="clear: both;"></div>
</div>
<?php 
		 }
?>
