

<?php 

    $nameItem = "banana";
    $priceItem = "2 €/kg";
    $image_url = "https://media.lactualite.com/2014/08/banane.jpg";

    include "./header.html";

    echo "Product : $nameItem" . "<br>";
    echo "Price : $priceItem" . "<br>";
    echo "<img src=\"$image_url\" alt=\"banana\">";

    include "./footer.html";
?>

    