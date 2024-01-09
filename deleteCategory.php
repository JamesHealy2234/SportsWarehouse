<?php
    require_once "classes/DBAccess.php";
    require 'classes/ShoppingCart.php';

    $title = "Delete";

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
    //get category id to delete
    if(!empty($_GET["id"]))
    {
        //set up query to execute
        $sql = "delete from category where Category_Id=:Category_Id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":Category_Id", $_GET["id"], PDO::PARAM_INT);

        //execute SQL query
        $db->executeNonQuery($stmt, false);

        $message = "The category was deleted";
    }


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

    //select all categories to display in a table
    $sql = "select Category_Id, Category_name from category";
    $stmt = $pdo->prepare($sql);

    $categoryRows = $db->executeSQL($stmt);


    //start buffer
    ob_start();

    include "templates/display-updateCategory.html.php";

    $output = ob_get_clean();

    include "templates/layout.html.php";



 ?>
