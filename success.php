<?php
    require_once "classes/Authentication.php";
    require_once "classes/ShoppingCart.php";

    session_start();

    if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }

    Authentication::protect();

    $title = "Success";
    $pageHeading = "Login Successful";
    $loginName = $_SESSION["username"];

    //start buffer
    ob_start();

    //display create user form
    include "templates/success.html.php";

    $output = ob_get_clean();

    include "templates/layout.html.php";


 ?>
