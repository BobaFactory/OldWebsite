<!DOCTYPE html>
<html lang = "en">

<head>
	<?php include "./head.php"; ?>
	<script>
		$(document).ready(function() {
			// autofill payment information
			console.log(document.cookies);
			$.ajax({
				url:'getPayInfo.php',
				type:'POST',
				// dataType: 'JSON',
				success: function(response) {
					console.log(response);
					var result = $.parseJSON(response);
					var user_card_number = result[0];
					var user_name_on_card = result[1];
					var user_exp_month = result[2];
					var user_exp_year = result[3];
					var user_zip_code = result[4];
					var user_cvc = result[5];

					$("#card_number").attr("value", user_card_number);
					$("#name_on_card").attr("value", user_name_on_card);
					//$("#exp_month").attr("value", "2"); // SOMEHOW EXPIRATION MONTH
					document.getElementById("exp_month").selectedIndex = user_exp_month;
					$("#exp_year").attr("value", user_exp_year);
					$("#zip_code").attr("value", user_zip_code);
					$("#cvc").attr("value", user_cvc);
				}
			});




			$("#placeOrder").click(function() {
				var pickUpDay = $("#pickUpDay").val();
				var pickUpTime = $("#pickUpTime").val();
				var card_number = $("#card_number").val();
				var name_on_card = $("#name_on_card").val();
				var exp_month = $("#exp_month").val();
				var exp_year = $("#exp_year").val();
				var zip_code = $("#zip_code").val();
				var cvc = $("#cvc").val();

				pickUpDay_valid = pickUpDay !== null && pickUpDay !== '';
				pickUpTime_valid = pickUpTime !== null && pickUpTime !== '';
				card_number_valid = card_number !== null && card_number !== '';
				name_on_card_valid = name_on_card !== null && name_on_card !== '';
				exp_month_valid = exp_month !== null && exp_month !== '';
				exp_year_valid = exp_year !== null && exp_year !== '';
				zip_code_valid = zip_code !== null && zip_code !== '';
				cvc_valid = cvc !== null && cvc !== '';

				var allFilled = pickUpDay_valid && pickUpTime_valid && card_number_valid && name_on_card_valid && exp_month_valid && exp_year_valid && zip_code_valid && cvc_valid;

				console.log(allFilled);
				if (allFilled) {
					window.location.href = "orderConfirmation.php";
				} else {
					$("#feedback").html("Please fill in all fields.");
					$("#feedback").addClass("floatingBox");
					$("#feedback").css("margin", "auto");
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
		<div class="middle" style="text-align: center;">
			<div id="feedback"></div>
			<h1>Review And Place Your Order!</h1>
			<div align="center">
				<!-- Schedule Pick Up Section -->
				<h2>Schedule Pick Up</h2>
				<table>
					<tr>
						<td>Pick Up Day</td>
						<td><input type="date" name="pickUpDay"></td>
					</tr>
					<tr>
						<td>Pick Up Time</td>
						<td>
							<select name="pickUpTime">
				    			<option value="" selected disabled>Time</option>
				    			<option value="10AM">10:00 AM</option>
				    			<option value="10:30AM">10:30 AM</option>
				    			<option value="11AM">11:00 AM</option>
				    			<option value="11:30AM">11:30 AM</option>
				    			<option value="12PM">12:00 PM</option>
				    			<option value="12:30PM">12:30 PM</option>
				    			<option value="1PM">1:00 PM</option>
				    			<option value="1:30PM">1:30 PM</option>
				    			<option value="2PM">2:00 PM</option>
				    			<option value="2:30PM">2:30 PM</option>
				    			<option value="3PM">3:00 PM</option>
				    			<option value="3:30PM">3:30 PM</option>
				    			<option value="4PM">4:00 PM</option>
				    			<option value="4:30PM">4:30 PM</option>
				    			<option value="5PM">5:00 PM</option>
				    		</select>
						</td>
					</tr>
				</table>
			</div>
			<hr>
			<div align="center">
				<!-- Payment Information Section -->
				<!-- Autofill for user logged in-->
				<!-- Ask them to confirm the autofilled data -->
				<h2>Payment Information</h2>
				<table>
					<tr>
				    	<td colspan="2"><input type = "text" name = "card_number" id="card_number" size = "20" placeholder="Card Number" value="" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "name_on_card" id="name_on_card" size = "20" placeholder="Name on Card" value="" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2">
				    		<select name="exp_month" id="exp_month" >
				    			<!-- php script to autofill this -->
				    			<option value="" selected disabled>Expiration Month</option>
				    			<option value="1" selected>01 - January</option>
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
				    	</td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "exp_year" id="exp_year" size = "20" placeholder="Expiration Year" value="" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "zip_code" id="zip_code" size = "20" placeholder="Zip Code" value="" /></td>
				    </tr>
				    <tr>
				    	<td colspan="2"><input type = "text" name = "cvc" id= "cvc" size = "20" placeholder="CVC" value="" /></td>
				    </tr>
				</table>
			</div>
			<hr>
			<div>
				<!-- Review Order Section/Order Summary Section -->
				<!-- Button to go back to ordering page to make edits -->
				<!-- Add remove an order functionality to the cookies -->
				<h2>Order Summary</h2>
				<?php include "orderSummary.php"; ?>
			</div>
			<hr>
			<div style="text-align: center;">
				<!-- Place Order Button -->
				<!-- Send user to an order confirmation page. -->
				<!-- If the user left anything blank, ask them to fill it. -->
				<input type="button" name="order" value="Place Your Order" class="button" id="placeOrder" style="font-size: 1.5em; padding-left: 5em; padding-right: 5em; margin: 0.5em;">
			</div>
		</div>
		<?php include "./footer.php"; ?>
	</div>
</body>
</html>