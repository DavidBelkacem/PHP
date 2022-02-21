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

    function insertNewCustomer($sqlConnection, $first_name, $last_name, $email, $password) {
        $newCustomerStatement = $sqlConnection->query(
            "INSERT INTO customers (first_name, last_name, email, password)
            VALUES
            ('${first_name}', '${last_name}', '${email}', '${password}') "
        );
    }

    function checkEmailPassword($sqlConnection, $email) {
        $checkEmaiPasswordStatement = $sqlConnection->query(
            "SELECT password FROM customers WHERE email = '${email}'"
        );
        $checkEmailPassword = $checkEmaiPasswordStatement->fetchAll();
        return $checkEmailPassword;
    }
?>