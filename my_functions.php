<?php

    function formatPrice($price) {
        echo number_format($price, 2, ",", " ");
    }

    function formatNumber($number) {
        return number_format($number, 0, ",", " ");
    }

    function priceExcludingVAT(float $price) : float {
        return ((100*$price)/120);
    }

    function discountedPrice(float $price, int $discount) : float {
        return $price * (1 - ($discount)/100);
    }

    function displayCrossedOutPrice($price) {
        echo "<br> <del class='exPrice'> Price : ";
        formatPrice($price);
        echo " £ </del>";
    }

    function displayPrice(float $price) {
        echo "<br> <span class='price'> Price : ";
        formatPrice($price);
        echo " £ </span>";
    }

    function displayNoVATPrice (float $price) {
        $priceNoVAT = priceExcludingVAT($price);
        echo "<br>" . "<span class =\"No_VAT_Price\"> (Excluding VAT : "; 
        formatPrice($priceNoVAT);
        echo " £ ) </span> <br>";
    }
    
    function displayDiscountedPrice($price, $discount) {
        echo "${discount} % discount ! NEW PRICE : ";
        formatPrice(discountedPrice($price, $discount));
        echo " £";
    }
    
    function displayFruitPicture($url, $alt) {
        echo "<img class='fruitPicture' src=${url} alt=${alt}>" ;
    }

    function calculateTotalPrice(string $price, string $quantity) {
        return (float)$price * (float)$quantity;
    }

    function shippingCostsDHL($weight, $totalPrice) {
        if ($weight < 2000) {
            return 300;
        } elseif (2000 <= $weight and $weight < 5000 ) {
            return ($totalPrice * 0.05 + 300);
        } else {
            return ($totalPrice * 0.04 + 250);;
        }
    }
    
    function shippingCostsLaPoste($weight, $totalPrice) {
        if ($weight < 2000) {
            return 250;
        } elseif (2000 <= $weight and $weight < 5000) {
            return ($totalPrice * 0.03 + 200);
        } else {
            return ($totalPrice * 0.06 + 150);
        }
    }

    function weightCalculator($unitWeight, $quantity) {
        return ($unitWeight * $quantity) ;
    }

    function generateRandomNumberOrder($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function testGenerateRandomString($sqlConnection) {
        $numbersOrders = selectNumbersOrders($sqlConnection);
        $randomNumberOrder = generateRandomNumberOrder();
        $uniqueNumberOrder = false;
        while (!$uniqueNumberOrder) {
            foreach ($numbersOrders as $numberOrder) {
                if ($randomNumberOrder == $numberOrder) {
                    $randomNumberOrder = generateRandomNumberOrder();
                    break;
                }
            }
            $uniqueNumberOrder = true;
        }
        return $randomNumberOrder;
    }

?>
