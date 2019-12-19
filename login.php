<!DOCTYPE html>

<html lang = "en">

<head>
	<?php include "./head.php"; 
	if($_SESSION['loggedOn'] == true)
	{
		header('Location: logout.php');
	}
	?>
	<script>
		$(document).ready(function() {
			$("#login").click(function() {
				var user_input = $("#username").val().trim();
				var pass_input = $("#password").val().trim();

				// Client-Side Input Verification Goes Below!
				// If the input is valid, then it should be true
				user_input_valid = user_input !== null && user_input !== '';
				pass_input_valid = pass_input !== null && pass_input !== '';

				allValid = user_input_valid && pass_input_valid; // Remove this line once the client-side verification is done.

				// Add else if statements to let the user know what input was invalid and why. If (xxxx_valid) = false.....
				// Use $("#regFeedback").html("Invalid Response to be shown to the user.");
				// And $("#regFeedback").addClass("floatingBox"); to show the box to the user
				if (allValid) {
					$.ajax({
						url:'checkLogin.php',
						type:'POST',
						data: {
							user_input: user_input,
							pass_input: pass_input
						},
						success: function(response) {
							$("#loginFeedback").html(response);
							$("#loginFeedback").addClass("floatingBox");

							if (response == "Login Successful!")
							{
								$("#user").html('Hi, ' + user_input);
							}
							// window.location.href = "home.php";
						}
					});
				}
			});
		});

	</script>
</head>

<body>
	<div class="container">
		<div class="header">
			<?php include "./logoAndTitle.php"; ?>
			<?php include "./navigationBar.php"; ?>
		</div>
		<div class="middle">
			<form id = "regForm" method = "post">
				<table class="userInput">
					<caption><h2>Login</h2></caption>
				    <tr>
					    <td colspan="2"><input type = "text" name = "username" id="username" size = "20" placeholder="Username" /></td>
				    </tr>
				    <tr>
					    <td colspan="2"><input type = "password" name = "password" id="password" size = "20" placeholder="Password" /></td>
				    </tr>
					<tr>
						<td><input class = "button" type = "button" name = "login" id="login" value = "Login" /></td>
						<td><input class = "button" type = "reset" value = "Clear" /></td>
					</tr>
				</table>
				<p>Not a user? <a href="registration.php">Create an account.</a></p>
			</form>
		</div>
		<div id="loginFeedback"></div>
		<?php include "./footer.php"; ?>
	</div>
</body>
</html>