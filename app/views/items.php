<h2>Shopping Cart</h2>
<div class ="table">
	<center>
	<table class="table-bordered">
		<tr>
			<th width="40%">Item Name</th>
			<th width="10%">Quantity</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
			<th width="5%">Action</th>
		</tr>
		<?php
			//$rows = get_cart($_SESSION["id"]);
			//$price & $name; // get in index.php
			if (isset($_SESSION["id"]) && isset($cart_info))
			{
				$total = 0;
				foreach($cart_info as $info)
				{
		?>
		<tr>
			<td><?php echo $info["item_name"]; ?></td>
			<td><?php echo intval($info["quantity"]); ?></td>
			<td>$<?php echo $info["price"]; ?></td>
			<td>$<?php echo number_format($info["quantity"] * $info["price"], 2, '.', ''); ?></td>
			<td><a href="cart.php?action=delete&id=<?php echo $info["p_id"]; ?>"?><span class="submit">Remove</span></a></td>
		</tr>
		<?php 
				$total = $total + ($info["quantity"] * $info["price"]);
			}
		?>
		<tr>
			<td align="right"><b>TOTAL</b></td>
			<td align="right">$<?php echo number_format($total, 2); ?></td>
			<td></td>
		</tr>
		<?php } ?>
	</table>
	</center>
</div>