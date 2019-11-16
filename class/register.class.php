<?php
class Register
{
    private $username;
    private $email;
    private $password;
    private $confirmation_password;
    private $message;
    private $subject;
    private $entete;
    private $token;
    
    
    function setUsername($username)
    {
        if($username != "")
            $this->username = $username;
    }
    function setEmail($email)
    {
        if($email != "")
            $this->email = $email;
    }
    function setPassword($password)
    {
        if($password != "")
            $this->password = $password;
    }
    function setConfirmpass($confirm)
    {
        if($confirm != "")
            $this->confirmation_password = $confirm;
    }

    function setToken()
    {
        $token = md5(uniqid(rand('9999999','999999999999999'), true));
        $this->token = $token;
    }
    function setMessage()
    {
        $message = "Bonjour, voici un nouveau mail ! http://localhost:8100/activation.php?token=".$this->token;
        $this->message = $message;
    }
    function setSubject()
    {
        $this->subject = "Activation de votre compte";
    }
    function setEntete()
    {
        $this->entete = "Content-type: text/html; charset=utf-8";
    }

    function getToken($token)
    {
        return $this->token;
    }
    function register()
    {
        global $bdd;
        if($this->username != NULL && $this->email != NULL && $this->password != NULL && $this->confirmation_password != NULL)
        {
            if($this->password == $this->confirmation_password)
            {
                $select_users = $bdd->prepare("SELECT username,email FROM users WHERE username = :username OR email = :email");
                $select_users->bindParam(':username', $this->username);
                $select_users->bindParam(':email', $this->email);
                $select_users->execute();
                $result = $select_users->fetch();
                if($result['username'] == NULL)
                {
                    // $data = date("y-m-d");
                    $password = hash('whirlpool', 'terry la star'. $this->password);
                    $insert = $bdd->prepare("INSERT INTO users(username,password,email,token) VALUES(:username, :password, :email, :token)");
                    $insert->bindParam(':username', $this->username);
                    $insert->bindParam(':password', $password);
                    $insert->bindParam(':email', $this->email);
                    $insert->bindParam(':token', $this->token);
                    // $insert->bindParam(':creation_date', $data);
                    $insert->execute();
                    mail($this->email, $this->subject, $this->message, $this->entete);
                    $_SESSION['success'] = "Utilisateur créé.";
                }
                else
                    $_SESSION['error_reg'] = "Pseudo déjà pris.";
            }
            else
                $_SESSION['error_reg'] = "Les mots de passe ne correspondent pas !";
        }
        // else
        //     $_SESSION['error_reg'] = "Une erreur est survenue.";
    }
    function activate($token)
    {
        global $bdd;
        $tokenrequest = $bdd->prepare("SELECT `email` FROM `users` WHERE `token` = :token");
	    $tokenrequest->bindParam(':token', $token, PDO::PARAM_STR);
	    $tokenrequest->execute();
        $tokenactiv = $tokenrequest->fetch();
        
        $email = $tokenactiv[0];
        $activaccount = $bdd->prepare("UPDATE `users` SET `valid` = 1 WHERE `email` = :email AND `token` = :token");
        $activaccount->bindParam(':email', $email, PDO::PARAM_STR);
        $activaccount->bindParam(':token', $token, PDO::PARAM_STR);
	    $activaccount->execute();
        
	    $isvalid = $bdd->prepare("SELECT `valid` FROM `users` WHERE `email` = :email AND `token` = :token");
        $isvalid->bindParam(':email', $email, PDO::PARAM_STR);
        $isvalid->bindParam(':token', $token, PDO::PARAM_STR);
	    $isvalid->execute();
	    $activup = $isvalid->fetch();
        $tokenid = $activup[0];
        var_dump($tokenid);

        if($tokenid === '1')
        {
            $_SESSION['activ'] = "Votre compte est activé, vous pouvez maintenant accéder aux sites";
        }
        else
        {
            $_SESSION['activ'] = "Une erreur s'est produite, réessayez ultiérieurement.";
        }
    }
}