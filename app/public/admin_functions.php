<?php

require_once('../db/connect.php');
function delete_user($email) {
	$query = 'delete from minishop_db.users where ((email = $1))';
	$result = pg_query_params($query, array($email));
	return $result;
}

function delete_user_by_id($id) {
	$query = 'delete from minishop_db.users where ((id = $1))';
	$result = pg_query_params($query, array($id));
	return $result;
}

function add_user($name, $password_in_plaintext, $email) {
	$query = "insert into minishop_db.users (name, password, email) values ($1, $2, $3);";
	$hash = password_hash($password_in_plaintext, PASSWORD_DEFAULT);
	$result = pg_query_params($query, array($name, $hash, $email));
	return $result;
}

function set_user_password($email, $newpassword) {
	$query = "update minishop_db.users set password = $1 where email = $2;";
	$result = pg_query_params($query, array($newpassword, $email));
	return $result;
}

function set_user_admin($email) {
	$query = "update minishop_db.users set privilege = 'admin' where email = $1;";
	$result = pg_query_params($query, array($email));
	return $result;
}

function is_admin_user($id) {
	$query = "select privilege from minishop_db.users where id = $1 limit 1;";
	$result = pg_query_params($query, array($id));
	$privilege = pg_fetch_result($result, 0);
	return $privilege == 'admin' ? true : 0;
}

function add_product($productname, $price, $imagename) {
	$query = 'insert into minishop_db.products (productname, price, imagename) values ($1, $2, $3);';
	$result = pg_query_params($query, array($productname, $price, $imagename));
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

function delete_product_by_id($id) {
	$query = 'delete from minishop_db.products where ((id = $1));';
	$result = pg_query_params($query, array($id));
	return $result;
}

function get_users() {
	$query = 'select * from minishop_db.users;';
	$result = pg_query($query);
	$users = pg_fetch_all($result);
	// this is a 2d array of users
	return $users ? : [];
}

function get_products() {
	$query = 'select * from minishop_db.products;';
	$result = pg_query($query);
	$products = pg_fetch_all($result);
	// this is a 2d array of products
	return $products ? : [];
}

function add_order($email, $details) {
	$query = 'insert into minishop_db.orders (email, details) values ($1, $2);';
	$result = pg_query_params($query, array($email, $details));
	return $result;
}

function get_orders() {
	$query = 'select * from minishop_db.orders;';
	$result = pg_query($query);
	$orders = pg_fetch_all($result);
	// this is a 2d array of orders
	return $orders ? : [];
}

function delete_order_by_id($id) {
	$query = 'delete from minishop_db.orders where ((id = $1));';
	$result = pg_query_params($query, array($id));
	return $result;
}

function add_to_cart($user_id, $prod_id, $quantity) {
	$query = 'insert into minishop_db.carts as cart (user_id, prod_id, quantity) values ($1, $2, $3)
		on conflict (user_id, prod_id) 
		do update set quantity = cart.quantity + $3
		where cart.user_id = $1 and cart.prod_id = $2
;';
	$result = pg_query_params($query, array($user_id, $prod_id, $quantity));
	return $result;
}

function delete_carts($user_id) {
	$query = 'delete from minishop_db.carts where (user_id = $1);';
	$result = pg_query_params($query, array($user_id));
}

?>
