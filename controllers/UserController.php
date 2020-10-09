<?php
session_start();
require('../models/User.php');

class UserController extends User {
	public static function create($user){
		$errors = 0;
		if (strlen($user['username']) < 8) {
			$errors++;
			echo "Username should be greater than 8 characters";
		}
		if (strlen($user['username']) < 8) {
			$errors++;
			echo "Password should be greater than 8 characters";
		}
		if ($user['password'] != $user['password2']) {
			$errors++;
			echo "Passwords do not match";
		}
		if ($user['age'] < 16) {
			$errors++;
			echo "You should be no less than 16yrs old";
		}
		if (User::check_user($user['username'])) {
			$errors++;
			echo "Username already exists";
		}
		if($errors == 0){

			$user['password'] = sha1($user['password']);
			$new_user = new User($user);
			User::save($new_user);
			header('Location: /');
		}
			
	}

	public static function login($user) {
		$errors = 0;
		if(!User::check_user($user['username'])) {
			var_dump($user);
			$errors++;
			echo "Username doesn't exist";
			return;
		}

		$user_details = User::find_user($user['username']);

		if($user_details->password != sha1($user['password'])){
			$errors++;
			echo "Check your credentails";
			return;
		}

		if($errors == 0) {
			$_SESSION['user'] = $user_details;
			unset($_SESSION['user']->password);
			header('Location: /');
		}
	}

}

?>