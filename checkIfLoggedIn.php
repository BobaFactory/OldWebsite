<?php
	ini_set('display_errors', 1);
	session_start();
	if (isset($_SESSION['loggedOn']) && $_SESSION['loggedOn'])
	 {
		
	 	if($_POST['add'] == 1)
		{	
			$_SESSION['cart'][$_POST['id']] = $_SESSION['cart'][$_POST['id']] + 1;
			$_SESSION["cartsum"] = $_SESSION["cartsum"] + 1;
			echo json_encode($_SESSION["cart"]);//0;
		}
		else
		{
			$_SESSION['cart'][$_POST['id']] = $_SESSION['cart'][$_POST['id']] - 1;
			$_SESSION["cartsum"] = $_SESSION["cartsum"] - 1;
			echo json_encode($_SESSION["cart"]);//0;
		}
	} else {
		echo 1;
	}
?>

