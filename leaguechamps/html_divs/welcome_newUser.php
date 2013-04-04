<div id="sign_in_up">
<?php 
/*Connection to SQL*/
$con = mysql_connect('localhost', 'root', 'sql123');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
/*Connection to SQL Ends*/

/*Connection to DataBase Akash*/
mysql_select_db("ebl", $con);

/*Connection to DataBase Akash Ends*/


$findUserName_query = mysql_query("SELECT COUNT(USERNAME) FROM USERS WHERE USERNAME = '".$_REQUEST["user"]."'");

while($row = mysql_fetch_array($findUserName_query)) {
  $count_username_found=$row['COUNT(USERNAME)'];
 }

$hashed_password=sha1($_REQUEST["pass"]); 
 
 if ($count_username_found == 0) {
		$insertUser_query = 
		mysql_query("INSERT INTO USERS VALUES ('".$_REQUEST["firstname"]."', '".$_REQUEST["lastname"]."', '".$_REQUEST["user"]."', '".$hashed_password."','','')");
		
		echo "<p> Welcome " .$_REQUEST["firstname"]. ". Your account has been created successfully. </p>";
		
 }

 else {
 echo "<p> Username " .$_REQUEST["user"]. " already exists </p>";
 }
    
?>
</div>