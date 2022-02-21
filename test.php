<?php 
    require "./mysqlconnexion.php";
    require "./requestfunctions.php";
    
    $first_name = "testname";
    $last_name = "testlast";
    $email = "a@a.fr";
    $password = "a";

    insertNewCustomer($mysqlConnection, $first_name, $last_name, $email, $password);
?>
    