<!DOCTYPE html>
<?php 
	session_start();
	include ("../libs/dbcon.php");
	$loi="";
	if(isset($_POST['btnThem'])){
		$user=$_POST['user'];
		$password=$_POST['password'];
		
		$qr="SELECT * FROM user WHERE user='$user' and PASSWORD='$password' ";
		$row=mysql_query($qr);
		
		$dem=mysql_num_rows($row);
		if($dem!=0){
		
		$row1=mysql_fetch_array($row);
		
		$_SESSION['id_user']=$row1[0];
			
		header("location:indexmenu.php");
		}
		else{
		 $loi="Đăng nhập thất bại";
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
        <script>

        </script>
        <style>
            body {
                background: #F46F20;
            }
        </style>
    </head>
    <body>
        <div class="formlogin">
			
            <form id="form" method="POST" style="border-radius: 15px">
                <h1>
                    User Login

                    <div style="clear:both;"></div>

                </h1>
                <div class="input">
                  	<?php 
					if($loi!=""){
					?>
						<div class="alert alert-danger">
							<center><?php echo $loi;?></center>
						</div>
					<?php 
						}
					?>
                    <input type="text" name="user" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                </div>
			
                <div class="submit">
                    <input type="submit" name="btnThem" value="LOGIN">
                </div>

            </form>
			
        </div>
    </body>
</html>
