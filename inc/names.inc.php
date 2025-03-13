<?php

declare(strict_types=1);

function fetch_names_by_initial(string $char): array
{
  global $pdo;
  $names = [];

  $stmt = $pdo->prepare('SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :letter ORDER BY `names`.`name` ASC');
  $stmt->bindValue(':letter', "{$char}%");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($results as $result) {
    $names[] = $result['name'];
  }

  return $names;
}

function fetch_name_data(string $name): array {
  global $pdo;

  $stmt = $pdo->prepare('SELECT * FROM `names` WHERE `name` = :name ORDER BY `names`.`year` DESC');
  $stmt->bindValue(':name', $name);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}