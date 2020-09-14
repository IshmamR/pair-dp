<?php
	// Connecting to database
	$connect = mysqli_connect("remotemysql.com:3306", "7wSLkaEUEv", "Es0KMddWSl", "7wSLkaEUEv"); 

	if ($connect) {
		// echo "Connection successful";
	} else {
		echo("Error");
		die();
	}
	// $db = '7wSLkaEUEv';
	// mysqli_select_db($connect, $db) or die( 'MySQL ERROR: ');
	// mysqli_close($connect);
?>