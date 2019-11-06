<?php
class Userinfo
{
    private $id_user;
    private $username;
    private $email;
    private $password;
    private $user;
    
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

    function update()
    {
        global $bdd;
        if($this->username != NULL)
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
                    $this->status = "ok";
                else
                    $this->status = "Non";
            }
            catch (PDOException $e) {
                echo $e->getCode();
                if($e->getCode() == 23000)
                {
                    echo "L'utilisateur existe déjà !";
                }
                else
                {
                    echo "Une erreur est survenue";
                }
                die($e->getMessage());
                echo $e;
            }
        }
    }

}
?>