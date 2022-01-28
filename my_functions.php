<?php
    function formatPrice(float $price) {
        echo round($price/100, 2) . " €";
    }

    function priceExcludingVAT(float $priceIncludingVAT) : float {
        return ((100*$priceIncludingVAT)/120);
    }

    function displayDiscountedPrice(float $beforeDiscountPrice, int $discount) : float {
        return $beforeDiscountPrice * (1 - ($discount)/100);
    }
?>