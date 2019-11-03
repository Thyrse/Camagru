<?php
class Userinfo
{
    private $id_user;
    private $username;
    private $email;
    private $password;
    
    public function __construct($username)
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

    function getUsername()
    {
        return $this->username;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function Update()
    {
        global $bdd;
        $update = $bdd->prepare("UPDATE users SET username = :username, password = :password, email = :email WHERE id = :id_user");
        $update->bindParam(':username', $this->username);
        $update->bindParam(':password', $this->password);
        $update->bindParam(':email', $this->email);
        $update->bindParam(':id_user', $this->id_user);
        $update->execute();
    }

    // function getTweet()
    // {
    //     global $bdd;
    //     $a = $bdd->prepare("SELECT * from tweets where id_user = :id");
    //     $a->execute(["id" => $this->id_user]);
    //      $a = $a->fetchAll(PDO::FETCH_OBJ);
    //     return $a;
    // }
}
?>