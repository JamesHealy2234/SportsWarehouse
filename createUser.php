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

    $title = "Create user";
    $pageHeading = "Create new user";

    // the Authentication class is static so there is no need to create an instance of the class

    $message = "";

    Authentication::protect();




    if(isset($_POST["submit"]))
    {
        if(!empty($_POST["username"]) && !empty($_POST["password"]))
        {
        //add user
        $message = Authentication::createUser($_POST["username"], $_POST["password"]);
        }

    }

    if(isset($_POST["back"])){
        header("Location: Admin-page.php");
    }

    //start buffer
    ob_start();

    //display create user form
    include "templates/createUserForm.html.php";

    $output = ob_get_clean();

    include "templates/layout.html.php";

 ?>
