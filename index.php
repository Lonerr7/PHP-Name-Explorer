<?php

require __DIR__ . '/inc/all.inc.php';

$overview = fetch_names_overview();

render('index.view', [
  'overview' => $overview,
  
]);
