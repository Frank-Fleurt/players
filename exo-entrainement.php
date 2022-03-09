<?php
include('header.php');

$studends = [
  [8, 13, 14],
  [2, 6, 20],
  [19, 11, 1]
];

foreach ($studends as $studend) {
  $moyenne = round(array_sum($studend) / count($studend), 2);
  echo $moyenne . "</br>";
};
