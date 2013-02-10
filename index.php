<?php echo "Hi There! This is Hands On 959";

$con = mysql_connect("instance38538.db.xeround.com:6511", "admin", "Youtube@libra17");
if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
$db_select = mysql_select_db("handson959", $con);
if (!$db_select) {
		die('Database selection failed: ' . mysql_error());
	}

$query= "SELECT NAME FROM USER WHERE USERD = 102";
$getUser_query = mysql_query($query);
$user = mysql_fetch_array($getUser_query);

echo $user['NAME'];	
?>

