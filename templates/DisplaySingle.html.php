<h1 class="ProductHead">Product</h1>

<section id="Single-Item">

<?php foreach ($rows as $row):
    $PhotoPath = "images/SportsImages/".$row["PhotoPath"];
    $item_name = $row["item_name"];
    $price = $row["Price"];
    $Sale_price = $row["Sale_price"];
    $Description = $row["Description"];

?>

    <div>
        <img src="<?= $PhotoPath?>" width="250px" height="250px">
    </div>

    <div id="itemSpecs">
        <p class="singleItemName"><?=$item_name?></p>
        <?php if($Sale_price!=0):?>
        <p class="OlderPrice">Price: <strong>$<?=$price?></strong></p>
        <p class="SingleItemPrice">Sale Price: <strong>$<?=$Sale_price?></strong></p>
        <?php else: ?>
            <p class="singlePrice">Price: <strong>$<?=$price?></strong></p>
        <?php endif;?>

        <p class="singleDescription"> <?=$Description?> </p>
    </div>


    <form action="ShoppingCart.php" method="post">
      <div>

              <?php if ($Sale_price):  ?>
              <!--Item is on sale -->
                  <input type="hidden" name="Price" value="<?=sprintf("%1.2f", $row["Sale_price"]);?>">
              <?php else: ?>
                  <input type="hidden" name="Price" value="<?=sprintf("%1.2f", $row["Price"]);?>">
              <?php endif;?>



        <p>
            <label for="qty<?=$itemId?>">Quantity: </label>
            <input for="qty" type="number" min="1" id="qty<?=$itemId?>" name="qty" value="1">
        </p>

            <input type="hidden" name="photo" value="<?= $PhotoPath?>">

        <p><input class="buy" type="submit" name="buy" value="Buy"></p>
        <input type="hidden" value="<?=$itemId?>" name="itemId">

      </div>
    </form>

<?php endforeach; ?>
</section>
