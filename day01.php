<?php

$data = file('day01.input');

$count = 0;
$column1 = [];
$column2 = [];

foreach ($data as $line) {
    $parts = explode('   ', trim($line));
    $column1[]= $parts[0];
    $column2[]= $parts[1];
    ++$count;
}

sort($column1);
sort($column2);

$distance = 0;
for ($i=0; $i < $count; $i++) {
    $distance += abs($column1[$i] - $column2[$i]);
}

echo 'Distance: ';
echo $distance . PHP_EOL;

$seeds = array_unique($column1);
$stack = array_count_values($column2);

$similarity = 0;

foreach ($seeds as $seed) {
    if (array_key_exists($seed, $stack)) {
        $similarity += ($seed * $stack[$seed]);
    }
}

echo 'Similarity: ';
echo $similarity;

