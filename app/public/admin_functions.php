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

function add_product($productname, $price) {
	$query = 'insert into minishop_db.products (productname, price) values ($1, $2);';
	$result = pg_query_params($query, array($productname, $price));
	return $result;
}

function delete_product($productname) {
	$query = 'delete from minishop_db.products where ((productname = $1));';
	$result = pg_query_params($query, array($productname));
	return $result;
}
?>
