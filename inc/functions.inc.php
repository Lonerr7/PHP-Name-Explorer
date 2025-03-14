<?php

function e($value)
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// Rendering custom layout
function render($view,  $params)
{
  extract($params);

  ob_start();
  require __DIR__ . "/../views/pages/{$view}.php";
  $contents = ob_get_clean();

  $alphabet = genAlphabet();

  // Here we use $contents variable
  require __DIR__ . '/../views/layouts/main.view.php';
}


// Generating all leters of alphabet in an array
function genAlphabet(): array
{
  $A = ord('A');
  $Z = ord('Z');
  $letters = [];

  for ($i = $A; $i <= $Z; $i++) {
    $letters[] = chr($i);
  }

  return $letters;
}
