<?php
$url = $_SERVER['REQUEST_URI'];
$mang1 = explode('/', $url);
$str = str_replace( '.html', '', $mang1[3] );
    if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
	
	$id=$str;
	
	if(isset($_SESSION['cart'][$id]))
{
	$qty = $_SESSION['cart'][$id] + 1;
}
else
{
	$qty=1;
}
$_SESSION['cart'][$id]=$qty;
echo '<script>window.location.href = "Gio-Hang/";</script>';
exit();
?>
