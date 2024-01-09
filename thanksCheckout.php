<?php

    require_once "classes/item.php";
    require_once "classes/ShoppingCart.php";

    session_start();

    if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }

    $title = "Thanks";
    $pageHeading = "orderConfirmation";
    $orderId = 0;
    //check if pay button was pressed and there is a cart in the session

    if(isset($_POST["pay"]) && isset($_SESSION["cart"]))
    {
        //get all the posted data
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $creditcard = $_POST["creditcard"];
        $csv = $_POST["csv"];
        $Email = $_POST["Email"];
        $expiry = $_POST["expiry"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $nameOnCard = $_POST["nameOnCard"];

        //retreive shopping cart from session
        $cart = $_SESSION["cart"];

        $orderId = $cart->saveCart($address, $phone, $creditcard, $csv, $Email, $expiry, $firstName, $lastName, $nameOnCard);

        //clear the session_start
        session_destroy();
    }

    //start the session
    ob_start();

    //display order confirmation
    include 'templates/confirmation.html.php';

    $output = ob_get_clean();

    include 'templates/layout.html.php';
 ?>
