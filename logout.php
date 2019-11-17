<?php
session_start();
session_unset();
session_destroy();
$_SESSION['user'] = false;
header('Location: index.php');
if (isset($_GET['action']) && $_GET['action'] == "logout" ) {
	session_destroy();
}
?>