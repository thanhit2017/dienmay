<?php 
	if(!isset($_SESSION['id_user']))
	{
		echo "<script>window.location='login.php';</script>";
	}
	$detail=detail_table('user',$_SESSION['id_user']);
?>
<li><a href="indexmenu.php">Menu</a></li>
                            <li><a href="indexslide_show.php">SlideShow</a></li>
                            <li><a href="indexproduct.php">Sản phẩm</a></li>
                            <li><a href="indexvideo.php">Video</a></li>
                            <li><a href="indexcomment_customer.php">Ý kiến</a></li>
                            <li><a href="indexnews.php">Tin Tức</a></li>
                            <li><a href="indexcontact.php">Liên Hệ</a></li>
                            <li><a href="indexshopping_cart.php">Giỏ Hàng</a></li>
							<li><a href="indexmade.php">Xuất sứ</a></li>
							<li><a href="indexbrand.php">Hãng</a></li>
							<?php 
							
							if($detail[3]!=1){
							
							?>
							<li><a href="indexuser.php">User</a></li>
							<?php 
							}
							?>