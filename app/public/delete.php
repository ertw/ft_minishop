<?php
	require("../back/helper.php");
	require_once("../db/connect.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST")
		delete_user_by_id($_SESSION["id"]);
	render("error.php",["message"=>"Account Deleted"]);
?>