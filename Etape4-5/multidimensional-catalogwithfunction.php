<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>multidimensional catalog</title>
    </head>
    <body>

        <?php 
            include "./my_functions.php";
        ?>

        <!-- header -->
        <?php 
            include "../Etape2/header.html"
        ?>

        <?php

        $products = [
            "banana" => [
                "name" => "banana",
                "price" => 200,
                "weight" => 1,
                "discount" => 0,
                "picture_url" => "https://www.jelly-shop.fr/resize/FABF6B_13788762637760.jpg/0/1100/True/jellycat-fruit-fabuleux-banane-17cm.jpg",
            ],
            "pineapple" => [
                "name" => "pineapple",
                "price" => 250,
                "weight" => 0.8,
                "discount" => 10,
                "picture_url" => "https://lescureviandesetprimeur.com/wp-content/uploads/2020/04/ananas-pain-de-sucre-cayenne.jpg",
            ],   
        ];

        foreach ($products as $fruit => $features) {
            echo "$fruit :" . "<br>";
            foreach ($features as $feature => $value) {
                if ($feature === "price") {
                    echo "The price of " . $fruit . " is ";
                    echo formatPrice($features[$feature]);
                    echo "<br>" . "Excluding tax price is "; 
                    $priceNoVAT = priceExcludingVAT($features[$feature]);
                    formatPrice($priceNoVAT);
                    echo "<br>";
                }
                elseif ($feature === "discount") {
                    echo "Price after discount : ";
                    formatPrice(displayDiscountedPrice($features["price"], $value));
                    if ($value === 0) {
                        echo " (No discount, bitch ;))";
                    } else {
                        echo " (" . $value . "% discount)";
                    }
                }
            }
            echo "<br> <br>";
        }
        ?>
    </body>
</html>

