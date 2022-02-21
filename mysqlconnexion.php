<?php 

    try 
    {
        $mysqlConnection = new PDO(
            'mysql:host=localhost; port=8889; dbname=e-commerce; charset=utf8',
            'david2',
            'mdptest-38'
        );
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
?>