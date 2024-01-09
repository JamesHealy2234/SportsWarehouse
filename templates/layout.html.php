<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> Sports Warehouse Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="css/Desktop.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css" href="<?=$theme?>">
    </head>
    <body class="no-js">
        <div id="menu-container">
            <div class="wrapper">
                <nav>
                    <div id="Fv">
                         <a id="menu-toggle" href="#"> <i class="fas fa-bars"></i>Menu</a>

                         <?php if(isset($_SESSION["username"])): ?>
                             <a id="Lock-icon" href="Admin-page.php"><i class="fas fa-unlock"></i>Admin Panel</a>
                         <?php else: ?>
                             <a id="Lock-icon" href="login.php"><i class="fas fa-lock"></i>Login</a>
                         <?php endif; ?>

                    <div id="menu-wrapper">
                            <a id="Menu-list2" href="ShoppingCart.php"> <i class="fas fa-shopping-cart"></i>View Cart</a>
                                <?php if(isset($_SESSION["cart"])): ?>
                                    <a href="#" id="Amount-incart"> <?=$_SESSION["cart"]->totalItems();?> Items</a>
                                <?php  else: ?>
                                    <a href="#" id="Amount-incart">0 items</a>
                                <?php endif; ?>
                        </div>
                    </div>
                </nav>
                <ul id="normal">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="#">About SW</a></li>
                    <li><a href="Contact.php">Contact US</a></li>
                    <li><a href="Search.php?search=&SrcButton=">View Products</a></li>
                </ul>

                <nav id="menu" class="show">
                    <ul>
                        <?php if(isset($_SESSION["username"])): ?>
                            <li><a href="Admin-page.php" id="Lock-icon2"><i class="fas fa-unlock"></i>Admin Panel</a></li>
                        <?php else: ?>
                            <li><a href="login.php" id="Lock-icon2"><i class="fas fa-lock"></i>Login</a></li>
                        <?php endif; ?>

                        <li><a href="home.php"><img src="images/round_radio_button_unchecked_white_18dp.png" alt="circle-img" class="circle"> Home</a></li>
                        <li><a href="#"><img src="images/round_radio_button_unchecked_white_18dp.png" alt="circle-img" class="circle"> About SW</a></li>
                        <li><a href="Contact.php"><img src="images/round_radio_button_unchecked_white_18dp.png" alt="circle-img" class="circle"> Contact Us</a></li>
                        <li><a href="Search.php?search=&SrcButton="><img src="images/round_radio_button_unchecked_white_18dp.png" alt="circle-img" class="circle"> View Products</a></li>
                    </ul>
                </nav>
            </div>
        </div>

<div class="wrapper">
                <section id="LogoImg">
                    <img src="images/LogoLarge.gif" class="MainHLogo" alt="logo-image" width="350">

                    <?php include 'templates/SearchForm.html.php'; ?>
                </section>

        <?=$output?>
</div>

    <footer id="Footer">
                <div class="footerWrap">
                    <div class="siteNavigation">
                        <div class="articleSportsW">
                            <p class="P0">Site Navigation</p>
                        </div>

                        <nav class="NavFooter">
                            <ul>
                                <li class="itemVn"><a href="home.php"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Home</a></li>
                                <li class="itemVn"><a href="#"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">About Sw</a></li>
                                <li class="itemVn"><a href="Contact.php"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Contact Us</a></li>
                                <li class="itemVn"><a href="Search.php?search=&SrcButton="><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">View Products</a></li>
                                <li class="itemVn"><a href="#"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Privacy Policy</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="ProductsCategoriesDiv">
                        <div class="ProductsCategories">
                            <p class="ProductText">Product Categories</p>
                        </div>

                        <nav class="ProductFooter">
                            <ul>
                                <li class="ProdItem"><a href="home.php?id=1"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Shoes</a></li>
                                <li class="ProdItem"><a href="home.php?id=2"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Helmets</a></li>
                                <li class="ProdItem"><a href="home.php?id=3"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Pants</a></li>
                                <li class="ProdItem"><a href="home.php?id=4"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Tops</a></li>
                                <li class="ProdItem"><a href="home.php?id=5"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Balls</a></li>
                                <li class="ProdItem"><a href="home.php?id=6"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Equipment</a></li>
                                <li class="ProdItem"><a href="home.php?id=7"><img src="images/SportsImages/Rectangle1.png" alt="rectangle img" style="vertical-align:middle">Training Gear</a></li>
                            </ul>
                        </nav>
                    </div>

                <div class="ContactSection">
                        <div class="articleSportsW">
                            <p>Contact Sports Warehouse</p>
                        </div>

                        <div class="social-media-icons">
                            <div>
                                <a href="https://www.facebook.com/james.healy.1800"><i class="fab fa-facebook-f"></i></a>
                                <p>Facebook</p>
                            </div>

                            <div>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                                <p>Twitter</p>
                            </div>

                            <div>
                                <a href="#"><i class="far fa-paper-plane"></i></a>
                                <p>Other</p>
                            </div>
                        </div>

                        <div id="DifferentCon">
                            <ul>
                                <li><a href="#">Online Form</a></li>
                                <li><a href="#">Email</a></li>
                                <li><a href="#">Phone</a></li>
                                <li><a href="#">Address</a></li>
                            </ul>
                        </div>

                    </div>

                </div>

                    <div class="Footer-Copyright">
                        <p> &copy; Copyright 2019 Sports WareHouse. <br class="br-remove">
                            All Rights Reserved. <br class="br-remove">
                            Website made by Awesomesauce Design.
                        </p>
                    </div>
            </footer>


                <script
                    src="https://code.jquery.com/jquery-3.4.1.min.js"
                    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                    crossorigin="anonymous">
                </script>



                <!-- include Jquery plugin resources after library has been implemented-->

                <script src="plugins/jquery.validate/jquery.validate.min.js"></script>

                <script src="scripts/checkoutApp.js"></script>


                <!-- Include Jquery plugins after including the Jquery Library-->
                <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
                <!--Initialisation code for the Jquery pugins -->


                <script>
                // Using Jquery - wait untill the page has finished loading before running the JS code
                    $(document).ready(function(){

                // Slideshow is hidden by default - this will unhide it when JS is ready and available
                    $('#slideshow').removeClass('loading');



                    // Activate and customise the Bx-slider Slideshow
                    $('.bxslider').bxSlider({
                        mode: 'horizontal', // 'horizontal', 'vertical', 'fade'
                        captions: false,
                        pager: true,
                        auto: true,
                        pause: 3000,        //how long is each slide show
                        touchEnabled: false,
                        speed: 500,           //Transition speed
                        autoHover: true       //pause slideshow
                    });

                    // var chromePointerEvents = typeof PointerEvent === 'function'; if (chromePointerEvents) { if (orig.pointerId === undefined) { return; } }
                    // touchPoints = (typeof orig.changedTouches !== 'undefined') ? orig.changedTouches : [orig];
                })
                </script>


                <script type="text/javascript">

                    // remove the no js class

                    document.body.classList.remove('no-js');

                    //
                    // // find menu toggle and add click event
                    // document.getElementById("menu-toggle").addEventListener("click", function (event)
                    // {
                    //     //STOP HYPERLINK NAVIGATION
                    //     event.preventDefault();
                    //
                    //     //toggle (add/remove) Css class on the menu
                    //     document.getElementById("menu").classList.toggle("show");
                    //
                    // })

                    //stop hyperlink navigation
                    //Toggle (add/remove) CSS class on the menu

                    /*
                    * Same same, but with error checking  and newer Js
                    * NOTE: use Babel.js to make your brand new Js code work in old(er) browser.
                    */

                    document.addEventListener("DOMContentLoaded", () => {

                     //get the toggle button and the menu

                    let toggle = document.getElementById("menu-toggle");
                    let menu = document.getElementById("menu");

                    //make sure menu and toggle button exist
                    if(toggle && menu)
                    {

                        //remove the "hide" and "show" classes from the menu toggle
                        toggle.classList.remove("hide");
                        menu.classList.remove("show");



                        // Add click event listener to toggle button
                        toggle.addEventListener("click", (event) => {

                            //STOP HYPERLINK NAVIGATION
                            event.preventDefault();

                            //toggle (add/remove) Css class on the menu
                            menu.classList.toggle("show");

                        });
                    }

                });
                </script>


    </body>
</html>
