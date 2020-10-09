<?php
require_once('Model.php');
require_once($_SERVER['DOCUMENT_ROOT'].'../interfaces/Database.php');

class User extends Model implements JsonSerializable, Database{
	private $username;
	private $password;
	private $firstname;
	private $lastname;
	private $age;

	public function __construct($user) {
		$this->username = $user['username'];
		$this->password = $user['password'];
		$this->firstname = ucfirst(strtolower($user['firstname']));
		$this->lastname = ucfirst(strtolower($user['lastname']));
		$this->age = $user['age'];
	}

	public function jsonSerialize() {
		return get_object_vars($this);
	}

	public static function check_user($username) {
		$all_users = Model::get_db('../db/users.json');
		foreach($all_users as $user) {
			if($username == $user->username) {
				return true;
			}
		}
		return false;
	}

	public static function find_user($username) {
		$all_users = Model::get_db('../db/users.json');
		foreach ($all_users as $user) {
			if($username == $user->username){
				return $user;
			}
		}
		echo "User does not exist";
	}
}

?>