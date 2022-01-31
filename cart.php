<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php 
            include "./array_products.php";
            include "./my_functions.php";
            var_dump($_POST);
            echo "<br>";
            var_dump(array_keys($_POST));
            echo "<br>";
            $selectedFruit = $_POST["selectedFruit"];
            var_dump($selectedFruit);
            echo "<br>";
            $nbrOfFruits = $_POST["quantity"];
            $price = formatPriceWithReturn($products[$selectedFruit]["price"]);
            $discountedUnitPrice = formatPriceWithReturn(discountedPrice($products[$selectedFruit]["price"], $products[$selectedFruit]["discount"]));
            $totalPrice = calculateTotalPrice($discountedUnitPrice, $nbrOfFruits);
            $excludingVATTotal = priceExcludingVAT($totalPrice);
            $VAT = $totalPrice - $excludingVATTotal;
            $totalWeight = weightCalculator($products[$selectedFruit]["weight"], $nbrOfFruits);

            if (isset($_POST["carrier"])) {
                if ($_POST["carrier"] = "La Poste") {
                    $shippingCosts = shippingCostsLAPoste($totalWeight, $totalPrice);
                } else {
                    $shippingCosts = shippingCostsDHL($totalWeight, $totalPrice);
                }
            }
            if (isset($shippingCosts)) {
                echo "shipping Costs :";
                var_dump($shippingCosts);
                echo "<br>";
            }
        ?>

        <table>
            <tr>
                <th scope="col"> Product </th>
                <th scope="col"> Unit Price</th>
                <th scope="col"> Discounted Unit Price </th>
                <th scope="col"> Quantity</th>
                <th scope="col"> Total</th>
            </tr>
            <tr>
                <td> <?= $selectedFruit ?> </td>
                <td> <?= $price ?> </td>
                <td> <?= $discountedUnitPrice ?> </td>
                <td> <?= $nbrOfFruits ?> </td>
                <td> <?= $totalPrice ?> </td>
            </tr>
            <tr>
                <td colspan="4"> Excluding VAT total </td>
                <td> <?= $excludingVATTotal ?> </td>
            </tr>
            <tr>
                <td colspan="4"> VAT Total </td>
                <td> <?= $VAT ?> </td>
            </tr>
            <tr>
                <td colspan="4"> Including VAT Total </td>
                <td> <?= $totalPrice ?> </td>
            </tr>
        </table>
        
        <?php 
            $boolean = false;
            if (isset($_POST["carrier"]) and ($_POST["carrier"] === "DHL")) {
                $boolean = true;
            }
        ?>

        <form method="POST">
            <input type="hidden" name="selectedFruit" value="<?= $selectedFruit ?>">
            <input type="hidden" name="quantity" value="<?= $nbrOfFruits ?>">
            <label for="select_carrier"> Select a carrier </label>
            <select name="carrier" id="select_carrier" required="">
                <option value=""> Please choose a carrier </option>
                <option value="La Poste" > La Poste </option>
                <option value="DHL" <?php echo $boolean ? "selected" : "" ?>> DHL </option>
            </select>
            <button type="submit"> Send </button>
        </form>

        <?php var_dump($_POST) ?> 

    </body>
</html>