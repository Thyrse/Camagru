<?php
include('core/restrict.php');
?>
<div class="header_insta">
    <div>
        <button class="preview_insta"><a href="../create_article.php">Nouveau</a></button>
    </div>
</div>
<div class="header_logo">
    <a href="index.php"><img src="assets/images/logo.png"></a>
</div>
<div class="header_sign">
<?php if (isset($_SESSION['user'])) { ?>
    <span class="infos_user">Bonjour, <?php echo $user->getUsername(); ?></span>
    <a href="?action=logout">Déconnexion</a>
    <?php } 
    else {?>
    <a href="registration.php">Inscription</a>
    <a href="#" class="sign_in">Connexion</a>
    <?php } ?>
</div>
<!-- MENU SE CONNECTER -->
<div class="toggle toggle_login" id="toggle_login">
    <h3>Se connecter</h3>
    <form name="login" method="post" action="action.php">
        <div class="login_fields">
            <label>Nom d'utilisateur :</label>
            <input type="text" name="username" maxlength="10" placeholder="Nom d'utilisateur" required>
            <label>Mot de passe :</label>
            <input type="password" name="password" maxlength="20" placeholder="Mot de passe" required>
        </div>
        <a href="registration.php?action=reset_password" class="forgot_passwd">Mot de passe oublié ?</a>
        <div class="toggle_button">
            <button type="submit" name="login" value="login">Connexion</button>
        </div>
        <?php if(isset($_SESSION['error']) && $_SESSION['error'] !== false) { 
                    echo '<span class="msg_error">'.$_SESSION['error'].'</span>'; $_SESSION['error'] = false; } ?>
    </form>
</div>
<!-- MENU UNE FOIS CONNECTÉ -->
<div class="toggle toggle_user" id="toggle_user">
    <h3>Votre compte</h3>
    <div class="user_actions">
        <div><a href="account.php">Informations du compte</a></div>
        <div><a href="create_article.php">Créer une publication</a></div>
    </div>
</div>