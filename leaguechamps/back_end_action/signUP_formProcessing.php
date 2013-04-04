<?php
	// START SIGN UP FORM PROCESSING
	if (isset($_POST['signUpFormSubmit'])) { // Form has been submitted.
		
		$hashed_password= sha1($_REQUEST["pass"]);
		$query= "SELECT USERNAME FROM USERS 
				 WHERE USERNAME = '".$_REQUEST["username"]."'";
		$findUserName_query = mysql_query($query);
		confirm_query($findUserName_query);
                
		if (mysql_num_rows($findUserName_query) == 0) {
			$query= "INSERT INTO USERS 
					 VALUES ('".$_REQUEST["username"]."','".$_REQUEST["firstname"]."', '".$_REQUEST["lastname"]."')";
			$insertNewUser_query = mysql_query($query);
			confirm_query($insertNewUser_query);
			
			$query= "INSERT INTO USER_LOGIN VALUES ('".$_REQUEST["username"]."', '".$hashed_password."')";
			$insertNewUserLogin_query = mysql_query($query);
			confirm_query($insertNewUserLogin_query);
				
				redirect_to("logout.php");
		} 
		else {
			$message= "<p> Username " .$_REQUEST["username"]. " already exists </p>";
		}
	} else { // SIGN UP Form has not been submitted.
		$username = "";
		$password = "";
	}
?>