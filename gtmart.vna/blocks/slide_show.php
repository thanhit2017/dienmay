
<div id="wowslider-container1">
	
	<div class="ws_images"><ul>
	<?php 
		$list_slide_show=list_table('slide_show');
		while($row=mysql_fetch_array($list_slide_show)){
	?>
		<li><a href="index.php?page=2&id_menu=<?php echo $row[2]; ?>"><img src="images/<?php echo $row[1];?>" alt="#" title="" id="wows1_0"/></a></li>
	<?php 
		}
	?>	
		</ul>
	</div>
	<div class="ws_bullets">
		<div>
		<?php 
			$num=mysql_num_rows($list_slide_show);
			for($i=0;$i<$num;$i++){
		?>
			<a title=""></a>
		<?php 
			}
		?>
		</div>
	</div>
	<div class="ws_script" style="position:absolute;left:-99%"><a href="#">slider</a></div>
	<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="js/wowslider.js"></script>
<script type="text/javascript" src="js/script.js"></script>