<?php
session_start();
require('db_con.php');

function check_login() {
	if(isset($_SESSION['collect']['email']) && isset($_SESSION['collect']['password'])) {
		return true;
	}
	else
		return false;
}

function get_username() {
	return $_SESSION['collect']['uname'];
}

function get_enroll() {
	return $_SESSION['collect']['staffs_id'];
}
?>
