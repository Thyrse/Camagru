<?php
require_once('config/connect.php');
require_once('class/user.class.php');
if(isset($_SESSION['user']))
{
    $user = new Userinfo($_SESSION['user']);
    $user->setToken();
    $token = $_SESSION['token'];
}
else
{
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Compte</title>
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
            <h3>Informations de compte</h3>
            <form name="submit" method="post" action="action.php">
                <div class="user_registration">
                <?php if(isset($_SESSION['user'])) : ?>
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="text" name="username" maxlength="10" placeholder="Ex: Tintin, Harambe..." value="<?= $user->getUsername(); ?>" required>
                    <label for="email">Email :</label>
                    <input type="email" name="email" maxlength="30" placeholder="Email" value="<?= $user->getEmail(); ?>" required>
                    <label for="confirm_password">Confirmer le mot de passe :</label>
                    <input type="password" name="confirm_password" maxlength="20" placeholder="Retapez le mot de passe..." required>
                    <?php if(isset($_SESSION['account']) && $_SESSION['account'] !== false): ?>
                    <span class="msg_error"><?= $_SESSION['account'] ?></span><?php $_SESSION['account'] = false; ?>
                    <?php elseif(isset($_SESSION['successa']) && $_SESSION['successa'] !== false): ?>
                    <span class="msg_success"><?= $_SESSION['successa'] ?></span><?php $_SESSION['successa'] = false; ?>
                    <?php endif ?>
                    <input type="hidden" name="form_token" value="<?= $token ?>"/>
                <?php endif ?>
                </div>
                <div class="create_button">
                    <button type="submit" name="account_update">Modifier</button>
                </div>
                <?php if(isset($_SESSION['user'])) : ?>
                <a class="delete_confirm" href="?delete=1&id=<?php echo $_SESSION['user'];?>">Supprimer mon compte</a>
                <?php endif ?>
            </form>
        </div>
        <div class="create create_user">
            <h3>Changer de mot de passe</h3>
            <form name="submit" method="post" action="action.php">
                <div class="user_registration">
                <?php if(isset($_SESSION['user'])) : ?>
                    <label for="old_password">Ancien mot de passe :</label>
                    <input type="password" name="old_password" maxlength="20" placeholder="Ancien mot de passe..." required>
                    <label for="new_password">Nouveau mot de passe :</label>
                    <input type="password" name="new_password" maxlength="20" placeholder="Nouveau..." required>
                    <label for="confirm_new">Confirmation :</label>
                    <input type="password" name="confirm_new" maxlength="20" placeholder="Confirmation..." required>
                    <?php if(isset($_SESSION['passwd']) && $_SESSION['passwd'] !== false): ?>
                    <span class="msg_error"><?= $_SESSION['passwd'] ?></span><?php $_SESSION['passwd'] = false; ?>
                    <?php elseif(isset($_SESSION['successp']) && $_SESSION['successp'] !== false): ?>
                    <span class="msg_success"><?= $_SESSION['successp'] ?></span><?php $_SESSION['successp'] = false; ?>
                    <?php endif ?>
                    <input type="hidden" name="form_token" value="<?= $token ?>"/>
                <?php endif ?>
                </div>
                <div class="create_button">
                    <button type="submit" name="password_update">Modifier</button>
                </div>
            </form>
        </div>
        <div class="create create_user">
            <h3>Preferences newsletters</h3>
            <form name="submit" method="post" action="action.php">
                <div class="user_registration">
                <?php if(isset($_SESSION['user'])) : ?>
                    <?php if($user->getNewsletter() == 1) : ?>
                    <div><input type="radio" id="check_yes" name="newsletter" value="1" checked>
                    <label for="check_yes">Oui</label></div>
                    <div><input type="radio" id="check_no" name="newsletter" value="0">
                    <label for="check_no">Non</label></div>
                    <?php elseif($user->getNewsletter() == 0) : ?>
                    <div><input type="radio" id="check_yes" name="newsletter" value="1">
                    <label for="check_yes">Oui</label></div>
                    <div><input type="radio" id="check_no" name="newsletter" value="0" checked>
                    <label for="check_no">Non</label></div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['newsupdate']) && $_SESSION['newsupdate'] !== false) : ?>
                    <span class="msg_success"><?= $_SESSION['newsupdate']; unset($_SESSION['newsupdate']); ?></span>
                    <?php endif ?>
                    <input type="hidden" name="form_token" value="<?= $token ?>"/>
                <?php endif ?>
                </div>
                <div class="create_button">
                    <button type="submit" name="newsletter_update">Modifier</button>
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