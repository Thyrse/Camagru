<?php
require_once('config/config.php');
require_once('class/register.class.php');
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
        <div class="header_insta">
            <div>
                <button class="preview_insta">Nouveau</button>
            </div>
        </div>
        <div class="header_logo">
            <a href="#"><img src="assets/images/logo.png"></a>
        </div>
        <div class="header_sign">
            <a href="registration.php">Inscription</a>
            <a href="#" class="sign_in">Connexion</a>
        </div>
        <!-- MENU SE CONNECTER -->
        <div class="toggle toggle_login" id="toggle_login">
            <h3>Se connecter</h3>
            <form name="login" method="post" action="">
                <div class="login_fields">
                    <label>Nom d'utilisateur :</label>
                    <input type="text" name="username" maxlength="10" placeholder="Nom d'utilisateur" required>
                    <label>Mot de passe :</label>
                    <input type="password" name="password" maxlength="20" placeholder="Mot de passe" required>
                </div>
                <div class="toggle_button">
                    <button type="submit" name="login">Connexion</button>
                </div>
            </form>
        </div>
        <!-- MENU UNE FOIS CONNECTÉ -->
        <div class="toggle toggle_user" id="toggle_user">
            <h3>Votre compte</h3>
            <div class="user_actions">
                <div><a href="#">Informations du compte</a></div>
                <div><a href="#">Créer une catégorie</a></div>
                <div><a href="#">Ajouter un produit</a></div>
                <div><a href="#">Modifier un produit</a></div>
                <div><a href="#">Modifier un utilisateur</a></div>
            </div>
        </div>
    </header>
    <div id="main">
        <div class="create create_user">
            <h3>Inscription</h3>
            <form name="submit" method="post" action="">
                <div class="user_registration">
                    <label for="username">Pseudo :</label>
                    <input type="text" name="username" maxlength="10" placeholder="Ex: Tintin, Harambe..." required>
                    <label for="email">Email :</label>
                    <input type="email" name="email" maxlength="30" placeholder="Email" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" maxlength="20" placeholder="Unique pour ce site..." required>
                    <label>Confirmer le mot de passe :</label>
                    <input type="password" name="confirm_password" maxlength="20" placeholder="Retapez le mot de passe..." required>
                </div>
                <div class="create_button">
                    <button type="submit" name="submit">S'inscrire</button>
                </div>
            </form>
            <?php
                if(isset($_POST['register']))
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirm = $_POST['confirmpassword'];
                    $email = $_POST['email'];
                    
                    $inscription = new register;
                    $inscription->setUsername($username);
                    $inscription->setEmail($email);
                    $inscription->setPassword($password);
                    $inscription->setConfirmpass($confirm);
                    // $inscription->setToken();
                    $inscription->register();
                    echo $inscription->status;
                }
                ?>
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