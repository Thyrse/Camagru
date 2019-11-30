<?php
require_once('config/connect.php');
require_once('class/user.class.php');
require_once('class/register.class.php');
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
else
{
    header('location: index.php');
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
    <div id="main" class="activation">
        <?php if(isset($_SESSION['activ_ok']) && $_SESSION['activ_ok'] !== false) : ?>
        <div class="activated_acc"><p><?= $_SESSION['activ_ok']; $_SESSION['activ_ok'] = false; ?></p></div>
        <?php elseif(isset($_SESSION['activ_err']) && $_SESSION['activ_err'] !== false) : ?>
        <div class="activated_err"><p><?= $_SESSION['activ_err']; $_SESSION['activ_err'] = false;?></p></div>
        <?php endif ?>
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