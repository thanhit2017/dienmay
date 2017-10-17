<!--:: GIỎ HÀNG ::-->
<?php


if(isset($_POST['them']))
{
	foreach($_POST['qty'] as $key=>$value)
	{
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		elseif(($value > 0) and (is_numeric($value)))
		{
			$_SESSION['cart'][$key]=$value;
		}
	}
}
?>
<div class="shop-cart">
	<h1>GIỎ HÀNG</h1>
<?php

?>
	<form method='post'>
	<table class="table table-striped shoptable" border="1">
		
<?php
$ok=1;
if(isset($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $k => $v)
	{
		if(isset($k))
		{
			$ok=2;
		}
	}
}
if($ok == 2)
{
	foreach($_SESSION['cart'] as $key=>$value)
			{
				$item[]=$key;
			}
			$str=implode(",",$item);
			
			$total=0;
		
			$sql="select * from product where id_product in ($str)";
			$query=mysql_query($sql);
			$i=1;
			echo '<tr id="trfirst">
			<th width="10%">STT</th>
			<th width="22%">Sản phẩm</th>
			<th width="18%">Giá</th>
			<th width="10%">Số lượng</th>
			<th width="20%">Tổng tiền</th>
			<th width="10%">Xóa</th>
		</tr>';
			while($row=mysql_fetch_array($query)){
				$soluong=$_SESSION['cart'][$row[0]];
				$tongtien=$_SESSION['cart'][$row[0]]*$row[3];
				$tong = $tong + $tongtien;
?>
		<tr>
			<td width="10%"><?php echo $i++;?></td>
			<td width="22%"><a href="#"><?php echo $row[1]?></a></td>
			<td width="18%"><?php echo number_format($row[3],0,',','.').' VND';?></td>
			<td width="10%" style="text-align: center;"><input type='text' name='qty[<?php echo $row[0]?>]' size='5' value='<?php echo $soluong ?>'></td>
			<td width="20%"><?php echo number_format($tongtien,0,',','.').' VND';?></td>
			<td width="10%"><a href="pages/del_cart.php?productid=<?php echo $row[0];?>" class="fa fa-remove" style="font-size: 25px;color:black;text-decoration: none;"></a></td>
		</tr>
		<?php 
			}
		?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>tổng</td>
			<td><?php echo number_format($tong,0,',','.').' VND';?></td>
			<td></td>
		</tr>
<?php 
}else{
	echo "<div class='pro'>";
	echo "<p align='center'>Bạn không có mặt hàng nào cả<br /><a href='index.html'>Tiếp tục mua hàng</a></p>";
	echo "</div>";
}
?>
	</table>
	<div class="btns">
	<?php if($ok == 2){?>
	<input type="button" id="thanhtoan" style="float:left;" value="Thanh toán">
	<a href="index.html"><input type="button" value="Tiếp Tục Mua Hàng"></a>
	<input type="submit" name="them" value="Cập nhật" style="float:left;" >
<?php }?> 
	<div style="clear:both;"></div>
		
	</div>
	</form>
		
	<?php
	$loi="";
	
		if(isset($_POST["btnThem"])){
			$name=$_POST['name'];
			$phone=$_POST['phone'];
			$adress=$_POST['adress'];
			$comment=$_POST['comment'];
			$date=strtotime(date('d-m-Y'));
			
			if(!is_numeric($phone)){
				echo "sdt không đúng định dạng";
			}
			$mangbatloi=[$name,$phone,$adress];
			$array=['Tên','Số điện thoại','Địa chỉ'];
			$loi=check_array_empty($mangbatloi,$array);
			if($loi==""){				
				$mang=[$name,$phone,$adress,$comment,$date,0];
				add('cart',$mang);
				
				$qr="SELECT max(id_cart) FROM cart";
				$row=mysql_query($qr);
				$row1=mysql_fetch_array($row);
				$idc=$row1[0];
				foreach($_SESSION['cart'] as $key=>$value)
					{
						$key;
						$soluong=$_SESSION['cart'][$key];
						$mang1=[$key,$soluong,$idc];
						add('shopping_cart',$mang1);
					}
			}
		}
		if($loi!=""){
			echo $loi;
		}
	?>
	<div class="info-buy">
		<form method="POST">
		<h4 style="color:red;">Thông tin khách hàng</h4>
			<div class="colum">
					
					<label>Họ tên <strong>*</strong></label>
					<input type="text" name="name" class="form-control">
					
					<label>Điện thoại <strong>*</strong></label>
					<input type="text" name="phone" class="form-control">
					<label>Địa chỉ <strong>*</strong></label>
					<input type="text" name="adress" class="form-control">
					
					
					<label>Ý kiến của bạn </label>
					<textarea class="form-control" name="comment"></textarea>
				</div>
			<input type="submit" name="btnThem" value="Gửi">
			<div style="clear: both;"></div>
		</form>

	</div>
</div>
<!--:: END GIỎ HÀNG ::-->
