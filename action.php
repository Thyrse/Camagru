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
    $description = $_POST['description'];
    $user = $_SESSION['user'];
    $test_img = $_FILES['image_article'];
    var_dump($_FILES['image_article']);
    $article = new Article;
    $extension = array('jpg','jpeg','png', 'JPG', 'PNG', 'JPEG');
    if((!empty($_FILES["image_article"])) && ($_FILES['image_article']['error'] == 0))
    {
        $filename = basename($_FILES['image_article']['name']);
        $checkbackdoor = explode(".", $filename);
        if(count($checkbackdoor) - 1 > 1)
        {
            echo "Problem dans le fichier";
        }
        else
        {
            $ext = substr($filename, strrpos($filename, '.') + 1);
            if (in_array($ext, $extension) && ($_FILES["image_article"]["type"] == "image/jpeg") && ($_FILES["image_article"]["size"] < 350000))
            {
                $newname = dirname(__FILE__).'/assets/images/'.$filename;
                if (!file_exists($newname))
                {
                    if ((move_uploaded_file($_FILES['image_article']['tmp_name'],$newname)))
                    {
                        $article->setImage($filename);
                        echo "Photo de profil bien modifié";
                    }
                    else
                    {
                        echo "Impossible d'upload le fichier .";
                    }
                }
                else
                {
      // existe deja
                    $article->setImage($filename);
                    echo "Photo de profil bien modifié";
                }
            }
            else
            {
                echo "Fichier pas au bon format";
            }
        }
    }
    else
    {
        echo "Error: No file uploaded";
    }
    $article->setDescription($description);
    $article->setUser($user);
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