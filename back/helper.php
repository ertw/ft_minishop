<?php
/*
* Render combines the header, main, and footer files and passes any 
* values to the $file (php file)
*/
	function render($file, $values = [])
	{
		if (file_exists("../front/{$file}"))
		{
			extract($values);
			require("../front/header.php");
			require("../front/{$file}");
			require("../front/footer.php");
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
?>
