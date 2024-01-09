<?php

    $title ="Sports Warehouse Homepage";

    require_once "classes/DBAccess.php";
    require_once "classes/ShoppingCart.php";

    session_start();
    include 'settings/db.php';


    if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }


    $db = new DBAccess($dsn, $username, $password);

    $pdo = $db->connect();

    $sql = "select Category_Id, Category_name from category";
    $stmt = $pdo->prepare($sql);
    $rows = $db->executeSQL($stmt);

    ob_start();

    include 'templates/categories.html.php';

    if(isset($_GET["id"])){

        $sql = "SELECT Item_id, item_name, Price, Sale_price, Description, Category_Id, Featured, PhotoPath
                From item Where Category_Id = :id";

                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(":id", $_GET["id"]);

                $rows = $db->executeSQL($stmt);

                include "templates/items.html.php";
            }

    else{

        $sql = "SELECT Item_id, item_name, Price, Sale_price, Description, Featured, Category_Id, PhotoPath
                FROM item WHERE Featured = 1; ";

        $stmt = $pdo->prepare($sql);

        $rows = $db->executeSQL($stmt);

        include 'templates/homepage-content.html.php';

    }


$output = ob_get_clean();
include 'templates/layout.html.php';

?>
