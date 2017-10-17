<!--:: LIÊN HỆ ::-->
<div class="mainGaneral">
	<h1 id="h1">LIÊN HỆ</h1>
	<div class="introContent">
		<h2>Công ty  TNHH Thương Mại và Dịch Vụ Gia Thịnh</h2>
		<div class="intro-item">
			<div class="col3">
				Văn phòng
			</div>
			<div class="col9">
				Số 44, ngõ 30 Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội
			</div>
			<div style="clear: both;"></div>
		</div>
		<div class="intro-item">
			<div class="col3">
				Điện thoại
			</div>
			<div class="col9">
				0123456789
			</div>
			<div style="clear: both;"></div>
		</div>
		<div class="intro-item">
			<div class="col3">
				Fax
			</div>
			<div class="col9">
				0123456789
			</div>
			<div style="clear: both;"></div>
		</div>
		<div class="intro-item">
			<div class="col3">
				Email
			</div>
			<div class="col9">
				minhtrong17021996@gmail.com
			</div>
			<div style="clear: both;"></div>
		</div>
		<div class="intro-item">
			<div class="col3">
				Website
			</div>
			<div class="col9">
				<a href="#">http://gtmart.vn/</a>
			</div>
			<div style="clear: both;"></div>
		</div>
		<?php 
		$loi="";
		if( isset($_POST["btnThem"])){
			$name=$_POST["name"];
			$name_com=$_POST['name_com'];
			$adress=$_POST["adress"];
			$phone=$_POST["phone"];
			$email=$_POST["email"];
			$title=$_POST['title'];
			$noidung=$_POST['noidung'];
			$test_loi=[$name,$phone,$email,$title,$noidung];
			$in_loi=['Tên','sdt','Email','tiêu đề','Nội dung'];
			$loi=check_array_empty($test_loi,$in_loi);
			if($loi!=""){}else{
			 $qr="
				INSERT into contact VALUES(null,'$name','$name_com','$adress','$phone','$email','$title','$noidung')";
			mysql_query($qr);
			}
		}
		?>
		<form method="POST">
		<?php 
					if($loi!=""){
						?>
						<div class="alert alert-danger">
							<center><?php echo $loi;?></center>
						</div>
				<?php 
					}
				?>
			<div class="intro-item">
				<div class="col3">
					<strong>Họ tên *</strong>
				</div>
				<div class="col9">
					<input name="name" type="text" class="form-control">
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="intro-item">
				<div class="col3">
					<strong>Tên công ty</strong>
				</div>
				<div class="col9">
					<input name="name_com" type="text" class="form-control">
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="intro-item">
				<div class="col3">
					<strong>Địa chỉ</strong>
				</div>
				<div class="col9">
					<input name="adress" type="text" class="form-control">
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="intro-item">
				<div class="col3">
					<strong>Điện thoại *</strong>
				</div>
				<div class="col9">
					<input name="phone" type="text" class="form-control">
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="intro-item">
				<div class="col3">
					<strong>Email *</strong>
				</div>
				<div class="col9">
					<input name="email" type="text" class="form-control">
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="intro-item">
				<div class="col3">
					<strong>Tiêu đề *</strong>
				</div>
				<div class="col9">
					<input name="title" type="text" class="form-control">
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="intro-item">
				<div class="col3">
					<strong>Nội dung *</strong>
				</div>
				<div class="col9">
					<textarea name="noidung" class="form-control"></textarea>
				</div>
				<div style="clear: both;"></div>
			</div>
			<input type="submit" name="btnThem" value="Gửi">
			<div style="clear: both;"></div>
		</form>
	</div>
</div>