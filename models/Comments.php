<?php
require_once('Model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/interface/Database.php');

class Comments extands Model implements JsonSerializable, Database{

	public function __contruct($comment) {
		$all_comments = Comments::get_db('../assets/db/comments.json');
		if(count($all_comments) == 0){
			$finalId = 1;
		}else{
			$finalId = (end($all_comments)->id + 1);
		}
		$this->id = $finalId;
		$this->postId = $comment['postId'];
		$this->username = $comment['username'];
		$this->comment = $comment['message'];
	}

	public function JsonSerialize() {
		return get_object_vars($this);
	}

	public static function get_db($link) {
		$posts = file_get_contents($link);
		$all_posts = json_decode($posts);
		return $all_posts;
	}

	public function JsonSerialize() {
		return get_object_vars($this);
	}

	public static function get_db($link) {
		$posts = file_get_contents($link);
		$all_posts = json_decode($posts);
		return $all_posts;
	}

	public function save($comment) {
		$all_comments = Comments::get_db('../assets/db/comments.json');
		array_push($all_comments,$comment);
		file_put_contents('../assets/db/comments.json', json_decode($all_comments,JSON_PRETTY_PRINT));
	}

	public static function edit($comment) {
		$all_posts = Comments::get_db('../assets/db/comments.json');
		$old_post;
		$position;
		foreach($all_posts as $index => $element){
			if($element->id == $post['id']){
				$old_post = $all_posts[$index];
				$position = $index;
			}
		}

		if($_FILES["image"]['size'] > 0){
			$image_name = $_FILES['image']['name'];
			$image_size = $_FILES['image']['size'];
			$image_tmpname = $_FILES['image']['tmp_name'];
			move_uploaded_file($image_tmpname, '../assets/img/posts/'.$image_name);

			$old_post->image = "../assets/img/posts/".$image_name;
		}

		$old_post->title = $post['title'];
		$old_post->description = $post['description'];
		echo $position;
		$all_posts[$position] = $old_post;

		file_put_contents('../assets/db/comments.json', json_encode($all_posts,JSON_PRETTY_PRINT));
 	}

 	public function all() {
 		$comments = Model::get_db($_SERVER['DOCUMENT_ROOT'].'/assets/db/comments.json');
 		return $comments;
 	}

 	public static function delete_comment($commentId){
 		$all_comments = Comments::get_db('../assets/db/comments.json');
 		foreach($all_comments as $index => $element){
 			if($element->id == $commentId){
 				unset($all_comments[$index]);
 			}
 		}
 		file_put_contents('../assets/db/comments.json', json_encode($all_comments,JSON_PRETTY_PRINT));
 	}
}
?>