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
	elseif (isset($_GET['delete_article']) AND isset($_GET['id']) AND isset($_SESSION['user'])) {
		$id_pub = $_GET['id'];
		$id_user = $_SESSION['user'];
		global $bdd;

		$owner = $bdd->prepare("SELECT `id_user` FROM `publication` WHERE `id` = :id_pub");
		$owner->bindParam(':id_pub', $id_pub);
		$owner->execute();
		$result = $owner->fetch();
		if ($id_user == $result['id_user'])
		{
			$delete_article = $bdd->prepare("DELETE FROM `publication` WHERE id = :id_pub");
			$delete_article->bindParam(':id_pub', $id_pub);
			$delete_article->execute();
		}
		header('Location: index.php');
	}
	elseif (isset($_GET['delete_comment']) AND isset($_GET['id']) AND isset($_SESSION['user'])) {
		$id_com = $_GET['id'];
		$id_user = $_SESSION['user'];
		global $bdd;

		$owner = $bdd->prepare("SELECT `id_user` FROM `commentary` WHERE `id` = :id_com");
		$owner->bindParam(':id_com', $id_com);
		$owner->execute();
		$result = $owner->fetch();
		if ($id_user == $result['id_user'])
		{
			$delete_comment = $bdd->prepare("DELETE FROM `commentary` WHERE id = :id_com");
			$delete_comment->bindParam(':id_com', $id_com);
			$delete_comment->execute();
		}
		header('Location: index.php');
	}
?>