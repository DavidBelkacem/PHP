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

        <!-- header 
        <?php 
            include "../Etape2/header.html"
        ?>

        <?php

        $products = [
            "banana" => [
                "name" => "banana",
                "price" => 2,
                "weight" => 1,
                "discount" => null,
                "picture_url" => "https://www.jelly-shop.fr/resize/FABF6B_13788762637760.jpg/0/1100/True/jellycat-fruit-fabuleux-banane-17cm.jpg",
            ],
            "pineapple" => [
                "name" => "pineapple",
                "price" => 2.5,
                "weight" => 0.8,
                "discount" => 10,
                "picture_url" => "https://lescureviandesetprimeur.com/wp-content/uploads/2020/04/ananas-pain-de-sucre-cayenne.jpg",
            ],   
        ];

        foreach ($products as $fruit => $features) {
            echo "$fruit :" . "<br>";
            foreach ($features as $feature => $value) {
                if ($feature != "picture_url") {
                    echo "$feature of the product is $value";
                    if ($feature === "price") {
                        echo " €";
                    } 
                    else if ($feature === "weight") {
                        echo " kg";
                    }
                    else if ($feature === "discount") {
                        if ($value === null) {
                            echo "0 ";
                        }
                        echo " %";
                    }
                    echo ".<br>";
                }
                else {
                    echo "<img src=".$features["picture_url"]." alt=\"image\">";
                }
            }
            echo "<br>";
        }
        ?>
    </body>
</html>

