<?php echo "Hi There! This is Hands On 959";

$con = mysql_connect("instance38538.db.xeround.com:6511", "handson959", "Youtube@libra17");
if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
$db_select = mysql_select_db("handson959", $con);
if (!$db_select) {
		die('Database selection failed: ' . mysql_error());
	}
	
$query= "SELECT NAME FROM USER WHERE USERID = 102";
$getUser_query = mysql_query($query);

if (!$getUser_query) {
			die('Database Query failed: ' . mysql_error());
	}

$user = mysql_fetch_array($getUser_query);

echo $user['NAME'];	
?>

