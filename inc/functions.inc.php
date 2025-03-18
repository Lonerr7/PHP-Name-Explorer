<?php

declare(strict_types=1);

function e(string $value): string
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function gen_alphabet() {
  $alphabet = [];
  $A = ord('A');
  $Z = ord('Z');

  for ($i = $A; $i <= $Z; $i++) {
    $alphabet[] = chr($i);
  }

  return $alphabet;
}

function render(string $view, array $params): void
{
  extract($params);

  ob_start();
  require __DIR__ . "/../views/pages/{$view}.php";
  $contents = ob_get_clean();

  $alphabet = gen_alphabet();

  require __DIR__ . "/../views/layouts/main.view.php";
}
