<?php

    // very important to get the session variables 
    session_start();

    session_unset();

    // redirect to login page on logout
    header('location:../index.php');

?>