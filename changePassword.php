<?php
    require_once "classes/DBAccess.php";
    require_once "classes/Authentication.php";
    require_once "classes/ShoppingCart.php";
    require_once "settings/db.php";

    session_start();


    if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }

    $title = "Changing Password";

    $db = new DBAccess($dsn, $username, $password);
    $pdo = $db->connect();

    Authentication::protect();

    if(isset($_POST["submit"])){
        if(isset($_POST["password"]) || isset($_POST["confirmPassword"]))
        {
            $newPass = $_POST["password"];

            if($newPass == $_POST["confirmPassword"]){
                Authentication::changePassword($_SESSION["username"], $newPass);
            } else {
                $_SESSION["message"] = "<span class='errorP'> Error password did not match, Password not Changed! </span>";
                header("Location: Admin-page.php?type=changePassword");
            }

        }else{
            $_SESSION["message"] = "Something Went Wrong With The Input";
        }

    }else {
        header("Location: Admin-page.php?type=changePassword");
    }

    header("Location: Admin-page.php");

 ?>
