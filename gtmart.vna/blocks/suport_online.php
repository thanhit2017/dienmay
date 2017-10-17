
<div class="banner_pr">
<?php 
	$rand_product=rand_product();
	while($row=mysql_fetch_array($rand_product)){
		$menu = detail_table('product',$row[0]);
?>
	<div class="item_pr">
		<a href="<?php echo $menu[2]; ?>/<?php echo $row[2];?>.html">
			<img src="images/<?php echo $row[4];?>">
		</a>
	</div>
<?php 
	}
?>	
</div>