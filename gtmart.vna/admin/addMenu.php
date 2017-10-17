<!DOCTYPE html>
<?php 
include ("session.php");
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
	<?php
	if( isset($_POST["btnThem"])){
		$name=$_POST["name"];
		$tenkd=changeTitle($name);
		$thutu=$_POST["thutu"];
		$menu_cha=$_POST["menu_cha"];
		$loi="";
		$get_list_menu=list_table('menu');
		while($row1=mysql_fetch_array($get_list_menu)){
			if($name==$row1[1]){
				$loi="Đã có menu tên này";
			}		
		}	
		if($name==""){
			$loi= "Không được bỏ trống tên";
		}else if($thutu==""){
			$loi= "Không được bỏ trống thứ tự";
		}else if($loi==""){
		echo $qr="
			INSERT into menu VALUES(null,'$name','$tenkd','$thutu','0','$menu_cha','0')";
		mysql_query($qr);
		header("location:indexMenu.php ");
		}
	}
	?>
	
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
                           <?php 
								include("menu.php");
							?>
                        </ul>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="col9">
                    <div class="content">
                        <h1 id="h1">
                            Thêm menu
                        </h1>
						<?php 
							if($loi!=""){
						?>
						<div class="alert alert-danger">
							<center><?php echo $loi;?></center>
						</div>
						<?php 
							}
						?>
                        <div class="content-item">
                            <form method="POST" >
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Tên menu</th>
                                        <td><input name="name" type="text" class="form-control" ></td>
                                    </tr>
								
                                    <tr>
                                        <th>Thứ Tự</th>
                                        <td><input name="thutu" type="text" class="form-control" ></td>
                                    </tr>
									
                                    <tr>
									<th>Thuộc Menu</th>
									<td>
										<Select name="menu_cha">
										<?php 
										echo $list_lsp_cap1_cap2=list_lsp_cap1_cap2();
										while($row=mysql_fetch_array($list_lsp_cap1_cap2)){
										?>
											<option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
										<?php
										}										
										?>
										</Select>
									</td>
                                    </tr>
									
                                </table>
                                <a ><input type="submit" name="btnThem" value="Thêm"></a>
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
