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
                $password = hash('whirlpool', 'terry la star'.$this->password);
                $pwdreplace = hash('whirlpool', 'terry la star'. $this->pwdreplace);
                $update = $bdd->prepare("UPDATE users SET password = :newpwd WHERE id = :id_user AND password = :password");
                $update->bindParam(':newpwd', $pwdreplace);
                $update->bindParam(':password', $password);
                $update->bindParam(':id_user', $this->user);
                try {
                    $update->execute();
                    $_SESSION['successp'] = "Mot de passe mis à jour.";
                    $update->rowCount() ? $this->status = "ok" : $_SESSION['passwd'] = "Une erreur est survenue.";
                }
                catch (PDOException $e) {
                    $_SESSION['passwd'] = "Une erreur est survenue.";
               }
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

}
?>