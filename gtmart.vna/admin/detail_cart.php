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
                        <h1 id="h1">Quản lí chi tiết giỏ hàng
                            <div style="clear: both;"></div>
                        </h1>
						
                        <div class="content-item">
						<?php 
							$id_a=$_GET['id'];
							$list1=detail_cart_two_table($id_a);
							$row1=mysql_fetch_array($list1);
						?>
						<center>
						<p style="color:DeepPink"><strong>
						KHÁCH HÀNG: <?php echo $row1[1];?></br>SDT: 0<?php echo $row1[2];?></br>ĐỊA CHỈ: <?php echo $row1[3];?></br>NHẬN XÉT: <?php echo $row1[4];?>
						</strong>
						</p>
						</center>
                            <table id="myTable" class="table table-striped " cellspacing="0" width="100%">
                                <thead>
                                    <tr id="tr-first">
                                        <th>STT</th>
										<th>Tên Sản Phẩm</th>
                                        <th>Giá</th>
										<th>Số Lượng</th>
										<th>Ngày</th>
										<th>Tổng Tiền</th>
										<th>SDT</th>
										<th>Địa Chỉ</th>
										<th>Trạng Thái</th>
                                    </tr>
                                </thead>
						<?php
							$list=detail_cart_two_table($id_a);
								$i=1;
							while($row=mysql_fetch_array($list)){
								$tong=$row[14]*$row[9];
								$tongcong=$tongcong + $tong;
						?>
								<tbody>
                                    <tr>
										<th><?php echo $i++?></th>
										<th><?php echo $row[12];?></th>
										<th><?php echo number_format($row[14],0,',','.').' VND';?></th>
										<th><?php echo $row[9];?></th>
										<th><?php echo date('d-m-Y',$row['date']); ?></th>
										<th><?php echo number_format($tong,0,',','.').' VND';?></th>
										<th>0<?php echo $row[2];?></th>
										<th><?php echo $row[3];?></th>
										<th><?php 
										if($row[6]==0){
											echo "Chưa giao";
										}else{
											echo "Đã giao";
										}
										?></th>
									</tr>
								</tbody>
						<?php 
							}
						?>	
							
								<tbody>
									<tr>
										<th></th>
										<th>Tổng Cộng:</th>
										<th></th>
										<th></th>
										<th></th>
										<th><?php echo number_format($tongcong,0,',','.').' VND';?></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
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
