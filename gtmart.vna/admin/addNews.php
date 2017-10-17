<!DOCTYPE html>
<?php 
	session_start();
	include ('../libs/dbcon.php');
	include ('../libs/quantri.php');
	include ('../libs/libs.php');
	$id = $_SESSION['id_user'];	
?>
<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');						
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
		$loi="";
	// lấy tên file upload
	if(isset($_POST['btnThem']))
		
	{
		
		$title=$_POST["title"];
		$titlekd=changeTitle($title);
		$tomtat=$_POST['tomtat'];
		$noidung=$_POST['noidung'];
		
		$date=strtotime(date('d-m-Y'));;
		$image_name=$_POST['image'];
		
		$view=0;
		$test = [$title,$tomtat,$noidung];
		$test1=['Tiêu Đề','Tóm Tắt','nội Dung'];
		$loi=check_array_empty($test,$test1);
		$get_list_menu=list_table('news');
		while($row1=mysql_fetch_array($get_list_menu)){
			if($title==$row1[1]){
				$loi="Đã có tiêu đề này";
			}		
		}	
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
			
			}else{
				$loi="file upload rỗng";
				$errors=1;
			}
		
	}
		

	if(isset($_POST['btnThem']) && $errors==0)
		{
			// đặt tên mới cho file hình up lên
			$image_name=time().'.'.$extension;
			// gán thêm cho file này đường dẫn
			$newname="../images/".$image_name;
			// di chuyển hình
			$copied = copy($_FILES['image']['tmp_name'], $newname);

		if($loi!=""){}else{
		echo $qr="
			INSERT into news VALUES(null,'$title','$titlekd','$image_name','$tomtat','$noidung','$date','$view')";
		mysql_query($qr);

		header("location:indexnews.php ");
		}		
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

        <script src="ckeditor/ckeditor.js" type="text/javascript"></script>


        <style>
            #set {
                font-weight: bold;
                font-size: 16px;
                background: #575757;
                color: white;
                padding: 0 5px;
                border-radius: 100% ;
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
						$get_user=detail_table('user',$id);
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
						<?php 
							if($loi!=""){
						?>
						<div class="alert alert-danger">
							<center><?php echo $loi;?></center>
						</div>
						<?php 
							}
						?>
                <div class="col9">
                    <div class="content">
                        <h1 id="h1">
                            Thêm tin tức
                        </h1>
                        <div class="content-item">
                            <form method="POST" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <td><input name="title" type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Tóm tắt</th>
                                        <td><input name="tomtat" type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Nội dung</th>
                                        <td style="width: 80%;">
                                            <textarea name="noidung" id="content"></textarea>
                                            <script>
                                                config = {};
                                                config.toolbarGroups = [
                                                    {name: 'clipboard', groups: ['clipboard', 'undo']},
                                                    {name: 'document', groups: ['document', 'doctools', 'mode']},
                                                    {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
                                                    {name: 'forms', groups: ['forms']},
                                                    '/',
                                                    {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
                                                    {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
                                                    {name: 'links', groups: ['links']},
                                                    {name: 'insert', groups: ['insert']},
                                                    '/',
                                                    {name: 'styles', groups: ['styles']},
                                                    {name: 'colors', groups: ['colors']},
                                                    {name: 'tools', groups: ['tools']},
                                                    {name: 'others', groups: ['others']},
                                                    {name: 'about', groups: ['about']}
                                                ];

                                                config.removeButtons = 'NewPage,Preview,Print,Source,Cut,Paste,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,About';
                                                CKEDITOR.replace('content', config);
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <td>
                                            <input name="image" type="file" class="form-control">
                                        </td>
                                    </tr>


                                </table>
                                <input type="submit" name="btnThem" value="THÊM">
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
