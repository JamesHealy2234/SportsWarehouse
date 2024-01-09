<?php
// this class is part of the business layer it uses the DBAccess /**
require_once("DBAccess.php");

class Authentication
{
    //constant hold values that do not change
    const loginPageURL = "login.php";
    const SuccessPageUrl = "success.php";

    private static $_db;

    public static function login($uname, $pword)
    {
        $hash = "";

        //get database settings
        include "settings/db.php";

        try
        {
            //create database object, as the class is static we need to use
            // the keyword self instead of this
            self::$_db = new DBAccess($dsn, $username, $password);

        }
        catch (PDOException $e)
        {
            die("Unable to connect to database, " . $e->message());
        }


        //check if user exists in database

        try
        {
            //connect to db as the class is static we need to use
            // the keyword self instead of this
            $pdo = self::$_db->connect();

            //set up SQL and bind parameters
            $sql = "Select password from user where username=:username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username", $uname, PDO::PARAM_STR);

            //execute SQL as the class is static we need to use
            // the keyword self instead of this

            $hash = self::$_db->executeSQLReturnOneValue($stmt);

        }
            catch (PDOException $e)
        {
            throw $e;
        }

        if(password_verify($pword, $hash))
        {

            //success password and username match
            $_SESSION["username"] = $uname;

            //redirect the user to the success page
            header("Location: " . self::SuccessPageUrl);
            exit;
        }
        else
        {
            return false;
        }
    }

    //log user out
    public static function logout()
    {
        //remove username from the session
        unset($_SESSION["username"]);

        //redirect the user to the Login page
        header("Location: " . self::loginPageURL);
        exit;

    }

    //check if user is Logged in
    public static function protect()
    {
        if(!isset($_SESSION["username"]))
        {
            //redirect the user to the login page
            header("Location: " . self::loginPageURL);
            exit;
        }
    }


    public static function createUser($uname, $pword)
    {
        //hash the password
        $hash = password_hash($pword, PASSWORD_DEFAULT);

        //get database settings

        include "settings/db.php";

        try
        {
            //create database object, as the class is static we need to use
            //the keyword self instead of this
            self::$_db = new DBAccess($dsn, $username, $password);

        }
        catch (PDOException $e)
        {
            die("Unable to connect to database, " . $e->message());
        }

        //add user to database
        try
        {
            //connect to db as the class is static we need to use
            // the keyword self instead of this
            $pdo = self::$_db->connect();

            //set up SQL and bind parameters
            $sql = "insert into user(username, password) values(:username, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username", $uname, PDO::PARAM_STR);
            $stmt->bindParam(":password", $hash, PDO::PARAM_STR);

            //execute SQL as the class is static we need to use
            //the keyword self instead of this
            $result = self::$_db->executeNonQuery($stmt);
        }
        catch (PDOException $e)
        {
            throw $e;
        }

        return "New user added";
    }


    public static function changePassword($uname, $pword){


        $hash = password_hash($pword, PASSWORD_DEFAULT);
        include "settings/db.php";

        try
        {
            self::$_db = new DBAccess($dsn, $username, $password);
        } catch (PDOException $e)
        {
            die("Unable to connect to the database, " . $e->message());
        }

        try {
            $pdo = self::$_db->connect();

            $sql = "UPDATE user
                    set password = :p
                    WHERE username = :u";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":p", $hash, PDO::PARAM_STR);
            $stmt->bindValue(":u", $_SESSION["username"], PDO::PARAM_STR);

            $result = self::$_db->executeNonQuery($stmt);
            echo $result;

        } catch (PDOException $e)
        {
            $_SESSION["message"] = "Something Went Wrong, Password Not Changed";
            throw $e;
        }
        $_SESSION["message"] = "Success, Password has been changed";

    }
}
?>
