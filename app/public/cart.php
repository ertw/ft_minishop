<?php
	require("../back/helper.php");
	require("admin_functions.php");
	require_once("../db/connect.php");

	if (!(isset($_SESSION["id"])))
		render("error.php", ["message"=>"Please sign in!"]);
	render("items.php", ["title"=>"My Cart"]);
?>