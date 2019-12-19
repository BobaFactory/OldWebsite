<?php
	ini_set('display_errors', 1);

	session_start();
	$username = $_COOKIE["user"];

	include "./config.php";

	$qry = "SELECT * from $table_payment WHERE username = '".$username."';";
	$result = mysqli_query($connect, $qry);

	while ($account = $result->fetch_row()) {
		// $card_number = $account[0][1];
		$card_number = $account[1];
		$name_on_card = $account[2];
		$exp_date = $account[3];
		$exp_month = substr($exp_date, 0, strpos($exp_date, '/'));
		$exp_year = substr($exp_date, strpos($exp_date, '/') + 1);
		$zip_code = $account[4];
		$cvc = $account[5];
	}

	$result->free();

	// echo $cvc;

	// while ($account = $result->fetch_row()) {
	// 	var $card_number = $account[1];
	// 	var $name_on_card = $account[2];
	// 	var $exp_date = $account[3];
	// 	var $exp_month = "2";
	// 	var $exp_year = "2012";
	// 	var $zip_code = $account[4];
	// 	var $cvc = $account[5];
	// 	// $userPayInfo = array($account[0], $account[1], $account[2], $account[3], $account[4], $account[5]);
	// }

	$userPayInfo = array($card_number, $name_on_card, $exp_month, $exp_year, $zip_code, $cvc);
	// $userPayInfo = array("Volvo", "BMW", "Toyota", "Wow", "Coolio", "WHat a Man");
	echo json_encode($userPayInfo);
?>