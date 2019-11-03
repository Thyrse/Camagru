<?php
class Connect
{
    private $username;
    private $password;
    public $status;
    
    function setUsername($username)
    {
        $this->username = $username;
    }
    
    function setPassword($password)
    {
        $this->password = $password;
    }

    function connect()
    {
        global $bdd;
        
        if($this->username != NULL && $this->password != NULL)
        {
            $password = hash('whirlpool', 'terry la star'.$this->password);
            $select = $bdd->prepare("SELECT id,username FROM users WHERE username = :username AND password = :password");
            $select->bindParam(':username', $this->username);
            $select->bindParam(':password', $password);
            $select->execute();
            $result = $select->fetch();
            echo $select->fetch();
            if($result['username'] != NULL)
            {
                $_SESSION['user'] = $result['id'];
                $this->status = "ok";
            }
            else
                $this->status = "Utilisateur inconnu.";
        }
        else
            $this->status = "Des champs sont vides.";
    }
}