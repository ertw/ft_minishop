<?php

require_once('../db/connect.php');
function delete_user($email) {
	$query = 'delete from minishop_db.users where ((email = $1))';
	$result = pg_query_params($query, array($email));
	return $result;
}

function add_user($name, $password, $email) {
	$query = "insert into minishop_db.users (name, password, email) values ($1, $2, $3);";
	$result = pg_query_params($query, array($name, $password, $email));
	return $result;
}

function set_user_password($email, $newpassword) {
	$query = "update minishop_db.users set password = $1 where email = $2;";
	$result = pg_query_params($query, array($newpassword, $email));
	return $result;
}

function is_admin_user($id) {
	$query = "select privilege from minishop_db.users where id = $1 limit 1;";
	$result = pg_query_params($query, array($id));
	$privilege = pg_fetch_result($result, 0);
	return $privilege == 'admin' ? true : 0;
}

function add_product($productname, $price) {
	$query = 'insert into minishop_db.products (productname, price) values ($1, $2);';
	$result = pg_query_params($query, array($productname, $price));
	return $result;
}

function set_product_category($productname, $category) {
	$query = "update minishop_db.products set category = $1 where productname = $2;";
	$result = pg_query_params($query, array($category, $productname));
	return $result;
}

function set_product_image($productname, $imagename) {
	$query = "update minishop_db.products set imagename = $1 where productname = $2;";
	$result = pg_query_params($query, array($imagename, $productname));
	return $result;
}

function delete_product($productname) {
	$query = 'delete from minishop_db.products where ((productname = $1));';
	$result = pg_query_params($query, array($productname));
	return $result;
}

function get_users() {
	$query = 'select * from minishop_db.users';
	$result = pg_query($query);
	$users = pg_fetch_all($result);
	// this is a 2d array of users
	return $users;
}

function get_products() {
	$query = 'select * from minishop_db.products';
	$result = pg_query($query);
	$products = pg_fetch_all($result);
	// this is a 2d array of products
	return $products;
}

?>
