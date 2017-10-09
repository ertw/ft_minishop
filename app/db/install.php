<?php

require_once("../db/connect.php");
require_once('../public/admin_functions.php');

$result = pg_prepare($db, "", "drop schema if exists minishop_db cascade;");
$result = pg_execute($db, "", []);
if (!$result) {
	echo "Error: Unable to drop schema.\n";
	exit;
}

$result = pg_prepare($db, "", "create schema if not exists minishop_db;");
$result = pg_execute($db, "", []);
if (!$result) {
	echo "Error: Unable to create schema.\n";
	exit;
}

$result = pg_prepare($db, "", "
create table if not exists minishop_db.users (
  id serial primary key not null
, name varchar(255) not null
, password varchar(255) not null
, creation_date timestamp not null default current_timestamp
, email varchar(255) not null unique
, privilege varchar(255) not null default 'user'
);
");
$result = pg_execute($db, "", []);
if (!$result) {
	echo "Error: Unable to create users table.\n";
	exit;
}


$result = pg_prepare($db, "", "
create table if not exists minishop_db.products (
  id serial primary key not null
, productname varchar(255) not null
, creation_date timestamp not null default current_timestamp
, price numeric(10, 2) not null default 0
, imagename varchar(255) not null default 'image.png'
, category varchar(255) not null default 'default'
);
");
$result = pg_execute($db, "", []);
if (!$result) {
	echo "Error: Unable to create users table.\n";
	exit;
}

$result = pg_prepare($db, "", "
create table if not exists minishop_db.orders (
  id serial primary key not null
, email varchar(255) not null references minishop_db.users(email)
, creation_date timestamp not null default current_timestamp
, details text not null default 'no order data'
);
");
$result = pg_execute($db, "", []);
if (!$result) {
	echo "Error: Unable to create orders table.\n";
	exit;
}
$result = pg_prepare($db, "", "
create table if not exists minishop_db.carts (
  id serial primary key not null
, creation_date timestamp not null default current_timestamp
, user_id integer not null references minishop_db.users(id)
, prod_id integer not null
, quantity integer not null default 0
, constraint user_prod_un unique (user_id, prod_id)
);
");
$result = pg_execute($db, "", []);
if (!$result) {
	echo "Error: Unable to create orders table.\n";
	exit;
}

// list of users
$users = [
	[
	'erik williamson'
	, 'myPass'
	, 'me@erik.tw'
	]
	,[
	'bill'
	, 'password'
	, 'bill@sal.com'
	]
	,[
	'terri'
	, 'password'
	, 't@h.com'
	]
	,[
	'deleteme'
	, 'some deleted password'
	, 'delete@me.com'
	]
];
// add each user
foreach ($users as list($name, $password, $email)) {
	add_user($name, $password, $email);
}
// give erik and terri admin privies
set_user_admin('me@erik.tw');
set_user_admin('t@h.com');

// list of pusheens
$pusheens = [
	[
		'Pusheen Sushi'
		, '9000.03'
		, 'sushi.gif'
	]
	, [

		'Pusheen Cupcake'
		, '9000.99'
		, 'cupcake.png'
	]
	, [

		'Pusheen Pizza'
		, '9000.99'
		, 'pizza.png'
	]
	, [

		'Pusheen Ramen'
		, '9000.99'
		, 'ramen.png'
	]
	, [

		'Pusheen Rice'
		, '9000.99'
		, 'cupcake.png'
	]
	, [

		'Pusheen Bread'
		, '9000.99'
		, 'bread.png'
	]
];
// add all the pusheens
foreach ($pusheens as list($name, $price, $imagename)) {
	add_product($name, $price, $imagename);
}
// test deleting a user
delete_user('delete@me.com');
// test adding an order
add_order('me@erik.tw', 'this is my cool order of pusheens, for $99999');
// try adding and deleting items to the cart
add_to_cart(1, 2, 2);
delete_carts(1);
add_to_cart(1, 2, 2);
// print out the users and products
echo '<h3>Added some users:</h3>';
foreach(get_users() as $users => $user){
    echo '<p>' . $user[name] . '</p>';
}
echo '<h3>Added some products:</h3>';
foreach(get_products() as $products => $product){
    echo '<p>' . $product[productname] . '</p>';
    echo '<b>' . $product[price] . '</b>';
}
?>
