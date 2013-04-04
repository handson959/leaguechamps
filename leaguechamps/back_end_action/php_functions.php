<?php

$MSG_bettingClosed= "";
$MSG_placeBet = "";
$MSG_changePass = "";
$MSG_loginAttempt = "";

function get_lastMatchNumber() {
    $query = "SELECT MAX(MATCH_NUMBER) FROM MATCHES 
			 WHERE 1=1";
    $getLastMatchNbr_query = mysql_query($query);
    while ($row = mysql_fetch_array($getLastMatchNbr_query)) {
        $last_match = $row['MAX(MATCH_NUMBER)'];
    }

    return $last_match;
}

function get_currentMatchNumber($con) {
    $query = "SELECT MATCH_NUMBER FROM MATCHES WHERE DATE = CURRENT_DATE";
    $todayMatch_query = mysql_query($query, $con);
    confirm_query($todayMatch_query);

    if (mysql_num_rows($todayMatch_query) != 0) {
        $query = "SELECT MATCH_NUMBER FROM MATCHES 
                WHERE DATE = CURRENT_DATE
		AND TIME >= ADDTIME(CURRENT_TIME, '05:15:00')
		ORDER BY MATCH_NUMBER ASC LIMIT 1";
        $getCurrentMatch_query = mysql_query($query, $con);
        confirm_query($getCurrentMatch_query);

        if (mysql_num_rows($getCurrentMatch_query) > 0) {
            $row = mysql_fetch_array($getCurrentMatch_query);
            $currentmatch = $row['MATCH_NUMBER'];
        } else {
            $query = "SELECT MATCH_NUMBER FROM MATCHES 
				WHERE DATE = CURRENT_DATE
				AND TIME < ADDTIME(CURRENT_TIME, '05:15:00')  
				ORDER BY MATCH_NUMBER DESC LIMIT 1";
            $getLastMatchPlayed_query = mysql_query($query, $con);
            confirm_query($getLastMatchPlayed_query);
            $row = mysql_fetch_array($getLastMatchPlayed_query);
            $currentmatch = $row['MATCH_NUMBER'] + 1;
        }
    } else {
        $currentmatch = 1;
    }
    return $currentmatch;
}

function get_TeamPhoto($con, $teamKind) {
    if (logged_in()) {
        $match = $_SESSION['currentMatch'];
    } else { // If user is not logged in, there is no session variable to show current match, hence calculate based on day and time
        $match = get_currentMatchNumber($con);
    }
    $query = "SELECT TEAMS.PHOTO FROM MATCHES, TEAMS 
			 WHERE MATCHES.MATCH_NUMBER = '" . $match . "'
			 AND TEAMS.TEAM_ID = MATCHES." . $teamKind . "_TEAM";
    $getTeamPhoto_query = mysql_query($query, $con);
    $row = mysql_fetch_array($getTeamPhoto_query);
    echo $row['PHOTO'];
}

function get_Team($con, $teamKind) {
    if (logged_in() && !admin_logged_in()) {
        $match = $_SESSION['currentMatch'];
    } else {
        $match = get_currentMatchNumber($con);
    }
    $query = "SELECT " . $teamKind . "_TEAM FROM MATCHES 
			 WHERE MATCH_NUMBER = '" . $match . "' ORDER BY MATCH_NUMBER ASC";
    $getTeam_query = mysql_query($query);
    $row = mysql_fetch_array($getTeam_query);
    echo $row[$teamKind . "_TEAM"];
}

function get_TeamName($con, $teamKind) {
    if (logged_in() && !admin_logged_in()) {
        $match = $_SESSION['currentMatch'];
    } else {
        $match = get_currentMatchNumber($con);
    }
    $query = "SELECT TEAM_NAME 
              FROM MATCHES M JOIN TEAMS T ON (M." . $teamKind . "_TEAM = T.TEAM_ID)
              WHERE M.MATCH_NUMBER = '" . $match . "' ORDER BY MATCH_NUMBER ASC";
    $getTeam_query = mysql_query($query);
    $row = mysql_fetch_array($getTeam_query);
    echo $row["TEAM_NAME"];
}

function get_DateTime_Match($con) {
    $query = "SELECT DATE_FORMAT(DATE, '%M  %e') AS DATE, DATE_FORMAT(TIME, '%l:%i %p') AS TIME FROM MATCHES
              WHERE MATCH_NUMBER= '".$_SESSION['currentMatch']."'";
    $getDateTime_query = mysql_query($query, $con);
    confirm_query($getDateTime_query);

    $row = mysql_fetch_array($getDateTime_query);
    $_SESSION['currMatch_date'] = $row['DATE'];
    $_SESSION['currMatch_time'] = $row['TIME'];
}

function betExists($con) {
    $query= "SELECT USERNAME FROM BETS 
             WHERE MATCH_NUMBER = '".$_SESSION['currentMatch']."' 
             AND USERNAME = '".$_SESSION['user_id']."'";
	$checkIfBidAlreadyPlaced_query = mysql_query($query, $con);
	confirm_query($checkIfBidAlreadyPlaced_query);
        if (mysql_num_rows($checkIfBidAlreadyPlaced_query) > 0)
            return true;
        else 
            return false;
}




?> 
