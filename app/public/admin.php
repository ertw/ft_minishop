<?php
require("../back/helper.php");
require_once('../public/admin_functions.php');

// check to make sure user is an authenticated admin
if (is_admin_user($_SESSION['id'])) {
	// run this code for get
	if ($_SERVER[REQUEST_METHOD] == 'GET') {
		render("admin_form.php", ["title"=>NULL]);
	}
	// run this code for post
	else if ($_SERVER[REQUEST_METHOD] == 'POST') {
		if ($_GET[act] == 'delete_user_by_id') {
			delete_user_by_id($_POST[user_id]);
		}
		else if ($_GET[act] == 'delete_product') {
			delete_product_by_id($_POST[product_id]);
		}
		else if ($_GET[act] == 'add_product') {
			add_product($_POST[product_name], $_POST[price]);
		}
		else if ($_GET[act] == 'add_user') {
			add_user($_POST[user_name], $_POST[user_password], $_POST[email]);
		}
		render("admin_form.php", ["title"=>NULL]);
	}
}
else {
	render("error.php", ["message"=>"You don't belong here because you are not an admin."]);
}
?>
