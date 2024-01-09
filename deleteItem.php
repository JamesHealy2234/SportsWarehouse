<?php

    require_once "classes/DBAccess.php";
    require_once "classes/ShoppingCart.php";

    session_start();

    if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }

    $title = "Delete";
    $pageHeading = "Item";

    //get database settings
    include 'settings/db.php';

    //create database object
    $db = new DBAccess($dsn, $username, $password);

    //connect to database
    $pdo = $db->connect();

    $message = "";

    //get item id to delete
    if(!empty($_GET["id"]))
    {
        //set up query to execute
        $sql = "delete from item where Item_id =:Item_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":Item_id", $_GET["id"], PDO::PARAM_STR);



        $db->executeNonQuery($stmt, false);

        $message = "the item was deleted, thankyou";

    }


    if(isset($_GET["id"]))
    {
        $prodId = $_GET["id"];
    }

    elseif (isset($_POST["Item_id"]))
    {
        $prodId = $_POST["Item_id"];
    }
    else
    {
        $prodId = 0;
    }

    $sql = "SELECT * FROM item WHERE Item_id =:Item_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":Item_id" , $prodId, PDO::PARAM_INT);

	$rows = $db->executeSQL($stmt);


    //select all item to display in the table
    $sql = "SELECT Item_id, Item_name, Price, Sale_price, Description, Featured, Category_Id, PhotoPath from item";
	$stmt = $pdo->prepare($sql);

	$itemRows = $db->executeSQL($stmt);

    //start buffer
    ob_start();

    //display "items"
    include "templates/displayAllItems.html.php";

    //display Update item to get delete message
    include "templates/display-updateItem.html.php";

    $output = ob_get_clean();

    include "templates/layout.html.php";

 ?>
