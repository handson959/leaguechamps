<?php
if (isset($_POST['submitBetFormSubmit'])) {
    if ($_POST["which_team"] != "") {
        $currentMatch = $_SESSION['currentMatch'];
        $user = $_SESSION['user_id'];
        $bet = $_POST["which_team"];

        $query = "SELECT BET FROM BETS
		  WHERE MATCH_NUMBER= '".$currentMatch."' AND USERNAME= '". $user."'";
        $checkEntry_ofBet_query = mysql_query($query);

        //If Bet for the same USER on the same MATCH already exists
        if (mysql_num_rows($checkEntry_ofBet_query) == 0) {
            $query = "INSERT INTO BETS (USERNAME, MATCH_NUMBER, BET) 
                      VALUES ('" . $user . "', '" . $currentMatch . "', '" . $bet . "')";
            $insertBet_query = mysql_query($query);
            $MSG_placeBet = "Bet Placed on " . $bet;
        }
        else {
            $MSG_placeBet = "You have already placed a bet for this match";
        }
    } else {
        $MSG_placeBet = "Please select a team first and then Bet.";
    }
}
?>