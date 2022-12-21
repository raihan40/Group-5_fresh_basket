<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fresh_basket";

    $con = mysqli_connect($servername,$username,$password,$dbname);
    if (mysqli_connect_errno()) {
        echo "Failed to connect!";
        die();
}
?>