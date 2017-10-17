<marquee behavior="top" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" direction="up" width="" height="200" align="center">
	<?php 
		$list_new_right=list_new_right();
		while($row=mysql_fetch_array($list_new_right)){
	?>
	<div class="itemNews">
		<div class="col3">
			<a href="Tin-Tuc/<?php echo $row[2]?>.html"><img src="images/<?php echo $row[3];?>"></a>
		</div>
		<div class="col9">
			<div class="newsCont">
				<a href="index.php?page=11&id_news=<?php echo $row[0];?>">
					<?php 
						echo $row[1];
					?>
				</a>
			</div>
		</div>
		<div style="clear: both;"></div>
	</div>
		<?php 
		}
		?>

</marquee>