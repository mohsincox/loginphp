<?php
	
	$connAsterisk = mysqli_connect("localhost", "root", "", "asterisk");
	
	if (!$connAsterisk) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>