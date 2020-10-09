<?php

require("../models/Post.php");

class PostController extends Post{
	public static function create($post) {
		$new_post = new Post($post);
		$new_post->save($new_post);
		header('Location: /');
	}

}

?>