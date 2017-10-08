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
, price money not null default 0
);
");
$result = pg_execute($db, "", []);
if (!$result) {
	echo "Error: Unable to create users table.\n";
	exit;
}

add_user(
	'erik williamson'
	, '$2y$10$cNq1pqJy7g.759cWvpOUM.lYkh5AcSEVDzkWWedzq0iaEYora2K2q'
	, 'me@erik.tw'
);
add_user(
	'bill'
	, 'some hash'
	, 'bill@sal.com'
);
add_user(
	'deleteme'
	, 'some deleted hash'
	, 'delete@me.com'
);
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
foreach(get_users() as $users => $user){
    echo '<p>' . $user[name] . '</p>';
}
foreach(get_products() as $products => $product){
    echo '<p>' . $product[productname] . '</p>';
    echo '<b>' . $product[price] . '</b>';
}
?>
