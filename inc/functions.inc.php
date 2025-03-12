<?php

function e($value)
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
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
