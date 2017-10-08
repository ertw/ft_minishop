<?php
$db = pg_connect("host=db dbname=minishop_db password=my_password user=minishop_user options='--client_encoding=UTF8'");

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
insert into minishop_db.users (name, password, email) values
  ('erik williamson', '$2y$10$cNq1pqJy7g.759cWvpOUM.lYkh5AcSEVDzkWWedzq0iaEYora2K2q', 'me@erik.tw')
, ('george costanza', '$2y$10$sTeO7dfHeAkG06PtP2PEhOU1VYpN.D4m/QmVRd0XAGp1kstM8rqjS', 'george.costanza69@yahoo.con')
;
");
$result = pg_execute($db, "", []);
if (!$result) {
	echo "Error: Unable to create users.\n";
	exit;
}
?>