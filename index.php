<?php echo "Hi There! This is  On 959";

$con = mysql_connect("instance38538.db.xeround.com:6511", "handson959", "Youtube@libra17");
mysql_select_db("handson959", $con);

$query= "SELECT NAME FROM USER WHERE USERID = 102";
$getUser_query = mysql_query($query);
$user = mysql_fetch_array($getUser_query);

echo "\n";
echo $user['NAME'];	
?>

