<?php
    function products($sqlConnection) {
        $productsStatement = $sqlConnection->query(
            'SELECT * FROM products'
        );
        $products = $productsStatement->fetchAll();
        return $products;
    }

    function getProductID($sqlConnection, $name) {
        $productIDStatement = $sqlConnection->query(
            "SELECT id FROM products WHERE name = ${name}"
        );
        $productID = $productIDStatement->fetchAll();
        return $productID[0]["id"];
    }
?>