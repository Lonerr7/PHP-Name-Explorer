<?php
require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? 'A');

// Input validation
if (strlen($char) > 1) {
  $char = $char[0];
}

$alphabet = gen_alphabet();
if (strlen($char) === 0 || !in_array($char, $alphabet)) {
  header('Location: index.php');
  die();
}

$char = strtoupper($char);

// Fetch names for the selected char
$currentPage = (int) ($_GET['page'] ?? 1);
$limit = 15;
$names = fetch_names_by_letter($char, $currentPage, $limit) ?? [];
$totalNamesCount = fetch_total_distinct_names_count($char);

render('char.view', [
  'char' => $char,
  'names' => $names,
  'pagination' => [
    'currentPage' => $currentPage,
    'totalNamesCount' => $totalNamesCount,
    'limit' => $limit
  ],
]);
