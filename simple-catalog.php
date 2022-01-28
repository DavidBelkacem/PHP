<?php
$products = ["iPhone", "iPad", "iMac"];
echo "Before sorting :" . "<br>";
print_r($products);
sort($products);
echo "<br>" . "After sorting :" . "<br>";
print_r($products);
echo "<br>" . "$products[0]" . "<br>";
echo $products[2];
?>