<?php

    require_once "classes/DBAccess.php";
    require_once "classes/ShoppingCart.php";
    require_once "classes/Authentication.php";

    $title = "Update";
    $pageHeading = "Categories";

    //get database settings
    include "settings/db.php";

    //create database object
    $db = new DBAccess($dsn, $username, $password);

    //connect to database
    $pdo = $db->connect();

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

    if(isset($_POST["submit"]))
	{
		//check a category name and id was supplied
		if(!empty($_POST["Category_Id"]) && !empty($_POST["Category_name"]))
		{
			//set up query to execute
			$sql = "UPDATE category set Category_Id =:Category_Id, Category_name =:Category_name where Category_Id = :Category_Id";

			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(":Category_Id" , $_POST["Category_Id"], PDO::PARAM_INT);
			$stmt->bindValue(":Category_name" , $_POST["Category_name"], PDO::PARAM_STR);

			//execute SQL query
			$db->executeNonQuery($stmt, false);

			$message = "The category was updated";
		}
	}

    // display the category to be updated
    // get the category id from the query string or from the posted data if the submit button was pressed

    if(isset($_GET["id"]))
	{
		$catId = $_GET["id"];
	}
	elseif (isset($_POST["Category_Id"]))
	{
		$catId = $_POST["Category_Id"];
	}
	else
	{
		$catId = 0;
	}


    $sql = "select Category_Id, Category_name from category where Category_Id = :Category_Id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":Category_Id" , $catId, PDO::PARAM_INT);

	$rows = $db->executeSQL($stmt);

	//select all categories to display in a table
	$sql = "select Category_Id, Category_name from category";
	$stmt = $pdo->prepare($sql);

	$categoryRows = $db->executeSQL($stmt);

	//start buffer
	ob_start();

    //display categories

    include "templates/display-updateCategory.html.php";

    $output = ob_get_clean();

    include "templates/layout.html.php";


?>
