<?php
	ini_set('display_errors', 1);
	include "./config.php";
	// Get user input data

	$user_input = mysqli_real_escape_string ($connect, $_POST['user_input']);
	$pass_input = mysqli_real_escape_string ($connect, crypt($_POST['pass_input']));
	$email_input = mysqli_real_escape_string ($connect, $_POST['email_input']);
	$cardNum_input = mysqli_real_escape_string ($connect, $_POST['cardNum_input']);
	$cardName_input = mysqli_real_escape_string ($connect, $_POST['cardName_input']);
	$month_input = mysqli_real_escape_string ($connect, $_POST['month_input']);
	$year_input = mysqli_real_escape_string ($connect, $_POST['year_input']);
	$zip_input = mysqli_real_escape_string ($connect, $_POST['zip_input']);
	$cvc_input = mysqli_real_escape_string ($connect, $_POST['cvc_input']);

	// Make $exp_date from $month_input and $year_input
	$exp_date_input = $month_input."/".$year_input;

	// Check if the username already exists in the passwd table
	
	$qry = "SELECT username from $table_accounts;";
	$result = mysqli_query($connect, $qry);
	$userExists = false;
	while ($registeredUser = $result->fetch_row()) {
		if ($user_input == $registeredUser[0]) {
			$userExists = true;
		}
	}

	if ($userExists == false) {
		$stmt1 = mysqli_prepare ($connect, "INSERT INTO $table_accounts VALUES (?, ?, ?)");
		mysqli_stmt_bind_param ($stmt1, 'sss', $user_input, $pass_input, $email_input);
		$insertAction = mysqli_stmt_execute($stmt1);
		mysqli_stmt_close($stmt1);

		$stmt2 = mysqli_prepare ($connect, "INSERT INTO $table_payment VALUES (?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param ($stmt2, 'ssssii', $user_input, $cardNum_input, $cardName_input, $exp_date_input, $zip_input, $cvc_input);
		$insertAction2 = mysqli_stmt_execute($stmt2);
		mysqli_stmt_close($stmt2);
		session_start();
		$_SESSION['loggedOn'] = true;
		setcookie("user", $user_input);
		$_SESSION["cart"] = array(0,0,0,0,0,0);
		$_SESSION["cartsum"] = 0;
		// header('Location: home.php');
		echo "Account Registration Successful!";
	} else {
		echo "Username taken, please pick a different username.";
	}

	mysqli_close($connect);
?>