<?php
require_once('config/config.php');
require_once('class/register.class.php');
require_once('class/connect.class.php');
require_once('class/article.class.php');
require_once('class/user.class.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');


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
    $inscription->setToken();
    $inscription->setMessage();
    $inscription->setSubject();
    $inscription->setEntete();
    // $inscription->setToken();
    $inscription->register();
    header('location: registration.php');
}
elseif(isset($_POST['login']))
{
    $connexion = new Connect;
    if($_POST['username'] != NULL && $_POST['password'] != NULL)
    {
        $connexion->setUsername($_POST['username']);
        $connexion->setPassword($_POST['password']);
        $connexion->connect();
        header('location: index.php');
    }
}
elseif(isset($_POST['create_article']))
{
    $description = $_POST['description'];
    $user = $_SESSION['user'];
    $test_img = $_FILES['image_article'];
    $data_img = $_POST['image_cam'];

    // list($type, $data_img) = explode(';', $data_img);
    // list(, $data_img) = explode(',', $data_img);
    // $data_img = base64_decode($data_img);
    // $newname = dirname(__FILE__).'/assets/images/'.$filename;
    // file_put_contents($newname, $data_img);

    var_dump($data_img);

    if (preg_match('/^data:image\/(\w+);base64,/', $data_img, $type)) {
        $data_img = substr($data_img, strpos($data_img, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, gif
    
        if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
            throw new \Exception('invalid image type');
        }
    
        $data_img = base64_decode($data_img);
    
        if ($data_img === false) {
            throw new \Exception('base64_decode failed');
        }
    } else {
        throw new \Exception('did not match data URI with image data');
    }
    $filename = md5(uniqid(rand('9999999','999999999999999'), true)).".{$type}";
    $newfile = dirname(__FILE__).'/assets/images/'.$filename;
    file_put_contents($newfile, $data_img);

    var_dump($filename);


    $article = new Article;
    $article->setImage($filename);
    // $extension = array('jpg','jpeg','png', 'JPG', 'PNG', 'JPEG');
    // if((!empty($_FILES["image_article"])) && ($_FILES['image_article']['error'] == 0))
    // {
    //     $filename = basename($_FILES['image_article']['name']);
    //     $checkbackdoor = explode(".", $filename);
    //     if(count($checkbackdoor) - 1 > 1)
    //     {
    //         echo "Problem dans le fichier";
    //     }
    //     else
    //     {
    //         $ext = substr($filename, strrpos($filename, '.') + 1);
    //         if (in_array($ext, $extension) && ($_FILES["image_article"]["type"] == "image/jpeg") && ($_FILES["image_article"]["size"] < 350000))
    //         {
    //             $newname = dirname(__FILE__).'/assets/images/'.$filename;
    //             if (!file_exists($newname))
    //             {
    //                 if ((move_uploaded_file($_FILES['image_article']['tmp_name'],$newname)))
    //                 {
    //                     $article->setImage($filename);
    //                     echo "Photo bien modifiée.";
    //                 }
    //                 else
    //                 {
    //                     echo "Impossible d'upload le fichier.";
    //                 }
    //             }
    //             else
    //             {
    //   // existe deja
    //                 $article->setImage($filename);
    //                 echo "Photo de profil bien modifié.";
    //             }
    //         }
    //         else
    //         {
    //             echo "Fichier pas au bon format.";
    //         }
    //     }
    // }
    // else
    // {
    //     echo "Error: No file uploaded.";
    // }
    $article->setDescription($description);
    $article->setUser($user);
    $article->article();
    // if($article->status == "ok")
    //     header('location: create_article.php');
    // else
    // {
    //     echo $article->status;
    //     echo "NON";
    // }
}
elseif(isset($_POST['insert_comment']))
{
    $content = $_POST['commentary_content'];
    $user = $_SESSION['user'];
    $article_id = $_POST['article_id'];
    $commentary = new Article;
    $commentary->setUser($user);
    $commentary->setContent($content);
    $commentary->setPublication($article_id);
    $commentary->setMessage();
    $commentary->setSubject();
    $commentary->setEntete();
    $commentary->addCommentary();
    // if($commentary->status == "ok")
    //     header('location: index.php');
    // else
    // {
    //     echo $commentary->status;
    //     echo "Bah non";
    // }
}
elseif(isset($_POST['account_update']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $confirm_password = $_POST['confirm_password'];
    $user = $_SESSION['user'];
    echo $confirm_password;
    $update = new Userinfo;
    $update->setUsername($username);
    $update->setEmail($email);
    $update->setPassword($confirm_password);
    $update->setUser($user);
    $update->update();
    header('location: account.php');
}
elseif(isset($_POST['password_update']))
{
    $old_pwd = $_POST['old_password'];
    $new_pwd = $_POST['new_password'];
    $confirm_new = $_POST['confirm_new'];
    $user = $_SESSION['user'];
    echo $user;
    $updatepwd = new Userinfo;
    $updatepwd->setPassword($old_pwd);
    $updatepwd->setPwdreplace($new_pwd);
    $updatepwd->setConfirmpass($confirm_new);
    $updatepwd->setUser($user);
    $updatepwd->updatepwd();
    header('location: account.php');
}
elseif(isset($_POST['opinion']))
{
    $user = $_SESSION['user'];
    $article_id = $_POST['article_id'];
    $commentary = new Article;
    $commentary->setUser($user);
    $commentary->setPublication($article_id);
    $commentary->addLike();
    header('location: index.php');
}
elseif(isset($_POST['newsletter_update']))
{
    $newsletter = $_POST['newsletter'];
    $user = $_SESSION['user'];
    $commentary = new Userinfo;
    $commentary->setUser($user);
    $commentary->setNewsletter($newsletter);
    $commentary->updatenews();
    header('location: account.php');
}
?>