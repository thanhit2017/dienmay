<!--:: LIST TIN TỨC ::-->
<?php 
	//****** Phân Trang ******///
$sotin1trang=5;
$url = $_SERVER['REQUEST_URI'];
$mang = explode('/', $url);

if($mang[3]!=""){
	$trang=$mang[3];
	settype($mang[3],"int");
}
else{
	$trang=1;
	}
$from=($trang-1)*$sotin1trang;
//****** ket thuc phan trang ******//
?>	
<div class="newsList">
	<h1 id="h1">Tin tức</h1>
	<?php 
		$list_news=list_news($from,$sotin1trang);
		while($row=mysql_fetch_array($list_news)){
	?>
	<div class="newslistItem">
		<div class="col3">
			<a href="Tin-Tuc/<?php echo $row[2]?>.html">
				<img src="images/<?php echo $row[3]?>">
			</a>
		</div>
		<div class="col9">
			<div class="itemlistContent">
				<a href="Tin-Tuc/<?php echo $row[2]?>.html">
					<?php echo limit($row[1],13);?>
				</a>
				<p id="time"><span><?php echo $row[6]?></span></p>
				<p id="nd">
					<?php echo limit($row[4],50);?>
				</p>
			</div>
		</div>
		<div style="clear: both;"></div>
		<p id="xt">
			<a href="Tin-Tuc/<?php echo $row[2]?>.html">Xem tiếp <i class="fa fa-caret-right"></i></a>
		</p>
	</div>
		<?php }?>
		
		
	<div class="pagina" style="text-align: center;">
		<ul class="pagination" style="padding: 0;">
		 <?php 
		if($trang>$tongsotrang && $trang>1 ){	
			echo   '<li><a href="Tin-Tuc/'.($trang-1).'/';

			echo '"><i class="fa fa-angle-double-left"></i></a></li>';
		}
		?>	
		<?php

				 $t=number_news();
				$tongsotin=mysql_num_rows($t);
				$tongsotrang=ceil($tongsotin/$sotin1trang);
				 for($i=1;$i<=$tongsotrang;$i++){
		?>		  

		 <li <?php
			if($trang == $i){
				echo "class='active'";
			}
		 ?> >
		 <a href="Tin-Tuc/<?php echo $i;?>/"><?php echo $i?></a></li><?php }?>


		<?php 
				if ($trang < $tongsotrang){
						echo '<li><a href="Tin-Tuc/'.($trang+1).'/';
					
				echo'"><i class="fa fa-angle-double-right"></i></a></li>';
			}else{
			 $trang=1;	
			}
		?> 
		</ul>
	</div>

</div>
<!--:: END LIST TIN TỨC ::-->