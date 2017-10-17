<!DOCTYPE html>
<?php 
session_start();
	include ('../libs/dbcon.php');
	include ('../libs/quantri.php');
	include ('../libs/libs.php');
	$id = $_SESSION['id_user'];	
?>
<?php 
if( isset($_POST["btnSua"])){
	$link_video=$_POST['linkvideo'];
	$loi="";
	if($link_video == ""){
		$loi= "Không được bỏ trống";
	}else{
	$qr="
			update video set link_video='$link_video'
			WHERE id_video=1";
			mysql_query($qr);
			header("location:indexvideo.php ");
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
                            Chỉnh sửa video hiển thị
                        </h1>
                        <div class="content-item">
						<?php 
							$detail_video=detail_table('video',1);
							$src = str_replace( "watch?v=", "embed/", $detail_video[1] )
						?>

                            <form method="POST" >
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Video</th>
                                        <td>
                                            <iframe width="854" height="480" src="<?php echo $src;?>" frameborder="0" allowfullscreen></iframe>                                   
										   <input type="text" name="linkvideo" class="form-control" placeholder="Nhập link video...">
											<?php 
												if($loi!=""){
											?>
											<div class="alert alert-danger">
												<center><?php echo $loi;?></center>
											</div>
											<?php 
												}
											?>        
                                        </td>

                                    </tr>
								
									
								
                                </table>

                                <input type="submit" name="btnSua" value="CẬP NHẬT">
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
