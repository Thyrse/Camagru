<?php
require_once('config/config.php');
require_once('class/user.class.php');
if(isset($_SESSION['user']))
    $user = new Userinfo($_SESSION['user']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="assets/images/" rel="shortcut icon" />
    <link rel="icon" type="image/png" href="assets/images/logo.png" />
    <script type="text/javascript" src="script.js"></script>
    <title>Instagru</title>
</head>

<body>
    <header>
       <?php include("inc/header.php"); ?>
    </header>
    <div id="main">
        <div class="items-block">
            <div class="items-list">
                <div class="item_empty">
                    <p>Rien à afficher, revenez plus tard...</p>
                </div>
                <div class="item">
                    <div class="item_image">
                        <img src="assets/images/illu.jpg">
                        <form name="submit" method="post" action="" enctype="multipart/form-data">
                            <button class="item_like"></button>
                        </form>
                    </div>
                    <div class="item_desc">
                        <div class="item_author">
                            <span><em><b>Ziphlot</b></em></span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat dignissimos odio praesentium magnam debitis, assumenda dicta cupiditate quo explicabo possimus accusamus eligendi iste consectetur, necessitatibus totam, voluptatem
                                quidem ea illo!</p>
                        </div>
                        <div class="item_scroll">
                            <div class="item_commentary">
                                <span>Thyrse</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto reiciendis ab molestias sed et minus dolore fugit veniam asperiores aperiam nisi eveniet quia provident voluptate soluta tempora, esse quos nobis!</p>
                            </div>
                            <div class="item_commentary">
                                <span>Thyrse</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto reiciendis ab molestias sed et minus dolore fugit veniam asperiores aperiam nisi eveniet quia provident voluptate soluta tempora, esse quos nobis!</p>
                            </div>
                            <div class="item_commentary">
                                <span>Thyrse</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto reiciendis ab molestias sed et minus dolore fugit veniam asperiores aperiam nisi eveniet quia provident voluptate soluta tempora, esse quos nobis!</p>
                            </div>
                            <div class="item_commentary">
                                <span>Thyrse</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto reiciendis ab molestias sed et minus dolore fugit veniam asperiores aperiam nisi eveniet quia provident voluptate soluta tempora, esse quos nobis!</p>
                            </div>
                            <div class="item_commentary">
                                <span>Thyrse</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto reiciendis ab molestias sed et minus dolore fugit veniam asperiores aperiam nisi eveniet quia provident voluptate soluta tempora, esse quos nobis!</p>
                            </div>
                            <div class="item_commentary">
                                <span>Thyrse</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto reiciendis ab molestias sed et minus dolore fugit veniam asperiores aperiam nisi eveniet quia provident voluptate soluta tempora, esse quos nobis!</p>
                            </div>
                        </div>
                        <div class="item_area">
                            <form name="submit" method="post" action="" enctype="multipart/form-data">
                                <textarea name="desc" rows="8" cols="21" placeholder="Votre commentaire..." required></textarea>
                                <button type="submit">Publier</button>
                            </form>
                        </div>
                    </div>
                </div>
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