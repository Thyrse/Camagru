<?php
require_once('config/config.php');
require_once('class/user.class.php');
if(isset($_SESSION['user']))
    $user = new Userinfo($_SESSION['user']);

var_dump($user);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Compte</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
    <header>
       <?php include("inc/header.php"); ?>
    </header>
    <div id="main">
        <div class="create create_user">
            <h3>Informations de compte</h3>
            <form name="submit" method="post" action="action.php">
                <div class="user_registration">
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="text" name="username" maxlength="10" placeholder="Ex: Tintin, Harambe..." value="<?= $user->getUsername(); ?>" required>
                    <label for="email">Email :</label>
                    <input type="email" name="email" maxlength="30" placeholder="Email" value="<?= $user->getEmail(); ?>" required>
                    <label for="confirm_password">Confirmer le mot de passe :</label>
                    <input type="password" name="confirm_password" maxlength="20" placeholder="Retapez le mot de passe...">
                </div>
                <div class="create_button">
                    <button type="submit" name="account_update">Modifier</button>
                </div>
                <a id="delete_confirm" href="#">Supprimer son compte</a>
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