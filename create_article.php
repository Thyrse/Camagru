<?php
require_once('config/config.php');
require_once('class/user.class.php');
if(isset($_SESSION['user']))
{
    $user = new Userinfo($_SESSION['user']);
    $user->setToken();
    $token = $_SESSION['token'];
}
else
{
    header('location: registration.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ajouter une photo</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="yolo.js"></script>
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
                    <div class="picture_form">
                        <div class="img_montage"><label for="cat">Chat<img src="assets/montage/cat.png" alt="cat"/></label><input type="radio" id="cat" name="montage_select" value="cat">
                        </div>
                        <div class="img_montage"><label for="snow">Neige<img src="assets/montage/snow.png" alt="snow"/></label><input type="radio" id="snow" name="montage_select" value="snow">
                        </div>
                        <div class="img_montage"><label for="sword">Épée<img src="assets/montage/sword.png" alt="sword"/></label><input type="radio" id="sword" name="montage_select" value="sword">
                        </div>
                        <div class="img_montage"><label for="halo">Auréole<img class="montage_halo" src="assets/montage/halo.png" alt="halo"/></label><input type="radio" id="halo" name="montage_select" value="halo">
                        </div>
                    </div>
                    <label for="description">Légende : </label>
                    <textarea name="description" rows="8" cols="21" placeholder="Description..." required></textarea>
                    <label for="image">Image :</label>
                    <input type="file" id="manual_img" hidden>
                    <input id="img_web" type="text" value="" hidden>
                    <input type="hidden" name="form_token" value="<?= $token ?>"/>
                </div>
                <div class="create_button">
                    <button type="submit" name="create_article" value="">Publier la photo</button>
                </div>
            </form>
            <div class="take_picture">
                <video id="video"></video>
                <div>
                    <button id="startbutton">Prendre une photo</button>
                </div>
                <canvas id="canvas"></canvas>
                <img src="" id="photo" alt="photo">
            </div>
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