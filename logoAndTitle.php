<header id="logoAndTitle">
	<!-- <table align="center"> -->
	<table>
		<tr>
			<td><a href="home.php"><img src="boba.png" alt="logo" id="logo"></a></td>
			<td><h1>The Boba Factory</h1><h2>Bringing Convenience to Boba Tea</h2></td>
		</tr>
	</table>
	
	
</header>

<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop()>1)
	     {
	        // $('#logoAndTitle').slideUp(1000).hide(1000);
	        $('#logoAndTitle').slideUp(1000);
	     }
	    else
	     {
	      // $('#logoAndTitle').slideDown(1000).show(1000);
	     	$('#logoAndTitle').slideDown(1000);
	     }
	 });
</script>