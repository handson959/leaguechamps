<?php

// START SIGN IN FORM PROCESSING
if (isset($_POST['signInFormSubmit'])) { // Form has been submitted.
    $hashed_password = sha1($_REQUEST["pass"]);
    $query = "SELECT USERNAME FROM USERS 
              WHERE USERNAME = '" . $_REQUEST["username"] . "'";
    $findUserName_query = mysql_query($query);
    confirm_query($findUserName_query);

    if (mysql_num_rows($findUserName_query) == 1) {
        $query = "SELECT FIRST_NAME FROM USERS NATURAL JOIN USER_LOGIN
                  WHERE USERNAME = '" . $_REQUEST["username"] . "' 
		  AND PASSWORD = '" . $hashed_password . "'";
        $findPassword_query = mysql_query($query);
        confirm_query($findPassword_query);

        if (mysql_num_rows($findPassword_query) == 1) {
            $found_user = mysql_fetch_array($findPassword_query);
            $_SESSION['user_id'] = $_REQUEST["username"];
            $_SESSION['firstname'] = $found_user['FIRST_NAME'];

            $_SESSION['currentMatch'] = get_currentMatchNumber($con);
            $_SESSION['original_currentMatch'] = get_currentMatchNumber($con);;
            redirect_to("userpage.php");
        } else {
            $MSG_loginAttempt = "<p> Wrong Password entered </p>";
        }
    } else {
        $MSG_loginAttempt = "<p> Username " . $_SESSION['user_id'] . " not found </p>";
    }
} else { // SIGN IN Form has not been submitted.
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        if ($_SESSION['newUserCreated'] == 1) {
            $MSG_loginAttempt = "Your account has been successfully created. Please login now.";
        } else {
            $MSG_loginAttempt = "You are now logged out.";
        }
            
    }
    $username = "";
    $password = "";
}
?>