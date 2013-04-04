<?php
	// START CHANGE PASSWORD FORM PROCESSING
	if (isset($_POST['ChangePasswordFormSubmit'])) { // Form has been submitted.
		
		$hashed_password= sha1($_REQUEST["pass"]);
		$query= "SELECT FIRST_NAME FROM USERS U NATURAL JOIN USER_LOGIN UL
				 WHERE USERNAME = '".$_SESSION['user_id']."' 
				 AND PASSWORD = '".$hashed_password."'";
		$findPassword_query = mysql_query($query);
		confirm_query($findPassword_query);
		
		if (mysql_num_rows($findPassword_query) == 1) {
			$found_user = mysql_fetch_array($findPassword_query);
			$hashed_new_password= sha1($_REQUEST["new_pass"]);
			$query= "UPDATE USER_LOGIN SET PASSWORD= '".$hashed_new_password."'
					 WHERE USERNAME = '".$_SESSION['user_id']."' 
					 AND PASSWORD = '".$hashed_password."'";
			$changePassword_query = mysql_query($query);
			confirm_query($changePassword_query);
			redirect_to("logout.php");
		}
		else {
			$MSG_changePass= "<p> Wrong Current Password entered </p>";
		}
		
	}
?>