<?php
require_once('config/connect.php');
require_once('class/user.class.php');
require_once('class/register.class.php');
if(isset($_SESSION['user']))
    header('location: index.php');
elseif(isset($_GET['token']) && isset($_GET['id']))
{
    $token = $_GET['token'];
    $id = (int)$_GET['id'];
    $resetpwd = new Register;
}
$user = new Userinfo;
$user->setToken();
$token = $_SESSION['token'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="icon" type="image/png" href="assets/images/logo.png" />
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
    <header>
       <?php include("inc/header.php"); ?>
    </header>
    <div id="main">
        <div class="create create_user">
        <?php if(isset($_GET['action']) && isset($_GET['id']) && isset($_GET['token']) && $_GET['action'] == "reset_password") : ?>
        <h3>Changer le mot de passe</h3>
            <form name="reset_pwd" method="post" action="action.php">
                    <div class="user_registration">
                        <label for="password">Nouveau mot de passe :</label>
                        <input type="password" name="password" maxlength="20" placeholder="Unique pour ce site..." required>
                        <label>Confirmer le mot de passe :</label>
                        <input type="password" name="password_confirm" maxlength="20" placeholder="Retapez le mot de passe..." required>
                        <input type="hidden" name="token" value="<?= $_GET['token'] ?>"/>
                        <input type="hidden" name="id_user" value="<?= $_GET['id'] ?>"/>
                        <input type="hidden" name="form_token" value="<?= $token ?>"/>
                        <?php if(isset($_SESSION['error_reg']) && $_SESSION['error_reg'] !== false): ?>
                        <span class="msg_error"><?= $_SESSION['error_reg'] ?></span><?php $_SESSION['error_reg'] = false; ?>
                        <?php elseif (isset($_SESSION['success']) && $_SESSION['success'] !== false): ?>
                        <span class="msg_success"><?= $_SESSION['success'] ?></span><?php $_SESSION['success'] = false; ?>
                        <?php endif ?>
                    </div>
                    <div class="create_button">
                        <button type="submit" name="reset_pwd" value="">Modifier</button>
                    </div>
            </form>
        <?php elseif(isset($_GET['action']) && $_GET['action'] == "reset_password") : ?>
        <h3>Réinitialiser le mot de passe</h3>
            <form name="reset_username" method="post" action="action.php">
                    <div class="user_registration">
                        <label for="username">Tapez le pseudo de votre compte :</label>
                        <input type="text" name="username" maxlength="10" placeholder="Ex: Tintin, Harambe..." required>
                        <input type="hidden" name="form_token" value="<?= $token ?>"/>
                        <span>Vous allez recevoir les instructions par mail.</span>
                        <?php if(isset($_SESSION['error_reg']) && $_SESSION['error_reg'] !== false): ?>
                        <span class="msg_error"><?= $_SESSION['error_reg'] ?></span><?php $_SESSION['error_reg'] = false; ?>
                        <?php elseif (isset($_SESSION['success']) && $_SESSION['success'] !== false): ?>
                        <span class="msg_success"><?= $_SESSION['success'] ?></span><?php $_SESSION['success'] = false; ?>
                        <?php endif ?>
                    </div>
                    <div class="create_button">
                        <button type="submit" name="reset_username" value="">Envoyer</button>
                    </div>
            </form>
        <?php else : ?>
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
                    <input type="hidden" name="form_token" value="<?= $token ?>"/>
                </div>
                <div class="create_button">
                    <button type="submit" name="create_account" value="">S'inscrire</button>
                </div>
            </form>
            <?php endif ?>
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