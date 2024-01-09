<?php

	require_once "classes/DBAccess.php";
	require_once "classes/Authentication.php";
	require_once "classes/ShoppingCart.php";

	$title = "Update";
	$pageHeading = "Items";

	session_start();

	if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }
	Authentication::protect();

	//get database settings
	include "settings/db.php";


	//create database object
	$db = new DBAccess($dsn, $username, $password);

	//connect to database
	$pdo = $db->connect();

	//get categories to populate drop down list
	$sql = "SELECT Category_Id, Category_name from category";
	$stmt = $pdo->prepare($sql);

	//execute SQL query
	$categoryRows = $db->executeSQL($stmt);


	$message = "";


	//update the category when the button is clicked
	if(isset($_POST["submit"]))
	{

		//check if checkbox for discontinued is ticked
		if (isset($_POST["Featured"]) && $_POST["Featured"] == "on")
		{
			$Featured = 1;
		}
		else
		{
			$Featured = 0;
		}

        //Last Edit point

		//check if a product name was supplied
		if(!empty($_POST["Item_name"]) && !empty($_POST["Item_id"]))
		{

			$sql = "update item set Item_name = :Item_Name, Price =  :Price, Sale_price = :Sale_price, Description = :Description, Featured = :Featured, Category_Id = :Category_Id, PhotoPath = :PhotoPath WHERE Item_id = :Item_id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(":Item_Name" , $_POST["Item_name"], PDO::PARAM_STR);
			$stmt->bindValue(":Price" , $_POST["Price"], PDO::PARAM_STR);
			$stmt->bindValue(":Sale_price" , $_POST["Sale_price"], PDO::PARAM_STR);
			$stmt->bindValue(":Description" , $_POST["Description"], PDO::PARAM_STR);

			$stmt->bindValue(":Featured" , $Featured, PDO::PARAM_INT);
			$stmt->bindValue(":Category_Id" , $_POST["Category_Id"], PDO::PARAM_STR);
			$stmt->bindValue(":PhotoPath" , $_POST["PhotoPath"], PDO::PARAM_STR);
			$stmt->bindValue(":Item_id" , $_POST["Item_id"], PDO::PARAM_STR);

			//execute SQL query
			$id = $db->executeNonQuery($stmt, false);
			$message = "The item was updated, id:" . " ". $id;
		}
	}

	//display the product to be updated
	//get the category id from the query string or from the posted data if the submit button was pressed
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


	$sql = "SELECT * FROM item WHERE Item_id = :Item_id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":Item_id" , $prodId, PDO::PARAM_INT);

	$rows = $db->executeSQL($stmt);

	//select all items to display in a table
	$sql = "SELECT Item_id, Item_name, Price, Sale_price, Description, Featured, Category_Id, PhotoPath from item";

	$stmt = $pdo->prepare($sql);

	$itemRows = $db->executeSQL($stmt);

	//start buffer
	ob_start();

	//display categories
	include "templates/displayAllItems.html.php";

	//display form
	include "templates/display-updateItem.html.php";

	$output = ob_get_clean();

	include "templates/layout.html.php";
?>
