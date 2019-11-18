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
		$all = $bdd->prepare('SELECT `publication`.`image`,`publication`.`description`, `publication`.`id`, `publication`.`id_user`, `users`.`username` FROM `publication` INNER JOIN `users` ON `publication`.`id_user` = `users`.`id` ORDER BY `publication`.`id` DESC');
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
		$comments = $bdd->prepare('SELECT `commentary`.`content`, `commentary`.`id_user`, `commentary`.`id`, `users`.`username` FROM commentary INNER JOIN users ON commentary.id_user = users.id WHERE id_publication = :id');
		$comments->bindParam(':id', $id);
		$comments->execute();
		$allcomments = $comments->fetchAll();
		return $allcomments;
	}

	function getLike($id)
	{
		global $bdd;
		$likes = $bdd->prepare('SELECT COUNT(`id_user`) as total FROM `opinion` WHERE `id_publication` = :id');
		$likes->bindParam(':id', $id);
		$likes->execute();
		$alllikes = $likes->fetch();
		return $alllikes['total'];
	}

	function getLiked($id, $user)
	{
		global $bdd;
		$liked = $bdd->prepare('SELECT `id_user` FROM `opinion` WHERE `id_publication` = :id AND `id_user` = :id_user');
		$liked->bindParam(':id', $id);
		$liked->bindParam(':id_user', $user);
		$liked->execute();
		$alllikes = $liked->fetch();
		return $alllikes;
		// if($alllikes['id_user'] == $this->user)
		// 	return $this->status = 1;
		// else
		// 	return $this->status = 0;
	}


	function addLike()
	{
		global $bdd;
		$select_likes = $bdd->prepare("SELECT * FROM `opinion` WHERE `id_user` = :id_user AND `id_publication` = :id_publication");
		$select_likes->bindParam(':id_user', $this->user);
		$select_likes->bindParam(':id_publication', $this->publication);
		$select_likes->execute();
		$result = $select_likes->fetch();
		if($result['id_user'] == NULL)
		{
			$opinion = $bdd->prepare("INSERT INTO `opinion`(`id_user`, `id_publication`) VALUES(:id_user, :id_publication)");
			$opinion->bindParam(':id_user', $this->user);
			$opinion->bindParam(':id_publication', $this->publication);
			$opinion->execute();
		}
		else
		{
			$opinion = $bdd->prepare("DELETE FROM `opinion` WHERE `id_user` = :id_user AND `id_publication` = :id_publication");
			$opinion->bindParam(':id_user', $this->user);
			$opinion->bindParam(':id_publication', $this->publication);
			$opinion->execute();
		}
	}
}