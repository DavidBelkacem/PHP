<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="./styles/style_catalog.css"/>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet"> 

        <title>Tiki's Catalog</title>
    </head>
    <body>

        <?php 
            include "./header.html";
            require "./mysqlconnexion.php";
            require "./classes_catalog.php";
            require "./functionsclass.php";
        ?>
       
        <div class = "products">
            <?php 
                $catalogue = new Catalog($db);
                displayCatalog($catalogue);
            ?>
        </div>    
    </body>
</html>

