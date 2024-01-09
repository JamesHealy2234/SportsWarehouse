<?php

    require_once "classes/DBAccess.php";
    require_once "classes/ShoppingCart.php";
    require_once "classes/Authentication.php";

    $title = "Insert";
    $pageHeading = "Categories";

    session_start();
    if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }

    Authentication::protect();

    //get the database settings
    include 'settings/db.php';

    //create database object
    $db = new DBAccess($dsn, $username, $password);

    //connect to database
    $pdo = $db->connect();

    $message = "";

    //insert category when the button is clicked
    if(isset($_POST["submit"]))
    {
        //check a category_id was supplied
        if(!empty($_POST["Category_Id"]))
        {
            //set up query to execute
            $sql = "insert into category(Category_Id, Category_name) values(:Category_Id, :Category_name)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":Category_Id", $_POST["Category_Id"], PDO::PARAM_STR);
            $stmt->bindValue(":Category_name", $_POST["Category_name"], PDO::PARAM_STR);

            //execute SQL query
            $id = $db->executeNonQuery($stmt, true);

            $message = "The category was added, id ". $id;

        }

    }

//start buffer
ob_start();

//display form
include 'templates/categoryForm.html.php';

$output = ob_get_clean();

include "templates/layout.html.php";


?>
