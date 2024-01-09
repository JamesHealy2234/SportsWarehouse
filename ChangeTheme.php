<?php

require_once "classes/ShoppingCart.php";
require_once "classes/Authentication.php";


session_start();

Authentication::protect();

//read stylesheet theme from session_start
if(isset($_SESSION["theme"]))
{
    $theme = $_SESSION["theme"]. ".css";
}
else {
    $theme = "plain.css";
}

$title = "Theme";
$pageHeading = "Change Theme Page";

$message = "";

if(isset($_POST["submit"]))
{
    //get the selected colour theme
    $_SESSION["theme"] = $_POST["theme"];
    $theme = $_SESSION["theme"] . ".css";
}

//start buffer
ob_start();

//display page content
include "templates/changetheme.html.php";

$output = ob_get_clean();

include "templates/layout.html.php";


?>
