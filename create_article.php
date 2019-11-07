<?php
require_once('config/config.php');
require_once('class/user.class.php');
if(isset($_SESSION['user']))
{
    $user = new Userinfo($_SESSION['user']);
}
else
{
    header('location: registration.php');
}
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
                    <input type="file" name="image_article" required>
                </div>
                <div class="create_button">
                    <button type="submit" name="create_article" value="">Publier la photo</button>
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