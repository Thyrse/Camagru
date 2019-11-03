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
            $this->description = $description;
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
           $insert = $bdd->prepare("INSERT INTO publication(image, description) VALUES(:image, :description)");
           $insert->bindParam(':image', $this->image);
           $insert->bindParam(':description', $this->description);
           $insert->execute();
           $this->status = "ok";
    }
}