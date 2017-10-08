<?php
	require("../back/helper.php");
	require_once("../db/connect.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["pw"]) || empty($_POST["new_pw"]) || empty($_POST["confirm"]))
			render("error.php", ["message"=>"Please fille in all forms"]);
		elseif ($_POST["new_pw"] != $_POST["confirm"])
			render("error.php", ["message"=>"New Passwords do not match"]);
		else
		{
			$query = "SELECT password FROM minishop_db.users WHERE id = $1 LIMIT 1;";
			$result = pg_query_params($db, $query, array($_SESSION["id"]));
			if (!$result)
				render("error.php", ["message"=>"Critical DB error: unable to look up user."]);
			$old_pw = pg_fetch_result($result, 'password');
			if (!password_verify($_POST["pw"], $old_pw))
				render("error.php", ["message"=>"Incorrect Password"]);
			else
			{
				$new_query = "UPDATE minishop_db.users SET password = $1 WHERE id = $2;";
				$result = pg_send_query_params($db, $new_query, array(password_hash($_POST["new_pw"], PASSWORD_DEFAULT), $_SESSION["id"]));
				if (!$result)
					render("error.php", ["message"=>"UPDATE Critical DB error: unable to look up user."]);
				render("pw_confirm.php");
			}
		}
	}
	else
		render("password_form.php");
?>