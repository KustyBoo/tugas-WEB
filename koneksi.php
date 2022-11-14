<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "respon_customer";

    $conn = new mysqli($server,$user,$password,$db_name);

    if(!$conn){
        die("Database tidak bisa dihubungkan" . mysqli_connect_error());
    }
?>
