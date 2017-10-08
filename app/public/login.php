<?php
	require("../back/helper.php");
	require_once("../db/connect.php");
	if ($_SERVER["REQUEST_METHOD"] == "GET")
		render("login_form.php", ["title"=>"Log In"]);
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["email"]))
			render("error.php", ["message"=>"Email Required"]);
		if (empty($_POST["password"]))
			render("error.php", ["message"=>"Password Required"]);
		// let's query the db
	// May want to make the query a bit more specific like searching if user even exists in the db
		$query = "SELECT password FROM minishop_db.users WHERE email = $1 LIMIT 1;";
		$result = pg_query_params($db, $query, array($_POST["email"]));
		if (!$result)
			render("error.php", ["message"=>"Critical DB error: unable to look up user."]);
		$hash = pg_fetch_result($result, 'password');
		if (password_verify($_POST["password"], $hash)) 
		{
			if (!($id_result = pg_query_params($db, "SELECT id FROM minishop_db.users WHERE email = $1 LIMIT 1;", array($_POST["email"]))))
					render("error.php", ["message"=>"Could not get user id"]);
			$id = pg_fetch_result($id_result, 'id');			
			$_SESSION["id"] = $id;
			redirect("/public/index.php");		
		}
		$passwordhash = password_hash($_POST["password"], PASSWORD_DEFAULT);
		render("error.php", ["message"=>"Passwords don't match"
			.PHP_EOL. "input password: {$_POST["password"]}"
			.PHP_EOL. "hash of input: {$passwordhash}"
			.PHP_EOL. "hash of db: $hash"
			]);
		// query database for user information
		// if user exists, check password
		// should only have 1 row with said username, if more htan one then problem
			// verify password given with password in database
			// get user's session id from the row #
			// redirect back to main/index
		render("error.php", ["message"=>"You don't exist."]);
	}
?>
