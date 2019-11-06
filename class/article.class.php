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
	function setContent($content)
	{
		$this->content = $content;
	}
	function setPublication($publication)
	{
		$this->publication = $publication;
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
	function getContent($content)
	{
		return $this->content;
	}
	function getPublication($publication)
	{
		return $this->publication;
	}
	// function setToken()
	// {
	//     $token = rand('9999999','999999999999999');
	//     $this->token = $token;
	// }
	function article()
	{

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
		$all = $bdd->prepare('SELECT `publication`.`image`,`publication`.`description`, `publication`.`id`, `users`.`username` FROM `publication` INNER JOIN `users` ON `publication`.`id_user` = `users`.`id` ORDER BY `publication`.`id` DESC');
		$all->execute();
		$results = $all->fetchAll();
		return $results;
	}

	function addCommentary()
	{
		global $bdd;
		if($this->content != NULL)
		{
			$article = $bdd->prepare("INSERT INTO `commentary`(`content`, `id_user`, `id_publication`) VALUES(:content, :id_user, :id_publication)");
			$article->bindParam(':content', $this->content);
			$article->bindParam(':id_user', $this->user);
			$article->bindParam(':id_publication', $this->publication);
			$article->execute();
			$this->status = "ok";
		}
	}

	function getCommentary($id)
	{
		global $bdd;
		$comments = $bdd->prepare('SELECT commentary.content, users.username FROM commentary INNER JOIN users ON commentary.id_user = users.id WHERE id_publication = :id');
		$comments->bindParam(':id', $id);
		$comments->execute();
		$allcomments = $comments->fetchAll();
		return $allcomments;
	}
}