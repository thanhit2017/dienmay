<?php 
	session_start();
	unset($_SESSION['id_user']);
	if(empty($_SESSION['id_user']))
	{
		header("location:Login.php");
	}
?>