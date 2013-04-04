<?php
require ("constants.php");

// CREATE a DATABASE CONNECTION
$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
// SELECT a DATABASE to use
$db_select= mysql_select_db(DB_NAME, $con);
	if (!$db_select) {
		die('Database selection failed: ' . mysql_error());
	}


function redirect_to($url) {
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$url.'">';
	exit;
}

function confirm_query($result_set) {
	if (!$result_set) {
			die('Database Query failed: ' . mysql_error());
	}
}


?>