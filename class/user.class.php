<?php
class Userinfo
{
    private $id_user;
    private $username;
    private $email;
    private $password;
    private $user;
    private $pwdconfirm;
    private $pwdreplace;
    private $newsletter;
    private $token;
    public $status;
    
    public function __construct($username = null)
    {
        global $bdd;
        $select_info = $bdd->prepare("SELECT * FROM users WHERE id = :username");
        $select_info->bindParam(':username', $username);
        $select_info->execute();
        $result = $select_info->fetch();
        if($result['username'] != NULL)
        {
            $this->id_user = $username;
            $this->username = $result['username'];
            $this->password = $result['password'];
            $this->email = $result['email'];
            $this->newsletter = $result['newsletter'];
        }
    }

    function setUsername($username)
    {
        $this->username = $username;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setUser($user)
	{
		$this->user = $user;
	}
    function setPassword($password)
    {
        $this->password = $password;
    }
    function setPwdreplace($pwdreplace)
    {
        $this->pwdreplace = $pwdreplace;
    }
    function setConfirmpass($pwdconfirm)
    {
        if($pwdconfirm != "")
            $this->pwdconfirm = $pwdconfirm;
    }
    function setNewsletter($newsletter)
	{
		$this->newsletter = $newsletter;
    }
    function setToken()
	{
        $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        $_SESSION['token'] = $token;
	}

    function getUsername()
    {
        return $this->username;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getUser()
	{
		return $this->user;
	}
    function getPassword()
    {
        return $this->password;
    }
    function getPwdreplace()
    {
        return $this->pwdreplace;
    }
    function getConfirmpass()
    {
        return $this->pwdconfirm;
    }
    function getNewsletter()
    {
        return $this->newsletter;
    }

    function update()
    {
        global $bdd;
        if($this->username != NULL && $this->email != NULL)
        {
            $password = hash('whirlpool', 'terry la star'.$this->password);
            $update = $bdd->prepare("UPDATE users SET username = :username, email = :email WHERE id = :id_user AND password = :password");
            $update->bindParam(':username', $this->username);
            $update->bindParam(':password', $password);
            $update->bindParam(':email', $this->email);
            $update->bindParam(':id_user', $this->user);
            try {
                $update->execute();
                $count = $update->rowCount();
                if ($count > 0)
                {
                    $this->status = "ok";
                    $_SESSION['successa'] = "Informations mises à jour.";
                }
                else
                {
                    $_SESSION['account'] = "Mot de passe incorrect.";
                }
            }
            catch (PDOException $e) {
                if($e->getCode() == 23000)
                {
                    $_SESSION['account'] = "L'utilisateur existe déjà !";
                }
                else
                {
                    $_SESSION['account'] = "Une erreur est survenue.";
                }
            }
        }
        else
        {
            $_SESSION['account'] = "Champ(s) incomplet(s).";
        }
    }
    function updatepwd()
    {
        global $bdd;
       if($this->password != NULL && $this->pwdreplace != NULL && $this->pwdconfirm != NULL)
       {
           if($this->pwdreplace == $this->password)
           {
                $_SESSION['passwd'] = "Saisir un nouveau mot de passe.";
           }
           elseif($this->pwdreplace == $this->pwdconfirm)
           {
                if (preg_match("#.*^(?=.{8,50})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $this->pwdreplace))
                {
                    $password = hash('whirlpool', 'terry la star'.$this->password);
                    $pwdreplace = hash('whirlpool', 'terry la star'. $this->pwdreplace);
                    $update = $bdd->prepare("UPDATE users SET password = :newpwd WHERE id = :id_user AND password = :password");
                    $update->bindParam(':newpwd', $pwdreplace);
                    $update->bindParam(':password', $password);
                    $update->bindParam(':id_user', $this->user);
                    try {
                        $update->execute();
                        $_SESSION['successp'] = "Mot de passe mis à jour.";
                        $update->rowCount() ? $this->status = "ok" : $_SESSION['passwd'] = "Mot de passe incorrect.";
                    }
                    catch (PDOException $e) {
                        $_SESSION['passwd'] = "Une erreur est survenue.";
                   }
                }
                else
                    $_SESSION['passwd'] = "Votre mot de passe doit contenir au minimum 8 caractères, incluant caractère spécial, majuscule, chiffre..";
           }
           else
           {
               $_SESSION['passwd'] = "Les mots de passe ne correspondent pas.";
           }
        }
        else
        {
            $_SESSION['passwd'] = "Champ(s) incomplet(s).";
        }
    }

    function updatenews()
    {
        global $bdd;
        if($this->newsletter != NULL)
        {
            $update = $bdd->prepare("UPDATE users SET newsletter = :newsletter WHERE id = :id_user");
            $update->bindParam(':newsletter', $this->newsletter);
            $update->bindParam(':id_user', $this->user);
            $update->execute();
            $count = $update->rowCount();
            if ($count > 0)
            {
                $this->status = "ok";
                $_SESSION['newsupdate'] = "Informations mises à jour.";
            }
        }
        else
        {
            $_SESSION['account'] = "Champ(s) incomplet(s).";
        }
    }

}
?>