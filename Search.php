<?php

require 'classes/DBAccess.php';

$title = "Product Search";
$pageHeading = "products";

include 'settings/db.php';
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

$sql = "SELECT Category_Id, Category_name from category";
$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);

session_start();

if(isset($_SESSION["theme"]))
{
    $theme = $_SESSION["theme"]. ".css";
}
else {
    $theme = "plain.css";
}


//start buffer
ob_start();
include 'templates/categories.html.php';

//display the search form
// include_once 'templates/SearchForm.html.php';
//check if the search button has been pressed

if(isset($_GET["SrcButton"]) && isset($_GET["search"]))
{

  $search = $_GET["search"];

  include 'settings/db.php';

  $db = new DBAccess($dsn, $username, $password);

  $pdo = $db->connect();


  //set up query to execute
  // *** Additional practise (2) changing the statement to LIKE ***
  $sql = "SELECT Item_id, item_name, Price, Sale_price, Description, Featured , Category_Id,
  PhotoPath from item WHERE item_name LIKE :item_name";

  $stmt = $pdo->prepare($sql);

  $stmt->bindValue(":item_name", "%$search%");

  //execute SQL query
  $rows = $db->executeSQL($stmt);


  //display employees
  include "templates/items.html.php";
}

// include 'templates/homepage-content.html.php';

$output = ob_get_clean();

include 'templates/layout.html.php';

?>
