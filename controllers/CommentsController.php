<?php

require("../models/Comments.php");

	class CommentsController extends Comments{
		public static function create($comment){
			$new_comment = new Comments($comment);
			Comments::save($new_comment);
			header('Location: /');
		}
		public static function delete($commentId){
			Comments::delete_comment($commentId);
			header('LocationL /');
		}
		public static function edit($post){
			Post::edit($post);
			header('Location: /view/profile/mypost.php');
		}
	}
?>