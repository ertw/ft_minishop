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

add_user(
	'erik williamson'
	, 'myPass'
	, 'me@erik.tw'
);
add_user(
	'bill'
	, 'password'
	, 'bill@sal.com'
);
add_user(
	'terri'
	, 'password'
	, 't@h.com'
);
add_user(
	'deleteme'
	, 'some deleted password'
	, 'delete@me.com'
);
set_user_admin('me@erik.tw');
set_user_admin('t@h.com');
add_product(
	'Pusheen Sushi'
	, '9000.03'
);
add_product(
	'Pusheen Birthday Cake'
	, '9000.99'
);
add_product(
	'Delete Me'
	, '9000.99'
);
delete_product('Delete Me');
delete_user('delete@me.com');
add_order('me@erik.tw', 'this is my cool order of pusheens, for $99999');
foreach(get_users() as $users => $user){
    echo '<p>' . $user[name] . '</p>';
}
foreach(get_products() as $products => $product){
    echo '<p>' . $product[productname] . '</p>';
    echo '<b>' . $product[price] . '</b>';
}
?>
