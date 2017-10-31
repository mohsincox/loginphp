<?php
	
	$conn = mysqli_connect("localhost", "root", "", "everyday");
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>