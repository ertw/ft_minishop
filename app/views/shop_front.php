<?php
  foreach(get_products() as $products => $product)
  {
?>
  <div class="inventory">
    <form method="post" action="index.php?action=add&id=<?php echo $product["id"]; ?>">
      <div class="block">
        <!--<img src="<?php echo $product[img]; ?>"-->
        <img src="../public/img/bread.png" style="top: 0; max-width: 68%" alt="Pusheen Bread"/>
        <br />
        <h4 class="text-info"><?php echo $product[productname]; ?></h4>
        <h5 class="text-price">$<?php echo $product[price]; ?></h5>
        <input type="number" min="0" name="quantity" class="form-control" value="1" />
        <input type="hidden" name="name_hid" value="<?php echo $product[productname]; ?>" />
        <input type="hidden" name="price_hid" value="<?php echo $product[price]; ?>"/><br />
        <input name="add_cart" class="submit" type="submit" value="Add to Cart"/>
      </div>
    </form>
  </div>
<?php } ?>