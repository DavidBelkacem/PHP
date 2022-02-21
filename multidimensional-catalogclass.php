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
            require "./my_functions.php";
            require "./Class_Item.php";
            // echo "<pre>";
            // var_dump($mysqlConnection);
            // echo "</pre>";
            // $productlist = $mysqlConnection->query("SELECT * FROM products");
            // $result=$productlist->fetchAll();
            // var_dump($result);


        ?>
       
        <div class = "products">
            <!-- public function getProductData($mysqlConnection, string $name, $information) {
                $productDataStatement = $mysqlConnection->query(
                    "SELECT $information FROM products WHERE name = '$name'"
                );
                $productData = $productDataStatement->fetchAll();
                return $productData;
            }
            public function __construct(string $name) {
                $this->name = $name;  
                $this->price = getProductData($mysqlConnection, $name, "price");
            } -->
        
            <?php 

                $item_1 = new Item();
                $item_1->name = "pomegrenate";

                function displayItem(Item $product) {
                    echo "<div class=\"card_" . $product->name . " card_fruit\">";
                    echo $product->name ;

                    echo "</div>";
                }
            
                displayItem($item_1);

            ?>
        </div>    
    </body>
</html>

