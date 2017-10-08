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
			if (pg_send_query_params($db, $query, 
				array($_POST["user"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["email"])))
			{
				$result = pg_get_result($db); //gets records from pg_send_query
				if ($result)
				{
					$state = pg_result_error_field($result, PGSQL_DIAG_SQLSTATE);
					// if state is returned a value then there's an error in the code, else everything is ok
					if (!$state) // if state == 0  then sucessful and values will be inserted into database
					{
						session_start();
						redirect("/front/index.php");
					}
					render("error.php", ["message"=>"Email already in use"]);
				}
				else // results == 0 then thre are no results available, so error?
					render("error.php", ["message"=>"Unable to create user account"]);
			}
		}
	}
?>