<?php
require __DIR__ . '/inc/all.inc.php';

$char = $_GET['char'] ?? 'A';
if (strlen($char) > 1) {
  $char = $char[0];
}

// Fetch names for the selected char
$names = fetch_names_by_letter($char) ?? [];

render('char.view', [
  'char' => $char,
  'names' => $names
]);
