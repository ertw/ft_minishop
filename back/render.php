<?php
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
?>
