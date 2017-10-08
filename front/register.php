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
			// connect to the database
			$db = pg_connect("host=db dbname=minishop_db password=my_password user=minishop_user options='--client_encoding=UTF8'");
			// create user account into the sql database
			$result = pg_prepare($db, "", "
insert into minishop_db.users (name, password, email) values
  ('".$_POST["name"]."', '".password_hash($_POST["password"], PASSWORD_DEFAULT)."', '".$_POST["email"]."')
;
");
  		// ^ Does it matter if we use whirlpool or not?
			// execute the SQL command
			$result = pg_execute($db, "", []);
			if (!$result) 
				render("error.php", ["message"=>"Unable to create user account"]);
			// if 2 ids match = error
			$rows = pg_prepare($db, "", "select LAST_INSERT_ID() as email");
			$email = $rows[0]["email"];
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