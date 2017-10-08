<!DOCTYPE html>
<html>
	<head>
		<link href="styles.css" rel="stylesheet"/>
		<?php if (isset($title)): ?>
			<title>FT_MiniShop: <?= htmlspecialchars($title) ?></title>
		<?php else: ?>
			<title>FT_MiniShop</title>
		<?php endif ?>
	</head>
	<body>
		<div class="container">
			<div id="top">
				<a href="index.php">
				<div style="width: 40%; height: 15vmin; display: inline-flex; overflow: hidden; justify-content: center">
					<h1>Pusheen Treats</h1>
					<img alt="FT_MiniShop Logo Goes Here" src="../img/pusheen.png"/>
				</div></a>
					<ul class="nav" align="right">
						<li><a href="index.php">Home</a></li>
						<li><a href="cart.php">Cart</a></li>
					<?php if (!empty($_SESSION["id"])): ?>
						<li><a href="account.php">Account</a></li>
						<li><a href="logout.php">Log Out</a></li>
					<?php else: ?>
						<li><a href="login.php">Log In</a></li>
					<?php endif?>
					</ul>
			</div>
			<div id="sidebar">
				<ul class="categories">
					<li><a href="#">Category 1</a></li>
					<li><a href="#">Category 2</a></li>
					<li><a href="#">Category 3</a></li>
					<li><a href="#">Category 4</a></li>
					<li><a href="#">Category 5</a></li>
				</ul>
			</div>
		<div id="middle">