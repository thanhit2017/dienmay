<marquee behavior="top" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" direction="left" width="" height="89" align="center">
	<?php 
		$list_partner= list_table('partner');
		while($row=mysql_fetch_array($list_partner)){
	?>
	
	<a href="<?php echo $row[2];?>">
		<img src="images/<?php echo $row[1];?>">
	</a>
	
	<?php 
		}
	?>
</marquee>