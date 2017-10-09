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
		if (!empty($_SESSION["cart"]))
		{
			$total = 0;
			foreach($_SESSION["cart"] as $keys => $values)
			{
		?>
		<tr>
			<td><?php echo $values["item_name"]; ?></td>
			<td><?php echo intval($values["nb_item"]); ?></td>
			<td>$<?php echo $values["item_price"]; ?></td>
			<td>$<?php echo number_format($values["nb_item"] * $values["item_price"], 2, '.', ''); ?></td>
			<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="submit">Remove</span></a></td>
		</tr>
		<?php 
				$total = $total + ($values["nb_item"] * $values["item_price"]);
			}
		?>
		<tr>
			<td align="right"><b>TOTAL</b></td>
			<td align="right">$<?php echo number_format($total, 2); ?></td>
			<td></td>
		</tr>
		<?php
		}
		?>
	</table>
	</center>
</div>