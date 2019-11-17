<?php
require_once('config/config.php');
require_once('class/user.class.php');
if(isset($_SESSION['user']))
{
    $user = new Userinfo($_SESSION['user']);
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
                    <input type="password" name="confirm_password" maxlength="20" placeholder="Retapez le mot de passe..." required>
                    <?php if(isset($_SESSION['account']) && $_SESSION['account'] !== false) { 
                    echo '<span class="msg_error">'.$_SESSION['account'].'</span>'; $_SESSION['account'] = false; }
                    elseif(isset($_SESSION['successa']) && $_SESSION['successa'] !== false) { 
                        echo '<span class="msg_success">'.$_SESSION['successa'].'</span>'; $_SESSION['successa'] = false; } ?>
                </div>
                <div class="create_button">
                    <button type="submit" name="account_update">Modifier</button>
                </div>
                <a id="delete_confirm" href="?delete=1&id=<?php echo $_SESSION['user'];?>">Supprimer mon compte</a>
                <!-- <a id="delete_confirm" href="#">Supprimer mon compte</a> -->
            </form>
        </div>
        <div class="create create_user">
            <h3>Changer de mot de passe</h3>
            <form name="submit" method="post" action="action.php">
                <div class="user_registration">
                    <label for="old_password">Ancien mot de passe :</label>
                    <input type="password" name="old_password" maxlength="20" placeholder="Ancien mot de passe..." required>
                    <label for="new_password">Nouveau mot de passe :</label>
                    <input type="password" name="new_password" maxlength="20" placeholder="Nouveau..." required>
                    <label for="confirm_new">Confirmation :</label>
                    <input type="password" name="confirm_new" maxlength="20" placeholder="Confirmation..." required>
                    <?php if(isset($_SESSION['passwd']) && $_SESSION['passwd'] !== false) { 
                    echo '<span class="msg_error">'.$_SESSION['passwd'].'</span>'; $_SESSION['passwd'] = false; }
                    elseif(isset($_SESSION['successp']) && $_SESSION['successp'] !== false) { 
                        echo '<span class="msg_success">'.$_SESSION['successp'].'</span>'; $_SESSION['successp'] = false; }?>
                </div>
                <div class="create_button">
                    <button type="submit" name="password_update">Modifier</button>
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