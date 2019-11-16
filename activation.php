<?php
require_once('config/config.php');
require_once('class/user.class.php');
require_once('class/register.class.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');
if(isset($_SESSION['user']))
{
    header('location: index.php');
}

elseif(isset($_GET['token']))
{
    $token = $_GET['token'];

    $activation = new Register;
    $activation->activate($token);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="assets/images/" rel="shortcut icon" />
    <link rel="icon" type="image/png" href="assets/images/logo.png" />
    <script type="text/javascript" src="script.js"></script>
    <title>Instagru</title>
</head>

<body>
    <header>
       <?php include("inc/header.php"); ?>
    </header>
    <div id="main">
        <div><?= $_SESSION['activ'] ?></div>
    </div>
    <footer>
        <div id="footer">
            <div class="footer_logo">
                <img src="assets/images/logo.png">
            </div>
        </div>
    </footer>
</body>

</html>