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
            require "./mysqlconnexion.php";
            require "./requestfunctions.php";
            require "./my_functions.php";
            include "./header.html";
            $products = products($mysqlConnection);
        ?>
       
        <div class = "products">
            <?php 
            foreach ($products as $fruitFeatures) {
                $fruitName = $fruitFeatures["name"];
                echo "<div class=\"card_${fruitName} card_fruit\">";
                foreach ($fruitFeatures as $feature => $value) {
                    if ($feature === "price") {
                        echo "<div class= \"fruit_name\"> $fruitName </div>";
                        if ($fruitFeatures["discount"] != 0) {
                            displayCrossedOutPrice($fruitFeatures["price"]);
                        } else {
                            displayPrice($fruitFeatures["price"]);
                        }
                        displayNoVATprice($fruitFeatures["price"]);
                    }
                    elseif ($feature === "discount") {
                        if ($value != 0) {
                            echo "<div class='discountedPrice'>";
                            displayDiscountedPrice($fruitFeatures["price"], $value);
                            echo "</div>";
                        } 
                        else {
                            echo "<br>";
                        }
                    }
                    elseif ($feature === "picture_url") {
                        displayFruitPicture($fruitFeatures["picture_url"] , $fruitFeatures["name"]);
                    } 
                }
                echo "<form method=\"POST\" action=\".\cart.php\">
                    <input type=\"hidden\" name=\"selectedFruit\" value=\"$fruitName\">
                    Quantity : <input type=\"number\" min=\"1\" name=\"quantity\" size=\"6\" required>
                    <button type=\"submit\"> ADD TO BAG</button>
                    </form>";
                echo "</div>";
                echo "<br> <br>";
            }
            ?>
        </div>    
    </body>
</html>

