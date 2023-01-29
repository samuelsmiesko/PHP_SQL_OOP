<?php 

	// connect to the database
	$mysqli = new mysqli('localhost', '1Admin', '54321admins', 'mydata');

	// check connection
	if(!$mysqli){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>