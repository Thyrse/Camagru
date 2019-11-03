<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'rootroot', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
?>
