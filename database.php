<?php 
    try 
    {
        $mySqlConnection = new PDO(
            'mysql:host=localhost; dbname=e-commerce; charset=utf8',
            'david2',
            'mdptest-38'
        );
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    // QUERY 1

    function displayField($sqlConnection, $function) {
        $fieldStatement =  $sqlConnection->query(
            $function
        );
        $field = $fieldStatement->fetchAll();
        var_dump($field);
    }

    
    function products2() {
        $query = 'SELECT price FROM products WHERE id=0';
        return $query;
    }
    
    function products($sqlConnection) {
        $productsStatement = $sqlConnection->query(
            'SELECT * FROM products'
        );
        $products = $productsStatement->fetchAll();
        return $products;
    }

    displayField($mySqlConnection, products2());

    // function getUnitPrice($sqlConnection, $name)
    //     $unitPriceStatement =  $sqlConnection->query(
    //         'SELECT price FROM products
    //         WHERE name = $name'
    //     );
    //     $unitPrice = $unitPriceStatement->
    

    // // QUERY 2

    // $soldOutStatement = $mysqlConnection->prepare(
    //     'SELECT * FROM products WHERE quantity=0'
    // );
    // $soldOutStatement->execute();
    // $soldOutProducts = $soldOutStatement->fetchAll();

    // // QUERY 5

    // $listOrder1ProductsStatement = $mysqlConnection->prepare(
    //     'SELECT 
    //         products.name, 
    //         order_product.quantity,
    //         products.price
    //     FROM 
    //         order_product
    //     INNER JOIN products ON products.id = order_product.product_id
    //     WHERE order_product.order_id = 1'
    // );
    // $listOrder1ProductsStatement->execute();
    // $listOrder1Products = $listOrder1ProductsStatement->fetchAll();

    // // QUERY 6

    // $listOfAllOrdersStatement = $mysqlConnection->prepare(
    //     'SELECT
    //     number,
    //     SUM(price * order_product.quantity) as total
    // FROM 
    //     order_product
    //         INNER JOIN
    //     products ON products.id = order_product.product_id
    //         INNER JOIN
    //     orders ON orders.id = order_product.order_id
    // GROUP BY
    //     number'
    // );
    // $listOfAllOrdersStatement->execute();
    // $listOfAllOrders = $listOfAllOrdersStatement->fetchAll();

    // $productss = products($mysqlConnection);
    // foreach ($productss as $product) {
    //     echo $product["name"];
    // }

    // $test = products($mysqlConnection);
    // echo '<pre>';
    // var_dump($test);
    // echo '</pre>';

    
    // echo("--------------------------------------------------------\n");
    // var_dump($soldOutProducts);
    // echo("--------------------------------------------------------\n");
    // var_dump($listOrder1Products);
    // echo("--------------------------------------------------------\n");
    // var_dump($listOfAllOrders);
    // echo("--------------------------------------------------------\n");

?>