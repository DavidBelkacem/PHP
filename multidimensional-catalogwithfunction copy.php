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
            try 
            {
                $mysqlConnection = new PDO(
                    'mysql:host=localhost; dbname=e-commerce; charset=utf8',
                    'david2',
                    'mdptest-38'
                );
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }

            require "./database.php";
            require "./my_functions.php";
            include "./header.html";

        ?>
       
        <div class = "products">
            <?php 
            $products = products($mysqlConnection);
            foreach ($products as $product) { 
                $fruitName = $product["name"]; ?>
                <div class="card_<?=$product["name"]?> card_fruit">
                <?php foreach ($product as $feature => $value) { 
                    if ($feature === "picture_url") {
                        displayFruitPicture($product["picture_url"] , $product["name"]);
                    } 
                    elseif ($feature === "price") { ?>
                        <span class=<?=$product["name"]?>> <?=$product["name"]?> </span>
                        <?php if ($product["discount"] != 0) {
                            displayCrossedOutPrice($value);
                        } else {
                            displayPrice($value);
                        }
                        displayNoVATprice($value);
                    }
                    elseif ($feature === "discount") {
                        if ($value != 0) {
                            displayDiscountedPrice($product["price"], $value);
                        } 
                        else {
                            echo "<br>";
                        }
                    }
                }
                echo "<form method=\"POST\" action=\".\cart.php\">
                    Quantity : <input type=\"number\" min=\"1\" name=\"quantity\" size=\"6\" required>
                    <button type=\"submit\"> ADD TO BAG</button>
                    <input type=\"hidden\" name=\"selectedFruit\" value=\"$fruitName\">
                    </form>";
                echo "</div>";
                echo "<br> <br>";
            }

            ?>
        </div>    
    </body>
</html>

