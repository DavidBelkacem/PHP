<?php 
    require "./mysqlconnexion.php";
    require "./requestfunctions.php";
    require "./my_functions.php";

    function insertNewOrderProduct($sqlConnection, $productName, $quantity, $numberOrder) {
        $insertNewOrderProductStatement = $sqlConnection->query(
            "INSERT INTO order_product (order_id, product_id, quantity)
            VALUES
            ((SELECT id FROM orders WHERE number = '${numberOrder}'), 
            (SELECT id FROM products WHERE name = '${productName}'),
            '${quantity}')"
        );
    }
?>
    