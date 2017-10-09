<?php
	require("../back/helper.php");
	require("admin_functions.php");
	require_once("../db/connect.php");

	if (!(isset($_SESSION["id"])))
		render("error.php", ["message"=>"Please sign in!"]);
	render("items.php", ["title"=>"My Cart"]);
/*
	if (isset($_POST["add_cart"]))
	{
		if (isset($_SESSION["cart"]))
		{
			// get data from specific column in array
			// all data being saved in $_SESSION
			$item_array_id = array_column($_SESSION["cart"], "item_id");
			// function searches an array for a specific value
			if (!in_array($_GET["id"], $item_array_id))
			{
				// count all elemns in array
				$count = count($_SESSION["cart"]);
				$item_array = array(
					'item_id'	=>	$_GET["id"],
					'item_name'	=>	$_POST["name_hid"],
	 				'item_price'=>	$_POST["price_hid"],
					'nb_item'	=>	$_POST["quantity"]
				);
				$_SESSION["cart"][$count] = $item_array;
			}
			// if item already added into cart
			else
				// item should already be added so redirect user to index
				render("items.php", ["title"=>"My Cart"]);
		}
		else
		{
			$item_array = array(
				'item_id'	=>	$_GET["id"],
				'item_name'	=>	$_POST["name_hid"],
				'item_price'=>	$_POST["price_hid"],
				'nb_item'	=>	$_POST["quantity"]
			);
			$_SESSION["cart"][0] = $item_array;
		}
	}
	if (isset($_GET["action"]))
	{
		if ($_GET["action"] == "delete")
		{
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if ($values["item_id"] == $_GET["id"])
				{
					var_dump($values["item_id"]);
					unset($_SESSION["cart"][$keys]);
					redirect("/public/index.php");
				}
			}
		}
	}
	// Get cart information and details here
	render("shop_front.php", ["title"=>"Cart"]);
*/
?>