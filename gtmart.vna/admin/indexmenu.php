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
                        <h2 id="h2">Danh mục Admin</h2> 
                        <ul>
                       <?php include("menu.php"); ?>
                        </ul>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="col9">
                    <div class="content">
                        <h1 id="h1">Quản lí menu
						<a id="a1" href="addMenu.php" class="fa fa-plus"> Thêm</a>
                            <div style="clear: both;"></div>
                        </h1>
                        <div class="content-item">
                            <table id="myTable" class="table table-striped " cellspacing="0" width="100%">
                                <thead>
	
                                    <tr id="tr-first">
                                        <th>STT</th>
                                        <th>TÊN MENU</th>
                                        <th>THỨ TỰ</th>
                                        <th>VỊ TRÍ</th>
                                        <th>ẨN HIỆN</th>
                                        <th>THUỘC MENU</th>
                                        <th>CHỨC NĂNG</th>
                                    </tr>
                                </thead>

                                <tbody>
							<?php 
								$show_menu=show_menu();
								$i=1;
								while($row=mysql_fetch_array($show_menu)){
									
							?>
                                    <tr>
                                        <th><?php echo $i++?></th>
                                        <th><?php echo $row[1]?></th>
                                        <th><?php echo $row[3]?></th>
                                        <th><?php echo $row[6]?></th>
                                        <th>
											<?php 
												if($row[4]==0){
													echo "Hiện";
												}else{
													echo "Ẩn";
												}
											?>
                                        </th>
                                        <th><?php 
											$detail_menu=detail_menu($row[5]); 
											echo $detail_menu[1];
											?></th>
                                        <th>
                                            <a href="editMenu.php?id_menu=<?php echo $row[0];?>" style="background: #575757;padding: 5px;color: white;border-radius: 10px;">Sửa</a>
										<?php 
											if($row[5]!=0){
										?>	
											<a href="delete.php?id=<?php echo $row[0];?>&table=menu" style="background: #575757;padding: 5px;color: white;border-radius: 10px;">Xóa</a>
                                        <?php 
												}
										?>
										</th>
                                    </tr>   
									<?php 
								}
							?>
                                </tbody>
							
                            </table>
                            <script>
                                $(document).ready(function () {
                                    $('#myTable').DataTable();
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </body>
</html>
