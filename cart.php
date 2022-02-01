<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Document</title>
    </head>
    <body>
        <?php 
            include "./array_products.php";
            require "./my_functions.php";
            include "./header.html";

            if (empty($_POST)) {
                echo "Please order an item on the page <a href=\"http://localhost/PHP/multidimensional-catalogwithfunction.php\"> catalog </a>";
                exit;
            } elseif (!is_numeric($_POST["quantity"]) || (is_numeric($_POST["quantity"]) && (($_POST["quantity"] < 1) || (strpos($_POST["quantity"], ".")))) ) {
                echo "Your entry is not valid, please enter a strictly positive integer. Come back to the <a href=\"http://localhost/PHP/multidimensional-catalogwithfunction.php\"> catalog </a>";
                exit;
            } 
      
            $selectedFruit = $_POST["selectedFruit"];
            $nbrOfFruits = $_POST["quantity"];
            $unitPrice = $products[$selectedFruit]["price"];
            $discountedUnitPrice = discountedPrice($products[$selectedFruit]["price"], $products[$selectedFruit]["discount"]);
            $totalPrice = calculateTotalPrice($discountedUnitPrice, $nbrOfFruits);
            $excludingVATTotal = priceExcludingVAT($totalPrice);
            $VAT = $totalPrice - $excludingVATTotal;
            $totalWeight = weightCalculator($products[$selectedFruit]["weight"], $nbrOfFruits); 

            if (isset($_POST["carrier"])) {
                if ($_POST["carrier"] === "La Poste") {
                    $shippingCosts = shippingCostsLAPoste($totalWeight, $totalPrice);
                } else {
                    $shippingCosts = shippingCostsDHL($totalWeight, $totalPrice);
                }
                $totalWithShippingCosts = $totalPrice + $shippingCosts;
            }

        ?>

        <table class="table table-striped table-dark">
            <tr>
                <th scope="col"> Product </th>
                <th scope="col"> Unit Price</th>
                <th scope="col"> Discounted Unit Price </th>
                <th scope="col"> Quantity</th>
                <th scope="col"> Total</th>
            </tr>
            <tr>
                <td> <?= $selectedFruit ?> </td>
                <td> <?= formatPriceWithReturn($unitPrice) ?> </td>
                <td> <?= formatPriceWithReturn($discountedUnitPrice) ?> </td>
                <td> <?= formatNumber($nbrOfFruits) ?> </td>
                <td> <?= formatPriceWithReturn($totalPrice) ?> </td>
            </tr>
            <tr>
                <td colspan="4" class="tableToStyle"> Excluding VAT total </td>
                <td> <?= formatPriceWithReturn($excludingVATTotal) ?> </td>
            </tr>
            <tr>
                <td colspan="4"> VAT Total </td>
                <td> <?= formatPriceWithReturn($VAT) ?> </td>
            </tr>
            <tr>
                <td colspan="4"> Including VAT Total </td>
                <td> <?= formatPriceWithReturn($totalPrice) ?> </td>
            </tr>
            <tr>
                <?php 
                if (isset($shippingCosts)) {
                    echo "<td colspan=\"4\"> Shipping Costs </td>";
                    echo "<td>" . formatPriceWithReturn($shippingCosts) . "</td>" ;
                }
                ?>
            </tr>
            <tr>
                <?php 
                    if (isset($shippingCosts)) {
                        echo "<td colspan=\"4\"> Total with shipping costs </td>";
                        echo "<td>" . formatPriceWithReturn($totalWithShippingCosts) ."</td>";
                    }
                ?>
            </tr>
        </table>

        <form method="POST">
            <input type="hidden" name="selectedFruit" value="<?= $selectedFruit ?>">
            <input type="hidden" name="quantity" value="<?= $nbrOfFruits ?>">
            <label for="select_carrier"> Select a carrier </label>
            <select name="carrier" id="select_carrier" required="">
                <option value=""> Please choose a carrier </option>
                <option value="La Poste" > La Poste </option>
                <option value="DHL"> DHL </option>
            </select>
            <button type="submit"> Send </button>
        </form>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>