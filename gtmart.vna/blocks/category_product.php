<h1 id="h1">DANH MỤC SẢN PHẨM</h1>
<ul>
<?php
	$menu = menu(2);
	while($row = mysql_fetch_array($menu)){
?>
	<li>
		<a href="<?php echo $row[2];?>/"><?php echo $row[1];?></a>
		<?php
		$menu1 = menu($row[0]);
		$test1 = mysql_num_rows($menu1);
		if($test1 >0){ 
		?>
		<ul>
		<?php 
			while($row1 = mysql_fetch_array($menu1)){
		?>
			<li><a href="<?php echo $row1[2];?>/"><?php echo $row1[1]?></a></li>
		<?php 
			}
		?>
		</ul>
		<?php 
		}
		?>	
	</li>
<?php
	}
?>
</ul>