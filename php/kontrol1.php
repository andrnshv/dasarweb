<?php
$grades = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

sort($grades);
$selectedGrades = array_slice($grades, 2, count($grades) - 4);
$total = array_sum($selectedGrades);

echo "Total score after ignoring 2 highest and 2 lowest grades: $total";
?>
