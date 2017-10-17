<?php
include ('../libs/dbcon.php');

$id=$_GET["id"];

settype($id,"int");
echo $qr="DELETE FROM user
	WHERE id_user='$id'
";
mysql_query($qr);
header("location:indexuser.php ");
?>