<?php
/* ALL OF BELOW FOR LOGIN.PHP
	// user arrives at website via "get" / third party / redirect (no actual account)
	if ($_SERVER["method"] == "get")
		render("login_form.php", ["title" => "Log In"]);

	// user entering website via post (already logged in or submitted a form)
	else if ($_SERVER["method"] == "post")
	{
		// validate user/submission
		if (empty($_POST["user"]))
			echo "Need a username\n"; // make 404 page / apologize function
		elseif (empty($_POST["password"]))
			echo "Need a password\n";

		//if passes above checks go through database to find user

		// user found, check password
	}
*/
/**** FOR INDEX ****/
//get user information? necessary or not right now?
//index page = general page that all public can see
	require("../back/helper.php");

	render("shop_front.php", ["title"=>NULL]);
?>