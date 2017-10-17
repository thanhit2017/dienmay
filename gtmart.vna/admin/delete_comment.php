<?php
include ('../libs/dbcon.php');

$id=$_GET["id"];
$table=$_GET['table'];
settype($id,"int");
echo $qr="DELETE FROM comment_customer
	WHERE id_comment='$id'
";
mysql_query($qr);
header("location:indexcomment_customer.php ");
?>