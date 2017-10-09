<?php
	require("../back/helper.php");
	require("admin_functions.php");
	require_once("../db/connect.php");

	if (isset($_POST["add_cart"]))
	{
		if (!(isset($_SESSION["id"])))
			render("error.php", ["message"=>"Please sign in!"]);
		add_to_cart($_SESSION["id"], $_GET["id"], $_POST["quantity"]);
		$cart_info = [];
		$rows = get_cart($_SESSION["id"]);
		$prod = get_products();

		foreach ($rows as $row)
		{
			$name = get_product_name($row["prod_id"]);
			$price = get_product_price($row["prod_id"]);
			$cart_info[] = ["item_name"=>$name,
								"quantity"=>$row["quantity"],
								"price"=>$price,
								"p_id"=>$row["prod_id"]];
		}
		render("items.php", ["cart_info"=>$cart_info]);
	}
	if (isset($_GET["action"]) && $_GET["action"] == "delete")
	{
		$query = "DELETE FROM minishop_db.carts WHERE user_id=$1 AND prod_id = $2;";
		$result = pg_query_params($query, array($_SESSION["id"],$_GET["id"]));
		render("error.php",["message"=>"Item removed"]);
	}
	$cart_info = [];
	$rows = get_cart($_SESSION["id"]);
	$prod = get_products();

	foreach ($rows as $row)
	{
		$name = get_product_name($row["prod_id"]);
		$price = get_product_price($row["prod_id"]);
		$cart_info[] = ["item_name"=>$name,
							"quantity"=>$row["quantity"],
							"price"=>$price,
							"p_id"=>$row["prod_id"]];
	}
	render("items.php", ["title"=>"My Cart", "cart_info"=>$cart_info]);
?>