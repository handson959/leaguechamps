<?php require_once("back_end_action/session.php"); ?>
<?php require_once("back_end_action/database_connectivity.php"); ?>
<?php require("back_end_action/php_functions.php"); ?>
<?php require("back_end_action/signIN_formProcessing.php"); ?>
<?php require("back_end_action/signUP_formProcessing.php"); ?>

<?php if (logged_in()) redirect_to("userpage.php"); ?>

<?php include("html_divs/html_head.php"); ?>
<body>
    <div  id="_MAIN_CONTAINER">
        <div id="_TOP_SECTION">
            <div class="innertube">
                <h1>LEAGUE CHAMPS</h1>
            </div>
        </div>	
        <div id="bg_contentwrapper">
            <div id="_CENTER_SECTION">
                <div class="innertube">
                    <?php get_currentMatchNumber($con); ?>
                    <br/>

                    <!-- GUESTPAGE CENTER LOOK: SHOWS ONLY CURRENT MATCH INFO FOR GUESTS -->
                    <p> Next Match up for prediction: <p>
                    <p> <?php get_TeamName($con, "HOME"); ?> vs. <?php get_TeamName($con, "AWAY"); ?> </p>
                    <br/><br/>
                    <!-- GUESTPAGE CENTER LOOK ENDS -->

                </div>	
                <?php echo $MSG_loginAttempt; ?>
                <p style="color:grey"> If you are a new user, choose sign up. Else, sign in. </p>
                <!-- LOGIN FORM --><?php require("html_divs/login_form.php"); ?> <!-- LOGIN FORM ENDS -->				
            </div>
        </div>

        <div id="_FOOTER_SECTION">
            <?php if (isset($con)) {
                mysql_close();
            } ?>
        </div>
    </div>	


</body>
</html>
