<?php
	session_start();
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function admin_logged_in() {
		if (isset($_SESSION['user_id']) && $_SESSION['user_id']=="admin") {
			return true;
		}
		return false;
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("index.php");
		}
	}
	
	function confirm_admin_logged_in() {
		if (!admin_logged_in()) {
			redirect_to("admin_index.php");
		}
	}
?>
