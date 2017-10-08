<?php
$db = pg_connect("host=db dbname=minishop_db password=my_password user=minishop_user options='--client_encoding=UTF8'") or die('unable to connect to db\n');
?>
