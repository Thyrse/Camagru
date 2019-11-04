<?php
class Article
{
    private $image;
    private $description;
    public $status;
    
    function setImage($image)
    {
        $this->image = $image;
    }
    function setDescription($description)
    {
        if($description != "")
            $this->description = $description;
    }
    function setUser($user)
    {
        if($user != "")
            $this->user = $user;
    }

    function getImage($image)
    {
        return $this->image;
    }
    function getDescription($description)
    {
        return $this->description;
    }
    function getUser($user)
    {
        return $this->user;
    }
    // function setToken()
    // {
    //     $token = rand('9999999','999999999999999');
    //     $this->token = $token;
    // }
    function article()
    {
        // public function addTweet()
        // {
        //     $b = self::$pdo->prepare("INSERT INTO tweets VALUES ('', :id_user, :content, NOW(), :media, :deleted, :id_origin, :is_reply, :location)");
        //     $b->execute(["id_user" => $_SESSION['user'], "content" => $this->content, "media" => $this->media, "deleted" => $this->deleted, "id_origin" => $this->id_origin, "is_reply" => $this->is_reply, "location" => $this->location]);
        //     $this->setAtt("id", self::$pdo->lastInsertId());
        //     $this->addHashtag();
        // }
        global $bdd;
        if($this->description != NULL)
        {
           $article = $bdd->prepare("INSERT INTO publication(image, description, id_user) VALUES(:image, :description, :user)");
           $article->bindParam(':image', $this->image);
           $article->bindParam(':description', $this->description);
           $article->bindParam(':user', $this->user);
           $article->execute();
           $this->status = "ok";
        }
    }

    function getTimeLine()
    {
        global $bdd;
        $all = $bdd->prepare('SELECT `publication`.`image`,`publication`.`description`, `users`.`username` FROM `publication` INNER JOIN `users` ON `publication`.`id_user` = `users`.`id`');
        $all->execute();
        return $all;
    }
}