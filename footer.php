<div id="footer">
	<h2>The Boba Factory</h2>
		<p>Contact at support@TheBobaFactory.com</p>
		<p>© Copyright 2019, All rights reserved. Design by Samraz Badruddin, Victoria Do, Joshua Mathew.</p>
		<p id = "date">  </p>
</div>

<script>
	const monthNames = ["January", "February", "March", "April", "May", "June",
	  "July", "August", "September", "October", "November", "December"
	];

	var date = new Date();
	document.getElementById("date").innerHTML = monthNames[date.getMonth()] + " " + date.getDate() +", " + date.getFullYear();
</script>