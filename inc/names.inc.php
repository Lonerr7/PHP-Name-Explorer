<?php

declare(strict_types=1);

function fetch_names_overview()
{
  global $pdo;

  $stmt = $pdo->prepare('SELECT `name`, SUM(`count`) AS `sum` FROM `names` GROUP BY `name` ORDER BY `sum` DESC LIMIT 10');
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetch_names_by_letter(string $char): array
{
  global $pdo;

  $stmt = $pdo->prepare('SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :letter ORDER BY `names`.`name` ASC;');
  $stmt->bindValue(':letter', "{$char}%");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $simplifiedResults = [];
  foreach ($results as $result) {
    $simplifiedResults[] = $result['name'];
  }

  return $simplifiedResults;
}
