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
            require "./my_functions.php";
            include "./header.html";
            include "./array_products.php";
        ?>
       
        <div class = "products">
            <?php
            foreach ($products as $fruit => $features) {
                echo "<div class=\"card_${fruit} card_fruit\">";
                foreach ($features as $feature => $value) {
                    if ($feature === "price") {
                        echo "<span class= \"fruit_name\"> $fruit </span>";
                        if ($features["discount"] !== 0) {
                            displayCrossedOutPrice($features["price"]);
                        } else {
                            displayPrice($features["price"]);
                        }
                        displayNoVATprice($features["price"]);
                    }
                    elseif ($feature === "discount") {
                        if ($value !== 0) {
                            displayDiscountedPrice($features["price"], $value);
                        } 
                        else {
                            echo "<br>";
                        }
                    }
                    elseif ($feature === "picture_url") {
                        displayFruitPicture($features["picture_url"] , $features["name"]);
                    } 
                }
                echo "<form method=\"POST\" action=\".\cart.php\">
                    Quantity : <input type=\"number\" action=\"cart.php\" min=\"1\" name=\"quantity\" size=\"6\" required>
                    <button type=\"submit\"> ADD TO BAG</button>
                    <input type=\"hidden\" name=\"selectedFruit\" value=\"${fruit}\">
                    </form>";
                echo "</div>";
                echo "<br> <br>";
            }
            ?>
        </div>    
    </body>
</html>

