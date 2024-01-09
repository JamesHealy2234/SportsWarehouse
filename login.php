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

    $title = "Login";
    $pageHeading = "Login";

    //the Authentication class is staic so there is no need to create an instance of the class

    $message = "";

    if(isset($_POST["loginSubmit"]))
    {
        if(!empty($_POST["username"]) && !empty($_POST["password"]))
        {

            //Authentication user
            $loginSuccess = Authentication::login($_POST["username"], $_POST["password"]);
            if(!$loginSuccess)
            {
                $message = "Username or password incorrect";
                $error = true;

            }
        }
    }

    // if(!(isset($_SESSION['login']) && $_SESSION['login']!= '')){
    //
    //     header("Location: success.php");
    // }



    //start buffer
    ob_start();

    //display create user form

    include "templates/loginForm.html.php";


    $output = ob_get_clean();

    include "templates/layout.html.php";


 ?>
