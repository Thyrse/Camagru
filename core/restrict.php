<?php

	// include('database_infos.php');
// 
	// if (!isset( $link ) OR !isset( $DATABASE_NAME )) {
		// header('Location: ../install/');
		// exit();
	// }

	if (isset($_GET['action']) AND $_GET['action'] == 'logout') {
		session_unset();
		session_destroy();
		$_SESSION['user'] = false;
		header('Location: index.php');
	}

?>