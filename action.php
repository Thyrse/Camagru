<?php
require_once('config/config.php');
require_once('class/register.class.php');
require_once('class/connect.class.php');
require_once('class/article.class.php');

if(isset($_POST['create_account']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['password_confirm'];
    $email = $_POST['email'];

    $inscription = new Register;
    $inscription->setUsername($username);
    $inscription->setEmail($email);
    $inscription->setPassword($password);
    $inscription->setConfirmpass($confirm);
    // $inscription->setToken();
    $inscription->register();
    if($inscription->status == "ok")
        header('location: index.php');
    else
    {
        echo $inscription->status;
        echo "NON";
    }
}
elseif(isset($_POST['login']))
{
    $connexion = new Connect;
    if($_POST['username'] != NULL && $_POST['password'] != NULL)
    {
        $connexion->setUsername($_POST['username']);
        $connexion->setPassword($_POST['password']);
        $connexion->connect();
        if($connexion->status == "ok")
            header('location: create_article.php');
        else
        {
            echo $_POST['username'];
            echo $_POST['password'];
            echo $connexion->status;
            echo "Bah non";
        }
    }
}

elseif(isset($_POST['create_article']))
{
    $image = $_POST['image'];
    $description = $_POST['description'];

    $article = new Article;
    $article->setUsername($image);
    $article->setEmail($description);
    $article->article();
    if($article->status == "ok")
        header('location: index.php');
    else
    {
        echo $article->status;
        echo "NON";
    }
}

?>