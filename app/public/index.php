<?php
	require("../back/helper.php");
	require("admin_functions.php");
	require_once("../db/connect.php");

	foreach(get_products() as $products => $product)
	{
	    echo '<p>' . $product[productname] . '</p>';
	    echo '<b>' . $product[price] . '</b>';
	}
	render("shop_front.php");
?>