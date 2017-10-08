<?php

require_once("../db/connect.php");
//$db = pg_connect("host=db dbname=minishop_db password=my_password user=minishop_user options='--client_encoding=UTF8'");
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
?>
