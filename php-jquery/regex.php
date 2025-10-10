<?php
$pattern = '/[a-z]/'; // Cocokkan huruf kecil
$text = 'This is a Sample Text.';

if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "Tidak ada huruf kecil!";
}

$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'There are 123 apples.';

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';

$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text; // Output: "I like banana pie."

$pattern = '/go*d/'; // Cocokkan "god", "good", "gooood", dll.
$text = 'god is good.';

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}   

echo "<br><br>";
//Question 5.5
// Pola menggunakan '?' → karakter 'o' boleh muncul 0 atau 1 kali
$pattern = '/go?d/'; // Akan cocok dengan "gd" atau "god"
$text = 'god is good and gd.';

if (preg_match_all($pattern, $text, $matches)) {
    echo "Cocokkan: " . implode(", ", $matches[0]);
} else {
    echo "Tidak ada yang cocok!";
}
echo "<br><br>";
// Question 5.6
// Pola menggunakan {n,m} → karakter 'o' muncul antara 2 sampai 4 kali
$pattern = '/go{2,4}d/'; // Akan cocok dengan "good", "goood", dan "gooood"
$text = 'god is good, goood, and gooood.';

if (preg_match_all($pattern, $text, $matches)) {
    echo "Cocokkan: " . implode(", ", $matches[0]);
} else {
    echo "Tidak ada yang cocok!";
}
