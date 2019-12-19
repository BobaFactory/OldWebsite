<html lang = "en">

<head>
	<?php include "./head.php"; ?>
</head>

<body>
	<div class="container">
		<div class="header">
			<?php include "./logoAndTitle.php"; ?>
			<?php include "./navigationBar.php"; ?>
		</div>
		<div class="middle">
			<div id="description">
				Below you can see our proof of design concept for the boba cooking subsystem.
			</div>
			<div id="video">
				<figure>
			  		<img src="design.jpg" width="600" height="900" class="rotate270">
		  			<figcaption style>
		  			</figcaption>
				</figure>
			</div>
		</div>
		<?php include "./footer.php"; ?>
	</div>
</body>

<style>

.rotate270 {
    -webkit-transform: rotate(270deg);
    -moz-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
}

</style>
</html>
