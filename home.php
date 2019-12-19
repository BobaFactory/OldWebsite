<!DOCTYPE html>

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
				We are The Boba Factory. We are desigining an automated machine that will provide you boba anywhere, anytime.
			</div>
			<div id="video">
				<video width="960" height="540" controls>
					<!-- The video is 1920 by 1080 or 16:9 aspect ratio-->
					<source src="Boba.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>
		</div>
		<?php include "./footer.php"; ?>
	</div>
</body>
</html>
