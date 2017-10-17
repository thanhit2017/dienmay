<!--:: DETAIL PRODUCT ::-->
<div class="mainDetailpro">
<?php 
$loi="";
echo $ten_kd_product=$_GET['ten_kd_product'];
$product = detail_ten_kd_product($ten_kd_product);
$id_product = $product[0];
$detail_product=detail_table('product',$id_product);
?>

	<h1><?php echo $detail_product[1]?></h1>
	<div class="proCont">
		<div class="col6">
			<img src="images/<?php echo $detail_product[4]?>">
		</div>
		<div class="col6">
			<div class="detailproCont">
				<h2><?php echo $detail_product[1]?></h2>
				<p>Giá: <?php echo number_format($detail_product[3],0,',','.')."VND";?></p>
				<p>Đặt hàng: <a href="Add-Gio-Hang/<?php echo $id_product?>.html" class="fa fa-shopping-cart"></a></p>
			</div>
		</div>
		<div style="clear: both;"></div>
	</div>
        <div class="nd-detail">
            <!--Nội dung chi tiết-->
            
        </div>
	<button id="yk_kh">Ý kiến khách hàng</button>
	<?php 
		if( isset($_POST["btnThemYkien"])){
			
			$name_customer=$_POST["name_customer"];
			$email_customer=$_POST["email_customer"];
			$noi_dung_customer=$_POST["noi_dung_customer"];
			$phone_customer=$_POST['phone_customer'];
			$test_loi=[$name_customer,$email_customer,$noi_dung_customer,$phone_customer];
			$In_loi=['Tên Khách hàng','email','Nội Dung','So Điện THoại'];
			$loi=check_array_empty($test_loi,$In_loi);
			if($loi!=""){}else{
			 $qr="
				INSERT into comment_customer VALUES(null,'$name_customer','$noi_dung_customer','$id_product','$email_customer','$phone_customer')";
			mysql_query($qr);
			}
		}
	?>
				<?php 
					if($loi!=""){
						?>
						<div class="alert alert-danger">
							<center><?php echo $loi;?></center>
						</div>
				<?php 
					}
				?>
	<form method="POST" id="ykkh">
		<p id="title-p"><i class="fa fa-pencil"></i>Gửi cảm nhận của bạn</p>
		<input class="form-control" name="name_customer" type="text" placeholder="Họ tên">
		<input class="form-control" name="email_customer" type="text" placeholder="Email">
		<input class="form-control" name="phone_customer" type="text" placeholder="Số Điện THoại">
		<textarea class="form-control" name="noi_dung_customer" height="200px"></textarea>
		<input type="submit" name="btnThemYkien" value="Gửi thông tin">
	</form>
</div>

<div class="main-listSp">
	<div class="item-list">
		<h1 id="h1">
			SẢN PHẨM LIÊN QUAN

		</h1>
		
		<div class="listSp-items">
		<?php 
			 $list_lq=list_table_lq('product',$detail_product[5],$id_product,'limit 6');
			while($row=mysql_fetch_array($list_lq)){
				$menu = detail_menu_id($row[5]);
		?>
		
			<div class="col4">
				<div class="itemSp">
					<div class="Sp_title">
						<a href="<?php echo $menu[2]; ?>/<?php echo $row[2];?>.html">
							<?php echo $row[1]; ?>
						</a>
					</div>
					<a href="<?php echo $menu[2]; ?>/<?php echo $row[2];?>.html" class="img">
						<img src="images/<?php echo $row[4]?>">
					</a>
					<p>Giá: <?php echo number_format($row[3],0,',','.')."VND";?></p>
					<p>
						Đặt hàng: 
						<a href="index.php?page=12&id_product=<?php echo $row[0]?>"><i class="fa fa-shopping-cart"></i></a>
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
<!--:: END DETAIL PRODUCT ::--> 