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

    function insertNewCustomer($sqlConnection, $first_name, $last_name, $username, $password) {
        $newCustomerStatement = $sqlConnection->query(
            "INSERT INTO customers (first_name, last_name, username, password)
            VALUES
            ('${first_name}', '${last_name}', '${username}', '${password}') "
        );
    }

    function checkUsernamePassword($sqlConnection, $username) {
        $checkUsernamePasswordStatement = $sqlConnection->query(
            "SELECT password FROM customers WHERE username = '${username}'"
        );
        $checkUsernamePassword = $checkUsernamePasswordStatement->fetchAll();
        return $checkUsernamePassword;
    }

    function selectNumbersOrders($sqlConnection) {
        $numberOrderStatement = $sqlConnection->query(
            'SELECT number FROM orders'
        );
        $numberOrder = $numberOrderStatement->fetchAll(PDO::FETCH_COLUMN);
        return $numberOrder;
    }

    function insertNewOrder($sqlConnection, $numberOrder, $username) {
        $insertNewOrderStatement = $sqlConnection->query(
            "INSERT INTO orders (number, date, customer_id)
            VALUES
            ('${numberOrder}', CURRENT_DATE, (SELECT id FROM customers WHERE username = '${username}'))"
        );
    }

    function insertNewOrderProduct($sqlConnection, $productName, $quantity, $numberOrder) {
        $insertNewOrderProductStatement = $sqlConnection->query(
            "INSERT INTO order_product (order_id, product_id, quantity)
            VALUES
            ((SELECT id FROM orders WHERE `number` = '${numberOrder}'), 
            (SELECT id FROM products WHERE `name` = '${productName}'),
            '${quantity}')"
        );
    }
?>