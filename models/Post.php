<?php
session_start();
require_once('Model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'../interfaces/Database.php');

class Post extends Model implements JsonSerializable{
	private $title;
	private $description;

	public function __construct($post) {
		$this->title = $post['title'];
		$this->description = $post['description'];
		$this->authon = $_SESSION['user']->username;
		$this->datePosted = date("Y-m-d h:i:sa");
	}

	public function jsonSerialize() {
		return get_object_vars($this);
	}

	public function all() {
		$posts = Model::get_db($_SERVER['DOCUMENT_ROOT'].'/db/posts.json');
		return $posts;
	}
}
?>