<?php
	require("../back/helper.php");
	require("admin_functions.php");
	require_once("../db/connect.php");

	if (isset($_POST["add_cart"]))
	{
		if (!(isset($_SESSION["id"])))
			render("error.php", ["message"=>"Please sign in!"]);
		if (isset($_SESSION["cart"]))
		{
			$item_array_id = array_column($_SESSION["cart"], "item_id");
			$count = count($_SESSION["cart"]);
			if (!in_array($_GET["id"], $item_array_id))
			{
				$item_array = array(
					'item_id'	=>	$_GET["id"],
					'item_name'	=>	$_POST["name_hid"],
					'item_price'=>	$_POST["price_hid"],
					'nb_item'	=>	$_POST["quantity"]
				);
				$_SESSION["cart"][$count] = $item_array;
			}
			else
			{
				$_SESSION["cart"][0]["nb_item"] += $_POST["quantity"];
				render("shop_front.php", ["title"=>"My Cart"]);
			}
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
			foreach($_SESSION["cart"] as $keys => $values)
			{
				if ($values["item_id"] == $_GET["id"])
				{
					unset($_SESSION["cart"][$keys]);
					redirect("/public/cart.php");
				}
			}
		}
	}
	render("shop_front.php", ["title"=>NULL]);
?>