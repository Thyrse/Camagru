<?php
class Connect
{
    private $username;
    private $password;
    
    function setUsername($username)
    {
        $this->username = $username;
    }
    
    function setPassword($password)
    {
        $this->password = $password;
    }

    function logUser()
    {
        global $bdd;
        
        if($this->username != NULL && $this->password != NULL)
        {
            $password = hash('whirlpool', 'terry la star'.$this->password);
            $select = $bdd->prepare("SELECT id,username,valid FROM users WHERE username = :username AND password = :password");
            $select->bindParam(':username', $this->username);
            $select->bindParam(':password', $password);
            $select->execute();
            $result = $select->fetch();
            if ($result['username'] != NULL && $result['valid'] != 1)
            {
                $_SESSION['error'] = "Veuillez activer votre compte.";
            }
            elseif($result['username'] != NULL && $result['valid'] == 1)
            {
                $_SESSION['user'] = $result['id'];
            }
            else
                $_SESSION['error'] = "Utilisateur ou mot de passe incorrect.";
        }
        else
            $_SESSION['error'] = "Veillez à remplir tous les champs.";
    }
}