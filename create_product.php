<!DOCTYPE html>
<html>

<head>
    <title>Creer un produit</title>
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
        <div class="create">
            <h3>Ajouter une photo</h3>
            <form name="submit" method="post" action="" enctype="multipart/form-data">
                <div class="create_form">
                    <label for="desc">Légende : </label>
                    <textarea name="desc" rows="8" cols="21" placeholder="Description..." required></textarea>
                    <label for="image">Image :</label>
                    <input type="file" name="image" required>
                </div>
                <div class="create_button">
                    <button type="submit" name="submit">Publier la photo</button>
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