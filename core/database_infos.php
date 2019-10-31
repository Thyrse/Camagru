<?php
		$HOSTNAME = "localhost";
		$USER_DB = "root";
		$PASSWORD_DB = "rootroot";
		$DATABASE_NAME = "old_rush";
		$link = mysqli_connect("$HOSTNAME", "$USER_DB", "$PASSWORD_DB", "$DATABASE_NAME");
		if (!$link)
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>