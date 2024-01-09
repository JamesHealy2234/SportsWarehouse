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

$title = "Search Results";

include 'settings/db.php';

$db = new DBAccess($dsn, $username, $password);

$pdo = $db->connect();

$sql = "SELECT Category_Id, Category_name from category";
$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);

ob_start();
include 'templates/categories.html.php';
$output = ob_get_clean();

$sql = "SELECT PhotoPath, item_name, Price, Sale_price, Description from item WHERE Item_id =:id";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":id", $_GET["id"]);

$rows = $db->executeSQL($stmt);


$itemId = $_GET["id"];

ob_start();
include 'templates/DisplaySingle.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php'

?>
