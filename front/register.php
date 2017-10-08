<?php
	require("../back/helper.php");
	if ($_SERVER["REQUEST_METHOD"] == "GET")
		render("register_form.php", ["title"=>"Register"]);
	elseif ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["user"]) || empty($_POST["password"]))
			render("error.php", ["message"=>"Need a username / password"]);
		elseif ($_POST["password"] != $_POST["confirm"])
			render("error.php", ["message"=>"Passwords don't match"]);
		else
		{
			// create user account into the sql database
			// if 2 ids match = error
			// else
			session_start();
			redirect("/");
		}
	}
?>