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

    $title = "Checkout";
    $pageHeading = "Checkout";

    //start buffer
    ob_start();

    //display checkout form
    include "templates/checkoutForm.html.php";

    $output = ob_get_clean();
    include 'templates/layout.html.php';

 ?>
