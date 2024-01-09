<?php
//this file contain the database settings for the application
// it detects if the application is running locally or on a remote server
// the correct database settings are set
//this file needs to be included in all the files that connect to the SQL Database


//check if script is runnint locally


if($_SERVER["SERVER_NAME"]== "localhost" || $_SERVER["SERVER_ADDR"]== "127.0.0.1")
{
    //website is running unser localhost - use local DB details
    //website is running user localhost - use local DB details
    $dsn = "mysql:host=localhost;dbname=sportswarehouse;charset=utf8";
    $username = "root";
    $password = "";
}


else
{
    //website is running on the remote server
    $dsn = "mysql:host=localhost;dbname=magenta07;charset=utf8";
    $username = "magenta07";
    $password = "right59";

}


?>
