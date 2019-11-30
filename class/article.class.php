<?php
class Article
{
	private $image;
	private $description;
	private $message;
    private $subject;
	private $entete;
	private $pages;
	private $secure;

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
	function setMessage()
    {
        $message = "Bonjour, vous avez un nouveau commentaire sur une publication vous appartenant, rendez-vous sur le site pour le découvrir !";
        $this->message = $message;
    }
    function setSubject()
    {
        $this->subject = "Nouveau commentaire";
    }
    function setEntete()
    {
        $this->entete = "Content-type: text/html; charset=utf-8";
	}
	function setPages($pages)
	{
		$this->pages = $pages;
	}
	function setSecure()
	{
        $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        $_SESSION['token'] = $token;
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
	function getPages()
	{
		return $this->pages;
	}
	function createArticle()
	{

		global $bdd;
		if($this->description != NULL)
		{
			$article = $bdd->prepare("INSERT INTO publication(image, description, id_user) VALUES(:image, :description, :user)");
			$article->bindParam(':image', $this->image);
			$article->bindParam(':description', $this->description);
			$article->bindParam(':user', $this->user);
			$article->execute();
		}
	}

	function getTimeLine($page)
	{
		global $bdd;
		$limit = 5;
		$end = $bdd->prepare("SELECT * FROM `publication`");
		$end->execute();
		$total_results = $end->rowCount();
		$total_pages = ceil($total_results / $limit);
		$start = ($page - 1) * $limit;
		$this->setPages($total_pages);
		$timeline = $bdd->prepare("SELECT `publication`.`image`,`publication`.`description`, `publication`.`id`, `publication`.`id_user`, `users`.`username` FROM `publication` INNER JOIN `users` ON `publication`.`id_user` = `users`.`id` ORDER BY `publication`.`id` DESC LIMIT $start, $limit");
		$timeline->execute();
		$results = $timeline->fetchAll();
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
			$newsletter = $bdd->prepare("SELECT `users`.`email`, `users`.`newsletter`, `publication`.`id_user` FROM `users` INNER JOIN `publication` ON `publication`.`id_user` = `users`.`id` WHERE `publication`.`id` = :id_publication");
			$newsletter->bindParam(':id_publication', $this->publication);
			$newsletter->execute();
			$notif = $newsletter->fetch();
			if ($notif['newsletter'] == 1 && $notif['id_user'] !== $this->user)
			{
				mail($notif['email'], $this->subject, $this->message, $this->entete);
			}
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