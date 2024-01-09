<?php

include "classes/DBAccess.php";
include "classes/ShoppingCart.php";
include "classes/Authentication.php";

$title = "Upload Picture";
$pageHeading = "Uploading a file";


session_start();
if(isset($_SESSION["theme"]))
{
    $theme = $_SESSION["theme"]. ".css";
}
else {
    $theme = "plain.css";
}

Authentication::protect();

//get database object
include "settings/db.php";

//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();

//get categories to poulate drop down list
$sql = "select Category_Id, Category_name from category";

$stmt = $pdo->prepare($sql);

//execute SQL query
$categoryRows = $db->executeSQL($stmt);

$message = "";
$error = false;



if(isset($_POST["submit1"]))
{
    //specify direction where image will be saved
    $targetDirectory = "images/SportsImages/";

    //get the filename
    $fileName = basename($_FILES["fileToUpload"]["name"]);

    //set the entire path
    $targetFile = $targetDirectory. $fileName;

    //only allow image files
    $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
    {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $error = true;
    }
    //check the file size php.ini has an upload_max_filesize, default set to 2m
    // if the file size exceeds the limit error code its 1
    if($_FILES["fileToUpload"]["error"]==1)
    {
        $message = "Sorry, yout file is too large. Max of 2m is allowed. ";
        $error = true;
    }

    if($error == false)
    {
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile))
        {
            $message = "the file $fileName has been uploaded. ";
        }
        else
        {
            $message = "Sorry, there was an error uploading your file. Error Code: ". $_FILES["fileToUpload"]["error"];

        }
    }
}

//start buffer
ob_start();

//display form
include "templates/itemForm.html.php";

$output = ob_get_clean();

include "templates/layout.html.php";


?>
