<?php
//this class is part of the bussiness layer is uses the DBAccess class

require_once("DBAccess.php");


class item
{

    //private properties
    private $_ItemName;
    private $_ItemId;
    private $_Price;
    private $_db;

    //constructor sets up the database settings and creates a DBAccess object

    public function __construct()
    {
        //get database settigs
        include "settings/db.php";

        try
        {
            //create database object
            $this->_db = new DBAccess($dsn, $username, $password);

        } catch (PDOException $e)
        {
            die("unable to connect to database,". $e->message());
        }
    }
    //set and get methods

    //get product ID, there is no set as the primary key should not be changed
    public function ItemID()
    {
        return $this->_ItemId;
    }

    //get product name
    public function getItemName()
    {
        return $this->_ItemName;
    }

    //get the price
    public function getPrice()
    {
        return $this->_Price;
    }

    //get a Item from the database for the id supplied
    public function getItem($id)
    {
        try
        {
            //connect to db
            $pdo = $this->_db->connect();

            //set up SQL and bind parameters
            $sql = "select Item_id, item_name, Price, Sale_price, Description, Featured, Category_Id, PhotoPath from item where Item_id = :Item_id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':Item_id', $id, PDO::PARAM_INT);

            //execeute SQL
            $rows = $this->_db->executeSQL($stmt);

            //get the first row as ot os a primary key there will only be one row
            $row = $rows[0];

            //populate the private properties with the retreived values
            $this->_ItemId = $row["Item_id"];
            $this->_ItemName = $row["item_name"];
            $this->_Price = $row["Price"];

        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }
}

?>
