<?php
    require_once "classes/Authentication.php";

    session_start();
    // session_destroy();

    Authentication::logout();

 ?>
