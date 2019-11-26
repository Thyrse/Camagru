<?php
require_once('config/config.php');
require_once('class/user.class.php');
require_once('class/article.class.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');
if(isset($_SESSION['user'])) {
    $user = new Userinfo($_SESSION['user']);
    $user->setToken();
    $token = $_SESSION['token'];
}
if (!isset($_GET['page'])) {
    $page = 1;
}
elseif($_GET['page'] == 0)
{
    $page = 1;
    header('location: index.php');
}
else {
    $page = (int)$_GET['page'];
}
$articles = new Article();
$results = $articles->getTimeLine($page);
$total_pages = $articles->getPages();
if (isset($_GET['page']) && (int)$_GET['page'] > $total_pages)
{
    header('location: index.php');
}

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
    <div id="main" class="index_nav">
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
                            <?php if(isset($_SESSION['user']) && $_SESSION['user'] == $row['id_user']) : ?>
                                <a class="item_delete" href="?delete_article=1&id=<?= $row['id'];?>"></a>
                            <?php endif ?>
                            <span><em><b><?= $row['username'] ?></b></em></span>
                            <p><?=$row['description']?></p>
                        </div>
                        <div class="item_scroll">
                        <?php foreach($comments as $com) { ?>
                            <div class="item_commentary">
                                <?php if(isset($_SESSION['user']) && $_SESSION['user'] == $com['id_user']) : ?>
                                    <a class="commentary_delete" href="?delete_comment=1&id=<?= $com['id'];?>"></a>
                                <?php endif ?>
                                <span><?= $com['username'] ?></span>
                                <p><?= $com['content'] ?></p>
                            </div>
                        <?php  } ?>
                        </div>
                        <div class="item_area">
                        <?php if(isset($_SESSION['user'])) : ?>
                            <form name="submit" method="post" action="action.php">
                                <textarea name="commentary_content" rows="8" cols="21" placeholder="Votre commentaire..." required></textarea>
                                <input type="hidden" name="article_id" value="<?= $row['id'] ?>"/>
                                <input type="hidden" name="comment_token" value="<?= $token ?>"/>
                                <button type="submit" name="insert_comment">Publier</button>
                            </form>
                        <?php endif ?>
                        </div>
                    </div>
                </div>
           <?php  } ?>
            </div>
            <div class="nav_options">
                <?php if(isset($_GET['page']) && $_GET['page'] >= 2) : ?>
                <a class="change_page" href="?page=<?= $_GET['page'] - 1?>"><img src="assets/images/arrow_left.svg" />Page précédente</a>
                <?php endif ?>
                <?php if(isset($_GET['page']) && (int)$_GET['page'] < $total_pages) : ?>
                <a class="change_page" href="?page=<?= $_GET['page'] + 1 ?>">Page suivante<img src="assets/images/arrow_right.svg" /></a>
                <?php elseif(!isset($_GET['page']) && $total_pages > 1) : ?>
                <a class="change_page" href="?page=2">Page suivante<img src="assets/images/arrow_right.svg" /></a>
                <?php endif ?>
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