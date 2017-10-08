<section name="delete_user">
<hr>
<form action="admin_form.php" method="post">
<?php
require_once('../public/admin_functions.php');
foreach(get_users() as $users => $user){
    echo '<p>Username: ' . $user[name] . '<br>ID: <b>' . $user[id] . '</b></p>';
}
?>
<p>Enter user ID to delete</p>
<input type="number" name="id" required/>
<input class="submit" type="submit" value="Delete User"/>
</form>
</section>

<section name="delete_product">
<hr>
<form action="admin_form.php" method="post">
<?php
require_once('../public/admin_functions.php');
foreach(get_products() as $products => $product){
    echo '<p>Username: ' . $product[productname] . '<br>ID: <b>' . $product[id] . '</b></p>';
}
?>
<p>Enter product ID to delete</p>
<input type="number" required/>
<input class="submit" type="submit" value="Delete User"/>
</form>
</section>

<section name="add_product">
<hr>
<form action="admin_form.php" method="post">
<?php
require_once('../public/admin_functions.php');
foreach(get_products() as $products => $product){
    echo '<p>Username: ' . $product[productname] . '<br>ID: <b>' . $product[id] . '</b></p>';
}
?>
Product Name: <input type="text" required/>
<br>
Price: <input type="number" required/>
<br>
<input class="submit" type="submit" value="Delete User"/>
</form>
</section>
