<!DOCTYPE html>
<?php 
session_start();
	include ('../libs/dbcon.php');
	include ('../libs/quantri.php');
	include ('../libs/libs.php');
	$id = $_SESSION['id_user'];	
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
                <div class="col9">
                    <div class="content">
                        <h1 id="h1">
                            Thêm user
                        </h1>
			<?php 
				if(isset($_POST['btnThem'])){
					$name=$_POST['name'];
					$pass=$_POST['pass'];
					$role=$_POST['role'];
					
					$test_loi=[$name,$pass];
					$xuat_loi=['tên user','pass'];
					$loi=check_array_empty($test_loi,$xuat_loi);
					$get_list_menu=list_table('user');
						while($row1=mysql_fetch_array($get_list_menu)){
							if($name==$row1[1]){
								$loi="Đã có user này";
							}		
						}	
				if($loi!=""){}else{
				$qr="
					INSERT into user VALUES(null,'$name','$pass','$role')";
				mysql_query($qr);

				header("location:indexuser.php ");
					}
				}
			?>			
						
                        <div class="content-item">
                            <form method="POST">
                                <table class="table table-bordered">
						<?php 
						if($loi!=""){
						?>
						<div class="alert alert-danger">
							<center><?php echo $loi;?></center>
						</div>
						<?php 
							}
						?>
                                    <tr>
                                        <th>Tên user</th>
                                        <td><input type="text" name="name" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><input type="password" name="pass" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Quyền</th>
                                        <td>
                                           <select name="role">
										<?php 
											$list_role=list_table('role');
											while($row=mysql_fetch_array($list_role)){
										?>
												<option value="<?php echo $row[0];?>"><?php echo $row[1]?></option>
										
										<?php 
											} 
										?>		
										   </select>
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
