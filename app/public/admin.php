<?php
require("../back/helper.php");
require_once('../public/admin_functions.php');

if (is_admin_user($_SESSION['id'])) {
	if ($_SERVER[REQUEST_METHOD] == 'GET') {
		render("admin_form.php", ["title"=>NULL]);
	}
	if ($_SERVER[REQUEST_METHOD] == 'GET') {
		render("admin_form.php", ["title"=>NULL]);
	}
}
else {
	render("error.php", ["message"=>"You don't belong here because you are not an admin."]);
}
?>
