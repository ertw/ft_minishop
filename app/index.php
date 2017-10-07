<?php
$dbconn = pg_connect("host=db dbname=minishop_db password=my_password user=minishop_user options='--client_encoding=UTF8'");
$result = pg_query($dbconn, "select * from users");
var_dump(pg_fetch_all($result));
?>
