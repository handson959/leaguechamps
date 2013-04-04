<?php 
require_once("session.php");
require_once("database_connectivity.php");
require("php_functions.php");
$changeType=$_GET["changeType"];

if($changeType == "Next") {
    $_SESSION['currentMatch']=$_SESSION['currentMatch'] + 1;
} else if ($changeType == "Previous") {
    if ($_SESSION['currentMatch'] > $_SESSION['original_currentMatch']) 
		$_SESSION['currentMatch']=$_SESSION['currentMatch']-1;
	else
	 $MSG_bettingClosed= "Betting for this match has closed!";
} else {
    $_SESSION['currentMatch']=$_SESSION['original_currentMatch'];
}

echo "Showing Match: " . $_SESSION['currentMatch'];
get_DateTime_Match($con);
echo "<br/>(On " . $_SESSION['currMatch_date'] . " at " . $_SESSION['currMatch_time'] . ")";
echo $MSG_placeBet . "<br/>";
echo $MSG_bettingClosed . "<br/>";

echo "<form id=\"placeBet_form\" name=\"placeBet_form\" action=\"userpage.php\" onsubmit=\"return confirm_bid()\" method=\"post\">";

echo "<label for=\"home_team_radio_button\"> <img id=\"home_photo\" class=\"logo\" src=\"";
get_TeamPhoto($con, "HOME");
echo "\" > </label>";
echo "<label for=\"away_team_radio_button\"> <img id=\"away_photo\" class=\"logo\" src=\"";
get_TeamPhoto($con, "AWAY");
echo "\" > </label>";

echo "<input type=\"radio\" style=\"display:none;\" id=\"home_team_radio_button\" value=\"";
get_Team($con, "HOME");
echo "\" name=\"which_team\"/> <div id=\"home_team_radio\"></div>";
echo "<input type=\"radio\" style=\"display:none;\" id=\"away_team_radio_button\" value=\"";
get_Team($con, "AWAY");
echo "\" name=\"which_team\"/> <div id=\"away_team_radio\"></div>";
echo "<br/>";

if (betExists($con)) {
  echo "<p> You have already placed your Bid for this match </p>";
} else {
    echo "<input type=\"submit\" name=\"submitBetFormSubmit\" value=\"Place Bid\"/>"; 
}
    
echo "</form>";

if (isset($con)) {
    mysql_close();
} ?>
