<div id="sign_in_up">
<?php 

//if(isset($_POST['submit'])) { //Form has been submitted
	
	$hashed_password= sha1($_REQUEST["pass"]);
	$findUserName_query = mysql_query("SELECT USERNAME FROM USERS WHERE USERNAME = '".$_REQUEST["user"]."'");

	if (mysql_num_rows($findUserName_query) == 1) {
 
		$findPassword_query = mysql_query("SELECT FIRST_NAME FROM USERS WHERE USERNAME = '".$_REQUEST["user"]."' AND PASSWORD = '".$hashed_password."'");
		
		if (mysql_num_rows($findPassword_query) == 1) {
				$found_user = mysql_fetch_array($findPassword_query);
		
			echo "<p> Welcome " .$found_user['FIRST_NAME']. ". You have logged in successfully. </p>";
			
			$_SESSION['userid']= $_REQUEST["user"];
			$_SESSION['firstname']= $found_user['FIRST_NAME'];
			
			redirect_to("response_submitBet.php");
		}
		else {
			echo "<p> Wrong Password entered </p>";
		}
 }

 else {
 echo "<p> Username " .$_REQUEST["user"]. " not found </p>";
 }
 //}    
?>
</div>