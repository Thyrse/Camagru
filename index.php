<?php
require_once('config/config.php');
require_once('class/user.class.php');
require_once('class/article.class.php');
if(isset($_SESSION['user']))
    $user = new Userinfo($_SESSION['user']);

$articles = new Article();
$results = $articles->getTimeLine();
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
                <?php foreach($results as $row) { 
                    $comments = $articles->getCommentary($row['id']);
                    $likes = $articles->getLike($row['id']);
                    if(isset($_SESSION['user'])) {
                    $liked = $articles->getLiked($row['id'], $_SESSION['user']);}?>                               
                    <div class="item">
                    <div class="item_image">
                        <img src="assets/images/<?= $row['image'] ?>">
                        <span class="item_nblike"><?= $likes ?></span>
                    <?php if(isset($liked)) : ?>
                        <?php if($liked['id_user']) : ?>
                            <form name="opinion" method="post" action="action.php" enctype="multipart/form-data">
                                <input type="hidden" name="article_id" value="<?= $row['id'] ?>"/>
                                <button type="submit" class="item_like item_liked" name="opinion"></button>
                            </form>
                        <?php elseif(!$liked['id_user']) : ?>
                            <form name="opinion" method="post" action="action.php" enctype="multipart/form-data">
                                <input type="hidden" name="article_id" value="<?= $row['id'] ?>"/>
                                <button type="submit" class="item_like" name="opinion"></button>
                            </form>
                        <?php endif ?>
                    <?php endif ?>
                    </div>
                    <div class="item_desc">
                        <div class="item_author">
                            <span><em><b><?= $row['username'] ?></b></em></span>
                            <p><?=$row['description']?></p>
                        </div>
                        <div class="item_scroll">
                        <?php foreach($comments as $com) { ?>
                            <div class="item_commentary">
                                <span><?= $com['username'] ?></span>
                                <p><?= $com['content'] ?></p>
                            </div>
                        <?php  } ?>
                        </div>
                        <div class="item_area">
                            <form name="submit" method="post" action="action.php">
                                <textarea name="commentary_content" rows="8" cols="21" placeholder="Votre commentaire..." required></textarea>
                                <input type="hidden" name="article_id" value="<?= $row['id'] ?>"/>
                                <button type="submit" name="insert_comment">Publier</button>
                            </form>
                        </div>
                    </div>
                </div>
           <?php  } ?>
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