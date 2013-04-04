<div id="sign_in_up">

<form name="input" action="singin_form_action.php" method="post">
<table>
<tr>
	<td><input class="signIN_form" type="radio" name="login_type" value="sign_in"CHECKED />Sign In<br /></td>
	<td><input class="signUP_form" type="radio" name="login_type" value="sign_up" />Sign Up<br /></td>
</tr>
</table>
</form>

<form class="signIN_form" name="signIN_form" action="index.php" onsubmit="return validateSignINform()" method="post">
<table>
<tr>
	<td class="form_labels">Username: </td> <td id="textbox"><input type="text" name="username" size="15" value="<?php echo htmlentities($username) ?>"/></td><td><p id="validationError_user"></p></td>
</tr>
<tr>
	<td class="form_labels">Password: </td>	<td id="textbox"><input type="password" name="pass" size="15" value="<?php echo htmlentities($password) ?>"/></td><td><p id="validationError_pass"></p></td>
</tr>
<tr>
	<td></td><td><input type="submit" name="signInFormSubmit" value="Sign In"/></td>
</tr>	
</table>
</form>


<form class="signUP_form" name="signUP_form" action="index.php" onsubmit="return validateSignUPform()" method="post" style="display: none">
<table>
<tr>
	<td class="form_labels">First Name: </td> <td id="textbox"><input type="text" name="firstname" size="15"/></td><td><p id="validationError_fname"></p></td>
</tr>
<tr>
	<td class="form_labels">Last Name: </td>	<td id="textbox"><input type="text" name="lastname" size="15"/></td><td><p id="validationError_lname"></p></td>
</tr>
<tr>
	<td class="form_labels">Username: </td> <td id="textbox"><input type="text" name="username" size="15"/></td><td><p id="validationError_new_user"></p></td>
</tr>
<tr>
	<td class="form_labels">Password: </td>	<td id="textbox"><input type="password" name="pass" size="15"/></td><td><p id="validationError_new_pass"></p></td>
</tr>

<tr>
	<td></td><td><input type="submit" name="signUpFormSubmit" value="Sign Up"/></td>
</tr>	
</table>
</form>

</div>