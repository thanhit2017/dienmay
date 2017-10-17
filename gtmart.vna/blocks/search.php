<h1 id="h1">
	TÌM KIẾM
	<i class="fa fa-search"></i>
</h1>
<?php 
	if(isset($_POST['submit']) ){
		$lsp=$_POST['lsp'];
		$made=$_POST['made'];
		$brand=$_POST['brand'];
		$price=$_POST['price'];

	
		//header("location:17-$lsp-$made-$brand-$price.html");
		echo "<script>window.location='search/".$lsp."-".$made."-".$brand."-".$price.".html';</script>";
		
		
	}
?>
<form method="POST" >
	<label>Từ khóa</label>

	<select name="lsp">
	<option value="0">Chọn loại sản phẩm</option>
	<?php 
		$lsp=search_lsp('menu');
		
		while($row=mysql_fetch_array($lsp)){
	?>
		<option  value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
		<?php 
		}
		
	?>	
		
	</select>
	

	<select name="made">
	<option value="0">Chọn nơi sản xuất</option>
		<?php 
			$made=list_table('made');
			while($row1=mysql_fetch_array($made)){
		?>
		<option  value="<?php echo $row1[0]?>"><?php echo $row1[1]?></option>
		<?php 
			}
		?>
	</select>
	<select name="brand" >
	<option value="0">Chọn hãng</option>
		<?php 
			$brand=list_table('brand');
			while($row2=mysql_fetch_array($brand)){
		?>
		<option value="<?php echo $row2[0]?>"><?php echo $row2[1]?></option>
		<?php 
			}
		?>
	</select>
	<select name="price" >
		<option value="0">Chọn giá</option>
		<option value="1">Dưới 50.000VND</option>
		<option value="2">Trên 50.000VND </option>
		<option value="3">Trên 200.000VND </option>
		<option value="4">Trên 500.000VND</option>

	</select>
	<input type="submit" name="submit" value="Tìm">

</form>