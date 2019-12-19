<?php
	ini_set('display_errors', 1);

	// Get user input data
	$user_input = $_POST['user_input'];
	$pass_input = ($_POST['pass_input']);

	// Check for login match
	include "./config.php";
	$qry = "SELECT * from $table_accounts;";
	$result = mysqli_query($connect, $qry);
	$userMatch = false;
	$passMatch = false;
	while ($account = $result->fetch_row()) {
		if ($user_input == $account[0]) {
			$userMatch = true;
			if (crypt($pass_input, $account[1]) == $account[1]) {
				$passMatch = true;
			}
			// $password = crypt('mypassword');
  
			// 	  if (crypt('mypassword', $password) == $password)
			// 	  {
			// 	    	$passMatch = true;
			// 	  }
		}
	}

	if ($userMatch && $passMatch) {
		session_start();
		$_SESSION["loggedOn"] = true;
		//$_SESSION["user"] = $user_input;
		setcookie("user", strip_tags($user_input));
		//setcookie("boba_orders", serialized(array(1,1,1,1,1,1)));
		$_SESSION["cart"] = array(0,0,0,0,0,0);
		$_SESSION["cartsum"] = 0;
		echo "Login Successful!";
		} 

	else {
		echo "Username or password invalid";
	}

	mysqli_close($connect);
?>