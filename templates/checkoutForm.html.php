<form method="post" action="thanksCheckout.php" id="checkoutForm">
    <fieldset class="Desktop-Checkout-Form1">
        <legend>Delivery Details</legend>

        <p>
            <label for="firstName">First Name:*</label>
            <input type="text" id="fistName" name="firstName">
        </p>

        <p>
            <label for="lastName">Last Name:*</label>
            <input type="text" id="lastName" name="lastName">
        </p>

        <p>
            <label for="address">Address:*</label>
            <input type="text" id="address" name="address">
        </p>

        <p>
            <label for="phone">Phone:*</label>
            <input type="text" id="phone" name="phone">
        </p>

        <p>
            <label for="Email">Email:*</label>
            <input type="text" id="Email" name="Email">
        </p>
    </fieldset>

    <fieldset class="Desktop-Checkout-Form2">
        <legend>Payment</legend>

        <p>
            <label for="creditcard">Credit Card Number:*</label>
            <input type="text" id="creditcard" name="creditcard">
        </p>

        <p>
            <label for="nameOnCard">Name on card:*</label>
            <input type="text" id="nameOnCard" name="nameOnCard">
        </p>
        <p>
            <label for="expiry">Expiray date:*</label>
            <input type="text" id="expiry" name="expiry">
        </p>

        <p>
            <label for="csv"> CSV:*</label>
            <input type="text" id="csv" name="csv">
        </p>
        <p> <input type="submit" name="pay" value="Pay"></p>
    </fieldset>
</form>
