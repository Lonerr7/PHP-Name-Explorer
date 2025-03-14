<?php

require __DIR__ . '/inc/all.inc.php';

$name = (string) ($_GET['name'] ?? '');
if (empty($name)) {
  header('Location: index.php');
  die();
}

// Fetching name data
$data = fetch_name_data($name);

render('name.view', [
  'data' => $data,
  'name' => $name,
  'char' => $name[0]
]);
