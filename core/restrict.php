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
	elseif (isset($_GET['delete']) AND isset($_GET['id']) AND $_GET['id'] == $_SESSION['user']) {
		global $bdd;

		$delecteacc = $bdd->prepare("DELETE FROM users WHERE id = ".$_SESSION['user']."");
		$delecteacc->execute();
		session_unset($_SESSION['user']);
		header('Location: index.php');
	}
?>