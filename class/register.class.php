<?php
class Register
{
    private $username;
    private $email;
    private $password;
    private $confirmation_password;
    // private $token;
    public $status;
    
    
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
    // function setToken()
    // {
    //     $token = rand('9999999','999999999999999');
    //     $this->token = $token;
    // }
    
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
                    $data = date("y-m-d");
                    $password = hash('whirlpool', 'terry la star'. $this->password);
                    $insert = $bdd->prepare("INSERT INTO users(`username`,`password`,`email`) VALUES(`:username`, `:password`, `:email`)");
                    $insert->bindParam(':username', $this->username);
                    $insert->bindParam(':password', $this->password);
                    $insert->bindParam(':email', $this->email);
                    // $insert->bindParam(':token', $this->token);
                    // $insert->bindParam(':creation_date', $data);
                    $insert->execute();
                    $this->status = "ok";
                }
                else
                    $this->status = "Utilisateur déjà existant.";
            }
            else
                $this->status = "Les mots de passe ne correspondent pas !";
        }
    }
}