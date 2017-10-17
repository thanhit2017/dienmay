<!--:: GIỚI THIỆU ::-->
<?php 

	if($page==1){
		$id=1;
	}else if($page==4){
		$id=2;
	}else if($page==5){
		$id=3;
	}else{
		$id=4;
	}
	
	$Intro= detail_table('news',$id);
	
?>
<div class="mainGaneral">
	<h1 id="h1"><?php echo $Intro[1]?></h1>

	<p>
		<span><?php echo $Intro[6]?></span>
	<div style="clear: both;"></div>
	</p> 
	<div class="introContent">
		<?php echo $Intro[5]?>
	</div>
</div>
<!--:: END GIỚI THIỆU ::-->