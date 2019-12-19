<!DOCTYPE html>
<html lang = "en">

<head>
	<?php include "./head.php"; ?>
	<?php session_start();
		// if($_SESSION['loggedOn'] == false)
		// {
		// 	header('Location: login.php');
		// }
	?>
	<script >
		$(document).ready(function() {
			
			document.cookie = "boba_orders = [0,0,0,0,0,0]";
			console.log(document.cookie);
			console.log(c2array(document.cookie));
			var sum = 0;
			var black = "This is our regular black milk tea with tapioca pearls. A great first tea to try if you are having boba tea for the time. It uses a black tea base with sugar and milk.";
			var green = "This is our Green milk tea with tapioca pearls. This tea is more suited for a lighter palette since the tea leaves are not as strong as the black tea. It uses a Green tea base with sugar and milk.";
			var chocolate = "This is our Chocolate milk tea with tapioca pearls. It uses a Black tea base with sugar and milk. However, this also contains our in house manufactured chocolate flavoring. ";
			var coffee = "This is our Coffee milk tea with tapioca pearls. This tea is actually made from coffee grounds so it is more a coffee than a tea. However the combination of coffee and boba is extremely tasty because we use special factors that limit the sugar in the drink.";
			var jasmine = "This is our Jasmine milk tea with tapioca pearls. It uses a Green tea base with sugar and milk. The Jasmine flavoring comes from a fine powder that we produce from ourselves. This tea is excellent if you're looking for earthy flavors.";
			var cantalope = "This is our Cantalope milk tea with tapioca pearls. It uses a Green tea base with sugar and milk. The Cantalope is from fresh fruits that are blended together and actually mixed into the drink. It is one of our healthier options as well if you like to watch what you are drinking!";
			var descriptions = [black, green, chocolate, coffee, jasmine, cantalope];

			$(".tile").click(function() {
				var id_d = parseInt($(this).attr('id'));
				$("#description").html(descriptions[id_d]).addClass("floatingBox");
			});

			$(".tile").mouseover(function() {
				var id_num = $(this).attr('id');
				var id = "#".concat(id_num.toString());
				$(id).addClass("floatingBox");
			});

			$(".tile").mouseout(function() {
				var id_num = $(this).attr('id');
				var id = "#".concat(id_num.toString());
				$(id).removeClass("floatingBox");
			});

			function c2array(cookie) {
				var i1 = cookie.indexOf("[");
				var i2 = cookie.indexOf("]");
				var array_string = cookie.substring(i1 + 1, i2);
				console.log(array_string);
				var array = array_string.split(",");

				for (index = 0; index < array.length; index++) { 
				    // console.log(array[index]); 
				    array[index] = parseInt(array[index]);
				}

				return array;
			}

			function array2c(array) {
				var converted = array.toString();
				var final = "[".concat(converted, "]");
				document.cookie = "boba_orders = ".concat(final);
			}

			function addOrder(id) {
				var boba_orders = c2array(document.cookie);
				boba_orders[id] = boba_orders[id] + 1;
				array2c(boba_orders);
				sumtoCart();

			}

			function removeOrder(id) {
				var boba_orders = c2array(document.cookie);
				if (boba_orders[id] > 0)
				boba_orders[id] = boba_orders[id] - 1;
				array2c(boba_orders);
				sumtoCart();
			}
			function sumtoCart() {
				var boba_orders = c2array(document.cookie);
				sum = 0;
				for (var i = 0; i < boba_orders.length; i++) {
				sum += boba_orders[i];
				}
				console.log(sum);
				console.log(c2array(document.cookie));
				$.ajax({
					url:'cartsum.php',
					type:'POST',
					data: {'myData':sum,
							'cart':	c2array(document.cookie)},
					success: function(response) {
						console.log($.parseJSON(response));
					}
				});
			}
		
			$(".order").click(function() {
				var id = parseInt($(this).attr('id').charAt(0));
				$.ajax({
					url:'checkIfLoggedIn.php',
					type:'POST',
					data: {id:id,
							add:1},
					success: function(response) {
						if(response == 1) {
							window.location.href = "login.php";
						} else {
							//addOrder(id);
							//updateCart();
							console.log($.parseJSON(response));
							console.log(c2array(document.cookie));
					    }
					}
				});
			});

			$(".removeOrder").click(function() {
				var id = parseInt($(this).attr('id').charAt(0));

				$.ajax({
					url:'checkIfLoggedIn.php',
					type:'POST',
					data: {id:id,
							add:0},
					success: function(response) {
						if(response == 1) {
							window.location.href = "login.php";
						} else {
							//removeOrder(id);
							console.log($.parseJSON(response));
							console.log(document.cookie);
					    }
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
			<table>
				<caption><h2>Tea Flavors</h2><p>Click on a flavor for more information!</p></caption>
				<tr>
					<td colspan="3" id="description" style="font-size: 1em;"></td>
				</tr>
				<tr>
					<td id="0" class="tile"><figure>
						<img src="black.jpg">
						<figcaption>Black Milk Tea</figcaption>
						<input type="button" name="order" value="Order" class="button order" id="0_btn"/>
						<input type="button" name="removeOrder" value="Remove" class="button removeOrder" id="0_Rbtn"/>
					</figure></td>
					<td id="1" class="tile"><figure>
						<img src="green.jpg">
						<figcaption>Green Milk Tea</figcaption>
						<input type="button" name="order" value="Order" class="button order" id="1_btn"/>
						<input type="button" name="removeOrder" value="Remove" class="button removeOrder" id="1_Rbtn"/>
					</figure></td>
					<td id="2" class="tile"><figure>
						<img src="chocolate.jpg">
						<figcaption>Chocolate Milk Tea</figcaption>
						<input type="button" name="order" value="Order" class="button order" id="2_btn"/>
						<input type="button" name="removeOrder" value="Remove" class="button removeOrder" id="2_Rbtn"/>
					</figure></td>
				</tr>
				</tr>
					<td id="3" class="tile"><figure>
						<img src="coffee.jpg">
						<figcaption>Coffee Milk Tea</figcaption>
						<input type="button" name="order" value="Order" class="button order" id="3_btn"/>
						<input type="button" name="removeOrder" value="Remove" class="button removeOrder" id="3_Rbtn"/>
					</figure></td>
					<td id="4" class="tile"><figure>
						<img src="jasmine.jpg">
						<figcaption>Jasmine Milk Tea</figcaption>
						<input type="button" name="order" value="Order" class="button order" id="4_btn"/>
						<input type="button" name="removeOrder" value="Remove" class="button removeOrder" id="4_Rbtn"/>
					</figure></td>
					<td id="5" class="tile"><figure>
						<img src="cantalope.jpg">
						<figcaption>Cantalope Milk Tea</figcaption>
						<input type="button" name="order" value="Order" class="button order" id="5_btn"/>
						<input type="button" name="removeOrder" value="Remove" class="button removeOrder" id="5_Rbtn"/>
					</figure></td>
				</tr>
			</table>
		</div>
		<?php include "./footer.php"; ?>
	</div>
</body>
</html>