<?php require_once('../public/admin_functions.php'); ?>
<h3>Admin Panel!</h3>
<section name="delete_user">
<h4>View and delete users</h4>
<hr>
<form action="admin.php?act=delete_user_by_id" method="post">
<?php
foreach(get_users() as $users => $user){
	echo '<p>Name: ' . $user[name]
		. '<br>email: ' . $user[email]
		. '<br>ID: <b>' . $user[id]
		. '</b></p>';
}
?>
<p>Enter product ID to delete</p>
<input type="number" name="user_id" required/>
<input class="submit" type="submit" value="Delete User"/>
</form>
</section>


<section name="delete_order">
<h4>View and delete orders</h4>
<hr>
<form action="admin.php?act=delete_order" method="post">
<?php
foreach(get_orders() as $orders => $order){
	echo '<p>email: ' . $order[email]
		. '<br>details: ' . $order[details]
		. '<br>ID: <b>' . $order[id]
		. '</b></p>';
}
?>
<p>Enter order ID to delete</p>
<input type="number" name="user_id" required/>
<input class="submit" type="submit" value="Delete Order"/>
</form>
</section>


<section name="delete_product">
<hr>
<h4>Delete a product</h4>
<form action="admin.php?act=delete_product" method="post">
<?php
foreach(get_products() as $products => $product){
    echo '<p>Product Name: ' . $product[productname] . '<br>ID: <b>' . $product[id] . '</b></p>';
}
?>
<p>Enter product ID to delete</p>
<input type="number" name="product_id" required/>
<input class="submit" type="submit" value="Delete Product"/>
</form>
</section>


<section name="add_product">
<hr>
<h4>Add a product</h4>
<form action="admin.php?act=add_product" method="post">
<?php
?>
Product Name: <input type="text" name="product_name" required/>
<br>
Product Image: <input type="text" name="product_image" required/>
<br>
Price: <input type="number" name="price" required/>
<br>
<input class="submit" type="submit" value="Add Product"/>
</form>
</section>


<section name="add_user">
<hr>
<h4>Add a user</h4>
<form action="admin.php?act=add_user" method="post">
<?php
?>
User Name: <input type="text" name="user_name" required/>
<br>
User Password: <input type="password" name="user_password" required/>
<br>
Email: <input type="email" name="email" required/>
<br>
<input class="submit" type="submit" value="Add user"/>
</form>
</section>
