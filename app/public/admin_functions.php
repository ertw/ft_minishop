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

function add_product($productname, $price) {
	$query = 'insert into minishop_db.prodcuts (productname, price) values ($1, $2);';
	$result = pg_query_params($query, array($productname, $price));
	return $result;
}

?>
