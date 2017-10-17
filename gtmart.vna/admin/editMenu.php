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
	$loi="";
	$id_menu=$_GET['id_menu'];
	$detail_menu=detail_menu($id_menu);
	settype($id_menu,'int');
	if( isset($_POST["btnThem"])){
		$name=$_POST["name"];
		$tenkd=changeTitle($name);
		$thutu=$_POST["thutu"];
		$menu_cha=$_POST["menu_cha"];
		$footer=$_POST["footer"];
		if($footer==""){
			$footer=0;
		}
		$anhien=$_POST["anhien"];
		$get_list_menu=list_table('menu');
		while($row1=mysql_fetch_array($get_list_menu)){
			if($name==$row1[1]){
				$loi="Đã có menu tên này";
			}		
		}	
		if($loi=="")
		{
			$qr="
			update menu set
			name='$name',
			name_unsigned='$tenkd',
			serial='$thutu',
			hide_show='$anhien',
			id_father='$menu_cha',
			location='$footer'
			WHERE id_menu='$id_menu'";
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
                 <?php include("menu.php"); ?>
                        </ul>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="col9">
                    <div class="content">
                        <h1 id="h1">
                            Sửa menu
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
                                        <td><input name="name" type="text" value="<?php echo $detail_menu[1];?>" class="form-control" ></td>
                                    </tr>
								
                                    <tr>
                                        <th>Thứ Tự</th>
                                        <td><input name="thutu" type="text" value="<?php echo $detail_menu[3];?>" class="form-control" ></td>
                                    </tr>
                                    <tr>
									<tr>
										<th>Ẩn hiện</th>
										<td>
											<input type="radio" name="anhien" 
											<?php 
												if($detail_menu[4]==0){
													echo "checked";
												}
											?> 
											value="0">Hiện
											<input type="radio" name="anhien"
											<?php 
												if($detail_menu[4]==1){
													echo "checked";
												}
											?> 
											value="1">Ẩn
										</td>
									</tr>
									<th>Thuộc Menu</th>
									<td>
										<Select name="menu_cha">
										<option value="0"></option>
										<?php 
										echo $list_lsp_cap1_cap2=list_lsp_cap1_cap2();
										while($row=mysql_fetch_array($list_lsp_cap1_cap2)){
										?>
											<option 
											<?php 
												if($row[0]==$detail_menu[5]){
													echo "selected";
												}
											?>
											value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
										<?php
										}										
										?>
										</Select>
									</td>
                                    </tr>
									<?php 
										if($detail_menu[5]==0)
										{
									?>
									<tr>
										<th>Menu Footer</th>
										<td><input type="checkbox" name="footer" value="1">Hiện ở footer</td>
									</tr>
									<?php 
										}
									?>
                                </table>
                                <a ><input type="submit" name="btnThem" value="Sửa"></a>
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
