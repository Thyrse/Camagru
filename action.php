<?php
require_once('config/connect.php');
require_once('class/register.class.php');
require_once('class/connect.class.php');
require_once('class/article.class.php');
require_once('class/user.class.php');

if(isset($_POST['create_account']))
{
    if($_SESSION['token'] == $_POST['form_token'])
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['password_confirm'];
        $email = $_POST['email'];
        $message = "Bonjour, Veuillez cliquer sur le lien suivant pour activer votre compte et accéder au site :\n http://localhost:8100/activation.php?token=";
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
        $inscription->createUser();
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
        $connexion->logUser();
        header('location: index.php');
    }
}
elseif(isset($_POST['create_article']))
{
    if($_SESSION['token'] == $_POST['form_token'])
    {
        $description = $_POST['description'];
        $user = $_SESSION['user'];

        function make_montage($filename, $newfile, $ext)
        {
            $mtg_img = $_POST['montage_select'];
            if ($mtg_img == "cat")
            {
                $selected_file = "assets/montage/cat.png";
                $img_x = 100;
                $img_y = 150;
                $pos_x = 435;
                $pos_y = 250;
            }
            elseif ($mtg_img == "snow")
            {
                $selected_file = "assets/montage/snow.png";
                $img_x = 550;
                $img_y = 450;
                $pos_x = 0;
                $pos_y = 0;
            }
            elseif ($mtg_img == "sword")
            {
                $selected_file = "assets/montage/sword.png";
                $img_x = 155;
                $img_y = 260;
                $pos_x = 30;
                $pos_y = 50;
            }
            elseif ($mtg_img == "halo")
            {
                $selected_file = "assets/montage/halo.png";
                $img_x = 130;
                $img_y = 45;
                $pos_x = 200;
                $pos_y = 5;
            }

            $copy = imagecreatetruecolor(550, 450);

            imagealphablending($copy, false);
            imagesavealpha($copy, true);
            $source = imagecreatefrompng($selected_file);

            imagecopyresized($copy, $source, 0, 0, 0, 0, $img_x, $img_y, $img_x, $img_y);

            switch ($ext) {
                case "png":
                    $destination = imagecreatefrompng('assets/images/'.$filename);
                    break;
                case "PNG":
                    $destination = imagecreatefrompng('assets/images/'.$filename);
                    break;
                case "jpeg":
                    $destination = imagecreatefromjpeg('assets/images/'.$filename);
                    break;
                case "jpg":
                    $destination = imagecreatefromjpeg('assets/images/'.$filename);
                    break;      
                case "gif":
                    $destination = imagecreatefromgif('assets/images/'.$filename);
                    break;
                }


            function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
                $cut = imagecreatetruecolor($src_w, $src_h);
                imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
                imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
                imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
            }

            imagecopymerge_alpha($destination, $copy, $pos_x, $pos_y, 0, 0, $img_x, $img_y, 100);

            $success = imagepng($destination, $newfile);
        }
        if(isset($_POST['image_cam']))
        {
            $data_img = $_POST['image_cam'];
            if (preg_match('/^data:image\/(\w+);base64,/', $data_img, $type)) {
                $data_img = substr($data_img, strpos($data_img, ',') + 1);
                $type = strtolower($type[1]); // jpg, png
            
                if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                    $_SESSION['error_upload'] = "Seule une image au format jpg, jpeg ou png est attendue.";
                    header('location: create_article.php');
                    return;
                }
            
                $data_img = base64_decode($data_img);
            
                if ($data_img === false) {
                    $_SESSION['error_upload'] = "Une erreur est survenue, veuillez réessayer.";
                    header('location: create_article.php');
                    return;
                }
            } else {
                $_SESSION['error_upload'] = "Veuillez prendre une photo.";
                header('location: create_article.php');
                return;
            }
            $filename = md5(uniqid(rand('9999999','999999999999999'), true)).".{$type}";
            $newfile = dirname(__FILE__).'/assets/images/'.$filename;
            file_put_contents($newfile, $data_img);

            make_montage($filename, $newfile, "png");
        }
        elseif(isset($_FILES['image_article']))
        {
            $extensions = array('jpg','jpeg','png','JPG','PNG','JPEG');
            if((!empty($_FILES["image_article"])) && ($_FILES['image_article']['error'] == 0))
            {
                $uploaded = basename($_FILES['image_article']['name']);
                $ext = substr($uploaded, strrpos($uploaded, '.') + 1);
                $filename = md5(uniqid(rand('9999999','999999999999999'), true)).".{$ext}";
                $checkbackdoor = explode(".", $filename);
                if(count($checkbackdoor) - 1 > 1)
                {
                    $_SESSION['error_upload'] = "Fichier incorrect, veuillez réessayer.";
                    header('location: create_article.php');
                    return;
                }
                else
                {
                    if (in_array($ext, $extensions))
                    {
                        $newname = dirname(__FILE__).'/assets/images/'.$filename;
                        if (!file_exists($newname))
                        {
                            if ((move_uploaded_file($_FILES['image_article']['tmp_name'],$newname)))
                            {
                                echo "Photo ajoutée.";
                            }
                            else
                            {
                                echo "Impossible d'upload le fichier.";
                            }
                        }
                        else
                        {
                            echo "Photo ajoutée.";
                        }
                    }
                    else
                    {
                        echo "Le fichier n'est pas au bon format.";
                        $_SESSION['error_upload'] = "Seule une image au format jpg, jpeg ou png est attendue.";
                        header('location: create_article.php');
                        return;
                    }
                }
            }
            else
            {
                echo "Error: No file uploaded";
            }
            if (isset($_POST['montage_select']))
            {
                make_montage($filename, $newname, $ext);
            }
        }
        $article = new Article;
        $article->setImage($filename);
        $article->setDescription($description);
        $article->setUser($user);
        $article->createArticle();
        header('location: index.php');
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
        header('location: ' . $_SERVER['HTTP_REFERER']);
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
    $like = new Article;
    $like->setUser($user);
    $like->setPublication($article_id);
    $like->addLike();
    header('location: ' . $_SERVER['HTTP_REFERER']);
}
elseif(isset($_POST['newsletter_update']))
{
    if($_SESSION['token'] == $_POST['form_token'])
    {
        $newsletter = $_POST['newsletter'];
        $user = $_SESSION['user'];
        $newsupdate = new Userinfo;
        $newsupdate->setUser($user);
        $newsupdate->setNewsletter($newsletter);
        $newsupdate->updatenews();
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
        header('location: ' . $_SERVER['HTTP_REFERER']);
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
        $message = "Bonjour, vous pouvez réinitialiser votre mot de passe à l'aide du lien suivant :\n http://localhost:8100/registration.php?action=reset_password&token=";
        $subject = "Réinitialisation de mot de passe";

        $catchmail = new Register;
        $catchmail->setUsername($username);
        $catchmail->setToken();
        $catchmail->setMessage($message);
        $catchmail->setSubject($subject);
        $catchmail->setEntete();
        $catchmail->sendmail();
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        header('location: account.php');
    }
}
else
    header('location: index.php');
?>