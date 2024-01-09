<?php
    require_once "classes/item.php";
    require_once "classes/ShoppingCart.php";

    session_start();

    if(isset($_SESSION["theme"]))
    {
        $theme = $_SESSION["theme"]. ".css";
    }
    else {
        $theme = "plain.css";
    }

    $title = "Shop";
    $pageHeading = "Product";

    //create a categoy object
    $item = new item();

    $message = "";



    //add item to shopping cart
    if(isset($_POST["buy"]))
    {
        //check product id and qty are not empty
        if(!empty($_POST["itemId"]) && !empty($_POST["qty"]))
        {
            // echo $_POST["itemId"];
            $itemId = $_POST["itemId"];
            $qty = $_POST["qty"];

            //get the product details
            $item->getItem($itemId);

            //create a new cart item so it can be added to the shopping cart
            $Citem = new CartItem($item->getItemName(), $qty, $_POST["Price"], $itemId, $_POST["photo"]);

            //check if shopping cart exists
            if(!isset($_SESSION["cart"]))
            {
                //if shopping cart is not set create a new empty shopping cart
                $cart = new ShoppingCart();
            }
            else
            {
                //read shopping cart from session
                $cart = $_SESSION["cart"];
            }

            //add item to shopping cartItem
            $cart->addItem($Citem);

            //save shopping cart back into session
            $_SESSION["cart"] = $cart;
        }
    }


//remove item from shopping cart
if(isset($_POST["remove"]))
{
    //check product id was supplied and cart exists in session
    if(!empty($_POST["productId"]) && isset($_SESSION["cart"]))
    {
        $productId = $_POST["productId"];

        //create a new cart item so it can be removed from the shopping cart
        //the only value that is important is the product id

        $item = new CartItem("", 0, 0, $productId, "");

        //read shopping cart from session
        $cart = $_SESSION["cart"];

        //remove item from shopping cart
        $cart->removeItem($item);

        //save shopping cart back into session
        $_SESSION["cart"] = $cart;
    }
}

    //start buffer
    ob_start();



    //display shopping cart
    include "templates/displayShoppingCart.html.php";

    $output = ob_get_clean();
    include "templates/layout.html.php";

?>
