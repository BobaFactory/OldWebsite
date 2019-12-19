<?php
	ini_set('display_errors', 1);
	session_start();
	$_SESSION["cartsum"]= isset($_REQUEST['myData'])?$_REQUEST['myData']:"";
	$_SESSION["cart"]= isset($_REQUEST['cart'])?$_REQUEST['cart']:"";
	echo json_encode($_SESSION["cart"]);
?>

