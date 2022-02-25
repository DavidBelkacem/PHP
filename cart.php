<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./styles/style_cart.css"/>
        <title>Cart</title>
    </head>
    <body>
        <?php 

            include "./header.html";
            require "./mysqlconnexion.php";
            require "./my_functions.php";
            require "./requestfunctions.php";
    
            $productsdb = products($db);
            if (!empty($_POST) && isset($_POST["quantity"]) && isset($_POST["selectedFruit"])) {
                // vérifie que la quantité est bien un int positif
                if (!is_numeric($_POST["quantity"]) || (is_numeric($_POST["quantity"]) && (($_POST["quantity"] < 1) || (strpos($_POST["quantity"], ".")))) ) {
                    echo "Your entry is not valid, please enter a strictly positive integer. Come back to the <a href=\"http://localhost/PHP/multidimensional-catalogwithfunctioncopy3.php\"> catalog </a>";
                    exit;
                } 
                $selectedFruit = $_POST["selectedFruit"];
                $nbrOfFruits = $_POST["quantity"];

                $articleValidation = false;
                for ($i = 0; $i < count($productsdb); $i++) {
                    if ($selectedFruit === $productsdb[$i]["name"]) {
                        $articleValidation = true;
                        break;
                    }
                }
                if (!$articleValidation) {
                    echo "Please, choose a valid item on the <a href=\"http://localhost/PHP/multidimensional-catalogwithfunctioncopy3.php/\"> catalog </a>";
                    exit;
                }
                $_SESSION["fruit"][$selectedFruit]["name"] = $selectedFruit;
                $_SESSION["fruit"][$selectedFruit]["quantity"] = $nbrOfFruits;
            // } 
            // elseif (!empty($_POST) && !isset($_POST["carrier"])) {
            //     echo "Go back to the cart : <a href=\"http://localhost/PHP/cart.php\"> Cart </a>";
            //     exit;
            } elseif (empty($_POST) && empty($_SESSION)) {
                echo "Please order an item on the page <a href=\"http://localhost/PHP/multidimensional-catalogwithfunctioncopy3.php/\"> catalog </a>";
                exit;
            }
            
            if (isset($_POST["payButton"]) && ($_POST["payButton"] == "yes")) {
                $orderNumber = testGenerateRandomString($db);
                insertNewOrder($db, $orderNumber, $_SESSION["login"]["username"]);
                foreach ($_SESSION["fruit"] as $fruitName => $orderedFruitFeatures) {
                    insertNewOrderProduct($db, $fruitName, $orderedFruitFeatures["quantity"], $orderNumber);
                }
                echo "Thanks for your order !";
                session_destroy();
                exit;
            }

            // echo "<pre>";
            // var_dump($_SESSION);
            // echo "</pre>";

            // echo "<pre>";
            // echo "products";
            // var_dump($productsdb);
            // echo "</pre>";

            // $totalWeight = 0;
            // if (isset($_SESSION)) {
            //     foreach ($_SESSION as $fruit => $array_fruit) {
            //         $totalWeight += ($products[$fruit]["weight"] * $array_fruit["quantity"]);
            //     }
            // }
        ?>

        <table class="table table-striped table-dark">
            <tr>
                <th scope="col"> Product </th>
                <th scope="col"> Unit Price</th>
                <th scope="col"> Discounted Unit Price </th>
                <th scope="col"> Quantity</th>
                <th scope="col"> Total</th>
            </tr>
            
            <?php $totalPrice = 0; ?>
            <?php foreach ($_SESSION["fruit"] as $fruitInCart => $array_fruit) { 
                $fruitID = (int)getProductID($db, "'${fruitInCart}'") - 1;
                ?> 
                
            <tr>
                <td> <?= $fruitInCart?> </td>
                <td> <?= formatPrice($productsdb[$fruitID]["price"])?> </td>
                <td> <?php  $discountedUnitPrice = (discountedPrice($productsdb[$fruitID]["price"], $productsdb[$fruitID]["discount"]));
                    echo formatPrice($discountedUnitPrice)   ?> </td>
                <td> <?= formatNumber($array_fruit["quantity"]) ?> </td>
                <td> <?php $totalPriceProduct = (calculateTotalPrice($discountedUnitPrice, $array_fruit["quantity"]));
                    echo formatPrice($totalPriceProduct) ?> </td>
            </tr>
            <?php $totalPrice += $totalPriceProduct; ?>
            <?php } ?>
        
            <tr>
                <td colspan="4" class="tableToStyle"> Excluding VAT total </td>
                <td> <?php $excludingVATTotal = priceExcludingVAT($totalPrice);
                    echo formatPrice($excludingVATTotal) ?> </td>
            </tr>
            
            <tr>
                <td colspan="4"> VAT Total </td>
                <td> <?= formatPrice($totalPrice - $excludingVATTotal) ?> </td>
            </tr>

            <tr>
                <td colspan="4"> Including VAT Total </td>
                <td> <?= formatPrice($totalPrice) ?> </td>
            </tr>
            
            <?php 
            //     if (isset($_POST["carrier"])) {
            //         if ($_POST["carrier"] === "La Poste") {
            //             $shippingCosts = shippingCostsLAPoste($totalWeight, $totalPrice);
            //         } else {
            //             $shippingCosts = shippingCostsDHL($totalWeight, $totalPrice);
            //         }
            //         $totalWithShippingCosts = $totalPrice + $shippingCosts;
            //     }
            // ?>

            <tr>
                <?php
                if (isset($shippingCosts)) {
                    echo "<td colspan=\"4\"> Shipping Costs </td>";
                    echo "<td>" . formatPrice($shippingCosts) . "</td>" ;
                } ?>
            </tr>

            <tr class="totalPrice">
                <?php 
                    if (isset($shippingCosts)) {
                        echo "<td colspan=\"4\"> Total with shipping costs </td>";
                        echo "<td>" . formatPrice($totalWithShippingCosts) ."</td>";
                    }
                ?>
            </tr>
        </table>

        
        <?php 
        if (!isset($_SESSION["login"])) { ?>
            <form method="POST" action=".\checkout.php">
                <button class="buttonOrder" type="submit"> Order </button>
            </form>
            <a href= "multidimensional-catalogwithfunctioncopy3.php">
                <button class="buttonCatalog" type="submit"> Back to catalog </button>
            </a>
        <?php } else {?>
            <form method="POST">

                <button class="button-pay" type="submit" name="payButton" value="yes"> Pay </button>
            </form>
            <a href= "multidimensional-catalogwithfunctioncopy3.php">
            <button class="buttonCatalog" type="submit"> Back to catalog </button>
            </a>
        <?php } ?>
        <!--  <form method="POST">
             <label for="select_carrier"> Select a carrier </label>
             <select name="carrier" id="select_carrier" required="">
                 <option value=""> Please choose a carrier </option>
                 <option value="La Poste" > La Poste </option>
                 <option value="DHL"> DHL </option>
             </select>
             <button type="submit"> Send </button>
         </form> -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>