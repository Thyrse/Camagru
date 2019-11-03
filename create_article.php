<?php
require_once('config/config.php');
require_once('class/user.class.php');
if(isset($_SESSION['user']))
    $user = new Userinfo($_SESSION['user']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Creer un produit</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="script.js"></script>
</head>

<body>
    <header>
       <?php include("inc/header.php"); ?>
    </header>
    <div id="main">
        <div class="create">
            <h3>Ajouter une photo</h3>
            <form name="submit" method="post" action="action.php" enctype="multipart/form-data">
                <div class="create_form">
                    <label for="description">Légende : </label>
                    <textarea name="description" rows="8" cols="21" placeholder="Description..." required></textarea>
                    <label for="image">Image :</label>
                    <textarea name="image" rows="8" cols="21" placeholder="Description..." required></textarea>
                    <!-- <input type="file" name="image" required> -->
                </div>
                <div class="create_button">
                    <button type="submit" name="create_article" value="">Publier la photo</button>
                </div>
            </form>


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