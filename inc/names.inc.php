<?php

declare(strict_types=1);

function fetch_total_distinct_names_count(string $char): int
{
  global $pdo;
  $stmt = $pdo->prepare('SELECT COUNT(DISTINCT `name`) AS `count` FROM `names` WHERE `name` LIKE :letter');
  $stmt->bindValue(':letter', "{$char}%", PDO::PARAM_STR);
  $stmt->execute();

  return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}

function fetch_names_by_initial(string $char, int $currentPage = 1, int $limit = 15): array
{
  global $pdo;
  $names = [];

  // Makung sure $currentPage is always not 0 or non-negative
  $currentPage = max(1, $currentPage);

  $stmt = $pdo->prepare('SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :letter ORDER BY `names`.`name` ASC LIMIT :limit OFFSET :offset');
  $stmt->bindValue(':letter', "{$char}%");
  $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
  $stmt->bindValue(':offset', $limit * ($currentPage - 1), PDO::PARAM_INT);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($results as $result) {
    $names[] = $result['name'];
  }

  return $names;
}

function fetch_name_data(string $name): array
{
  global $pdo;

  $stmt = $pdo->prepare('SELECT * FROM `names` WHERE `name` = :name ORDER BY `names`.`year` DESC');
  $stmt->bindValue(':name', $name);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function gen_names_overview(): array
{
  global $pdo;

  $stmt = $pdo->prepare('SELECT `name`, SUM(`count`) AS `sum` FROM `names` GROUP BY `name` ORDER BY `sum` DESC LIMIT 10');
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
