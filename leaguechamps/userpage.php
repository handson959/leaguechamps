<?php
require_once("back_end_action/session.php");
require_once("back_end_action/database_connectivity.php");
require("back_end_action/php_functions.php");
require("back_end_action/changePass_formProcessing.php");
require("back_end_action/placeBid_formProcessing.php");
confirm_logged_in();
?>

<?php include("html_divs/html_head.php"); ?>
<body>
    <div  id="_MAIN_CONTAINER">
        <div id="_TOP_SECTION">
            <div class="innertube">
                <h1 style="float:left;">LEAGUE CHAMPS</h1>
                <p style="float:left; margin:15px 0 0 15px; color:white;">Welcome <?php echo $_SESSION['firstname']; ?>. You have logged in successfully.</p>
                <a style="float:left; margin:15px 0 0 15px;" href="logout.php">Logout</a>	
                </br></br>
                <?php echo $MSG_changePass ?>
                <?php if (isset($_POST['changePasswordButton'])) { ?>
                    <!-- CHANGE PASSWORD FORM -->
                    <form class="change_Password_form" style="float:left; margin:0 0 0 700px;" name="change_Password_form" action="userpage.php" onsubmit="return validateSignINform()" method="post">
                        <table>
                            <tr>
                                <td class="form_labels">Current Password: </td>	<td id="textbox"><input type="password" name="pass" size="15" value="<?php echo htmlentities($password) ?>"/></td><td><p id="validationError_pass"></p></td>
                            </tr>
                            <tr>
                                <td class="form_labels">New Password: </td>	<td id="textbox"><input type="password" name="new_pass" size="15" value="<?php echo htmlentities($new_password) ?>"/></td><td><p id="validationError_pass"></p></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="ChangePasswordFormSubmit" value="Change Password"/></td>
                                </form>
                                <td>
                                    <form style="display:inline; float:left;" name="cancelChangePassword_button" action="userpage.php" method="post">
                                        <input type="submit" name="cancelChangePasswordButton" value="Cancel"/>
                                    </form>
                                </td>
                            </tr>	
                        </table>
                        <!-- CHANGE PASSWORD FORM ENDS -->	
                    <?php } else { ?>
                        <!-- CHANGE PASSWORD BUTTON -->	
                        <form style="float:left; margin:0 0 0 700px;" name="changePassword_button" action="userpage.php" method="post">
                            <input style="width:150px" type="submit" name="changePasswordButton" value="Change Password"/>
                        </form>
                        <!-- CHANGE PASSWORD BUTTON ENDS -->
                    <?php } ?>
            </div>
        </div>	
        <div id="bg_contentwrapper">
            <div id="_CENTER_SECTION">
                <div class="innertube">
                    <!-- USERPAGE CENTER LOOK: GIVES OPTION TO BET, CHANGE MATCH TO USERS -->
                    <div id="betArea">
                        <?php
                        echo "Showing Match: " . $_SESSION['currentMatch'] . "<br/>";
                        get_DateTime_Match($con);
                        echo "<br/>(On " . $_SESSION['currMatch_date'] . " at " . $_SESSION['currMatch_time'] . ")";
                        echo $MSG_placeBet."<br/>";
                        echo $MSG_bettingClosed."<br/>";
                        ?>
                        <form id="placeBet_form" name="placeBet_form" action="userpage.php" onsubmit="return confirm_bid()" method="post">
                            <label for="home_team_radio_button"> <img id="home_photo" class="logo" src="<?php get_TeamPhoto($con, "HOME"); ?>" > </label>
                            <label for="away_team_radio_button"> <img id="away_photo" class="logo" src="<?php get_TeamPhoto($con, "AWAY"); ?>"> </label><br/>
                            <input type="radio" id="home_team_radio_button" value="<?php get_Team($con, "HOME"); ?>" name="which_team" style="display:none;" /> <div id="home_team_radio"></div>
                            <input type="radio" id="away_team_radio_button" value="<?php get_Team($con, "AWAY"); ?>" name="which_team" style="display:none;" /> <div id="away_team_radio"></div>
                            <br/>
                            <?php if (betExists($con)) { ?> 
                                <p> You have already placed your Bid for this match </p>
                            <?php } else { ?> 
                                <input type="submit" name="submitBetFormSubmit" value="Place Bid"/> 
                            <?php } ?>
                        </form>
                    </div>
                    <br/><br/><input type="button" name="previousMatchButton" value="Previous Match" onclick='changeMatch("Previous")'/>
                    <input type="button" name="nextMatchButton" value="Next Match" onclick='changeMatch("Next")'/><br/><br/>
                    <input type="button" name="currentMatchButton" value="Go Back To Current Match" onclick='changeMatch("Original")'/>	
                    <!-- USERPAGE CENTER LOOK ENDS -->
                </div>	
            </div>
        </div>

        <div id="_FOOTER_SECTION">
            <?php
            if (isset($con)) {
                mysql_close();
            }
            ?>
        </div>
    </div>	


</body>
</html>
