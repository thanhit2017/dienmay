<!DOCTYPE html>

<?php
include ("session.php");
	$id=$_GET['id'];
	$detail_slide_show=detail_table("slide_show",$id);
	
	// Ấn định  dung lượng file ảnh upload
	define ("MAX_SIZE","1000");
	 
	// hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
	// file này có phải là file hình hay không .
	function getExtension($str) {
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}

		$errors=0;
	// lấy tên file upload
	if(isset($_POST['btnThem']))
		
	{
		
		
		$loai_sp=$_POST['menu_cha'];
		
		// lấy tên file upload
			$image=$_FILES['image']['name'];
			// Nếu nó không rỗng
			if ($image)
			{
				// Lấy tên gốc của file
				$filename = stripslashes($_FILES['image']['name']);
				//Lấy phần mở rộng của file
				$extension = getExtension($filename);
				$extension = strtolower($extension);
				// Nếu nó không phải là file hình thì sẽ thông báo lỗi
				if (($extension != "jpg") && ($extension != "jpeg") && ($extension !="png") && ($extension != "gif"))
				{
					// xuất lỗi ra màn hình
					$loi='<h1>Đây không phải là file hình!</h1>';
					$errors=1;
				}
				
				//Lấy dung lượng của file upload
				$size=filesize($_FILES['image']['tmp_name']);
				if ($size > MAX_SIZE*1024)
				{
					$loi= '<h1>Vượt quá dung lượng cho phép!</h1>';
					$errors=1;
				}
			// đặt tên mới cho file hình up lên
			$image_name=time().'.'.$extension;
			// gán thêm cho file này đường dẫn
			$newname="../images/".$image_name;
			// di chuyển hình
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			}else{
				$image_name=$detail_slide_show[1];
			}
		
	}
		

	if(isset($_POST['btnThem']) && $errors==0)
		{
			

	echo $qr="
		update slide_show set
			
			images_slide_show='$image_name',
			id_menu='$loai_sp'
		
			WHERE id_slide_show='$id'
		";
	mysql_query($qr);

	header("location:indexProduct.php ");
			
		}
		



	?>
<html>
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>

        <link href="../css/styleAdmin.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery.dataTables.js" type="text/javascript"></script>

        <script src="../js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <script>

        </script>
        <style>
            #set {
                font-weight: bold;
                font-size: 16px;
                background: #575757;
                color: white;
                padding: 0 5px;
                border-radius: 100%;
            }
        </style>
    </head>
    <body>
        <div class="admin">
            <div class="head_admin">
                <span id="spantitle">TRANG QUẢN TRỊ WEBSITE</span>
                <span id="introuser">
                    <i class="fa fa-user"></i>
					<?php 
						$get_user=detail_table('user',$id_user);
						echo $get_user[1];
					?>
                    <a href="logout.php" class="fa fa-sign-out" style="text-decoration: none;font-size: 20px; padding: 0 5px;"></a>
                </span>
            </div>
            <div class="content_admin">
                <div class="col3">
                    <div class="sideAdmin-left">
                        <h2 id="h2">Danh mục Admin
                        </h2> 
                        <ul>
            <?php include("menu.php"); ?>
                        </ul>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="col9">
                    <div class="content">
                        <h1 id="h1">
                            Sửa hình ảnh slide
                        </h1>
                        <div class="content-item">
                            <form method="POST" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <td>
                                            <img src="../images/<?php echo $detail_slide_show[1]?>">
                                            <input type="file" name="image" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                    <th>Thuộc Menu</th>
						
									<td>
										<Select name="menu_cha">
										<?php 
										 $list_lsp=list_lsp();
										while($row=mysql_fetch_array($list_lsp)){
										?>
											<option
											<?php 
												if($row[0]==$detail_slide_show[2]){
													echo "selected";
												}
											?>
											value="<?php echo $row[id_menu];?>" ><?php echo $row['name']?></option>
										<?php
										}										
										?>
										</Select>
									</td>
                                </tr>
                                  
                                </table>
                                <input type="submit" name="btnThem" value="SỬA">
                                <div style="clear: both;"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </body>
</html>
