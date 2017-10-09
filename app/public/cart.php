<?php
	require("../back/helper.php");
	require("admin_functions.php");
	require_once("../db/connect.php");

	if (isset($_POST["add_cart"]))
	{
		if (!(isset($_SESSION["id"])))
			render("error.php", ["message"=>"Please sign in!"]);
		if (isset($_GET["action"]) && $_GET["action"] == "delete")
		{
			$query = "DELETE FROM minishop_db.carts WHERE user_id= $1 AND prod_id = $2;";
			$result = pg_query_params($query, array($_SESSION["id"], $_GET["id"]));
			redirect("/public/cart.php");
		}
		add_to_cart($_SESSION["id"], $_GET["id"], $_POST["quantity"]);
		$cart_info = [];
		$rows = get_cart($_SESSION["id"]);
		foreach ($rows as $row)
		{
			$cart_info[] = ["item_name"=>$_POST["name_hid"],
							"quantity"=>$row["quantity"],
							"price"=>$_POST["price_hid"]];
		}
		render("items.php", ["cart_info"=>$cart_info]);
	}
	render("items.php", ["title"=>"My Cart"]);
?>