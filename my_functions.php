<?php
    function formatPrice(float $price) {
        echo number_format($price/100, 2, ".", " ") . " €";
    }

    function formatPriceWithReturn(float $price) {
        return number_format($price/100, 2, ".", " ");
    }

    function priceExcludingVAT(float $price) : float {
        return ((100*$price)/120);
    }

    function discountedPrice(float $price, int $discount) : float {
        return $price * (1 - ($discount)/100);
    }

    function displayCrossedOutPrice(float $price) {
        echo "<br> <del> Price : ";
        formatPrice($price);
        echo "</del>";
    }

    function displayPrice(float $price) {
        echo "<br> Price : ";
        formatPrice($price);
    }

    function displayNoVATPrice (float $price) {
        $priceNoVAT = priceExcludingVAT($price);
        echo "<br>" . "<span class =\"No_VAT_Price\"> (Excluding VAT : "; 
        formatPrice($priceNoVAT);
        echo " ) </span> <br>";
    }
    
    function displayDiscountedPrice(float $price, int $discount) {
        echo "NEW PRICE ! ${discount} % discount : ";
        formatPrice(discountedPrice($price, $discount));
    }
    
    function displayFruitPicture($url, $alt) {
        echo "<img class=\"fruitPicture\" src=${url} alt= ${alt} >" ;
    }

    function calculateTotalPrice(string $price, string $quantity) {
        return $price * $quantity;
    }

    function shippingCostsDHL($weight, $totalPrice) {
        if ($weight < 500) {
            return 5.00;
        } elseif (500 <= $weight and $weight < 2000 ) {
            return ($totalPrice * 0.1);
        } else {
            return ($totalPrice * 0.04);;
        }
    }
    
    function shippingCostsLaPoste($weight, $totalPrice) {
        if ($weight < 500) {
            return 9.00;
        } elseif (500 <= $weight and $weight < 2000) {
            return ($totalPrice * 0.08);
        } else {
            return ($totalPrice * 0.05);
        }
    }

    function weightCalculator($unitWeight, $quantity) {
        return ($unitWeight * $quantity) ;
    }


?>
