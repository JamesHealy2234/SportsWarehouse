<?php

require_once "classes/DBAccess.php";
require_once "classes/ShoppingCart.php";
require_once "classes/Authentication.php";

$title = "insert";
$pageHeading = "Items";

//get database object
include "settings/db.php";

//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();

//get categorie to poulate drop down list
$sql = "select Category_Id, Category_name from category";

$stmt = $pdo->prepare($sql);

//execute SQL query
$categoryRows = $db->executeSQL($stmt);

$message = "";

session_start();

if(isset($_SESSION["theme"]))
{
    $theme = $_SESSION["theme"]. ".css";
}
else {
    $theme = "plain.css";
}

Authentication::protect();

//insert product when the button is clicked

if(isset($_POST["submit"]))
{
    //check if checkbox for feaured item is ticked
    if(isset($_POST["Featured"]))
    {
        $Featured = 1;
    }
    else {
        $Featured = 0;
    }
    //check a item name was supplied

    if(!empty($_POST["item_name"]))
    {

        //set up query to execute
        //insert product
        $sql = "INSERT INTO item(item_name, Price, Sale_price, Description, Featured, Category_Id, PhotoPath)
        values(:item_name, :Price, :Sale_price, :Description, :Featured, :Category_Id, :PhotoPath)";

        $stmt = $pdo->prepare($sql);
        $stmt ->bindValue(":item_name", $_POST["item_name"], PDO::PARAM_STR);

        $stmt->bindValue(":Price", $_POST["Price"], PDO::PARAM_STR);
        $stmt->bindValue(":Sale_price", $_POST["Sale_price"], PDO::PARAM_STR);
        $stmt->bindValue(":Description", $_POST["Description"], PDO::PARAM_STR);
        $stmt->bindValue(":Featured",  $Featured, PDO::PARAM_INT);
        $stmt->bindValue(":Category_Id", $_POST["Category_Id"], PDO::PARAM_INT);
        $stmt->bindValue(":PhotoPath", $_POST["PhotoPath"], PDO::PARAM_STR);


        $id = $db->executeNonQuery($stmt, true);

        $message = "The item was added, id: ". $id;
    }

}

//start buffer
ob_start();

//display form
include "templates/ItemForm.html.php";

$output = ob_get_clean();

include 'templates/layout.html.php';

?>
