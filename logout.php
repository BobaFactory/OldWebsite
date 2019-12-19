<!DOCTYPE html>

<html lang = "en">

<head>
	<?php include "./head.php"; ?>
	<script>
		$(document).ready(function() {
			$("#logout").click(function() {
				
				
					$.ajax({
						url:'loginstatus.php',
						type:'POST',
		
						success: function(response) {
							$("#user").html('');
							window.location.href = "home.php";
							console.log(response)
						}
					});
				
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
					<caption><h2>Logout</h2></caption>
				    
					<tr>
						<td><input class = "button" type = "submit" name = "logout" id="logout" value = "Logout" /></td>
					</tr>
				</table>
				
			</form>
		</div>
		
	</div>
</body>
</html>