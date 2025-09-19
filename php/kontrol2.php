<?php
$price = 120000;
$discount = 0;

if ($price > 100000) {
    $discount = 0.20 * $price;
}

$finalPrice = $price - $discount;

echo "Price: Rp $price <br>";
echo "Discount: Rp $discount <br>";
echo "Final price: Rp $finalPrice";
?>
