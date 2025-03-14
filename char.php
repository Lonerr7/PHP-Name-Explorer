<?php

require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? '');
if (strlen($char) > 1) {
  $char = $char[0];
}
$char = strtoupper($char);

// Pagination variables
$currentPage = (int) ($_GET['page'] ?? 1);
$limit = 15;

// Fetching name by selected letter
$totalPagesCount = fetch_total_distinct_names_count($char);
$names = fetch_names_by_initial($char, $currentPage, $limit);

render('char.view', [
  'names' => $names,
  'char' => $char,
  'pagination' => [
    'totalPagesCount' => $totalPagesCount,
    'currentPage' => $currentPage,
    'limit' => $limit,
  ],
]);
