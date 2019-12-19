<!DOCTYPE html>

<html lang = "en">

<head>
	<?php include "./head.php"; ?>
	<script>
		$(document).ready(function() {
			$("#register").click(function() {
				var user_input = $("#username").val().trim();
				var pass_input = $("#password").val().trim();
				var passRepeat_input = $("#repeat").val().trim();
				var email_input = $("#email").val().trim();
				var cardNum_input = $("#card_number").val().trim();
				var cardName_input = $("#name_on_card").val().trim();
				var month_input = $("#exp_month").val().trim();
				var year_input = $("#exp_year").val().trim();
				var zip_input = $("#zip_code").val().trim();
				var cvc_input = $("#cvc").val().trim();



				function alphanumeric(inputtxt)
					{
					 var letterNumber = /^[0-9a-zA-Z]+$/;
					 return inputtxt.match(letterNumber);
					}

				function upper(str)
				  {
				    var word = str;
				     return ( /.*[A-Z]/.test(word) ) && ( /.*[a-z]/.test(word) ) && ( /.*[0-9]/.test(word) );
				  }
				   
				     	var user_input_valid = false;
						var pass_input_valid = false;
						var passRepeat_input_valid = false;
						var email_input_valid = false;
						var cardNum_input_valid = false;
						var cardName_input_valid = false;
						var month_input_valid = false;
						var year_input_valid = false; 
						var zip_input_valid = false ;
						var cvc_input_valid = false;
				     	var errors = '';
				  
				     if(user_input.length>6  && alphanumeric(user_input) && isNaN(user_input.charAt(0)))
				     {
				     	user_input_valid = true;
				     	console.log('user');
				     }

				     else
				     {
				     	errors = errors.concat("Invalid username\n");
				     	
				     	$("#username").css({"background-color": "#EF9292"}); 

				     }

				     

				     if(pass_input.length>6 && alphanumeric(pass_input))
				      {
				         pass_input_valid = true;
				         console.log('pass');
				      }

				      else
				      {
				      	errors = errors.concat("Invalid password\n");
				      
				     	$("#password").css({"background-color": "#EF9292"});
				      }

				     

				      if(pass_input == passRepeat_input)
				      {
				        passRepeat_input_valid = true;
				        console.log('repeat');
				      }

				      else
				      {
				      	errors = errors.concat("Passwords do not match\n");
				      
				     	$("#password").css({"background-color": "#EF9292"});
				      }

				      if(email_input.indexOf('@') != -1)
				      {
				      	email_input_valid = true;
				      	console.log('email');
				      }

				      else
				      {
				      	errors = errors.concat("Invalid email\n");
				      	
				     	$("#email").css({"background-color": "#EF9292"});

				      }

				      if(cardNum_input.length == 16)
				      {
				      	cardNum_input_valid = true;
				      	console.log('carNum');
				      }

				      else
				      {
				      	errors = errors.concat("Invalid card number\n");
				      	 
				     	$("#card_number").css({"background-color": "#EF9292"});
				      }

				      if(cardName_input.indexOf(' ') != -1)
				      {
				      	cardName_input_valid = true;
				      	console.log('carName');
				      }

				      else
				      {
				      	errors = errors.concat("Invalid card name\n");
				      	
				     	$("#name_on_card").css({"background-color": "#EF9292"});
				      }

				      if(year_input.length == 4 && year_input.match(/^[0-9]+$/))
				      {
				      	year_input_valid = true;
				      	console.log('year');
				      }

				      else
				      {
				      	errors = errors.concat("Invalid year\n");
				      	 
				     	$("#exp_year").css({"background-color": "#EF9292"});
				      }

				      if(zip_input.length == 5 && zip_input.match(/^[0-9]+$/))
				      {
				      	zip_input_valid = true;
				      	console.log('zip');
				      }

				      else
				      {
				      	errors = errors.concat("Invalid zipcode\n");
				      	
				     	$("#zip_code").css({"background-color": "#EF9292"});
				      }

				      if(cvc_input.length == 3 && cvc_input.match(/^[0-9]+$/))
				      {
				      	cvc_input_valid = true;
				      	console.log('cvc');
				      }

				      else
				      {
				      	errors = errors.concat("Invalid cvc\n");
				      	
				     	$("#cvc").css({"background-color": "#EF9292"});
				      }







				      

				   
				// Client-Side Input Verification Goes Below!
				// If the input is valid, then it should be true
				

				allValid = user_input_valid && pass_input_valid && passRepeat_input_valid && email_input_valid && cardNum_input_valid && cardName_input_valid  && year_input_valid && zip_input_valid && cvc_input_valid;
				console.log(allValid);
				// allValid = true; // Remove this line once the client-side verification is done.

				// Add else if statements to let the user know what input was invalid and why. If (xxxx_valid) = false.....
				// Use $("#regFeedback").html("Invalid Response to be shown to the user.");
				// And $("#regFeedback").addClass("floatingBox"); to show the box to the user
				if (allValid) {
					console.log('it works!');
					
					
					$.ajax({
						url:'regAccount.php',
						type:'POST',
						data: {
							user_input: user_input,
							pass_input: pass_input,
							passRepeat_input: passRepeat_input,
							email_input: email_input,
							cardNum_input: cardNum_input,
							cardName_input: cardName_input,
							month_input: month_input,
							year_input: year_input,
							zip_input: zip_input,
							cvc_input: cvc_input
						},
						success: function(response) {
							$("#regFeedback").html(response);
							$("#regFeedback").addClass("floatingBox");
							$_SESSION['loggedOn'] = true;
							$("#user").html('Hi, ' + user_input);
							// window.location.href = "home.php";
						}
					});
				}

				else
				{

				     $("#regFeedback").html(errors);
				     $("#regFeedback").addClass("floatingBox"); 
				}
			});

			// FIX! COLSPAN = 2 DOES NOT HAPPEN. IDK WHY UGHHHH
			$(".hasReq").focusin(function() {
				$(this).next("tr").css("display", "initial");
			});

			$(".hasReq").focusout(function() {
				$(this).next("tr").css("display", "none");
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
				<h2>Create Account</h2>
				<table class="userInput">
					<tr>
				    	<td colspan="2"><h3>Account Information</h3></td>
				    </tr>
				    <tr class="hasReq">
					    <td colspan="2"><input type = "text" name = "username" id="username" size = "20" placeholder="Username"/></td>
				    </tr>
				    <tr style="display: none;">
				    	<td colspan="2">Must be more than 6 characters and cannot begin with digit.</td>
				    </tr>
				    <tr>
					    <td colspan="2"><input type = "text" name = "email" id="email" size = "20" placeholder="Email Address" /></td>
				    </tr>
				    <tr class="hasReq">
					    <td colspan="2"><input type = "password" name = "password" id="password" size = "20" placeholder="Password" /></td>
					    
				    </tr>
				    <tr style="display: none;">
				    	<td colspan="2">Must be more than 6 characters and contain only letters and digits.</td>
				    </tr>
				    <tr>
					    <td colspan="2"><input type = "password" name = "repeat" id="repeat" size = "20" placeholder="Repeat Password" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><h3>Payment Information</h3></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "card_number" id="card_number" size = "20" placeholder="Card Number" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "name_on_card" id="name_on_card" size = "20" placeholder="Name on Card" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2">
				    		<div class="custom-select">
				    		<select name="exp_month" id="exp_month">
				    			<option value="" selected disabled>Expiration Month</option>
				    			<option value="1">01 - January</option>
				    			<option value="2">02 - February</option>
				    			<option value="3">03 - March</option>
				    			<option value="4">04 - April</option>
				    			<option value="5">05 - May</option>
				    			<option value="6">06 - June</option>
				    			<option value="7">07 - July</option>
				    			<option value="8">08 - August</option>
				    			<option value="9">09 - September</option>
				    			<option value="10">10 - October</option>
				    			<option value="11">11 - November</option>
				    			<option value="12">12 - December</option>
				    		</select>
				    		</div>
				    	</td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "exp_year" id="exp_year" size = "20" placeholder="Expiration Year" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "zip_code" id="zip_code" size = "20" placeholder="Zip Code" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "cvc" id= "cvc" size = "20" placeholder="CVC" /></td>
				    </tr>
					<tr>
						<td><input id="register" class = "button" type = "button" name = "register" value = "Create Account"/></td>
						<td><input class = "button" type = "reset" value = "Clear" /></td>
					</tr>
				</table>
				<p>Already a user? <a href="login.php">Return to Login.</a></p>
			</form>
		</div>
		<div id="regFeedback"></div>
		<?php include "./footer.php"; ?>
	</div>
</body>
</html>