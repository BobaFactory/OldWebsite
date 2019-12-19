<?php
	// Connect to database
	$host = "fall-2019.cs.utexas.edu";
	$user = "cs329e_mitra_viando8";
	$pwd = "align9holy4Broke";
	$dbs = "cs329e_mitra_viando8";
	$table_accounts = "boba_accounts";
	$table_payment = "boba_payment_information";
	$port = "3306";

	$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

	if (empty($connect)) {
	  die("mysqli_connect failed: " . mysqli_connect_error());
	}
?>