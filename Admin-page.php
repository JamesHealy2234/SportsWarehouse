<?php

    require_once "classes/Authentication.php";
    require_once "classes/ShoppingCart.php";

    session_start();

    //Change theme code
    if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }


    $title = "Admin Page";
    $pageHeading = "This is for Admin users only";

    // the Authentication class is static so there is no need to create a instance of the class

    $message = "";

    Authentication::protect();

    //start buffer


    if(isset($_GET["type"])){
        switch ($_GET["type"]) {
            case 'changePassword':
                ob_start();
                include "templates/changePassword.html.php";
                break;

            default:
                ob_start();
                include "templates/adminSection.html.php";
                break;
        }

    }  else {
        ob_start();
        include 'templates/adminSection.html.php';
    }


    $output = ob_get_clean();

    include "templates/layout.html.php";

?>
