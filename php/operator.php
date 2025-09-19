<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo"5 + 10 = $hasilTambah<br>";
echo"5 - 10 = $hasilKurang<br>";
echo"5 * 10 = $hasilKali<br>";
echo"5 / 10 = $hasilBagi<br>";
echo"5 % 10 = $sisaBagi<br>";
echo"5 ** 10 = $pangkat<br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

var_dump($hasilSama, $hasilTidakSama, $hasilLebihKecil, $hasilLebihBesar, $hasilLebihKecilSama, $hasilLebihBesarSama);

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo"<br>";
var_dump($hasilAnd, $hasilOr, $hasilNotA, $hasilNotB);

$a += $b;
$a -= $b;
$a *= $b;
$a /= $b;
$a %= $b;

echo"<br>";
var_dump($a + $b, $a - $b, $a * $b, $a / $b, $a % $b);

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo"<br>";
var_dump($hasilIdentik, $hasilTidakIdentik);
?>