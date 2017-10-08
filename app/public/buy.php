<?php
	require("../db/install.php");
	require("../back/helper.php");
	require_once("../db/connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
	    // insert the stock info into user's portfolio
        // need user's id to identify which account to insert into
        CS50::query("INSERT INTO portfolio (user_id, symbol, shares) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", 
				$_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"]);
                
		CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);
                
		CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price)
			VALUES (?, 'BUY', ?, ?, ?)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"], $stock["price"]);                  
		render("bought.php", ["symbol" => strtoupper($_POST["symbol"]), "shares" => $_POST["shares"], "price" => $stock, "balance" => $balance[0]["cash"], "title" => "Buy"]);
    }
  /*
    // if no requests, show buy form
    else
    {
        render("buy_form.php");
    }
   */
?>