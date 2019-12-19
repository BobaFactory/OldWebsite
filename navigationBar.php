<div id="navBar">
	<ul>
		<li><a href = "home.php">Home</a></li>
		<li><a href = "aboutUs.php">About Us</a></li>
		<li><a href = "contactus.php">Contact Us</a></li>
		<li><a href = 

			<?php 
			session_start();
				if ($_SESSION['loggedOn']) {
					print ("'logout.php'");
				}
				else
				{
					print("'login.php'");
				} 
					
			?>




		>
			<?php 
				if ($_SESSION['loggedOn']) {
					print ("Logout");
				}
				else
				{
					print("Login");
				} 
						
			?>
		</a></li>
		<li><a href = "order.php">Order</a></li>
		<li>
		<form action="Checkout.php">
  		<input type="image" src="cart.png" style="width: 50px; top: 15px; position: relative;" alt="cart">
		</form> </li>
		<li id="orderAmt" style="position: relative; left: -30px; top: -6px;">
			<?php 
				session_start(); 
				if ($_SESSION['loggedOn']) {

					if($_SESSION['cartsum'] > 0)
					{
						echo $_SESSION['cartsum'];
					}

					
				}
				else { echo '0';}
			?>
		</li>
		<li id= 'user'> 
			<?php  
				session_start();
				if ($_SESSION['loggedOn']) {

					print ('Hi, '.$_COOKIE["user"]);
				}
			?>

		</li>

	</ul>
</div>



