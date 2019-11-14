<?php
require_once('config/config.php');
require_once('class/user.class.php');
if(isset($_SESSION['user']))
    header('location: index.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
    <header>
       <?php include("inc/header.php"); ?>
    </header>
    <div id="main">
        <div class="create create_user">
            <h3>Inscription</h3>
            <form name="submit" method="post" action="action.php">
                <div class="user_registration">
                    <label for="username">Pseudo :</label>
                    <input type="text" name="username" maxlength="10" placeholder="Ex: Tintin, Harambe..." required>
                    <label for="email">Email :</label>
                    <input type="email" name="email" maxlength="30" placeholder="Email" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" maxlength="20" placeholder="Unique pour ce site..." required>
                    <label>Confirmer le mot de passe :</label>
                    <input type="password" name="password_confirm" maxlength="20" placeholder="Retapez le mot de passe..." required>
                    <?php if(isset($_SESSION['error_reg']) && $_SESSION['error_reg'] !== false): ?>
                        <span class="msg_error"><?= $_SESSION['error_reg'] ?></span><?php $_SESSION['error_reg'] = false; ?>
                    <?php elseif (isset($_SESSION['success']) && $_SESSION['success'] !== false): ?>
                        <span class="msg_success"><?= $_SESSION['success'] ?></span><?php $_SESSION['success'] = false; ?>
                    <?php endif ?>
                    
                </div>
                <div class="create_button">
                    <button type="submit" name="create_account" value="">S'inscrire</button>
                </div>
            </form>
        </div>
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