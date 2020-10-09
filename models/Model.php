<?php
require_once($_SERVER['DOCUMENT_ROOT'].'./interfaces/Database.php');
class Model implements Database{
	public static function get_db($link) {
		$data = file_get_contents($link);
		$all_data = json_decode($data);
		return $all_data;
	}
	public  function save($data) {
		$link = "";
		if($_SEVER['REQUEST_URI'] == './routes/add_post.php') {
			$link = '../db/posts.json';
		} else {
			$link = '../db/users.json';
		}
		$all_data = Model::get_db($link);
		array_push($all_data,$data);
		file_put_contents($link, json_encode($all_data,JSON_PRETTY_PRINT));
	}
}

?>