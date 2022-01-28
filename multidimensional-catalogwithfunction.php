<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style_catalog.css"/>
        <title>multidimensional catalog</title>
    </head>
    <body>

        <?php 
            include "./my_functions.php";
            include "./header.html";
            include "./array_products.php";
        ?>
       
        <div class = "products">
            <?php
            foreach ($products as $fruit => $features) {
                echo "<div class=\"card_${fruit}\">";
                echo "<span class= \"fruit_name\"> $fruit </span>" . "<br>";
                foreach ($features as $feature => $value) {
                    if ($feature === "price") {
                        echo "<br> Price : ";
                        formatPrice($features[$feature]);
                        $priceNoVAT = priceExcludingVAT($features[$feature]);
                        echo "<br>" . "Excluding VAT : "; 
                        formatPrice($priceNoVAT);
                        echo "<br>";
                    }
                    elseif ($feature === "discount") {
                        if ($value !== 0) {
                            echo "NEW PRICE ! ${value} % discount : ";
                            formatPrice(displayDiscountedPrice($features["price"], $value));
                        } 
                        else {
                            echo "<br>";
                        }
                    }
                    elseif ($feature === "picture_url") {
                        echo "<img src=${features["picture_url"]} alt= ${features["name"]} size>" ;
                    } 
                }
                echo "<form method=\"get\">
                    Quantity : <input type=\"number\" name=\"${fruit}_quantity\" size=\"7\">
                    </form>";
                echo "</div>";
                echo "<br> <br>";
            }
            ?>
        </div>     
    </body>
</html>

