<?php
	require("../back/helper.php");
	if ($_SERVER["REQUEST_METHOD"] == "GET")
		render("login_form.php", ["title"=>"Log In"]);
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["user"]))
			render("error.php", ["message"=>"Need a username."]);
		elseif (empty($_POST["password"]))
			render("error.php", ["message"=>"Need a password."]);
		// query database for user information
		// if user exists, check password
		// should only have 1 row with said username, if more htan one then problem
			// verify password given with password in database
			// get user's session id from the row #
			// redirect back to main/index
		render("error.php", ["message"=>"You don't exist."]);
	}
?>