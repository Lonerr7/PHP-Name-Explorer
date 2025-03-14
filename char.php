<?php

require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? '');
if (strlen($char) > 1) {
  $char = $char[0];
}
$char = strtoupper($char);

// Fetching name by selected letter
$names = fetch_names_by_initial($char);

render('char.view', [
  'names' => $names,
  'char' => $char
]);
?>
