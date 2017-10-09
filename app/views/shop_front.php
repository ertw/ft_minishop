<?php
  foreach(get_products() as $products => $product)
  {
	  if ($_GET[cat]){
		  if ($_GET[cat] != $product[category]) {
			  continue;
		  }
	  }
?>
  <div class="inventory">
    <form method="post" action="index.php?action=add&id=<?=$product["id"];?>">
      <div class="block">
        <img src="../public/img/<?=$product[imagename]?>" style="top: 0; max-width: 15vw; max-height: 10vh" alt="picture of pusheen"/>
        <br />
        <h4 class="text-info"><?=$product[productname];?></h4>
        <h5 class="text-price">$<?=$product[price]; ?></h5>
        <input type="number" min="0" name="quantity" class="form-control" value="1" />
        <input type="hidden" name="name_hid" value="<?=$product[productname];?>" />
        <input type="hidden" name="price_hid" value="<?=$product[price];?>"/><br />
        <input name="add_cart" class="submit" type="submit" value="Add to Cart"/>
      </div>
    </form>
  </div>
<?php } ?>
