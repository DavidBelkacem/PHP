<?php 

    try 
    {
        $db = new PDO(
            // port=8889
            'mysql:host=localhost; dbname=e-commerce; charset=utf8',
            'david2',
            'mdptest-38'
        );
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
?>