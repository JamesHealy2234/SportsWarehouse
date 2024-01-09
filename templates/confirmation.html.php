<h1>Confirmation Page</h1>

<?php if ($orderId>0):?>
    <p>Thank You, your order number is <?= $orderId ?> </p>
<?php else: ?>

    <p> Something went wrong and the order was not placed </p>
<?php endif; ?>

<p id="CheckoutL"><a href="home.php">Continue Shopping..</a></p>
<p id="CheckoutL"><a href="ShoppingCart.php">Back to cart...</a></p>
