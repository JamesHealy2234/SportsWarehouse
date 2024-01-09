    <main>
      <div>
        <h1>Welcome to the shopping cart page</h1>

        <p> items you would like to purchase...</p>
      </div>


<section id="cart">

    <h1>items for purchase</h1>

 <?php if(isset($_SESSION["cart"])):
     $cart = $_SESSION["cart"];
     $cartItems = $cart->getItems();
  ?>

  <table class="TableLayout">
      <tr>
          <th>Img</th>
          <th>Item</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Remove</th>
      </tr>

    <?php foreach($cartItems as $item):
        $productName = $item->getItemName();
        $price = sprintf('%01.2f', $item->getPrice());
        $productId = $item->getItemId();
        $qty = $item->getQuantity();
     ?>

     <tr>
         <td><img class="ShoppimgImg" src="<?=$item->getPhoto();?>"></td>
         <td> <?= $productName?> </td>
         <td> <?= $price?> </td>
         <td> <?= $qty?> </td>

         <td>
             <form action="ShoppingCart.php" method="post">
                 <input type="submit" name="remove" value="Remove">
                 <input type="hidden" value="<?=$productId?>" name="productId">
            </form>
        </td>
    </tr>

    <?php endforeach  ?>

  </table>

  <p class="total">Total: <strong>$<?= sprintf('%01.2f', $cart->calculateTotal()) ?></strong></p>


<!--Check to see if there are any items in the cart
    If no items in cart the "Checkout button wont display"
-->
 <?php if($_SESSION["cart"]->count() != 0):?>
  <p id="CheckoutL"><a href="checkout.php">Checkout...</a></p>


<?php else: ?>
    <p class="none1">nothing in cart</p>

<?php endif; ?>

<p id="ContinueShopL"><a href="home.php">continue on shopping.. </a></p>
<?php endif; ?>


</section>


</main>
