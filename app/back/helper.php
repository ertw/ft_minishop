<?php
/*
* Enable sessions for each PHP page
*/
	session_start();
/*
* Render combines the header, main, and footer files and passes any 
* values to the $file (php file)
*/
	function render($file, $values = [])
	{
		if (file_exists("../views/{$file}"))
		{
			extract($values);
			require("../views/header.php");
			require("../views/{$file}");
			require("../views/footer.php");
			exit ;
		}
		else
			trigger_error("Invalid view: {$file}", E_USER_ERROR);
	}
/*
* Redirects user to location given
*/
	function redirect($location)
	{
		if (!headers_sent($file, $line))
		{
			header("Location: {$location}");
			exit ;
		}
		trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
	}
/*
* Logs out the user
*/
	function logout()
	{
		session_unset();
		if (!empty($_COOKIE[session_name()]))
			setcookie(session_name(), "", time() - 42000);
		session_destroy();
	}
?>
