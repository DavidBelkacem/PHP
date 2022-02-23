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
            require "./requestfunctionsclass.php";
            require "./classes_catalog.php";
        ?>
       
        <div class = "products">
            <?php
            // function getProductData($mysqlConnection, string $name, $information) {
            //     $productDataStatement = $mysqlConnection->query(
            //         "SELECT $information FROM products WHERE name = '$name'"
            //     );
            //     $productData = $productDataStatement->fetchAll(PDO::FETCH_ASSOC);
            //     return $productData;
            // }
            ?>
        
            <?php 

                function displayItem(Item $product) {
                    return '<div class="card_' . $product->getName() . '" card_fruit">
                                <div class="fruit_name">' . $product->getName() . '</div>
                                <div class="fruit_price">' . $product->getPrice() . '</div>
                                <img class="fruit_picture" src=' . $product->getImageUrl() . ' alt="' . $product->getName() . '_picture">  
                            </div>';
                }

                function displayCatalog(Catalog $catalog) {
                    foreach ($catalog as $fruit) {
                        $item = new Item();
                        echo displayItem($fruit);
                    }
                }
               
                echo displayItem($item_1);

                $items = new Catalog($db);
                var_dump($items);

            ?>
        </div>    
    </body>
</html>

