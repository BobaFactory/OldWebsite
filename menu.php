<html lang = "en">
	
<head>
	<?php include "./head.php"; ?>
	<script>
		var helpers = ["This is our regular milk tea with tapioca pearls. A great first tea to try if you are having boba tea for the time. It uses a black tea base with sugar and milk.",
	"This is our Green milk tea with tapioca pearls. This tea is more suited for a lighter palette since the tea leaves are not as strong as the black tea. It uses a Green tea base with sugar and milk.",
	"This is our Chocolate milk tea with tapioca pearls. It uses a Black tea base with sugar and milk. However, this also contains our in house manufactured chocolate flavoring. ",
	"This is our Coffee milk tea with tapioca pearls. This tea is actually made from coffee grounds so it is more a coffee than a tea. However the combination of coffee and boba is extremely tasty because we use special factors that limit the sugar in the drink.",
	"This is our Jasmine milk tea with tapioca pearls. It uses a Green tea base with sugar and milk. The Jasmine flavoring comes from a fine powder that we produce from ourselves. This tea is excellent if you're looking for earthy flavors.", 
	"This is our Cantalope milk tea with tapioca pearls. It uses a Green tea base with sugar and milk. The Cantalope is from fresh fruits that are blended together and actually mixed into the drink. It is one of our healthier options as well if you like to watch what you are drinking!" ]

	// The event handler function to change the value of the textarea

	function messages(adviceNumber) {
	  document.getElementById("adviceBox").value = helpers[adviceNumber];
	}
	</script>
</head>

<body>
	<div class="container">
		<div class="header">
			<?php include "./logoAndTitle.php"; ?>
			<?php include "./navigationBar.php"; ?>
		</div>
		<div id = "contact" style="text-align: center" class="middle">
			<div class="contactColumn">
				<figure>
			  		<img src="boba1.jpg" onmouseover = "messages(0)">
		  			<figcaption style>
		  			</figcaption>
				</figure>
			</div>
			<div class="contactColumn">	
				<figure>
			  		<img src="boba2.jpg" onmouseover = "messages(1)">
		  			<figcaption style>
					</figcaption>
				</figure>
			</div>
			<div class="contactColumn">
				<figure>
			  		<img src="boba3.jpg" onmouseover = "messages(2)">
		  			<figcaption style>
					</figcaption>
				</figure>
			</div>
			<textarea id = "adviceBox"  rows = "3"  cols = "50" style = "position: relative; right:195px; height: 100px; top:20px">
			</textarea>
		</div>
		<div id = "contact" style="text-align: center" class="middle">
			<div class="contactColumn">
				<figure>
			  		<img src="boba4.jpg" onmouseover = "messages(3)">
		  			<figcaption style>
		  			</figcaption>
				</figure>
			</div>
			<div class="contactColumn">	
				<figure>
			  		<img src="boba5.jpg" onmouseover = "messages(4)">
		  			<figcaption style>
					</figcaption>
				</figure>
			</div>
			<div class="contactColumn">
				<figure>
			  		<img src="boba6.jpg" onmouseover = "messages(5)">
		  			<figcaption style>
					</figcaption>
				</figure>
			</div>	
		</div>
		<?php include "./footer.php"; ?>
	</div>
</body>
</html>