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
    if($_SESSION['token'] == $_POST['form_token'])
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['password_confirm'];
        $email = $_POST['email'];
        $message = "Bonjour, voici un nouveau mail ! http://localhost:8100/activation.php?token=";
        $subject = "Activation de votre compte";

        $inscription = new Register;
        $inscription->setUsername($username);
        $inscription->setEmail($email);
        $inscription->setPassword($password);
        $inscription->setConfirmpass($confirm);
        $inscription->setToken();
        $inscription->setMessage($message);
        $inscription->setSubject($subject);
        $inscription->setEntete();
        $inscription->register();
        header('location: registration.php');
    }
    else
    {
        header('location: index.php');
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
        header('location: index.php');
    }
}
elseif(isset($_POST['create_article']))
{
    if($_SESSION['token'] == $_POST['form_token'])
    {
        $description = $_POST['description'];
        $user = $_SESSION['user'];
        // $test_img = $_FILES['image_article'];
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




        $copy = imagecreatetruecolor(450, 450);

        imagealphablending($copy, false);
        imagesavealpha($copy, true );
        $source = imagecreatefrompng('assets/montage/cat.png');

        imagecopyresized($copy, $source, 0, 0, 0, 0, 100, 150, 100, 150);
        
        $destination = imagecreatefrompng('assets/images/'.$filename);


        // $largeur_source = imagesx($source);
        // $hauteur_source = imagesy($source);
        // $largeur_destination = imagesx($destination);
        // $hauteur_destination = imagesy($destination);
        // var_dump("largeur source : ".$largeur_source." hauteur source : ". $largeur_source);
        // var_dump("largeur dest : ".$largeur_destination." hauteur dest : ". $hauteur_destination);

        $destination_x = 0;
        $destination_y = 0;

        function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
            // creating a cut resource
            $cut = imagecreatetruecolor($src_w, $src_h);
            // copying relevant section from background to the cut resource
            imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
            // copying relevant section from watermark to the cut resource
            imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
            // insert cut resource to destination image
            imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
        }

        imagecopymerge_alpha($destination, $copy, 270, 180, 0, 0, 100, 150, 100);

        $success = imagepng($destination, "assets/montage/montage.png");

        $article = new Article;
        $article->setImage("montage.png");
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
    else
    {
        header('location: index.php');
    }
}
elseif(isset($_POST['insert_comment']))
{
    if($_SESSION['token'] == $_POST['comment_token'])
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
        if($commentary->status == "ok")
            header('location: index.php');
        else
        {
            echo $commentary->status;
            echo "Bah non";
        }
    }
    else
    {
        header('location: index.php');
    }
}
elseif(isset($_POST['account_update']))
{
    if($_SESSION['token'] == $_POST['form_token'])
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
    else
    {
        header('location: index.php');
    }
}
elseif(isset($_POST['password_update']))
{
    if($_SESSION['token'] == $_POST['form_token'])
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
    else
    {
        header('location: index.php');
    }
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
    if($_SESSION['token'] == $_POST['form_token'])
    {
        $newsletter = $_POST['newsletter'];
        $user = $_SESSION['user'];
        $commentary = new Userinfo;
        $commentary->setUser($user);
        $commentary->setNewsletter($newsletter);
        $commentary->updatenews();
        header('location: account.php');
    }
    else
    {
        header('location: account.php');
    }
}
elseif(isset($_POST['reset_pwd']))
{
    if($_SESSION['token'] == $_POST['form_token'])
    {
        $password = $_POST['password'];
        $new_pwd = $_POST['password_confirm'];
        $token = $_POST['token'];
        $id = $_POST['id_user'];
        $updatepwd = new Register;
        $updatepwd->setPassword($password);
        $updatepwd->setConfirmpass($new_pwd);
        $updatepwd->resetpwd($token, $id);
        header('location: registration.php');
    }
    else
    {
        header('location: account.php');
    }
}
elseif(isset($_POST['reset_username']))
{
    if($_SESSION['token'] == $_POST['form_token'])
    {
        $username = $_POST['username'];
        $message = "Bonjour, vous pouvez réinitialiser votre mot de passer à l'aide du lien suivant : http://localhost:8100/registration.php?action=reset_password&token=";
        $subject = "Réinitialisation de mot de passe";

        $catchmail = new Register;
        $catchmail->setUsername($username);
        $catchmail->setToken();
        $catchmail->setMessage($message);
        $catchmail->setSubject($subject);
        $catchmail->setEntete();
        $catchmail->sendmail();
        header('location: registration.php');
    }
    else
    {
        header('location: account.php');
    }
}
?>