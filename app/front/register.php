<?php
	require("../back/helper.php");
	require_once("../db/connect.php");
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
			
			$query = "INSERT INTO minishop_db.users (name, password, email) VALUES ($1, $2, $3);";
			$result = pg_query_params($db, $query, array($_POST["user"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["email"]));
			if (!$result)
				render("error.php", ["message"=>"Unable to create user account"]);
			$email = pg_fetch_result($result, "email");
			if ($email == 0)
				render("error.php", ["message"=>"Email already in use."]);
			else
			{
				session_start();
				redirect("/");
			}
		}
	}
?>