<?php
include ('../libs/dbcon.php');

$id=$_GET["id"];
$table=$_GET['table'];
settype($id,"int");
echo $qr="DELETE FROM $table
	WHERE id_$table='$id'
";
mysql_query($qr);
header("location:index$table.php ");
?>